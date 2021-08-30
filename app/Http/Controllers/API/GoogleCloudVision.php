<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register_car;


class GoogleCloudVision 
{
    public function search_registration_ocr()
    {
        $num_ecplode[1] = "";

        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $text = $this->replace_A_to_Z($data['text_result_0']);
        
        $num_ecplode = explode(" ",$text) ;

        if (!empty($num_ecplode[1])){
            $num_of_registration =  preg_replace('/\D/', '', $num_ecplode[1]);
        }else{
            $num_of_registration =  preg_replace('/\D/', '', $text);
        }

        if (!empty($num_of_registration)) {
            $register_car = Register_car::where('registration_number', 'LIKE', "%$num_of_registration%")
                ->where('car_type', "car")
                ->get();
    
        } else {
            $register_car = "";
        }

        return $register_car ;
    }

    // Convert a string to an array with multibyte string
    function getMBStrSplit($string, $split_length = 1){
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8'); 
        
        $split_length = ($split_length <= 0) ? 1 : $split_length;
        $mb_strlen = mb_strlen($string, 'utf-8');
        $array = array();
        $i = 0; 
        
        while($i < $mb_strlen)
        {
            $array[] = mb_substr($string, $i, $split_length);
            $i = $i+$split_length;
        }
        
        return $array;
    }

    function replace_A_to_Z($data){
        
        $str = $data ;
        $arr1 = $this->getMBStrSplit($str);

        $azRange_1 = range('A', 'Z');
        $azRange_2 = range('a', 'z');

        foreach ($azRange_1 as $letter_1){
            $x = str_replace($azRange_1, "" ,$arr1) ;
        }
        foreach ($azRange_2 as $letter_2){
            $z = str_replace($azRange_2, "" ,$x) ;
        }

        $text = "" ;

        for ($i=0; $i < count($z); $i++) { 
            
            $text = $text . $z[$i] ;
        }

        return $text ;
    }

    
}