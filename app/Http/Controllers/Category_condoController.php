<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Category_condo;
use Illuminate\Http\Request;

class Category_condoController extends Controller
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
            $category_condo = Category_condo::where('name_category', 'LIKE', "%$keyword%")
                ->orWhere('system', 'LIKE', "%$keyword%")
                ->orWhere('condo_id', 'LIKE', "%$keyword%")
                ->orWhere('name_staff', 'LIKE', "%$keyword%")
                ->orWhere('staff_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category_condo = Category_condo::latest()->paginate($perPage);
        }

        return view('category_condo.index', compact('category_condo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('category_condo.create');
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
        
        Category_condo::create($requestData);

        return redirect('category_condo')->with('flash_message', 'Category_condo added!');
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
        $category_condo = Category_condo::findOrFail($id);

        return view('category_condo.show', compact('category_condo'));
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
        $category_condo = Category_condo::findOrFail($id);

        return view('category_condo.edit', compact('category_condo'));
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
        
        $category_condo = Category_condo::findOrFail($id);
        $category_condo->update($requestData);

        return redirect('category_condo')->with('flash_message', 'Category_condo updated!');
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
        Category_condo::destroy($id);

        return redirect('category_condo')->with('flash_message', 'Category_condo deleted!');
    }
}
