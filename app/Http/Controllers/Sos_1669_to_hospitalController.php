<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sos_1669_to_hospital;
use Illuminate\Http\Request;
use App\Models\Data_1669_officer_hospital;

class Sos_1669_to_hospitalController extends Controller
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
            $sos_1669_to_hospital = Sos_1669_to_hospital::where('area', 'LIKE', "%$keyword%")
                ->orWhere('officer_hospital_id', 'LIKE', "%$keyword%")
                ->orWhere('command_id', 'LIKE', "%$keyword%")
                ->orWhere('sos_help_center_id', 'LIKE', "%$keyword%")
                ->orWhere('form_yellow_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_1669_to_hospital = Sos_1669_to_hospital::latest()->paginate($perPage);
        }

        return view('sos_1669_to_hospital.index', compact('sos_1669_to_hospital'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_1669_to_hospital.create');
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
        
        Sos_1669_to_hospital::create($requestData);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital added!');
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
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);

        return view('sos_1669_to_hospital.show', compact('sos_1669_to_hospital'));
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
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);

        return view('sos_1669_to_hospital.edit', compact('sos_1669_to_hospital'));
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
        
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);
        $sos_1669_to_hospital->update($requestData);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital updated!');
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
        Sos_1669_to_hospital::destroy($id);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital deleted!');
    }

    function start_get_data_sos_hospital($user_id){

        $data_officer = Data_1669_officer_hospital::where('user_id',$user_id)->first();
        $hospital_offices_id = $data_officer->hospital_offices_id;

        $data = Sos_1669_to_hospital::where('hospital_office_id' , $hospital_offices_id)->get();

        $data = DB::table('sos_1669_to_hospitals')
            ->join('sos_help_centers as centers', 'centers.id', '=', 'sos_1669_to_hospitals.sos_help_center_id')
            ->leftJoin('sos_1669_form_yellows as yellows', 'yellows.id', '=', 'sos_1669_to_hospitals.form_yellow_id')

            ->select(
                'sos_1669_to_hospitals.*',
                'centers.photo_sos as centers_photo_sos',
                'centers.status as centers_status',
                'centers.time_create_sos as centers_time_create_sos',
                'centers.operating_code as centers_operating_code',
                'yellows.name_user as yellows_name_user',
                'yellows.phone_user as yellows_phone_user',
                'yellows.symptom as yellows_symptom',
                'yellows.symptom_other as yellows_symptom_other',
                'yellows.idc as yellows_idc',
                'yellows.rc as yellows_rc',
            )

            ->where('sos_1669_to_hospitals.hospital_office_id',$hospital_offices_id)
            ->orderBy('id' , 'DESC')
            ->get();

        return $data ;
    }
}
