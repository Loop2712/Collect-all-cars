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
		$access_token = 'es9wh5s70CThUrRxbF62bIYGxPCeAbRlQbC2jktBUuMWyQISqyBrtkLiyHh9Wfx8NA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4peodF+Z4AZ3s6KOexDq3+Fa9oNWiyCLNuf1sHKz4Hc9AdB04t89/1O/w1cDnyilFU=';
		// Get POST body content
		// $content = file_get_contents('php://input');

		$content = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($content, JSON_UNESCAPED_UNICODE),
        ];
        Mylog::create($data);

		// Parse JSON
		$events = $content;
		// Validate parsed JSON data
		// if (!is_null($events['events'])) {
		//     // Loop through each event
		//     foreach ($events['events'] as $event) {
		//         // Reply only when message sent is in 'text' format
		//         if ($event['type'] == 'message' && $event['message']['type'] == 'location') {
		//             // Get text sent
		//             $lat = $event['message']['latitude'];
		//             $lng = $event['message']['longitude'];
		//             $text = $lat . " / " . $lng ;
		//             // Get replyToken
		//             $replyToken = $event['replyToken'];

		//             //array of dealers
		//             $dealers = DB::select("SELECT name_dealers,location,latitude,longitude,( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance FROM dealers  HAVING distance < 2000 ORDER BY distance LIMIT 0 , 5", []);

		//             // Build message to reply back
		//             $array_dealers = array();

		//             foreach($dealers as $item){

		// 	            $message = [
		// 	                'type' => 'location',
		// 	                // 'text' => $item->name_dealers . " / " . $item->location . " / " . $item->latitude . " / " . $item->longitude,
		// 	                'title' => $item->name_dealers,
		// 	                'address' => $item->location,
		// 	                'latitude' => $item->latitude,
		// 	                'longitude' => $item->longitude,
		// 	            ];

		// 	            $array_dealers[] = $message;


		//             }


		//             // Make a POST Request to Messaging API to reply to sender
		//             $url = 'https://api.line.me/v2/bot/message/reply';
		//             $data = [
		//                 'replyToken' => $replyToken,
		//                 'messages' => $array_dealers
		//             ];
		//             $post = json_encode($data);
		//             $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		//             $ch = curl_init($url);
		//             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//             curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		//             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		//             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		//             $result = curl_exec($ch);
		//             curl_close($ch);
		//             echo $result . "";
		//         }
		//     }
		// }

	}
}
