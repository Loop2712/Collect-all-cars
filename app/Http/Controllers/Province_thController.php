<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Province_th;
use Illuminate\Http\Request;

class Province_thController extends Controller
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
            $province_th = Province_th::where('province_id', 'LIKE', "%$keyword%")
                ->orWhere('province_name', 'LIKE', "%$keyword%")
                ->orWhere('province_lat', 'LIKE', "%$keyword%")
                ->orWhere('province_lon', 'LIKE', "%$keyword%")
                ->orWhere('province_zoom', 'LIKE', "%$keyword%")
                ->orWhere('polygon', 'LIKE', "%$keyword%")
                ->orWhere('count_sos_1669', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $province_th = Province_th::latest()->paginate($perPage);
        }

        return view('province_th.index', compact('province_th'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('province_th.create');
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
        
        Province_th::create($requestData);

        return redirect('province_th')->with('flash_message', 'Province_th added!');
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
        $province_th = Province_th::findOrFail($id);

        return view('province_th.show', compact('province_th'));
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
        $province_th = Province_th::findOrFail($id);

        return view('province_th.edit', compact('province_th'));
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
        
        $province_th = Province_th::findOrFail($id);
        $province_th->update($requestData);

        return redirect('province_th')->with('flash_message', 'Province_th updated!');
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
        Province_th::destroy($id);

        return redirect('province_th')->with('flash_message', 'Province_th deleted!');
    }
}
