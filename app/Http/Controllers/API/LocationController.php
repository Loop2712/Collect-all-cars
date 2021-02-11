<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function search_location($lat, $long)
    {

        $province_name = DB::select("SELECT province_name,( 3959 * acos( cos( radians($lat) ) * cos( radians( province_lat ) ) * cos( radians( province_lon ) - radians($long) ) + sin( radians($lat) ) * sin( radians( province_lat ) ) ) ) AS distance FROM province_th  HAVING distance < 25 ORDER BY distance LIMIT 0 , 1", []);

        return $province_name;
    }
}
