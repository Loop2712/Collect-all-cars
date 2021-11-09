@extends('layouts.admin')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
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
                    <input class="d-none" type="text" id="search_area" name="" value="{{ url()->full() }}">
                    <div class="card" style="margin-top:10px;">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('/sos_detail_chart') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูกราฟ <i class="fas fa-chart-line"></i></a>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ขอความช่วยเหลือ
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ count($view_map) }}</span>
                        </h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control"  onchange="location = this.options[this.selectedIndex].value;" >
                                        @if(!empty($type_sos))
                                            <option value="">ประเภทขอความช่วยเหลือ</option>   
                                            @foreach($type_sos as $item)
                                                <option value="{{ url('/sos') }}?search_type={{ $item->content }}">
                                                    @if($item->content == 'help_area')
                                                        ขอความช่วยเหลือ
                                                    @else
                                                        {{ $item->content }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                        @if(!empty($country))
                                            <option value="">เลือกประเทศ</option>   
                                            @foreach($country as $item)
                                                <option value="{{ url('/sos') }}?search_CountryCode={{ $item->CountryCode }}">
                                                        @switch($item->CountryCode)
                                                            @case('TH')
                                                                <h6>ไทย</h6>
                                                            @break
                                                            @case('LA')
                                                                <h6>ลาว</h6>
                                                            @break
                                                            @case('BN')
                                                                <h6>บรูไน</h6>
                                                            @break
                                                            @case('KH')
                                                                <h6>กัมพูชา</h6>
                                                            @break
                                                            @case('ID')
                                                                <h6>อินโดนีเซีย</h6>
                                                            @break
                                                            @case('MY')
                                                                <h6>มาเลเซีย</h6>
                                                            @break
                                                            @case('MM')
                                                                <h6>เมียนมา</h6>
                                                            @break
                                                            @case('PH')
                                                                <h6>ฟิลิปปินส์</h6>
                                                            @break
                                                            @case('SG')
                                                                <h6>สิงคโปร์</h6>
                                                            @break
                                                            @case('VN')
                                                                <h6>เวียดนาม</h6>
                                                            @break
                                                        @endswitch
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                        @if(!empty($area))
                                            <option value="">เลือกพื้นที่</option>   
                                            @foreach($area as $item)
                                                <option value="{{ url('/sos') }}?search_area={{ $item->area }}">
                                                        {{ $item->area }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div>
                                <div class="col-2">
                                    <a href="{{ url('/sos') }}" class="btn btn-outline-info ">
                                        ทั้งหมด
                                    </a>
                                </div>
                            </div>
                            <!-- <form method="GET" action="{{ url('/sos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form> -->
                            
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary text-center">
                                        <!-- <div class="col-1">
                                            <center><b>Id</b></center>
                                        </div> -->
                                        <div class="col-3">
                                            <b>ชื่อ / เบอร์</b><br>
                                            Name / Phone
                                        </div>
                                        <div class="col-2">
                                            <b>ประเภท</b><br>
                                            Type
                                        </div>
                                        <div class="col-2">
                                            <b>พื้นที่</b><br>
                                            Area
                                        </div>
                                        <div class="col-2">
                                            <b>ประเทศ</b><br>
                                            Country
                                        </div>
                                        <div class="col-3">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                        </div>
                                    </div>
                                    @foreach($view_map as $item)
                                        <div class="row text-center">
                                            <div class="col-3">
                                                <div class="float-left">
                                                    <h5 class="text-success ">
                                                        <span style="font-size: 15px;">
                                                            <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                                            <i class="far fa-eye text-primary"></i>
                                                            </a>
                                                        </span>
                                                        &nbsp;{{ $item->name }}
                                                    </h5>
                                                    <span>
                                                        {{ $item->phone }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                @if($item->content == 'help_area')
                                                    <h6>ขอความช่วยเหลือ</h6>
                                                @else
                                                    <h6>{{ $item->content }}</h6>
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <h6>
                                                    {{ $item->area }}
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                @switch($item->CountryCode)
                                                    @case('TH')
                                                        <h6>ไทย</h6>
                                                    @break
                                                    @case('LA')
                                                        <h6>ลาว</h6>
                                                    @break
                                                    @case('BN')
                                                        <h6>บรูไน</h6>
                                                    @break
                                                    @case('KH')
                                                        <h6>กัมพูชา</h6>
                                                    @break
                                                    @case('ID')
                                                        <h6>อินโดนีเซีย</h6>
                                                    @break
                                                    @case('MY')
                                                        <h6>มาเลเซีย</h6>
                                                    @break
                                                    @case('MM')
                                                        <h6>เมียนมา</h6>
                                                    @break
                                                    @case('PH')
                                                        <h6>ฟิลิปปินส์</h6>
                                                    @break
                                                    @case('SG')
                                                        <h6>สิงคโปร์</h6>
                                                    @break
                                                    @case('VN')
                                                        <h6>เวียดนาม</h6>
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}');">
                                                            <i class="fas fa-map-marker-alt"></i> 
                                                            <br>
                                                            ดูหมุด
                                                        </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-location-arrow"></i> 
                                                            <br>
                                                            นำทาง
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- <h6 class="text-info">
                                                    @if(!empty($item->lat))
                                                        <a href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-search-location"></i> ดูแผนที่
                                                        </a>
                                                    @endif
                                                </h6> -->
                                            </div>
                                            
                                        </div>
                                        <br>
                                    @endforeach
                                     <div class="pagination-wrapper"> {!! $view_map->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

        let search_area = document.getElementById("search_area").value;
        let split_1 = search_area.split("?")[1];
        let split_2 = split_1.split("=")[0];
            // console.log(split_1.split("=")[1]);
            if (split_2 === "search_area") {
                change_area();
            }
        // let select_area_help = document.getElementById("select_area_help");
        //     select_area_help.innerHTML = split_1.split("=")[1];
            // console.log(select_area_help.innerHTML);

    });

    var draw_area ;
    var map ;
    var marker ;

    function initMap() {
        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: num_center_lat, lng: num_center_lng },
            zoom: num_zoom,
        });
        // 13.7248936,100.4930264 lat lng ประเทศไทย

        //วาดพื้นที่รับผิดชอบ

        //ปักหมุด
        @foreach($view_maps_all as $item)
        @if(!empty($item->lat))
            var marker = new google.maps.Marker({
                position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} }, 
                map: map,
            }); 
        @endif    
        @endforeach

    }

    function change_area() {

        let search_area = document.getElementById("search_area").value;
        let text_area = search_area.split("=")[1];
            // console.log(text_area);

        let text_zoom = document.getElementById("va_zoom");
        let text_center_lat = document.getElementById("center_lat");
        let text_center_lng = document.getElementById("center_lng");

        fetch("{{ url('/') }}/api/area_current/"+text_area)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                var bounds = new google.maps.LatLngBounds();

                for (let ix = 0; ix < result.length; ix++) {
                    bounds.extend(result[ix]);
                }

                map = new google.maps.Map(document.getElementById("map"), {
                    // zoom: num_zoom,
                    center: bounds.getCenter(),
                });
                map.fitBounds(bounds);

                // Construct the polygon.
                draw_area = new google.maps.Polygon({
                    paths: result,
                    strokeColor: "#008450",
                    strokeOpacity: 0.8,
                    strokeWeight: 1,
                    fillColor: "#008450",
                    fillOpacity: 0.25,
                });
                draw_area.setMap(map);
                
            });

        //ปักหมุดภายในพื้นที่รับผิดชอบ

    }

</script>

@endsection
