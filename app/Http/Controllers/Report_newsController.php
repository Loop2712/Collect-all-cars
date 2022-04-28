<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Report_news;
use Illuminate\Http\Request;

class Report_newsController extends Controller
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
            $report_news = Report_news::where('content', 'LIKE', "%$keyword%")
                ->orWhere('news_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $report_news = Report_news::latest()->paginate($perPage);
        }

        return view('report_news.index', compact('report_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('report_news.create');
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
        
        Report_news::create($requestData);

        return redirect('report_news')->with('flash_message', 'Report_news added!');
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
        $report_news = Report_news::findOrFail($id);

        return view('report_news.show', compact('report_news'));
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
        $report_news = Report_news::findOrFail($id);

        return view('report_news.edit', compact('report_news'));
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
        
        $report_news = Report_news::findOrFail($id);
        $report_news->update($requestData);

        return redirect('report_news')->with('flash_message', 'Report_news updated!');
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
        Report_news::destroy($id);

        return redirect('report_news')->with('flash_message', 'Report_news deleted!');
    }
}
