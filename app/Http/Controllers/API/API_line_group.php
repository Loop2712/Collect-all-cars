<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Group_line;
use App\Models\Partner;
use Auth;
use Illuminate\Support\Facades\DB;

class API_line_group extends Controller
{
    public function save_line_group_insurance($name_line_group ,$company)
    {
        DB::table('group_lines')
              ->where('groupName', $name_line_group)
              ->update([
                'owner' => $company." (Iinsurance)",
        ]);

        DB::table('insurances')
            ->where('company', $company)
            ->update([
                'line_group' => $name_line_group,
        ]);

        return $company;
    }

    public function save_line_group_partner_viicheck($name_line_group ,$name_partner)
    {
        $data_partners = Partner::where("name", $name_partner)->get();
        foreach ($data_partners as $key_1) {
            
            DB::table('group_lines')
                ->where('groupName', $name_line_group)
                ->update([
                    'owner' => $name_partner." (Partner)",
                    'partner_id' => $key_1->id,
            ]);

        }
        
        $group_line = Group_line::where('groupName', $name_line_group)->get();
        foreach ($group_line as $key_2) {

            DB::table('partners')
                ->where('name', $name_partner)
                ->update([
                    'line_group' => $name_line_group,
                    'group_line_id' => $key_2->id,
            ]);

        }
        
        return $name_partner;
    }

    public function set_group_line($partner_id, $language, $time_zone)
    {
        $time_zone = str_replace("_","/",$time_zone);
        
        DB::table('group_lines')
                ->where('partner_id', $partner_id)
                ->update([
                    'language' => $language,
                    'time_zone' => $time_zone,
            ]);

        return $partner_id;
    }
}
