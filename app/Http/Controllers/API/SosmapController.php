<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sos_map;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Mylog;
use App\Models\Partner;
use App\Http\Controllers\API\API_Time_zone;

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

    public function submit_score($sos_map_id , $score_1 , $score_2 , $total_score , $comment_help)
    {
        $data_sos_map = Sos_map::findOrFail($sos_map_id);

        if (empty($data_sos_map->score_impression)) {
            DB::table('sos_maps')
                ->where('id', $sos_map_id)
                ->update([
                    'score_impression' => $score_1,
                    'score_period' => $score_2,
                    'score_total' => number_format($total_score,2),
                    'comment_help' => $comment_help,
            ]);
        }
    }


}
