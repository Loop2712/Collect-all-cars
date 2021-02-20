@extends('layouts.news')

@section('meta')
<meta charset="UTF-8">
<meta name="description" content="HVAC Template">
<meta name="keywords" content="HVAC, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>viicheck News</title>

<meta property="og:url"           content="{{ url('/news') .'/'. $news_share->id }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $news_share->title }}" />
<meta property="og:description"   content="{{ $news_share->content }}" />
<meta property="og:image"         content="{{ url('/') .'/'. $news_share->cover_photo_facebook }}" />
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="border: none;" class="card">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <img width="100%" src="{{ url('storage')}}/{{ $news_share->photo }}">
                    </div>
                    <div class="col-12 col-md-5">
                        <br>
                        <div class="row">
                            <div class=" col-12 col-md-12"><h3><b>{{ $news_share->title }}</b></h3><br></div>
                            <div class=" col-12 col-md-11"><p>{{ $news_share->content }}</p></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class=" col-12 col-md-12"><span><b>สถานที่ : </b>{{ $news_share->location }}</span></div>
                            <div class=" col-12 col-md-11"><span><b>Reporter : </b>{{ $news_share->name }}</span></div>
                            <br><br>
                        </div>
                        <div class="row">
                            <div class="col-3 col-md-3">
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                                <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button_count"></div>
                            </div>
                            <div class="col-9 col-md-9">
                                @if(Auth::check())
                                    <div style="float: right;" class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/news') }}">
                                            <button style="background-color: #e35459" type="button" class="btn btn-sm text-light"><i class="far fa-newspaper"></i> ข่าวทั้งหมด</button>
                                        </a>
                                        <a href="{{ url('/') }}/my_news/{{Auth::user()->id}}">
                                            <button style="background-color: #d72329" type="button" class="btn btn-sm text-light"><i class="fas fa-user-tie"></i> ข่าวของฉัน</button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
