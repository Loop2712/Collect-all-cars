<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog_condo;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailToGuest;
use App\Http\Controllers\API\API_Time_zone;
use App\Models\Text_topic;
use App\User;
use App\Models\User_condo;
use App\Models\Partner_condo;

class Condo_LineMessagingAPI extends Model
{
    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    public function replyToUser($event , $condo_id, $message_type)
    {   
        $data_condos = Partner_condo::where('id' , $condo_id)->first();
        $channel_access_token = $data_condos->channel_access_token;

        $provider_id = $event["source"]['userId'];
        $user = User::where('provider_id', $provider_id)->first();

    	switch($message_type)
        {   
            case 'hello':
                $template_path = storage_path('../public/json/test_hello.json'); 
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
            break;
        }

        // ----------------------------- ส่งข้อความ -------------------------------
        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '. $channel_access_token,
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
            "title" => "reply TO >> " . $user->name . "(" . $user->id . ")" ,
            "content" => "reply Success",
            "condo_id" => $condo_id,
        ];
        Mylog_condo::create($data);
        return $result;

    }

    public function _push_parcel_To_Line($requestData)
    {
        // เวลาปัจจุบัน
        $datetime =  date("d-m-Y  h:i:sa");

        $data_user = User_condo::where('id' , $requestData['user_condo_id'])->first();
        $data_condo = Partner_condo::where('id' , $requestData['condo_id'])->first();

        // echo "_push_parcel_To_Line";
        // echo "<br>";
        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        // $data_Text_topic = [
        //     "รอคำ",
        // ];

        // $data_topic = $this->language_for_user($data_Text_topic, $to_user);

        // // TIME ZONE LINE
        // $API_Time_zone = new API_Time_zone();
        // $time_zone = $API_Time_zone->change_Time_zone($item->time_zone);

        $template_path = storage_path('../public/json/flex_parcel_to_user.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","เรียนคุณลูกบ้าน..",$string_json);
        $string_json = str_replace("<photo>",$requestData['photo'],$string_json);
        $string_json = str_replace("<building>",$data_user->building,$string_json);
        $string_json = str_replace("<room_number>",$data_user->room_number,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_user->user->provider_id,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '. $data_condo->channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "_push_parcel_To_Line >> " . $data_user->user->name . "(" . $data_user->user->id . ")" ,
            "content" => "push Success",
            "condo_id" => $requestData['condo_id'],
        ];
        Mylog_condo::create($data);

        return $result ;
    }


    public function language_for_user($data_topic, $to_user)
    {
        $data_users = DB::table('users')
                    ->where('provider_id', $to_user)
                    ->where('status', "active")
                    ->get();

        foreach ($data_users as $data_user) {
            if (!empty($data_user->language)) {
                    $user_language = $data_user->language ;
                    if ($user_language == "zh-TW") {
                        $user_language = "zh_TW";
                    }
                    if ($user_language == "zh-CN") {
                        $user_language = "zh_CN";
                    }
                }else{
                    $user_language = 'en' ;
                }
        }

        for ($i=0; $i < count($data_topic); $i++) { 

            $text_topic = DB::table('text_topics')
                    ->select($user_language)
                    ->where('th', $data_topic[$i])
                    ->where('en', "!=", null)
                    ->get();

            foreach ($text_topic as $item_of_text_topic) {
                $data_topic[$i] = $item_of_text_topic->$user_language ;
            }
        }

        return $data_topic ;

    }


}
