<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_material;
use Illuminate\Http\Request;

class Maintain_materialsController extends Controller
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
            $maintain_materials = Maintain_material::where('name', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_materials = Maintain_material::latest()->paginate($perPage);
        }

        return view('maintain_materials.index', compact('maintain_materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_materials.create');
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
        
        Maintain_material::create($requestData);

        return redirect('maintain_materials')->with('flash_message', 'Maintain_material added!');
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
        $maintain_material = Maintain_material::findOrFail($id);

        return view('maintain_materials.show', compact('maintain_material'));
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
        $maintain_material = Maintain_material::findOrFail($id);

        return view('maintain_materials.edit', compact('maintain_material'));
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
        
        $maintain_material = Maintain_material::findOrFail($id);
        $maintain_material->update($requestData);

        return redirect('maintain_materials')->with('flash_message', 'Maintain_material updated!');
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
        Maintain_material::destroy($id);

        return redirect('maintain_materials')->with('flash_message', 'Maintain_material deleted!');
    }
}
