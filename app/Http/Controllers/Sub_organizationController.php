<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sub_organization;
use Illuminate\Http\Request;

class Sub_organizationController extends Controller
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
            $sub_organization = Sub_organization::where('name_sub_organization', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('name_partner', 'LIKE', "%$keyword%")
                ->orWhere('id_partner', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sub_organization = Sub_organization::latest()->paginate($perPage);
        }

        return view('sub_organization.index', compact('sub_organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sub_organization.create');
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
        
        Sub_organization::create($requestData);

        return redirect('sub_organization')->with('flash_message', 'Sub_organization added!');
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
        $sub_organization = Sub_organization::findOrFail($id);

        return view('sub_organization.show', compact('sub_organization'));
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
        $sub_organization = Sub_organization::findOrFail($id);

        return view('sub_organization.edit', compact('sub_organization'));
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
        
        $sub_organization = Sub_organization::findOrFail($id);
        $sub_organization->update($requestData);

        return redirect('sub_organization')->with('flash_message', 'Sub_organization updated!');
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
        Sub_organization::destroy($id);

        return redirect('sub_organization')->with('flash_message', 'Sub_organization deleted!');
    }
}
