<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Privilege;
use App\Models\Redeem_code;
use App\Models\Partner;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


        return view('privilege.index', compact('privilege', 'privilege_partner', 'privilege_hot', 'privilege_seven_day_expire'));
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


        $privilege = Privilege::leftjoin('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
            ->join('partners', 'privileges.partner_id', '=', 'partners.id')
            ->where('privileges.id', $requestData['privilege_id'])
            ->where('redeem_codes.user_id', $requestData['user_id'])
            ->select(
                'privileges.titel',
                'privileges.img_cover',
                'privileges.user_click_redeem',
                'redeem_codes.redeem_code',
                'privileges.expire_privilege',
                'redeem_codes.status',
                'redeem_codes.user_id',
                'redeem_codes.id as redeem_codes_id',
                'redeem_codes.time_update_status',
                'partners.logo'
            )
            ->first();

        if (!$privilege) {
            $privilege = Privilege::join('redeem_codes', 'privileges.id', '=', 'redeem_codes.privilege_id')
                ->join('partners', 'privileges.partner_id', '=', 'partners.id')
                ->WhereNull('redeem_codes.status')
                ->WhereNull('redeem_codes.user_id')
                ->where('privileges.id', $requestData['privilege_id'])
                ->select(
                    'privileges.titel',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'redeem_codes.redeem_code',
                    'redeem_codes.status',
                    'redeem_codes.id as redeem_codes_id',
                    'redeem_codes.time_update_status',
                    'partners.logo'
                )
                ->first();
        }

        // หากยังไม่พบข้อมูล ให้ใช้ query แบบที่สาม
        if (!$privilege) {
            $privilege = Privilege::join('partners', 'privileges.partner_id', '=', 'partners.id')
                ->where('privileges.id', $requestData['privilege_id'])
                ->select(
                    'privileges.titel',
                    'privileges.img_cover',
                    'privileges.user_click_redeem',
                    'privileges.expire_privilege',
                    'partners.logo'
                )
                ->first();
        }


        if ($privilege) {
            // อัพเดตสถานะและเวลาอัพเดตของ redeem_codes
            Redeem_code::where('id', $privilege->redeem_codes_id)->whereNull('status')->update([
                'status' => 'pending',
                'time_update_status' => now(),
                'user_id' => $requestData['privilege_id']
            ]);

            Privilege::where('id', $requestData['privilege_id'])->update([
                'user_click_redeem' => $privilege->user_click_redeem + 1
            ]);
        }



        return response()->json($privilege);
    }
}
