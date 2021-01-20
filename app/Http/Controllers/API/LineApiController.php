<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Mylog;

class LineApiController extends Controller
{
    public function store(Request $request)
	{
		echo "Hello";

		$strAccessToken = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
 
		$content = file_get_contents('php://input');
		$arrJson = json_decode($content, true);
		 
		$strUrl = "https://api.line.me/v2/bot/message/reply";
		 
		$arrHeader = array();
		$arrHeader[] = "Content-Type: application/json";
		$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
		 
		if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
		  $arrPostData = array();
		  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		  $arrPostData['messages'][0]['type'] = "text";
		  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
		}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
		  $arrPostData = array();
		  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		  $arrPostData['messages'][0]['type'] = "text";
		  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
		}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
		  $arrPostData = array();
		  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		  $arrPostData['messages'][0]['type'] = "text";
		  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
		}else{
		  $arrPostData = array();
		  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		  $arrPostData['messages'][0]['type'] = "text";
		  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
		}
		 
		 
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
}
