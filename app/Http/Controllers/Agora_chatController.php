<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Agora_chat;
use Illuminate\Http\Request;

class Agora_chatController extends Controller
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
            $agora_chat = Agora_chat::where('room_for', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('member_in_room', 'LIKE', "%$keyword%")
                ->orWhere('total_timemeet', 'LIKE', "%$keyword%")
                ->orWhere('amount_meet', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('sos_id', 'LIKE', "%$keyword%")
                ->orWhere('consult_doctor_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $agora_chat = Agora_chat::latest()->paginate($perPage);
        }

        return view('agora_chat.index', compact('agora_chat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('agora_chat.create');
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
        
        Agora_chat::create($requestData);

        return redirect('agora_chat')->with('flash_message', 'Agora_chat added!');
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
        $agora_chat = Agora_chat::findOrFail($id);

        return view('agora_chat.show', compact('agora_chat'));
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
        $agora_chat = Agora_chat::findOrFail($id);

        return view('agora_chat.edit', compact('agora_chat'));
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
        
        $agora_chat = Agora_chat::findOrFail($id);
        $agora_chat->update($requestData);

        return redirect('agora_chat')->with('flash_message', 'Agora_chat updated!');
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
        Agora_chat::destroy($id);

        return redirect('agora_chat')->with('flash_message', 'Agora_chat deleted!');
    }
}
