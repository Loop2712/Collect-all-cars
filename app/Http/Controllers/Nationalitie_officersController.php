<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nationalitie_officer;
use Illuminate\Http\Request;

class Nationalitie_officersController extends Controller
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
            $nationalitie_officers = Nationalitie_officer::where('name_officer', 'LIKE', "%$keyword%")
                ->orWhere('phone_officer', 'LIKE', "%$keyword%")
                ->orWhere('photo_officer', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('group_line_id', 'LIKE', "%$keyword%")
                ->orWhere('all_case', 'LIKE', "%$keyword%")
                ->orWhere('score_per_case', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nationalitie_officers = Nationalitie_officer::latest()->paginate($perPage);
        }

        return view('nationalitie_officers.index', compact('nationalitie_officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nationalitie_officers.create');
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
        
        Nationalitie_officer::create($requestData);

        return redirect('nationalitie_officers')->with('flash_message', 'Nationalitie_officer added!');
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
        $nationalitie_officer = Nationalitie_officer::findOrFail($id);

        return view('nationalitie_officers.show', compact('nationalitie_officer'));
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
        $nationalitie_officer = Nationalitie_officer::findOrFail($id);

        return view('nationalitie_officers.edit', compact('nationalitie_officer'));
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
        
        $nationalitie_officer = Nationalitie_officer::findOrFail($id);
        $nationalitie_officer->update($requestData);

        return redirect('nationalitie_officers')->with('flash_message', 'Nationalitie_officer updated!');
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
        Nationalitie_officer::destroy($id);

        return redirect('nationalitie_officers')->with('flash_message', 'Nationalitie_officer deleted!');
    }
}
