<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sell;
use DB;

class SellcarController extends Controller
{
    public function CarBrand()
    {
        $carbrand = Sell::where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
            
        return $carbrand;
    }
    public function CarModel($carbrand)
    {
        $carmodel = Sell::where('brand',$carbrand)
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();

        return $carmodel;
    }
}
