<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog_fb;

class facebook_messenger_api extends Controller
{
    public function facebook(Request $request)
	{
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "facebook_messenger_api",
            "content" => 'hello',
        ];
        Mylog_fb::create($data);  
        

        $verify_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
        $access_token = env('PAGE_ACCESS_TOKEN');

        $hub_verify_token = null;
        if(isset($_REQUEST['hub_challenge'])) {
         $challenge = $_REQUEST['hub_challenge'];
         $hub_verify_token = $_REQUEST['hub_verify_token'];
        }
        if ($hub_verify_token === $verify_token) {
         echo $challenge;
        }


        // $input = json_decode(file_get_contents('php://input'), true);

        // $sender = $input['entry'][0]['messaging'][0]['sender']['id'];
        // $message = $input['entry'][0]['messaging'][0]['message']['text'];
        // $message_to_reply = 'Hello' . $sender;
        /**
         * Some Basic rules to validate incoming messages
         */

        // //API Url
        // $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
        // //Initiate cURL.
        // $ch = curl_init($url);
        // //The JSON data.
        // $jsonData = '{
        //     "recipient":{
        //         "id":"'.$sender.'"
        //     },
        //     "message":{
        //         "text":"'.$message_to_reply.'"
        //     }
        // }';
        // //Encode the array into JSON.
        // $jsonDataEncoded = $jsonData;
        // //Tell cURL that we want to send a POST request.
        // curl_setopt($ch, CURLOPT_POST, 1);
        // //Attach our encoded JSON string to the POST fields.
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        // //Set the content type to application/json
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        // //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        // //Execute the request
        // if(!empty($input['entry'][0]['messaging'][0]['message'])){
        //     $result = curl_exec($ch);
        // }

	}

    public function whatsapp(Request $request)
    {
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "facebook_messenger_api",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        ];
        Mylog_fb::create($data);  
        
        $verify_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
        $access_token = env('PAGE_ACCESS_TOKEN');

        $hub_verify_token = null;
        if(isset($_REQUEST['hub_challenge'])) {
         $challenge = $_REQUEST['hub_challenge'];
         $hub_verify_token = $_REQUEST['hub_verify_token'];
        }
        if ($hub_verify_token === $verify_token) {
         echo $challenge;
        }

    }

	

}


