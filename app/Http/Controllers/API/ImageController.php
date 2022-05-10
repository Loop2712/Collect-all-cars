<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\Models\Partner;

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
        $type_of = $data['type_of'];

        $check_new_area = Partner::where('name' , $name_partner)->where('name_area' , $name_new_check_in)->get();

        foreach ($check_new_area as $key ) {
            $check_id_area = $key->id ;
        }

        if (!empty($check_id_area)) {
            return "already have this area" ;
        }else{

            $data_partners = Partner::where('name' , $name_partner)->where('name_area' , null)->get();

            // สร้างพาร์ทเนอร์ย่อย
            foreach ($data_partners as $item) {

                $requestData['name'] = $name_partner ;
                $requestData['phone'] = $item->phone ;
                $requestData['mail'] = $item->mail ;
                $requestData['name_area'] = $name_new_check_in ;
                $requestData['full_name'] = $item->full_name ;

                $img_logo_partner = $item->logo ;

            }

            if ($type_of == "check_in") {
                Partner::create($requestData);
            }

            $color_hex = $this->hex2rgba($color_theme) ;
            $color_sp = explode(",",$color_hex);
            $color_1 = intval($color_sp[0] / 255 * 100);
            $color_2 = intval($color_sp[1] / 255 * 100);
            $color_3 = intval($color_sp[2] / 255 * 100);

            // เรียกรูปภาพใส่ $image // logo viicheck && sticker
            $image = Image::make(public_path('img/check_in/theme/viicheck-02.png'));

            $image->orientate();

            // QR-code
            $watermark_2 = Image::make( storage_path("app/public") . "/" .  $url_img );
            $image->insert($watermark_2 ,'bottom-right', 385, 150);

            // หัวภาพ
            $watermark = Image::make(public_path('img/check_in/theme/artwork_ใหม่ล่าสุดกว่าเยอะ.png'));
            // ระบายสี
            $watermark->colorize( $color_1 , $color_2 , $color_3 );
            // $watermark->colorize( 50, 0, 0 );
            $image->insert($watermark);

            // logo partner
            $logo_partner = Image::make( storage_path("app/public") . "/" .  $img_logo_partner );
            $image->insert($logo_partner,'top-right', 40, 20);

            $image->text($name_partner, 530, 205, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(65);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });

            $image->text($name_new_check_in, 750, 810, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(45);
                $font->color('#000000');
                $font->align('center');
                $font->valign('top');
            });

            $image->save( storage_path("app/public")."/check_in". "/" . 'artwork_' . $name_partner . '_' . $name_new_check_in . '.png' );

            return "OK";
        }
        
    }

    function hex2rgba($color, $opacity = false) {
 
        $default = '255,0,0';
     
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
