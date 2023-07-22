<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\Problem_report;
use Illuminate\Http\Request;

class Problem_reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data_user = Auth::user();
        
        $user_id = $data_user->id;
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $problem_report = Problem_report::where('user_id', $user_id)
                ->where('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('solution', 'LIKE', "%$keyword%")
                ->orWhere('remark', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $problem_report = Problem_report::where('user_id', $user_id)
            ->latest()->paginate($perPage);
        }

        return view('problem_report.index', compact('problem_report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('problem_report.create');
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
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }
        
        Problem_report::create($requestData);

        return redirect('problem_report')->with('flash_message', 'Problem_report added!');
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
        $problem_report = Problem_report::findOrFail($id);

        return view('problem_report.show', compact('problem_report'));
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
        $problem_report = Problem_report::findOrFail($id);

        return view('problem_report.edit', compact('problem_report'));
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
        
        $problem_report = Problem_report::findOrFail($id);
        $problem_report->update($requestData);

        return redirect('problem_report')->with('flash_message', 'Problem_report updated!');
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
        Problem_report::destroy($id);

        return redirect('problem_report')->with('flash_message', 'Problem_report deleted!');
    }
}
