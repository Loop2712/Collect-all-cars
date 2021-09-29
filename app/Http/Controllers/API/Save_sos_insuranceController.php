<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sos_insurance;
use App\Models\Insurance;
use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use App\Mail\MailToInsurance;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\API\API_Time_zone;

class Save_sos_insuranceController extends Controller
{
    public function Save_sos()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $insurance = Insurance::where('company', $data['insurance'] )->get();
            foreach ($insurance as $key) {
                $phone_insurance = $key->phone ;
                $status_partner = $key->status_partner ;
                $name_line_group = $key->line_group ;
            }

        $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

        foreach ($data_line_group as $key_line) {
            $groupId = $key_line->groupId ;
            $name_time_zone = $key_line->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $data['groupId'] = $groupId ;
        $data['time_zone'] = $time_zone ;
        $data['group_language'] = $group_language ;

        Sos_insurance::create($data);

        DB::table('register_cars')
              ->where('id', $data['car_id'])
              ->update([
                'name_insurance' => $data['insurance'],
                'phone_insurance' => $phone_insurance,
          ]);

        if ($status_partner == "Yes") {

            // ส่งข้อมูลผ่านเมล
            $data_cars = Register_car::where('id', $data['car_id'])->get();
            $datetime =  date("d-m-Y  h:i:sa");
            $data['lat_mail'] = "@".$data['lat'];

                foreach ($data_cars as $item ) {
                    $data['registration_number'] = $item->registration_number;
                    $data['province'] = $item->province;
                    $data['datetime'] = $time_zone;

                    $email = "thanakorn.tnk12@gmail.com";
                    Mail::to($email)->send(new MailToInsurance($data));
                }

            // ส่งข้อมูลผ่านไลน์ 
            $this->_pushLine($data);
            
        }

    }

    public function Save_sos_2($name_insurance)
    {   
        $insurance = Insurance::where('company', $name_insurance )->get();

        return $insurance ;
    }

    protected function _pushLine($data)
    {   
        $data_cars = Register_car::where('id', $data['car_id'])->get();

        $datetime =  date("d-m-Y  h:i:sa");

        $data_topic = [
                    "ขอความช่วยเหลือด่วน",
                    "หมายเลขทะเบียน",
                    "เวลา",
                    "จาก",
                    "โทร",
                ];

        for ($i=0; $i < count($data_topic); $i++) { 

            $text_topic = DB::table('text_topics')
                    ->select($data['group_language'])
                    ->where('th', $data_topic[$i])
                    ->where('en', "!=", null)
                    ->get();

            foreach ($text_topic as $item_of_text_topic) {
                $data_topic[$i] = $item_of_text_topic->$data['group_language'] ;
            }
        }

        foreach ($data_cars as $item ) {

            $template_path = storage_path('../public/json/ask_for_insurance.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            $string_json = str_replace("TNK",$data['insurance'],$string_json);
            $string_json = str_replace("กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กทม",$item->province,$string_json);
            $string_json = str_replace("datetime",$data['time_zone'],$string_json);
            $string_json = str_replace("name",$data['name'],$string_json);
            $string_json = str_replace("0999999999",$data['phone'],$string_json);

            $string_json = str_replace("lat",$data['lat'],$string_json);
            $string_json = str_replace("lng",$data['lng'],$string_json);
            $string_json = str_replace("lat_mail",$data['lat_mail'],$string_json);

            $string_json = str_replace("ขอความช่วยเหลือด่วน",$data_topic[0],$string_json);
            $string_json = str_replace("หมายเลขทะเบียน",$data_topic[1],$string_json);
            $string_json = str_replace("เวลา",$data_topic[2],$string_json);
            $string_json = str_replace("จาก",$data_topic[3],$string_json);
            $string_json = str_replace("โทร",$data_topic[4],$string_json);

            $messages = [ json_decode($string_json, true) ];
        }

        $body = [
            "to" => $data['groupId'] ,
            "messages" => $messages,
        ];

        // flex ask_for_help
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
            "title" => "ข้อมูลเรียกประกัน",
            "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
        ];

        MyLog::create($data);
        
        return $data;
    }
}
