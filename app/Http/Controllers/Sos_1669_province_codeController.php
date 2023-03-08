<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_1669_province_code;
use Illuminate\Http\Request;

class Sos_1669_province_codeController extends Controller
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
            $sos_1669_province_code = Sos_1669_province_code::where('area_code', 'LIKE', "%$keyword%")
                ->orWhere('province_code', 'LIKE', "%$keyword%")
                ->orWhere('province_name', 'LIKE', "%$keyword%")
                ->orWhere('district_code', 'LIKE', "%$keyword%")
                ->orWhere('district_name', 'LIKE', "%$keyword%")
                ->orWhere('sub_district_code', 'LIKE', "%$keyword%")
                ->orWhere('sub_district_name', 'LIKE', "%$keyword%")
                ->orWhere('count_sos', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_1669_province_code = Sos_1669_province_code::latest()->paginate($perPage);
        }

        return view('sos_1669_province_code.index', compact('sos_1669_province_code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_1669_province_code.create');
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
        
        Sos_1669_province_code::create($requestData);

        return redirect('sos_1669_province_code')->with('flash_message', 'Sos_1669_province_code added!');
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
        $sos_1669_province_code = Sos_1669_province_code::findOrFail($id);

        return view('sos_1669_province_code.show', compact('sos_1669_province_code'));
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
        $sos_1669_province_code = Sos_1669_province_code::findOrFail($id);

        return view('sos_1669_province_code.edit', compact('sos_1669_province_code'));
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
        
        $sos_1669_province_code = Sos_1669_province_code::findOrFail($id);
        $sos_1669_province_code->update($requestData);

        return redirect('sos_1669_province_code')->with('flash_message', 'Sos_1669_province_code updated!');
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
        Sos_1669_province_code::destroy($id);

        return redirect('sos_1669_province_code')->with('flash_message', 'Sos_1669_province_code deleted!');
    }
}
