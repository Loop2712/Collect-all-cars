<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarModel;

class DashboardController extends Controller
{
    public function dashboard()
    {	
    	// Type User Login
        $total_user = User::selectRaw('count(id) as count')
                    	->get();
				        foreach ($total_user as $key ) {
				        	$all_user = $key->count;
				        }

        $line_user = User::selectRaw('count(id) as count')
        				->where('type', "line")
                    	->get();
                    	foreach ($line_user as $key ) {
				        	$count_line = $key->count;
				        }

        $facebook_user = User::selectRaw('count(id) as count')
        				->where('type', "facebook")
                    	->get();
                    	foreach ($facebook_user as $key ) {
				        	$count_facebook = $key->count;
				        }

        $google_user = User::selectRaw('count(id) as count')
        				->where('type', "google")
                    	->get();
                    	foreach ($google_user as $key ) {
				        	$count_google = $key->count;
				        }

        $web_user = User::selectRaw('count(id) as count')
        				->where('type', null)
                    	->get();
                    	foreach ($web_user as $key ) {
				        	$count_web = $key->count;
				        }
		// END Type User Login		       

		// รถเข้าใหม่ 28 วนที่ผ่านมา
    	$d28 = strtotime("-28 Day");
    	$day28 = date("Y-m-d ", $d28);
        $new_car_28 =CarModel::whereDate('created_at',">=" , $day28)
	            ->selectRaw('count(id) as count')
	            ->get();
	            foreach ($new_car_28 as $key ) {
				        	$new_car = $key->count;
				        } 
	    $all_car =CarModel::selectRaw('count(id) as count')
                    	->get();
	            foreach ($all_car as $key ) {
				        	$count_car = $key->count;
				        } 

        return view('admin_viicheck.dashboard', compact('all_user' , 'count_line' , 'count_facebook' , 'count_google' , 'count_web','new_car' , 'count_car'));
    }
}
