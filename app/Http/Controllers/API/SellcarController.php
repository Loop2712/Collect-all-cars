<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sell;

class SellcarController extends Controller
{
    public function CarBrand()
    {
        $carbrand = Sell::groupBy('brand')
            ->where('brand', '!=',"" )
            ->get();
        return $carbrand;
    }
    public function CarModel($carbrand)
    {
        $car_model = Sell::where('brand', $carbrand )
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();
        return $carmodel;
    }
}
