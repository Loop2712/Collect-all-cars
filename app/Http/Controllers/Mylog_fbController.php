<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Mylog_fb;
use Illuminate\Http\Request;

class Mylog_fbController extends Controller
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
            $mylog_fb = Mylog_fb::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mylog_fb = Mylog_fb::latest()->paginate($perPage);
        }

        return view('mylog_fb.index', compact('mylog_fb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mylog_fb.create');
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
        
        Mylog_fb::create($requestData);

        return redirect('mylog_fb')->with('flash_message', 'Mylog_fb added!');
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
        $mylog_fb = Mylog_fb::findOrFail($id);

        return view('mylog_fb.show', compact('mylog_fb'));
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
        $mylog_fb = Mylog_fb::findOrFail($id);

        return view('mylog_fb.edit', compact('mylog_fb'));
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
        
        $mylog_fb = Mylog_fb::findOrFail($id);
        $mylog_fb->update($requestData);

        return redirect('mylog_fb')->with('flash_message', 'Mylog_fb updated!');
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
        Mylog_fb::destroy($id);

        return redirect('mylog_fb')->with('flash_message', 'Mylog_fb deleted!');
    }
}
