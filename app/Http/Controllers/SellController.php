<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\county;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
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
            $sell = Sell::where('price', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('submodel', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('motor', 'LIKE', "%$keyword%")
                ->orWhere('gear', 'LIKE', "%$keyword%")
                ->orWhere('seats', 'LIKE', "%$keyword%")
                ->orWhere('distance', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('fuel', 'LIKE', "%$keyword%")
                ->where('user_id', Auth::id() )
                ->where('user_id','!=','')
                ->latest()->paginate($perPage);
        } else {
            // 
            $sell = Sell::where('user_id', Auth::id() )
            ->where('active' ,'=', 'yes')->latest()->paginate($perPage);
        }

        return view('carsell.index', compact('sell'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $car_brand = CarModel::selectRaw('brand,count(brand) as count')
        //     ->orderByRaw('count DESC')
        //     ->where('brand', '!=',"" )
        //     ->groupBy('brand')
        //     ->limit(10)
        //     ->get();

        $year_array = Sell::selectRaw('year,count(year) as count')
            ->where('year', '!=',"" )
            ->groupBy('year')
            ->get();

        $color_array = Sell::selectRaw('color,count(color) as count')
            ->where('color', '!=',"" )
            ->groupBy('color')
            ->get();
   
        $gear_array = Sell::selectRaw('gear,count(gear) as count')
            ->where('gear', '!=',"" )
            ->groupBy('gear')
            ->get();
            
        $location_array = county::selectRaw('province')
            ->where('province', '!=',"" )
            ->groupBy('province')
            ->get();
        
        $fuel_array = Sell::selectRaw('fuel,count(fuel) as count')
            ->where('fuel', '!=',"" )
            ->groupBy('fuel')
            ->get();
        // $location_array = county::selectRaw('province')
        //     ->where('province', '!=',"" )
        //     ->groupBy('province')
        //     ->get();

            $user = Auth::user();

        return view('carsell.create', compact('gear_array','year_array','color_array','location_array','fuel_array'));
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

        Sell::create($requestData);

        return redirect('sell')->with('flash_message', 'Sell added!');
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
        $sell = Sell::findOrFail($id);
        

        return view('carsell.show', compact('sell'));
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
     

        
        $year_array = Sell::selectRaw('year,count(year) as count')
            ->where('year', '!=',"" )
            ->groupBy('year')
            ->get();

        $color_array = Sell::selectRaw('color,count(color) as count')
            ->where('color', '!=',"" )
            ->groupBy('color')
            ->get();
   
        $gear_array = Sell::selectRaw('gear,count(gear) as count')
            ->where('gear', '!=',"" )
            ->groupBy('gear')
            ->get();
            
        $location_array = county::selectRaw('province')
            ->where('province', '!=',"" )
            ->groupBy('province')
            ->get();
        
        $fuel_array = Sell::selectRaw('fuel,count(fuel) as count')
            ->where('fuel', '!=',"" )
            ->groupBy('fuel')
            ->get();

        $sell = Sell::findOrFail($id);

        return view('carsell.edit', compact('sell','gear_array','year_array','color_array','location_array','fuel_array'));
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
        
        $sell = Sell::findOrFail($id);
        $sell->update($requestData);

        return redirect('sell')->with('flash_message', 'Sell updated!');
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
        Sell::destroy($id);

        return redirect('sell')->with('flash_message', 'Sell deleted!');
    }
}
