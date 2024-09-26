<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_partner_area;
use Illuminate\Http\Request;

class Sos_partner_areasController extends Controller
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
            $sos_partner_areas = Sos_partner_area::where('sos_partner_id', 'LIKE', "%$keyword%")
                ->orWhere('creator', 'LIKE', "%$keyword%")
                ->orWhere('name_area', 'LIKE', "%$keyword%")
                ->orWhere('sos_group_line_id', 'LIKE', "%$keyword%")
                ->orWhere('sos_area', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_partner_areas = Sos_partner_area::latest()->paginate($perPage);
        }

        return view('sos_partner_areas.index', compact('sos_partner_areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_partner_areas.create');
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
        
        Sos_partner_area::create($requestData);

        return redirect('sos_partner_areas')->with('flash_message', 'Sos_partner_area added!');
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
        $sos_partner_area = Sos_partner_area::findOrFail($id);

        return view('sos_partner_areas.show', compact('sos_partner_area'));
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
        $sos_partner_area = Sos_partner_area::findOrFail($id);

        return view('sos_partner_areas.edit', compact('sos_partner_area'));
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
        
        $sos_partner_area = Sos_partner_area::findOrFail($id);
        $sos_partner_area->update($requestData);

        return redirect('sos_partner_areas')->with('flash_message', 'Sos_partner_area updated!');
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
        Sos_partner_area::destroy($id);

        return redirect('sos_partner_areas')->with('flash_message', 'Sos_partner_area deleted!');
    }
}
