<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\county;
use App\Models\Wishlist;
use App\Models\Motercycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register_car;

use App\Models\Time_zone;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data_users = DB::table('users')
                ->where('provider_id', "U912994894c449f2237f73f18b5703e89")
                ->where('status', "active")
                ->get();

            foreach ($data_users as $data_user) {
                $user_language = $data_user->language ;
                echo $user_language ;
            }
            
            $text_topic = DB::table('text_topics')
                ->select('th')
                ->where($user_language, "อื่นๆ")
                ->get();

            foreach ($text_topic as $item) {
                $text_th = $item->th ;
                echo $text_th ;
            }

            echo "<pre>";
            print_r($text_topic);
            echo "<pre>";
            exit();

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
        $q         = $request->get('q');
        $yearmax   = $request->get('yearmax');
        $yearmin   = $request->get('yearmin');
        $model     = $request->get('model');
        $product_id  = $request->get('product_id');
        $perPage   = 44; 
        
        $milemin = empty($milemin) ? 0 :$milemin;
        $milemax = empty($milemax) ? 99000000 :$milemax;
        $pricemin = empty($pricemin) ? 0 :$pricemin;
        $pricemax = empty($pricemax) ? 99000000 :$pricemax;
        $yearmin = empty($yearmin) ? 1998 :$yearmin;
        $yearmax = empty($yearmax) ? 2021 :$yearmax;



        $needFilter =  !empty($brand)       || !empty($typecar)   || !empty($year)    || !empty($color)    
                    || !empty($fuel)        || !empty($location)  || !empty($gear)
                    || !empty($pricemax)    || !empty($pricemin)  || !empty($milemax) || !empty($milemin) 
                    || !empty($yearmin)     || !empty($yearmax)   || !empty($model)   || !empty($product_id)
                    || !empty($q);          
        
        // $q         = !empty($q) ;
                      
        if ($needFilter) {
            $data = CarModel::where('brand', 'LIKE', '%' .$brand.  '%')
                ->where('model',    'LIKE', '%' .$model.'%')
                ->where('type',    'LIKE', '%' .$typecar.'%')
                ->where('gear',    'LIKE', '%' .$gear.  '%')
                ->where('year',    'LIKE', '%' .$year. '%')
                ->where('color',   'LIKE', '%' .$color. '%')
                ->where('location','LIKE', '%' .$location. '%')
                ->where('fuel',    'LIKE', '%' .$fuel. '%')
                ->whereBetween('price', [$pricemin,$pricemax])
                ->whereBetween('year', [$yearmin,$yearmax])
                ->whereBetween('distance', [$milemin, $milemax])
                // ->where(function($q) {
                //     $q->where('brand',     'LIKE', '%' .$q.  '%')
                //     ->orWhere('model',     'LIKE', '%' .$q.  '%')
                //     ->orWhere('submodel',  'LIKE', '%' .$q.  '%')
                // })
                // ->whereBetween('price', [30, 100])
                ->where('active' ,'=', 'yes')
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        } 
        // else  if ($q) {
        //     $data = CarModel::where('active' , '=',    'yes')
        //         ->orwhere('brand',     'LIKE', '%' .$q.  '%')
        //         ->orWhere('model',     'LIKE', '%' .$q.  '%')
        //         ->orWhere('submodel',  'LIKE', '%' .$q.  '%')
        //         ->orderBy('created_at', 'asc')
        //         ->latest()->paginate($perPage);
        // } 
        else {

            $data = CarModel::orderBy('created_at', 'asc')
                ->where('active' ,'=', 'yes')
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        } 
        
        $brand_array = CarModel::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->orderBy('brand', 'asc')
            ->get();
            
        $type_array = CarModel::selectRaw('type,count(type) as count')
            ->where('type', '!=',"" )
            ->groupBy('type')
            ->orderBy('type', 'asc')
            ->get();

        $year_array = CarModel::selectRaw('year,count(year) as count')
            ->where('year', '!=',"" )
            ->groupBy('year')
            ->orderBy('year', 'asc')
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
            ->orderBy('province', 'asc')
            ->get();
        
        $fuel_array = CarModel::selectRaw('fuel,count(fuel) as count')
            ->where('fuel', '!=',"" )
            ->groupBy('fuel')
            ->get();

        $model_array = CarModel::selectRaw('model,count(model) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();
        $wishlist = Wishlist::selectRaw('product_id,count(product_id) as count')
            ->where('product_id', '!=',"" )
            ->groupBy('product_id')
            ->get();

        $data_wishlist = Wishlist::where('product_id', '!=',"" )->get();
        
        //$data = DB::table('data_cars') ->where('brand', 'like', '%'.$search.'%')->paginate(24);
        return view('car.car',compact('data', 'brand_array', 'type_array', 'location_array' , 'year_array', 'fuel_array', 'color_array','model_array' ,'gear_array','wishlist' , 'data_wishlist' ));
    }

    public function main(Request $request)
    {
        $perPage=20;

        $d1=strtotime("-1 Day");
        $d2=date("Y-m-d ");
        $d3 = date("Y-m-d ", $d1);
        $data =CarModel::whereDate('created_at', $d2)
            ->orwhereDate('created_at', $d3)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
        
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

        $motorbrand = Motercycle::selectRaw('brand,count(brand) as count')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        $motorcolor = Motercycle::selectRaw('color,count(color) as count')
            ->where('color', '!=',"" )
            ->groupBy('color')
            ->get();

        $motorgear = Motercycle::selectRaw('gear,count(gear) as count')
            ->where('gear', '!=',"" )
            ->groupBy('gear')
            ->get();
        $motormodel = Motercycle::selectRaw('model,count(model) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();

        $model_array = CarModel::selectRaw('model,count(model) as count')
            ->where('model', '!=',"" )
            ->groupBy('model')
            ->get();
        //$data = DB::table('data_cars') ->where('brand', 'like', '%'.$search.'%')->paginate(24);
        return view('main.index',compact('data','motorbrand', 'motorcolor', 'motorgear','brand_array', 'type_array', 'location_array' , 'year_array', 'fuel_array', 'color_array','gear_array','model_array','motormodel'));
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

    public function show($id)
    {
        $data = CarModel::findOrFail($id);

        $middle_price = DB::table('middle_price_cars')
                        ->where('brand',    'LIKE', '%' .$data['brand'].'%')
                        ->where('model',    'LIKE', '%' .$data['model'].'%')
                        ->get();
        
        return view('car.car-details', compact('data' , 'middle_price'));
    }

}
