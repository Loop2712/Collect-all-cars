<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Models\LineMessagingAPI;

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
    	
        switch($event["postback"]["data"]){
            case "wait" : 
                $line->_pushguestLine(null, $event, "wait");
                break;
             case "thx" : 
                $line->_pushguestLine(null, $event, "thx");
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
            case "รถของฉัน" : 
                $line->replyToUser(null, $event, "mycar");
                break;
            case "ใบอนุญาตขับรถ" : 
                $line->replyToUser(null, $event, "driver_license");
                break;
            case "ส่งข้อความตอบกลับ" : 
                $line->replyToUser(null, $event, "reply");
                break;
            case "ติดต่อ / contact" :  
                $line->replyToUser(null, $event, "contact");
                break;
            case "sos" :  
                $line->replyToUser(null, $event, "sos");
                break;
            
            
        }   
    }



}
