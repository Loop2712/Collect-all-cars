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

    public function guest_latest_2bgreen(Request $request)
    {
        $guest_latest = Guest::where('organization', "2บี กรีน จำกัด")->latest()->paginate(25);

        return view('Partners_2bgreen.P_2begreen_guest_latest', compact('guest_latest'));
    }

    // public function report_per_month(Request $request)
    // {
    //     $perPage = 25;

    //     $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
    //                     ->where('register_car_id',  "1")
    //                     ->whereMonth('created_at', ">=" ,   "1")
    //                     ->whereMonth('created_at', "<=" ,   "2")
    //                     ->whereYear('created_at', "2021")
    //                     ->groupBy('registration')
    //                     ->groupBy('county')
    //                     ->groupBy('register_car_id')
    //                     ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
    //                     ->orderByRaw('count DESC')
    //                     ->latest()->paginate($perPage);

    //     return view('Partners_2bgreen.P_2begreen_per_month', compact('monthly_reports'));
    // }


    public function guest_2bgreen(Request $request)
    {
        $count_per_month = 0 ;
        $year = $request->get('year');
        $month_1 = $request->get('month_1');
        $month_2 = $request->get('month_2');

        $perPage = 20;
        $guest = Guest::where('organization', "2บี กรีน จำกัด")
                ->groupBy('registration')
                ->groupBy('county')
                ->groupBy('register_car_id')
                ->selectRaw('count(register_car_id) as count , registration , county , register_car_id')
                ->orderByRaw('count DESC')
                ->latest()->paginate($perPage);

        echo "COUNT ALL >>>>>> ".count($guest);
        echo "<br>";

        foreach($guest as $guest_key ){

            $i =$guest_key->register_car_id ;
            echo "IIIII >>>> ". $i . "---" .gettype($i);
            echo "<br>";

            $count_per_month = array();

            $monthly_reports = Guest::where('organization', "2บี กรีน จำกัด")
                ->where('register_car_id',  $guest_key->register_car_id)
                ->whereMonth('created_at', ">=" ,   "1")
                ->whereMonth('created_at', "<=" ,   "12")
                ->whereYear('created_at', "2021")
                ->groupBy('register_car_id')
                ->selectRaw('count(register_car_id) as count   , register_car_id')
                ->orderByRaw('count DESC')
                ->get();

                foreach($monthly_reports as $zxc ){

                    // $count_per_month[$i] = $zxc->count ;
                    echo "COUNT PER MONTH ID:". $guest_key->register_car_id .">> " .$zxc->count ;
                    $count_per_month[$i] = $zxc->count ;
                    echo "<br>";
                    echo $count_per_month[$i];
                    echo "<br>";
                }

            $i = "";
        }
        exit();

        return view('Partners_2bgreen.P_2begreen_guest', compact('guest','count_per_month'));
    }


}
