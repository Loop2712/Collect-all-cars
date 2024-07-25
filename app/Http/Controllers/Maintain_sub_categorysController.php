<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_sub_category;
use Illuminate\Http\Request;

class Maintain_sub_categorysController extends Controller
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
            $maintain_sub_categorys = Maintain_sub_category::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('count', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_sub_categorys = Maintain_sub_category::latest()->paginate($perPage);
        }

        return view('maintain_sub_categorys.index', compact('maintain_sub_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_sub_categorys.create');
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
        
        Maintain_sub_category::create($requestData);

        return redirect('maintain_sub_categorys')->with('flash_message', 'Maintain_sub_category added!');
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
        $maintain_sub_category = Maintain_sub_category::findOrFail($id);

        return view('maintain_sub_categorys.show', compact('maintain_sub_category'));
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
        $maintain_sub_category = Maintain_sub_category::findOrFail($id);

        return view('maintain_sub_categorys.edit', compact('maintain_sub_category'));
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
        
        $maintain_sub_category = Maintain_sub_category::findOrFail($id);
        $maintain_sub_category->update($requestData);

        return redirect('maintain_sub_categorys')->with('flash_message', 'Maintain_sub_category updated!');
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
        Maintain_sub_category::destroy($id);

        return redirect('maintain_sub_categorys')->with('flash_message', 'Maintain_sub_category deleted!');
    }
}
