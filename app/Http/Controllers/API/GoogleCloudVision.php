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

        echo "<pre>";
        print_r($data);
        echo "<pre>";
        echo "<br>";

        // echo "<pre>";
        // print_r(explode("\n",$text_result));
        // echo "<pre>";
        // $reg_replace = str_replace("world","Peter","Hello world!");

        // $register_car = Register_car::where('registration_number', $user['organization'] )->get();
        exit();
  

    }

    
}