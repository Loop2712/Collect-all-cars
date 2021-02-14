<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function search_location($lat, $lng)
    {

        $province_name = DB::select("SELECT tambon_th,amphoe_th,changwat_th,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM lat_longs  HAVING distance < 10 ORDER BY distance LIMIT 0 ,3", []);

        return $province_name;
    }

    public function near_news($lat, $lng)
    {

        $near_news = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM news  HAVING distance < 20 ORDER BY distance LIMIT 0 ,5000", []);

        return $near_news;
    }
}
