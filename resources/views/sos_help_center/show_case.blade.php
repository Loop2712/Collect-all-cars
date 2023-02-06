@extends('layouts.viicheck')

@section('content')

<style>
	#map_show_case {
      	height: calc(40vh);
      	background-color: grey;
      	border-radius: 20px;
      	border: 1px solid red;
      	width: 90%;
      	margin-top:25px; 
      	margin-bottom:10px;
    }
</style>

<div class="row notranslate" style="margin-top:150px;">
	<div class="col-12 text-center">
		<center>
            <div class="col-12 main-shadow main-radius p-0" id="map_show_case">
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
</div>




<div class="row notranslate" style="margin-top:200px;">
	<div class="col-12 text-center">
		<h1>HELP</h1>
		<p>SOS ID : {{ $data_sos->id }}</p>

		<p>LAT : <span id="text_officers_lat">{ $data_sos->lat }</span></p>
		<p>LONG : <span id="text_officers_lng">{ $data_sos->lng }</span></p>

		<span class="btn btn-primary main-shadow main-radius" style="width:20%;" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}');">
			ถึงที่เกิดเหตุ
		</span>

	</div>
</div>
	
<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>

	var lat ;
	var lng ;
	var officer_marker ;
	var sos_marker ;
	const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
    });

    function myStop_reface_getLocation() {
        clearInterval(reface_getLocation);
    }

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

		console.log(lat);
		console.log(lng);

        fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat + "/" + lng)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                console.log(result['status']);

                let sos_lat = result['lat'] ;
                let sos_lng = result['lng'] ;

                open_map_show_case(sos_lat , sos_lng)

                // if (result['status_sos'] === 'ถึงที่เกิดเหตุ') {
                //     myStop_reface_getLocation();
                // }
        });

        // LOOP ------------------------------------------------------------------
        reface_getLocation = setInterval(function() {
            
        	fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat + "/" + lng)
	            .then(response => response.json())
	            .then(result_2 => {
	                console.log(result_2);
	                console.log(result_2['status']);

	                let sos_lat = result_2['lat'] ;
	                let sos_lng = result_2['lng'] ;

					set_marker_map_show_case(sos_lat , sos_lng);

	                // if (result_2['status_sos'] === 'ถึงที่เกิดเหตุ') {
	                //     myStop_reface_getLocation();
	                // }
	        });

        }, 15000);

	}

	function open_map_show_case(sos_lat , sos_lng) {

    	let m_lat = lat ;
    	let m_lng = lng ;
        let m_numZoom = parseFloat('15');

        map_show_case = new google.maps.Map(document.getElementById("map_show_case"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        set_marker_map_show_case(sos_lat , sos_lng);
    }

    function set_marker_map_show_case(sos_lat , sos_lng){

    	let m_lat = lat ;
    	let m_lng = lng ;
    	// หมุดที่เกิดเหตุ 
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(sos_lat) , lng: parseFloat(sos_lng) },
            map: map_show_case,
            icon: image_sos,
        });

        // หมุดเจ้าหน้าที่
        if (officer_marker) {
            officer_marker.setMap(null);
        }
        officer_marker = new google.maps.Marker({
            position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
            map: map_show_case,
            icon: image_operating_unit_general,
        });

        let Item_1 = new google.maps.LatLng(m_lat, m_lng);
        let myPlace = new google.maps.LatLng(sos_lat , sos_lng);

        let bounds = new google.maps.LatLngBounds();
            bounds.extend(myPlace);
            bounds.extend(Item_1);
        map_show_case.fitBounds(bounds);
    }

	function update_status(status , sos_id){

		fetch("{{ url('/') }}/api/update_status_officer" + "/" + status + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                console.log(result);

        });
	}

</script>
@endsection
