<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use App\Models\Mylog;
use App\User;
use DB;
use App\Models\Insurance;
use App\Models\Register_car;
use App\Models\Ads_content;
use App\Models\Partner_premium;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\API\ImageController;

class Broadcast_userController extends Controller
{
    function search_data_broadcast_by_car()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $car_type = $data['car_type'];

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

        $birth_month = $data['birth_month'];

        $id_partner = $data['id_partner'];
        if (empty($id_partner)) {
            $id_partner = "" ;
        }
        $partner_premium = Partner_premium::where("id_partner",$id_partner)->get();
        foreach ($partner_premium as $premium) {
            $name_partner = $premium->name_partner ;
            $level = $premium->level ;
        }

        if ($level == "Test") {

            if (!empty($birth_month)) {
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('register_cars.juristicNameTH' ,'LIKE' , "%$name_partner%" )
                    ->where('users.type', "line")
                    ->whereMonth('users.brith' , "$birth_month" )
                    ->select('register_cars.*')
                    ->get();
            }else{
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('register_cars.juristicNameTH' ,'LIKE' , "%$name_partner%" )
                    ->where('users.type', "line")
                    ->select('register_cars.*')
                    ->get();
            }


        }else{

            if (!empty($birth_month)) {
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('users.type', "line")
                    ->whereMonth('users.brith' , "$birth_month" )
                    ->select('register_cars.*')
                    ->get();
            }else{
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('users.type', "line")
                    ->select('register_cars.*')
                    ->get();
            }



        }

        return $data_search ;

    }
}
