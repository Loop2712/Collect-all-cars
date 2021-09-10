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
            case "ส่งข้อความตอบกลับ" : 
                $line->select_reply(null, $event, "reply");
                break;
        }   

    }

    public function textHandler($event)
    {
        
        $line = new LineMessagingAPI();

        switch( strtolower($event["message"]["text"]) )
        {     
            case "อื่นๆ" :  
                $line->replyToUser(null, $event, "other");
                break;
            case "ข่าวสาร" :  
                $line->replyToUser(null, $event, "vnews");
                break;
            case "vmarket" :  
                $line->replyToUser(null, $event, "vmarket");
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
            case "ใบอนุญาตขับรถ" : 
                $line->replyToUser(null, $event, "driver_license");
                break;
            case "ติดต่อ / contact" :  
                $line->replyToUser(null, $event, "contact");
                break;
            case "sos" :  
                $line->replyToUser(null, $event, "sos");
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
        ];
        
        Group_line::firstOrCreate($save_name_group);

        $data = [
            "title" => "บันทึก Name Group Line",
            "content" => $data_group_line->groupName,
        ];
        MyLog::create($data);

        // $this->hello_line_group($save_name_group, $event);

        $template_path = storage_path('../public/json/hello_group_line.json');   

        $string_json = file_get_contents($template_path);
        $messages = [ json_decode($string_json, true) ];


        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

        $opts_group = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context_group  = stream_context_create($opts_group);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url_group = "https://api.line.me/v2/bot/message/reply";
        $result_group = file_get_contents($url_group, false, $context_group);

        //SAVE LOG
        $data_group = [
            "title" => "ระบบได้รับการตอบกลับของท่านแล้ว ขอบคุณค่ะ",
            "content" => "reply Success",
        ];
        MyLog::create($data_group);

          

    }

    public function hello_line_group($data, $event)
    {
        $template_path = storage_path('../public/json/hello_group_line.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","สวัสดีค่ะ",$string_json);
        $string_json = str_replace("GROUP",$data['groupName'],$string_json);

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
            "title" => "Hello Line Group",
            "content" => "Hello Line Group",
        ];

        MyLog::create($data);
        return $result;

    }


}
