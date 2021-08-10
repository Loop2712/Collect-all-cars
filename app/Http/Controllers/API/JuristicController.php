<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class JuristicController extends Controller
{
    public function juristic()
    {
    	
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // echo "<br>";

        $data['standardObjectiveDetail'] =  $data['standardObjectiveDetail']['objectiveDescription'];
        
        $data['addressName'] =  $data['addressDetail']['addressName'];
        $data['buildingName'] =  $data['addressDetail']['buildingName'];
        $data['roomNo'] =  $data['addressDetail']['roomNo'];
        $data['floor'] =  $data['addressDetail']['floor'];
        $data['villageName'] =  $data['addressDetail']['villageName'];
        $data['houseNumber'] =  $data['addressDetail']['houseNumber'];
        $data['moo'] =  $data['addressDetail']['moo'];
        $data['soi'] =  $data['addressDetail']['soi'];
        $data['street'] =  $data['addressDetail']['street'];
        $data['subDistrict'] =  $data['addressDetail']['subDistrict'];
        $data['district'] =  $data['addressDetail']['district'];
        $data['province'] =  $data['addressDetail']['province'];

        $data['addressDetail'] =  "";

    	Organization::firstOrCreate($data);

        // return $requestData;
    }

    public function selest_organization($organization)
    {
        $data = Organization::where('juristicID', $organization)->get();

        return $data ;
    }

}
