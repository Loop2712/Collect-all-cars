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
    
    public function sos_helper($id_sos_map , $id_organization_helper)
    {
        $data_sos_map = Sos_map::findOrFail($id_sos_map);
        $data_partner_helpers = Partner::findOrFail($id_organization_helper);

        if(Auth::check()){

            $user = Auth::user();

            if (!empty($data_sos_map->helper)) {
                DB::table('sos_maps')
                    ->where('id', $id_sos_map)
                    ->update([
                        'helper' => $data_sos_map->helper . ',' . $user->name,
                        'helper_id' => $data_sos_map->helper_id . ',' . $user->id,
                        'organization_helper' => $data_sos_map->organization_helper . ',' . $data_partner_helpers->name,
                ]);
            }else {
                DB::table('sos_maps')
                    ->where('id', $id_sos_map)
                    ->update([
                        'helper' => $user->name,
                        'helper_id' => $user->id,
                        'organization_helper' => $data_partner_helpers->name,
                ]);
            }

            $this->_send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user->name);
            return view('close_browser');

        }else{
            return redirect('/login/line?redirectTo=/sos_map/helper_after_login' . '/' . $id_sos_map . '/' . $id_organization_helper);
        }

    }

    public function sos_helper_after_login($id_sos_map , $id_organization_helper)
    {
        $data_partner_helpers = DB::table('partners')->where('id', $id_organization_helper)->get();
        foreach ($data_partner_helpers as $data_partner) {
                $name_partner_helper = $data_partner->name ;
            }

        $user = Auth::user();

        DB::table('sos_maps')
              ->where('id', $id_sos_map)
              ->update([
                'helper' => $user->name,
                'helper_id' => $user->id,
                'organization_helper' => $name_partner_helper,
        ]);

        $this->_send_helper_to_groupline($area);

        return view('close_browser');
    }

    

    protected function _send_helper_to_groupline($data_sos_map , $data_partner_helpers , $user_name)
    {   

        echo "<pre>";
        print_r($data_partner_helpers);
        echo "<pre>";
        exit();

        // $data_line_group = DB::table('group_lines')->where('groupName', )->get();

        // foreach ($data_line_group as $key) {
        //     $groupId = $key->groupId ;
        //     $name_time_zone = $key->time_zone ;
        //     $group_language = $key->language ;
        // }

        // // TIME ZONE
        // $API_Time_zone = new API_Time_zone();
        // $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        // $data_topic = [
        //             "ขอความช่วยเหลือ",
        //             "เวลา",
        //             "จาก",
        //             "โทร",
        //             "รูปภาพสถานที่",
        //         ];

        // for ($xi=0; $xi < count($data_topic); $xi++) { 

        //     $text_topic = DB::table('text_topics')
        //             ->select($group_language)
        //             ->where('th', $data_topic[$xi])
        //             ->where('en', "!=", null)
        //             ->get();

        //     foreach ($text_topic as $item_of_text_topic) {
        //         $data_topic[$xi] = $item_of_text_topic->$group_language ;
        //     }
        // }

        // $template_path = storage_path('../public/json/ask_for_help.json');
        // $string_json = file_get_contents($template_path);
           
        // $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
        // $string_json = str_replace("datetime",$time_zone,$string_json);

        // $messages = [ json_decode($string_json, true) ];

        // $body = [
        //     "to" => $groupId,
        //     "messages" => $messages,
        // ];

        // $opts = [
        //     'http' =>[
        //         'method'  => 'POST',
        //         'header'  => "Content-Type: application/json \r\n".
        //                     'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
        //         'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
        //         //'timeout' => 60
        //     ]
        // ];
                            
        // $context  = stream_context_create($opts);
        // $url = "https://api.line.me/v2/bot/message/push";
        // $result = file_get_contents($url, false, $context);

        // // SAVE LOG
        // $data = [
        //     "title" => "send_helper_to_groupline",
        //     "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
        // ];
        // MyLog::create($data);
        
    }

}
