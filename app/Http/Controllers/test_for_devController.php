<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

use App\Models\Register_car;
use App\Models\LineMessagingAPI;
use App\Models\Mylog;

use Illuminate\Http\Request;

class test_for_devController extends Controller
{
    public function test_table()
    {
        return view('test_for_dev.test_table'); 
    }


    public function main_test()
    {
        DB::table('users')
            ->where('role', '!=' , null)
            ->where('organization', '!=' , null)
            ->update([
                'sub_organization' => "support_center",
        ]);
        
        exit();

        $url = "www.peddyhub.com" ;

        $to_url_ep = explode("//" , $url);

        if (count($to_url_ep) > 1) {
            $to_url = $url ;
        }else{
            $to_url = 'http://' . $url ;
        }

        exit();
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
    
}
