@extends('layouts.partners.theme_partner')

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
                    <a href="{{ url('/sos_detail_partner') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูช่วงเวลา <i class="fas fa-chart-line"></i></a>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
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
                                        <div class="col-2">
                                            <b>เวลา</b><br>
                                            Time
                                        </div>
                                        <div class="col-2">
                                            <b>รูปภาพ</b><br>
                                            Photo
                                        </div>
                                        <div class="col-3">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                        </div>
                                    </div>
                                    @foreach($view_maps as $item)
                                        <div class="row text-center">
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
                                            <div class="col-2">
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
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a class="link text-danger" href="#" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}');">
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

    function view_marker(lat , lng){

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
            marker = new google.maps.Marker({
                position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
                map: map,
                icon: image,
            });  
        });

    }

</script>

@endsection
