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

    


    // }
    // public function sosmap()
    // {
    //     $user = Auth::user();

    //     return view('sos.sosmap', compact('user'));
    // }
}
