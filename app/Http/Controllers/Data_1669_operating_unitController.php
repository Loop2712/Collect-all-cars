<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Data_1669_operating_unit;
use Illuminate\Http\Request;

class Data_1669_operating_unitController extends Controller
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
            $data_1669_operating_unit = Data_1669_operating_unit::where('name', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('level', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data_1669_operating_unit = Data_1669_operating_unit::latest()->paginate($perPage);
        }

        return view('data_1669_operating_unit.index', compact('data_1669_operating_unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data_1669_operating_unit.create');
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
        
        Data_1669_operating_unit::create($requestData);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit added!');
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
        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);

        return view('data_1669_operating_unit.show', compact('data_1669_operating_unit'));
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
        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);

        return view('data_1669_operating_unit.edit', compact('data_1669_operating_unit'));
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
        
        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);
        $data_1669_operating_unit->update($requestData);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit updated!');
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
        Data_1669_operating_unit::destroy($id);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit deleted!');
    }
}
