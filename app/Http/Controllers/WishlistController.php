<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarModel;
use App\Models\Motercycle;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
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
        $wishlist = Wishlist::where('user_id', Auth::id() )
            ->latest()->get();

        // $cars = DB::table('wishlists')
        //     ->join('data_cars', 'wishlists.product_id', '=', 'data_cars.id')
        //     ->select('wishlists.*', 'data_cars.id','data_cars.brand','data_cars.model','data_cars.submodel','data_cars.year','data_cars.price','data_cars.location')
        //     ->latest()
        //     ->get();

        // $motorcycles = DB::table('wishlists')
        //     ->join('motorcycles_datas', 'wishlists.producmoter_id', '=', 'motorcycles_datas.id')
        //     ->select('wishlists.*','motorcycles_datas.id','motorcycles_datas.brand','motorcycles_datas.model','motorcycles_datas.submodel','motorcycles_datas.price','motorcycles_datas.location')
        //     ->where('wishlists.user_id', Auth::id() )
        //     ->latest()
        //     ->get();



        // $wishlist = DB::table('wishlists')
        // ->join('data_cars', function($join)
        // {
        //     $join->on('wishlists.product_id', '=', 'data_cars.id')
        //          ->where('wishlists.car_type', '=', 'car');
        // })
        // ->join('motorcycles_datas', function($join)
        // {
        //     $join->on('wishlists.producmoter_id', '=', 'motorcycles_datas.id')
        //          ->where('wishlists.car_type', '=', 'motorcycle');
        // })
        // ->get();


        // $wishlist = DB::table('wishlists')
        //     ->join('data_cars', 'wishlists.product_id', '=', 'data_cars.id')
        //     ->join('motorcycles_datas', 'wishlists.producmoter_id', '=', 'motorcycles_datas.id')
        //     ->select('wishlists.*', 'data_cars.id as carid','data_cars.brand as carbrand','data_cars.model as carmodel','data_cars.submodel as carsubmodel','data_cars.price as carprice','data_cars.location as caelo')
        //     ->latest()
        //     ->get();

        // $wishlist = DB::table('wishlists')
        //     ->leftJoin('data_cars', 'wishlists.product_id', '=', 'data_cars.id')
        //     ->leftJoin('motorcycles_datas', 'wishlists.producmoter_id', '=', 'motorcycles_datas.id')
        //     // ->select('wishlists.*','data_cars.*','motorcycles_datas.*')
        //     ->get();

        return view('wishlist.index',compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('wishlist.create');
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
        $requestData['user_id'] = Auth::id();
        
        Wishlist::create($requestData);

        return redirect('wishlist')->with('flash_message', 'car added!');
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
        $wishlist = Wishlist::findOrFail($id);

        return view('wishlist.show', compact('wishlist'));
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
        
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->update($requestData);

        return redirect('wishlist')->with('flash_message', 'wishlist updated!');
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
        Wishlist::destroy($id);

        return redirect('wishlist')->with('flash_message', 'Wishlist deleted!');
    }
}
