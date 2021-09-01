<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sos_insurance;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;

class Save_sos_insuranceController extends Controller
{
    public function Save_sos()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $insurance = Insurance::where('company', $data['insurance'] )->get();
            foreach ($insurance as $key) {
                $phone_insurance = $key->phone ;
            }
            
        Sos_insurance::create($data);

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
}
