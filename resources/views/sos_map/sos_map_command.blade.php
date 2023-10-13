@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
	#map_command {
      height: calc(75vh);
    }
</style>

<div class="container-partner-sos row">
	<div class="col-3">

		<div class="card border-top border-0 border-4 border-danger">
			<div class="card-body p-3">

				<!-- ข้อมูลผู้ขอความช่วยเหลือ -->
				<div class="card-title d-flex align-items-center">
					<div>
						<i class="bx bxs-user me-1 font-22 text-info"></i>
					</div>
					<h4 class="mb-0 text-info">ข้อมูลผู้ขอความช่วยเหลือ</h4>
				</div>
				<div style="font-size:22px;">
					<p>
						<b>ชื่อ : </b> {{ $data_sos_map->name }} <br>
						<b>เบอร์ : </b> {{ $data_sos_map->phone }} <br>
					</p>
				</div>

				<!-- หัวข้อการขอความช่วยเหลือ -->
				<div class="card-title d-flex align-items-center">
					<div>
						<i class="fa-solid fa-subtitles me-1 font-22 text-danger"></i>
					</div>
					<h4 class="mb-0 text-danger">ข้อมูล</h4>
				</div>
				<div style="font-size:20px;">
					<p>
						<b>{{ $data_sos_map->title_sos }}</b>
						<br>
						{{ $data_sos_map->title_sos_other }}
					</p>
					<p>
						<b>Lat : </b>{{ $data_sos_map->lat }}
						<br>
						<b>Long : </b>{{ $data_sos_map->lng }}
					</p>
				</div>
				<hr>
				<center>
					<a href="{{ url('/video_call_4/before_video_call_4?type=sos_map&sos_id=') . $data_sos_map->id }}" type="button" class="btn btn-primary p-2" style="width:90%;">
						<i class="fa-solid fa-video mr-1"></i>Video Call
					</a>
					<br>
					<div class="accordion" id="accordion_Forward_sos">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
					  			<button type="button" class="btn btn-info p-2 mt-2" style="width:90%;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fa-solid fa-right-to-line mr-1"></i>เลือกการส่งต่อ
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse mt-2" aria-labelledby="headingOne" data-bs-parent="#accordion_Forward_sos">
								<div class="accordion-body">

									<span id="btn_ask_1669" class="main-shadow btn btn-md btn-block d-none"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#modal_sos_1669">
		                                <div class="d-flex">
		                                    <div class="col-3 p-0 d-flex align-items-center">
		                                        <div class="justify-content-center col-12 p-0">
		                                            <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
		                                        </div>
		                                    </div>
		                                    <div class="d-flex align-items-center col-9 text-center">
		                                        <div class="justify-content-center col-12">
		                                            <b>
		                                                <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
		                                                <span id="name_1669_area" class="d-block" style="color: #ffffff;"></span>
		                                            </b>
		                                            
		                                        </div>
		                                        
		                                    </div>
		                                </div>
		                            </span>

									<hr>
									<label>หมายเลขโทรศัพท์ <br>ศูนย์รับแจ้งเหตุและสั่งการจังหวัดต่างๆ</label>
									<div id="content_phone_niems" class="mt-2"></div>

								</div>
							</div>
						</div>
					</div>
				</center>
			</div>
		</div>

		<!-- ข้อมูลเจ้าหน้าที่ -->
		<div class="card border-top border-0 border-4 border-success">
			<div class="card-body p-3">
				<div class="card-title d-flex align-items-center">
					<div>
						<i class="fa-solid fa-user-police-tie me-1 font-22 text-success"></i>
					</div>
					<h4 class="mb-0 text-success">ข้อมูลเจ้าหน้าที่</h4>
				</div>
				<div style="font-size:22px;">
					<h5>ชื่อผู้ขอความช่วยเหลือ</h5>
					<p>{{ $data_sos_map->user_helper->name }}</p>
					<h5>เบอร์ติดต่อ</h5>
					<p>{{ $data_sos_map->user_helper->phone }}</p>
				</div>
			</div>
		</div>

    </div>
    <div class="col-9">
    	<div class="card border-top border-0 border-4 border-warning">
			<div class="card-body p-3">
				<h3 class="float-start">
					@if($data_sos_map->status != "เสร็จสิ้น")
					<span id="text_duration" class="text-warning"></span> (<span id="show_distance" ></span>) ● <span id="text_arrivalTime"></span>
					@else
						-
					@endif
				</h3>
				@php
                    $class_div_status = '';
                    $text_div_status = '';
                    $class_tga_i_status = '';

                    if($data_sos_map->status == "รับแจ้งเหตุ"){
                        $class_div_status = 'btn-danger' ;
                        $text_div_status = 'text-white' ;
                        $class_tga_i_status = 'fa-solid fa-light-emergency-on' ;
                    }else if($data_sos_map->status == "กำลังไปช่วยเหลือ"){
                        $class_div_status = 'bg-warning' ;
                        $class_tga_i_status = 'fa-solid fa-truck-medical' ;
                    }else if($data_sos_map->status == "ถึงที่เกิดเหตุ"){
                        $class_div_status = 'btn-warning' ;
                        $class_tga_i_status = 'fa-solid fa-location-dot' ;
                    }else if($data_sos_map->status == "ออกจากที่เกิดเหตุ"){
                        $class_div_status = 'bg-warning' ;
                        $class_tga_i_status = 'fa-duotone fa-person-walking-arrow-right' ;
                    }else if($data_sos_map->status == "เสร็จสิ้น"){
                        $class_div_status = 'btn-success' ;
                        $text_div_status = 'text-white' ;
                        $class_tga_i_status = 'fa-solid fa-shield-check' ;
                    }
                @endphp

                <div id="div_show_status">
	                @if($data_sos_map->status != "เสร็จสิ้น")
					<div class="btn-group float-end " role="group">
						<button type="button" class="btn {{ $class_div_status }} {{ $text_div_status }} py-2 px-5 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="{{ $class_tga_i_status }} mr-1"></i>{{ $data_sos_map->status }}
						</button>
						<ul class="dropdown-menu" style="margin: 0px;">
							<li data-toggle="modal" data-target="#Modal_remark_status">
								<span class="dropdown-item text-success btn">
									<i class="fa-solid fa-shield-check"></i> <b>การช่วยเหลือเสร็จสิ้น</b>
								</span>
							</li>
						</ul>
					</div>
					@else
						<button type="button" class="btn {{ $class_div_status }} {{ $text_div_status }} py-2 px-5 float-end">
							<i class="{{ $class_tga_i_status }} mr-1"></i>{{ $data_sos_map->status }}
						</button>
					@endif
                </div>

				<button type="button" class="btn btn-info py-2 float-end" style="margin-right:5px;" data-toggle="modal" data-target="#see_img_sos">
					<i class="fa-regular fa-image mr-1"></i>รูปภาพ
				</button>
			</div>
		</div>
    	<div id="map_command">
    		
    	</div>
    </div>
</div>

<!-- Modal View Image -->
<div class="modal fade" id="see_img_sos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รูปภาพการขอความช่วยเหลือ</h5>
                <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div class="row mt-1">
                    <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center text-center">
                        <div class="masonry_block">
                            <div class="masonry-folio">
                                <div class="masonry_thum">

                                    @if( !empty($data_sos_map->photo))
                                    	<a href="{{ url('storage')}}/{{ $data_sos_map->photo }}" target="bank">
                                            <img src="{{ url('storage')}}/{{ $data_sos_map->photo }}" class="main-shadow" style="border-radius: 5%; object-fit:cover; width: 90%;" height="400px">
                                        </a>
                                    @else
                                        <img src="https://www.viicheck.com/img/stickerline/PNG/17.png" class="main-shadow" style="border-radius: 5%; object-fit:cover; width: 90%;" height="400px" >
                                    @endif

                                </div>

                                <div class="masonry_text mt-3">
                                    @if( !empty($data_sos_map->photo))
                                        <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                        <p class="masonry_cat">
                                        	<span style="font-size:20px;font-weight: bold;">
                                        		{{ $data_sos_map->title_sos }}
                                        	</span>
                                        	<br>
                                        	{{ $data_sos_map->title_sos_other }}
                                        </p>
                                    @else
                                        <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                        <p class="masonry_cat">ผู้ใช้ไม่ได้เพิ่มรูปภาพ</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end masonry_block -->

                    <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center text-center">
                        <div class="masonry_block">
                            <div class="masonry-folio">
                                <div class="masonry_thum">
                                    @if( !empty($data_sos_map->photo_succeed))
                                    	<a href="{{ url('storage')}}/{{ $data_sos_map->photo_succeed }}" target="bank">
                                            <img src="{{ url('storage')}}/{{ $data_sos_map->photo_succeed }}" class="main-shadow" style="border-radius: 5%; object-fit:cover; width: 90%;"  height="400px">
                                        </a>
                                    @else
                                        <img src="https://www.viicheck.com/img/stickerline/PNG/49.png" class="main-shadow" style="border-radius: 5%; object-fit:cover; width: 90%;"  height="400px">
                                    @endif

                                </div>

                                <div class="masonry_text mt-3">
                                    @if( !empty($data_sos_map->photo_succeed) )
                                    	@if(!empty($data_sos_map->remark) )
                                        <h3 class="masonry_title">หมายเหตุรูปภาพเสร็จสิ้น</h3>
                                        <p class="masonry_cat">{{$data_sos_map->remark}}</p>
                                        @endif
                                    @else
                                        <h3 class="masonry_title">รูปภาพเสร็จสิ้น</h3>
                                        <p class="masonry_cat">เจ้าหน้าที่ไม่ได้เพิ่มรูปภาพ</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- end masonry_block -->
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer d-none">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal remark status-->
<div class="modal fade" id="Modal_remark_status" tabindex="-1" aria-labelledby="Label_remark_status" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="Label_remark_status">โปรดระบุหมายเหตุ</h5>
	        	<button id="btn_close_Modal_remark_status" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<center>
		      		<img src="https://www.viicheck.com/img/stickerline/PNG/37.2.png" class="mb-3" style="width: 50%;">
		        	<textarea class="form-control mb-3" id="remark_status" name="remark_status" rows="3" placeholder="ระบุหมายเหตุ เช่น ส่งต่อหน่วยงานที่เกี่ยวข้อง" oninput="check_remark_status();"></textarea>
	      		</center>
	      	</div>
	      	<div class="modal-footer justify-content-center">
	        	<button id="btn_status_success" type="button" class="btn btn-success" disabled style="width:90%;" onclick="update_status_success();">
	        		ยืนยันการเปลี่ยนสถานะ
	        	</button>
	      	</div>
	    </div>
	</div>
</div>

<script>
	
	function check_remark_status(){

		let remark_status = document.querySelector('#remark_status').value ;

		if(remark_status){
			document.querySelector('#btn_status_success').disabled = false;
		}else{
			document.querySelector('#btn_status_success').disabled = true;
		}

	}

</script>

<!-- MAP -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>
	
	var sos_lat = "{{ $data_sos_map->lat }}" ;
	var sos_lng = "{{ $data_sos_map->lng }}" ;
	var officer_lat = "{{ $data_sos_map->user_helper->lat }}" ;
	var officer_lng = "{{ $data_sos_map->user_helper->lng }}" ;

	var map_command ;
	var sos_marker;
	var officer_marker;
	var service;
	var directionsDisplay;

	var steps_travel;
	var steps_travel_arr = [];
	var check_get_dir = "No";

	let check_status = "{{ $data_sos_map->status }}";

	const image_sos = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}";
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/7.png') }}";

	document.addEventListener('DOMContentLoaded', (event) => {
		// console.log("START");
		open_map_command();

	});

	function open_map_command() {
		// console.log("open_map_command");

		map_command = new google.maps.Map(document.getElementById("map_command"), {
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
			position: {
				lat: parseFloat(sos_lat),
				lng: parseFloat(sos_lng)
			},
			map: map_command,
			icon: image_sos,
		});

		const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        // หาชื่อจังหวัด
		geocodeLatLng(geocoder, map_command, infowindow);

		// ---------------
		
		if(check_status != "เสร็จสิ้น"){
			if(check_status != "รับแจ้งเหตุ"){
			// หมุดเจ้าหน้าที่
			if (officer_marker) {
				officer_marker.setMap(null);
			}
			officer_marker = new google.maps.Marker({
				position: {
					lat: parseFloat(officer_lat),
					lng: parseFloat(officer_lng)
				},
				map: map_command,
				icon: image_operating_unit_general,
			});

			// สร้างเส้นทาง
			get_Directions_API(officer_marker, sos_marker);

			loop_check_marker();
			}
		}
		
	}

	function geocodeLatLng(geocoder, map, infowindow) {
		// console.log("geocodeLatLng");
        const input = "{{ $data_sos_map->lat }}"+","+"{{ $data_sos_map->lng }}";
        const latlngStr = input.split(",", 2);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        geocoder
            .geocode({ location: latlng })
            .then((response) => {
                if (response.results[0]) {
                    // เข้าถึงชื่อจังหวัดจากผลลัพธ์
	                const addressComponents = response.results[0].address_components;
	                let cityName = "";
	                for (const component of addressComponents) {
	                    for (const type of component.types) {
	                        if (type === "locality" || type === "administrative_area_level_1") {
	                            cityName = component.long_name;
	                            break;
	                        }
	                    }
	                }
	                
	                if (cityName) {
	                	cityName = cityName.replaceAll("จังหวัด","");
	                	cityName = cityName.replaceAll("จ.","");
	                    // console.log("ชื่อจังหวัด: " + cityName);
	                	search_phone_niems(cityName);
	                } else {
	                    // console.log("ไม่พบชื่อจังหวัด");
	                }

                } else {
                    // window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function search_phone_niems(cityName){

    	fetch("{{ url('/') }}/api/sos_map/search_phone_niems/"+cityName)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result['1669'] != "no"){
                	document.querySelector('#name_1669_area').innerHTML = result['1669'] ;
                	document.querySelector('#btn_ask_1669').classList.remove('d-none');
                	document.querySelector('#btn_ask_1669').setAttribute('onclick' , "ask_to_1669('"+result['1669']+"')");
                }

                if(result['phone_niems'] != "no"){
                	let html_main ;
                	let html_sub ;
                	let content_phone_niems = document.querySelector('#content_phone_niems');
                	
                	for (let i = 0; i < result['phone_niems'].length; i++) {

                		let phone_sp = result['phone_niems'][i]['phone'].split(",");

            			// console.log(phone_sp);

            			let sum_html = '' ;

            			for (let x = 0; x < phone_sp.length; x++) {
            				html_sub = `
            					<span class="btn bg-info mt-2" style="width:95%;">
									`+phone_sp[x]+`
								</span>
								<br>
            				`;
            				sum_html = sum_html + html_sub ;
            			}

                		html = `
	                		<h4>จ.`+result['phone_niems'][i]['province']+`</h4>
							`+sum_html+`
							<hr>
	                	`;

        				content_phone_niems.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                	}
                }
        });

    }

	let reface_loop_check_marker ;

	function loop_check_marker(){

		reface_loop_check_marker = setInterval(function() {

			// console.log(check_status);

			if(check_status != "เสร็จสิ้น"){
				get_location_user_and_officer();
			}else{
				let html_show_status = `
		    		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
						<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
					</button>
		    	`;
		    	document.querySelector('#div_show_status').innerHTML = html_show_status ;
				Stop_reface_loop_check_marker();
			}

        }, 15000);


	}

	function Stop_reface_loop_check_marker() {
        clearInterval(reface_loop_check_marker);
		// console.log("stop success");
        return "stop success" ;
    }

    function get_location_user_and_officer(){

		// console.log("update_location");

        let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	    }; 

        fetch("{{ url('/') }}/api/sos_map/get_location_user_and_officer", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){
            // console.log(data);

            if(data['status'] != "เสร็จสิ้น"){
            	create_marker(data['user_lat'] , data['user_lng'] , data['officer_lat'] , data['officer_lng'])
            }else{
            	check_status = "เสร็จสิ้น";
        		Stop_reface_loop_check_marker();

        		if (directionsDisplay) {
					directionsDisplay.setMap(null);
				}

		        // หมุดเจ้าหน้าที่
				if (officer_marker) {
					officer_marker.setMap(null);
				}

				// หมุดที่เกิดเหตุ 
				if (sos_marker) {
					sos_marker.setMap(null);
				}
				sos_marker = new google.maps.Marker({
					position: {
						lat: parseFloat("{{ $data_sos_map->lat }}"),
						lng: parseFloat("{{ $data_sos_map->lng }}")
					},
					map: map_command,
					icon: image_sos,
				});

				map_command.setCenter(sos_marker.getPosition());
            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function create_marker(sos_lat , sos_lng , start_officer_lat , start_officer_lng){

		// หมุดที่เกิดเหตุ 
		if (sos_marker) {
			sos_marker.setMap(null);
		}
		sos_marker = new google.maps.Marker({
			position: {
				lat: parseFloat(sos_lat),
				lng: parseFloat(sos_lng)
			},
			map: map_command,
			icon: image_sos,
		});

		// หมุดเจ้าหน้าที่
		if (officer_marker) {
			officer_marker.setMap(null);
		}
		officer_marker = new google.maps.Marker({
			position: {
				lat: parseFloat(start_officer_lat),
				lng: parseFloat(start_officer_lng)
			},
			map: map_command,
			icon: image_operating_unit_general,
		});

		// สร้างเส้นทาง
		get_Directions_API(officer_marker, sos_marker);

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
			map: map_command,
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
					map_command.setZoom(map_command.getZoom() - 0.5);
				}, 1000);

				// ระยะทาง
                let text_distance = response.routes[0].legs[0].distance.text;
                document.querySelector('#show_distance').innerHTML = text_distance;
                // เวลา
                let text_duration = response.routes[0].legs[0].duration.text ;
                document.querySelector('#text_duration').innerHTML = text_duration ;
                // เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner
                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value) ;
                document.querySelector('#text_arrivalTime').innerHTML = text_arrivalTime ;

				steps_travel = response.routes[0].legs[0].steps;

				check_get_dir = "Yes";

			} else {
				window.alert('Directions request failed due to ' + status);
			}
		});

	}

</script>

<!-- UPDATE STATUS -->
<script>
	function update_status_success(){

        // console.log(status);
        // console.log(remark_status);
		let remark_status = document.querySelector('#remark_status').value
        let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "status" : "เสร็จสิ้น",
	        "remark_status" : "อัพเดทสถานะเสร็จสิ้นโดย : " + "{{ $data_sos_map->user_helper->name }}" + " หมายเหตุ : " + remark_status,
	    }; 

        fetch("{{ url('/') }}/api/sos_map/update_status", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
            if(data  == "OK"){
            	let html_show_status = `
            		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
						<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
					</button>
            	`;
            	document.querySelector('#div_show_status').innerHTML = html_show_status ;
            	document.querySelector('#btn_close_Modal_remark_status').click();
				check_status = "เสร็จสิ้น";

				help_complete();
        		Stop_reface_loop_check_marker();

        		if (directionsDisplay) {
					directionsDisplay.setMap(null);
				}

		        // หมุดเจ้าหน้าที่
				if (officer_marker) {
					officer_marker.setMap(null);
				}

				// หมุดที่เกิดเหตุ 
				if (sos_marker) {
					sos_marker.setMap(null);
				}
				sos_marker = new google.maps.Marker({
					position: {
						lat: parseFloat("{{ $data_sos_map->lat }}"),
						lng: parseFloat("{{ $data_sos_map->lng }}")
					},
					map: map_command,
					icon: image_sos,
				});

				map_command.setCenter(sos_marker.getPosition());

            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function help_complete(){

		let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "officer_id" : "{{ $data_sos_map->helper_id }}",
	        "groupId" : "{{ $groupId }}",
	    }; 

		fetch("{{ url('/') }}/api/sos_map/help_complete", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
	        }).then(function (response){
	            return response.text();
	        }).then(function(data){
	            // console.log(data);
	    	}).catch(function(error){
	        // console.error(error);
	    });

	}

</script>

<!-- ASK TO 1669 -->
<script>
	
	function ask_to_1669(province){
		console.log("ask_to_1669 >> " + province);
	}

</script>

@endsection
