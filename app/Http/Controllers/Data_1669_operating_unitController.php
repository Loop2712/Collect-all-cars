<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Data_1669_operating_unit;
use App\Models\Data_1669_operating_officer;
use Illuminate\Http\Request;

class Data_1669_operating_unitController extends Controller
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

        $data_user = Auth::user();
        $sub_organization = $data_user->sub_organization ;

        if ($sub_organization != "ศูนย์ใหญ่"){

            if (!empty($keyword)) {
                $data_1669_operating_unit = Data_1669_operating_unit::where('area' , $sub_organization)
                    ->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('area', 'LIKE', "%$keyword%")
                    ->orWhere('level', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $data_1669_operating_unit = Data_1669_operating_unit::where('area' , $sub_organization)->latest()->paginate($perPage);
            }

        }else{
            if (!empty($keyword)) {
                $data_1669_operating_unit = Data_1669_operating_unit::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('area', 'LIKE', "%$keyword%")
                    ->orWhere('level', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $data_1669_operating_unit = Data_1669_operating_unit::latest()->paginate($perPage);
            }
        }

        

        return view('data_1669_operating_unit.index', compact('data_1669_operating_unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data_user = Auth::user();
        $sub_organization = $data_user->sub_organization ;

        $polygon_provinces = DB::table('province_ths')
                ->where('polygon' , '!=' , null)
                ->get();

        return view('data_1669_operating_unit.create', compact('sub_organization','polygon_provinces'));
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
        
        Data_1669_operating_unit::create($requestData);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit added!');
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
        $data_user = Auth::user();
        $sub_organization = $data_user->sub_organization ;

        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);

        $data_officer = Data_1669_operating_officer::where('operating_unit_id' , $id)->get();
        $area = $data_1669_operating_unit->area ;

        if ($sub_organization != "ศูนย์ใหญ่"){

            if ($sub_organization != $area){
                return redirect('404');
            }else{
                return view('data_1669_operating_unit.show', compact('data_1669_operating_unit','data_officer'));
            }

        }else{
            return view('data_1669_operating_unit.show', compact('data_1669_operating_unit','data_officer'));
        }

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
        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);

        return view('data_1669_operating_unit.edit', compact('data_1669_operating_unit'));
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
        
        $data_1669_operating_unit = Data_1669_operating_unit::findOrFail($id);
        $data_1669_operating_unit->update($requestData);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit updated!');
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
        Data_1669_operating_unit::destroy($id);

        return redirect('data_1669_operating_unit')->with('flash_message', 'Data_1669_operating_unit deleted!');
    }
}
