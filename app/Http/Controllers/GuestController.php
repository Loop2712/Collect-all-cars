<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;
use App\county;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\Profanity;

use App\Models\Mylog;

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
        $requestData['registration'] = str_replace(" ", "", $requestData['registration']);
        // แบนคำหยาบ
        $profanitie = DB::table('profanities')
                        ->select('content')
                        ->get();

        foreach($profanitie as $p){
            $requestData['masseng'] = str_replace($p->content, "", $requestData['masseng']);
            
        }
        
        Guest::create($requestData);

        DB::table('register_cars')
              ->where('registration_number', $requestData['registration'])
              ->where('province', $requestData['county'])
              ->update(['reply_provider_id' => $requestData['provider_id']]);


        // ตรงนี้ต้องหา type ของ user ที่ register เข้ามาเพื่อทำการตอบกลับ

        $this->_pushLine($requestData);

        return view('guest.thx_guest')->with('flash_message', 'Guest added!');
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

    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    protected function _pushLine($data)
    {
        $provider_id = $data['provider_id'];
        $registration = $data['registration'];
        $county = $data['county'];
        $phone = $data['phone'];
        $massengbox = $data['massengbox'];

        if (!empty($data['masseng'])) {
            $masseng_old = $data['masseng'];


        }else if (empty($data['masseng'])) {
            $masseng_old = "รบกวนมาที่รถด้วยค่ะ";
        }
        
        // if($data['massengbox'] == "1"){
        //     $masseng = "กรุณามาเลื่อนรถด้วย ครับ/ค่ะ";
        // }
        // if($data['massengbox'] == "2"){
        //     $masseng = "รบกวนมาเลื่อนรถด้วย!!";
        // }

        switch($massengbox)
        {
            case "1":  
                $masseng = "กรุณาเลื่อนรถด้วยค่ะ";
                break;
            case "2":  
                $masseng = "รถคุณเปิดไฟค้างไว้ค่ะ";
                break;
            case "3":  
                $masseng = "มีเด็กอยู่ในรถค่ะ";
                break;
            case "4":  
                $masseng = "รถคุณเกิดอุบัติเหตุค่ะ";
                break;
            case "5":  
                $masseng = "แจ้งปัญหาการขับขี่";
                break;
            case "6": 
                $masseng = $masseng_old;
                break;
        }
        
        

        $register_car = DB::select("SELECT * FROM register_cars WHERE registration_number = '$registration' AND province = '$county' AND active = 'Yes'");
        
        foreach($register_car as $item){

            $user_id =  $item->user_id;

            $sex = DB::table('users')
                    ->select('sex')
                    ->where('id', $user_id )
                    ->get();
            echo json_encode($sex);
            exit();

            if(!empty($item->provider_id)){

                // $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
     
                // $strUrl = "https://api.line.me/v2/bot/message/push";
                 
                // $arrHeader = array();
                // $arrHeader[] = "Content-Type: application/json";
                // $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
                 
                // $arrPostData = array();
                // $arrPostData['to'] = $item->provider_id;
                if (empty($phone)) {
                    $template_path = storage_path('../public/json/flex-move.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("ตัวอย่าง",$masseng,$string_json);
                    $string_json = str_replace("ชื่อ",$item->name,$string_json);
                    $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                    $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                    $string_json = str_replace("กรุณามาเลื่อนรถด้วยค่ะ",$masseng,$string_json);

                    $messages = [ json_decode($string_json, true) ];
                }

                if (!empty($phone)) {
                    $template_path = storage_path('../public/json/flex-move-call.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("ตัวอย่าง",$masseng,$string_json);
                    $string_json = str_replace("ชื่อ",$item->name,$string_json);
                    $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                    $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                    $string_json = str_replace("กรุณามาเลื่อนรถด้วยค่ะ",$masseng,$string_json);
                    $string_json = str_replace("เบอร์",$phone,$string_json);

                    $messages = [ json_decode($string_json, true) ];
                }
                 

                $body = [
                    "to" => $item->provider_id,
                    "messages" => $messages,
                ];

                $opts = [
                    'http' =>[
                        'method'  => 'POST',
                        'header'  => "Content-Type: application/json \r\n".
                                    'Authorization: Bearer '.$this->channel_access_token,
                        'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                        //'timeout' => 60
                    ]
                ];
                                    
                $context  = stream_context_create($opts);
                $url = "https://api.line.me/v2/bot/message/push";
                $result = file_get_contents($url, false, $context);

                //SAVE LOG
                $data = [
                    "title" => "https://api.line.me/v2/bot/message/push",
                    "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
                ];
                MyLog::create($data);
                return $result;

                // $arrPostData['messages'][0]['type'] = "text";
                // $arrPostData['messages'][0]['text'] = "รถหมายเลขทะเบียน"." ".$item->registration_number." ".$item->province." ".$masseng;
                // if(!empty($phone)){
                //     $arrPostData['messages'][1]['type'] = "text";
                //     $arrPostData['messages'][1]['text'] = "เบอร์โทรศัพท์ติดต่อกลับ"." ".$phone;
                // }
                 
                 
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL,$strUrl);
                // curl_setopt($ch, CURLOPT_HEADER, false);
                // curl_setopt($ch, CURLOPT_POST, true);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // $result = curl_exec($ch);
                // curl_close ($ch);
            }
            
        }
        
    }

    public function modal()
    {
        return view('guest.modal');
    }
}
