<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Insurance;
use Illuminate\Http\Request;

use App\Models\Group_line;

class InsuranceController extends Controller
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
            $insurance = Insurance::where('company', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('status_partner', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $insurance = Insurance::orderBy('status_partner', 'desc')
                ->orderBy('company', 'asc')
                ->latest()->paginate($perPage);
        }

        $group_line = Group_line::where('owner', null)->get();

        return view('insurance.index', compact('insurance','group_line'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('insurance.create');
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
        
        Insurance::create($requestData);

        return redirect('insurance')->with('flash_message', 'Insurance added!');
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
        $insurance = Insurance::findOrFail($id);

        return view('insurance.show', compact('insurance'));
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
        $insurance = Insurance::findOrFail($id);

        return view('insurance.edit', compact('insurance'));
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
        
        $insurance = Insurance::findOrFail($id);
        $insurance->update($requestData);

        return redirect('insurance')->with('flash_message', 'Insurance updated!');
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
        Insurance::destroy($id);

        return redirect('insurance')->with('flash_message', 'Insurance deleted!');
    }
}
