<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_1669_form_yellow;
use Illuminate\Http\Request;

class Sos_1669_form_yellowController extends Controller
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
            $sos_1669_form_yellow = Sos_1669_form_yellow::where('be_notified', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->orWhere('phone_user', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('location_sos', 'LIKE', "%$keyword%")
                ->orWhere('symptom', 'LIKE', "%$keyword%")
                ->orWhere('symptom_other', 'LIKE', "%$keyword%")
                ->orWhere('idc', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_type', 'LIKE', "%$keyword%")
                ->orWhere('operation_unit_name', 'LIKE', "%$keyword%")
                ->orWhere('action_set_name', 'LIKE', "%$keyword%")
                ->orWhere('operating_suit_type', 'LIKE', "%$keyword%")
                ->orWhere('time_create_sos', 'LIKE', "%$keyword%")
                ->orWhere('time_command', 'LIKE', "%$keyword%")
                ->orWhere('time_go_to_help', 'LIKE', "%$keyword%")
                ->orWhere('time_to_the_scene', 'LIKE', "%$keyword%")
                ->orWhere('time_leave_the_scene', 'LIKE', "%$keyword%")
                ->orWhere('time_hospital', 'LIKE', "%$keyword%")
                ->orWhere('time_to_the_operating_base', 'LIKE', "%$keyword%")
                ->orWhere('km_create_sos_to_go_to_help', 'LIKE', "%$keyword%")
                ->orWhere('km_to_the_scene_to_leave_the_scene', 'LIKE', "%$keyword%")
                ->orWhere('km_hospital', 'LIKE', "%$keyword%")
                ->orWhere('km_operating_base', 'LIKE', "%$keyword%")
                ->orWhere('rc', 'LIKE', "%$keyword%")
                ->orWhere('rc_black_text', 'LIKE', "%$keyword%")
                ->orWhere('treatment', 'LIKE', "%$keyword%")
                ->orWhere('sub_treatment', 'LIKE', "%$keyword%")
                ->orWhere('patient_name_1', 'LIKE', "%$keyword%")
                ->orWhere('patient_age_1', 'LIKE', "%$keyword%")
                ->orWhere('patient_hn_1', 'LIKE', "%$keyword%")
                ->orWhere('patient_vn_1', 'LIKE', "%$keyword%")
                ->orWhere('delivered_province_1', 'LIKE', "%$keyword%")
                ->orWhere('delivered_hospital_1', 'LIKE', "%$keyword%")
                ->orWhere('patient_name_2', 'LIKE', "%$keyword%")
                ->orWhere('patient_age_2', 'LIKE', "%$keyword%")
                ->orWhere('patient_hn_2', 'LIKE', "%$keyword%")
                ->orWhere('patient_vn_2', 'LIKE', "%$keyword%")
                ->orWhere('delivered_province_2', 'LIKE', "%$keyword%")
                ->orWhere('delivered_hospital_2', 'LIKE', "%$keyword%")
                ->orWhere('submission_criteria', 'LIKE', "%$keyword%")
                ->orWhere('communication_hospital', 'LIKE', "%$keyword%")
                ->orWhere('registration_category', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('registration_province', 'LIKE', "%$keyword%")
                ->orWhere('owner_registration', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_1669_form_yellow = Sos_1669_form_yellow::latest()->paginate($perPage);
        }

        return view('sos_1669_form_yellow.index', compact('sos_1669_form_yellow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_1669_form_yellow.create');
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
        
        Sos_1669_form_yellow::create($requestData);

        return redirect('sos_1669_form_yellow')->with('flash_message', 'Sos_1669_form_yellow added!');
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
        $sos_1669_form_yellow = Sos_1669_form_yellow::findOrFail($id);

        return view('sos_1669_form_yellow.show', compact('sos_1669_form_yellow'));
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
        $sos_1669_form_yellow = Sos_1669_form_yellow::findOrFail($id);

        return view('sos_1669_form_yellow.edit', compact('sos_1669_form_yellow'));
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
        
        $sos_1669_form_yellow = Sos_1669_form_yellow::findOrFail($id);
        $sos_1669_form_yellow->update($requestData);

        return redirect('sos_1669_form_yellow')->with('flash_message', 'Sos_1669_form_yellow updated!');
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
        Sos_1669_form_yellow::destroy($id);

        return redirect('sos_1669_form_yellow')->with('flash_message', 'Sos_1669_form_yellow deleted!');
    }
}
