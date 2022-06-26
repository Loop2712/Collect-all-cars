<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;

use App\Models\Parcel;
use Illuminate\Http\Request;
use App\Models\Partner_condo;
use App\Models\Partner;
use App\Models\User_condo;

class ParcelController extends Controller
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
            $parcel = Parcel::where('building', $building)
                ->where('condo_id', $condo_id)
                ->latest()
                ->paginate($perPage);
        } else {
            $building = "ทั้งหมด";
            $parcel = Parcel::where('condo_id', $condo_id)
                ->latest()
                ->paginate($perPage);
        }

        return view('parcel.index', compact('parcel', 'user', 'all_building','building'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $building = $request->get('building');

        $user = Auth::user();

        if ($user->role == "admin-condo") {
            $name_condo_of_admin = $user->organization ;
            $data_partners = Partner::where('name' ,$name_condo_of_admin)->where('name_area' , null)->first();

            $condo_id = $data_partners->condo_id ;

            $all_building = User_condo::where('condo_id' , $condo_id)->groupBy('building')->get();

            if (!empty($building)) {
                $all_user_condos = User_condo::where('condo_id' , $condo_id)
                    ->where('building', $building)
                    ->orderBy('building' , 'ASC')
                    ->orderBy('room_number' , 'ASC')
                    ->get();
            } else {
                $building = "ทั้งหมด";
                $all_user_condos = User_condo::where('condo_id' , $condo_id)
                    ->orderBy('building' , 'ASC')
                    ->orderBy('room_number' , 'ASC')
                    ->get();
            }
        }
        
        return view('parcel.create', compact('user','condo_id','all_building','building','all_user_condos'));
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
        $date_now = date('d/m/Y h:i:sa');
        $requestData['time_in'] = $date_now ;

        $text_arr = explode(",",$requestData['text_arr_user_con_id']);

        for ($i=0; $i < count($text_arr); $i++) { 
            if ($request->hasFile('photo')) {
                $requestData['photo_user_condo_id_' . $text_arr[$i] ] = $request->file('photo_user_condo_id_' . $text_arr[$i] )->store('uploads', 'public');
            }

            $data_user_condos = User_condo::where('id' , $text_arr[$i])->first();

            $requestData['photo'] = $requestData['photo_user_condo_id_' . $text_arr[$i]] ;
            $requestData['user_condo_id'] = $text_arr[$i] ;
            $requestData['building'] = $data_user_condos->building ;

            // echo "<pre>";
            // print_r($requestData);
            // echo "<pre>";
            // exit();

            Parcel::create($requestData);
        }

        return redirect('parcel')->with('flash_message', 'Parcel added!');
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
        $parcel = Parcel::findOrFail($id);

        return view('parcel.show', compact('parcel'));
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
        $parcel = Parcel::findOrFail($id);

        return view('parcel.edit', compact('parcel'));
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

        $parcel = Parcel::findOrFail($id);
        $parcel->update($requestData);

        return redirect('parcel')->with('flash_message', 'Parcel updated!');
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
        Parcel::destroy($id);

        return redirect('parcel')->with('flash_message', 'Parcel deleted!');
    }
}
