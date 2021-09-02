<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cancel_Profile;
use App\Models\Mylog;

class Home_pageController extends Controller
{
     public function home_page()
    {
        $date_now = date("Y-m-d");
        $date_add = strtotime("+30 Day");
        $date_30 = date("Y-m-d" , $date_add);

        // พรบ
        $act = Register_car::where('act' , "<=" , $date_30)
                    ->where('user_id' , "1")
                    ->whereNull('alert_act')
                    ->get();

        foreach ($act as $item) {
            $template_path = storage_path('../public/json/flex-act.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง","พรบ. ของคุณใกล้หมดอายุ",$string_json);
            $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
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
                ->where('registration_number', $item->registration_number)
                ->where('province', $item->province)
                ->update(['alert_act' => $date_now]);

            MyLog::create($data);
        }
        // จบ พรบ

        // ประกัน
        $insurance = Register_car::where('insurance' , "<=" , $date_30)
                                ->where('user_id' , "1")
                                ->where('alert_insurance' , "=" , null)
                                ->get();

        foreach ($insurance as $item) {
            $template_path = storage_path('../public/json/flex-act.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง","ประกัน ของคุณใกล้หมดอายุ",$string_json);
            $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);
            $string_json = str_replace("พรบ","ประกัน",$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
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
                ->where('registration_number', $item->registration_number)
                ->where('province', $item->province)
                ->update(['alert_insurance' => $date_now]);

            MyLog::create($data);
        }
        // จบ ประกัน

        $user_id = Auth::id();
        
        $Cancel_Profile = Cancel_Profile::where('user_id', $user_id)->get();
            foreach ($Cancel_Profile as $key) {
                $created_last = $key->created_at;
            }
        $cancel_ago = "";
        if (!empty($created_last)) {
            $cancel_ago = str_replace("ago","", $created_last->diffForHumans());
            $str_1 = str_replace("days","วัน", $cancel_ago);
            $str_2 = str_replace("day","วัน", $str_1);
            $str_3 = str_replace("months","เดือน", $str_2);
            $str_4 = str_replace("month","เดือน", $str_3);
            $str_5 = str_replace("years","ปี", $str_4);
            $str_6 = str_replace("year","ปี", $str_5);
            $str_7 = str_replace("weeks","สัปดาห์", $str_6);
            $str_8 = str_replace("week","สัปดาห์", $str_7);
            $str_9 = str_replace("seconds","วินาที", $str_8);
            $str_10 = str_replace("second","วินาที", $str_9);
            $str_11 = str_replace("minutes","นาที", $str_10);
            $str_12 = str_replace("minute","นาที", $str_11);
            $str_13 = str_replace("hours","ชั่วโมง", $str_12);
            $str_14 = str_replace("hour","ชั่วโมง", $str_13);

            $cancel_ago = $str_14;
        }

        $register_car = Register_car::selectRaw('count(id) as count')
                        ->where('car_type', 'car')
                        ->get();
                        foreach ($register_car as $key ) {
                            $count_car = $key->count;
                        }

        $register_motorcycle = Register_car::selectRaw('count(id) as count')
                        ->where('car_type', 'motorcycle')
                        ->get();
                        foreach ($register_motorcycle as $key ) {
                            $count_motorcycle = $key->count;
                        }

        $guest = Guest::selectRaw('count(id) as count')
                        ->get();
                        foreach ($guest as $key ) {
                            $count_guest = $key->count;
                        }

        return view('home_page.home_page', compact('count_car','count_motorcycle','count_guest','user_id' ,'cancel_ago'));
    }
}
