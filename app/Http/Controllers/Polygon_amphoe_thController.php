<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Polygon_amphoe_th;
use Illuminate\Http\Request;

class Polygon_amphoe_thController extends Controller
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
            $polygon_amphoe_th = Polygon_amphoe_th::where('province_name', 'LIKE', "%$keyword%")
                ->orWhere('amphoe_name', 'LIKE', "%$keyword%")
                ->orWhere('amphoe_lat', 'LIKE', "%$keyword%")
                ->orWhere('amphoe_lon', 'LIKE', "%$keyword%")
                ->orWhere('amphoe_zoom', 'LIKE', "%$keyword%")
                ->orWhere('polygon', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $polygon_amphoe_th = Polygon_amphoe_th::latest()->paginate($perPage);
        }

        return view('polygon_amphoe_th.index', compact('polygon_amphoe_th'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('polygon_amphoe_th.create');
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
        
        Polygon_amphoe_th::create($requestData);

        return redirect('polygon_amphoe_th')->with('flash_message', 'Polygon_amphoe_th added!');
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
        $polygon_amphoe_th = Polygon_amphoe_th::findOrFail($id);

        return view('polygon_amphoe_th.show', compact('polygon_amphoe_th'));
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
        $polygon_amphoe_th = Polygon_amphoe_th::findOrFail($id);

        return view('polygon_amphoe_th.edit', compact('polygon_amphoe_th'));
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
        
        $polygon_amphoe_th = Polygon_amphoe_th::findOrFail($id);
        $polygon_amphoe_th->update($requestData);

        return redirect('polygon_amphoe_th')->with('flash_message', 'Polygon_amphoe_th updated!');
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
        Polygon_amphoe_th::destroy($id);

        return redirect('polygon_amphoe_th')->with('flash_message', 'Polygon_amphoe_th deleted!');
    }
}
