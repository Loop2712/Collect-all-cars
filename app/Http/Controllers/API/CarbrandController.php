<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use DB;

class CarbrandController extends Controller
{
	public function getBrand()
    {
        // $car_brand = CarModel::selectRaw('brand,count(brand) as count')
        //     ->orderByRaw('count DESC')
        //     ->where('brand', '!=',"" )
        //     ->limit(10)
        //     ->groupBy('brand')
        //     ->get();
        // return $car_brand;
        $car_brand = CarModel::selectRaw('brand,count(brand) as count')
            ->orderBy('brand')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
        return $car_brand;
    }
    public function getModel($car_brand)
    {
        // $car_model = CarModel::selectRaw('model,count(model) as count')
        // 	->orderByRaw('count DESC')
        //     ->where('model', '!=',"" )
        //     ->where('brand', $car_brand )
        //     ->limit(10)
        //     ->groupBy('model')
        //     ->get();
        // return $car_model;
        $car_model = CarModel::selectRaw('model,count(model) as count')
        	->orderBy('model')
            ->where('model', '!=',"" )
            ->where('brand', $car_brand )
            ->groupBy('model')
            ->get();
        return $car_model;
    }

    // motorcycles

    public function getMotorBrand()
    {
        $motor_brand = DB::table('motorcycles_datas')
            ->select('brand')
            ->orderBy('brand')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        return $motor_brand;
    }
    public function getMotorModel($motor_brand)
    {
        $motor_model = DB::table('motorcycles_datas')
            ->select('model')
            ->orderBy('model')
            ->where('model', '!=',"" )
            ->where('brand', $motor_brand )
            ->groupBy('model')
            ->get();

        return $motor_model;
    }

    public function check_registration($registration)
    {
        $registration = str_replace(" ", "", $registration);
        $registration = DB::table('register_cars')
            ->select('registration_number')
            ->where('registration_number', $registration )
            ->get();

        return $registration;
    }

    public function check_province($registration)
    {
        $registration = str_replace(" ", "", $registration);
        $province = DB::table('register_cars')
            ->select('province')
            ->where('registration_number', $registration )
            ->groupBy('province')
            ->get();

        return $province;
    }

    public function check_time($registration , $county , $user_id)
    {
        $registration = str_replace(" ", "", $registration);
        $d_5 = strtotime("-5 minute");
        $date_5 = date("Y-m-d H:i:s", $d_5);

        $report = DB::table('guests')
            ->where('user_id', $user_id )
            ->where('registration', $registration )
            ->where('county', $county )
            ->whereDate('created_at', ">" , $date_5)
            ->get();

            if (!empty($report)) {
                return $report;
            }else{
                $report = null ;
                return $report;
            }
    
    }


}
