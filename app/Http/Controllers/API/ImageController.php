<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use Google\Cloud\Vision\VisionClient;

class ImageController extends Controller
{
    public function img_register()
    {
    	$json = file_get_contents("php://input");
        $base64_string = json_decode($json, true);

    	$this->base64_to_jpeg($base64_string);
    }

    function base64_to_jpeg($base64_string) {

    	$path = './img/ocr/img_register.png';

    	$data = explode( ',', $base64_string );

		$fp = fopen($path, "w+");
 
		// write the data in image file
		fwrite($fp, base64_decode( $data[ 1 ] ) );
		 
		// close an open file pointer
		fclose($fp);

		$this->detectText();

	}

	public function detectText()
    {
        $vision = new VisionClient(['keyFile' => json_decode('ckartisan-c48273251fdf.json', true)]);  

        $img_register = fopen('img/ocr/img_register.png', 'r');

        $image = $vision->image($img_register, [ 'TEXT_DETECTION' ] );        
        $result = $vision->annotate($image);

        print_r($result); exit;
        $texts = $result->text();

    }
}
