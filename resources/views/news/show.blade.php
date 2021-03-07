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

<meta property="og:url"           content="{{ url()->full() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $news->title }}" />
<meta property="og:description"   content="{{ $news->content }}" />
<meta property="og:image"         content="{{ url( $news->cover_photo_facebook) }}" />
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="border: none;" class="card">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <img width="100%" src="{{ url('storage')}}/{{ $news->photo }}">
                    </div>
                    <div class="col-12 col-md-5">
                        <br>
                        <div class="row">
                            <div class=" col-12 col-md-12"><h3><b>{{ $news->title }}</b></h3><br></div>
                            <div class=" col-12 col-md-11"><p>{{ $news->content }}</p></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class=" col-12 col-md-12"><span><b>สถานที่ : </b>{{ $news->location }}</span></div>
                            <div class=" col-12 col-md-11"><span><b>Reporter : </b>{{ $news->name }}</span></div>
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
                            <div class="col-8 "></div>
                            <div class="col-4 ">
                                <a style="float: right;" class="btn btn-sm btn-warning text-light" onclick="clickReport_content();"><i class="fas fa-ban"></i> Report</a>
                            </div>
                            <br><br>
                            <div class="col-9 "></div>
                            <div class="col-3 ">
                                @if(Auth::check())
                                    @if(Auth::user()->id == $news->user_id )
                                        <div style="float: right;">
                                            <form  method="POST" action="{{ url('/news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button  type="submit" class="btn btn-outline-secondary btn-sm" title="Delete News" onclick="return confirm(&quot; คุณต้องการที่จะลบใช่หรือไม่ ?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>
                                        </div>
                                    @endif 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button id="btn_report_content" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#report_content">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="report_content" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="staticBackdropLabel">เหตุผลการ Report</h5>
        <button id="Close_report_content" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="radio" name="select_content" id="1" value="1" onclick="document.querySelector('#content').value ='1';"> เนื้อหาโป๊เปลือย และกิจกรรมทางเพศ<br>(nudity & sexual activity)
        <br><br>
        <input type="radio" name="select_content" id="2" value="2" onclick="document.querySelector('#content').value ='2';"> เนื้อหาความรุนแรง<br>(content violence)
        <br><br>
        <input type="radio" name="select_content" id="3" value="3" onclick="document.querySelector('#content').value ='3';"> โฆษณาชวนเชื่อของผู้ก่อการร้าย <br>(terrorist propaganda)
        <br><br>
        <input type="radio" name="select_content" id="4" value="4" onclick="document.querySelector('#content').value ='4';"> เนื้อหาที่ใช้วาจาสร้างความเกลียดชัง <br>(hate speech)
        <br><br>
        <input type="radio" name="select_content" id="5" value="5" onclick="document.querySelector('#content').value ='5';"> บัญชีผู้ใช้ปลอม (fake accounts)
        <br><br>
        <input type="radio" name="select_content" id="6" value="6" onclick="document.querySelector('#content').value ='6';"> สแปม (spam)

        <input type="hidden" name="news_id" id="news_id" value="{{$news->id}}">
        <input type="hidden" name="content" id="content" value="">
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="addCount_report();">Report</button>
      </div>
    </div>
  </div>
</div>

<!-- Close -->
<!-- Button trigger modal -->
<button id="btn_Close" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Modal_Close">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_Close" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>ระบบได้รับการรายงานของคุณแล้ว <br>
        ขอขอบพระคุณอย่างสูง</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>



    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">News {{ $news->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/news/' . $news->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $news->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Title </th>
                                        <td> {{ $news->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Content </th>
                                        <td> {{ $news->content }} </td>
                                    </tr>
                                    <tr>
                                        <th> Location </th>
                                        <td> {{ $news->location }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
});

function clickReport_content() {
    document.getElementById("btn_report_content").click();
    
}

function addCount_report() {

    let news_id = document.querySelector("#news_id");
    let content = document.querySelector("#content");
    console.log(news_id.value);
    console.log(content.value);

    fetch("{{ url('/') }}/report/" + news_id.value + "/" + content.value)
    Close();
}

function Close() {
    document.getElementById("btn_Close").click();
    document.getElementById("Close_report_content").click();

    
}
</script>
@endsection
