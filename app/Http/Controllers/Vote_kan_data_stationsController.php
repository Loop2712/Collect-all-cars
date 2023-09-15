<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Vote_kan_data_station;
use Illuminate\Http\Request;

class Vote_kan_data_stationsController extends Controller
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
            $vote_kan_data_stations = Vote_kan_data_station::where('amphoe', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('tambon', 'LIKE', "%$keyword%")
                ->orWhere('polling_station_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_data_stations = Vote_kan_data_station::latest()->paginate($perPage);
        }

        return view('vote_kan_data_stations.index', compact('vote_kan_data_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vote_kan_data_stations.create');
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
        
        Vote_kan_data_station::create($requestData);

        return redirect('vote_kan_data_stations')->with('flash_message', 'Vote_kan_data_station added!');
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
        $vote_kan_data_station = Vote_kan_data_station::findOrFail($id);

        return view('vote_kan_data_stations.show', compact('vote_kan_data_station'));
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
        $vote_kan_data_station = Vote_kan_data_station::findOrFail($id);

        return view('vote_kan_data_stations.edit', compact('vote_kan_data_station'));
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
        
        $vote_kan_data_station = Vote_kan_data_station::findOrFail($id);
        $vote_kan_data_station->update($requestData);

        return redirect('vote_kan_data_stations')->with('flash_message', 'Vote_kan_data_station updated!');
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
        Vote_kan_data_station::destroy($id);

        return redirect('vote_kan_data_stations')->with('flash_message', 'Vote_kan_data_station deleted!');
    }

    public function show_location_A($province)
    {
        $location_A = DB::table('vote_kan_data_stations')
                        ->select('area','tambon')
                        ->groupBy('amphoe')
                        ->orderBy('amphoe', 'asc')
                        ->get();
        return $location_A;
    }
}
