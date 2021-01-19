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

		$access_token = 'YHK/caBpRII4zi9AItTECuE+x9LVrg/F+ZZxtrrZLhij26Vh3V97VnAkYmKeSl9cNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4rLJULOe1ul5rzKHJKMQYfsjDCNSE2aPUtiuWbOxrQFvwdB04t89/1O/w1cDnyilFU=';
		// Get POST body content
		// $content = file_get_contents('php://input');

		$content = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($content, JSON_UNESCAPED_UNICODE),
        ];
        Mylog::create($data);
	}
}
