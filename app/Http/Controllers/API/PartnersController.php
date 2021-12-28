<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailToPartner_area;
use App\Models\LineMessagingAPI;
use App\Http\Controllers\API\API_Time_zone;
use App\Models\Mylog;

class PartnersController extends Controller
{
    public function check_user($id_user)
    {
        $check_user = DB::select("SELECT * FROM users WHERE id = '$id_user' AND email = 'กรุณาเพิ่มอีเมล' AND role != 'null'");
        
        if (!empty($check_user)) {
        	return $check_user;
        }
    }

    public function put_email($email , $id_user , $username)
    {
        DB::table('users')
              ->where('id', $id_user)
              ->update([
                'email' => $email,
                'username' => $username,
            ]);
        return $id_user;
    }

    public function check_username($username , $id_user)
    {
        $username = DB::table('users')
              ->where('username', $username)
              ->where('id', "!=" , $id_user)
              ->get();

        if (!empty($username)) {
            return $username;
        }
        
    }

    public function check_email($email)
    {
        $email = DB::table('users')
              ->where('email', $email)
              ->get();

        if (!empty($email)) {
            return $email;
        }
        
    }

    public function sos_area($area_arr,$name_partner,$name_area)
    {
        DB::table('partners')
              ->where('name', $name_partner)
              ->where('name_area', $name_area)
              ->update([
                'new_sos_area' => $area_arr,
        ]);

        return $name_partner ;
        
    }

    public function area_pending($name_partner,$name_area)
    {
        $data_partners = DB::table('partners')
              ->where('name', $name_partner)
              ->where('name_area', $name_area)
              ->get();

        foreach ($data_partners as $key) {
            $area_pending = $key->new_sos_area ;
        }

        return $area_pending ;
        
    }

    public function area_current($name_partner,$name_area)
    {
        if (!empty($name_area)) {
            $data_partners = DB::table('partners')
              ->where('name', $name_partner)
              ->where('name_area', $name_area)
              ->get();
        }else{

            $data_partners = DB::table('partners')
              ->where('name', $name_partner)
              ->get();
        }

        foreach ($data_partners as $key) {
            $area_current = $key->sos_area ;
        }
        
        return $area_current ;
        
    }

    public function check_new_sos_area()
    {
        $data_partners = DB::table('partners')->get();

        return $data_partners ;
    }

    public function approve_area($input_new_area, $id)
    {
        DB::table('partners')
              ->where('id', $id)
              ->update([
                'sos_area' => $input_new_area,
                'new_sos_area' => null,
        ]);

        $data_partners = DB::table('partners')
            ->where('id', $id)
            ->get();

        $approve = "ได้รับการอนุมัติ เป็นที่เรียบร้อยแล้ว" ;

        foreach ($data_partners as $item) {

            $email = $item->mail;
            $mail_data = [
                    "approve" => $approve,
                    "name" => $item->name,
                    "sos_area" => $item->sos_area,
                ];

            Mail::to($email)->send(new MailToPartner_area($mail_data));

        }

        return $id ;
    }

    public function disapproved_area($id, $answer_reason, $reason_other)
    {
        DB::table('partners')
              ->where('id', $id)
              ->update([
                'new_sos_area' => null,
        ]);

        $data_partners = DB::table('partners')
            ->where('id', $id)
            ->get();

        $approve = "ยังไม่ผ่านการอนุมัติ" ;

        switch ($answer_reason) {
            case '1':
                $answer_reason = 'มีพื้นที่บางส่วนทับซ้อนหรือมีผู้ให้บริการพื้นที่นี้อยู่แล้ว' ;
                break;
            
            case '2':
                $answer_reason = 'พื้นที่บริการไม่สมเหตุสมผลกับองค์กรของท่าน' ;
                break;
        }

        foreach ($data_partners as $item) {

            $email = $item->mail;
            $mail_data = [
                    "approve" => $approve,
                    "name" => $item->name,
                    "answer_reason" => $answer_reason,
                    "reason_other" => $reason_other,
                ];

            Mail::to($email)->send(new MailToPartner_area($mail_data));

        }

        return $id ;
    }

    public function change_color_partner($color , $partner)
    {
        $color = str_replace("_","#",$color);
        $partner = str_replace("_"," ",$partner);

        DB::table('partners')
              ->where('name', $partner)
              ->update([
                'color' => $color,
        ]);

        return $color ;
    }

    public function area_other($id_user , $name_area)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $area_other = DB::table('partners')
                ->where("name_area","!=", $name_area)
                ->get();

        }

        return $area_other ;
    }

    public function your_old_area($id_user , $name_area)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $your_old_area = DB::table('partners')
                ->where("name", $key->organization)
                ->where("name_area", $name_area)
                ->get();

        }

        return $your_old_area ;
    }

    public function check_area_other($id_partnet)
    {
        $area_other = DB::table('partners')
            ->where("id","!=", $id_partnet)
            ->get();

        return $area_other ;
    }

    public function all_sos_area()
    {
        $area = DB::table('partners')->get();

        return $area ;
    }

    public function send_pass_area($line_group , $num_pass_area)
    {
        $data_line_group = DB::table('group_lines')
                            ->where("groupName", $line_group)
                            ->get();

        $this->send_pass_area_togroupline($data_line_group , $num_pass_area);

        return $data_line_group ;
    }

    public function send_pass_area_togroupline($data_line_group , $num_pass_area)
    {
        foreach ($data_line_group as $key) {
            $groupId = $key->groupId ;
            $name_time_zone = $key->time_zone ;
            $group_language = $key->language ;
        }

        // TIME ZONE
        $API_Time_zone = new API_Time_zone();
        $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

        $data_topic = [
                    "รหัสยืนยัน",
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

        $template_path = storage_path('../public/json/flex-pass_area.json');   

        $string_json = file_get_contents($template_path);
        $string_json = str_replace("รหัสยืนยัน",$data_topic[0],$string_json);
        $string_json = str_replace("1234",$num_pass_area,$string_json);
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

        //SAVE LOG
        $data = [
            "title" => "ส่งรหัสยืนยัน",
            "content" => "ส่งรหัสยืนยัน",
        ];
        MyLog::create($data);
        return $result;

    }
}