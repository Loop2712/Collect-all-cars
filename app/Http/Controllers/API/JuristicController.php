<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class JuristicController extends Controller
{
     public function juristic($result)
    {
    	$requestData = $result->all();
        echo "<pre>";
        print_r($requestData);
        echo "<pre>";
        exit();

    	Organization::create($requestData);

        // return $requestData;
    }

}
