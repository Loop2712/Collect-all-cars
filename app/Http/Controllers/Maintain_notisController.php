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
use App\Models\Maintain_material;
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

    //=============== หน้าแอดมิน viifix =======================

    function viifix_repair_admin_index(Request $request){

        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();

        $data_maintains = Maintain_noti::join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->where('maintain_notis.partner_id',$data_partner->id)
        ->select('maintain_notis.*','maintain_categorys.id as id_categories','maintain_categorys.name as name_categories')
        ->get();

        // จัดกลุ่มข้อมูลตาม 'name_categories' และดึงเฉพาะ category_id และ name_categories
        $data_categories = $data_maintains
        ->groupBy('name_categories')
        ->map(function ($group) {
            return [
                'category_id' => $group->first()->category_id,
                'name_categories' => $group->first()->name_categories,
            ];
        });

        return view('test_repair_admin/viifix_repair_admin/index',compact('data_maintains','data_partner','data_categories'));
    }

    function viifix_repair_admin_view(Request $request ,$maintain_id){

        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();
        $data_partner_area = Sos_partner_area::where('sos_partner_id',$data_partner->id)->get();

        $data_maintains = Maintain_noti::join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
        ->join('maintain_notified_users', 'maintain_notis.maintain_notified_user_id', '=', 'maintain_notified_users.id')
        ->join('users', 'maintain_notis.user_id', '=', 'users.id')
        ->where('maintain_notis.id', $maintain_id)
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'sos_partner_areas.name_area as name_area',
        'users.phone as phone_user',
        'users.email as email_user',
        'maintain_notified_users.position as position_user',
        'maintain_notified_users.department as department_user',)
        ->first();

        $officer_ids = json_decode($data_maintains->officer_id, true);

        if (is_array($officer_ids)) {
            // ดึงข้อมูลเจ้าหน้าที่ที่เกี่ยวข้อง
            $officer_data = Sos_partner_officer::whereIn('id', array_column($officer_ids, 'officer_id'))
                ->select('id', 'full_name','department','position','sos_partner_id')
                ->get();

            // ดึง sos_partner_id ของเจ้าหน้าที่ที่เกี่ยวข้องทั้งหมด
            $sos_partner_ids = $officer_data->pluck('sos_partner_id')->toArray(); // ดึง sos_partner_id จาก $officer_data

            // ดึงข้อมูลเจ้าหน้าที่ที่ไม่เกี่ยวข้อง และต้องมี sos_partner_id ตรงกับเจ้าหน้าที่ใน $officer_data
            $remain_officer_data = Sos_partner_officer::whereNotIn('id', array_column($officer_ids, 'officer_id'))
                ->whereIn('sos_partner_id', $sos_partner_ids) // เพิ่มเงื่อนไขการตรวจสอบ sos_partner_id
                ->select('id', 'full_name', 'department', 'position')
                ->get();

            // เพิ่มข้อมูลเจ้าหน้าที่ในแต่ละรายการ
            $data_maintains->officers = $officer_data;
            $data_maintains->remain_officers = $remain_officer_data;
        } else {
            $data_maintains->officers = [];
            // ดึงข้อมูลเจ้าหน้าที่ทั้งหมดในกรณีที่ไม่มี officer_ids
            $data_maintains->remain_officers = Sos_partner_officer::select('id', 'full_name', 'department', 'position')->get();
        }


        return view('test_repair_admin/viifix_repair_admin/view',compact('data_maintains','data_partner'));
    }


    public function create_data_maintain_admin_index(Request $request) {

        $partner_id = $request->get('partner_id');
        $categorie_id = $request->get('categorie');
        $status = $request->get('status');

        $data = Maintain_noti::join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
            ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
            ->join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
            ->join('maintain_notified_users', 'maintain_notis.maintain_notified_user_id', '=', 'maintain_notified_users.id')
            ->join('users', 'maintain_notis.user_id', '=', 'users.id')
            ->where('maintain_notis.partner_id', $partner_id)
            ->when($categorie_id, function ($query, $categorie_id) {
                return $query->where('maintain_notis.category_id', $categorie_id);
            })
            ->when($status, function ($query, $status) {
                return $query->where('maintain_notis.status', $status);
            })
            ->select('maintain_notis.*',
            'maintain_categorys.name as name_categories',
            'maintain_sub_categorys.name as name_subs_categories',
            'sos_partner_areas.name_area as name_area',
            'users.phone as phone_user',
            'users.email as email_user',
            'maintain_notified_users.position as position_user',
            'maintain_notified_users.department as department_user',)
            ->get();

        // แปลง officer_id ในแต่ละรายการของ $data ให้อยู่ในรูปแบบ array
        foreach ($data as $key => $item) {
            $officer_ids = json_decode($item->officer_id, true);

            if (is_array($officer_ids)) {
                // ดึงข้อมูลเจ้าหน้าที่ที่เกี่ยวข้อง
                $officer_data = Sos_partner_officer::whereIn('id', array_column($officer_ids, 'officer_id'))
                    ->select('id', 'full_name','department','position')
                    ->get();

                // เพิ่มข้อมูลเจ้าหน้าที่ในแต่ละรายการ
                $item->officers = $officer_data;
            } else {
                $item->officers = [];
            }
        }

        return $data;
    }

    public function create_timeline_maintain_admin_view(Request $request) {
        $maintain_id = $request->get('maintain_id');

        $data = Maintain_noti::join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
        ->join('maintain_notified_users', 'maintain_notis.maintain_notified_user_id', '=', 'maintain_notified_users.id')
        ->join('users', 'maintain_notis.user_id', '=', 'users.id')
        ->where('maintain_notis.id', $maintain_id)
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'sos_partner_areas.name_area as name_area',
        'users.phone as phone_user',
        'users.email as email_user',
        'maintain_notified_users.position as position_user',
        'maintain_notified_users.department as department_user',)
        ->first();

        $officer_ids = json_decode($data->officer_id, true);

        if (is_array($officer_ids)) {
            // ดึงข้อมูลเจ้าหน้าที่ที่เกี่ยวข้อง
            $officer_data = Sos_partner_officer::join('users', 'sos_partner_officers.user_id', '=', 'users.id')
                ->whereIn('sos_partner_officers.id', array_column($officer_ids, 'officer_id'))
                ->select('sos_partner_officers.id',
                'sos_partner_officers.full_name',
                'sos_partner_officers.department',
                'sos_partner_officers.position',
                'users.photo',
                'users.phone')
                ->get();

            // เรียงข้อมูลจากล่าสุดไปแรกสุด
            $officer_data = $officer_data->reverse();
            // เพิ่มข้อมูลเจ้าหน้าที่ในแต่ละรายการ
            $data->officers = $officer_data;
        } else {
            $data->officers = [];
        }

        return $data;
    }

    function change_status_maintain(Request $request){
        $maintain_id = $request->get('maintain_id');
        $status = $request->get('status');

        if ($status == "เสร็จสิ้น") {
            DB::table('maintain_notis')
                ->where('id', $maintain_id)
                ->update([
                    'status' => $status,
                    'datetime_success' => now(), // หากสถานะเป็น "เสร็จสิ้น ให้ใส่เวลาปัจจุบัน
                ]);
        } else {
            DB::table('maintain_notis')
                ->where('id', $maintain_id)
                ->update([
                    'status' => $status, // หากไม่ใช่ "เสร็จสิ้น ให้เพียงอัปเดตสถานะ
                ]);
        }

        $data_maintains = Maintain_noti::where('id',$maintain_id)->first();

        return $data_maintains;
    }

    function change_priority_maintain(Request $request){
        $maintain_id = $request->get('maintain_id');
        $priority = $request->get('priority');

        DB::table('maintain_notis')
            ->where([
                    ['id', $maintain_id]
                ])
            ->update([
                    'priority' => $priority,
                ]);

        $data_maintains = Maintain_noti::where('id',$maintain_id)->first();

        return $data_maintains;
    }

    function change_remark_admin_maintain(Request $request){
        $maintain_id = $request->get('maintain_id');
        $remark_admin = $request->get('remark_admin');

        DB::table('maintain_notis')
            ->where([
                    ['id', $maintain_id]
                ])
            ->update([
                    'remark_admin' => $remark_admin,
                ]);

        $data_maintains = Maintain_noti::where('id',$maintain_id)->first();

        return $data_maintains;
    }

    function confirm_forward_maintain(Request $request){
        $maintain_id = $request->get('maintain_id');

        DB::table('maintain_notis')
            ->where([
                    ['id', $maintain_id]
                ])
            ->update([
                    'status' => "เสร็จสิ้น",
                    'datetime_success' => now(),
                ]);

        $data_maintains = Maintain_noti::where('id',$maintain_id)->first();

        return $data_maintains;
    }


    //=============== คุณภาพการซ่อม viifix =======================

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

    function time_repair_index(Request $request){
        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();
        $data_partner_area = Sos_partner_area::where('sos_partner_id',$data_partner->id)->get();

        $data_maintains = Maintain_noti::where('partner_id',$data_partner->id)->get();
        // ใช้ count() ของ Collection โดยตรง
        $data_maintains_count = $data_maintains->count();

         // คำนวณปีปัจจุบันและย้อนหลัง 2 ปี
        $currentYear = date('Y');
        $years = [
            $currentYear,
            $currentYear - 1,
            $currentYear - 2,
        ];

        return view('test_repair_admin/viifix_repair_quality/time_repair_index',compact('data_partner','data_maintains','data_partner_area','data_maintains_count','years'));
    }

    function create_data_time_repair(Request $request){
        $partner_id = $request->get('partner_id');

        $area_id = $request->get('area_id');
        $year = $request->get('year');
        $month = $request->get('month');

        $data = Maintain_noti::join('sos_partner_areas', 'maintain_notis.partner_id', '=', 'sos_partner_areas.id')
            ->select('maintain_notis.id',
            'maintain_notis.area_id',
            'maintain_notis.datetime_command',
            'sos_partner_areas.name_area as name_area',)
            ->where('maintain_notis.partner_id',$partner_id)
            ->when($area_id, function ($query, $area_id) {
                return $query->where('maintain_notis.area_id', $area_id);
            })
            ->when($year, function ($query, $year) {
                return $query->whereYear('maintain_notis.datetime_command', $year);
            })
            ->when($month, function ($query, $month) {
                return $query->whereMonth('maintain_notis.datetime_command', $month);
            })
            ->get();

        $data['count'] = $data->count();
        return $data;
    }

    // Test การจัดการวัสดุ / อุปกรณ์ที่ใช้ในการซ่อม
    function viifix_repair_material_index(Request $request){
        $data_user = Auth::user();
        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();
        $data_partner_area = Sos_partner_area::where('sos_partner_id',$data_partner->id)->get();

        return view('test_repair_admin/viifix_repair_material/index' , compact('data_partner'));
    }

    function viifix_repair_material_view(Request $request){
        return view('test_repair_admin/viifix_repair_material/view');
    }

    function get_material_maintain(Request $request){
        $partner_id = $request->get('partner_id');
        $data_partner_area = Sos_partner_area::where('sos_partner_id',$partner_id)->get();

        $data_material = Maintain_material::
        // whereIn(
        //     'area_id',
        //     $data_partner_area->pluck('id')->toArray()
        // )
        get();

        return $data_material;
    }

    function create_material_maintain(Request $request){
        $partner_id = $request->get('partner_id');
        $material_name = $request->get('material_name');
        $material_amount = $request->get('material_amount');

         // แทรกข้อมูลลงในตาราง maintain_materials
        DB::table('maintain_materials')->insert([
            'name' => $material_name,
            'amount' => $material_amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data_partner_area = Sos_partner_area::where('sos_partner_id',$partner_id)->get();
        $data_material = Maintain_material::
        // whereIn(
        //     'area_id',
        //     $data_partner_area->pluck('id')->toArray()
        // )->
        get();

        return $data_material;
    }

    protected function chang_status_maintain(Request $request)
    {
        $requestData = $request->all();
        $id_maintain =  $requestData['id_maintain'];
        $status_maintain =  $requestData['status_maintain'];


        // $data_maintain = Maintain_noti::findOrFail($id_maintain);
        $data_maintain = Maintain_noti::where('maintain_notis.id' , $id_maintain)->leftjoin('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->leftjoin('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->leftJoin('users', 'maintain_notis.user_id', '=', 'users.id')
        ->leftJoin('maintain_notified_users', 'maintain_notis.user_id', '=', 'maintain_notified_users.user_id')
        ->select('maintain_notified_users.name as maintain_user_name','users.email' , 'users.phone' ,'maintain_notis.*','maintain_sub_categorys.name as name_sub_categorys','maintain_categorys.name as name_categorys' ,'maintain_categorys.line_group_id as maintain_group_line_id')
        ->first();

        $data_users = User::findOrFail($data_maintain->user_id);
        $date_now = date('Y-m-d\TH:i:s');


        DB::table('maintain_notis')
        ->where('id', $id_maintain)
        ->update([
            'status' => $status_maintain,
        ]);


        if ($status_maintain == 'รอดำเนินการ') {
            $template_path = storage_path('../public/json/maintain/timeline/command.json');

        } else if ($status_maintain == 'กำลังดำเนินการ') {
            $template_path = storage_path('../public/json/maintain/timeline/process.json');

        }
        else if ($status_maintain == 'เสร็จสิ้น') {
            $template_path = storage_path('../public/json/maintain/timeline/success.json');

        }
        else if ($status_maintain == 'ไม่สามารถดำเนินการได้') {
            $template_path = storage_path('../public/json/text_success.json');
        }

        $string_json = file_get_contents($template_path);

        $string_json = str_replace("name_cat",$data_maintain->name_sub_categorys,$string_json);


        if($status_maintain == 'รอดำเนินการ' && $status_maintain == 'กำลังดำเนินการ' && $status_maintain == 'เสร็จสิ้น'){

        }if($status_maintain == 'กำลังดำเนินการ' && $status_maintain == 'เสร็จสิ้น'){

        }if($status_maintain == 'เสร็จสิ้น'){

        }if($status_maintain == 'ไม่สามารถดำเนินการได้'){

            $string_json = str_replace("ระบบได้รับการตอบกลับของท่านแล้ว ขอบคุณค่ะ","มีการเปลี่ยนเจ้าหน้าที่ใหม่สำหรับการแจ้งซ่อมนี้ กรุณารอกำหนดแจ้งซ่อมจากเจ้าหน้าที่ใหม่",$string_json);
        }


        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_users->provider_id,
            "messages" => $messages,
        ];

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

        // SAVE LOG
        $data = [
            "title" => "แบบฟอร์มให้คะแนนการช่วยเหลือ",
            "content" => $data_users->name,
        ];
        MyLog::create($data);
    }

}
