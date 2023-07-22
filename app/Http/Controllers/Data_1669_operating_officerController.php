<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Models\Data_1669_operating_officer;
use Illuminate\Http\Request;
use App\User;

class Data_1669_operating_officerController extends Controller
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
            $data_1669_operating_officer = Data_1669_operating_officer::where('name', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('operating_unit_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data_1669_operating_officer = Data_1669_operating_officer::latest()->paginate($perPage);
        }

        return view('data_1669_operating_officer.index', compact('data_1669_operating_officer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data_1669_operating_officer.create');
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

        $data_old_officer = Data_1669_operating_officer::where('user_id' , $requestData['user_id'])->first();

        if( !empty($data_old_officer) ){

            // ลบข้อมูลเก่าและสร้างใหม่
            Data_1669_operating_officer::where('user_id' , $requestData['user_id'])->delete();
            Data_1669_operating_officer::create($requestData);
        }else{
            // สร้างข้อมูลเจ้าหน้าที่หน่วยปฏิบัติการใหม่
            Data_1669_operating_officer::create($requestData);

        }
        

        $data_user_officer = User::where('id' , $requestData['user_id'])->first();

        if (!empty($data_user_officer->role)){

            DB::table('users')
                ->where([ 
                        ['id', $requestData['user_id']],
                    ])
                ->update([
                        'organization' => "สพฉ",
                        'sub_organization' => $requestData['name_area'],
                    ]);

        }else{

            DB::table('users')
                ->where([ 
                        ['id', $requestData['user_id']],
                    ])
                ->update([
                        'role' => "partner",
                        'organization' => "สพฉ",
                        'sub_organization' => $requestData['name_area'],
                    ]);

        }

        return view('return_line');
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
        $data_1669_operating_officer = Data_1669_operating_officer::findOrFail($id);

        return view('data_1669_operating_officer.show', compact('data_1669_operating_officer'));
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
        $data_1669_operating_officer = Data_1669_operating_officer::findOrFail($id);

        return view('data_1669_operating_officer.edit', compact('data_1669_operating_officer'));
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
        
        $data_1669_operating_officer = Data_1669_operating_officer::findOrFail($id);
        $data_1669_operating_officer->update($requestData);

        return redirect('data_1669_operating_officer')->with('flash_message', 'Data_1669_operating_officer updated!');
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
        Data_1669_operating_officer::destroy($id);

        return redirect('data_1669_operating_officer')->with('flash_message', 'Data_1669_operating_officer deleted!');
    }
}
