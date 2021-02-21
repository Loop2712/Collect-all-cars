<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class Manage_userController extends Controller
{
    public function manage_user(Request $request)
    {
    	$keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $all_user = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('brith', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('ranking', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $all_user = User::latest()->paginate($perPage);
        }

        return view('admin_viicheck.user.manage_user', compact('all_user'));
    }

    public function change_ToGuest()
    {
        DB::table('users')
                ->where('id', request('id'))
                ->update(['role' => '']);

        return redirect('/manage_user');
    }

    public function change_ToAdmin()
    {
        DB::table('users')
                ->where('id', request('id'))
                ->update(['role' => 'admin']);

        return redirect('/manage_user');
    }

}