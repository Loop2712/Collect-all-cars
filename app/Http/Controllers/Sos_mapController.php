<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_map;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

class Sos_mapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $sos_map = Sos_map::where('content', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_map = Sos_map::latest()->paginate($perPage);
        }

        return view('sos_map.index', compact('sos_map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();

        return view('sos_map.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Sos_map::create($requestData);

        DB::table('users')
              ->where('id', $requestData['user_id'])
              ->update([
                'phone' => $requestData['phone'],
          ]);

        switch ($requestData['content']) {
            case 'help_area':
                // ตรวจสอบ area แล้วส่งข้อมูลผ่านไลน์ 

                $this->_pushLine($requestData);

                return redirect('/sos_thank_area')->with('flash_message', 'Sos_map added!');
                break;
            case 'police':
                return redirect('/disaster2')->with('flash_message', 'Sos_map added!');
                break;
            case 'js100':
                return redirect('/js_100')->with('flash_message', 'Sos_map added!');
                break;
            case 'life_saving':
                return redirect('/life_saving')->with('flash_message', 'Sos_map added!');
                break;
            case 'pok_tek_tung':
                return redirect('/pok_tek_tung')->with('flash_message', 'Sos_map added!');
                break;
            case 'highway':
                return redirect('/highway')->with('flash_message', 'Sos_map added!');
                break;
            case 'lawyers':
                return redirect('/lawyers')->with('flash_message', 'Sos_map added!');
                break;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $sos_map = Sos_map::findOrFail($id);

        return view('sos_map.show', compact('sos_map'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $sos_map = Sos_map::findOrFail($id);

        return view('sos_map.edit', compact('sos_map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $sos_map = Sos_map::findOrFail($id);
        $sos_map->update($requestData);

        return redirect('sos_map')->with('flash_message', 'Sos_map updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Sos_map::destroy($id);

        return redirect('sos_map')->with('flash_message', 'Sos_map deleted!');
    }

    public function sos_login()
    {
        if(Auth::check()){
            return redirect('sos_map/create');
        }else{
            return redirect('login/line?redirectTo=sos_map/create');
        }
    }

    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    protected function _pushLine($data)
    {   
        $template_path = storage_path('../public/json/flex-accident.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","ขอความช่วยเหลือ",$string_json);

        $messages = [ json_decode($string_json, true) ];

        switch ($data['area']) {
            case 'ทดสอบ':
                $body = [
                    "to" => "U912994894c449f2237f73f18b5703e89",
                    "messages" => $messages,
                ];
                break;
        }

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.$this->channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "https://api.line.me/v2/bot/message/push",
            "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data);
        return $result;
        
    }


}