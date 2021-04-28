<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
    	// here we can verify the webhook.
    	// i create a method for that.
    	$this->verifyAccess();
    	
    }

    public function facebook_callback_guest()
    {

        $response = [
            'recipient' => ['id' => "3586484888104628"],
            'message' => ['text' => "HELLO !!"]
        ];

        $this->sendMessage($response);
    }

    protected function sendMessage($response)
    {
    	// set our post
    	$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token=' . env('PAGE_ACCESS_TOKEN'));
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    	curl_exec($ch);
    	curl_close($ch);
    }

    protected function verifyAccess()
    {
    	// FACEBOOK_MESSENGER_WEBHOOK_TOKEN is not exist yet.
    	// we can set that up in our .env file
    	$local_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
    	$hub_verify_token = request('hub_verify_token');

    	// condition if our local token is equal to hub_verify_token
    	if ($hub_verify_token === $local_token) {
    		// echo the hub_challenge in able to verify.
    		echo request('hub_challenge');
    		exit;
    	}
    }
}
