<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Models\Not_comfor;
use Illuminate\Http\Request;
use App\Models\Mylog;

class Not_comforController extends Controller
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
            $not_comfor = Not_comfor::where('provider_id', 'LIKE', "%$keyword%")
                ->orWhere('reply_provider_id', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('want_phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $not_comfor = Not_comfor::latest()->paginate($perPage);
        }

        return view('not_comfor.index', compact('not_comfor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('not_comfor.create');
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

        $register_cars = DB::table('register_cars')
                    ->select('reply_provider_id', 'phone' , 'registration_number' , 'province')
                    ->where('provider_id', $requestData['provider_id'])
                    ->get();

        foreach($register_cars as $item){
            $requestData['reply_provider_id'] = $item->reply_provider_id ; 
            $requestData['phone'] = $item->phone ;
            $requestData['registration_number'] = $item->registration_number ;
            $requestData['province'] = $item->province ;
        }
        
        Not_comfor::create($requestData);

        $this->_push_Not_comforLine($requestData);

        return view('not_comfor.thx')->with('flash_message', 'Not_comfor added!');
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
        $not_comfor = Not_comfor::findOrFail($id);

        return view('not_comfor.show', compact('not_comfor'));
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
        $not_comfor = Not_comfor::findOrFail($id);

        return view('not_comfor.edit', compact('not_comfor'));
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
        
        $not_comfor = Not_comfor::findOrFail($id);
        $not_comfor->update($requestData);

        return redirect('not_comfor')->with('flash_message', 'Not_comfor updated!');
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
        Not_comfor::destroy($id);

        return redirect('not_comfor')->with('flash_message', 'Not_comfor deleted!');
    }

    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    public function _push_Not_comforLine($data)
    {
        $provider_id = $data['provider_id'];
        
        $reply_provider_id = $data['reply_provider_id'];
        $content = $data['content'];
        $phone = $data['phone'];
        $want_phone = $data['want_phone'];
        $registration_number = $data['registration_number'];
        $province = $data['province'];

        switch($want_phone)
        {
            case "Yes":  
                $template_path = storage_path('../public/json/not_comfor_p.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า",$string_json);
                $string_json = str_replace("9กก9999",$registration_number,$string_json);
                $string_json = str_replace("กรุงเทพมหานคร",$province,$string_json);
                $string_json = str_replace("ขอบคุณ","ฉันไม่สะดวก / I'm not comfortable",$string_json);
                $string_json = str_replace("ประชุม",$content,$string_json);
                $string_json = str_replace("000",$phone,$string_json);

                $messages = [ json_decode($string_json, true) ];
                break;
            case "No":  
                $template_path = storage_path('../public/json/not_comfor_not_p.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า",$string_json);
                $string_json = str_replace("9กก9999",$registration_number,$string_json);
                $string_json = str_replace("กรุงเทพมหานคร",$province,$string_json);
                $string_json = str_replace("ขอบคุณ","ฉันไม่สะดวก / I'm not comfortable",$string_json);
                $string_json = str_replace("ประชุม",$content,$string_json);

                $messages = [ json_decode($string_json, true) ];
                break;
        }

        $body = [
                    "to" => $reply_provider_id,
                    "messages" => $messages,
                ];

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
