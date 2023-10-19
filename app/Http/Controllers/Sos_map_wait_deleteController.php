<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_map_wait_delete;
use Illuminate\Http\Request;
use Auth;

class Sos_map_wait_deleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if($user->role != "admin-partner"){
            return redirect('404');
        }else{
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $sos_map_wait_delete = Sos_map_wait_delete::where('sos_map_id', 'LIKE', "%$keyword%")
                    ->orWhere('officer_id', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $sos_map_wait_delete = Sos_map_wait_delete::latest()->paginate($perPage);
            }

            return view('sos_map_wait_delete.index', compact('sos_map_wait_delete'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_map_wait_delete.create');
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
        
        Sos_map_wait_delete::create($requestData);

        return redirect('sos_map_wait_delete')->with('flash_message', 'Sos_map_wait_delete added!');
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
        $sos_map_wait_delete = Sos_map_wait_delete::findOrFail($id);

        return view('sos_map_wait_delete.show', compact('sos_map_wait_delete'));
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
        $sos_map_wait_delete = Sos_map_wait_delete::findOrFail($id);

        return view('sos_map_wait_delete.edit', compact('sos_map_wait_delete'));
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
        
        $sos_map_wait_delete = Sos_map_wait_delete::findOrFail($id);
        $sos_map_wait_delete->update($requestData);

        return redirect('sos_map_wait_delete')->with('flash_message', 'Sos_map_wait_delete updated!');
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
        Sos_map_wait_delete::destroy($id);

        return redirect('sos_map_wait_delete')->with('flash_message', 'Sos_map_wait_delete deleted!');
    }
}
