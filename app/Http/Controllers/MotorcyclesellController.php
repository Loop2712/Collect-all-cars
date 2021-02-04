<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Motercycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class motorcyclesellController extends Controller
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
                ->where('user_id', Auth::id() )
                ->orderBy('created_at', 'asc')
                ->latest()->paginate($perPage);
        } else {
            $motercycles = Motercycle::where('user_id', Auth::id() )
                ->where('active' ,'=', 'yes')
                ->paginate($perPage);
        }

        return view('motercyclesell.index', compact('motercycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('motercyclesell.create');
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

        return redirect('motercycles')->with('flash_message', 'motercycles added!');
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

        return view('motercyclesell.show', compact('motercycle'));
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
        $motercycle = Motercycle::findOrFail($id);

        return view('motercyclesell.edit', compact('motercycle'));
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
        
        $motercycle = Motercycle::findOrFail($id);
        $motercycle->update($requestData);

        return redirect('motercycles')->with('flash_message', 'motercycles updated!');
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
        Motercycle::destroy($id);

        return redirect('motercycles')->with('flash_message', 'motercycles deleted!');
    }
}
