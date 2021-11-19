<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog_fb;

class facebook_messenger_api extends Controller
{
    public function store(Request $request)
	{
        // //SAVE LOG
        // $requestData = $request->all();
        // $data = [
        //     "title" => "facebook_messenger_api",
        //     "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        // ];
        // Mylog_fb::create($data);  

        // $access_token = env('PAGE_ACCESS_TOKEN');
        $verify_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');

	}

	

}


