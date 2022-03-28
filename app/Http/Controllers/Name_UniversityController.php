<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Name_University;
use Illuminate\Http\Request;

class Name_UniversityController extends Controller
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
            $name_university = Name_University::where('full_name_th', 'LIKE', "%$keyword%")
                ->orWhere('full_name_en', 'LIKE', "%$keyword%")
                ->orWhere('initials_th', 'LIKE', "%$keyword%")
                ->orWhere('initials_en', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $name_university = Name_University::latest()->paginate($perPage);
        }

        return view('name_-university.index', compact('name_university'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('name_-university.create');
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
        
        Name_University::create($requestData);

        return redirect('name_-university')->with('flash_message', 'Name_University added!');
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
        $name_university = Name_University::findOrFail($id);

        return view('name_-university.show', compact('name_university'));
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
        $name_university = Name_University::findOrFail($id);

        return view('name_-university.edit', compact('name_university'));
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
        
        $name_university = Name_University::findOrFail($id);
        $name_university->update($requestData);

        return redirect('name_-university')->with('flash_message', 'Name_University updated!');
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
        Name_University::destroy($id);

        return redirect('name_-university')->with('flash_message', 'Name_University deleted!');
    }
}
