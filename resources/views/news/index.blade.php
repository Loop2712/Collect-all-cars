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
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div style="border : none;" class="card">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-12 col-md-6">
                        <div class="btn-group float-right " role="group" aria-label="Basic example">
                            <button style="background-color: #e26a6c;color: #fff" type="button" class="btn btn-sm" onclick="near_news();"><i class="fas fa-map-pin"></i> &nbsp;ใกล้ฉัน</button>
                            <button style="background-color: #db474a;color: #fff;" type="button" class="btn btn-sm" onclick="bangkok_news();"><i class="fas fa-city"></i> &nbsp;กรุงเทพฯ ปริมณฑล</button>
                            <button style="background-color: #d62e31;color: #fff" type="button" class="btn btn-sm" onclick="all_news();"><i class="far fa-newspaper"></i> &nbsp;ทั้งหมด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<!-- ข่าวทั้งหมด -->
<div id="all_news" class="container">
    <h4 style="padding-top: 7px;" class="text-info">ข่าวทั้งหมด</h4>
    <br>
    <div class="row">
        @foreach($news as $item)
        <div class="col-12 col-md-4">
            <div class="card" style="width: 22rem;">
                <img src="{{ $item->cover_photo }}" class="card-img-top" >
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;" class="card-text">{{ $item->content }}</p>
                    <hr>
                    <p><b>REPORTER :</b> {{ $item->name }}</p>
                    <!-- <a href="#" class="btn btn-primary float-right">อ่านเพิ่มเติม..</a> -->
                    <a href="{{ url('/news/' . $item->id) }}" title="อ่านเพิ่มเติม.."><button class="float-right btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> อ่านเพิ่มเติม..</button></a>
                </div>
            </div>
            <br>
        </div>
        @endforeach
    </div>
    <hr>
</div>

<!-- กรุงเทพฯ ปริมณฑล -->
<div id="bangkok_news" class="container d-none">
    <h4 style="padding-top: 7px;" class="text-info">กรุงเทพและปริมณฑล</h4>
    <br>
    <div class="row">
        @foreach($bangkok as $item)
        <div class="col-12 col-md-4">
            <div class="card" style="width: 22rem;">
                <img src="{{ $item->cover_photo }}" class="card-img-top" >
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;" class="card-text">{{ $item->content }}</p>
                    <hr>
                    <p><b>REPORTER :</b> {{ $item->name }}</p>
                    <!-- <a href="#" class="btn btn-primary float-right">อ่านเพิ่มเติม..</a> -->
                    <a href="{{ url('/news/' . $item->id) }}" title="อ่านเพิ่มเติม.."><button class="float-right btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> อ่านเพิ่มเติม..</button></a>
                </div>
            </div>
            <br>
        </div>
        @endforeach
    </div>
    <hr>
</div>


<!-- ใกล้ฉัน -->
<div id="near_news" class="container d-none">
    <h4 style="padding-top: 7px;" class="text-info">ใกล้ฉัน</h4>
    <input type="hidden" id="lat" name="lat" readonly>
     <input type="hidden" id="lng" name="lng" readonly> 
    <br>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card" style="width: 22rem;">
                <img id="near_img" src="" class="card-img-top" >
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;" class="card-text"><span id="near_content"></span></p>
                    <hr>
                    <p><b>REPORTER :</b> <span id="near_name"></span></p>
                    <!-- <a href="#" class="btn btn-primary float-right">อ่านเพิ่มเติม..</a> -->
                    <a id="near_id" href="" title="อ่านเพิ่มเติม.."><button class="float-right btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> อ่านเพิ่มเติม..</button></a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <hr>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
    getLocation();
});

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    let lat = document.querySelector("#lat");
    let lng = document.querySelector("#lng");

        lat.value = position.coords.latitude ;
        lng.value = position.coords.longitude ;

        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        fetch("{{ url('/') }}/api/near_news/" + lat.value +"/"+lng.value+"/news")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let near_img = document.querySelector("#near_img");
                let near_name = document.querySelector("#near_name");
                let near_content = document.querySelector("#near_content");
                let near_id = document.querySelector("#near_id");

                for(let item of result){
                    near_name.innerHTML = item.name
                    near_img.src = item.cover_photo
                    near_content.innerHTML = item.content
                    near_id.href = "{{ url('/') }}/news/"+item.id
                }
                
            });
}
function all_news() {
    document.querySelector('#all_news').classList.remove('d-none');
    document.querySelector('#bangkok_news').classList.add('d-none');
    document.querySelector('#near_news').classList.add('d-none');
}

function bangkok_news() {
    document.querySelector('#all_news').classList.add('d-none');
    document.querySelector('#bangkok_news').classList.remove('d-none');
    document.querySelector('#near_news').classList.add('d-none');
}

function near_news() {
    document.querySelector('#all_news').classList.add('d-none');
    document.querySelector('#bangkok_news').classList.add('d-none');
    document.querySelector('#near_news').classList.remove('d-none');
}
</script>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">News</div>
                <div class="card-body">
                    <a href="{{ url('/news/create') }}" class="btn btn-success btn-sm" title="Add New News">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/news') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Location</th>
                                    <th>Photo</th>
                                    <th>Cover photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td><img width="150" src="{{ url('storage')}}/{{ $item->photo }}" ></td>
                                    <td><img width="150" src="{{ $item->cover_photo }}" ></td>
                                    <td>
                                        <a href="{{ url('/news/' . $item->id) }}" title="View News"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/news/' . $item->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
