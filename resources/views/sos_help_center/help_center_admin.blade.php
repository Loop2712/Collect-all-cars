@extends('layouts.partners.theme_partner_new')

@section('content')
<div class="container-partner-sos">
    <div class="item sos-map col-md-12 col-12 col-lg-4">
        <div class="row">
            <div class="col-6">
                <a href="{{ url('/') }}" style="float: left; background-color: green;" type="button" class="btn text-white" > <!-- onclick="initMap();" -->
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>
                <br><br>
            </div>
            <div class="col-6">
                <!-- COL-6 -->
            </div>
            <div class="col-12">
                <input class="d-none" type="text" id="va_zoom" name="" value="6">
                <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                
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
                col-3
            </div>
            <div class="col-9">
                col-9
            </div>
            <br><br>
            <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="margin-top: 10px;">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
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
                <hr style="color:black;background-color:black;height:2px;">
                <div class="card-body">
                <div class="row text-center">
                    <div class="col-3">
                        <b>ผู้ขอความช่วยเหลือ</b>
                    </div>
                    <div class="col-3">
                        <b>เวลาแจ้งเหตุ</b>
                    </div>
                    <div class="col-3">
                        <b>สถานะ</b>
                    </div>
                    <div class="col-2">
                        <b>ระยะเวลา</b>
                    </div>
                    <div class="col-1">
                        <b>ตำแหน่ง</b>
                    </div>

                    <br><br>
                    <hr style="color:black;background-color:black;height:2px;">
                </div>
                </div>
                <div class="card-body">
                    <div class="row text-center"> 
                        <div class="col-3">
                            col-3
                        </div>
                        <div class="col-3">
                            col-3
                        </div>
                        <div class="col-3">
                            col-3
                        </div>
                        <div class="col-2">
                            col-2
                        </div>
                        <div class="col-1">
                            col-1
                        </div>
                        <br><br>
                        <div class="col-12">
                            col-12
                        </div>
                        <hr>
                        <br><br>
                    </div>
                    <div style="float: right;">
                    </div>
                    <div class="table-responsive">
                        <div class="pagination round-pagination " style="margin-top:10px;"> 
                            {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} 
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

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

    }

</script>

@endsection
