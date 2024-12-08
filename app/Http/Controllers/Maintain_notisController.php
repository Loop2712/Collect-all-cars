<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Models\Maintain_notified_user;
use App\Models\Maintain_noti;
// use GPBMetadata\Google\Api\Auth;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Maintain_category;
use App\Models\Maintain_sub_category;
use App\Http\Controllers\API\API_Time_zone;
use App\Models\Mylog;
use App\Models\Group_line;
use App\Models\Sos_partner_area;
use App\Models\Sos_partner_officer;
use App\Models\Maintain_device_code;
use App\Models\Sos_partner;


use Illuminate\Http\Request;

class Maintain_notisController extends Controller
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

        $user = Auth::user();

        $maintain_notis = Maintain_noti::where('maintain_notis.user_id' , $user->id)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->select('maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys')
        ->latest()
        ->paginate($perPage);

            // ดึงเวลาที่ผู้ใช้เข้าดูครั้งล่าสุดจาก session
        $lastVisit = session()->get('last_visit', now());

        // อัปเดตเวลาการเข้าดูใหม่ล่าสุดใน session
        session()->put('last_visit', now());


        return view('maintain_notis.index', compact('maintain_notis' ,'lastVisit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();

        $lest_data_maintain = Maintain_notified_user::where('maintain_notified_users.user_id', $user->id)
        ->leftJoin('users', 'maintain_notified_users.user_id', '=', 'users.id')
        ->select('users.email' , 'users.phone' ,'maintain_notified_users.*')
        ->first();

        $data_user = User::where('users.id', $user->id) // ระบุว่าคอลัมน์ id มาจากตาราง users
            ->leftJoin('partners', 'users.organization_id', '=', 'partners.id')
            ->select('users.*', 'partners.name as partner_name')
            ->first();

        $data_cat = Maintain_category::where('area_id',$data_user->organization_id)
            ->get();

        return view('maintain_notis.create' , compact('data_user','lest_data_maintain','data_cat'));
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
        $user = Auth::user();
        $requestData['user_id'] = $user->id ;
        $data_maintain_notified_user = Maintain_notified_user::updateOrCreate(
            [
                'user_id' => $user->id, // เงื่อนไขในการตรวจสอบว่ามีข้อมูลอยู่แล้วหรือไม่
            ],
            [
                // ข้อมูลที่ต้องการบันทึก ไม่ว่าจะเป็นการ create หรือ update
                'name' => $requestData['maintain_notified_name'],
                'department' => $requestData['maintain_notified_department'],
                'position' => $requestData['maintain_notified_position'],
                'user_id' => $requestData['user_id'],
            ]
        );
        $requestData['maintain_notified_user_id'] = $data_maintain_notified_user->id;
        $requestData['name_user'] = $data_maintain_notified_user->name ;
        $requestData['status'] = 'แจ้งซ่อม' ;


        DB::table('users')
        ->where([
                ['id', $user->id]
            ])
        ->update([
                'email' => $requestData['user_email'],
                'phone' => $requestData['user_phone'],
            ]);

            $request->validate([
                'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // กำหนดการตรวจสอบไฟล์
            ]);

            if ($request->hasFile('photos')) {
                $photoPaths = []; // สร้าง array สำหรับเก็บ path ของไฟล์

                foreach ($request->file('photos') as $file) {
                    // เก็บไฟล์ใน storage และเพิ่ม path ใน array
                    $photoPaths[] = $file->store('uploads', 'public');
                }

                // แปลง array เป็น JSON และเก็บใน column photo
                $requestData['photo'] = json_encode($photoPaths);
            }
        // dd($requestData , $data_maintain_notified_user->id);
        $Maintain_noti_data = Maintain_noti::create($requestData);
// dd($Maintain_noti_data->id);
        $this->maintain_create_groupline($Maintain_noti_data->id);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti added!');
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
        // $maintain_noti = Maintain_noti::findOrFail($id);
        $maintain_noti = Maintain_noti::where('maintain_notis.id' , $id)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->leftJoin('users', 'maintain_notis.user_id', '=', 'users.id')
        ->leftJoin('maintain_notified_users', 'maintain_notis.user_id', '=', 'maintain_notified_users.user_id')
        ->select('maintain_notified_users.name as maintain_user_name','users.email' , 'users.phone' ,'maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys')
        ->first();

        return view('maintain_notis.show', compact('maintain_noti'));
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
        $maintain_noti = Maintain_noti::findOrFail($id);

        return view('maintain_notis.edit', compact('maintain_noti'));
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

        $maintain_noti = Maintain_noti::findOrFail($id);
        $maintain_noti->update($requestData);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti updated!');
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
        Maintain_noti::destroy($id);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti deleted!');
    }

    public function get_sub_category(Request $request)
    {
        $requestData = $request->all();
        $category_id =  $requestData['category_id'];

        // ค้นหาหมวดหมู่ย่อยตาม category_id
        $maintain_sub_cat = Maintain_sub_category::where('category_id', $category_id)->get();

        // ส่งคืนหมวดหมู่ย่อยในรูปแบบ JSON
        return response()->json($maintain_sub_cat);
    }

    public function maintain_notis_rating($id)
    {
        $maintain_noti = Maintain_noti::where('maintain_notis.id' , $id)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->select('maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys')
        ->first();

        return view('maintain_notis.maintain_notis_rating', compact('maintain_noti'));
    }

    public function submit_rating_maintain(Request $request)
    {
        // รับข้อมูลจาก request
        $maintainId = $request->input('maintain_id');
        $ratingMaintain = $request->input('rating_maintain');
        $ratingOperation = $request->input('rating_operation');
        $ratingImpression = $request->input('rating_impression');
        $ratingRemark = $request->input('rating_remark'); // รับข้อมูลคำแนะนำเพิ่มเติม

        // ค้นหาข้อมูล maintain โดยใช้ maintain_id
        $maintain = Maintain_noti::where('id', $maintainId)->first();

        if ($maintain) {
            // อัปเดตเรตติ้งลงในคอลัมน์ที่เกี่ยวข้อง
            $maintain->rating_maintain = $ratingMaintain;
            $maintain->rating_operation = $ratingOperation;
            $maintain->rating_impression = $ratingImpression;

            // คำนวณค่าเฉลี่ยของทั้ง 3 คอลัมน์ และปัดให้เป็นทศนิยม 1 ตำแหน่ง
            $ratingSum = round(($ratingMaintain + $ratingOperation + $ratingImpression) / 3, 1);
            $maintain->rating_sum = $ratingSum;

            // อัปเดตคำแนะนำเพิ่มเติมลงในฐานข้อมูล
            $maintain->rating_remark = $ratingRemark;

            // บันทึกข้อมูล
            $maintain->save();

            return response()->json([
                'success' => true,
                'message' => 'Ratings, average, and remark updated successfully!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Maintain not found!',
            ]);
        }
    }


    public function maintain_create_groupline($maintain_id)
    {

        $data_maintain = Maintain_noti::where('maintain_notis.id' , $maintain_id)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->leftJoin('users', 'maintain_notis.user_id', '=', 'users.id')
        ->leftJoin('maintain_notified_users', 'maintain_notis.user_id', '=', 'maintain_notified_users.user_id')
        ->select('maintain_notified_users.name as maintain_user_name','users.email' , 'users.phone' ,'maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys' ,'maintain_categorys.line_group_id as maintain_group_line_id')
        ->first();

        // dd(env('CHANNEL_ACCESS_TOKEN'));
        $group_line = Group_line::findOrFail($data_maintain->maintain_group_line_id);

        $data_time_maintain = $data_maintain->created_at;
        $date_maintain_create = strtotime($data_time_maintain);

        $date_maintain = date('d/m/Y', $date_maintain_create);
        $time_maintain = date('g:i:sa', $date_maintain_create);

        // dd($data_maintain->name_categorys , $data_maintain->name_sub_categorys
        // ,$data_maintain->title
        // ,$data_maintain->detail_location
        // ,$data_maintain->name_area);

        $template_path = storage_path('../public/json/maintain/maintain_create.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("name_category","$data_maintain->name_categorys",$string_json);
        $string_json = str_replace("sub_category","$data_maintain->name_sub_categorys",$string_json);
        $string_json = str_replace("problem","$data_maintain->title",$string_json);
        $string_json = str_replace("detail_location","$data_maintain->detail_location",$string_json);
        $string_json = str_replace("location","$data_maintain->name_area",$string_json);

        $string_json = str_replace("D/M/Y",$date_maintain,$string_json);
        $string_json = str_replace("H:I:S",$time_maintain,$string_json);


        $string_json = str_replace("Name",$data_maintain->maintain_user_name,$string_json);
        $string_json = str_replace("phone",$data_maintain->phone,$string_json);

        $string_json = str_replace("maintain_ID",$data_maintain->id,$string_json);


        $messages = [ json_decode($string_json, true) ];

        // --- ตัวใหม่ กดเสร็จสิ้น จากหน้าเว็บ MAP --
        $body = [
            "to" => $group_line->groupId,
            "messages" => $messages,
        ];

        // flex ask_for_help
        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer ' . env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data = [
            "title" => "ViiCHECK ขอขอบคุณที่ร่วมสร้างสังคมที่ดีค่ะ",
            "content" => "reply Success",
        ];
        MyLog::create($data);

        return $result;




    }
    public function get_data_area_maintain(Request $request)
    {
        $requestData = $request->all();
        $area_id = $requestData['area_id'];

        // ค้นหาหมวดหมู่ย่อยตาม category_id
        $maintain_area = Sos_partner_area::where('id', $area_id)->get('name_area');
        $maintain_cat = Maintain_category::where('area_id', $area_id)->get(['id', 'name']);


        // รวมข้อมูลทั้งสองก่อนส่งคืนในรูปแบบ JSON
        $response_data = [
            'maintain_area' => $maintain_area,
            'maintain_cat' => $maintain_cat
        ];

        // ส่งคืนข้อมูลในรูปแบบ JSON
        return response()->json($response_data);
    }

    public function command_maintain(Request $request)
    {
        $user_id = 1;
        $maintain_id = $request->get('maintain_id');

        $data_maintains = Maintain_noti::where('maintain_notis.id',$maintain_id)
        ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('maintain_notified_users', 'maintain_notis.maintain_notified_user_id', '=', 'maintain_notified_users.user_id')
        ->join('users', 'maintain_notis.user_id', '=', 'users.id')
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'users.email as mail_user',
        'maintain_notified_users.position as position_user',
        'maintain_notified_users.department as department_user',
        'users.phone as phone_user',)
        ->first();
        // dd($data_maintains);

        // $data_maintains = Maintain_noti::where('maintain_notis.id',$maintain_id)
        // ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        // ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        // ->join('sos_partner_areas', 'maintain_notis.area_id', '=', 'sos_partner_areas.id')
        // ->join('users', 'maintain_notis.user_id', '=', 'users.id')
        // ->first();
        // dd($data_maintains);


        $data_officer = Sos_partner_officer::where('user_id',$user_id)
        // ->where('sos_partner_id',$data_maintains->partner_id)
        ->first();


        return view('maintain_notis.maintain_officer_command',compact('data_maintains' ,'data_officer'));


    }

    function Maintain_officer (Request $request){

        $user_id = 1;
        $maintain_id = $request->get('maintain_id');

        $data_maintains = Maintain_noti::where('maintain_notis.id',$maintain_id)
        ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
        ->join('maintain_notified_users', 'maintain_notis.maintain_notified_user_id', '=', 'maintain_notified_users.user_id')
        ->join('users', 'maintain_notis.user_id', '=', 'users.id')
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'sos_partner_areas.name_area as name_area',
        'maintain_notified_users.department as department_user',
        'maintain_notified_users.position as position_user',
        'users.email as mail_user',
        'users.phone as phone_user',)
        ->first();

        $data_officer = Sos_partner_officer::where('user_id',$user_id)
        // ->where('sos_partner_id',$data_maintains->partner_id)
        ->first();

        return view('test_repair_admin/test_officer_maintain',compact('data_maintains' ,'data_officer'));
    }

    public function Maintain_officer_Store(Request $request, $id) {
        $maintain_noti = Maintain_noti::findOrFail($id); // ใช้ findOrFail เพื่อจัดการกรณีที่ไม่พบ id

        // ตรวจสอบว่ามีการอัปโหลดรูปภาพ
        if ($request->hasFile('photo_repair_costs')) {
            $photo_repair_costs = [];

            foreach ($request->file('photo_repair_costs') as $photo) {
                // บันทึกรูปภาพในโฟลเดอร์ 'uploads' และรับเส้นทางของไฟล์ที่บันทึก
                $path = $photo->store('uploads', 'public');
                $photo_repair_costs[] = $path; // เพิ่มเส้นทางรูปภาพใน array
            }

            // แปลง array เป็น JSON เพื่อบันทึกในคอลัมน์ photo ในฐานข้อมูล
            $maintain_noti->photo_repair_costs = json_encode($photo_repair_costs);
        }

        // ดึงข้อมูลอื่น ๆ โดยไม่รวม photo
        $requestData = $request->except('photo_repair_costs');

        // อัปเดตข้อมูลอื่นๆ ในฐานข้อมูล
        $maintain_noti->update($requestData); // อัปเดตด้วยข้อมูลที่ไม่ซ้ำซ้อนกับคอลัมน์ photo

        return redirect()->back();
    }

    public function WorkCalendar(Request $request, $officer_id) {
        $officer_id_int = (int)$officer_id; // แปลงเป็น integer
        $data_maintains = Maintain_noti::whereJsonContains('officer_id',$officer_id_int)
        ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('maintain_device_codes', 'maintain_notis.device_code_id', '=', 'maintain_device_codes.id')
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_categorys.color as color_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'maintain_device_codes.name as name_device')
        ->get();

        return $data_maintains;
    }

    //=============== คุณภาพการซ่อม =======================

    function viifix_repair_quality_index(Request $request){

        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();
        $data_partner_area = Sos_partner_area::where('sos_partner_id',$data_partner->id)->get();

        $data_maintains = Maintain_noti::where('partner_id',$data_partner->id)->get();

        return view('test_repair_admin/viifix_repair_quality/index',compact('data_maintains' ,'data_partner','data_partner_area'));
    }

    function viifix_repair_quality_view(Request $request ,$officer_id){

        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();

        $data_officer = Sos_partner_officer::where('id',$officer_id)->first();

        return view('test_repair_admin/viifix_repair_quality/view',compact('data_officer' ,'data_partner'));
    }

    function viifix_repair_quality_detail(Request $request ){
        $maintain_id = $request->get('maintain_id');
        $officer_id = strval($request->get('officer_id')); // แปลงเป็น string

        return view('test_repair_admin/viifix_repair_quality/detail',compact('maintain_id' ,'officer_id'));
    }

    public function create_data_officer_quality_repiar_index(Request $request) {

        $partner_id = $request->get('partner_id');
        $area_id = $request->get('area_id');

        // ดึงข้อมูลเจ้าหน้าที่
        $data = Sos_partner_officer::join('users', 'sos_partner_officers.user_id', '=', 'users.id')
        ->join('sos_partner_areas', 'sos_partner_officers.area_id', '=', 'sos_partner_areas.id')
        ->when($area_id, function ($query, $area_id) {
            return $query->where('sos_partner_officers.area_id', $area_id);
        })
        ->where('sos_partner_officers.sos_partner_id', $partner_id)
        ->select('sos_partner_officers.*', 'users.photo as photo_officer', 'sos_partner_areas.name_area as area_officer')
        ->get();

        foreach ($data as $key => $value) {
            // ดึงข้อมูล maintain_notis ที่ officer_id ตรงกับเจ้าหน้าที่
            // ใช้ whereJsonContains เพื่อค้นหาว่า id ของเจ้าหน้าที่อยู่ใน array ของ officer_id
            $data_maintains = Maintain_noti::whereJsonContains('officer_id', ['officer_id' => $value->id])
                ->select('maintain_notis.*')  // เลือกเฉพาะสถานะ
                ->get();

            // นับจำนวนสถานะใน data_maintains
            $status_count = $data_maintains->groupBy('status')->map->count();

            // ใส่ข้อมูลจำนวน status ลงใน maintain ของเจ้าหน้าที่
            $value->maintain = [
                'success' => $status_count->get('เสร็จสิ้น', 0),
                'pending' => $status_count->get('รอดำเนินการ', 0),
                'in_progress' => $status_count->get('ดำเนินการ', 0)
            ];

            //======================================================

            // กรองข้อมูล maintain_notis ที่มี status = 'เสร็จสิ้น'
            $completed_maintains = $data_maintains->filter(function ($item) {
                return $item->status === 'เสร็จสิ้น';
            });

            // คำนวณค่าเฉลี่ยของ rating
            $total_sum = $completed_maintains->sum('rating_sum');
            $total_impression = $completed_maintains->sum('rating_impression');
            $total_operation = $completed_maintains->sum('rating_operation');
            $total_maintain = $completed_maintains->sum('rating_maintain');

            $count = $completed_maintains->count();

            // คำนวณค่าเฉลี่ยถ้ามีข้อมูล
            $value->rating = [
                'rating_sum' => $count > 0 ? round($total_sum / $count, 2) : 0,
                'rating_impression' => $count > 0 ? round($total_impression / $count, 2) : 0,
                'rating_operation' => $count > 0 ? round($total_operation / $count, 2) : 0,
                'rating_maintain' => $count > 0 ? round($total_maintain / $count, 2) : 0
            ];


        }

        return $data;
    }

    public function create_data_officer_quality_repiar_view(Request $request) {

        $partner_id = $request->get('partner_id');
        $officer_id = strval($request->get('officer_id')); // แปลงเป็น string

        // ดึงข้อมูลเจ้าหน้าที่
        $data = Sos_partner_officer::join('users', 'sos_partner_officers.user_id', '=', 'users.id')
            ->where('sos_partner_officers.id', $officer_id)
            ->select('sos_partner_officers.*', 'users.photo as photo_officer')
            ->first();

        $data_maintains = Maintain_noti::whereJsonContains('officer_id', ['officer_id' => $data->id])->get();

        // สร้างอาเรย์สำหรับเก็บข้อมูล maintain
        $maintain_data = [];

        // นำข้อมูลจาก data_maintains ใส่ใน maintain_data
        foreach ($data_maintains as $maintain) {
            $maintain_data[] = [
                'id' => $maintain->id,
                'status' => $maintain->status,
                'title' => $maintain->title,
                'datetime_command' => $maintain->datetime_command,
                'detail_title' => $maintain->detail_title,
                'rating_sum' => $maintain->rating_sum,
                'rating_impression' => $maintain->rating_impression,
                'rating_operation' => $maintain->rating_operation,
                'rating_maintain' => $maintain->rating_maintain,
                // เพิ่มข้อมูลที่ต้องการจาก maintain_notis
            ];
        }

        // นำ maintain_data ใส่ใน data['maintain']
        $data['maintain'] = $maintain_data;
        $data['count'] = $data_maintains->count();

        return $data;
    }

    public function create_data_officer_quality_repiar_detail(Request $request) {

        $maintain_id = $request->get('maintain_id');
        $officer_id = strval($request->get('officer_id')); // แปลงเป็น string

        // ดึงข้อมูลเจ้าหน้าที่
        $data = Sos_partner_officer::join('users', 'sos_partner_officers.user_id', '=', 'users.id')
            ->where('sos_partner_officers.id', $officer_id)
            ->select('sos_partner_officers.*', 'users.photo as photo_officer')
            ->first();

        $data_maintains = Maintain_noti::where('maintain_notis.id',$maintain_id)
            ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
            ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
            ->join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
            ->join('users', 'maintain_notis.user_id', '=', 'users.id')
            ->select('maintain_notis.*',
            'maintain_categorys.name as name_categories',
            'maintain_sub_categorys.name as name_subs_categories',
            'sos_partner_areas.name_area as name_area',)
            ->first();

        // แปลง officer_id ใน Maintain ให้อยู่ในรูปแบบ array ของ ID
        $officer_ids = collect(json_decode($data_maintains->officer_id))->pluck('officer_id')->toArray();

        // ดึงข้อมูลเจ้าหน้าที่ที่มี ID ตรงกับ officer_ids
        $officer_data = Sos_partner_officer::whereIn('id', $officer_ids)
            ->select('full_name') // เลือกเฉพาะ id และ full_name
            ->get();


        // นำ maintain_data ใส่ใน data['maintain']
        $data['maintain'] = $data_maintains;
        $data['officer'] = $officer_data;

        return $data;
    }

    //=============== จบส่วน คุณภาพการซ่อม =======================

}
