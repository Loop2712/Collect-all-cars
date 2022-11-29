<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Partner;
use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use App\User;

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

     public function all_partners()
    {
        $data = partner::whereNull("user_id_admin")->get();

        return $data ;
    }

    public function edit_data_organization(Request $request){
        
        $requestData = $request->all();

        $user = User::where('id' , $requestData['user_id'])->first();
        $data_partners = Partner::where('id' , $requestData['name_partner'])->first();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'organization' => $data_partners->name ,
        ]);

        $data_car_org = Register_car::where('user_id' , $user->id)->where('juristicNameTH' , '!=' , null)->get();

        foreach ($data_car_org as $car) {
            DB::table('register_cars')
                ->where('id', $car->id)
                ->update([
                    'juristicNameTH' => $data_partners->name ,
            ]);
        }

        return redirect('/register_car_organization')->with('flash_message', 'Partner updated!');

    }

}
