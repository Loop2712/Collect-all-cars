<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineMessagingAPI //extends Model
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

        // Make a POST Request to Messaging API to reply to sender
        $url = 'https://api.line.me/v2/bot/message/reply';
        $data = [
            'replyToken' => $event["replyToken"],
            'messages' => $messages
        ];
        $post = json_encode($data);
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $channel_access_token);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result . "";

        // $body = [
        //     "replyToken" => $event["replyToken"],
        //     "messages" => $messages,
        // ];

        // $opts = [
        //     'http' =>[
        //         'method'  => 'POST',
        //         'header'  => "Content-Type: application/json \r\n".
        //                     'Authorization: Bearer '.$this->channel_access_token,
        //         'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
        //         //'timeout' => 60
        //     ]
        // ];
                            
        // $context  = stream_context_create($opts);
        // //https://api-data.line.me/v2/bot/message/11914912908139/content
        // $url = "https://api.line.me/v2/bot/message/reply";
        // $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "https://api.line.me/v2/bot/message/reply",
            "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data);
        return $result;

    }



}
