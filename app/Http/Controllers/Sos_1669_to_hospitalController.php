<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_1669_to_hospital;
use Illuminate\Http\Request;

class Sos_1669_to_hospitalController extends Controller
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
            $sos_1669_to_hospital = Sos_1669_to_hospital::where('area', 'LIKE', "%$keyword%")
                ->orWhere('officer_hospital_id', 'LIKE', "%$keyword%")
                ->orWhere('command_id', 'LIKE', "%$keyword%")
                ->orWhere('sos_help_center_id', 'LIKE', "%$keyword%")
                ->orWhere('form_yellow_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_1669_to_hospital = Sos_1669_to_hospital::latest()->paginate($perPage);
        }

        return view('sos_1669_to_hospital.index', compact('sos_1669_to_hospital'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_1669_to_hospital.create');
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
        
        Sos_1669_to_hospital::create($requestData);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital added!');
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
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);

        return view('sos_1669_to_hospital.show', compact('sos_1669_to_hospital'));
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
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);

        return view('sos_1669_to_hospital.edit', compact('sos_1669_to_hospital'));
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
        
        $sos_1669_to_hospital = Sos_1669_to_hospital::findOrFail($id);
        $sos_1669_to_hospital->update($requestData);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital updated!');
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
        Sos_1669_to_hospital::destroy($id);

        return redirect('sos_1669_to_hospital')->with('flash_message', 'Sos_1669_to_hospital deleted!');
    }
}
