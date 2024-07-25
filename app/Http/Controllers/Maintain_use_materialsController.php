<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_use_material;
use Illuminate\Http\Request;

class Maintain_use_materialsController extends Controller
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
            $maintain_use_materials = Maintain_use_material::where('name', 'LIKE', "%$keyword%")
                ->orWhere('maintain_material_id', 'LIKE', "%$keyword%")
                ->orWhere('officer_id', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_use_materials = Maintain_use_material::latest()->paginate($perPage);
        }

        return view('maintain_use_materials.index', compact('maintain_use_materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_use_materials.create');
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
        
        Maintain_use_material::create($requestData);

        return redirect('maintain_use_materials')->with('flash_message', 'Maintain_use_material added!');
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
        $maintain_use_material = Maintain_use_material::findOrFail($id);

        return view('maintain_use_materials.show', compact('maintain_use_material'));
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
        $maintain_use_material = Maintain_use_material::findOrFail($id);

        return view('maintain_use_materials.edit', compact('maintain_use_material'));
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
        
        $maintain_use_material = Maintain_use_material::findOrFail($id);
        $maintain_use_material->update($requestData);

        return redirect('maintain_use_materials')->with('flash_message', 'Maintain_use_material updated!');
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
        Maintain_use_material::destroy($id);

        return redirect('maintain_use_materials')->with('flash_message', 'Maintain_use_material deleted!');
    }
}
