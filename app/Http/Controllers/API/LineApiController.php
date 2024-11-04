<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Models\LineMessagingAPI;
use App\Models\Group_line;
use App\Models\Sos_map;
use App\Models\Partner;
use App\Models\Partner_condo;
use App\User;
use App\Models\Sos_help_center;
use App\Models\Data_1669_operating_officer;
use App\Models\Data_1669_operating_unit;
use App\Models\Nationalitie_group_line;
use App\Models\Nationalitie_officer;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Sos_1669_form_yellow;
use App\Models\Sos_1669_form_pink;
use App\Models\Sos_1669_form_green;
use App\Models\Sos_1669_form_blue;
use App\Models\Maintain_noti;

class LineApiController extends Controller
{
    public function store(Request $request)
	{
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data);

        //GET ONLY FIRST EVENT
        $event = $requestData["events"][0];

        switch($event["type"]){
            case "message" :
                $this->Loading_Animation($event);
                sleep(0.5);
                $this->messageHandler($event);
                break;
            case "postback" :
                $this->Loading_Animation($event);
                sleep(0.5);
                $this->postbackHandler($event);
                break;
            case "join" :
                $this->save_group_line($event);
                break;
            case "memberJoined" :
                $this->check_memberJoined($event);
                break;
            case "follow" :
                $this->user_follow_line($event);
                DB::table('users')
                    ->where([
                            ['type', 'line'],
                            ['provider_id', $event['source']['userId']],
                            ['status', "active"]
                        ])
                    ->update(['add_line' => 'Yes']);
                break;
        }
	}

    function Loading_Animation($event){

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer " . env('CHANNEL_ACCESS_TOKEN')
        );

        // กำหนด URL และข้อมูลสำหรับการเรียกใช้งาน
        $url = "https://api.line.me/v2/bot/chat/loading/start";
        $data = array("chatId" => $event['source']['userId']);

        // สร้างคำขอ HTTP POST
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // ส่งคำขอและรับผลลัพธ์
        $response = curl_exec($ch);
        curl_close($ch);

    }

	public function messageHandler($event)
    {
        if ($event["source"]["type"] == "user") {

            switch($event["message"]["type"]){
                case "text" :
                    $this->textHandler($event);
                    break;
            }

        }elseif ($event["source"]["type"] == "group"){

            switch($event["message"]["type"]){
                case "text" :
                    $this->textHandler_group($event);
                    break;
            }

        }


    }

    public function postbackHandler($event)
    {
        $line = new LineMessagingAPI();

        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "thx" :
                $line->_pushguestLine(null, $event, "thx");
                $line->reply_success($event , $data_postback);
                break;
            case "wait" :
                $line->_pushguestLine(null, $event, "wait");
                $line->reply_success($event , $data_postback);
                break;
            case "การตอบกลับ" :
                $line->select_reply(null, $event, "reply");
                break;
            case "help_complete" :
                $this->check_help_complete_by_helper($event, $data_postback, $data_postback_explode[1]);
                break;
            case "sos" :
                $this->sos_helper($data_postback_explode[1] , $event["source"]["userId"] , $event);
                break;
            case "Chinese" :
                $line->replyToUser(null, $event, "Chinese");
                break;
            case "sos_1669" :
                // SOS_ID/go_to_help/_UNIT_ID_/_OFFICER_ID_
                // sos_1669?SOS_ID/refuse/_UNIT_ID_/_OFFICER_ID_
                $this->sos_1669_confirm_or_refuse_case($data_postback_explode[1], $event);
                break;
            //===== case by Junior Dear ติดต่อสอบถามได้ที่ Dear =====
            case "fix_process" :
                $line->new_flex_2024(null, $event, "fix_process");
                break;
            case "advice_ViiFix" :
                $line->new_flex_2024(null, $event, "advice_ViiFix");
                break;
            //=====End case by Junior Dear ติดต่อสอบถามได้ที่ Dear =====
            case "maintain" :
                $line->check_process_maintain($data_postback_explode[1] , $event["source"]["userId"] , $event);
            break;
        }

    }

    function help_complete_by_command($event, $data_postback, $id_sos_map , $name_command , $name_helper){
        $data_sos_map = Sos_map::where("id" , $id_sos_map)->first();
        $data_helpers = User::where('provider_id' , $event["source"]["userId"])->first();

        $data_groupline = Group_line::where('groupId',$event["source"]["groupId"])->first();
        $id_organization_helper = $data_groupline->partner_id ;
        $data_partner_helpers = Partner::findOrFail($id_organization_helper);

        $helper_id_explode = explode(",",$data_sos_map->helper_id);

        $this->reply_success_groupline_by_command($event , $data_postback, $id_sos_map , $name_command , $name_helper);
        $this->help_complete($id_sos_map);
    }



    function check_help_complete_by_helper($event, $data_postback, $id_sos_map){
        $data_sos_map = Sos_map::where("id" , $id_sos_map)->first();
        $data_helpers = User::where('provider_id' , $event["source"]["userId"])->first();

        $data_groupline = Group_line::where('groupId',$event["source"]["groupId"])->first();
        $id_organization_helper = $data_groupline->partner_id ;
        $data_partner_helpers = Partner::findOrFail($id_organization_helper);

        $helper_id_explode = explode(",",$data_sos_map->helper_id);

        if (count($helper_id_explode) == 1) {
            if ($helper_id_explode[0] == $data_helpers->id) {
                $this->reply_success_groupline($event , $data_postback, $id_sos_map);
                $this->help_complete($id_sos_map);
            }else{
                // ไม่สามารถกดได้
                $this->This_help_is_done($data_partner_helpers, $event, "no_helper");
            }
        }else{
            if (in_array($data_helpers->id, $helper_id_explode)){
                $this->reply_success_groupline($event , $data_postback, $id_sos_map);
                $this->help_complete($id_sos_map);
            }
            else{
                // ไม่สามารถกดได้
                $this->This_help_is_done($data_partner_helpers, $event, "no_helper");
            }
        }
    }

    public function textHandler($event)
    {
        $line = new LineMessagingAPI();

        if ($event["message"]["text"] == "ติดต่อ ViiCHECK") {
            $line->replyToUser(null, $event, "contact_viiCHECK");
        }else if($event["message"]["text"] == "language"){
            $line->replyToUser(null, $event, "language");
        }else if($event["message"]["text"] == "ทดสอบ"){ //by Junior Dear
            $line->new_flex_2024(null, $event, "deme_sos_api");
        }else if($event["message"]["text"] == "promotion_partner"){ //by Junior Dear
            $line->new_flex_2024(null, $event, "promotion_partner");
        }else if($event["message"]["text"] == "fix_flex_line"){ //by Junior Dear
            $line->new_flex_2024(null, $event, "fix_flex_line");
        }else if($event["message"]["text"] == "bind_groupLine"){ //by Junior Dear
            $line->new_flex_2024(null, $event, "bind_groupLine");
        }else {

            $data_users = DB::table('users')
                ->where('provider_id', $event["source"]['userId'])
                ->where('status', "active")
                ->get();

            foreach ($data_users as $data_user) {
                if (!empty($data_user->language)) {
                    $user_language = $data_user->language ;
                    if ($user_language == "zh-TW") {
                        $user_language = "zh_TW";
                    }
                    if ($user_language == "zh-CN") {
                        $user_language = "zh_CN";
                    }
                }else{
                    $user_language = 'en' ;
                }
            }

            $text_topic = DB::table('text_topics')
                ->select('th')
                ->where($user_language, $event["message"]["text"])
                ->get();

            foreach ($text_topic as $item) {
                $text_th = $item->th ;
            }

            switch( strtolower($text_th) )
            {
                case "อื่นๆ" :
                    $line->replyToUser(null, $event, "other");
                    break;
                case "สพฉ" :
                    $line->replyToUser(null, $event, "niems");
                    break;
                case "ข่าวสาร" :
                    $line->replyToUser(null, $event, "vnews");
                    break;
                // case "vmarket" :
                //     $line->replyToUser(null, $event, "vmarket");
                //     break;
                case "รถของฉัน" :
                    $line->replyToUser(null, $event, "myvehicle");
                    break;
                case "ข้อมูลของคุณ" :
                    $line->replyToUser(null, $event, "profile");
                    break;
                case "รถยนต์" :
                    $line->replyToUser(null, $event, "mycar");
                    break;
                case "จักรยานยนต์" :
                    $line->replyToUser(null, $event, "mymotorcycles");
                    break;
                case "รถอื่นๆ" :
                    $line->replyToUser(null, $event, "mycarother");
                    break;
                case "ใบอนุญาตขับรถ" :
                    $line->replyToUser(null, $event, "driver_license");
                    break;
                case "ติดต่อ" :
                    $line->replyToUser(null, $event, "contact");
                    break;
                case "โปรโมชั่น" :
                    $line->replyToUser(null, $event, "promotion");
                    break;
                case "โปรโมชั่นรถยนต์" :
                    $line->replyToUser(null, $event, "promotion_car");
                    break;
                case "โปรโมชั่นรถจักรยานยนต์" :
                    $line->replyToUser(null, $event, "promotion_motorcycle");
                    break;
                case "peddyhub" :
                    $line->replyToUser(null, $event, "peddyhub");
                    break;
                // case "language" :
                //     $line->replyToUser(null, $event, "language");
                //     break;
            }
        }
    }

    public function textHandler_group($event)
    {
        $data_groupline = Group_line::where('groupId',$event["source"]["groupId"])->first();
        $data_partner = Partner::where('id' , $data_groupline->partner_id)->first();
        $data_user = User::where('provider_id',$event["source"]["userId"])->first();

        if ( $event["message"]["text"] == "น้องวี")  {

            $template_path = storage_path('../public/json/text_done.json');
            $string_json = file_get_contents($template_path);

            $text = "สวัสดีค่ะคุณ : " . $data_user->name . " วีกำลังตอบกลับที่กลุ่มไลน์ของ Partner : " . $data_partner->name . " ชื่อกลุ่มไลน์ : " . $data_groupline->groupName ;

            $string_json = str_replace("ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",$text,$string_json);

        }
        else if($event["message"]["text"] == "ลงทะเบียนเจ้าหน้าที่"){ //by Junior Dear

            $template_path = storage_path('../public/json/flex-repair/flex-fix_new/flex_line_register_officer.json');
            $string_json = file_get_contents($template_path);

            $registration_url = url('/sos_partner_officers/create') . "?sos_partner_id=" . $data_groupline->partner_id;

            $string_json = str_replace("https://www.viicheck.com/sos_partner_officers", $registration_url, $string_json);

        }

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

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
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        // $event["message"]["text"] == "ติดต่อ ViiCHECK" ;

    }

    public function save_group_line($event)
    {
        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
            ]
        ];

        $group_id = $event['source']['groupId'];

        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/group/".$group_id."/summary";
        $result = file_get_contents($url, false, $context);

        $data_group_line = json_decode($result);

        $save_name_group = [
            "groupId" => $data_group_line->groupId,
            "groupName" => $data_group_line->groupName,
            "pictureUrl" => $data_group_line->pictureUrl,
            "time_zone" => "Asia/Bangkok",
            "language" => "en",
        ];

        Group_line::firstOrCreate($save_name_group);

        $data = [
            "title" => "บันทึก Name Group Line",
            "content" => $data_group_line->groupName,
        ];
        MyLog::create($data);

        $line = new LineMessagingAPI();
        $line->send_HelloLinegroup($event,$save_name_group);

    }

    public function check_memberJoined($event)
    {
        $provider_id = $event['joined']['members'][0]['userId'];
        $group_id = $event['source']['groupId'];

        $data_user = User::where('provider_id',$provider_id)->first();
        $data_groupline = Nationalitie_group_line::where('groupId',$group_id)->first();

        // หาชื่อ user จากไลน์
        $channelAccessToken = env('CHANNEL_ACCESS_TOKEN');
        $url = "https://api.line.me/v2/bot/profile/" . $provider_id;
        $headers = array(
            "Authorization: Bearer " . $channelAccessToken,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data_response = json_decode($response, true);
        $name_user_form_line = $data_response["displayName"];
        // จบ หาชื่อ user จากไลน์

        $check_group_line = Nationalitie_group_line::where('groupId' , $group_id)->first();

        if ( !empty($check_group_line->id) ){

            $check_officer = Nationalitie_officer::where('group_line_id' , $check_group_line->id)
                ->where('user_id' , $data_user->id)
                ->first();

            if ( empty($check_officer->id) ){
                // ส่งไลน์ให้ลงทะเบียน
                $template_path = storage_path('../public/json/nationalitie/register_officer_by_join_new.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("<name_user>",$name_user_form_line,$string_json);
                $string_json = str_replace("<language>",$data_groupline->language,$string_json);

                $messages = [ json_decode($string_json, true) ];

                $body = [
                    "to" => $group_id,
                    "messages" => $messages,
                ];

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
                $data_save_log = [
                    "title" => "send flex register_officer",
                    "content" => "to >> " . $group_id,
                ];
                MyLog::create($data_save_log);
            }

        }


    }

    public function user_follow_line($event)
    {
        $provider_id = $event['source']['userId'];

        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => 'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);

        $url = "https://api.line.me/v2/bot/profile/".$provider_id;
        $result = file_get_contents($url, false, $context);

        $data_result = json_decode($result);

        //SAVE LOG
        $data = [
            "title" => "ตรวจสอบภาษาเครื่องผู้ใช้",
            "content" => $data_result->displayName . "-" . $data_result->language,
        ];
        MyLog::create($data);

        $data_users = DB::table('users')
                ->where('provider_id', $provider_id)
                ->where('status', "active")
                ->get();

        if (!empty($data_users[0])) {
            // เช็คภาษาของ User
            $this->check_language_user($data_users);
        }else {
            // ตั้งค่าริชเมนูเริ่มต้น
            $this->set_richmanu_start($provider_id , $data_result->language);
        }

    }

    public function set_richmanu_start($provider_id , $device_language)
    {
        switch ($device_language) {
            case 'th':
                $richMenuId_start = "richmenu-7db63f1962320163f3e733a48b9d44bc" ;
                break;
            case 'en':
                $richMenuId_start = "richmenu-889d55423c76bfc75ae480d3578399ba" ;
                break;
            case 'zh-TW':
                $richMenuId_start = "richmenu-1dccf91503b8568cc68392a984fe3671" ;
                break;
            case 'zh-CN':
                $richMenuId_start = "richmenu-7fa18dc3b17d29cb2a6492a0a2635ee3" ;
                break;
            case 'ja':
                $richMenuId_start = "richmenu-e7a742ab609b020b5d01fbb0d22478a9" ;
                break;
            case 'ko':
                $richMenuId_start = "richmenu-fff52c7ecd56a44ea0a00b091e5d20bb" ;
                break;
            case 'es-ES':
                $richMenuId_start = "richmenu-40d7c52250182ab24ce39a0f0f392cdd" ;
                break;
            case 'lo':
                $richMenuId_start = "richmenu-9afdd88c68cfe4bb5a5fbaae402e3727" ;
                break;
            case 'my':
                $richMenuId_start = "richmenu-78aefd7ea6f5548e3a6c37e1d8ad8d3c" ;
                break;
            case 'de':
                $richMenuId_start = "richmenu-37950bfed6a8c615573d040990921a63" ;
                break;
            case 'hi':
                $richMenuId_start = "richmenu-c4a98282d4dfb31bcf8bedb17733b26b" ;
                break;
            case 'ar':
                $richMenuId_start = "richmenu-4bc78b720345304f5763ffffb56fa48a" ;
                break;
            case 'ru':
                $richMenuId_start = "richmenu-b006e6d2d30e49b0a68d8936e61084e4" ;
                break;


            default:
                // en
                $richMenuId_start = "richmenu-889d55423c76bfc75ae480d3578399ba" ;
                break;
        }
        // เก่า
        // $richMenuId_start = "richmenu-fcfe7e45ecac9c831a2ba9da47fab085" ;

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('CHANNEL_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CLIENT_SECRET')]);
        $response = $bot->linkRichMenu($provider_id, $richMenuId_start);

        $data = [
            "title" => "set_richmanu_start",
            "content" => $provider_id,
        ];
        MyLog::create($data);

    }

    public function check_language_user($data_users)
    {
        foreach ($data_users as $data_user) {
            $user_language = $data_user->language ;
            $provider_id = $data_user->provider_id ;
        }

        if (empty($user_language)) {
            // DF ริชเมนู EN
            $richMenuId = "richmenu-995ba378f3ad783b679dab18b9cb981e" ;
        }else {
            switch ($user_language) {
                case 'th':
                    $richMenuId = "richmenu-c63483a8288529796f82fd427e268ce9" ;
                    break;
                case 'en':
                    $richMenuId = "richmenu-995ba378f3ad783b679dab18b9cb981e" ;
                    break;
                case 'zh-TW':
                    $richMenuId = "richmenu-e1f05af2e8638eb19f2623de38b593da" ;
                    break;
                case 'zh-CN':
                    $richMenuId = "richmenu-aaf26413c43367b03976559186172c16" ;
                    break;
                case 'ja':
                    $richMenuId = "richmenu-cf1a83e9bea9ca538c0d0a2310e8367d" ;
                    break;
                case 'ko':
                    $richMenuId = "richmenu-35897cceb9c47c971be8e7b4981121fd" ;
                    break;
                case 'es':
                    $richMenuId = "richmenu-1f5ad16d70304187f9d9f054f17775a7" ;
                    break;
                case 'lo':
                    $richMenuId = "richmenu-639d03ff46ab2d91290103c370fd9e72" ;
                    break;
                case 'my':
                    $richMenuId = "richmenu-61599990dc30897b6f97df7311bd4b7c" ;
                    break;
                case 'de':
                    $richMenuId = "richmenu-1c4a0b8bfa9536c78ec0c8c53ab7f64f" ;
                    break;
                case 'hi':
                    $richMenuId = "richmenu-77d3a65621847add10087f92c53ddda1" ;
                    break;
                case 'ar':
                    $richMenuId = "richmenu-62b66dcb604d2e11ed436c3dbdc022bb" ;
                    break;
                case 'ru':
                    $richMenuId = "richmenu-4ce9f73d2875b143a686a3272a5eafce" ;
                    break;
                case 'test':
                    $richMenuId = "richmenu-10bc4d017796598b87cfee95413653e3" ;
                    break;
            }
        }

        $this->set_richmanu_language($provider_id , $richMenuId , $user_language);

    }

    public function set_richmanu_language($provider_id , $richMenuId , $user_language)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('CHANNEL_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CLIENT_SECRET')]);
        $response = $bot->linkRichMenu($provider_id, $richMenuId);

        $data = [
            "title" => "set_richmanu_" . $user_language,
            "content" => $provider_id,
        ];
        MyLog::create($data);
    }

    public function check_add_line($id_user)
    {
        $data_user = DB::table('users')
            ->where('id', $id_user)
            ->where('type', 'line')
            ->get();

        return $data_user;
    }

    public function update_add_line($id_user)
    {
        DB::table('users')
            ->where('id', $id_user)
            ->whereDate('created_at', '<=' , date('2022-08-30').' 00:00:00' )
            ->update([
                'add_line' => "Yes",
        ]);

        return "ok";
    }


    public function sos_helper($data_postback_explode , $provider_id , $event)
    {
        $data_data = explode("/",$data_postback_explode);

        $id_sos_map = $data_data[0] ;
        $id_organization_helper = $data_data[1] ;

        $data_sos_map = Sos_map::findOrFail($id_sos_map);

        if (!empty($data_sos_map->condo_id)) {
            $condo_id = $data_sos_map->condo_id ;
        }else{
            $condo_id = null ;
        }

        $data_partner_helpers = Partner::findOrFail($id_organization_helper);

        $users = DB::table('users')->where('provider_id', $provider_id)->get();

        // ตรวจสอบ "การช่วยเหลือเสร็จสิ้น" แล้วหรือยัง
        if ($data_sos_map->help_complete == "Yes") { // การช่วยเหลือเสร็จสิ้น

            // ส่งไลน์การช่วยเหลือนี้เสร็จสิ้นแล้ว
            $this->This_help_is_done($data_partner_helpers, $event, "This_help_is_done");

        }else{ // การช่วยเหลือ อยู่ระหว่างดำเนินการ

            // ตรวจสอบการเป็นสมาชิก ViiCHECK
            if ($users != '[]') { // เป็นสมาชิก ViiCHECK

                foreach ($users as $user) {
                    // ตรวจสอบสถานนะ role
                    if (!empty($user->role)) {
                        DB::table('users')
                            ->where('provider_id', $provider_id)
                            ->update([
                                'organization' => $data_partner_helpers->name,
                        ]);
                    }else{
                        DB::table('users')
                            ->where('provider_id', $provider_id)
                            ->update([
                                'organization' => $data_partner_helpers->name,
                                'role' => 'partner',
                        ]);
                    }

                    // ตรวจสอบรายชื่อคนช่วยเหลือ
                    if (!empty($data_sos_map->helper)) {

                        $explode_helper_id = explode(",",$data_sos_map->helper_id);
                        for ($i=0; $i < count($explode_helper_id); $i++) {

                            if ($explode_helper_id[$i] != $user->id) {
                                $helper_double = "No";
                            }else{
                                $helper_double = "Yes";
                                break;
                            }

                        }

                        if ($helper_double != "Yes") {
                            DB::table('sos_maps')
                                ->where('id', $id_sos_map)
                                ->update([
                                    'helper' => $data_sos_map->helper . ',' . $user->name,
                                    'helper_id' => $data_sos_map->helper_id . ',' . $user->id,
                                    'organization_helper' => $data_sos_map->organization_helper . ',' . $data_partner_helpers->name,
                            ]);

                            $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id) ;

                        }else{
                            // คุณได้ทำการกด "กำลังไปช่วยเหลือ" ซ้ำ
                            $this->This_help_is_done($data_partner_helpers, $event , "helper_click_double");
                        }

                    }else {
                        DB::table('sos_maps')
                            ->where('id', $id_sos_map)
                            ->update([
                                'helper' => $user->name,
                                'helper_id' => $user->id,
                                'organization_helper' => $data_partner_helpers->name,
                                'time_go_to_help' => date('Y-m-d\TH:i:s'),
                                'status' => 'กำลังไปช่วยเหลือ',
                        ]);

                        $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id);

                    }

                }

            }else{ // ไม่ได้เป็นสมาชิก ViiCHECK
                // return redirect('login/line');
                $this->_send_register_to_groupline($data_partner_helpers);
            }
        }

    }

    protected function _send_register_to_groupline($data_partner_helpers)
    {
        //กรุณาลงทะเบียนเพื่อเริ่มใช้งาน
        $data_line_group = DB::table('group_lines')
                ->where('groupName', $data_partner_helpers->line_group)
                ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $data_topic = [
                    "กรุณาลงทะเบียนเพื่อเริ่มใช้งาน",
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

        $template_path = storage_path('../public/json/register_line.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("กรุณาลงทะเบียนเพื่อเริ่มใช้งาน",$data_topic[0],$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $groupId,
            "messages" => $messages,
        ];

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
            "title" => "กรุณาลงทะเบียนเพื่อเริ่มใช้งาน",
            "content" => "กรุณาลงทะเบียนเพื่อเริ่มใช้งาน",
        ];
        MyLog::create($data);
    }

    protected function This_help_is_done($data_partner_helpers, $event , $type)
    {
        //การช่วยเหลือนี้เสร็จสิ้นแล้ว
        $data_line_group = DB::table('group_lines')
                ->where('groupName', $data_partner_helpers->line_group)
                ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        if ($type == "helper_click_double") {
            $data_topic = [
                    "ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",
                ];
        }elseif ($type == "no_helper") {
            $data_topic = [
                    "ขออภัยค่ะ คุณไม่ได้ทำการกดกำลังไปช่วยเหลือ",
                ];
        }else{
            $data_topic = [
                    "การช่วยเหลือนี้เสร็จสิ้นแล้ว",
                ];
        }


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

        $template_path = storage_path('../public/json/text_done.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",$data_topic[0],$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

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
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        // SAVE LOG
        $data = [
            "title" => "replyToken TO : " . $data_partner_helpers->line_group,
            "content" => $data_topic[0],
        ];
        MyLog::create($data);
    }

    protected function _send_helper_to_groupline($data_sos_map , $data_partner_helpers , $name_helper , $helper_id, $condo_id)
    {
        $data_line_group = DB::table('group_lines')
                    ->where('groupName', $data_partner_helpers->line_group)
                    ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        //user
        $data_users = DB::table('users')->where('id', $data_sos_map->user_id)->get();
        foreach ($data_users as $data_user) {

            if (!empty($data_user->photo)) {
                $photo_user = $data_user->photo ;
            }
            if (empty($data_user->photo)) {
                $photo_user = $data_user->avatar ;
            }
        }

        //helper
        $data_helpers = DB::table('users')->where('id', $helper_id)->get();
        foreach ($data_helpers as $data_helper) {

            if (!empty($data_helper->photo)) {
                $photo_helper = $data_helper->photo ;
            }
            if (empty($data_helper->photo)) {
                $photo_helper = $data_helper->avatar ;
            }
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        // datetime
        $time_zone_explode = explode(" ",$time_zone);

        $date = $time_zone_explode[0] ;
        $time = $time_zone_explode[1] ;
        $utc = $time_zone_explode[3] ;

        $data_topic = [
                    "การขอความช่วยเหลือ",
                    "เจ้าหน้าที่",
                    "ดำเนินการช่วยเหลือ",
                    "กำลังไปช่วยเหลือ",
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

        $template_path = storage_path('../public/json/helper_to_groupline.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);

        $string_json = str_replace("การขอความช่วยเหลือ",$data_topic[0],$string_json);
        $string_json = str_replace("เจ้าหน้าที่",$data_topic[1],$string_json);
        $string_json = str_replace("ดำเนินการช่วยเหลือ",$data_topic[2],$string_json);
        $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[3],$string_json);

        // // user
        $string_json = str_replace("name_user",$data_sos_map->name,$string_json);
        $string_json = str_replace("TEXT_PHOTO_USER",$photo_user,$string_json);
        // helper
        $string_json = str_replace("name_helper",$name_helper,$string_json);
        $string_json = str_replace("TEXT_PHOTO_HELPER", $photo_helper,$string_json);

        $string_json = str_replace("id_sos_map",$data_sos_map->id,$string_json);
        $string_json = str_replace("groupId",$groupId,$string_json);
        $string_json = str_replace("date",$date,$string_json);
        $string_json = str_replace("time",$time,$string_json);
        $string_json = str_replace("UTC", "UTC " . $utc,$string_json);


        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $groupId,
            "messages" => $messages,
        ];

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
            "title" => "send_helper_to_groupline",
            "content" => $name_helper . "กำลังไปช่วย" . $data_sos_map->name,
        ];
        MyLog::create($data);

        // ส่งไลน์หา user ที่ขอความช่วยเหลือ
        $this->_send_helper_to_user($helper_id , $data_sos_map->user_id , $data_partner_helpers->name , $condo_id , $data_sos_map->id);

    }

    protected function _send_helper_to_user($helper_id , $user_id , $name_partner_helpers , $condo_id , $sos_map_id)
    {
        if (!empty($condo_id)) {
            $data_condos = Partner_condo::where('id' , $condo_id)->first();
            $channel_access_token = $data_condos->channel_access_token ;
        }else{
            $channel_access_token = env('CHANNEL_ACCESS_TOKEN') ;
        }

        $data_partner = Partner::where('name' , $name_partner_helpers)->where('name_area' , null)->first();

        $users = DB::table('users')->where('id', $user_id)->get();
        $data_helpers = DB::table('users')->where('id', $helper_id)->get();

        foreach ($users as $user) {

            $user_language = $user->language ;

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($user->time_zone);

            // datetime
            $time_zone_explode = explode(" ",$time_zone);

            $date = $time_zone_explode[0] ;
            // $time = $time_zone_explode[1] ;
            $time = date("H:i") ;
            $utc = $time_zone_explode[3] ;

            $data_topic = [
                        "เรียนคุณ",
                        "เจ้าหน้าที่กำลังเดินทางไปหาคุณ",
                        "ข้อมูลเจ้าหน้าที่",
                        "เจ้าหน้าที่",
                        "จาก",
                        "ดูตำแหน่งเจ้าหน้าที่",
                    ];

            for ($xi=0; $xi < count($data_topic); $xi++) {

                $text_topic = DB::table('text_topics')
                        ->select($user_language)
                        ->where('th', $data_topic[$xi])
                        ->where('en', "!=", null)
                        ->get();

                foreach ($text_topic as $item_of_text_topic) {
                    $data_topic[$xi] = $item_of_text_topic->$user_language ;
                }
            }

            $template_path = storage_path('../public/json/helper_to_user.json');
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ตัวอย่าง",$data_topic[1],$string_json);
            $string_json = str_replace("date",$date,$string_json);
            $string_json = str_replace("time",$time,$string_json);
            $string_json = str_replace("UTC", "UTC " . $utc,$string_json);
            $string_json = str_replace("ข้อมูลเจ้าหน้าที่",$data_topic[2],$string_json);

            // user
            $string_json = str_replace("เรียนคุณ",$data_topic[0],$string_json);
            $string_json = str_replace("user_name",$user->name,$string_json);
            $string_json = str_replace("เจ้าหน้าที่กำลังเดินทางไปหาคุณ",$data_topic[1],$string_json);

            //helper
            foreach ($data_helpers as $data_helper) {

                if (!empty($data_helper->photo)) {
                    $photo_helper = "https://www.viicheck.com/storage/".$data_helper->photo ;
                }
                if (empty($data_helper->photo)) {
                    $photo_helper = $data_helper->avatar ;
                }

                $name_helper = $data_helper->name ;

            }

            $string_json = str_replace("เจ้าหน้าที่",$data_topic[3],$string_json);
            $string_json = str_replace("จาก",$data_topic[4],$string_json);
            $string_json = str_replace("name_helper",$name_helper,$string_json);
            $string_json = str_replace("https://scdn.line-apps.com/clip13.jpg",$photo_helper,$string_json);
            $string_json = str_replace("zzz",$name_partner_helpers,$string_json);
            $string_json = str_replace("id_sos_map",$sos_map_id,$string_json);

            // LOGO PARTNER
            $string_json = str_replace("LOGO_PARTNER",$data_partner->logo,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $user->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '. $channel_access_token,
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];

            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            // SAVE LOG
            $data = [
                "title" => "send_helper_to_user",
                "content" => $user->name . 'รอรับการช่วยเหลือจากเจ้าหน้าที่',
            ];
            MyLog::create($data);
        }

    }

    protected function help_complete($id_sos_map)
    {
        $data_sos_map = Sos_map::findOrFail($id_sos_map);

        if (!empty($data_sos_map->condo_id)) {
            $condo_id = $data_sos_map->condo_id ;
        }else{
            $condo_id = null ;
        }

        if (!empty($condo_id)) {
            $data_condos = Partner_condo::where('id' , $condo_id)->first();
            $channel_access_token = $data_condos->channel_access_token ;
        }else{
            $channel_access_token = env('CHANNEL_ACCESS_TOKEN') ;
        }

        $data_users = User::findOrFail($data_sos_map->user_id);
        $date_now = date('Y-m-d\TH:i:s');

        if ($data_sos_map->help_complete != 'Yes') {

            DB::table('sos_maps')
                ->where('id', $id_sos_map)
                ->update([
                    'help_complete' => 'Yes',
                    'help_complete_time' => $date_now,
            ]);

            $user_language = $data_users->language ;

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($data_users->time_zone);

            // datetime
            $time_zone_explode = explode(" ",$time_zone);

            $date = $time_zone_explode[0] ;
            $time = $time_zone_explode[1] ;
            $utc = $time_zone_explode[3] ;

            $data_topic = [
                        "บอกให้เรารู้",
                        "การช่วยเหลือเป็นอย่างไรบ้าง",
                        "พื้นที่",
                        "ให้คะแนน",
                    ];

            for ($xi=0; $xi < count($data_topic); $xi++) {

                $text_topic = DB::table('text_topics')
                        ->select($user_language)
                        ->where('th', $data_topic[$xi])
                        ->where('en', "!=", null)
                        ->get();

                foreach ($text_topic as $item_of_text_topic) {
                    $data_topic[$xi] = $item_of_text_topic->$user_language ;
                }
            }
            //logo organization helper
            $data_helpers = DB::table('partners')->where('name', $data_sos_map->organization_helper)
                ->where('name_area', "=", null)
                ->get();


             foreach ($data_helpers as $data_helper) {

                if (!empty($data_helper->logo)) {
                    $logo_organization = "https://www.viicheck.com/storage/".$data_helper->logo ;
                }
                if (empty($data_helper->logo)) {
                    $logo_organization = "https://www.viicheck.com/img/stickerline/PNG/1.png" ;
                }

            }

            $template_path = storage_path('../public/json/rate_help.json');
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ตัวอย่าง",$data_topic[3],$string_json);
            $string_json = str_replace("date",$date,$string_json);
            $string_json = str_replace("time",$time,$string_json);
            $string_json = str_replace("UTC", "UTC " . $utc,$string_json);
            $string_json = str_replace("area",$data_sos_map->organization_helper,$string_json);
            $string_json = str_replace("https://scdn.line-apps.com/clip13.jpg",$logo_organization,$string_json);
            $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);

            $string_json = str_replace("บอกให้เรารู้",$data_topic[0],$string_json);
            $string_json = str_replace("การช่วยเหลือเป็นอย่างไรบ้าง",$data_topic[1],$string_json);
            $string_json = str_replace("พื้นที่",$data_topic[2],$string_json);
            $string_json = str_replace("ให้คะแนน",$data_topic[3],$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $data_users->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '. $channel_access_token,
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];

            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            // SAVE LOG
            $data = [
                "title" => "แบบฟอร์มให้คะแนนการช่วยเหลือ",
                "content" => $data_users->name,
            ];
            MyLog::create($data);
        }

    }

    
    public function check_process_maintain($data_postback_explode , $provider_id , $event)
    {
        $data_data = explode("/",$data_postback_explode);

        $status_maintain = $data_data[0] ;
        $id_maintain = $data_data[1] ;

        // $id_sos_map = $data_data[0] ;
        // $id_organization_helper = $data_data[1] ;
        
        $data_maintain = Maintain_noti::where('maintain_notis.id' , $id_maintain)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->leftJoin('users', 'maintain_notis.user_id', '=', 'users.id')
        ->leftJoin('maintain_notified_users', 'maintain_notis.user_id', '=', 'maintain_notified_users.user_id')
        ->select('maintain_notified_users.name as maintain_user_name','users.email' , 'users.phone' ,'maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys' ,'maintain_categorys.line_group_id as maintain_group_line_id' ,'maintain_categorys.groupName as maintain_group_line_name')
        ->first();

        // dd(env('CHANNEL_ACCESS_TOKEN'));
        $group_line = Group_line::findOrFail($data_maintain->maintain_group_line_id);
        
        
        $template_path = storage_path('../public/json/helper_to_groupline.json');
        $string_json = file_get_contents($template_path);


        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_maintain->maintain_group_line_id,
            "messages" => $messages,
        ];

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

        // $data_partner_helpers = Partner::findOrFail($id_organization_helper);

        // $users = DB::table('users')->where('provider_id', $provider_id)->get();

        // // ตรวจสอบ "การช่วยเหลือเสร็จสิ้น" แล้วหรือยัง
        // if ($data_sos_map->help_complete == "Yes") { // การช่วยเหลือเสร็จสิ้น

        //     // ส่งไลน์การช่วยเหลือนี้เสร็จสิ้นแล้ว
        //     $this->This_help_is_done($data_partner_helpers, $event, "This_help_is_done");

        // }else{ // การช่วยเหลือ อยู่ระหว่างดำเนินการ

        //     // ตรวจสอบการเป็นสมาชิก ViiCHECK
        //     if ($users != '[]') { // เป็นสมาชิก ViiCHECK

        //         foreach ($users as $user) {
        //             // ตรวจสอบสถานนะ role
        //             if (!empty($user->role)) {
        //                 DB::table('users')
        //                     ->where('provider_id', $provider_id)
        //                     ->update([
        //                         'organization' => $data_partner_helpers->name,
        //                 ]);
        //             }else{
        //                 DB::table('users')
        //                     ->where('provider_id', $provider_id)
        //                     ->update([
        //                         'organization' => $data_partner_helpers->name,
        //                         'role' => 'partner',
        //                 ]);
        //             }

        //             // ตรวจสอบรายชื่อคนช่วยเหลือ
        //             if (!empty($data_sos_map->helper)) {

        //                 $explode_helper_id = explode(",",$data_sos_map->helper_id);
        //                 for ($i=0; $i < count($explode_helper_id); $i++) {

        //                     if ($explode_helper_id[$i] != $user->id) {
        //                         $helper_double = "No";
        //                     }else{
        //                         $helper_double = "Yes";
        //                         break;
        //                     }

        //                 }

        //                 if ($helper_double != "Yes") {
        //                     DB::table('sos_maps')
        //                         ->where('id', $id_sos_map)
        //                         ->update([
        //                             'helper' => $data_sos_map->helper . ',' . $user->name,
        //                             'helper_id' => $data_sos_map->helper_id . ',' . $user->id,
        //                             'organization_helper' => $data_sos_map->organization_helper . ',' . $data_partner_helpers->name,
        //                     ]);

        //                     $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id) ;

        //                 }else{
        //                     // คุณได้ทำการกด "กำลังไปช่วยเหลือ" ซ้ำ
        //                     $this->This_help_is_done($data_partner_helpers, $event , "helper_click_double");
        //                 }

        //             }else {
        //                 DB::table('sos_maps')
        //                     ->where('id', $id_sos_map)
        //                     ->update([
        //                         'helper' => $user->name,
        //                         'helper_id' => $user->id,
        //                         'organization_helper' => $data_partner_helpers->name,
        //                         'time_go_to_help' => date('Y-m-d\TH:i:s'),
        //                         'status' => 'กำลังไปช่วยเหลือ',
        //                 ]);

        //                 $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id);

        //             }

        //         }

        //     }else{ // ไม่ได้เป็นสมาชิก ViiCHECK
        //         // return redirect('login/line');
        //         $this->_send_register_to_groupline($data_partner_helpers);
        //     }
        // }

    }

    protected function _send_maintain_to_groupline($data_maintain)
    {
    //     $data_line_group = DB::table('group_lines')
    //                 ->where('groupName', $data_maintain->maintain_group_line_name)
    //                 ->get();

    //     foreach ($data_line_group as $key) {
    //         $groupId = $key->groupId ;
    //         $name_time_zone = $key->time_zone ;
    //         $group_language = $key->language ;
    //     }

    //     //user
    //     $data_users = DB::table('users')->where('id', $data_maintain->user_id)->get();
    //     foreach ($data_users as $data_user) {

    //         if (!empty($data_user->photo)) {
    //             $photo_user = $data_user->photo ;
    //         }
    //         if (empty($data_user->photo)) {
    //             $photo_user = $data_user->avatar ;
    //         }
    //     }

    //     $officerIds = json_decode($data_maintain->officer_id, true); // แปลง JSON เป็น array

    // $lastOfficerId = end($officerIds); // ดึงค่าตัวสุดท้ายออกมา
  
    //     //helper
    //     $data_helpers = DB::table('users')->where('id', $helper_id)->get();
    //     foreach ($data_helpers as $data_helper) {

    //         if (!empty($data_helper->photo)) {
    //             $photo_helper = $data_helper->photo ;
    //         }
    //         if (empty($data_helper->photo)) {
    //             $photo_helper = $data_helper->avatar ;
    //         }
    //     }

    //     // TIME ZONE
    //     $API_Time_zone = new API_Time_zone();
    //     $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

    //     // datetime
    //     $time_zone_explode = explode(" ",$time_zone);

    //     $date = $time_zone_explode[0] ;
    //     $time = $time_zone_explode[1] ;
    //     $utc = $time_zone_explode[3] ;

    //     $data_topic = [
    //                 "การขอความช่วยเหลือ",
    //                 "เจ้าหน้าที่",
    //                 "ดำเนินการช่วยเหลือ",
    //                 "กำลังไปช่วยเหลือ",
    //             ];

    //     for ($xi=0; $xi < count($data_topic); $xi++) {

    //         $text_topic = DB::table('text_topics')
    //                 ->select($group_language)
    //                 ->where('th', $data_topic[$xi])
    //                 ->where('en', "!=", null)
    //                 ->get();

    //         foreach ($text_topic as $item_of_text_topic) {
    //             $data_topic[$xi] = $item_of_text_topic->$group_language ;
    //         }
    //     }

    //     $template_path = storage_path('../public/json/helper_to_groupline.json');
    //     $string_json = file_get_contents($template_path);

    //     $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);

    //     $string_json = str_replace("การขอความช่วยเหลือ",$data_topic[0],$string_json);
    //     $string_json = str_replace("เจ้าหน้าที่",$data_topic[1],$string_json);
    //     $string_json = str_replace("ดำเนินการช่วยเหลือ",$data_topic[2],$string_json);
    //     $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[3],$string_json);

    //     // // user
    //     $string_json = str_replace("name_user",$data_sos_map->name,$string_json);
    //     $string_json = str_replace("TEXT_PHOTO_USER",$photo_user,$string_json);
    //     // helper
    //     $string_json = str_replace("name_helper",$name_helper,$string_json);
    //     $string_json = str_replace("TEXT_PHOTO_HELPER", $photo_helper,$string_json);

    //     $string_json = str_replace("id_sos_map",$data_sos_map->id,$string_json);
    //     $string_json = str_replace("groupId",$groupId,$string_json);
    //     $string_json = str_replace("date",$date,$string_json);
    //     $string_json = str_replace("time",$time,$string_json);
    //     $string_json = str_replace("UTC", "UTC " . $utc,$string_json);


    //     $messages = [ json_decode($string_json, true) ];

    //     $body = [
    //         "to" => $groupId,
    //         "messages" => $messages,
    //     ];

    //     $opts = [
    //         'http' =>[
    //             'method'  => 'POST',
    //             'header'  => "Content-Type: application/json \r\n".
    //                         'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
    //             'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
    //             //'timeout' => 60
    //         ]
    //     ];

    //     $context  = stream_context_create($opts);
    //     $url = "https://api.line.me/v2/bot/message/push";
    //     $result = file_get_contents($url, false, $context);

    //     // SAVE LOG
    //     $data = [
    //         "title" => "send_helper_to_groupline",
    //         "content" => $name_helper . "กำลังไปช่วย" . $data_sos_map->name,
    //     ];
    //     MyLog::create($data);

    //     // ส่งไลน์หา user ที่ขอความช่วยเหลือ
    //     $this->_send_helper_to_user($helper_id , $data_sos_map->user_id , $data_partner_helpers->name , $condo_id , $data_sos_map->id);

    }


    public function reply_success_groupline_by_command($event , $data_postback , $id_sos_map, $name_command , $name_helper){

        $data_sos_map = Sos_map::where("id" , $id_sos_map)->first();

        $data_line_group = DB::table('group_lines')
            ->where('groupId', $event['source']['groupId'])
            ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $date_sos = $data_sos_map->created_at->format('d/m/Y');
        $time_sos = $data_sos_map->created_at->format('g:i:sa');


        $data_time_help = $data_sos_map->time_go_to_help;
        $date_time_help = strtotime($data_time_help);

        $date_help = date('d/m/Y', $date_time_help);
        $time_help = date('g:i:sa', $date_time_help);

        // datetime success
        $time_zone_explode = explode(" ",$time_zone);

        $date_success = $time_zone_explode[0];
        $time_success = $time_zone_explode[1];

        $time_created = $data_sos_map->created_at;
        $time_help_complete = $data_sos_map->help_complete_time;

        if(!empty($time_help_complete)){
            $count_complete = $this->count_range_time($time_created , $time_help_complete);
        }else{
            $date_now = date('Y-m-d H:i:s');
            $count_complete = $this->count_range_time($time_created , $date_now);
            // $count_complete = "-";
        }

        $data_topic = [
                    "ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
                    "การช่วยเหลือเสร็จสิ้น",
                    "เพิ่มภาพถ่าย",
                    "ขอความช่วยเหลือ",
                    "กำลังไปช่วยเหลือ",
                    "ช่วยเหลือเสร็จสิ้น",
                    "ใช้เวลา",
                    "อัพเดทสถานะโดยศูนย์ควบคุม",
                    "ศูนย์ควบคุม",
                    "เจ้าหน้าที่",
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

        $template_path = storage_path('../public/json/sos_map_success_by_command.json');

        $string_json = file_get_contents($template_path);

        // sos
        $string_json = str_replace("name_sos",$data_sos_map->name,$string_json);
        $string_json = str_replace("date_sos",$date_sos,$string_json);
        $string_json = str_replace("time_sos",$time_sos,$string_json);

        // success
        $string_json = str_replace("date_success",$date_success,$string_json);
        $string_json = str_replace("time_success",$time_success,$string_json);

        $string_json = str_replace("count_complete",$count_complete,$string_json);
        $string_json = str_replace("date_time",$time_zone,$string_json);
        $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);
        $string_json = str_replace("groupId",$event['source']['groupId'],$string_json);

        $string_json = str_replace("name_command",$name_command,$string_json);
        $string_json = str_replace("name_helper",$name_helper,$string_json);

        $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
        $string_json = str_replace("ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",$data_topic[0],$string_json);
        $string_json = str_replace("การช่วยเหลือเสร็จสิ้น",$data_topic[1],$string_json);
        $string_json = str_replace("เพิ่มภาพถ่าย",$data_topic[2],$string_json);
        $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[3],$string_json);
        $string_json = str_replace("ช่วยเหลือเสร็จสิ้น",$data_topic[5],$string_json);
        $string_json = str_replace("ใช้เวลา",$data_topic[6],$string_json);

        $string_json = str_replace("อัพเดทสถานะโดยศูนย์ควบคุม",$data_topic[7],$string_json);
        $string_json = str_replace("ศูนย์ควบคุม",$data_topic[8],$string_json);
        $string_json = str_replace("เจ้าหน้าที่",$data_topic[9],$string_json);


        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $event['source']['groupId'],
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

        //SAVE LOG
        $data = [
            "title" => "ViiCHECK ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
            "content" => "reply Success",
        ];
        MyLog::create($data);

        return $result;

    }

    public function reply_success_groupline($event , $data_postback , $id_sos_map)
    {
        $data_sos_map = Sos_map::where("id" , $id_sos_map)->first();

        $data_line_group = DB::table('group_lines')
            ->where('groupId', $event['source']['groupId'])
            ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $date_sos = $data_sos_map->created_at->format('d/m/Y');
        $time_sos = $data_sos_map->created_at->format('g:i:sa');


        $data_time_help = $data_sos_map->time_go_to_help;
        $date_time_help = strtotime($data_time_help);

        $date_help = date('d/m/Y', $date_time_help);
        $time_help = date('g:i:sa', $date_time_help);


        // datetime success
        $time_zone_explode = explode(" ",$time_zone);

        $date_success = $time_zone_explode[0];
        $time_success = $time_zone_explode[1];

        $time_created = $data_sos_map->created_at;
        $time_help_complete = $data_sos_map->help_complete_time;
        $time_go_to_help = $data_sos_map->time_go_to_help;

        if(!empty($time_go_to_help)){
            $count_time_help = $this->count_range_time($time_created , $time_go_to_help);
            $count_success = $this->count_range_time($time_go_to_help , $time_help_complete);
            $count_complete = $this->count_range_time($time_created , $time_help_complete);
        }else{
            $count_time_help = "-";
            $count_success = "-";
            $count_complete = "-";
        }


        if ( empty($data_sos_map->help_complete) ) {

            $data_topic = [
                        "ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
                        "การช่วยเหลือเสร็จสิ้น",
                        "เพิ่มภาพถ่าย",
                        "ขอความช่วยเหลือ",
                        "กำลังไปช่วยเหลือ",
                        "ช่วยเหลือเสร็จสิ้น",
                        "ใช้เวลา",
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

            $template_path = storage_path('../public/json/sos_map_success.json');

            $string_json = file_get_contents($template_path);

            // sos
            $string_json = str_replace("name_sos",$data_sos_map->name,$string_json);
            $string_json = str_replace("date_sos",$date_sos,$string_json);
            $string_json = str_replace("time_sos",$time_sos,$string_json);

            //help
            $string_json = str_replace("name_help",$data_sos_map->helper,$string_json);
            $string_json = str_replace("date_help",$date_help,$string_json);
            $string_json = str_replace("time_help",$time_help,$string_json);
            $string_json = str_replace("count_help",$count_time_help,$string_json);

            // success
            $string_json = str_replace("date_success",$date_success,$string_json);
            $string_json = str_replace("time_success",$time_success,$string_json);
            $string_json = str_replace("count_success",$count_success,$string_json);

            $string_json = str_replace("count_complete",$count_complete,$string_json);
            $string_json = str_replace("date_time",$time_zone,$string_json);
            $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);
            $string_json = str_replace("groupId",$event['source']['groupId'],$string_json);

            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            $string_json = str_replace("ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",$data_topic[0],$string_json);
            $string_json = str_replace("การช่วยเหลือเสร็จสิ้น",$data_topic[1],$string_json);
            $string_json = str_replace("เพิ่มภาพถ่าย",$data_topic[2],$string_json);
            $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[3],$string_json);
            $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[4],$string_json);
            $string_json = str_replace("ช่วยเหลือเสร็จสิ้น",$data_topic[5],$string_json);
            $string_json = str_replace("ใช้เวลา",$data_topic[6],$string_json);


            $messages = [ json_decode($string_json, true) ];

            // --- ตัวเก่าที่ กดเสร็จสิ้น จากกลุ่มไลน์ ---
            // $body = [
            //     "replyToken" => $event["replyToken"],
            //     "messages" => $messages,
            // ];

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
            // //https://api-data.line.me/v2/bot/message/11914912908139/content
            // $url = "https://api.line.me/v2/bot/message/reply";
            // $result = file_get_contents($url, false, $context);

            // --- ตัวใหม่ กดเสร็จสิ้น จากหน้าเว็บ MAP --
            $body = [
                "to" => $event['source']['groupId'],
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

            //SAVE LOG
            $data = [
                "title" => "ViiCHECK ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
                "content" => "reply Success",
            ];
            MyLog::create($data);

            return $result;

        }else{

            $data_topic = [
                        "ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",
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

            $template_path = storage_path('../public/json/text_done.json');

            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            $string_json = str_replace("ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",$data_topic[0],$string_json);

            $messages = [ json_decode($string_json, true) ];

            // --- ตัวเก่าที่ กดเสร็จสิ้น จากกลุ่มไลน์ ---
            // $body = [
            //     "replyToken" => $event["replyToken"],
            //     "messages" => $messages,
            // ];

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
            // //https://api-data.line.me/v2/bot/message/11914912908139/content
            // $url = "https://api.line.me/v2/bot/message/reply";
            // $result = file_get_contents($url, false, $context);

            // --- ตัวใหม่ กดเสร็จสิ้น จากหน้าเว็บ MAP --
            $body = [
                "to" => $event['source']['groupId'],
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

            //SAVE LOG
            $data = [
                "title" => "ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",
                "content" => "reply Success",
            ];
            MyLog::create($data);

            return $result;

        }

    }

    // ตั้งค่าริชเมนูอันใหม่ทั้งระบบ
    public function set_new_richMenu()
    {
        $data_users = User::where('type', 'line')->get();

        foreach ($data_users as $key) {
            $user_language = $key->language ;
            $provider_id = $key->provider_id;

            if (empty($user_language)) {
                // DF ริชเมนู EN
                $richMenuId = "richmenu-995ba378f3ad783b679dab18b9cb981e" ;
            }else {
                switch ($user_language) {
                    case 'th':
                        $richMenuId = "richmenu-c63483a8288529796f82fd427e268ce9" ;
                        break;
                    case 'en':
                        $richMenuId = "richmenu-995ba378f3ad783b679dab18b9cb981e" ;
                        break;
                    case 'zh-TW':
                        $richMenuId = "richmenu-e1f05af2e8638eb19f2623de38b593da" ;
                        break;
                    case 'zh-CN':
                        $richMenuId = "richmenu-aaf26413c43367b03976559186172c16" ;
                        break;
                    case 'ja':
                        $richMenuId = "richmenu-cf1a83e9bea9ca538c0d0a2310e8367d" ;
                        break;
                    case 'ko':
                        $richMenuId = "richmenu-35897cceb9c47c971be8e7b4981121fd" ;
                        break;
                    case 'es':
                        $richMenuId = "richmenu-1f5ad16d70304187f9d9f054f17775a7" ;
                        break;
                    case 'lo':
                        $richMenuId = "richmenu-639d03ff46ab2d91290103c370fd9e72" ;
                        break;
                    case 'my':
                        $richMenuId = "richmenu-61599990dc30897b6f97df7311bd4b7c" ;
                        break;
                    case 'de':
                        $richMenuId = "richmenu-1c4a0b8bfa9536c78ec0c8c53ab7f64f" ;
                        break;
                    case 'hi':
                        $richMenuId = "richmenu-77d3a65621847add10087f92c53ddda1" ;
                        break;
                    case 'ar':
                        $richMenuId = "richmenu-62b66dcb604d2e11ed436c3dbdc022bb" ;
                        break;
                    case 'ru':
                        $richMenuId = "richmenu-4ce9f73d2875b143a686a3272a5eafce" ;
                        break;
                    case 'test':
                        $richMenuId = "richmenu-10bc4d017796598b87cfee95413653e3" ;
                        break;
                }
            }

            $this->set_richmanu_language($provider_id , $richMenuId , $user_language);

        }

        return "OK KUB" ;
    }

    public function count_range_time($time_start , $time_end)
    {
        // count time success
        $time_s = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%s');
        $time_i = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%i');
        $time_h = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%h');
        $time_d = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%d');
        $time_m = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%m');
        $time_y = \Carbon\Carbon::parse($time_end)->diff(\Carbon\Carbon::parse($time_start))->format('%y');

        if ( $time_s != 0 ) {
            $data = $time_s ." sec";
        }
        if( $time_i != 0){
            $data = $time_i ." min " .$data;
        }
        if( $time_h != 0){
            $data = $time_h ." hours " .$data;
        }
       if( $time_d != 0){
            $data = $time_d ." day " .$data;
        }
        if( $time_m != 0){
            $data = $time_m ." month " .$data;
        }
        if( $time_y != 0){
            $data = $time_y ." year " .$data;
        }
        return $data;
    }


    public function sos_helper_Charlie($id_sos , $id_user)
    {
        $user = DB::table('users')->where('id', $id_user)->first();

        $name_organization = $user->organization ;
        $provider_id = $user->provider_id ;

        $id_sos_map = $id_sos ;

        $data_sos_map = Sos_map::findOrFail($id_sos_map);

        if (!empty($data_sos_map->condo_id)) {
            $condo_id = $data_sos_map->condo_id ;
        }else{
            $condo_id = null ;
        }

        $data_partner_helpers = Partner::where('name' , $name_organization)->where('name_area' , '!=' , null)->first();


        // ตรวจสอบ "การช่วยเหลือเสร็จสิ้น" แล้วหรือยัง
        if ($data_sos_map->help_complete == "Yes") { // การช่วยเหลือเสร็จสิ้น

            // ส่งไลน์การช่วยเหลือนี้เสร็จสิ้นแล้ว
            return "ส่งไลน์การช่วยเหลือนี้เสร็จสิ้นแล้ว" ;

        }else{ // การช่วยเหลือ ยัง ไม่ เสร็จสิ้น

            // ตรวจสอบสถานนะ role
            if (!empty($user->role)) {
                DB::table('users')
                    ->where('provider_id', $provider_id)
                    ->update([
                        'organization' => $data_partner_helpers->name,
                ]);
            }else{
                DB::table('users')
                    ->where('provider_id', $provider_id)
                    ->update([
                        'organization' => $data_partner_helpers->name,
                        'role' => 'partner',
                ]);
            }

            // ตรวจสอบรายชื่อคนช่วยเหลือ
            if (!empty($data_sos_map->helper)) {

                $explode_helper_id = explode(",",$data_sos_map->helper_id);
                for ($i=0; $i < count($explode_helper_id); $i++) {

                    if ($explode_helper_id[$i] != $user->id) {
                        $helper_double = "No";
                    }else{
                        $helper_double = "Yes";
                        break;
                    }

                }

                if ($helper_double != "Yes") {
                    DB::table('sos_maps')
                        ->where('id', $id_sos_map)
                        ->update([
                            'helper' => $data_sos_map->helper . ',' . $user->name,
                            'helper_id' => $data_sos_map->helper_id . ',' . $user->id,
                            'organization_helper' => $data_sos_map->organization_helper . ',' . $data_partner_helpers->name,
                    ]);

                    $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id) ;

                }else{
                    // คุณได้ทำการกด "กำลังไปช่วยเหลือ" ซ้ำ
                    // $this->This_help_is_done($data_partner_helpers, $event , "helper_click_double");
                }

            }else {
                DB::table('sos_maps')
                    ->where('id', $id_sos_map)
                    ->update([
                        'helper' => $user->name,
                        'helper_id' => $user->id,
                        'organization_helper' => $data_partner_helpers->name,
                        'time_go_to_help' => date('Y-m-d\TH:i:s'),
                ]);

                $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id);

            }

            return "OK" ;
        }

    }

    public function Charlie_help_complete($id_sos , $id_user)
    {
        $this->reply_success_groupline_Charlie( $id_sos , $id_user );
        $this->help_complete($id_sos);
    }

    public function reply_success_groupline_Charlie( $id_sos , $id_user )
    {
        $id_sos_map = $id_sos ;
        $user = DB::table('users')->where('id', $id_user)->first();
        $name_organization = $user->organization ;
        $provider_id = $user->provider_id ;

        $data_sos_map = Sos_map::where("id" , $id_sos_map)->first();

        $data_partner_helpers = Partner::where('name' , $name_organization)->where('name_area' , '!=' , null)->first();

        $data_line_group = DB::table('group_lines')
            ->where('groupName', $data_partner_helpers->line_group)
            ->get();

        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $date_sos = $data_sos_map->created_at->format('d/m/Y');
        $time_sos = $data_sos_map->created_at->format('g:i:sa');

        $data_time_help = $data_sos_map->time_go_to_help;
        $date_time_help = strtotime($data_time_help);

        $date_help = date('d/m/Y', $date_time_help);
        $time_help = date('g:i:sa', $date_time_help);

        // datetime success
        $time_zone_explode = explode(" ",$time_zone);

        $date_success = $time_zone_explode[0];
        $time_success = $time_zone_explode[1];

        $time_created = $data_sos_map->created_at;
        $time_help_complete = $data_sos_map->help_complete_time;
        $time_go_to_help = $data_sos_map->time_go_to_help;

        if(!empty($time_go_to_help)){
            $count_time_help = $this->count_range_time($time_created , $time_go_to_help);
            $count_success = $this->count_range_time($time_go_to_help , $time_help_complete);
            $count_complete = $this->count_range_time($time_created , $time_help_complete);
        }else{
            $count_time_help = "-";
            $count_success = "-";
            $count_complete = "-";
        }

        $data_topic = [
                    "ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
                    "การช่วยเหลือเสร็จสิ้น",
                    "เพิ่มภาพถ่าย",
                    "ขอความช่วยเหลือ",
                    "กำลังไปช่วยเหลือ",
                    "ช่วยเหลือเสร็จสิ้น",
                    "ใช้เวลา",
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

        $template_path = storage_path('../public/json/sos_map_success.json');

        $string_json = file_get_contents($template_path);

        // sos
        $string_json = str_replace("name_sos",$data_sos_map->name,$string_json);
        $string_json = str_replace("date_sos",$date_sos,$string_json);
        $string_json = str_replace("time_sos",$time_sos,$string_json);

        //help
        $string_json = str_replace("name_help",$data_sos_map->helper,$string_json);
        $string_json = str_replace("date_help",$date_help,$string_json);
        $string_json = str_replace("time_help",$time_help,$string_json);
        $string_json = str_replace("count_help",$count_time_help,$string_json);

        // success
        $string_json = str_replace("date_success",$date_success,$string_json);
        $string_json = str_replace("time_success",$time_success,$string_json);
        $string_json = str_replace("count_success",$count_success,$string_json);

        $string_json = str_replace("count_complete",$count_complete,$string_json);
        $string_json = str_replace("date_time",$time_zone,$string_json);
        $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);

        $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
        $string_json = str_replace("ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",$data_topic[0],$string_json);
        $string_json = str_replace("การช่วยเหลือเสร็จสิ้น",$data_topic[1],$string_json);
        $string_json = str_replace("เพิ่มภาพถ่าย",$data_topic[2],$string_json);
        $string_json = str_replace("ขอความช่วยเหลือ",$data_topic[3],$string_json);
        $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[4],$string_json);
        $string_json = str_replace("ช่วยเหลือเสร็จสิ้น",$data_topic[5],$string_json);
        $string_json = str_replace("ใช้เวลา",$data_topic[6],$string_json);


        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $groupId,
            "messages" => $messages,
        ];

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

        //SAVE LOG
        $data = [
            "title" => "ViiCHECK ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
            "content" => "reply Success",
        ];
        MyLog::create($data);

        return "OK" ;
    }

    function sos_1669_confirm_or_refuse_case($data_postback, $event){

        // SOS_ID/go_to_help/_UNIT_ID_/_OFFICER_ID_
        // SOS_ID/refuse/_UNIT_ID_/_OFFICER_ID_
        $data_data = explode("/",$data_postback);

        $id_sos_1669 = $data_data[0] ;
        $answer = $data_data[1] ;
        $unit_id = $data_data[2] ;
        $officer_id = $data_data[3] ;

        $data_user = User::where('id',$officer_id)->first();
        $date_now = date("Y-m-d H:i:s");

        $data_sos = Sos_help_center::where('id' , $id_sos_1669)->first();

        $data_unit = Data_1669_operating_unit::where('id' , $unit_id)->first();
        // $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $id_sos_1669)->first();

        $data_officers = Data_1669_operating_officer::where('user_id', $officer_id)
                ->where('operating_unit_id',$data_unit->id)
                ->first();

        // --------------------------------------------------------------------------------------

        if( $data_sos->status == 'รอการยืนยัน' && $data_sos->wait == $officer_id ){

            if ($answer == 'go_to_help') {
                $template_path = storage_path('../public/json/flex-sos-1669/send_view_data_sos.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ตัวอย่าง","ยืนยันการดำเนินการ",$string_json);

                $date_ex = explode(" ",$data_sos->created_at);
                $time_ex = explode(":",$date_ex[1]);

                $show_code_officer = '';
                if( !empty($data_sos->code_for_officer) ){
                    $show_code_officer = $data_sos->code_for_officer;
                }
                else{
                    $show_code_officer = $data_sos->operating_code;
                }

                $string_json = str_replace("ID_SOS_HELP_CENTER",$show_code_officer,$string_json);
                $string_json = str_replace("DATE_SOS_HELP_CENTER",$date_ex[0],$string_json);
                $string_json = str_replace("TIME_SOS_HELP_CENTER",$time_ex[0].":".$time_ex[1],$string_json);

                $string_json = str_replace("NAME_OFFICER",$data_officers->name_officer,$string_json);

                // ข้อมูลผู้ขอความช่วยเหลือ
                if ( !empty($data_sos->name_user) ) {
                    $string_json = str_replace("NAME_USER_SOS",$data_sos->name_user,$string_json);
                }else{
                    $string_json = str_replace("NAME_USER_SOS","ไม่ได้ระบุ",$string_json);
                }

                if ( !empty($data_sos->phone_user) ) {
                    $string_json = str_replace("phone_user",$data_sos->phone_user,$string_json);
                }

                // ปุ่มดำเนินการ
                $string_json = str_replace("SOS_ID",$id_sos_1669,$string_json);
                $string_json = str_replace("_UNIT_ID_",$unit_id,$string_json);
            }else{
                $template_path = storage_path('../public/json/text_success.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ระบบได้รับการตอบกลับของท่านแล้ว ขอบคุณค่ะ","ปฏิเสธเรียบร้อยแล้ว",$string_json);
            }

            // UPDATE DATA SOS 1669
            if ($answer == "go_to_help") {
                // $data_create_form_color = [
                //     "sos_help_center_id" => $id_sos_1669,
                //     "sos_form_yellow_id" => $data_form_yellow->id,
                //     "location_sos" => $data_sos->location_sos,
                //     "symptom" => $data_sos->symptom,
                // ];

                // $form_color_name = null;
                // $form_color_id = null;
                // // ------------------------------------------------------------------
                // // สร้าง form สีต่างๆตามระดับ officer
                // if ($data_officers->level == 'ALS' or $data_officers->level == 'ILS') {
                //     # form_greens
                //     $data_form_green = Sos_1669_form_green::create($data_create_form_color);  
                
                //     $form_color_name = "green";
                //     $form_color_id = $data_form_green->id;
                // } elseif($data_officers->level == 'BLS') {
                //     $data_form_pink = Sos_1669_form_pink::create($data_create_form_color);  
                    
                //     $form_color_name = "pink";
                //     $form_color_id = $data_form_pink->id;
                // }else{
                //     // form_blues
                //     $data_form_blue = Sos_1669_form_blue::create($data_create_form_color);  
                
                //     $form_color_name = "blue";
                //     $form_color_id = $data_form_blue->id;
                    
                // }

                // ******** UPDATE ข้อมูลเจ้าหน้าที่ในตาราง sos_help_center *******
                DB::table('sos_help_centers')
                ->where([
                        ['id', $id_sos_1669],
                    ])
                ->update([
                        'status' => "ออกจากฐาน",
                        'organization_helper' => $data_unit->name,
                        'operating_unit_id' => $data_unit->id,
                        'name_helper' => $data_officers->name_officer,
                        'helper_id' => $data_user->id,
                        'time_go_to_help' => $date_now,
                        'wait' => null,
                        // 'form_color_name' => $form_color_name,
                        // 'form_color_id_user_1 ' => $form_color_id,      
                    ]);

                // UPDATE sos_1669_form_yellows
                DB::table('sos_1669_form_yellows')
                ->where([
                        ['sos_help_center_id', $id_sos_1669],
                    ])
                ->update([
                        'vehicle_type' => $data_officers->vehicle_type,
                        'operating_suit_type' => $data_officers->level,
                        'time_go_to_help' => $date_now,
                        'operation_unit_name' => $data_unit->name,
                        'action_set_name' => $data_officers->name_officer,
                    ]);

                // ------------------------------------------------------------------

                $sum_go_to_help = 0 ;
                $sum_go_to_help = (int)$data_officers->go_to_help + 1 ;

                // อัพเดทสถานะ ใน data_1669_operating_officers
                DB::table('data_1669_operating_officers')
                ->where([
                        ['user_id', $data_user->id],
                        ['operating_unit_id', $data_unit->id],
                    ])
                ->update([
                        'status' => "Helping",
                        'go_to_help' => $sum_go_to_help,
                    ]);

            }else if($answer == "refuse"){

                if (!empty($data_officers->refuse)) {
                    $officers_refuse = $data_officers->refuse . "," . $id_sos_1669 ;
                }else{
                    $officers_refuse = $id_sos_1669 ;
                }

                // อัพเดทสถานะ ใน data_1669_operating_officers
                DB::table('data_1669_operating_officers')
                ->where([
                        ['user_id', $data_user->id],
                        ['operating_unit_id', $data_unit->id],
                    ])
                ->update([
                        'refuse' => $officers_refuse,
                    ]);

                if (!empty($data_sos->refuse)) {
                    $update_refuse = $data_sos->refuse . "," . $data_user->id ;
                }else{
                    $update_refuse = $data_user->id ;
                }

                DB::table('sos_help_centers')
                    ->where([
                            ['id', $id_sos_1669],
                        ])
                    ->update([
                        'status' => "ปฏิเสธ",
                        'refuse' => $update_refuse,
                        'wait' => null,
                    ]);

            }

        }else{

            $template_path = storage_path('../public/json/text_success.json');
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ระบบได้รับการตอบกลับของท่านแล้ว ขอบคุณค่ะ","เคสนี้มีการดำเนินการแล้ว",$string_json);
        }

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

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
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        // SAVE LOG
        $data = [
            "title" => "เจ้าหน้าที่ : " . $unit_id . " >> " . $answer,
            "content" => "sos id = " . $id_sos_1669,
        ];
        MyLog::create($data);


    }

    // **created by Junior Dear**
    public function bind_groupLine_ViiFix()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $base64 = $data['url'];
        $groupId = $data['groupId'];
        $sos_partner_name = $data['sos_partner_name'];
        $sos_partner_id = $data['sos_partner_id'];
        // สร้างชื่อไฟล์
        // $img = storage_path("app/public")."/1669" . "/" . 'qr_code_register_groupline_' . $groupId . '.png';

        // // แปลง base64 เป็นรูปภาพ
        // $base64 = str_replace('data:image/png;base64,', '', $base64);
        // $base64 = str_replace(' ', '+', $base64);
        // file_put_contents($img, base64_decode($base64));

        if ( !empty($groupId) ){
            // ส่งไลน์ให้ลงทะเบียน

            $template_path = storage_path('../public/json/flex-repair/flex-fix_new/flex_line_register_group.json');
            $string_json = file_get_contents($template_path);

            // $string_json = str_replace("https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",$img,$string_json);

            $img_qr_code = "https://www.viicheck.com/img/qr_reg_officer" . "/" . "qr_code_" . $sos_partner_id . ".png";
            $string_json = str_replace("https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",$img_qr_code,$string_json);

            $string_json = str_replace("ชื่อองค์กร",$sos_partner_name,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $groupId,
                "messages" => $messages,
            ];

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
            $data_save_log = [
                "title" => "send flex register_groupLine",
                "content" => "to >> " . $groupId,
            ];
            MyLog::create($data_save_log);

        }


    }

}


