<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarModel;
use App\Models\Register_car;
use App\Models\Guest;
use App\Models\News;
use App\Models\Report_news;
use App\Models\Motercycle;
use Illuminate\Support\Facades\DB;
use App\Models\Sos_map;

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

        // sos 28 วันที่ผ่านมา
        $sos28 =Sos_map::whereDate('created_at',">=" , $day28)
                ->selectRaw('count(id) as count')
                ->get();
                foreach ($sos28 as $key ) {
                            $new_sos = $key->count;
                        } 
        $all_sos =Sos_map::selectRaw('count(id) as count')
                        ->get();
                foreach ($all_sos as $key ) {
                            $count_sos = $key->count;
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

        // report news
        $report_news = Report_news::latest()->paginate(4);

        // GUEST รายงานหาเจ้าของรถ
        $guest = Guest::groupBy('provider_id')
                    ->groupBy('user_id')
                    ->groupBy('name')
                    ->selectRaw('count(provider_id) as count , name , user_id')
                    ->orderByRaw('count DESC')
                    ->latest()->paginate(5);

        // sos map
        $sos_all_request = Sos_map::selectRaw('count(id) as count')->get();
            foreach ($sos_all_request as $key) {
                    $sos_all = $key->count ;
                }

        $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                ->whereTime('created_at', '<=', '00:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_00 as $key) {
                $sos_time_00 = $key->count ;
            }

        $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                ->whereTime('created_at', '<=', '01:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_01 as $key) {
                $sos_time_01 = $key->count ;
            }

        $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                ->whereTime('created_at', '<=', '02:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_02 as $key) {
                $sos_time_02 = $key->count ;
            }

        $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                ->whereTime('created_at', '<=', '03:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_03 as $key) {
                $sos_time_03 = $key->count ;
            }

        $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                ->whereTime('created_at', '<=', '04:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_04 as $key) {
                $sos_time_04 = $key->count ;
            }

        $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                ->whereTime('created_at', '<=', '05:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_05 as $key) {
                $sos_time_05 = $key->count ;
            }

        $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                ->whereTime('created_at', '<=', '06:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_06 as $key) {
                $sos_time_06 = $key->count ;
            }

        $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                ->whereTime('created_at', '<=', '07:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_07 as $key) {
                $sos_time_07 = $key->count ;
            }

        $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                ->whereTime('created_at', '<=', '08:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_08 as $key) {
                $sos_time_08 = $key->count ;
            }

        $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                ->whereTime('created_at', '<=', '09:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_09 as $key) {
                $sos_time_09 = $key->count ;
            }

        $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                ->whereTime('created_at', '<=', '10:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_10 as $key) {
                $sos_time_10 = $key->count ;
            }

        $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                ->whereTime('created_at', '<=', '11:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_11 as $key) {
                $sos_time_11 = $key->count ;
            }

        $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                ->whereTime('created_at', '<=', '12:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_12 as $key) {
                $sos_time_12 = $key->count ;
            }

        $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                ->whereTime('created_at', '<=', '13:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_13 as $key) {
                $sos_time_13 = $key->count ;
            }

        $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                ->whereTime('created_at', '<=', '14:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_14 as $key) {
                $sos_time_14 = $key->count ;
            }

        $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                ->whereTime('created_at', '<=', '15:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_15 as $key) {
                $sos_time_15 = $key->count ;
            }

        $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                ->whereTime('created_at', '<=', '16:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_16 as $key) {
                $sos_time_16 = $key->count ;
            }

        $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                ->whereTime('created_at', '<=', '17:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_17 as $key) {
                $sos_time_17 = $key->count ;
            }

        $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                ->whereTime('created_at', '<=', '18:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_18 as $key) {
                $sos_time_18 = $key->count ;
            }

        $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                ->whereTime('created_at', '<=', '19:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_19 as $key) {
                $sos_time_19 = $key->count ;
            }

        $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                ->whereTime('created_at', '<=', '20:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_20 as $key) {
                $sos_time_20 = $key->count ;
            }

        $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                ->whereTime('created_at', '<=', '21:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_21 as $key) {
                $sos_time_21 = $key->count ;
            }

        $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                ->whereTime('created_at', '<=', '22:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_22 as $key) {
                $sos_time_22 = $key->count ;
            }

        $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                ->whereTime('created_at', '<=', '23:59:59')
                ->selectRaw('count(id) as count')
                ->get();
            foreach ($sos_23 as $key) {
                $sos_time_23 = $key->count ;
            }

        return view('admin_viicheck.dashboard', compact('all_user' , 'count_line' , 'count_facebook' , 'count_google' , 'count_web','new_car' , 'count_car' , 'new_vmove' , 'count_vmove' , 'new_vmove_report' , 'count_vmove_report' , 'new_vnews' , 'count_vnews' , 'vmarket_desc' , 'vmarket_desc_location' , 'vmarket_desc_count' , 'vmove_desc_province' , 'vmove_desc_count', 'vnews_desc_province' , 'vnews_desc_count' , 'guest' , 'vmotercycle_desc_location' , 'vmotercycle_desc_count' , 'report_news' , 'new_sos' , 'count_sos' ,'sos_all', 'sos_time_00','sos_time_01','sos_time_02','sos_time_03','sos_time_04','sos_time_05','sos_time_06','sos_time_07','sos_time_08','sos_time_09','sos_time_10','sos_time_11','sos_time_12','sos_time_13','sos_time_14','sos_time_15','sos_time_16','sos_time_17','sos_time_18','sos_time_19','sos_time_20','sos_time_21','sos_time_22','sos_time_23'));
    }

    public function report_register_cars(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $report_register_cars = Register_car::where('brand', 'LIKE', "%$keyword%")
                ->orWhere('generation', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('car_type', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $report_register_cars = Register_car::latest()->paginate(25);
        }

        return view('admin_viicheck.register_cars', compact('report_register_cars'));
    }

    public function add_news()
    {
        $add_news_report = news::latest()->paginate(25);

        return view('admin_viicheck.add_news_report', compact('add_news_report'));
    }

    public function guest_latest(Request $request)
    {
        $guest_latest = Guest::latest()->paginate(25);

        return view('guest.index_latest', compact('guest_latest'));
    }

     public function dashboard_sos(Request $request)
    {
        $xxxx = "56" ;

        return view('admin_viicheck.dashboard', compact('xxxx'));
    }

}
