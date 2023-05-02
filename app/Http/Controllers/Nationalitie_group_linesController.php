<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nationalitie_group_line;
use Illuminate\Http\Request;

class Nationalitie_group_linesController extends Controller
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
            $nationalitie_group_lines = Nationalitie_group_line::where('groupId', 'LIKE', "%$keyword%")
                ->orWhere('groupName', 'LIKE', "%$keyword%")
                ->orWhere('pictureUrl', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->orWhere('id_nationalitie', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nationalitie_group_lines = Nationalitie_group_line::latest()->paginate($perPage);
        }

        return view('nationalitie_group_lines.index', compact('nationalitie_group_lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nationalitie_group_lines.create');
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
        
        Nationalitie_group_line::create($requestData);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line added!');
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
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);

        return view('nationalitie_group_lines.show', compact('nationalitie_group_line'));
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
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);

        return view('nationalitie_group_lines.edit', compact('nationalitie_group_line'));
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
        
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);
        $nationalitie_group_line->update($requestData);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line updated!');
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
        Nationalitie_group_line::destroy($id);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line deleted!');
    }
}
