<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $select_search_language = $request->get('select_search_language');

        $data_nationality = DB::table('nationalities');

        if (!empty($keyword) && !empty($select_search_language)) {

            $data_nationality->where('language', 'LIKE', "%$select_search_language%")
                ->where('country', 'LIKE', "%$keyword%")
                ->orWhere('nationality', 'LIKE', "%$keyword%")
                ->orWhere('nationality_noun', 'LIKE', "%$keyword%");

        }else if ( !empty($select_search_language) && empty($keyword) ) {

            $data_nationality->where('language', 'LIKE', "%$select_search_language%");

        }else if( !empty($keyword) && empty($select_search_language) ){

            $data_nationality->where('country', 'LIKE', "%$keyword%")
                ->orWhere('nationality', 'LIKE', "%$keyword%")
                ->orWhere('nationality_noun', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%");

        }

        $nationality = $data_nationality->latest()->get();

        $group_nationality = Nationality::where('language','!=',null)
            ->groupBy('language')
            ->orderBy('language','ASC')
            ->get();

        return view('nationality.index', compact('nationality','group_nationality','select_search_language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nationality.create');
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
        
        Nationality::create($requestData);

        return redirect('nationality')->with('flash_message', 'Nationality added!');
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
        $nationality = Nationality::findOrFail($id);

        return view('nationality.show', compact('nationality'));
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
        $nationality = Nationality::findOrFail($id);

        return view('nationality.edit', compact('nationality'));
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
        
        $nationality = Nationality::findOrFail($id);
        $nationality->update($requestData);

        return redirect('nationality')->with('flash_message', 'Nationality updated!');
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
        Nationality::destroy($id);

        return redirect('nationality')->with('flash_message', 'Nationality deleted!');
    }
}
