<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_1669_officer_ask_more;
use Illuminate\Http\Request;

class Sos_1669_officer_ask_moreController extends Controller
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
            $sos_1669_officer_ask_more = Sos_1669_officer_ask_more::where('sos_id', 'LIKE', "%$keyword%")
                ->orWhere('officer_id', 'LIKE', "%$keyword%")
                ->orWhere('rc', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_car', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_aircraft', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_boat_1', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_boat_2', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_boat_3', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_boat_other', 'LIKE', "%$keyword%")
                ->orWhere('officer_amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_1669_officer_ask_more = Sos_1669_officer_ask_more::latest()->paginate($perPage);
        }

        return view('sos_1669_officer_ask_more.index', compact('sos_1669_officer_ask_more'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_1669_officer_ask_more.create');
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
        
        Sos_1669_officer_ask_more::create($requestData);

        return redirect('sos_1669_officer_ask_more')->with('flash_message', 'Sos_1669_officer_ask_more added!');
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
        $sos_1669_officer_ask_more = Sos_1669_officer_ask_more::findOrFail($id);

        return view('sos_1669_officer_ask_more.show', compact('sos_1669_officer_ask_more'));
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
        $sos_1669_officer_ask_more = Sos_1669_officer_ask_more::findOrFail($id);

        return view('sos_1669_officer_ask_more.edit', compact('sos_1669_officer_ask_more'));
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
        
        $sos_1669_officer_ask_more = Sos_1669_officer_ask_more::findOrFail($id);
        $sos_1669_officer_ask_more->update($requestData);

        return redirect('sos_1669_officer_ask_more')->with('flash_message', 'Sos_1669_officer_ask_more updated!');
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
        Sos_1669_officer_ask_more::destroy($id);

        return redirect('sos_1669_officer_ask_more')->with('flash_message', 'Sos_1669_officer_ask_more deleted!');
    }
}
