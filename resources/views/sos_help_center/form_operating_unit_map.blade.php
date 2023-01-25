
<div class="container">
	<div class="row">
        <div id="map_operating_unit"></div>
	</div>
</div>

<script>
	

// function initMapTest() {
//     mapTest = new google.maps.Map(document.getElementById('mapTest'), {
//         zoom: 14,
//         center: {lat: latitudeA, lng: longitudeA}
//     });

//     var markerA = new google.maps.Marker({
//         position: {lat: latitudeA, lng: longitudeA},
//         map: mapTest
//     });

//     var markerB = new google.maps.Marker({
//         position: {lat: latitudeB, lng: longitudeB},
//         map: mapTest
//     });

//     service = new google.maps.DirectionsService();
//     directionsDisplay = new google.maps.DirectionsRenderer({
//         draggable: true,
//         map: map_operating_unit
//     });

//     calculateAndDisplayRoute(markerA, markerB);
// }



</script>

<script>

var service;
var directionsDisplay;

var location_unit_markers = [] ;
let location_unit_marker  ;
const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
const image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
const image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
const image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

function map_operating_unit() {
    let sos_lat = document.querySelector('#lat'); 
    let sos_lng = document.querySelector('#lng'); 
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

    let m_lat = "";
    let m_lng = "";
    let m_numZoom = "";

    if (sos_lat.value && sos_lng.value) {
        m_lat = parseFloat(sos_lat.value);
        m_lng = parseFloat(sos_lng.value);
        m_numZoom = parseFloat('17');
    }else{
        m_lat = parseFloat('12.870032');
        m_lng = parseFloat('100.992541');
        m_numZoom = parseFloat('6');
    }
    
    map_operating_unit = new google.maps.Map(document.getElementById("map_operating_unit"), {
        center: {lat: m_lat, lng: m_lng },
        zoom: m_numZoom,
    });

    if (sos_lat.value && sos_lng.value) {
        if (sos_operating_marker) {
            sos_operating_marker.setMap(null);
        }

        sos_operating_marker = new google.maps.Marker({
            position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
            map: map_operating_unit,
            icon: image_sos,
        });
        sos_operating_markers.push(sos_operating_marker);
    }

    location_operating_unit(m_lat , m_lng);

}

function location_operating_unit(m_lat , m_lng){

	let data_arr = [] ;

	data_arr[0] = {
        "name" : "TEAM A",
        "level" : "FR",
        "lat" : 14.316292,
        "lng" : 100.604055,
    };

    data_arr[1] = {
        "name" : "TEAM B",
        "level" : "BLS",
        "lat" : 14.319284,
        "lng" : 100.608368,
    };

    data_arr[2] = {
        "name" : "TEAM C",
        "level" : "ALS",
        "lat" : 14.315669,
        "lng" : 100.606672,
    };

    data_arr[3] = {
        "name" : "ตะวันฉาย ",
        "level" : "FR",
        "lat" : 14.314829,
        "lng" : 100.607072,
    };

    data_arr[4] = {
        "name" : "กู้ภัย ระดับกลาง",
        "level" : "ILS",
        "lat" : 14.314102,
        "lng" : 100.603558,
    };

    console.log(data_arr);

    for (var i = 0; i < data_arr.length; i++) {

    	console.log(data_arr[i]['lat']);
    	console.log(data_arr[i]['lng']);
    	console.log(data_arr[i]['name']);

    	switch(data_arr[i]['level']) {
		  	case "FR":
		    	location_unit_marker = new google.maps.Marker({
		            position: {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] },
		            map: map_operating_unit,
		            icon: image_operating_unit_green,
		        });
		        location_unit_markers.push(location_unit_marker);
		    break;
		  	case "BLS":
		    	location_unit_marker = new google.maps.Marker({
		            position: {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] },
		            map: map_operating_unit,
		            icon: image_operating_unit_yellow,
		        });
		        location_unit_markers.push(location_unit_marker);
		    break;
		    default:
    			location_unit_marker = new google.maps.Marker({
		            position: {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] },
		            map: map_operating_unit,
		            icon: image_operating_unit_red,
		        });
		        location_unit_markers.push(location_unit_marker);
		}

		let  text_Directions = [] ;
		let name = data_arr[i]['name'];
		let level = data_arr[i]['level'];
		let myLatlng = {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] };

    	if (i < 3) {

    		service = new google.maps.DirectionsService();
		    directionsDisplay = new google.maps.DirectionsRenderer({
		        draggable: true,
		        map: map_operating_unit
		    });

		    // calculateAndDisplayRoute(sos_operating_marker, location_unit_marker);
		    service.route({
		        origin: sos_operating_marker.getPosition(),
		        destination: location_unit_marker.getPosition(),
		        travelMode: 'DRIVING'
		    }, function(response, status) {
		        if (status === 'OK') {
		            // directionsDisplay.setDirections(response);
		            text_Directions[i] = response.routes[0].legs[0].distance.text ;
		            	console.log(text_Directions[i]);
		        } else {
		            window.alert('Directions request failed due to ' + status);
		        }

			    let contentString =
			        '<div style="height: auto;border: 3px solid red;padding: 25px;border-radius: 25px;" id="content">' +
			        '<div id="siteNotice">' +
			        "</div>" +
			        '<h5 id="firstHeading" class="firstHeading">'+ name +'</h5>' +
			        '<div id="bodyContent">' +
			        "<p>ระดับปฏิบัติการ : "+ level + "<br>" +
			        "<b>ระยะทาง : "+ text_Directions[i] + "</b></p><br>" +
			        "</div>" +
			        "</div>";

			    let infoWindow = [] ;

			    infoWindow[i] = new google.maps.InfoWindow({
			        content: contentString,
			        position: myLatlng,
			    });

			    infoWindow[i].open(map_operating_unit);
		    });

    		

    	}

    }
}

function calculateAndDisplayRoute(markerA, markerB) {
    service.route({
        origin: markerA.getPosition(),
        destination: markerB.getPosition(),
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            // directionsDisplay.setDirections(response);
            let xxaa = response.routes[0].legs[0].distance.text ;
            	console.log(xxaa);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });

}


</script>