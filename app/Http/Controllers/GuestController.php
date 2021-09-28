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

use Illuminate\Support\Facades\Mail;
use App\Mail\MailToCompany;

use App\Models\Mylog;
use App\Models\Time_zone;
use App\Http\Controllers\API\API_Time_zone;

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

        $gg_key = env('GOOGLE_KEY_API');

        return view('guest.create', compact('location_array','gg_key'));
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
            $image->fit(900, 800);

            //watermark
            $watermark = Image::make(public_path('watermark.png'));
            $image->insert($watermark , 'bottom-right', 15, 15)->save();

            // $size = $image->filesize();  

            // if($size > 112000 ){
            //     $image->resize(
            //         intval($image->width()/2) , 
            //         intval($image->height()/2)
            //     )->save(); 
            // }
            // if($size > 512000 ){
            //     $image->resize(
            //         intval($image->width()/4) , 
            //         intval($image->height()/4)
            //     )->save(); 
            // }
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
                  }else {
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

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    protected function _pushLine($data)
    {   

        $provider_id = $data['provider_id'];
        $registration = $data['registration'];
        $county = $data['county'];
        $phone = $data['phone'];
        $massengbox = $data['massengbox'];
        $report_drivingd_detail = $data['report_drivingd_detail'];
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
                $stg = "35.2";
                break;
            case "2":  
                $masseng = "รถคุณเปิดไฟค้างไว้ค่ะ";
                $stg = "36";
                break;
            case "3":  
                $masseng = "มีเด็กอยู่ในรถค่ะ";
                $stg = "5";
                break;
            case "4":  
                $masseng = "รถคุณเกิดอุบัติเหตุค่ะ";
                $stg = "21";
                break;
            case "5":  
                $masseng = $report_drivingd_detail;
                $stg = "37";
                break;
            case "6": 
                $masseng = $masseng_old;
                $stg = "9";
                break;
        }

        $register_car = DB::select("SELECT * FROM register_cars WHERE registration_number = '$registration' AND province = '$county' AND active = 'Yes'");

        foreach($register_car as $item){

            $users = DB::table('users')
                    ->where('id', $item->user_id)
                    ->get();

            foreach ($users as $user) {
                $type_user = $user->type;
                $name_time_zone = $user->time_zone;
                $user_language = $user->language;
            }

            // TIME ZONE
            $API_Time_zone = new API_Time_zone();
            $time_zone = $API_Time_zone->change_Time_zone($name_time_zone);

            if ($massengbox != "6") {

                $data_topic = [
                    $masseng,
                    "เวลาที่ถูกแจ้ง",
                    "หมายเลขทะเบียน",
                    "ส่งข้อความตอบกลับ",
                ];

                for ($i=0; $i < count($data_topic); $i++) { 

                    $text_topic = DB::table('text_topics')
                            ->select($user_language)
                            ->where('th', $data_topic[$i])
                            ->where('en', "!=", null)
                            ->get();

                    foreach ($text_topic as $item_of_text_topic) {
                        $data_topic[$i] = $item_of_text_topic->$user_language ;
                    }
                }
            }

            if (!empty($item->organization_mail)) {

                $mail_data = [
                    "juristicNameTH" => $item->juristicNameTH,
                    "registration_number" => $item->registration_number,
                    "province" => $item->province,
                    "datetime" => $time_zone,
                    "branch" => $item->branch,
                    "branch_district" => $item->branch_district,
                    "branch_province" => $item->branch_province,
                    "masseng" => $data_topic[0],
                    "phone" => $phone,
                ];

                $email = $item->organization_mail;
                Mail::to($email)->send(new MailToCompany($mail_data));
            }

            if ($type_user == "line") {
                switch ($masseng) {
                    case 'รถคุณเกิดอุบัติเหตุค่ะ':
                        if (empty($phone)) {
                            $template_path = storage_path('../public/json/flex-accident.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                            $string_json = str_replace("datetime",$time_zone,$string_json);
                            $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                            $string_json = str_replace("กรุณาเลื่อนรถด้วยค่ะ",$data_topic[0],$string_json);
                            $string_json = str_replace("uploads",$photo,$string_json);
                            $string_json = str_replace("pphhoottoo",$photo,$string_json);

                            $string_json = str_replace("เวลาที่ถูกแจ้ง",$data_topic[1],$string_json);
                            $string_json = str_replace("หมายเลขทะเบียน",$data_topic[2],$string_json);
                            $string_json = str_replace("ส่งข้อความตอบกลับ",$data_topic[3],$string_json);

                            $messages = [ json_decode($string_json, true) ];
                        }
                        if (!empty($phone)) {
                            $template_path = storage_path('../public/json/flex-accident-call.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                            $string_json = str_replace("datetime",$time_zone,$string_json);
                            $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                            $string_json = str_replace("กรุณาเลื่อนรถด้วยค่ะ",$data_topic[0],$string_json);
                            $string_json = str_replace("uploads",$photo,$string_json);
                            $string_json = str_replace("pphhoottoo",$photo,$string_json);
                            $string_json = str_replace("0999999999",$phone,$string_json);

                            $string_json = str_replace("เวลาที่ถูกแจ้ง",$data_topic[1],$string_json);
                            $string_json = str_replace("หมายเลขทะเบียน",$data_topic[2],$string_json);
                            $string_json = str_replace("ส่งข้อความตอบกลับ",$data_topic[3],$string_json);

                            $messages = [ json_decode($string_json, true) ];
                            }
                        break;
                    
                    default:
                        if (empty($phone)) {
                            $template_path = storage_path('../public/json/flex-move.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                            $string_json = str_replace("datetime",$time_zone,$string_json);
                            $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                            $string_json = str_replace("กรุณาเลื่อนรถด้วยค่ะ",$data_topic[0],$string_json);
                            $string_json = str_replace("สติกเกอร์ไลน์",$stg,$string_json);

                            $string_json = str_replace("เวลาที่ถูกแจ้ง",$data_topic[1],$string_json);
                            $string_json = str_replace("หมายเลขทะเบียน",$data_topic[2],$string_json);
                            $string_json = str_replace("ส่งข้อความตอบกลับ",$data_topic[3],$string_json);

                            $messages = [ json_decode($string_json, true) ];
                        }
                        if (!empty($phone)) {
                            $template_path = storage_path('../public/json/flex-move-call.json');   
                            $string_json = file_get_contents($template_path);
                            $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                            $string_json = str_replace("datetime",$time_zone,$string_json);
                            $string_json = str_replace("7ยษ2944",$item->registration_number,$string_json);
                            $string_json = str_replace("กรุงเทพ",$item->province,$string_json);
                            $string_json = str_replace("กรุณาเลื่อนรถด้วยค่ะ",$data_topic[0],$string_json);
                            $string_json = str_replace("0999999999",$phone,$string_json);
                            $string_json = str_replace("สติกเกอร์ไลน์",$stg,$string_json);

                            $string_json = str_replace("เวลาที่ถูกแจ้ง",$data_topic[1],$string_json);
                            $string_json = str_replace("หมายเลขทะเบียน",$data_topic[2],$string_json);
                            $string_json = str_replace("ส่งข้อความตอบกลับ",$data_topic[3],$string_json);

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
                                    'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
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
