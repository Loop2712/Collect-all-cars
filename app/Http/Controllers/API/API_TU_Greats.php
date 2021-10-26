<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text_topic;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\DP_tu_student;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Auth\LoginController;


class API_TU_Greats extends Controller
{
    public function api_tu(Request $request)
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $name_split = explode(" ",$data['name']);
        $data['name'] = $name_split[0];
        $data['last_name'] = $name_split[1];

        DP_tu_student::firstOrCreate($data);

        $message = "Completed";

        return $message ;
    }

}
