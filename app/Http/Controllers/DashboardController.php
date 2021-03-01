<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarModel;
use App\Models\Register_car;
use App\Models\Guest;
use App\Models\News;
use App\Models\Motercycle;
use Illuminate\Support\Facades\DB;

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

        // ลงทะเบียน Vmove 28 วันที่ผ่านมา
        $vmove28 =Register_car::whereDate('created_at',">=" , $day28)
	            ->selectRaw('count(id) as count')
	            ->get();
	            foreach ($vmove28 as $key ) {
				        	$new_vmove = $key->count;
				        } 
	    $all_vmove =Register_car::selectRaw('count(id) as count')
                    	->get();
	            foreach ($all_vmove as $key ) {
				        	$count_vmove = $key->count;
				        } 

        // Vmove Report 28 วันที่ผ่านมา
        $vmove_report28 =Guest::whereDate('created_at',">=" , $day28)
	            ->selectRaw('count(id) as count')
	            ->get();
	            foreach ($vmove_report28 as $key ) {
				        	$new_vmove_report = $key->count;
				        } 
	    $all_vmove_report =Guest::selectRaw('count(id) as count')
                    	->get();
	            foreach ($all_vmove_report as $key ) {
				        	$count_vmove_report = $key->count;
				        } 

         // V News 28 วันที่ผ่านมา
        $vnews28 =News::whereDate('created_at',">=" , $day28)
	            ->selectRaw('count(id) as count')
	            ->get();
	            foreach ($vnews28 as $key ) {
				        	$new_vnews = $key->count;
				        } 
	    $all_vnews =News::selectRaw('count(id) as count')
                    	->get();
	            foreach ($all_vnews as $key ) {
				        	$count_vnews = $key->count;
				        }

		// รถที่ลงประกาศขาย จัดอันดับตามจังหวัด 5 อันดับ (Car)
		$vmarket_desc =CarModel::groupBy('location')
			->selectRaw('count(location) as count,location')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $vmarket_desc_location[0] = "";
        $vmarket_desc_location[1] = "";
        $vmarket_desc_location[2] = "";
        $vmarket_desc_location[3] = "";
        $vmarket_desc_location[4] = "";
        $vmarket_desc_count[0] = "";
        $vmarket_desc_count[1] = "";
        $vmarket_desc_count[2] = "";
        $vmarket_desc_count[3] = "";
        $vmarket_desc_count[4] = "";

        for ($i=0; $i < count($vmarket_desc);) { 
            foreach($vmarket_desc as $item ){
                $vmarket_desc_location[$i] = $item->location;
                $vmarket_desc_count[$i] = $item->count;

                $i++;
            }
        }

        // รถที่ลงประกาศขาย จัดอันดับตามจังหวัด 5 อันดับ (Motorcycle)
        $vmotercycle_desc =Motercycle::groupBy('location')
            ->selectRaw('count(location) as count,location')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $vmotercycle_desc_location[0] = "";
        $vmotercycle_desc_location[1] = "";
        $vmotercycle_desc_location[2] = "";
        $vmotercycle_desc_location[3] = "";
        $vmotercycle_desc_location[4] = "";
        $vmarket_desc_count[0] = "";
        $vmotercycle_desc_count[1] = "";
        $vmotercycle_desc_count[2] = "";
        $vmotercycle_desc_count[3] = "";
        $vmotercycle_desc_count[4] = "";

        for ($i=0; $i < count($vmotercycle_desc);) { 
            foreach($vmotercycle_desc as $item ){
                $vmotercycle_desc_location[$i] = $item->location;
                $vmotercycle_desc_count[$i] = $item->count;

                $i++;
            }
        }

        // รถลงทะเบียน VMove จัดอันดับตามจังหวัด 5 อันดับ
        $vmove_desc =Register_car::groupBy('location')
			->selectRaw('count(location) as count,location')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $vmove_desc_province[0] = "";
        $vmove_desc_province[1] = "";
        $vmove_desc_province[2] = "";
        $vmove_desc_province[3] = "";
        $vmove_desc_province[4] = "";
        $vmove_desc_count[0] = "";
        $vmove_desc_count[1] = "";
        $vmove_desc_count[2] = "";
        $vmove_desc_count[3] = "";
        $vmove_desc_count[4] = "";

        for ($i=0; $i < count($vmove_desc);) { 
            foreach($vmove_desc as $item ){
                $vmove_desc_province[$i] = $item->location;
                $vmove_desc_count[$i] = $item->count;

                $i++;
            }
        }

        // VNews ลงประกาศข่าว
        $vnews_desc =News::groupBy('province')
            ->selectRaw('count(province) as count,province')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $vnews_desc_province[0] = "";
        $vnews_desc_province[1] = "";
        $vnews_desc_province[2] = "";
        $vnews_desc_province[3] = "";
        $vnews_desc_province[4] = "";
        $vnews_desc_count[0] = "";
        $vnews_desc_count[1] = "";
        $vnews_desc_count[2] = "";
        $vnews_desc_count[3] = "";
        $vnews_desc_count[4] = "";

        for ($i=0; $i < count($vnews_desc);) { 
            foreach($vnews_desc as $item ){
                $vnews_desc_province[$i] = $item->province;
                $vnews_desc_count[$i] = $item->count;

                $i++;
            }
        }

        // GUEST รายงานหาเจ้าของรถ
        $guest = Guest::groupBy('provider_id')
                    ->groupBy('user_id')
                    ->groupBy('name')
                    ->selectRaw('count(provider_id) as count , name , user_id')
                    ->orderByRaw('count DESC')
                    ->latest()->paginate(5);


        return view('admin_viicheck.dashboard', compact('all_user' , 'count_line' , 'count_facebook' , 'count_google' , 'count_web','new_car' , 'count_car' , 'new_vmove' , 'count_vmove' , 'new_vmove_report' , 'count_vmove_report' , 'new_vnews' , 'count_vnews' , 'vmarket_desc' , 'vmarket_desc_location' , 'vmarket_desc_count' , 'vmove_desc_province' , 'vmove_desc_count', 'vnews_desc_province' , 'vnews_desc_count' , 'guest' , 'vmotercycle_desc_location' , 'vmotercycle_desc_count'));
    }
}
