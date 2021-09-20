<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\DB;

class API_Time_zone extends Controller
{
    public function change_Time_zone($name_time_zone)
    {
        $datetime =  date("d-m-Y  h:i:sa");

        // $name_time_zone = "Asia/Bangkok" ; //+7
        // // $name_time_zone = "Asia/Ust-Nera" ; //+10
        // // $name_time_zone = "America/Antigua" ; //-4

        $data_time_zone = DB::table('time_zones')
                        ->where('TimeZone', $name_time_zone)
                        ->get();

        foreach ($data_time_zone as $key_time_zone) {
            $UTC_time_zone = $key_time_zone->UTC ;
        }

        if ($UTC_time_zone < 7) {

            $distance_time = (7) - ($UTC_time_zone) ;
            $time_2 = date("d-m-Y  h:i:sa", strtotime("-" . $distance_time ." hour"));

        }elseif ($UTC_time_zone > 7) {
            $UTC_time_zone = "+".$UTC_time_zone;
            $distance_time = $UTC_time_zone - 7 ;
            $time_2 = date("d-m-Y  h:i:sa", strtotime("+" . $distance_time ." hour"));
        }elseif ($UTC_time_zone == 7) {
            $UTC_time_zone = "+".$UTC_time_zone;
            $time_2 = $datetime ;
        }
        
        $time_zone = $time_2 . ", UTC " . $UTC_time_zone ;

        return $time_zone;
    }
}
