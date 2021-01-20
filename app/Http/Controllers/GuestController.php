<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;
use App\county;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
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
            $guest = Guest::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('masseng', 'LIKE', "%$keyword%")
                ->orWhere('massengbox', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('provider_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $guest = Guest::latest()->paginate($perPage);
        }

        return view('guest.index', compact('guest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $location_array = county::selectRaw('province')
            ->groupBy('province')
            ->get();

        return view('guest.create', compact('location_array'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        Guest::create($requestData);

        $this->_pushLine($requestData);

        return redirect('guest.thx_guest')->with('flash_message', 'Guest added!');
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
        $guest = Guest::findOrFail($id);

        return view('guest.show', compact('guest'));
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
        $guest = Guest::findOrFail($id);

        return view('guest.edit', compact('guest'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $guest = Guest::findOrFail($id);
        $guest->update($requestData);

        return redirect('guest')->with('flash_message', 'Guest updated!');
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
        Guest::destroy($id);

        return redirect('guest')->with('flash_message', 'Guest deleted!');
    }

    protected function _pushLine($data)
    {
        $provider_id = $data['provider_id'];
        $registration = $data['registration'];
        $county = $data['county'];
        $phone = $data['phone'];
        if($data['massengbox'] == "1"){
            $masseng = "กรุณามาเลื่อนรถด้วย ครับ/ค่ะ";
        }
        if($data['massengbox'] == "2"){
            $masseng = "รบกวนมาเลื่อนรถด้วย!!";
        }

        $register_car = DB::select("SELECT * FROM register_cars WHERE registration_number = '$registration' AND province = '$county'");
        
        foreach($register_car as $item){

            if(!empty($item->provider_id)){
                $strAccessToken = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
     
                $strUrl = "https://api.line.me/v2/bot/message/push";
                 
                $arrHeader = array();
                $arrHeader[] = "Content-Type: application/json";
                $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
                 
                $arrPostData = array();
                $arrPostData['to'] = $item->provider_id;
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = "รถหมายเลขทะเบียน"." ".$item->registration_number." ".$item->province." ".$masseng;
                if(!empty($phone)){
                    $arrPostData['messages'][1]['type'] = "text";
                    $arrPostData['messages'][1]['text'] = "เบอร์โทรศัพท์ติดต่อกลับ"." ".$phone;
                }
                 
                 
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$strUrl);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close ($ch);
            }
            
        }
        
    }
}
