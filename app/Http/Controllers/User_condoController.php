<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\User_condo;
use Illuminate\Http\Request;

class User_condoController extends Controller
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
            $user_condo = User_condo::where('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('name_condo', 'LIKE', "%$keyword%")
                ->orWhere('building', 'LIKE', "%$keyword%")
                ->orWhere('floor', 'LIKE', "%$keyword%")
                ->orWhere('room_number', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_language', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('condo_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user_condo = User_condo::latest()->paginate($perPage);
        }

        return view('user_condo.index', compact('user_condo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user_condo.create');
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
        
        User_condo::create($requestData);

        return redirect('user_condo')->with('flash_message', 'User_condo added!');
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
        $user_condo = User_condo::findOrFail($id);

        return view('user_condo.show', compact('user_condo'));
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
        $user_condo = User_condo::findOrFail($id);

        return view('user_condo.edit', compact('user_condo'));
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
        
        $user_condo = User_condo::findOrFail($id);
        $user_condo->update($requestData);

        return redirect('user_condo')->with('flash_message', 'User_condo updated!');
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
        User_condo::destroy($id);

        return redirect('user_condo')->with('flash_message', 'User_condo deleted!');
    }
}
