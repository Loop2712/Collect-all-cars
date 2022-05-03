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

    	$path = public_path('img/ocr/img_register.png');

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
        $vision = new VisionClient(['keyFile' => json_decode(public_path('ckartisan-c48273251fdf.json'), true)]); 

        $img_register = fopen(public_path('img/ocr/img_register.png'), 'r');

        $image = $vision->image($img_register, [ 'TEXT_DETECTION' ] );        
        $result = $vision->annotate($image);

        print_r($result); exit;
        $texts = $result->text();

    }

    function save_img_url()
    {

        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $url = $data['url'];
        $name_partner = $data['name_partner'];
        $name_new_check_in = $data['name_new_check_in'];
 
        $img = storage_path("app/public")."/check_in". "/" . 'check_in_' . $name_partner . '_' . $name_new_check_in . '.png';

        // Save image
        file_put_contents($img, file_get_contents($url));

        return 'check_in_' . $name_partner . '_' . $name_new_check_in . '.png';

    }

    function create_img_check_in()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $color_theme = $data['color_theme'];
        $name_partner = $data['name_partner'];
        $name_new_check_in = $data['name_new_check_in'];
        $url_img = $data['url_img'];

        $color_hex = $this->hex2rgba($color_theme) ;
        $color_sp = explode(",",$color_hex);
        $color_1 = intval($color_sp[0]);
        $color_2 = intval($color_sp[1]);
        $color_3 = intval($color_sp[2]);

        // เรียกรูปภาพใส่ $image
        $image = Image::make(public_path('img/check_in/theme/artwork_new.png'));
        $image->orientate();

        // ระบายสี
        // $image->colorize( intval($color[0]) , intval($color[1]) , intval($color[2]) );
        $image->colorize( 20 ,25 , 25 );

        // QR-code
        $watermark_2 = Image::make( storage_path("app/public") . "/" .  $url_img );
        $image->insert($watermark_2 ,'bottom-right', 600, 200);

        // logo viicheck && sticker
        $watermark = Image::make(public_path('img/check_in/theme/viicheck-01.png'));
        $image->insert($watermark);

        $image->text($name_partner, 850, 125, function($font) {
            $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
            $font->size(90);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('top');
        });

        $image->text($name_new_check_in, 1250, 850, function($font) {
            $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
            $font->size(65);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });

        $image->save(public_path('img/check_in/theme/test_1.png'));


        return $color_1;
    }

    function hex2rgba($color, $opacity = false) {
 
        $default = '0,0,0';
     
        //Return default if no color provided
        if(empty($color))
              return $default; 
     
        //Sanitize $color if "#" is provided 
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }
     
            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                    return $default;
            }
     
            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);
     
            //Check if opacity is set(rgba or rgb)
            if($opacity){
                $output = implode(",",$rgb).','.$opacity;
            } else {
                $output = implode(",",$rgb);
            }
     
            //Return rgb(a) color string
            return $output;
    }

}
