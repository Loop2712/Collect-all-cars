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
                                <div class="col-12" id="div_lat_lng">
                                    <div class="form-group">
                                        <label class="control-label">จุดที่ {{ $count_position }}</label>
                                        <input class="form-control" name="position_{{ $count_position }}" type="text" id="position_{{ $count_position }}" value="" placeholder="คลิกที่แผนที่เพื่อรับโลเคชั่น">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <input class="form-control" name="count_position" type="text" id="count_position" value="{{ $count_position }}">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" name="" type="text" id="" value="">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" name="areaArr" type="text" id="areaArr" value="">
                                </div>
                            </div>
                            <br>
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
            let count_position = document.querySelector('#count_position');

            // console.log(text_content)

            const contentArr = text_content.split(",");

            const lat_Arr = contentArr[0].split(":");

                let marker_lat = lat_Arr[1];

            const lng_Arr = contentArr[1].split(":");

                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)

            add_location(text_content, count_position.value, map , marker_lat , marker_lng)

            var marker = new google.maps.Marker({
                position: {lat: parseFloat(marker_lat) , lng: parseFloat(marker_lng) },
                map: map,
            });   

            infoWindow.open(map);
        });
        
    }

    function add_location(text_content , count_position , map , marker_lat , marker_lng) {

        let input_areaArr = document.querySelector('#areaArr');
            input_areaArr.value = input_areaArr.value + '{lat: ' + parseFloat(marker_lat) +  ', lng: ' + parseFloat(marker_lng)+ ' } ,';

            console.log(input_areaArr.value);

        let co_position = document.querySelector('#count_position');

        let add_count = parseFloat(co_position.value) + 1 ;

        let div_lat_lng = document.querySelector('#div_lat_lng');

        let position = document.querySelector('#position_' + count_position);
            // position.value = text_content ;
            position.value = '{lat: ' + parseFloat(marker_lat) +  ', lng: ' + parseFloat(marker_lng)+ ' } ';

            console.log(count_position);

            let area = [ input_areaArr.value ];

            console.log(area);

            // Construct the polygon.
            let draw_area = new google.maps.Polygon({
                paths: area,
                strokeColor: "#008450",
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: "#008450",
                fillOpacity: 0.25,
            });
            draw_area.setMap(map);

        // add input position
        // div_form
        let div_form = document.createElement("div");

        let div_class_form = document.createAttribute("class");
            div_class_form.value = "form-group";
            
            div_form.setAttributeNode(div_class_form); 

        // label
        let label = document.createElement("label");
            let label_class = document.createAttribute("class");
            label_class.value = "control-label";
            label.innerHTML = "จุดที่ " + add_count;
            label.setAttributeNode(label_class);

        // input
        let input = document.createElement("input");
            let input_class = document.createAttribute("class");
            input_class.value = "form-control";

            let input_name = document.createAttribute("name");
            input_name.value = "position_" + add_count;

            let input_type = document.createAttribute("type");
            input_type.value = "text";

            let input_id = document.createAttribute("id");
            input_id.value = "position_" + add_count;

            let input_value = document.createAttribute("value");
            input_value.value = "";

            let input_placeholder = document.createAttribute("placeholder");
            input_placeholder.value = "คลิกที่แผนที่เพื่อรับโลเคชั่น";

            input.setAttributeNode(input_class); 
            input.setAttributeNode(input_name); 
            input.setAttributeNode(input_type); 
            input.setAttributeNode(input_id); 
            input.setAttributeNode(input_value); 
            input.setAttributeNode(input_placeholder); 

        div_form.appendChild(label);
        div_form.appendChild(input);

        div_lat_lng.appendChild(div_form);

        
        co_position.value = add_count ;

    }
</script>
@endsection
