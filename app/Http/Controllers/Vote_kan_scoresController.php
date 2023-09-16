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
                ->get();
        } else {
            $vote_kan_scores = Vote_kan_score::get();
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

    function get_data_show_score(){

        $all_data = array();

        // เมืองกาญจนบุรี
        $data_amphoe_1 = Vote_kan_score::where('amphoe' , 'เมืองกาญจนบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_1_score_num_1 = 0 ;
        $amphoe_1_score_num_2 = 0 ;

        foreach ($data_amphoe_1 as $amphoe_1) {
            $amphoe_1_score_num_1 = $amphoe_1_score_num_1 + $amphoe_1->number_1 ;
            $amphoe_1_score_num_2 = $amphoe_1_score_num_2 + $amphoe_1->number_2;
        }

        // ท่ามะกา
        $data_amphoe_2 = Vote_kan_score::where('amphoe' , 'ท่ามะกา')
            ->where('last', 'Yes')->get();

        $amphoe_2_score_num_1 = 0 ;
        $amphoe_2_score_num_2 = 0 ;

        foreach ($data_amphoe_2 as $amphoe_2) {
            $amphoe_2_score_num_1 = $amphoe_2_score_num_1 + $amphoe_2->number_1 ;
            $amphoe_2_score_num_2 = $amphoe_2_score_num_2 + $amphoe_2->number_2;
        }

        // ทองผาภูมิ
        $data_amphoe_3 = Vote_kan_score::where('amphoe' , 'ทองผาภูมิ')
            ->where('last', 'Yes')->get();

        $amphoe_3_score_num_1 = 0 ;
        $amphoe_3_score_num_2 = 0 ;

        foreach ($data_amphoe_3 as $amphoe_3) {
            $amphoe_3_score_num_1 = $amphoe_3_score_num_1 + $amphoe_3->number_1 ;
            $amphoe_3_score_num_2 = $amphoe_3_score_num_2 + $amphoe_3->number_2;
        }

        // สังขละบุรี
        $data_amphoe_4 = Vote_kan_score::where('amphoe' , 'สังขละบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_4_score_num_1 = 0 ;
        $amphoe_4_score_num_2 = 0 ;

        foreach ($data_amphoe_4 as $amphoe_4) {
            $amphoe_4_score_num_1 = $amphoe_4_score_num_1 + $amphoe_4->number_1 ;
            $amphoe_4_score_num_2 = $amphoe_4_score_num_2 + $amphoe_4->number_2;
        }

        // พนมทวน 
        $data_amphoe_5 = Vote_kan_score::where('amphoe' , 'พนมทวน')
            ->where('last', 'Yes')->get();

        $amphoe_5_score_num_1 = 0 ;
        $amphoe_5_score_num_2 = 0 ;

        foreach ($data_amphoe_5 as $amphoe_5) {
            $amphoe_5_score_num_1 = $amphoe_5_score_num_1 + $amphoe_5->number_1 ;
            $amphoe_5_score_num_2 = $amphoe_5_score_num_2 + $amphoe_5->number_2;
        }

        // เลาขวัญ
        $data_amphoe_6 = Vote_kan_score::where('amphoe' , 'เลาขวัญ')
            ->where('last', 'Yes')->get();

        $amphoe_6_score_num_1 = 0 ;
        $amphoe_6_score_num_2 = 0 ;

        foreach ($data_amphoe_6 as $amphoe_6) {
            $amphoe_6_score_num_1 = $amphoe_6_score_num_1 + $amphoe_6->number_1 ;
            $amphoe_6_score_num_2 = $amphoe_6_score_num_2 + $amphoe_6->number_2;
        }

        // ศรีสวัสดิ์ 
        $data_amphoe_7 = Vote_kan_score::where('amphoe' , 'ศรีสวัสดิ์')
            ->where('last', 'Yes')->get();

        $amphoe_7_score_num_1 = 0 ;
        $amphoe_7_score_num_2 = 0 ;

        foreach ($data_amphoe_7 as $amphoe_7) {
            $amphoe_7_score_num_1 = $amphoe_7_score_num_1 + $amphoe_7->number_1 ;
            $amphoe_7_score_num_2 = $amphoe_7_score_num_2 + $amphoe_7->number_2;
        }

        // ด่านมะขามเตี้ย 
        $data_amphoe_8 = Vote_kan_score::where('amphoe' , 'ด่านมะขามเตี้ย')
            ->where('last', 'Yes')->get();

        $amphoe_8_score_num_1 = 0 ;
        $amphoe_8_score_num_2 = 0 ;

        foreach ($data_amphoe_8 as $amphoe_8) {
            $amphoe_8_score_num_1 = $amphoe_8_score_num_1 + $amphoe_8->number_1 ;
            $amphoe_8_score_num_2 = $amphoe_8_score_num_2 + $amphoe_8->number_2;
        }

        // หนองปรือ 
        $data_amphoe_9 = Vote_kan_score::where('amphoe' , 'หนองปรือ')
            ->where('last', 'Yes')->get();

        $amphoe_9_score_num_1 = 0 ;
        $amphoe_9_score_num_2 = 0 ;

        foreach ($data_amphoe_9 as $amphoe_9) {
            $amphoe_9_score_num_1 = $amphoe_9_score_num_1 + $amphoe_9->number_1 ;
            $amphoe_9_score_num_2 = $amphoe_9_score_num_2 + $amphoe_9->number_2;
        }

        // ห้วยกระเจา
        $data_amphoe_10 = Vote_kan_score::where('amphoe' , 'ห้วยกระเจา')
            ->where('last', 'Yes')->get();

        $amphoe_10_score_num_1 = 0 ;
        $amphoe_10_score_num_2 = 0 ;

        foreach ($data_amphoe_10 as $amphoe_10) {
            $amphoe_10_score_num_1 = $amphoe_10_score_num_1 + $amphoe_10->number_1 ;
            $amphoe_10_score_num_2 = $amphoe_10_score_num_2 + $amphoe_10->number_2;
        }

        // ท่าม่วง
        $data_amphoe_11 = Vote_kan_score::where('amphoe' , 'ท่าม่วง')
            ->where('last', 'Yes')->get();

        $amphoe_11_score_num_1 = 0 ;
        $amphoe_11_score_num_2 = 0 ;

        foreach ($data_amphoe_11 as $amphoe_11) {
            $amphoe_11_score_num_1 = $amphoe_11_score_num_1 + $amphoe_11->number_1 ;
            $amphoe_11_score_num_2 = $amphoe_11_score_num_2 + $amphoe_11->number_2;
        }

        // บ่อพลอย
        $data_amphoe_12 = Vote_kan_score::where('amphoe' , 'บ่อพลอย')
            ->where('last', 'Yes')->get();

        $amphoe_12_score_num_1 = 0 ;
        $amphoe_12_score_num_2 = 0 ;

        foreach ($data_amphoe_12 as $amphoe_12) {
            $amphoe_12_score_num_1 = $amphoe_12_score_num_1 + $amphoe_12->number_1 ;
            $amphoe_12_score_num_2 = $amphoe_12_score_num_2 + $amphoe_12->number_2;
        }

        // ไทรโยค
        $data_amphoe_13 = Vote_kan_score::where('amphoe' , 'ไทรโยค')
            ->where('last', 'Yes')->get();

        $amphoe_13_score_num_1 = 0 ;
        $amphoe_13_score_num_2 = 0 ;

        foreach ($data_amphoe_13 as $amphoe_13) {
            $amphoe_13_score_num_1 = $amphoe_13_score_num_1 + $amphoe_13->number_1 ;
            $amphoe_13_score_num_2 = $amphoe_13_score_num_2 + $amphoe_13->number_2;
        }

        $score_num_1 = [] ;
        $score_num_1['amphoe_1'] = $amphoe_1_score_num_1 ;
        $score_num_1['amphoe_2'] = $amphoe_2_score_num_1 ;
        $score_num_1['amphoe_3'] = $amphoe_3_score_num_1 ;
        $score_num_1['amphoe_4'] = $amphoe_4_score_num_1 ;
        $score_num_1['amphoe_5'] = $amphoe_5_score_num_1 ;
        $score_num_1['amphoe_6'] = $amphoe_6_score_num_1 ;
        $score_num_1['amphoe_7'] = $amphoe_7_score_num_1 ;
        $score_num_1['amphoe_8'] = $amphoe_8_score_num_1 ;
        $score_num_1['amphoe_9'] = $amphoe_9_score_num_1 ;
        $score_num_1['amphoe_10'] = $amphoe_10_score_num_1 ;
        $score_num_1['amphoe_11'] = $amphoe_11_score_num_1 ;
        $score_num_1['amphoe_12'] = $amphoe_12_score_num_1 ;
        $score_num_1['amphoe_13'] = $amphoe_13_score_num_1 ;

        $score_num_2 = [] ;
        $score_num_2['amphoe_1'] = $amphoe_1_score_num_2 ;
        $score_num_2['amphoe_2'] = $amphoe_2_score_num_2 ;
        $score_num_2['amphoe_3'] = $amphoe_3_score_num_2 ;
        $score_num_2['amphoe_4'] = $amphoe_4_score_num_2 ;
        $score_num_2['amphoe_5'] = $amphoe_5_score_num_2 ;
        $score_num_2['amphoe_6'] = $amphoe_6_score_num_2 ;
        $score_num_2['amphoe_7'] = $amphoe_7_score_num_2 ;
        $score_num_2['amphoe_8'] = $amphoe_8_score_num_2 ;
        $score_num_2['amphoe_9'] = $amphoe_9_score_num_2 ;
        $score_num_2['amphoe_10'] = $amphoe_10_score_num_2 ;
        $score_num_2['amphoe_11'] = $amphoe_11_score_num_2 ;
        $score_num_2['amphoe_12'] = $amphoe_12_score_num_2 ;
        $score_num_2['amphoe_13'] = $amphoe_13_score_num_2 ;

        $sum_num_1 = 0 ;
        $sum_num_2 = 0 ;

        for ($i_1 = 0; $i_1 < count($score_num_1); $i_1++) { 
            $sum_num_1 = $sum_num_1 + $score_num_1['amphoe_'. intval($i_1+1)];
        }

        for ($i_2 = 0; $i_2 < count($score_num_2); $i_2++) { 
            $sum_num_2 = $sum_num_2 + $score_num_2['amphoe_'. intval($i_2+1)];
        }

        $all_data['sum_num_1'] = $sum_num_1 ;
        $all_data['sum_num_2'] = $sum_num_2 ;

        $all_data['score_amphoe_num_1'] = $score_num_1 ;
        $all_data['score_amphoe_num_2'] = $score_num_2 ;

        return $all_data ; 

    }
}
