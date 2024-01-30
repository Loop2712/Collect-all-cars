<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Hospital_office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $data = Hospital_office::where('province', 'กาญจนบุรี')->take(10)->get();

        foreach ($data as $item) {
            echo "<br>";
            echo $item->name;

            $apiKey = 'AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus';
            $placeName = $item->name;

            $response = Http::get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
                'key' => $apiKey,
                'input' => $placeName,
                'inputtype' => 'textquery',
                'fields' => 'formatted_address,name,rating,opening_hours,pgeometry', // adjust fields according to your needs
            ]);;

            $places = $response->json();

            echo "<pre>";
            print_r($places);
            echo "<pre>";

            echo "=========================";

        }

        exit();


        return view('hospital_office.index');
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
}
