@extends('layouts.viicheck')

@section('content')

<style>
	#map_officers_switch {
      	height: calc(40vh);
      	background-color: grey;
      	border-radius: 20px;
      	border: 1px solid red;
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
		<div id="map_officers_switch"></div>
		<center>
			<hr style="border: 1px solid red;width: 70%;color: red;">
		</center>
	</div>
	<div class="col-12">
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
	

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let status_officers = '{{ $data_standby->status }}' ;

        if (status_officers === 'Standby') {
        	switch_standby.checked = true ;
        }
        click_switch_standby();
        initMap();
    });

    function initMap() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map_officers_switch = new google.maps.Map(document.getElementById("map_officers_switch"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

    }

	function click_switch_standby(){
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


		fetch("{{ url('/') }}/api/update_status_officer_Standby" + "/" + status + "/" + '{{ $data_user->id }}')
            .then(response => response.text())
            .then(result => {
                // console.log(result);

        });
	}

</script>
@endsection
