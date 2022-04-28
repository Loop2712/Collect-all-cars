<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
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
            $promotion = Promotion::where('company', 'LIKE', "%$keyword%")
                ->orWhere('titel', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "car")
                ->orWhere('time_period', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $promotion = Promotion::latest()->Where('type', 'LIKE', "car")
            ->paginate($perPage);

        }

        if (!empty($keyword)) {
            $promotion_motor = Promotion::where('company', 'LIKE', "%$keyword%")
                ->orWhere('titel', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "car")
                ->orWhere('time_period', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $promotion_motor = Promotion::latest()->Where('type', 'LIKE', "motorcycle")
            ->paginate($perPage);

        }

       
        

        return view('promotion.index', compact('promotion' ,'promotion_motor' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('promotion.create');
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        Promotion::create($requestData);

        return redirect('promotion')->with('flash_message', 'Promotion added!');
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
        $promotion = Promotion::findOrFail($id);

        return view('promotion.show', compact('promotion'));
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
        $promotion = Promotion::findOrFail($id);

        return view('promotion.edit', compact('promotion'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $promotion = Promotion::findOrFail($id);
        $promotion->update($requestData);

        return redirect('promotion')->with('flash_message', 'Promotion updated!');
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
        Promotion::destroy($id);

        return redirect('promotion')->with('flash_message', 'Promotion deleted!');
    }
}
