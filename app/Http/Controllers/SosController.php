<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Sos_map;
use App\Models\So;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SosController extends Controller
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
            $sos = So::where('disaster', 'LIKE', "%$keyword%")
                ->orWhere('car_fire', 'LIKE', "%$keyword%")
                ->orWhere('life_saving', 'LIKE', "%$keyword%")
                ->orWhere('js_100', 'LIKE', "%$keyword%")
                ->orWhere('highway', 'LIKE', "%$keyword%")
                ->orWhere('tourist_police', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos = So::latest()->paginate($perPage);
        }

        return view('sos.index', compact('sos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos.create');
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
        
        So::create($requestData);

        return redirect('sos')->with('flash_message', 'So added!');
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
        $so = So::findOrFail($id);

        return view('sos.show', compact('so'));
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
        $so = So::findOrFail($id);

        return view('sos.edit', compact('so'));
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
        
        $so = So::findOrFail($id);
        $so->update($requestData);

        return redirect('sos')->with('flash_message', 'So updated!');
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
        So::destroy($id);

        return redirect('sos')->with('flash_message', 'So deleted!');
    }

    public function disaster2()
    {
        $disaster = DB::table('sos')
                ->select('disaster', 'total')
                ->where('id', 1)
                ->get();

        foreach ($disaster as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'disaster' => $key->disaster + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.disaster2');
    }

    public function car_fire()
    {
        $car_fire = DB::table('sos')
                ->select('car_fire', 'total')
                ->where('id', 1)
                ->get();

        foreach ($car_fire as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'car_fire' => $key->car_fire + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.car_fire');
    }

    public function life_saving()
    {
        $life_saving = DB::table('sos')
                ->select('life_saving', 'total')
                ->where('id', 1)
                ->get();

        foreach ($life_saving as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'life_saving' => $key->life_saving + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.life_saving');
    }

    public function js_100()
    {
        $js_100 = DB::table('sos')
                ->select('js_100', 'total')
                ->where('id', 1)
                ->get();

        foreach ($js_100 as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'js_100' => $key->js_100 + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.js_100');
    }

    public function highway()
    {
        $highway = DB::table('sos')
                ->select('highway', 'total')
                ->where('id', 1)
                ->get();

        foreach ($highway as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'highway' => $key->highway + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.highway');
    }

    public function tourist_police()
    {
        $tourist_police = DB::table('sos')
                ->select('tourist_police', 'total')
                ->where('id', 1)
                ->get();

        foreach ($tourist_police as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'tourist_police' => $key->tourist_police + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.tourist_police');
    }

    public function lawyers()
    {
        $lawyers = DB::table('sos')
                ->select('lawyers', 'total')
                ->where('id', 1)
                ->get();

        foreach ($lawyers as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'lawyers' => $key->lawyers + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.lawyers');
    }

    public function pok_tek_tung()
    {
        $pok_tek_tung = DB::table('sos')
                ->select('pok_tek_tung', 'total')
                ->where('id', 1)
                ->get();

        foreach ($pok_tek_tung as $key) {
            DB::table('sos')
              ->where('id', 1)
              ->update([
                'pok_tek_tung' => $key->pok_tek_tung + 1,
                'total' => $key->total + 1,
            ]);
        }

        return view('sos.pok_tek_tung');
    }

    public function view_sos(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $sos_all_request = Sos_map::selectRaw('count(id) as count')->get();
                    foreach ($sos_all_request as $key) {
                            $sos_all = $key->count ;
                        }
        
        $area = Sos_map::selectRaw('area')
            ->where('area', '!=', null)
            ->groupBy('area')
            ->get();

        if (!empty($keyword)) {
            $view_map = DB::table('sos_maps')
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $view_map = DB::table('sos_maps')
            ->latest()->paginate($perPage);
        }

       

        return view('admin_viicheck.sos', compact('view_map' , 'sos_all' , 'area'));
    }

    public function sos_detail_chart(Request $request)
    {

        $sos_all_request = Sos_map::selectRaw('count(id) as count')->get();
            
            foreach ($sos_all_request as $key) {
                    $sos_all = $key->count ;
                }

        $area = Sos_map::selectRaw('area')
            ->where('area', '!=', null)
            ->groupBy('area')
            ->get();


        $year = $request->get('year');
        $month = $request->get('month');
        $request_area = $request->get('area');

        if ($year != "" and $month != "" and $request_area != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "" and $request_area != "") {

            $total_select = Sos_map::whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereYear('created_at', $year)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "" and $month != "" ) {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($month != "" and $request_area != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($year != "") {

            $total_select = Sos_map::whereYear('created_at', $year)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereYear('created_at', $year)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($month != "") {

            $total_select = Sos_map::whereMonth('created_at', $month)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereMonth('created_at', $month)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else if ($request_area != "") {

            $total_select = Sos_map::where('area', $request_area)
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->where('area', $request_area)
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        } else {

            $total_select = Sos_map::selectRaw('count(id) as count')
                    ->get();
                foreach ($total_select as $key) {
                    $total = $key->count ;
                }

            $sos_00 = Sos_map::whereTime('created_at', '>=', '00:00:00')
                    ->whereTime('created_at', '<=', '00:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_00 as $key) {
                    $sos_time_00 = $key->count ;
                }

            $sos_01 = Sos_map::whereTime('created_at', '>=', '01:00:00')
                    ->whereTime('created_at', '<=', '01:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_01 as $key) {
                    $sos_time_01 = $key->count ;
                }

            $sos_02 = Sos_map::whereTime('created_at', '>=', '02:00:00')
                    ->whereTime('created_at', '<=', '02:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_02 as $key) {
                    $sos_time_02 = $key->count ;
                }

            $sos_03 = Sos_map::whereTime('created_at', '>=', '03:00:00')
                    ->whereTime('created_at', '<=', '03:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_03 as $key) {
                    $sos_time_03 = $key->count ;
                }

            $sos_04 = Sos_map::whereTime('created_at', '>=', '04:00:00')
                    ->whereTime('created_at', '<=', '04:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_04 as $key) {
                    $sos_time_04 = $key->count ;
                }

            $sos_05 = Sos_map::whereTime('created_at', '>=', '05:00:00')
                    ->whereTime('created_at', '<=', '05:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_05 as $key) {
                    $sos_time_05 = $key->count ;
                }

            $sos_06 = Sos_map::whereTime('created_at', '>=', '06:00:00')
                    ->whereTime('created_at', '<=', '06:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_06 as $key) {
                    $sos_time_06 = $key->count ;
                }

            $sos_07 = Sos_map::whereTime('created_at', '>=', '07:00:00')
                    ->whereTime('created_at', '<=', '07:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_07 as $key) {
                    $sos_time_07 = $key->count ;
                }

            $sos_08 = Sos_map::whereTime('created_at', '>=', '08:00:00')
                    ->whereTime('created_at', '<=', '08:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_08 as $key) {
                    $sos_time_08 = $key->count ;
                }

            $sos_09 = Sos_map::whereTime('created_at', '>=', '09:00:00')
                    ->whereTime('created_at', '<=', '09:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_09 as $key) {
                    $sos_time_09 = $key->count ;
                }

            $sos_10 = Sos_map::whereTime('created_at', '>=', '10:00:00')
                    ->whereTime('created_at', '<=', '10:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_10 as $key) {
                    $sos_time_10 = $key->count ;
                }

            $sos_11 = Sos_map::whereTime('created_at', '>=', '11:00:00')
                    ->whereTime('created_at', '<=', '11:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_11 as $key) {
                    $sos_time_11 = $key->count ;
                }

            $sos_12 = Sos_map::whereTime('created_at', '>=', '12:00:00')
                    ->whereTime('created_at', '<=', '12:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_12 as $key) {
                    $sos_time_12 = $key->count ;
                }

            $sos_13 = Sos_map::whereTime('created_at', '>=', '13:00:00')
                    ->whereTime('created_at', '<=', '13:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_13 as $key) {
                    $sos_time_13 = $key->count ;
                }

            $sos_14 = Sos_map::whereTime('created_at', '>=', '14:00:00')
                    ->whereTime('created_at', '<=', '14:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_14 as $key) {
                    $sos_time_14 = $key->count ;
                }

            $sos_15 = Sos_map::whereTime('created_at', '>=', '15:00:00')
                    ->whereTime('created_at', '<=', '15:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_15 as $key) {
                    $sos_time_15 = $key->count ;
                }

            $sos_16 = Sos_map::whereTime('created_at', '>=', '16:00:00')
                    ->whereTime('created_at', '<=', '16:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_16 as $key) {
                    $sos_time_16 = $key->count ;
                }

            $sos_17 = Sos_map::whereTime('created_at', '>=', '17:00:00')
                    ->whereTime('created_at', '<=', '17:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_17 as $key) {
                    $sos_time_17 = $key->count ;
                }

            $sos_18 = Sos_map::whereTime('created_at', '>=', '18:00:00')
                    ->whereTime('created_at', '<=', '18:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_18 as $key) {
                    $sos_time_18 = $key->count ;
                }

            $sos_19 = Sos_map::whereTime('created_at', '>=', '19:00:00')
                    ->whereTime('created_at', '<=', '19:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_19 as $key) {
                    $sos_time_19 = $key->count ;
                }

            $sos_20 = Sos_map::whereTime('created_at', '>=', '20:00:00')
                    ->whereTime('created_at', '<=', '20:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_20 as $key) {
                    $sos_time_20 = $key->count ;
                }

            $sos_21 = Sos_map::whereTime('created_at', '>=', '21:00:00')
                    ->whereTime('created_at', '<=', '21:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_21 as $key) {
                    $sos_time_21 = $key->count ;
                }

            $sos_22 = Sos_map::whereTime('created_at', '>=', '22:00:00')
                    ->whereTime('created_at', '<=', '22:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_22 as $key) {
                    $sos_time_22 = $key->count ;
                }

            $sos_23 = Sos_map::whereTime('created_at', '>=', '23:00:00')
                    ->whereTime('created_at', '<=', '23:59:59')
                    ->selectRaw('count(id) as count')
                    ->get();
                foreach ($sos_23 as $key) {
                    $sos_time_23 = $key->count ;
                }
        }


        return view('admin_viicheck.sos_detail_Chart', compact('sos_all','area','sos_time_00','sos_time_01','sos_time_02','sos_time_03','sos_time_04','sos_time_05','sos_time_06','sos_time_07','sos_time_08','sos_time_09','sos_time_10','sos_time_11','sos_time_12','sos_time_13','sos_time_14','sos_time_15','sos_time_16','sos_time_17','sos_time_18','sos_time_19','sos_time_20','sos_time_21','sos_time_22','sos_time_23','total'));
    }

}
