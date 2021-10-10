@extends('layouts.partners.theme_partner')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <br><br>
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
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('/sos_detail_partner') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูกราฟ <i class="fas fa-chart-line"></i></a>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ count($view_maps) }}</span>
                        </h3>
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
                                    @foreach($view_maps as $item)
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
                                                    <a href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                        <i class="fas fa-search-location"></i> ดูแผนที่
                                                    </a>
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
                                     <div class="pagination-wrapper"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
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
      height: calc(80vh);
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();

    });

    function initMap() {

        var draw_area ;
        var map ;
        var marker ; 

        let name_partner = document.querySelector('#name_partner').value;

        fetch("{{ url('/') }}/api/area_current/"+name_partner)
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

                //ปักหมุด
                let image = "https://www.viicheck.com/img/icon/flag_2.png";
                @foreach($view_maps as $view_map)
                    marker = new google.maps.Marker({
                        position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                        map: map,
                        icon: image,
                    });     
                @endforeach
                
            });

    }

</script>

@endsection
