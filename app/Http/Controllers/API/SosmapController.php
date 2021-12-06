<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sos_map;
use Illuminate\Support\Facades\DB;
use Auth;

class SosmapController extends Controller
{
    public function send_sos($lat,$lng)
    {
        $user = Auth::user();

        $requestData['lat'] = $lat ;
        $requestData['lng'] = $lng ;
        $requestData['phone'] = $phone ;
        $requestData['area'] = $area_help ;
        $requestData['content'] = "help_area" ;
        $requestData['name'] = $user->name ;
        $requestData['user_id'] = $user->id ;

        Sos_map::create($requestData);

        return $requestData ;
    }

    public function all_area()
    {
        $data_partners = DB::table('partners')->get();

        return $data_partners ;
    }

    public function sos_helper($id_sos_map)
    {
        // เช็คว่ามีคนกดรับหรือยัง
        // มีแล้ว ส่งข้อความว่ามีแล้ว
        // ยังไม่มี ทำข้างล่างนี้

        if(Auth::check()){

            $user = Auth::user();


        }else{
            return redirect('/login/line?redirectTo=/sos_map/helper_after_login' . '/' . $id_sos_map);
        }

        // return $data_partners ;
    }

    public function sos_helper_after_login($id_sos_map)
    {
        
        // return $data_partners ;
    }
}
