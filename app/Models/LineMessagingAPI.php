<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

class LineMessagingAPI extends Model
{
    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    public function replyToUser($data, $event, $message_type)
    {
    	switch($message_type)
        {
        	case "other": 
                $template_path = storage_path('../public/json/flex-other.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;
            case "vmarket": 
                $template_path = storage_path('../public/json/flex-vmarket.json');   
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

                $car_row = DB::select("SELECT * FROM register_cars WHERE provider_id = '$provider_id' AND active = 'Yes' ");

                $randomCar = DB::table('register_cars')
                    ->inRandomOrder()
                    ->where('provider_id' , $provider_id)
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
                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now = date("Y-m-d "); 
                        // วันหมดอายุ พรบ
                        $dtae_act = $act[0]; 
                        // วันหมดอายุ ประกัน
                        $dtae_insurance = $insurance[0]; 
                        // ตัวแปรสำหรับเช็คการแจ้งเตือน
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        $string_json = str_replace("ดูรถทั้งหมด","แก้ไขข้อมูล",$string_json);

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
                        // วันหมดอายุ พรบ
                        $dtae_act = $act[0]; 
                        // วันหมดอายุ ประกัน
                        $dtae_insurance = $insurance[0]; 
                        // ตัวแปรสำหรับเช็คการแจ้งเตือน
                        $act = (strtotime($dtae_act) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($act <= 30 && $act >= 1) {
                            $string_json = str_replace("พรบ1","warning",$string_json);
                        }
                        if ($act <= 0){
                            $string_json = str_replace("พรบ1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ1","tick",$string_json);
                        }

                        $insurance = (strtotime($dtae_insurance) - strtotime($date_now))/  ( 60 * 60 * 24 );  

                        if ($insurance <= 30 && $insurance >= 1) {
                            $string_json = str_replace("ประกัน1","warning",$string_json);
                        }
                        if ($insurance <= 0){
                            $string_json = str_replace("ประกัน1","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน1","tick",$string_json);
                        }

                        // คันที่2
                        $string_json = str_replace("แบนด์2", strtolower($brand[1]),$string_json);
                        $string_json = str_replace("ป้ายทะเบียน2",$registration_number[1],$string_json);
                        // พรบ
                        // เวลาปัจจุบัน
                        $date_now2 = date("Y-m-d "); 
                        // วันหมดอายุ พรบ
                        $dtae_act2 = $act2[1]; 
                        // วันหมดอายุ ประกัน
                        $dtae_insurance2 = $insurance2[1]; 
                        // ตัวแปรสำหรับเช็คการแจ้งเตือน
                        $act2 = (strtotime($dtae_act2) - strtotime($date_now2))/  ( 60 * 60 * 24 );  

                        if ($act2 <= 30 && $act2 >= 1) {
                            $string_json = str_replace("พรบ2","warning",$string_json);
                        }
                        if ($act2 <= 0){
                            $string_json = str_replace("พรบ2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("พรบ2","tick",$string_json);
                        }

                        $insurance2 = (strtotime($dtae_insurance2) - strtotime($date_now2))/  ( 60 * 60 * 24 );  

                        if ($insurance2 <= 30 && $insurance2 >= 1) {
                            $string_json = str_replace("ประกัน2","warning",$string_json);
                        }
                        if ($insurance2 <= 0){
                            $string_json = str_replace("ประกัน2","wrong",$string_json);
                        }else{
                            $string_json = str_replace("ประกัน2","tick",$string_json);
                        }

                        $string_json = str_replace("ดูรถทั้งหมด","แก้ไขข้อมูล",$string_json);

                        break;

                    case "3": 

                        break;

                }
                // ข้อความสุดท้ายที่จะส่ง
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
    	// UserId เจ้าของรถ
    	$provider_id = $event["source"]['userId'];
    	
    	// UserId คนเรียก
    	$reply = DB::table('register_cars')
	            ->select('reply_provider_id','registration_number','province')
	            ->where('provider_id', $provider_id)
	            ->get();

		// $reply = DB::select("SELECT * FROM register_cars WHERE provider_id = '$provider_id' ");

    	switch($postback_data)
        {
        	case "wait": 
				foreach($reply as $item){
					$to_user = $item->reply_provider_id;
                	$template_path = storage_path('../public/json/callback_guest.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า..",$string_json);
                    $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
                    $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);
                    $string_json = str_replace("ขอบคุณ","รอสักครู่ / Wait a moment",$string_json);

                    $messages = [ json_decode($string_json, true) ];
	        	}
                break;
            case "thx": 
				foreach($reply as $item){
					$to_user = $item->reply_provider_id;
                    $template_path = storage_path('../public/json/callback_guest.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("ตัวอย่าง","ผู้ใช้แจ้งว่า..",$string_json);
                    $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
                    $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);
                    $string_json = str_replace("ขอบคุณ","ขอบคุณค่ะ / Thank you",$string_json);

                    $messages = [ json_decode($string_json, true) ];
	        	}
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
        MyLog::create($data);
        return $result;

  //       $strAccessToken = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
     
  //       $strUrl = "https://api.line.me/v2/bot/message/push";
         
  //       $arrHeader = array();
  //       $arrHeader[] = "Content-Type: application/json";
  //       $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
         
  //       $arrPostData = array();
  //       $arrPostData['to'] = $to_user;
    
  //       $arrPostData['messages'][0]['type'] = "text";
		// $arrPostData['messages'][0]['text'] = $messages;

		// $ch = curl_init();
  //       curl_setopt($ch, CURLOPT_URL,$strUrl);
  //       curl_setopt($ch, CURLOPT_HEADER, false);
  //       curl_setopt($ch, CURLOPT_POST, true);
  //       curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
  //       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
  //       curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //       $result = curl_exec($ch);
  //       curl_close ($ch);
        

    }



}
