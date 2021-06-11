<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register_car;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

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

        $date_now = date("d-m-Y"); 

        $time1=strtotime($data->created_at); //สมัคร
        $time2=strtotime($date_now); //เวลาปัจจุบัน
        
        $distanceInSeconds = round(abs($time2 - $time1));
        $distanceInMinutes = round($distanceInSeconds / 60);

        $month = 0;
        $days = floor(abs($distanceInMinutes / 1440)); 


        if ($days > 30) {
            $over = $days / 30;

            $month_full = $month + number_format($over,2);
            $month_explode = explode(".",$month_full);
            $month = $month_explode[0];

            if (!empty($month_explode[1])) {
                $days = ($month_explode[1]/100) * 30;
            }elseif (empty($month_explode[1])) {
                $days = 0;
            }
            
        }

        return view('ProfileUser/Profile' , compact('data' , 'month' , 'days') );




    //     $date = User::select('created_at')
    //     ->where('id', Auth::id());
    //     $birthday = $date;      //รูปแบบการเก็บค่าข้อมูลวันเกิด
    //     $today = date("Y-m-d");   //จุดต้องเปลี่ยน
            
    
    //     list($byear, $bmonth, $bday)= explode("-",$birthday);       //จุดต้องเปลี่ยน
    //     list($tyear, $tmonth, $tday)= explode("-",$today);                //จุดต้องเปลี่ยน
            
    //     $mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
    //     $mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
    //     $mage = ($mnow - $mbirthday);
    // $u_y=date("Y", $mage)-1970;
    // $u_m=date("m",$mage)-1;
    // $u_d=date("d",$mage)-1;

        
        // 'u_y','u_m','u_d'

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

        return view('ProfileUser/Profile' , compact('data') );
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
        if ($count > 10) {
            $name = explode(" ",$name_user);
        }else{
            $name_add = $name_user." "."str";
            $name = explode(" ",$name_add);
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
}
