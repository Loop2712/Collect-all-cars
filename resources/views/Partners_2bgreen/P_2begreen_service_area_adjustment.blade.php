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
        <div class="col-5">
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
        <div class="col-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ปรับพื้นที่บริการ / <span style="font-size: 18px;"> service area adjustment </span>
                        </h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">จุดที่ 1</label>
                                        <input class="form-control" name="position_1" type="text" id="position_1" value="">
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
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script> -->
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"
      async
    ></script>

<script>

    function initMap() {
        
        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        // 13.7248936,100.4930264 lat lng ประเทศไทย

        const myLatlng = { lat: num_center_lat, lng: num_center_lng };

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: num_zoom,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
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

            let text_content = infoWindow.content ;
            add_location(text_content)

            console.log(text_content)

            var marker = new google.maps.Marker({
                position: text_content,
                map: map,
            });   

            infoWindow.open(map);
        });
        
    }

    function add_location(text_content) {

        let position_1 = document.querySelector('#position_1');
            position_1.value = text_content ;

    }
</script>
@endsection
