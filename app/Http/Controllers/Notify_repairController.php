<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Notify_repair;
use Illuminate\Http\Request;

use Auth;
use App\Models\Condo_LineMessagingAPI;

use App\Models\Partner_condo;
use App\Models\Partner;
use App\Models\User_condo;
use App\Models\Category_condo;
use App\Models\Group_line;

class Notify_repairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $building = $request->get('building');
        $perPage = 25;

        $user = Auth::user();

        if ($user->role == "admin-condo") {
            $name_condo_of_admin = $user->organization ;
            $data_partners = Partner::where('name' ,$name_condo_of_admin)->where('name_area' , null)->first();

            $condo_id = $data_partners->condo_id ;

            $all_building = User_condo::where('condo_id' , $condo_id)->groupBy('building')->get();
        }

        if (!empty($building)) {
            $notify_repair = Notify_repair::where('building', $building)
                ->where('condo_id', $condo_id)
                ->latest()
                ->paginate($perPage);
            
        } else {
            $building = "ทั้งหมด";
            $notify_repair = Notify_repair::where('condo_id', $condo_id)
                ->latest()
                ->paginate($perPage);
        }

        $naem_group_line = Group_line::where('condo_id' , $condo_id)->where('system' , 'notify_repair')->first();
        $all_group_line = Group_line::where('owner' , null)->get();

        return view('notify_repair.index', compact('notify_repair', 'user', 'all_building','building' , 'condo_id','naem_group_line','all_group_line'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $date_now = date("Y-m-d");

        $building = $request->get('building');

        if (empty($building)) {
            $building = "ทั้งหมด";
        }

        $condo_id = $request->get('condo_id');

        $user = Auth::user();

        $all_building = User_condo::where('condo_id' , $condo_id)->groupBy('building')->get();

        $data_user_condo = User_condo::where('user_id' , $user->id)->where('condo_id' , $condo_id)->first();

        $data_category_condo = Category_condo::where('system' , 'notify_repair')
            ->where('condo_id' , null)
            ->orWhere('condo_id' , $condo_id)
            ->get();

        return view('notify_repair.create', compact('user','condo_id','all_building','building','data_category_condo' ,'data_user_condo' ,'date_now'));

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
        $date_now = date('Y-m-d\TH:i:sP');

        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
            ->store('uploads', 'public');
        }

        $requestData['status'] = "รอยืนยันการนัด";
        $requestData['time_wait_cf'] = $date_now;

        Notify_repair::create($requestData);

        $condo_id = $requestData['condo_id'];
        $data_condos = Partner_condo::where('id' , $condo_id)->first();
        $link_line_oa = $data_condos->link_line_oa ;

        if (!empty($requestData['user_condo_id'])) {
            return view('notify_repair.add_line', compact('link_line_oa'));
        }else{
            return redirect('notify_repair')->with('flash_message', 'Notify_repair added!');
        }

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
        $notify_repair = Notify_repair::findOrFail($id);

        return view('notify_repair.show', compact('notify_repair'));
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
        $notify_repair = Notify_repair::findOrFail($id);

        return view('notify_repair.edit', compact('notify_repair'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $notify_repair = Notify_repair::findOrFail($id);
        $notify_repair->update($requestData);

        return redirect('notify_repair')->with('flash_message', 'Notify_repair updated!');
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
        Notify_repair::destroy($id);

        return redirect('notify_repair')->with('flash_message', 'Notify_repair deleted!');
    }

    public function login_line(Request $request)
    {
        $condo_id = $request->get('condo_id');

        if(Auth::check()){
            return redirect('notify_repair/create?condo_id=' . $condo_id);
        }else{
            return redirect('login/line?redirectTo=notify_repair/create?condo_id=' . $condo_id);
        }
    }

    public function select_appointment_time($appointment_date , $condo_id)
    {
        $data = Notify_repair::where('condo_id' , $condo_id)->where('appointment_date', $appointment_date)->get();

        return $data ;
    }

}
