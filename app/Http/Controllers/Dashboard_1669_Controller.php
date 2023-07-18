<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
Use Carbon\Carbon;
use PDF;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboard_1669_Controller extends Controller
{
    function dashboard_index_1669(Request $request)
    {
        $user_login = Auth::user();

        return view('dashboard_1669.dashboard_1669_index');

    }
}
