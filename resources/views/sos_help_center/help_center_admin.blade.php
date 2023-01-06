@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="container-partner-sos">
    <div class="item sos-map col-md-12 col-12 col-lg-4">
        <div class="row">
            <div class="col-6">
                <a style="float: left; background-color: green;" type="button" class="btn text-white" onclick="initMap();">
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>
                <br><br>
            </div>
            <div class="col-6">
                <!-- COL-6 -->
            </div>
            <div class="col-12">
                <div style="padding-right:15px ;">
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8 d-none d-lg-block">
        <div class="row">
            <div class="col-3">
                <div class="btn-group">
                    <button type="button" class="btn btn-info text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เลือกพื้นที่
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">พื้นที่ 1</a>
                        <a class="dropdown-item" href="#">พื้นที่ 2</a>
                        <a class="dropdown-item" href="#">พื้นที่ 3</a>
                        <a class="dropdown-item" href="#">พื้นที่ 4</a>
                        <a class="dropdown-item" href="#">พื้นที่ 5</a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div style="float:right;">
                    <button  type="button" class="btn btn-danger text-white" onclick="create_new_sos_help_center();">
                       <i class="fa-solid fa-circle-plus"></i> การขอความช่วยเหลือใหม่
                    </button>
                    <button  type="button" class="btn btn-primary">
                        <i class="fas fa-chart-line"></i> ดูช่วงเวลา
                    </button>
                    <button  type="button" class="btn btn-primary">
                        <i class="fa-solid fa-hundred-points"></i> คะแนนการช่วยเหลือ
                    </button>
                    <button  type="button" class="btn btn-success">
                        <i class="fas fa-info-circle"></i> วิธีใช้
                    </button>
                </div>
            </div>
            <br><br>
            <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="margin-top: 10px;" onclick="document.querySelector('').classList">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
                            <br>
                            <h3>ชื่อพื้นที่ : <span class="text-info">ทั้งหมด</span></h3>
                            <br>

                            <h5 class="font-weight-bold mb-0" style="margin-top:10px;">
                                การขอความช่วยเหลือ
                                <span style="font-size: 15px; float: right; margin-top:-5px;">
                                จำนวนทั้งหมด <b> $count_data </b> ครั้ง
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                ระยะเวลาโดยเฉลี่ย <b> 5 วัน 6 ชม. 7 นาที </b> / เคส (8)
                            </span>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="item sos-map" id="menu_card" style="background-color:#E0FFFF;z-index: 999;">
                    <hr style="color:black;background-color:black;height:2px;">
                    <div class="card-body">
                        <div id="menu_card_br"></div>
                        <div class="row text-center">
                            <div class="col-3">
                                <b>ผู้ขอความช่วยเหลือ</b>
                            </div>
                            <div class="col-2">
                                <b>เวลาแจ้งเหตุ</b>
                            </div>
                            <div class="col-2">
                                <b>สถานะ</b>
                            </div>
                            <div class="col-2">
                                <b>ระยะเวลา</b>
                            </div>
                            <div class="col-1">
                                <b>ตำแหน่ง</b>
                            </div>
                            <div class="col-2">
                                <b></b>
                            </div>
                        </div>
                    </div>
                    <hr style="color:black;background-color:black;height:2px;">
                </div>

                <div class="card-body">
                    @foreach($data_sos as $item)
                        <div class="row text-center"> 
                            <div class="col-3">
                                {{ $item->name_user }}
                            </div>
                            <div class="col-2">
                                {{ $item->created_at }}
                            </div>
                            <div class="col-2">
                                {{ $item->status }}
                            </div>
                            <div class="col-2">
                                ...
                            </div>
                            <div class="col-1">
                                {{ $item->lat }} , {{ $item->lng }}
                            </div>
                            <div class="col-2">
                                <a href="{{ url('/sos_help_center/' . $item->id . '/edit') }}" class="btn btn-sm btn-info text-white">ดูข้อมูล</a>
                            </div>
                            <br><br>
                            <hr>
                            <br>
                        </div>
                        <div style="float: right;">
                            <!--  -->
                        </div>
                    @endforeach
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

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

    }

    function create_new_sos_help_center(){

        let user_id = {{ $data_user->id }} ;

        fetch("{{ url('/') }}/api/create_new_sos_help_center/" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result) {
                    window.location.replace("{{ url('/') }}/sos_help_center/" + result + "/edit");
                }
        });

    }

</script>

<script>
    // Get the menu element
    const menu = document.querySelector('#menu_card');

    // Add an event listener that updates the visibility of the menu when the page is scrolled
    window.addEventListener('scroll', function() {

        // Calculate the distance from the top of the page
        const distanceFromTop = window.pageYOffset || document.documentElement.scrollTop;
            // console.log(distanceFromTop);
        
        // If the distance from the top is greater than 0, hide the menu
        if (distanceFromTop >= 270) {
            menu_card.classList.add('mt-0') ;
        } else {
            menu_card.classList.remove('mt-0'); 
        }
    });

</script>

@endsection
