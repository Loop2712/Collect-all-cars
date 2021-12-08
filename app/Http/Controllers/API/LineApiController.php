<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Models\LineMessagingAPI;
use App\Models\Group_line;

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
                $line->reply_success($event);
                break;
             case "thx" : 
                $line->_pushguestLine(null, $event, "thx");
                $line->reply_success($event);
                break;
            case "การตอบกลับ" : 
                $line->select_reply(null, $event, "reply");
                break;
            case "sos_helper" : 
                //SAVE LOG
                $data2 = [
                    "title" => "sos_helper",
                    "content" => $data_postback_explode,
                ];
                MyLog::create($data2);
                $line->sos_helper($data_postback_explode);
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
                case "language" :  
                    $line->replyToUser(null, $event, "language");
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
                $richMenuId_start = "richmenu-8ba442ac4a4eabdebaad19b9b05d3107" ;
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
                    $richMenuId = "richmenu-1cc742d1060a55b416efd8c0f5405355" ;
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
            ->get();

        return $data_user;
    }

}
