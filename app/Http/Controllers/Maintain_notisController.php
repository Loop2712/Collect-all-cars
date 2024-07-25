<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_noti;
use Illuminate\Http\Request;

class Maintain_notisController extends Controller
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
            $maintain_notis = Maintain_noti::where('name_user', 'LIKE', "%$keyword%")
                ->orWhere('maintain_notified_user_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('partner_id', 'LIKE', "%$keyword%")
                ->orWhere('name_area', 'LIKE', "%$keyword%")
                ->orWhere('detail_location', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('detail_title', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('sub_category_id', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('priority', 'LIKE', "%$keyword%")
                ->orWhere('name_officer', 'LIKE', "%$keyword%")
                ->orWhere('officer_id', 'LIKE', "%$keyword%")
                ->orWhere('device_code', 'LIKE', "%$keyword%")
                ->orWhere('device_code_id', 'LIKE', "%$keyword%")
                ->orWhere('datetime_command', 'LIKE', "%$keyword%")
                ->orWhere('datetime_start', 'LIKE', "%$keyword%")
                ->orWhere('datetime_end', 'LIKE', "%$keyword%")
                ->orWhere('datetime_success', 'LIKE', "%$keyword%")
                ->orWhere('material', 'LIKE', "%$keyword%")
                ->orWhere('repair_costs', 'LIKE', "%$keyword%")
                ->orWhere('photo_repair_costs', 'LIKE', "%$keyword%")
                ->orWhere('remark_user', 'LIKE', "%$keyword%")
                ->orWhere('remark_officer', 'LIKE', "%$keyword%")
                ->orWhere('remark_admin', 'LIKE', "%$keyword%")
                ->orWhere('rating_maintain', 'LIKE', "%$keyword%")
                ->orWhere('rating_operation', 'LIKE', "%$keyword%")
                ->orWhere('rating_impression', 'LIKE', "%$keyword%")
                ->orWhere('rating_sum', 'LIKE', "%$keyword%")
                ->orWhere('rating_remark', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_notis = Maintain_noti::latest()->paginate($perPage);
        }

        return view('maintain_notis.index', compact('maintain_notis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_notis.create');
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
        
        Maintain_noti::create($requestData);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti added!');
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
        $maintain_noti = Maintain_noti::findOrFail($id);

        return view('maintain_notis.show', compact('maintain_noti'));
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
        $maintain_noti = Maintain_noti::findOrFail($id);

        return view('maintain_notis.edit', compact('maintain_noti'));
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
        
        $maintain_noti = Maintain_noti::findOrFail($id);
        $maintain_noti->update($requestData);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti updated!');
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
        Maintain_noti::destroy($id);

        return redirect('maintain_notis')->with('flash_message', 'Maintain_noti deleted!');
    }
}
