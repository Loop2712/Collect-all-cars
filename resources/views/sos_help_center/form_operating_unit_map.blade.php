<style>
	.gm-style-iw-a{
		margin-top: -45px;
	}
	#card_data_operating {
      height: calc(75vh);
    }
</style>

<div class="container">
	<div class="row">
		<div class="col-12" style="position:absolute;z-index: 999;right: 4%;margin-top: 0.3%; ">
			<div class="btn-group float-end" role="group" aria-label="Basic example">
			  	<button type="button" class="btn btn-info text-white" onclick="select_level('all');">All</button>
			  	<button type="button" class="btn btn-success" onclick="select_level('FR');">FR</button>
			  	<button type="button" class="btn btn-warning" onclick="select_level('BLS');">BLS</button>
			  	<button style="background-color:orange;" type="button" class="btn" onclick="select_level('ILS');">ILS</button>
			  	<button type="button" class="btn btn-danger" onclick="select_level('ALS');">ALS</button>
			</div>
		</div>
		<div class="col-9">
			<div class="card">
				<div id="div_text_Directions" class="card-body d-none" style="position:absolute;z-index: 999;left: 0%;margin-top: 8%; background-color: #ffffff;border: 1px solid red;border-radius: 10px;width: 35%;">
			  		<h6 id="show_text_Directions" class="text-danger"></h6>
			  	</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
			  	<div id="card_data_operating" class="card-body" style="position:absolute;z-index: 999;right: 1%;margin-top: 20%; background-color: #ffffff;border: 1px solid red;border-radius: 10px;width: 100%;">
			  		<!--  -->
			  	</div>
			</div>
		</div>
	</div>
	<!-- MAP -->
	<div class="row">
        <div id="map_operating_unit"  style="margin-top: -30px;"></div>
	</div>
</div>

<script>

var start_infoWindow = [] ;
var view_infoWindow = "" ;
var service;
var directionsDisplay;

let select_marker_goto ;

var location_unit_markers = [] ;
let location_unit_marker  ;
const image_empty = "{{ url('/img/icon/flag_empty.png') }}";
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

    let m_lng_ct = m_lng + 0.002 ;
    
    map_operating_unit = new google.maps.Map(document.getElementById("map_operating_unit"), {
        center: {lat: m_lat, lng: m_lng_ct },
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

    location_operating_unit(m_lat , m_lng , 'all');

}

function location_operating_unit(m_lat , m_lng , level){

	fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level)
	    .then(response => response.json())
	    .then(result => {
	        // console.log(result);

	        for (var i = 0; i < result.length; i++) {

	        	let card_data_operating = document.querySelector('#card_data_operating');

	        	// add div in to card_data_operating
                let div_operating = document.createElement("div");
                let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = "div_operating_id_" + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                card_data_operating.appendChild(div_operating);

		    	switch(result[i]['level']) {
				  	case "FR":
				    	location_unit_marker = new google.maps.Marker({
				            position: {lat: parseFloat(result[i]['lat']) , lng: parseFloat(result[i]['lng']) },
				            map: map_operating_unit,
				            icon: image_operating_unit_green,
				        });
				        location_unit_markers.push(location_unit_marker);
				    break;
				  	case "BLS":
				    	location_unit_marker = new google.maps.Marker({
				            position: {lat: parseFloat(result[i]['lat']) , lng: parseFloat(result[i]['lng']) },
				            map: map_operating_unit,
				            icon: image_operating_unit_yellow,
				        });
				        location_unit_markers.push(location_unit_marker);
				    break;
				    default:
		    			location_unit_marker = new google.maps.Marker({
				            position: {lat: parseFloat(result[i]['lat']) , lng: parseFloat(result[i]['lng']) },
				            map: map_operating_unit,
				            icon: image_operating_unit_red,
				        });
				        location_unit_markers.push(location_unit_marker);
				}

				let myLatlng = {lat: parseFloat(result[i]['lat']) , lng: parseFloat(result[i]['lng']) };
		    	let round_i = i + 1 ;

		    	// set content 3 ตัวแรก
		    	// if (i < 3) {

		    	// 	let contentString =
				//         '<div id="content">' +
				//         	'<h6 id="firstHeading" class="firstHeading"><b>'+ round_i + "." + result[i]['name'] +'</b></h6>' +
				//         	'<span class="text-secondary">'+
				//         	'ระยะห่าง(รัศมี) ≈ ' + result[i]['distance'].toFixed(2) + ' กม.<br>' +
				//         	'ระดับ :  ' + result[i]['level'] + '</span><br><br>' +
				// 	    	'<button class="btn btn-sm btn-success text-white main-shadow main-radius" style="width:100%;">เลือก</button>'+
				//         "</div>";

				//     start_infoWindow[i] = new google.maps.InfoWindow({
				//         content: contentString,
				//         position: myLatlng,
				//     });

				//     start_infoWindow[i].open(map_operating_unit);

		    	// }

		    	let text_data_operating = 
		    		'<h5 class="card-title" >' + round_i + "." + result[i]['name'] + '</h5>' +
		    		'<p>ระยะห่าง(รัศมี) ≈ ' + result[i]['distance'].toFixed(2) + ' กม. </br>' +
		    		'เจ้าหน้าที่ : ' + result[i]['name_officer'] + '</br>' +
		    		'ระดับ : ' + result[i]['level'] + '</p>' +
		    		'<div class="row">' +
			    		'<div class="col-6">' +
			    			'<button id="btn_marker_id_'+result[i]['id']+'" class="btn btn-sm btn-info text-white main-shadow main-radius" style="width:100%;">' +
			    			'<i class="fa-solid fa-eye"></i>' +
			    			'</button>'+
			    		'</div>' +
			    		'<div class="col-6">' +
			    			'<button class="btn btn-sm btn-success text-white main-shadow main-radius" style="width:100%;">เลือก</button>'+
			    		'</div>' +
			    		'<div class="col-12">' +
			    			'<button id="get_Directions_id_'+ result[i]['id'] +'" class="btn btn-sm btn-warning text-white main-shadow main-radius mt-2" style="width:100%;" disabled> '+
			    			'<i class="fa-solid fa-location-arrow"></i>'+
			    			'</button>'+
			    		'</div>' +
		    		'</div>' +
		    		'<hr>' ;
					// get_Directions_API(sos_operating_marker, location_unit_marker);

		    	// div_operating_id_
		    	document.querySelector('#div_operating_id_' + result[i]['id']).innerHTML = text_data_operating ;

		    	// ------------------------------------------
		    	// add onclick to btn_marker_id_
		    	let btn_marker_id = document.querySelector('#btn_marker_id_' + result[i]['id']) ;
                let btn_marker_onclick = document.createAttribute("onclick");
                    btn_marker_onclick.value = "view_data_marker("+  result[i]['id'] +  ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] +");" ;
                    btn_marker_id.setAttributeNode(btn_marker_onclick);

                // add onclick to get_Directions_id_
                let get_Directions_id = document.querySelector('#get_Directions_id_' + result[i]['id']) ;
                let get_Directions_onclick = document.createAttribute("onclick");
                    get_Directions_onclick.value = "get_dir(" +result[i]['lat']+ "," +result[i]['lng']+ ");" ;
                    get_Directions_id.setAttributeNode(get_Directions_onclick);

		    }

	    });

    	let m_lng_ct = m_lng + 0.002 ;
		
		map_operating_unit.setCenter({lat: m_lat, lng: m_lng_ct});

}


function view_data_marker(id,name,distance,level,lat,lng){

	if (view_infoWindow) {
        view_infoWindow.setMap(null);
    }
	if (start_infoWindow[0]) {
        start_infoWindow[0].setMap(null);
        start_infoWindow[1].setMap(null);
        start_infoWindow[2].setMap(null);
    }
    const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };

    let contentString =
        '<div id="content">' +
        	'<h6 id="firstHeading" class="firstHeading"><b>'+ name +'</b></h6>' +
        	'<span class="text-secondary">'+
        	'ระยะห่าง(รัศมี) ≈ ' + distance + ' กม.<br>' +
        	'ระดับ :  ' + level + '</span><br><br>' +
	    	'<button class="btn btn-sm btn-success text-white main-shadow main-radius" style="width:100%;">เลือก</button>'+
        "</div>";

    view_infoWindow = new google.maps.InfoWindow({
        content: contentString,
        position: myLatlng,
    });

    view_infoWindow.open(map_operating_unit);

}


function get_dir(lat,lng){

	if (select_marker_goto) {
        select_marker_goto.setMap(null);
    }
    if (view_infoWindow) {
        view_infoWindow.setMap(null);
    }
	if (start_infoWindow[0]) {
        start_infoWindow[0].setMap(null);
        start_infoWindow[1].setMap(null);
        start_infoWindow[2].setMap(null);
    }

    select_marker_goto = new google.maps.Marker({
        position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
        map: map_operating_unit,
        icon: image_sos,
    });

	get_Directions_API(sos_operating_marker, select_marker_goto , lat,lng);
}

function get_Directions_API(markerA, markerB) {

	if (directionsDisplay) {
        directionsDisplay.setMap(null);
	}

	service = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer({
	    draggable: true,
	    map: map_operating_unit
	});

    service.route({
        origin: markerA.getPosition(),
        destination: markerB.getPosition(),
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
            let text_distance = response.routes[0].legs[0].distance.text ;
            	// console.log(text_distance);

            document.querySelector('#show_text_Directions').innerHTML = "ระยะทางการเดินรถ : " + text_distance + " กม.";
            document.querySelector('#div_text_Directions').classList.remove('d-none');
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });

}

function select_level(level){
	// console.log(level);
	document.querySelector('#card_data_operating').innerHTML = "" ;

	for (var select_level_i = 0; select_level_i < location_unit_markers.length; select_level_i++) {
	  	location_unit_markers[select_level_i].setMap(null);
	}

	if (select_marker_goto) {
        select_marker_goto.setMap(null);
    }
    if (view_infoWindow) {
        view_infoWindow.setMap(null);
    }
	if (start_infoWindow[0]) {
        start_infoWindow[0].setMap(null);
        start_infoWindow[1].setMap(null);
        start_infoWindow[2].setMap(null);
    }

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

	location_operating_unit(m_lat , m_lng , level);

}


</script>