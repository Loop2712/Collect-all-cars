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
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $num_of_registration =  preg_replace('/\D/', '', $data['text_result_0']);

        if (!empty($num_of_registration)) {
            $register_car = Register_car::where('registration_number', 'LIKE', "%$num_of_registration%")->get();
        } else {
            $register_car = ""
        }
        
        return $register_car ;
    }

    
}