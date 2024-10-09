<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Sos_partner_officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sos_partner_officersController extends Controller
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
            $sos_partner_officers = Sos_partner_officer::where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->orWhere('sos_partner_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('status_officer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sos_partner_officers = Sos_partner_officer::latest()->paginate($perPage);
        }

        return view('sos_partner_officers.index', compact('sos_partner_officers'));
    }

    // public function create()
    // {
    //     return view('sos_partner_officers.create');
    // }

    public function show($id)
    {
        $sos_partner_officer = Sos_partner_officer::findOrFail($id);

        return view('sos_partner_officers.show', compact('sos_partner_officer'));
    }


    public function edit($id)
    {
        $sos_partner_officer = Sos_partner_officer::findOrFail($id);

        return view('sos_partner_officers.edit', compact('sos_partner_officer'));
    }

    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $sos_partner_officer = Sos_partner_officer::findOrFail($id);
        $sos_partner_officer->update($requestData);

        return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer updated!');
    }

    public function destroy($id)
    {
        Sos_partner_officer::destroy($id);

        return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer deleted!');
    }


    function add_new_officers_sos(Request $request){

        $sos_partner_id = $request->get('sos_partner_id');

        if(Auth::check()){
            return redirect('register_new_officer_sos/?sos_partner_id='.$sos_partner_id);
        }else{
            return redirect('/login/line?redirectTo=register_new_officer_sos/?sos_partner_id='.$sos_partner_id);
        }

    }

    function register_new_officer_sos(Request $request){

        $sos_partner_id = $request->get('sos_partner_id');

        $data_user = Auth::user();
        $user_id = $data_user->id ;


        return view('sos_partner_officers.create', compact('sos_partner_id','user_id'));
    }

    public function store(Request $request)
    {

        $requestData = $request->all();

        Sos_partner_officer::create($requestData);

        // return redirect('sos_partner_officers')->with('flash_message', 'Sos_partner_officer added!');
        return view('return_line');
    }

    function register_new_officer_qr_code(Request $request){
        return view('sos_partner_officers.qr_code_sos_partner_officer' );
    }
}
