<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OcrController extends Controller
{
     public function ocr_capture($img)
    {
        $carbrand = "สวัสดี"
        \OCR::scan($img);
            
        return $carbrand;
    }
}
