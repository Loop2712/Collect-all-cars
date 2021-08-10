<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function img_register()
    {
    	$json = file_get_contents("php://input");
        $base64_string = json_decode($json, true);

    	$this->base64_to_jpeg($base64_string);
    }

    function base64_to_jpeg($base64_string) {

    	$output_file = "./img/ocr/img_register.png";

    	$data = explode( ',', $base64_string );

		$fp = fopen($output_file, "w+");
 
		// write the data in image file
		fwrite($fp, base64_decode( $data[ 1 ] ) );
		 
		// close an open file pointer
		fclose($fp);

		// return $output_file; 
	}
}
