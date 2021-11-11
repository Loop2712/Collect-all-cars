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
                            <span style="font-size: 18px; float: right; margin-top:6px;">ทั้งหมด {{ count($view_maps_all) }}</span>
                        </h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label  class="control-label">{{ 'ประเภทขอความช่วยเหลือ' }}</label>
                                    <select class="form-control" id="select_type" onchange="select_type();">
                                        @if(!empty($type_sos))
                                            <option value="">ทั้งหมด</option> 
                                            @foreach($type_sos as $item)
                                                <option value="{{ $item->content }}">
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
                                    <label  class="control-label">{{ 'เลือกประเทศ' }}</label>
                                    <select class="form-control" id="select_country" onchange="select_country();">
                                        @if(!empty($country))
                                            <option value="">ทั้งหมด</option>  
                                            @foreach($country as $item)
                                                <option value="{{ $item->CountryCode }}">
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
                                    <label  class="control-label">{{ 'เลือกพื้นที่' }}</label>
                                    <select class="form-control" id="select_area" onchange="select_area();">
                                        <option value="" selected>กรุณาเลือกประเทศ</option> 
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label style="float: right;" class="control-label">จำนวน {{ count($view_map) }}</label>
                                    <form style="float: right;" method="GET" action="{{ url('/sos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="input_type" name="search_type"value="{{ request('search_type') }}">
                                            <input type="hidden" class="form-control" id="input_CountryCode" name="search_CountryCode" value="{{ request('search_CountryCode') }}">
                                            <input type="hidden" class="form-control" id="input_area" name="search_area" value="{{ request('search_area') }}">

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-primary" type="submit" onclick="change_area();">
                                                    ค้นหา
                                                </button>
                                              <a href="{{ url('/sos') }}" type="button" class="btn btn-danger">ล้าง</a>
                                            </div>
                                        </div>
                                      </form>
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
                                                        <a class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}' , '{{ $item->id }}', '{{ $item->area }}');">
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
        var input_type = document.getElementById('input_type').value;
        var input_CountryCode = document.getElementById('input_CountryCode').value;
        var input_area = document.getElementById('input_area').value;

        var select_type = document.getElementById('select_type');
        var select_country = document.getElementById('select_country');
        var select_area = document.getElementById('select_area');

        select_type.value = input_type ;
        select_country.value = input_CountryCode ;
        select_area.value = input_area ;

        if (input_area !== "") {
            change_area(input_area);

            select_area.innerHTML = "";
            let option = document.createElement("option");
                option.text = input_area;
                option.value = input_area;
                select_area.add(option); 
        }else{
            initMap();
        }

        if (input_CountryCode) {
            fetch("{{ url('/') }}/api/show_sos_area/"+input_CountryCode)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    // //UPDATE SELECT OPTION

                    for(let item of result){
                        if (item.area !== input_area) {
                            let option = document.createElement("option");
                            option.text = item.area;
                            option.value = item.area;
                            select_area.add(option); 
                        }
                                       
                    }
            });
        }

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

        //วาดพื้นที่รับผิดชอบทั้งหมด
        fetch("{{ url('/') }}/api/all_sos_area")
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
        });

        //ปักหมุดทั้งหมด
        @foreach($view_maps_all as $item)
            @if(!empty($item->lat))
                marker = new google.maps.Marker({
                    position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} }, 
                    map: map,
                }); 
            @endif    
        @endforeach

    }

    function change_area(text_area) {

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

                //วาดพื้นที่รับผิดชอบ
                draw_area = new google.maps.Polygon({
                    paths: result,
                    strokeColor: "#008450",
                    strokeOpacity: 0.8,
                    strokeWeight: 1,
                    fillColor: "#008450",
                    fillOpacity: 0.25,
                });
                draw_area.setMap(map);

                //ปักหมุดภายในพื้นที่รับผิดชอบ
                @foreach($view_map as $item)
                @if(!empty($item->lat))
                    marker = new google.maps.Marker({
                        position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} }, 
                        map: map,
                    }); 
                @endif    
                @endforeach
                
            });

    }

    function select_type(){
        var select_type = document.getElementById('select_type').value;

        var input_type = document.getElementById('input_type');
            input_type.value = select_type;
    }

    function select_country(){
        var select_country = document.getElementById('select_country').value;

        var input_CountryCode = document.getElementById('input_CountryCode');
            input_CountryCode.value = select_country;

        var select_area = document.getElementById('select_area');
        var input_area = document.getElementById('input_area');

        if (input_CountryCode.value !== "") {
            select_area.innerHTML = "";
            input_area.value = "";
            show_area(input_CountryCode.value);
        }
        if (input_CountryCode.value === ""){
            select_area.innerHTML = "";
            input_area.value = "";
            let option = document.createElement("option");
                option.text = "กรุณาเลือกประเทศ";
                option.value = "";
                select_area.add(option); 
        }
    }

    function select_area(){
        var select_area = document.getElementById('select_area').value;

        var input_area = document.getElementById('input_area');
            input_area.value = select_area;

    }

    function show_area(countryCode){

        fetch("{{ url('/') }}/api/show_sos_area/"+countryCode)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // //UPDATE SELECT OPTION
                let select_area = document.querySelector("#select_area");
                    select_area.innerHTML = "";

                let option = document.createElement("option");
                    option.text = "เลือกพื้นที่";
                    option.value = "";
                    select_area.add(option); 

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.area;
                    option.value = item.area;
                    select_area.add(option);                
                } 
            });
    }

    function view_marker(lat , lng , sos_id , name_area){

        if (name_area) {
            fetch("{{ url('/') }}/api/view_marker/"+ name_area)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    var bounds = new google.maps.LatLngBounds();

                    for (let ix = 0; ix < result.length; ix++) {
                        bounds.extend(result[ix]);
                    }

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 18,
                    center: { lat: parseFloat(lat), lng: parseFloat(lng) },
                });

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

                let image = "https://www.viicheck.com/img/icon/flag_2.png";
                let image2 = "https://www.viicheck.com/img/icon/flag_3.png";
                marker = new google.maps.Marker({
                    position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
                    map: map,
                    icon: image,
                });  

                @foreach($view_map as $view_1)
                @if(!empty($view_1->lng))
                    if ( {{ $view_1->id }} !== parseFloat(sos_id) ) {
                        marker = new google.maps.Marker({
                            position: {lat: {{ $view_1->lat }} , lng: {{ $view_1->lng }} },
                            map: map,
                            icon: image2,
                        });
                    }
                @endif
                @endforeach
                });

            }else{

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 18,
                    center: { lat: parseFloat(lat), lng: parseFloat(lng) },
                });

                let image = "https://www.viicheck.com/img/icon/flag_2.png";
                let image2 = "https://www.viicheck.com/img/icon/flag_3.png";
                marker = new google.maps.Marker({
                    position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
                    map: map,
                    icon: image,
                });  

                @foreach($view_map as $view_2)
                    @if(!empty($view_2->lat))
                        if ( {{ $view_2->id }} !== parseFloat(sos_id) ) {
                            marker = new google.maps.Marker({
                                position: {lat: {{ $view_2->lat }} , lng: {{ $view_2->lng }} },
                                map: map,
                                icon: image2,
                            });
                        }
                    @endif
                @endforeach
            }

    }

</script>

@endsection
