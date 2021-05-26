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

    	Organization::create($requestData);

        // return $requestData;
    }

}
