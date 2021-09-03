<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Cancel_after_6_month;
use Illuminate\Http\Request;

class Cancel_after_6_monthController extends Controller
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
            $cancel_after_6_month = Cancel_after_6_month::where('name', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('provider_id', 'LIKE', "%$keyword%")
                ->orWhere('avatar', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('brith', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('ranking', 'LIKE', "%$keyword%")
                ->orWhere('driver_license', 'LIKE', "%$keyword%")
                ->orWhere('driver_license2', 'LIKE', "%$keyword%")
                ->orWhere('location_P', 'LIKE', "%$keyword%")
                ->orWhere('location_A', 'LIKE', "%$keyword%")
                ->orWhere('organization', 'LIKE', "%$keyword%")
                ->orWhere('branch', 'LIKE', "%$keyword%")
                ->orWhere('branch_district', 'LIKE', "%$keyword%")
                ->orWhere('branch_province', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cancel_after_6_month = Cancel_after_6_month::latest()->paginate($perPage);
        }

        return view('cancel_after_6_month.index', compact('cancel_after_6_month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cancel_after_6_month.create');
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
        
        Cancel_after_6_month::create($requestData);

        return redirect('cancel_after_6_month')->with('flash_message', 'Cancel_after_6_month added!');
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
        $cancel_after_6_month = Cancel_after_6_month::findOrFail($id);

        return view('cancel_after_6_month.show', compact('cancel_after_6_month'));
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
        $cancel_after_6_month = Cancel_after_6_month::findOrFail($id);

        return view('cancel_after_6_month.edit', compact('cancel_after_6_month'));
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
        
        $cancel_after_6_month = Cancel_after_6_month::findOrFail($id);
        $cancel_after_6_month->update($requestData);

        return redirect('cancel_after_6_month')->with('flash_message', 'Cancel_after_6_month updated!');
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
        Cancel_after_6_month::destroy($id);

        return redirect('cancel_after_6_month')->with('flash_message', 'Cancel_after_6_month deleted!');
    }
}
