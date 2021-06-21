<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Middle_price_car;
use Illuminate\Http\Request;
use App\CarModel;
class Middle_price_carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $brand     = $request->get('brand');
        $model     = $request->get('model');
        $year      = $request->get('year');
        $submodel  = $request->get('submodel');
        $type      = $request->get('type');
        $perPage   = 45;



        $needFilter =  !empty($brand)       || !empty($model)        || !empty($submodel)    || !empty($year)   || !empty($type); 

        if($needFilter){
            $Middle_price_car = Middle_price_car::Where('brand', 'LIKE', "%$brand%")
                ->Where('model',     'LIKE', "%$model%")
                ->Where('year',     'LIKE', "%$year%")
                ->Where('submodel',     'LIKE', "%$submodel%")
                ->orderBy('brand', 'asc')
                ->latest()->paginate($perPage);
        }else if (!empty($keyword)) {
            $Middle_price_car = Middle_price_car::where('type', '!=',"motorcycle" )
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('submodel', 'LIKE', "%$search%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->orderBy('brand', 'asc')
                ->paginate($perPage);
        } else {
            $Middle_price_car = Middle_price_car::orderBy('brand', 'asc')->where('type', '!=',"motorcycle" )
                ->paginate($perPage);
        }

        $Middelbrand_car = Middle_price_car::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->where('type', '!=',"motorcycle" )
            ->groupBy('brand')
            ->get();

        $Middelbrand = Middle_price_car::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        $Middelmodel = Middle_price_car::selectRaw('model,count(model) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();

        $Middelsubmodel = Middle_price_car::selectRaw('submodel,count(submodel) as count')
            ->where('submodel', '!=',"" )
            ->groupBy('submodel')
            ->get();
        
            $Middelsubmodel = Middle_price_car::selectRaw('submodel,count(submodel) as count')
            ->where('submodel', '!=',"" )
            ->groupBy('submodel')
            ->get();

        return view('middle_price_car.index', compact('Middle_price_car','Middelbrand','Middelmodel','Middelsubmodel'));
        
    }

    public function index_motor(Request $request)
    {
        $brand     = $request->get('motor_brand');
        $model     = $request->get('motor_generation');
        $year      = $request->get('year');
        $submodel  = $request->get('submodel');
        $type      = $request->get('type');
        $perPage   = 44;

        $needFilter =  !empty($brand)       || !empty($model)        || !empty($submodel)    || !empty($year)   || !empty($type); 

        $Middelbrand_car = Middle_price_car::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->where('type', '!=',"motorcycle" )
            ->groupBy('brand')
            ->get();

        $Middelbrand = Middle_price_car::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        $Middelmodel = Middle_price_car::selectRaw('model,count(model) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();

        $Middelsubmodel = Middle_price_car::selectRaw('submodel,count(submodel) as count')
            ->where('submodel', '!=',"" )
            ->groupBy('submodel')
            ->get();
            
        if($needFilter){
            $middleprice_motorcycles = Middle_price_car::Where('brand', 'LIKE', "%$brand%")
                ->Where('model',     'LIKE', "%$model%")
                ->Where('year',     'LIKE', "%$year%")
                ->Where('submodel',     'LIKE', "%$submodel%")
                ->Where('type',"motorcycle")
                ->orderBy('brand', 'asc')
                ->latest()->paginate($perPage);
        }else if (!empty($keyword)) {
            $middleprice_motorcycles = DB::table('middle_price_cars')
                        ->orWhere('brand', 'LIKE', "%$keyword%")
                        ->orWhere('model',     'LIKE', "%$model%")
                        ->orWhere('year',     'LIKE', "%$year%")
                        ->orWhere('submodel',     'LIKE', "%$submodel%")
                        ->orWhere('type',"motorcycle")
                        ->orderBy('brand', 'asc')
                        ->latest()->paginate($perPage)
                        ->get();
        } else {
            $middleprice_motorcycles = DB::table('middle_price_cars')
                        ->orderBy('brand', 'asc')
                        ->Where('model',     'LIKE', "%$model%")
                        ->Where('year',     'LIKE', "%$year%")
                        ->Where('submodel',     'LIKE', "%$submodel%")
                        ->where('type', "motorcycle")
                        ->orderBy('brand', 'asc')
                        ->latest()->paginate($perPage);
        }
        
        $Middelsubmodel = Middle_price_car::selectRaw('submodel,count(submodel) as count')
            ->where('submodel', '!=',"" )
            ->groupBy('submodel')
            ->get();
            


        return view('middle_price_car.index_motor', compact('Middelbrand','Middelmodel','Middelsubmodel','middleprice_motorcycles'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('middle_price_car.create');
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
        
        Middle_price_car::create($requestData);

        return redirect('middle_price_car')->with('flash_message', 'Middle_price_car added!');
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
        $middle_price_car = Middle_price_car::findOrFail($id);

        return view('middle_price_car.show', compact('middle_price_car'));
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
        $middle_price_car = Middle_price_car::findOrFail($id);

        return view('middle_price_car.edit', compact('middle_price_car'));
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
        
        $middle_price_car = Middle_price_car::findOrFail($id);
        $middle_price_car->update($requestData);

        return redirect('middle_price_car')->with('flash_message', 'Middle_price_car updated!');
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
        Middle_price_car::destroy($id);

        return redirect('middle_price_car')->with('flash_message', 'Middle_price_car deleted!');
    }
}
