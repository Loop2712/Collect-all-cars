<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nationalitie_so;
use Illuminate\Http\Request;

class Nationalitie_sosController extends Controller
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
            $nationalitie_sos = Nationalitie_so::where('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->orWhere('phone_user', 'LIKE', "%$keyword%")
                ->orWhere('id_user', 'LIKE', "%$keyword%")
                ->orWhere('nationalities_user', 'LIKE', "%$keyword%")
                ->orWhere('language_user', 'LIKE', "%$keyword%")
                ->orWhere('organization_helper', 'LIKE', "%$keyword%")
                ->orWhere('name_helper', 'LIKE', "%$keyword%")
                ->orWhere('phone_helper', 'LIKE', "%$keyword%")
                ->orWhere('id_helper', 'LIKE', "%$keyword%")
                ->orWhere('organization_other', 'LIKE', "%$keyword%")
                ->orWhere('id_data_sos', 'LIKE', "%$keyword%")
                ->orWhere('detail_sos', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('name_officer', 'LIKE', "%$keyword%")
                ->orWhere('phone_officer', 'LIKE', "%$keyword%")
                ->orWhere('id_officer', 'LIKE', "%$keyword%")
                ->orWhere('score_impression_officer', 'LIKE', "%$keyword%")
                ->orWhere('score_period_officer', 'LIKE', "%$keyword%")
                ->orWhere('score_total_officer', 'LIKE', "%$keyword%")
                ->orWhere('comment_officer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nationalitie_sos = Nationalitie_so::latest()->paginate($perPage);
        }

        return view('nationalitie_sos.index', compact('nationalitie_sos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nationalitie_sos.create');
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
        
        Nationalitie_so::create($requestData);

        return redirect('nationalitie_sos')->with('flash_message', 'Nationalitie_so added!');
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
        $nationalitie_so = Nationalitie_so::findOrFail($id);

        return view('nationalitie_sos.show', compact('nationalitie_so'));
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
        $nationalitie_so = Nationalitie_so::findOrFail($id);

        return view('nationalitie_sos.edit', compact('nationalitie_so'));
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
        
        $nationalitie_so = Nationalitie_so::findOrFail($id);
        $nationalitie_so->update($requestData);

        return redirect('nationalitie_sos')->with('flash_message', 'Nationalitie_so updated!');
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
        Nationalitie_so::destroy($id);

        return redirect('nationalitie_sos')->with('flash_message', 'Nationalitie_so deleted!');
    }
}
