<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Group_line;
use Auth;

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


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $partner = Partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('line_group', 'LIKE', "%$keyword%")
                ->orWhere('mail', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner = Partner::latest()->paginate($perPage);
        }

        foreach ($partner as $key) {
            $new_sos_area = $key->new_sos_area ;
        }

        $group_line = Group_line::where('owner', null)->get();

        return view('partner.index', compact('partner','group_line','new_sos_area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Partner::create($requestData);

        return redirect('partner_viicheck')->with('flash_message', 'Partner added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $partner = Partner::findOrFail($id);

        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $partner = Partner::findOrFail($id);
        $partner->update($requestData);

        return redirect('partner')->with('flash_message', 'Partner updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Partner::destroy($id);

        return redirect('partner_viicheck')->with('flash_message', 'Partner deleted!');
    }

    public function partner_theme()
    {
        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)->get();

        return view('layouts.partners.theme_partner', compact('data_partners'));
    }

    public function register_cars(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        $perPage = 25;
        $report_register_cars = Register_car::where('juristicNameTH', $data_user->organization)
                ->latest()->paginate(25);

        return view('partner.partner_register_cars', compact('data_partners', 'report_register_cars'));
    }

    public function guest_partner(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        $year = $request->get('year');
        $month_1 = $request->get('month_1');
        $month_2 = $request->get('month_2');

        $guest_year = Guest::where('organization', $data_user->organization)
                ->groupBy(['date'])
                ->selectRaw('YEAR(created_at) as date')
                ->get();

        $perPage = 20;
        $guest = Guest::where('organization', $data_user->organization)
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

                $monthly_reports = Guest::where('organization', $data_user->organization)
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

                $monthly_reports = Guest::where('organization', $data_user->organization)
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

        return view('partner.guest_partner', compact('data_partners', 'guest','count_per_month','guest_year'));
    }

    public function partner_guest_latest(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        $guest_latest = Guest::where('organization', $data_user->organization)->latest()->paginate(25);

        return view('partner.partner_guest_latest', compact('data_partners', 'guest_latest'));
    }

    public function view_sos(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        foreach ($data_partners as $data_partner) {
            $search_area = $data_partner->name ;
        }
        echo $search_area ;
        exit();
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
       

        return view('partner.partner_sos', compact('data_partners','view_map' , 'sos_all' , 'area','text_at'));
    }

    // public function sos_insurance(Request $request)
    // {
    //     $data_user = Auth::user();
    //     $data_partners = Partner::where("name", $data_user->organization)->get();

    //     $name_insurance = "2B-Green";

    //     $sos_insurance = Sos_insurance::where('insurance', $name_insurance)->get();

    //     return view('Partners_2bgreen.P_2begreen_sos_insurance', compact('datdata_partnersa_user','sos_insurance'));
    // }

    public function service_area(Request $request)
    {
        $count_position = 1 ;

        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        $location_array = DB::table('lat_longs')
                ->selectRaw('changwat_th')
                ->groupBy('changwat_th')
                ->orderBy('changwat_th' , 'ASC')
                ->get();

        return view('partner.service_area.partner_service_area_adjustment', compact('data_partners','count_position','location_array'));
    }

     public function service_area_pending(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        return view('partner.service_area.partner_service_area_pending', compact('data_partners'));
    }

    public function service_area_current(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        return view('partner.service_area.partner_service_area_current', compact('data_partners'));
    }

    public function sos_detail_chart(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();

        $year = $request->get('year');
        $month = $request->get('month');
        $request_area = $data_user->organization;

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


        return view('partner.partner_sos_detail_chart', compact('data_partners','sos_all','area','sos_time_00','sos_time_01','sos_time_02','sos_time_03','sos_time_04','sos_time_05','sos_time_06','sos_time_07','sos_time_08','sos_time_09','sos_time_10','sos_time_11','sos_time_12','sos_time_13','sos_time_14','sos_time_15','sos_time_16','sos_time_17','sos_time_18','sos_time_19','sos_time_20','sos_time_21','sos_time_22','sos_time_23','total'));
    }


}
