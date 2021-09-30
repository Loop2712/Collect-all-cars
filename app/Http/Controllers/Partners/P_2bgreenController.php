<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
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
use App\Models\Sos_insurance;

class P_2bgreenController extends Controller
{

    public function report_register_cars(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $report_register_cars = Register_car::where('brand', 'LIKE', "%$keyword%")
                ->orWhere('generation', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('car_type', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('branch', 'LIKE', "%$keyword%")
                ->where('juristicNameTH', "2บี กรีน จำกัด")
                ->latest()->paginate($perPage);
        } else {
            $report_register_cars = Register_car::where('juristicNameTH', "2บี กรีน จำกัด")
                ->latest()->paginate(25);
        }

        return view('Partners_2bgreen.P_2begreen_register_cars', compact('report_register_cars'));
    }

    public function guest_latest_2bgreen(Request $request)
    {
        $guest_latest = Guest::where('organization', "2บี กรีน จำกัด")->latest()->paginate(25);

        return view('Partners_2bgreen.P_2begreen_guest_latest', compact('guest_latest'));
    }

    public function guest_2bgreen(Request $request)
    {
        $year = $request->get('year');
        $month_1 = $request->get('month_1');
        $month_2 = $request->get('month_2');

        $guest_year = Guest::where('organization', "2บี กรีน จำกัด")
                ->groupBy(['date'])
                ->selectRaw('YEAR(created_at) as date')
                ->get();

        $perPage = 20;
        $guest = Guest::where('organization', "2บี กรีน จำกัด")
                ->groupBy('registration')
                ->groupBy('county')
                ->groupBy('register_car_id')
                ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
                ->orderByRaw('count DESC')
                ->latest()->paginate($perPage);
       
        if (count($guest) == 0) {
            $i = (count($guest)) ;
            $count_per_month[$i] = array();
            $count_per_month[$i] = "กรุณาระบุปีที่ต้องการเลือก" ;

            $i = "";
        }

        if (!empty($year) and !empty($month_1) and !empty($month_2)) {
            foreach($guest as $guest_key ){

                $i =$guest_key->register_car_id ;

                $count_per_month[$i] = array();

                $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
                    ->where('register_car_id',  $guest_key->register_car_id)
                    ->whereMonth('created_at', ">=" , $month_1)
                    ->whereMonth('created_at', "<=" , $month_2)
                    ->whereYear('created_at', $year)
                    ->groupBy('register_car_id')
                    ->selectRaw('count(register_car_id) as count   , register_car_id')
                    ->orderByRaw('count DESC')
                    ->get();
                    
                    if (count($monthly_reports) == 0) {
                        $count_per_month[$i] = 0 ;
                    } else {
                        foreach($monthly_reports as $zxc ){
                            $count_per_month[$i] = $zxc->count ;
                        }
                    }

                $i = "";
            }
        } else if (!empty($year) and empty($month_1))  {
            foreach($guest as $guest_key ){

                $i =$guest_key->register_car_id ;
                $count_per_month[$i] = array();

                $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
                    ->where('register_car_id',  $guest_key->register_car_id)
                    ->whereYear('created_at', $year)
                    ->groupBy('register_car_id')
                    ->selectRaw('count(register_car_id) as count   , register_car_id')
                    ->orderByRaw('count DESC')
                    ->get();

                    foreach($monthly_reports as $zxc ){
                        $count_per_month[$i] = $zxc->count ;
                    }

                $i = "";
            }
        } else if (empty($year) and empty($month_1) )  {
            foreach($guest as $guest_key ){

                $i =$guest_key->register_car_id ;
                $count_per_month[$i] = array();
                $count_per_month[$i] = "กรุณาระบุข้อมูล" ;

                $i = "";
            }
        } else if (empty($year))  {
            foreach($guest as $guest_key ){

                $i =$guest_key->register_car_id ;
                $count_per_month[$i] = array();
                $count_per_month[$i] = "กรุณาระบุปีที่ต้องการเลือก" ;

                $i = "";
            }
        }

        return view('Partners_2bgreen.P_2begreen_guest', compact('guest','count_per_month','guest_year'));
    }

    public function sos_insurance(Request $request)
    {
        $name_insurance = "2B-Green";

        $sos_insurance = Sos_insurance::where('insurance', $name_insurance)->get();

        return view('Partners_2bgreen.P_2begreen_sos_insurance', compact('sos_insurance'));
    }

    public function view_sos(Request $request)
    {
        // $keyword = $request->get('search');
        $search_area = "ViiCHECK";
        $perPage = 25;

        $sos_all_request = Sos_map::selectRaw('count(id) as count')->where('area', $search_area)->get();
                    foreach ($sos_all_request as $key) {
                            $sos_all = $key->count ;
                        }
        
        $area = Sos_map::selectRaw('area')
            ->where('area', $search_area)
            ->groupBy('area')
            ->get();

        $view_map = DB::table('sos_maps')
            ->where('area', $search_area)
            ->latest()->paginate($perPage);

        $text_at = '@' ;
       

        return view('Partners_2bgreen.P_2begreen_sos', compact('view_map' , 'sos_all' , 'area','text_at'));
    }

    public function service_area(Request $request)
    {
        $count_position = 1 ;

        return view('Partners_2bgreen.P_2begreen_service_area_adjustment', compact('count_position'));
    }

    public function sos_detail_chart(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');
        $request_area = "ViiCHECK";

        $sos_all_request = Sos_map::selectRaw('count(id) as count')->where('area', $request_area)->get();
            
            foreach ($sos_all_request as $key) {
                    $sos_all = $key->count ;
                }

        $area = Sos_map::selectRaw('area')
            ->where('area', $request_area)
            ->get();

        if ($year != "" and $month != "" and $request_area != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "" and $request_area != "") {

            $total_select = Sos_map::whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "" and $month != "" ) {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($month != "" and $request_area != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "") {

            $total_select = Sos_map::whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($month != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else{

            $total_select = Sos_map::where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } 


        return view('Partners_2bgreen.P_2begreen_sos_detail_chart', compact('sos_all','area','sos_time_00','sos_time_01','sos_time_02','sos_time_03','sos_time_04','sos_time_05','sos_time_06','sos_time_07','sos_time_08','sos_time_09','sos_time_10','sos_time_11','sos_time_12','sos_time_13','sos_time_14','sos_time_15','sos_time_16','sos_time_17','sos_time_18','sos_time_19','sos_time_20','sos_time_21','sos_time_22','sos_time_23','total'));
    }


}
