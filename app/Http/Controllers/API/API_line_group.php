<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Group_line;
use Auth;
use Illuminate\Support\Facades\DB;

class API_line_group extends Controller
{
    public function save_line_group_insurance($name_line_group ,$company)
    {
        DB::table('group_lines')
              ->where('groupName', $name_line_group)
              ->update([
                'owner' => $company,
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
        DB::table('group_lines')
              ->where('groupName', $name_line_group)
              ->update([
                'owner' => $name_partner,
        ]);

        DB::table('partners')
            ->where('name', $name_partner)
            ->update([
                'line_group' => $name_line_group,
        ]);

        return $company;
    }
}
