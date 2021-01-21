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

    public function textHandler($event)
    {
        
        $line = new LineMessagingAPI();

        switch( strtolower($event["message"]["text"]) )
        {     
            case "ติดต่อ" :            
                $line->replyToUser(null, $event, "contact");
                break;
            
            
        }   
    }



}
