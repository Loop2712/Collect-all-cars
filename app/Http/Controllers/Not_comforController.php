<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Models\Not_comfor;
use Illuminate\Http\Request;

class Not_comforController extends Controller
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
            $not_comfor = Not_comfor::where('provider_id', 'LIKE', "%$keyword%")
                ->orWhere('reply_provider_id', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('want_phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $not_comfor = Not_comfor::latest()->paginate($perPage);
        }

        return view('not_comfor.index', compact('not_comfor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('not_comfor.create');
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

        $register_cars = DB::table('register_cars')
                    ->select('reply_provider_id', 'phone')
                    ->where('provider_id', $requestData['provider_id'])
                    ->get();

        foreach($register_cars as $item){
            $requestData['reply_provider_id'] = $item->reply_provider_id ; 
            $requestData['phone'] = $item->phone ;
        }
        
        Not_comfor::create($requestData);

        return view('not_comfor.thx')->with('flash_message', 'Not_comfor added!');
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
        $not_comfor = Not_comfor::findOrFail($id);

        return view('not_comfor.show', compact('not_comfor'));
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
        $not_comfor = Not_comfor::findOrFail($id);

        return view('not_comfor.edit', compact('not_comfor'));
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
        
        $not_comfor = Not_comfor::findOrFail($id);
        $not_comfor->update($requestData);

        return redirect('not_comfor')->with('flash_message', 'Not_comfor updated!');
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
        Not_comfor::destroy($id);

        return redirect('not_comfor')->with('flash_message', 'Not_comfor deleted!');
    }
}
