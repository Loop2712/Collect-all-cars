<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Partner;
use App\Models\Partner_condo;
use Illuminate\Http\Request;
use App\Models\Group_line;

Use Carbon\Carbon;
use PDF;
use App\User;
use App\CarModel;
use App\Models\Register_car;
use App\Models\Guest;
use App\Models\News;
use App\Models\Report_news;
use App\Models\Motercycle;
use Illuminate\Support\Facades\DB;
use App\Models\Sos_map;
use App\Models\Sos_insurance;
use App\county;
use Illuminate\Support\Facades\Hash;
use App\Models\Time_zone;
use App\Models\Check_in;
use App\Models\Disease;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class Partner_DashboardController extends Controller
{
    function dashboard_index(Request $request)
    {
        // ดึงข้อมูลผู้ใช้ทั้งหมด
        $total_userData = User::get();

        // นับผู้ใช้ทั้งหมด
        $all_user = User::count();

        // นับผู้ใช้ทั้งหมด
        $date_now = Carbon::now();
        $all_user_m = User::whereMonth('created_at', $date_now)->count();

        // จำนวน user_from ทั้งหมด ---> ค่าที่เป็น null จะไม่ถูกนับ
        $totalCount = DB::table('users')
        ->select(DB::raw('COUNT(user_from) as total_count'))
        ->value(DB::raw('COUNT(user_from)'));

        // groupBy --> user_from ที่ไม่ใช่ค่าว่าง แต่ละที่มาและนับจำนวน user_from แต่ละที่มา ------> นำไปคำนวน  $totalCount เพื่อหาเปอร์เซ็น
        $countUser_from = DB::table('users')
        ->where('users.user_from', '!=' ,null)
        ->select('users.user_from', DB::raw('COUNT(user_from) as user_from_count'))
        ->groupBy('users.user_from')
        ->get();

        return view('dashboard.dashboard_index', compact('total_userData','countUser_from','totalCount','all_user','all_user_m'));

    }

    function dashboard_user_index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user_data = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_staff', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('location_P', 'LIKE', "%$keyword%")
                ->orWhere('location_A', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user_data = User::latest()->paginate($perPage);
        }

        return view('dashboard.dashboard_user.user_index' , compact('user_data'));
    }

    function users_pdf(Request $request){

        $requestData = $request->all();
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user_data = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_staff', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('location_P', 'LIKE', "%$keyword%")
                ->orWhere('location_A', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user_data = User::latest()->paginate($perPage);
        }

        $user_pdf = PDF::loadView('dashboard.dashboard_user.user_pdf', compact('user_data') )->setPaper("A4", 'landscape');

        return $user_pdf->stream('users_report.pdf');
    }

}
