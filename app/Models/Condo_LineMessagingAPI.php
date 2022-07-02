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
use App\Models\Group_line;
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

    public function send_HelloLinegroup($event,$save_name_group)
    {

        $data_condo = Partner_condo::where('id' , $save_name_group['condo_id'])->first();
        $photo_condo = $data_condo->partner->logo ;
        $name_condo = $data_condo->name ;

        $template_path = storage_path('../public/json/hello_group_line_condo.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","สวัสดีค่ะ",$string_json);
        $string_json = str_replace("VA_photo_condo",$photo_condo,$string_json);
        $string_json = str_replace("GROUP",$save_name_group['groupName'],$string_json);
        $string_json = str_replace("VA_name_condo",$name_condo,$string_json);
        $string_json = str_replace("VA_condo_id",$save_name_group['condo_id'],$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "replyToken" => $event["replyToken"],
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
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "HELLO LINE GROUP CONDO",
            "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            "condo_id" => $save_name_group['condo_id'],
        ];

        Mylog_condo::create($data);

    }

    public function send_TO_notify_repair($data_condos,$data_notify_repair)
    {
        $data_line_group = DB::table('group_lines')
            ->where('condo_id', $data_condos->id)
            ->where('system', "notify_repair")
            ->first();

        $photo_condo = $data_condos->partner->logo ;
        $data_groupline = Group_line::where('system','notify_repair')->where('condo_id',$data_condos->id)->first();

        $template_path = storage_path('../public/json/send_TO_notify_repair.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","การแจ้งซ่อมบำรุง",$string_json);
        $string_json = str_replace("VA_photo_condo",$photo_condo,$string_json);
        $string_json = str_replace("หัวเรื่อง",$data_notify_repair->title,$string_json);
        $string_json = str_replace("หมวดหมู่",$data_notify_repair->category,$string_json);
        $string_json = str_replace("photo_notify_repair.png",$data_notify_repair->photo,$string_json);
        // $string_json = str_replace("content",$data_notify_repair->content,$string_json);
        // $string_json = str_replace("datetime",$data_notify_repair->appointment_date . "เวลา" . $data_notify_repair->appointment_time . ":00",$string_json);

        // if (!empty($data_notify_repair->user_condo_id)) {
        //     $name_user_condo = "อาคาร " . $data_notify_repair->user_condo->building . " ห้อง " . $data_notify_repair->user_condo->room_number ;
        //     $string_json = str_replace("name_user",$name_user_condo,$string_json);
        // }else{
        //     $string_json = str_replace("name_user","นิติ",$string_json);
        // }

        // $string_json = str_replace("VA_notify_repair",$data_notify_repair->id,$string_json);

        $messages = [ json_decode($string_json, true) ];


        $body = [
            "to" => $data_line_group->groupId,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '. $data_condos->channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "send_TO_notify_repair",
            "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            "condo_id" => $data_condos->id,
        ];

        Mylog_condo::create($data);

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
