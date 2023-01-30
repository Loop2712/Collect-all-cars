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

        $all_provinces = DB::table('districts')
            ->where('province' , '!=' , null)
            ->groupBy('province')
            ->orderBy('province' , 'ASC')
            ->get();

        return view('sos_help_center.edit', compact('sos_help_center','all_provinces'));
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

        $sos_help_center = Sos_help_center::findOrFail($id);
        $sos_help_center->update($requestData);
        
        return redirect('sos_help_center/' . $id . '/edit')->with('flash_message', 'Sos_help_center updated!');
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

        $count_data = Sos_help_center::count();
     
      

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
        
        // elseif($needFilter){
        //     $data_sos = Sos_help_center::Where('id' , $id)
        //         ->Where('name_user',    'LIKE', '%' .$name.  '%')
        //     // ->where('name_helper',    'LIKE', '%' .$helper.  '%')

        //         ->where('organization_helper',    'LIKE', '%' .$organization.'%')
        //     // ->where('name_helper',    'LIKE', '%' .$helper.  '%')
        //     // ->where('created_at',    'LIKE', '%' .$date. '%')
        //     // ->whereBetween('created_at', [$time1,$time2])

        //     ->latest()->paginate($perPage);
        // }
     
        
        




        return view('sos_help_center.help_center_admin', compact('data_user' , 'data_sos' ,'count_data'));

    }

    public function create_new_sos_help_center($user_id)
    {
        $requestData = [] ;
        $requestData['create_by'] = $user_id;

        Sos_help_center::create($requestData);

        $sos_help_center_last = Sos_help_center::latest()->first();

        return $sos_help_center_last->id;
    }

    function save_form_yellow(Request $request)
    {
        $requestData = $request->all();

        $data_sos_help_center = Sos_help_center::where('id',$requestData['sos_help_center_id'])->first();
        $data_sos_help_center->update($requestData);

        $data_Sos_1669 = Sos_1669_form_yellow::where('sos_help_center_id',$requestData['sos_help_center_id'])->first();

        if ($data_Sos_1669) {
            $data_Sos_1669->update($requestData);
        }else{
            Sos_1669_form_yellow::create($requestData);
        }

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
            $data->where('id', $id);
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
            $data_sos = Sos_help_center::where('id', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->orWhere('photo_sos', 'LIKE', "%$keyword%")
                ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                ->orWhere('name_helper', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        }
        else {
            $data_sos = $data->latest()->paginate($perPage);
        }
        

        return $data_sos ;
    }

    function get_location_operating_unit($m_lat , $m_lng , $level){

        $latitude = (float)$m_lat ;
        $longitude = (float)$m_lng;

        if ($level == 'all') {
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }else{
            $locations = DB::table('data_1669_operating_units')
            ->join('data_1669_operating_officers', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
            ->where('data_1669_operating_units.level' , $level)
            ->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( data_1669_operating_officers.lat ) ) * cos( radians( data_1669_operating_officers.lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( data_1669_operating_officers.lat ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", 10)
            ->orderBy("distance")
            ->limit(20)
            ->get();
        }
        
        return $locations ;
    }

}
