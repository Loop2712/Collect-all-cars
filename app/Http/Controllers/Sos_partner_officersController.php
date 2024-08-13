<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_partner_officer;
use Illuminate\Http\Request;

class Sos_partner_officersController extends Controller
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
            $sos_partner_officers = Sos_partner_officer::where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->orWhere('sos_partner_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('status_officer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_partner_officers = Sos_partner_officer::latest()->paginate($perPage);
        }

        return view('sos_partner_officers.index', compact('sos_partner_officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_partner_officers.create');
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
        
        Sos_partner_officer::create($requestData);

        return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer added!');
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
        $sos_partner_officer = Sos_partner_officer::findOrFail($id);

        return view('sos_partner_officers.show', compact('sos_partner_officer'));
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
        $sos_partner_officer = Sos_partner_officer::findOrFail($id);

        return view('sos_partner_officers.edit', compact('sos_partner_officer'));
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
        
        $sos_partner_officer = Sos_partner_officer::findOrFail($id);
        $sos_partner_officer->update($requestData);

        return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer updated!');
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
        Sos_partner_officer::destroy($id);

        return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer deleted!');
    }
}
