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

		$access_token = 'es9wh5s70CThUrRxbF62bIYGxPCeAbRlQbC2jktBUuMWyQISqyBrtkLiyHh9Wfx8NA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4peodF+Z4AZ3s6KOexDq3+Fa9oNWiyCLNuf1sHKz4Hc9AdB04t89/1O/w1cDnyilFU=';
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
