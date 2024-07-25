<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Maintain_notified_user;
use Illuminate\Http\Request;

class Maintain_notified_usersController extends Controller
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
            $maintain_notified_users = Maintain_notified_user::where('name', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $maintain_notified_users = Maintain_notified_user::latest()->paginate($perPage);
        }

        return view('maintain_notified_users.index', compact('maintain_notified_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('maintain_notified_users.create');
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
        
        Maintain_notified_user::create($requestData);

        return redirect('maintain_notified_users')->with('flash_message', 'Maintain_notified_user added!');
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
        $maintain_notified_user = Maintain_notified_user::findOrFail($id);

        return view('maintain_notified_users.show', compact('maintain_notified_user'));
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
        $maintain_notified_user = Maintain_notified_user::findOrFail($id);

        return view('maintain_notified_users.edit', compact('maintain_notified_user'));
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
        
        $maintain_notified_user = Maintain_notified_user::findOrFail($id);
        $maintain_notified_user->update($requestData);

        return redirect('maintain_notified_users')->with('flash_message', 'Maintain_notified_user updated!');
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
        Maintain_notified_user::destroy($id);

        return redirect('maintain_notified_users')->with('flash_message', 'Maintain_notified_user deleted!');
    }
}
