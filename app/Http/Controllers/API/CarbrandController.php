<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use DB;
use App\Models\Insurance;
use App\Models\Register_car;

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
            ->get();
             foreach ($report as $key ) {
                if ($key->created_at > $date_5) {
                    $time = "Yes" ;
                    break ;
                }else{
                    $time = "No" ;
                }
            }

            return $time;
    
    }

    public function check_register_car($registration_number , $province)
    {
        $registration = str_replace(" ", "", $registration_number);
        $registration = DB::table('register_cars')
            ->where('registration_number', $registration_number )
            ->where('province', $province )
            ->get();

        return $registration;
    
    }

    public function add_reg_id($registration, $province)
    {
        $registration = str_replace(" ", "", $registration);
        $registration = DB::table('register_cars')
            ->where('registration_number', $registration )
            ->where('province', $province )
            ->get();

        return $registration;
    }

    public function phone_insurance($name_insurance)
    {

        $phones = Insurance::where('company',$name_insurance )
            ->get();

        return $phones;

    }

    // รถยนต์
    public function select_car_brand_user()
    {
        $car_brand = Register_car::select('brand')
            ->orderBy('brand')
            ->where('brand', "!=" , null)
            ->where('active', "Yes")
            ->where('car_type', "car")
            ->groupBy('brand')
            ->get();

        return $car_brand;
    }

    public function select_car_model_user($car_brand)
    {
        $car_model = Register_car::select('generation')
            ->orderBy('generation')
            ->where('generation', "!=" , null )
            ->where('car_type', "car" )
            ->where('active', "Yes")
            ->where('brand', $car_brand )
            ->groupBy('generation')
            ->get();
        return $car_model;
    }

    // รถจักรยนต์
    public function select_motor_brand_user()
    {
        $car_brand = Register_car::select('brand')
            ->orderBy('brand')
            ->where('brand', "!=" , null)
            ->where('active', "Yes")
            ->where('car_type', "motorcycle")
            ->groupBy('brand')
            ->get();

        return $car_brand;
    }

    public function select_motor_model_user($motor_brand)
    {
        $car_model = Register_car::select('generation')
            ->orderBy('generation')
            ->where('generation', "!=" , null )
            ->where('car_type', "motorcycle" )
            ->where('active', "Yes")
            ->where('brand', $motor_brand )
            ->groupBy('generation')
            ->get();
        return $car_model;
    }

    function search_data_broadcast_by_car()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        DB::table('register_cars')
                ->where('type_car_registration' , null)
                ->update([
                    'type_car_registration' => "-",
            ]);

        $car_type = $data['car_type'];
        if ($car_type != "car") {
            $car_type = "motorcycle" ;
        }

        $brand = $data['brand'];
        if (empty($brand)) {
            $brand = "" ;
        }

        $model = $data['model'];
        if (empty($model)) {
            $model = "" ;
        }

        $location_user = $data['location_user'];
        if (empty($location_user)) {
            $location_user = "" ;
        }

        $province_registration = $data['province_registration'];
        if (empty($province_registration)) {
            $province_registration = "" ;
        }

        $type_registration = $data['type_registration'];
        if (empty($type_registration)) {
            $type_registration = "" ;
        }

        $data_search = Register_car::where('car_type', $car_type)
            ->where('active', "Yes")
            ->where('brand', 'LIKE' , "%$brand%" )
            ->where('generation', 'LIKE' , "%$model%" )
            ->where('location', 'LIKE' , "%$location_user%" )
            ->where('province', 'LIKE' , "%$province_registration%" )
            ->where('type_car_registration', 'LIKE' , "%$type_registration%" )
            ->get();

        // if ( empty($brand) and empty($model) and empty($location_user) and empty($province_registration) and empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->get();

        // }elseif ( !empty($brand) and empty($model) and empty($location_user) and empty($province_registration) and empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->where('brand', $brand)
        //         ->get();

        // }elseif ( !empty($brand) and !empty($model) and empty($location_user) and empty($province_registration) and empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->where('brand', $brand)
        //         ->where('generation', $model)
        //         ->get();

        // }elseif ( !empty($brand) and !empty($model) and !empty($location_user) and empty($province_registration) and empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->where('brand', $brand)
        //         ->where('generation', $model)
        //         ->where('location', $location_user)
        //         ->get();

        // }elseif ( !empty($brand) and !empty($model) and !empty($location_user) and !empty($province_registration) and empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->where('brand', $brand)
        //         ->where('generation', $model)
        //         ->where('location', $location_user)
        //         ->where('province', $province_registration)
        //         ->get();

        // }elseif ( !empty($brand) and !empty($model) and !empty($location_user) and !empty($province_registration) and !empty($type_registration) ) {

        //     $data_search = Register_car::where('car_type', $car_type)
        //         ->where('active', "Yes")
        //         ->where('brand', $brand)
        //         ->where('generation', $model)
        //         ->where('location', $location_user)
        //         ->where('province', $province_registration)
        //         ->where('type_car_registration', $type_registration)
        //         ->get();

        // }

        return $data_search ;

    }

}
