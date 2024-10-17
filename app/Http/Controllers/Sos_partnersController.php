<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_partner;
use App\Models\Sos_partner_area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Group_line;
use App\Models\Maintain_category;
use App\Models\Maintain_sub_category;
use Milon\Barcode\DNS2D;
use Intervention\Image\ImageManagerStatic as Image;

class Sos_partnersController extends Controller
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
            $sos_partners = Sos_partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('mail', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('color_main', 'LIKE', "%$keyword%")
                ->orWhere('color_navbar', 'LIKE', "%$keyword%")
                ->orWhere('color_body', 'LIKE', "%$keyword%")
                ->orWhere('class_color_menu', 'LIKE', "%$keyword%")
                ->orWhere('type_partner', 'LIKE', "%$keyword%")
                ->orWhere('full_name', 'LIKE', "%$keyword%")
                ->orWhere('show_homepage', 'LIKE', "%$keyword%")
                ->orWhere('secret_token', 'LIKE', "%$keyword%")
                ->orWhere('open_sos', 'LIKE', "%$keyword%")
                ->orWhere('open_repair', 'LIKE', "%$keyword%")
                ->orWhere('open_move', 'LIKE', "%$keyword%")
                ->orWhere('open_news', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_partners = Sos_partner::latest()->paginate($perPage);
        }

        return view('sos_partners.index', compact('sos_partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_partners.create');
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

        // Generate a unique 6-digit random number for secret_token
        do {
            $secretToken = mt_rand(100000, 999999);
        } while (Sos_partner::where('secret_token', $secretToken)->exists());
        
        $requestData['secret_token'] = $secretToken;
        
        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')->store('uploads', 'public');
        }

        $data_Sos_partner = Sos_partner::create($requestData);

        $data_user = User::create([
            'name' => 'Admin ' . $requestData['name'],
            'username' => $requestData['username'],
            'email' => 'กรุณาเพิ่มอีเมล',
            'password' => Hash::make($requestData['password']),
            'provider_id' => uniqid('Viicheck-', true),
            'status' => "active",
            // 'role' => "admin-partner",
            'organization' => $requestData['name'],
            'country' => $requestData['country'],
            'language' => $requestData['language'],
            'time_zone' => $requestData['time_zone'],
            'nationalitie' => $requestData['nationalitie'],
        ]);

        DB::table('users')
            ->where('id', $data_user->id)
            ->update([
                'role' => 'admin-partner',
                'organization_id' => $data_Sos_partner->id,
        ]);

        // สร้าง URL สำหรับ QR Code
        $qrUrl = url('/sos_partner_officers/create?sos_partner_id=' . $data_Sos_partner->id);

        // สร้าง instance ของ DNS2D
        $dns = new DNS2D();

        // สร้าง QR Code
        $qrCode = $dns->getBarcodePNG($qrUrl, 'QRCODE');

        // ใช้ Intervention Image เพื่อสร้างภาพจากข้อมูล PNG ของ QR Code
        $image = Image::make($qrCode);

        // บันทึกภาพ QR Code ลงใน public/uploads
        $qrFileName = 'qr_code_' . $data_Sos_partner->id . '.png';
        $path = public_path('img/qr_reg_officer/' . $qrFileName);
        $image->save($path);

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";

        // exit();

        // return view('partner.create_partner_sos');
        return redirect('/partner_viicheck')->with('flash_message', 'Sos_partner added!');
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
        $sos_partner = Sos_partner::findOrFail($id);

        return view('sos_partners.show', compact('sos_partner'));
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
        $sos_partner = Sos_partner::findOrFail($id);

        return view('sos_partners.edit', compact('sos_partner'));
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
        
        $sos_partner = Sos_partner::findOrFail($id);
        $sos_partner->update($requestData);

        return redirect('sos_partners')->with('flash_message', 'Sos_partner updated!');
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
        Sos_partner::destroy($id);

        return redirect('sos_partners')->with('flash_message', 'Sos_partner deleted!');
    }

    public function manage_organization()
    {
        $organization_id = Auth::user()->organization_id;
        $data_sos_partner = Sos_partner::where('id', $organization_id)->first();

        return view('sos_partners.manage_organization', compact('data_sos_partner'));
    }

    public function manage_group_line_organization()
    {
        $organization_id = Auth::user()->organization_id;
        $data_sos_partner = Sos_partner::where('id', $organization_id)->first();

        return view('sos_partners.manage_group_line_organization', compact('data_sos_partner'));
    }

    public function manage_sos_area()
    {
        $organization_id = Auth::user()->organization_id;
        $data_sos_partner = Sos_partner::where('id', $organization_id)->first();

        return view('sos_partners.manage_sos_area', compact('data_sos_partner'));
    }

    public function edit_data_sos_partners(Request $request)
    {
        
        $requestData = $request->all();
        $id = $requestData['id'] ;

        $sos_partner = Sos_partner::findOrFail($id);
        $sos_partner->update($requestData);

        return "success";
    }

    public function connect_line_groups($groupId){
        $organization_id = Auth::user()->organization_id;
        $data_sos_partner = Sos_partner::where('id', $organization_id)->first();

        return view('sos_partners.connect_line_groups', compact('groupId','data_sos_partner'));
    }

    function check_secret_token($secret_token){
        $data_sos_partner = Sos_partner::where('secret_token', $secret_token)->first();

        if( !empty($data_sos_partner->id) ){
            return $data_sos_partner ;
        }
        else{
            return "no" ;
        }
    }

    function click_cf_connect($partner_id, $partner_name, $groupId){
        DB::table('group_lines')
            ->where([
                    ['groupId', $groupId],
                ])
            ->update([
                    'owner' => $partner_name,
                    'partner_id' => $partner_id,
                    'status' => 'Active',
                ]);

        return "success";
    }

    function get_data_group_line_ower($organization_id){
        $data = Group_line::where('partner_id' , $organization_id)->get();
        return $data ;
    }

    function get_data_area($organization_id){
        $data = Sos_partner_area::where('sos_partner_id',$organization_id)
            ->where('status' , '!=' , 'd-none')
            ->get();
        return $data ;
    }

    function check_secret_token_for_area($id , $secret_token){

        $data_area = Sos_partner_area::where('id',$id)->first();
        $data_sos_partner = Sos_partner::where('id', $data_area->sos_partner_id)->first();

        if($secret_token == $data_sos_partner->secret_token){
            return "Yes";
        }
        else{
            return "No" ;
        }
    }

    function CF_select_line_for_area($id_area , $id_line_group , $type){

        $dataGroup_line = Group_line::where('id' , $id_line_group)->first();
        if(!empty($dataGroup_line->for_type)){
            // $for_type = $dataGroup_line->for_type . "," . $type ;
            $for_type_array = explode(',', $dataGroup_line->for_type);

            if (!in_array($type, $for_type_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $type เข้าไปในสตริง
                $for_type = $dataGroup_line->for_type . "," . $type;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $for_type = $dataGroup_line->for_type;
            }
        }
        else{
            $for_type = $type ;
        }

        if(!empty($dataGroup_line->partners_area_id)){
            // $partners_area_id = $dataGroup_line->partners_area_id . "," . $id_area ;
            $area_id_array = explode(',', $dataGroup_line->partners_area_id);

            if (!in_array($id_area, $area_id_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $id_area เข้าไปในสตริง
                $partners_area_id = $dataGroup_line->partners_area_id . "," . $id_area;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $partners_area_id = $dataGroup_line->partners_area_id;
            }
        }
        else{
            $partners_area_id = $id_area ;
        }

        DB::table('group_lines')
            ->where([
                    ['id', $id_line_group],
                ])
            ->update([
                    'for_type' => $for_type,
                    'partners_area_id' => $partners_area_id,
                ]);

        DB::table('sos_partner_areas')
            ->where([
                    ['id', $id_area],
                ])
            ->update([
                    'sos_group_line_id' => $id_line_group,
                    'open_sos' => "Yes",
                ]);

        return "success";

    }

    function create_name_area($name_area, $creator, $organization_id){

        $data = [];
        $data['sos_partner_id'] = $organization_id;
        $data['name_area'] = $name_area;
        $data['creator'] = $creator;

        Sos_partner_area::create($data);

        return "success" ;
    }

    function open_area($id , $type){
        DB::table('sos_partner_areas')
            ->where([
                    ['id', $id],
                ])
            ->update([
                    'status' => $type,
                ]);

        return "success" ;
    }

    public function categorie_repair_index(Request $request)
    {
        $requestData = $request->all();
        $area_id = $requestData['id'];

        return view('sos_partners.categorie_repair_index', compact('area_id'));
    }

    public function categorie_repair_create(Request $request)
    {
        $requestData = $request->all();
        $area_id = $requestData['id'];

        $data_area = Sos_partner_area::where('id' , $area_id)->first();
        $data_Sos_partner = Sos_partner::where('id' , $data_area->sos_partner_id)->first();

        return view('sos_partners.categorie_repair_create', compact('area_id','data_area','data_Sos_partner'));
    }

    public function view_data_area(Request $request)
    {
        $requestData = $request->all();
        $area_id = $requestData['id'];

        $data_area = Sos_partner_area::where('id' , $area_id)->first();
        $data_Sos_partner = Sos_partner::where('id' , $data_area->sos_partner_id)->first();

        return view('sos_partners.view_data_area', compact('area_id','data_area','data_Sos_partner'));
    }

    public function draw_area(Request $request)
    {
        $requestData = $request->all();
        $area_id = $requestData['id'];

        $data_area = Sos_partner_area::where('id' , $area_id)->first();
        $data_Sos_partner = Sos_partner::where('id' , $data_area->sos_partner_id)->first();

        return view('sos_partners.draw_area', compact('area_id','data_area','data_Sos_partner'));
    }

    public function create_categorie_repair(Request $request)
    {
        $requestData = $request->all();
        $requestData['status'] = 'Active' ;

        $name = $requestData['name'];
        $line_group_id = $requestData['line_group_id'];
        $color = $requestData['color'];
        $area_id = $requestData['area_id'];

        Maintain_category::create($requestData);

        $type = "fix" ;

        $dataGroup_line = Group_line::where('id' , $line_group_id)->first();

        if(!empty($dataGroup_line->for_type)){

            $for_type_array = explode(',', $dataGroup_line->for_type);

            if (!in_array($type, $for_type_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $type เข้าไปในสตริง
                $for_type = $dataGroup_line->for_type . "," . $type;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $for_type = $dataGroup_line->for_type;
            }
        }
        else{
            $for_type = $type ;
        }

        if(!empty($dataGroup_line->partners_area_id)){

            $area_id_array = explode(',', $dataGroup_line->partners_area_id);

            if (!in_array($area_id, $area_id_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $area_id เข้าไปในสตริง
                $partners_area_id = $dataGroup_line->partners_area_id . "," . $area_id;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $partners_area_id = $dataGroup_line->partners_area_id;
            }

        }
        else{
            $partners_area_id = $area_id ;
        }

        DB::table('group_lines')
            ->where([
                    ['id', $line_group_id],
                ])
            ->update([
                    'for_type' => $for_type,
                    'partners_area_id' => $partners_area_id,
                ]);

        DB::table('sos_partner_areas')
            ->where([
                    ['id', $area_id],
                ])
            ->update([
                    'open_repair' => "Yes",
                ]);

        return 'success' ;
    }

    function get_data_area_repair_index(){
        $data_area = Sos_partner_area::get();
        return $data_area ;
    }

    function get_data_categorie($area_id){
        // $data = Maintain_category::where('area_id' , $area_id)->get();

        $data = DB::table('maintain_categorys')
            ->leftJoin('group_lines', 'group_lines.id', '=', 'maintain_categorys.line_group_id')
            ->select('maintain_categorys.*', 'group_lines.groupName')
            ->where('maintain_categorys.area_id' , $area_id)
            ->get();

        return $data ;
    }

    function open_status_category($categorie_id, $type){

        DB::table('maintain_categorys')
            ->where([
                    ['id', $categorie_id],
                ])
            ->update([
                    'status' => $type,
                ]);
            
        $data_maintain_categorys = Maintain_category::where('id',$categorie_id)->first();
        $area_id = $data_maintain_categorys->area_id ;

        $check_active = Maintain_category::where('area_id',$area_id)
            ->where('status' , 'Active')
            ->count();

        if($check_active != 0){
            DB::table('sos_partner_areas')
            ->where([
                    ['id', $area_id],
                ])
            ->update([
                    'open_repair' => 'Yes',
                ]);
        }
        else if($check_active <= 0){
            DB::table('sos_partner_areas')
            ->where([
                    ['id', $area_id],
                ])
            ->update([
                    'open_repair' => null,
                ]);
        }

        return "success";
    }


    function categorie_repair_view(Request $request)
    {
        $requestData = $request->all();
        $categorie_id = $requestData['categorie_id'];

        $maintain_categorys = DB::table('maintain_categorys')
            ->leftJoin('group_lines', 'group_lines.id', '=', 'maintain_categorys.line_group_id')
            ->select('maintain_categorys.*', 'group_lines.groupName')
            ->where('maintain_categorys.id' , $categorie_id)
            ->first();

        $organization_id = Auth::user()->organization_id;
        $data_sos_partner = Sos_partner::where('id', $organization_id)->first();
        $secret_token = $data_sos_partner->secret_token ;

        return view('sos_partners.categorie_repair_view', compact('maintain_categorys' , 'secret_token'));
    }

    function changr_color_categorys($color , $categorys_id){
        DB::table('maintain_categorys')
            ->where([
                    ['id', $categorys_id],
                ])
            ->update([
                    'color' => '#'.$color,
                ]);

        return "success";
    }

    function get_sub_categorys($categorys_id){
        $data = Maintain_sub_category::where('category_id' , $categorys_id)->get();
        return $data ;
    }

    public function add_title_category(Request $request)
    {
        $requestData = $request->all();
        $new_data = Maintain_sub_category::create($requestData);

        $data = [];
        $data['response'] = 'success' ;
        $data['data'] = $new_data ;

        return $data ;
    }

    function open_status_sub_categorys($sub_categorys_id,$type){
        DB::table('maintain_sub_categorys')
            ->where([
                    ['id', $sub_categorys_id],
                ])
            ->update([
                    'status' => $type,
                ]);

        return "success";
    }

    function delete_sub_cat($sub_cat_id){
        Maintain_sub_category::where('id', $sub_cat_id)->delete();
        return "success" ;
    }

    public function edit_name_Categorie(Request $request)
    {
        $requestData = $request->all();

        $check_data = Maintain_category::where('name' , $requestData['name'])->first();

        if(!empty($check_data->id)){
            return "มีอยู่แล้ว" ;
            // return $check_data ;
        }
        else{
            DB::table('maintain_categorys')
                ->where([
                        ['id', $requestData['category_id']],
                    ])
                ->update([
                        'name' => $requestData['name'],
                        'user_id' => $requestData['user_id'],
                    ]);

            return 'success' ;
        }

    }

    function CF_ChangeGroupLine_categorie(Request $request)
    {
        $requestData = $request->all();

        $old_data = Maintain_category::where('id' , $requestData['id'])->first();
        $area_id = $old_data->area_id;
        $old_line_group_id = $old_data->line_group_id;

        $count = Maintain_category::where('area_id', $area_id)
            ->where('id', '!=', $requestData['id'])
            ->where('line_group_id', $old_line_group_id)
            ->count();

        if ($count <= 0) {
            // ไม่มีข้อมูล
            $data_group_lines = Group_line::where('id', $old_line_group_id)->first();

            if ($data_group_lines) {
                $arr_area_id = explode(",", $data_group_lines->partners_area_id);

                if (($key = array_search($area_id, $arr_area_id)) !== false) {
                    unset($arr_area_id[$key]);
                }

                $updated_partners_area_id = implode(",", $arr_area_id);

                $data_group_lines->partners_area_id = $updated_partners_area_id;

                $check_fix_in_area_other = Maintain_category::where('id', '!=', $requestData['id'])
                    ->where('line_group_id', $old_line_group_id)
                    ->count();
                if($check_fix_in_area_other <= 0){
                    $data_group_lines->for_type = 'sos';
                }

                $data_group_lines->save();
            }
        }

        DB::table('maintain_categorys')
            ->where([
                    ['id', $requestData['id']],
                ])
            ->update([
                    'line_group_id' => $requestData['line_group_id'],
                    'user_id' => $requestData['user_id'],
                ]);


        $type = "fix" ;

        $dataGroup_line = Group_line::where('id' , $requestData['line_group_id'])->first();

        if(!empty($dataGroup_line->for_type)){

            $for_type_array = explode(',', $dataGroup_line->for_type);

            if (!in_array($type, $for_type_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $type เข้าไปในสตริง
                $for_type = $dataGroup_line->for_type . "," . $type;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $for_type = $dataGroup_line->for_type;
            }
        }
        else{
            $for_type = $type ;
        }

        if(!empty($dataGroup_line->partners_area_id)){

            $area_id_array = explode(',', $dataGroup_line->partners_area_id);

            if (!in_array($area_id, $area_id_array)) {
                // ถ้าไม่มีใน array ให้เพิ่ม $area_id เข้าไปในสตริง
                $partners_area_id = $dataGroup_line->partners_area_id . "," . $area_id;
            } else {
                // ถ้ามีอยู่แล้ว ไม่ต้องทำอะไร หรือแสดงข้อความตามต้องการ
                $partners_area_id = $dataGroup_line->partners_area_id;
            }

        }
        else{
            $partners_area_id = $area_id ;
        }

        DB::table('group_lines')
            ->where([
                    ['id', $requestData['line_group_id']],
                ])
            ->update([
                    'for_type' => $for_type,
                    'partners_area_id' => $partners_area_id,
                ]);

        return 'success' ;
    }

    function CF_cancel_GroupLine($categorys_id , $user_id){

        $old_data = Maintain_category::where('id' , $categorys_id)->first();
        $area_id = $old_data->area_id;
        $old_line_group_id = $old_data->line_group_id;

        $count = Maintain_category::where('area_id', $area_id)
            ->where('id', '!=', $categorys_id)
            ->where('line_group_id', $old_line_group_id)
            ->count();

        if ($count <= 0) {
            // ไม่มีข้อมูล
            $data_group_lines = Group_line::where('id', $old_line_group_id)->first();

            if ($data_group_lines) {
                $arr_area_id = explode(",", $data_group_lines->partners_area_id);

                if (($key = array_search($area_id, $arr_area_id)) !== false) {
                    unset($arr_area_id[$key]);
                }

                $updated_partners_area_id = implode(",", $arr_area_id);

                $data_group_lines->partners_area_id = $updated_partners_area_id;

                $check_fix_in_area_other = Maintain_category::where('id', '!=', $categorys_id)
                    ->where('line_group_id', $old_line_group_id)
                    ->count();
                if($check_fix_in_area_other <= 0){
                    $data_group_lines->for_type = 'sos';
                }

                $data_group_lines->save();
            }
        }

        DB::table('maintain_categorys')
            ->where([
                    ['id', $categorys_id],
                ])
            ->update([
                    'line_group_id' => null,
                    'status' => 'Inactive',
                    'user_id' => $user_id,
                ]);

        return "success" ;
    }

    function CF_delete_area($area_id){

        $data_area = Sos_partner_area::where('id' , $area_id)->first();
        $arr_line_action = [] ;

        // เคลียกลุ่มไลน์ของ sos
        $sos_group_line_id = $data_area->sos_group_line_id;
        array_push($arr_line_action,$sos_group_line_id);

        $group_line_of_sos = Group_line::where('id', $sos_group_line_id)->first();

        if ($group_line_of_sos) {
            $arr_area_id = explode(",", $group_line_of_sos->partners_area_id);

            if (($key = array_search($area_id, $arr_area_id)) !== false) {
                unset($arr_area_id[$key]);
            }

            $updated_partners_area_id = implode(",", $arr_area_id);

            $group_line_of_sos->partners_area_id = $updated_partners_area_id;
            $group_line_of_sos->save();

        }

        DB::table('sos_partner_areas')
            ->where([
                    ['id', $area_id],
                ])
            ->update([
                    'sos_group_line_id' => null,
                    'sos_area' => null,
                    'status' => 'd-none',
                    'open_sos' => null,
                    'open_repair' => null,
                    'open_move' => null,
                    'open_news' => null,
                ]);

        // เคลียกลุ่มไลน์ของ maintain_categorys
        $maintain_categorys = Maintain_category::where('area_id' , $area_id)->get();

        foreach ($maintain_categorys as $item) {

            $line_group_id = $item->line_group_id ;

            array_push($arr_line_action,$line_group_id);

            $data_group_lines = Group_line::where('id', $line_group_id)->first();

            if ($data_group_lines) {
                $arr_area_id = explode(",", $data_group_lines->partners_area_id);

                if (($key = array_search($area_id, $arr_area_id)) !== false) {
                    unset($arr_area_id[$key]);
                }

                $updated_partners_area_id = implode(",", $arr_area_id);

                $data_group_lines->partners_area_id = $updated_partners_area_id;

                $data_group_lines->save();
            }


            DB::table('maintain_categorys')
                ->where([
                        ['id', $item->id],
                    ])
                ->update([
                        'status' => 'Inactive',
                        'line_group_id' => null,
                    ]);
        }


        // ตรวจสอบ line เดิมเพื่อเช็ค for_type
        // ตัดค่าที่ซ้ำกันออก
        $arr_line_action_unique = array_unique($arr_line_action);

        foreach ($arr_line_action_unique as $line_id) {

            $for_type = '';

            // ตรวจสอบว่ามีไลน์นี้สำหรับ sos ที่พื้นที่อื่นไหม
            $check_for_sos_area = Sos_partner_area::where('sos_group_line_id' , $line_id)->count();

            if ($check_for_sos_area != 0) {
                $for_type = 'sos';
            }

            // ตรวจสอบว่ามีไลน์นี้สำหรับ fix ที่พื้นที่อื่นไหม
            $check_for_fix_area = Maintain_category::where('line_group_id' , $line_id)->count();

            if ($check_for_fix_area != 0) {
                if(!empty($for_type)){
                    $for_type = 'sos,fix';
                }
                else{
                    $for_type = 'fix';
                }
            }

            DB::table('group_lines')
                ->where([
                        ['id', $line_id],
                    ])
                ->update([
                        'for_type' => $for_type,
                    ]);
            
        }

        return "success" ;
    }

}
