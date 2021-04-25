<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Middle_price_car;
use Illuminate\Http\Request;

class Middle_price_carController extends Controller
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
            $middle_price_car = Middle_price_car::where('brand', 'LIKE', "%$keyword%")
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('submodel', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $middle_price_car = Middle_price_car::latest()->paginate($perPage);
        }

        return view('middle_price_car.index', compact('middle_price_car'));
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
