<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;

class Home_pageController extends Controller
{
     public function home_page()
    {
        $register_car = Register_car::selectRaw('count(id) as count')
                        ->where('car_type', 'car')
                        ->get();
                        foreach ($register_car as $key ) {
                            $count_car = $key->count;
                        }

        $register_motorcycle = Register_car::selectRaw('count(id) as count')
                        ->where('car_type', 'motorcycle')
                        ->get();
                        foreach ($register_motorcycle as $key ) {
                            $count_motorcycle = $key->count;
                        }

        return view('home_page.home_page', compact('count_car','count_motorcycle'));
    }
}
