@extends('layouts.partners.theme_partner_new')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-12 col-lg-4">
            <div class="row">
                <div class="col-12">
                    <a style="float: left; background-color: green;" type="button" class="btn text-white" onclick="initMap();">
                        <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                    </a>
                </div>
                <div class="col-12">
                    <input class="d-none" type="text" id="va_zoom" name="" value="6">
                    <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                    <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                    @foreach($data_partners as $data_partner)
                        <input class="d-none" type="text" id="name_partner" name="" value="{{ $data_partner->name }}">
                    @endforeach
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------------------- pc -------------------------------------------------->
        <div class="col-8 d-none d-lg-block" >
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('/sos_detail_partner') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูช่วงเวลา <i class="fas fa-chart-line"></i></a>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'admin-partner')
                    <a href="{{ url('/sos_score_helper') }}" type="button" style="float: right;" class="btn btn-primary text-white">คะแนนการช่วยเหลือ </a>
                        @endif
                    @endif
                </div>
                <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                    <div class="card-header border-bottom-0 bg-transparent">
                        <div class="d-flex align-items-center">
                            <div class="col-12">
                                <h5 class="font-weight-bold mb-0" style="margin-top:10px;">ขอความช่วยเหลือ
                                    <span style="font-size: 15px; float: right; margin-top:-5px;">จำนวนทั้งหมด {{ $count_data }}</span>
                                </h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead>
                                    <tr class="text-center">
                                    <div class="row  text-center">
                                        <div class="col-3">
                                            <b>ชื่อ</b><br>
                                            Name
                                        </div>
                                        <div class="col-2">
                                            <b>เบอร์</b><br>
                                            Phone
                                        </div>
                                        <div class="col-3">
                                            <b>เวลา</b><br>
                                            Time
                                        </div>
                                        <div class="col-2">
                                            <b>รูปภาพ</b><br>
                                            Photo
                                        </div>
                                        <div class="col-2">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                        </div>
                                    </div>
                                    </tr>
                                </thead>
                                <hr style="color:black;background-color:black;height:2px">
                                <tbody>
                                    @foreach($view_maps as $item)
                                    <div class="row text-center" style="margin-top:0px;">
                                            <div class="col-3" style="padding:0px;">
                                                <h5 class="text-success float-left">
                                                    <span style="font-size: 15px;">
                                                        <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                                        <i class="far fa-eye text-primary"></i>
                                                        </a>
                                                    </span>&nbsp;{{ $item->name }}
                                                </h5>
                                            </div>
                                            <div class="col-2 " style="padding:0px;font-size:13px">
                                                {{ $item->phone }}
                                            </div>
                                            <div class="col-3" style="padding:0px;font-size:13px">
                                                    {{ date("d/m/Y" , strtotime($item->created_at)) }} <br>
                                                    {{ date("H:i" , strtotime($item->created_at)) }}
                                            </div>
                                            <div class="col-2" style="padding:0px;">
                                                @if(!empty($item->photo))
                                                    <a href="#" class="link text-success" data-toggle="collapse" data-target="#img_photo_{{ $loop->iteration }}" aria-expanded="false" aria-controls="img_photo_{{ $loop->iteration }}">
                                                        <i class="fas fa-search"></i>
                                                        ดูรูปภาพ
                                                    </a>
                                                    <div class="collapse container-fluid" id="img_photo_{{ $loop->iteration }}">
                                                        <br>
                                                        <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                                            <img width="100%" src="{{ url('storage')}}/{{ $item->photo }}">
                                                        </a>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                            <div class="col-2" style="padding:0px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}', '{{ $item->id }}');">
                                                            <i class="fas fa-map-marker-alt"></i> 
                                                            <br>
                                                            ดูหมุด
                                                        </a>
                                                    </div>
                                                    <div class="col-12 d-none">
                                                        <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-location-arrow"></i> 
                                                            <br>
                                                            นำทาง
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'admin-partner' or Auth::user()->id == $item->helper_id)
                                                    <div class="col-12 text-left" style="margin-top:5px;">
                                                        <h5>คะแนนการช่วยเหลือ</h5>
                                                        <div class="row">
                                                            <div class="col-2" style="padding:0px">
                                                                ผู้ใช้การช่วย : <br>{{$item->helper}}
                                                            </div>
                                                            <div class="col-2" style="padding:0px">
                                                                @if($item->score_impression < 3)
                                                                    ความประทับใจ : <br>
                                                                    <span class="text-danger">{{$item->score_impression}}</span>
                                                                @elseif($item->score_impression == 3)
                                                                    ความประทับใจ : <br>
                                                                    <span class="text-warning">{{$item->score_impression}}</span>
                                                                @elseif($item->score_impression > 3)
                                                                    ความประทับใจ : <br>
                                                                    <span class="text-success">{{$item->score_impression}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-2" style="padding:0px">
                                                                @if($item->score_period < 3)
                                                                    ระยะเวลา : <br>
                                                                    <span class="text-danger">{{$item->score_period}}</span>
                                                                @elseif($item->score_period == 3)
                                                                    ระยะเวลา : <br>
                                                                    <span class="text-warning">{{$item->score_period}}</span>
                                                                @elseif($item->score_period > 3)
                                                                    ระยะเวลา : <br>
                                                                    <span class="text-success">{{$item->score_period}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-2" style="padding:0px">
                                                                @if($item->score_total < 3)
                                                                    ภาพรวม : <br>
                                                                    <span class="text-danger">{{$item->score_total}}</span>
                                                                @elseif($item->score_total == 3)
                                                                    ภาพรวม : <br>
                                                                    <span class="text-warning">{{$item->score_total}}</span>
                                                                @elseif($item->score_total > 3)
                                                                    ภาพรวม : <br>
                                                                    <span class="text-success">{{$item->score_total}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-4" style="padding:0px">
                                                                คำแนะนำ/ติชม : <br>{{$item->comment_help}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <hr style="margin-top:25px;">
                                    <!-- asda -->
                                        <!-- <tr class="text-center">
                                            <td>
                                                <h6 class="text-success float-left">
                                                    <span style="font-size: 15px;">
                                                        <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                                        <i class="far fa-eye text-primary"></i>
                                                        </a>
                                                    </span>&nbsp;{{ $item->name }}
                                                </h6>
                                            </td>
                                            <td> {{ $item->phone }}</td>
                                            <td>
                                                {{ date("d F Y" , strtotime($item->created_at)) }} <br>
                                                {{ date("H:i" , strtotime($item->created_at)) }}
                                            </td>
                                            <td>
                                                @if(!empty($item->photo))
                                                    <a href="#" class="link text-success" data-toggle="collapse" data-target="#img_photo_{{ $loop->iteration }}" aria-expanded="false" aria-controls="img_photo_{{ $loop->iteration }}">
                                                        <i class="fas fa-search"></i>
                                                        ดูรูปภาพ
                                                    </a>
                                                    <div class="collapse container-fluid" id="img_photo_{{ $loop->iteration }}">
                                                        <br>
                                                        <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                                            <img width="100%" src="{{ url('storage')}}/{{ $item->photo }}">
                                                        </a>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <div class="col-12">
                                                    <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}', '{{ $item->id }}');">
                                                        <i class="fas fa-map-marker-alt"></i> 
                                                        <br>
                                                        ดูหมุด
                                                    </a>
                                                </div>
                                                <div class="col-12 d-none">
                                                    <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                        <i class="fas fa-location-arrow"></i> 
                                                        <br>
                                                        นำทาง
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> -->
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination round-pagination " style="margin-top:10px;"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- <div class="col-8 d-none d-lg-block" >
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('/sos_detail_partner') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูช่วงเวลา <i class="fas fa-chart-line"></i></a>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'admin-partner')
                    <a href="{{ url('/sos_score_helper') }}" type="button" style="float: right;" class="btn btn-primary text-white">คะแนนการช่วยเหลือ </a>
                        @endif
                    @endif
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ขอความช่วยเหลือ 
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ $count_data }}</span>
                        </h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary text-center">
                                        <div class="col-3">
                                            <b>ชื่อ</b><br>
                                            Name
                                        </div>
                                        <div class="col-2">
                                            <b>เบอร์</b><br>
                                            Phone
                                        </div>
                                        <div class="col-3">
                                            <b>เวลา</b><br>
                                            Time
                                        </div>
                                        <div class="col-2">
                                            <b>รูปภาพ</b><br>
                                            Photo
                                        </div>
                                        <div class="col-2">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                        </div>
                                    </div>
                                    @foreach($view_maps as $item)
                                        <div class="row text-center" style="margin-top:20px;">
                                            <div class="col-3">
                                                <h5 class="text-success float-left">
                                                    <span style="font-size: 15px;">
                                                        <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                                        <i class="far fa-eye text-primary"></i>
                                                        </a>
                                                    </span>&nbsp;{{ $item->name }}
                                                </h5>
                                            </div>
                                            <div class="col-2">
                                                {{ $item->phone }}
                                            </div>
                                            <div class="col-3">
                                                <h6>
                                                    {{ $item->created_at }}
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                @if(!empty($item->photo))
                                                    <a href="#" class="link text-success" data-toggle="collapse" data-target="#img_photo_{{ $loop->iteration }}" aria-expanded="false" aria-controls="img_photo_{{ $loop->iteration }}">
                                                        <i class="fas fa-search"></i>
                                                        ดูรูปภาพ
                                                    </a>
                                                    <div class="collapse container-fluid" id="img_photo_{{ $loop->iteration }}">
                                                        <br>
                                                        <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                                            <img width="100%" src="{{ url('storage')}}/{{ $item->photo }}">
                                                        </a>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}', '{{ $item->id }}');">
                                                            <i class="fas fa-map-marker-alt"></i> 
                                                            <br>
                                                            ดูหมุด
                                                        </a>
                                                    </div>
                                                    <div class="col-12 d-none">
                                                        <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-location-arrow"></i> 
                                                            <br>
                                                            นำทาง
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'admin-partner' or Auth::user()->id == $item->helper_id)
                                                    <div class="col-12 text-left" style="margin-top:5px;">
                                                        <h4>คะแนนการช่วยเหลือ</h4>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <b>ผู้ใช้การช่วย : </b><br>{{$item->helper}}
                                                            </div>
                                                            <div class="col-2">
                                                                @if($item->score_impression < 3)
                                                                    <b>ความประทับใจ : </b><br>
                                                                    <span class="text-danger">{{$item->score_impression}}</span>
                                                                @elseif($item->score_impression == 3)
                                                                    <b>ความประทับใจ : </b><br>
                                                                    <span class="text-warning">{{$item->score_impression}}</span>
                                                                @elseif($item->score_impression > 3)
                                                                    <b>ความประทับใจ : </b><br>
                                                                    <span class="text-success">{{$item->score_impression}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-2">
                                                                @if($item->score_period < 3)
                                                                    <b>ระยะเวลา : </b><br>
                                                                    <span class="text-danger">{{$item->score_period}}</span>
                                                                @elseif($item->score_period == 3)
                                                                    <b>ระยะเวลา : </b><br>
                                                                    <span class="text-warning">{{$item->score_period}}</span>
                                                                @elseif($item->score_period > 3)
                                                                    <b>ระยะเวลา : </b><br>
                                                                    <span class="text-success">{{$item->score_period}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-2">
                                                                @if($item->score_total < 3)
                                                                    <b>ภาพรวม : </b><br>
                                                                    <span class="text-danger">{{$item->score_total}}</span>
                                                                @elseif($item->score_total == 3)
                                                                    <b>ภาพรวม : </b><br>
                                                                    <span class="text-warning">{{$item->score_total}}</span>
                                                                @elseif($item->score_total > 3)
                                                                    <b>ภาพรวม : </b><br>
                                                                    <span class="text-success">{{$item->score_total}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-4">
                                                                <b>คำแนะนำ/ติชม : </b><br>{{$item->comment_help}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <hr style="margin-top:25px;">
                                    @endforeach
                                     <div class="pagination-wrapper"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!----------------------------------------------------- end pc ----------------------------------------------------->
    </div>
</div>
<!------------------------------------------------ mobile---------------------------------------------------------------------- -->
<div class="col-12 d-block d-lg-none">
            <div class="row">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12" style="padding: 0px">
                            <div class="card" >
                                <h3 class="card-header">ขอความช่วยเหลือ
                                <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ $count_data }}</span>
                                </h3>
                                <div class="col-12 ">
                                    <a href="{{ url('/sos_detail_partner') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูช่วงเวลา <i class="fas fa-chart-line"></i></a>
                                </div>
                                <div class="card-body" style="padding: 0px 10px 0px 10px">
                                    @foreach($view_maps as $item)
                                        @foreach($data_partners as $data_partner)
                                            <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                                        @endforeach
                                            <center>
                                                <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                                                    <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                        <a class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}' , '{{ $item->id }}');">
                                                            <i class="fas fa-map-marker-alt"></i> 
                                                            <br>
                                                            ดูหมุด
                                                        </a> 
                                                        <br>
                                                        <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-location-arrow"></i> 
                                                            <br>
                                                            นำทาง
                                                        </a>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" style="margin-bottom:0px;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                        <center class="col-12">
                                                            <h5 style="margin-bottom:0px; margin-top:0px; ">
                                                            <a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>
                                                                {{ $item->name }}
                                                            </h5>
                                                        </center>
                                                    </div> 
                                                    <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                        <i class="fas fa-angle-down" ></i>
                                                    </div>
                                                    <div class="col-12 collapse" id="sos_{{ $item->id }}"> 
                                                        <hr>
                                                        <p style="font-size:18px;padding:0px"> เบอร์ :  {{ $item->phone }}  </p> <hr>
                                                        <p style="font-size:18px;padding:0px">วันที่แจ้ง <br> 
                                                            
                                                            {{ date("l d F Y" , strtotime($item->created_at)) }}
                                                            <br>
                                                        </p>  <hr>
                                                        <p style="font-size:18px;padding:0px"> เวลา:  {{ date("H:i" , strtotime($item->created_at)) }}
                                                            
                                                        </p>
                                                         <hr>
                                                        <p style="font-size:18px;padding:0px">รูปภาพ <br> 
                                                            <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                                                <img width="100%" src="{{ url('storage')}}/{{ $item->photo }}">
                                                            </a>
                                                        </p>  
                                                    </div>
                                                </div>
                                            </center>   
                                        </div>  
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <!------------------------------------------------ end mobile---------------------------------------------------------------------- -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(95vh);
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();

    });

    var draw_area ;
    var map ;
    var marker ;

    function initMap() {

        let name_partner = document.querySelector('#name_partner');

        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 13.7248936, lng: 100.4930264 },
            zoom: 10,
        });

        fetch("{{ url('/') }}/api/all_area_partner/" + name_partner.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {

                    // console.log(JSON.parse(result[ii]['sos_area']));

                    let draw_area_other = new google.maps.Polygon({
                        paths: JSON.parse(result[ii]['sos_area']),
                        strokeColor: "#008450",
                        strokeOpacity: 0.8,
                        strokeWeight: 1,
                        fillColor: "#008450",
                        fillOpacity: 0.25,
                    });
                    draw_area_other.setMap(map);

                }

                //ปักหมุด
                let image = "https://www.viicheck.com/img/icon/flag_2.png";
                @foreach($view_maps_all as $view_map)
                @if(!empty($item->lat))
                    marker = new google.maps.Marker({
                        position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                        map: map,
                        icon: image,
                    });  
                @endif   
                @endforeach
                
            });

    }

    // function view_marker(lat , lng , sos_id){

    //     let name_partner = document.querySelector('#name_partner').value;
    //     let name_area = null ;

    //     fetch("{{ url('/') }}/api/area_current/"+name_partner  + '/' + name_area)
    //         .then(response => response.json())
    //         .then(result => {
    //             // console.log(result);

    //             var bounds = new google.maps.LatLngBounds();

    //             for (let ix = 0; ix < result.length; ix++) {
    //                 bounds.extend(result[ix]);
    //             }

    //         map = new google.maps.Map(document.getElementById("map"), {
    //             zoom: 18,
    //             center: { lat: parseFloat(lat), lng: parseFloat(lng) },
    //         });

    //         // Construct the polygon.
    //         draw_area = new google.maps.Polygon({
    //             paths: result,
    //             strokeColor: "#008450",
    //             strokeOpacity: 0.8,
    //             strokeWeight: 1,
    //             fillColor: "#008450",
    //             fillOpacity: 0.25,
    //         });
    //         draw_area.setMap(map);

    //         let image = "https://www.viicheck.com/img/icon/flag_2.png";
    //         let image2 = "https://www.viicheck.com/img/icon/flag_3.png";
    //         marker = new google.maps.Marker({
    //             position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
    //             map: map,
    //             icon: image,
    //         });  

    //         @foreach($view_maps as $view_map)
    //             if ( {{ $view_map->id }} !== parseFloat(sos_id) ) {
    //                 marker = new google.maps.Marker({
    //                     position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
    //                     map: map,
    //                     icon: image2,
    //                 });
    //             }
    //         @endforeach

    //         const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };

    //         let infoWindow = new google.maps.InfoWindow({
    //             content: "Lat :" + lat + "<br>" + "Lat :" + lng,
    //             position: myLatlng,
    //         });

    //         infoWindow.open(map);
    //     });

    // }

</script>

@endsection
