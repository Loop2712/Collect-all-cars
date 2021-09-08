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
                    <input class="d-none" type="text" id="search_area" name="" value="{{ url()->full() }}">
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <!-- // -->
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ข้อมูลการเรียกประกัน
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ count($sos_insurance) }}</span>
                        </h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary text-center">
                                        <div class="col-2">
                                            <b>วัน / เวลา</b>
                                        </div>
                                        <div class="col-3">
                                            <b>ยี่ห้อ / รุ่น</b>
                                        </div>
                                        <div class="col-2">
                                            <b>หมายเลขทะเบียน</b>
                                        </div>
                                        <div class="col-2">
                                            <b>ตำแหน่ง</b>
                                        </div>
                                        <div class="col-3">
                                            <b>ชื่อ / เบอร์</b>
                                        </div>
                                    </div>
                                    @foreach($sos_insurance as $item)
                                        <div class="row text-center">
                                            <div class="col-2 ">
                                                <h6>
                                                    {{ $item->created_at }}
                                                </h6>
                                            </div>
                                            <div class="col-3">
                                                <span style="font-size:18px;"><b>{{ $item->register_cars->brand }}</b></span>
                                                <br>
                                                <span style="font-size:15px;">{{ $item->register_cars->generation }}</span>
                                            </div>
                                            <div class="col-2">
                                                <span style="font-size:18px;"><b>{{ $item->register_cars->registration_number }}</b></span>
                                                <br>
                                                <span style="font-size:15px;">{{ $item->register_cars->province }}</span>
                                            </div>
                                            <div class="col-2">
                                                <h6 class="text-info">
                                                    <a href="https://www.google.co.th/search?q={{$item->lat}},{{$item->lng}}" target="bank"><i class="fas fa-search-location"></i> ดูแผนที่</a>
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
                                     <div class="pagination-wrapper"> {!! $sos_insurance->appends(['search' => Request::get('search')])->render() !!} </div>
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

    function initMap() {
        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 13.7248936, lng: 100.4930264 },
            zoom: 6,
        });
        // 13.7248936,100.4930264 lat lng ประเทศไทย

        //ปักหมุด
        @foreach($sos_insurance as $item)
            var marker = new google.maps.Marker({
                position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} }, 
                map: map,
            });     
        @endforeach

    }


</script>

@endsection
