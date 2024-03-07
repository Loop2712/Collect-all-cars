<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_by_organization;
use Illuminate\Http\Request;

class Sos_by_organizationController extends Controller
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
            $sos_by_organization = Sos_by_organization::where('name_partner', 'LIKE', "%$keyword%")
                ->orWhere('partner_id', 'LIKE', "%$keyword%")
                ->orWhere('name_sub_organization', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('group_line_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_by_organization = Sos_by_organization::latest()->paginate($perPage);
        }

        return view('sos_by_organization.index', compact('sos_by_organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_by_organization.create');
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
        
        Sos_by_organization::create($requestData);

        return redirect('sos_by_organization')->with('flash_message', 'Sos_by_organization added!');
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
        $sos_by_organization = Sos_by_organization::findOrFail($id);

        return view('sos_by_organization.show', compact('sos_by_organization'));
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
        $sos_by_organization = Sos_by_organization::findOrFail($id);

        return view('sos_by_organization.edit', compact('sos_by_organization'));
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
        
        $sos_by_organization = Sos_by_organization::findOrFail($id);
        $sos_by_organization->update($requestData);

        return redirect('sos_by_organization')->with('flash_message', 'Sos_by_organization updated!');
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
        Sos_by_organization::destroy($id);

        return redirect('sos_by_organization')->with('flash_message', 'Sos_by_organization deleted!');
    }
}
