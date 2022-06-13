<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog_condo;
use App\Models\Condo_LineMessagingAPI;
use App\Models\Group_line;
use App\Models\Sos_map;
use App\Models\Partner;
use App\User;

class Condo_LineApiController extends Controller
{
    public function store(Request $request)
	{
        //SAVE LOG
        $requestData = $request->all();

        // หาว่าเป็นข้อความที่ส่งมาจากไลน์ไหน
        // $From_LINE = $requestData["events"]["message"]["text"];
        return "OK" ;

        // $data = [
        //     "title" => "ข้อความเข้าจากไลน์",
        //     "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        // ];
        // Mylog_condo::create($data);  

        //GET ONLY FIRST EVENT
        // $event = $requestData["events"][0];

        // switch($event["type"]){
        //     case "message" : 
        //         $this->messageHandler($event);
        //         break;
        //     case "postback" : 
        //         $this->postbackHandler($event);
        //         break;
        //     case "join" :
        //         $this->save_group_line($event);
        //         break;
        //     case "follow" :
        //         $this->user_follow_line($event);
        //         // DB::table('users')
        //         //     ->where([ 
        //         //             ['type', 'line'],
        //         //             ['provider_id', $event['source']['userId']],
        //         //             ['status', "active"] 
        //         //         ])
        //         //     ->update(['add_line' => 'Yes']);
        //         break;
        // }
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
        $line_condo = new Condo_LineMessagingAPI();
    	
        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "Chinese" : 
                $line_condo->replyToUser(null, $event, "Chinese");
                break;
        }   

    }

    public function textHandler($event)
    {
        $line_condo = new Condo_LineMessagingAPI();

        switch( $event["message"]["text"] )
        {     
            case "อื่นๆ" :  
                $line_condo->replyToUser(null, $event, "other");
                break;
            // case "ข่าวสาร" :  
            //     $line_condo->replyToUser(null, $event, "vnews");
            //     break;
        }   

        // if ($event["message"]["text"] == "ติดต่อ ViiCHECK") {
        //     $line_condo->replyToUser(null, $event, "contact_viiCHECK");
        // }else {

        //     $data_users = DB::table('users')
        //         ->where('provider_id', $event["source"]['userId'])
        //         ->where('status', "active")
        //         ->get();

        //     foreach ($data_users as $data_user) {
        //         if (!empty($data_user->language)) {
        //             $user_language = $data_user->language ;
        //             if ($user_language == "zh-TW") {
        //                 $user_language = "zh_TW";
        //             }
        //             if ($user_language == "zh-CN") {
        //                 $user_language = "zh_CN";
        //             }
        //         }else{
        //             $user_language = 'en' ;
        //         }
        //     }
            
        //     $text_topic = DB::table('text_topics')
        //         ->select('th')
        //         ->where($user_language, $event["message"]["text"])
        //         ->get();

        //     foreach ($text_topic as $item) {
        //         $text_th = $item->th ;
        //     }
        
        //     switch( strtolower($text_th) )
        //     {     
        //         case "อื่นๆ" :  
        //             $line_condo->replyToUser(null, $event, "other");
        //             break;
        //         case "ข่าวสาร" :  
        //             $line_condo->replyToUser(null, $event, "vnews");
        //             break;
        //     }   
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
        Mylog_condo::create($data);

        $line_condo = new Condo_LineMessagingAPI();
        $line_condo->send_HelloLinegroup($event,$save_name_group);

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
        Mylog_condo::create($data);

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
        Mylog_condo::create($data);

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
        Mylog_condo::create($data);
    }

    public function check_add_line($id_user)
    {
        $data_user = DB::table('users')
            ->where('id', $id_user)
            ->get();

        return $data_user;
    }

}
