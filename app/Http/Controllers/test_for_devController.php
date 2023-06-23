<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Partner;

use App\Models\Register_car;
use App\Models\LineMessagingAPI;
use App\Models\Mylog;
use Illuminate\Http\Request;

use App\Models\Data_1669_operating_officer;

use Illuminate\Support\Facades\Mail;
use App\Mail\Mail_proposal;

use Illuminate\Support\Facades\Http;

class test_for_devController extends Controller
{
    public function main_test()
    {
        $provider_id = $event['joined']['members'][0]['userId'];
        $group_id = $event['source']['groupId'];

        $data_user = User::where('provider_id',$provider_id)->first();

        // หาชื่อ user จากไลน์
        $channelAccessToken = env('CHANNEL_ACCESS_TOKEN');
        $url = "https://api.line.me/v2/bot/profile/" . $provider_id;
        $headers = array(
            "Authorization: Bearer " . $channelAccessToken,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data_response = json_decode($response, true);
        $name_user_form_line = $data_response["displayName"];

        // SAVE LOG
        $data_save_log_1 = [
            "title" => "name user",
            "content" => $name_user_form_line,
        ];
        MyLog::create($data_save_log_1);
        // จบ หาชื่อ user จากไลน์

        $check_group_line = Nationalitie_group_line::where('groupId' , $group_id)->first();

        if ( !empty($check_group_line->id) ){

            $check_officer = Nationalitie_officer::where('group_line_id' , $check_group_line->id)
                ->where('user_id' , $data_user->id)
                ->first();

            if ( empty($check_officer->id) ){
                // ส่งไลน์ให้ลงทะเบียน
                $template_path = storage_path('../public/json/nationalitie/register_officer_by_join_new.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("<name_user>",$name_user_form_line,$string_json);
                $string_json = str_replace("<language>",$language,$string_json);

                $messages = [ json_decode($string_json, true) ];

                $body = [
                    "to" => $group_id,
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

                // SAVE LOG
                $data_save_log = [
                    "title" => "send flex register_officer",
                    "content" => "to >> " . $group_id,
                ];
                MyLog::create($data_save_log);
            }

        }
    }

    

    public function main_test_blade(){

        return view('test_for_dev.main_test_blade'); 
    }

    public function test_create_group_line_by_laravel(){

        $accessToken = env('CHANNEL_ACCESS_TOKEN');

        $groupId = 'C1a5c0ec202e2f1b738608d84c9216a6c';

        $pictureUrl = 'https://www.viicheck.com/img/stickerline/PNG/21.png';
        $groupName = 'เปลี่ยนชื่อ';
        // สำหรับทดสอบ ViiCHECK

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->put("https://api-data.line.me/v2/bot/group/{$groupId}/picture/url", [
            'pictureUrl' => $pictureUrl
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->put("https://api.line.me/v2/bot/group/{$groupId}/name", [
            'name' => $groupName
        ]);

        echo $response ;

    }

    public function reset_count_sos_1669()
    {
        $count_sos = DB::table('sos_1669_province_codes')
            ->where('count_sos', '!=' , null )
            ->get();

        foreach ($count_sos as $item_1) {

            DB::table('sos_1669_province_codes')
                ->where([ 
                        ['id', $item_1->id],
                    ])
                ->update([
                    'count_sos' => null,
                ]);

        }

        $for_gen_code = DB::table('sos_1669_province_codes')
            ->where('for_gen_code', '!=' , null )
            ->get();

        foreach ($for_gen_code as $item_2) {

            DB::table('sos_1669_province_codes')
                ->where([ 
                        ['id', $item_2->id],
                    ])
                ->update([
                    'for_gen_code' => null,
                ]);

        }

        return "OK" ;
    }

    public function test_table()
    {
        return view('test_for_dev.test_table'); 
    }

    // นับตัวอักษร
    function utf8_strlen($s) {
        $c = strlen($s); $l = 0;
        for ($i = 0; $i < $c; ++$i)
            if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
        return $l;
    }

    public function type_car_registration()
    {
        $register_cars = Register_car::where('registration_number' , "!=" , null)->get();

        // echo "<pre>";
        // print_r($register_cars);
        // echo "<pre>";

        foreach ($register_cars as $key) {

            $registration =  $key->registration_number;
            $text_registration = preg_replace('/[0-9]+/', '', $registration);

            $count_sp_text = $this->utf8_strlen($text_registration);

            if ($key->car_type == "car") {
                $type_car_registration = $this->check_type_car_registration($text_registration);
                // update to database where id = $key->id
                DB::table('register_cars')
                    ->where('id', $key->id)
                    ->update([
                        'type_car_registration' => $type_car_registration,
                ]);

            }else{
                // update to database where id = $key->id
                DB::table('register_cars')
                    ->where('id', $key->id)
                    ->update([
                        'type_car_registration' => "รถจักรยานยนต์",
                ]);
            }
            
        }


        return "OK" ;
    }

    public function check_type_car_registration($text_registration)
    {
        preg_match_all('/./u',$text_registration,$text);

        if (!empty($text[0][0])) {

            // echo "<pre>";
            // print_r($text);
            // echo "<pre>";

            // echo "อักษรนำ >> " . $text[0][0];
            // echo "<br>";

            // echo "<br>";
            
            if ( $text[0][0] == "ก" or $text[0][0] == "ข" or $text[0][0] == "จ" or $text[0][0] == "ฉ" or $text[0][0] == "ช" or $text[0][0] == "ฌ" or $text[0][0] == "ญ" or $text[0][0] == "ฐ" or $text[0][0] == "ธ" or $text[0][0] == "พ" or $text[0][0] == "ภ" or $text[0][0] == "ษ" or $text[0][0] == "ฆ" ) {

                $type_car_registration = "รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คน" ;

            }elseif ( $text[0][0] == "น" or $text[0][0] == "ฬ" or$text[0][0] == "อ" or$text[0][0] == "ฮ") {
                
                $type_car_registration = "รถยนต์นั่งส่วนบุคคลเกิน 7 คน" ;
                
            }elseif ( $text[0][0] == "ฒ" or $text[0][0] == "ณ" or $text[0][0] == "ต" or $text[0][0] == "ถ" or $text[0][0] == "บ" or $text[0][0] == "ผ" or $text[0][0] == "ย" or $text[0][0] == "ร" or $text[0][0] == "ล" ) {
                
                $type_car_registration = "รถยนต์บรรทุกส่วนบุคคล" ;
                
            }elseif ( $text[0][0] == "ศ" ) {
                
                $type_car_registration = "รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คน,รถยนต์สามล้อส่วนบุคคล" ;
                
            }elseif ( $text[0][0] == "ว" ) {
                
                $type_car_registration = "รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คน,รถยนต์รับจ้างระหว่างจังหวัด" ;
                
            }elseif ( $text[0][0] == "ท" or $text[0][0] == "ม" ) {
                
                $type_car_registration = "รถยนต์รับจ้างบรรทุกโดยสารไม่เกิน 7 คน (รถแท็กซี่)" ;
                
            }elseif ( $text[0][0] == "ฟ" ) {
                
                $type_car_registration = "รถยนต์สี่ล้อรับจ้างเล็ก" ;
                
            }elseif ( $text[0][0] == "ส" ) {
                
                $type_car_registration = "รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คน,รถยนต์รับจ้างสามล้อ" ;
                
            }elseif ( $text[0][0] == "ฎ" ) {
                
                $type_car_registration = "รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คนรถยนต์,บริการเช่า" ;
                
            }else{
                $type_car_registration = null ;
            }

        }else{
            $type_car_registration = null ;
        }

        return $type_car_registration ;
    }
    
    ///////////////////////////////////
    ////////// อันนี้ใช้งานจริงนะ ///////////
    ///////////////////////////////////

    public function index_send_mail_proposal()
    {

        return view('admin_viicheck.index_send_mail_proposal'); 
    }

    public function send_mail_proposal(Request $request)
    {
        $requestData = $request->all();

        $count = count($requestData) - 2;
        $count = $count / 2;

        // echo $count ;
        // echo "<br>";
        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";

        for ($i=0; $i < $count; $i++) { 
            $xxz = $i + 1 ;
            $name = $requestData['title_'.$xxz] ;
            $email = $requestData['mail_'.$xxz] ;

            echo "เรียนคุณ : " . $name . " >> Send to Mail : " . $email;
            echo "<br>";

            //ส่งเมล
            Mail::to($email)->send(new Mail_proposal($name));
        }

        return "Sent Success"; 
    }

    function test_send_many_bubble(){


        $template_path = storage_path('../public/json/test_many_bubble_1.json');
        $string_json = file_get_contents($template_path);

        $count_bubble = 2 ;
        $all_bubble_json = '';

        for ($i = 0; $i < $count_bubble; $i++){
            $bubble_json = storage_path('../public/json/test_many_bubble_2.json');
            $bubble_string_json = file_get_contents($bubble_json);

            $color_i = '#27'.$i.$i.'FF' ;
            $bubble_string_json = str_replace("<count>", $i ,$bubble_string_json);
            $bubble_string_json = str_replace("#27ACB2", $color_i ,$bubble_string_json);

            $all_bubble_json = $all_bubble_json . $bubble_string_json ;
        }

        $string_json = str_replace("<content>",$all_bubble_json,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => 'U2762c265eb9c74012b5a24b4cbee095a',
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

    }
    
    
}
