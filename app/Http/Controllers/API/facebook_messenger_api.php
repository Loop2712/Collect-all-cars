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
        return "OK" ;
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "facebook",
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
            // echo $challenge;
            return $challenge ;
        }

	}

    public function whatsapp(Request $request)
    {

        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "whatsapp",
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
            // echo $challenge;

            return $challenge ;
        }

    }

	

}


