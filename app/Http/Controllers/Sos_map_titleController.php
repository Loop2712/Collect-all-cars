<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_map_title;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\DB;

class Sos_map_titleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $data_partner = DB::table('partners')
            ->where('name', $user->organization)
            ->where('name_area', null)
            ->first();

        $name_partner = $data_partner->name ;

        $sos_map_title = Sos_map_title::where('name_partner', $name_partner)->get();

        $sos_map_title_by_user = Sos_map_title::where('ask_to_partner', $name_partner)->get();

        return view('sos_map_title.index', compact('sos_map_title','name_partner','sos_map_title_by_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_map_title.create');
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
        
        Sos_map_title::create($requestData);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title added!');
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
        $sos_map_title = Sos_map_title::findOrFail($id);

        return view('sos_map_title.show', compact('sos_map_title'));
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
        $sos_map_title = Sos_map_title::findOrFail($id);

        return view('sos_map_title.edit', compact('sos_map_title'));
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
        
        $sos_map_title = Sos_map_title::findOrFail($id);
        $sos_map_title->update($requestData);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title updated!');
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
        Sos_map_title::destroy($id);

        return redirect('sos_map_title')->with('flash_message', 'Sos_map_title deleted!');
    }

    public function create_new_title_sos(Request $request){
        
        $requestData = $request->all();
        
        Sos_map_title::create($requestData);

        return 'OK' ;
    }

    public function delete_title_sos(Request $request){
        
        $requestData = $request->all();

        Sos_map_title::where('title' , $requestData['title'])->where('name_partner' , $requestData['name_partner'])->delete();

        return 'Delete ' . $requestData['title'] . ' Success' ;

    }
}
