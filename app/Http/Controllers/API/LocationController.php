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

    public function check_news($lat, $lng)
    {
    	$d_30 = strtotime("-30 minute");
        $date_30 = date("Y-m-d H:i:s", $d_30);
        // echo $date_30;
        // exit();

        $check_news = DB::select("SELECT title,photo,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM news WHERE created_at > '$date_30' HAVING distance < 0.5 ORDER BY distance LIMIT 0 ,1", []);
        if (!empty($check_news)) {
        	return $check_news;
        }
    }
    
}
