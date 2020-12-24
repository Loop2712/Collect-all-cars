<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand  = $request->get('brand');
        $typecar= $request->get('typecar');
        $year   = $request->get('year');
        $color  = $request->get('color');
    //    $petrol = $request->get('petrol');  น้ำมัน
        $location=$request->get('location');
        // $milemax   = $request->get('milemax');
        // $milemin   = $request->get('milemin');
        // $pricemax  = $request->get('pricemax');
        // $pricemin  = $request->get('pricemin');
        $gear   = $request->get('gear');
        $sort = $request->get('sort','asc');
        $datas = $request->get('datas');


        $search = $request->get('search');
        if (!empty($search)) {
                        $data =DB::table('data_cars')->where('brand', 'LIKE', "%$search%")
                            ->orWhere('model', 'LIKE', "%$search%")
                            ->orWhere('submodel', 'LIKE', "%$search%")
                            ->paginate(10);
                    } else {

                        $data =DB::table('data_cars')->paginate(10);
                    }
        




        $needFilter =  !empty($brand)      || !empty($typecar)  || !empty($year)    || !empty($color)   
                    // || !empty($pricemax) || !empty($pricemin)   || !empty($milemax) || !empty($milemin)
                    || !empty($petrol)     || !empty($location)  || !empty($gear) ;     
                      
        if ($needFilter) {
            $data = DB::table('data_cars') 
                

                ->where('brand', 'like', '%' .$brand.  '%')
                ->where('type',  'lIKE', '%' .$typecar.'%')
                ->where('year',  'like', '%' .$year. '%')
                ->where('color', 'like', '%' .$color. '%')
                //     ->where('petrol',  'lIKE', '%' .$petrol. '%')   เชื้อเพลิง
                ->where('location', 'like', '%' .$location. '%')
                ->where('gear',     'like', '%' .$gear.  '%')
                // ->where('price',    '>',        $pricemin)
                // ->where('price',    '<',        $pricemax )
                // ->where('distance', '>',        $milemin )
                // ->where('distance', '<',        $milemax )
                

           
                ->orderBy('created_at', 'asc')
                ->latest()->paginate(10);
        } else {
            $data=DB::table('data_cars')->paginate(10);
        }


        $brand_array = DB::table('data_cars')->selectRaw('brand,count(brand) as count')
            ->groupBy('brand')
            ->get();
            
        $type_array = DB::table('data_cars')->selectRaw('type,count(type) as count')
            ->groupBy('type')
            ->get();

        $year_array = DB::table('data_cars')->selectRaw('year,count(year) as count')
            ->groupBy('year')
            ->get();

        $color_array = DB::table('data_cars')->selectRaw('color,count(color) as count')
            ->groupBy('color')
            ->get();
   
        $gear_array = DB::table('data_cars')->selectRaw('gear,count(gear) as count')
            ->groupBy('gear')
            ->get();

        //$data = DB::table('data_cars') ->where('brand', 'like', '%'.$search.'%')->paginate(24);
        return view('car.index',compact('data','search', 'brand_array', 'type_array', 'year_array', 'color_array','gear_array'));

    }


    
    public function image($id)
    {
         $data = DB::table('data_cars')->select('image')
         ->where('id',$id)->get();
        // $data = data_cars::findOrFail($id);
        //$data = "$id";
        $imginfo = getimagesize($data);
        header("Content-type: {$imginfo['mime']}");
        readfile($data);

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
    public function show(CarModel $carModel)
    {
        //
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
