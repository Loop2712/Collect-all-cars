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
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTo_sos_partner;
use App\User;


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

        if (!empty($requestData['text_img'])) {

            $name_file_img = uniqid('photo_sos-', true);
            $output_file_img = "./storage/uploads/".$name_file_img.".png";

            $data_64_img = explode( ',', $requestData['text_img'] );

            $fp_img = fopen($output_file_img, "w+");
     
            fwrite($fp_img, base64_decode( $data_64_img[ 1 ] ) );
             
            fclose($fp_img);

            $url_img_sos = str_replace("./storage/","",$output_file_img);
            $requestData['photo'] = $url_img_sos ;
        }
        
        Sos_map::create($requestData);

        // หา $id_sos_map
        $sos_map_latests = Sos_map::get();
        foreach ($sos_map_latests as $latest) {
            $id_sos_map = $latest->id;
        }

        DB::table('users')
              ->where('id', $requestData['user_id'])
              ->update([
                'phone' => $requestData['phone'],
          ]);

        switch ($requestData['content']) {
            case 'help_area':
                // ตรวจสอบ area แล้วส่งข้อมูลผ่านไลน์ 
                $this->_pushLine($requestData , $id_sos_map);
                break;
        }
        
        // เช็ค type user แล้วเลือก redirect
        // type line เด้งกลับ line oa
        // อื่นๆ แนะนำให้ผูกบัญชีกับไลน์
        $data_user = User::where('id', $requestData['user_id'] )->get();

        foreach ($data_user as $key_itme) {

            if ($key_itme->type == 'line') {
                return redirect('/sos_thank_area')->with('flash_message', 'Sos_map added!');
            }else{
                return redirect('/sos_thank')->with('flash_message', 'Sos_map added!');
            }

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

    public function sos_login_facebook()
    {
        if(Auth::check()){
            return redirect('sos_map/create');
        }else{
            return redirect('login/facebook?redirectTo=sos_map/create');
        }
    }

    public function insurance_login()
    {
        if(Auth::check()){
            return redirect('sos_insurance_blade');
        }else{
            return redirect('login/line?redirectTo=sos_insurance_blade');
        }
    }

    public function insurance_login_facebook()
    {
        if(Auth::check()){
            return redirect('sos_insurance_blade');
        }else{
            return redirect('login/facebook?redirectTo=sos_insurance_blade');
        }
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    protected function _pushLine($data , $id_sos_map)
    {   
        $datetime =  date("d-m-Y  h:i:sa");
        $name_user = $data['name'];
        $phone_user = $data['phone'];
        $lat_user = $data['lat'];
        $lng_user = $data['lng'];
        $photo = $data['photo'];

        $data_name_sp = explode("&",$data['area']);

        for ($i=0; $i < count($data_name_sp); $i++) {
            
            $data_name_sp[$i] = str_replace("amp; ","",$data_name_sp[$i]);

            $data_partners = DB::table('partners')->where('name', $data_name_sp[$i])->get();

            foreach ($data_partners as $data_partner) {
                $name_partner = $data_partner->name ;
                $name_line_group = $data_partner->line_group ;
                $mail_partner = $data_partner->mail ;
            }

            $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

            foreach ($data_line_group as $key) {
                $groupId = $key->groupId ;
                $name_time_zone = $key->time_zone ;
                $group_language = $key->language ;
            }

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

            $data_topic = [
                        "ขอความช่วยเหลือ",
                        "เวลา",
                        "จาก",
                        "โทร",
                        "รูปภาพสถานที่",
                    ];

            for ($xi=0; $xi < count($data_topic); $xi++) { 

                $text_topic = DB::table('text_topics')
                        ->select($group_language)
                        ->where('th', $data_topic[$xi])
                        ->where('en', "!=", null)
                        ->get();

                foreach ($text_topic as $item_of_text_topic) {
                    $data_topic[$xi] = $item_of_text_topic->$group_language ;
                }
            }
            
            $text_at = '@' ;

            //ส่งเมล
            $data_send_mail = array();
            $data_send_mail['photo'] = $photo ;
            $data_send_mail['name_partner'] = $name_partner ;
            $data_send_mail['time_zone'] = $time_zone ;
            $data_send_mail['name_user'] = $name_user ;
            $data_send_mail['phone_user'] = $phone_user ;
            $data_send_mail['lat'] = $lat_user ;
            $data_send_mail['lng'] = $lng_user ;
            $data_send_mail['lat_mail'] = $text_at.$lat_user;

            $email = $mail_partner ;
            Mail::to($email)->send(new MailTo_sos_partner($data_send_mail));

            // flex ask_for_help
            if (!empty($data['photo'])) {
                $template_path = storage_path('../public/json/ask_for_help_photo.json');
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("photo_sos.png",$photo,$string_json);
            }else{
                $template_path = storage_path('../public/json/ask_for_help.json');
                $string_json = file_get_contents($template_path);
            }
               
            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            $string_json = str_replace("datetime",$time_zone,$string_json);
            $string_json = str_replace("name",$name_user,$string_json);
            $string_json = str_replace("0999999999",$phone_user,$string_json);
            $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);
            $string_json = str_replace("organization",$data_name_sp[$i],$string_json);

            $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[0],$string_json);
            $string_json = str_replace("เวลา",$data_topic[1],$string_json);
            $string_json = str_replace("จาก",$data_topic[2],$string_json);
            $string_json = str_replace("โทร",$data_topic[3],$string_json);
            $string_json = str_replace("รูปภาพสถานที่",$data_topic[4],$string_json);

            $string_json = str_replace("lat",$lat_user,$string_json);
            $string_json = str_replace("lng",$lng_user,$string_json);
            $string_json = str_replace("lat_mail",$text_at.$lat_user,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $groupId,
                "messages" => $messages,
            ];

            // flex ask_for_help
            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            // SAVE LOG
            $data = [
                "title" => "ขอมูลขอความช่วยเหลือ" . $name_partner ,
                "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            ];
            MyLog::create($data);

        }
        
    }


}