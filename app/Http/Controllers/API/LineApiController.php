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
        }   

    }

    public function textHandler($event)
    {
        $data_users = DB::table('users')
                ->where('provider_id', $event["source"]['userId'])
                ->where('status', "active")
                ->get();

        foreach ($data_users as $data_user) {
            $user_language = $data_user->language ;
        }
        
        $text_topic = DB::table('text_topics')
                ->select('th')
                ->where($user_language, $event["message"]["text"])
                ->get();

        foreach ($text_topic as $item) {
            $text_th = $item->th ;
        }
        
        
        $line = new LineMessagingAPI();

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

        $data_users = DB::table('users')
                ->where('provider_id', $provider_id)
                ->where('status', "active")
                ->get();

        if (!empty($data_users[0])) {
            // เช็คภาษาของ User
            $this->check_language_user($data_users);
        }else {
            // ตั้งค่าริชเมนูเริ่มต้น
            $this->set_richmanu_start($provider_id);
        }

    }

    public function set_richmanu_start($provider_id)
    {
        $richMenuId_start = "richmenu-ec43e96f5f12d586fa478fb8a5b88202" ;

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
            // ริชเมนู EN
            $richMenuId = "richmenu-c97702fad335082aad0b8a069d4a8e8f" ;
        }else {
            switch ($user_language) {
                case 'th':
                    $richMenuId = "richmenu-c97702fad335082aad0b8a069d4a8e8f" ;
                    break;
                case 'en':
                    $richMenuId = "richmenu-9194867623e5cf6233a7d894fc3f6b1a" ;
                    break;
                case 'zh-TW':
                    $richMenuId = "zh-TW" ;
                    break;
                case 'ja':
                    $richMenuId = "ja" ;
                    break;
                case 'ko':
                    $richMenuId = "ko" ;
                    break;
                case 'es':
                    $richMenuId = "es" ;
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

}
