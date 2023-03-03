@extends('layouts.viicheck')

@section('content')

<style>
	#map_officers_switch {
      	height: calc(40vh);
      	background-color: grey;
      	border-radius: 20px;
      	border: 1px solid red;
      	width: 90%;
      	margin-top:25px; 
      	margin-bottom:10px;
    }

    :root {
		--light: #ffffff;
		--green: #7ED957;
		--grey: grey;
		--link: rgb(27, 129, 112);
		--link-hover: rgb(24, 94, 82);
	}
	.toggle-switch {
	  	position: relative;
	  	width: 200px;
	}

	.switch-label {
	  	position: absolute;
	  	width: 100%;
	  	height: 100px;
	  	left: 50%;
	  	background-color: var(--grey);
	  	border-radius: 50px;
	  	cursor: pointer;
	}

	.switch-input {
	  	position: absolute;
	  	display: none;
	}

	.slider {
	  	position: absolute;
	  	width: 100%;
	  	height: 100%;
	  	border-radius: 50px;
	  	transition: 0.3s;
	}

	.switch-input:checked ~ .slider {
	  	background-color: var(--green);
	}

	.slider::before {
	  	content: "";
	  	position: absolute;
	  	top: 13px;
	  	left: 16px;
	  	width: 75px;
	  	height: 75px;
	  	border-radius: 50%;
	  	box-shadow: inset 28px -4px 0px 0px var(--light);
	  	background-color: var(--grey);
	  	transition: 0.3s;
	}

	.switch-input:checked ~ .slider::before {
	  	transform: translateX(95px);
	  	background-color: var(--light);
	  	box-shadow: none;
	}

</style>

<div class="row notranslate" style="margin-top:150px;">

	<div class="col-12 text-center">
		<center>
            <div class="col-12 main-shadow main-radius p-0" id="map_officers_switch">
                <img style=" object-fit: cover; border-radius:15px" width="100%" height="100%" src="{{ asset('/img/more/sorry-no-text.png') }}" class="card-img-top center" style="padding: 10px;">
                <div style="position: relative; z-index: 5">
                    <div class="translate">
                    	<center>
                    		<h4 style="top:-330px;left: 130px;position: absolute;font-family: 'Sarabun', sans-serif;">ขออภัยค่ะ</h4>
                            <h5 style="top:-270px;left: 35px;width: 80%;position: absolute;font-family: 'Sarabun', sans-serif;">
                            	ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ
                            </h5>
                            <br>
                            <span style="top:-200px;left: 130px;position: absolute;" class="btn btn-sm btn-warning main-shadow main-radius" onclick="window.location.reload(true);">
                            	<i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
                            </span>
                    	</center>
                        
                    </div>
                </div>
            </div>
			<hr style="border: 1px solid red;width: 70%;color: red;">
		</center>
	</div>
	<div id="" class="col-12 ">
		<h3 class="text-center">สถานะ : เจ้าหน้าที่กำลังเดินทางมา</h3>
		<h5 class="text-center mt-2">
			ระยะทาง : <span id="text_distance"></span>
		</h5>
		<h5 class="text-center mt-2">
			ระยะเวลาโดยประมาณ : <span id="text_duration"></span>
		</h5>
		
	</div>
</div>
	
<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";
    const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";

	var officer_marker ;
	var sos_marker ;
	
	var service;
	var directionsDisplay;

	var lat ;
	var lng ;

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();

    });

    function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(showPosition);
	  	} else {
	    	// x.innerHTML = "Geolocation is not supported by this browser.";
	  	}
	}

	function showPosition(position) {

		lat = position.coords.latitude ;
		lng = position.coords.longitude ;

		// console.log(lat);
		// console.log(lng);

        initMap();
	}

    function initMap() {

    	let m_lat = lat ;
    	let m_lng = lng ;
        let m_numZoom = parseFloat('15');

        map_officers_switch = new google.maps.Map(document.getElementById("map_officers_switch"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (officer_marker) {
            officer_marker.setMap(null);
        }
        officer_marker = new google.maps.Marker({
            position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
            map: map_officers_switch,
            icon: image_operating_unit_general,
        });

        // หมุด SOS
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {lat: 14.316998 , lng: 100.602959 },
            map: map_officers_switch,
            icon: image_sos,
        });

		get_Directions_API(officer_marker, sos_marker);

    }

</script>

<script>
	
	function get_dir(){

		let input_check = document.querySelector('#input_check_open_get_dir');
		let icon_btn_get_dir_open = document.querySelector('#icon_btn_get_dir_open');
		let icon_btn_get_dir_close = document.querySelector('#icon_btn_get_dir_close');
		// เปิด fa-solid fa-eye
		// ปิด fa-sharp fa-solid fa-eye-slash
		if (input_check.checked) {
			if (directionsDisplay) {
		        directionsDisplay.setMap(null);
			}
			document.querySelector('#div_distance_and_duration').classList.add('d-none');
			input_check.checked = false ;
			document.querySelector('#icon_btn_get_dir_close').classList.remove('d-none');
			document.querySelector('#icon_btn_get_dir_open').classList.add('d-none');
		}else{
			input_check.checked = true ;
			document.querySelector('#icon_btn_get_dir_open').classList.remove('d-none');
			document.querySelector('#icon_btn_get_dir_close').classList.add('d-none');
			get_Directions_API(officer_marker, sos_marker);
		}

	}

	function get_Directions_API(markerA, markerB) {

		if (directionsDisplay) {
	        directionsDisplay.setMap(null);
		}

		service = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer({
		    draggable: true,
		    map: map_officers_switch
		});

	    service.route({
	        origin: markerA.getPosition(),
	        destination: markerB.getPosition(),
	        travelMode: 'DRIVING'
	    }, function(response, status) {
	        if (status === 'OK') {
	            directionsDisplay.setDirections(response);
	            	// console.log(response);

	            // ระยะทาง
	            let text_distance = response.routes[0].legs[0].distance.text ;
	            	// console.log(text_distance);
	            	document.querySelector('#text_distance').innerHTML = text_distance ;
	            // เวลา
	            let text_duration = response.routes[0].legs[0].duration.text ;
	            	// console.log(text_duration);
	            	document.querySelector('#text_duration').innerHTML = text_duration ;
	            
	            // document.querySelector('#div_distance_and_duration').classList.remove('d-none');
	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
	    });

	}

</script>

@endsection
