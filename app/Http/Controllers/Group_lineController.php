<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Group_line;
use Illuminate\Http\Request;

class Group_lineController extends Controller
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
            $group_line = Group_line::where('groupId', 'LIKE', "%$keyword%")
                ->orWhere('groupName', 'LIKE', "%$keyword%")
                ->orWhere('pictureUrl', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $group_line = Group_line::latest()->paginate($perPage);
        }

        return view('group_line.index', compact('group_line'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('group_line.create');
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
        
        Group_line::create($requestData);

        return redirect('group_line')->with('flash_message', 'Group_line added!');
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
        $group_line = Group_line::findOrFail($id);

        return view('group_line.show', compact('group_line'));
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
        $group_line = Group_line::findOrFail($id);

        return view('group_line.edit', compact('group_line'));
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
        
        $group_line = Group_line::findOrFail($id);
        $group_line->update($requestData);

        return redirect('group_line')->with('flash_message', 'Group_line updated!');
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
        Group_line::destroy($id);

        return redirect('group_line')->with('flash_message', 'Group_line deleted!');
    }
}
