<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_device_code;
use Illuminate\Http\Request;

class Maintain_device_codesController extends Controller
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
            $maintain_device_codes = Maintain_device_code::where('name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('count', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_device_codes = Maintain_device_code::latest()->paginate($perPage);
        }

        return view('maintain_device_codes.index', compact('maintain_device_codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_device_codes.create');
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
        
        Maintain_device_code::create($requestData);

        return redirect('maintain_device_codes')->with('flash_message', 'Maintain_device_code added!');
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
        $maintain_device_code = Maintain_device_code::findOrFail($id);

        return view('maintain_device_codes.show', compact('maintain_device_code'));
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
        $maintain_device_code = Maintain_device_code::findOrFail($id);

        return view('maintain_device_codes.edit', compact('maintain_device_code'));
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
        
        $maintain_device_code = Maintain_device_code::findOrFail($id);
        $maintain_device_code->update($requestData);

        return redirect('maintain_device_codes')->with('flash_message', 'Maintain_device_code updated!');
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
        Maintain_device_code::destroy($id);

        return redirect('maintain_device_codes')->with('flash_message', 'Maintain_device_code deleted!');
    }
}
