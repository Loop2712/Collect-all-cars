<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\So;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SosController extends Controller
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
            $sos = So::where('disaster', 'LIKE', "%$keyword%")
                ->orWhere('car_fire', 'LIKE', "%$keyword%")
                ->orWhere('life_saving', 'LIKE', "%$keyword%")
                ->orWhere('js_100', 'LIKE', "%$keyword%")
                ->orWhere('highway', 'LIKE', "%$keyword%")
                ->orWhere('tourist_police', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos = So::latest()->paginate($perPage);
        }

        return view('sos.index', compact('sos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos.create');
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
        
        So::create($requestData);

        return redirect('sos')->with('flash_message', 'So added!');
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
        $so = So::findOrFail($id);

        return view('sos.show', compact('so'));
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
        $so = So::findOrFail($id);

        return view('sos.edit', compact('so'));
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
        
        $so = So::findOrFail($id);
        $so->update($requestData);

        return redirect('sos')->with('flash_message', 'So updated!');
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
        So::destroy($id);

        return redirect('sos')->with('flash_message', 'So deleted!');
    }

    public function disaster2()
    {
        $disaster = DB::table('sos')
                ->select('disaster', 'total')
                ->where('id', 1)
                ->get();

        foreach ($disaster as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'disaster' => $key->disaster + 1,
                'total' => $key->total + 1,
            ]);
        }
    }
}
