<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_map_title;
use Illuminate\Http\Request;

class Sos_map_titleController extends Controller
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
            $sos_map_title = Sos_map_title::where('title', 'LIKE', "%$keyword%")
                ->orWhere('name_partner', 'LIKE', "%$keyword%")
                ->orWhere('ask_to_partner', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_map_title = Sos_map_title::latest()->paginate($perPage);
        }

        return view('sos_map_title.index', compact('sos_map_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_map_title.create');
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
        
        Sos_map_title::create($requestData);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title added!');
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
        $sos_map_title = Sos_map_title::findOrFail($id);

        return view('sos_map_title.show', compact('sos_map_title'));
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
        $sos_map_title = Sos_map_title::findOrFail($id);

        return view('sos_map_title.edit', compact('sos_map_title'));
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
        
        $sos_map_title = Sos_map_title::findOrFail($id);
        $sos_map_title->update($requestData);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title updated!');
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
        Sos_map_title::destroy($id);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title deleted!');
    }
}
