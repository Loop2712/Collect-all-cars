<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Motercycle;
use Illuminate\Http\Request;

class MotercyclesController extends Controller
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
            $motercycles = Motercycle::where('motorcycles_id', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->orWhere('model', 'LIKE', "%$keyword%")
                ->orWhere('submodel', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('gear', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('motor', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('img', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->where('active' ,'=', 'yes')
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        } else {
            $motercycles = Motercycle::latest()->paginate($perPage);
        }

        return view('motercycles.car', compact('motercycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('motercycles.create');
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
        
        Motercycle::create($requestData);

        return redirect('motercycles')->with('flash_message', 'Motercycle added!');
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
        $motercycle = Motercycle::findOrFail($id);

        return view('motercycles.show', compact('motercycle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */


}
