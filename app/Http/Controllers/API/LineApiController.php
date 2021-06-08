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

        $data_postback_export = (explode("?",$event["postback"]["data"]));
    	$data_postback = $data_postback_export[0] ;

        switch($data_postback){
            case "wait" : 
                $line->_pushguestLine(null, $event, "wait");
                break;
             case "thx" : 
                $line->_pushguestLine(null, $event, "thx");
                break;
            case "ส่งข้อความตอบกลับ" : 
                $line->_pushguestLine(null, $event, "reply");
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



}
