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
        $data_partners = DB::table('partners')
            ->where('name_area' , '!=' , null)
            ->get();

        return $data_partners ;
    }

    public function area_condo_id($condo_id)
    {
        $data_partners = DB::table('partners')
            ->where('name_area' , '!=' , null)
            ->where('type_partner' , 'condo')
            ->where('condo_id' , $condo_id)
            ->get();

        return $data_partners ;
    }

    public function submit_score($sos_map_id , $score_1 , $score_2 , $total_score , $comment_help)
    {
        $data_sos_map = Sos_map::findOrFail($sos_map_id);

        if ($comment_help == 'null') {
            $comment_help = null ;
        }

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

    public function submit_add_photo()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $sos_map_id = $data['sos_map_id'];
        $text_img = $data['text_img'];
        $id_officer = $data['id_officer'];
        $remark = $data['remark'];

        if (!empty($text_img)) {

            $name_file_img = uniqid('photo_sos_succeed-', true);
            $output_file_img = "./storage/uploads/".$name_file_img.".png";

            $data_64_img = explode( ',', $text_img );

            $fp_img = fopen($output_file_img, "w+");
     
            fwrite($fp_img, base64_decode( $data_64_img[ 1 ] ) );
             
            fclose($fp_img);

            $url_img_sos = str_replace("./storage/","",$output_file_img);
            $img_photo_succeed = $url_img_sos ;
        }

        $data_sos_map = Sos_map::findOrFail($sos_map_id);

        if ($remark == 'null') {
            $remark = null ;
        }

        if (empty($data_sos_map->photo_succeed)) {
            DB::table('sos_maps')
                ->where('id', $sos_map_id)
                ->update([
                    'photo_succeed' => $img_photo_succeed,
                    'photo_succeed_by' => $id_officer,
                    'remark' => $remark,
            ]);
        }

        return "submit_add_photo ok" ;
    }

    function input_pls_input_phone($phone , $user_id){
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'phone' => $phone,
        ]);

        return "OK" ;
    }


}
