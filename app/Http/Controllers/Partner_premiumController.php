<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Partner_premium;
use Illuminate\Http\Request;

class Partner_premiumController extends Controller
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
            $partner_premium = Partner_premium::where('name_partner', 'LIKE', "%$keyword%")
                ->orWhere('id_partner', 'LIKE', "%$keyword%")
                ->orWhere('level', 'LIKE', "%$keyword%")
                ->orWhere('BC_by_car_max', 'LIKE', "%$keyword%")
                ->orWhere('BC_by_car_sent', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner_premium = Partner_premium::latest()->paginate($perPage);
        }

        return view('partner_premium.index', compact('partner_premium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner_premium.create');
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
        
        Partner_premium::create($requestData);

        return redirect('partner_premium')->with('flash_message', 'Partner_premium added!');
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
        $partner_premium = Partner_premium::findOrFail($id);

        return view('partner_premium.show', compact('partner_premium'));
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
        $partner_premium = Partner_premium::findOrFail($id);

        return view('partner_premium.edit', compact('partner_premium'));
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
        
        $partner_premium = Partner_premium::findOrFail($id);
        $partner_premium->update($requestData);

        return redirect('partner_premium')->with('flash_message', 'Partner_premium updated!');
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
        Partner_premium::destroy($id);

        return redirect('partner_premium')->with('flash_message', 'Partner_premium deleted!');
    }
}
