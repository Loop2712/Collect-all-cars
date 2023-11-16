<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use App\Models\Mylog;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Insurance;
use App\Models\Register_car;
use App\Models\Ads_content;
use App\Models\Partner_premium;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\API\ImageController;
use App\Models\Sos_map;

class Broadcast_userController extends Controller
{
    function search_data_broadcast_by_user(Request $request)
    {
        // $json = file_get_contents("php://input");
        // $data = json_decode($json, true);

        $requestData = $request->all();

        $partner_name = $requestData['partner_name'];
        $user_type = $requestData['user_type'];
        $gender_user = $requestData['gender_user'];
        $age_user = $requestData['age_user'];
        $country_user = $requestData['country_user'];
        $nationalitie_user = $requestData['nationalitie_user'];
        $language_user = $requestData['language_user'];
        $time_zone_user = $requestData['time_zone_user'];
        $province_user = $requestData['province_user'];
        $district_user = $requestData['district_user'];
        $radius_user = $requestData['radius_user'];

        // หา ประเทศของคนใน องค์กร
        $lat = $requestData['lat'];
        $lng = $requestData['lng'];

        $lat = floatval($lat);
        $lng = floatval($lng);
        // $radius_user_m = $radius_user * 1000;

        if ($age_user === '<20') {
            $startDate = now()->subYears(20);
            $endDate = now();
        } elseif ($age_user === '21-29') {
            $startDate = now()->subYears(29);
            $endDate = now()->subYears(21);
        } elseif ($age_user === '30-45') {
            $startDate = now()->subYears(45);
            $endDate = now()->subYears(30);
        } elseif ($age_user === '46-59') {
            $startDate = now()->subYears(59);
            $endDate = now()->subYears(46);
        } elseif ($age_user === '60+') {
            $startDate = now()->subYears(60);
            $endDate = now();
        } else {
            // กรณีที่ไม่เลือกเลยหรือเลือกทั้งหมด
            $startDate = now()->subYears(100); // ตั้งค่าให้มากกว่าอายุสูงสุดที่คาดหวัง
            $endDate = now();
        }

        if(!empty($user_type)){
            if($user_type == "organization"){
                // echo "OK เข้า organization";
                $data_search = User::where('type','line')
                ->where('organization',$partner_name)
                ->when($age_user, function ($query) use ($startDate, $endDate) {
                    return $query->whereBetween('brith', [$startDate, $endDate]);
                })
                ->when($gender_user, function ($query, $gender_user) {
                    return $query->where('sex', $gender_user);
                })
                ->when($country_user, function ($query, $country_user) {
                    return $query->where('country', $country_user);
                })
                ->when($nationalitie_user, function ($query, $nationalitie_user) {
                    return $query->where('nationalitie', $nationalitie_user);
                })
                ->when($language_user, function ($query, $language_user) {
                    return $query->where('language', $language_user);
                })
                ->when($time_zone_user, function ($query, $time_zone_user) {
                    return $query->where('time_zone', $time_zone_user);
                })
                ->when($province_user, function ($query, $province_user) use ($district_user) {
                    if ($district_user) {
                        return $query->where('location_P', $province_user)
                                    ->where('location_A', $district_user);
                    } else {
                        return $query->where('location_P', $province_user);
                    }
                })
                ->when($lat && $lng && $radius_user, function ($query) use ($lat, $lng, $radius_user) {
                    return $query->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( lat ) )* cos( radians( lng ) - radians(?) ) + sin( radians(?) )* sin( radians( lat ) ) ) ) AS distance", [$lat, $lng, $lat])->having("distance", "<", $radius_user);
                })
                ->get();
            }else{
                // echo "OK เข้า user_from";
                $data_search = User::where('type','line')
                ->where('user_from','LIKE',"%$partner_name%")
                ->when($age_user, function ($query) use ($startDate, $endDate) {
                    return $query->whereBetween('brith', [$startDate, $endDate]);
                })
                ->when($gender_user, function ($query, $gender_user) {
                    return $query->where('sex', $gender_user);
                })
                ->when($country_user, function ($query, $country_user) {
                    return $query->where('country', $country_user);
                })
                ->when($nationalitie_user, function ($query, $nationalitie_user) {
                    return $query->where('nationalitie', $nationalitie_user);
                })
                ->when($language_user, function ($query, $language_user) {
                    return $query->where('language', $language_user);
                })
                ->when($time_zone_user, function ($query, $time_zone_user) {
                    return $query->where('time_zone', $time_zone_user);
                })
                ->when($province_user, function ($query, $province_user) use ($district_user) {
                    if ($district_user) {
                        return $query->where('location_P', $province_user)
                                    ->where('location_A', $district_user);
                    } else {
                        return $query->where('location_P', $province_user);
                    }
                })
                ->when($lat && $lng && $radius_user, function ($query) use ($lat, $lng, $radius_user) {
                    return $query->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( lat ) )* cos( radians( lng ) - radians(?) ) + sin( radians(?) )* sin( radians( lat ) ) ) ) AS distance", [$lat, $lng, $lat])->having("distance", "<", $radius_user);
                })
                ->get();
            }
        }else{
            // echo "OK เข้า else ";

            $data_search = User::where('type','line')
            ->where('organization',$partner_name)
            ->orWhere('user_from','LIKE',"%$partner_name%")
            ->when($age_user, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('brith', [$startDate, $endDate]);
            })
            ->when($gender_user, function ($query, $gender_user) {
                return $query->where('sex', $gender_user);
            })
            ->when($country_user, function ($query, $country_user) {
                return $query->where('country', $country_user);
            })
            ->when($nationalitie_user, function ($query, $nationalitie_user) {
                return $query->where('nationalitie', $nationalitie_user);
            })
            ->when($language_user, function ($query, $language_user) {
                return $query->where('language', $language_user);
            })
            ->when($time_zone_user, function ($query, $time_zone_user) {
                return $query->where('time_zone', $time_zone_user);
            })
            ->when($province_user, function ($query, $province_user) use ($district_user) {
                if ($district_user) {
                    return $query->where('location_P', $province_user)
                                ->where('location_A', $district_user);
                } else {
                    return $query->where('location_P', $province_user);
                }
            })
            ->when($lat && $lng && $radius_user, function ($query) use ($lat, $lng, $radius_user) {
                return $query->selectRaw("*,( 3959 * acos( cos( radians(?) ) * cos( radians( lat ) )* cos( radians( lng ) - radians(?) ) + sin( radians(?) )* sin( radians( lat ) ) ) ) AS distance", [$lat, $lng, $lat])->having("distance", "<", $radius_user);
            })
            ->get();
        }

        return $data_search ;

    }


    // function haversineDistance($lat1, $lng1, $lat2, $lng2) {
    //     $earthRadius = 6371; // รัศมีของโลก (หน่วยกิโลเมตร)

    //     $dLat = deg2rad($lat2 - $lat1);
    //     $dLng = deg2rad($lng2 - $lng1);

    //     $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng / 2) * sin($dLng / 2);
    //     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    //     $distance = $earthRadius * $c; // ระยะห่างในหน่วยกิโลเมตร

    //     return $distance;
    // }


    function send_content_BC_by_user(Request $request)
    {
        $requestData = $request->all();

        // เช็คว่าเป็น Content ใหม่หรือเก่า
        if ($requestData['send_again'] == "Yes") {

            $data_Ads_content = Ads_content::where('id' , $requestData['id_ads'] )->first();
            $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

            $requestData['photo'] = $data_Ads_content->photo ;

            $BC_by_user_sent = $data_partner_premium->BC_by_user_sent ;
            $sum_BC_by_user_sent = $BC_by_user_sent + $requestData['amount'] ;
            $sum_send_round = $data_Ads_content->send_round + 1 ;


            DB::table('partner_premia')
                ->where('id_partner', $requestData['id_partner'])
                ->update([
                    'BC_by_user_sent' => $sum_BC_by_user_sent ,
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

            // ----------- RESIZE PHOTO ----------- //
            $resize_photo = new ImageController();

            if (!empty($requestData['photo'])) {
               $resize_photo->resize_photo($data_Ads_content->photo);
            }

            $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

            $BC_by_user_sent = $data_partner_premium->BC_by_user_sent ;
            $sum_BC_by_user_sent = $BC_by_user_sent + $requestData['amount'] ;
            $sum_send_round = $data_Ads_content->send_round + 1 ;

            DB::table('partner_premia')
                ->where('id_partner', $requestData['id_partner'])
                ->update([
                    'BC_by_user_sent' => $sum_BC_by_user_sent ,
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

        return redirect('/broadcast/broadcast_by_user')->with('flash_message', 'Partner updated!');

    }

    // -------------- send content LINE -------------------------

    function send_content_BC_to_line($requestData , $data_Ads_content){

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        $show_user = [] ;
        if (!empty($data_Ads_content->show_user)) {
            $show_user = json_decode($data_Ads_content->show_user) ;
        }

        if (!empty($requestData['photo'])) {
            $img = 'https://www.viicheck.com/storage/' . $requestData['photo'];
            $img_content = Image::make( $img );

            $img_content_w = $img_content->width();
            $img_content_h = $img_content->height();
        }

        // ส่ง content
        if (!empty($arr_user_id)) {
            for ($xi=0; $xi < count($arr_user_id); $xi++) {

                $data_user = User::where('id' , $arr_user_id[$xi])->first();

                if ($requestData['type_content_bc'] == 'text') {
                    // LINE TEXT
                    $template_path = storage_path('../public/json/flex-broadcast/flex-broadcast_TEXT.json');
                    $string_json = file_get_contents($template_path);

                    $string_json = str_replace("ใส่ข้อความตรงนี้ครับ",$requestData['detail'],$string_json);
                }else{
                    // LINE IMG
                    if (!empty($requestData['link'])){
                        $template_path = storage_path('../public/json/flex-broadcast/flex-broadcast_TEXT_URL.json');
                        $string_json = file_get_contents($template_path);
                        $string_json = str_replace("TEXT_URL",$requestData['link']."&user_id=".$arr_user_id[$xi] ,$string_json);
                    }else{
                        $template_path = storage_path('../public/json/flex-broadcast/flex-broadcast_NONE_TEXT_URL.json');
                        $string_json = file_get_contents($template_path);
                    }

                    $string_json = str_replace("ตัวอย่าง",$requestData['name_content'],$string_json);
                    $string_json = str_replace("TEXT_W",$img_content_w,$string_json);
                    $string_json = str_replace("TEXT_H",$img_content_h,$string_json);
                    $string_json = str_replace("PHOTO_BC",$requestData['photo'],$string_json);
                }

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
                    "title" => "BC_by_user" ,
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
        }


        return "send done all" ;

    }
}
