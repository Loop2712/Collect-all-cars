<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Text_topic;
use Illuminate\Http\Request;

class Text_topicController extends Controller
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
            $text_topic = Text_topic::where('th', 'LIKE', "%$keyword%")
                ->orWhere('en', 'LIKE', "%$keyword%")
                ->orWhere('zh_TW', 'LIKE', "%$keyword%")
                ->orWhere('ja', 'LIKE', "%$keyword%")
                ->orWhere('ko', 'LIKE', "%$keyword%")
                ->orWhere('es', 'LIKE', "%$keyword%")
                ->orWhere('lo', 'LIKE', "%$keyword%")
                ->orWhere('my', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $text_topic = Text_topic::latest()->paginate($perPage);
        }

        return view('text_topic.index', compact('text_topic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('text_topic.create');
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
        
        Text_topic::create($requestData);

        return redirect('text_topic')->with('flash_message', 'Text_topic added!');
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
        $text_topic = Text_topic::findOrFail($id);

        return view('text_topic.show', compact('text_topic'));
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
        $text_topic = Text_topic::findOrFail($id);

        return view('text_topic.edit', compact('text_topic'));
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
        
        $text_topic = Text_topic::findOrFail($id);
        $text_topic->update($requestData);

        return redirect('text_topic')->with('flash_message', 'Text_topic updated!');
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
        Text_topic::destroy($id);

        return redirect('text_topic')->with('flash_message', 'Text_topic deleted!');
    }
}
