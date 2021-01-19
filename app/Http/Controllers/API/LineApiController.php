<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Mylog;

class LineApiController extends Controller
{
    public function store(Request $request)
	{
		http_response_code(200);
		file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
	}
}
