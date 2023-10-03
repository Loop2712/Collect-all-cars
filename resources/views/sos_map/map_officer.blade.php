@extends('layouts.viicheck_for_officer')

@section('content')

<style>
	#map_officer {
		width: 100%!important; 
		height: 100% !important;
	}

	.sry-open-location {
	  position: relative;
	  }

	.sry-open-location-text{
	  position: absolute;
	  left: 50%;
	  transform: translate(-50%,-50%);
	  margin: 0;
	  padding: 0;
	  color: black;
	  width: 80%;
	}
	.sry-open-location img{
		margin-top: 30%;
		width: 100%;
	  object-fit: cover; 
	  height: 100%;
	}.sry-open-location p{
		font-size: clamp(12px, 5vw, 20px) !important;
	}

	.card_data{
    	background-color: rgba(255, 255, 255);
    	width: calc(90%);
    	height: auto;
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    	animation: moveAnimation_up 1s linear forwards;
    }

    .card_data_hide{
/*    	margin-bottom: -100%;*/
    	background-color: white;
    	width: calc(90%);
    	height: auto;
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    	animation: moveAnimation_down 1.5s linear forwards;
    }

    @keyframes moveAnimation_down {
	  	0% {
	    	bottom: 1%;
	  	}
	  	100% {
	    	bottom: -50%;
	  	}
	}

	@keyframes moveAnimation_up {
	  	0% {
	    	bottom: -50%;
	  	}
	  	100% {
	    	bottom: 1%;
	  	}
	}

	.btn_show_menu_up{
    	animation: moveAnimation_up 1.5s linear forwards;
	}

	.btn_show_menu_down{
    	animation: moveAnimation_down 1.5s linear forwards;
	}


</style>

<div id="map_officer" >
	<div class="sry-open-location">
		<img src="{{ asset('/img/more/sorry-no-text.png') }}" />
		<center>
			<p class="sry-open-location-text h4" style="top: 35%;">ขออภัยค่ะ</p>	
			<p class="sry-open-location-text h5" style="top: 45%;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</p>
			<span style="top: 60%;" class="sry-open-location-text btn btn-md btn-warning main-shadow main-radius" onclick="window.location.reload(true);">
				<i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
			</span>
		</center>
	</div>	
</div>

<button id="btn_show_menu" style="position:absolute;z-index: 99999;bottom: 1%;left: 10%;width: 80%" class="btn btn-danger radius-30 d-none" onclick="show_menu();">
	<i class="fa-solid fa-up-to-line mr-1"></i>
</button>

<div class="card_data" style="position:absolute;z-index: 99999;bottom: 1%;left: 5%;">

	<div class="card-body">

		<div class="tab-content">
			<div class="tab-content">
				<div class="tab-pane fade" id="tab_content_1" role="tabpanel">
					<div class="mb-4">
						<h4 class="card-title">MENU 1 </h4>
						<h4 class="card-title">MENU 1 </h4>
						<h4 class="card-title">MENU 1 </h4>
						<h4 class="card-title">MENU 1 </h4>
						<h4 class="card-title">MENU 1 </h4>
						<h4 class="card-title">MENU 1 </h4>
					</div>
				</div>
				<div class="tab-pane fade active show" id="tab_content_2" role="tabpanel">
					<button type="button" class="btn btn-warning main-shadow main-radius" style="width:100%;font-size: 20px;">
						<i class="fa-solid fa-location-crosshairs"></i> ถึงที่เกิดเหตุ
					</button>
				</div>
				<div class="tab-pane fade" id="tab_content_3" role="tabpanel">
					<div class="mb-4">
						<h4 class="card-title">MENU 3</h4>
					</div>
				</div>
			</div>

			<hr>
			<div class="row text-center">
				<div class="col-3">
					<button id="btn_menu_1" type="button" class="btn btn-outline-danger" style="width:100%;" onclick="click_menu('1');">
						<i class="fa-solid fa-file" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3">
					<button id="btn_menu_2" type="button" class="btn btn-danger" style="width:100%;" onclick="click_menu('2');">
						<i class="fa-regular fa-truck-medical" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3">
					<button id="btn_menu_3" type="button" class="btn btn-outline-danger" style="width:100%;" onclick="click_menu('3');">
						<i class="fa-sharp fa-solid fa-circle-info" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3">
					<a href="{{ url('/video_call_4/before_video_call_4?type=sos_map&sos_id=') . $data_sos_map->id }}" type="button" class="btn btn-info text-white" style="width:100%;" target="bank">
						<i class="fa-solid fa-video mr-1" style="font-size:25px;"></i>
					</a>
				</div>
			</div>

			<!-- เก็บ ul ไว้ ห้ามลบ !! -->
			<ul class="nav nav-tabs nav-primary d-none" role="tablist">
				<li class="nav-item" role="presentation">
					<a id="li_menu_1" class="nav-link" data-bs-toggle="tab" href="#tab_content_1" role="tab" aria-selected="false">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-solid fa-building-flag font-18 me-1"></i>
							</div>
						</div>
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a id="li_menu_2" class="nav-link active" data-bs-toggle="tab" href="#tab_content_2" role="tab" aria-selected="true">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-solid fa-truck-plane font-18 me-1"></i>
							</div>
						</div>
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a id="li_menu_3" class="nav-link" data-bs-toggle="tab" href="#tab_content_3" role="tab" aria-selected="false">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-sharp fa-solid fa-ranking-star font-18 me-1"></i>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<script>
	var officer_marker ;
	var sos_marker ;
	var service;
	var directionsDisplay;
	var steps_travel ;
	var steps_travel_arr = [] ;

	var check_send_update_location_officer ;
    var seconds_officer ;

    var check_get_dir = "No" ;

	var map_officer ;

	var sos_lat = "{{ $data_sos_map->lat }}" ;
    var sos_lng = "{{ $data_sos_map->lng }}" ;

	const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
        
    });

	function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(open_map_officer);
	  	} else {
	    	// x.innerHTML = "Geolocation is not supported by this browser.";
	  	}
	}

    function open_map_officer(position) {
		console.log("open_map_officer");

    	start_officer_lat = position.coords.latitude ;
		start_officer_lng = position.coords.longitude ;
    	
		console.log("start_officer_lat > " + start_officer_lat);
		console.log("start_officer_lng > " + start_officer_lng);
		console.log("sos_lat > " + sos_lat);
		console.log("sos_lng > " + sos_lng);

        map_officer = new google.maps.Map(document.getElementById("map_officer"), {
			center: {
				lat: parseFloat(sos_lat),
				lng: parseFloat(sos_lng)
			},
			zoom: 15
		});

        // หมุดที่เกิดเหตุ 
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(sos_lat) , lng: parseFloat(sos_lng) },
            map: map_officer,
            icon: image_sos,
        });

        // หมุดเจ้าหน้าที่
        if (officer_marker) {
            officer_marker.setMap(null);
        }
        officer_marker = new google.maps.Marker({
            position: {lat: parseFloat(start_officer_lat) , lng: parseFloat(start_officer_lng) },
            map: map_officer,
            icon: image_operating_unit_general,
        });

		// สร้างเส้นทาง
		// get_Directions_API(officer_marker, sos_marker);
		// SET หมุดเจ้าหน้าที่
		// set_watchPosition_officer_marker();

    }

    // <!-- --------------- ระยะทาง(เสียเงิน) --------------- -->
	function get_Directions_API(markerA, markerB) {
		// console.log( "get_Directions_API" );

		// document.querySelector('#show_travel_guide').classList.remove('d-none');

		if (directionsDisplay) {
	        directionsDisplay.setMap(null);
		}

		service = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer({
		    draggable: false,
		    map: map_officer,
		    suppressMarkers: true, // suppress the default markers
		});

	    service.route({
	        origin: markerA.getPosition(),
	        destination: markerB.getPosition(),
	        travelMode: 'DRIVING'
	    }, function(response, status) {
	        if (status === 'OK') {
	            directionsDisplay.setDirections(response);
	            	// console.log(response);

	            setTimeout(function() {
		        	map_officer.setZoom(map_officer.getZoom() - 0.5 );
		        }, 1000);

	            // ระยะทาง
	            let text_distance = response.routes[0].legs[0].distance.text ;
	            	console.log("text_distance >> " + text_distance);
	            // document.querySelector('#text_distance').innerHTML = text_distance ;
	            // เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner
                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value) ;
                	console.log("text_arrivalTime >> " + text_arrivalTime);
                // document.querySelector('#text_duration').innerHTML = text_arrivalTime ;

                steps_travel = response.routes[0].legs[0].steps;

                check_get_dir = "Yes" ;

	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
	    });

	}
</script>

<!-- MENU BAR -->
<script>
	function click_menu(id){
		var element = document.getElementById('btn_menu_'+id);
		var test = element.classList.contains('btn-danger');
			// console.log(test)
			// console.log(id)

		for (let i = 1; i <= 3; i++) {
			// document.querySelector('#menu_'+ [i]).classList.add('d-none');
			document.querySelector('#btn_menu_'+ [i]).classList.remove('btn-danger');
			document.querySelector('#btn_menu_'+ [i]).classList.add('btn-outline-danger');
		}

		if (test !== true) {
			document.querySelector('#btn_menu_'+ id).classList.add('btn-danger');
			document.querySelector('#btn_menu_'+ id).classList.remove('btn-outline-danger');
		}else{
			// console.log("พับเมนูเก็บ");
			active_menu = id ;

			let card = document.querySelector('.card_data');
				card.classList.remove('card_data');
				card.classList.add('card_data_hide');

			document.querySelector('#btn_show_menu').classList.toggle('d-none');
			document.querySelector('#btn_show_menu').classList.add('btn_show_menu_up');
			document.querySelector('#btn_show_menu').classList.remove('btn_show_menu_down');
		}

		document.querySelector('#li_menu_' + id).click();

	}

	var active_menu ;
	function show_menu(){
		let card = document.querySelector('.card_data_hide');
			card.classList.remove('card_data_hide');
			card.classList.add('card_data');

		click_menu(active_menu);
		document.querySelector('#btn_show_menu').classList.toggle('d-none');
		document.querySelector('#btn_show_menu').classList.remove('btn_show_menu_up');
		document.querySelector('#btn_show_menu').classList.add('btn_show_menu_down');
	}
</script>


@endsection
