<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Hospital_office;
use Illuminate\Http\Request;

class Hospital_officeController extends Controller
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

        if (!empty($keyword)) {
            $hospital_office = Hospital_office::where('code_9_digit', 'LIKE', "%$keyword%")
                ->orWhere('code_5_digit', 'LIKE', "%$keyword%")
                ->orWhere('code_11_digit', 'LIKE', "%$keyword%")
                ->orWhere('organization_type', 'LIKE', "%$keyword%")
                ->orWhere('health_type', 'LIKE', "%$keyword%")
                ->orWhere('affiliation', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('actual_bed', 'LIKE', "%$keyword%")
                ->orWhere('usage_status', 'LIKE', "%$keyword%")
                ->orWhere('service_area', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('district', 'LIKE', "%$keyword%")
                ->orWhere('sub_district', 'LIKE', "%$keyword%")
                ->orWhere('village', 'LIKE', "%$keyword%")
                ->orWhere('zip_code', 'LIKE', "%$keyword%")
                ->orWhere('server', 'LIKE', "%$keyword%")
                ->orWhere('founding_date', 'LIKE', "%$keyword%")
                ->orWhere('closing_date', 'LIKE', "%$keyword%")
                ->orWhere('latest_update', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $hospital_office = Hospital_office::latest()->paginate($perPage);
        }

        return view('hospital_office.index', compact('hospital_office'));
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

            $check_old_data = Hospital_office::where('code_9_digit',$data_arr['code_9_digit'])->first();

            if( !empty($check_old_data->id) ){
                // 
            }else{
                Hospital_office::create($data_arr);
            }
        }

        return "success" ;

    }
}
