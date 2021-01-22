<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarModel;
use App\county;
use App\Models\Register_car;
use Illuminate\Http\Request;

class Register_carController extends Controller
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
            $register_car = Register_car::where('brand', 'LIKE', "%$keyword%")
                ->orWhere('generation', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $register_car = Register_car::latest()->paginate($perPage);
        }

        return view('register_car.index', compact('register_car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $location_array = county::selectRaw('province')
            ->groupBy('province')
            ->get();

        $car_brand = CarModel::selectRaw('brand')
            ->groupBy('brand')
            ->get();

        // $car_model = CarModel::selectRaw('brand')
        //     ->where('brand', $car_brand)
        //     ->groupBy('brand')
        //     ->get();

        return view('register_car.create', compact('location_array', 'car_brand'));
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
        // update registration_number
        $requestData['registration_number'] = str_replace(" ", "", $requestData['registration_number']);
        Register_car::create($requestData);

        return view('register_car.select_get')->with('flash_message', 'Register_car added!');
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
        $register_car = Register_car::findOrFail($id);

        return view('register_car.show', compact('register_car'));
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
        $register_car = Register_car::findOrFail($id);

        return view('register_car.edit', compact('register_car'));
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
        
        $register_car = Register_car::findOrFail($id);
        $register_car->update($requestData);

        return redirect('register_car')->with('flash_message', 'Register_car updated!');
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
        Register_car::destroy($id);

        return redirect('register_car')->with('flash_message', 'Register_car deleted!');
    }

    public function welcome_line()
    {
        return view('register_car.welcome_line');
    }

}
