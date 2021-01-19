<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\county;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand     = $request->get('brand');
        $typecar   = $request->get('typecar');
        $year      = $request->get('year');
        $color     = $request->get('color');
        $fuel      = $request->get('fuel');  
        $location  = $request->get('location');
        $milemin   = $request->get('distancemin');
        $milemax   = $request->get('distancemax');
        $pricemax  = $request->get('pricemax');
        $pricemin  = $request->get('pricemin');
        $gear      = $request->get('gear');
        $sort      = $request->get('sort','asc');
        $datas     = $request->get('datas');
        $search    = $request->get('search');
        $perPage   = 45; 
        
        $milemin = empty($milemin) ? 0 :$milemin;
        $milemax = empty($milemax) ? 99000000 :$milemax;



        $needFilter =  !empty($brand)       || !empty($typecar)   || !empty($year)    || !empty($color)    
                    || !empty($fuel)        || !empty($location)  || !empty($gear)
                    || !empty($pricemax)    || !empty($pricemin)  || !empty($milemax) || !empty($milemin) ;     
                      
        if ($needFilter) {
            $data = CarModel::where('brand', 'like', '%' .$brand.  '%')
                ->where('type',    'lIKE', '%' .$typecar.'%')
                ->where('gear',    'like', '%' .$gear.  '%')
                ->where('year',    'like', '%' .$year. '%')
                ->where('color',   'like', '%' .$color. '%')
                ->where('location','like', '%' .$location. '%')
                ->where('fuel',    'lIKE', '%' .$fuel. '%')
                // ->whereBetween('price', [$pricemin,$pricemax])
                ->whereBetween('distance', [$milemin, $milemax])
                // ->whereBetween('price', [30, 100])
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        } else  if (!empty($search)) {
            $data =CarModel::where('brand', 'LIKE', "%$search%")
                ->orWhere('model', 'LIKE', "%$search%")
                ->orWhere('submodel', 'LIKE', "%$search%")
                ->paginate($perPage);
        } else {

            $data =CarModel::orderBy('created_at', 'asc')->paginate($perPage);
        } 
        
        $brand_array = CarModel::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
            
        $type_array = CarModel::selectRaw('type,count(type) as count')
            ->where('type', '!=',"" )
            ->groupBy('type')
            ->get();

        $year_array = CarModel::selectRaw('year,count(year) as count')
            ->where('year', '!=',"" )
            ->groupBy('year')
            ->get();

        $color_array = CarModel::selectRaw('color,count(color) as count')
            ->where('color', '!=',"" )
            ->groupBy('color')
            ->get();
   
        $gear_array = CarModel::selectRaw('gear,count(gear) as count')
            ->where('gear', '!=',"" )
            ->groupBy('gear')
            ->get();
            
        $location_array = county::selectRaw('province')
            ->where('province', '!=',"" )
            ->groupBy('province')
            ->get();
        
        $fuel_array = CarModel::selectRaw('fuel,count(fuel) as count')
            ->where('fuel', '!=',"" )
            ->groupBy('fuel')
            ->get();

        //$data = DB::table('data_cars') ->where('brand', 'like', '%'.$search.'%')->paginate(24);
        return view('car.car',compact('data','search', 'brand_array', 'type_array', 'location_array' , 'year_array', 'fuel_array', 'color_array','gear_array'));

    }


    
    public function image($id)
    {
         $data = CarModel::select('image')
         ->where('id',$id)->first();
        // $data = data_cars::findOrFail($id);
        //$data = "$id";
        // echo $data->image;
        // exit();

        $imginfo = getimagesize($data->image);
        header("Content-type: {$imginfo['mime']}");
        readfile($data->image);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CarModel::findOrFail($id);
        return view('car.car-details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $carModel)
    {
        //
    }

}
