<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Partner_DashboardController extends Controller
{
    function dashboard_index(Request $request){
        return view('dashboard.dashboard_index');
    }
}
