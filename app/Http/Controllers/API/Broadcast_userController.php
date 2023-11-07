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
use App\Http\Controllers\API\ImageController;

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

        $lat = '';
        $lng = '';
        $radius = '';

        if (!empty($radius_user)) {
            $radius_user_explode = explode(",",$radius_user);

            $lat = $radius_user_explode[0];
            $lng = $radius_user_explode[1];
            $radius = $radius_user_explode[2];

        }


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
                $data_search = User::where('type','line')
                ->where('organization',$partner_name)
                ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
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
                ->when($lat && $lng, function ($query) use ($lat, $lng, $radius) {
                    return $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat))) AS distance', [$lat, $lng, $lat, $lng])
                        ->where('distance', '<=', $radius);
                })
                ->get();
            }else{
                $data_search = User::where('type','line')
                ->where('user_from','LIKE',"%$partner_name%")
                ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
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
                ->when($lat && $lng, function ($query) use ($lat, $lng, $radius) {
                    return $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat))) AS distance', [$lat, $lng, $lat, $lng])
                        ->where('distance', '<=', $radius);
                })
                ->get();
            }
        }else{
            $data_search = User::where('type','line')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
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
            ->when($lat && $lng, function ($query) use ($lat, $lng, $radius) {
                return $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat))) AS distance', [$lat, $lng, $lat, $lng])
                    ->where('distance', '<=', $radius);
            })
            ->where('organization',$partner_name)
            ->orWhere('user_from','LIKE',"%$partner_name%")
            ->get();
        }

        return $data_search ;

    }
}
