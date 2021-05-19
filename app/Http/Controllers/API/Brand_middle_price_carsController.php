<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Middle_price_car;
use DB;

class Brand_middle_price_carsController extends Controller
{
    public function getBrand()
    {
        $car_brand = Middle_price_car::select('brand')
            ->orderBy('brand')
            ->where('type', "car")
            ->groupBy('brand')
            ->get();

        return $car_brand;
    }

    public function getModel($car_brand)
    {
        $car_model = Middle_price_car::select('model,count(model) as count')
        	->orderBy('model')
            ->where('model', '!=',"" )
            ->where('brand', $car_brand )
            ->groupBy('model')
            ->get();
        return $car_model;
    }
}
