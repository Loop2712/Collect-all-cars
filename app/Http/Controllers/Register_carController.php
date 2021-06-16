<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Organization;
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
        $keyword = $request->get('search');
        $perPage = 25;

        $user = Auth::user();
        // echo ($user->id);
        // exit();

        // CAR
        if (!empty($keyword)) {
            $register_car = DB::table('register_cars')
                        ->orWhere('brand', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "car")

                        ->orWhere('generation', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "car")

                        ->orWhere('registration_number', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "car")

                        ->orWhere('province', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "car")

                        ->get();
        } else {
            $register_car = DB::table('register_cars')
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "car")
                        ->get();
        }

        // MOTORCYCLES
        if (!empty($keyword)) {
            $register_motorcycles = DB::table('register_cars')
                        ->orWhere('brand', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "motorcycle")

                        ->orWhere('generation', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "motorcycle")

                        ->orWhere('registration_number', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "motorcycle")

                        ->orWhere('province', 'LIKE', "%$keyword%")
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "motorcycle")

                        ->get();
        } else {
            $register_motorcycles = DB::table('register_cars')
                        ->where('user_id', $user->id)
                        ->where('active', "Yes")
                        ->where('car_type', "motorcycle")
                        ->get();
        }

        // เวลาปัจจุบัน
        $date_now = date("Y-m-d "); 

        return view('register_car.index', compact('register_car' , 'register_motorcycles' , 'date_now'));
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

        // echo "<pre>";
        // print_r($register_car);
        // echo "</pre>";
        // exit();

        return view('register_car.create', compact('location_array', 'car_brand', 'user', 'car', 'motorcycle','type_array' , 'juristicNameTH' , 'juristicID' , 'juristicMail' , 'juristicPhone' , 'juristicProvince' , 'juristicDistrict' , 'organization'));
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
        // echo "<pre>";
        // print_r($requestData) ;
        // echo "<pre>";
        // exit();
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

        if (!empty($requestData['juristicID'])) {

            $juristicData['juristicID'] = $requestData['juristicID'];
            $juristicData['juristicNameTH'] = $requestData['juristicNameTH'];
            $juristicData['mail'] = $requestData['organization_mail'];
            $juristicData['province'] = $requestData['location_P_2'];
            $juristicData['district'] = $requestData['location_A_2'];
            $juristicData['phone'] = $requestData['phone_2'];

            Organization::firstOrCreate($juristicData);
        }

        if (!empty($requestData['phone_2'])) {
            $requestData['phone'] = $requestData['phone_2'];
        }

        if (empty($requestData['branch'])) {
            $requestData['branch'] = "สำนักงานใหญ";
            $requestData['branch_district'] = $requestData['location_A_2'];
            $requestData['branch_province'] = $requestData['location_P_2'];
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

        $user = Auth::user();
        $organization = $user->organization;

        $Juristic_ID = Organization::where('juristicNameTH', $organization )->get();

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

        foreach ($check_car_user as $key ) {
            $name = $key->name ;
        }
        if (empty($name)) {

             return view('404');

        }else{

            $register_car = Register_car::findOrFail($id);

            $location_array = county::selectRaw('province')
                ->groupBy('province')
                ->get();

            $xx = Register_car::where('id',$id )->get();
            // echo "<pre>";
            // print_r($xx);
            // echo "<pre>";
            // exit();

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

            return view('register_car.edit', compact('register_car','location_array','car_brand','user','car','motorcycle','xx' , 'juristicNameTH' , 'juristicID' , 'juristicMail' , 'juristicPhone' , 'juristicProvince' , 'juristicDistrict' , 'organization'));
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

        return redirect('register_car')->with('flash_message', 'Register_car updated!');
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
        $id = Auth::id();

        if(Auth::check()){
            return redirect('register_car/{' . $car_id . '}/edit_act');
        }else{
            return redirect('login/line?redirectTo=register_car/{' . $car_id . '}/edit_act');
        }
    }

}