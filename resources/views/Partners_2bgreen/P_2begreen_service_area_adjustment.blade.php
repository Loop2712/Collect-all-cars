@extends('layouts.partners.theme_partner')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
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
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ปรับพื้นที่บริการ / <span style="font-size: 18px;"> service area adjustment </span>
                        </h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
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

<!-- <script>
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
            center: { lat: 14.114131461179788, lng: 100.6049577089256 },
            zoom: 16,
        });
        // 13.7248936,100.4930264 lat lng ประเทศไทย


    }

</script> -->

<script>
    
    function initMap() {
          const myLatlng = { lat: -25.363, lng: 131.044 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatlng,
          });
          // Create the initial InfoWindow.
          let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
          });

          infoWindow.open(map);
          // Configure the click listener.
          map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
              position: mapsMouseEvent.latLng,
            });
            infoWindow.setContent(
              JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );
            infoWindow.open(map);
          });
    }

</script>
@endsection
