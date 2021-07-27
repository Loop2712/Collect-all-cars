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
                ->orWhere('car_type', 'LIKE', "%$keyword%")
                ->where('juristicNameTH', "2บี กรีน จำกัด")
                ->latest()->paginate($perPage);
        } else {
            $report_register_cars = Register_car::where('juristicNameTH', "2บี กรีน จำกัด")
                ->latest()->paginate(25);
        }

        return view('Partners_2bgreen.P_2begreen_register_cars', compact('report_register_cars'));
    }

    public function guest_2bgreen(Request $request)
    {
        $count_per_month = 0 ;
        $year = $request->get('year');
        $month_1 = $request->get('month_1');
        $month_2 = $request->get('month_2');

        if ($month_1 == "") {
            $month_1 = $month_2 ;
        }

        if ($month_2 == "") {
            $month_2 = $month_1 ;
        }

        $perPage = 20;
        $guest = Guest::where('organization', "2บี กรีน จำกัด")
                    ->groupBy('registration')
                    ->groupBy('county')
                    ->groupBy('register_car_id')
                    ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
                    ->orderByRaw('count DESC')
                    ->latest()->paginate($perPage);

        if (!empty($year)) {
            
            foreach ($guest as $key ) {

                $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
                        ->where('register_car_id',  $key->register_car_id)
                        ->whereMonth('created_at', ">=" ,   "$month_1")
                        ->whereMonth('created_at', "<=" ,   "$month_2")
                        ->whereYear('created_at', "$year")
                        ->groupBy('registration')
                        ->groupBy('county')
                        ->groupBy('register_car_id')
                        ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
                        ->orderByRaw('count DESC')
                        ->latest()->paginate($perPage);
            }

            foreach ($monthly_reports as $item ) {
                $count_per_month = $item->count ;
            }
        } else {
            $monthly_reports = "" ;
        }

        return view('Partners_2bgreen.P_2begreen_guest', compact('guest','monthly_reports','count_per_month'));
    }

    public function guest_latest_2bgreen(Request $request)
    {
        $guest_latest = Guest::where('organization', "2บี กรีน จำกัด")->latest()->paginate(25);

        return view('Partners_2bgreen.P_2begreen_guest_latest', compact('guest_latest'));
    }

    public function select_month($month_1 , $month_2 , $year)
    {
        $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
                    ->whereMonth('created_at', ">=" ,   $month_1)
                    ->whereMonth('created_at', "<=" ,   $month_2)
                    ->whereYear('created_at', $year)
                    ->groupBy('registration')
                    ->groupBy('county')
                    ->groupBy('register_car_id')
                    ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
                    ->orderByRaw('count DESC')
                    ->latest()->paginate($perPage);

        // return view('Partners_2bgreen.P_2begreen_guest_latest', compact('monthly_reports'));
            return $monthly_reports;
    }
}
