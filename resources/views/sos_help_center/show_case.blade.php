@extends('layouts.viicheck')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
	div , span ,body,h1,h2,h3,h4,h5 ,h6{
		font-family: 'Kanit', sans-serif !important;
	}
	#topbar{
		display: none !important;
	} #header{
		margin-top: -10% !important;
	}
	/* #map_show_case {
      	height: calc(40vh);
      	background-color: grey;
      	border-radius: 0 0 20px 20px;
      	border: 1px solid darkgray;
      	width: 100%;
    } */
	label {
		width: 100%;
		font-size: 1rem;
	}
	.status-remark{
		border: 1px solid darkgray;
		border-radius: 20px 0 0 0;
	}.add-img{
		border: 1px solid darkgray;
		border-radius: 0 20px 0 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}.fill {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }

    .full_img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .parent {
        position: relative;
        /* define context for absolutly positioned children */
        /* size set by image in this case */
        background-size: cover;
        background-position: center center;
    }

    .parent img {
        display: block;
    }

    .parent:after {
        content: '';
        /* :after has to have a content... but you don't want one */

        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;

        background: rgba(0, 0, 0, 0);

        transition: 1s;
    }

    .parent:hover:after {
        background: rgba(0, 0, 0, .5);
    }

    .parent:hover .child {
        opacity: 1;
    }

    .child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        z-index: 5;
        /* only works when position is defined */
        /* think of a stack of paper... this element is now 5 higher than the bottom */

        color: white;
        opacity: 0;
        transition: .5s;
    }.sry-open-location {
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


.situation-none{
	color:black;
	background-color: white;
}
.situation-red{
	color: white !important;
	background-color: #dc3545 !important;
}
.situation-yellow{
	color: black !important;
	background-color: #ffc107 !important;
}
.situation-normal{
	color: white !important;
	background-color: #007bff !important;
}.situation-black{
	color: white !important;
	background-color: #000000 !important;
}.situation-green{
	color: white !important;
	background-color: #28a745 !important;
}.card-input-element+.card {
height: calc(36px + 2*1rem);
color: #0d6efd;
-webkit-box-shadow: none;
box-shadow: none;
border: 2px solid transparent;
border-radius: 10px;
}

.card-input-element+.card:hover {
cursor: pointer;
}

.card-input-element:checked+.card {
border: 2px solid #0d6efd;
color: #fff !important;
background-color: #0d6efd !important;
-webkit-transition: border .3s;
-o-transition: border .3s;
transition: border .3s;
}

.card-input-element:checked+.card::after {
content: '\e5ca';
color: #AFB8EA;
font-family: 'Material Icons';
font-size: 24px;
-webkit-animation-name: fadeInCheckbox;
animation-name: fadeInCheckbox;
-webkit-animation-duration: .5s;
animation-duration: .5s;
-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

@-webkit-keyframes fadeInCheckbox {
	from {
		opacity: 0;
		-webkit-transform: rotateZ(-20deg);
	}
	to {
		opacity: 1;
		-webkit-transform: rotateZ(0deg);
	}
}

@keyframes fadeInCheckbox {
	from {
		opacity: 0;
		transform: rotateZ(-20deg);
	}
	to {
		opacity: 1;
		transform: rotateZ(0deg);
	}
}.card-input-red:checked+.card {
	border: 2px solid #db2d2e !important;
	background-color: #db2d2e !important;
	color: #fff !important;
	-webkit-transition: border .3s;
	-o-transition: border .3s;
	transition: border .3s;
}.show-data{
	animation: myAnim 1s ease 0s 1 normal forwards;
}
@keyframes myAnim {
	0% {
		opacity: 0;
	}

	100% {
		opacity: 1;
	}
}.btn-update-status{
	width:100%;
	border-width:2px;
	padding:10px;
	border-radius: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
}.text-of-status{
	font-size: clamp(17px, 5vw, 20px) !important;
	
}.div-text-status{
	width: 100% !important;
	white-space: nowrap !important;
	overflow: hidden !important;
	text-overflow: ellipsis !important;
}

.sry-open-location img{
	margin-top: 30%;
	width: 100%;
  object-fit: cover; 
  height: 100%;
}.sry-open-location p{
	font-size: clamp(12px, 5vw, 20px) !important;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
	body, html {
		height: 100% !important;
		width: 100% !important;
	}
	.header{
		display: none;
	}
	footer{
		display: none	;
	}
	header{
		display: none;
	}
	#map_show_case {
		width: 100%!important; 
		height: 100% !important;
	}
	.gmnoprint{
		display: none;
	}
	.gm-fullscreen-control{
		display: none;
	}
	.gm-svpc{
		display: none;
	}
	.menubar{
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
	.status-bar{
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
	}
	.data-menu{
		/* display: none; */
		position: absolute;
		border-radius: 25px;
		width: 99%;
		transform: translate(2.5%, -50%);
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 8px;
		left: 2%;
	}

	.data-menu.show-data-menu menu{
		opacity: 0;
		animation: show-data-menu 0.5s ease 0s 1 normal forwards;
	}
	.close-data-menu{
		opacity: 0;
		animation: close-data-menu 1s ease 0s 1 normal forwards;
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

	@keyframes close-data-menu {
		0% {
		opacity: 1;
		}

		100% {
			opacity: 0;
		}
	}.card-body{
		background-color: #fff;
	}
}

</style>

	<div id="map_show_case">
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
	<div class="status-bar">
		<div class="show-status" id="situation_of_status">
			<div class="ml-3" >
				<i class="fa-solid fa-truck-medical"></i>
				&nbsp;
				<small class="h6 text-bold p-0 m-0" id="show_status"></small> 
				<small class="p-0 m-0" id="show_remark_status"></small>
			</div>
			<button class="btn btn-danger"> <i class="fa-duotone fa-camera-retro" onclick="document.querySelector('#btn_modal_add_photo_sos').click();"></i></button>
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

	<div class="menubar show-menubar">
		<button class="btn w-25 btn_menu" id="btn_menu_1" onclick="show_data_menu(1);"><i class="fa-solid fa-messages-question"></i></button>
		<button class="btn w-25 btn_menu btn-danger" id="btn_menu_2" onclick="show_data_menu(2);"><i class="fa-regular fa-truck-medical"></i></button>
		<button class="btn w-25 btn_menu" id="btn_menu_3" onclick="show_data_menu(3);"><i class="fa-solid fa-file-pen"></i></button>
	</div>
	<div class="row data-menu show-data-menu d-none" id="menu_1" style="top:75%">
		<menu class="col-12 "  >
			<div id="show_level_by_control_center" class="card-body p-3 main-shadow" style="border-radius: 15px; ">
				<div class="d-flex align-items-center div-text-status">
					<div  class="">
						<p class="mb-0">ศูนย์สั่งการ</p>
						<h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_control_center">ไม่ได้ระบุ</h5>
					</div>
				</div>
			</div>
		</menu>
		<menu class="col-12">
			<div id="show_level_by_officers" class="card-body p-3 main-shadow" style="border-radius: 15px;">
				<div class="d-flex align-items-center div-text-status">
					<div>
						<p class="mb-0">เจ้าหน้าที่</p>
						<h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_officers">ไม่ได้ระบุ</h5>
					</div>
				</div>
			</div>
		</menu>
	</div>

	<div class="row data-menu show-data-menu show-data-menu" id="menu_2" >
		<!-- ----------------------------------------- ถึงที่เกิดเหตุ ------------------------------------------- -->
		<div id="div_gotohelp" class="d-none"  style="margin-top:-60%">
			<menu class="col-12 " >
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');">
						<i class="fa-sharp fa-solid fa-location-crosshairs"></i> ถึงที่เกิดเหตุ 
				</button>
			</menu>
		</div>
		
		<!-- -------------------------------------------  สถานะการณ์  ---------------------------------------------------- -->
		<div id="div_event_level" class="d-none row  data-menu show-data-menu"  style="top:-1200%">
			<menu class="col-6">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-black" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ดำ','{{ $data_sos->id }}');">
						ดำ
				</button>
			</menu>
			<menu class="col-6">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-normal" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ขาว(ทั่วไป)','{{ $data_sos->id }}');">
						ขาว(ทั่วไป)
				</button>
			</menu>
			<menu class="col-6 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-green" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เขียว(ไม่รุนแรง)','{{ $data_sos->id }}');">
						เขียว(ไม่รุนแรง)
				</button>
			</menu>
			<menu class="col-6 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เหลือง(เร่งด่วน)','{{ $data_sos->id }}');">
						เหลือง(เร่งด่วน)
				</button>
			</menu>
			<menu class="col-12 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-red" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('แดง(วิกฤติ)','{{ $data_sos->id }}');">
						แดง(วิกฤติ)
				</button>
			</menu>
		</div>

		<!-- ---------------------------------------การปฎิบัติการ-------------------------------------------------- -->
		<div class="d-none row data-menu show-data-menu" id="div_select_treatment" style="margin-top:-25%">
			
			<div class="col-12" style="margin-bottom: 5%;">
				<!-- -------------------------------------------   เคสมีการรักษา  ----------------------------------------------------- -->
				<div class="row d-none mt-3" id="treatment_yes">
					<div class="col-12 col-md-4 col-lg-4">
						<span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status" 
							onclick="update_status('ออกจากที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');">
								นำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status" 
						onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า');">
							ส่งต่อชุดปฏิบัติการ
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่นำส่ง');">
								ไม่นำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิตระหว่างนำส่ง');">
								เสียชีวิตระหว่างนำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ณ_จุดเกิดเหตุ');">
							เสียชีวิต ณ จุดเกิดเหตุ
						</span>
					</div>
				</div>

				<!-- -------------------------------------------   เคส ไม่มี การรักษา  ----------------------------------------------------- -->
				<div class="row d-none mt-3" id="treatment_no">
					<div class="col-6  col-md-4 col-lg-4">
						<span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ผู้ป่วยปฎิเสธการรักษา');">
							ผู้ป่วยปฎิเสธการรักษา
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4">
						<span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ก่อนชุดปฎิบัติการไปถึง');">
							เสียชีวิต ก่อนชุดปฎิบัติการไปถึง
						</span>
					</div>
					<div class="col-6 mt-3 col-md-4 col-lg-4">
						<span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ยกเลิก');" >
							ยกเลิก
						</span>
					</div>
					<div class="col-6 mt-3 col-md-4 col-lg-4">
						<span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่พบเหตุ');" >
								ไม่พบเหตุ
						</span>
					</div>
				
					
				</div>
			</div>

			<menu class="col-6  p-0">
				<label >
					<input type="radio"name="treatment" value="มีการรักษา"  class="card-input-red card-input-element d-none"  onchange="check_btn_select_treatment();">
					<div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger border-danger w-100" style="border-radius: 10px 0 0 10px;">
						<b>
							มีการรักษา
						</b>
					</div>
				</label>

			</menu>

			<menu class="col-6 p-0">
				<label >
					<input type="radio" name="treatment" value="ไม่มีการรักษา"  class="card-input-element d-none"  onchange="check_btn_select_treatment();">
					<div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center border-primary"style="border-radius: 0 10px 10px 0;">
						<b>
							ไม่มีการรักษา
						</b>
					</div>
				</label>
			</menu>
			
		</div>

		<!-- ---------------------------------------กลับถึงฐาน-------------------------------------------------- -->
		<div id="div_operating_base" class="d-none"  style="margin-top:-60%">
			<menu class="col-12 " >
				<button class="btn btn-success main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
				onclick="officer_to_the_operating_base('{{ $data_sos->id }}');">
					กลับถึงฐาน
				</button>
			</menu>
		</div>
		
		<div id="div_to_hospital" class="d-none"  style="margin-top:-60%">
			<menu class="col-12 " >
				<button class="btn btn-primary main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
				onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ถึงโรงพยาบาล');">
					ถึงโรงพยาบาล
				</button>
			</menu>
		</div>

	</div>

	<div class="row data-menu show-data-menu d-none" id="menu_3" style="margin-top:-35%">
		
		<menu class="col-12 " >
			<a href="{{ url('/sos_help_center' . '/' . $data_sos->id . '/edit') }}" class="btn btn-update-status btn-warning main-shadow main-radius" style="width:100%;" >
				แก้ไขข้อมูล ฟอร์มเหลือง
			</a>
		</menu>
		<menu class="col-12 " >
			<button class="btn btn-secondary main-shadow main-radius btn-update-status" style="width:100%;" >
				แก้ไขข้อมูล ฟอร์ม...
			</button>
		</menu>
	</div>
	<script>
		function show_data_menu(id){
			var element = document.getElementById('btn_menu_'+id);
			var test = element.classList.contains('btn-danger');

			
			for (let i = 1; i <= 3; i++) {
				document.querySelector('#menu_'+ [i]).classList.add('d-none');
				document.querySelector('#btn_menu_'+ [i]).classList.remove('btn-danger');
			}

			if (test === true) {
				// alert(1);A
				// document.querySelector('#btn_menu_'+ id).classList.remove('btn-danger');
				// document.querySelector('#menu_'+ id).classList.remove('show-data-menu');
				// document.querySelector('#menu_'+ id).classList.add('close-data-menu');
				document.querySelector('#menu_'+ id).classList.add('d-none');

			} else {
				// alert(2);A
				// document.querySelector('#menu_'+ id).classList.remove('close-data-menu');
				// document.querySelector('#menu_'+ id).classList.add('show-data-menu');
				document.querySelector('#btn_menu_'+ id).classList.toggle('btn-danger');
				document.querySelector('#menu_'+ id).classList.toggle('d-none');
				
			}
			// if(element.classList.contains('btn-danger') == true) {
			// 	alert(true);
			// 	document.querySelector('#btn_menu_'+ id).classList.remove('btn-danger');
			// 	document.querySelector('#menu_'+ id).classList.add('d-none');
			// }else{
			// 	alert(false);
			// 	document.querySelector('#btn_menu_'+ id).classList.toggle('btn-danger');
			// 	document.querySelector('#menu_'+ id).classList.toggle('d-none');
			// }

			
			

		}
	</script>




<div class="container d-none">
	<div class="row" style="padding: 8px 14px 0 14px !important;">
		<span id="situation_of_status" class="col-10 status-remark py-2">
			<h5 class="m-0 font-weight-bold">สถานะ</h5>
			<small class="h6 text-bold" id="show_status"></small> <small id="show_remark_status"></small>
		</span>
		<div class="col-12 d-none">
			<p class="mt-2">
				LAT : <span id="text_show_lat"></span> 
				<br>
				LONG : <span id="text_show_lng"></span>
			</p>
		</div>
		<span class="col-2 add-img btn btn-info">
			<i class="fa-solid fa-camera-viewfinder h4 m-0" onclick="document.querySelector('#btn_modal_add_photo_sos').click();"></i>
		</span>
	</div>
	<div class="col-12 p-0">
		<div class="main-shadow main-radius p-0" id="map_show_case">
			<!-- <img style=" object-fit: cover; border-radius:15px" width="100%" height="100%" src="{{ asset('/img/more/sorry-no-text.png') }}" class="card-img-top center" style="padding: 10px;"> -->
			<div class="sry-open-location">
				<img src="{{ asset('/img/more/sorry-no-text.png') }}" />
				<center>
					<p class="sry-open-location-text h4" style="top: 20%;">ขออภัยค่ะ</p>	
					<p class="sry-open-location-text h5" style="top: 35%;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</p>
					<span style="top: 50%;" class="sry-open-location-text btn btn-md btn-warning main-shadow main-radius" onclick="window.location.reload(true);">
						<i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
					</span>
				</center>
			</div>
			<div class="col-12" style="position:absolute;bottom: 10%;left: 7%;z-index: 99;">
				<div class="row">
					<!-- Google Map และ ดูเส้นทาง -->
					<div id="btn_google_map" class="col-12 d-">
						@php
							$gg_lat_mail = '@' . $data_sos->lat ;
							$gg_lat = $data_sos->lat ;
							$lng = $data_sos->lng ;
						@endphp
						<a href="https://www.google.co.th/maps/dir//{{$gg_lat}},{{$lng}}/{{$gg_lat_mail}},{{$lng}},16z" class="btn btn-sm btn-danger text-white main-shadow main-radius mt-2" style="width:50%;"  target="bank">
							Google Map <i class="fa-solid fa-location-arrow"></i>
						</a>
						<button class="btn btn-sm btn-primary text-white main-shadow main-radius mt-2" onclick="get_dir();">
							<i id="icon_btn_get_dir_close" class="fa-sharp fa-solid fa-eye-slash"></i>
							<i id="icon_btn_get_dir_open" class="fa-solid fa-eye d-none"></i>
							<!--เปิด fa-solid fa-eye -->
							<!--ปิด fa-sharp fa-solid fa-eye-slash -->
						</button>
						<input class="d-none" type="checkbox" name="input_check_open_get_dir" id="input_check_open_get_dir" on>
					</div>
				</div>
			</div>
			<!-- <div style="position: relative; z-index: 5">
				<div class="translate">
					<center>
						<h4 style="top:-50%;left: 130px;position: absolute;font-family: 'Sarabun', sans-serif;">ขออภัยค่ะ</h4>
						<h5 style="top:-270px;left: 35px;width: 80%;position: absolute;font-family: 'Sarabun', sans-serif;">
							ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ
						</h5>
						<br>
						<span style="top:-200px;left: 130px;position: absolute;" class="btn btn-sm btn-warning main-shadow main-radius" onclick="window.location.reload(true);">
							<i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
						</span>
					</center>
					
				</div>
			</div> -->
		</div>
	</div>
		<!-- <div class="row mx-1 mt-3">
			<div class="col-6 m-0 p-0">
				<div id="show_level_by_control_center" class="card-body  main-shadow py-2 px-3" style="border-radius: 15px 0 0 15px">
					<div class="d-flex align-items-center">
						<div  class="div-text-status">
							<p class="mb-0" style="font-size: 12px;">ศูนย์สั่งการ</p>
							<h5 class="mb-0 font-weight-bold text-of-status " id="text_level_by_control_center">ไม่ได้ระบุ</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 m-0 p-0">
				<div id="show_level_by_officers" class="card-body  main-shadow py-2 px-3" style="border-radius:0 15px 15px 0;">
					<div class="d-flex align-items-center">
						<div class="div-text-status">
							<p class="mb-0" style="font-size: 12px;">เจ้าหน้าที่</p>
							<h5 class="mb-0 font-weight-bold text-of-status " id="text_level_by_officers">ไม่ได้ระบุ</h5>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	<div class="bg-drak-gray">
		<!-- <div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="fa-solid fa-messages-question h5 m-0 text-primary"></i>
			</div>
			<h5 class="mb-0 text-primary"> &nbsp;&nbsp;<b>สถานะการณ์</b> </h5>
		</div>
		<hr> -->
		<div class="row mt-3">
			<div class="col-6 " style="padding: 0 0 0 15px;" >
				<div id="show_level_by_control_center" class="card-body p-3 main-shadow" style="border-radius: 15px 0 0 15px; ">
					<div class="d-flex align-items-center div-text-status">
						<div  class="">
							<p class="mb-0">ศูนย์สั่งการ</p>
							<h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_control_center">ไม่ได้ระบุ</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 "style="padding: 0 15px 0 0;">
				<div id="show_level_by_officers" class="card-body p-3 main-shadow" style="border-radius: 0 15px 15px 0;">
					<div class="d-flex align-items-center div-text-status">
						<div>
							<p class="mb-0">เจ้าหน้าที่</p>
							<h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_officers">ไม่ได้ระบุ</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ปุ่ม ถึงที่เกิดเหตุ -->
	<div class="col-12 text-center d-none p-0" id="div_gotohelp">
		<div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="text-danger fa-regular fa-truck-medical h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>การเดินทาง</b> </h5>
		</div>
		<hr>
		<div class="col-12 mt-3">
			<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');">
					<i class="fa-sharp fa-solid fa-location-crosshairs"></i> ถึงที่เกิดเหตุ 
			</button>
		</div>
	</div>
	
	<div id="div_event_level" class="d-none">
		<div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="text-danger fa-duotone fa-person-burst h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>ความรุนแรง ณ จุดเกิดเหตุ</b> </h5>
		</div>
		<hr>
		<div class="row">
			<div class="col-6">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-black" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ดำ','{{ $data_sos->id }}');">
						ดำ
				</button>
			</div>
			<div class="col-6">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-normal" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ขาว(ทั่วไป)','{{ $data_sos->id }}');">
						ขาว(ทั่วไป)
				</button>
			</div>
			<div class="col-6 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-green" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เขียว(ไม่รุนแรง)','{{ $data_sos->id }}');">
						เขียว(ไม่รุนแรง)
				</button>
			</div>
			<div class="col-6 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เหลือง(เร่งด่วน)','{{ $data_sos->id }}');">
						เหลือง(เร่งด่วน)
				</button>
			</div>
			<div class="col-12 mt-3">
				<button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-red" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('แดง(วิกฤติ)','{{ $data_sos->id }}');">
						แดง(วิกฤติ)
				</button>
			</div>
		</div>
	</div>
	
	<div class="col-12 text-center d-none" id="div_select_treatment" >
		<div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="text-danger fa-solid fa-hospital h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>การปฏิบัติการ</b> </h5>
		</div>
		<hr>
		<div class="row">
			<div class="col-6 p-0">
				<label >
					<input type="radio"name="treatment" value="มีการรักษา"  class="card-input-red card-input-element d-none"  onchange="check_btn_select_treatment();">
					<div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger border-danger w-100" style="border-radius: 10px 0 0 10px;">
						<b>
							มีการรักษา
						</b>
					</div>
				</label>

			</div>

			<div class="col-6 p-0">
				<label >
					<input type="radio" name="treatment" value="ไม่มีการรักษา"  class="card-input-element d-none"  onchange="check_btn_select_treatment();">
					<div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center border-primary"style="border-radius: 0 10px 10px 0;">
						<b>
							ไม่มีการรักษา
						</b>
					</div>
				</label>
			</div>
			<script>
				function check_btn_select_treatment(){

					var check_treatment = document.getElementsByName('treatment');
					// เช็คช่อง input ว่าเลือกมีการรักษาหรือไม่
					for (var i = 0, length = check_treatment.length; i < length; i++) {
						if (check_treatment[i].checked) {
							if(check_treatment[i].value == "มีการรักษา"){
								document.querySelector('#treatment_no').classList.add('d-none');
								document.querySelector('#treatment_yes').classList.remove('d-none');
								document.querySelector('#treatment_yes').classList.add('show-data');
							}else{
								document.querySelector('#treatment_yes').classList.add('d-none');
								document.querySelector('#treatment_no').classList.remove('d-none');
								document.querySelector('#treatment_no').classList.add('show-data');
							}
							break;
						} 
					}
				}

			</script>
			<div class="col-12" style="margin-bottom: 20%;">
				<!-- -------------------------------------------   เคสมีการรักษา  ----------------------------------------------------- -->
				<div class="row d-none mt-3" id="treatment_yes">
					<div class="col-12 col-md-4 col-lg-4">
						<span class="btn btn-outline-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status" 
							onclick="update_status('ออกจากที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');">
								นำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-outline-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status" 
						onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า');">
							ส่งต่อชุดปฏิบัติการ
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-outline-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่นำส่ง');">
								ไม่นำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-outline-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิตระหว่างนำส่ง');">
								เสียชีวิตระหว่างนำส่ง
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4 mt-3">
						<span class="btn btn-outline-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ณ_จุดเกิดเหตุ');">
							เสียชีวิต ณ จุดเกิดเหตุ
						</span>
					</div>
				</div>

				<!-- -------------------------------------------   เคส ไม่มี การรักษา  ----------------------------------------------------- -->
				<div class="row d-none mt-3" id="treatment_no">
					<div class="col-6  col-md-4 col-lg-4">
						<span class="btn btn-outline-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ผู้ป่วยปฎิเสธการรักษา');">
							ผู้ป่วยปฎิเสธการรักษา
						</span>
					</div>
					<div class="col-6 col-md-4 col-lg-4">
						<span class="btn btn-outline-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ก่อนชุดปฎิบัติการไปถึง');">
							เสียชีวิต ก่อนชุดปฎิบัติการไปถึง
						</span>
					</div>
					<div class="col-6 mt-3 col-md-4 col-lg-4">
						<span class="btn btn-outline-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ยกเลิก');" >
							ยกเลิก
						</span>
					</div>
					<div class="col-6 mt-3 col-md-4 col-lg-4">
						<span class="btn btn-outline-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
							onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่พบเหตุ');" >
								ไม่พบเหตุ
						</span>
					</div>
				
					
				</div>
			</div>
		</div>

		
	</div>

	<!-- ปุ่มเลือก กลับถึงฐาน -->
	<div class="col-12 text-center d-none" id="div_operating_base" >
		<div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="text-danger fa-duotone fa-tower-observation h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>กลับฐาน</b> </h5>
		</div>
		<hr>
		<div class="row">
			<div class="col-12 mt-2">
				<button class="btn btn-success main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
				onclick="officer_to_the_operating_base('{{ $data_sos->id }}');">
					กลับถึงฐาน
				</button>
			</div>
		</div>
	</div>

	<!-- ปุ่มเลือก ถึง รพ. -->
	<div class="col-12 text-center d-none" id="div_to_hospital" >
		<div class="card-title d-flex align-items-center mt-3">
			<div>
				<i class="text-danger fa-solid fa-light-emergency-on h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>นำส่ง</b> </h5>
		</div>
		<hr>
		<div class="row">
			<div class="col-12 mt-2">
				<button class="btn btn-primary main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
				onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ถึงโรงพยาบาล');">
					ถึงโรงพยาบาล
				</button>
			</div>
		</div>
	</div>

	<!-- ปุ่มแก้ไขฟอร์ม -->
	<div class="col-12 text-center">
		<div class="card-title d-flex align-items-center mt-5">
			<div>
				<i class="text-danger fa-solid fa-file h5 mb-0"></i>
			</div>
			<h5 class="mb-0 text-danger"> &nbsp;&nbsp;<b>ฟอร์ม</b> </h5>
		</div>
		<hr>
			<div class="row">
				<div class="col-12 mt-2">
					<a href="{{ url('/sos_help_center' . '/' . $data_sos->id . '/edit') }}" class="btn btn-update-status btn-warning main-shadow main-radius" style="width:100%;" >
						แก้ไขข้อมูล ฟอร์มเหลือง
					</a>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-secondary main-shadow main-radius btn-update-status" style="width:100%;" >
						แก้ไขข้อมูล ฟอร์ม...
					</button>
				</div>
			</div>
		</div>

	<a id="tag_a_switch_standby" href="{{ url('/officers/switch_standby') }}" class="d-none"></a>
</div>


<!-- Button trigger modal -->
<button id="btn_modal_add_photo_sos" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_add_photo_sos">
  Launch static backdrop modal
</button>
<!-- Modal -->
<div class="modal fade" id="modal_add_photo_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  	<div class="modal-dialog modal-dialog-centered ">
    	<div class="modal-content">
      		<div class="modal-header d-flex align-items-center">
				<h3 class="m-0"> <b>เพิ่มภาพถ่าย</b> </h3>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true"><i class="fa-solid fa-xmark-large"></i></span>
        		</button>
      		</div>
      		<form method="POST" action="{{ url('/sos_help_center/' . $data_sos->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
           		{{ method_field('PATCH') }}
        		{{ csrf_field() }}
      			<div class="modal-body text-center">
					<div class="col-12">
						<label class="col-12" style="padding:0px;" for="photo_sos_by_officers" >
							<div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
								<div class="form-group p-3"id="add_select_img">
									<input class="form-control d-none" name="photo_sos_by_officers" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_by_officers" value="{{ isset($data_sos->photo_sos_by_officers) ? $data_sos->photo_sos_by_officers : ''}}" accept="image/*" onchange="document.getElementById('show_photo_sos_by_officers').src = window.URL.createObjectURL(this.files[0]);check_add_img() ">
									<div  class="text-center">
										<center>
											<img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
										</center>
										<br>
										<h3 class="text-center m-0">
											<b>กรุณาเลือกรูป "คลิก"</b> 
										</h3>
									</div>
									
								</div>
								<img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_by_officers" />
								<div class="child">
									<span>เลือกรูป</span>
								</div>
							</div>
						</label>
					</div>

	            	<!-- เพิ่มภาพถ่าย และข้อคิดเห็นของเจ้าหน้าที่ -->

	            	<!-- <label class="form-label">เพิ่มภาพถ่าย</label>
					<input class="form-control" name="photo_sos_by_officers" type="file" id="photo_sos_by_officers" value="{{ isset($data_sos->photo_sos_by_officers) ? $data_sos->photo_sos_by_officers : ''}}" multiple>
    				{!! $errors->first('photo_sos_by_officers', '<p class="help-block">:message</p>') !!}

    				@if(!empty($data_sos->photo_sos_by_officers))
    					<img src="{{ url('storage')}}/{{ $data_sos->photo_sos_by_officers }}" style="width:80%;">
    				@endif -->
		            	
	            	<div class="form-group d-none">
				        <input id="btn_submit_form_photo" class="btn btn-primary" type="submit">
				    </div>
      			</div>
      		</form>
	      	<div class="modal-footer">
	        	<button id="btn_help_area" style="width:40%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" onclick="document.querySelector('#btn_submit_form_photo').click();">
	           		ยืนยัน
	        	</button>
	      	</div>
    	</div>
  	</div>
</div>

<!-- ----------------------------------------------------------------------------------------- -->

<!-- <div class="container notranslate d-none" style="margin-top:140px;">
	<div class="row">
		หัวข้อ และ ปุ่มเพิ่มภาพถ่าย
    	<div class="col-12 text-center">
    		<div class="row" style="margin-left:4%;margin-right: 2%;">
    			<div class="col-9">
    				<h4>
    					<b><span id="show_status" class="text-warning float-start"></span></b>
    				</h4>
    				<br>
    				<span id="show_remark_status" class="text-secondary float-start"></span>
    			</div>
    			<div class="col-3">
        			<button class="btn btn-info main-shadow main-radius" onclick="document.querySelector('#btn_modal_add_photo_sos').click();">
						<i class="fa-solid fa-camera-viewfinder"></i>
					</button>
        		</div>
        		lat lng
        		
        		<div class="col-12 d-none">
        			<p class="mt-2">
        				LAT : <span id="text_show_lat"></span> 
        				<br>
        				LONG : <span id="text_show_lng"></span>
        			</p>
        		</div>
    		</div>
        </div>
        MAP
        <div class="col-12">
        	<div class="row">
        		ระยะทางและเวลา (เสียเงิน)
        		<div id="div_distance_and_duration" class="col-12 d-none">
        			<p class="mt-2">
        				ระยะทาง : <span id="text_distance"></span> / เวลา : <span id="text_duration"></span>
        			</p>
        		</div>
        		show map
        		<div class="col-12">
        			<center>
			        	<div class="main-shadow main-radius p-0" id="map_show_case">
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
        		<div class="col-12" style="position:absolute;bottom: 10%;left: 7%;z-index: 99;">
        			<div class="row">
        				Google Map และ ดูเส้นทาง
				        <div id="btn_google_map" class="col-12 d-">
							@php
								$gg_lat_mail = '@' . $data_sos->lat ;
								$gg_lat = $data_sos->lat ;
								$lng = $data_sos->lng ;
							@endphp
							<a href="https://www.google.co.th/maps/dir//{{$gg_lat}},{{$lng}}/{{$gg_lat_mail}},{{$lng}},16z" class="btn btn-sm btn-danger text-white main-shadow main-radius mt-2" style="width:50%;"  target="bank">
								Google Map <i class="fa-solid fa-location-arrow"></i>
							</a>
							<button class="btn btn-sm btn-primary text-white main-shadow main-radius mt-2" onclick="get_dir();">
								<i id="icon_btn_get_dir_close" class="fa-sharp fa-solid fa-eye-slash"></i>
								<i id="icon_btn_get_dir_open" class="fa-solid fa-eye d-none"></i>
								เปิด fa-solid fa-eye
								ปิด fa-sharp fa-solid fa-eye-slash
							</button>
							<input class="d-none" type="checkbox" name="input_check_open_get_dir" id="input_check_open_get_dir">
				        </div>
        			</div>
        		</div>
        	</div>
        </div>
        
        ระดับสถานะการณ์
        <div class="col-12 text-center">
        	<div class="row">
        		<div class="col-12">
        			<h5>ระดับสถานะการณ์ </h5>
        		</div>
        		<div class="col-6">
        			<p id="show_level_by_control_center" class="">
						ศูนย์สั่งการ
						<br>
						<b><span style="width:80%;" class="btn btn-sm main-shadow main-radius" id="text_level_by_control_center">ไม่ได้ระบุ</span></b>
					</p>
        		</div>
        		<div class="col-6">
        			<p id="show_level_by_officers" class="">
						เจ้าหน้าที่
						<br>
						<b><span style="width:80%;" class="btn btn-sm main-shadow main-radius" id="text_level_by_officers">ไม่ได้ระบุ</span></b>
					</p>
        		</div>
        	</div>
        	<center>
				<hr style="border: 1px solid red;width: 80%;color: red;">
        	</center>
        </div>

        ปุ่ม ถึงที่เกิดเหตุ
		<div class="col-12 text-center d-none" id="div_gotohelp">
			<button class="btn btn-warning main-shadow main-radius" style="width:90%;" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');">
				ถึงที่เกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
			</button>
		</div>

		ปุ่มเลือกระดับเหตุการณ์
		<div class="col-12 text-center d-none" id="div_event_level" >
			<div class="row">
				<div class="col-6 mt-2">
					<button class="btn btn-dark main-shadow main-radius" style="width:90%;" 
					onclick="update_event_level_rc('ดำ','{{ $data_sos->id }}');">
						ดำ
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-light main-shadow main-radius" style="width:90%;" 
					onclick="update_event_level_rc('ขาว(ทั่วไป)','{{ $data_sos->id }}');">
						ขาว(ทั่วไป)
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-success main-shadow main-radius" style="width:90%;" 
					onclick="update_event_level_rc('เขียว(ไม่รุนแรง)','{{ $data_sos->id }}');">
						เขียว(ไม่รุนแรง)
					</button>
				</div>
				<div class="col-6 mt-2">
					<button class="btn btn-warning main-shadow main-radius" style="width:90%;" 
					onclick="update_event_level_rc('เหลือง(เร่งด่วน)','{{ $data_sos->id }}');">
						เหลือง(เร่งด่วน)
					</button>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-danger main-shadow main-radius" style="width:95%;" 
					onclick="update_event_level_rc('แดง(วิกฤติ)','{{ $data_sos->id }}');">
						แดง(วิกฤติ)
					</button>
				</div>
			</div>
		</div>

		ปุ่มเลือกการรักษา
		<div class="col-12 text-center d-none" id="div_select_treatment" >
			Modal
			<div class="modal fade" id="modal_select_treatment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="header_modal_treatment" aria-hidden="true" style="z-index:99999;width: 90%;">
			  	<div class="modal-dialog modal-dialog-centered">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h3 class="modal-title text-dark" id="header_modal_treatment"></h3>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		มีการรักษา
				      	<div id="modal_body_treatment" class="modal-body d-none">
				        	<div class="row">
				        		<div class="col-12 mt-2">
				        			<span class="btn btn-outline-success main-shadow main-radius" style="width:100%;"
				        			onclick="update_status('ออกจากที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');" data-dismiss="modal" aria-label="Close">
										นำส่ง
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-success main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า');" data-dismiss="modal" aria-label="Close">
										ส่งต่อชุดปฏิบัติการ
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-success main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่นำส่ง');" data-dismiss="modal" aria-label="Close">
										ไม่นำส่ง
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-success main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิตระหว่างนำส่ง');" data-dismiss="modal" aria-label="Close">
										เสียชีวิตระหว่างนำส่ง
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-success main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ณ_จุดเกิดเหตุ');" data-dismiss="modal" aria-label="Close">
										เสียชีวิต ณ จุดเกิดเหตุ
									</span>
				        		</div>
				        	</div>
				      	</div>
				      	ไม่ มีการรักษา
				      	<div id="modal_body_no_treatment" class="modal-body d-none">
				        	<div class="row">
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-warning main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ผู้ป่วยปฎิเสธการรักษา');" data-dismiss="modal" aria-label="Close">
										ผู้ป่วยปฎิเสธการรักษา
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-warning main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ก่อนชุดปฎิบัติการไปถึง');" data-dismiss="modal" aria-label="Close">
										เสียชีวิต ก่อนชุดปฎิบัติการไปถึง
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-warning main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ยกเลิก');" data-dismiss="modal" aria-label="Close">
										ยกเลิก
									</span>
				        		</div>
				        		<div class="col-6 mt-2">
				        			<span class="btn btn-outline-warning main-shadow main-radius" style="width:95%;"
				        			onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่พบเหตุ');" data-dismiss="modal" aria-label="Close">
										ไม่พบเหตุ
									</span>
				        		</div>
				        		
				        	</div>
				      	</div>
			    	</div>
			  	</div>
			</div>
			END Modal
			<div class="row">
				<div class="col-6">
					<span class="btn btn-info main-shadow main-radius" style="width:95%;" data-toggle="modal" data-target="#modal_select_treatment" onclick="aad('มีการรักษา');">
						มีการรักษาก
					</span>
				</div>
				<div class="col-6">
					<span class="btn btn-danger main-shadow main-radius" style="width:95%;" data-toggle="modal" data-target="#modal_select_treatment" onclick="aad('ไม่มีการรักษา');">
						ไม่มีการรักษา
					</span>
				</div>
				<script>
					function click_btn_select_treatment(type){
						if (type === 'มีการรักษา') {
							document.querySelector('#header_modal_treatment').innerHTML = 'มีการรักษา' ;
							document.querySelector('#modal_body_treatment').classList.remove('d-none') ;
							document.querySelector('#modal_body_no_treatment').classList.add('d-none') ;

						}else if(type === 'ไม่มีการรักษา'){
							document.querySelector('#header_modal_treatment').innerHTML = 'ไม่มีการรักษา' ;
							document.querySelector('#modal_body_no_treatment').classList.remove('d-none') ;
							document.querySelector('#modal_body_treatment').classList.add('d-none') ;
						}
					}
				</script>
			</div>
		</div>

		ปุ่มเลือก กลับถึงฐาน
		<div class="col-12 text-center d-none" id="div_operating_base" >
			<div class="row">
				<div class="col-12 mt-2">
					<button class="btn btn-success main-shadow main-radius" style="width:95%;"
					onclick="officer_to_the_operating_base('{{ $data_sos->id }}');">
						กลับถึงฐาน
					</button>
				</div>
			</div>
		</div>

		ปุ่มเลือก ถึง รพ.
		<div class="col-12 text-center d-none" id="div_to_hospital" >
			<div class="row">
				<div class="col-12 mt-2">
					<button class="btn btn-success main-shadow main-radius" style="width:95%;"
					onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ถึงโรงพยาบาล');">
						ถึงโรงพยาบาล
					</button>
				</div>
			</div>
		</div>



		ปุ่มแก้ไขฟอร์ม
		<div class="col-12 text-center">
			<br>
			<div class="row">
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
			</div>
		</div>

		<a id="tag_a_switch_standby" href="{{ url('/officers/switch_standby') }}" class="d-none"></a>

    </div>
</div> -->
<style>
	.menu-profile-header{
		display: flex;
		justify-content: space-between;
		align-items: center;
		
	}
	.data-menu-profile{
		width: 100% !important;
		white-space: nowrap !important;
		overflow: hidden !important;
		text-overflow: ellipsis !important;
		display: flex;
		justify-content: baseline;
	}
</style>
@php
	$greetings = "";

    $time = date("H");
    $timezone = date("e");

    if ($time < "12") {
        $greetings = "สวัสดีตอนเช้า";
    } else

    if ($time >= "12" && $time < "17") {
        $greetings = "สวัสดีตอนบ่าย";
    } else

    if ($time >= "17" && $time < "19") {
        $greetings = "สวัสดีตอนเย็น";
    } else

    if ($time >= "19") {
        $greetings = "ราตรีสวัสดิ์";
    }
@endphp

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content w-100" style="border-radius: 25px; margin-top: -7%;">
		<div class="modal-body w-100 mt-1">
			<div class="text-center col-12 mt-2 mb-2">
				<img width="80" src="{{ url('/img/logo/VII-check-LOGO-W-v3.png') }}">
			</div>
			
			<div class="menu-profile-header">
				<div class="data-menu-profile" >
					@if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
						<img class="mobile-nav-toggle main-shadow" style="margin-right: 15px;border-radius: 25px;" width="35" src="{{ Auth::user()->avatar }}">
					@endif
					@if(!empty(Auth::user()->photo))
						<img style="border-radius: 10px !important;" width="45" src="{{ url('storage')}}/{{ Auth::user()->photo }}">
					@endif

					<div class="ml-3">
						<small>{{$greetings}}</small><br>
						<h4 class="m-0 p-0 notranslate">{{Auth::user()->name}}</h4>
					</div>
					
				</div>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
				</button> -->
			</div>
			<div class="row mt-3">
				<div class="col-12 mb-2">
					<h6 class="m-0 p-0" style="color: darkgray;">
						ข้อมูล
					</h6>
				</div>
				<a class="col-12 ml-3" href="{{ url('/profile') }}">
					<div class="row">
						<div class="col-2 pr-0">
							<img width="30" src="{{ url('/img/stickerline/PNG/12.png') }}">
						</div>
						<div class="col-10 pl-0 d-flex align-items-center">
							<h6 class="m-0">
							โปรไฟล์
							</h6>
						</div>
					</div>
				</a>

				<div class="col-12 mb-2 mt-3">
					<h6 class="m-0 p-0" style="color: darkgray;">
						ระบบ
					</h6>
				</div>
				<a class="col-12 ml-3" href="{{ url('/register_car/create') }}">
					<div class="row">
						<div class="col-2 pr-0">
							<img width="30" src="{{ url('/img/stickerline/PNG/44.png') }}">
						</div>
						<div class="col-10 pl-0 d-flex align-items-center">
							<h6 class="m-0">
							ลงทะเบียนรถ
							</h6>
						</div>
					</div>
				</a>
				<a class="col-12 ml-3 mt-1" href="{{ url('/guest/create') }}">
					<div class="row">
						<div class="col-2 pr-0">
							<img width="30" src="{{ url('/img/stickerline/PNG/24.png') }}">
						</div>
						<div class="col-10 pl-0 d-flex align-items-center">
							<h6 class="m-0">
							แจ้งเลื่อนรถ
							</h6>
						</div>
					</div>
				</a>



				<div class="col-12 mb-2 mt-3">
					<h6 class="m-0 p-0" style="color: darkgray;">
						บัญชี
					</h6>
				</div>
				<a class="col-12 ml-3 mt-1" href="{{ route('password.request') }}">
					<div class="row">
						<div class="col-2 pr-0">
							<img width="30" src="{{ url('/img/stickerline/PNG/20.png') }}">
						</div>
						<div class="col-10 pl-0 d-flex align-items-center">
							<h6 class="m-0">
							เปลี่ยนรหัสผ่าน
							</h6>
						</div>
					</div>
				</a>
				<a class="col-12 ml-3 mt-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					<div class="row">
						<div class="col-2 pr-0">
							<img width="30" src="{{ url('/img/stickerline/PNG/5.png') }}">
						</div>
						<div class="col-10 pl-0 d-flex align-items-center">
							<h6 class="m-0">
								{{ __('Logout') }}
							</h6>
						</div>
					</div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</a>

			</div>
		</div>
    </div>
  </div>
</div>
<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>

	// แสดงข้อมูลเริ่มต้น -----------------------------------------------------------------------------
	var event_level_by_control_center = '{{ $data_sos->form_yellow->idc }}';
    var event_level_by_officers = '{{ $data_sos->form_yellow->rc }}';

	// แสดงเคสและปุ่มดำเนินการต่างๆ
	var status_sos = '{{ $data_sos->status }}';
    	document.querySelector('#show_status').innerHTML = status_sos ;
    var show_remark_status_sos = '{{ $data_sos->remark_status }}';
    	if (show_remark_status_sos) {
			show_remark_status_sos = show_remark_status_sos.replaceAll("_" , " ");
    		document.querySelector('#show_remark_status').innerHTML =  '(' + show_remark_status_sos +')';
    	}
    	// div_gotohelp
    	// div_event_level
    	// div_select_treatment
        switch(status_sos){
			case 'ออกจากฐาน':
				document.querySelector('#situation_of_status').classList.add('situation-yellow');
				document.querySelector('#div_gotohelp').classList.remove('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
              	document.querySelector('#div_operating_base').classList.add('d-none');
              	document.querySelector('#div_to_hospital').classList.add('d-none');
			break;
			case 'ถึงที่เกิดเหตุ':
				document.querySelector('#situation_of_status').classList.add('situation-yellow');
				if (!event_level_by_officers) {
					document.querySelector('#situation_of_status').classList.add('situation-yellow');
					document.querySelector('#div_event_level').classList.remove('d-none');
					document.querySelector('#div_select_treatment').classList.add('d-none');
					document.querySelector('#div_gotohelp').classList.add('d-none');
              		document.querySelector('#div_operating_base').classList.add('d-none');
              		document.querySelector('#div_to_hospital').classList.add('d-none');
				}else{
					document.querySelector('#div_select_treatment').classList.remove('d-none');
					document.querySelector('#div_event_level').classList.add('d-none');
					document.querySelector('#div_gotohelp').classList.add('d-none');
              		document.querySelector('#div_operating_base').classList.add('d-none');
              		document.querySelector('#div_to_hospital').classList.add('d-none');
				}
			break;
			case 'ออกจากที่เกิดเหตุ':
				document.querySelector('#situation_of_status').classList.add('situation-yellow');
              	document.querySelector('#div_to_hospital').classList.remove('d-none');
              	document.querySelector('#div_operating_base').classList.add('d-none');
             	document.querySelector('#div_gotohelp').classList.add('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
			break;
			case 'เสร็จสิ้น':
				document.querySelector('#situation_of_status').classList.add('situation-green');
              	document.querySelector('#div_operating_base').classList.remove('d-none');
             	document.querySelector('#div_gotohelp').classList.add('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
              	document.querySelector('#div_to_hospital').classList.add('d-none');
            break;

		}

    // แสดงระดับเหตุการณ์
	if (event_level_by_control_center) {
		// document.querySelector('#show_level_by_control_center').classList.remove('d-none') ;
		let class_color_center ;
		let class_color_officers ;
		switch(event_level_by_control_center){
			case 'แดง(วิกฤติ)':
				class_color_center = "situation-red";
			break;
			case 'เหลือง(เร่งด่วน)':
				class_color_center = 'situation-yellow';
			break;
			case 'เขียว(ไม่รุนแรง)':
				class_color_center = 'situation-green';
			break;
			case 'ขาว(ทั่วไป)':
				class_color_center = 'situation-normal';
			break;
			case 'ดำ(รับบริการสาธารณสุขอื่น)':
				class_color_center = 'situation-black';
			break;
		}
		document.querySelector('#show_level_by_control_center').classList.add(class_color_center) ;
    	document.querySelector('#text_level_by_control_center').innerHTML = event_level_by_control_center ;
	}
	if (event_level_by_officers) {
		// document.querySelector('#show_level_by_officers').classList.remove('d-none') ;
		switch(event_level_by_officers){
			case 'แดง(วิกฤติ)':
				class_color_officers = 'situation-red';
			break;
			case 'เหลือง(เร่งด่วน)':
				class_color_officers = 'situation-yellow';
			break;
			case 'เขียว(ไม่รุนแรง)':
				class_color_officers = 'situation-green';
			break;
			case 'ขาว(ทั่วไป)':
				class_color_officers = 'situation-normal';
			break;
			case 'ดำ':
				class_color_officers = 'situation-black';
			break;
		}
		document.querySelector('#show_level_by_officers').classList.add(class_color_officers) ;
    	document.querySelector('#text_level_by_officers').innerHTML = event_level_by_officers ;
	}

	// ------------------------------------------------------------------------------------------

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

		document.querySelector('#text_show_lat').innerHTML = lat ;
		document.querySelector('#text_show_lng').innerHTML = lng ;
		

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
                if (result['remark_status']) {
                	result['remark_status'] = result['remark_status'].replaceAll("_" , " ");
            		document.querySelector('#show_remark_status').innerHTML = '(' + result['remark_status'] +')';
				}
        });

        getLocation_LOOP();

	}

	function getLocation_LOOP() {
	  	reface_getLocation = setInterval(function() {

			// console.log("getLocation_LOOP");

		  	if (navigator.geolocation) {
		    	navigator.geolocation.getCurrentPosition(loop_location_officer);
		  	} else {
		    	// x.innerHTML = "Geolocation is not supported by this browser.";
		  	}

	  	}, 5000);
	}

	function loop_location_officer(position){
		// console.log("loop_location_officer");

		// LOOP ------------------------------------------------------------------
        lat = position.coords.latitude ;
		lng = position.coords.longitude ;
		// console.log(lat);
		// console.log(lng);
		
		document.querySelector('#text_show_lat').innerHTML = lat ;
		document.querySelector('#text_show_lng').innerHTML = lng ;
            
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
            	if (result_2['remark_status']) {
                	result_2['remark_status'] = result_2['remark_status'].replaceAll("_" , " ");
            		document.querySelector('#show_remark_status').innerHTML = '(' + result_2['remark_status'] + ')';
				}

            	let input_check = document.querySelector('#input_check_open_get_dir');
				if (input_check.checked) {
					get_Directions_API(officer_marker, sos_marker);
				}else{
					if (directionsDisplay) {
				        directionsDisplay.setMap(null);
					}
					document.querySelector('#div_distance_and_duration').classList.add('d-none');
				}

        });

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

    // UPDATE STATUS SOS
	    // div_gotohelp
	    // div_event_level
	    // div_select_treatment
	    // div_to_hospital
	    // div_operating_base
	    
	function update_status(status , sos_id , reason){

        status_sos = status ;
        document.querySelector('#show_status').innerHTML = status_sos ;
		fetch("{{ url('/') }}/api/update_status_officer" + "/" + status + "/" + sos_id + "/" + reason)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (status_sos === "ถึงที่เกิดเหตุ") {
                	document.querySelector('#div_event_level').classList.remove('d-none');

                	document.querySelector('#div_gotohelp').classList.add('d-none');
                	document.querySelector('#div_select_treatment').classList.add('d-none');
                	document.querySelector('#div_to_hospital').classList.add('d-none');
                	document.querySelector('#div_operating_base').classList.add('d-none');

                }else if(status_sos === "เสร็จสิ้น"){
                	if (reason != 'null') {
                		reason = reason.replaceAll("_" , " ");
			    		document.querySelector('#show_remark_status').innerHTML = '(' + reason +')';
					}
					document.querySelector('#div_operating_base').classList.remove('d-none');

                	document.querySelector('#div_gotohelp').classList.add('d-none');
                	document.querySelector('#div_event_level').classList.add('d-none');
                	document.querySelector('#div_select_treatment').classList.add('d-none');
                	document.querySelector('#div_to_hospital').classList.add('d-none');
                }else if(status_sos === "ออกจากที่เกิดเหตุ"){
                	document.querySelector('#show_remark_status').innerHTML = '' ;
                	document.querySelector('#show_remark_status').classList.add('d-none') ;

                	document.querySelector('#div_to_hospital').classList.remove('d-none');

                	document.querySelector('#div_gotohelp').classList.add('d-none');
                	document.querySelector('#div_event_level').classList.add('d-none');
                	document.querySelector('#div_select_treatment').classList.add('d-none');
                	document.querySelector('#div_operating_base').classList.add('d-none');
                }

        });
	}

	function update_event_level_rc(level , sos_id){

        text_event_level = level ;

        let class_color_old = document.querySelector('#text_level_by_officers').classList[4] ;
        document.querySelector('#text_level_by_officers').classList.remove(class_color_old);

        switch(text_event_level){
			case 'แดง(วิกฤติ)':
				class_color_officers = 'situation-red';
			break;
			case 'เหลือง(เร่งด่วน)':
				class_color_officers = 'situation-yellow';
			break;
			case 'เขียว(ไม่รุนแรง)':
				class_color_officers = 'situation-green';
			break;
			case 'ขาว(ทั่วไป)':
				class_color_officers = 'situation-normal';
			break;
			case 'ดำ':
				class_color_officers = 'situation-black';
			break;
		}
		document.querySelector('#show_level_by_officers').classList.add(class_color_officers) ;
    	document.querySelector('#text_level_by_officers').innerHTML = text_event_level ;

		fetch("{{ url('/') }}/api/update_event_level_rc" + "/" + level + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                document.querySelector('#div_event_level').classList.add('d-none');
                document.querySelector('#div_select_treatment').classList.remove('d-none');


        });
	}

	// UPDATE เจ้าหน้าที่กลับถึงฐาน
	function officer_to_the_operating_base(sos_id){

		fetch("{{ url('/') }}/api/update_officer_to_the_operating_base" + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === 'Updated successfully') {
                	document.querySelector('#tag_a_switch_standby').click();
                }

        });
	}

</script>



<!-- --------------- ระยะทาง(เสียเงิน) --------------- -->
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
		    map: map_show_case
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
	            
	            document.querySelector('#div_distance_and_duration').classList.remove('d-none');
	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
	    });

	}

</script>
<script>
	function check_add_img(){
		document.getElementById('add_select_img').classList.add('d-none')
		document.getElementById('photo_sos_by_officers').classList.add('d-none');
		document.getElementById('show_photo_sos_by_officers').classList.remove('d-none');

	}
</script>
<script>
	function check_btn_select_treatment(){

		var check_treatment = document.getElementsByName('treatment');
		// เช็คช่อง input ว่าเลือกมีการรักษาหรือไม่
		for (var i = 0, length = check_treatment.length; i < length; i++) {
			if (check_treatment[i].checked) {
				if(check_treatment[i].value == "มีการรักษา"){
					document.querySelector('#treatment_no').classList.add('d-none');
					document.querySelector('#treatment_yes').classList.remove('d-none');
					document.querySelector('#treatment_yes').classList.add('show-data');
				}else{
					document.querySelector('#treatment_yes').classList.add('d-none');
					document.querySelector('#treatment_no').classList.remove('d-none');
					document.querySelector('#treatment_no').classList.add('show-data');
				}
				break;
			} 
		}
	}

</script>
@endsection
