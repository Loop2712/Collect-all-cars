<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use App\Models\Mylog;
use App\User;
use DB;
use App\Models\Insurance;
use App\Models\Register_car;
use App\Models\Ads_content;
use App\Models\Partner_premium;
use Intervention\Image\ImageManagerStatic as Image;

class CarbrandController extends Controller
{
	public function getBrand()
    {
        // $car_brand = CarModel::selectRaw('brand,count(brand) as count')
        //     ->orderByRaw('count DESC')
        //     ->where('brand', '!=',"" )
        //     ->limit(10)
        //     ->groupBy('brand')
        //     ->get();
        // return $car_brand;
        $car_brand = CarModel::selectRaw('brand,count(brand) as count')
            ->orderBy('brand')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();
        return $car_brand;
    }
    public function getModel($car_brand)
    {
        // $car_model = CarModel::selectRaw('model,count(model) as count')
        // 	->orderByRaw('count DESC')
        //     ->where('model', '!=',"" )
        //     ->where('brand', $car_brand )
        //     ->limit(10)
        //     ->groupBy('model')
        //     ->get();
        // return $car_model;
        $car_model = CarModel::selectRaw('model,count(model) as count')
        	->orderBy('model')
            ->where('model', '!=',"" )
            ->where('brand', $car_brand )
            ->groupBy('model')
            ->get();
        return $car_model;
    }

    // motorcycles

    public function getMotorBrand()
    {
        $motor_brand = DB::table('motorcycles_datas')
            ->select('brand')
            ->orderBy('brand')
            ->where('brand', '!=',"" )
            ->groupBy('brand')
            ->get();

        return $motor_brand;
    }
    public function getMotorModel($motor_brand)
    {
        $motor_model = DB::table('motorcycles_datas')
            ->select('model')
            ->orderBy('model')
            ->where('model', '!=',"" )
            ->where('brand', $motor_brand )
            ->groupBy('model')
            ->get();

        return $motor_model;
    }

    public function check_registration($registration)
    {
        $registration = str_replace(" ", "", $registration);
        $registration = DB::table('register_cars')
            ->select('registration_number')
            ->where('registration_number', $registration )
            ->get();

        return $registration;
    }

    public function check_province($registration)
    {
        $registration = str_replace(" ", "", $registration);
        $province = DB::table('register_cars')
            ->select('province')
            ->where('registration_number', $registration )
            ->groupBy('province')
            ->get();

        return $province;
    }

    public function check_time($registration , $county , $user_id)
    {
        $registration = str_replace(" ", "", $registration);

        $d_5 = strtotime("-5 minute");
        $date_5 = date("Y-m-d H:i:s", $d_5);

        $report = DB::table('guests')
            ->where('user_id', $user_id )
            ->where('registration', $registration )
            ->where('county', $county )
            ->get();
             foreach ($report as $key ) {
                if ($key->created_at > $date_5) {
                    $time = "Yes" ;
                    break ;
                }else{
                    $time = "No" ;
                }
            }

            return $time;
    
    }

    public function check_register_car($registration_number , $province)
    {
        $registration = str_replace(" ", "", $registration_number);
        $registration = DB::table('register_cars')
            ->where('registration_number', $registration_number )
            ->where('province', $province )
            ->get();

        return $registration;
    
    }

    public function add_reg_id($registration, $province)
    {
        $registration = str_replace(" ", "", $registration);
        $registration = DB::table('register_cars')
            ->where('registration_number', $registration )
            ->where('province', $province )
            ->get();

        return $registration;
    }

    public function phone_insurance($name_insurance)
    {

        $phones = Insurance::where('company',$name_insurance )
            ->get();

        return $phones;

    }

    // รถยนต์
    public function select_car_brand_user()
    {
        $car_brand = Register_car::select('brand')
            ->orderBy('brand')
            ->where('brand', "!=" , null)
            ->where('active', "Yes")
            ->where('car_type', "car")
            ->groupBy('brand')
            ->get();

        return $car_brand;
    }

    public function select_car_model_user($car_brand)
    {
        $car_model = Register_car::select('generation')
            ->orderBy('generation')
            ->where('generation', "!=" , null )
            ->where('car_type', "car" )
            ->where('active', "Yes")
            ->where('brand', $car_brand )
            ->groupBy('generation')
            ->get();
        return $car_model;
    }

    // รถจักรยนต์
    public function select_motor_brand_user()
    {
        $car_brand = Register_car::select('brand')
            ->orderBy('brand')
            ->where('brand', "!=" , null)
            ->where('active', "Yes")
            ->where('car_type', "motorcycle")
            ->groupBy('brand')
            ->get();

        return $car_brand;
    }

    public function select_motor_model_user($motor_brand)
    {
        $car_model = Register_car::select('generation')
            ->orderBy('generation')
            ->where('generation', "!=" , null )
            ->where('car_type', "motorcycle" )
            ->where('active', "Yes")
            ->where('brand', $motor_brand )
            ->groupBy('generation')
            ->get();
        return $car_model;
    }

    function search_data_selected_car($car_id)
    {
        $data = Register_car::where('id', $car_id)->get();

        return $data ;
    }

    function search_data_broadcast_by_car()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $car_type = $data['car_type'];

        $brand = $data['brand'];
        if (empty($brand)) {
            $brand = "" ;
        }

        $model = $data['model'];
        if (empty($model)) {
            $model = "" ;
        }

        $location_user = $data['location_user'];
        if (empty($location_user)) {
            $location_user = "" ;
        }

        $province_registration = $data['province_registration'];
        if (empty($province_registration)) {
            $province_registration = "" ;
        }

        $type_registration = $data['type_registration'];
        if (empty($type_registration)) {
            $type_registration = "" ;
        }

        $birth_month = $data['birth_month'];

        $id_partner = $data['id_partner'];
        if (empty($id_partner)) {
            $id_partner = "" ;
        }
        $partner_premium = Partner_premium::where("id_partner",$id_partner)->get();
        foreach ($partner_premium as $premium) {
            $name_partner = $premium->name_partner ;
            $level = $premium->level ;
        }

        if ($level == "Test") {

            if (!empty($birth_month)) {
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('register_cars.juristicNameTH' ,'LIKE' , "%$name_partner%" )
                    ->where('users.type', "line")
                    ->whereMonth('users.brith' , "$birth_month" )
                    ->select('register_cars.*')
                    ->get();
            }else{
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('register_cars.juristicNameTH' ,'LIKE' , "%$name_partner%" )
                    ->where('users.type', "line")
                    ->select('register_cars.*')
                    ->get();
            }
            

        }else{

            if (!empty($birth_month)) {
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('users.type', "line")
                    ->whereMonth('users.brith' , "$birth_month" )
                    ->select('register_cars.*')
                    ->get();
            }else{
                $data_search = Register_car::join('users', 'register_cars.user_id', '=', 'users.id')
                    ->where('register_cars.car_type', $car_type)
                    ->where('register_cars.active', "Yes")
                    ->where('register_cars.brand', 'LIKE' , "%$brand%" )
                    ->where('register_cars.generation', 'LIKE' , "%$model%" )
                    ->where('register_cars.location', 'LIKE' , "%$location_user%" )
                    ->where('register_cars.province', 'LIKE' , "%$province_registration%" )
                    ->where('register_cars.type_car_registration', 'LIKE' , "%$type_registration%" )
                    ->where('users.type', "line")
                    ->select('register_cars.*')
                    ->get();
            }

            

        }

        return $data_search ;

    }

    function send_content_BC_by_car(Request $request)
    {
        $requestData = $request->all();

        // เช็คว่าเป็น Content ใหม่หรือเก่า
        if ($requestData['send_again'] == "Yes") {

            $data_Ads_content = Ads_content::where('id' , $requestData['id_ads'] )->first();
            $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

            $requestData['photo'] = $data_Ads_content->photo ;

            $BC_by_car_sent = $data_partner_premium->BC_by_car_sent ;
            $sum_BC_by_car_sent = $BC_by_car_sent + $requestData['amount'] ;
            $sum_send_round = $data_Ads_content->send_round + 1 ;

            
            
            DB::table('partner_premia')
                ->where('id_partner', $requestData['id_partner'])
                ->update([
                    'BC_by_car_sent' => $sum_BC_by_car_sent ,
            ]);

            DB::table('ads_contents')
                ->where('id', $requestData['id_ads'])
                ->update([
                    'send_round' => $sum_send_round ,
            ]);

            $requestData['link'] = $data_Ads_content->link ;

            // ส่ง content เข้าไลน์
            $this->send_content_BC_to_line($requestData , $data_Ads_content);

        }else{

            if ($request->hasFile('photo')) {
                $requestData['photo'] = $request->file('photo')->store('uploads', 'public');
            }

            Ads_content::create($requestData);

            $data_Ads_content = Ads_content::latest()->first();
            $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

            $BC_by_car_sent = $data_partner_premium->BC_by_car_sent ;
            $sum_BC_by_car_sent = $BC_by_car_sent + $requestData['amount'] ;
            $sum_send_round = $data_Ads_content->send_round + 1 ;

            DB::table('partner_premia')
                ->where('id_partner', $requestData['id_partner'])
                ->update([
                    'BC_by_car_sent' => $sum_BC_by_car_sent ,
            ]);

            DB::table('ads_contents')
                ->where('id', $data_Ads_content->id)
                ->update([
                    'link' => "https://www.viicheck.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id,
                    'send_round' => $sum_send_round ,
            ]);

            $requestData['link'] = "https://www.viicheck.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id;

            // ส่ง content เข้าไลน์
            $this->send_content_BC_to_line($requestData , $data_Ads_content);

        }

        return redirect('/broadcast/broadcast_by_car')->with('flash_message', 'Partner updated!');

    }

    function send_content_BC_to_line($requestData , $data_Ads_content){

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        $arr_car_id = json_decode($requestData['arr_car_id_selected']);

        $show_user = [] ;
        if (!empty($data_Ads_content->show_user)) {
            $show_user = json_decode($data_Ads_content->show_user) ;
        }

        $img = 'https://www.viicheck.com/storage/' . $requestData['photo'];
        $img_content = Image::make( $img );

        $img_content_w = $img_content->width();
        $img_content_h = $img_content->height();

        // ส่ง content
        for ($xi=0; $xi < count($arr_user_id); $xi++) { 

            $data_user = User::where('id' , $arr_user_id[$xi])->first();

            $template_path = storage_path('../public/json/flex-broadcast/flex-broadcast_TEXT_URL.json');
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ตัวอย่าง",$requestData['name_content'],$string_json);
            $string_json = str_replace("TEXT_W",$img_content_w,$string_json);
            $string_json = str_replace("TEXT_H",$img_content_h,$string_json);
            $string_json = str_replace("PHOTO_BC",$requestData['photo'],$string_json);
            $string_json = str_replace("TEXT_URL",$requestData['link'] . "&user_id=" . $arr_user_id[$xi] ,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $data_user->provider_id,
                "messages" => $messages,
            ];

            // flex ask_for_help
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

            // SAVE LOG
            $data = [
                "title" => "BC_by_car" ,
                "content" => "TO >> user_id = " . $arr_user_id[$xi],
            ];
            MyLog::create($data);

            // update show_user in ads_contents
            array_push($show_user, $arr_user_id[$xi]);

            DB::table('ads_contents')
                ->where('id', $data_Ads_content->id)
                ->update([
                    'show_user' => $show_user ,
            ]);

        }

        return "send done all" ;

    }

    function check_content(Request $request){

        $requestData = $request->all();

        $url = $requestData['redirectTo'] ;
        $to_url_ep = explode("//" , $url);

        if (count($to_url_ep) > 1) {
            $to_url = $url ;
        }else{
            $to_url = 'http://' . $url ;
        }

        $data_Ads_content = Ads_content::where('id' , $requestData['id_content'])->first();

        $arr_user_click = [] ;

        if (!empty($data_Ads_content->user_click)) {
            $arr_user_click = json_decode($data_Ads_content->user_click) ;
        }
        array_push($arr_user_click, $requestData['user_id']);

        DB::table('ads_contents')
            ->where('id', $requestData['id_content'])
            ->update([
                'user_click' => $arr_user_click ,
        ]);

        return redirect($to_url)->with('flash_message', 'Partner updated!');
    }

}
