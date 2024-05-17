<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Redeem_code;
use Illuminate\Http\Request;

class Redeem_codeController extends Controller
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
            $redeem_code = Redeem_code::where('redeem_code', 'LIKE', "%$keyword%")
                ->orWhere('privilege_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('time_update_status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $redeem_code = Redeem_code::latest()->paginate($perPage);
        }

        return view('redeem_code.index', compact('redeem_code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('redeem_code.create');
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
        
        Redeem_code::create($requestData);

        return redirect('redeem_code')->with('flash_message', 'Redeem_code added!');
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
        $redeem_code = Redeem_code::findOrFail($id);

        return view('redeem_code.show', compact('redeem_code'));
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
        $redeem_code = Redeem_code::findOrFail($id);

        return view('redeem_code.edit', compact('redeem_code'));
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
        
        $redeem_code = Redeem_code::findOrFail($id);
        $redeem_code->update($requestData);

        return redirect('redeem_code')->with('flash_message', 'Redeem_code updated!');
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
        Redeem_code::destroy($id);

        return redirect('redeem_code')->with('flash_message', 'Redeem_code deleted!');
    }
}
