<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Vote_kan_data_station;
use App\Models\Vote_kan_station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Vote_kan_stationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 2500;

        if (!empty($keyword)) {
            $vote_kan_stations = Vote_kan_station::where('name', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('amphoe', 'LIKE', "%$keyword%")
                ->orWhere('tambon', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_stations = Vote_kan_station::latest()->paginate($perPage);
        }

        return view('vote_kan_stations.index', compact('vote_kan_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data_user = Auth::user();

        $data = Vote_kan_data_station::groupBy('amphoe')->get();
        $check_user = Vote_kan_station::where('user_id',$data_user->id)->first();

        return view('vote_kan_stations.create', compact('data','check_user'));
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
        
        Vote_kan_station::create($requestData);

        $data_old = Vote_kan_data_station::where('amphoe' , $requestData['amphoe'])
            ->where('area' , $requestData['area'])
            ->where('tambon' , $requestData['tambon'])
            ->first();

        $old_not_registered = $data_old->not_registered;
        $old_registered = $data_old->registered;

        // ลงทะเบียนแล้ว
        if(empty($old_registered)){
            $update_registered = $requestData['polling_station_at'] ;
        }else{
            $update_registered = $old_registered . ',' . $requestData['polling_station_at'] ;
        }

        $old_not_registered_array = explode(",", $old_not_registered);

        // ค่าที่คุณต้องการลบ
        $valueToRemove = $requestData['polling_station_at'];

        // ใช้ array_filter() เพื่อลบค่าที่เท่ากับ $valueToRemove
        $filteredArray = array_filter($old_not_registered_array, function($value) use ($valueToRemove) {
            return $value !== $valueToRemove;
        });

        $update_not_registered = implode(",", $filteredArray);

        DB::table('vote_kan_data_stations')
            ->where([ 
                    ['amphoe', $requestData['amphoe']],
                    ['area', $requestData['area']],
                    ['tambon', $requestData['tambon']],
                ])
            ->update([
                    'not_registered' => $update_not_registered,
                    'registered' => $update_registered,
                ]);

        // return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station added!');
        return redirect()->back();
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
        $vote_kan_station = Vote_kan_station::findOrFail($id);

        return view('vote_kan_stations.show', compact('vote_kan_station'));
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
        $data = Vote_kan_data_station::groupBy('amphoe')->get();
        $vote_kan_station = Vote_kan_station::findOrFail($id);

        return view('vote_kan_stations.edit', compact('data','vote_kan_station'));
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
        
        $vote_kan_station = Vote_kan_station::findOrFail($id);
        $vote_kan_station->update($requestData);

        // ------------- แก้ไขเอาหน่วยที่ลงผผิดไปกลับมา
        $data_for_edit = Vote_kan_data_station::where('amphoe' , $requestData['old_amphoe'])
            ->where('area' , $requestData['old_area'])
            ->where('tambon' , $requestData['old_tambon'])
            ->first();

        $edit_not_registered = $data_for_edit->not_registered;
        $edit_registered = $data_for_edit->registered;

        if(empty($edit_not_registered)){
            $update_edit_not_registered = $requestData['old_polling_station_at'] ;
        }else{
            $update_edit_not_registered = $edit_not_registered . ',' . $requestData['old_polling_station_at'] ;
        }

        $edit_registered_array = explode(",", $edit_registered);

        // ค่าที่คุณต้องการลบ
        $edit_valueToRemove = $requestData['old_polling_station_at'];

        // ใช้ array_filter() เพื่อลบค่าที่เท่ากับ $edit_valueToRemove
        $edit_filteredArray = array_filter($edit_registered_array, function($edit_value) use ($edit_valueToRemove) {
            return $edit_value !== $edit_valueToRemove;
        });

        $update_edit_registered = implode(",", $edit_filteredArray);

        DB::table('vote_kan_data_stations')
            ->where([ 
                    ['amphoe', $requestData['old_amphoe']],
                    ['area', $requestData['old_area']],
                    ['tambon', $requestData['old_tambon']],
                ])
            ->update([
                    'not_registered' => $update_edit_not_registered,
                    'registered' => $update_edit_registered,
                ]);


        // --------------- update ข้อมูลใหม่
        $data_old = Vote_kan_data_station::where('amphoe' , $requestData['amphoe'])
            ->where('area' , $requestData['area'])
            ->where('tambon' , $requestData['tambon'])
            ->first();

        $old_not_registered = $data_old->not_registered;
        $old_registered = $data_old->registered;

        // ลงทะเบียนแล้ว
        if(empty($old_registered)){
            $update_registered = $requestData['polling_station_at'] ;
        }else{
            $update_registered = $old_registered . ',' . $requestData['polling_station_at'] ;
        }

        $old_not_registered_array = explode(",", $old_not_registered);

        // ค่าที่คุณต้องการลบ
        $valueToRemove = $requestData['polling_station_at'];

        // ใช้ array_filter() เพื่อลบค่าที่เท่ากับ $valueToRemove
        $filteredArray = array_filter($old_not_registered_array, function($value) use ($valueToRemove) {
            return $value !== $valueToRemove;
        });

        $update_not_registered = implode(",", $filteredArray);

        DB::table('vote_kan_data_stations')
            ->where([ 
                    ['amphoe', $requestData['amphoe']],
                    ['area', $requestData['area']],
                    ['tambon', $requestData['tambon']],
                ])
            ->update([
                    'not_registered' => $update_not_registered,
                    'registered' => $update_registered,
                ]);

        return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station updated!');
        // return redirect()->back();
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
        Vote_kan_station::destroy($id);

        return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station deleted!');
    }
}
