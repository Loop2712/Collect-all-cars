<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Models\Ads_content;
use Maatwebsite\Excel\Facades\Excel;
Use Carbon\Carbon;
use PDF;
use App\User;
use App\Models\Partner;
use App\Models\Check_in;
use App\Models\Guest;
use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Partner_DashboardController extends Controller
{
    function dashboard_index(Request $request)
    {
        $user_login = Auth::user();

        // เจ้าหน้าที่ในองค์กร
        $data_officer = User::where('organization', '=', $user_login->organization)->orderBy('created_at','DESC')->get();

        // ผู้ใช้ที่มาจาก API
        $data_user_from = User::where('user_from','LIKE',"%มีเงิน_จำกัด%")->get();

        // นับผู้ใช้ทั้งหมด
        $all_user = count($data_officer) + count($data_user_from);

        // นับผู้ใช้แต่ละเดือน
        $date_now = Carbon::now();
        $all_user_m = User::whereMonth('created_at', $date_now)
        ->where('organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
        ->count();

        // ช่องทางเข้าสู่ระบบ
        $count_type_login = DB::table('users')
        ->where('users.organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
        ->select('users.type', DB::raw('COUNT(*) as user_type_count'))
        ->groupBy('users.type')
        ->orderBy('user_type_count','DESC')
        ->get();

        // จังหวัดของผู้ใช้สูงสุด 5 อันดับ
        $count_user_location = DB::table('users')
        ->where('users.organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
        ->select('users.location_P', DB::raw('COUNT(*) as user_location_count'))
        ->groupBy('users.location_P')
        ->orderBy('user_location_count','DESC')
        ->get();

        //==================================================================================================================//
                                                        //  viinews
        //==================================================================================================================//

        // Check in
        $check_in_data = Partner::where('name' ,'=', $user_login->organization)
        ->get();


        $count_hbd = 0;

        for ($i=0; $i < count($check_in_data); $i++) {
            $check_ins_finder = Check_in::where('partner_id',$check_in_data[$i]['id'])->get();


            for ($i=0; $i < count($check_ins_finder); $i++) {
                $finder_hbd = User::where('id',$check_ins_finder[$i]['user_id'])->first();
                if($finder_hbd->brith == date('Y-m-d')){
                    $count_hbd++;
                }
            }
            // เช็ควันเกิด


            // $check_in_data[$i]['time_in'] = $check_ins_finder[$i]['time_in'];
            // $check_in_data[$i]['time_out'] = $check_ins_finder[$i]['time_out'];



            // จำนวนการเข้าพื้นที่
            $count_check_in_at_area = count($check_ins_finder);

        }

        // dd($count_hbd);

        $all_data_partner = Partner::where('name' ,'=', $user_login->organization)
        ->get();

        // $data_partners_arr = [];

        for ($i=0; $i < count($all_data_partner); $i++) {
            $check_ins_data = Check_in::where('partner_id',$all_data_partner[$i]['id'])->get();

            $count_data = count($check_ins_data);

            $all_data_partner[$i]['time_in'] = $check_ins_data[$i]['time_in'];
            $all_data_partner[$i]['time_out'] = $check_ins_data[$i]['time_out'];
            $all_data_partner[$i]['count_user_check_in'] = $count_data;
        }

        $data_checkin = Partner::where('name' ,'=', $user_login->organization)->first();

        //ไม่ได้เข้าพื้นที่นานที่สุด
        $last_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->get();

        $sorted_last_checkIn_data = [];

        for ($i=0; $i < count($last_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$last_checkIn_data[$i]['user_id'])->first();
            $last_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $last_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $last_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_out','desc')
            ->get();

            $last_checkIn_data[$i]['time_out'] = $data_checkin_from_checkin[0]['time_out'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_last_checkIn_data[] = $last_checkIn_data[$i];
        }

        usort($sorted_last_checkIn_data, function ($a, $b) {
            return strtotime($a['time_out']) - strtotime($b['time_out']);
        });


        //เข้าพื้นที่บ่อยที่สุด
        $most_often_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->select('*',DB::raw('COUNT(user_id) as count_user_checkin'))
        ->groupBy('user_id')
        ->orderBy('count_user_checkin','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($most_often_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$most_often_checkIn_data[$i]['user_id'])->first();
            $most_often_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $most_often_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $most_often_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
        }

        //เข้าพื้นที่ล่าสุด
        $lastest_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->limit(5)
        ->get();

        $sorted_lastest_checkIn_data = [];

        for ($i=0; $i < count($lastest_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$lastest_checkIn_data[$i]['user_id'])->first();
            $lastest_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $lastest_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $lastest_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_in','desc')
            ->get();

            $lastest_checkIn_data[$i]['time_in'] = $data_checkin_from_checkin[0]['time_in'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_lastest_checkIn_data[] = $lastest_checkIn_data[$i];
        }

        usort($sorted_lastest_checkIn_data, function ($a, $b) {
            return strtotime($b['time_in']) - strtotime($a['time_in']);
        });

        //==================================================================================================================//
                                                        //  viimove
        //==================================================================================================================//

        $all_car_organization = Register_car::where('juristicNameTH',$user_login->organization)->get();

        $car_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','car')->count();
        $motorcycle_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','motorcycle')->count();
        $other_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','other')->count();


        // รถที่ลงทะเบียน 10 ลำดับล่าสุด
        $last_reg_car_top10 = Register_car::where('juristicNameTH',$user_login->organization)
        ->orderBy('id','desc')
        ->limit(10)
        ->get();

        for ($i=0; $i < count($last_reg_car_top10); $i++) {
            $data_user_from_last_reg_car_top10 = User::where('id','=',$last_reg_car_top10[$i]['user_id'])->first();
            $last_reg_car_top10[$i]['name_from_users'] = $data_user_from_last_reg_car_top10->name;
            $last_reg_car_top10[$i]['avatar'] = $data_user_from_last_reg_car_top10->avatar;
            $last_reg_car_top10[$i]['photo'] = $data_user_from_last_reg_car_top10->photo;
        }


        // รถที่ถูกรายงานมากที่สุด 5 อันดับ
        $report_car_top5 = Guest::where('organization',$user_login->organization)
        ->select('*',DB::raw('COUNT(user_id) as amount_report'))
        ->groupBy('user_id')
        ->get();

        for ($i=0; $i < count($report_car_top5); $i++) {
            $data_user_from_report_car_top5 = User::where('id','=',$report_car_top5[$i]['user_id'])->first();
            $report_car_top5[$i]['name_from_users'] = $data_user_from_report_car_top5->name;
            $report_car_top5[$i]['avatar'] = $data_user_from_report_car_top5->avatar;
            $report_car_top5[$i]['photo'] = $data_user_from_report_car_top5->photo;
        }

        // ประเภทรถมากที่สุด 5 อันดับ
        $type_car_registration_top5 = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(type_car_registration) as amount_type_car'))
        ->groupBy('type_car_registration')
        ->orderBy('amount_type_car','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($type_car_registration_top5); $i++) {
            $data_user_from_report_car_top5 = User::where('id','=',$type_car_registration_top5[$i]['user_id'])->first();
            $type_car_registration_top5[$i]['name_from_users'] = $data_user_from_report_car_top5->name;
            $type_car_registration_top5[$i]['avatar'] = $data_user_from_report_car_top5->avatar;
            $type_car_registration_top5[$i]['photo'] = $data_user_from_report_car_top5->photo;
        }

        //ยี่ห้อรถมากที่สุด
        $brand_car_top5 = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(brand) as amount_brand_car'))
        ->groupBy('brand')
        ->orderBy('amount_brand_car','desc')
        ->limit(5)
        ->get();


        //==================================================================================================================//
                                                        //  Dashboard BoardCast
        //==================================================================================================================//

        $all_ads_content = Ads_content::where('name_partner',$user_login->organization)->get();

        $count_all_content = Ads_content::where('name_partner',$user_login->organization)
        ->count();

        $count_all_by_checkin = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->count();

        $count_all_by_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->count();

        $count_all_by_car = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->count();

        // ======================== by_check_in =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_checkin_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->get();

        for ($i=0; $i < count($all_by_checkin_show_user); $i++) {
            if(!empty($all_by_checkin_show_user[$i]['show_user'])){
                $all_by_checkin_Explode = json_decode($all_by_checkin_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_checkin_Explode);

                $all_by_checkin_counts = 0;
                foreach ($counts as $key => $value) {
                    $all_by_checkin_counts++;
                }

                $all_by_checkin_show_user[$i]['count_show_user'] = $all_by_checkin_counts;
            }else{
                $all_by_checkin_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_checkin_show_user = $all_by_checkin_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_checkin_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_checkin_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->get();

        for ($i=0; $i < count($all_by_checkin_user_click); $i++) {

            if(!empty($all_by_checkin_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_checkin_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key => $value) {
                    $checkin_user_click++;
                }

                $all_by_checkin_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_checkin_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_checkin_user_click = $all_by_checkin_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);

        // ======================== by_car =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_car_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->get();

        for ($i=0; $i < count($all_by_car_show_user); $i++) {
            if(!empty($all_by_car_show_user[$i]['show_user'])){
                $all_by_car_Explode = json_decode($all_by_car_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_car_Explode);

                $all_by_car_counts = 0;
                foreach ($counts as $key => $value) {
                    $all_by_car_counts++;
                }

                $all_by_car_show_user[$i]['count_show_user'] = $all_by_car_counts;
            }else{
                $all_by_car_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_car_show_user = $all_by_car_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_car_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_car_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->get();

        for ($i=0; $i < count($all_by_car_user_click); $i++) {

            if(!empty($all_by_car_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_car_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key => $value) {
                    $checkin_user_click++;
                }

                $all_by_car_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_car_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_car_user_click = $all_by_car_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);

        // ======================== by_user =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_user_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->get();

        for ($i=0; $i < count($all_by_user_show_user); $i++) {
            if(!empty($all_by_user_show_user[$i]['show_user'])){
                $all_by_user_Explode = json_decode($all_by_user_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_user_Explode);

                $all_by_user_counts = 0;
                foreach ($counts as $key => $value) {
                    $all_by_user_counts++;
                }

                $all_by_user_show_user[$i]['count_show_user'] = $all_by_user_counts;
            }else{
                $all_by_user_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_user_show_user = $all_by_user_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_user_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_user_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->get();

        for ($i=0; $i < count($all_by_user_user_click); $i++) {

            if(!empty($all_by_user_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_user_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key => $value) {
                    $checkin_user_click++;
                }

                $all_by_user_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_user_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_user_user_click = $all_by_user_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);


        return view('dashboard.dashboard_index',  compact(
            'data_officer',
            'data_user_from',
            'all_user',
            'all_user_m',
            'count_type_login',
            'count_user_location',
            'all_data_partner',
            'sorted_last_checkIn_data',
            'most_often_checkIn_data',
            'sorted_lastest_checkIn_data',
            'all_car_organization',
            'last_reg_car_top10',
            'car_type_data',
            'motorcycle_type_data',
            'other_type_data',
            'report_car_top5',
            'type_car_registration_top5',
            'brand_car_top5',
            'count_all_content',
            'count_all_by_checkin',
            'count_all_by_user',
            'count_all_by_car',
            'sorted_all_by_checkin_show_user',
            'all_by_checkin_send_round',
            'sorted_all_by_checkin_user_click',
            'sorted_all_by_car_show_user',
            'all_by_car_send_round',
            'sorted_all_by_car_user_click',
            'sorted_all_by_user_show_user',
            'all_by_user_send_round',
            'sorted_all_by_user_user_click',



        ));

    }

    function dashboard_user_index(Request $request)
    {
        $user_login = Auth::user();

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user_data = User::where('organization', '=', $user_login->organization)
                ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_staff', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('location_P', 'LIKE', "%$keyword%")
                ->orWhere('location_A', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user_data = User::where('organization', '=', $user_login->organization)->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")->latest()->paginate($perPage);
        }

        // GroupBy ที่อยู่ไปใช้ใน dropdown filter
        $filter_location_P = DB::table('users')
            ->where('users.location_P', '!=', null)
            ->where('users.organization', '=', $user_login->organization)
            ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
            ->select('users.location_P')
            ->groupBy('users.location_P')
            ->orderBy('users.location_P','DESC')
            ->get();

        return view('dashboard.dashboard_user.user_index' , compact('user_data','filter_location_P'));
    }

    function filter_user(Request $request){
        $user_login = Auth::user();

        $keyword = $request->all();
        $perPage = 10;

        if(!empty($keyword)){

        } else {
            // GroupBy ช่องทาง login
            $filter_location_P = DB::table('users')
            ->where('users.location_P', '!=', null)
            ->where('users.organization', '=', $user_login->organization)
            ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
            ->select('users.location_P')
            ->groupBy('users.location_P')
            ->orderBy('users.location_P','DESC')
            ->get();
        }

        return $filter_location_P;
    }

}
