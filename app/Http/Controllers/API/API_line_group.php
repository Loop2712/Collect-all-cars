<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Group_line;
use Auth;
use Illuminate\Support\Facades\DB;

class API_line_group extends Controller
{
    public function save_line_group($name_line_group ,$company)
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
}
