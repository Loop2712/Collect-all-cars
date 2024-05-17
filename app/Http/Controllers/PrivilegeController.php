<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Privilege;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
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
            $privilege = Privilege::where('partner_id', 'LIKE', "%$keyword%")
                ->orWhere('titel', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('img_cover', 'LIKE', "%$keyword%")
                ->orWhere('img_content', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('redeem_type', 'LIKE', "%$keyword%")
                ->orWhere('amount_privilege', 'LIKE', "%$keyword%")
                ->orWhere('start_privilege', 'LIKE', "%$keyword%")
                ->orWhere('expire_privilege', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('user_click_redeem', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $privilege = Privilege::latest()->paginate($perPage);
        }

        return view('privilege.index', compact('privilege'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('privilege.create');
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
                if ($request->hasFile('img_cover')) {
            $requestData['img_cover'] = $request->file('img_cover')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('img_content')) {
            $requestData['img_content'] = $request->file('img_content')
                ->store('uploads', 'public');
        }

        Privilege::create($requestData);

        return redirect('privilege')->with('flash_message', 'Privilege added!');
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
        $privilege = Privilege::findOrFail($id);

        return view('privilege.show', compact('privilege'));
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
        $privilege = Privilege::findOrFail($id);

        return view('privilege.edit', compact('privilege'));
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
                if ($request->hasFile('img_cover')) {
            $requestData['img_cover'] = $request->file('img_cover')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('img_content')) {
            $requestData['img_content'] = $request->file('img_content')
                ->store('uploads', 'public');
        }

        $privilege = Privilege::findOrFail($id);
        $privilege->update($requestData);

        return redirect('privilege')->with('flash_message', 'Privilege updated!');
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
        Privilege::destroy($id);

        return redirect('privilege')->with('flash_message', 'Privilege deleted!');
    }
}
