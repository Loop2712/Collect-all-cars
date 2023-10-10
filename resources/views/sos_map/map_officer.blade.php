@extends('layouts.viicheck_for_officer')

@section('content')

<style>
	#map_officer {
		width: 100% !important;
		height: 100% !important;
	}

	.sry-open-location {
		position: relative;
	}

	.sry-open-location-text {
		position: absolute;
		left: 50%;
		transform: translate(-50%, -50%);
		margin: 0;
		padding: 0;
		color: black;
		width: 80%;
	}

	.sry-open-location img {
		margin-top: 30%;
		width: 100%;
		object-fit: cover;
		height: 100%;
	}

	.sry-open-location p {
		font-size: clamp(12px, 5vw, 20px) !important;
	}

	.card_data {
		background-color: rgba(255, 255, 255);
		width: calc(100%);
		height: auto;
		padding: 20px;
		border-radius: 15px;
		box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
		animation: moveAnimation_up 1s linear forwards;
	}

	.card_data_hide {
		/*    	margin-bottom: -100%;*/
		background-color: white;
		width: calc(90%);
		height: auto;
		padding: 20px;
		border-radius: 15px;
		box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
		animation: moveAnimation_down 1s linear forwards;
	}

	@keyframes moveAnimation_down {
		0% {
			bottom: 1%;
		}

		100% {
			bottom: -100%;
		}
	}

	@keyframes moveAnimation_up {
		0% {
			bottom: -100%;
		}

		100% {
			bottom: 1%;
		}
	}

	.btn_show_menu_up {
		animation: moveAnimation_up 0.5s linear forwards;
	}

	.btn_show_menu_down {
		animation: moveAnimation_down 1s linear forwards;
	}

	#btn_show_menu {
		position: absolute;
		z-index: 99999;
		bottom: 1%;
		left: 10%;
		width: 20%;
		max-width: 150px;
		padding: .5rem;
		border-radius: 50px;
		background-color: #db2d2e;
		color: #fff;
		position: absolute;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	hr {
		/* margin: .2rem 0; */
		position: relative;
		color: inherit;
		background-color: currentColor;
		border: 0;
		opacity: .25;

	}

	.gmnoprint,
	.gm-fullscreen-control {
		display: none;
	}.status-bar{
		position: absolute;
		top: 5%;
		/* opacity: 0.5; */
		border-radius: 25px;
		width: 95%;
		transform: translate(2.5%, -50%);
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 8px;
	}
	.img-profile{
		border-radius: 50%;
		width: 46px;
		height: 46px;
		object-fit: cover;
		outline: #000 1px solid;
	}
	.show-status{
		background-color: #000000;
		width: 85%;
		padding: 5px;
		border-radius: 25px;
		color: #fff;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.show-status button{
		color: #fff;
		border-radius: 50%;
	}
	.show-status button:hover{
		color: #fff;
		background-color: #db2d2e;
	}.modal{
		z-index: 999999999999999999;
	}
</style>

<div id="map_officer">
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

<button id="btn_show_menu" class="btn  d-none" onclick="show_menu();">
	<!-- <i class="fa-solid fa-up-to-line mr-1"></i> -->
	<i class="fa-solid fa-chevron-up"></i>
</button>
@php
	$bg_status = '';
	$text_status = '';
	if(!empty($data_sos_map->status) && $data_sos_map->status != 'เสร็จสิ้น'){
		$bg_status = 'bg-warning';
		$text_status = 'text-dark';
	}else{
		$bg_status = 'bg-success';
		$text_status = 'text-white';
	}
@endphp
<div class="status-bar">
	<div class="show-status {{ $bg_status }} {{ $text_status }}" id="situation_of_status">
		<div class="ml-3">
			<i class="fa-solid fa-truck-medical"></i>
			&nbsp;
			@if( !empty($data_sos_map->status) )
			<small class="h6 text-bold p-0 m-0" id="show_status">{{ $data_sos_map->status }}</small>
			<small class="p-0 m-0" id="show_remark_status"></small>
			@endif
		</div>
		<div class="ml-3 d-none">
			<p class="mt-2">
				LAT : <span id="text_show_lat"></span>
				<br>
				LONG : <span id="text_show_lng"></span>
			</p>
		</div>
		<button class="btn btn-danger" style="padding: 12px;"> <i class="fa-duotone fa-camera-retro" onclick="$('#modal_add_photo_sos').modal('show');close_menu();"></i></button>
	</div>
	<div class="btn p-0 m-0" data-toggle="modal" data-target="#exampleModalCenter">
		@if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
		<img class="mobile-nav-toggle main-shadow main-radius" style="margin-right: 15px;" width="35" src="{{ Auth::user()->avatar }}">
		@endif
		@if(!empty(Auth::user()->photo))
		<img class="img-profile" width="45" src="{{ url('storage')}}/{{ Auth::user()->photo }}">
		@endif
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;margin-bottom: -8%;width:100%">

	<div class="card-body">

		<div class="tab-content">
			<div class="tab-content">
				<div class="tab-pane fade" id="tab_content_1" role="tabpanel">
					<div class="card-title d-flex align-items-center">
						<h4 class="card-title">
							<b>
								<span class="mb-0 text-danger"> <i class="fa-solid fa-circle-info me-1 font-22 text-danger "></i> {{ $data_sos_map->title_sos }} </span>
							</b>
						</h4>
					</div>
					<!-- <hr style="width: 65%;border: red solid 0.5px;color: #fff;"> -->
					<p class="card-text" style="font-size:20px;">
						@if($data_sos_map->title_sos_other)
						{{ $data_sos_map->title_sos_other }}
						@else
						ไม่มีการเพิ่มข้อมูล
						@endif
					</p>
				</div>
				<div class="tab-pane fade active show" id="tab_content_2" role="tabpanel">

					@switch($data_sos_map->status)
					    @case('กำลังไปช่วยเหลือ')
					        <button type="button" class="btn btn-warning main-shadow main-radius" style="width:100%;font-size: 20px;border-radius: 50px;" onclick="update_status('ถึงที่เกิดเหตุ',null);">
								<i class="fa-solid fa-location-crosshairs"></i> ถึงที่เกิดเหตุ
							</button>
					    @break
					    @case('ถึงที่เกิดเหตุ')
					        <button type="button" class="btn btn-warning main-shadow main-radius" style="width:100%;font-size: 20px;border-radius: 50px;" onclick="update_status('ออกจากที่เกิดเหตุ',null);">
								<i class="fa-solid fa-right-from-bracket"></i> ออกจากที่เกิดเหตุ
							</button>
					    @break
					    @case('ออกจากที่เกิดเหตุ')
					    	<textarea class="form-control" id="remark_status" name="remark_status" rows="3" placeholder="ระบุหมายเหตุ เช่น ส่งต่อหน่วยงานที่เกี่ยวข้อง" oninput="check_remark_status();"></textarea>
					    	<br>
					        <button id="btn_status_success" type="button" class="btn btn-warning main-shadow main-radius mt-2" style="width:100%;font-size: 20px;border-radius: 50px;" onclick="update_status('เสร็จสิ้น',document.querySelector('#remark_status').value);" disabled>
								<i class="fa-solid fa-shield-check"></i> เสร็จสิ้น
							</button>
					    @break
					    @case('เสร็จสิ้น')
					    	<center>
								<img src="{{ url('/img/stickerline/PNG/6.png') }}" style="width:60%;">
								<br>
								<h5 class="text-danger mt-3"><b>ขอขอบคุณที่ร่วมสร้างสังคมที่ดีครับ</b></h5>
							</center>
					    @break
					@endswitch
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

				<div class="tab-pane fade" id="tab_content_3" role="tabpanel">
					@php
					$lat_gg = '@' . $data_sos_map->lat ;
					@endphp


					<div class="row mt-3">
						<div class="col text-center">
							<i class="fa-regular fa-map-location-dot text-danger mb-2" style="font-size: 2rem;"></i>
							<h6 style="color:#a4a4a4;">ระยะทาง</h6>
							<h4 id="text_distance"></h4>
						</div>
						<div class="col text-center">
							<i class="fa-solid fa-timer text-danger mb-2" style="font-size: 2rem;"></i>
							<h6 style="color:#a4a4a4;">ถึงเวลา</h6>
							<h4 id="text_duration"></h4>
						</div>
						<div class="col">
							<a href="https://www.google.co.th/maps/dir//{{ $data_sos_map->lat }},{{ $data_sos_map->lng }}/{{ $lat_gg }},{{ $data_sos_map->lng }},16z" type="button" class="btn btn-danger main-shadow main-radius d-flex align-items-center" style="width:100%;font-size: 14px;border-radius: 10px;height: 100%;" target="bank">
								Google Map
							</a>
						</div>
					</div>
				</div>
			</div>

			<hr>
			<div class="row text-center">
				<div class="col-3 p-1">
					<button id="btn_menu_1" type="button" class="btn btn-outline-danger" style="width:100%; border-radius: 50px;" onclick="click_menu('1');">
						<i class="fa-solid fa-file" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3 p-1">
					<button id="btn_menu_2" type="button" class="btn btn-danger" style="width:100%; border-radius: 50px;" onclick="click_menu('2');">
						<i class="fa-regular fa-truck-medical" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3 p-1">
					<button id="btn_menu_3" type="button" class="btn btn-outline-danger" style="width:100%; border-radius: 50px;" onclick="click_menu('3');">
						<i class="fa-sharp fa-solid fa-circle-info" style="font-size:25px;"></i>
					</button>
				</div>
				<div class="col-3 p-1">
					<a href="{{ url('/video_call_4/before_video_call_4?type=sos_map&sos_id=') . $data_sos_map->id }}" type="button" class="btn btn-info text-white" style="width:100%; border-radius: 50px;" target="bank">
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
<div class="modal fade" id="modal_add_photo_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  	<div class="modal-dialog modal-dialog-centered ">
    	<div class="modal-content">
      		<div class="modal-header d-flex align-items-center">
				<h3 class="m-0"> <b>เพิ่มภาพถ่าย</b> </h3>
        		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true"><i class="fa-solid fa-xmark-large"></i></span>
        		</button>
      		</div>

      		<form method="POST" action="{{ url('/sos_map/' . $data_sos_map->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
           		{{ method_field('PATCH') }}
        		{{ csrf_field() }}
      			<div class="modal-body text-center">
					<div class="col-12">
						
						<div class="row text-center">
							<ul class="nav mb-3" role="tablist">
							  	<li class="nav-item col-6" role="presentation" >
							    	<a class="nav-link active btn btn-outline-danger" id="li1" data-bs-toggle="pill" href="#danger-pills-photo_sos" role="tab" aria-selected="true">
							      		<div class="">
							        		<div class="tab-icon d-block"><i class="fa-solid fa-car-burst font-18 me-1"></i></div>
							        		<div class="tab-title d-block">สถานที่เกิดเหตุ</div>
							      		</div>
							    	</a>
							  	</li>
							  	<li class="nav-item col-6" role="presentation" >
							    	<a class="nav-link btn btn-outline-success" id="li2" data-bs-toggle="pill" href="#danger-pills-success" role="tab" aria-selected="false">
								      	<div class="">
									        <div class="tab-icon d-block"><i class="fa-regular fa-house-medical-circle-check font-18 me-1"></i></div>
									        <div class="tab-title d-block">เสร็จสิ้น</div>
								      	</div>
							    	</a>
							  	</li>
							</ul>
						</div>

						<div class="tab-content" id="danger-pills-tabContent" style="border-color: red;">
							<!-- สถานที่เกิดเหตุ -->
							<div class="tab-pane fade active show" id="danger-pills-photo_sos" role="tabpanel" style="border:solid #db2d2e ;border-radius:25px;padding: 15px;">
								<label class="col-12" style="padding:0px;" for="photo_sos_by_officers" >
									<div class="fill parent" style="padding:0px;object-fit: cover;">
									@if( empty($data_sos_map->photo) )
										<img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/Flex/1.png') }}" class="card-img-top center" style="padding: 10px;">
										<h4 class="mt-4">ผู้ใช้ไม่ได้เพิ่มภาพถ่าย</h4>
									@else
										<a href="{{ url('storage')}}/{{ $data_sos_map->photo }}" target="bank">
											<img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ url('storage')}}/{{ $data_sos_map->photo }}" class="card-img-top center" style="padding: 10px;">
										</a>
									@endif
									</div>
								</label>
							</div>
							<!-- ภาพถ่ายเสร็จสิ้น -->
							<div class="tab-pane fade" id="danger-pills-success" role="tabpanel" style="border:solid green ;border-radius:25px;padding: 15px;">
								<label class="col-12" style="padding:0px;" for="photo_succeed" >
									<div class="fill parent" style="border:dotted green ;border-radius:25px;padding:0px;object-fit: cover;">
										@if(empty($data_sos_map->photo_succeed))
											<div class="form-group p-3" id="add_select_img_photo_succeed">
												<input class="form-control d-none" name="photo_succeed" style="margin:20px 0px 10px 0px;" type="file" id="photo_succeed" accept="image/*" onchange="document.getElementById('show_photo_succeed').src = window.URL.createObjectURL(this.files[0]);check_add_img_succeed();">
												<div  class="text-center">
													<center>
														<img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/20.png') }}" class="card-img-top center" style="padding: 10px;">
													</center>
													<br>
													<h4 class="text-center m-0">
														<b>เลือก<u>รูปภาพเสร็จสิ้น</u> "คลิก"</b> 
													</h4>
												</div>
												
											</div>
											<img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_succeed" />
										@else
											<div class="form-group p-3 d-none" id="add_select_img_photo_succeed">
												<input class="form-control d-none" name="photo_succeed" style="margin:20px 0px 10px 0px;" type="file" id="photo_succeed" value="{{ isset($data_sos_map->photo_succeed) ? $data_sos_map->photo_succeed : ''}}" accept="image/*" onchange="document.getElementById('show_photo_succeed').src = window.URL.createObjectURL(this.files[0]);check_add_img_succeed();">
												<div  class="text-center">
													<center>
														<img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/20.png') }}" class="card-img-top center" style="padding: 10px;">
													</center>
													<br>
													<h3 class="text-center m-0">
														<b>กรุณาเลือกรูป "คลิก"</b> 
													</h3>
												</div>
												
											</div>
											<img class="full_img" style="padding:0px ;" width="100%" alt="your image" src="{{ url('storage')}}/{{ $data_sos_map->photo_succeed }}" id="show_photo_succeed" />
											
										@endif
										<div class="child">
											<span>เลือกรูป</span>
										</div>
									</div>
									<textarea class="form-control mt-3" id="remark" name="remark" rows="3" placeholder="หมายเหตุ">{{ isset( $data_sos_map->remark ) ? $data_sos_map->remark : ''}}</textarea>
								</label>

								<input name="photo_succeed_by" id="photo_succeed_by" class="d-none" value="{{ Auth::user()->id }}">
				            	<div class="form-group d-none">
							        <input id="btn_submit_form_photo" class="btn btn-primary" type="submit">
							    </div>
							    <button id="btn_help_area" style="width:40%;" type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#btn-loading" data-bs-dismiss="modal" aria-label="Close" onclick="document.querySelector('#btn_submit_form_photo').click();">
					           		ยืนยัน
					        	</button>

							</div>
						</div>
					</div>
      			</div>
      		</form>
	      	<div class="modal-footer">
	        	<!--  -->
	      	</div>
    	</div>
  	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<script>
	var officer_marker;
	var sos_marker;
	var service;
	var directionsDisplay;
	var steps_travel;
	var steps_travel_arr = [];

	var check_send_update_location_officer;
	var seconds_officer;

	var check_get_dir = "No";

	var map_officer;

	var sos_lat = "{{ $data_sos_map->lat }}";
	var sos_lng = "{{ $data_sos_map->lng }}";

	let check_status = "{{ $data_sos_map->status }}";

	const image_sos = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}";
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/7.png') }}";

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
		// console.log("open_map_officer");

		start_officer_lat = position.coords.latitude;
		start_officer_lng = position.coords.longitude;

		// console.log("start_officer_lat > " + start_officer_lat);
		// console.log("start_officer_lng > " + start_officer_lng);
		// console.log("sos_lat > " + sos_lat);
		// console.log("sos_lng > " + sos_lng);

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
			position: {
				lat: parseFloat(sos_lat),
				lng: parseFloat(sos_lng)
			},
			map: map_officer,
			icon: image_sos,
		});

		if(check_status != "เสร็จสิ้น"){
			// create_marker(sos_lat , sos_lng , start_officer_lat , start_officer_lng);
			navigator.geolocation.getCurrentPosition(update_location_officer);
			loop_check_marker();
		}
		
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
			map: map_officer,
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
			map: map_officer,
			icon: image_operating_unit_general,
		});

		// สร้างเส้นทาง
		get_Directions_API(officer_marker, sos_marker);

	}

	let reface_loop_check_marker ;

	function loop_check_marker(){

		reface_loop_check_marker = setInterval(function() {

			if(check_status != "เสร็จสิ้น"){
				
				// console.log(check_status);

	        	if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(update_location_officer);
				} else {
					// x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}else{
				Stop_reface_loop_check_marker();
			}

        }, 15000);


	}

	function Stop_reface_loop_check_marker() {
        clearInterval(reface_loop_check_marker);
        return "stop success" ;
    }

	function update_location_officer(position){

		// console.log("update_location_officer");

		let officer_lat = position.coords.latitude;
		let officer_lng = position.coords.longitude;

		// console.log("officer_lat >> " + officer_lat);
		// console.log("officer_lng >> " + officer_lng);

        let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "officer_id" : "{{ Auth::user()->id }}",
	        "officer_lat" : officer_lat,
	        "officer_lng" : officer_lng,
	    }; 

        fetch("{{ url('/') }}/api/sos_map/update_location_officer", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){
            // console.log(data);

            if(data){
            	create_marker(data['lat'] , data['lng'] , officer_lat , officer_lng)
            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function update_status(status , remark_status){

        // console.log(status);
        // console.log(remark_status);

        let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "status" : status,
	        "remark_status" : remark_status,
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

            if (data == "OK") {

            	let html_btn_status ;
            	let bg_status ;
            	let text_status ;

            	switch(status) {
				  	case 'ถึงที่เกิดเหตุ':
				    	html_btn_status = `
				    		<button type="button" class="btn btn-warning main-shadow main-radius" style="width:100%;font-size: 20px;border-radius: 50px;" onclick="update_status('ออกจากที่เกิดเหตุ',null);">
								<i class="fa-solid fa-right-from-bracket"></i> ออกจากที่เกิดเหตุ
							</button>
				    	`;
				    	bg_status = 'bg-warning';
						text_status = 'text-dark';
				    break;
				  	case 'ออกจากที่เกิดเหตุ':
				    	html_btn_status = `
				    		<textarea class="form-control" id="remark_status" name="remark_status" rows="3" placeholder="ระบุหมายเหตุ เช่น ส่งต่อหน่วยงานที่เกี่ยวข้อง" oninput="check_remark_status();"></textarea>
					    	<br>
					        <button id="btn_status_success" type="button" class="btn btn-warning main-shadow main-radius mt-2" style="width:100%;font-size: 20px;border-radius: 50px;" onclick="update_status('เสร็จสิ้น',document.querySelector('#remark_status').value);" disabled>
								<i class="fa-solid fa-shield-check"></i> เสร็จสิ้น
							</button>
				    	`;
				    	bg_status = 'bg-warning';
						text_status = 'text-dark';
				    break;
				    case 'เสร็จสิ้น':
				    	html_btn_status = `
				    		<center>
								<img src="{{ url('/img/stickerline/PNG/6.png') }}" style="width:60%;">
								<br>
								<h5 class="text-danger mt-3"><b>ขอขอบคุณที่ร่วมสร้างสังคมที่ดีครับ</b></h5>
							</center>
				    	`;
				    	bg_status = 'bg-success';
						text_status = 'text-white';

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
								lat: parseFloat(sos_lat),
								lng: parseFloat(sos_lng)
							},
							map: map_officer,
							icon: image_sos,
						});

						map_officer.setCenter(sos_marker.getPosition());
						help_complete();
				    break;
				}

				check_status = status;

				let class_new_status = 'show-status ' + bg_status + ' ' + text_status ;
				document.querySelector('#situation_of_status').setAttribute('class' , class_new_status );
				document.querySelector('#show_status').innerHTML = status;

				let tab_content_2 = document.querySelector('#tab_content_2');
					tab_content_2.innerHTML = html_btn_status ;

            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function help_complete(){

		let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "officer_id" : "{{ Auth::user()->id }}",
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
					map_officer.setZoom(map_officer.getZoom() - 0.5);
				}, 1000);

				// ระยะทาง
				let text_distance = response.routes[0].legs[0].distance.text;
				// console.log("text_distance >> " + text_distance);
				document.querySelector('#text_distance').innerHTML = text_distance;
				// เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner
				let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value);
				// console.log("text_arrivalTime >> " + text_arrivalTime);
				document.querySelector('#text_duration').innerHTML = text_arrivalTime;

				steps_travel = response.routes[0].legs[0].steps;

				check_get_dir = "Yes";

			} else {
				window.alert('Directions request failed due to ' + status);
			}
		});

	}

	function check_add_img_succeed(){
		document.querySelector('#add_select_img_photo_succeed').classList.add('d-none')
		document.querySelector('#photo_succeed').classList.add('d-none');
		document.querySelector('#show_photo_succeed').classList.remove('d-none');
	}

</script>

<!-- MENU BAR -->
<script>
	function click_menu(id) {
		var element = document.getElementById('btn_menu_' + id);
		var test = element.classList.contains('btn-danger');
		// console.log(test)
		// console.log(id)
		active_menu = id;

		for (let i = 1; i <= 3; i++) {
			// document.querySelector('#menu_'+ [i]).classList.add('d-none');
			document.querySelector('#btn_menu_' + [i]).classList.remove('btn-danger');
			document.querySelector('#btn_menu_' + [i]).classList.add('btn-outline-danger');
		}

		if (test !== true) {
			document.querySelector('#btn_menu_' + id).classList.add('btn-danger');
			document.querySelector('#btn_menu_' + id).classList.remove('btn-outline-danger');
			active_menu = id;
		} else {
			// console.log("พับเมนูเก็บ");
			active_menu = id;

			let card = document.querySelector('.card_data');
			card.classList.remove('card_data');
			card.classList.add('card_data_hide');
			setTimeout(() => {
				card.classList.toggle('d-none');
			}, 1100);

			document.querySelector('#btn_show_menu').classList.toggle('d-none');
			document.querySelector('#btn_show_menu').classList.add('btn_show_menu_up');
			document.querySelector('#btn_show_menu').classList.remove('btn_show_menu_down');
		}

		document.querySelector('#li_menu_' + id).click();

	}

	var active_menu = '2' ;

	function show_menu() {
		let card = document.querySelector('.card_data_hide');
		card.classList.remove('card_data_hide');
		card.classList.toggle('d-none');

		card.classList.add('card_data');

		click_menu(active_menu);
		setTimeout(() => {
			document.querySelector('#btn_show_menu').classList.toggle('d-none');
		}, 1100);

		document.querySelector('#btn_show_menu').classList.remove('btn_show_menu_up');
		document.querySelector('#btn_show_menu').classList.add('btn_show_menu_down');
	}

	function close_menu(){
		let card = document.querySelector('#btn_menu_' + active_menu).click();

	}
</script>


@endsection