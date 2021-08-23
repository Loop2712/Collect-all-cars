<?php

namespace App;

use Illuminate\Http\Request;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\VisionClient;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class GoogleCloudVision //extends Model
{
    public function detectText($path)
    {
        //https://onlinelearningportal.website/google-vision-api-implementation-with-laravel-5-8/
        
        //CALL GOOGLE VISION OBJECT AND DO TEXT DETECTION
        // AIzaSyAYROqDzrounZaB4J8etaV4yhBhhELZNE8
        $key_path = storage_path('app/public/viicheck-7eacf7f234d1.json');
        $vision = new VisionClient(['keyFile' => json_decode(file_get_contents($key_path), true)]);         
        $image = $vision->image(public_path('/img/ocr/img_register.png'), [ 'TEXT_DETECTION' ] );        
        $result = $vision->annotate($image);
        print_r($result); exit;
        $texts = $result->text();
  

    }

    
}