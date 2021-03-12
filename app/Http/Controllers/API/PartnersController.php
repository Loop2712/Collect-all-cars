<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}