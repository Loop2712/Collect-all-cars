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


<!-- Button trigger modal -->
<button id="btn_modal_add_photo_sos" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_add_photo_sos">
  Launch static backdrop modal
</button>
<!-- Modal -->
<div class="modal fade" id="modal_add_photo_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height: calc(100%);overflow-y: auto;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="row">
            <div class="col-12">
            	<!--  -->
            	เพิ่มภาพถ่าย และข้อคิดเห็นของเจ้าหน้าที่
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn_help_area" style="width:40%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" >
            ยืนยัน
        </button>

      </div>
    </div>
  </div>
</div>


<div class="row notranslate" style="margin-top:150px;">
	<div class="col-12 text-center">
		<center>
			<h4>สถานะ : <b><span id="show_status" class="text-warning"></span></b></h4>

			<p id="show_level_by_control_center" class="d-none">
				ระดับสถานะการณ์ (ศูนย์) : <b><span id="text_level_by_control_center"></span></b>
			</p>
			<p id="show_level_by_officers" class="d-none">
				ระดับสถานะการณ์ (เจ้าหน้าที่) : <b><span id="text_level_by_officers"></span></b>
			</p>

			<div class="row text-center">
				<div class="col-6">
					<button class="btn btn-sm btn-primary text-white main-shadow main-radius mt-2" disabled style="width:80%;" onclick="get_dir();">
						ดูเส้นทาง <i class="fa-solid fa-location-arrow"></i>
					</button>
				</div>
				<div class="col-6">
					@php
						$gg_lat_mail = '@' . $data_sos->lat ;
						$gg_lat = $data_sos->lat ;
						$lng = $data_sos->lng ;
					@endphp
					<a href="https://www.google.co.th/maps/dir//{{$gg_lat}},{{$lng}}/{{$gg_lat_mail}},{{$lng}},16z" class="btn btn-sm btn-danger text-white main-shadow main-radius mt-2" style="width:80%;" target="bank">
						Google Map <i class="fa-solid fa-location-arrow"></i>
					</a>
				</div>
			</div>
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
		</center>
	</div>

	<div>
		<center>
			<div class="col-12 mt-2">
				<button class="btn btn-info main-shadow main-radius" style="width:50%;" onclick="add_photo_sos_by_officers();">
					เพิ่มรูปภาพ <i class="fa-solid fa-camera-viewfinder"></i>
				</button>
			</div>
			<hr style="border: 1px solid red;width: 70%;color: red;">
		</center>
	</div>

	<!-- ปุ่ม ถึงที่เกิดเหตุ -->
	<div id="div_gotohelp" class="">
		<center>
			<div class="col-12 mt-2">
				<button class="btn btn-warning main-shadow main-radius" style="width:90%;" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}');">
					ถึงที่เกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
				</button>
			</div>
		</center>
	</div>

	<!-- ปุ่มเลือกระดับเหตุการณ์ -->
	<div id="div_event_level" class="d-none">
		<center>
			<div class="row">
				<div class="col-6 mt-2">
					<button class="btn btn-dark main-shadow main-radius" style="width:90%;" >
						ดำ
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-light main-shadow main-radius" style="width:90%;" >
						ขาว
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-success main-shadow main-radius" style="width:90%;" >
						เขียว
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-warning main-shadow main-radius" style="width:90%;" >
						เหลือง
					</button>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-danger main-shadow main-radius" style="width:90%;" >
						แดง
					</button>
				</div>
			</div>
		</center>
	</div>


	<!-- ปุ่มแก้ไขฟอร์ม -->
	<div>
		<center>
			<hr style="border: 1px solid red;width: 70%;color: red;">
			<div class="col-12 mt-2">
				<a href="{{ url('/sos_help_center' . '/' . $data_sos->id . '/edit') }}" class="btn btn-warning main-shadow main-radius" style="width:90%;" >
					แก้ไขข้อมูล ฟอร์มเหลือง
				</a>
			</div>
			<div class="col-12 mt-2">
				<button class="btn btn-secondary main-shadow main-radius" style="width:90%;" >
					แก้ไขข้อมูล ฟอร์ม...
				</button>
			</div>
		</center>
	</div>


</div>

<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>

	var status_sos = '{{ $data_sos->status }}';
        document.querySelector('#show_status').innerHTML = status_sos ;

    var event_level_by_control_center = '{{ $data_sos->form_yellow->idc }}';
    var event_level_by_officers = '{{ $data_sos->form_yellow->rc }}';

	if (event_level_by_control_center) {
		document.querySelector('#show_level_by_control_center').classList.remove('d-none') ;
    	document.querySelector('#text_level_by_control_center').innerHTML = event_level_by_control_center ;
	}
	if (event_level_by_officers) {
		document.querySelector('#show_level_by_officers').classList.remove('d-none') ;
    	document.querySelector('#text_level_by_officers').innerHTML = event_level_by_officers ;
	}

	var lat ;
	var lng ;
	var officer_marker ;
	var sos_marker ;
	var service;
	var directionsDisplay;

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

		// console.log(lat);
		// console.log(lng);

        fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat + "/" + lng)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result['status']);

                let sos_lat = result['lat'] ;
                let sos_lng = result['lng'] ;

                open_map_show_case(sos_lat , sos_lng)

                status_sos = result['status'] ;
                document.querySelector('#show_status').innerHTML = status_sos ;
                
        });

        // LOOP ------------------------------------------------------------------
        reface_getLocation = setInterval(function() {
            
        	fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat + "/" + lng)
	            .then(response => response.json())
	            .then(result_2 => {
	                // console.log(result_2);
	                // console.log(result_2['status']);

	                let sos_lat = result_2['lat'] ;
	                let sos_lng = result_2['lng'] ;

					set_marker_map_show_case(sos_lat , sos_lng);

                	status_sos = result_2['status'] ;
                	document.querySelector('#show_status').innerHTML = status_sos ;

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


    function add_photo_sos_by_officers(){
    	console.log('add_photo_sos_by_officers');
    	document.querySelector('#btn_modal_add_photo_sos').click();
    	capture_registration();
    }



    // UPDATE STATUS SOS
	function update_status(status , sos_id){

        status_sos = status ;
        document.querySelector('#show_status').innerHTML = status_sos ;

		fetch("{{ url('/') }}/api/update_status_officer" + "/" + status + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (status_sos === "ถึงที่เกิดเหตุ") {
                	document.querySelector('#div_gotohelp').classList.add('d-none');
                	document.querySelector('#div_event_level').classList.remove('d-none');

                }

        });
	}

	function update_event_level(level , sos_id){

        text_event_level = level ;
        document.querySelector('#show_event_level').innerHTML = text_event_level ;

		fetch("{{ url('/') }}/api/update_event_level" + "/" + level + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                // if (status_sos === "ถึงที่เกิดเหตุ") {
                // 	document.querySelector('#div_gotohelp').classList.add('d-none');
                // 	document.querySelector('#div_event_level').classList.remove('d-none');

                // }

        });
	}

</script>



<!-- --------------- ระยะทาง(เสียเงิน) --------------- -->
<script>
	
	function get_dir(){
		get_Directions_API(officer_marker, sos_marker);
	}

	function get_Directions_API(markerA, markerB) {

		if (directionsDisplay) {
	        directionsDisplay.setMap(null);
		}

		service = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer({
		    draggable: true,
		    map: map_show_case
		});

	    service.route({
	        origin: markerA.getPosition(),
	        destination: markerB.getPosition(),
	        travelMode: 'DRIVING'
	    }, function(response, status) {
	        if (status === 'OK') {
	            directionsDisplay.setDirections(response);
	            	console.log(response);

	            // ระยะทาง
	            let text_distance = response.routes[0].legs[0].distance.text ;
	            	console.log(text_distance);
	            // เวลา
	            let text_duration = response.routes[0].legs[0].duration.text ;
	            	console.log(text_duration);
	            
	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
	    });

	}

</script>
@endsection
