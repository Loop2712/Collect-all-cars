<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Motercycle;
use App\county;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MotercleyviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $brand     = $request->get('brand');
        $type      = $request->get('type');
        $year      = $request->get('year');
        $gear      = $request->get('gear');
        $color     = $request->get('color');
        $motor     = $request->get('motor');  
        $location  = $request->get('location');
        $pricemax  = $request->get('pricemax');
        $pricemin  = $request->get('pricemin');
        $sort      = $request->get('sort','asc');
        $datas     = $request->get('datas');
        $keyword   = $request->get('search');
        $perPage   = 21;

        $pricemin = empty($pricemin) ? 0 :$pricemin;
        $pricemax = empty($pricemax) ? 99000000 :$pricemax;

        $needFilter =  !empty($brand)       || !empty($type)        || !empty($year)    || !empty($color)    
                    || !empty($motor)       || !empty($location)    || !empty($gear)
                    || !empty($pricemax)    || !empty($pricemin)  ; 

        if($needFilter){
            $data = Motercycle::Where('brand', 'LIKE', "%$brand%")
                ->Where('type',     'LIKE', "%$type%")
                ->Where('year',     'LIKE', "%$year%")
                ->Where('gear',     'LIKE', "%$gear%")
                ->Where('color',    'LIKE', "%$color%")
                ->Where('motor',    'LIKE', "%$motor%")
                ->Where('location', 'LIKE', "%$keyword%")
                ->whereBetween('price', [$pricemin,$pricemax])
                ->where('active' ,'=', 'yes')
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        }else    if (!empty($keyword)) {
            $data = Motercycle::where('active' ,'=', 'yes')
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('submodel', 'LIKE', "%$search%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $data = Motercycle::orderBy('created_at', 'asc')
                ->where('active' ,'=', 'yes')
                ->paginate($perPage);
        }

        $motorbrand = Motercycle::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        $motor = Motercycle::selectRaw('motor,count(motor) as count')
            ->where('motor', '!=',"" )
            ->groupBy('motor')
            ->get();

        $motorcolor = Motercycle::selectRaw('color,count(color) as count')
            ->where('color', '!=',"" )
            ->groupBy('color')
            ->get();

        $motorgear = Motercycle::selectRaw('gear,count(gear) as count')
            ->where('gear', '!=',"" )
            ->groupBy('gear')
            ->get();

        $motorlocation = county::selectRaw('province')
            ->where('province', '!=',"" )
            ->groupBy('province')
            ->get();

        $motormodel = Motercycle::selectRaw('model,count(brand) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();

        $motoryear = Motercycle::selectRaw('year,count(year) as count')
            ->where('year', '!=',"" )
            ->groupBy('year')
            ->get();

        $motortype = Motercycle::selectRaw('type,count(type) as count')
            ->where('type', '!=',"" )
            ->groupBy('type')
            ->get();
        

        return view('motercycle.car', compact('data','motor','motorbrand', 'motorcolor', 'motorgear', 'motorlocation','motormodel','motoryear','motortype'));
    }

    // public function main(Request $request)
    // {
    //     $perPage=45;

    //     $d1=strtotime("-1 Day");
    //     $d2=date("Y-m-d ");
    //     $d3 = date("Y-m-d ", $d1);
    //     $motor =Motercycle::whereDate('created_at', $d2)
    //         ->orwhereDate('created_at', $d3)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate($perPage);
        
    //     $motorbrand = Motercycle::selectRaw('brand,count(brand) as count')
    //         ->where('brand', '!=',"" )
    //         ->groupBy('brand')
    //         ->get();

    //     $motorcolor = Motercycle::selectRaw('color,count(color) as count')
    //         ->where('color', '!=',"" )
    //         ->groupBy('color')
    //         ->get();

    //     $motorgear = Motercycle::selectRaw('gear,count(gear) as count')
    //         ->where('gear', '!=',"" )
    //         ->groupBy('gear')
    //         ->get();

    //     //$data = DB::table('data_cars') ->where('brand', 'like', '%'.$search.'%')->paginate(24);
    //     return view('main.index',compact('motor','motorbrand', 'motorcolor', 'motorgear'));
    // }
    // public function image($id)
    // {
        
        
    //     $data = Motercycle::select('img')
    //      ->where('id',$id)->first();
    //     // $data = data_cars::findOrFail($id);
    //     //$data = "$id";
    //     echo $data->img;
    //     exit();

    //     // $imginfo = getimagesize($data->img);
    //     // header("Content-type: {$imginfo['mime']}");
    //     // readfile($data->img);

    // }
    public function show($id)
    {
        $data = Motercycle::findOrFail($id);

        $middle_price = DB::table('middle_price_cars')
                        ->where('brand',    'LIKE', '%' .$data['brand'].'%')
                        ->where('model',    'LIKE', '%' .$data['model'].'%')
                        ->get();
        
        return view('motercycle.car-details', compact('data', 'middle_price'));
    }

}
