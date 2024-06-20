<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Privilege_partner;
use Illuminate\Http\Request;

class Privilege_partnerController extends Controller
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
            $privilege_partner = Privilege_partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $privilege_partner = Privilege_partner::latest()->paginate($perPage);
        }

        return view('privilege_partner.index', compact('privilege_partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('privilege_partner.create');
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
        
        Privilege_partner::create($requestData);

        return redirect('privilege_partner')->with('flash_message', 'Privilege_partner added!');
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
        $privilege_partner = Privilege_partner::findOrFail($id);

        return view('privilege_partner.show', compact('privilege_partner'));
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
        $privilege_partner = Privilege_partner::findOrFail($id);

        return view('privilege_partner.edit', compact('privilege_partner'));
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
        
        $privilege_partner = Privilege_partner::findOrFail($id);
        $privilege_partner->update($requestData);

        return redirect('privilege_partner')->with('flash_message', 'Privilege_partner updated!');
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
        Privilege_partner::destroy($id);

        return redirect('privilege_partner')->with('flash_message', 'Privilege_partner deleted!');
    }
}
