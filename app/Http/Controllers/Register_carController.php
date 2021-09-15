<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Organization;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;
use App\CarModel;
use App\county;
use App\User;
use App\Models\Register_car;
use Illuminate\Http\Request;
use Auth;

class Register_carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $type_car = $request->get('type');

            if (empty($type_car)) {
                $type_car = "all";
            }

        switch ($type_car) {
            case 'all':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', null)
                    ->where('active', "Yes")
                    ->get();
                break;
            case 'car':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', null)
                    ->where('car_type', "car")
                    ->where('active', "Yes")
                    ->get();
                break;
            case 'motorcycle':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', null)
                    ->where('car_type', "motorcycle")
                    ->where('active', "Yes")
                    ->get();
                break;
        }

        $organization = "";
        if (!empty($user['organization'])) {
            $organization = Organization::where('juristicNameTH', $user['organization'] )->get();
        }

        // เวลาปัจจุบัน
        $date_now = date("Y-m-d "); 

        return view('register_car.index', compact('register_car' , 'date_now' ,'type_car','organization'));
    }

    public function index_organization(Request $request)
    {
        $user = Auth::user();

        $type_car = $request->get('type');

            if (empty($type_car)) {
                $type_car = "all";
            }

        $organization = "";
        if (!empty($user['organization'])) {
            $organization = Organization::where('juristicNameTH', $user['organization'] )->get();
                foreach ($organization as $key ) {
                    $juristicNameTH = $key->juristicNameTH;
                }
        }

        switch ($type_car) {
            case 'all':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', $user['organization'])
                    ->where('active', "Yes")
                    ->get();
                break;
            case 'car':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', $user['organization'])
                    ->where('car_type', "car")
                    ->where('active', "Yes")
                    ->get();
                break;
            case 'motorcycle':
                $register_car = DB::table('register_cars')
                    ->where('user_id', $user->id)
                    ->where('juristicNameTH', $user['organization'])
                    ->where('car_type', "motorcycle")
                    ->where('active', "Yes")
                    ->get();
                break;
        }

        // เวลาปัจจุบัน
        $date_now = date("Y-m-d "); 

        return view('register_car.index_organization', compact('register_car' , 'date_now' ,'type_car','organization','juristicNameTH'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();

        $organization = $user->organization;

        $Juristic_ID = Organization::where('juristicNameTH', $organization )->get();

        $select_Organization = Organization::selectRaw('juristicNameTH')->groupBy('juristicNameTH')->get();


        $juristicNameTH = "";
        $juristicID = "" ;
        $juristicMail = "" ;
        $juristicPhone = "" ;
        $juristicProvince = "" ;
        $juristicDistrict = "" ;

        foreach ($Juristic_ID as $key ) {
            if (!empty($key->juristicNameTH)) {
                $juristicNameTH = $key->juristicNameTH ;
                $juristicID = $key->juristicID ;
                $juristicMail = $key->mail ;
                $juristicPhone = $key->phone ;
                $juristicProvince = $key->province ;
                $juristicDistrict = $key->district ;
            }
        }

        $location_array = county::selectRaw('province')
            ->groupBy('province')
            ->get();

        $car_brand = CarModel::selectRaw('brand,count(brand) as count')
            ->orderByRaw('count DESC')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->limit(10)
            ->get();
        
        $type_array = CarModel::selectRaw('type,count(type) as count')
            ->orderByRaw('count DESC')
            ->where('type', '!=',"" )
            ->groupBy('type')
            ->limit(10)
            ->get();

        $car = Register_car::select('brand', 'generation', 'registration_number', 'province')
            ->where('user_id', $user->id)
            ->where('car_type', 'car')
            ->get();

        $motorcycle = Register_car::select('brand', 'generation', 'registration_number', 'province')
            ->where('user_id', $user->id)
            ->where('car_type', 'motorcycle')
            ->get();

        $name_insurance = Insurance::where('company', '!=',"" )
            ->groupBy('company')
            ->orderBy('company')
            ->get();

        // echo "<pre>";
        // print_r($name_insurance);
        // echo "</pre>";
        // exit();

        return view('register_car.create', compact('location_array', 'car_brand', 'user', 'car', 'motorcycle','type_array' , 'juristicNameTH' , 'juristicID' , 'juristicMail' , 'juristicPhone' , 'juristicProvince' , 'juristicDistrict' , 'organization','select_Organization','name_insurance'));
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

        // update registration_number
        $requestData['registration_number'] = str_replace(" ", "", $requestData['registration_number']);
        // rebrand
        $motor_brand = $requestData['motor_brand'];
        $motor_generation = $requestData['motor_generation'];

        $brand_other = $requestData['brand_other'];
        $generation_other = $requestData['generation_other'];
        $generation = $requestData['generation'];
        $brand = $requestData['brand'];
        $car_type = $requestData['car_type'];

        switch ($car_type) {

            case 'car':
                if ($brand != 'อื่นๆ') {
                    $requestData['motor_brand'] = null;
                    $requestData['motor_generation'] = null;
                }
                if ($brand != 'อื่นๆ' && $generation == 'อื่นๆ') {
                    $requestData['motor_brand'] = null;
                    $requestData['motor_generation'] = null;
                    $requestData['generation'] = str_replace("อื่นๆ", $generation_other, $requestData['generation']);
                }
                if ($brand == 'อื่นๆ') {
                    $requestData['motor_brand'] = null;
                    $requestData['motor_generation'] = null;
                    $requestData['generation'] = str_replace("อื่นๆ", $generation_other, $requestData['generation']);
                    $requestData['brand'] = str_replace("อื่นๆ", $brand_other, $requestData['brand']);
                }

                break;

            case 'motorcycle':
                if ($motor_brand != 'อื่นๆ') {
                    $requestData['brand'] = $motor_brand;
                    $requestData['generation'] = $motor_generation;
                }
                if ($motor_brand != 'อื่นๆ' && $motor_generation == 'อื่นๆ') {
                    $requestData['brand'] = $motor_brand;
                    $requestData['generation'] = str_replace("อื่นๆ", $generation_other, $requestData['generation']);
                }
                if ($motor_brand == 'อื่นๆ') {
                    $requestData['brand'] = $brand_other;
                    $requestData['generation'] = $generation_other;
                }

                break;

        }

        if (!empty($requestData['juristicID'])) {

            DB::table('organizations')
                ->where('juristicNameTH', $requestData['juristicNameTH'])
                ->update([
                    'mail' => $requestData['organization_mail'],
                    'phone' => $requestData['phone_2'],
                ]);

            // $juristicData['juristicID'] = $requestData['juristicID'];
            // $juristicData['juristicNameTH'] = $requestData['juristicNameTH'];
            // $juristicData['mail'] = $requestData['organization_mail'];
            // $juristicData['province'] = $requestData['location_P_2'];
            // $juristicData['district'] = $requestData['location_A_2'];
            // $juristicData['phone'] = $requestData['phone_2'];

            // Organization::firstOrCreate($juristicData);
        }

        if ( empty($requestData['branch']) and !empty($requestData['juristicNameTH'])) {
            $requestData['branch'] = "สำนักงานใหญ";
            $requestData['branch_district'] = $requestData['location_A_2'];
            $requestData['branch_province'] = $requestData['location_P_2'];
        }

        // echo "<pre>";
        // print_r($requestData);
        // echo "</pre>";
        // exit();
        if (empty(Auth::user()->location_P)) {
            
            DB::table('users')
                ->where('id', $requestData['user_id'])
                ->update([
                    'location_P' => $requestData['location_P'],
                    'location_A' => $requestData['location_A'],
                    'phone' => $requestData['phone'],
                    'organization' => $requestData['juristicNameTH'],
                    'branch' => $requestData['branch'],
                    'branch_district' => $requestData['branch_district'],
                    'branch_province' => $requestData['branch_province'],
                ]);
        }
        if (!empty(Auth::user()->location_P) and empty(Auth::user()->organization)) {
            
            DB::table('users')
                ->where('id', $requestData['user_id'])
                ->update([
                    'organization' => $requestData['juristicNameTH'],
                    'branch' => $requestData['branch'],
                    'branch_district' => $requestData['branch_district'],
                    'branch_province' => $requestData['branch_province'],
                ]);
        }

        if (!empty($requestData['name_insurance_another'])) {
        
            $requestData['name_insurance'] = $requestData['name_insurance_another'];
        }

        Register_car::create($requestData);

        // return view('register_car.select_get')->with('flash_message', 'Register_car added!');
        return redirect('/select_get?openExternalBrowser=1');
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
        $user_id = Auth::id();
        // ตรวจสอบว่าใช่เจ้าของรถหรือไม่
        $check_car_user = Register_car::where('user_id',$user_id )->where('id',$id )->get();

        foreach ($check_car_user as $key ) {
            $name = $key->name ;
        }
        if (empty($name)) {

             return view('404');

        }else{

            $register_car = Register_car::findOrFail($id);

            $location_array = county::selectRaw('province')
                ->where('province', '!=',"" )
                ->groupBy('province')
                ->get();
            $type_array = CarModel::selectRaw('type,count(type) as count')
                ->orderByRaw('count DESC')
                ->where('type', '!=',"" )
                ->groupBy('type')
                ->limit(10)
                ->get();

            return view('register_car.show', compact('register_car','location_array','type_array'));
        }
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
        $user_id = Auth::id();
        // ตรวจสอบว่าใช่เจ้าของรถหรือไม่
        $check_car_user = Register_car::where('user_id',$user_id )->where('id',$id )->get();

        foreach ($check_car_user as $key ) {
            $name = $key->name ;
        }
        if (empty($name)) {

             return view('/errors/404');

        }else{

            $register_car = Register_car::findOrFail($id);

            $location_array = county::selectRaw('province')
                ->groupBy('province')
                ->get();

            $data_car_old = Register_car::where('id',$id )->get();

            foreach ($data_car_old as $item) {
                $car_type_old =  $item->car_type;
                $brand_old  = $item->brand;
                $generation_old  = $item->generation;
                $province_old  =  $item->province;
                $name_insurance_old  =  $item->name_insurance;

                $juristicNameTH = $item->juristicNameTH;
                $juristicMail = $item->organization_mail ;
                $juristicProvince = $item->branch_province ;
                $juristicDistrict = $item->branch_district ;

            }

            $juristicID = "";
            $juristicPhone = "";

            $data_juristicNameTH = Organization::where('juristicNameTH', $juristicNameTH )->get();
            foreach ($data_juristicNameTH as $key_data) {
                $juristicID = $key_data->juristicID ;
                $juristicPhone = $key_data->phone ;
            }

            $car_brand = CarModel::selectRaw('brand,count(brand) as count')
                ->orderByRaw('count DESC')
                ->where('brand', '!=',"" )
                ->groupBy('brand')
                ->limit(10)
                ->get();

            $user = Auth::user();

            $car = Register_car::select('brand', 'generation', 'registration_number', 'province')
                ->where('user_id', $user->id)
                ->where('car_type', 'car')
                ->get();

            $motorcycle = Register_car::select('brand', 'generation', 'registration_number', 'province')
                ->where('user_id', $user->id)
                ->where('car_type', 'motorcycle')
                ->get();

            $name_insurance = Insurance::where('company', '!=',"" )
                ->groupBy('company')
                ->get();

            return view('register_car.edit', compact('register_car' , 'data_car_old','location_array','car_brand','user','car','motorcycle' ,'car_type_old','brand_old','generation_old','province_old','name_insurance_old','name_insurance','juristicNameTH', 'juristicID', 'juristicMail', 'juristicPhone', 'juristicProvince', 'juristicDistrict'));
        }
    }
    public function edit_act($id)
    {
        $register_car = Register_car::findOrFail($id);
        return view('register_car.edit_act', compact('register_car'));
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
        
        $register_car = Register_car::findOrFail($id);

        $register_car->update($requestData);
        
        DB::table('register_cars')
                ->where('id', $id)
                ->update(['alert_act' => null]);
        DB::table('register_cars')
                ->where('id', $id)
                ->update(['alert_insurance' => null]);

        if (!empty($register_car['juristicNameTH'])) {
            return redirect('register_car_organization')->with('flash_message', 'Register_car updated!');
        }else {
            return redirect('register_car')->with('flash_message', 'Register_car updated!');
        }
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
        Register_car::destroy($id);

        return redirect('register_car')->with('flash_message', 'Register_car deleted!');
    }

    public function welcome_line()
    {
        if(Auth::check()){
            return redirect('register_car/create');
        }else{
            return redirect('/login/line?redirectTo=register_car/create');
        }
    }

    public function edit_act_login(Request $request , $car_id)
    {
        if(Auth::check()){
            return redirect('register_car/' . $car_id . '/edit_act');
        }else{
            return redirect('login/line?redirectTo=register_car/' . $car_id . '/edit_act');
        }
    }

}