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
            }

        Sos_insurance::create($data);

        if ($status_partner == "Yes") {

            // ส่งข้อมูลผ่านเมล
            $data_cars = Register_car::where('id', $data['car_id'])->get();
            $datetime =  date("d-m-Y  h:i:sa");
            $data['lat_mail'] = "@".$data['lat'];

                foreach ($data_cars as $item ) {
                    $data['registration_number'] = $item->registration_number;
                    $data['province'] = $item->province;
                    $data['datetime'] = $datetime;

                    $email = "thanakorn.tnk12@gmail.com";
                    Mail::to($email)->send(new MailToInsurance($data));
                }

            // ส่งข้อมูลผ่านไลน์ 
            $this->_pushLine($data);
            
            
        }

        DB::table('register_cars')
              ->where('id', $data['car_id'])
              ->update([
                'name_insurance' => $data['insurance'],
                'phone_insurance' => $phone_insurance,
          ]);

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

        foreach ($data_cars as $item ) {
            // flex ask_for_help
            $template_path = storage_path('../public/json/ask_for_insurance.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง","เรียน..",$string_json);
            $string_json = str_replace("TNK",$data['insurance'],$string_json);
            $string_json = str_replace("กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กทม",$item->province,$string_json);
            $string_json = str_replace("datetime",$datetime,$string_json);
            $string_json = str_replace("name",$data['name'],$string_json);
            $string_json = str_replace("0999999999",$data['phone'],$string_json);

            $messages = [ json_decode($string_json, true) ];
        }

        // location
        $template_path_location = storage_path('../public/json/location.json');   
        $string_json_location = file_get_contents($template_path_location);
        $string_json_location = str_replace("name",$data['name'],$string_json_location);
        $string_json_location = str_replace("99999",$data['lat'],$string_json_location);
        $string_json_location = str_replace("88888",$data['lng'],$string_json_location);

        $messages_location = [ json_decode($string_json_location, true) ];

        $body = [
            "to" => "U912994894c449f2237f73f18b5703e89",
            "messages" => $messages,
        ];

        $body_location = [
            "to" => "U912994894c449f2237f73f18b5703e89",
            "messages" => $messages_location,
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

        // LOCATION
        $opts_location = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body_location, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context_location  = stream_context_create($opts_location);
        $url_location = "https://api.line.me/v2/bot/message/push";
        $result_location = file_get_contents($url_location, false, $context_location);

        //SAVE LOG
        $data_location = [
            "title" => "location ข้อมูลเรียกประกัน",
            "content" => json_encode($result_location, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data_location);
        
        return $data;
    }
}
