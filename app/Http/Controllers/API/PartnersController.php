<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailToPartner_area;

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

    public function sos_area($area_arr,$name_partner)
    {
        DB::table('partners')
              ->where('name', $name_partner)
              ->update([
                'new_sos_area' => $area_arr,
        ]);

        return $name_partner ;
        
    }

    public function area_pending($name_partner)
    {
        $data_partners = DB::table('partners')
              ->where('name', $name_partner)
              ->get();

        foreach ($data_partners as $key) {
            $area_pending = $key->new_sos_area ;
        }

        return $area_pending ;
        
    }

    public function area_current($name_partner)
    {
        $data_partners = DB::table('partners')
              ->where('name', $name_partner)
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

    public function area_other($id_user)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $area_other = DB::table('partners')
                ->where("name","!=", $key->organization)
                ->get();

        }

        return $area_other ;
    }

    public function your_old_area($id_user)
    {
        $data_user = DB::table('users')
                ->where("id", $id_user)
                ->get();

        foreach ($data_user as $key ) {

            $area_other = DB::table('partners')
                ->where("name", $key->organization)
                ->get();

        }

        return $area_other ;
    }

    public function check_area_other($id_partnet)
    {
        $area_other = DB::table('partners')
            ->where("id","!=", $id_partnet)
            ->get();

        return $area_other ;
    }
}