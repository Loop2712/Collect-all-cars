@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
	#map_command {
      height: calc(75vh);
    }

    .div_alert {
	    position: fixed;
	    top: -100px;
	    bottom: 0;
	    left: 0;
	    width: 100%;
	    height: 50px;
	    text-align: center;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 18px;

	}

	.div_alert span {
	    background-color: #2DD284;
	    border-radius: 10px;
	    color: white;
	    padding: 15px;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 1em;
	}

	.up_down {
	    animation-name: slideDownAndUp;
	    animation-duration:3s;
	}

	@keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(180px);
        }
        90% {
            transform: translateY(180px);
        }
        100% {
            transform: translateY(0);
        }
    }
	#btn_cf_remark_command {
        min-height: 38px;
        min-width: 64px;
    }

    #btn_cf_remark_command.loading::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 23px;
        height: 20px;
        border: 2px solid #fff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
	.spinner {
        display: inline-block;
        margin: 0 8px;
        border-radius: 50%;
        width: 1.5em;
        height: 1.5em;
        border: .215em solid transparent;
        vertical-align: middle;
        font-size: 16px;
        border-top-color: white;
        animation: spiner 1s cubic-bezier(.55, .15, .45, .85) infinite;
    }

    @keyframes spiner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .v-btn-label-enter-active {
        animation: slide-in-down 260ms cubic-bezier(.0, .0, .2, 1);
    }

    .v-btn-label-leave-active {
        animation: slide-out-down 260ms cubic-bezier(.4, .0, 1, 1);
    }

    .icon-save-btn {
        display: inline-block;

    }

    @keyframes slide-in-down {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }

        50% {
            opacity: .8;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slide-out-down {
        0% {
            transform: translateY(0);
            opacity: 1;
        }

        40% {
            opacity: .2;
        }

        100% {
            transform: translateY(20px);
            opacity: 0;
        }
    }
</style>

<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

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
									<i class="fa-sharp fa-solid fa-share mr-1"></i>เลือกการส่งต่อ
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
		                                        <div id="content_1669" class="justify-content-center col-12">
		                                        	@if(empty($data_sos_map->sos_1669_id))
		                                            <b>
		                                                <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
		                                                <span id="name_1669_area" class="d-block" style="color: #ffffff;"></span>
		                                            </b>
		                                            @else
		                                            <b>
		                                                <span class="d-block" style="color: #ffffff;">ส่งต่อ 1669 แล้ว</span>
		                                            </b>
		                                            @endif
		                                        </div>
		                                        
		                                    </div>
		                                </div>
		                            </span>

									<hr>
									<label>หมายเลขโทรศัพท์ <br>ศูนย์รับแจ้งเหตุและสั่งการจังหวัดต่างๆ</label>
									<div id="content_phone_niems" class="mt-2"></div>

									<div class="d-none">
										<input type="text" name="name" id="name" value="{{ $data_sos_map->name }}">
										<input type="text" name="phone" id="phone" value="{{ $data_sos_map->phone }}">
										<input type="text" name="user_id" id="user_id" value="{{ $data_sos_map->user_id }}">
										<input type="text" name="lat" id="lat" value="{{ $data_sos_map->lat }}">
										<input type="text" name="lng" id="lng" value="{{ $data_sos_map->lng }}">
										<input type="text" name="photo_sos_1669" id="photo_sos_1669" value="{{ $data_sos_map->photo }}">
									</div>

								</div>
							</div>
						</div>
					</div>
				</center>
				<hr>
				<div class="card-title d-flex align-items-center">
					<div>
						<i class="fa-solid fa-file me-1 font-22 text-info"></i>
					</div>
					<h4 class="mb-0 text-info">หมายเหตุจากศูนย์ฯ</h4>
				</div>
				<textarea class="form-control mt-2" id="remark_command" name="remark_command" rows="3" placeholder="เพิ่มหมายเหตุจากศูนย์ฯ" oninput="check_data_remark_command();">{{ isset($data_sos_map->remark_command) ? $data_sos_map->remark_command : ''}}</textarea>
				
				
				<button id="btn_cf_remark_command" class="btn btn-sm btn-success mt-2 mb-2 float-end" style="width:50%;" disabled onclick="saveData()">
					<span class="text-save-btn d-non" style="display: inline-block;">ยืนยัน</span>

					<div class="spinner-save-btn d-none">
						<span class="spinner"></span>
					</div>

					<span class="icon-save-btn d-none my-1">
						<i class="fa-solid fa-check"></i>
					</span>
				</button>
			</div>
		</div>
<!-- <span class="mt-2 mb-2 float-start text-success">
					<b>บันทึกเรียบร้อย</b>
				</span> -->
				<!-- ปุม่บันทึก -->
                <!-- <button id="btn_cf_remark_command" class="btn btn-sm btn-success mt-2 mb-2 float-end" style="width:50%;" disabled >
                	ยืนยัน
                </button> -->
		@if(!empty($data_sos_map->helper_id))
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
					<h5>ชื่อเจ้าหน้าที่</h5>
					<p>{{ $data_sos_map->user_helper->name }}</p>
					<h5>เบอร์ติดต่อ</h5>
					<p>{{ $data_sos_map->user_helper->phone }}</p>
				</div>
			</div>
		</div>
		@endif

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
	let isAnimating = true;
	
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

	@if(!empty($data_sos_map->helper_id))
		var officer_lat = "{{ $data_sos_map->user_helper->lat }}" ;
		var officer_lng = "{{ $data_sos_map->user_helper->lng }}" ;
	@else
		var officer_lat = "" ;
		var officer_lng = "" ;
	@endif

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

	// -------------------------------------------------------------------

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
		
		onload_check_status_sos_map();
		
	}

	function onload_check_status_sos_map() {

		// ทำรอบแรกก่อนเข้า LOOP
		fetch("{{ url('/') }}/api/sos_map/loop_check_status_sos_map" + "/" + "{{ $data_sos_map->id }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

            	if(result['status'] != check_status){
	            	// แจ้งเตือนเปลี่ยนสถานะ
	            	Status_change_notification(result['status']);
	            	check_status = result['status'];
	            }

                if(check_status != "เสร็จสิ้น"){

                	if(check_status == "กำลังไปช่วยเหลือ"){
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

                		get_location_user_and_officer();

					}else{
						reset_map();
					}

                }else if(check_status == "เสร็จสิ้น"){

					let html_show_status = `
			    		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
							<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
						</button>
			    	`;
			    	document.querySelector('#div_show_status').innerHTML = html_show_status ;

                	reset_map();

			    	// help_complete()
                	Stop_onload_check_status_sos_map();
                }
        });
        // จบ ทำรอบแรกก่อนเข้า LOOP

        // LOOP
        onload_check_status_sos_map = setInterval(function() {

            console.log('loop_status_sos');

            fetch("{{ url('/') }}/api/sos_map/loop_check_status_sos_map" + "/" + "{{ $data_sos_map->id }}")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                	if(result['status'] != check_status){
		            	// แจ้งเตือนเปลี่ยนสถานะ
		            	Status_change_notification(result['status']);
		            	check_status = result['status'];
		            }

                    if(check_status != "เสร็จสิ้น"){

                    	if(check_status == "กำลังไปช่วยเหลือ"){
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

                    		get_location_user_and_officer();

						}else{
							reset_map();
						}

                    }else if(check_status == "เสร็จสิ้น"){

						let html_show_status = `
				    		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
								<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
							</button>
				    	`;
				    	document.querySelector('#div_show_status').innerHTML = html_show_status ;

                    	reset_map();

				    	// help_complete()
                    	Stop_onload_check_status_sos_map();
                    }
            });

        }, 15000);

    }

    function Stop_onload_check_status_sos_map() {
           // console.log('Stop_onload_check_status_sos_map');
        clearInterval(onload_check_status_sos_map);
    }

    function reset_map(){
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
		map_command.setZoom(15);
    }

	var all_address ;
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

                	all_address = response.results[0].formatted_address ;

	                // console.log(response.results[0]);

                    // เข้าถึงชื่อจังหวัดจากผลลัพธ์
	                const addressComponents = response.results[0].address_components;
	                
	                let cityName = ""; // ชื่อจังหวัด
	                let districtName = ""; // ชื่ออำเภอ (เขต)
	                let subdistrictName = ""; // ชื่อตำบล (แขวง)

	                for (const component of addressComponents) {
	                    for (const type of component.types) {
	                        if (type === "locality" || type === "administrative_area_level_1") {
	                            cityName = component.long_name;
	                        }
	                        if (type === "administrative_area_level_2") {
	                            districtName = component.long_name;
	                        }
	                        if (type === "administrative_area_level_3" || type === "locality") {
	                            subdistrictName = component.long_name;
	                        }
	                    }
	                }

	                if (cityName) {
	                    cityName = cityName.replaceAll("จังหวัด","");
	                	cityName = cityName.replaceAll("จ.","");
	                	cityName = cityName.replaceAll(" ","");
	                    // console.log("ชื่อจังหวัด: " + cityName);
	                }
	                if (districtName) {
	                    districtName = districtName.replaceAll("อำเภอ","");
	                	districtName = districtName.replaceAll("อ.","");
	                	districtName = districtName.replaceAll(" ","");
	                    // console.log("ชื่ออำเภอ (เขต): " + districtName);
	                }
	                if (subdistrictName) {
	                    subdistrictName = subdistrictName.replaceAll("ตำบล","");
	                	subdistrictName = subdistrictName.replaceAll("ต.","");
	                	subdistrictName = subdistrictName.replaceAll(" ","");
	                    // console.log("ชื่อตำบล (แขวง): " + subdistrictName);
	                }
	                
	                if (cityName) {
	                	search_phone_niems(cityName ,districtName ,subdistrictName);
	                } else {
	                    // console.log("ไม่พบชื่อจังหวัด");
	                }

                } else {
                    // window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function search_phone_niems(cityName ,districtName ,subdistrictName){

    	fetch("{{ url('/') }}/api/sos_map/search_phone_niems/"+cityName)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

            	
	                if(result['1669'] != "no"){
	                	@if(empty($data_sos_map->sos_1669_id))
	                		document.querySelector('#name_1669_area').innerHTML = result['1669'] ;
	                		document.querySelector('#btn_ask_1669').setAttribute('onclick' ,
	                		"ask_to_1669('"+cityName+"','"+districtName+"','"+subdistrictName+"')");
	                	@endif

	                	document.querySelector('#btn_ask_1669').classList.remove('d-none');
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
        		
        		reset_map();
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

        let name_admin ;

		name_admin = "{{ Auth::user()->name }}" ;
		
        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "status" : "เสร็จสิ้น",
	        "remark_status" : "อัพเดทสถานะเสร็จสิ้นโดย : " + name_admin + " หมายเหตุ : " + remark_status,
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
        		Stop_onload_check_status_sos_map();

        		reset_map();

				document.querySelector('#alert_text').innerHTML = 'อัพเดทสถานะ "เสร็จสิ้น" เรียบร้อยแล้ว';
	            document.querySelector('#alert_copy').classList.add('up_down');

	            const animated = document.querySelector('.up_down');
	            animated.onanimationend = () => {
	                document.querySelector('#alert_copy').classList.remove('up_down');
	            };

            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function help_complete(){

		let data_arr = [] ;

		let officer_id ;

		@if(!empty($data_sos_map->helper_id))
			officer_id = "{{ $data_sos_map->helper_id }}" ;
		@else
			fetch("{{ url('/') }}/api/sos_map/update_helper_id" + "/" + "{{ Auth::user()->id }}" + "/" + "{{ $data_sos_map->id }}")
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    officer_id = result ;
            	});
		@endif

		setTimeout(function() {
                    
	        data_arr = {
		        "sos_map_id" : "{{ $data_sos_map->id }}",
		        "officer_id" : officer_id,
		        "groupId" : "{{ $groupId }}",
		        "command_id" : "{{ Auth::user()->id }}",
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

		}, 1500);

	}

	var old_remark_command = "{{ $data_sos_map->remark_command }}";

	function check_data_remark_command(){
		let remark_command = document.querySelector('#remark_command').value;

		if(old_remark_command != remark_command){
			document.querySelector('#btn_cf_remark_command').disabled = false ;
			document.querySelector('#btn_cf_remark_command').setAttribute('onclick' , 'submit_remark_command();') ;
		}else{
			document.querySelector('#btn_cf_remark_command').disabled = true ;
			document.querySelector('#btn_cf_remark_command').setAttribute('onclick' , '') ;
		}
	}

	function submit_remark_command(){
		let remark_command = document.querySelector('#remark_command').value;

		old_remark_command = remark_command ;

		let data_arr = [] ;

        data_arr = {
	        "sos_map_id" : "{{ $data_sos_map->id }}",
	        "remark_command" : remark_command,
	    }; 

        fetch("{{ url('/') }}/api/sos_map/submit_remark_command", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
			//annimation
			animation_save_data();
        }).catch(function(error){
            // console.error(error);
        });
	}

</script>

<!-- ASK TO 1669 -->
<script>
	
	function ask_to_1669(cityName ,districtName ,subdistrictName){

		// console.log("ask_to_1669 >> " + cityName);

		let name = document.querySelector("#name");
        let phone = document.querySelector("#phone");
        let user_id = document.querySelector("#user_id");
        let lat = document.querySelector("#lat");
        let lng = document.querySelector("#lng");
        // let photo_sos_1669 = document.querySelector("#photo_sos_1669");
        let district_P = cityName;
        let district_A = districtName;
        let district_T = subdistrictName;

        // API UPLOAD IMG //
        let formData = new FormData();
        let imageFile = document.getElementById('photo_sos_1669').value;
            formData.append('photo_sos', imageFile);

        let data_sos_1669 = {
            "name_user" : name.value,
            "phone_user" : phone.value,
            "user_id" : user_id.value,
            "lat" : lat.value,
            "lng" : lng.value,
            "changwat" : district_P,
            "amphoe" : district_A,
            "tambon" : district_T,
            "all_address" : all_address,
        }
        // console.log(data_sos_1669);

        formData.append('name_user', data_sos_1669.name_user);
        formData.append('phone_user', data_sos_1669.phone_user);
        formData.append('user_id', data_sos_1669.user_id);
        formData.append('lat', data_sos_1669.lat);
        formData.append('lng', data_sos_1669.lng);
        formData.append('changwat', data_sos_1669.changwat);
        formData.append('amphoe', data_sos_1669.amphoe);
        formData.append('tambon', data_sos_1669.tambon);
        formData.append('all_address', data_sos_1669.all_address);
        formData.append('sos_map_id', "{{ $data_sos_map->id }}");

        fetch("{{ url('/') }}/api/create_new_sos_by_user", {
            method: 'POST',
            body: formData
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
        	let name_admin = "{{ Auth::user()->name }}" ;

            if(data){
            	fetch("{{ url('/') }}/api/sos_map/update_sos_1669_id/"+data+"/"+"{{ $data_sos_map->id }}" +"/"+ district_P +"/"+ name_admin)
		            .then(response => response.text())
		            .then(result => {
		                // console.log(result);
		                if(result == "ok"){
			                let html = `
			                	<b>
	                                <span class="d-block" style="color: #ffffff;">ส่งต่อ 1669 แล้ว</span>
	                            </b>
			                `;
			                document.querySelector('#content_1669').innerHTML = html ;

			                document.querySelector('#btn_ask_1669').setAttribute('onclick' ,"");

			                let html_show_status = `
			            		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
									<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
								</button>
			            	`;
			            	document.querySelector('#div_show_status').innerHTML = html_show_status ;
							check_status = "เสร็จสิ้น";

							help_complete();
			        		Stop_onload_check_status_sos_map();

			        		reset_map();

			                document.querySelector('#alert_text').innerHTML = "ส่งต่อ 1669 เรียบร้อยแล้ว";
				            document.querySelector('#alert_copy').classList.add('up_down');

				            const animated = document.querySelector('.up_down');
				            animated.onanimationend = () => {
				                document.querySelector('#alert_copy').classList.remove('up_down');
				            };
		                }
                });
            }

        }).catch(function(error){
            // console.error(error);
        });

	}

	function Status_change_notification(status){

		let img_stk = '{{ url("/") }}/img/stickerline/PNG/37.2.png' ;
            img_info_noti(img_stk , status);

        let audio_update_status = new Audio("{{ asset('sound/เปลี่ยนสถานะ.mp3') }}");
            audio_update_status.play();

        if(status == "เสร็จสิ้น"){
        	let html_show_status = `
        		<button type="button" class="btn btn-success text-white py-2 px-5 float-end">
					<i class="fa-solid fa-shield-check mr-1"></i>เสร็จสิ้น
				</button>
        	`;
        	document.querySelector('#div_show_status').innerHTML = html_show_status ;
        }else{

        	let class_div_status = '' ;
            let text_div_status = '' ;
            let class_tga_i_status = '' ;

        	if(status == "รับแจ้งเหตุ"){
                class_div_status = 'btn-danger' ;
                text_div_status = 'text-white' ;
                class_tga_i_status = 'fa-solid fa-light-emergency-on' ;
            }else if(status == "กำลังไปช่วยเหลือ"){
                class_div_status = 'bg-warning' ;
                class_tga_i_status = 'fa-solid fa-truck-medical' ;
            }else if(status == "ถึงที่เกิดเหตุ"){
                class_div_status = 'btn-warning' ;
                class_tga_i_status = 'fa-solid fa-location-dot' ;
            }else if(status == "ออกจากที่เกิดเหตุ"){
                class_div_status = 'bg-warning' ;
                class_tga_i_status = 'fa-duotone fa-person-walking-arrow-right' ;
            }else if(status == "เสร็จสิ้น"){
                class_div_status = 'btn-success' ;
                text_div_status = 'text-white' ;
                class_tga_i_status = 'fa-solid fa-shield-check' ;
            }

        	let html_show_status = `
        		<div class="btn-group float-end " role="group">
					<button type="button" class="btn `+ class_div_status +` `+ text_div_status +` py-2 px-5 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="`+ class_tga_i_status +` mr-1"></i>`+ status +`
					</button>
					<ul class="dropdown-menu" style="margin: 0px;">
						<li data-toggle="modal" data-target="#Modal_remark_status">
							<span class="dropdown-item text-success btn">
								<i class="fa-solid fa-shield-check"></i> <b>การช่วยเหลือเสร็จสิ้น</b>
							</span>
						</li>
					</ul>
				</div>
        	`;
        	document.querySelector('#div_show_status').innerHTML = html_show_status ;
        }

	}
	function animation_save_data() {

		if (isAnimating) {
			isAnimating = false;

			document.querySelector('.text-save-btn').classList.remove('v-btn-label-enter-active');
			document.querySelector('.text-save-btn').classList.add('v-btn-label-leave-active');

			setTimeout(() => {
				document.querySelector('.text-save-btn').classList.add('d-none');


				document.querySelector('.text-save-btn').classList.remove('v-btn-label-leave-active');
				document.querySelector('.spinner-save-btn').classList.remove('d-none');
				document.querySelector('.spinner-save-btn').classList.add('v-btn-label-enter-active');
			}, 200);

			setTimeout(() => {
				document.querySelector('.spinner-save-btn').classList.add('v-btn-label-leave-active');
			}, 1280);

			setTimeout(() => {
				document.querySelector('.spinner-save-btn').classList.add('d-none');
				document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-enter-active');
				document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-leave-active');

				document.querySelector('.icon-save-btn').classList.add('v-btn-label-enter-active');
				document.querySelector('.icon-save-btn').classList.remove('d-none');
			}, 1500);

			setTimeout(() => {
				document.querySelector('.icon-save-btn').classList.add('v-btn-label-leave-active');
			}, 2000);

			setTimeout(() => {
				document.querySelector('.icon-save-btn').classList.add('d-none');
				document.querySelector('.icon-save-btn').classList.remove('v-btn-label-enter-active');
				document.querySelector('.icon-save-btn').classList.remove('v-btn-label-leave-active');
				document.querySelector('.text-save-btn').classList.remove('d-none');
				document.querySelector('.text-save-btn').classList.add('v-btn-label-enter-active');
				isAnimating = true;
			}, 2200);
		}
	}
</script>

@endsection
