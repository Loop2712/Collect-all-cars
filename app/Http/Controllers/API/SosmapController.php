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
        $data_sos_map = DB::table('sos_maps')->where('id' , $id_sos_map)->get();
        foreach ($data_sos_map as $item) {
            $helper_old = $item->helper;
            $helper_id_old = $item->helper_id;
            $area = $item->area;
        }

        // เช็คว่ามีคนกดรับหรือยัง
        if (!empty($helper_old)) {
            // มีแล้ว
            $data_helper_old = DB::table('users')->where('id' , $helper_id_old)->get();
            $this->_send_notempty_helper($area , $data_helper_old);
        }else {
            // ยังไม่มี
            if(Auth::check()){

                $user = Auth::user();

                DB::table('sos_maps')
                      ->where('id', $id_sos_map)
                      ->update([
                        'helper' => $user->name,
                        'helper_id' => $user->id,
                ]);

                // $this->_send_helper_to_groupline($area);

                return view('close_browser');

            }else{
                return redirect('/login/line?redirectTo=/sos_map/helper_after_login' . '/' . $id_sos_map);
            }
        }
        
    }

    public function sos_helper_after_login($id_sos_map)
    {
        $user = Auth::user();

        DB::table('sos_maps')
              ->where('id', $id_sos_map)
              ->update([
                'helper' => $user->name,
                'helper_id' => $user->id,
        ]);

        // $this->_send_helper_to_groupline($area);

        return view('close_browser');
    }

    protected function _send_notempty_helper($area , $data_helper_old)
    {   
        // $data_name_sp = explode("&",$area);

        // for ($i=0; $i < count($data_name_sp); $i++) { 
            
        //     $data_name_sp[$i] = str_replace("amp; ","",$data_name_sp[$i]);

        //     $data_partners = DB::table('partners')->where('name', $data_name_sp[$i])->get();

        //     foreach ($data_partners as $data_partner) {
        //         $name_partner = $data_partner->name ;
        //         $name_line_group = $data_partner->line_group ;
        //         $mail_partner = $data_partner->mail ;
        //     }

        //     $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

        //     foreach ($data_line_group as $key) {
        //         $groupId = $key->groupId ;
        //         $name_time_zone = $key->time_zone ;
        //         $group_language = $key->language ;
        //     }

        //     // TIME ZONE
        //     $API_Time_zone = new API_Time_zone();
        //     $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        //     $data_topic = [
        //                 "เจ้าหน้าที่",
        //                 "จาก",
        //                 "กำลังเดินทางไปยังพิกัดแล้ว ท่านสามารถตามไปสบทบเพื่อให้การช่วยเหลือได้เลยครับ",
        //             ];

        //     for ($xi=0; $xi < count($data_topic); $xi++) { 

        //         $text_topic = DB::table('text_topics')
        //                 ->select($group_language)
        //                 ->where('th', $data_topic[$xi])
        //                 ->where('en', "!=", null)
        //                 ->get();

        //         foreach ($text_topic as $item_of_text_topic) {
        //             $data_topic[$xi] = $item_of_text_topic->$group_language ;
        //         }
        //     }

            $template_path = storage_path('../public/json/helper_old.json');
            $string_json = file_get_contents($template_path);
               
            $string_json = str_replace("ตัวอย่าง","...",$string_json);
            $string_json = str_replace("เจ้าหน้าที่",$data_topic[0],$string_json);
            $string_json = str_replace("จาก",$data_topic[1],$string_json);
            $string_json = str_replace("กำลังเดินทางไปยังพิกัดแล้ว",$data_topic[2],$string_json);

            $string_json = str_replace("date_time",$time_zone,$string_json);
            
            // foreach ($data_helper_old as $item_of_helper) {
            //     $string_json = str_replace("name_helper",$item_of_helper->name,$string_json);
            //     $string_json = str_replace("2B-Green",$item_of_helper->organization,$string_json);
            // }
            
            $messages = [ json_decode($string_json, true) ];

            $body = [
                // "to" => $groupId,
                "to" => 'C2a91e25b955f856b09454a7e8a7ec52b',
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            // SAVE LOG
            $data = [
                "title" => "ข้อมูลขอความช่วยเหลือ" . $name_partner ,
                "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            ];
            MyLog::create($data);

        // }
        
    }

    protected function _send_helper_to_groupline($area)
    {   
        $data_name_sp = explode("&",$area);

        for ($i=0; $i < count($data_name_sp); $i++) { 
            
            $data_name_sp[$i] = str_replace("amp; ","",$data_name_sp[$i]);

            $data_partners = DB::table('partners')->where('name', $data_name_sp[$i])->get();

            foreach ($data_partners as $data_partner) {
                $name_partner = $data_partner->name ;
                $name_line_group = $data_partner->line_group ;
                $mail_partner = $data_partner->mail ;
            }

            $data_line_group = DB::table('group_lines')->where('groupName', $name_line_group)->get();

            foreach ($data_line_group as $key) {
                $groupId = $key->groupId ;
                $name_time_zone = $key->time_zone ;
                $group_language = $key->language ;
            }

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

            $data_topic = [
                        "ขอความช่วยเหลือ",
                        "เวลา",
                        "จาก",
                        "โทร",
                        "รูปภาพสถานที่",
                    ];

            for ($xi=0; $xi < count($data_topic); $xi++) { 

                $text_topic = DB::table('text_topics')
                        ->select($group_language)
                        ->where('th', $data_topic[$xi])
                        ->where('en', "!=", null)
                        ->get();

                foreach ($text_topic as $item_of_text_topic) {
                    $data_topic[$xi] = $item_of_text_topic->$group_language ;
                }
            }

            $template_path = storage_path('../public/json/ask_for_help.json');
            $string_json = file_get_contents($template_path);
               
            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
            $string_json = str_replace("datetime",$time_zone,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $groupId,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            // SAVE LOG
            $data = [
                "title" => "ขอมูลขอความช่วยเหลือ" . $name_partner ,
                "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            ];
            MyLog::create($data);

        }
        
    }

}
