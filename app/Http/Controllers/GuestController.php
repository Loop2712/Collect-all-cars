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
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

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
        $perPage = 20;

        // $guest = Guest::latest()->paginate($perPage);
        
        // $guest = Guest::selectRaw('count(user_id) as count , name')
        //                 ->orderByRaw('count DESC')
        //                 ->groupBy('name')
        //                 ->latest()->paginate($perPage);

        $guest = Guest::groupBy('provider_id')
                    ->groupBy('user_id')
                    ->groupBy('name')
                    ->selectRaw('count(provider_id) as count , name , user_id')
                    ->orderByRaw('count DESC')
                    ->latest()->paginate($perPage);
        
        // echo "<pre>";
        // print_r($guest);
        // echo "<pre>";
        // exit();

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

        $validatedData = $request->validate([
            'photo' => 'image'
        ]);

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            //RESIZE 50% FILE IF IMAGE LARGER THAN 0.5 MB
            $image = Image::make(storage_path("app/public")."/".$requestData['photo']);
            $image->orientate();

            //watermark
            $watermark = Image::make(public_path('watermark.png'));
            $image->insert($watermark , 'bottom-right', 15, 15)->save();

            $size = $image->filesize();  

            if($size > 112000 ){
                $image->resize(
                    intval($image->width()/2) , 
                    intval($image->height()/2)
                )->save(); 
            }
            if($size > 512000 ){
                $image->resize(
                    intval($image->width()/4) , 
                    intval($image->height()/4)
                )->save(); 
            }

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
              ->update([
                'reply_provider_id' => $requestData['provider_id'],
                'now' => "Yes",
          ]);

        $this->_pushLine($requestData);

        // หา type ของ user ที่ register 
        $type_user = DB::table('users')
                    ->where('id', $requestData['user_id'])
                    ->get();
              foreach ($type_user as $key) {

                  if ($key->type == "line") {
                      return view('guest/thx_guest')->with('flash_message', 'Guest added!');
                  }
                  if ($key->type == "google") {
                      return view('guest/thx_guest_google')->with('flash_message', 'Guest added!');
                  }
              }
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
        $datetime =  date("d-m-Y  h:i:sa");

        if (!empty($data['photo'])) {
            $photo = $data['photo'];
        }else if (empty($data['photo'])) {
            $photo = null;
        }

        if (!empty($data['masseng'])) {
            $masseng_old = $data['masseng'];
        }else if (empty($data['masseng'])) {
            $masseng_old = "รบกวนมาที่รถด้วยค่ะ";
        }

        switch($massengbox)
        {
            case "1":  
                $masseng = "กรุณาเลื่อนรถด้วยค่ะ";
                $masseng_en = "Please move the car";
                break;
            case "2":  
                $masseng = "รถคุณเปิดไฟค้างไว้ค่ะ";
                $masseng_en = "The lights are on";
                break;
            case "3":  
                $masseng = "มีเด็กอยู่ในรถค่ะ";
                $masseng_en = "Children in car";
                break;
            case "4":  
                $masseng = "รถคุณเกิดอุบัติเหตุค่ะ";
                $masseng_en = "Car Accident";
                break;
            case "5":  
                $masseng = "แจ้งปัญหาการขับขี่";
                $masseng_en = "Driving Problems";
                break;
            case "6": 
                $masseng = $masseng_old;
                $masseng_en = "Others";
                break;
        }

        $register_car = DB::select("SELECT * FROM register_cars WHERE registration_number = '$registration' AND province = '$county' AND active = 'Yes'");
        
        foreach($register_car as $item){

            switch ($masseng) {
                case 'รถคุณเกิดอุบัติเหตุค่ะ':
                    $template_path = storage_path('../public/json/flex-accident.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("ตัวอย่าง",$masseng,$string_json);
                    $string_json = str_replace("datetime",$datetime,$string_json);
                    $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                    $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                    $string_json = str_replace("กรุณามาเลื่อนรถด้วยค่ะ",$masseng,$string_json);
                    $string_json = str_replace("Pleasemove",$masseng_en,$string_json);
                    $string_json = str_replace("uploads",$photo,$string_json);
                    $string_json = str_replace("pphhoottoo",$photo,$string_json);

                    $messages = [ json_decode($string_json, true) ];
                    break;
                
                default:
                    if (empty($phone)) {
                        $template_path = storage_path('../public/json/flex-move.json');   
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("ตัวอย่าง",$masseng,$string_json);
                        $string_json = str_replace("datetime",$datetime,$string_json);
                        $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                        $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                        $string_json = str_replace("กรุณามาเลื่อนรถด้วยค่ะ",$masseng,$string_json);
                        $string_json = str_replace("Please move the car",$masseng_en,$string_json);

                        $messages = [ json_decode($string_json, true) ];
                    }
                    if (!empty($phone)) {
                        $template_path = storage_path('../public/json/flex-move-call.json');   
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("ตัวอย่าง",$masseng,$string_json);
                        $string_json = str_replace("datetime",$datetime,$string_json);
                        $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                        $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                        $string_json = str_replace("กรุณามาเลื่อนรถด้วยค่ะ",$masseng,$string_json);
                        $string_json = str_replace("Please move the car",$masseng_en,$string_json);
                        $string_json = str_replace("0999999999",$phone,$string_json);

                        $messages = [ json_decode($string_json, true) ];
                    }
                    break;
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
            
        }
        
    }

    public function modal()
    {
        if(Auth::check()){
            return redirect('guest/create');
        }else{
            return view('guest.modal');
        }
    }

    public function index_detail()
    {
        // ดูคันที่ซ้ำกันมากที่สุด
        $guest_corny = DB::table('guests')
                        ->groupBy('registration')
                        ->groupBy('county')
                        ->selectRaw('registration , county ,count(registration) as count')
                        ->orderByRaw('count DESC')
                        ->where('name', request('name'))
                        ->limit(1)
                        ->get();
        // ดูคันที่ซ้ำกัน         
        $corny = DB::table('guests')
                        ->groupBy('registration')
                        ->groupBy('county')
                        ->selectRaw('registration , county ,count(registration) as count')
                        ->orderByRaw('count DESC')
                        ->where('name', request('name'))
                        ->get();

        // วันที่ล่าสุด
        $guest_date = DB::table('guests')
                        ->orderByRaw('created_at DESC ')
                        ->where('name', request('name'))
                        ->get();

        // ทั้งหมด
        $all = Guest::selectRaw('count(id) as count')
                        ->where('name', request('name'))
                        ->get();

        // ข้อมูลผู้ใช้
        $users = DB::table('users')
                        ->where('name', request('name'))
                        ->get();


        foreach($users as $item){
            $ranking = $item->ranking;
        }

        return view('guest.index_detail', compact('guest_corny','users','ranking', 'guest_date' , 'all' , 'corny') );
    }

    public function change_ToGold()
    {
        $date_now = date("Y-m-d"); 
        DB::table('users')
                ->where('name', request('name'))
                ->update([
                    'ranking' => 'Gold',
                    'last_edit' => $date_now,
                ]);

        return redirect('/index_detail?name='.request('name'));
    }

    public function change_ToSilver()
    {
        $date_now = date("Y-m-d"); 
        DB::table('users')
              ->where('name', request('name'))
              ->update([
                'ranking' => 'Silver',
                'last_edit' => $date_now,
          ]);

        return redirect('/index_detail?name='.request('name'));
    }

    public function change_ToBronze()
    {
        $date_now = date("Y-m-d"); 
        DB::table('users')
              ->where('name', request('name'))
              ->update([
                'ranking' => 'Bronze',
                'last_edit' => $date_now,
            ]);

        return redirect('/index_detail?name='.request('name'));
    }

    public function welcome_line_guest()
    {
        if(Auth::check()){
            return redirect('guest/create');
            // echo Auth::User()->name;
        }else{
            return redirect('/login/line?redirectTo=guest/create');
        }
    }

}
