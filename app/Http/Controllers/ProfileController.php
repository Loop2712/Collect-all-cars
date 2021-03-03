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

        return view('ProfileUser/Profile' , compact('data') );
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
        $data = User::findOrFail($id);

        return view('ProfileUser/edit', compact('data'));
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

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        $data = User::findOrFail($id);
        $data->update($requestData);

        

        DB::table('register_cars')
              ->where('user_id', $id)
              ->update(['sex' => $requestData['sex']]);

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
}
