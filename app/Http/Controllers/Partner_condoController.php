<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Partner_condo;
use Illuminate\Http\Request;

class Partner_condoController extends Controller
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
            $partner_condo = Partner_condo::where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_line_oa', 'LIKE', "%$keyword%")
                ->orWhere('link_line_oa', 'LIKE', "%$keyword%")
                ->orWhere('channel_access_token', 'LIKE', "%$keyword%")
                ->orWhere('channel_secret', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_TH', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_EN', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_zh_TW', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_zh_CN', 'LIKE', "%$keyword%")
                ->orWhere('partner_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner_condo = Partner_condo::latest()->paginate($perPage);
        }

        return view('partner_condo.index', compact('partner_condo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner_condo.create');
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
        
        Partner_condo::create($requestData);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo added!');
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
        $partner_condo = Partner_condo::findOrFail($id);

        return view('partner_condo.show', compact('partner_condo'));
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
        $partner_condo = Partner_condo::findOrFail($id);

        return view('partner_condo.edit', compact('partner_condo'));
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
        
        $partner_condo = Partner_condo::findOrFail($id);
        $partner_condo->update($requestData);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo updated!');
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
        Partner_condo::destroy($id);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo deleted!');
    }

    public function select_condo(Request $request)
    {
        $requestData = $request->all();

        $all_condo = Partner_condo::get() ;

        return view('partner_condo.select_condo', compact('all_condo'));
    }
}
