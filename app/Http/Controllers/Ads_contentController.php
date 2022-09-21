<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Ads_content;
use Illuminate\Http\Request;

class Ads_contentController extends Controller
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
            $ads_content = Ads_content::where('name_content', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('type_content', 'LIKE', "%$keyword%")
                ->orWhere('name_partner', 'LIKE', "%$keyword%")
                ->orWhere('id_partner', 'LIKE', "%$keyword%")
                ->orWhere('show_user', 'LIKE', "%$keyword%")
                ->orWhere('user_click', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ads_content = Ads_content::latest()->paginate($perPage);
        }

        return view('ads_content.index', compact('ads_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ads_content.create');
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        Ads_content::create($requestData);

        return redirect('ads_content')->with('flash_message', 'Ads_content added!');
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
        $ads_content = Ads_content::findOrFail($id);

        return view('ads_content.show', compact('ads_content'));
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
        $ads_content = Ads_content::findOrFail($id);

        return view('ads_content.edit', compact('ads_content'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $ads_content = Ads_content::findOrFail($id);
        $ads_content->update($requestData);

        return redirect('ads_content')->with('flash_message', 'Ads_content updated!');
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
        Ads_content::destroy($id);

        return redirect('ads_content')->with('flash_message', 'Ads_content deleted!');
    }
}
