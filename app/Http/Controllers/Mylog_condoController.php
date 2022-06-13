<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Mylog_condo;
use Illuminate\Http\Request;

class Mylog_condoController extends Controller
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
            $mylog_condo = Mylog_condo::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('condo_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mylog_condo = Mylog_condo::latest()->paginate($perPage);
        }

        return view('mylog_condo.index', compact('mylog_condo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mylog_condo.create');
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
        
        Mylog_condo::create($requestData);

        return redirect('mylog_condo')->with('flash_message', 'Mylog_condo added!');
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
        $mylog_condo = Mylog_condo::findOrFail($id);

        return view('mylog_condo.show', compact('mylog_condo'));
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
        $mylog_condo = Mylog_condo::findOrFail($id);

        return view('mylog_condo.edit', compact('mylog_condo'));
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
        
        $mylog_condo = Mylog_condo::findOrFail($id);
        $mylog_condo->update($requestData);

        return redirect('mylog_condo')->with('flash_message', 'Mylog_condo updated!');
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
        Mylog_condo::destroy($id);

        return redirect('mylog_condo')->with('flash_message', 'Mylog_condo deleted!');
    }
}
