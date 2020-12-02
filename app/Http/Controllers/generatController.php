<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\generat;
use Illuminate\Http\Request;

class generatController extends Controller
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
            $generat = generat::where('generat_id', 'LIKE', "%$keyword%")
                ->orWhere('generat_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $generat = generat::latest()->paginate($perPage);
        }

        return view('generat.index', compact('generat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('generat.create');
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
        
        generat::create($requestData);

        return redirect('generat')->with('flash_message', 'generat added!');
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
        $generat = generat::findOrFail($id);

        return view('generat.show', compact('generat'));
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
        $generat = generat::findOrFail($id);

        return view('generat.edit', compact('generat'));
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
        
        $generat = generat::findOrFail($id);
        $generat->update($requestData);

        return redirect('generat')->with('flash_message', 'generat updated!');
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
        generat::destroy($id);

        return redirect('generat')->with('flash_message', 'generat deleted!');
    }
}
