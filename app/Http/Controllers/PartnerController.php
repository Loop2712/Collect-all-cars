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
use Illuminate\Support\Facades\Hash;
use App\Models\Time_zone;
use App\Models\Check_in;


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
                ->where('name_area', null)
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('line_group', 'LIKE', "%$keyword%")
                ->orWhere('mail', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner = Partner::where('name_area', null)->latest()->paginate($perPage);
        }

        foreach ($partner as $key) {
            $new_sos_area = $key->new_sos_area ;
        }

        $group_line = Group_line::where('owner', null)->get();

        return view('partner.index', compact('partner','group_line','new_sos_area'));
    }

    public function detail_area($name_partner)
    {
        // $name_partner = $request->get('name_partner');
        $perPage = 25;
        
        $partner = Partner::where('name', $name_partner)
                ->where('name_area', "!=" , null)
                ->latest()
                ->paginate($perPage);

        $group_line = Group_line::where('owner', null)->get();

        return view('partner.detail_name_area', compact('partner','group_line'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $group_line = Group_line::where('owner', null)->get();

        return view('partner.create', compact('group_line'));
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

        $requestData['phone'] = str_replace("-", "", $requestData['phone']);
        $requestData['phone'] = str_replace(" ", "", $requestData['phone']);

        $requestData['class_color_menu'] = "other";
        
        Partner::create($requestData);

        $data_partners = Partner::where("name", $requestData['name'])->get();
        foreach ($data_partners as $key_1) {

            DB::table('group_lines')
                    ->where('groupName', $requestData['line_group'])
                    ->update([
                        'owner' => $requestData['name']." (Partner)",
                        'partner_id' => $key_1->id,
                ]);
        }

        $group_line = Group_line::where('groupName', $requestData['line_group'])->get();
        foreach ($group_line as $key_2) {

            DB::table('partners')
                ->where('name', $requestData['name'])
                ->update([
                    'group_line_id' => $key_2->id,
            ]);

        }

        return redirect('partner_viicheck')->with('flash_message', 'Partner added!');
    }

    public function partner_add_area(Request $request)
    {
        $requestData = $request->all();

        $requestData['phone'] = str_replace("-", "", $requestData['phone']);
        $requestData['phone'] = str_replace(" ", "", $requestData['phone']);
        
        Partner::create($requestData);

        $data_partners = Partner::where("name", $requestData['name'])
                                ->where("name_area", $requestData['name_area'])
                                ->get();
        foreach ($data_partners as $key_1) {

            DB::table('group_lines')
                    ->where('groupName', $requestData['line_group'])
                    ->update([
                        'owner' => $requestData['name']." (Partner)",
                        'partner_id' => $key_1->id,
                ]);
        }

        $group_line = Group_line::where('groupName', $requestData['line_group'])->get();
        foreach ($group_line as $key_2) {

            DB::table('partners')
                ->where('name', $requestData['name'])
                ->where("name_area", $requestData['name_area'])
                ->update([
                    'group_line_id' => $key_2->id,
            ]);

        }

        return redirect('add_area')->with('flash_message', 'Partner added!');

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

    public function manage_user(Request $request)
    {
        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        foreach ($data_partners as $data_partner) {
            $name_partner = $data_partner->name ;
        }

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $all_user = User::Where('name', 'LIKE', "%$keyword%")
                ->Where('organization', $name_partner)
                ->latest()->paginate($perPage);
        } else {
            $all_user = User::Where('organization', $name_partner)
                ->latest()->paginate($perPage);
        }

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();


        return view('partner.user.manage_user', compact('data_partners','all_user','data_time_zone'));
    }

    public function create_user_partner(Request $request)
    {
        $type_user = $request->get('type_user');
        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
        ->where("name_area", null)
        ->get();

        $partners = $data_user->organization ;

        $name = uniqid($partners.'-');
        $username = $name ;
        $email = "กรุณาเพิ่มอีเมล" ;
        $password = uniqid();
        $provider_id = uniqid($partners.'-', true);

        $user = new User();
        $user->name = $name;
        $user->username = $name;
        $user->provider_id = $provider_id;
        $user->password = Hash::make($password);
        $user->email = $email;
        $user->role = $type_user;
        $user->organization = $partners;
        $user->creator = $data_user->id;
        $user->status = "active";

        $user->save();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.user.create_user_partner', compact('data_partners' , 'partners' , 'username' , 'password','data_time_zone'));
    }

    public function partner_media(Request $request)
    {
        $media_menu = $request->get('menu');

        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.partner_media', compact('data_partners','data_time_zone' ,'media_menu'));
    }
    

    public function partner_theme()
    {
        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.partner_index', compact('data_partners','data_time_zone'));
    }

    public function partner_index()
    {
        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
                    ->where("name_area", null)
                    ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.partner_index', compact('data_partners','data_time_zone'));
    }

    public function register_cars(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();
        foreach ($data_partners as $key) {
            $neme_partner = $key->name;
        }
        $perPage = 25;
        $report_register_cars = Register_car::where('juristicNameTH', $data_user->organization)
                ->latest()->paginate(25);

                // echo "<pre>";
                // print_r($report_register_cars);
                // echo "<pre>";
                // exit();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.partner_register_cars', compact('data_partners', 'report_register_cars','data_time_zone','neme_partner'));
    }

    public function guest_partner(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

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

        return view('partner.guest_partner', compact('data_partners', 'guest','count_per_month','guest_year','data_time_zone'));
    }

    public function partner_guest_latest(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        $guest_latest = Guest::where('organization', $data_user->organization)->latest()->paginate(25);

        return view('partner.partner_guest_latest', compact('data_partners', 'guest_latest','data_time_zone'));
    }

    public function view_sos(Request $request)
    {
        $name_area = $request->get('name_area');

        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        foreach ($data_partners as $data_partner) {
            $search_area = $data_partner->name ;
        }
        $perPage = 4;

        $sos_all_request = Sos_map::selectRaw('count(id) as count')->where('area', $search_area)->get();
                    foreach ($sos_all_request as $key) {
                            $sos_all = $key->count ;
                        }

        // นับจำนวนทั้งหมด
        $view_maps_all = DB::table('sos_maps')
            ->where('area','LIKE', "%$search_area%")
            ->get();

        $count_data = count($view_maps_all);
        ////////

        $view_maps = DB::table('sos_maps')
            ->where('area','LIKE', "%$search_area%")
            ->where('name_area','LIKE', "%$name_area%")
            ->latest()->paginate($perPage);

        $select_name_areas = DB::table('sos_maps')
            ->where('area','LIKE', "%$search_area%")
            ->groupBy('name_area')
            ->get();

        $text_at = '@' ;

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.partner_sos', compact('data_partners','view_maps' , 'view_maps_all' , 'sos_all' ,'text_at','data_time_zone','count_data', 'select_name_areas' , 'name_area'));
    }

    // public function sos_insurance(Request $request)
    // {
    //     $data_user = Auth::user();
    //     $data_partners = Partner::where("name", $data_user->organization)->get();

    //     $name_insurance = "2B-Green";

    //     $sos_insurance = Sos_insurance::where('insurance', $name_insurance)->get();

    //     return view('Partners_2bgreen.P_2begreen_sos_insurance', compact('datdata_partnersa_user','sos_insurance'));
    // }

    public function add_area(Request $request)
    {
        $count_position = 1 ;

        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
                            ->where("name_area", null)
                            ->get();

        $all_area_partners = Partner::where("name", $data_user->organization)
                            ->where("name_area", "!=" , null)
                            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        $group_line = Group_line::where('owner', null)->get();

        return view('partner.service_area.partner_add_area', compact('data_partners' , 'data_time_zone' ,'group_line' ,'all_area_partners'));
    }

    public function service_area(Request $request)
    {
        $name_area = $request->get('name_area');
        $count_position = 1 ;

        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
                    ->where("name_area", $name_area)
                    ->get();

        $location_array = DB::table('lat_longs')
                ->selectRaw('changwat_th')
                ->groupBy('changwat_th')
                ->orderBy('changwat_th' , 'ASC')
                ->get();


        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        if (!empty($name_area)) {
            return view('partner.service_area.partner_service_area_adjustment', compact('data_partners','count_position','location_array','data_time_zone','name_area'));
        }else{
            $group_line = Group_line::where('owner', null)->get();
            $all_area_partners = Partner::where("name", $data_user->organization)
                            ->where("name_area", "!=" , null)
                            ->get();
                            
            return view('partner.service_area.partner_add_area', compact('data_partners' , 'data_time_zone' ,'group_line' ,'all_area_partners'));
        }

        
    }

     public function service_area_pending(Request $request)
    {
        $name_area = $request->get('name_area');
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
                        ->where("name_area", $name_area)
                        ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.service_area.partner_service_area_pending', compact('data_partners','data_time_zone','name_area'));
    }

    public function service_area_current(Request $request)
    {
        $name_area = $request->get('name_area');
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
                        ->where("name_area", $name_area)
                        ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner.service_area.partner_service_area_current', compact('data_partners','data_time_zone','name_area'));
    }

    public function sos_score_helper(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)->get();
        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        $user_of_partners = User::where('organization', $data_user->organization)->get();

        $name_of_partner = [];
        foreach ($user_of_partners as $user_of_partner ) {
            array_push($name_of_partner , $user_of_partner->name);
        }

        // echo count($name_of_partner);
        // echo "<br>";
        // echo "<pre>";
        // print_r($name_of_partner);
        // echo "<pre>";

        $data_score = [];
        for ($i=0; $i < count($name_of_partner); $i++) { 

            $sos_maps = Sos_map::where('area', 'LIKE', "%$data_user->organization%")
                ->where('score_impression', '!=' ,  null)
                ->where('helper', 'LIKE', "%$name_of_partner[$i]%")
                ->get();

            array_push($data_score , $sos_maps);

        }
        // echo count($data_score);
        // echo "<br>";
        // echo "<pre>";
        // print_r($data_score);
        // echo "<pre>";

        // for ($c=0; $c < count($data_score); $c++) { 
            $sum_impression = 0 ;
            $sum_period = 0 ;
            $sum_total = 0 ;
            $count_sum = 0 ;
            foreach ($data_score[0] as $key) {
                $count_sum = $count_sum + 1 ;
                $sum_impression = ($sum_impression + $key->score_impression) /  $count_sum;
                $sum_period = ($sum_period + $key->score_period) /  $count_sum;
                $sum_total = ($sum_total + $key->score_total) /  $count_sum;
            }
        // }
            // echo $name_of_partner[0];
            // echo "<br>";
            // echo $sum_impression;
            // echo "<br>";
            // echo $sum_period;
            // echo "<br>";
            // echo $sum_total;
            // echo "<br>";

        // echo "<pre>";
        // print_r($data_score[0]);
        // echo "<pre>";
        // exit();

        return view('partner.sos_score_helper', compact('data_partners','data_time_zone','data_score'));
    }

    public function view_check_in(Request $request)
    {
        $requestData = $request->all();

        $data_user = Auth::user();

        $data_partners = Partner::where("name", $data_user->organization)
                    ->where("name_area", null)
                    ->get();

        $check_in_at = $data_user->organization;

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        $select_date = $request->get('select_date');
        $select_time_1 = $request->get('select_time_1');
        $select_time_2 = $request->get('select_time_2');
        $select_student_id = $request->get('select_student_id');

        // echo "select_date >>>" . $select_date;
        // echo "<br>";
        // echo "select_time_1 >>>" . $select_time_1;
        // echo "<br>";
        // echo "select_time_2 >>>" . $select_time_2;
        // echo "<br>";

        $perPage = 25;

        // รหัส นศ. อย่างเดียว
        if ( !empty($select_student_id) and empty($select_time_1) and empty($select_date) ) {
            $check_in = Check_in::where('check_in_at', $data_user->organization)
                ->where('student_id','LIKE', "%$select_student_id%")
                ->latest()->paginate($perPage);
        }
        // วันที่ อย่างเดียว
        else if ( !empty($select_date) and empty($select_time_1) and empty($select_student_id) ) {
            $check_in = Check_in::where('check_in_at', $data_user->organization)
                ->whereDate('created_at', $select_date)
                ->latest()->paginate($perPage);
        }
        // วันที่ และ รหัส นศ.
        else if ( !empty($select_date) and !empty($select_student_id) and empty($select_time_1) ) {
            $check_in = Check_in::where('check_in_at', $data_user->organization)
                ->where('student_id','LIKE', "%$select_student_id%")
                ->whereDate('created_at', $select_date)
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา
        else if ( !empty($select_date) and !empty($select_time_1) and empty($select_student_id) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', $data_user->organization)
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา และ รหัส นศ.
        else if ( !empty($select_date) and !empty($select_time_1) and !empty($select_student_id) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', $data_user->organization)
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->where('student_id','LIKE', "%$select_student_id%")
                ->latest()->paginate($perPage);
        }
        // ว่าง
        else {
            $check_in = Check_in::where('check_in_at', $data_user->organization)->latest()->paginate($perPage);
        }

        return view('check_in.index', compact('data_partners','data_time_zone','check_in','check_in_at'));
    }

    public function sos_detail_chart(Request $request)
    {
        $data_user = Auth::user();
        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

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


        return view('partner.partner_sos_detail_chart', compact('data_partners','data_time_zone','sos_all','area','sos_time_00','sos_time_01','sos_time_02','sos_time_03','sos_time_04','sos_time_05','sos_time_06','sos_time_07','sos_time_08','sos_time_09','sos_time_10','sos_time_11','sos_time_12','sos_time_13','sos_time_14','sos_time_15','sos_time_16','sos_time_17','sos_time_18','sos_time_19','sos_time_20','sos_time_21','sos_time_22','sos_time_23','total'));
    }


}
