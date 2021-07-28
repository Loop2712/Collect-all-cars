@extends('layouts.admin')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <br><br>
                    <div class="card">
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
                        <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ $sos_all }}</span>
                        </h3>
                        <div class="card-body">
                            <a href="{{ url('/sos') }}?search=police" class="btn btn-outline-dark ">
                                 ตำรวจ
                            </a>
                            <a href="{{ url('/sos') }}?search=JS100" class="btn btn-outline-success ">
                                 JS100
                            </a>
                            <a href="{{ url('/sos') }}?search=life_saving" class="btn btn-outline-warning ">
                                แพทย์
                            </a>
                            <a href="{{ url('/sos') }}?search=pok_tek_tung" class="btn btn-outline-info ">
                                <i class="fas fa-users"></i> ป่อเต็กตึ๊ง
                            </a>
                            <a href="{{ url('/sos') }}?search=highway" class="btn btn-outline-danger ">
                                 ทางหลวง
                            </a>
                            <a href="{{ url('/sos') }}?search=lawyers" class="btn btn-outline-secondary ">
                                 ทนายอาสา
                            </a>
                            <a href="{{ url('/sos') }}" class="btn btn-outline-info ">
                                <i class="fas fa-users"></i> ทั้งหมด
                            </a>

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
                            <div class="col-md-3 float-right">
                            <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                    @if(!empty($area))
                                        <option value="">เลือกพื้นที่รับผิดชอบ</option>   
                                        @foreach($area as $item)
                                            <option value="{{ url('/sos') }}?search={{ $item->area }}">
                                                    {{ $item->area }}
                                            </option>   

                                        @endforeach
                                    @else
                                        <option value="" selected></option> 
                                    @endif
                                    
                                </select>
                                
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary text-center">
                                        <!-- <div class="col-1">
                                            <center><b>Id</b></center>
                                        </div> -->
                                        <div class="col-1">
                                                <br>
                                                
                                        </div>
                                        <div class="col-2">
                                                <b>เวลา</b><br>
                                                Time
                                        </div>
                                        <div class="col-2">
                                                <b>ประเภท</b><br>
                                                Type
                                        </div>
                                        <div class="col-2">
                                                <b>ตำแหน่ง</b><br>
                                                Location
                                        </div>
                                        <div class="col-2">
                                                <b>พื้นที่รับผิดชอบ</b><br>
                                                Area
                                        </div>
                                        <div class="col-3">
                                                <b>ชื่อ / เบอร์</b><br>
                                                Name / Phone
                                        </div>
                                    </div>
                                    @foreach($view_map as $item)
                                        <div class="row text-center">
                                        <div class="col-1 ">
                                                <h6>
                                                    {{ $loop->iteration }}
                                                </h6>
                                            </div>
                                            <div class="col-2 ">
                                                <h6>
                                                    {{ $item->created_at }}
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                    @switch($item->content)
                                                    @case('police')
                                                        <h6>ตำรวจ</h6>
                                                    @break
                                                    @case('js100')
                                                        <h6>จส.100</h6>
                                                    @break
                                                    @case('life_saving')
                                                        <h6>หน่วยแพทย์กู้ชีวิต</h6>
                                                    @break
                                                    @case('pok_tek_tung')
                                                        <h6>ป่อเต็กตึ๊ง</h6>
                                                    @break
                                                    @case('highway')
                                                        <h6>สายด่วนทางหลวง</h6>
                                                    @break
                                                    @case('lawyers')
                                                        <h6>ทนายอาสา</h6>
                                                    @break
                                                    @case('help_area')
                                                        <h6>ขอความช่วยเหลือ</h6>
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="col-2">
                                                <h6 class="text-info">
                                                    <a href="https://www.google.co.th/search?q={{$item->lat}},{{$item->lng}}" target="bank"><i class="fas fa-search-location"></i> ดูแผนที่</a>
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                <h6>
                                                    {{ $item->area }}
                                                </h6>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="text-success">
                                                    <span style="font-size: 15px;">
                                                        <a target="break" href="{{ url('/').'/profile/'.$item->id }}">
                                                        <i class="far fa-eye text-primary"></i>
                                                        </a>
                                                    </span>&nbsp;{{ $item->name }}
                                                </h5>
                                                {{ $item->phone }}
                                            </div>
                                            
                                            
                                        </div>
                                        <br>
                                    @endforeach
                                     <div class="pagination-wrapper"> {!! $view_map->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="lat" type="text" id="lat" value="" >
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="lng" type="text" id="lng" value="" >
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="latlng" name="latlng" readonly> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG1_Wtq39qpBpTSaSne1jNv4GtMqIB920"></script>
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
    });

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        navigator.geolocation.getCurrentPosition(initMap);
        // navigator.geolocation.getCurrentPosition(geocodeLatLng);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        latlng.value = position.coords.latitude+","+position.coords.longitude ;

        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        // console.log(lat);
        // console.log(lng);

        let location_user = document.querySelector("#location_user");
            location_user.innerHTML = '<a class="btn-block shadow-box text-white btn btn-primary" id="submit"><i class="fas fa-search-location"></i> ตำแหน่งของฉัน</a>';

        check_area(lat,lng);
    }

    function initMap(position) {
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        latlng.value = position.coords.latitude+","+position.coords.longitude ;
        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });
        // 40.7504479,-73.9936564,19

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user });

        draw_area(map);

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        document.getElementById("submit").addEventListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });

        marker_user.addListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });
    }
</script>

@endsection
