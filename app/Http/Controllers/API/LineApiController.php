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
                $this->messageHandler($event);
                break;
            case "postback" : 
                $this->postbackHandler($event);
                break;
            case "join" :
                $this->save_group_line($event);
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

	public function messageHandler($event)
    {
        switch($event["message"]["type"]){
            case "text" : 
                $this->textHandler($event);
                break;
        }   

    }

    public function postbackHandler($event)
    {
        $line = new LineMessagingAPI();
    	
        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "wait" : 
                $line->_pushguestLine(null, $event, "wait");
                $line->reply_success($event , $data_postback);
                break;
            case "thx" : 
                $line->_pushguestLine(null, $event, "thx");
                $line->reply_success($event , $data_postback);
                break;
            case "การตอบกลับ" : 
                $line->select_reply(null, $event, "reply");
                break;
            case "help_complete" : 
                $this->reply_success_groupline($event , $data_postback, $data_postback_explode[1]);
                $this->help_complete($data_postback_explode[1]);
                break;
            case "sos" : 
                $this->sos_helper($data_postback_explode[1] , $event["source"]["userId"]);
                break;
            case "Chinese" : 
                $line->replyToUser(null, $event, "Chinese");
                break;
        }   

    }

    public function textHandler($event)
    {
        $line = new LineMessagingAPI();

        if ($event["message"]["text"] == "ติดต่อ ViiCHECK") {
            $line->replyToUser(null, $event, "contact_viiCHECK");
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
                case "ข่าวสาร" :  
                    $line->replyToUser(null, $event, "vnews");
                    break;
                // case "vmarket" :  
                //     $line->replyToUser(null, $event, "vmarket");
                //     break;
                case "ข้อมูลของคุณ" :  
                    $line->replyToUser(null, $event, "profile");
                    break;
                case "รถยนต์" : 
                    $line->replyToUser(null, $event, "mycar");
                    break;
                case "จักรยานยนต์" : 
                    $line->replyToUser(null, $event, "mymotorcycles");
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
                case "language" :  
                    $line->replyToUser(null, $event, "language");
                    break;
                // บอทตอบกลับ
                case "วีเช็คอยู่ไหม" :  
                    $line->replyToUser(null, $event, "วีเช็คอยู่ไหม");
                    break;
            }   
        }
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
            $richMenuId = "richmenu-abf409dee26385d885a3fee64572bca5" ;
        }else {
            switch ($user_language) {
                case 'th':
                    $richMenuId = "richmenu-454c598f6cc2cfa01d9e61dd08c90f1a" ;
                    break;
                case 'en':
                    $richMenuId = "richmenu-abf409dee26385d885a3fee64572bca5" ;
                    break;
                case 'zh-TW':
                    $richMenuId = "richmenu-9fdda8ede31d57ed115ba17ee8d805de" ;
                    break;
                case 'zh-CN':
                    $richMenuId = "richmenu-883e4734ad7a448fea5decc2453c48c5" ;
                    break;
                case 'ja':
                    $richMenuId = "richmenu-790398060879ccc8d5e35ddc085f1536" ;
                    break;
                case 'ko':
                    $richMenuId = "richmenu-4fadb1df378f383eb469cc33947cc3e8" ;
                    break;
                case 'es':
                    $richMenuId = "richmenu-bdba6cee86b6931d6995e2f4f7f2d9ad" ;
                    break;
                case 'lo':
                    $richMenuId = "richmenu-45e735e7e3b6e3a778fb38352ba3c39f" ;
                    break;
                case 'my':
                    $richMenuId = "richmenu-f6b56b3e09870e5f047cc70a3b65ed3e" ;
                    break;
                case 'de':
                    $richMenuId = "richmenu-df18eecf91b93c5e78d4e9aee5e7f299" ;
                    break;
                case 'hi':
                    $richMenuId = "richmenu-c08eb065d01402a4534ca25f82fc9b16" ;
                    break;
                case 'ar':
                    $richMenuId = "richmenu-905e46e96a4548be41d3108af77701c8" ;
                    break;
                case 'ru':
                    $richMenuId = "richmenu-bba8c83af254e2ad6ab1e4bd8739caee" ;
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


    public function sos_helper($data_postback_explode , $provider_id)
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
        
        if ($users != '[]') {
            foreach ($users as $user) {
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
                        //
                    }

                }else {
                    DB::table('sos_maps')
                        ->where('id', $id_sos_map)
                        ->update([
                            'helper' => $user->name,
                            'helper_id' => $user->id,
                            'organization_helper' => $data_partner_helpers->name,
                    ]);

                    $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name , $user->id , $condo_id);
                    
                }
            }
        }else{
            // return redirect('login/line');
            $this->_send_register_to_groupline($data_partner_helpers);
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

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $data_topic = [
                    "การขอความช่วยเหลือ",
                    "เจ้าหน้าที่",
                    "การช่วยเหลือเสร็จสิ้น",
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
        $string_json = str_replace("date_time",$time_zone,$string_json);

        $string_json = str_replace("การขอความช่วยเหลือ",$data_topic[0],$string_json);
        $string_json = str_replace("เจ้าหน้าที่",$data_topic[1],$string_json);
        $string_json = str_replace("การช่วยเหลือเสร็จสิ้น",$data_topic[2],$string_json);
        $string_json = str_replace("กำลังไปช่วยเหลือ",$data_topic[3],$string_json);

        $string_json = str_replace("name_user",$data_sos_map->name,$string_json);
        $string_json = str_replace("name_helper",$name_helper,$string_json);
        $string_json = str_replace("id_sos_map",$data_sos_map->id,$string_json);

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
        $this->_send_helper_to_user($helper_id , $data_sos_map->user_id , $data_partner_helpers->name , $condo_id);

    }

    protected function _send_helper_to_user($helper_id , $user_id , $name_partner_helpers , $condo_id)
    {
        if (!empty($condo_id)) {
            $data_condos = Partner_condo::where('id' , $condo_id)->first();
            $channel_access_token = $data_condos->channel_access_token ;
        }else{
            $channel_access_token = env('CHANNEL_ACCESS_TOKEN') ;
        }

        $users = DB::table('users')->where('id', $user_id)->get();
        $data_helpers = DB::table('users')->where('id', $helper_id)->get();

        foreach ($users as $user) {

            $user_language = $user->language ;

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($user->time_zone);

            $data_topic = [
                        "เรียนคุณ",
                        "เจ้าหน้าที่กำลังเดินทางไปหาคุณ",
                        "ข้อมูลเจ้าหน้าที่",
                        "เจ้าหน้าที่",
                        "จาก",
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
            $string_json = str_replace("date_time",$time_zone,$string_json);
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

            $template_path = storage_path('../public/json/rate_help.json');
            $string_json = file_get_contents($template_path);
               
            $string_json = str_replace("ตัวอย่าง",$data_topic[3],$string_json);
            $string_json = str_replace("date_time",$time_zone,$string_json);
            $string_json = str_replace("area",$data_sos_map->organization_helper,$string_json);
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


        if ( empty($data_sos_map->help_complete) ) {

            $data_topic = [
                        "ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
                        "การขอความช่วยเหลือ",
                        "เพิ่มภาพถ่าย",
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

            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);

            $string_json = str_replace("ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",$data_topic[0],$string_json);
            $string_json = str_replace("การขอความช่วยเหลือ",$data_topic[1],$string_json);
            $string_json = str_replace("เพิ่มภาพถ่าย",$data_topic[2],$string_json);

            $string_json = str_replace("name_user",$data_sos_map->name,$string_json);
            $string_json = str_replace("date_time",$time_zone,$string_json);

            $string_json = str_replace("id_sos_map",$id_sos_map,$string_json);

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

            //SAVE LOG
            $data = [
                "title" => "ขออภัยค่ะมีการดำเนินการแล้ว ขอบคุณค่ะ",
                "content" => "reply Success",
            ];
            MyLog::create($data);

            return $result;

        }

    }

}
