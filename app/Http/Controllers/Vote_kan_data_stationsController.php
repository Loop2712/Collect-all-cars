<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Vote_kan_data_station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function show_area($amphoe)
    {
        $data_area = DB::table('vote_kan_data_stations')
                        ->select('area')
                        ->where('amphoe',$amphoe)
                        ->where('not_registered','!=',null)
                        ->groupBy('area')
                        ->get();

        return $data_area;
    }

    public function show_tambon($amphoe,$area)
    {
        $data_tambon = DB::table('vote_kan_data_stations')
                        ->select('tambon')
                        ->where('amphoe',$amphoe)
                        ->where('area',$area)
                        ->where('not_registered','!=',null)
                        ->get();

        return $data_tambon;
    }

    public function show_polling_station_at($amphoe,$area,$tambon)
    {
        $data_polling_station_at = DB::table('vote_kan_data_stations')
                        ->select('not_registered')
                        ->where('amphoe',$amphoe)
                        ->where('area',$area)
                        ->where('tambon',$tambon)
                        ->where('not_registered','!=',null)
                        ->get();

        return $data_polling_station_at;
    }

    public function vote_kan_login(Request $request , $user_from)
    {
        if(Auth::check()){

            $data_user = Auth::user();

            if ( !empty($data_user->user_from) ){

                $check_user_from = explode(",",$data_user->user_from);

                if ( in_array( $user_from , $check_user_from ) ){
                    $update_user_from = $data_user->user_from ;
                }else{
                    $update_user_from = $data_user->user_from .','. $user_from ;
                }

            }else{
                $update_user_from = $user_from ;
            }

            DB::table('users')
                ->where([ 
                        ['type', 'line'],
                        ['provider_id', $data_user->provider_id],
                    ])
                ->update(['user_from' => $update_user_from]);

            return redirect('sos_map/create');
        }else{
            return redirect('login/line/'.$user_from.'?redirectTo=vote_kan_stations/create');
        }
    }

    public function not_registered(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 150;

        if (!empty($keyword)) {
            $vote_kan_data_not_registered = Vote_kan_data_station::where('amphoe', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('tambon', 'LIKE', "%$keyword%")
                ->orWhere('polling_station_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_data_not_registered = Vote_kan_data_station::where('not_registered', '!=' , null)->latest()->paginate($perPage);
        }

        return view('vote_kan_data_stations.vote_kan_stations_not_registered', compact('vote_kan_data_not_registered'));
    }
}
