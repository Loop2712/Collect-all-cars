<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
Use Carbon\Carbon;
use PDF;
use App\User;
use App\Models\Partner;
use App\Models\Check_in;
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


        //ไม่ได้เข้าพื้นที่นานที่สุด
        $data_checkin = Partner::where('name' ,'=', $user_login->organization)->first();

        $last_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->orderBy('time_out','asc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($last_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$last_checkIn_data[$i]['user_id'])->first();
            $last_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $last_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $last_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
        }

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
        ->orderBy('time_in','desc')
        ->limit(5)
        ->get();

         for ($i=0; $i < count($lastest_checkIn_data); $i++) {
             $data_user_from_checkin = User::where('id','=',$lastest_checkIn_data[$i]['user_id'])->first();
             $lastest_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
             $lastest_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
             $lastest_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
         }



        return view('dashboard.dashboard_index',  compact(
            'data_officer',
            'data_user_from',
            'all_user',
            'all_user_m',
            'count_type_login',
            'count_user_location',
            'last_checkIn_data',
            'most_often_checkIn_data',
            'lastest_checkIn_data',

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
