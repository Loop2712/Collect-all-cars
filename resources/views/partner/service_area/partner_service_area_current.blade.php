@extends('layouts.partners.theme_partner')

@section('content')
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <a id="btn_service_current" href="{{ url('/service_current') }}" type="button" class="btn btn-primary text-white">พื้นที่ปัจจุบัน</a>
                    <a id="btn_service_pending" href="{{ url('/service_pending') }}" type="button" class="btn btn-warning text-white">รอการตรวจสอบ</a>
                    <a id="btn_service_area" href="{{ url('/service_area') }}" type="button" class="btn btn-secondary text-white">ปรับพื้นที่บริการ</a>
                    <h3 class="float-right">พื้นที่บริการปัจจุบัน</h3>
                    <br><br>
                    <input class="d-none" type="text" id="va_zoom" name="" value="6">
                    <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                    <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                    <input class="d-none" type="text" id="name_partner" name="" value="{{ Auth::user()->organization }}">
                    <div class="card" id="div_card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

        fetch("{{ url('/') }}/api/area_current/"+name_partner)
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
