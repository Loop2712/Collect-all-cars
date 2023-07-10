<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Partner;
use App\Models\Partner_condo;
use Illuminate\Http\Request;
use App\Models\Group_line;

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
        //ดึงข้อมูลผู้ใช้ทั้งหมด
        $total_userData = User::get();

        //จำนวน sub_organization ทั้งหมด
        $totalCount = DB::table('users')
        ->select(DB::raw('COUNT(sub_organization) as total_count'))
        ->value(DB::raw('COUNT(sub_organization)'));

        //ชื่อและนับจำนวน sub_organization แต่ละชื่อ
        $countSub = DB::table('users')
        ->select('users.sub_organization', DB::raw('COUNT(sub_organization) as sub_organization_count'))
        ->groupBy('users.sub_organization')
        ->get();



        return view('dashboard.dashboard_index', compact('total_userData','countSub','totalCount'));

    }

    function dashboard_user_index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 20;

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
        $perPage = 20;

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
