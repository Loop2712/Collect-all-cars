<div class="container">
	<div class="row">
        <div id="map_operating_unit"></div>
	</div>
</div>

<script>

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
        m_numZoom = parseFloat('15');
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
        "lat" : 14.326791260931913,
        "lng" : 100.6368968684157,
    };

    data_arr[1] = {
        "name" : "TEAM B",
        "lat" : 14.319791260931913,
        "lng" : 100.6098968684157,
    };

    data_arr[2] = {
        "name" : "TEAM C",
        "lat" : 14.311791260931913,
        "lng" : 100.6018968684157,
    };

    console.log(data_arr);

    for (var i = 0; i < data_arr.length; i++) {

    	console.log(data_arr[i]['lat']);
    	console.log(data_arr[i]['lng']);
    	console.log(data_arr[i]['name']);

    	location_unit_marker = new google.maps.Marker({
            position: {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] },
            map: map_operating_unit,
            icon: image_operating_unit_green,
        });
        location_unit_markers.push(location_unit_marker);
    	
    	let myLatlng = {lat: data_arr[i]['lat'] , lng: data_arr[i]['lng'] };

	    let contentString =
	        '<div id="content">' +
	        '<div id="siteNotice">' +
	        "</div>" +
	        '<h5 id="firstHeading" class="firstHeading">'+ data_arr[i]['name'] +'</h5>' +
	        '<div id="bodyContent">' +
	        "<p>lat : "+ data_arr[i]['lat'] + "<br>" +
	        "lng : "+ data_arr[i]['lng'] + "</p>" +
	        "</div>" +
	        "</div>";

	    let infoWindow = [] ;

	    infoWindow[i] = new google.maps.InfoWindow({
	        content: contentString,
	        position: myLatlng,
	    });

	    infoWindow[i].open(map_operating_unit);

    }
}

</script>