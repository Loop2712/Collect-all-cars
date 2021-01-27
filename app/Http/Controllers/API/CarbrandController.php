<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;

class CarbrandController extends Controller
{
	public function getBrand()
    {
        $car_brand = CarModel::selectRaw('brand,count(brand) as count')
            ->orderByRaw('count DESC')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
        return $car_brand;
    }
    public function getModel($car_brand)
    {
        $car_model = CarModel::selectRaw('model,count(model) as count')
        	->orderByRaw('count DESC')
            ->where('model', '!=',"" )
            ->where('brand', $car_brand )
            ->groupBy('model')
            ->get();
        return $car_model;
    }

}
