<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_phone_country;
use Illuminate\Http\Request;

class Sos_phone_countryController extends Controller
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
            $sos_phone_country = Sos_phone_country::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('countryCode', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_phone_country = Sos_phone_country::latest()->paginate($perPage);
        }

        return view('sos_phone_country.index', compact('sos_phone_country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_phone_country.create');
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
        
        Sos_phone_country::create($requestData);

        return redirect('sos_phone_country')->with('flash_message', 'Sos_phone_country added!');
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
        $sos_phone_country = Sos_phone_country::findOrFail($id);

        return view('sos_phone_country.show', compact('sos_phone_country'));
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
        $sos_phone_country = Sos_phone_country::findOrFail($id);

        return view('sos_phone_country.edit', compact('sos_phone_country'));
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
        
        $sos_phone_country = Sos_phone_country::findOrFail($id);
        $sos_phone_country->update($requestData);

        return redirect('sos_phone_country')->with('flash_message', 'Sos_phone_country updated!');
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
        Sos_phone_country::destroy($id);

        return redirect('sos_phone_country')->with('flash_message', 'Sos_phone_country deleted!');
    }
}
