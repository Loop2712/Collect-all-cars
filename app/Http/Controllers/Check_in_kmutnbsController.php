<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Check_in_kmutnb;
use Illuminate\Http\Request;

class Check_in_kmutnbsController extends Controller
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
            $check_in_kmutnbs = Check_in_kmutnb::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('time_in', 'LIKE', "%$keyword%")
                ->orWhere('time_out', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $check_in_kmutnbs = Check_in_kmutnb::latest()->paginate($perPage);
        }

        return view('check_in_kmutnbs.index', compact('check_in_kmutnbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('check_in_kmutnbs.create');
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
        
        Check_in_kmutnb::create($requestData);

        return redirect('check_in_kmutnbs')->with('flash_message', 'Check_in_kmutnb added!');
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
        $check_in_kmutnb = Check_in_kmutnb::findOrFail($id);

        return view('check_in_kmutnbs.show', compact('check_in_kmutnb'));
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
        $check_in_kmutnb = Check_in_kmutnb::findOrFail($id);

        return view('check_in_kmutnbs.edit', compact('check_in_kmutnb'));
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
        
        $check_in_kmutnb = Check_in_kmutnb::findOrFail($id);
        $check_in_kmutnb->update($requestData);

        return redirect('check_in_kmutnbs')->with('flash_message', 'Check_in_kmutnb updated!');
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
        Check_in_kmutnb::destroy($id);

        return redirect('check_in_kmutnbs')->with('flash_message', 'Check_in_kmutnb deleted!');
    }
}
