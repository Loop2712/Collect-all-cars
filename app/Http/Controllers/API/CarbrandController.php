<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;

class CarbrandController extends Controller
{
    public function car_brand()
	  {
	   $car_brand = CarModel::selectRaw('brand,count(brand) as count')
            ->orderByRaw('count DESC')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
	    return response()->json($car_brand);
	  }

	public function car_model($car_brand)
	  {
	    $car_model = CarModel::where('brand',$car_brand_code)
	      ->groupBy('model')
	      ->get();
	    return response()->json($car_model);
	  }
}
