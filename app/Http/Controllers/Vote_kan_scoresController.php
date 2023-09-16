<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote_kan_station;

use App\Models\Vote_kan_score;
use Illuminate\Http\Request;

class Vote_kan_scoresController extends Controller
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
            $vote_kan_scores = Vote_kan_score::where('vote_kan_stations_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('last', 'LIKE', "%$keyword%")
                ->orWhere('number_1', 'LIKE', "%$keyword%")
                ->orWhere('number_2', 'LIKE', "%$keyword%")
                ->orWhere('number_3', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_scores = Vote_kan_score::latest()->paginate($perPage);
        }

        return view('vote_kan_scores.index', compact('vote_kan_scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vote_kan_scores.create');
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

        $data_station = Vote_kan_station::where('user_id' , Auth::user()->id)->first();

        $requestData['vote_kan_stations_id'] = $data_station->id;
        $requestData['user_id'] = Auth::id();
        $requestData['last'] = "Yes";
        $requestData['amphoe'] = $data_station->amphoe;

        $data_scores = Vote_kan_score::where('user_id', Auth::user()->id)->get();

        foreach ($data_scores as $item) {
            $item->update(['last' => null]);
        }
        // ddd($data_scores);
        Vote_kan_score::create($requestData);

        return redirect()->back();

        // return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score added!');
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
        $vote_kan_score = Vote_kan_score::findOrFail($id);

        return view('vote_kan_scores.show', compact('vote_kan_score'));
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
        $vote_kan_score = Vote_kan_score::findOrFail($id);

        return view('vote_kan_scores.edit', compact('vote_kan_score'));
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

        $vote_kan_score = Vote_kan_score::findOrFail($id);
        $vote_kan_score->update($requestData);

        return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score updated!');
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
        Vote_kan_score::destroy($id);

        return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score deleted!');
    }

    public function show_score()
    {
        $user_id = Auth::user()->id;

        $data_score = Vote_kan_score::where('last','Yes')->get();

        $score_num_1 = 0 ;
        $score_num_2 = 0 ;

        foreach ($data_score as $item) {
            $score_num_1 = $score_num_1 + $item->number_1 ;
            $score_num_2 = $score_num_2 + $item->number_2;
        }

        // echo "score_num_1 >> " . $score_num_1;
        // echo "<br>";
        // echo "score_num_2 >> " . $score_num_2;

        return view('vote_kan_admin.vote_kan_admin', compact('score_num_1','score_num_2'));
    }
}
