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
		$access_token = 'VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=';
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
