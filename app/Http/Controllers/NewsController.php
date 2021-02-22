<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\News;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $news = News::where('active', "Yes")
                ->where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::where('active', "Yes")->latest()->paginate($perPage);
        }

        $bangkok = DB::select("SELECT *,( 3959 * acos( cos( radians(13.7649136) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(100.5360959) ) + sin( radians(13.7649136) ) * sin( radians( lat ) ) ) ) AS distance FROM news WHERE active = 'Yes'  HAVING distance < 30 ORDER BY id DESC LIMIT 0 ,5000", []);

        return view('news.index', compact('news', 'bangkok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // หาประเภทมือถือผู้ใช้
        // $_SERVER["HTTP_USER_AGENT"];
        // $split_1 = explode("(", $_SERVER["HTTP_USER_AGENT"]);
        // $split_2 = explode(";", $split_1[1]);
        // $os = $split_2[0];

        $date_now = date("d-m-Y");

        $requestData = $request->all();
        $requestData['rotation'] = str_replace("-", "+", $requestData['rotation']);
        $requestData['rotation'] = str_replace("*", "-", $requestData['rotation']);

        $validatedData = $request->validate([
            'photo' => 'image'
        ]);

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            // เรียกรูปภาพใส่ $image
            $image = Image::make(storage_path("app/public")."/".$requestData['photo']);
            $image_facebook = Image::make(storage_path("app/public")."/".$requestData['photo']);

            // หมุนภาพ
            // if ($os == "iPhone") {
            //     $image->rotate(-90);
            //     $image_facebook->rotate(-90);
            // }else{
            //     $image->rotate($requestData['rotation']);
            //     $image_facebook->rotate($requestData['rotation']);
            // }
            
            $image->orientate();
            $image_facebook->orientate();

            $image->rotate($requestData['rotation']);
            $image_facebook->rotate($requestData['rotation']);

            //  เช็คเนื้อหาที่รุนแรง
            if ($requestData['severe'] == 'Yes') {
                $image = Image::make(storage_path("app/public")."/".$requestData['photo'])->greyscale();
                $image_facebook = Image::make(storage_path("app/public")."/".$requestData['photo'])->greyscale();
            }

            // facebook
            // ปรับขนาดภาพ
            $image_facebook->fit(1200, 628);

            //ลายน้ำ
            $watermark_facebook = Image::make(public_path('img/bg car/watermark-logo.png'));
            $image_facebook->insert($watermark_facebook , 'top-right', 15, 15)->save();

            // สร้างชื่อไฟล์
            $news_facebook = uniqid('Cover-photo-', true);

            // ใส่ template
            $bg_facebook = Image::make(public_path('img/bg car/news-02.png'));
            $image_facebook->insert($bg_facebook)->save('img/facebook/'.$news_facebook.'.png');

            // หัวข้อข่าว
            $image_facebook->text($requestData['title'], 30, 460, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(50);
                $font->color('#FFFFFF');
            });

            // สถานที่
            $image_facebook->text($requestData['location'], 30, 555, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(35);
                $font->color('#FFFFFF');
            });

            // วันที่เพิ่มข่าว
            $image_facebook->text($date_now, 1025, 500, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                $font->size(26);
                $font->color('#FFFFFF');
            });

            // reporter
            $image_facebook->text('REPORTER : '.$requestData['name'], 30, 610, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                $font->size(22);
                $font->color('#FFFFFF');
            });

            $size_facebook = $image_facebook->filesize();  

            if($size_facebook > 112000 ){
                $image_facebook->resize(
                    intval($image_facebook->width()/2) , 
                    intval($image_facebook->height()/2)
                )->save(); 
            }

            $requestData['cover_photo_facebook'] = 'img/facebook/'.$news_facebook.'.png';
            // endfacebook

            // WEB
            // ปรับขนาดภาพ
            $image->fit(940);

            //ลายน้ำ
            $watermark = Image::make(public_path('img/bg car/watermark-logo.png'));
            $image->insert($watermark , 'top-right', 15, 15)->save();

            // สร้างชื่อไฟล์
            $news = uniqid('Cover-photo-', true);

            // ใส่ template
            $bg = Image::make(public_path('img/bg car/news-01.png'));
            $image->insert($bg)->save('img/news/'.$news.'.png');

            // นับตัวอักษร
            function utf8_strlen($s) {
                $c = strlen($s); $l = 0;
                    for ($i = 0; $i < $c; ++$i)
                        if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
                    return $l;
                }
            
            // echo $cuont_str;
            // exit(); 

            // หัวข้อข่าว
            $cuont_str =  utf8_strlen($requestData['title']);
            if ($cuont_str >= 23 && $cuont_str <= 30) {
                $image->text($requestData['title'], 30, 665, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-SemiBoldItalic.ttf'));
                    $font->size(60);
                    $font->color('#FFFFFF');
                });
            }elseif($cuont_str < 23 ){
                $image->text($requestData['title'], 30, 665, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-SemiBoldItalic.ttf'));
                    $font->size(80);
                    $font->color('#FFFFFF');
                });
            }

            // สถานที่
            $cuont_lo =  utf8_strlen($requestData['location']);
            if ($cuont_lo >= 35 && $cuont_lo < 44) {
                $image->text($requestData['location'], 30, 738, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Regular.ttf'));
                    $font->size(37);
                    $font->color('#FFFFFF');
                });
            }elseif($cuont_lo < 34 ){
                $image->text($requestData['location'], 30, 738, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Regular.ttf'));
                    $font->size(43);
                    $font->color('#FFFFFF');
                });
            }elseif($cuont_lo >= 45  ){
                $location = $requestData['location'];
                $split_location = explode(" ", $location);
                $image->text($split_location[1]." ".$split_location[2], 30, 738, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Regular.ttf'));
                    $font->size(43);
                    $font->color('#FFFFFF');
                });
            }

            // วันที่เพิ่มข่าว
            $image->text("วันที่ : ".$date_now, 620, 820, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(36);
                $font->color('#FFFFFF');
            });

            // reporter
            $cuont_reporter =  utf8_strlen($requestData['name']);
            $name = $requestData['name'];
            if ($cuont_reporter >= 16 ) {
                $split = explode(" ", $name);
                $image->text('REPORTER : '.$split[0], 30, 820, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                    $font->size(34);
                    $font->color('#FFFFFF');
                });
            }elseif($cuont_reporter < 15 ){
                $image->text('REPORTER : '.$name, 30, 820, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                    $font->size(34);
                    $font->color('#FFFFFF');
                });
            }

            $size = $image->filesize();  

            if($size > 112000 ){
                $image->resize(
                    intval($image->width()/2) , 
                    intval($image->height()/2)
                )->save(); 
            }

            $requestData['cover_photo'] = 'img/news/'.$news.'.png';

        }
        
        News::create($requestData);

        // $this->share($requestData['user_id']);
        $user_id = $requestData['user_id'];
        $date = date("Y-m-d");

        $news_share = News::where('user_id', $user_id)
                    ->whereDate('created_at', $date)
                    ->orderBy('created_at', 'desc')
                    ->first();

        return view('news.share', compact('news_share'));

        // return redirect('news')->with('flash_message', 'News added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $news = News::findOrFail($id);
        $news->update($requestData);

        return redirect('news')->with('flash_message', 'News updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        News::destroy($id);

        return redirect('news')->with('flash_message', 'News deleted!');
    }

    public function reporter()
    {
        if(Auth::check()){
            return redirect('news/create?openExternalBrowser=1');
        }else{
            return redirect('/login/line?redirectTo=news/create?openExternalBrowser=1');
        }
    }

    public function near_news(Request $request)
    {
        $requestData = $request->all();

        $lat = $requestData['lat'];
        $lng = $requestData['lng'];

        $near_news = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM news WHERE active = 'Yes' HAVING distance < 30 ORDER BY distance LIMIT 0 ,5000", []);

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        return view('news.near_news', compact('near_news'));
    }

    public function my_news($user_id)
    {
        $my_news = News::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($my_news);
        // echo "<pre>";

        return view('news.my_news', compact('my_news'));

    }

}
