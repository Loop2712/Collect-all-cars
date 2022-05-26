<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Models\Check_in;
use App\User;
use Illuminate\Http\Request;
use App\Models\Name_University;
use App\Models\Partner;
use App\Http\Controllers\QrCodeGeneratorController;
use Auth;

class Check_inController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    // public function index(Request $request)
    // {
    //     $keyword = $request->get('search');
    //     $perPage = 25;

    //     if (!empty($keyword)) {
    //         $check_in = Check_in::where('user_id', 'LIKE', "%$keyword%")
    //             ->orWhere('time_in', 'LIKE', "%$keyword%")
    //             ->orWhere('time_out', 'LIKE', "%$keyword%")
    //             ->orWhere('check_in_at', 'LIKE', "%$keyword%")
    //             ->orWhere('student_id', 'LIKE', "%$keyword%")
    //             ->latest()->paginate($perPage);
    //     } else {
    //         $check_in = Check_in::latest()->paginate($perPage);
    //     }

    //     return view('check_in.index', compact('check_in'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $location = $request->get('location');

        if(Auth::check()){
            return redirect('check_in_to_cretae?location=' . $location);
        }else{
            return redirect('/login/line?redirectTo=check_in_to_cretae?location=' . $location);
        }
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

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        if ($requestData['check_in_out'] == "check_in") {
            $requestData['time_out'] = null ;
        }else if($requestData['check_in_out'] == "check_out"){
            $requestData['time_in'] = null ;
        }

        if(!empty($requestData['select_University'])) {
             
            if (!empty($requestData['student_id'])) {
                $requestData['student_id'] = $requestData['student_id'];
            }else{
                $requestData['student_id'] = "บุคลากร" ;
            }

            DB::table('users')
              ->where('id', $requestData['user_id'])
              ->where('std_of' , null)
              ->update([
                'name_staff' => $requestData['name_staff'],
                'std_of' => $requestData['select_University'],
                'student_id' =>  $requestData['student_id'],
          ]);

        }else if(!empty($requestData['name_staff'])){
            DB::table('users')
              ->where('id', $requestData['user_id'])
              ->update([
                'name_staff' => $requestData['name_staff'],
            ]);
        }

        if (!empty($requestData['student_id_2'])) {
            $requestData['student_id'] = $requestData['student_id_2'] ;
        }

        if(!empty($requestData['phone_user'])){
            DB::table('users')
              ->where('id', $requestData['user_id'])
              ->update([
                'phone' => $requestData['phone_user'],
            ]);
        }

        $requestData['check_in_at'] = str_replace("_"," ",$requestData['check_in_at']);

        // $requestData['name_area'] = str_replace("_"," ",$requestData['name_area']);

        // ค้นหา name && name_area 
        $data_partner_name_area = Partner::where('name' , $requestData['check_in_at'])
            ->where('name_area' , $requestData['name_area'])
            ->get();

        foreach ($data_partner_name_area as $data_name_area ) {
            $requestData['partner_id'] = $data_name_area->id ;
            $requestData['check_in_at'] = $data_name_area->id . '(' . $requestData['check_in_at'] . ')';
            $name_partner = $data_name_area->name ;
        }
        
        Check_in::create($requestData);

        foreach ($data_partner_name_area as $data_name_area ) {
            $requestData['check_in_at'] = $data_name_area->id ;
        }

        $data_user = User::where('id' , $requestData['user_id'])->get();

        // $data_partner = Partner::where('name' , $name_partner)
        //     ->where('name_area' , null)
        //     ->get(); 

        $data_partner = Partner::where('id' , $requestData['check_in_at'])->get(); 

        foreach($data_partner as $partner){
            $id_partner = $partner->id ;
            $check_in_at = $partner->name . " - " . $partner->name_area ;
        }

        foreach ($data_user as $user) {
            if (empty($user->check_in_at)) {
                $check_in_all = array($id_partner) ;
            }else{
                $check_in_all = json_decode($user->check_in_at) ;
                if (in_array($id_partner , $check_in_all)){
                    $check_in_all = $check_in_all ;
                }
                else{   
                    array_push($check_in_all , $id_partner) ;
                }
            }
        }

        DB::table('users')
            ->where('id', $requestData['user_id'])
            ->update([
                'check_in_at' => $check_in_all,
        ]);


        if (!empty($requestData['time_in'])) {
            $time = $requestData['time_in'] ;
            $type = "CHECK IN" ;
        }

        if (!empty($requestData['time_out'])) {
            $time = $requestData['time_out'] ;
            $type = "CHECK OUT" ;
        }

        $data_in_out = check_in::where('user_id', $requestData['user_id'])
            ->where('check_in_at', $requestData['check_in_at'])
            ->latest()
            ->take(3)
            ->get();   

        // $data_check_in_ats = Partner::where('id' , $check_in_at)->get();

        $time = str_replace("T"," ",$time);

        // return redirect('/check_in_finish')->with('flash_message', 'Check_in added!');
        return view('check_in.check_in_finish', compact('time','type','data_in_out','check_in_at'));
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
        $check_in = Check_in::findOrFail($id);

        return view('check_in.show', compact('check_in'));
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
        $check_in = Check_in::findOrFail($id);

        return view('check_in.edit', compact('check_in'));
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
        
        $check_in = Check_in::findOrFail($id);
        $check_in->update($requestData);

        return redirect('check_in')->with('flash_message', 'Check_in updated!');
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
        Check_in::destroy($id);

        return redirect('check_in')->with('flash_message', 'Check_in deleted!');
    }

    public function welcome_check_in_line(Request $request)
    {
        $location = $request->get('location');

        if(Auth::check()){
            return redirect('check_in/create?location=' . $location);
        }else{
            return redirect('/login/line?redirectTo=check_in/create?location=' . $location);
        }
    }

    public function check_in_to_cretae(Request $request)
    {
        $location = $request->get('location');
        $Uni = "No";
        $name_area = null ;

        $date_now = date("Y/m/d H:i:s");

        if (!empty($location)) {
            if (strpos($location, 'University') !== false) {
                $location_sp = explode(":",$location);
                $location = $location_sp[1];
                $Uni = "Yes";

                if (strpos($location, '-') !== false) {
                    $location_sp_name_area = explode("-",$location);

                    $name_area = $location_sp_name_area[1] ;
                    $location = $location_sp_name_area[0] ;
                }
            }else{
                if (strpos($location, '-') !== false) {
                    $location_sp = explode("-",$location);
                    $location = $location_sp[0];

                    $name_area = $location_sp[1] ;
                }
            }
        }

        // echo $location ;
        // echo "<br>";
        // echo $Uni;
        // echo "<br>";
        // echo $name_area;

        // exit();


        $user = Auth::user();

        $real_name = $user->name_staff ;

        $name_university = Name_University::get();


        return view('check_in.create', compact('location','Uni','date_now','real_name','name_university','name_area'));
    }

    function admin_gallery(Request $request){
        
        // $data_user = Auth::user();

        $requestData = $request->all();
        $request_name_partner = $request->get('name_partner');
        $name_partner = null ;
        $all_areas = null ;

        $all_partners = Partner::where("name", '!=' , null)->groupBy('name')->orderBy('name', 'ASC')->get();

        if ($request_name_partner == "all") {

            $name_partner = 'ทั้งหมด' ;
            $all_areas = Partner::where("name", '!=' , null)->orderBy('name', 'ASC')->get();

        }else{

            $data_name_partner = Partner::where("id", $request_name_partner)->get();

            foreach ($data_name_partner as $item_1) {
                $name_partner = $item_1->name ;
            }

            $all_areas = Partner::where("name", $name_partner)->orderBy('name_area', 'ASC')->get();
        }

        return view('check_in.admin_gallery', compact('all_partners', 'all_areas','name_partner'));

    }

}
