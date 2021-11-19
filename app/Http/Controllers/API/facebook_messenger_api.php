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
        echo "Hello facebook_messenger_api" ;
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "facebook_messenger_api",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        ];
        Mylog_fb::create($data);  

	}

	

}
