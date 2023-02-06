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
	<div id="div_switch" class="col-12 d-none">
		<h3 class="text-center">สถานะ : <span id="text_show_standby"></span></h3>
		<br>
		<div class="toggle-switch">
            <label class="switch-label">
                <input id="switch_standby" class="switch-input" type="checkbox" onclick="click_switch_standby();">
                <span class="slider"></span>
            </label>
            <br><br><br><br><br>
        </div>
        <div class="row text-center">
        	<div class="col-6">
        		<h5>พร้อม</h5>
        	</div>
        	<div class="col-6">
        		<h5>ไม่พร้อม</h5>
        	</div>
        </div>
	</div>
</div>
	
<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";
	var officer_marker ;

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let status_officers = '{{ $data_standby->status }}' ;

        if (status_officers === 'Standby') {
        	switch_standby.checked = true ;
        }

        getLocation();

    });

    function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(showPosition);
	  	} else {
	    	// x.innerHTML = "Geolocation is not supported by this browser.";
			getLocation_again();
	  	}
	}

	function getLocation_again(){
		console.log('getLocation_again');
		getLocation();
	}

	function showPosition(position) {

		let lat = position.coords.latitude ;
		let lng = position.coords.longitude ;

		console.log(lat);
		console.log(lng);

        initMap(lat , lng);
	}

    function initMap(m_lat , m_lng) {

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

        document.querySelector('#div_switch').classList.remove('d-none');
        click_switch_standby(m_lat , m_lng);

    }

	function click_switch_standby(m_lat , m_lng){
		let switch_standby = document.querySelector('#switch_standby');
		let status ;

		if (switch_standby.checked) {
			// console.log('พร้อม');
			status = "Standby" ;
			document.querySelector('#text_show_standby').innerHTML = "พร้อม" ;
		}else{
			// console.log('ไม่พร้อม');
			status = "Not_ready" ;
			document.querySelector('#text_show_standby').innerHTML = "ไม่พร้อม" ;
		}


		fetch("{{ url('/') }}/api/update_status_officer_Standby" + "/" + status + "/" + '{{ $data_user->id }}' + "/" +m_lat + "/" + m_lng)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

        });
	}

</script>
@endsection
