@extends('layouts.partners.theme_partner_new')

@section('content')
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<br>
    <div class="row d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent">
                    <div class="d-flex align-items-center" style="margin-top:10px;">
                        <div>
                        @include ('partner.service_area.btn_menu')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent">
                    <div class="col-12" style="margin-top:10px;">
                        <div>
                            <div class="col-12">
                                <h3>พื้นที่บริการปัจจุบัน</h3><br class="d-block d-md-none">
                            </div>
                            <br>
                            <input class="d-none" type="text" id="va_zoom" name="" value="6">
                            <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                            <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                            <input class="d-none" type="text" id="name_partner" name="" value="{{ Auth::user()->organization }}">
                            <input class="d-none" type="text" id="name_area" name="" value="{{ $name_area }}">
                            <div class="card" style="font-family: 'Prompt', sans-serif;border-radius: 25px;" id="div_card">
                                <div id="map">
                                <center class="d-none d-lg-block">
                                    <div class="row">
                                        <div class="card-body col-md-6 d-none d-lg-block" style="hight: 500px">
                                            <img src="img/stickerline/PNG/17.png" width="100%" alt="viicheck">
                                        </div>
                                        <div class="card-body col-md-6 d-block d-md-none" style="hight: 500px">
                                            <img src="img/stickerline/PNG/17.png" width="70%" alt="viicheck">
                                        </div>
                                        <div class="card-body col-md-6 d-flex align-items-center ">
                                            <div class="col-md-12 d-none d-lg-block">
                                                <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h1>
                                                <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h1>
                                                <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h1>
                                            </div>
                                        </div>
                                        <div class="card-body col-12 d-flex align-items-center">
                                        <div class="col-12 d-block d-md-none">
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h3>
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h3>
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                                <center class="d-block d-md-none">
                                    <div class="row">
                                        <div class="card-body col-md-6 d-block d-md-none" style="hight: 500px">
                                            <img src="img/stickerline/PNG/17.png" width="70%" alt="viicheck">
                                        </div>
                                        <div class="card-body col-12 d-flex align-items-center">
                                        <div class="col-12 ">
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h3>
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h3>
                                                <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12" >
                    <div class="col-12">
                        <h3>พื้นที่บริการปัจจุบัน</h3><br class="d-block d-md-none">
                    </div>
                    <br>
                    <input class="d-none" type="text" id="va_zoom" name="" value="6">
                    <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                    <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                    <input class="d-none" type="text" id="name_partner" name="" value="{{ Auth::user()->organization }}">
                    <input class="d-none" type="text" id="name_area" name="" value="{{ $name_area }}">
                    <div class="card" style="font-family: 'Prompt', sans-serif;border-radius: 25px;" id="div_card">
                        <div id="map">
                        <center class="d-none d-lg-block">
                            <div class="row">
                                <div class="card-body col-md-6 d-none d-lg-block" style="hight: 500px">
                                    <img src="img/stickerline/PNG/17.png" width="100%" alt="viicheck">
                                </div>
                                <div class="card-body col-md-6 d-block d-md-none" style="hight: 500px">
                                    <img src="img/stickerline/PNG/17.png" width="70%" alt="viicheck">
                                </div>
                                <div class="card-body col-md-6 d-flex align-items-center ">
                                    <div class="col-md-12 d-none d-lg-block">
                                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h1>
                                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h1>
                                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h1>
                                    </div>
                                </div>
                                <div class="card-body col-12 d-flex align-items-center">
                                <div class="col-12 d-block d-md-none">
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h3>
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h3>
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h3>
                                    </div>
                                </div>
                            </div>
                        </center>
                        <center class="d-block d-md-none">
                            <div class="row">
                                <div class="card-body col-md-6 d-block d-md-none" style="hight: 500px">
                                    <img src="img/stickerline/PNG/17.png" width="70%" alt="viicheck">
                                </div>
                                <div class="card-body col-12 d-flex align-items-center">
                                <div class="col-12 ">
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);"> <b>ตอนนี้คุณยังไม่มี </h3>
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>พื้นที่บริการ</b></h3>
                                        <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"><b>กรุณาเพิ่มพื้นที่บริการ</b></h3>
                                    </div>
                                </div>
                            </div>
                        </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script> -->
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"
      async
    ></script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        let name_partner = document.querySelector('#name_partner').value;
        let name_area = document.querySelector('#name_area').value;

        fetch("{{ url('/') }}/api/area_current/"+name_partner+'/'+name_area)
            .then(response => response.json())
            .then(result => {
                console.log(result.length);
                if (result.length) {
                    let center_lat = document.querySelector('#center_lat');
                    let center_lng = document.querySelector('#center_lng');

                    var bounds = new google.maps.LatLngBounds();

                    for (let ix = 0; ix < result.length; ix++) {
                        bounds.extend(result[ix]);
                    }

                    initMap(result,bounds);
                }else{
                    let div_card = document.querySelector('#div_card');

                        let para = document.createElement("h4");
                            para.innerHTML = "คุณยังไม่มีพื้นที่บริการ" ;

                        div_card.appendChild(para);
                }
                
            });
    });

    var draw_area ;
    var map ;
    var area  = [] ;

    function initMap(result,bounds) {

        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        let count_position = document.querySelector('#count_position');

        // 13.7248936,100.4930264 lat lng ประเทศไทย

        const myLatlng = { lat: num_center_lat, lng: num_center_lng };

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
        
    }
    
</script>

@endsection
