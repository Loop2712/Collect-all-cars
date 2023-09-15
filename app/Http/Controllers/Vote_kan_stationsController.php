<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Vote_kan_station;
use Illuminate\Http\Request;

class Vote_kan_stationsController extends Controller
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
            $vote_kan_stations = Vote_kan_station::where('name', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('amphoe', 'LIKE', "%$keyword%")
                ->orWhere('tambon', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name_user', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_stations = Vote_kan_station::latest()->paginate($perPage);
        }

        return view('vote_kan_stations.index', compact('vote_kan_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vote_kan_stations.create');
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
        
        Vote_kan_station::create($requestData);

        return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station added!');
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
        $vote_kan_station = Vote_kan_station::findOrFail($id);

        return view('vote_kan_stations.show', compact('vote_kan_station'));
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
        $vote_kan_station = Vote_kan_station::findOrFail($id);

        return view('vote_kan_stations.edit', compact('vote_kan_station'));
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
        
        $vote_kan_station = Vote_kan_station::findOrFail($id);
        $vote_kan_station->update($requestData);

        return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station updated!');
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
        Vote_kan_station::destroy($id);

        return redirect('vote_kan_stations')->with('flash_message', 'Vote_kan_station deleted!');
    }
}
