<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function download_sticker($text_1 , $text_2)
    {
        $image_sticker = Image::make(public_path('img/more/sticker-VII-v-nonetext.png'));
        $image_sticker->backup();


        $image_sticker->text($text_1, 170, 320, function($font) {
                $font->size(50);
                $font->color('#FFFFFF');
            });

        $image_sticker->save();

        // echo $image_sticker;
        echo $text_1 ;
        echo "<br>";
        echo $text_2 ;



        return redirect('/');

    }
}
