<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\DP_tu_student;
use Illuminate\Http\Request;

class DP_tu_studentController extends Controller
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
            $dp_tu_student = DP_tu_student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('faculty', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('student_id', 'LIKE', "%$keyword%")
                ->orWhere('status_line', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dp_tu_student = DP_tu_student::latest()->paginate($perPage);
        }

        return view('d-p_tu_student.index', compact('dp_tu_student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('d-p_tu_student.create');
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
        
        DP_tu_student::create($requestData);

        return redirect('d-p_tu_student')->with('flash_message', 'DP_tu_student added!');
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
        $dp_tu_student = DP_tu_student::findOrFail($id);

        return view('d-p_tu_student.show', compact('dp_tu_student'));
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
        $dp_tu_student = DP_tu_student::findOrFail($id);

        return view('d-p_tu_student.edit', compact('dp_tu_student'));
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
        
        $dp_tu_student = DP_tu_student::findOrFail($id);
        $dp_tu_student->update($requestData);

        return redirect('d-p_tu_student')->with('flash_message', 'DP_tu_student updated!');
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
        DP_tu_student::destroy($id);

        return redirect('d-p_tu_student')->with('flash_message', 'DP_tu_student deleted!');
    }
}
