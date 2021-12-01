<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register_car;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Sos_map;
use App\Models\Guest;
use App\Models\Cancel_Profile;
use App\Http\Controllers\API\LineApiController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $data = User::findOrFail($id);

        $organization = "";
        if (!empty($data['organization'])) {
            $organization = Organization::where('juristicNameTH', $data['organization'] )->get();
        }
        
        // รถทั้งหมด
        $myCar_all = Register_car::where('user_id', $id)
            ->where('active', "Yes")
            ->get();

        // รถของฉัน
        $myCars = Register_car::where('user_id', $id)
            ->where('car_type', "car")
            ->where('active', "Yes")
            ->where('juristicNameTH', null)
            ->get();

        $myMotors = Register_car::where('user_id', $id)
            ->where('car_type', "motorcycle")
            ->where('active', "Yes")
            ->where('juristicNameTH', null)
            ->get();

        // รถขององค์กร
        if (!empty($data['organization'])) {
            $org_myCars = Register_car::where('user_id', $id)
                ->where('car_type', "car")
                ->where('active', "Yes")
                ->where('juristicNameTH', $data['organization'])
                ->get();

            $org_myMotors = Register_car::where('user_id', $id)
                ->where('car_type', "motorcycle")
                ->where('active', "Yes")
                ->where('juristicNameTH', $data['organization'])
                ->get();
        }else{
            $org_myCars = Register_car::where('car_type', "ไม่มี")
                ->get();

            $org_myMotors = Register_car::where('car_type', "ไม่มี")
                ->get();
        }

        // SOS
        $mySos = Sos_map::where('user_id', $id)->get();

        //ถูกเรียก
        $reported = 0 ;
        foreach ($myCar_all as $key) {

            $search_reported = Guest::where('register_car_id', $key->id)
                ->get();

            $reported = $reported + count($search_reported);
        }

        //เรียกผู้อื่น
        $myReport = Guest::where('user_id', $id)->get();

        return view('ProfileUser/Profile' , compact('data' ,'organization','myCars','myMotors','mySos','myReport','reported','org_myCars','org_myMotors') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);

        if (!empty($data['organization'])) {
            $user_organization = $data['organization'];
        }else{
            $user_organization = "0";
        }
        
        if (Auth::id() == $id or Auth::user()->role == "admin" or Auth::user()->role == $user_organization)
        {
            $organization = "";
            if (!empty($data['organization'])) {
                $organization = Organization::where('juristicNameTH', $data['organization'] )->get();
            }
            
            // รถทั้งหมด
            $myCar_all = Register_car::where('user_id', $id)
                ->where('active', "Yes")
                ->get();

            // รถของฉัน
            $myCars = Register_car::where('user_id', $id)
                ->where('car_type', "car")
                ->where('active', "Yes")
                ->where('juristicNameTH', null)
                ->get();

            $myMotors = Register_car::where('user_id', $id)
                ->where('car_type', "motorcycle")
                ->where('active', "Yes")
                ->where('juristicNameTH', null)
                ->get();

            // รถขององค์กร
            if (!empty($data['organization'])) {
                $org_myCars = Register_car::where('user_id', $id)
                    ->where('car_type', "car")
                    ->where('active', "Yes")
                    ->where('juristicNameTH', $data['organization'])
                    ->get();

                $org_myMotors = Register_car::where('user_id', $id)
                    ->where('car_type', "motorcycle")
                    ->where('active', "Yes")
                    ->where('juristicNameTH', $data['organization'])
                    ->get();
            }else{
                $org_myCars = Register_car::where('car_type', "ไม่มี")
                    ->get();

                $org_myMotors = Register_car::where('car_type', "ไม่มี")
                    ->get();
            }

            // SOS
            $mySos = Sos_map::where('user_id', $id)->get();

            //ถูกเรียก
            $reported = 0 ;
            foreach ($myCar_all as $key) {

                $search_reported = Guest::where('register_car_id', $key->id)
                    ->get();

                $reported = $reported + count($search_reported);
            }

            //เรียกผู้อื่น
            $myReport = Guest::where('user_id', $id)->get();

            return view('ProfileUser/Profile' , compact('data' ,'organization','myCars','myMotors','mySos','myReport','reported','org_myCars','org_myMotors','user_organization') );
            
        }else
            return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::id() == $id )
        {
            $data = User::findOrFail($id);
            return view('ProfileUser/edit', compact('data'));
            
        }else
            return view('404');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        if ($request->hasFile('driver_license')) {
            $requestData['driver_license'] = $request->file('driver_license')->store('uploads', 'public');

            //RESIZE 50% FILE IF IMAGE LARGER THAN 0.5 MB
            $image = Image::make(storage_path("app/public")."/".$requestData['driver_license']);
            $image->orientate();
            $size = $image->filesize();  

            if($size > 112000 ){
                $image->resize(
                    intval($image->width()/2) , 
                    intval($image->height()/2)
                )->save(); 
            }

        }

        if ($request->hasFile('driver_license2')) {
            $requestData['driver_license2'] = $request->file('driver_license2')->store('uploads', 'public');

            //RESIZE 50% FILE IF IMAGE LARGER THAN 0.5 MB
            $image2 = Image::make(storage_path("app/public")."/".$requestData['driver_license2']);
            $image2->orientate();
            $size = $image2->filesize();  

            if($size > 112000 ){
                $image2->resize(
                    intval($image2->width()/2) , 
                    intval($image2->height()/2)
                )->save(); 
            }

        }

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            $img_avatar = Image::make(storage_path("app/public")."/".$requestData['photo']);

            $size_avatar = $img_avatar->filesize();  

            if($size_avatar > 512000 ){
                $img_avatar->resize(
                    intval($img_avatar->width()/2) , 
                    intval($img_avatar->height()/2)
                )->save(); 
            }

        }

        if (!empty($requestData['text_img_car'])) {
            // ใบขับขี่รถยนต์
            $name_file_car = uniqid('license_car-', true);
            $output_file_car = "./storage/uploads/".$name_file_car.".png";

            $data_64_car = explode( ',', $requestData['text_img_car'] );

            $fp_car = fopen($output_file_car, "w+");
     
            fwrite($fp_car, base64_decode( $data_64_car[ 1 ] ) );
             
            fclose($fp_car);

            $url_img_car = str_replace("./storage/","",$output_file_car);
            $requestData['driver_license'] = $url_img_car ;
        }
        
        if (!empty($requestData['text_img_motor'])) {
            // ใบขับขี่มอไซต์
            $name_file_motor = uniqid('license_motor-', true);
            $output_file_motor = "./storage/uploads/".$name_file_motor.".png";

            $data_64_motor = explode( ',', $requestData['text_img_motor'] );

            $fp_motor = fopen($output_file_motor, "w+");
     
            fwrite($fp_motor, base64_decode( $data_64_motor[ 1 ] ) );
             
            fclose($fp_motor);

            $url_img_motor = str_replace("./storage/","",$output_file_motor);
            $requestData['driver_license2'] = $url_img_motor ;
        }
        
        $data = User::findOrFail($id);
        $data->update($requestData);

        

        // DB::table('register_cars')
        //       ->where('user_id', $id)
        //       ->update(['sex' => $requestData['sex']]);

        return redirect('profile')->with('flash_message', 'profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function explode_name($name_user)
    {
        $count = strlen($name_user);

        $name_exp = explode(" ",$name_user);

        if ($count > 12) {
            $name = $name_exp[0];
        }else{
            $name = $name_user;
        }        
        
        return $name;
    }

    public function edit_profile(Request $request)
    {
        $id = Auth::id();

        if(Auth::check()){
            return redirect('profile/'.$id.'/edit');
            // echo Auth::User()->name;
        }else{
            return redirect('login/line?redirectTo=edit_profile2');
        }
    }

    public function edit_profile_facebook(Request $request)
    {
        $id = Auth::id();

        if(Auth::check()){
            return redirect('profile/'.$id.'/edit');
            // echo Auth::User()->name;
        }else{
            return redirect('login/facebook?redirectTo=edit_profile2');
        }
    }

    public function edit_profile2(Request $request)
    {
        $id = Auth::id();

        return redirect('profile/'.$id.'/edit');
        
    }

    public function line_mycar(Request $request)
    {
        $id = Auth::id();

        if(Auth::check()){
            return redirect('register_car');
            // echo Auth::User()->name;
        }else{
            return redirect('login/line?redirectTo=register_car');
        }
    }

    public function member()
    {
        $date_now = date("d-m-Y"); 
        echo $date_now."<br>";

        $time1=strtotime("5-01-2021"); //สมัคร
        $time2=strtotime("5-05-2021"); //เวลาปัจจุบัน
        
        $distanceInSeconds = round(abs($time2 - $time1));
        $distanceInMinutes = round($distanceInSeconds / 60);

        $month = 0;
        $days = floor(abs($distanceInMinutes / 1440)); 

        echo "days".$days."<br>";

        if ($days > 30) {
            $over = $days / 30;
            echo " over:".number_format($over,2)."<br>";

            $month_full = $month + number_format($over,2);
            $month_explode = explode(".",$month_full);
            $month = $month_explode[0];

            if (!empty($month_explode[1])) {
                $days = ($month_explode[1]/100) * 30;
            }elseif (empty($month_explode[1])) {
                $days = 0;
            }
            
        }

        echo " Month:".$month. " /  Days:".number_format($days) ;

        exit();
    }

    public function cancel_Profile($id,$reason,$reason_other,$amend)
    {
        $requestData['user_id'] = $id ;

        switch ($reason) {
            case '1':
                $requestData['reason'] = "ไม่ต้องการใช้บริการอีกต่อไป" ;
                break;
            case '2':
                $requestData['reason'] = "ไม่ได้รับความสะดวกสบายการการใช้บริการ" ;
                break;
            case '3':
                $requestData['reason'] = "ไม่ได้รับประโยชน์จากการใช้บริการ" ;
                break;
            case '4':
                $requestData['reason'] = "อื่นๆ" ;
                break;
        }

        if ($reason_other == "null") {
            $requestData['reason_other'] = null ;
        }else {
            $requestData['reason_other'] = $reason_other ;
        }

        if ($amend == "null") {
            $requestData['amend'] = null ;
        }else {
            $requestData['amend'] = $amend ;
        }

        Cancel_Profile::create($requestData);

        DB::table('users')
                ->where('id', $id)
                ->update([
                    'status' => "expired",
                ]);

        DB::table('data_cars')
                ->where('user_id', $id)
                ->update([
                    'active' => "No",
                ]);

        DB::table('motorcycles_datas')
                ->where('user_id', $id)
                ->update([
                    'active' => "No",
                ]);

        DB::table('news')
                ->where('user_id', $id)
                ->update([
                    'active' => "No",
                ]);

        DB::table('register_cars')
                ->where('user_id', $id)
                ->update([
                    'active' => "No",
                ]);

        $data_users = DB::table('users')
                ->where('id', $id)
                ->get();

        foreach ($data_users as $data_user) {
            $provider_id = $data_user->provider_id ;
        }

        $lineAPI = new LineApiController();
        $lineAPI->set_richmanu_start($provider_id);

        return $id;
    }

    public function welcome_home($id)
    {
        DB::table('users')
                ->where('id', $id)
                ->update([
                    'status' => "active",
                ]);

        DB::table('data_cars')
                ->where('user_id', $id)
                ->update([
                    'active' => "Yes",
                ]);

        DB::table('motorcycles_datas')
                ->where('user_id', $id)
                ->update([
                    'active' => "Yes",
                ]);

        DB::table('news')
                ->where('user_id', $id)
                ->update([
                    'active' => "Yes",
                ]);

        DB::table('register_cars')
                ->where('user_id', $id)
                ->update([
                    'active' => "Yes",
                ]);

        return $id;
    }

    public function change_language_from_line($user_id)
    {
        $id = $user_id;

        if(Auth::check()){
            return redirect('profile/'. $id .'/edit#div_change_language');
            // echo Auth::User()->name;
        }else{
            return redirect('login/line?redirectTo=profile/'. $id .'/edit#div_change_language');
        }
    }

}
