<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\News;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

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
            $news = News::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::latest()->paginate($perPage);
        }

        return view('news.index', compact('news'));
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
        
        $requestData = $request->all();

        $validatedData = $request->validate([
            'photo' => 'image'
        ]);

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            // เรียกรูปภาพใส่ $image
            $image = Image::make(storage_path("app/public")."/".$requestData['photo']);

            //  เช็คเนื้อหาที่รุนแรง
            if ($requestData['severe'] == 'Yes') {
                $image = Image::make(storage_path("app/public")."/".$requestData['photo'])->greyscale();
            }

            // ปรับขนาดภาพ
            $image->fit(940, 788);

            //ลายน้ำ
            $watermark = Image::make(public_path('img/bg car/watermark-logo.png'));
            $image->insert($watermark , 'top-right', 15, 15)->save();

            // สร้างชื่อไฟล์
            $news = uniqid('Cover-photo-', true);

            // ใส่ template
            $bg = Image::make(public_path('img/bg car/news-01.png'));
            $image->insert($bg)->save('img/news/'.$news.'.png');

            // หัวข้อข่าว
            $image->text($requestData['title'], 30, 595, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(60);
                $font->color('#FFFFFF');
            });

            // สถานที่
            $image->text($requestData['location'], 30, 660, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(30);
                $font->color('#FFFFFF');
            });

            $date_now = date("d-m-Y");

            // วันที่เพิ่มข่าว
            $image->text($date_now, 780, 675, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                $font->size(26);
                $font->color('#FFFFFF');
            });

            // reporter
            $image->text('REPORTER : '.$requestData['name'], 15, 770, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Italic.ttf'));
                $font->size(22);
                $font->color('#FFFFFF');
            });

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

        return redirect('news')->with('flash_message', 'News added!');
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
            return redirect('news/create');
        }else{
            return redirect('/login/line?redirectTo=news/create');
        }
    }
}
