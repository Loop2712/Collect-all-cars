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
use App\Models\Nationality;

use App\Http\Controllers\API\API_Time_zone;
use App\Models\LineMessagingAPI;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTo_sos_partner;
use App\Models\Partner_condo;
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
        $condo_id = $request->get('condo_id');
        $text_sos = $request->get('text');

        $user = Auth::user();
        if (!empty($user->nationalitie)){
            $nationalitie = Nationality::where('nationality',$user->nationalitie)->get();
            foreach ($nationalitie as $item) {
                $nationalitie_tel = $item->tel;
            }
            return view('sos_map.create', compact('user','text_sos','nationalitie_tel', 'condo_id'));
        }
        // echo "<pre>";
        // print_r($nationalitie_tel);
        // echo "<pre>";
        // exit();
        return view('sos_map.create', compact('user','text_sos', 'condo_id'));
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

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();
        
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

        $requestData['notify'] = $requestData['area'] ;

        if ( $requestData['content'] == "emergency_Charlie_Bangkok" ) {
            $requestData['name_area']  = 'ชาลีกรุงเทพ' ;
        }

        Sos_map::create($requestData);

        // หา $id_sos_map
        $sos_map_latests = Sos_map::get();
        foreach ($sos_map_latests as $latest) {
            $id_sos_map = $latest->id;
            $requestData['name_partner'] = $latest->area ;
            $requestData['name_area'] = $latest->name_area ;
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
            case 'emergency_js100':
                // send data to groupline js100
                $this->_pushLine_to_js100($requestData , $id_sos_map);
                break;
            case 'emergency_Charlie_Bangkok':
                // send data to groupline Charlie_Bangkok
                $this->_pushLine_to_Charlie($requestData , $id_sos_map);
                break;   
        }
        
        // เช็ค type user แล้วเลือก redirect
        // type line เด้งกลับ line oa
        // อื่นๆ แนะนำให้ผูกบัญชีกับไลน์
        $data_user = User::where('id', $requestData['user_id'] )->get();

        foreach ($data_user as $key_itme) {

            if ($key_itme->type == 'line') {
                if (!empty($requestData['condo_id'])) {
                    $data_condos = Partner_condo::where('id' , $requestData['condo_id'])->first();
                    $link_line_oa = $data_condos->link_line_oa ;
                }else{
                    $link_line_oa = "https://lin.ee/xnFKMfc" ;
                }

                // return redirect('/sos_thank_area')->with('flash_message', 'Sos_map added!');
                return view('sos_map.sos_thank_area', compact('link_line_oa'));

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

    public function sos_login(Request $request)
    {
        $requestData = $request->all();

        if (!empty($requestData['condo_id'])) {

            $condo_id = $requestData['condo_id'];

            if(Auth::check()){
                return redirect('sos_map/create?condo_id=' . $condo_id);
            }else{
                return redirect('login/line?redirectTo=sos_map/create?condo_id=' . $condo_id);
            }

        }else{

            if(Auth::check()){
                return redirect('sos_map/create');
            }else{
                return redirect('login/line?redirectTo=sos_map/create');
            }

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

    public function sos_login_other_app(Request $request , $user_from)
    {
        if(Auth::check()){

            $data_user = Auth::user();

            if ( !empty($data_user->user_from) ){

                $check_user_from = explode(",",$data_user->user_from);

                if ( in_array( $user_from , $check_user_from ) ){
                    $update_user_from = $data_user->user_from ;
                }else{
                    $update_user_from = $data_user->user_from .','. $user_from ;
                }

            }else{
                $update_user_from = $user_from ;
            }

            DB::table('users')
                ->where([ 
                        ['type', 'line'],
                        ['provider_id', $data_user->provider_id],
                    ])
                ->update(['user_from' => $update_user_from]);

            return redirect('sos_map/create');
        }else{
            return redirect('login/line/'.$user_from.'?redirectTo=sos_map/create');
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

    public function rate_help($id_sos_map)
    {
        $data_sos_map = Sos_map::findOrFail($id_sos_map);
        $data_users = User::findOrFail($data_sos_map->user_id);

        if (!empty($data_sos_map->score_impression)) {
            $score = "Yes" ; 
        }else{
            $score = "No" ;
        }

        return view('sos_map.rate_help', compact('data_sos_map','data_users','score'));
    }

    public function sos_thank_submit_score($user_id)
    {
        return view('sos_map.sos_thank_submit_score', compact('user_id'));
    }

    public function log_in_sos_map_add_photo($id_sos_map)
    {
        if(Auth::check()){
            return redirect('sos_map/add_photo' . '/' . $id_sos_map);
        }else{
            return redirect('login/line?redirectTo=sos_map/add_photo' . '/' . $id_sos_map);
        }
    }

    public function sos_map_add_photo($id_sos_map)
    {   
        $user = Auth::user();
        $data_sos_map = Sos_map::findOrFail($id_sos_map);

        if (!empty($data_sos_map->photo_succeed_by)) {
            $data_officer = User::where('id' , $data_sos_map->photo_succeed_by)->first();
        }else{
            $data_officer = "" ;
        }

        if (!empty($data_sos_map->photo_succeed)) {
            $photo_succeed = "Yes" ; 
        }else{
            $photo_succeed = "No" ;
        }

        return view('sos_map.add_photo_succeed', compact('user' , 'data_sos_map' , 'photo_succeed' ,'data_officer'));
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    protected function _pushLine($data , $id_sos_map)
    {   
        $datetime =  date("d-m-Y  h:i:sa");
        $date_now =  date("d-m-Y");
        $time_now =  date("h:i:sa");
        $name_user = $data['name'];
        $phone_user = $data['phone'];
        $lat_user = $data['lat'];
        $lng_user = $data['lng'];
        $photo = $data['photo'];
        $user_id = $data['user_id'];

        $data_users = User::where('id' , $user_id)->first();

        $data_name_sp = explode("&",$data['area']);
        $data_name_area_sp = explode("&",$data['name_area']);

        for ($i=0; $i < count($data_name_sp); $i++) {
            
            $data_name_sp[$i] = str_replace("amp; ","",$data_name_sp[$i]);
            // $data_name_area_sp[$i] = str_replace(" ","",$data_name_area_sp[$i]);

            $data_partners = DB::table('partners')
                ->where('name', $data_name_sp[$i])
                ->where('name_area','LIKE', "%$data_name_area_sp[$i]%")
                ->get();

            foreach ($data_partners as $data_partner) {
                $name_partner = $data_partner->name ;
                $name_line_group = $data_partner->line_group ;
                $mail_partner = $data_partner->mail ;
                $id_partner = $data_partner->id ;
                $group_line_id = $data_partner->group_line_id;
            }

            $data_line_group = DB::table('group_lines')->where('id', $group_line_id)->get();

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
                        "กำลังไปช่วยเหลือ",
                        "ดูแผนที่",
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

            if ($email == "-" or $email == null) {
                $email = "vii_test@gmail.com" ;
            }
            
            Mail::to($email)->send(new MailTo_sos_partner($data_send_mail));
            
            // flex ask_for_help
            if (!empty($data['photo'])) {
                $template_path = storage_path('../public/json/ask_for_help_photo_new.json');
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("photo_sos.png",$photo,$string_json);
            }else{
                $template_path = storage_path('../public/json/ask_for_help_new.json');
                $string_json = file_get_contents($template_path);
            }
               
            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);

            $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[0],$string_json);
            $string_json = str_replace("name_user",$name_user,$string_json);
            $string_json = str_replace("area",$data_name_area_sp[$i],$string_json);

            if (!empty($data_users->photo)) {
                $string_json = str_replace("photo_profile_user",$data_users->photo,$string_json);
            }else{
                $string_json = str_replace("https://www.viicheck.com/storage/photo_profile_user","https://www.viicheck.com/img/stickerline/Flex/12.png",$string_json);
            }

            $string_json = str_replace("png_language",$data_users->language,$string_json);
            $string_json = str_replace("png_national",$data_users->nationalitie,$string_json);

            $string_json = str_replace("วันที่แจ้ง",$date_now,$string_json);
            $string_json = str_replace("เวลาที่แจ้ง",$time_now,$string_json);

            $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[1],$string_json);
            $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);
            $string_json = str_replace("organization",$id_partner,$string_json);

            $string_json = str_replace("0999999999",$phone_user,$string_json);
            $string_json = str_replace("ดูแผนที่",$data_topic[2],$string_json);

            $string_json = str_replace("รูปภาพสถานที่",$data_topic[3],$string_json);

            $string_json = str_replace("gg_lat_mail",$text_at.$lat_user,$string_json);
            $string_json = str_replace("gg_lat",$lat_user,$string_json);
            $string_json = str_replace("lng",$lng_user,$string_json);

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
                "title" => "ข้อมูลขอความช่วยเหลือ" . $name_partner ,
                "content" => "จากคุณ" . $name_user,
            ];
            MyLog::create($data);

        }
        
    }

    // send data to grouplin js100
    protected function _pushLine_to_js100($data , $id_sos_map)
    {   
        $datetime =  date("d-m-Y  h:i:sa");
        $date_now =  date("d-m-Y");
        $time_now =  date("h:i:sa");

        $name_user = $data['name'];
        $user_id = $data['user_id'];
        $phone_user = $data['phone'];
        $lat_user = $data['lat'];
        $lng_user = $data['lng'];
        $photo = $data['photo'];

        $data_users = User::where('id' , $user_id)->first();

        $data_line_group = DB::table('group_lines')->where('system', 'emergency_js100')->first();

        $groupId = $data_line_group->groupId ;
        $name_time_zone = $data_line_group->time_zone ;
        $group_language = $data_line_group->language ;
        
        $text_at = '@' ;

        $template_path = storage_path('../public/json/flex-sos-js100.json');
        $string_json = file_get_contents($template_path);

        if (!empty($data_users->photo)) {
            $string_json = str_replace("photo_profile_user",$data_users->photo,$string_json);
        }else{
            $string_json = str_replace("https://www.viicheck.com/storage/photo_profile_user","https://www.viicheck.com/img/stickerline/Flex/12.png",$string_json);
        }

        $string_json = str_replace("name_user",$name_user,$string_json);

        if (!empty($data_users->language)) {
            $string_json = str_replace("png_language",$data_users->language,$string_json);
        }else{
            $string_json = str_replace("png_language","-",$string_json);
        }

        if (!empty($data_users->nationalitie)) {
            $string_json = str_replace("png_national",$data_users->nationalitie,$string_json);
        }else{
            $string_json = str_replace("png_national","-",$string_json);
        }
        
        $string_json = str_replace("0899999999",$phone_user,$string_json);
        $string_json = str_replace("วันที่แจ้ง",$date_now,$string_json);
        $string_json = str_replace("เวลาที่แจ้ง",$time_now,$string_json);

        $string_json = str_replace("gg_lat_mail",$text_at.$lat_user,$string_json);
        $string_json = str_replace("gg_lat",$lat_user,$string_json);
        $string_json = str_replace("lng",$lng_user,$string_json);

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
            "title" => "ข้อมูลขอความช่วยเหลือ JS100" ,
            "content" => "จากคุณ" . $name_user,
        ];
        MyLog::create($data);

    }

    // send data to groupline Charlie
    protected function _pushLine_to_Charlie($data , $id_sos_map)
    {   
        $datetime =  date("d-m-Y  h:i:sa");
        $date_now =  date("d-m-Y");
        $time_now =  date("h:i:sa");

        $name_user = $data['name'];
        $user_id = $data['user_id'];
        $phone_user = $data['phone'];
        $lat_user = $data['lat'];
        $lng_user = $data['lng'];
        $photo = $data['photo'];

        $data_users = User::where('id' , $user_id)->first();

        $data_line_group = DB::table('group_lines')->where('system', 'emergency_Charlie')->first();

        $groupId = $data_line_group->groupId ;
        $name_time_zone = $data_line_group->time_zone ;
        $group_language = $data_line_group->language ;
        $id_partner = $data_line_group->partner_id ;

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $data_topic = [
                    "ขอความช่วยเหลือ",
                    "ภาษา",
                    "สัญชาติ",
                    "กำลังไปช่วยเหลือ",
                    "ช่วยเหลือ",
                    "แผนที่",
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

        $template_path = storage_path('../public/json/flex_volunteer/flex_sos_chalie.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);

        $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[0],$string_json);
        $string_json = str_replace("ภาษา",$data_topic[1],$string_json);
        $string_json = str_replace("สัญชาติ",$data_topic[2],$string_json);
        $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[3],$string_json);
        $string_json = str_replace("ช่วยเหลือ",$data_topic[4],$string_json);
        $string_json = str_replace("แผนที่",$data_topic[5],$string_json);

        if (!empty($data_users->photo)) {
            $string_json = str_replace("IMG_USER",$data_users->photo,$string_json);
        }else{
            $string_json = str_replace("https://www.peddyhub.com/storage/IMG_USER","https://www.viicheck.com/img/stickerline/Flex/12.png",$string_json);
        }

        $string_json = str_replace("NAME_USER",$name_user,$string_json);

        if (!empty($data_users->language)) {
            $string_json = str_replace("PNG_LANGUAGE",$data_users->language,$string_json);
        }else{
            $string_json = str_replace("PNG_LANGUAGE","-",$string_json);
        }

        if (!empty($data_users->nationalitie)) {
            $string_json = str_replace("USER_NATIONAL",$data_users->nationalitie,$string_json);
        }else{
            $string_json = str_replace("USER_NATIONAL","-",$string_json);
        }

        $string_json = str_replace("PHOTO_SOS",$photo,$string_json);
        $string_json = str_replace("PHONE_USER",$phone_user,$string_json);
        $string_json = str_replace("DATE_SOS",$date_now,$string_json);
        $string_json = str_replace("TIME_SOS",$time_now,$string_json);

        $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);
        $string_json = str_replace("organization",$id_partner,$string_json);

        $string_json = str_replace("gg_lat_mail",$text_at.$lat_user,$string_json);
        $string_json = str_replace("gg_lat",$lat_user,$string_json);
        $string_json = str_replace("lng",$lng_user,$string_json);

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
            "title" => "ข้อมูลขอความช่วยเหลือ Charlie" ,
            "content" => "จากคุณ" . $name_user,
        ];
        MyLog::create($data);

    }


}