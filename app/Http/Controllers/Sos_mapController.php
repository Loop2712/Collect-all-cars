<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_map;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Http\Controllers\API\API_Time_zone;
use App\Models\LineMessagingAPI;

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
    public function create(Request $request)
    {
        $text_sos = $request->get('text');

        $user = Auth::user();

        return view('sos_map.create', compact('user','text_sos'));
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

                // เช็ค type user แล้วเลือก redirect
                    // type line เด้งกลับ line oa
                    // อื่นๆ แนะนำให้ผูกบัญชีกับไลน์
                
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

    public function sos_insurance_blade(Request $request)
    {
        $user = Auth::user();

        $latlng = $request->get('latlng');

        $register_car = DB::table('register_cars')
            ->where('user_id', $user->id)
            ->where('active', "Yes")
            ->get();

        $name_insurance = Insurance::where('company', '!=',"" )
            ->groupBy('company')
            ->orderBy('company')
            ->get();

        $select_ins = Insurance::where('company', '!=',"" )
            ->groupBy('company')
            ->orderBy('company')
            ->get();

        return view('sos_map.sos_insurance', compact('register_car','latlng','name_insurance','select_ins'));
    }

    public function sos_login()
    {
        if(Auth::check()){
            return redirect('sos_map/create');
        }else{
            return redirect('login/line?redirectTo=sos_map/create');
        }
    }

    public function insurance_login()
    {
        if(Auth::check()){
            return redirect('sos_map/create?text=insurance');
        }else{
            return redirect('login/line?redirectTo=sos_map/create?text=insurance');
        }
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    protected function _pushLine($data)
    {   
        $datetime =  date("d-m-Y  h:i:sa");
        $name_user = $data['name'];
        $phone_user = $data['phone'];
        $lat_user = $data['lat'];
        $lng_user = $data['lng'];

        $data_name_sp = explode("amp;&amp;",$data['area']);
        print_r($data_name_sp);

        for ($i=0; $i < count($data_name_sp); $i++) { 
            echo "<br>";
            echo $data_name_sp[$i];

            // $data_partners = DB::table('partners')->where('name', $data_name_sp[$i])->get();

            // foreach ($data_partners as $data_partner) {
            //     $name_partner = $data_partner->name ;
            //     $name_line_group = $data_partner->line_group ;
            // }

            // $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

            // foreach ($data_line_group as $key) {
            //     $groupId = $key->groupId ;
            //     $name_time_zone = $key->time_zone ;
            //     $group_language = $key->language ;
            // }

            // // TIME ZONE
            // $API_Time_zone = new API_Time_zone();
            // $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

            // $data_topic = [
            //             "ขอความช่วยเหลือ",
            //             "เวลา",
            //             "จาก",
            //             "โทร",
            //         ];

            // for ($xi=0; $xi < count($data_topic); $xi++) { 

            //     $text_topic = DB::table('text_topics')
            //             ->select($group_language)
            //             ->where('th', $data_topic[$xi])
            //             ->where('en', "!=", null)
            //             ->get();

            //     foreach ($text_topic as $item_of_text_topic) {
            //         $data_topic[$xi] = $item_of_text_topic->$group_language ;
            //     }
            // }

            // $text_at = '@' ;
            // // flex ask_for_help
            // $template_path = storage_path('../public/json/ask_for_help.json');   
            // $string_json = file_get_contents($template_path);
            // $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            // $string_json = str_replace("datetime",$time_zone,$string_json);
            // $string_json = str_replace("name",$name_user,$string_json);
            // $string_json = str_replace("0999999999",$phone_user,$string_json);

            // $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[0],$string_json);
            // $string_json = str_replace("เวลา",$data_topic[1],$string_json);
            // $string_json = str_replace("จาก",$data_topic[2],$string_json);
            // $string_json = str_replace("โทร",$data_topic[3],$string_json);

            // $string_json = str_replace("lat",$lat_user,$string_json);
            // $string_json = str_replace("lng",$lng_user,$string_json);
            // $string_json = str_replace("lat_mail",$text_at.$lat_user,$string_json);

            // $messages = [ json_decode($string_json, true) ];

            // $body = [
            //     "to" => $groupId,
            //     "messages" => $messages,
            // ];

            // // flex ask_for_help
            // $opts = [
            //     'http' =>[
            //         'method'  => 'POST',
            //         'header'  => "Content-Type: application/json \r\n".
            //                     'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
            //         'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
            //         //'timeout' => 60
            //     ]
            // ];
                                
            // $context  = stream_context_create($opts);
            // $url = "https://api.line.me/v2/bot/message/push";
            // $result = file_get_contents($url, false, $context);

            // // SAVE LOG
            // $data = [
            //     "title" => "ขอมูลขอความช่วยเหลือ" . $name_partner ,
            //     "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            // ];
            // MyLog::create($data);

        }
        exit();
        // $data_partners = DB::table('partners')->where('name', $data['area'])->get();

        // foreach ($data_partners as $data_partner) {
        //     $name_partner = $data_partner->name ;
        //     $name_line_group = $data_partner->line_group ;
        // }

        // $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

        // foreach ($data_line_group as $key) {
        //     $groupId = $key->groupId ;
        //     $name_time_zone = $key->time_zone ;
        //     $group_language = $key->language ;
        // }

        // // TIME ZONE
        // $API_Time_zone = new API_Time_zone();
        // $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        // $data_topic = [
        //             "ขอความช่วยเหลือ",
        //             "เวลา",
        //             "จาก",
        //             "โทร",
        //         ];

        // for ($i=0; $i < count($data_topic); $i++) { 

        //     $text_topic = DB::table('text_topics')
        //             ->select($group_language)
        //             ->where('th', $data_topic[$i])
        //             ->where('en', "!=", null)
        //             ->get();

        //     foreach ($text_topic as $item_of_text_topic) {
        //         $data_topic[$i] = $item_of_text_topic->$group_language ;
        //     }
        // }

        // $text_at = '@' ;
        // // flex ask_for_help
        // $template_path = storage_path('../public/json/ask_for_help.json');   
        // $string_json = file_get_contents($template_path);
        // $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
        // $string_json = str_replace("datetime",$time_zone,$string_json);
        // $string_json = str_replace("name",$data['name'],$string_json);
        // $string_json = str_replace("0999999999",$data['phone'],$string_json);

        // $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[0],$string_json);
        // $string_json = str_replace("เวลา",$data_topic[1],$string_json);
        // $string_json = str_replace("จาก",$data_topic[2],$string_json);
        // $string_json = str_replace("โทร",$data_topic[3],$string_json);

        // $string_json = str_replace("lat",$data['lat'],$string_json);
        // $string_json = str_replace("lng",$data['lng'],$string_json);
        // $string_json = str_replace("lat_mail",$text_at.$data['lat'],$string_json);

        // $messages = [ json_decode($string_json, true) ];

        // $body = [
        //     "to" => $groupId,
        //     "messages" => $messages,
        // ];

        // // flex ask_for_help
        // $opts = [
        //     'http' =>[
        //         'method'  => 'POST',
        //         'header'  => "Content-Type: application/json \r\n".
        //                     'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
        //         'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
        //         //'timeout' => 60
        //     ]
        // ];
                            
        // $context  = stream_context_create($opts);
        // $url = "https://api.line.me/v2/bot/message/push";
        // $result = file_get_contents($url, false, $context);

        // //SAVE LOG
        // $data = [
        //     "title" => "ขอมูลขอความช่วยเหลือ",
        //     "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
        // ];
        // MyLog::create($data);
        
    }


}