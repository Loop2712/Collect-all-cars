<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Privilege;
use App\Models\Redeem_code;
use App\Models\Privilege_partner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrivilegeController extends Controller
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
            $privilege = Privilege::where('partner_id', 'LIKE', "%$keyword%")
                ->orWhere('titel', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('img_cover', 'LIKE', "%$keyword%")
                ->orWhere('img_content', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('redeem_type', 'LIKE', "%$keyword%")
                ->orWhere('amount_privilege', 'LIKE', "%$keyword%")
                ->orWhere('start_privilege', 'LIKE', "%$keyword%")
                ->orWhere('expire_privilege', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('user_click_redeem', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $privilege = Privilege::latest()->paginate($perPage);
        }

        $privilege_partner = Privilege::groupBy('partner_id')->get();
        $privilege_hot = Privilege::orderBy('user_click_redeem', 'desc')->limit(10)->get();


        $sevendays = Carbon::now()->addDays(7);
        $privilege_seven_day_expire = Privilege::where('expire_privilege', '<', $sevendays)->get();


        $privilege_category_hot = Privilege::orderBy('user_click_redeem', 'desc')->groupBy('type')->limit(10)->get();

        return view('privilege.index', compact('privilege', 'privilege_partner', 'privilege_hot', 'privilege_seven_day_expire','privilege_category_hot'));
    }
    public function seach_partner(Request $request)
    {
        $id = $request->get('partner_id');

        // $perPage = 25;

        if (!empty($id)) {
            $privilege = Privilege::where('privileges.partner_id', $id)
                ->leftjoin('partners', 'privileges.partner_id', '=', 'partners.id')
                ->select(
                    'privileges.id',
                    'privileges.titel',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'partners.logo',
                    'partners.name'
                )
                ->get();

            $name_partner = Partner::where('id', $id)->first('name');
            return view('privilege.privilege_partner', compact('privilege', 'name_partner'));
        } else {
            $privilege = Privilege::join('partners', 'privileges.partner_id', '=', 'partners.id')
                ->select(
                    'privileges.id',
                    'privileges.titel',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'partners.logo',
                    'partners.name'
                )
                ->get();
            return view('privilege.privilege_partner', compact('privilege'));
        }

        // $privilege_partner = Privilege::groupBy('partner_id')->get();
        // $privilege_hot = Privilege::orderBy('user_click_redeem', 'desc')->limit(10)->get();


        // $sevendays = Carbon::now()->addDays(7);
        // $privilege_seven_day_expire = Privilege::where('expire_privilege', '<', $sevendays)->get();


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('privilege.create');
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
        if ($request->hasFile('img_cover')) {
            $requestData['img_cover'] = $request->file('img_cover')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('img_content')) {
            $requestData['img_content'] = $request->file('img_content')
                ->store('uploads', 'public');
        }

        Privilege::create($requestData);

        return redirect('privilege')->with('flash_message', 'Privilege added!');
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
        $privilege = Privilege::findOrFail($id);

        return view('privilege.show', compact('privilege'));
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
        $privilege = Privilege::findOrFail($id);

        return view('privilege.edit', compact('privilege'));
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
        if ($request->hasFile('img_cover')) {
            $requestData['img_cover'] = $request->file('img_cover')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('img_content')) {
            $requestData['img_content'] = $request->file('img_content')
                ->store('uploads', 'public');
        }

        $privilege = Privilege::findOrFail($id);
        $privilege->update($requestData);

        return redirect('privilege')->with('flash_message', 'Privilege updated!');
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
        Privilege::destroy($id);

        return redirect('privilege')->with('flash_message', 'Privilege deleted!');
    }

    public function get_code_redeem(Request $request)
    {
        $requestData = $request->all();

        // ตรวจสอบ redeem_codes ที่เคยกดไว้
        $check_privilege = Privilege::join('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
            ->leftjoin('privilege_partners', 'privileges.partner_id', '=', 'privilege_partners.id')
            ->where('privileges.id', $requestData['privilege_id'])
            ->where('redeem_codes.user_id', $requestData['user_id'])
            ->select(
                'privileges.id',
                'privileges.redeem_type',
                'privileges.titel',
                'privileges.img_cover',
                'privileges.user_click_redeem',
                'redeem_codes.redeem_code',
                'privileges.expire_privilege',
                'privileges.amount_privilege',
                'redeem_codes.status',
                'redeem_codes.user_id',
                'redeem_codes.id as redeem_codes_id',
                'redeem_codes.time_update_status',
                'privilege_partners.logo'
            )
            ->first();

        // ไม่มี redeem_codes ที่เคยกด
        if ( empty($check_privilege->redeem_code) ) {
            $privilege = Privilege::join('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
                ->leftjoin('privilege_partners', 'privileges.partner_id', '=', 'privilege_partners.id')
                ->Where('redeem_codes.status' , null)
                ->Where('redeem_codes.user_id' , null)
                ->where('privileges.id', $requestData['privilege_id'])
                ->select(
                    'privileges.id',
                    'privileges.titel',
                    'privileges.redeem_type',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'privileges.amount_privilege',
                    'redeem_codes.redeem_code',
                    'redeem_codes.status',
                    'redeem_codes.id as redeem_codes_id',
                    'redeem_codes.time_update_status',
                    'privilege_partners.logo'
                )
                ->first();
        }else{
            // มี redeem_codes ที่เคยกดไว้แล้ว
            $privilege = Privilege::join('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
                ->leftjoin('privilege_partners', 'privileges.partner_id', '=', 'privilege_partners.id')
                ->where('privileges.id', $requestData['privilege_id'])
                ->where('redeem_codes.user_id', $requestData['user_id'])
                ->select(
                    'privileges.id',
                    'privileges.titel',
                    'privileges.redeem_type',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'redeem_codes.redeem_code',
                    'privileges.expire_privilege',
                    'privileges.amount_privilege',
                    'redeem_codes.status',
                    'redeem_codes.user_id',
                    'redeem_codes.id as redeem_codes_id',
                    'redeem_codes.time_update_status',
                    'privilege_partners.logo'
                )
                ->first();
        }

        // หากยังไม่พบข้อมูล ให้ใช้ query แบบที่สาม
        if ( empty($privilege->redeem_code) ) {
            // ไม่เจอ redeem_code ที่ว่าง
            $privilege = Privilege::join('privilege_partners', 'privileges.partner_id', '=', 'privilege_partners.id')
                ->where('privileges.id', $requestData['privilege_id'])
                ->select(
                    'privileges.id',
                    'privileges.titel',
                    'privileges.redeem_type',
                    'privileges.img_cover',
                    'privileges.amount_privilege',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'privilege_partners.logo'
                )
                ->first();
        }
        else if ( !empty($privilege->redeem_code) ) {

            if($privilege->status != 'success'){

                if($privilege->amount_privilege == 'ไม่จำกัด'){
                    $get_data_code = Redeem_code::where('privilege_id',$privilege->id)
                        ->where('user_id' , null)
                        ->get();
                    $check_old_user_id = Redeem_code::where('privilege_id',$privilege->id)
                        ->where('user_id' , $requestData['user_id'])
                        ->first();
                    $check_old = '' ;
                    if( !empty($check_old_user_id->id) ){
                        $check_old = 'Yes' ;
                    }

                    $check_status_null = '';
                    foreach ($get_data_code as $key) {
                        if( empty($key->status) ){
                            $check_status_null = 'Yes';
                            $data_clone = [];
                            $data_clone['redeem_code'] = $key->redeem_code ;
                            $data_clone['privilege_id'] = $key->privilege_id ;
                            break;
                        }
                    }
                    if($check_status_null == 'Yes' && $check_old != 'Yes'){
                        Redeem_code::create($data_clone);
                    }
                }

                // อัพเดตสถานะและเวลาอัพเดตของ redeem_codes
                Redeem_code::where('id', $privilege->redeem_codes_id)
                    ->update([
                        'status' => 'pending',
                        'time_update_status' => now(),
                        'user_id' => $requestData['user_id']
                    ]);

                Privilege::where('id', $requestData['privilege_id'])
                    ->update([
                        'user_click_redeem' => $privilege->user_click_redeem + 1
                    ]);

                $privilege = Privilege::join('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
                    ->leftjoin('privilege_partners', 'privileges.partner_id', '=', 'privilege_partners.id')
                    ->where('redeem_codes.id' , $privilege->redeem_codes_id)
                    ->where('privileges.id', $requestData['privilege_id'])
                    ->select(
                        'privileges.titel',
                        'privileges.img_cover',
                        'privileges.redeem_type',
                        'privileges.user_click_redeem',
                        'privileges.expire_privilege',
                        'privileges.amount_privilege',
                        'redeem_codes.redeem_code',
                        'redeem_codes.status',
                        'redeem_codes.id as redeem_codes_id',
                        'redeem_codes.time_update_status',
                        'privilege_partners.logo'
                    )
                    ->first();
            }

        }



        return response()->json($privilege);
    }

    public function privilege_admin()
    {

        $name_partner = Privilege_partner::groupBy('name')->get();
        $type_privilege = Privilege::where('type', "!=" , null)
            ->groupBy('type')
            ->select('type')
            ->get();

        return view('admin_viicheck.partner.partner_privilege' , compact('name_partner','type_privilege'));

    }

    public function add_privileges(Request $request)
    {
        $requestData = $request->all();

        // if (is_string($requestData['partner_id'])) {
        //     dd( 'partner_id เป็น string');
        // } elseif (is_int($requestData['partner_id'])) {
        //     dd( 'partner_id เป็น int');
        // } else {
        //     dd( 'partner_id ไม่ใช่ string หรือ int');
        // }

        $num = $requestData['partner_id']; // รับค่า partner_id จากข้อมูลที่ส่งมา

        if (is_numeric($num) && strval(intval($num)) === $num) {

        } else {
            $data_arr = [];
            $data_arr['name'] = $requestData['partner_id'];
            $data_arr['status'] = 'active';
            $data_partner = Privilege_partner::create($data_arr);

            $requestData['partner_id'] = $data_partner->id;
        }

        if ($request->hasFile('img_cover')) {
            $requestData['img_cover'] = $request->file('img_cover')->store('uploads', 'public');
        }
        if ($request->hasFile('img_content')) {
            $requestData['img_content'] = $request->file('img_content')->store('uploads', 'public');
        }   
        
        $privilege = Privilege::create($requestData);

        $data_return = [];

        if($requestData['redeem_type'] == 'member'){
            $data_return['redeem_type'] = 'member';
        }
        else if($requestData['redeem_type'] == 'code'){
            $data_return['redeem_type'] = 'code';

            if($requestData['type_gen_code'] == 'auto'){
                $data_return['type_gen_code'] = 'auto';
                $data_return['data_arr_code'] = $this->gen_code_redeem($requestData['amount_privilege'] , $privilege);
            }else{
                $data_return['type_gen_code'] = 'excel';
                $data_return['privilege_id'] = $privilege->id;
                $data_return['amount_privilege'] = $requestData['amount_privilege'];
            }
        }
        // Return response
        // return response()->json($privilege);
        return $data_return ;
    }

    function gen_code_redeem($amount_privilege, $privilege){

        $data_arr_code = [] ;
        if($amount_privilege != "ไม่จำกัด"){
            $amount_privilege = (int)$amount_privilege ;

            for ($i=0; $i < $amount_privilege ; $i++) { 
                // สร้างค่า uniqid
                $uniqid = uniqid('', true);

                // เอาค่า uniqid ที่ได้มา และเอาเฉพาะตัวเลขและตัวอักษรมาใช้
                $uniqid = preg_replace('/[^a-zA-Z0-9]/', '', $uniqid);

                // สุ่มตัวอักษร 12 ตัว
                $uniqid = substr(str_shuffle($uniqid), 0, 12);

                // แบ่งเป็นกลุ่ม ๆ ละ 4 ตัว
                $part1 = substr($uniqid, 0, 4);
                $part2 = substr($uniqid, 4, 4);
                $part3 = substr($uniqid, 8, 4);

                // รวมกันเป็นรูปแบบ xxxx-xxxx-xxxx
                $code_redeem = $part1 . '-' . $part2 . '-' . $part3;

                $data_arr = [];
                $data_arr['redeem_code'] = $code_redeem;
                $data_arr['privilege_id'] = $privilege->id;

                Redeem_code::create($data_arr);

                $data_arr_code[] = $code_redeem;

            }
        }
        else{
            $uniqid = uniqid('', true);

            // เอาค่า uniqid ที่ได้มา และเอาเฉพาะตัวเลขและตัวอักษรมาใช้
            $uniqid = preg_replace('/[^a-zA-Z0-9]/', '', $uniqid);

            // สุ่มตัวอักษร 12 ตัว
            $uniqid = substr(str_shuffle($uniqid), 0, 12);

            // แบ่งเป็นกลุ่ม ๆ ละ 4 ตัว
            $part1 = substr($uniqid, 0, 4);
            $part2 = substr($uniqid, 4, 4);
            $part3 = substr($uniqid, 8, 4);

            // รวมกันเป็นรูปแบบ xxxx-xxxx-xxxx
            $code_redeem = $part1 . '-' . $part2 . '-' . $part3;

            $data_arr = [];
            $data_arr['redeem_code'] = $code_redeem;
            $data_arr['privilege_id'] = $privilege->id;

            Redeem_code::create($data_arr);

            $data_arr_code[] = $code_redeem;

        }

        return $data_arr_code;
    }

    function create_redeem_code_excel(Request $request , $privilege_id , $amount_privilege)
    {
        $requestData = $request->all();
        $data_arr = [];

        $check_count = 1 ;
        $count = 0 ;
        if($amount_privilege != 'ไม่จำกัด'){
            $check_count = (int)$amount_privilege ;
        }

        foreach ($requestData as $item) {

            $count = $count + 1 ;

            if($count <= $check_count){
                foreach ($item as $key => $value) {
                    $data_arr[$key] = $value;
                }

                $data_arr['privilege_id'] = $privilege_id;

                Redeem_code::create($data_arr);
            }
        }

        return "success" ;

    }
}
