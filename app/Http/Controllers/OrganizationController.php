<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
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
            $organization = Organization::where('juristicID', 'LIKE', "%$keyword%")
                ->orWhere('juristicNameTH', 'LIKE', "%$keyword%")
                ->orWhere('juristicNameEN', 'LIKE', "%$keyword%")
                ->orWhere('juristicType', 'LIKE', "%$keyword%")
                ->orWhere('registerDate', 'LIKE', "%$keyword%")
                ->orWhere('juristicStatus', 'LIKE', "%$keyword%")
                ->orWhere('registerCapital', 'LIKE', "%$keyword%")
                ->orWhere('standardObjective', 'LIKE', "%$keyword%")
                ->orWhere('standardObjectiveDetail', 'LIKE', "%$keyword%")
                ->orWhere('addressDetail', 'LIKE', "%$keyword%")
                ->orWhere('addressName', 'LIKE', "%$keyword%")
                ->orWhere('buildingName', 'LIKE', "%$keyword%")
                ->orWhere('roomNo', 'LIKE', "%$keyword%")
                ->orWhere('floor', 'LIKE', "%$keyword%")
                ->orWhere('villageName', 'LIKE', "%$keyword%")
                ->orWhere('houseNumber', 'LIKE', "%$keyword%")
                ->orWhere('moo', 'LIKE', "%$keyword%")
                ->orWhere('soi', 'LIKE', "%$keyword%")
                ->orWhere('street', 'LIKE', "%$keyword%")
                ->orWhere('subDistrict', 'LIKE', "%$keyword%")
                ->orWhere('sdistrict', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $organization = Organization::latest()->paginate($perPage);
        }

        return view('organization.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('organization.create');
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
        
        Organization::create($requestData);

        return redirect('organization')->with('flash_message', 'Organization added!');
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
        $organization = Organization::findOrFail($id);

        return view('organization.show', compact('organization'));
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
        $organization = Organization::findOrFail($id);

        return view('organization.edit', compact('organization'));
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
        
        $organization = Organization::findOrFail($id);
        $organization->update($requestData);

        return redirect('organization')->with('flash_message', 'Organization updated!');
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
        Organization::destroy($id);

        return redirect('organization')->with('flash_message', 'Organization deleted!');
    }
}
