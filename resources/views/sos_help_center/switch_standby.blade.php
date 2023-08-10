@extends('layouts.viicheck')

@section('content')
<style>
	body, html {
  height: 100%;
  width: 100%;
}

	body,div , span ,body,h1,h2,h3,h4,h5 ,h6{
		font-family: 'Kanit', sans-serif !important;
	}
	#map_officers_switch {
		position: relative;
		width: 100% !important; 
		height: 100%!important; 

    }
	#topbar{
		display: none !important;
	} header{
		display: none !important;
	}
	footer{
		display: none !important;

	}.gmnoprint{
		display: none;
	}
	.gm-fullscreen-control{
		display: none;
	}
	.gm-svpc{
		display: none;
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
}[alt="google"] {
    display: none !important;
}.menubar{
		position: absolute;
		padding: 5px;
		bottom: 1%;
		background-color: #000000;
		/* opacity: 0.5; */
		border-radius: 25px;
		width: 80%;
		transform: translate(10%, 50%);
		display: flex;
		justify-content: space-around;
		animation: show-menubar 0.31s ease 0s 1 normal forwards;
		left: 10%;

	}
	@keyframes show-menubar {
		0% {
			transform: translateY(100px);
		}

		100% {
			transform: translateY(0);
		}
	}
	.menubar button{
		color: #fff;
		border-radius: 25px;
		height: 40px;
		width: 40px;
	}
	.menubar button i{
		font-size: 18px;
		display: flex;
		justify-content: center;
	}
	.menubar button:hover{
		color: #fff;
		border-radius: 25px;
	}
	.data-menu{
		/* display: none; */
		position: absolute;
		border-radius: 25px;
		width: 99%;
		
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin: 0 auto;
	}

	.data-menu.show-data-menu menu{
		opacity: 0;
		animation: show-data-menu 0.5s ease 0s 1 normal forwards;
	}
	.data-menu.show-data-menu menu:nth-of-type(1){ animation-delay: 0.0s; }
  .data-menu.show-data-menu menu:nth-of-type(2){ animation-delay: 0.1s; }
  .data-menu.show-data-menu menu:nth-of-type(3){ animation-delay: 0.2s; }
  .data-menu.show-data-menu menu:nth-of-type(4){ animation-delay: 0.3s; }
  .data-menu.show-data-menu menu:nth-of-type(5){ animation-delay: 0.4s; }

	
	@keyframes show-data-menu {
		0% {
			transform: translateY(50%);
			opacity: 0;
		}

		100% {
			transform: translateY(0);
			opacity: 1;

		}
	}
	
	

.badge-wrap {
  position: relative;
  display: inline-block;
}


.badge-without-number {
  	position: absolute;
    font-size: 11px;
    width: 15px;
  	height: 15px;
    border-radius: 50%;
  	top: 0;
  	right: 0;
}

.badge-without-number.with-wave {
  animation-name: wave;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.badge-without-number.with-wave-danger {
  animation-name: wave-danger;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

@keyframes wave {
  0% {box-shadow: 0 0 0px 0px #29cc39;}
  100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
}

@keyframes wave-danger {
  0% {box-shadow: 0 0 0px 0px #db2d2e;}
  100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
}
.text-officer{
	white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 100%;
}
.box-status-officer{
	width: 7%;
}

.switch {
  font-size: 17px;
  position: relative;
  display: inline-block;
  width: 3.5em;
  height: 2em;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: .4s;
  border-radius: 30px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 1.4em;
  width: 1.4em;
  border-radius: 20px;
  left: 0.3em;
  bottom: 0.3em;
  background-color: white;
  transition: .3s cubic-bezier(0,2.18,.64,.69);
}

input:checked + .slider {
  background-color: #3bd826;
}

input:focus + .slider {
  box-shadow: 0 0 1px #3bd826;
}

input:checked + .slider:before {
  transform: translateX(1.5em);
}
.avatar {
  height: 60px;
  width: 60px;
  background-color: rgb(23, 111, 211);
  border-radius: 50%;
  align-self: center;
  padding: 6px;
  cursor: pointer;
  box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015),100px 100px 80px rgba(0, 0, 0, 0.03);
}

.form-data-officer button {
  align-self: flex-end;
}

.input-data-officer, button {
  border: none;
  outline: none;
  width: 100%;
  padding: 16px 10px;
  background-color: rgb(247, 243, 243);
  border-radius: 10px;
  box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015),100px 100px 80px rgba(0, 0, 0, 0.03);
}

.button-submit-data-officer {
  margin-top: 12px;
  background-color: rgb(23, 111, 211);
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  position: relative;
  display: block;
}
.button-submit-data-officer::after {
  content: '';
  display: block;
  width: 1.2em;
  height: 1.2em;
  position: absolute;
  left: calc(50% - 0.75em);
  top: calc(50% - 0.75em);
  border: 0.15em solid transparent;
  border-right-color: white;
  border-radius: 50%;
  animation: button-anim 0.7s linear infinite;
  opacity: 0;
}

@keyframes button-anim {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}

.button-submit-data-officer.loading {
  color: transparent;
}

.button-submit-data-officer.loading::after {
  opacity: 1;
}
.input-data-officer {
  font-weight: bold
}
.input-data-officer:focus {
  border: 1px solid rgb(23, 111, 211);
  font-weight: bold
}

#file {
  display: none;
}option:checked { display:none; }
</style>


<div id="map_officers_switch">
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
<div class="menubar show-menubar">
	<button class="btn w-25 btn_menu" id="btn_menu_1" onclick="show_data_menu(1);"><i class="fa-solid fa-light-emergency-on"></i></button>
	<button class="btn w-25 btn_menu" id="btn_menu_2" onclick="show_data_menu(2);"><i class="fa-solid fa-user-pen"></i></button>
</div>

<div class="row data-menu show-data-menu d-none" id="menu_1" style="bottom:10%">
	<menu class="col-12" id="div_switch">
		<div id="show_level_by_officers" class="card-body p-3 main-shadow bg-white" style="border-radius: 15px;">
			<div class="d-flex align-items-center">
					<div class="centered">
						<div class="badge-wrap">
							@if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
								<img id="img_profile" src="{{ Auth::user()->avatar }}" width="60" height="60" class="rounded-circle" alt="">
							@endif
							@if(!empty(Auth::user()->photo))
								<img id="img_profile" src="{{ url('storage')}}/{{ Auth::user()->photo }}" width="60" height="60" class="rounded-circle" alt="">
							@endif
						<div id="badge-status-officer" class="badge-without-number with-wave d-none"></div>
					</div>
				</div>
				<div class="flex-grow-1 ms-3 box-status-officer">
					<p class="mb-0 ">
						<span class="badge badge-pill bg-light-danger pl-0" id="text_show_standby"></span>
					</p>
					<p class="font-weight-bold mb-0 text-officer notranslate" id="p_name_officer">{{ $data_standby->name_officer }}</p>
					<!-- <p class="text-secondary mb-0">online</p> -->
					
				</div>
				<label class="switch d-none" id="lable_switch_standby">
					<input id="switch_standby" type="checkbox" onclick="click_switch_standby();">
					<span class="slider"></span>
				</label>
			</div>
		</div>
	</menu>
</div>

<div class="row data-menu show-data-menu d-none" id="menu_2" style="bottom: 10%;">
	<menu class="col-12 "  >
		<div class="bg-white card-body p-3 main-shadow" style="border-radius: 15px; ">
			<center>	
				<div class="text-center div-text-status ">
					<h5 class="mb-0 font-weight-bold text-of-status">แก้ไขข้อมูลส่วนตัว</h5>
				</div>
			</center>
			<div class="text-center">
				<input id="img_officer" class="d-none" type="file"  value="" accept="image/*" onchange="document.getElementById('show_img_officer').src = window.URL.createObjectURL(this.files[0]);show_img();">

				
				<div id="div_img_officer">
					@if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
						<label class="avatar mt-3" for="img_officer">
							<span> 
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
									<g stroke-width="0" id="SVGRepo_bgCarrier"></g>
									<g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
									<g id="SVGRepo_iconCarrier"> 
										<path fill="#ffffff" d="M17.1813 16.3254L15.3771 14.5213C16.5036 13.5082 17.379 12.9869 18.2001 12.8846C19.0101 12.7837 19.8249 13.0848 20.8482 13.8687C20.8935 13.9034 20.947 13.9202 21 13.9202V15.024C21 19.9452 19.9452 21 15.024 21H8.976C4.05476 21 3 19.9452 3 15.024V13.7522C3.06398 13.7522 3.12796 13.7278 3.17678 13.679L4.45336 12.4024C5.31928 11.5365 6.04969 10.8993 6.71002 10.4791C7.3679 10.0605 7.94297 9.86572 8.50225 9.86572C9.06154 9.86572 9.6366 10.0605 10.2945 10.4791C10.9548 10.8993 11.6852 11.5365 12.5511 12.4024L16.8277 16.679C16.9254 16.7766 17.0836 16.7766 17.1813 16.679C17.2789 16.5813 17.2789 16.423 17.1813 16.3254Z" opacity="0.1"></path> 
										<path stroke-width="2" stroke="#ffffff" d="M3 8.976C3 4.05476 4.05476 3 8.976 3H15.024C19.9452 3 21 4.05476 21 8.976V15.024C21 19.9452 19.9452 21 15.024 21H8.976C4.05476 21 3 19.9452 3 15.024V8.976Z"></path> 
										<path stroke-linecap="round" stroke-width="2" stroke="#ffffff" d="M17.0045 16.5022L12.7279 12.2256C9.24808 8.74578 7.75642 8.74578 4.27658 12.2256L3 13.5022"></path> 
										<path stroke-linecap="round" stroke-width="2" stroke="#ffffff" d="M21.0002 13.6702C18.907 12.0667 17.478 12.2919 15.1982 14.3459"></path> 
										<path stroke-width="2" stroke="#ffffff" d="M17 8C17 8.55228 16.5523 9 16 9C15.4477 9 15 8.55228 15 8C15 7.44772 15.4477 7 16 7C16.5523 7 17 7.44772 17 8Z"></path> 
									</g>
								</svg>
							</span>
						</label>
					@endif
					@if(!empty(Auth::user()->photo))
					<label class="mt-3"  for="img_officer">
						<img src="{{ url('storage')}}/{{ Auth::user()->photo }}" width="60" height="60" class="rounded-circle" alt="">
					</label>
					@endif
				</div>
				<label class="mt-3 d-none" id="leble_show_img_officer" for="img_officer">
					<img width="60" height="60" class="rounded-circle" alt="your image" for="img_officer" id="show_img_officer"/>
				</label>
				<input type="text" class="input-data-officer mt-3 " id="name_officer"placeholder="ชื่อ" value="{{ isset($data_standby->name_officer) ? $data_standby->name_officer : Auth::user()->id}}">

				<select class="input-data-officer mt-3" id="officer_level" name="level">
					<option class="notranslate font-weight-bold" value="FR">FR</option>
					<option class="notranslate font-weight-bold" value="BLS">BLS</option>
					<option class="notranslate font-weight-bold" value="ILS">ILS</option>
					<option class="notranslate font-weight-bold" value="ALS">ALS</option>
				</select>

				<select class="input-data-officer mt-3" id="vehicle_type" name="level">
					<option class="notranslate font-weight-bold" value="รถ">รถ</option>
					<option class="notranslate font-weight-bold" value="อากาศยาน">อากาศยาน</option>
					<option class="notranslate font-weight-bold" value="เรือ ป.1">เรือ ป.1</option>
					<option class="notranslate font-weight-bold" value="เรือ ป.2">เรือ ป.2</option>
					<option class="notranslate font-weight-bold" value="เรือ ป.3">เรือ ป.3</option>
					<option class="notranslate font-weight-bold" value="เรือประเภทอื่นๆ">เรือประเภทอื่นๆ</option>
				</select>

				<button id="btn_submit_data_officer" class="button-submit-data-officer" onclick="edit_data_officer();">แก้ไข</button>
			</div>
		</div>
	</menu>
	
</div>


 <div id="div_switch" class="col-12 d-none hide opacity-0" style="opacity: 0;display: none;">
	<h3 class="text-center">สถานะ : <span id="text_show_standby"></span></h3>
	<div class="toggle-switch">
		<label class="switch-label">
			<input id="switch_standby" class="switch-input" type="checkbox" onclick="click_switch_standby();">
			<span class="slider"></span>
		</label>
	</div>
	<div class="row text-center d-none">
		<div class="col-6">
			<h5>ไม่พร้อม</h5>
		</div>
		<div class="col-6">
			<h5>พร้อม</h5>
		</div>
	</div>
</div>










<!-- <style>
	#topbar{
		display: none !important;
	} header{
		display: none !important;
	}
	footer{
		display: none !important;

	}
	#map_officers_switch {
		position: relative;
		height: calc(100vh);

      	width: 100% !important; 
    }
	/* #map_officers_switch {
		width: 100%!important; 
		height: 100% !important;
	} */
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
</style>

<div id="map_officers_switch">
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
<div class="row notranslate"> -->

	<!-- <div class="col-12 text-center">
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
	</div> -->
	<!-- <div id="div_switch" class="col-12 d-none">
		<h3 class="text-center">สถานะ : <span id="text_show_standby"></span></h3>
		<br>
		<div class="toggle-switch">
            <label class="switch-label">
                <input id="switch_standby" class="switch-input" type="checkbox" onclick="click_switch_standby();">
                <span class="slider"></span>
            </label>
        </div>
        <div class="row text-center d-none">
        	<div class="col-6">
        		<h5>ไม่พร้อม</h5>
        	</div>
        	<div class="col-6">
        		<h5>พร้อม</h5>
        	</div>
        </div>
	</div>
</div> -->
	
<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script> -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th&callback=initMap"></script> -->

<script>
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";
	var officer_marker ;

	var lat ;
	var lng ;

	document.addEventListener('DOMContentLoaded', (event) => {
		check_user_open();
		let status_officers = '{{ $data_standby->status }}' ;

		let switch_standby = document.querySelector('#switch_standby');

        if (status_officers === 'Standby') {
        	switch_standby.checked = true ;
        }
		check_value();
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

        // initMap();
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

        document.querySelector('#div_switch').classList.remove('d-none');
        document.querySelector('#badge-status-officer').classList.remove('d-none');
        document.querySelector('#lable_switch_standby').classList.remove('d-none');
        click_switch_standby();

    }

	function click_switch_standby(){
		let m_lat = lat ;
    	let m_lng = lng ;
    	
		let switch_standby = document.querySelector('#switch_standby');
		let status ;

		if (switch_standby.checked) {
			// console.log('พร้อม');
			status = "Standby" ;
			document.querySelector('#text_show_standby').innerHTML = "พร้อมช่วยเหลือ" ;
			document.querySelector('.badge-without-number').classList.remove('bg-danger');
			document.querySelector('.badge-without-number').classList.add('bg-success');
			document.querySelector('.badge-without-number').classList.add('with-wave');
			document.querySelector('.badge-without-number').classList.remove('with-wave-danger');

			document.querySelector('#text_show_standby').classList.add('text-success');
			document.querySelector('#text_show_standby').classList.remove('text-danger');

		}else{
			// console.log('ไม่พร้อม');
			status = "Not_ready" ;
			document.querySelector('.badge-without-number').classList.remove('bg-success');
			document.querySelector('.badge-without-number').classList.remove('with-wave');
			document.querySelector('.badge-without-number').classList.add('with-wave-danger');

			document.querySelector('.badge-without-number').classList.add('bg-danger');

			document.querySelector('#text_show_standby').innerHTML = "ยังไม่พร้อมช่วยเหลือ" ;
			document.querySelector('#text_show_standby').classList.remove('text-success');
			document.querySelector('#text_show_standby').classList.add('text-danger');
		}

		let text_lat = m_lat.toString() ;
		let text_lng = m_lng.toString() ;

		fetch("{{ url('/') }}/api/update_status_officer_Standby" + "/" + status + "/" + '{{ $data_user->id }}' + "/" + text_lat + "/" + text_lng)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

        });
	}

</script>

<script>
		function show_data_menu(id){
			var element = document.getElementById('btn_menu_'+id);
			var test = element.classList.contains('btn-danger');

			
			for (let i = 1; i <= 2; i++) {
				document.querySelector('#menu_'+ [i]).classList.add('d-none');
				document.querySelector('#btn_menu_'+ [i]).classList.remove('btn-danger');
			}

			if (test === true) {
				document.querySelector('#menu_'+ id).classList.add('d-none');
			} else {
				document.querySelector('#btn_menu_'+ id).classList.toggle('btn-danger');
				document.querySelector('#menu_'+ id).classList.toggle('d-none');
				
			}
		}
	</script>
	<script>
		const btn_submit = document.getElementById("btn_submit_data_officer");
		btn_submit.addEventListener('click', () => {
		// Show loader on button click
		btn_submit.classList.add("loading");
		// Hide loader after success/failure - here it will hide after 2seconds
		setTimeout(() => btn_submit.classList.remove("loading"), 3000);
		});
	</script>
	<script>
		function check_value() {
			let officer_level = document.getElementById('officer_level');
			let option_level;
			for (var i=0; i<officer_level.options.length; i++) {
				option_level = officer_level.options[i];
				if (option_level.value === "{{ $data_standby->level }}") {

					option_level.setAttribute('selected', true);

				} 
			}


			// เช็ค ยานภาหนะ และใส่ selected
			let vehicle = document.getElementById('vehicle_type');
			let option_vehicle;
			for (var i=0; i<vehicle.options.length; i++) {
				option_vehicle = vehicle.options[i];
				if (option_vehicle.value === "{{ $data_standby->vehicle_type }}") {

					option_vehicle.setAttribute('selected', true);

					return; 
				} 
			}
		}
		function show_img() {
			document.getElementById('div_img_officer').classList.add('d-none');
			document.getElementById('leble_show_img_officer').classList.remove('d-none');
		}
		function edit_data_officer() {

			let name_officer = document.querySelector('#name_officer');
			let level = document.querySelector('#officer_level');
			let vehicle_type = document.querySelector('#vehicle_type');

			// API UPLOAD IMG //
			let formData = new FormData();
			let imageFile = document.getElementById('img_officer').files[0];
				formData.append('image', imageFile);

			let data_officer = {
				"id" : '{{ $data_standby->user_id }}',
				"name_officer" : name_officer.value,
				"level_officer" : level.value,
				"vehicle_type" : vehicle_type.value,
			}

			formData.append('id', data_officer.id);
			formData.append('name_officer', data_officer.name_officer);
			formData.append('level_officer', data_officer.level_officer);
			formData.append('vehicle_type', data_officer.vehicle_type);

			// console.log(formData)
			fetch("{{ url('/') }}/api/edit_data_officer_Standby", {
				method: 'POST',
				body: formData
			}).then(function (response){
				return response.json();
			}).then(function(data){
				document.querySelector('#p_name_officer').innerHTML = data.name_officer;
				if(data.photo_officer){
					document.querySelector('#img_profile').src = '{{ url("/storage") }}' + '/' + data.photo_officer;
				}

			}).catch(function(error){
				// console.error(error);
			});
		}
	</script>
	<script>
		function check_user_open() {
			const queryString = window.location.search;
			const urlOfficers = new URLSearchParams(queryString);

			if (urlOfficers.has('officer')) {
				const officer = urlOfficers.get('officer');
				if (officer === 'edit') {
					document.querySelector('#btn_menu_2').classList.add('btn-danger');
					document.querySelector('#menu_2').classList.remove('d-none');
				} 
			}else{
					document.querySelector('#btn_menu_1').classList.add('btn-danger');
					document.querySelector('#menu_1').classList.remove('d-none');
			}
		}
	</script>
@endsection
