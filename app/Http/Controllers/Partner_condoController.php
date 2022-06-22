<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Models\Partner_condo;
use App\Models\User_condo;
use App\User;
use Illuminate\Http\Request;

class Partner_condoController extends Controller
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
            $partner_condo = Partner_condo::where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_line_oa', 'LIKE', "%$keyword%")
                ->orWhere('link_line_oa', 'LIKE', "%$keyword%")
                ->orWhere('channel_access_token', 'LIKE', "%$keyword%")
                ->orWhere('channel_secret', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_TH', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_EN', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_zh_TW', 'LIKE', "%$keyword%")
                ->orWhere('rich_menu_zh_CN', 'LIKE', "%$keyword%")
                ->orWhere('partner_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner_condo = Partner_condo::latest()->paginate($perPage);
        }

        return view('partner_condo.index', compact('partner_condo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner_condo.create');
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
        
        Partner_condo::create($requestData);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo added!');
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
        $partner_condo = Partner_condo::findOrFail($id);

        return view('partner_condo.show', compact('partner_condo'));
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
        $partner_condo = Partner_condo::findOrFail($id);

        return view('partner_condo.edit', compact('partner_condo'));
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
        
        $partner_condo = Partner_condo::findOrFail($id);
        $partner_condo->update($requestData);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo updated!');
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
        Partner_condo::destroy($id);

        return redirect('partner_condo')->with('flash_message', 'Partner_condo deleted!');
    }

    public function select_condo(Request $request)
    {
        $requestData = $request->all();

        $all_condo = Partner_condo::get() ;

        return view('partner_condo.select_condo', compact('all_condo'));
    }

    public function data_user_of_condo(Request $request)
    {
        
        $requestData = $request->all();

        $data_user = User::where('id' , $requestData['user_id'])->get();

        $data_condos = Partner_condo::where('id' , $requestData['condo_id'])->first();
        $requestData['name_condo'] = $data_condos->name ;

        User_condo::create($requestData);

        $id_condo = $data_condos->id ;

        foreach ($data_user as $user) {
            if (empty($user->condo_id)) {
                $condo_id_all = array($id_condo) ;
            }else{
                $condo_id_all = json_decode($user->condo_id) ;
                if (in_array($id_condo , $condo_id_all)){
                    $condo_id_all = $condo_id_all ;
                }
                else{   
                    array_push($condo_id_all , $id_condo) ;
                }
            }
        }

        DB::table('users')
            ->where('id', $requestData['user_id'])
            ->update([
                'name_staff' => $requestData['name'] . " " . $requestData['last_name'],
                'phone' => $requestData['phone'],
                'language' => $requestData['rich_menu_language'],
                'condo_id' => $condo_id_all,
            ]);

        // set rich menu line
        $set_rich_menu = new Condo_LineApiController();

        $set_rich_menu->set_richmanu_language($data_user, $data_condos, $requestData['rich_menu_language']);

        return view('partner_condo.add_line_condo', compact('data_condos'));
    }
}
