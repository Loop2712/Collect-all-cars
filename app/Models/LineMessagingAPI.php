<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailToGuest;

class LineMessagingAPI extends Model
{
    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    public function reply_success($event)
    {
        $template_path = storage_path('../public/json/text_success.json');   

        $string_json = file_get_contents($template_path);
        $messages = [ json_decode($string_json, true) ];


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
            "title" => "ระบบได้รับการตอบกลับของท่านแล้ว ขอบคุณค่ะ",
            "content" => "reply Success",
        ];
        MyLog::create($data);
        return $result;

    }
    public function select_reply($data, $event, $postback_data)
    {
        // ป้ายทะเบียนรถที่ถูกเรียก
        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $license_plate = explode("/",$data_postback_explode[1]);  ;
        $registration_number = $license_plate[0];
        $province = $license_plate[1];

        $template_path = storage_path('../public/json/flex-reply-option.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("7ยษ2944",$registration_number,$string_json);
        $string_json = str_replace("กรุงเทพ",$province,$string_json);

        $messages = [ json_decode($string_json, true) ];


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

    public function replyToUser($data, $event, $message_type)
    {
    	switch($message_type)
        {
        	case "other": 
                $template_path = storage_path('../public/json/flex-other_new.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "sos": 
                $template_path = storage_path('../public/json/flex-sos.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "contact": 
                $template_path = storage_path('../public/json/flex-contact.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "vmarket": 
                $template_path = storage_path('../public/json/flex-vmarket.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "vnews": 
                $template_path = storage_path('../public/json/flex-vnews.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "profile": 

                $provider_id = $event["source"]['userId'];

                $user = DB::select("SELECT * FROM users WHERE provider_id = '$provider_id'");

                foreach($user as $item){

                    $template_path = storage_path('../public/json/flex-profile.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip13.jpg",$item->avatar,$string_json);
                    $string_json = str_replace("E Benze",$item->name,$string_json);
                    $string_json = str_replace("benze@gmail.com",$item->email,$string_json);
                    // เบอร์โทร
                    if (!empty($item->phone)) {
                        $string_json = str_replace("0999999999",$item->phone,$string_json);
                    }else{
                        $string_json = str_replace("0999999999","กรุณาเพิ่มเบอร์โทรศัพท์",$string_json);
                    }
                    // วันเกิด
                    if (!empty($item->brith)) {
                        $string_json = str_replace("31/08/1998",$item->brith,$string_json);
                    }else{
                        $string_json = str_replace("31/08/1998","กรุณาเพิ่มวันเกิด",$string_json);
                    }
                    // เพศ
                    if (!empty($item->sex)) {
                        $string_json = str_replace("ชาย",$item->sex,$string_json);
                    }else{
                        $string_json = str_replace("ชาย","กรุณาระบุเพศ",$string_json);
                    }
                    // ranking
                    if (!empty($item->ranking)) {
                        switch ($item->ranking) {
                            case 'Gold':
                                $string_json = str_replace("1212312121","gold",$string_json);
                                break;
                            case 'Silver':
                                $string_json = str_replace("1212312121","silver",$string_json);
                                break;
                            case 'Bronze':
                                $string_json = str_replace("1212312121","bronze",$string_json);
                                break;
                        }
                    }
                    
                    $string_json = str_replace("xxxxx",$item->id,$string_json);

                    // // พรบ

                    // // เวลาปัจจุบัน
                    // $date_now = date("Y-m-d "); 
                    // // วันหมดอายุ พรบ
                    // $dtae_act = $item->act; 
                    // // ตัวแปรสำหรับเช็คการแจ้งเตือน
                    // $alert = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                    // if ($alert <= 30 && $alert >= 1) {
                    //     $string_json = str_replace("tick","warning",$string_json);
                    // }
                    // if ($alert <= 0){
                    //     $string_json = str_replace("tick","wrong",$string_json);
                    // }

                    // ข้อความสุดท้ายที่จะส่ง
                    $messages = [ json_decode($string_json, true) ]; 

                }

                break;
            case "mycar": 

                $provider_id = $event["source"]['userId'];

                $car_row = DB::select("SELECT * FROM register_cars WHERE provider_id = '$provider_id' AND active = 'Yes' AND car_type = 'car' ");

                $randomCar = DB::table('register_cars')
                    ->where('provider_id' , $provider_id)
                    ->where('car_type' , "car")
                    ->where('active' , "Yes")
                    ->limit(3)
                    ->get();

                for ($i=0; $i < count($randomCar);) { 
                    foreach($randomCar as $item ){
                        $id[$i] = $item->id;
                        $brand[$i] = $item->brand;
                        $registration_number[$i] = $item->registration_number;
                        $act[$i] = $item->act;
                        $insurance[$i] = $item->insurance;

                        $i++;
                    }
                }
                
                switch(count($car_row))
                {
                    case "1": 
                        $template_path = storage_path('../public/json/flex-mycar-1.json');   
                        $string_json = file_get_contents($template_path);

                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);
                        $string_json = str_replace("act1",$id[0],$string_json);
                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 
                        // วันหมดอายุ พรบ
                        $dtae_act = $act[0]; 
                        // วันหมดอายุ ประกัน
                        $dtae_insurance = $insurance[0]; 
                        // ตัวแปรสำหรับเช็คการแจ้งเตือน
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }


                        break;

                    case "2": 
                        $template_path = storage_path('../public/json/flex-mycar-2.json');   
                        $string_json = file_get_contents($template_path);
                        // คันที่1
                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);
                        $string_json = str_replace("act1",$id[0],$string_json);

                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 
                        // วันหมดอายุ พรบ คันที่ 1
                        $dtae_act = $act[0];
                        // วันหมดอายุ พรบ คันที่ 2
                        $dtae_act2 = $act[1]; 
                        // วันหมดอายุ ประกัน คันที่ 1
                        $dtae_insurance = $insurance[0]; 
                        // วันหมดอายุ ประกัน คันที่ 2
                        $dtae_insurance2 = $insurance[1]; 

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 1
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 2
                        $act2 = (strtotime($dtae_act2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act2 == null){
                            $string_json = str_replace("พรบ2","edit",$string_json);
                        }
                        if ($act2 <= 30 && $act2 >= 1) {
                            $string_json = str_replace("พรบ2","warning",$string_json);
                        }
                        if ($act2 <= 0){
                            $string_json = str_replace("พรบ2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ2","tick",$string_json);
                        }

                        $insurance2 = (strtotime($dtae_insurance2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance2 == null){
                            $string_json = str_replace("ประกัน2","edit",$string_json);
                        }
                        if ($insurance2 <= 30 && $insurance2 >= 1) {
                            $string_json = str_replace("ประกัน2","warning",$string_json);
                        }
                        if ($insurance2 <= 0){
                            $string_json = str_replace("ประกัน2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน2","tick",$string_json);
                        }

                        // คันที่2
                        $string_json = str_replace("แบนด์2", strtolower($brand[1]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน2",$registration_number[1],$string_json);
                        $string_json = str_replace("act2",$id[1],$string_json);
                        

                        break;

                    default: 
                        $template_path = storage_path('../public/json/flex-mycar-3.json');   
                        $string_json = file_get_contents($template_path);
                        // คันที่1
                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);
                        $string_json = str_replace("act1",$id[0],$string_json);

                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 

                        // วันหมดอายุ พรบ คันที่ 1
                        $dtae_act = $act[0];
                        // วันหมดอายุ พรบ คันที่ 2
                        $dtae_act2 = $act[1]; 
                        // วันหมดอายุ พรบ คันที่ 3
                        $dtae_act3 = $act[2];

                        // วันหมดอายุ ประกัน คันที่ 1
                        $dtae_insurance = $insurance[0]; 
                        // วันหมดอายุ ประกัน คันที่ 2
                        $dtae_insurance2 = $insurance[1]; 
                        // วันหมดอายุ ประกัน คันที่ 3
                        $dtae_insurance3 = $insurance[2];

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 1
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 2
                        $act2 = (strtotime($dtae_act2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act2 == null){
                            $string_json = str_replace("พรบ2","edit",$string_json);
                        }
                        if ($act2 <= 30 && $act2 >= 1) {
                            $string_json = str_replace("พรบ2","warning",$string_json);
                        }
                        if ($act2 <= 0){
                            $string_json = str_replace("พรบ2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ2","tick",$string_json);
                        }

                        $insurance2 = (strtotime($dtae_insurance2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance2 == null){
                            $string_json = str_replace("ประกัน2","edit",$string_json);
                        }
                        if ($insurance2 <= 30 && $insurance2 >= 1) {
                            $string_json = str_replace("ประกัน2","warning",$string_json);
                        }
                        if ($insurance2 <= 0){
                            $string_json = str_replace("ประกัน2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน2","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 3
                        $act3 = (strtotime($dtae_act3) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act3 == null){
                            $string_json = str_replace("พรบ3","edit",$string_json);
                        }
                        if ($act3 <= 30 && $act3 >= 1) {
                            $string_json = str_replace("พรบ3","warning",$string_json);
                        }
                        if ($act3 <= 0){
                            $string_json = str_replace("พรบ3","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ3","tick",$string_json);
                        }

                        $insurance3 = (strtotime($dtae_insurance3) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance3 == null){
                            $string_json = str_replace("ประกัน3","edit",$string_json);
                        }
                        if ($insurance3 <= 30 && $insurance3 >= 1) {
                            $string_json = str_replace("ประกัน3","warning",$string_json);
                        }
                        if ($insurance3 <= 0){
                            $string_json = str_replace("ประกัน3","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน3","tick",$string_json);
                        }

                        // คันที่2
                        $string_json = str_replace("แบนด์2", strtolower($brand[1]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน2",$registration_number[1],$string_json);
                        $string_json = str_replace("act2",$id[1],$string_json);

                        // คันที่3
                        $string_json = str_replace("แบนด์3", strtolower($brand[2]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน3",$registration_number[2],$string_json);
                        $string_json = str_replace("act3",$id[2],$string_json);
                        
                        break;

                }
                // ข้อความสุดท้ายที่จะส่ง
                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "mymotorcycles": 

                $provider_id = $event["source"]['userId'];

                $car_row = DB::select("SELECT * FROM register_cars WHERE provider_id = '$provider_id' AND active = 'Yes' AND car_type = 'motorcycle' ");

                $randomCar = DB::table('register_cars')
                    ->where('provider_id' , $provider_id)
                    ->where('car_type' , "motorcycle")
                    ->where('active' , "Yes")
                    ->limit(3)
                    ->get();

                for ($i=0; $i < count($randomCar);) { 
                    foreach($randomCar as $item ){
                        $id[$i] = $item->id;
                        $brand[$i] = $item->brand;
                        $registration_number[$i] = $item->registration_number;
                        $act[$i] = $item->act;
                        $insurance[$i] = $item->insurance;

                        $i++;
                    }
                }
                
                switch(count($car_row))
                {
                    case "1": 
                        $template_path = storage_path('../public/json/flex-mycar-1.json');   
                        $string_json = file_get_contents($template_path);

                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("act1",$id[0],$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);
                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 
                        // วันหมดอายุ พรบ
                        $dtae_act = $act[0]; 
                        // วันหมดอายุ ประกัน
                        $dtae_insurance = $insurance[0]; 
                        // ตัวแปรสำหรับเช็คการแจ้งเตือน
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }


                        break;

                    case "2": 
                        $template_path = storage_path('../public/json/flex-mycar-2.json');   
                        $string_json = file_get_contents($template_path);
                        // คันที่1
                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);

                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 
                        // วันหมดอายุ พรบ คันที่ 1
                        $dtae_act = $act[0];
                        // วันหมดอายุ พรบ คันที่ 2
                        $dtae_act2 = $act[1]; 
                        // วันหมดอายุ ประกัน คันที่ 1
                        $dtae_insurance = $insurance[0]; 
                        // วันหมดอายุ ประกัน คันที่ 2
                        $dtae_insurance2 = $insurance[1]; 

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 1
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 2
                        $act2 = (strtotime($dtae_act2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act2 == null){
                            $string_json = str_replace("พรบ2","edit",$string_json);
                        }
                        if ($act2 <= 30 && $act2 >= 1) {
                            $string_json = str_replace("พรบ2","warning",$string_json);
                        }
                        if ($act2 <= 0){
                            $string_json = str_replace("พรบ2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ2","tick",$string_json);
                        }

                        $insurance2 = (strtotime($dtae_insurance2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance2 == null){
                            $string_json = str_replace("ประกัน2","edit",$string_json);
                        }
                        if ($insurance2 <= 30 && $insurance2 >= 1) {
                            $string_json = str_replace("ประกัน2","warning",$string_json);
                        }
                        if ($insurance2 <= 0){
                            $string_json = str_replace("ประกัน2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน2","tick",$string_json);
                        }

                        // คันที่2
                        $string_json = str_replace("แบนด์2", strtolower($brand[1]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน2",$registration_number[1],$string_json);
                        

                        break;

                    default: 
                        $template_path = storage_path('../public/json/flex-mycar-3.json');   
                        $string_json = file_get_contents($template_path);
                        // คันที่1
                        $string_json = str_replace("แบนด์1", strtolower($brand[0]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน1",$registration_number[0],$string_json);

                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 

                        // วันหมดอายุ พรบ คันที่ 1
                        $dtae_act = $act[0];
                        // วันหมดอายุ พรบ คันที่ 2
                        $dtae_act2 = $act[1]; 
                        // วันหมดอายุ พรบ คันที่ 3
                        $dtae_act3 = $act[2];

                        // วันหมดอายุ ประกัน คันที่ 1
                        $dtae_insurance = $insurance[0]; 
                        // วันหมดอายุ ประกัน คันที่ 2
                        $dtae_insurance2 = $insurance[1]; 
                        // วันหมดอายุ ประกัน คันที่ 3
                        $dtae_insurance3 = $insurance[2];

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 1
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act == null){
                            $string_json = str_replace("พรบ1","edit",$string_json);
                        }
                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance == null){
                            $string_json = str_replace("ประกัน1","edit",$string_json);
                        }
                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 2
                        $act2 = (strtotime($dtae_act2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act2 == null){
                            $string_json = str_replace("พรบ2","edit",$string_json);
                        }
                        if ($act2 <= 30 && $act2 >= 1) {
                            $string_json = str_replace("พรบ2","warning",$string_json);
                        }
                        if ($act2 <= 0){
                            $string_json = str_replace("พรบ2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ2","tick",$string_json);
                        }

                        $insurance2 = (strtotime($dtae_insurance2) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance2 == null){
                            $string_json = str_replace("ประกัน2","edit",$string_json);
                        }
                        if ($insurance2 <= 30 && $insurance2 >= 1) {
                            $string_json = str_replace("ประกัน2","warning",$string_json);
                        }
                        if ($insurance2 <= 0){
                            $string_json = str_replace("ประกัน2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน2","tick",$string_json);
                        }

                        // ตัวแปรสำหรับเช็คการแจ้งเตือน คันที่ 3
                        $act3 = (strtotime($dtae_act3) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_act3 == null){
                            $string_json = str_replace("พรบ3","edit",$string_json);
                        }
                        if ($act3 <= 30 && $act3 >= 1) {
                            $string_json = str_replace("พรบ3","warning",$string_json);
                        }
                        if ($act3 <= 0){
                            $string_json = str_replace("พรบ3","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ3","tick",$string_json);
                        }

                        $insurance3 = (strtotime($dtae_insurance3) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($dtae_insurance3 == null){
                            $string_json = str_replace("ประกัน3","edit",$string_json);
                        }
                        if ($insurance3 <= 30 && $insurance3 >= 1) {
                            $string_json = str_replace("ประกัน3","warning",$string_json);
                        }
                        if ($insurance3 <= 0){
                            $string_json = str_replace("ประกัน3","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน3","tick",$string_json);
                        }

                        // คันที่2
                        $string_json = str_replace("แบนด์2", strtolower($brand[1]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน2",$registration_number[1],$string_json);

                        // คันที่3
                        $string_json = str_replace("แบนด์3", strtolower($brand[2]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน3",$registration_number[2],$string_json);
                        
                        break;

                }
                // ข้อความสุดท้ายที่จะส่ง
                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "driver_license":

                $provider_id = $event["source"]['userId'];

                $user = DB::select("SELECT * FROM users WHERE provider_id = '$provider_id'");

                foreach($user as $item){
                    if ( !empty($item->driver_license) && !empty($item->driver_license2) ) {
                        $template_path = storage_path('../public/json/flex-driver_license.json');   
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("ccaarr",$item->driver_license,$string_json);
                        $string_json = str_replace("mmotorcycle",$item->driver_license2,$string_json);
                    }
                    if ( !empty($item->driver_license) && empty($item->driver_license2) ) {
                        $template_path = storage_path('../public/json/flex-driver_car_license.json');   
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("ccaarr",$item->driver_license,$string_json);
                    }
                    if ( empty($item->driver_license) && !empty($item->driver_license2) ) {
                        $template_path = storage_path('../public/json/flex-driver_moto_license.json');   
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("mmotorcycle",$item->driver_license2,$string_json);
                    }
                    if ( empty($item->driver_license) && empty($item->driver_license2) ) {
                        $template_path = storage_path('../public/json/flex-driver_not_license.json');
                        $string_json = file_get_contents($template_path);
                    }
                }

                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "promotion": 
                $template_path = storage_path('../public/json/flex-promotion.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "promotion_car": 

                $template_path = storage_path('../public/json/flex-promotion_car.json');   
                $string_json = file_get_contents($template_path);

                $randomPromotion = DB::table('promotions')
                    ->where('type', "car")
                    ->inRandomOrder()
                    ->limit(6)
                    ->get();

                for ($i=1; $i < count($randomPromotion);) { 
                    foreach($randomPromotion as $item ){
                        $company[$i] = $item->company;
                        $titel[$i] = $item->titel;
                        $time_period[$i] = $item->time_period;
                        $link[$i] = $item->link;
                        $photo[$i] = $item->photo;

                        $i++;
                    }
                }
                

                $string_json = str_replace("https://www.viicheck.com/img1",$photo[1],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link1",$link[1],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img2",$photo[2],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link2",$link[2],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img3",$photo[3],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link3",$link[3],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img4",$photo[4],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link4",$link[4],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img5",$photo[5],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link5",$link[5],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img6",$photo[6],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link6",$link[6],$string_json);

                $string_json = str_replace("carpromotion","car",$string_json);

                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "promotion_motorcycle": 

                $template_path = storage_path('../public/json/flex-promotion_car.json');   
                $string_json = file_get_contents($template_path);

                $randomPromotion = DB::table('promotions')
                    ->where('type', "motorcycle")
                    ->inRandomOrder()
                    ->limit(6)
                    ->get();

                for ($i=1; $i < count($randomPromotion);) { 
                    foreach($randomPromotion as $item ){
                        $company[$i] = $item->company;
                        $titel[$i] = $item->titel;
                        $time_period[$i] = $item->time_period;
                        $link[$i] = $item->link;
                        $photo[$i] = $item->photo;

                        $i++;
                    }
                }
                

                $string_json = str_replace("https://www.viicheck.com/img1",$photo[1],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link1",$link[1],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img2",$photo[2],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link2",$link[2],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img3",$photo[3],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link3",$link[3],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img4",$photo[4],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link4",$link[4],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img5",$photo[5],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link5",$link[5],$string_json);

                $string_json = str_replace("https://www.viicheck.com/img6",$photo[6],$string_json);
                $string_json = str_replace("https://www.viicheck.com/link6",$link[6],$string_json);
                
                $string_json = str_replace("carpromotion","motorcycle",$string_json);

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
        // เวลาปัจจุบัน
        $datetime =  date("d-m-Y  h:i:sa");

        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $license_plate = explode("/",$data_postback_explode[1]);  ;
        $registration_number = $license_plate[0];
        $province = $license_plate[1];

        $google_registration_number = $license_plate[0] ;
        $google_province = $license_plate[1] ;

    	// UserId เจ้าของรถ
    	$provider_id = $event["source"]['userId'];
    	
    	// UserId คนเรียก
    	$reply = DB::table('register_cars')
	            ->select('reply_provider_id','registration_number','province')
                ->where([
                        ['registration_number', $registration_number],
                        ['province', $province],
                        ['now', "Yes"],
                    ])
	            ->get();

        // type login
        foreach($reply as $item){
            
            $type_login = DB::table('users')
                        ->select('type' , 'email' , 'name')
                        ->where('provider_id', $item->reply_provider_id)
                        ->get();

            $to_user = $item->reply_provider_id;
        }

        foreach($type_login as $item){
            switch ($item->type) {
                case 'line':
                    switch($postback_data){
                        case "wait": 
                            $template_path = storage_path('../public/json/callback_guest.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า..",$string_json);
                            $string_json = str_replace("9กก9999",$registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพมหานคร",$province,$string_json);
                            $string_json = str_replace("ขอบคุณ","โปรดรอสักครู่",$string_json);
                            $string_json = str_replace("Thankyou","Please wait a moment",$string_json);
                            $string_json = str_replace("datetime",$datetime,$string_json);
                            $string_json = str_replace("สติกเกอร์ไลน์","8",$string_json);

                            $messages = [ json_decode($string_json, true) ];
                            break;
                        case "thx":
                            $template_path = storage_path('../public/json/callback_guest.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า..",$string_json);
                            $string_json = str_replace("9กก9999",$registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพมหานคร",$province,$string_json);
                            $string_json = str_replace("ขอบคุณ","ขอบคุณค่ะ",$string_json);
                            $string_json = str_replace("Thankyou","Thank you",$string_json);
                            $string_json = str_replace("datetime",$datetime,$string_json);
                            $string_json = str_replace("สติกเกอร์ไลน์","14",$string_json);

                            $messages = [ json_decode($string_json, true) ];
                            break;

                    }

                    $body = [
                        "to" => $to_user,
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
                    $url = "https://api.line.me/v2/bot/message/push";
                    $result = file_get_contents($url, false, $context);

                    //SAVE LOG
                    $data = [
                        "title" => "https://api.line.me/v2/bot/message/push",
                        "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
                    ];

                    DB::table('register_cars')
                            ->where([ 
                                    ['registration_number', $google_registration_number],
                                    ['province', $google_province],
                                    ['now', "Yes"] 
                                ])
                            ->update(['now' => null]);

                    MyLog::create($data);
                    return $result;
                    break;

                case 'google':

                    $google_data = [
                        "name" => $item->name,
                        "registration_number" => $google_registration_number,
                        "province" => $google_province,
                        "postback_data" => $postback_data,
                        "datetime" => $datetime,
                    ];

                    switch($postback_data)
                    {
                        case "wait":
                            $email = $item->email;
                            Mail::to($email)->send(new MailToGuest($google_data));
                            break;
                        case "thx":
                            $email = $item->email;
                            Mail::to($email)->send(new MailToGuest($google_data));
                            break;

                    }
                    DB::table('register_cars')
                            ->where([ 
                                    ['registration_number', $google_registration_number],
                                    ['province', $google_province],
                                    ['now', "Yes"] 
                                ])
                            ->update(['now' => null]);
                    break;

                case 'facebook':
                    switch($postback_data)
                    {
                        case "wait":
                            //
                            break;
                        case "thx":
                            //
                            break;

                    }
                    break;
            }
        }

    }


}
