<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Hospital_office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Hospital_officeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $data = Hospital_office::where('province',"กาญจนบุรี")->get();
        $data = Hospital_office::where('province', 'น่าน')->where('lat' , '=' , NULL)->take(40)->get();

        $currentDomain = $request->getHost();

        // foreach ($data as $item) {

        //     $data_arr = [];
        //     // echo "<br>";
        //     // echo $item->name;

        //     $apiKey = '';
        //     $placeName = $item->name;

        //     $response = Http::get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
        //         'key' => $apiKey,
        //         'input' => $placeName,
        //         'inputtype' => 'textquery',
        //         'fields' => 'formatted_address,name,rating,opening_hours,geometry', 
        //         'locationbias' => 'point:latitude,longitude', // เปลี่ยน latitude และ longitude ตามที่คุณต้องการ
        //     ]);


        //     $places = $response->json();

        //     $data_arr = [];

        //     // ตรวจสอบว่ามีข้อมูล candidates อยู่ใน response หรือไม่
        //     if (isset($places['candidates']) && is_array($places['candidates']) && count($places['candidates']) > 0) {
        //         foreach ($places['candidates'] as $candidate) {
        //             $formatted_address = $candidate['formatted_address'];
        //             $location = $candidate['geometry']['location'];
        //             $lat = $location['lat'];
        //             $lng = $location['lng'];

        //             // เพิ่มข้อมูลลงใน $data_arr
        //             $data_arr[] = [
        //                 'formatted_address' => $formatted_address,
        //                 'lat' => $lat,
        //                 'lng' => $lng
        //             ];
        //         }
        //     }



        //     if( !empty($data_arr[0]['formatted_address']) ){

        //         echo $placeName;
        //         echo "<br>";

        //         DB::table('hospital_offices')
        //             ->where([ 
        //                     ['name', $placeName],
        //                 ])
        //             ->update([
        //                     'address' => $data_arr[0]['formatted_address'],
        //                     'lat' => $data_arr[0]['lat'],
        //                     'lng' => $data_arr[0]['lng'],
        //                 ]);      

        //     }

        //     // echo "<pre>";
        //     // print_r($data_arr);
        //     // echo "<pre>";

        //     echo "=========================";
        //     echo "<br>";

        // }

        exit();


        return view('hospital_office.index', compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hospital_office.create');
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
        
        Hospital_office::create($requestData);

        return redirect('hospital_office')->with('flash_message', 'Hospital_office added!');
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
        $hospital_office = Hospital_office::findOrFail($id);

        return view('hospital_office.show', compact('hospital_office'));
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
        $hospital_office = Hospital_office::findOrFail($id);

        return view('hospital_office.edit', compact('hospital_office'));
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
        
        $hospital_office = Hospital_office::findOrFail($id);
        $hospital_office->update($requestData);

        return redirect('hospital_office')->with('flash_message', 'Hospital_office updated!');
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
        Hospital_office::destroy($id);

        return redirect('hospital_office')->with('flash_message', 'Hospital_office deleted!');
    }

    function create_hospital_office(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];

        foreach ($requestData as $item) {

            foreach ($item as $key => $value) {
                $data_arr[$key] = $value;
            }

            // $check_old_data = Hospital_office::where('code_9_digit',$data_arr['code_9_digit'])->first();

            // if( !empty($check_old_data->id) ){
            //     // 
            // }else{
            //     // 
            // }

            Hospital_office::create($data_arr);
        }

        return "success" ;

    }

    function get_hospital_offices($province){

        $data = Hospital_office::where('province', $province)->where('lat' , '!=' , NULL)->get();

        return $data ;

    }
}
