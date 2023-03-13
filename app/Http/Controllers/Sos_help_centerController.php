<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sos_1669_form_yellow;
use App\Models\Sos_help_center;
use Google\Service\AlertCenter\Resource\Alerts;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\Data_1669_operating_officer;
use App\Models\Data_1669_operating_unit;
use App\Models\Mylog;
use App\User;

use \Carbon\Carbon;

class Sos_help_centerController extends Controller
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
            $sos_help_center = Sos_help_center::where('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->orWhere('phone_user', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                ->orWhere('name_helper', 'LIKE', "%$keyword%")
                ->orWhere('partner_id', 'LIKE', "%$keyword%")
                ->orWhere('helper_id', 'LIKE', "%$keyword%")
                ->orWhere('score_impression', 'LIKE', "%$keyword%")
                ->orWhere('score_period', 'LIKE', "%$keyword%")
                ->orWhere('score_total', 'LIKE', "%$keyword%")
                ->orWhere('commemt_help', 'LIKE', "%$keyword%")
                ->orWhere('photo_succeed', 'LIKE', "%$keyword%")
                ->orWhere('photo_succeed_by', 'LIKE', "%$keyword%")
                ->orWhere('remark_helper', 'LIKE', "%$keyword%")
                ->orWhere('notify', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('help_complete_time', 'LIKE', "%$keyword%")
                ->orWhere('time_go_to_help', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_help_center = Sos_help_center::latest()->paginate($perPage);
        }

        return view('sos_help_center.index', compact('sos_help_center'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_help_center.create');
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
        $date_now = date("Y-m-d H:i:s");
        $requestData = $request->all();

        if ($request->hasFile('photo_sos')) {
            $requestData['photo_sos'] = $request->file('photo_sos')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_succeed')) {
            $requestData['photo_succeed'] = $request->file('photo_succeed')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_succeed_by')) {
            $requestData['photo_succeed_by'] = $request->file('photo_succeed_by')
                ->store('uploads', 'public');
        }

        Sos_help_center::create($requestData);

        return redirect('sos_help_center')->with('flash_message', 'Sos_help_center added!');
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
        $sos_help_center = Sos_help_center::findOrFail($id);

        return view('sos_help_center.show', compact('sos_help_center'));
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
        $sos_help_center = Sos_help_center::findOrFail($id);
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$id)->first();

        $all_provinces = DB::table('districts')
            ->where('province' , '!=' , null)
            ->groupBy('province')
            ->orderBy('province' , 'ASC')
            ->get();

        return view('sos_help_center.edit', compact('sos_help_center','all_provinces','data_form_yellow'));
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

        if ($request->hasFile('photo_sos')) {
            $requestData['photo_sos'] = $request->file('photo_sos')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_succeed')) {
            $requestData['photo_succeed'] = $request->file('photo_succeed')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_succeed_by')) {
            $requestData['photo_succeed_by'] = $request->file('photo_succeed_by')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_sos_by_officers')) {
            $requestData['photo_sos_by_officers'] = $request->file('photo_sos_by_officers')
                ->store('uploads', 'public');
        }

        $sos_help_center = Sos_help_center::findOrFail($id);
        $sos_help_center->update($requestData);
        
        if (!empty($requestData['photo_sos_by_officers'])) {
            return redirect('sos_help_center/' . $id . '/show_case')->with('flash_message', 'Sos_help_center updated!');
        }else{
            return redirect('sos_help_center/' . $id . '/edit')->with('flash_message', 'Sos_help_center updated!');
        }
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
        Sos_help_center::destroy($id);

        return redirect('sos_help_center')->with('flash_message', 'Sos_help_center deleted!');
    }

    public function help_center_admin(Request $request)
    {   
        $keyword = $request->get('search');
        $perPage = 25;

        
        $data_user = Auth::user();
        $sub_organization = $data_user->sub_organization;

        $count_data = Sos_help_center::count();

        if ($sub_organization == "ศูนย์ใหญ่") {
            if (!empty($keyword)) {
                $data_sos = Sos_help_center::where('id', 'LIKE', "%$keyword%")
                    ->orWhere('name_user', 'LIKE', "%$keyword%")
                    ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                    ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                    ->orWhere('name_helper', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $data_sos = Sos_help_center::latest()->paginate($perPage);
            }
        }else{
             if (!empty($keyword)) {
                $data_sos = Sos_help_center::where('id', 'LIKE', "%$keyword%")
                    ->where('notify', 'LIKE', "%$sub_organization%")
                    ->orWhere('name_user', 'LIKE', "%$keyword%")
                    ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                    ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                    ->orWhere('name_helper', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $data_sos = Sos_help_center::where('notify', 'LIKE', "%$sub_organization%")->orderBy('created_at' , 'DESC')->paginate($perPage);
            }
        }
        
        return view('sos_help_center.help_center_admin', compact('data_user' , 'data_sos' ,'count_data'));

    }

    function get_lat_lng_area_sub_organization($data){

        $polygon_provinces = DB::table('province_ths')
            ->where('province_name' , $data)
            ->get();

        return $polygon_provinces ;

    }

    function draw_area_help_center($type){

        if ($type != 'ศูนย์ใหญ่') {
            $polygon_provinces = DB::table('province_ths')
                ->where('polygon' , '!=' , null)
                ->where('province_name' , $type)
                ->get();
        }else{
            $polygon_provinces = DB::table('province_ths')
            ->where('polygon' , '!=' , null)
            ->get();
        }

        return $polygon_provinces ;
    }

    function switch_standby_login(){
        if(Auth::check()){
            return redirect('officers/switch_standby');
        }else{
            return redirect('/login/line?redirectTo=officers/switch_standby');
        }
    }

    function switch_standby(Request $request){

        $data_user = Auth::user();
        $data_standby = Data_1669_operating_officer::where('user_id' ,$data_user->id)->first();

        return view('sos_help_center.switch_standby', compact('data_user','data_standby'));
    }

    public function create_new_sos_help_center($user_id)
    {
        $time_create_sos = Carbon::now();
        $data_user = User::where('id' , $user_id)->first();

        $requestData = [] ;
        $requestData['create_by'] = "admin - " . $user_id;
        $requestData['notify'] = 'none - ' . $data_user->sub_organization ;
        $requestData['status'] = 'รับแจ้งเหตุ';
        $requestData['time_create_sos'] = $time_create_sos;
        
        Sos_help_center::create($requestData);

        $sos_help_center_last = Sos_help_center::latest()->first();

        $requestData['sos_help_center_id'] = $sos_help_center_last->id ;
        Sos_1669_form_yellow::create($requestData);

        // รหัส
        $date_Y = date("y");
        $date_m = date("m");

        $operating_code = $date_Y.$date_m . "-" . "0000-0000" ;
        // จบรหัส

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $sos_help_center_last->id],
                ])
            ->update([
                    'operating_code' => $operating_code,
                ]);
        
        return $sos_help_center_last->id ;
    }

    public function create_new_sos_by_user(Request $request)
    {
        $time_create_sos = Carbon::now();
        $requestData = $request->all();

        $changwat_exp = explode("จังหวัด",$requestData['changwat']);
        if ( !empty($changwat_exp[1]) ) {
            $province_name = $changwat_exp[1] ;
            $province_name = str_replace(" ","",$province_name);
        }else{
            $province_name = $changwat_exp[0] ;
            $province_name = str_replace(" ","",$province_name);
        }

        $amphoe_exp = explode("อำเภอ",$requestData['amphoe']);
        if ( !empty($amphoe_exp[1]) ) {
            $district_name = $amphoe_exp[1] ;
            $district_name = str_replace(" ","",$district_name);
        }else{
            $district_name = $amphoe_exp[0] ;
            $district_name = str_replace(" ","",$district_name);
        }

        $tambon_exp = explode("ตำบล",$requestData['tambon']);
        if ( !empty($tambon_exp[1]) ) {
            $sub_district_name = $tambon_exp[1] ;
            $sub_district_name = str_replace(" ","",$sub_district_name);
        }else{
            $sub_district_name = $tambon_exp[0] ;
            $sub_district_name = str_replace(" ","",$sub_district_name);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads', 'public');
            $requestData['photo_sos'] = $path ;
        }

        $requestData['create_by'] = "user - " . $requestData['user_id'];
        $requestData['notify'] = $province_name;
        $requestData['status'] = 'รับแจ้งเหตุ';
        $requestData['time_create_sos'] = $time_create_sos;
        $requestData['address'] = $province_name."/".$district_name."/".$sub_district_name ;
        
        Sos_help_center::create($requestData);

        $sos_help_center_last = Sos_help_center::latest()->first();

        $requestData['sos_help_center_id'] = $sos_help_center_last->id ;
        $requestData['be_notified'] = "แพลตฟอร์มวีเช็ค" ;
        $requestData['location_sos'] = $requestData['all_address'] ;
        Sos_1669_form_yellow::create($requestData);

        // รหัส
        $date_Y = date("y");
        $date_m = date("m");

        $sos_1669_province_codes = DB::table('sos_1669_province_codes')
            ->where('province_name' , "LIKE"  , "%$province_name%")
            ->where('district_name' , "LIKE" , "%$district_name%")
            ->get();

        $count_sos_area = 0 ;
        $count_for_gen_code = 0 ;

        foreach ($sos_1669_province_codes as $item) {
            $province_code = $item->district_code ;
            // count_sos
            $old_count_sos = $item->count_sos ;
            $count_sos_area = $count_sos_area + (int)$old_count_sos ;
            // for gen code
            $old_for_gen_code = $item->for_gen_code ;
            // $count_for_gen_code = $count_for_gen_code + (int)$old_for_gen_code ;
        }

        $sum_count_sos_area = $count_sos_area + 1 ;
        // $sum_for_gen_code = $count_for_gen_code + 1 ;
        $sum_for_gen_code = (int)$old_for_gen_code + 1 ;

         DB::table('sos_1669_province_codes')
            ->where([ 
                    ['district_code', $province_code],
                ])
            ->update([
                    'for_gen_code' => $sum_for_gen_code,
                ]);

        $id_code = str_pad($sum_for_gen_code, 4, "0", STR_PAD_LEFT);
        $operating_code = $date_Y.$date_m . "-" . $province_code . "-" . $id_code ;
        // จบรหัส

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $sos_help_center_last->id],
                ])
            ->update([
                    'operating_code' => $operating_code,
                ]);

        $data_old_count_sos =  DB::table('sos_1669_province_codes')
            ->where('province_name' , "LIKE" , "%$province_name%")
            ->where('district_name' , "LIKE" , "%$district_name%")
            ->where('sub_district_name' , "LIKE" , "%$sub_district_name%")
            ->first();

        $update_count_sos = (int)$data_old_count_sos->count_sos + 1 ;
        // $update_for_gen_code = (int)$data_old_count_sos->for_gen_code + 1 ;

        DB::table('sos_1669_province_codes')
            ->where([ 
                    ['id', $data_old_count_sos->id],
                ])
            ->update([
                    'count_sos' => $update_count_sos,
                    // 'for_gen_code' => $update_for_gen_code,
                ]);

        return $requestData['sos_help_center_id'] ;
    }

    function check_ask_for_help_1669($sub_organization){

        $data = [] ;

        $check_data = Sos_help_center::where('notify' , $sub_organization)->first();
        
        if ($check_data) {

            $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$check_data->id)->first();

            $check_data->be_notified = $data_form_yellow->be_notified;
            $check_data->idc = $data_form_yellow->idc;
            $check_data->rc = $data_form_yellow->rc;
            $check_data->rc_black_text = $data_form_yellow->rc_black_text;

            return $check_data ;
        }else{
            $data[0] = "ไม่มีข้อมูล" ;
            return $data ;
        }
    }

    function update_last_check_ask_for_help_1669($sos_id){

        $data_sos = Sos_help_center::where('id' , $sos_id)->first();

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $sos_id],
                ])
            ->update([
                    'notify' => "notified - " . $data_sos->notify,
                ]);

        return "Updated successfully" ;
    }

    function update_code_sos_1669(Request $request)
    {
        $requestData = $request->all();

        $data_sos = Sos_help_center::where('id',$requestData['id'])->first();

        $old_operating_code = $data_sos->operating_code ;
        $code_ex = explode("-",$old_operating_code);
        $code_1 = $code_ex[0];
        $code_2 = $code_ex[1];
        $code_3 = $code_ex[2];

        //// เคลีย count_sos && for_gen_code // //
        if ($code_ex[1] != '0000') {
            $old_address = $data_sos->address ;
            $old_address_exp = explode("/",$old_address);

            $old_province_codes = DB::table('sos_1669_province_codes')
                ->where('province_name' , "LIKE"  , "%$old_address_exp[0]%")
                ->where('district_name' , "LIKE" , "%$old_address_exp[1]%")
                ->where('sub_district_name' , "LIKE" , "%$old_address_exp[2]%")
                ->first();

            $old_count_sos = $old_province_codes->count_sos ;
            $delete_count_sos = (int)$old_count_sos - 1 ;

            DB::table('sos_1669_province_codes')
                ->where([ 
                        ['id', $old_province_codes->id],
                    ])
                ->update([
                        'count_sos' => $delete_count_sos,
                    ]);
        }
        
        //// สร้าง operating_code และ count_sos ใหม่ // //

        $changwat_exp = explode("จังหวัด",$requestData['changwat']);
        if ( !empty($changwat_exp[1]) ) {
            $province_name = $changwat_exp[1] ;
            $province_name = str_replace(" ","",$province_name);
        }else{
            $province_name = $changwat_exp[0] ;
            $province_name = str_replace(" ","",$province_name);
        }

        $amphoe_exp = explode("อำเภอ",$requestData['amphoe']);
        if ( !empty($amphoe_exp[1]) ) {
            $district_name = $amphoe_exp[1] ;
            $district_name = str_replace(" ","",$district_name);
        }else{
            $district_name = $amphoe_exp[0] ;
            $district_name = str_replace(" ","",$district_name);
        }

        $tambon_exp = explode("ตำบล",$requestData['tambon']);
        if ( !empty($tambon_exp[1]) ) {
            $sub_district_name = $tambon_exp[1] ;
            $sub_district_name = str_replace(" ","",$sub_district_name);
        }else{
            $sub_district_name = $tambon_exp[0] ;
            $sub_district_name = str_replace(" ","",$sub_district_name);
        }

        $address = $province_name."/".$district_name."/".$sub_district_name ;

        // รหัส
        $sos_1669_province_codes = DB::table('sos_1669_province_codes')
            ->where('province_name' , "LIKE"  , "%$province_name%")
            ->where('district_name' , "LIKE" , "%$district_name%")
            ->get();

        $count_sos_area = 0 ;
        $count_for_gen_code = 0 ;

        foreach ($sos_1669_province_codes as $item) {
            $province_code = $item->district_code ;
            // count_sos
            $old_count_sos = $item->count_sos ;
            $count_sos_area = $count_sos_area + (int)$old_count_sos ;
            // for gen code
            $old_for_gen_code = $item->for_gen_code ;
            // $count_for_gen_code = $count_for_gen_code + (int)$old_for_gen_code ;
        }

        $sum_count_sos_area = $count_sos_area + 1 ;
        // $sum_for_gen_code = $count_for_gen_code + 1 ;
        
        // เช็คว่าถ้ายังอยู่ที่อำเภอเดิม เลขรันไม่ต้องเปลี่ยน
        if ($code_2 == $province_code) {
            $id_code = $code_3 ;
            $sum_for_gen_code = (int)$old_for_gen_code ;
        }else{
            $sum_for_gen_code = (int)$old_for_gen_code + 1 ;
            $id_code = str_pad($sum_for_gen_code, 4, "0", STR_PAD_LEFT);
        }

        DB::table('sos_1669_province_codes')
            ->where([ 
                    ['district_code', $province_code],
                ])
            ->update([
                    'for_gen_code' => $sum_for_gen_code,
                ]);

        $operating_code = $code_1 . "-" . $province_code . "-" . $id_code ;
        // จบรหัส

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $data_sos->id],
                ])
            ->update([
                    'operating_code' => $operating_code,
                    'address' => $address,
                ]);

        $data_old_count_sos =  DB::table('sos_1669_province_codes')
            ->where('province_name' , "LIKE" , "%$province_name%")
            ->where('district_name' , "LIKE" , "%$district_name%")
            ->where('sub_district_name' , "LIKE" , "%$sub_district_name%")
            ->first();

        $update_count_sos = (int)$data_old_count_sos->count_sos + 1 ;
        $update_for_gen_code = (int)$data_old_count_sos->for_gen_code + 1 ;

        DB::table('sos_1669_province_codes')
            ->where([ 
                    ['id', $data_old_count_sos->id],
                ])
            ->update([
                    'count_sos' => $update_count_sos,
                    // 'for_gen_code' => $update_for_gen_code,
                ]);

        return $operating_code ;

    }

    function check_unit_cf_sos_form_user($sos_id){
        $data_sos = Sos_help_center::where('id',$sos_id)->first();
        return $data_sos ;
    }

    function check_update_form_yellow($sos_id){
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$sos_id)->first();

        $data_arr = array();

        $data_arr["sos_help_center_id"] =  $data_form_yellow->id ;
        $data_arr["be_notified"] = $data_form_yellow->be_notified;
        $data_arr["name_user"] = $data_form_yellow->name_user ;
        $data_arr["phone_user"] = $data_form_yellow->phone_user ;
        $data_arr["lat"] = $data_form_yellow->lat ;
        $data_arr["lng"] = $data_form_yellow->lng ;
        $data_arr["location_sos"] = $data_form_yellow->location_sos ;
        $data_arr["symptom"] = $data_form_yellow->symptom ;
        $data_arr["symptom_other"] = $data_form_yellow->symptom_other ;
        $data_arr["idc"] = $data_form_yellow->idc ;
        $data_arr["vehicle_type"] = $data_form_yellow->vehicle_type ;
        $data_arr["operating_suit_type"] = $data_form_yellow->operating_suit_type ;
        $data_arr["operation_unit_name"] = $data_form_yellow->operation_unit_name ;
        $data_arr["action_set_name"] = $data_form_yellow->action_set_name ;
        $data_arr["time_create_sos"] = $data_form_yellow->time_create_sos ;
        $data_arr["time_command"] = $data_form_yellow->time_command ;
        $data_arr["time_go_to_help"] = $data_form_yellow->time_go_to_help ;
        $data_arr["time_to_the_scene"] = $data_form_yellow->time_to_the_scene ;
        $data_arr["time_leave_the_scene"] = $data_form_yellow->time_leave_the_scene ;
        $data_arr["time_hospital"] = $data_form_yellow->time_hospital ;
        $data_arr["time_to_the_operating_base"] = $data_form_yellow->time_to_the_operating_base ;
        $data_arr["km_create_sos_to_go_to_help"] = $data_form_yellow->km_create_sos_to_go_to_help ;
        $data_arr["km_to_the_scene_to_leave_the_scene"] = $data_form_yellow->km_to_the_scene_to_leave_the_scene ;
        $data_arr["km_hospital"] = $data_form_yellow->km_hospital ;
        $data_arr["km_operating_base"] = $data_form_yellow->km_operating_base ;
        $data_arr["rc"] = $data_form_yellow->rc ;
        $data_arr["rc_black_text"] = $data_form_yellow->rc_black_text ;
        $data_arr["treatment"] = $data_form_yellow->treatment ;
        $data_arr["sub_treatment"] = $data_form_yellow->sub_treatment ;
        $data_arr["patient_name_1"] = $data_form_yellow->patient_name_1 ;
        $data_arr["patient_age_1"] = $data_form_yellow->patient_age_1 ;
        $data_arr["patient_hn_1"] = $data_form_yellow->patient_hn_1 ;
        $data_arr["patient_vn_1"] = $data_form_yellow->patient_vn_1 ;
        $data_arr["delivered_province_1"] = $data_form_yellow->delivered_province_1 ;
        $data_arr["delivered_hospital_1"] = $data_form_yellow->delivered_hospital_1 ;
        $data_arr["patient_name_2"] = $data_form_yellow->patient_name_2 ;
        $data_arr["patient_age_2"] = $data_form_yellow->patient_age_2 ;
        $data_arr["patient_hn_2"] = $data_form_yellow->patient_hn_2 ;
        $data_arr["patient_vn_2"] = $data_form_yellow->patient_vn_2 ;
        $data_arr["delivered_province_2"] = $data_form_yellow->delivered_province_2 ;
        $data_arr["delivered_hospital_2"] = $data_form_yellow->delivered_hospital_2 ;
        $data_arr["submission_criteria"] = $data_form_yellow->submission_criteria ;
        $data_arr["communication_hospital"] = $data_form_yellow->communication_hospital ;
        $data_arr["registration_category"] = $data_form_yellow->registration_category ;
        $data_arr["registration_number"] = $data_form_yellow->registration_number ;
        $data_arr["registration_province"] = $data_form_yellow->registration_province ;
        $data_arr["owner_registration"] = $data_form_yellow->owner_registration ;

        return $data_arr ;
    }

    function save_form_yellow(Request $request)
    {
        $requestData = $request->all();

        $data_sos_help_center = Sos_help_center::where('id',$requestData['sos_help_center_id'])->first();

        $data_Sos_1669 = Sos_1669_form_yellow::where('sos_help_center_id',$requestData['sos_help_center_id'])->first();
        $data_Sos_1669->update($requestData);

        $date_sos = $data_sos_help_center->created_at ;
        $result = $date_sos->format('Y-m-d');

        if (!empty($requestData['time_create_sos'])) {
            $requestData['time_create_sos'] = $result . " " . $requestData['time_create_sos'];
        }
        if (!empty($requestData['time_command'])) {
            $requestData['time_command'] = $result . " " . $requestData['time_command'];
        }
        if (!empty($requestData['time_go_to_help'])) {
            $requestData['time_go_to_help'] = $result . " " . $requestData['time_go_to_help'];
        }
        if (!empty($requestData['time_to_the_scene'])) {
            $requestData['time_to_the_scene'] = $result . " " . $requestData['time_to_the_scene'];
        }
        if (!empty($requestData['time_leave_the_scene'])) {
            $requestData['time_leave_the_scene'] = $result . " " . $requestData['time_leave_the_scene'];
        }
        if (!empty($requestData['time_hospital'])) {
            $requestData['time_hospital'] = $result . " " . $requestData['time_hospital'];
        }
        if (!empty($requestData['time_to_the_operating_base'])) {
            $requestData['time_to_the_operating_base'] = $result . " " . $requestData['time_to_the_operating_base'];
        }

        $data_sos_help_center->update($requestData);
        
        return "OK" ;
    }

    function search_data_help_center(Request $request)
    {
        
        $keyword = $request->get('search');
        $perPage = 25;

        $id     = $request->get('id');
        $name     = $request->get('name');
        $helper     = $request->get('helper');
        $organization     = $request->get('organization');
        $date     = $request->get('date');
        $time1 = date($request->get('time1'));
        $time2 = date($request->get('time2'));

        if (empty($time1) ) {
            $time_search_1 = date('00:00');
        }else{
            $time_search_1 = $time1;
        }

        if (empty($time2) ) {
            $time_search_2 = date('23:59');
        }else{
            $time_search_2 = $time2;
        }


        
        $data = DB::table('sos_help_centers');
        
        if ($id) {
            $data->where('operating_code', "%$id%");
            $keyword = null;
        }if ($name) {
            $data->where('name_user','LIKE', "%$name%");
            $keyword = null;
        }  
        if ($helper) {
            $data->where('name_helper', $helper);
            $keyword = null;
        }if ($organization) {
            $data->where('organization_helper', $organization);
            $keyword = null;
        }if ($date) {
            $data->whereDate('created_at', $date);
            $keyword = null;
        }
        
        if ($time1 || $time2) {
            $data->whereTime('created_at', '>=', $time_search_1)->whereTime('created_at', '<=', $time_search_2);
            $keyword = null;
        }

        if (!empty($keyword)) {
            
            /////////////////////////////////////
            //// ---------- อันเดิม ---------- ////
            ////////////////////////////////////
            // $data_sos = Sos_help_center::where('operating_code', 'LIKE', "%$keyword%")
            //     ->orWhere('name_user', 'LIKE', "%$keyword%")
            //     ->orWhere('photo_sos', 'LIKE', "%$keyword%")
            //     ->orWhere('organization_helper', 'LIKE', "%$keyword%")
            //     ->orWhere('name_helper', 'LIKE', "%$keyword%")
            //     ->latest()->paginate($perPage);

            $data_sos = DB::table('sos_help_centers')
                ->join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->select('sos_help_centers.*', 'sos_1669_form_yellows.be_notified', 'sos_1669_form_yellows.idc', 'sos_1669_form_yellows.rc', 'sos_1669_form_yellows.rc_black_text')
                ->where(function($query) use ($keyword) {
                    $query->where('sos_help_centers.operating_code', 'like', "%$keyword%")
                          ->orWhere('sos_help_centers.name_user', 'like', "%$keyword%")
                          ->orWhere('sos_help_centers.organization_helper', 'like', "%$keyword%")
                          ->orWhere('sos_help_centers.name_helper', 'like', "%$keyword%");
                })
                ->get();

        }
        else {
            $data_sos = $data->latest()->paginate($perPage);
        }
        

        return $data_sos ;
    }

    function get_location_operating_unit($m_lat , $m_lng , $level , $vehicle_type){

        $latitude = (float)$m_lat ;
        $longitude = (float)$m_lng;

        if ($level == "all" && $vehicle_type == "all") {
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->where('data_1669_operating_officers.status' , 'Standby')
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }else if ($level == "all" && $vehicle_type != "all") {
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->where('data_1669_operating_officers.vehicle_type' , $vehicle_type)
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->where('data_1669_operating_officers.status' , 'Standby')
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }else if ($level != "all" && $vehicle_type == "all") {
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->where('data_1669_operating_officers.level' , $level)
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->where('data_1669_operating_officers.status' , 'Standby')
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }else{
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->where('data_1669_operating_officers.level' , $level)
            ->where('data_1669_operating_officers.vehicle_type' , $vehicle_type)
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->where('data_1669_operating_officers.status' , 'Standby')
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }
        
        return $locations ;
    }

    function send_data_sos_to_operating_unit( $sos_id, $operating_unit_id, $user_id , $distance)
    {
        $data_officers = User::where('id' , $user_id)->first();
        $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->first();

        $date_now = date("Y-m-d");
        $time_now = date("H:i:s");
        $text_at = '@' ;

        $template_path = storage_path('../public/json/flex-sos-1669/send_sos_center.json');   
        $string_json = file_get_contents($template_path);

        // แปลภาษา
        $string_json = str_replace("ตัวอย่าง","ขอความช่วยเหลือ",$string_json);
        $string_json = str_replace("ขอความช่วยเหลือ","ขอความช่วยเหลือ",$string_json);
        $string_json = str_replace("ระยะห่าง","ระยะห่าง",$string_json);
        $string_json = str_replace("ชื่อผู้ขอความช่วยเหลือ","ชื่อผู้ขอความช่วยเหลือ",$string_json);
        $string_json = str_replace("ไปช่วยเหลือ","ไปช่วยเหลือ",$string_json);
        $string_json = str_replace("ปฏิเสธ","ปฏิเสธ",$string_json);


        // รูปภาพ SOS
        if (!empty($data_sos->photo_sos)) {
            $string_json = str_replace("photo_sos.png",$data_sos->photo_sos,$string_json);
            $string_json = str_replace("_VICONV_","",$string_json);
        }

        // ข้อมูลผู้ขอความช่วยเหลือ
        if ( !empty($data_sos->name_user) ) {
            $string_json = str_replace("name_user",$data_sos->name_user,$string_json);
        }else{
            $string_json = str_replace("name_user","ไม่ได้ระบุ",$string_json);
        }

        if ( !empty($data_sos->phone_user) ) {
            $string_json = str_replace("phone_user",$data_sos->phone_user,$string_json);
        }

        $time_ex = explode(":",$data_form_yellow->time_create_sos);
        
        // วัน เวลา ระยะห่าง
        $string_json = str_replace("distance",$distance ." กม.",$string_json);
        $string_json = str_replace("_date_",$date_now,$string_json);
        $string_json = str_replace("_time_",$time_ex[0].":".$time_ex[1],$string_json);

        // ปุ่มดูแผนที่
        $string_json = str_replace("gg_lat_mail",$text_at.$data_sos->lat,$string_json);
        $string_json = str_replace("gg_lat",$data_sos->lat,$string_json);
        $string_json = str_replace("lng",$data_sos->lng,$string_json);

        // ปุ่มกำลังไปช่วยเหลือ และ ปฏิเสธ
        $string_json = str_replace("SOS_ID",$data_sos->id,$string_json);
        $string_json = str_replace("_UNIT_ID_",$operating_unit_id,$string_json);
        $string_json = str_replace("_OFFICER_ID_",$user_id,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_officers->provider_id,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "Send data sos to",
            "content" => "ID : " . $data_officers->id . " / NAME : " . $data_officers->name,
        ];

        MyLog::create($data);

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $data_sos->id],
                ])
            ->update([
                'status' => "รอการยืนยัน",
                'wait' => $user_id,
                'time_command' => $date_now
            ]);

        DB::table('sos_1669_form_yellows')
            ->where([ 
                    ['sos_help_center_id', $data_sos->id],
                ])
            ->update([
                'time_command' => $time_now
            ]);

        return $data_sos->id ;
    }

    function check_status_wait_operating_unit($sos_id)
    {
        $data_sos = Sos_help_center::where('id' , $sos_id)->first();

        return $data_sos ;
    }

    

    function reply_select($sos_id , Request $request)
    {
        $requestData = $request->all();
        $answer = $requestData['answer'] ;
        $unit_id = $requestData['unit_id'] ;

        $redirectTo = 'sos_help_center/reply_select_2/' . $sos_id . '?answer=' . $answer . '_and_unit_id=' . $unit_id ;

        if(Auth::check()){
            return redirect('sos_help_center/reply_select_2/' . $sos_id . '?answer=' . $answer . '_and_unit_id=' . $unit_id);
        }else{
            return redirect('/login/line?redirectTo=' . $redirectTo);
        }
    }

    function reply_select_2($sos_id , Request $request)
    {
        $data_user = Auth::user();

        return redirect('sos_help_center/' . $sos_id . '/show_case')->with('flash_message', 'Sos_help_center updated!');
        
    }

    public function show_case_sos($id)
    {
        $data_sos = Sos_help_center::findOrFail($id);

        return view('sos_help_center.show_case', compact('data_sos'));
    }

    public function show_user_sos($id)
    {
        $data_sos = Sos_help_center::findOrFail($id);
        $data_user = Auth::user();

        return view('sos_help_center.show_user', compact('data_sos','data_user'));
    }

    function check_location_officer($sos_id)
    {
        $data_sos = Sos_help_center::findOrFail($sos_id);
        $officer_id = $data_sos->helper_id ;
        $operating_unit_id =  $data_sos->operating_unit_id ;

        $data_officer = Data_1669_operating_officer::where('operating_unit_id' , $operating_unit_id)
            ->where('user_id' , $officer_id)
            ->first();

        $data = [] ;
        $data['status'] = $data_sos->status ;

        $data['officer_lat'] = $data_officer->lat ;
        $data['officer_lng'] = $data_officer->lng ;

        return $data ;
    }

    function get_current_officer_location($sos_id){

        $data_sos = Sos_help_center::findOrFail($sos_id);

        $officer_id = $data_sos->helper_id ;
        $operating_unit_id =  $data_sos->operating_unit_id ;

        $data_officer = Data_1669_operating_officer::where('operating_unit_id' , $operating_unit_id)
            ->where('user_id' , $officer_id)
            ->first();

        $data_user = User::where('id',$officer_id)->first();

        $data = [] ;
        $data['name_officer'] = $data_officer->name_officer ;
        $data['phone_officer'] = $data_user->phone ;
        $data['sub_organization_officer'] = $data_user->sub_organization ;
        $data['img_officer'] = $data_user->photo ;
        $data['officer_id'] = $officer_id ;

        $data['officer_lat'] = $data_officer->lat ;
        $data['officer_lng'] = $data_officer->lng ;

        $latitude = (float)$data['officer_lat'] ;
        $longitude = (float)$data['officer_lng'];

        $locations = DB::table('sos_help_centers')
            ->where('id' , $sos_id)
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->first();

        $data['distance'] = $locations->distance ;
        $data['status_sos'] = $data_sos->status ;
        $data['remark_status'] = $data_sos->remark_status ;

        $data['officer_level'] = $data_officer->level ;
        $data['officer_vehicle_type'] = $data_officer->vehicle_type ;

        $data['unit_name'] = $data_sos->organization_helper ;
        $data['unit_area'] = $data_officer->operating_unit->area ;
        $data['operating_unit_id'] = $operating_unit_id ;

        // FORM YELLOWS
        $form_yellows = DB::table('sos_1669_form_yellows')->where('id' , $sos_id)->first();
        $data['rc'] = $form_yellows->rc ;
        $data['idc'] = $form_yellows->idc ;

        return $data ;

    }

    function update_location_officer($sos_id , $lat , $lng){

        $data_sos = Sos_help_center::findOrFail($sos_id);
        $officer_id = $data_sos->helper_id ;
        $operating_unit_id =  $data_sos->operating_unit_id ;

        DB::table('data_1669_operating_officers')
            ->where([ 
                    ['user_id', $officer_id],
                    ['operating_unit_id', $operating_unit_id],
                ])
            ->update([
                    'lat' => $lat,
                    'lng' => $lng,
                ]);

        $data_sos_after_update = Sos_help_center::where('id' , $sos_id)->first();

        $form_yellow = Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->first();
        $data_sos_after_update->idc = $form_yellow->idc ;

        return $data_sos_after_update ;

    }

    function update_status_officer($status , $sos_id , $reason){

        $reason = str_replace("_"," ",$reason);
        $date_now = date("Y-m-d H:i:s");

        if($status == "ถึงที่เกิดเหตุ"){

            DB::table('sos_help_centers')
                ->where([ ['id', $sos_id],])
                ->update([
                    'status' => $status,
                    'time_to_the_scene' => $date_now,
                ]);

            DB::table('sos_1669_form_yellows')
                ->where([ ['sos_help_center_id', $sos_id],])
                ->update(['time_to_the_scene' => $date_now,]);
        }
        else if($status == "ออกจากที่เกิดเหตุ"){

            DB::table('sos_help_centers')
                ->where([ ['id', $sos_id],])
                ->update([
                    'status' => $status,
                    'time_leave_the_scene' => $date_now,
                ]);

            DB::table('sos_1669_form_yellows')
                ->where([ ['sos_help_center_id', $sos_id],])
                ->update(['time_leave_the_scene' => $date_now,'sub_treatment' => 'นำส่ง',]);

        }
        else if ($status == "เสร็จสิ้น") {

            if ($reason == "ถึงโรงพยาบาล") {

                DB::table('sos_help_centers')
                    ->where([ ['id', $sos_id],])
                    ->update([
                            'status' => $status,
                            'remark_status' => $reason,
                            'time_sos_success' => $date_now,
                            'time_hospital' => $date_now,
                    ]);

                DB::table('sos_1669_form_yellows')
                    ->where([ ['sos_help_center_id', $sos_id],])
                    ->update(['time_hospital' => $date_now,]);

            }else{
                DB::table('sos_help_centers')
                    ->where([ ['id', $sos_id],])
                    ->update([
                            'status' => $status,
                            'remark_status' => $reason,
                            'time_sos_success' => $date_now,
                    ]);

                DB::table('sos_1669_form_yellows')
                    ->where([ ['sos_help_center_id', $sos_id],])
                    ->update(['sub_treatment' => $reason,]);
            }

        }
        
        return "Updated >> ". $status . " successfully" ;

    }

    function update_officer_to_the_operating_base($sos_id){

        $date_now = date("Y-m-d H:i:s");

        DB::table('sos_help_centers')
            ->where([ ['id', $sos_id],])
            ->update(['time_to_the_operating_base' => $date_now,]);

        DB::table('sos_1669_form_yellows')
            ->where([ ['sos_help_center_id', $sos_id],])
            ->update(['time_to_the_operating_base' => $date_now,]);

        return "Updated successfully" ;
        // return redirect('officers/switch_standby')->with('flash_message', 'Sos_help_center updated!');
    }

    function update_data_form_yellows($sos_id , $column , $data){

        DB::table('sos_1669_form_yellows')
            ->where([ ['sos_help_center_id', $sos_id],])
            ->update([$column => $data,]);

        return "Updated column : ". $column ." >> ". $data ." successfully" ;
    }

    function update_event_level_rc($level , $sos_id){

        DB::table('sos_1669_form_yellows')
            ->where([ 
                    ['sos_help_center_id', $sos_id],
                ])
            ->update([
                    'rc' => $level,
                ]);

        return "Updated successfully" ;
    }

    function update_status_officer_Standby($status, $officer_id , $lat , $lng){


        DB::table('data_1669_operating_officers')
            ->where([ 
                    ['user_id', $officer_id],
                ])
            ->update([
                    'status' => $status,
                    'lat' => $lat,
                    'lng' => $lng,
                ]);

        return "Updated successfully" ;

    }
    
    function update_mileage_officer($sos_id , $mileage , $location){

        DB::table('sos_1669_form_yellows')
            ->where([ 
                    ['sos_help_center_id', $sos_id],
                ])
            ->update([
                    $location => $mileage,
                ]);

        $data_update_mileage = Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->first();


        return $data_update_mileage ;
    }


    function edit_data_officer_Standby(Request $request){

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads', 'public');
            $requestData['photo_officer'] = $path ;

            DB::table('users')
            ->where([ 
                    ['id', $requestData['id']],
                ])
            ->update([
                    'photo' => $requestData['photo_officer'],
                ]);
        }

        DB::table('data_1669_operating_officers')
        ->where([ 
                ['id', $requestData['id']],
            ])
        ->update([
                'name_officer' => $requestData['name_officer'],
                'level' => $requestData['level_officer'],
                'vehicle_type' => $requestData['vehicle_type'],
            ]);
        
        return $requestData;
    }

}