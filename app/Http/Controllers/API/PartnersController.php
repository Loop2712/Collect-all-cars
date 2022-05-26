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
use App\Models\Check_in;
use App\Models\Partner;
use App\Models\Group_line;
use App\Models\Time_zone;
use App\Models\Disease;

class PartnersController extends Controller
{
    public function search_time_zone()
    {
        $data_time_zone = Time_zone::where("CountryCode", "!=" , null)
            ->orderBy('TimeZone', 'ASC')
            ->get();

        return $data_time_zone;
    }

    public function check_data_partner($user_organization)
    {
        $data_partners = Partner::where("name", $user_organization)
            ->where("name_area", null)
            ->get();

        return $data_partners;
    }

    public function check_data_line_group($group_line_id)
    {
        $data_line_group = Group_line::where("id", $group_line_id)
            ->get();

        return $data_line_group;
    }

    public function all_group_line($user_organization)
    {
        $data_partners_groupline = Partner::where("name", $user_organization)
            ->where("name_area", "!=" ,null)
            ->get();

        return $data_partners_groupline;
    }

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
        $data_partners = DB::table('partners')
          ->where('name', $name_partner)
          ->where('name_area', $name_area)
          ->get();

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

    public function change_color_navbar($color_navbar , $partner)
    {
        $color_navbar = str_replace("_","#",$color_navbar);
        $partner = str_replace("_"," ",$partner);

        DB::table('partners')
              ->where('name', $partner)
              ->where("name_area", null)
              ->update([
                'color_navbar' => $color_navbar,
        ]);

        return $color_navbar ;
    }

    public function change_color_menu($color_menu , $partner , $class_color_menu)
    {
        $color_menu = str_replace("_","#",$color_menu);
        if ($color_menu == "#null") {
            $color_menu = null ;
        }

        $partner = str_replace("_"," ",$partner);

        DB::table('partners')
              ->where('name', $partner)
              ->where("name_area", null)
              ->update([
                'color' => $color_menu,
                'class_color_menu' => $class_color_menu,
        ]);

        return $color_menu ;
    }

    public function area_other($id_user , $name_area)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $area_other = DB::table('partners')
                ->where("name","!=", $key->organization)
                ->where("name_area","!=", null)
                ->get();

        }

        return $area_other ;
    }

    public function area_partner_other($id_user , $name_area)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $area_partner_other = DB::table('partners')
                ->where("name", $key->organization)
                ->where("name_area","!=", $name_area)
                ->get();

        }

        return $area_partner_other ;
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

    public function all_area_partner($name_partner)
    {
        $data_partners = DB::table('partners')
            ->where('name', $name_partner)
            ->where('name_area', '!=' , null)
            ->where('sos_area', '!=' , null)
            ->get();

        return $data_partners ;
    }

    public function send_pass_area($line_group , $num_pass_area)
    {
        $data_line_group = DB::table('group_lines')
                            ->where("groupName", $line_group)
                            ->get();

        $this->send_pass_area_togroupline($data_line_group , $num_pass_area);

        return $data_line_group ;
    }

    public function submit_group_line($line_group ,$id_partner )
    {
        $data_line_group = DB::table('group_lines')
                            ->where("groupName", $line_group)
                            ->get();

        foreach ($data_line_group as $key ) {
            DB::table('partners')
                ->where('id', $id_partner)
                ->update([
                    'line_group' => $line_group,
                    'group_line_id' => $key->id,
            ]);
        }
        
        $data_partner = Partner::where("id" , $id_partner)->get();

        foreach ($data_partner as $item) {
            DB::table('group_lines')
                ->where('groupName', $line_group)
                ->update([
                    'owner' => $item->name . " (Partner)",
                    'partner_id' => $id_partner,
            ]);
        }

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

    public function check_sos_alarm($check_name_partner)
    {
        $data_sos_map = DB::table('sos_maps')
                        ->where("area",'LIKE', "%$check_name_partner%")
                        ->where("helper", null)
                        ->get();

        return $data_sos_map ;
    }

    public function check_sos_alarm_notify($check_name_partner)
    {
        $data_sos_map = DB::table('sos_maps')
                        ->where("area",'LIKE', "%$check_name_partner%")
                        ->where("helper", null)
                        ->get();

        foreach ($data_sos_map as $key) {
            $data_name_sp = explode("&",$key->area);
        }

        if (!empty($data_name_sp[1])) {
            $num_helper = 2 ;
        }else{
            $num_helper = 1 ;
        }

        $notify = DB::table('sos_maps')
                        ->where("area",'LIKE', "%$check_name_partner%")
                        ->where("helper", null)
                        ->Where("notify", 'not like', "%$num_helper%")
                        ->get();

        foreach ($notify as $item) {

            $num_noti = $item->notify ;
            
            $total = (int)$num_noti + 1;

            DB::table('sos_maps')
                ->where('id', $item->id)
                ->update([
                        'notify' => $total ,
            ]);
        }

        // return $notify ;
    }

    public function search_std($student_id , $check_in_at, $name_area)
    {
        if ($name_area == "all") {
            $data = DB::table('users')
                ->join('check_ins', 'users.id', '=', 'check_ins.user_id')
                ->select('users.*')
                ->where("check_ins.check_in_at",'LIKE', "%$check_in_at%")
                ->where("users.student_id" , 'LIKE', "%$student_id%")
                ->groupBy('users.id')
                ->get();
        }else{
            $data = DB::table('users')
                ->join('check_ins', 'users.id', '=', 'check_ins.user_id')
                ->select('users.*')
                ->where("check_ins.partner_id", $name_area)
                ->where("users.student_id" , 'LIKE', "%$student_id%")
                ->groupBy('users.id')
                ->get();
        }

        return $data ;
    }

    public function search_name($name , $check_in_at, $name_area)
    {
        if ($name_area == "all") {
            $data = DB::table('users')
                ->join('check_ins', 'users.id', '=', 'check_ins.user_id')
                ->select('users.*')
                ->where("check_ins.check_in_at",'LIKE', "%$check_in_at%")
                ->where("users.name_staff" , 'LIKE', "%$name%")
                ->groupBy('users.id')
                ->get();
        }else{
            $data = DB::table('users')
                ->join('check_ins', 'users.id', '=', 'check_ins.user_id')
                ->select('users.*')
                ->where("check_ins.partner_id", $name_area)
                ->where("users.name_staff" , 'LIKE', "%$name%")
                ->groupBy('users.id')
                ->get();
        }

        

        return $data ;
    }
    public function show_group_risk($user_id , $check_in_at, $name_area ,$name_disease)
    {
        DB::table('users')
          ->where('id', $user_id)
          ->update([
            'check_covid' => "Yes",
        ]);

        $data_all_date = array();
        $uesr_risk_groups = array();
        $data_user_risk_groups = array();

        if ($name_area == "all") {
            
            $groupBy_date = check_in::where("user_id" , $user_id)
                ->where("check_in_at",'LIKE', "%$check_in_at%")
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->get();

            $i = 0 ;

            foreach ($groupBy_date as $key) {
                
                $time_in = "07:00:00";
                $time_out = "19:00:00";
                // echo "<br>";
                // echo date("Y/m/d" , strtotime($key->created_at ));

                $time_in_of_date = check_in::where("user_id" , $user_id)
                    ->select('time_in')
                    ->where("check_in_at",'LIKE', "%$check_in_at%")
                    ->where("time_in", "!=" , null)
                    ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                    ->orderBy('time_in', 'desc')
                    ->get();

                foreach ($time_in_of_date as $item) {

                    $time_in = $item->time_in;
                }

                $time_out_of_date = check_in::where("user_id" , $user_id)
                    ->select('time_out')
                    ->where("check_in_at",'LIKE', "%$check_in_at%")
                    ->where("time_out", "!=" , null)
                    ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                    ->orderBy('time_out', 'desc')
                    ->get();

                foreach ($time_out_of_date as $item) {

                    $time_out = $item->time_out;
                }

                $data_all_date[$i] = [
                    "date" => date("Y/m/d" , strtotime($key->created_at )),
                    "time_in" => date("H:i" , strtotime($time_in)),
                    "time_out" => date("H:i" , strtotime($time_out)),
                ];

                $i++ ;
                $time_in = "";
                $time_out = "";
            }

            for ($ii=0; $ii < count($data_all_date); $ii++) {
                
                $date_time_in =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_in'] ;
                $date_time_in = date("Y/m/d H:i" , strtotime($date_time_in) - 60*60 );

                $date_time_out =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_out'] ;
                $date_time_out = date("Y/m/d H:i" , strtotime($date_time_out) + 60*60 );

                $risk_groups = check_in::where("user_id" ,"!=" , $user_id)
                    ->where("check_in_at",'LIKE', "%$check_in_at%")
                    ->whereBetween('created_at', [$date_time_in, $date_time_out])
                    ->groupBy('user_id')
                    ->get();

                foreach ($risk_groups as $risk_group) {
                    array_push($uesr_risk_groups , $risk_group->user_id);
                }
            }


            for ($y=0; $y < count($uesr_risk_groups); $y++) { 

                $data_users = DB::table('users')
                    ->where("users.id" , $uesr_risk_groups[$y])
                    ->get();

                    foreach ($data_users as $data_user) {
                        if (!empty($data_user->name_staff)) {
                            $na_name = $data_user->name_staff ;
                        }else{
                            $na_name = $data_user->name ;
                        }
                        $data_user_risk_groups[$y] = [
                            "id" => $data_user->id,
                            "name" => $na_name,
                            "phone" => $data_user->phone,
                            "student_id" => $data_user->student_id,
                            "check_in_at" => $check_in_at,
                            "name_area" => $name_area,
                            "name_disease" => $name_disease,
                        ];
                    }
            }

        }else{ // มี name_area
            
            $groupBy_date = check_in::where("user_id" , $user_id)
                ->where("partner_id", $name_area)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->get();

            $i = 0 ;

            foreach ($groupBy_date as $key) {
                
                $time_in = "07:00:00";
                $time_out = "19:00:00";
                // echo "<br>";
                // echo date("Y/m/d" , strtotime($key->created_at ));

                $time_in_of_date = check_in::where("user_id" , $user_id)
                    ->select('time_in')
                    ->where("partner_id", $name_area)
                    ->where("time_in", "!=" , null)
                    ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                    ->orderBy('time_in', 'desc')
                    ->get();

                foreach ($time_in_of_date as $item) {

                    $time_in = $item->time_in;
                }

                $time_out_of_date = check_in::where("user_id" , $user_id)
                    ->select('time_out')
                    ->where("partner_id", $name_area)
                    ->where("time_out", "!=" , null)
                    ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                    ->orderBy('time_out', 'desc')
                    ->get();

                foreach ($time_out_of_date as $item) {

                    $time_out = $item->time_out;
                }

                $data_all_date[$i] = [
                    "date" => date("Y/m/d" , strtotime($key->created_at )),
                    "time_in" => date("H:i" , strtotime($time_in)),
                    "time_out" => date("H:i" , strtotime($time_out)),
                ];

                $i++ ;
                $time_in = "";
                $time_out = "";
            }

            for ($ii=0; $ii < count($data_all_date); $ii++) {
                
                $date_time_in =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_in'] ;
                $date_time_in = date("Y/m/d H:i" , strtotime($date_time_in) - 60*60 );

                $date_time_out =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_out'] ;
                $date_time_out = date("Y/m/d H:i" , strtotime($date_time_out) + 60*60 );

                $risk_groups = check_in::where("user_id" ,"!=" , $user_id)
                    ->where("partner_id", $name_area)
                    ->whereBetween('created_at', [$date_time_in, $date_time_out])
                    ->groupBy('user_id')
                    ->get();

                foreach ($risk_groups as $risk_group) {
                    array_push($uesr_risk_groups , $risk_group->user_id);
                }
            }


            for ($y=0; $y < count($uesr_risk_groups); $y++) { 

                $data_users = DB::table('users')
                    ->where("users.id" , $uesr_risk_groups[$y])
                    ->get();

                    foreach ($data_users as $data_user) {
                        if (!empty($data_user->name_staff)) {
                            $na_name = $data_user->name_staff ;
                        }else{
                            $na_name = $data_user->name ;
                        }

                        $data_user_risk_groups[$y] = [
                            "id" => $data_user->id,
                            "name" => $na_name,
                            "phone" => $data_user->phone,
                            "student_id" => $data_user->student_id,
                            "check_in_at" => $check_in_at,
                            "name_area" => $name_area,
                            "name_disease" => $name_disease,

                        ];
                    }
            }

        }

        return $data_user_risk_groups ;
    }

    public function send_risk_group()
    {
        
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $count_user = count($data);
        $check_in_at = $data[0]['check_in_at'] ;
        $name_area = $data[0]['name_area'] ;
        $name_disease = $data[0]['name_disease'] ;

        for ($i=0; $i < $count_user ; $i++) {

            $user_id = $data[$i]['id'] ;

            $users = DB::table('users')
                ->where('id', $user_id)
                ->where('type' , 'line')
                ->where('send_covid' , null)
                ->get();

            foreach ($users as $user) {

                $user_language = $user->language ;

                if ($name_area == "all") {
                    $data_in_outs = check_in::where('user_id', $user->id)
                        ->where('check_in_at','LIKE', "%$check_in_at%")
                        ->latest()
                        ->take(3)
                        ->get();

                    $location_check_in = $check_in_at ;

                }else{
                    $data_in_outs = check_in::where('user_id', $user->id)
                        ->where("partner_id", $name_area)
                        ->latest()
                        ->take(3)
                        ->get();

                    $data_name_areas = Partner::where('id' , $name_area)->get();
                    foreach ($data_name_areas as $data_name_area) {
                        $text_name_area = $data_name_area->name_area ;
                    }

                    $location_check_in = $check_in_at . ' - ' . $text_name_area ;

                    $data_disease['name'] = $name_disease;
                    Disease::firstOrCreate($data_disease);
                }

                $zx=0;
                foreach ($data_in_outs as $data_in_out ) {

                    if (!empty($data_in_out->created_at)) {
                        $text_time[$zx] = date("d/m/Y H:i" , strtotime($data_in_out->created_at)) ;
                    }else{
                        $text_time[$zx] = "" ;
                    }

                    $zx = $zx + 1 ;    
                }

                if (!empty($text_time[0])) {
                   $text_time_1 = $text_time[0] ;
                }else{
                    $text_time_1 = "-" ;
                }

                if (!empty($text_time[1])) {
                   $text_time_2 = $text_time[1] ;
                }else{
                    $text_time_2 = "-" ;
                }

                if (!empty($text_time[2])) {
                   $text_time_3 = $text_time[2] ;
                }else{
                    $text_time_3 = "-" ;
                }

                // TIME ZONE
                // $API_Time_zone = new API_Time_zone();
                // $time_zone = $API_Time_zone->change_Time_zone($user->time_zone);

                if ($name_disease == 'covid') {
                    $data_topic = [
                            "เรียนคุณ",
                            "ด้วยสถานการณ์การระบาดของ Coronavirus Disease 2019 (COVID -19) ขณะนี้ท่านอยู่ในกลุ่มเสี่ยง",
                            "เนื่องจาก ท่านได้ Scan เข้าพื้นที่",
                            "จึงขอความร่วมมือในการปฏิบัติตามมาตราการเร่งด่วนในการป้องกันและควบคุมโรคติดต่อไวรัสโคโรนา กรุณาทำการตรวจเช็คและเฝ้าระวังตามพระราชบัญญัติโรคติดต่อ พ.ศ.2558",
                            "วัน / เวลา",
                            $name_disease,
                        ];
                }else{
                    $data_topic = [
                            "เรียนคุณ",
                            "ขณะนี้มีการระบาดของ",
                            "เนื่องจาก ท่านได้ Scan เข้าพื้นที่",
                            "จึงขอความร่วมมือในการปฏิบัติตามมาตราการเร่งด่วนในการป้องกันและควบคุมโรคติดต่อกรุณาทำการตรวจเช็คและเฝ้าระวังตามพระราชบัญญัติโรคติดต่อ พ.ศ.2558",
                            "วัน / เวลา",
                            $name_disease,
                        ];
                }


                for ($xi=0; $xi < count($data_topic); $xi++) { 

                    $text_topic = DB::table('text_topics')
                            ->select($user_language)
                            ->where('th', $data_topic[$xi])
                            ->where('en', "!=", null)
                            ->get();

                    foreach ($text_topic as $item_of_text_topic) {
                        $data_topic[$xi] = $item_of_text_topic->$user_language ;
                    }
                }

                $template_path = storage_path('../public/json/risk_group.json');
                $string_json = file_get_contents($template_path);
                // users 
                $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                $string_json = str_replace("เรียนคุณ",$data_topic[0],$string_json);
                $string_json = str_replace("check_in_area",$location_check_in,$string_json);
                $string_json = str_replace("xxx",$user->name,$string_json);

                $string_json = str_replace("text_00",$data_topic[1],$string_json);
                $string_json = str_replace("text_02",$data_topic[2],$string_json);
                $string_json = str_replace("text_03",$data_topic[3],$string_json);
                $string_json = str_replace("ตามวัน / เวลาด้านล่าง",$data_topic[4],$string_json);
                $string_json = str_replace("text_01",$data_topic[5],$string_json);

                $string_json = str_replace("text_time_1",$text_time_1,$string_json);
                $string_json = str_replace("text_time_2",$text_time_2,$string_json);
                $string_json = str_replace("text_time_3",$text_time_3,$string_json);
                

                $messages = [ json_decode($string_json, true) ];

                $body = [
                    "to" => $user->provider_id,
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
                $data_2 = [
                    "title" => "คุณคือกลุ่มเสี่ยง",
                    "content" => $user->name . 'คือกลุ่มเสี่ยง',
                ];
                MyLog::create($data_2);

                $date_now = date("Y-m-d");

                DB::table('users')
                    ->where('id', $user->id)
                    ->where('type' , 'line')
                      ->update([
                        'send_covid' => $date_now,
                ]);
            }


        }

        return $count_user;
    }

    function input_data_partner($name_partner)
    {
        $data = Partner::where('name_area', null )->where('name' , $name_partner)->get();

        return $data ;
    }

}