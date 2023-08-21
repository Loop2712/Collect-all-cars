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
use App\Models\Sos_1669_officer_ask_more;
use App\Models\Mylog;
use App\Models\Partner;
use App\Models\Time_zone;
use App\User;
use App\Models\Data_1669_officer_command;
use App\Models\Agora_chat;

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

        $data_forword_form = Sos_help_center::where('id',$sos_help_center->forward_operation_from)->first();

        $data_forword_to = Sos_help_center::where('id',$sos_help_center->forward_operation_to)->first();


        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$id)->first();

        $all_provinces = DB::table('districts')
            ->orderBy('province' , 'ASC')
            ->get();

        $sos_1669_id = $id ;

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        $agora_chat = Agora_chat::where('sos_id' , $sos_1669_id)->where('room_for' , 'user_sos_1669')->first();

        return view('sos_help_center.edit', compact('data_forword_form', 'data_forword_to' , 'sos_help_center','all_provinces','data_form_yellow','sos_1669_id','agora_chat','appID','appCertificate'));
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
        if ($request->hasFile('photo_succeed')) {
            $requestData['photo_succeed'] = $request->file('photo_succeed')
                ->store('uploads', 'public');
        }

        $sos_help_center = Sos_help_center::findOrFail($id);
        $sos_help_center->update($requestData);
        
        if ( !empty($requestData['form_blade']) && $requestData['form_blade'] == "form_modal_photo_sos") {
            return redirect('sos_help_center/' . $id . '/show_case')->with('flash_message', 'Sos_help_center updated!');
        }else{
            return redirect('sos_help_center/' . $id . '/edit')->with('flash_message', 'Sos_help_center updated!');
        }
        
        // if (!empty($requestData['photo_sos_by_officers']) or !empty($requestData['photo_succeed'])) {
        //     return redirect('sos_help_center/' . $id . '/show_case')->with('flash_message', 'Sos_help_center updated!');
        // }else{
        //     return redirect('sos_help_center/' . $id . '/edit')->with('flash_message', 'Sos_help_center updated!');
        // }
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
        $organization = $data_user->organization;

        $data_partners = Partner::where('name', $organization)->where('name_area', null)->first();
        $color_theme = $data_partners->color_navbar ;

        // $count_data = Sos_help_center::count();

        if ($sub_organization == "ศูนย์ใหญ่") {
            if (!empty($keyword)) {
                $data_sos = Sos_help_center::where('id', 'LIKE', "%$keyword%")
                    ->orWhere('name_user', 'LIKE', "%$keyword%")
                    ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                    ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                    ->orWhere('name_helper', 'LIKE', "%$keyword%")
                    ->get();
            } else {
                $data_sos = Sos_help_center::get();
            }

            $polygon_provinces = DB::table('province_ths')
                ->where('polygon' , '!=' , null)
                ->get();

        }else{
             if (!empty($keyword)) {
                $data_sos = Sos_help_center::where('id', 'LIKE', "%$keyword%")
                    ->where('notify', 'LIKE', "%$sub_organization%")
                    ->orWhere('name_user', 'LIKE', "%$keyword%")
                    ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                    ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                    ->orWhere('name_helper', 'LIKE', "%$keyword%")
                    ->get();
            } else {
                $data_sos = Sos_help_center::where('notify', 'LIKE', "%$sub_organization%")->orderBy('created_at' , 'DESC')->get();
            }

            $polygon_provinces = DB::table('province_ths')
                ->where('polygon' , '!=' , null)
                ->where('province_name' , $sub_organization)
                ->get();
        }
        
        return view('sos_help_center.help_center_admin', compact('data_user' , 'data_sos','polygon_provinces','color_theme'));

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

    function draw_area_select($province_name){
        $polygon_provinces = DB::table('province_ths')
            ->where('polygon' , '!=' , null)
            ->where('province_name' , $province_name)
            ->get();

        return $polygon_provinces ;
    }

    function marker_area_select($province_name){
        // $data_sos = Sos_help_center::where('notify', 'LIKE', "%$province_name%")
        //     ->orderBy('created_at' , 'DESC')
        //     ->get();
        
        $data_sos = DB::table('sos_help_centers')
            ->join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->select('sos_help_centers.*', 'sos_1669_form_yellows.be_notified', 'sos_1669_form_yellows.idc', 'sos_1669_form_yellows.rc', 'sos_1669_form_yellows.rc_black_text')
            ->where('sos_help_centers.notify', 'like', "%$province_name%")
            ->orderBy('id' , 'DESC')
            ->get();

        return $data_sos ;
    }

    function switch_standby_login(Request $request){

        $requestData = $request->all();

        if ( !empty($requestData['officer']) ) {
            $redirectTo = 'officers/switch_standby/?officer=' . $requestData['officer'];
        }else{
            $redirectTo = 'officers/switch_standby/' ;
        }

        
        if(Auth::check()){
            return redirect($redirectTo);
        }else{
            return redirect('/login/line?redirectTo=' . $redirectTo);
        }

        // if(Auth::check()){
        //     return redirect('officers/switch_standby');
        // }else{
        //     return redirect('/login/line?redirectTo=officers/switch_standby');
        // }
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

        $data_officer_command = Data_1669_officer_command::where('user_id',$user_id)
            ->where('area',$data_user->sub_organization)
            ->first();

        $requestData = [] ;
        $requestData['create_by'] = "admin - " . $user_id;
        $requestData['notify'] = 'none - ' . $data_user->sub_organization ;
        $requestData['status'] = 'รับแจ้งเหตุ';
        $requestData['time_create_sos'] = $time_create_sos;
        $requestData['command_by'] = $data_officer_command->id;
        
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

        DB::table('data_1669_officer_commands')
            ->where([ 
                    ['id', $data_officer_command->id],
                ])
            ->update([
                    'status' => 'Helping',
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

        // ค้นหาเจ้าหน้าที่ที่พร้อมและเลขน้อยที่สุด
        $data_officer_command = Data_1669_officer_command::where('status' , 'Standby')
            ->where('number','!=',null)
            ->where('area' , $province_name)
            ->orderBy('number' , 'ASC')
            ->first();

        if(!empty($data_officer_command)){
            $requestData['notify'] = $data_officer_command->id .' - '.$province_name;
        }
        
        $requestData['create_by'] = "user - " . $requestData['user_id'];
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

        if(!empty($data_old_count_sos->count_sos)){
            $old_count_sos = $data_old_count_sos->count_sos ;
        }else{
            $old_count_sos = 0 ;
        }

        $update_count_sos = (int)$old_count_sos + 1 ;
        // $update_for_gen_code = (int)$data_old_count_sos->for_gen_code + 1 ;

        if(!empty($data_old_count_sos)){
            DB::table('sos_1669_province_codes')
                ->where([ 
                        ['id', $data_old_count_sos->id],
                    ])
                ->update([
                        'count_sos' => $update_count_sos,
                        // 'for_gen_code' => $update_for_gen_code,
                    ]);
        }

        return $requestData['sos_help_center_id'] ;
    }

    function check_ask_for_help_1669($sub_organization,$user_id){

        $data = [] ;

        // ค้นหาเจ้าหน้าที่ที่พร้อมและเลขน้อยที่สุด
        $data_officer_command = Data_1669_officer_command::where('user_id' , $user_id)
            ->where('area' , $sub_organization)
            ->first();

        $check_data = Sos_help_center::where('notify' , $data_officer_command->id.' - '.$sub_organization)->first();

        // $sos_Helping = Sos_help_center::where('command_by' , $data_officer_command->id)
        //     ->where('status' , '!=' , 'เสร็จสิ้น')
        //     ->get();

        $sos_Helping = DB::table('sos_help_centers')
                ->join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->where('sos_help_centers.command_by' , $data_officer_command->id)
                ->where('sos_help_centers.status' , '!=' , 'เสร็จสิ้น')
                ->where('sos_help_centers.notify' , 'LIKE' , "%$sub_organization%")
                ->select('sos_help_centers.*', 'sos_1669_form_yellows.idc', 'sos_1669_form_yellows.rc', 'sos_1669_form_yellows.rc_black_text','sos_1669_form_yellows.vehicle_type','sos_1669_form_yellows.operating_suit_type')
                ->get();

        $sos_ask_mores = DB::table('sos_help_centers')
                ->join('sos_1669_officer_ask_mores', 'sos_help_centers.id', '=', 'sos_1669_officer_ask_mores.sos_id')
                ->where('sos_help_centers.notify', "LIKE" , "%$sub_organization%")
                ->where('sos_1669_officer_ask_mores.success' , null)
                ->where('sos_1669_officer_ask_mores.noti_to' , $user_id)
                ->select('sos_help_centers.*', 'sos_1669_officer_ask_mores.*' , 'sos_1669_officer_ask_mores.id as ask_mores_id')
                ->get();

        if( !empty($sos_ask_mores) ){
            $sos_ask_mores = $sos_ask_mores ;
        }else{
            $sos_ask_mores = "ไม่มีข้อมูล" ;
        }
        
        if ($check_data) {

            $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$check_data->id)->first();

            $check_data->be_notified = $data_form_yellow->be_notified;
            $check_data->idc = $data_form_yellow->idc;
            $check_data->rc = $data_form_yellow->rc;
            $check_data->rc_black_text = $data_form_yellow->rc_black_text;

            if (!empty($check_data->forward_operation_from)){
                $data_old = Sos_help_center::where('id' , $check_data->forward_operation_from)->first();
                $data_form_yellow_old = Sos_1669_form_yellow::where('sos_help_center_id',$data_old->id)->first();

                $check_data->old_rc = $data_form_yellow_old->rc;
                $check_data->old_operating_code = $data_old->operating_code;
            }

            $check_data['check_data'] = "มีข้อมูล" ;
            $check_data['count_sos_Helping'] = count($sos_Helping) ;
            $check_data['data_sos_Helping'] = $sos_Helping ;

            return $check_data ;
        }else{

            $data = Sos_help_center::where('command_by' , null)
                ->where('notify', "LIKE" , "%$sub_organization%")
                ->get();

            $data['count_sos_wait'] = count($data) ;
            $data['count_sos_Helping'] = count($sos_Helping) ;
            $data['data_sos_Helping'] = $sos_Helping ;
            $data['check_data'] = "ไม่มีข้อมูล" ;
            $data['sos_ask_mores'] = $sos_ask_mores ;

            return $data ;
        }
    }

    function send_noti_ask_mores_to($user_id , $ask_mores_id){

        // $data_officer_command = Data_1669_officer_command::where('id',$command_by)->first();
        // $user_id = $data_officer_command->user_id ;

        DB::table('sos_1669_officer_ask_mores')
            ->where('id',$ask_mores_id)
            ->update([
                'noti_to' => $user_id ,
        ]);

        return 'OK' ;
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

    function check_status_officer_1669($officer_command_id , $sub_organization){

        $data_officer_command = Data_1669_officer_command::where('user_id' , $officer_command_id)
            ->where('area' , $sub_organization)
            ->first();

        return $data_officer_command ;
    }

    function change_status_officer_to($officer_command_id , $sub_organization , $change_to){

        if ($change_to == 'null'){
            $change_to = null ;
        }

        DB::table('data_1669_officer_commands')
            ->where([ 
                    ['user_id', $officer_command_id],
                    ['area', $sub_organization],
                ])
            ->update([
                    'status' => $change_to,
                ]);

        return 'OK' ;

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

        if (!empty($data_sos->command_by)){
            $data_officer_command = DB::table('data_1669_officer_commands')->where('id' , $data_sos->command_by)->first();
            $data_sos['name_officer_command'] = $data_officer_command->name_officer_command;
        }
        
        return $data_sos ;
    }

    function check_update_form_yellow($sos_id){
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$sos_id)->first();

        $data_arr = array();

        $data_arr["sos_help_center_id"] =  $data_form_yellow->id ;

        $data_arr['page_1']["be_notified"] = $data_form_yellow->be_notified;
        $data_arr['page_1']["name_user"] = $data_form_yellow->name_user ;
        $data_arr['page_1']["phone_user"] = $data_form_yellow->phone_user ;
        $data_arr['page_1']["lat"] = $data_form_yellow->lat ;
        $data_arr['page_1']["lng"] = $data_form_yellow->lng ;
        $data_arr['page_1']["location_sos"] = $data_form_yellow->location_sos ;

        $data_arr['page_2']["symptom"] = $data_form_yellow->symptom ;

        $data_arr['page_3']["symptom_other"] = $data_form_yellow->symptom_other ;

        $data_arr['page_4']["idc"] = $data_form_yellow->idc ;

        $data_arr['page_5']["vehicle_type"] = $data_form_yellow->vehicle_type ;
        $data_arr['page_5']["operating_suit_type"] = $data_form_yellow->operating_suit_type ;
        $data_arr['page_5']["operation_unit_name"] = $data_form_yellow->operation_unit_name ;
        $data_arr['page_5']["action_set_name"] = $data_form_yellow->action_set_name ;
        $data_arr['page_5']["time_create_sos"] = $data_form_yellow->time_create_sos ;
        $data_arr['page_5']["time_command"] = $data_form_yellow->time_command ;
        $data_arr['page_5']["time_go_to_help"] = $data_form_yellow->time_go_to_help ;
        $data_arr['page_5']["time_to_the_scene"] = $data_form_yellow->time_to_the_scene ;
        $data_arr['page_5']["time_leave_the_scene"] = $data_form_yellow->time_leave_the_scene ;
        $data_arr['page_5']["time_hospital"] = $data_form_yellow->time_hospital ;
        $data_arr['page_5']["time_to_the_operating_base"] = $data_form_yellow->time_to_the_operating_base ;
        $data_arr['page_5']["km_create_sos_to_go_to_help"] = $data_form_yellow->km_create_sos_to_go_to_help ;
        $data_arr['page_5']["km_to_the_scene_to_leave_the_scene"] = $data_form_yellow->km_to_the_scene_to_leave_the_scene ;
        $data_arr['page_5']["km_hospital"] = $data_form_yellow->km_hospital ;
        $data_arr['page_5']["km_operating_base"] = $data_form_yellow->km_operating_base ;

        $data_arr['page_6']["rc"] = $data_form_yellow->rc ;
        $data_arr['page_6']["rc_black_text"] = $data_form_yellow->rc_black_text ;

        $data_arr['page_7']["treatment"] = $data_form_yellow->treatment ;
        $data_arr['page_7']["sub_treatment"] = $data_form_yellow->sub_treatment ;

        $data_arr['page_8']["patient_name_1"] = $data_form_yellow->patient_name_1 ;
        $data_arr['page_8']["patient_age_1"] = $data_form_yellow->patient_age_1 ;
        $data_arr['page_8']["patient_hn_1"] = $data_form_yellow->patient_hn_1 ;
        $data_arr['page_8']["patient_vn_1"] = $data_form_yellow->patient_vn_1 ;
        $data_arr['page_8']["delivered_province_1"] = $data_form_yellow->delivered_province_1 ;
        $data_arr['page_8']["delivered_hospital_1"] = $data_form_yellow->delivered_hospital_1 ;
        $data_arr['page_8']["patient_name_2"] = $data_form_yellow->patient_name_2 ;
        $data_arr['page_8']["patient_age_2"] = $data_form_yellow->patient_age_2 ;
        $data_arr['page_8']["patient_hn_2"] = $data_form_yellow->patient_hn_2 ;
        $data_arr['page_8']["patient_vn_2"] = $data_form_yellow->patient_vn_2 ;
        $data_arr['page_8']["delivered_province_2"] = $data_form_yellow->delivered_province_2 ;
        $data_arr['page_8']["delivered_hospital_2"] = $data_form_yellow->delivered_hospital_2 ;
        $data_arr['page_8']["patient_name_3"] = $data_form_yellow->patient_name_3 ;
        $data_arr['page_8']["patient_age_3"] = $data_form_yellow->patient_age_3 ;
        $data_arr['page_8']["patient_hn_3"] = $data_form_yellow->patient_hn_3 ;
        $data_arr['page_8']["patient_vn_3"] = $data_form_yellow->patient_vn_3 ;
        $data_arr['page_8']["delivered_province_3"] = $data_form_yellow->delivered_province_3 ;
        $data_arr['page_8']["delivered_hospital_3"] = $data_form_yellow->delivered_hospital_3 ;
        $data_arr['page_8']["submission_criteria"] = $data_form_yellow->submission_criteria ;
        $data_arr['page_8']["communication_hospital"] = $data_form_yellow->communication_hospital ;

        $data_arr['page_9']["registration_category"] = $data_form_yellow->registration_category ;
        $data_arr['page_9']["registration_number"] = $data_form_yellow->registration_number ;
        $data_arr['page_9']["registration_province"] = $data_form_yellow->registration_province ;
        $data_arr['page_9']["owner_registration"] = $data_form_yellow->owner_registration ;

        return $data_arr ;
    }

    function save_form_yellow(Request $request)
    {
        $requestData = $request->all();

        $data_sos_help_center = Sos_help_center::where('id',$requestData['sos_help_center_id'])->first();

        $data_Sos_1669 = Sos_1669_form_yellow::where('sos_help_center_id',$requestData['sos_help_center_id'])->first();

        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$requestData['sos_help_center_id'])->first();

        $data_arr = array();

        $data_arr["sos_help_center_id"] =  $data_form_yellow->id ;

        $data_arr['page_1']["be_notified"] = $data_form_yellow->be_notified;
        $data_arr['page_1']["name_user"] = $data_form_yellow->name_user ;
        $data_arr['page_1']["phone_user"] = $data_form_yellow->phone_user ;
        $data_arr['page_1']["lat"] = $data_form_yellow->lat ;
        $data_arr['page_1']["lng"] = $data_form_yellow->lng ;
        $data_arr['page_1']["location_sos"] = $data_form_yellow->location_sos ;

        $data_arr['page_2']["symptom"] = $data_form_yellow->symptom ;

        $data_arr['page_3']["symptom_other"] = $data_form_yellow->symptom_other ;

        $data_arr['page_4']["idc"] = $data_form_yellow->idc ;

        $data_arr['page_5']["vehicle_type"] = $data_form_yellow->vehicle_type ;
        $data_arr['page_5']["operating_suit_type"] = $data_form_yellow->operating_suit_type ;
        $data_arr['page_5']["operation_unit_name"] = $data_form_yellow->operation_unit_name ;
        $data_arr['page_5']["action_set_name"] = $data_form_yellow->action_set_name ;
        $data_arr['page_5']["time_create_sos"] = $data_form_yellow->time_create_sos ;
        $data_arr['page_5']["time_command"] = $data_form_yellow->time_command ;
        $data_arr['page_5']["time_go_to_help"] = $data_form_yellow->time_go_to_help ;
        $data_arr['page_5']["time_to_the_scene"] = $data_form_yellow->time_to_the_scene ;
        $data_arr['page_5']["time_leave_the_scene"] = $data_form_yellow->time_leave_the_scene ;
        $data_arr['page_5']["time_hospital"] = $data_form_yellow->time_hospital ;
        $data_arr['page_5']["time_to_the_operating_base"] = $data_form_yellow->time_to_the_operating_base ;
        $data_arr['page_5']["km_create_sos_to_go_to_help"] = $data_form_yellow->km_create_sos_to_go_to_help ;
        $data_arr['page_5']["km_to_the_scene_to_leave_the_scene"] = $data_form_yellow->km_to_the_scene_to_leave_the_scene ;
        $data_arr['page_5']["km_hospital"] = $data_form_yellow->km_hospital ;
        $data_arr['page_5']["km_operating_base"] = $data_form_yellow->km_operating_base ;

        $data_arr['page_6']["rc"] = $data_form_yellow->rc ;
        $data_arr['page_6']["rc_black_text"] = $data_form_yellow->rc_black_text ;

        $data_arr['page_7']["treatment"] = $data_form_yellow->treatment ;
        $data_arr['page_7']["sub_treatment"] = $data_form_yellow->sub_treatment ;

        $data_arr['page_8']["patient_name_1"] = $data_form_yellow->patient_name_1 ;
        $data_arr['page_8']["patient_age_1"] = $data_form_yellow->patient_age_1 ;
        $data_arr['page_8']["patient_hn_1"] = $data_form_yellow->patient_hn_1 ;
        $data_arr['page_8']["patient_vn_1"] = $data_form_yellow->patient_vn_1 ;
        $data_arr['page_8']["delivered_province_1"] = $data_form_yellow->delivered_province_1 ;
        $data_arr['page_8']["delivered_hospital_1"] = $data_form_yellow->delivered_hospital_1 ;
        $data_arr['page_8']["patient_name_2"] = $data_form_yellow->patient_name_2 ;
        $data_arr['page_8']["patient_age_2"] = $data_form_yellow->patient_age_2 ;
        $data_arr['page_8']["patient_hn_2"] = $data_form_yellow->patient_hn_2 ;
        $data_arr['page_8']["patient_vn_2"] = $data_form_yellow->patient_vn_2 ;
        $data_arr['page_8']["delivered_province_2"] = $data_form_yellow->delivered_province_2 ;
        $data_arr['page_8']["delivered_hospital_2"] = $data_form_yellow->delivered_hospital_2 ;
        $data_arr['page_8']["patient_name_3"] = $data_form_yellow->patient_name_3 ;
        $data_arr['page_8']["patient_age_3"] = $data_form_yellow->patient_age_3 ;
        $data_arr['page_8']["patient_hn_3"] = $data_form_yellow->patient_hn_3 ;
        $data_arr['page_8']["patient_vn_3"] = $data_form_yellow->patient_vn_3 ;
        $data_arr['page_8']["delivered_province_3"] = $data_form_yellow->delivered_province_3 ;
        $data_arr['page_8']["delivered_hospital_3"] = $data_form_yellow->delivered_hospital_3 ;
        $data_arr['page_8']["submission_criteria"] = $data_form_yellow->submission_criteria ;
        $data_arr['page_8']["communication_hospital"] = $data_form_yellow->communication_hospital ;

        $data_arr['page_9']["registration_category"] = $data_form_yellow->registration_category ;
        $data_arr['page_9']["registration_number"] = $data_form_yellow->registration_number ;
        $data_arr['page_9']["registration_province"] = $data_form_yellow->registration_province ;
        $data_arr['page_9']["owner_registration"] = $data_form_yellow->owner_registration ;

        $data_change = [] ;
        $data_change['check_data_change'] = "No" ;

        // ตรวจสอบค่าใน $data_arr ตามคีย์ที่เหมือนกันกับ $requestData["page"]
        switch ($requestData["page"]) {
            case "1":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_1'][$key]) ){

                        $old_data_DB = $data_arr['page_1'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_1'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_1' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_1'][$key]['old_data_DB'] = $data_arr['page_1'][$key] ;
                            $data_change['page_1'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_1'][$key] ;
                            $data_change['page_1'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_1'][$key] = $value ;
                        }

                    }
                }

                break;

            // เพิ่ม case สำหรับ page อื่นๆ ที่คุณต้องการตรวจสอบ
            case "2":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_2'][$key]) ){

                        $old_data_DB = $data_arr['page_2'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_2'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_2' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_2'][$key]['old_data_DB'] = $data_arr['page_2'][$key] ;
                            $data_change['page_2'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_2'][$key] ;
                            $data_change['page_2'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_2'][$key] = $value ;
                        }

                    }
                }

                break;

            case "3":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_3'][$key]) ){

                        $old_data_DB = $data_arr['page_3'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_3'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_3' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_3'][$key]['old_data_DB'] = $data_arr['page_3'][$key] ;
                            $data_change['page_3'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_3'][$key] ;
                            $data_change['page_3'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_3'][$key] = $value ;
                        }

                    }
                }
                break;

            case "4":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_4'][$key]) ){

                        $old_data_DB = $data_arr['page_4'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_4'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_4' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_4'][$key]['old_data_DB'] = $data_arr['page_4'][$key] ;
                            $data_change['page_4'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_4'][$key] ;
                            $data_change['page_4'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_4'][$key] = $value ;
                        }

                    }
                }
                break;

            case "5":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_5'][$key]) ){

                        $old_data_DB = $data_arr['page_5'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_5'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_5' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_5'][$key]['old_data_DB'] = $data_arr['page_5'][$key] ;
                            $data_change['page_5'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_5'][$key] ;
                            $data_change['page_5'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_5'][$key] = $value ;
                        }

                    }
                }
                break;

            case "6":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_6'][$key]) ){

                        $old_data_DB = $data_arr['page_6'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_6'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_6' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_6'][$key]['old_data_DB'] = $data_arr['page_6'][$key] ;
                            $data_change['page_6'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_6'][$key] ;
                            $data_change['page_6'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_6'][$key] = $value ;
                        }

                    }
                }
                break;

            case "7":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_7'][$key]) ){

                        $old_data_DB = $data_arr['page_7'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_7'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_7' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_7'][$key]['old_data_DB'] = $data_arr['page_7'][$key] ;
                            $data_change['page_7'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_7'][$key] ;
                            $data_change['page_7'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_7'][$key] = $value ;
                        }

                    }
                }
                break;

            case "8":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_8'][$key]) ){

                        $old_data_DB = $data_arr['page_8'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_8'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_8' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_8'][$key]['old_data_DB'] = $data_arr['page_8'][$key] ;
                            $data_change['page_8'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_8'][$key] ;
                            $data_change['page_8'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_8'][$key] = $value ;
                        }

                    }
                }
                break;

            case "9":
                $error_keys = array();
                foreach ($requestData as $key => $value) {
                    if( !empty($data_arr['page_9'][$key]) ){

                        $old_data_DB = $data_arr['page_9'][$key] ;
                        $old_data_WEB = $requestData["start_data_arr"]['page_9'][$key] ;
                        $new_data = $value ;
                        $check_dont_save = $requestData["check_dont_save"] ;

                        $data_change['page'] = 'page_9' ;

                        if ( ($old_data_DB != $old_data_WEB) && ($old_data_DB != $new_data) && $check_dont_save == "No" ){

                            $data_change['page_9'][$key]['old_data_DB'] = $data_arr['page_9'][$key] ;
                            $data_change['page_9'][$key]['old_data_WEB'] = $requestData["start_data_arr"]['page_9'][$key] ;
                            $data_change['page_9'][$key]['new_data'] = $value ;
                            $data_change['check_data_change'] = "Yes" ;
                        
                        }else{
                            $data_change['page_9'][$key] = $value ;
                        }

                    }
                }
                break;



        }
        

        if($data_change['check_data_change'] == "Yes"){

            return $data_change ;

        }else{

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

            $data_change['check_data_change'] == "No" ;
            $data_change['date'] = "OK";
            
            return $data_change ;
        }
    }

    function save_data_change_form_yellow(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $key => $value) {
            if ($value === 'null') {
                $requestData[$key] = null;
            }
        }
        
        $data_sos_help_center = Sos_help_center::where('id',$requestData['sos_help_center_id'])->first();

        $data_Sos_1669 = Sos_1669_form_yellow::where('sos_help_center_id',$requestData['sos_help_center_id'])->first();

        $data_Sos_1669->update($requestData);

        $data_sos_help_center->update($requestData);

        $data['check'] = "OK" ;
        $data['data'] = $requestData ;

        return $data ;

    }

    function search_data_help_center(Request $request)
    {
        $requestData = $request->all();

        $keyword = $requestData['data_search'];

        $id = $requestData['data_id'];

        if (!$id && $keyword){
            $id = $keyword ;
        }

        $data_search_be_notified = $requestData['data_search_be_notified'];
        $data_search_status = $requestData['data_search_status'];
        $data_rangeOne_officer_rating = $requestData['data_rangeOne_officer_rating'];
        $data_rangeTwo_officer_rating = $requestData['data_rangeTwo_officer_rating'];

        $name = $requestData['data_name'];
        $data_search_phone_sos = $requestData['data_search_phone_sos'];

        $helper = $requestData['data_helper'];
        $organization = $requestData['data_organization'];

        $search_P = $requestData['search_P'];
        $search_A = $requestData['search_A'];
        $search_T = $requestData['search_T'];

        $date = $requestData['data_date'];
        $time1 = date($requestData['data_time1']);
        $time2 = date($requestData['data_time2']);

        $data_search_idc = $requestData['data_search_idc'];
        $data_search_rc = $requestData['data_search_rc'];

        $sub_organization = $requestData['sub_organization'];

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

        // ค้นหาขั้นสูง
        $data = DB::table('sos_help_centers')
                ->join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->leftJoin('users', 'sos_help_centers.user_id', '=', 'users.id')
                ->select('sos_help_centers.*', 'sos_1669_form_yellows.be_notified', 'sos_1669_form_yellows.idc', 'sos_1669_form_yellows.rc', 'sos_1669_form_yellows.rc_black_text','users.photo as photo_user');
        
        if ($id) {
            $data->where('sos_help_centers.operating_code','LIKE', "%$id%");
            $keyword = null;
        }
        if ($name) {
            $data->where('sos_help_centers.name_user','LIKE', "%$name%");
            $keyword = null;
        }  
        if ($helper) {
            $data->where('sos_help_centers.name_helper','LIKE', "%$helper%");
            $keyword = null;
        }if ($organization) {
            $data->where('sos_help_centers.organization_helper','LIKE', "%$organization%");
            $keyword = null;
        }if ($date) {
            $data->whereDate('sos_help_centers.created_at', $date);
            $keyword = null;
        }
        
        if ($time1 || $time2) {
            $data->whereTime('sos_help_centers.created_at', '>=', $time_search_1)->whereTime('sos_help_centers.created_at', '<=', $time_search_2);
            $keyword = null;
        }

        $rangeOne = "" ;
        $rangeTwo = "" ;

        if ($data_rangeOne_officer_rating > $data_rangeTwo_officer_rating){
            $rangeOne = $data_rangeTwo_officer_rating ;
            $rangeTwo = $data_rangeOne_officer_rating ;
        }else{
            $rangeOne = $data_rangeOne_officer_rating ;
            $rangeTwo = $data_rangeTwo_officer_rating ;
        }
          
        if ( $data_rangeOne_officer_rating || $data_rangeTwo_officer_rating){
            $data->whereBetween('sos_help_centers.score_total', [$rangeOne, $rangeTwo] );
            $keyword = null;
        }
        if ($data_search_be_notified) {
            $data->where('sos_1669_form_yellows.be_notified', $data_search_be_notified);
            $keyword = null;
        } 
        if ($data_search_status) {
            $data->where('sos_help_centers.status', $data_search_status);
            $keyword = null;
        } 
        if ($data_search_phone_sos) {
            $data->where('sos_help_centers.phone_user','LIKE', "%$data_search_phone_sos%");
            $keyword = null;
        } 
        if ($search_P) {
            $data->where('sos_help_centers.address','LIKE', "%$search_P%");
            $keyword = null;
        } 
        if ($search_A) {
            $data->where('sos_help_centers.address','LIKE', "%$search_A%");
            $keyword = null;
        } 
        if ($search_T) {
            $data->where('sos_help_centers.address','LIKE', "%$search_T%");
            $keyword = null;
        } 
        if ($data_search_idc) {
            $data->where('sos_1669_form_yellows.idc','LIKE', "%$data_search_idc%");
            $keyword = null;
        } 
        if ($data_search_rc) {
            $data->where('sos_1669_form_yellows.rc','LIKE', "%$data_search_rc%");
            $keyword = null;
        } 

        // ค้นหาเฉาะรหัส
        $data_not_empty_keyword = DB::table('sos_help_centers');

        if ($sub_organization == "ศูนย์ใหญ่"){
            $data_not_empty_keyword->where('notify', "!=" , null);
            $data->where('sos_help_centers.notify', "!=" , null);
        }else{
            $data_not_empty_keyword->where('notify', 'LIKE', "%$sub_organization%");
            $data->where('sos_help_centers.notify', 'LIKE', "%$sub_organization%");
        }

        // --------------------------------------------------------------------------------------------------------------------

        if (!empty($keyword)) {
            // ค้นหาจาหช่องค้นหา
            $data_sos = $data_not_empty_keyword
                ->join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->leftJoin('users', 'sos_help_centers.user_id', '=', 'users.id')
                ->select('sos_help_centers.*', 'sos_1669_form_yellows.be_notified', 'sos_1669_form_yellows.idc', 'sos_1669_form_yellows.rc', 'sos_1669_form_yellows.rc_black_text','users.photo as photo_user')
                ->where(function($query) use ($keyword) {
                    $query->where('sos_help_centers.operating_code', 'like', "%$keyword%");
                })
                ->get();
        }
        else {
            // ค้นหาขั้นสูง
            $data_sos = $data->latest()->get();
        }
        
        return $data_sos ;
    }

    function get_location_operating_unit($m_lat , $m_lng , $level , $vehicle_type , $forward_level , $sub_organization){

        $latitude = (float)$m_lat ;
        $longitude = (float)$m_lng;


        if ($forward_level != "null"){

            $data_locations = DB::table('data_1669_operating_units')
                ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
                ->where('data_1669_operating_officers.status' , 'Standby')
                // ->having("distance", "<", 10)
                ->orderBy("distance");
                // ->limit(20);

            if ($forward_level == "เขียว(ไม่รุนแรง)"){
                $data_locations->where('data_1669_operating_officers.level' , "FR");
                $data_locations->orWhere('data_1669_operating_officers.level' , "BLS");
                $data_locations->orWhere('data_1669_operating_officers.level' , "ILS");
                $data_locations->orWhere('data_1669_operating_officers.level' , "ALS");
            }
            else if ($forward_level == "เหลือง(เร่งด่วน)"){
                $data_locations->where('data_1669_operating_officers.level' , "BLS");
                $data_locations->orWhere('data_1669_operating_officers.level' , "ILS");
                $data_locations->orWhere('data_1669_operating_officers.level' , "ALS");
            }
            else if ($forward_level == "แดง(วิกฤติ)"){
                $data_locations->where('data_1669_operating_officers.level' , "ILS");
                $data_locations->orWhere('data_1669_operating_officers.level' , "ALS");
            }

            $locations = $data_locations->where('data_1669_operating_units.area' , $sub_organization)->get();

        }else{

            if ($level == "all" && $vehicle_type == "all") {
                $locations = DB::table('data_1669_operating_units')
                ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
                ->where('data_1669_operating_officers.status' , 'Standby')
                ->where('data_1669_operating_units.area' , $sub_organization)
                // ->having("distance", "<", 10)
                ->orderBy("distance")
                // ->limit(20)
                ->get();
            }else if ($level == "all" && $vehicle_type != "all") {
                $locations = DB::table('data_1669_operating_units')
                ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->where('data_1669_operating_officers.vehicle_type' , $vehicle_type)
                ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
                ->where('data_1669_operating_officers.status' , 'Standby')
                ->where('data_1669_operating_units.area' , $sub_organization)
                // ->having("distance", "<", 10)
                ->orderBy("distance")
                // ->limit(20)
                ->get();
            }else if ($level != "all" && $vehicle_type == "all") {
                $locations = DB::table('data_1669_operating_units')
                ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->where('data_1669_operating_officers.level' , $level)
                ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
                ->where('data_1669_operating_officers.status' , 'Standby')
                ->where('data_1669_operating_units.area' , $sub_organization)
                // ->having("distance", "<", 10)
                ->orderBy("distance")
                // ->limit(20)
                ->get();
            }else{
                $locations = DB::table('data_1669_operating_units')
                ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->where('data_1669_operating_officers.level' , $level)
                ->where('data_1669_operating_officers.vehicle_type' , $vehicle_type)
                ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
                ->where('data_1669_operating_officers.status' , 'Standby')
                ->where('data_1669_operating_units.area' , $sub_organization)
                // ->having("distance", "<", 10)
                ->orderBy("distance")
                // ->limit(20)
                ->get();
            }
        }
        
        return $locations ;
    }

    function send_data_sos_to_operating_unit( $sos_id, $operating_unit_id, $user_id , $distance)
    {
        $data_officers = User::where('id' , $user_id)->first();
        $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->first();
        // $data_command = Data_1669_officer_command::where('id' , $data_sos->command_by)->first();
        $data_officer_1669 = Data_1669_operating_officer::where('user_id' , $user_id)->first();

        // if ($data_command->area == "กาญจนบุรี") {
        //     $name_area_command = $data_command->area ;
        // }else{
        //     $name_area_command = "วีเช็ค" ;
        // }

        $date_now = date("Y-m-d H:i:s");
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

        // โลโก้ของแต่ละจังหวัด
        $string_json = str_replace("niemslogo","กาญจนบุรี",$string_json);

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

        $return_data = [];
        $return_data['id'] = $data_sos->id ;
        $return_data['name_officer'] = $data_officer_1669->name_officer ;

        return $return_data ;
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
        $data_user = Auth::user();

        if ($data_sos->helper_id == $data_user->id) {
            return view('sos_help_center.show_case', compact('data_sos'));
        }else{
            return redirect('404');
        }
        
    }

    public function show_user_sos($id)
    {
        $data_sos = Sos_help_center::findOrFail($id);
        $data_user = Auth::user();

        return view('sos_help_center.show_user', compact('data_sos','data_user'));
    }

    public function data_officer_go_to_help($sosid)
    {   
        $data_sos = Sos_help_center::findOrFail($sosid);
        if ($data_sos->joint_case) {
            $data_sos_new = Sos_help_center::join('users', 'sos_help_centers.helper_id', '=', 'users.id')
            ->join('data_1669_operating_officers', 'sos_help_centers.helper_id', '=', 'data_1669_operating_officers.user_id')
            ->select('users.photo as officerPhoto', 'sos_help_centers.*', 'data_1669_operating_officers.lat as latOfficer', 'data_1669_operating_officers.lng as lngOfficer')
            ->whereIn('sos_help_centers.id', json_decode($data_sos->joint_case))
            ->orderBy('sos_help_centers.id' , 'ASC')
            ->get();

        } else {
            $data_sos_new = Sos_help_center::where('id', $data_sos->id)->get();

            $data_sos_new = Sos_help_center::join('users', 'sos_help_centers.helper_id', '=', 'users.id')
            ->join('data_1669_operating_officers', 'sos_help_centers.helper_id', '=', 'data_1669_operating_officers.user_id')
            ->select('users.photo as officerPhoto', 'sos_help_centers.*', 'data_1669_operating_officers.lat as latOfficer', 'data_1669_operating_officers.lng as lngOfficer')
            ->where('sos_help_centers.id',$data_sos->id)
            ->get();
        }

        return $data_sos_new ;

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
        $data['name_officer'] = $data_officer->name_officer ;
        $data['officer_lat'] = $data_officer->lat ;
        $data['officer_lng'] = $data_officer->lng ;

        return $data ;
    }

    function check_status_officer($sos_id)
    {
        $data_sos = Sos_help_center::findOrFail($sos_id);
        
        return $data_sos ;
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
        $data['rc_black_text'] = $form_yellows->rc_black_text ;
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
                            'time_leave_the_scene' => $date_now,
                    ]);

                DB::table('sos_1669_form_yellows')
                    ->where([ ['sos_help_center_id', $sos_id],])
                    ->update(['time_leave_the_scene' => $date_now,'sub_treatment' => $reason,]);
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

    function update_event_level_rc($level , $sos_id , $rc_black_text){

        if ($level != 'rc_black_text') {

            DB::table('sos_1669_form_yellows')
                ->where([ 
                        ['sos_help_center_id', $sos_id],
                    ])
                ->update([
                        'rc' => $level,
                        'rc_black_text' => null,
                    ]);
        }else{
            DB::table('sos_1669_form_yellows')
                ->where([ 
                        ['sos_help_center_id', $sos_id],
                    ])
                ->update([
                        'rc_black_text' => $rc_black_text,
                    ]);
        }
        

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
                ['user_id', $requestData['id']],
            ])
        ->update([
                'name_officer' => $requestData['name_officer'],
                'level' => $requestData['level_officer'],
                'vehicle_type' => $requestData['vehicle_type'],
            ]);
        
        return $requestData;
    }
    
    public function sos_help_officer_yellow($id)
    {
        $sos_help_center = Sos_help_center::where('id' ,  $id)->first();
        $data_user = Auth::user();
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id',$id)->first();

        // if ($data_sos->helper_id == $data_user->id) {
            return view('sos_help_officer.officer_form_yellow', compact('sos_help_center' ,'data_form_yellow'));
        // }else{
        //     return redirect('404');
        // }
        
    }

    function add_new_officers($operating_unit_id){

        if(Auth::check()){
            return redirect('register_new_officer/?operating_unit_id=' . $operating_unit_id);
        }else{
            return redirect('/login/line?redirectTo=register_new_officer/?operating_unit_id=' . $operating_unit_id);
        }

    }

    function register_new_officer(Request $request){

        $requestData = $request->all();

        $data_user = Auth::user();
        $user_id = $data_user->id ;

        $operating_unit_id = $requestData['operating_unit_id'] ;

        $data_unit = Data_1669_operating_unit::where('id' , $operating_unit_id)->first();

        $name_area =  $data_unit->area ;

        return view('data_1669_operating_officer.create', compact('operating_unit_id', 'name_area','user_id'));
    }

    function check_old_officer($user_id){

        // $data_officer = Data_1669_operating_officer::where('user_id', $user_id)->first();
        $data_officer = DB::table('data_1669_operating_officers')
            ->join('data_1669_operating_units', 'data_1669_operating_officers.operating_unit_id', '=', 'data_1669_operating_units.id')
            ->where('data_1669_operating_officers.user_id' , $user_id)
            ->select('data_1669_operating_officers.*', 'data_1669_operating_units.name as name_unit', 'data_1669_operating_units.area as area_unit')
            ->first();

        if ( empty($data_officer) ) {
            $data_officer_old['data'] = 'ไม่มีข้อมูล' ;
        }else{
            $data_officer_old['data'] = $data_officer ;
        }

        return $data_officer_old ;
    }

    public function all_name_user_partner(Request $request)
    {
        $data_user = Auth::user();
        $sub_organization = $data_user->sub_organization ;
        $organization = $data_user->organization ;

        $data_partners = Partner::where("name", $data_user->organization)
            ->where("name_area", null)
            ->get();

        foreach ($data_partners as $data_partner) {
            $name_partner = $data_partner->name ;
        }

        $keyword = $request->get('search');
        $perPage = 25;

        
    $area_user = User::where("organization", $organization)
            ->groupBy('sub_organization')
            ->get();

        if ($sub_organization == "ศูนย์ใหญ่"){

            if (!empty($keyword)) {
                // $all_user = User::Where('organization', $name_partner)
                //     ->orderByRaw("CASE WHEN role = 'admin-partner' THEN 0 ELSE 1 END, name ASC")
                //     ->Where('name', 'LIKE', "%$keyword%")
                //     ->latest()->paginate($perPage);
                $all_user = Data_1669_officer_command::orderByRaw("CASE WHEN officer_role = 'admin-partner' THEN 0 ELSE 1 END, number ASC")
                    ->Where('name_officer_command', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                // $all_user = User::Where('organization', $name_partner)
                //     ->orderByRaw("CASE WHEN role = 'admin-partner' THEN 0 ELSE 1 END, name ASC")
                //     ->latest()->paginate($perPage);
                $all_user = Data_1669_officer_command::orderByRaw("CASE WHEN officer_role = 'admin-partner' THEN 0 ELSE 1 END, number ASC")
                    ->latest()->paginate($perPage);
            }
            

        }else{

            if (!empty($keyword)) {
                // $all_user = User::Where('organization', $name_partner)
                //     ->Where('sub_organization', 'LIKE', "%$sub_organization%")
                //     ->orderByRaw("CASE WHEN role = 'admin-partner' THEN 0 ELSE 1 END, name ASC")
                //     ->Where('name', 'LIKE', "%$keyword%")
                //     ->latest()->paginate($perPage);
                $all_user = Data_1669_officer_command::Where('area', 'LIKE', "%$sub_organization%")
                    ->orderByRaw("CASE WHEN officer_role = 'admin-partner' THEN 0 ELSE 1 END, number ASC")
                    ->Where('name_officer_command', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                // $all_user = User::Where('organization', $name_partner)
                //     ->Where('sub_organization', 'LIKE', "%$sub_organization%")
                //     ->orderByRaw("CASE WHEN role = 'admin-partner' THEN 0 ELSE 1 END, name ASC")
                //     ->latest()->paginate($perPage);

                $all_user = Data_1669_officer_command::Where('area', 'LIKE', "%$sub_organization%")
                    ->orderByRaw("CASE WHEN officer_role = 'admin-partner' THEN 0 ELSE 1 END, number ASC")
                    ->latest()->paginate($perPage);
            }

        }

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        $polygon_provinces = DB::table('province_ths')
                ->where('polygon' , '!=' , null)
                ->get();

        $count_officer = count($all_user);


        return view('sos_help_center.manage_user.all_name_user_partner', compact('area_user' ,'data_partners','all_user','data_time_zone','sub_organization','polygon_provinces','count_officer'));
    }

    function update_number_officer(Request $request){

        $requestData = $request->all();

        DB::table('data_1669_officer_commands')
            ->where('id', $requestData['id_new_number'])
            ->update([
                'number' => $requestData['int_new_number'],
        ]);

        DB::table('data_1669_officer_commands')
            ->where('id', $requestData['id_old_number'])
            ->update([
                'number' => $requestData['int_old_number'],
        ]);

        return 'OK' ;
        
    }

    function rate_case($sos_id){

        $redirectTo = 'sos_help_center/' . $sos_id . "/give_rate_case" ;

        if(Auth::check()){
            return redirect('sos_help_center/' . $sos_id . '/give_rate_case');
        }else{
            return redirect('/login/line?redirectTo=' . $redirectTo);
        }

    }

    function give_rate_case($sos_id){
        
        $data_user = Auth::user();
        $data_sos_help_center = Sos_help_center::where('id' , $sos_id)->first();

        if (!empty($data_sos_help_center->score_impression)) {
            $score = "Yes" ; 
        }else{
            $score = "No" ;
        }

        return view('sos_help_center.rate_case', compact('data_user','data_sos_help_center','score'));
    }

    public function submit_score_1669($sos_id , $score_1 , $score_2 , $total_score , $comment_help)
    {
        $data_sos = Sos_help_center::findOrFail($sos_id);

        if ($comment_help == 'null') {
            $comment_help = null ;
        }

        if (empty($data_sos->score_impression)) {
            DB::table('sos_help_centers')
                ->where('id', $sos_id)
                ->update([
                    'score_impression' => $score_1,
                    'score_period' => $score_2,
                    'score_total' => number_format($total_score,2),
                    'comment_help' => $comment_help,
            ]);
        }
    }

    function send_flex_help_complete($sos_id){

        $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        $data_user_sos = User::where('id' ,$data_sos->user_id)->first();
        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->first();

        $template_path = storage_path('../public/json/flex-sos-1669/flex_help_complete.json');   
        $string_json = file_get_contents($template_path);

        $date_now = date("Y-m-d");
        $time_now = date("H:i:s");

        $time_ex = explode(":",$data_form_yellow->time_create_sos);
        
        // วัน เวลา
        $string_json = str_replace("xx มกราคม xxxx",$date_now,$string_json);
        $string_json = str_replace("xx:xx",$time_ex[0].":".$time_ex[1],$string_json);

        $string_json = str_replace("ตัวอย่าง","การช่วยเหลือเสร็จสิ้น",$string_json);
        $string_json = str_replace("NAME_USER_SOS",$data_sos->name_user,$string_json);
        $string_json = str_replace("NAME_OFFICER",$data_sos->name_helper,$string_json);

        $string_json = str_replace("SOS_ID",$sos_id,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_user_sos->provider_id,
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
            "title" => "Send flex_help_complete to",
            "content" => "ID : " . $data_user_sos->id . " / NAME : " . $data_user_sos->name,
        ];

        MyLog::create($data);

    }

    function forward_operation($sos_id){

        $requestData = [] ;

        $data_user = Auth::user();
        $data_sos_help_center = Sos_help_center::where('id' , $sos_id)->first();

        $time_create_sos = Carbon::now();

        if(!empty($data_sos_help_center->address)){

            $address_old = $data_sos_help_center->address ;
            $address_old = explode("/",$address_old);

            $province_name = $address_old[0] ;
            $district_name = $address_old[1] ;
            $sub_district_name = $address_old[2] ;

            $requestData['address'] = $province_name."/".$district_name."/".$sub_district_name ;

        }else{
            $requestData['address'] = '' ;
        }

        $requestData['lat'] = $data_sos_help_center->lat ;
        $requestData['lng'] = $data_sos_help_center->lng ;
        $requestData['name_user'] = $data_sos_help_center->name_user ;
        $requestData['phone_user'] = $data_sos_help_center->phone_user ;
        $requestData['user_id'] = $data_sos_help_center->user_id ;
        $requestData['forward_operation_from'] = $data_sos_help_center->id ;
        $requestData['photo_sos'] = $data_sos_help_center->photo_sos ;
        $requestData['create_by'] = "forward_operation_from - " . $data_sos_help_center->id;
        $requestData['notify'] = $data_sos_help_center->command_by .' - '. $province_name;
        $requestData['status'] = 'รับแจ้งเหตุ';
        $requestData['time_create_sos'] = $time_create_sos;
        
        Sos_help_center::create($requestData);

        $sos_help_center_last = Sos_help_center::latest()->first();

        // Update ตัวเก่าว่าส่งต่อปฏิบัติการไปที่ใด
        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $data_sos_help_center->id],
                ])
            ->update([
                    'forward_operation_to' => $sos_help_center_last->id,
                ]);

        $requestData['sos_help_center_id'] = $sos_help_center_last->id ;

        $requestData['be_notified'] = "ส่งต่อชุดปฏิบัติการระดับสูงกว่า" ;
        $requestData['name_user'] = $data_sos_help_center->form_yellow->name_user ;
        $requestData['phone_user'] = $data_sos_help_center->form_yellow->phone_user ;
        $requestData['lat'] = $data_sos_help_center->form_yellow->lat ;
        $requestData['lng'] = $data_sos_help_center->form_yellow->lng ;
        $requestData['location_sos'] = $data_sos_help_center->form_yellow->location_sos ;
        $requestData['symptom'] = $data_sos_help_center->form_yellow->symptom ;
        $requestData['symptom_other'] = $data_sos_help_center->form_yellow->symptom_other ;
        $requestData['idc'] = $data_sos_help_center->form_yellow->rc ;

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

    function search_officer_Standby($admin_id){

        $data_admin = User::where('id' , $admin_id)->first();

        // $Standby_officer = Data_1669_officer_command::where('status','Standby')
        //     ->where('user_id','!=' , $admin_id)
        //     ->where('number','!=' , null)
        //     ->where('area', $data_admin->sub_organization)
        //     ->get();

         $Standby_officer = DB::table('data_1669_officer_commands')
                ->leftJoin('users', 'data_1669_officer_commands.user_id', '=', 'users.id')
                ->select('data_1669_officer_commands.*', 'users.photo')
                ->where('data_1669_officer_commands.status','Standby')
                ->where('data_1669_officer_commands.user_id','!=' , $admin_id)
                ->where('data_1669_officer_commands.number','!=' , null)
                ->where('data_1669_officer_commands.area', $data_admin->sub_organization)
                ->orderBy('number' , 'ASC')
                ->get();

        return $Standby_officer ;

    }

    function Forward_notify($officer_command_id , $sos_id){

        $data_officer_command = Data_1669_officer_command::where('id',$officer_command_id)->first();
        
        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $sos_id],
                ])
            ->update([
                    'notify' => $data_officer_command->id .' - '.$data_officer_command->area,
                ]);

        return 'OK' ;
    }

    function sos_1669_command_by($sos_id , $admin_id){

        $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        $area_noti = $data_sos->notify ;
        $area_ep = explode(" - ",$area_noti) ;
        $area_count_ep = count($area_ep);
        $index_of_area = $area_count_ep - 1 ;
        $area = $area_ep[$index_of_area] ;

        $data_officer_command = Data_1669_officer_command::where('user_id',$admin_id)
            ->where('area',$area)
            ->first();

        DB::table('sos_help_centers')
            ->where([ 
                    ['id', $sos_id],
                ])
            ->update([
                    'command_by' => $data_officer_command->id,
                ]);

        DB::table('data_1669_officer_commands')
            ->where([ 
                    ['user_id', $admin_id],
                    ['area', $area],
                ])
            ->update([
                    'status' => 'Helping',
                ]);

        return "OK" ;
    }

    function get_forward_operation($forward_id){

        $data = Sos_help_center::where('id' , $forward_id)->first();

        return $data ;

    }

    public function search_all_name_user_partner(Request $request)
    {
        $user_id = $request->get('id');
        $data_search_area = $request->get('area');
        $keyword = $request->get('search');
        $data_search_status = $request->get('status');

        $data_user = User::Where('id', $user_id)->first();
        $name_partner = $data_user->organization ;

        if ($data_user->sub_organization == "ศูนย์ใหญ่"){

            // $data = User::where('organization', $name_partner);
            
            $data = DB::table('data_1669_officer_commands')
                ->leftJoin('users', 'data_1669_officer_commands.user_id', '=', 'users.id')
                ->leftJoin('users as creator', 'data_1669_officer_commands.creator', '=', 'creator.id')
                ->select('data_1669_officer_commands.*', 'users.phone', 'creator.name as creator_name'  ,'creator.photo as creator_photo')
                ->where('users.organization', $name_partner);
            

            if (!empty($keyword)) {
                $data->where(function ($query) use ($keyword) {
                    $query->where('data_1669_officer_commands.officer_role', 'like', '%'.$keyword.'%')
                          ->orWhere('data_1669_officer_commands.name_officer_command', 'like', '%'.$keyword.'%')
                          ->orWhere('data_1669_officer_commands.status', 'like', '%'.$keyword.'%')
                          ->orWhere('data_1669_officer_commands.area', 'like', '%'.$keyword.'%');
                });
                
            }

            if ( !empty($data_search_area) ){
                $data->where('data_1669_officer_commands.area', $data_search_area);
            }

            if (!empty($data_search_status)) {
                $data->where(function ($query) use ($data_search_status) {
                    $query->where('data_1669_officer_commands.officer_role', $data_search_status);
                });
            }
            
           
            $search_all_user = $data->orderByRaw("CASE WHEN data_1669_officer_commands.officer_role = 'admin-partner' THEN 0 ELSE 1 END, data_1669_officer_commands.number ASC")->latest('users.created_at')->get();

        
        } else {
        
            // $data = Data_1669_officer_command::where('area', '=', $data_search_area);

            $data = DB::table('data_1669_officer_commands')
                ->leftJoin('users', 'data_1669_officer_commands.user_id', '=', 'users.id')
                ->leftJoin('users as creator', 'data_1669_officer_commands.creator', '=', 'creator.id')
                ->select('data_1669_officer_commands.*', 'users.phone', 'creator.name as creator_name'  ,'creator.photo as creator_photo')
                ->where('data_1669_officer_commands.area', $data_search_area);

        
            if (!empty($keyword)) {
                $data->where(function ($query) use ($keyword) {
                    $query->where('data_1669_officer_commands.officer_role', 'like', '%'.$keyword.'%')
                          ->orWhere('data_1669_officer_commands.name_officer_command', 'like', '%'.$keyword.'%')
                          ->orWhere('data_1669_officer_commands.status', 'like', '%'.$keyword.'%');
                });
            }

            if (!empty($data_search_status)) {
                $data->where(function ($query) use ($data_search_status) {
                    $query->where('data_1669_officer_commands.officer_role', $data_search_status);
                });
            }
        
            $search_all_user = $data->orderByRaw("CASE WHEN data_1669_officer_commands.officer_role = 'admin-partner' THEN 0 ELSE 1 END, data_1669_officer_commands.number ASC")->latest()->get();
        }
        
        return $search_all_user; 

    }

    function create_ask_more_sos(Request $request){

        $requestData = $request->all();

        $sos_1669_id = $requestData['sos_ask_more_id'];
        $command_by = $requestData['command_by'];
        $list = $requestData['list'];

        $list_arr = explode("_" , $list) ;

        $data_sos_main = Sos_help_center::where('id', $sos_1669_id)->first();
        $data_sos_main_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $sos_1669_id)->first();
        
        $new_sos_by_joint = [] ;
        $new_sos_by_joint['lat'] = $data_sos_main->lat ;
        $new_sos_by_joint['lng'] = $data_sos_main->lng ;

        $new_sos_by_joint['photo_sos'] = $data_sos_main->photo_sos ;
        $new_sos_by_joint['name_user'] = $data_sos_main->name_user ;
        $new_sos_by_joint['phone_user'] = $data_sos_main->phone_user ;
        $new_sos_by_joint['user_id'] = $data_sos_main->user_id ;
        $new_sos_by_joint['status'] = 'รอการยืนยัน' ;
        $new_sos_by_joint['create_by'] = 'joint_with - sos_id ' . $sos_1669_id;
        $new_sos_by_joint['time_create_sos'] = date("Y-m-d h:i:s") ;
        // $new_sos_by_joint['time_command'] = $data_sos_main->time_command ;
        $new_sos_by_joint['command_by'] = $command_by ;
        $new_sos_by_joint['address'] = $data_sos_main->address ;

        $address_ep = explode("/" , $data_sos_main->address) ;
        $province_name = $address_ep[0];
        $district_name = $address_ep[1];

        $new_sos_by_joint['notify'] = 'none - ' . $province_name ;

        echo "<pre>";
        print_r($list_arr);
        echo "<pre>";
        
        echo "<br>";

        echo "<pre>";
        print_r($new_sos_by_joint);
        echo "<pre>";

    }

    function create_joint_sos_1669(Request $request){

        $requestData = $request->all();

        $sos_1669_id = $requestData['sos_1669_id'];
        $list = $requestData['list'];

        $list_arr = explode("_" , $list) ;

        $data_sos_main = Sos_help_center::where('id', $sos_1669_id)->first();
        $data_sos_main_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $sos_1669_id)->first();
        
        $new_sos_by_joint = [] ;
        $new_sos_by_joint['lat'] = $data_sos_main->lat ;
        $new_sos_by_joint['lng'] = $data_sos_main->lng ;

        $new_sos_by_joint['photo_sos'] = $data_sos_main->photo_sos ;
        $new_sos_by_joint['name_user'] = $data_sos_main->name_user ;
        $new_sos_by_joint['phone_user'] = $data_sos_main->phone_user ;
        $new_sos_by_joint['user_id'] = $data_sos_main->user_id ;
        $new_sos_by_joint['status'] = 'รอการยืนยัน' ;
        $new_sos_by_joint['create_by'] = 'joint_with - sos_id ' . $sos_1669_id;
        $new_sos_by_joint['time_create_sos'] = $data_sos_main->time_create_sos ;
        // $new_sos_by_joint['time_command'] = $data_sos_main->time_command ;
        $new_sos_by_joint['command_by'] = $data_sos_main->command_by ;
        $new_sos_by_joint['address'] = $data_sos_main->address ;

        $address_ep = explode("/" , $data_sos_main->address) ;
        $province_name = $address_ep[0];
        $district_name = $address_ep[1];

        $new_sos_by_joint['notify'] = 'none - ' . $province_name ;

        // สร้างเคส sos ร่วมทั้งหมด
        $count_new_create_sos = count($list_arr) - 1 ;

        $id_of_new_sos = array() ;
        array_push($id_of_new_sos , (int)$sos_1669_id);

        for ($i = 0; $i < (int)$count_new_create_sos; $i++){

            // สร้างรหัส
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

            $new_sos_by_joint['operating_code'] = $operating_code ;
            // จบสร้างรหัส

            $sos_help_center_last = "" ;
            Sos_help_center::create($new_sos_by_joint);

            sleep(1);
            $sos_help_center_last = Sos_help_center::latest()->first();

            $new_sos_by_joint['sos_help_center_id'] = $sos_help_center_last->id ;
            $new_sos_by_joint['be_notified'] = $data_sos_main_yellow->be_notified ;
            $new_sos_by_joint['location_sos'] = $data_sos_main_yellow->location_sos ;
            $new_sos_by_joint['idc'] = $data_sos_main_yellow->idc ;

            array_push($id_of_new_sos , $sos_help_center_last->id);

            Sos_1669_form_yellow::create($new_sos_by_joint);

        }

        // ดำเนินการส่งข้อมูลให้หน่วยปฏิบัติการตามเคส และอัพเดทเคสทั้งหมดให้มี joint_case ร่วมกัน
        for ($xi = 0; $xi < count($id_of_new_sos); $xi++){

            DB::table('sos_help_centers')
                ->where([ 
                        [ 'id', $id_of_new_sos[$xi] ],
                    ])
                ->update([
                        'joint_case' => $id_of_new_sos,
                    ]);

            $list_arr_ep = explode("-" , $list_arr[$xi]) ;

            $sos_id = $id_of_new_sos[$xi];
            $user_id = $list_arr_ep[0];
            $distance = $list_arr_ep[1] ;
            $operating_unit_id = $list_arr_ep[2] ;

            // ส่งไลน์ให้หน่วยอแพทย์ตามเคส และอัพเดทข้อมูลหน่วยปฏิบัติการเข้า sos_help_center
            $this->send_data_sos_to_operating_unit( $sos_id, $operating_unit_id, $user_id , $distance);
            
        }

        return "OK";
        // return implode(" / ",$id_of_new_sos);

    }

    function check_sos_joint_case(Request $request){

        $requestData = $request->all();
        $sos_1669_id = $requestData['sos_1669_id'];

        $sos_help_center = Sos_help_center::where('id' , $sos_1669_id)->first();

        $Data_arr = array();

        $sos_joint_case = $sos_help_center->joint_case ;

        if( !empty($sos_joint_case) ){

            $arr_joint_case = json_decode($sos_joint_case, true);

            for ($xi = 0; $xi < count($arr_joint_case); $xi++){

                $sos_by_case = Sos_help_center::where('id' , $arr_joint_case[$xi])->first();
                $arr_by_case = [];

                $arr_by_case['id'] = $sos_by_case->id;
                $arr_by_case['status'] = $sos_by_case->status;
                $arr_by_case['wait'] = $sos_by_case->wait;
                $arr_by_case['operating_code'] = $sos_by_case->operating_code;
                $arr_by_case['time_command'] = $sos_by_case->time_command;
                $arr_by_case['joint_case'] = $sos_by_case->joint_case;
                $arr_by_case['helper_id'] = $sos_by_case->helper_id;
                
                if ($arr_by_case['status'] == "ปฏิเสธ"){

                    $arr_refuse = $sos_by_case->refuse;
                    $refuse_ep = explode("," , $arr_refuse) ;
                    $refuse_last = $refuse_ep[count($refuse_ep)-1];

                    $data_officer = Data_1669_operating_officer::where('user_id' , $refuse_last)->first();
                    
                }else if($arr_by_case['status'] == "รอการยืนยัน"){

                    $data_officer = Data_1669_operating_officer::where('user_id' , $sos_by_case->wait)->first();

                }else{

                    $data_officer = Data_1669_operating_officer::where('user_id' , $sos_by_case->helper_id)->first();

                }

                $data_operating = Data_1669_operating_unit::where('id' , $data_officer->operating_unit_id)->first();

                $arr_by_case['name_wait_officer'] = $data_officer->name_officer;
                $arr_by_case['name_wait_phone'] = $data_officer->user->phone;
                $arr_by_case['name_wait_photo'] = $data_officer->user->photo;
                $arr_by_case['name_wait_level'] = $data_officer->level;
                $arr_by_case['name_wait_vehicle_type'] = $data_officer->vehicle_type;
                $arr_by_case['name_wait_operating'] = $data_operating->name;
                

                $Data_arr[$xi] = $arr_by_case ;

            }

            // $Data_arr['check_data'] = 'มีข้อมูล' ;

        }else{
            // $Data_arr['check_data'] = 'ไม่มีข้อมูล' ;
        }

        return $Data_arr ;
    }

    function send_data_new_select_officer(Request $request){

        $requestData = $request->all();
        $sos_id = $requestData['sos_id'];
        $user_id = $requestData['officer_id'];
        $operating_unit_id = $requestData['operating_unit_id'];
        $distance = $requestData['distance'];

        // ส่งไลน์ให้หน่วยอแพทย์ตามเคส และอัพเดทข้อมูลหน่วยปฏิบัติการเข้า sos_help_center
        $this->send_data_sos_to_operating_unit( $sos_id, $operating_unit_id, $user_id , $distance);

        return 'OK';

    }

    function check_officer_command_in_call($sos_id){

        $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        $data_agora = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        $check_officer_command = '';

        if ($data_agora){
            $check_officer_command = $data_agora ;
        }else{
            $data_create = [];
            $data_create['room_for'] = 'user_sos_1669';
            $data_create['sos_id'] = $sos_id;

            Agora_chat::create($data_create);
            $check_officer_command = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();
        }

        return $check_officer_command ;
    }

    function real_time_check_refuse_and_call(Request $request){

        $data = [];
        $data['refuse'] = '' ;
        $data['call'] = '' ;

        $requestData = $request->all();

        $data_user = User::where('id',$requestData['user_id'])->first();
        $area = $data_user->sub_organization ;

        $data_sos = Sos_help_center::where('status' , 'ปฏิเสธ')
            ->where('notify', 'LIKE', "%$area%")
            ->get();

        if( !empty($data_sos) ){
            foreach ($data_sos as $item_sos){

                if ( empty($data['refuse']) ){
                    $data['refuse'] = (string)$item_sos->id ;
                }else{
                    $data['refuse'] = $data['refuse'] . ',' . (string)$item_sos->id ;
                }

            }
        }else{
            $data['refuse'] = 'ไม่มีข้อมูล';
        }

        $data_agora_chat = Agora_chat::where('member_in_room' , '!=', null)->get();

        if( !empty($data_agora_chat) ){

            foreach ($data_agora_chat as $item_agora){

                // ตรวจสอบว่า sos id นี้เป็นของพื้นที่ $data_user คนนี้หรือเปล่า
                $data_for_loop = Sos_help_center::where('id' , $item_agora->sos_id)->first();

                if (str_contains($data_for_loop->notify, $area)) { 
                    $data_member_in_room = $item_agora->member_in_room;

                    $data_array = json_decode($data_member_in_room, true);
                    $check_user = $data_array['user'];

                    if( !empty($check_user) ){
                        if ( empty($data['call']) ){
                            $data['call'] = (string)$item_agora->sos_id ;
                        }else{
                            $data['call'] = $data['call'] . ',' . (string)$item_agora->sos_id ;
                        }
                    }
                }
            }

        }else{
            $data['call'] = 'ไม่มีข้อมูล';
        }

        if ( empty($data['call']) ){
            $data['call'] = 'ไม่มีข้อมูล';
        }

        return $data ;

    }
    function check_data_form_yellow_show_case(Request $request)
    {
        $requestData = $request->all();

        $sos_id = $requestData['sos_id'];

        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $sos_id)->first();

        return $data_form_yellow;
    }

    function officerSaveFormYellow(Request $request)
    {
        $requestData = $request->all();
        $sos_id = $requestData['sos_id'];

        $data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $requestData['sos_id'])->first();


        if( !empty($requestData['sub_treatment']) ){
            $sub_treatment = implode(',', array_unique($requestData['sub_treatment']));
            $requestData['sub_treatment'] = $sub_treatment;
        }
        
        if ( !empty($requestData['submission_criteria'])) {
            $submission_criteria = implode(',', array_unique($requestData['submission_criteria']));
        $requestData['submission_criteria'] = $submission_criteria;
        }
       
       
        if ( !empty($requestData['communication_hospital'])) {
            $communication_hospital = implode(',', array_unique($requestData['communication_hospital']));
            $requestData['communication_hospital'] = $communication_hospital;
        }
        
        $data_form_yellow->update($requestData);

        return $sos_id;
    }

    function officerAskMore(Request $request)
    {
        $requestData = $request->all();
        // $data_sos = Sos_help_center::where('id' , $sos_id)->first();
        // $data_officer_command = Data_1669_officer_command::where('id' , $data_sos->command_by)->first();

        $countnumber = 1;

        foreach ($requestData as $item) {

            $sos_id = $item['sos_id'];

            if (empty($data_askMore['sos_id'])) {
                $data_askMore['sos_id'] = $sos_id;
            }

            if (empty($data_askMore['officer_id'])) {
                $data_askMore['officer_id'] = $item['officer_id'];
            }

            $data_sos_help_center = Sos_help_center::where('id', $sos_id)->first();
            
            $data_officer_command = Data_1669_officer_command::where('id',$data_sos_help_center->command_by)->first();

            if ($data_officer_command->status != "Standby") {
                // $test = "ไม่ Standby";
                $data_officer_command_not_standby = Data_1669_officer_command::where('area',$data_officer_command->area)
                ->where('status' , 'Standby')
                ->orderBy('number' , 'ASC')->first();
        
                if (empty($data_askMore['noti_to'])) {
                    $data_askMore['noti_to'] =  $data_officer_command_not_standby->user_id;
                }

            }else {
                // $test = "Standby";
                if (empty($data_askMore['noti_to'])) {
                    $data_askMore['noti_to'] =  $data_officer_command->user_id;
                }
            }

            if ($item['vehicle_' . $countnumber] == "รถยนต์") {
                $data_askMore['vehicle_car'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_car'] = $item['rc_vehicle_' . $countnumber];
            }
            if ($item['vehicle_' . $countnumber] == "อากาศยาน") {
                $data_askMore['vehicle_aircraft'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_aircraft'] = $item['rc_vehicle_' . $countnumber];
            }if ($item['vehicle_' . $countnumber] == "เรือป.1") {
                $data_askMore['vehicle_boat_1'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_boat_1'] = $item['rc_vehicle_' . $countnumber];
            }if ($item['vehicle_' . $countnumber] == "เรือป.2") {
                $data_askMore['vehicle_boat_2'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_boat_2'] = $item['rc_vehicle_' . $countnumber];
            }if ($item['vehicle_' . $countnumber] == "เรือป.3") {
                $data_askMore['vehicle_boat_3'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_boat_3'] = $item['rc_vehicle_' . $countnumber];
            }if ($item['vehicle_' . $countnumber] == "เรืออื่นๆ") {
                $data_askMore['vehicle_boat_other'] = $item['amount_vehicle_' . $countnumber];
                $data_askMore['rc_boat_other'] = $item['rc_vehicle_' . $countnumber];
            }
            $countnumber++;
        }

        Sos_1669_officer_ask_more::create($data_askMore);

        return $data_askMore['noti_to'];
    }

    function update_noti_ask_mores($ask_mores_id){

        DB::table('sos_1669_officer_ask_mores')
            ->where([ 
                    [ 'id', $ask_mores_id ],
                ])
            ->update([
                    'success' => "กำลังดำเนินการ",
                ]);

        return "OK" ;

    }

    function get_location_ask_more_operating_unit(Request $request){

        $requestData = $request->all();

        $ask_more_id = $requestData['ask_more_id'];
        $ask_more_level = $requestData['ask_more_level'];
        $ask_more_vehicle_type = $requestData['ask_more_vehicle_type'];
       

        $data_sos_ask_more = Sos_1669_officer_ask_more::where('id' , $ask_more_id)->first();
        $data_sos_help_center = Sos_help_center::where('id' , $data_sos_ask_more->sos_id)->first();
        $data_1669_operating_officers = Data_1669_operating_officer::where('user_id' , $data_sos_help_center->helper_id)->first();
 
        $latitude = (float)$data_sos_help_center->lat;
        $longitude = (float)$data_sos_help_center->lng;
        
        $data_officer_ask_more = Data_1669_operating_officer::where('operating_unit_id', $data_1669_operating_officers->operating_unit_id)
        ->join('data_1669_operating_units', 'data_1669_operating_officers.operating_unit_id', '=', 'data_1669_operating_units.id')
        // ->select('data_1669_operating_units.*', 'data_1669_operating_officers.name as name_opating_uint')
        ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
        ->where('status', 'Standby')
        ->orderBy("distance");
    
        if ($ask_more_level !== "ALL") {
            $data_officer_ask_more = $data_officer_ask_more->where('level', $ask_more_level);
        }
        
        if ($ask_more_vehicle_type !== "all") {
            $data_officer_ask_more = $data_officer_ask_more->where('vehicle_type', $ask_more_vehicle_type);
        }
        
        $data_officer_ask_more = $data_officer_ask_more->get();
    
        return $data_officer_ask_more;

    }

    function delete_case(Request $request){

        $requestData = $request->all();
        $sos_id = $requestData['sos_id'];

        sos_help_center::where('id' , $sos_id)->delete();
        Sos_1669_form_yellow::where('sos_help_center_id' , $sos_id)->delete();

        return "OK" ;

    }
}