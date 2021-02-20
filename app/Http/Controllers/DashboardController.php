<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        return view('admin_viicheck.dashboard', compact('all_user' , 'count_line' , 'count_facebook' , 'count_google' , 'count_web'));
    }
}
