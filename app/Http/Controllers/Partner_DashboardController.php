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

        return view('dashboard.dashboard_index',  compact(
            'data_officer',
            'data_user_from',
            'all_user',
            'all_user_m',
            'count_type_login',
            'count_user_location'
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
