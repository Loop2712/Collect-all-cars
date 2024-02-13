<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Data_1669_officer_hospital;
use Illuminate\Http\Request;

class Data_1669_officer_hospitalController extends Controller
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
            $data_1669_officer_hospital = Data_1669_officer_hospital::where('name_officer_hospital', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('hospital_offices_id', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('creator', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data_1669_officer_hospital = Data_1669_officer_hospital::latest()->paginate($perPage);
        }

        return view('data_1669_officer_hospital.index', compact('data_1669_officer_hospital'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data_1669_officer_hospital.create');
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
        
        Data_1669_officer_hospital::create($requestData);

        return redirect('data_1669_officer_hospital')->with('flash_message', 'Data_1669_officer_hospital added!');
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
        $data_1669_officer_hospital = Data_1669_officer_hospital::findOrFail($id);

        return view('data_1669_officer_hospital.show', compact('data_1669_officer_hospital'));
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
        $data_1669_officer_hospital = Data_1669_officer_hospital::findOrFail($id);

        return view('data_1669_officer_hospital.edit', compact('data_1669_officer_hospital'));
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
        
        $data_1669_officer_hospital = Data_1669_officer_hospital::findOrFail($id);
        $data_1669_officer_hospital->update($requestData);

        return redirect('data_1669_officer_hospital')->with('flash_message', 'Data_1669_officer_hospital updated!');
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
        Data_1669_officer_hospital::destroy($id);

        return redirect('data_1669_officer_hospital')->with('flash_message', 'Data_1669_officer_hospital deleted!');
    }
}
