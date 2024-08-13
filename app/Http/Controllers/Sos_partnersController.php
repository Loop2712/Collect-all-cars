<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_partner;
use Illuminate\Http\Request;

class Sos_partnersController extends Controller
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
            $sos_partners = Sos_partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('mail', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('color_main', 'LIKE', "%$keyword%")
                ->orWhere('color_navbar', 'LIKE', "%$keyword%")
                ->orWhere('color_body', 'LIKE', "%$keyword%")
                ->orWhere('class_color_menu', 'LIKE', "%$keyword%")
                ->orWhere('type_partner', 'LIKE', "%$keyword%")
                ->orWhere('full_name', 'LIKE', "%$keyword%")
                ->orWhere('show_homepage', 'LIKE', "%$keyword%")
                ->orWhere('secret_token', 'LIKE', "%$keyword%")
                ->orWhere('open_sos', 'LIKE', "%$keyword%")
                ->orWhere('open_repair', 'LIKE', "%$keyword%")
                ->orWhere('open_move', 'LIKE', "%$keyword%")
                ->orWhere('open_news', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_partners = Sos_partner::latest()->paginate($perPage);
        }

        return view('sos_partners.index', compact('sos_partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sos_partners.create');
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
        
        Sos_partner::create($requestData);

        return redirect('sos_partners')->with('flash_message', 'Sos_partner added!');
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
        $sos_partner = Sos_partner::findOrFail($id);

        return view('sos_partners.show', compact('sos_partner'));
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
        $sos_partner = Sos_partner::findOrFail($id);

        return view('sos_partners.edit', compact('sos_partner'));
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
        
        $sos_partner = Sos_partner::findOrFail($id);
        $sos_partner->update($requestData);

        return redirect('sos_partners')->with('flash_message', 'Sos_partner updated!');
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
        Sos_partner::destroy($id);

        return redirect('sos_partners')->with('flash_message', 'Sos_partner deleted!');
    }
}
