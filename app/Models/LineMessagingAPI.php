<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

class LineMessagingAPI extends Model
{
    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    public function replyToUser($data, $event, $message_type)
    {
    	switch($message_type)
        {
        	case "contact": 
                $template_path = storage_path('../public/json/flex-contact.json');   
                $string_json = file_get_contents($template_path);
                $messages = [ json_decode($string_json, true) ]; 
                break;
        }

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.$this->channel_access_token,
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
            "title" => "reply Success",
            "content" => "reply Success",
        ];
        MyLog::create($data);
        return $result;

    }

    public function _pushguestLine($data, $event, $postback_data)
    {

    	switch($postback_data)
        {
        	case "wait": 
        		// UserId เจ้าของรถ
		    	$provider_id = $event["source"]['userId'];
		    	$data = [
		            "title" => "_pushguestLine",
		            "content" => $provider_id,
		        ];
		        MyLog::create($data);
		    	// UserId คนเรียก
				$reply = DB::select("SELECT * FROM register_cars WHERE provider_id = '$userId' ");

				foreach($reply as $item){
					$to_user = $item->reply_provider_id;
                	$messages = "รอสักครู่ / Wait a moment"; 

                	$strAccessToken = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
     
	                $strUrl = "https://api.line.me/v2/bot/message/push";
	                 
	                $arrHeader = array();
	                $arrHeader[] = "Content-Type: application/json";
	                $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
	                 
	                $arrPostData = array();
	                $arrPostData['to'] = $to_user;
                
	                $arrPostData['messages'][0]['type'] = "text";
	        		$arrPostData['messages'][0]['text'] = "$messages";

	        		$ch = curl_init();
	                curl_setopt($ch, CURLOPT_URL,$strUrl);
	                curl_setopt($ch, CURLOPT_HEADER, false);
	                curl_setopt($ch, CURLOPT_POST, true);
	                curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
	                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
	                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	                $result = curl_exec($ch);
	                curl_close ($ch);

	        	}
                break;

        }
        
        

    }



}
