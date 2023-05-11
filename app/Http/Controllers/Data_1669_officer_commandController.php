<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Data_1669_officer_command;
use Illuminate\Http\Request;

class Data_1669_officer_commandController extends Controller
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
            $data_1669_officer_command = Data_1669_officer_command::where('name_officer_command', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('area', 'LIKE', "%$keyword%")
                ->orWhere('officer_role', 'LIKE', "%$keyword%")
                ->orWhere('number', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('creator', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data_1669_officer_command = Data_1669_officer_command::latest()->paginate($perPage);
        }

        return view('data_1669_officer_command.index', compact('data_1669_officer_command'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data_1669_officer_command.create');
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
        
        Data_1669_officer_command::create($requestData);

        return redirect('data_1669_officer_command')->with('flash_message', 'Data_1669_officer_command added!');
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
        $data_1669_officer_command = Data_1669_officer_command::findOrFail($id);

        return view('data_1669_officer_command.show', compact('data_1669_officer_command'));
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
        $data_1669_officer_command = Data_1669_officer_command::findOrFail($id);

        return view('data_1669_officer_command.edit', compact('data_1669_officer_command'));
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
        
        $data_1669_officer_command = Data_1669_officer_command::findOrFail($id);
        $data_1669_officer_command->update($requestData);

        return redirect('data_1669_officer_command')->with('flash_message', 'Data_1669_officer_command updated!');
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
        Data_1669_officer_command::destroy($id);

        return redirect('data_1669_officer_command')->with('flash_message', 'Data_1669_officer_command deleted!');
    }
}
