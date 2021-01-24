<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Profanity;
use Illuminate\Http\Request;

class ProfanityController extends Controller
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
            $profanity = Profanity::where('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $profanity = Profanity::latest()->paginate($perPage);
        }

        return view('profanity.index', compact('profanity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profanity.create');
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
        
        Profanity::create($requestData);

        return redirect('profanity')->with('flash_message', 'Profanity added!');
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
        $profanity = Profanity::findOrFail($id);

        return view('profanity.show', compact('profanity'));
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
        $profanity = Profanity::findOrFail($id);

        return view('profanity.edit', compact('profanity'));
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
        
        $profanity = Profanity::findOrFail($id);
        $profanity->update($requestData);

        return redirect('profanity')->with('flash_message', 'Profanity updated!');
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
        Profanity::destroy($id);

        return redirect('profanity')->with('flash_message', 'Profanity deleted!');
    }
}
