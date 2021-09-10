<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\county;
use App\Models\Wishlist;
use App\Models\Motercycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register_car;


use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function hello_line_group($data,$group_id)
    {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
        echo "<br>";
        echo $data['groupName'] ;
        echo "<br>";
        echo $data['groupId'] ;
        // exit();

        $template_path = storage_path('../public/json/hello_group_line.json');   
        $string_json = file_get_contents($template_path);
        $string_json = str_replace("ตัวอย่าง","สวัสดีค่ะ",$string_json);
        $string_json = str_replace("GROUP",$data['groupName'],$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $group_id,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        $data = [
            "title" => "Hello Line Group",
            "content" => "Hello Line Group",
        ];

        MyLog::create($data);
        return $result;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
            ]
        ];

        $group_id = "C1334c5e39e4b5b5abdb9e2cdde9201ef";

        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/group/".$group_id."/summary";
        $result = file_get_contents($url, false, $context);

        $data_group_line = json_decode($result);

        $save_name_group = [
            "groupId" => $data_group_line->groupId,
            "groupName" => $data_group_line->groupName,
            "pictureUrl" => $data_group_line->pictureUrl,
        ];
        
        $this->hello_line_group($save_name_group , $group_id);

        // Group_line::create($save_name_group);

        // $data = [
        //     "title" => "บันทึก Name Group Line",
        //     "content" => $data_group_line->groupName,
        // ];
        // MyLog::create($data);  

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
