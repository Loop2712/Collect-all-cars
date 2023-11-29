@extends('layouts.viicheck_for_officer')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<style>
	#map_show_officer_all {
      height: calc(100%);
    }

    .card_data{
    	background-color: white;
    	max-width: 25%;
    	width: auto;
    	height: calc(90%);
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }

    .card_data_officer {
	    background-color: white;
/*	    padding: 10px;*/
	    width: calc(25%);
	    max-height: calc(10%);;
	    height: auto;
	    border-radius: 15px;
	    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
	    position: fixed;
	    z-index: 99999;
	    bottom: -3%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    display: flex;
	  	overflow: hidden; 
	}


    .flex-container {
	  	display: flex;
		/*height: 350px;*/
		height: calc(90%);
	  	overflow: auto; /* เพิ่มการเลื่อนแนวตั้ง เมื่อเนื้อหาเกินขนาดของ flex container */
	}

	#div_data_left{
		position:absolute;
		z-index: 99999;
		top: 8%;
	}

	#div_data_right{
		position:absolute;
		z-index: 99999;
		top: 8%;
		right: 0.1%;
	}

	.active_div_data_left{
		animation: show_div_data_left 2s ease 0s 1 normal forwards;

	}

	.Inactive_div_data_left{
		animation: hide_div_data_left 2s ease 0s 1 normal forwards;
	}


	.active_div_data_right{
		animation: show_div_data_right 2s ease 0s 1 normal forwards;
	}


	.Inactive_div_data_right{
		animation: hide_div_data_right 2s ease 0s 1 normal forwards;
	}


	@keyframes hide_div_data_left {
	    0% {
	        transform: translateX(0%);
	    }

	    100% {
	        transform: translateX(-100%);
	    }
	}

	@keyframes show_div_data_left {
	    0% {
	        transform: translateX(-100%);
	    }

	    100% {
	        transform: translateX(2%);
	    }
	}

	@keyframes hide_div_data_right {
	    0% {
	        transform: translateX(0%);
	    }

	    100% {
	        transform: translateX(100%);
	    }
	}

	@keyframes show_div_data_right {
	    0% {
	        transform: translateX(100%);
	    }

	    100% {
	        transform: translateX(0%);
	    }
	}

	.card_btn_div{
		height: 7%;
		width: 60px;
		position:absolute;
		z-index: 99999;
	}

	.card_focus {
	  	animation: backgroundBlink ;
	  	animation-duration: 2s;
	  	background-color: #A4EEF3;
	  	border-radius: 5%;
	}

	@keyframes backgroundBlink {

	  	0% {
            background-color: #A4EEF3;
        }
        25% {
            background-color: transparent;
        }
        50% {
            background-color: #A4EEF3;
        }
        75% {
            background-color: transparent;
        }
        100% {
            background-color: #A4EEF3;
        }
	}


</style>
<!-- <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet"> -->

<div style="position: relative;overflow: hidden;width: 100%;">
	
	<div id="map_show_officer_all"></div>

	<!-- DIV ซ้าย -->
	<div id="div_data_left" class="card_data active_div_data_left">
		<div id="btn_hide_or_show_Div_left" class="card card_btn_div card-body btn " style="left: 100%;top: 2%;" onclick="hide_or_show_Div('hide', 'left');">
			<i id="icon_hide_or_show_Div_left" class="fa-solid fa-chevrons-left"></i>
		</div>
		<div id="btn_lock_div_left" class="card card_btn_div card-body btn" style="left: 100%;top: 9%;" onclick="lock_or_unlock('lock' , 'left');">
			<i id="icon_lock_or_unlock_Div_left" class="fa-solid fa-lock-keyhole-open"></i>
		</div>
		<div id="show_btn_clear_infowindow" class="card card_btn_div card-body btn d-none" style="left: 100%;top: 16%;">
			<i class="fa-sharp fa-solid fa-eye-slash" onclick="clear_infowindow('close');"></i>
		</div>

		<div class="card-body">
			<div class="btn-group" role="group" aria-label="Basic example" style="width:100%;">
				<button id="btn_view_officer" type="button" class="btn btn-sm btn-success" 
				onclick="change_view_data_map('btn_view_officer');document.querySelector('#a_li_1').click();main_check_view_officer();">
					หน่วยปฏิบัติการแพทย์ฉุกเฉิน
				</button>
				<button id="btn_view_sos" type="button" class="btn btn-sm btn-outline-danger" 
				onclick="change_view_data_map('btn_view_sos');document.querySelector('#a_li_2').click();click_menu_div_right('area');">
					&nbsp;&nbsp;&nbsp;จุดเกิดเหตุ&nbsp;&nbsp;&nbsp;
				</button>
			</div>

			<hr>

			<ul class="nav nav-tabs nav-primary d-none" role="tablist">
				<li class="nav-item" role="presentation">
					<a id="a_li_1" class="nav-link active" data-bs-toggle="tab" href="#primaryhome_title" role="tab" aria-selected="false">
						<div class="d-flex align-items-center">
							<div class="tab-title">หน่วยปฏิบัติการแพทย์ฉุกเฉิน (d-none)</div>
						</div>
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a id="a_li_2" class="nav-link" data-bs-toggle="tab" href="#primaryprofile_title" role="tab" aria-selected="true">
						<div class="d-flex align-items-center">
							<div class="tab-title">จุดเกิดเหตุ (d-none)</div>
						</div>
					</a>
				</li>
			</ul>
			<div class="tab-content py-3 flex-container">
				<!-- ข้อมูลหน่วยปฏิบัติการ -->
				<div class="tab-pane fade active show" id="primaryhome_title" role="tabpanel">
					<ul class="nav nav-tabs nav-primary" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="false">
								<div class="d-flex align-items-center">
									<div class="tab-icon">
										<i class="fa-solid fa-building-flag font-18 me-1"></i>
									</div>
									<div class="tab-title">หน่วย</div>
								</div>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="true">
								<div class="d-flex align-items-center">
									<div class="tab-icon">
										<i class="fa-solid fa-truck-plane font-18 me-1"></i>
									</div>
									<div class="tab-title">ยานพาหนะ</div>
								</div>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
								<div class="d-flex align-items-center">
									<div class="tab-icon">
										<i class="fa-sharp fa-solid fa-ranking-star font-18 me-1"></i>
									</div>
									<div class="tab-title">ระดับ</div>
								</div>
							</a>
						</li>
					</ul>
					<div class="tab-content py-3 mt-3">
						<div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
							<div class="mb-4">
								<h4 class="card-title">
									หน่วยปฏิบัติการแพทย์ฉุกเฉิน
									<span class="text-secondary" style="font-size: 15px;">(รวมทุกพื้นที่)</span>
								</h4>
							</div>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/all-agree.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									ทั้งหมด : <b id="count_officer_all"></b>
									<span class="float-end btn" onclick="view_officer_select('status','all');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/checked.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									พร้อมช่วยเหลือ : <b id="count_officer_ready"></b>
									<span class="float-end btn" onclick="view_officer_select('status','Standby');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/help.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									กำลังช่วยเหลือ : <b id="count_officer_helping"></b>
									<span class="float-end btn" onclick="view_officer_select('status','Helping');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/unavailable.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">ไม่อยู่ : <b id="count_officer_Not_ready"></b></span>
								<br>
							</p>
						</div>
						<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
							<div class="mb-4">
								<h4 class="card-title">
									ประเภทยานพาหนะ
									<span class="text-secondary" style="font-size: 15px;">(รวมทุกพื้นที่)</span>
								</h4>
							</div>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/all_vehicle.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									
									ทั้งหมด : <b id="count_sum_vehicle"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','all');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/car_img.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									รถยนต์ : <b id="count_vehicle_car"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','รถ');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/helicopter.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									อากาศยาน : <b id="count_vehicle_aircraft"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','อากาศยาน');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/ship1.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									เรือ ป.1 : <b id="count_vehicle_boat_1"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','เรือ ป.1');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/ship2.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									เรือ ป.2 : <b id="count_vehicle_boat_2"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','เรือ ป.2');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/ship3.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									เรือ ป.3 : <b id="count_vehicle_boat_3"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','เรือ ป.3');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/ship4.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									เรือประเภทอื่นๆ : <b id="count_vehicle_boat_other"></b>
									<span class="float-end btn" onclick="view_officer_select('vehicle_type','เรือประเภทอื่นๆ');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
						</div>
						<div class="tab-pane fade" id="primarycontact" role="tabpanel">
							<div class="mb-4">
								<h4 class="card-title">
									ระดับปฏิบัติการ
									<span class="text-secondary" style="font-size: 15px;">(รวมทุกพื้นที่)</span>
								</h4>
							</div>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									
									ทั้งหมด : <b id="count_sum_level"></b>
									<span class="float-end btn" onclick="view_officer_select('level','all');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									FR : <b id="count_level_fr"></b>
									<span class="float-end btn" onclick="view_officer_select('level','FR');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									BLS : <b id="count_level_bls"></b>
									<span class="float-end btn" onclick="view_officer_select('level','BLS');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									ILS : <b id="count_level_ils"></b>
									<span class="float-end btn" onclick="view_officer_select('level','ILS');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
							<p style="position:relative;padding-top: 10px;">
								<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
								<span style="margin-left:50px;">
									ALS : <b id="count_level_als"></b>
									<span class="float-end btn" onclick="view_officer_select('level','ALS');">
										<i class="fa-sharp fa-solid fa-eye text-info"></i>
									</span>
								</span>
								<br>
							</p>
						</div>
					</div>
				</div>
				<!-- ข้อมูลจุดเกิดเหตุ -->
				<div class="tab-pane fade" id="primaryprofile_title" role="tabpanel">
					<div>
						<h4 class="card-title">
							ระดับเหตุการณ์
							<span class="text-secondary" style="font-size: 15px;">(รวมทุกพื้นที่)</span>
						</h4>
					</div>

					<div id="div_sos_loading" class="">
						Loading..
					</div>
					<div id="div_sos_show_data" class="d-none">
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/sos.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ทั้งหมด : <b><span id="show_amount_sos_all"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เขียว(ไม่รุนแรง) : <b><span id="show_amount_sos_green"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('เขียว(ไม่รุนแรง)');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เหลือง(เร่งด่วน) : <b><span id="show_amount_sos_yellow"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('เหลือง(เร่งด่วน)');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								แดง(วิกฤติ) : <b><span id="show_amount_sos_red"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('แดง(วิกฤติ)');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ขาว(ทั่วไป) : <b><span id="show_amount_sos_white"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('ขาว(ทั่วไป)');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ดำ(รับบริการสาธารณสุขอื่น) : <b><span id="show_amount_sos_black"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('ดำ');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ไม่มีการประเมิน : <b><span id="show_amount_sos_general"></span></b>
								<span class="float-end btn" onclick="btn_view_sos('general');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- DIV ขวา -->
	<div id="div_data_right" class="card_data active_div_data_right">
		<div id="btn_hide_or_show_Div_right" class="card card_btn_div card-body btn" style="right: 100%;top: 2%;" onclick="hide_or_show_Div('hide', 'right');">
			<i id="icon_hide_or_show_Div_right" class="fa-solid fa-chevrons-right"></i>
		</div>
		<div id="btn_lock_div_right" class="card card_btn_div card-body btn" style="right: 100%;top: 9%;" onclick="lock_or_unlock('lock' , 'right');">
			<i id="icon_lock_or_unlock_Div_right" class="fa-solid fa-lock-keyhole-open"></i>
		</div>
		<div class="card card_btn_div card-body btn" style="right: 100%;top: 16%;">
			<i id="icon_change_check_view_focus_infowindow" class="fa-sharp fa-solid fa-eye" onclick="change_check_view_focus_infowindow();"></i>
		</div>

		<div id="btn_view_div_data_gotohelp" class="d-none card card_btn_div card-body btn" style="right: 100%;top: 25%;" onclick="click_menu_div_right('gotohelp');">
			<i id="icon_view_div_data_gotohelp" class="fa-sharp fa-regular fa-truck-medical text-success"></i>
		</div>
		<div id="btn_view_div_data_officer" class="d-none card card_btn_div card-body btn" style="right: 100%;top: 32%;" onclick="click_menu_div_right('officer');">
			<i id="icon_view_div_data_officer" class="fa-solid fa-user-police text-secondary"></i>
		</div>
		<div id="btn_view_div_data_area" class="d-none card card_btn_div card-body btn" style="right: 100%;top: 39%;" onclick="click_menu_div_right('area');">
			<i id="icon_view_div_data_area" class="fa-solid fa-map-location-dot text-secondary"></i>
		</div>

		<div class="card-body">
			<h4>ช่วยเหลือเสร็จสิ้น <b id="count_sos_success"></b> เคส</h4>
			<hr>

			<ul class="nav nav-tabs nav-primary mt-3 d-none" role="tablist">
				<li class="nav-item" role="presentation_2">
					<a id="menu_div_right_area" class="nav-link" data-bs-toggle="tab" href="#primaryhome_2" role="tab" aria-selected="false">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-solid fa-map-location-dot font-18 me-1"></i>
							</div>
							<div class="tab-title">พื้นที่</div>
						</div>
					</a>
				</li>
				<li class="nav-item" role="presentation_2">
					<a id="menu_div_right_gotohelp" class="nav-link active" data-bs-toggle="tab" href="#primaryprofile_2" role="tab" aria-selected="true">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-solid fa-arrow-down-9-1 font-18 me-1"></i>
							</div>
							<div class="tab-title">ออกปฏิบัติการ</div>
						</div>
					</a>
				</li>
				<li class="nav-item" role="presentation_3">
					<a id="menu_div_right_officer" class="nav-link" data-bs-toggle="tab" href="#primaryprofile_3" role="tab" aria-selected="true">
						<div class="d-flex align-items-center">
							<div class="tab-icon">
								<i class="fa-solid fa-arrow-down-9-1 font-18 me-1"></i>
							</div>
							<div class="tab-title">officer</div>
						</div>
					</a>
				</li>
			</ul>
			<div class="tab-content py-3 mt-3 flex-container">
				<div class="tab-pane fade" id="primaryhome_2" role="tabpanel" style="width: 100%;">
					<div class="mb-4">
						<h4 class="card-title">พื้นที่การขอความช่วยเหลือ</h4>
						<ul class="ul_you_are_watching">
						  	<li><b id="watching_sos_type"></b></li>
						  	<li id="watching_sos_data"></li>
						  	<li id="watching_sos_count"></li>
						</ul>
					</div>
					<hr>
					<div id="content_all_sos"></div>
				</div>
				<div class="tab-pane fade active show" id="primaryprofile_2" role="tabpanel" style="width: 95%;">
					<span class="float-end text-dark mb-1" style="font-size: 16px;margin-top: 6px;">
						ออกปฏิบัติการรวม <b id="show_amount_by_area"></b> เคส
					</span>
					<select name="select_level" id="select_level" class="form-control mb-4" onchange="func_select_area_and_level();">
						<option class="notranslate" selected value="all">เลือกระดับ</option>
						<option class="notranslate text-success" value="FR">FR</option>
						<option class="notranslate text-warning" value="BLS">BLS</option>
						<option class="notranslate text-warning" value="ILS">ILS</option>
						<option class="notranslate text-danger" value="ALS">ALS</option>
	                </select>
	                <hr>
					<div class="mb-4">
						<h4 class="card-title">เจ้าหน้าที่ทั้งหมด</h4>
					</div>
					<div id="content_data_name_officer_all"></div>
					
				</div>
				<div class="tab-pane fade" id="primaryprofile_3" role="tabpanel" style="width: 100%;">
					<div class="mb-4">
						<h4 class="card-title">เจ้าหน้าที่ในแผนที่</h4>
						<ul class="ul_you_are_watching">
						  	<li id="watching_officer_type"></li>
						  	<li><b id="watching_officer_data"></b></li>
						  	<li id="watching_officer_count"></li>
						</ul>
					</div>
					<hr>
					<div id="content_data_name_officer"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- DIV กลางล่าง -->
	<div id="div_data_officer" class="card_data_officer d-">
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<select name="select_area_district" id="select_area_district" class="form-control" onchange="open_map_district();">
						<option class="notranslate" selected value="all">เลือกอำเภอ</option>
	                </select>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {

    	// ------------ SEARCH DATA ------------ //
    	// data officer all
    	fetch("{{ url('/') }}/api/get_data_officer_all/" + "{{ $area }}")
	        .then(response => response.json())
	        .then(result_data_officer_all => {
	            // console.log(result_data_officer_all);
	            data_officer_all = result_data_officer_all ;

	            // สร้าง MAP
        		open_map_show_data_officer_area();
        		loop_get_data_officer_all();

    		});

	    // sos success all
    	fetch("{{ url('/') }}/api/get_sos_help_center_success/" + "{{ $area }}")
	        .then(response => response.json())
	        .then(result_sos_success_all => {
	            // console.log(result_sos_success_all);
	            sos_success_all = result_sos_success_all ;
    			document.querySelector('#count_sos_success').innerHTML = sos_success_all.length ;
    		});

    	// show_location_A district
	    fetch("{{ url('/') }}/api/location/"+"{{ $area }}"+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#select_area_district");
                    location_A.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = "เลือกอำเภอ";
                    option_start_A.value = "all";
                    location_A.add(option_start_A);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });
    	// --------- END SEARCH DATA --------- //
	    
    });

    // -- เช็คว่าปัจจุบัน USER ต้องการดูอะไรอยู่ -- //
    var check_view_officer_or_sos = 'officer' ;
    var check_view_area_all_or_district = "all" ;
    var check_view_officer_type = 'status' ;
    var check_view_officer_data = 'all' ;
    var check_view_type_sos = 'all' ;
    // -- จบเช็คว่าปัจจุบัน USER ต้องการดูอะไรอยู่ -- //

	var sos_success_all ;
	var data_officer_all ;

    let map_show_data_officer_area ;
    let marker ;
    let marker_sos ;
    let markers = [] ;
    var bounds;
    var polygon;
    var current_polygon ;

    var infowindows = [];
    var infowindow ;
    var active_infowindow = "No" ;
    var arr_infowindow_officer = [] ;

    // เช็คการขับแผนที่
    var isPanning = false;

    let image_sos_general = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}";
    let image_sos_green = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}";
    let image_sos_yellow = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}";
    let image_sos_red = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}";
    let image_sos_white = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}";
    let image_sos_black = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}";

    // FR
    let img_green_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/7.png') }}";
    let img_green_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/8.png') }}";
    let img_green_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/9.png') }}";
    let img_green_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/10.png') }}";
    let img_green_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/11.png') }}";
    let img_green_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/12.png') }}";

    // BLS / ILS
    let img_yellow_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/13.png') }}";
    let img_yellow_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/14.png') }}";
    let img_yellow_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/15.png') }}";
    let img_yellow_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/16.png') }}";
    let img_yellow_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/17.png') }}";
    let img_yellow_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/18.png') }}";

    // ALS
    let img_red_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/19.png') }}";
    let img_red_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/20.png') }}";
    let img_red_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/21.png') }}";
    let img_red_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/22.png') }}";
    let img_red_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/23.png') }}";
    let img_red_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/24.png') }}";

    // ตรวจสอบการขยับแผนที่
    let check_dragstart_map ;
    function func_check_dragstart_map() {
		check_dragstart_map = setInterval(function() {
			google.maps.event.addListenerOnce(map_show_data_officer_area, 'dragstart', function() {
			   	isPanning = true;
			   	Stop_check_dragstart_map();
			   	hide_or_show_Div('hide' , 'left');
			   	hide_or_show_Div('hide' , 'right');
			});
		}, 1000);
	}

	// หยุดการตรวจสอบการขยับแผนที่เมื่อมีการขยับ
	function Stop_check_dragstart_map() {
        clearInterval(check_dragstart_map);
    }

	function open_map_show_data_officer_area() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541') + 1;
        let m_numZoom = parseFloat('6.5');

        active_infowindow = "No" ;
        check_view_area_all_or_district = 'all' ;

        map_show_data_officer_area = new google.maps.Map(document.getElementById("map_show_officer_all"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        // show_all_amphoe();
        func_check_dragstart_map();

        fetch("{{ url('/') }}/api/view_map_officer_all/" + "{{ $area }}" + "/draw_select_area")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	        	if(polygon){
		        	polygon.setMap(null);
	        	}

	            // สร้าง Polygon ใหม่
	            polygon = new google.maps.Polygon({
	                paths: JSON.parse(result['polygon']),
	                strokeColor: "#008450",
	                strokeOpacity: 0.8,
	                strokeWeight: 1,
	                fillColor: "#008450",
	                fillOpacity: 0.1,
	            });

	            current_polygon = result['polygon'];

	            // กำหนดให้ Polygon ใหม่แสดงบนแผนที่
	            polygon.setMap(map_show_data_officer_area);

	            // Fit map ให้เหมาะสมกับ Polygon ใหม่
	            bounds = new google.maps.LatLngBounds();

	            set_map_fit_polygon();
	        });

	    setTimeout(function() {
		    // ตรวจสอบว่ากำลังดู OFFICER หรือ SOS
	    	if(check_view_officer_or_sos == 'sos'){
	    		// console.log('กำลังดู SOS');
	    		btn_view_sos(check_view_type_sos);
			}else if(check_view_officer_or_sos == 'officer'){
	    		// console.log('กำลังดู OFFICER');
				change_view_data_map("btn_view_officer");
	    	}
	    }, 500);

    }

    function open_map_district(){

    	let select_area_district = document.querySelector('#select_area_district');
    	// console.log(select_area_district.value);
    	if (select_area_district.value == 'all') {
    		check_view_area_all_or_district = "all"

    		open_map_show_data_officer_area();

    	}else{

    		check_view_area_all_or_district = "district";

    		fetch("{{ url('/') }}/api/get_let_lng_district/" + "{{ $area }}" + "/" + select_area_district.value)
	            .then(response => response.json())
	            .then(result => {
	                // console.log(result);

	                if(polygon){
			        	polygon.setMap(null);
		        	}

	                // สร้าง Polygon ใหม่
		            polygon = new google.maps.Polygon({
		                paths: JSON.parse(result['polygon']),
		                strokeColor: "#008450",
		                strokeOpacity: 0.8,
		                strokeWeight: 1,
		                fillColor: "#008450",
		                fillOpacity: 0.1,
		            });

	            	current_polygon = result['polygon'];

		            // กำหนดให้ Polygon ใหม่แสดงบนแผนที่
		            polygon.setMap(map_show_data_officer_area);

		            // Fit map ให้เหมาะสมกับ Polygon ใหม่
		            bounds = new google.maps.LatLngBounds();

	            	set_map_fit_polygon();

	            });

			setTimeout(function() {
		        // ตรวจสอบว่ากำลังดู OFFICER หรือ SOS
		    	if(check_view_officer_or_sos == 'sos'){
		    		// console.log('กำลังดู SOS');
		    		btn_view_sos(check_view_type_sos);
				}else if(check_view_officer_or_sos == 'officer'){
		    		// console.log('กำลังดู OFFICER');
	    			view_officer_select(check_view_officer_type , check_view_officer_data);
		        	show_data_name_officer();
		    	}
	    	}, 500);
	        
    	}
    }

    function change_view_data_map(type_view){
    	
    	// console.log('change_view_data_map');

    	for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    	// console.log('type_view >> ' + type_view);

    	if (type_view == "btn_view_officer") {

    		check_view_officer_or_sos = 'officer';

    		setTimeout(function() {
    			btn_view_officer_all();
    		}, 500);

    		document.querySelector('#btn_view_officer').classList.remove('btn-outline-success');
    		document.querySelector('#btn_view_officer').classList.add('btn-success');

    		document.querySelector('#btn_view_sos').classList.remove('btn-danger');
    		document.querySelector('#btn_view_sos').classList.add('btn-outline-danger');

    	}else if(type_view == "btn_view_sos"){

    		check_view_officer_or_sos = 'sos' ;

    		btn_view_sos('all');

    		document.querySelector('#btn_view_officer').classList.remove('btn-success');
    		document.querySelector('#btn_view_officer').classList.add('btn-outline-success');

    		document.querySelector('#btn_view_sos').classList.remove('btn-outline-danger');
    		document.querySelector('#btn_view_sos').classList.add('btn-danger');
    	}

    }

    function btn_view_officer_all(){
    	// console.log('btn_view_officer');
    	let content_data_name_officer = document.querySelector('#content_data_name_officer');
			content_data_name_officer.innerHTML = '';

		let content_data_name_officer_all = document.querySelector('#content_data_name_officer_all');
			content_data_name_officer_all.innerHTML = '';

    	let icon_level ;

    	let sum_go_to_help = 0 ;

    	infowindows = [] ;

    	// STATUS OFFICER
    	let count_officer_ready = 0 ;
    	let count_officer_helping = 0 ;
    	let count_officer_Not_ready = 0 ;

    	let count_vehicle_car = 0 ;
    	let count_vehicle_aircraft = 0 ;
    	let count_vehicle_boat_1 = 0 ;
    	let count_vehicle_boat_2 = 0 ;
    	let count_vehicle_boat_3 = 0 ;
    	let count_vehicle_boat_other = 0 ;

    	// LEVEL
    	let count_level_fr = 0 ;
    	let count_level_bls = 0 ;
    	let count_level_ils = 0 ;
    	let count_level_als = 0 ;

    	// console.log(data_officer_all);


        for(let item of data_officer_all){

        	// STATUS OFFICER
        	if(item.status === "Standby"){
        		count_officer_ready = count_officer_ready + 1 ;
        	}else if(item.status === "Helping"){
        		count_officer_helping = count_officer_helping + 1 ;
        	}else{
        		count_officer_Not_ready = count_officer_Not_ready + 1 ;
        	}

        	// VEHICLE
        	switch(item.vehicle_type) {
			  	case "รถ":
			    	count_vehicle_car = count_vehicle_car + 1 ;
			    break;
			  	case "อากาศยาน":
			    	count_vehicle_aircraft = count_vehicle_aircraft + 1 ;
			    break;
			    case "เรือ ป.1":
			    	count_vehicle_boat_1 = count_vehicle_boat_1 + 1 ;
			    break;
			    case "เรือ ป.2":
			    	count_vehicle_boat_2 = count_vehicle_boat_2 + 1 ;
			    break;
			    case "เรือ ป.3":
			    	count_vehicle_boat_3 = count_vehicle_boat_3 + 1 ;
			    break;
			    case "เรือประเภทอื่นๆ":
			    	count_vehicle_boat_other = count_vehicle_boat_other + 1 ;
			    break;
			}

			// LEVEL
        	switch(item.level) {
			  	case "FR":
			    	count_level_fr = count_level_fr + 1 ;
			    break;
			  	case "BLS":
			    	count_level_bls = count_level_bls + 1 ;
			    break;
			    case "ILS":
			    	count_level_ils = count_level_ils + 1 ;
			    break;
			    case "ALS":
			    	count_level_als = count_level_als + 1 ;
			    break;
			}

        	// FR
        	if( item.level === "FR" ){
        		switch(item.vehicle_type) {
				  	case "รถ":
				    	icon_level = img_green_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_green_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_green_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_green_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_green_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_green_ship_other ;
				    break;
				}
        	}
        	// BLS && ILS 
        	else if( item.level === "BLS" || item.level === "ILS"){
        		switch(item.vehicle_type) {
				  	case "รถ":
				    	icon_level = img_yellow_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_yellow_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_yellow_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_yellow_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_yellow_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_yellow_ship_other ;
				    break;
				}
        	}
        	// ALS
        	else{
        		switch(item.vehicle_type) {
				  	case "รถ":
				    	icon_level = img_red_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_red_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_red_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_red_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_red_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_red_ship_other ;
				    break;
				}
        	}

        	infowindow = new google.maps.InfoWindow();

        	let photo_user = '';
        	if(item.photo_user){
        		photo_user = "{{ url('storage')}}/" + item.photo_user ;
        	}else{
        		photo_user = "{{ url('/img/icon/rescue.png') }}";
        	}

        	let focus_markerIndex ;

        	if(check_view_officer_type == "status"){

        		if(check_view_officer_data == 'all' || check_view_officer_data == item.status){
        			marker = new google.maps.Marker({
			            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
			            map: map_show_data_officer_area,
			            icon: icon_level,
			        });
			        markers.push(marker);

			        infowindow['user_id'] = item.user_id ;
			        infowindows.push(infowindow);

			        focus_markerIndex = markers.length - 1 ;

			        // เพิ่ม Event Listener สำหรับคลิก Marker
				    marker.addListener('click', function(markerIndex) {
				        return function() {
				            // console.log(item.user_id);

				            arr_infowindow_officer.push(item.user_id);

				            focus_officer_div_right(focus_markerIndex , 'officer_all');

					        let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

				            // เซ็ตข้อมูลใน InfoWindow
				            infowindows[markerIndex].setContent(contentString);

				            // แสดง InfoWindow ที่ตำแหน่งของ Marker
				            infowindows[markerIndex].open(map_show_data_officer_area, markers[markerIndex]);

				            show_infowindow();
				        };
				    }(markers.length - 1));

				    // เพิ่มเหตุการณ์ closeclick infowindow
					infowindows[focus_markerIndex].addListener('closeclick', function() {
					  	// console.log('Infowindow >> ' + item.user_id + ' << ถูกปิดแล้ว');

					  	let indexToRemove = arr_infowindow_officer.indexOf(item.user_id);

						if (indexToRemove !== -1) {
						  arr_infowindow_officer.splice(indexToRemove, 1);
						}

					});

				    // ------------ ตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
				    if(arr_infowindow_officer.includes(item.user_id)){

				    	let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

			            // เซ็ตข้อมูลใน InfoWindow
			            infowindows[focus_markerIndex].setContent(contentString);

			            // แสดง InfoWindow ที่ตำแหน่งของ Marker
			            infowindows[focus_markerIndex].open(map_show_data_officer_area, markers[focus_markerIndex]);

			            show_infowindow();
				    }
				    // ------------ จบการตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //

        		}

        	}

        	if(check_view_officer_type == "vehicle_type"){

        		if(check_view_officer_data == 'all' || check_view_officer_data == item.vehicle_type){
        			marker = new google.maps.Marker({
			            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
			            map: map_show_data_officer_area,
			            icon: icon_level,
			        });
			        markers.push(marker);

			        infowindow['user_id'] = item.user_id ;
			        infowindows.push(infowindow);

			        focus_markerIndex = markers.length - 1 ;

			        // เพิ่ม Event Listener สำหรับคลิก Marker
				    marker.addListener('click', function(markerIndex) {
				        return function() {
				            // console.log(item.user_id);

				            arr_infowindow_officer.push(item.user_id);

				            focus_officer_div_right(focus_markerIndex , 'officer_all');

					        let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

				            // เซ็ตข้อมูลใน InfoWindow
				            infowindows[markerIndex].setContent(contentString);

				            // แสดง InfoWindow ที่ตำแหน่งของ Marker
				            infowindows[markerIndex].open(map_show_data_officer_area, markers[markerIndex]);

				            show_infowindow();
				        };
				    }(markers.length - 1));

				    // เพิ่มเหตุการณ์ closeclick infowindow
					infowindows[focus_markerIndex].addListener('closeclick', function() {

					  	let indexToRemove = arr_infowindow_officer.indexOf(item.user_id);

						if (indexToRemove !== -1) {
						  arr_infowindow_officer.splice(indexToRemove, 1);
						}

					});

				    // ------------ ตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
				    if(arr_infowindow_officer.includes(item.user_id)){

				    	let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

			            // เซ็ตข้อมูลใน InfoWindow
			            infowindows[focus_markerIndex].setContent(contentString);

			            // แสดง InfoWindow ที่ตำแหน่งของ Marker
			            infowindows[focus_markerIndex].open(map_show_data_officer_area, markers[focus_markerIndex]);

			            show_infowindow();
				    }
				    // ------------ จบการตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
        		}

        	}

        	if(check_view_officer_type == "level"){

        		if(check_view_officer_data == 'all' || check_view_officer_data == item.level){
        			marker = new google.maps.Marker({
			            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
			            map: map_show_data_officer_area,
			            icon: icon_level,
			        });
			        markers.push(marker);

			        infowindow['user_id'] = item.user_id ;
			        infowindows.push(infowindow);

			        focus_markerIndex = markers.length - 1 ;

			        // เพิ่ม Event Listener สำหรับคลิก Marker
				    marker.addListener('click', function(markerIndex) {
				        return function() {
				            // console.log(item.user_id);

				            arr_infowindow_officer.push(item.user_id);

				            focus_officer_div_right(focus_markerIndex , 'officer_all');

					        let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

				            // เซ็ตข้อมูลใน InfoWindow
				            infowindows[markerIndex].setContent(contentString);

				            // แสดง InfoWindow ที่ตำแหน่งของ Marker
				            infowindows[markerIndex].open(map_show_data_officer_area, markers[markerIndex]);

				            show_infowindow();
				        };
				    }(markers.length - 1));

				    // เพิ่มเหตุการณ์ closeclick infowindow
					infowindows[focus_markerIndex].addListener('closeclick', function() {
					  	let indexToRemove = arr_infowindow_officer.indexOf(item.user_id);

						if (indexToRemove !== -1) {
						  arr_infowindow_officer.splice(indexToRemove, 1);
						}

					});

				    // ------------ ตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
				    if(arr_infowindow_officer.includes(item.user_id)){

				    	let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

			            // เซ็ตข้อมูลใน InfoWindow
			            infowindows[focus_markerIndex].setContent(contentString);

			            // แสดง InfoWindow ที่ตำแหน่งของ Marker
			            infowindows[focus_markerIndex].open(map_show_data_officer_area, markers[focus_markerIndex]);

			            show_infowindow();
				    }
				    // ------------ จบการตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
        		}

        	}

        	// --------- สร้างเนื้อหาใส่ใน DIV ด้านขวา ----------
        	let level  = item.level ;
		    let vehicle  = item.vehicle_type ;
		    let unit  = item.name ;
		    let count_case = item.go_to_help ;

		    if(item.go_to_help){
		    	sum_go_to_help = sum_go_to_help + item.go_to_help
		    }

        	let html_div_right = create_content_div_right(photo_user , item.name_officer , focus_markerIndex , level , vehicle , unit , count_case , 'officer_all');
			content_data_name_officer_all.insertAdjacentHTML('beforeend', html_div_right); // แทรกล่างสุด

	    }

	    // COUNT ALL CASE
	    document.querySelector('#show_amount_by_area').innerHTML = sum_go_to_help ;


	    // STATUS OFFICER
    	document.querySelector('#count_officer_all').innerHTML = data_officer_all.length ;
    	document.querySelector('#count_officer_ready').innerHTML = count_officer_ready ;
    	document.querySelector('#count_officer_helping').innerHTML = count_officer_helping ;
    	document.querySelector('#count_officer_Not_ready').innerHTML = count_officer_Not_ready ;

    	// VEHICLE
    	document.querySelector('#count_sum_vehicle').innerHTML = data_officer_all.length ;
    	document.querySelector('#count_vehicle_car').innerHTML = count_vehicle_car ;
    	document.querySelector('#count_vehicle_aircraft').innerHTML = count_vehicle_aircraft ;
    	document.querySelector('#count_vehicle_boat_1').innerHTML = count_vehicle_boat_1 ;
    	document.querySelector('#count_vehicle_boat_2').innerHTML = count_vehicle_boat_2 ;
    	document.querySelector('#count_vehicle_boat_3').innerHTML = count_vehicle_boat_3 ;
    	document.querySelector('#count_vehicle_boat_other').innerHTML = count_vehicle_boat_other ;

    	// LEVEL
    	document.querySelector('#count_sum_level').innerHTML = data_officer_all.length ;
    	document.querySelector('#count_level_fr').innerHTML = count_level_fr ;
    	document.querySelector('#count_level_bls').innerHTML = count_level_bls ;
    	document.querySelector('#count_level_ils').innerHTML = count_level_ils ;
    	document.querySelector('#count_level_als').innerHTML = count_level_als ;

    	// เลือกการแสดงเจ้าหน้าที่ด้านขวา
    	if(check_view_officer_data == 'all'){
    		show_data_gotohelp();
    	}else{
    		show_data_name_officer();
    	}

    }

    var watching_officer_count ;

    function view_officer_select(type , data){

    	setTimeout(function() {

			clear_infowindow('re_marker');
    		infowindows = [] ;
    		watching_officer_count = 0 ;
	    		
	    	// console.log(type);
	    	check_view_officer_type = type ;
	    	check_view_officer_data = data ;

	    	// เลือกการแสดงเจ้าหน้าที่ด้านขวา
	    	if(check_view_officer_data == 'all' && check_view_area_all_or_district == 'all'){
	    		show_data_gotohelp();
	    	}else{
	    		show_data_name_officer();
	    	}

	    	for (let i = 0; i < markers.length; i++) {
		        markers[i].setMap(null);
		    }
		    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

		    let icon_level ;
		    let i_check = 0 ;

		    let type_select = "";

		    let select_area_district = document.querySelector('#select_area_district');
			// console.log(select_area_district.value);

			let content_data_name_officer = document.querySelector('#content_data_name_officer');
				content_data_name_officer.innerHTML = '';

	        for(let item of data_officer_all){

	        	if(type == "status"){
			    	type_select = item.status ;
			    }
			    else if(type == "vehicle_type"){
			    	type_select = item.vehicle_type ;
			    }
			    else if(type == 'level'){
			    	type_select = item.level ;
			    }

	        	// status = type_officer_status
	        	if(data === type_select || data === "all"){

	        		i_check = i_check + 1 ;

		        	// FR
		        	if( item.level === "FR" ){
		        		switch(item.vehicle_type) {
						  	case "รถ":
						    	icon_level = img_green_car ;
						    break;
						  	case "อากาศยาน":
						    	icon_level = img_green_aircraft ;
						    break;
						    case "เรือ ป.1":
						    	icon_level = img_green_ship_1 ;
						    break;
						    case "เรือ ป.2":
						    	icon_level = img_green_ship_2 ;
						    break;
						    case "เรือ ป.3":
						    	icon_level = img_green_ship_3 ;
						    break;
						    case "เรือประเภทอื่นๆ":
						    	icon_level = img_green_ship_other ;
						    break;
						}
		        	}
		        	// BLS && ILS 
		        	else if( item.level === "BLS" || item.level === "ILS"){
		        		switch(item.vehicle_type) {
						  	case "รถ":
						    	icon_level = img_yellow_car ;
						    break;
						  	case "อากาศยาน":
						    	icon_level = img_yellow_aircraft ;
						    break;
						    case "เรือ ป.1":
						    	icon_level = img_yellow_ship_1 ;
						    break;
						    case "เรือ ป.2":
						    	icon_level = img_yellow_ship_2 ;
						    break;
						    case "เรือ ป.3":
						    	icon_level = img_yellow_ship_3 ;
						    break;
						    case "เรือประเภทอื่นๆ":
						    	icon_level = img_yellow_ship_other ;
						    break;
						}
		        	}
		        	// ALS
		        	else{
		        		switch(item.vehicle_type) {
						  	case "รถ":
						    	icon_level = img_red_car ;
						    break;
						  	case "อากาศยาน":
						    	icon_level = img_red_aircraft ;
						    break;
						    case "เรือ ป.1":
						    	icon_level = img_red_ship_1 ;
						    break;
						    case "เรือ ป.2":
						    	icon_level = img_red_ship_2 ;
						    break;
						    case "เรือ ป.3":
						    	icon_level = img_red_ship_3 ;
						    break;
						    case "เรือประเภทอื่นๆ":
						    	icon_level = img_red_ship_other ;
						    break;
						}
		        	}

		        	// เช็คหมุดอยู่ใน polygon ของอำเภอ
		        	let check_in_polygon = check_area(item.lat , item.lng , current_polygon);

			    	if( (check_view_officer_data == "all" && check_view_area_all_or_district == 'all') || check_in_polygon == "Yes"){

			    		infowindow = new google.maps.InfoWindow();

			        	let photo_user = '';
			        	if(item.photo_user){
			        		photo_user = "{{ url('storage')}}/" + item.photo_user ;
			        	}else{
			        		photo_user = "{{ url('/img/icon/rescue.png') }}";
			        	}

				        marker = new google.maps.Marker({
				            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
				            map: map_show_data_officer_area,
				            icon: icon_level,
				        });
				        markers.push(marker);

				        infowindow['user_id'] = item.user_id ;
				        infowindows.push(infowindow);

				        watching_officer_count = watching_officer_count  + 1 ;
				        let focus_markerIndex = markers.length - 1 ;

				        // เพิ่ม Event Listener สำหรับคลิก Marker
					    marker.addListener('click', function(markerIndex) {
					        return function() {
					            // console.log("click >> " + item.user_id);

					            arr_infowindow_officer.push(item.user_id);

					        	if(check_view_area_all_or_district == 'all'){
					            	focus_officer_div_right(focus_markerIndex , 'officer_all');
					        	}else{
					            	focus_officer_div_right(focus_markerIndex , 'officer_select');
					        	}

					            let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

					            // เซ็ตข้อมูลใน InfoWindow
					            infowindows[markerIndex].setContent(contentString);

					            // แสดง InfoWindow ที่ตำแหน่งของ Marker
					            infowindows[markerIndex].open(map_show_data_officer_area, markers[markerIndex]);

					            show_infowindow();
					        };
					    }(markers.length - 1));

					    // เพิ่มเหตุการณ์ closeclick infowindow
						infowindows[focus_markerIndex].addListener('closeclick', function() {

						  	let indexToRemove = arr_infowindow_officer.indexOf(item.user_id);

							if (indexToRemove !== -1) {
							  arr_infowindow_officer.splice(indexToRemove, 1);
							}

						});

					    // ------------ ตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //
					    if(arr_infowindow_officer.includes(item.user_id)){

					    	let contentString = create_content_infowindow(photo_user , item.name_officer , focus_markerIndex);

				            // เซ็ตข้อมูลใน InfoWindow
				            infowindows[focus_markerIndex].setContent(contentString);

				            // แสดง InfoWindow ที่ตำแหน่งของ Marker
				            infowindows[focus_markerIndex].open(map_show_data_officer_area, markers[focus_markerIndex]);

				            show_infowindow();
					    }
					    // ------------ จบการตรวจว่าเดิม มีการเปิด infowindow นี้อยู่หรือไม่ ------------ //


			        	// --------- สร้างเนื้อหาใส่ใน DIV ด้านขวา ----------
					    let level  = item.level ;
					    let vehicle  = item.vehicle_type ;
					    let unit  = item.name ;
					    let count_case = item.go_to_help ;

			        	let html_div_right = create_content_div_right(photo_user , item.name_officer , focus_markerIndex , level , vehicle , unit , count_case , 'officer_select');
    					content_data_name_officer.insertAdjacentHTML('beforeend', html_div_right); // แทรกล่างสุด
				        
				    }

				}
			}

			// แสดงผลต่อผู้ใช้ว่ากำลังดูอะไรอยู่
    		show_to_user_watching();

		}, 200);
    }

    function btn_view_sos(type){
    	// console.log('btn_view_sos');

    	check_view_type_sos = type ;

        for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    	let icon_level ;

    	let show_amount_sos_red = 0 ;
    	let show_amount_sos_yellow = 0 ;
    	let show_amount_sos_green = 0 ;
    	let show_amount_sos_white = 0 ;
    	let show_amount_sos_black = 0 ;
    	let show_amount_sos_general = 0 ;

    	// console.log(sos_success_all);

    	let arr_address_in_polygon = [] ;
    	let count_marker_in_polygon = 0 ;

    	let content_all_sos = document.querySelector('#content_all_sos');
    		content_all_sos.innerHTML = '' ;

        for(let item of sos_success_all){

        	switch(item.rc) {
			  	case "แดง(วิกฤติ)":
			    	icon_level = image_sos_red ;
			    	show_amount_sos_red = show_amount_sos_red + 1 ;
			    break;
			  	case "เหลือง(เร่งด่วน)":
			    	icon_level = image_sos_yellow ;
			    	show_amount_sos_yellow = show_amount_sos_yellow + 1 ;
			    break;
			    case "เขียว(ไม่รุนแรง)":
			    	icon_level = image_sos_green ;
			    	show_amount_sos_green = show_amount_sos_green + 1 ;
			    break;
			    case "ขาว(ทั่วไป)":
			    	icon_level = image_sos_white ;
			    	show_amount_sos_white = show_amount_sos_white + 1 ;
			    break;
			    case "ดำ":
			    	icon_level = image_sos_black ;
			    	show_amount_sos_black = show_amount_sos_black + 1 ;
			    break;
			    default:
			    	icon_level = image_sos_general ;
			    	show_amount_sos_general = show_amount_sos_general + 1 ;
			}

			// เช็คหมุดอยู่ใน polygon ของอำเภอ
        	let check_in_polygon = check_area(item.lat , item.lng , current_polygon);

			if(type == item.rc || type == 'all'){

				if( check_view_area_all_or_district == 'all' || check_in_polygon == "Yes"){
					// console.log(item.address.split('/')[1]);
					if (item.address) {
						let area_a = item.address.split('/')[1] ;
						let check_arr_address = arr_address_in_polygon.includes(area_a);
						if(!arr_address_in_polygon[area_a]){
							arr_address_in_polygon[area_a] = 1;
						}else{
							arr_address_in_polygon[area_a] = arr_address_in_polygon[area_a] + 1;
						}
					}
					
			        marker_sos = new google.maps.Marker({
			            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
			            map: map_show_data_officer_area,
			            icon: icon_level,
			        });
			        markers.push(marker_sos);

			        count_marker_in_polygon = count_marker_in_polygon + 1 ;
			    }

		    }
		    else if(type == 'general'){

		    	if(!item.rc){
		    		if( check_view_area_all_or_district == 'all' || check_in_polygon == "Yes"){
		    			// console.log(item.address.split('/')[1]);
						if (item.address) {
							let area_a = item.address.split('/')[1] ;
							let check_arr_address = arr_address_in_polygon.includes(area_a);
							if(!arr_address_in_polygon[area_a]){
								arr_address_in_polygon[area_a] = 1;
							}else{
								arr_address_in_polygon[area_a] = arr_address_in_polygon[area_a] + 1;
							}
						}

			    		marker_sos = new google.maps.Marker({
				            position: {lat: parseFloat(item.lat) , lng: parseFloat(item.lng) },
				            map: map_show_data_officer_area,
				            icon: icon_level,
				        });
				        markers.push(marker_sos);

				        count_marker_in_polygon = count_marker_in_polygon + 1 ;
				    }
		    	}

		    }

        }

		// console.log(arr_address_in_polygon);

		// แปลง object ให้กลายเป็น array ของ objects
		let data_arr = Object.entries(arr_address_in_polygon);

		// เรียงลำดับ array ตามค่ามากที่สุดไปน้อยลง
		data_arr.sort((a, b) => b[1] - a[1]);

		let sortedData = [];

		// แสดงผลลัพธ์ที่เรียงลำดับ
		for (let entry of data_arr) {
		  	// console.log(entry[0] + ": " + entry[1]);
		  	sortedData[entry[0]] = entry[1];
		}

		for (let key in sortedData) {
		  	// console.log(`Key: ${key}, Value: ${sortedData[key]}`);

		  	let html = `
				<div class="mt-2 show_count_area" data="show_count_area" area="${key}">
					<span>${key}</span>
					<span class="float-end">
						<b>${sortedData[key]}</b>
					</span>
					<br>
				</div>
			`;

			content_all_sos.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
		}

        let sum_sos = show_amount_sos_red + show_amount_sos_yellow + show_amount_sos_green + show_amount_sos_white + show_amount_sos_black + show_amount_sos_general ;

    	document.querySelector('#show_amount_sos_all').innerHTML = sum_sos;
    	document.querySelector('#show_amount_sos_red').innerHTML = show_amount_sos_red;
    	document.querySelector('#show_amount_sos_yellow').innerHTML = show_amount_sos_yellow;
    	document.querySelector('#show_amount_sos_green').innerHTML = show_amount_sos_green;
    	document.querySelector('#show_amount_sos_white').innerHTML = show_amount_sos_white;
    	document.querySelector('#show_amount_sos_black').innerHTML = show_amount_sos_black;
    	document.querySelector('#show_amount_sos_general').innerHTML = show_amount_sos_general;

    	document.querySelector('#div_sos_loading').classList.add('d-none');
    	document.querySelector('#div_sos_show_data').classList.remove('d-none');

    	let select_area_district = document.querySelector('#select_area_district');
    	let text_watching_sos_type ;
    	let class_level ;

    	if(check_view_type_sos == 'all'){
    		text_watching_sos_type = 'ทั้งหมด' ;
    		class_level = 'text-dark' ;
    	}else if(check_view_type_sos == 'general'){
    		text_watching_sos_type = 'ไม่มีการประเมิน' ;
    		class_level = 'text-info' ;
    	}else{
    		text_watching_sos_type = check_view_type_sos ;

    		if(text_watching_sos_type == "เขียว(ไม่รุนแรง)"){
				class_level = "text-success";
			}else if(text_watching_sos_type == "เหลือง(เร่งด่วน)"){
				class_level = "text-warning";
			}else if(text_watching_sos_type == "แดง(วิกฤติ)" ){
				class_level = "text-danger";
			}else if(text_watching_sos_type == "ดำ" ){
				class_level = "text-dark";
			}else{
				class_level = 'text-info';
			}
    	}

    	if(class_level){
			document.querySelector('#watching_sos_type').setAttribute('class' , class_level);
		}

    	if(select_area_district.value != 'all'){
    		document.querySelector('#watching_sos_type').innerHTML = 'ระดับ : ' + text_watching_sos_type;
    		document.querySelector('#watching_sos_data').innerHTML = select_area_district.value;
    		document.querySelector('#watching_sos_count').innerHTML = 'รวม ' + count_marker_in_polygon + ' เคส';
    	}else{
    		document.querySelector('#watching_sos_type').innerHTML = 'ระดับ : ' + text_watching_sos_type;
    		document.querySelector('#watching_sos_data').innerHTML = 'ทุกพื้นที่';
    		document.querySelector('#watching_sos_count').innerHTML = 'รวม ' + count_marker_in_polygon + ' เคส';
    	}
    	

    	show_data_area();

    }

    function show_data_name_officer(){
    	if(active_menu_div_right != 'officer'){
			document.querySelector('#icon_view_div_data_officer').click();
		}
    }

    function show_data_area(){
    	if(active_menu_div_right != 'area'){
			document.querySelector('#icon_view_div_data_area').click();
		}
    }

    function show_data_gotohelp(){
		if(active_menu_div_right != 'gotohelp'){
			document.querySelector('#icon_view_div_data_gotohelp').click();
		}
	}

    function set_map_fit_polygon(){
    	setTimeout(function() {
			// Fit map ให้เหมาะสมกับ Polygon ใหม่
	        polygon.getPath().forEach(function (point) {
	            bounds.extend(point);
	        });
	        map_show_data_officer_area.fitBounds(bounds); 
		}, 500);
    }

    // แสดงผลต่อผู้ใช้ว่ากำลังดูอะไรอยู่
    function show_to_user_watching(){

    	let officer_type ;

    	if(check_view_officer_type == 'status'){
    		officer_type = "สถานะของหน่วยฯ" ;
    	}else if(check_view_officer_type == 'vehicle_type'){
    		officer_type = "ประเภทยานพาหนะ" ;
    	}else if(check_view_officer_type == 'level'){
    		officer_type = "ระดับปฏิบัติการ" ;
    	}

    	let text_watching_officer_type ;
    	let class_level ;

    	if(check_view_officer_data == 'all'){
    		text_watching_officer_type = 'ทั้งหมด' ;
    		class_level = "text-dark";
    	}else if(check_view_officer_data == 'Standby'){
    		text_watching_officer_type = 'พร้อมช่วยเหลือ' ;
    		class_level = "text-success";
    	}else if(check_view_officer_data == 'Helping'){
    		text_watching_officer_type = 'กำลังช่วยเหลือ' ;
    		class_level = "text-warning";
    	}else{
    		text_watching_officer_type = check_view_officer_data ;
    		class_level = "text-info";
    	}

    	if(text_watching_officer_type == "FR"){
			class_level = "text-success";
		}else if(text_watching_officer_type == "ALS"){
			class_level = "text-danger";
		}else if(text_watching_officer_type == "ILS" || text_watching_officer_type == "BLS"){
			class_level = "text-warning";
		}

		if(class_level){
			document.querySelector('#watching_officer_data').setAttribute('class' , class_level);
		}

		document.querySelector('#watching_officer_type').innerHTML = officer_type;
    	document.querySelector('#watching_officer_data').innerHTML = text_watching_officer_type;
    	document.querySelector('#watching_officer_count').innerHTML = watching_officer_count;
    }

	// ซ่อน div
	let status_show_div_left = "show" ;
	let status_show_div_right = "show" ;

	function hide_or_show_Div(type , left_or_right) {
	    let divDataLeft = document.getElementById('div_data_left');
	    let divDataRight = document.getElementById('div_data_right');

	    let btn_left = document.querySelector('#btn_hide_or_show_Div_left');
	    let icon_left = document.querySelector('#icon_hide_or_show_Div_left');

	    let btn_right = document.querySelector('#btn_hide_or_show_Div_right');
	    let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

	    if(left_or_right == "left" && lock_div_left == "No"){

	    	status_show_div_left = type ;

	    	if(type == "show"){
		    	btn_left.setAttribute('onclick' , "hide_or_show_Div('hide' , 'left');");
		    	// divDataLeft.style.left = '5px';
		    	divDataLeft.classList.add('active_div_data_left');
		    	divDataLeft.classList.remove('Inactive_div_data_left');
		    	icon_left.setAttribute('class' , "fa-solid fa-chevrons-left");
		    	func_check_dragstart_map();
		    }else{
		    	btn_left.setAttribute('onclick' , "hide_or_show_Div('show' , 'left');");
		    	// divDataLeft.style.left = '-350px';
		    	divDataLeft.classList.remove('active_div_data_left');
		    	divDataLeft.classList.add('Inactive_div_data_left');
		    	icon_left.setAttribute('class' , "fa-solid fa-chevrons-right");
		    }
	    }else if(left_or_right == "right" && lock_div_right == "No"){

	    	status_show_div_right = type ;

	    	if(type == "show"){
		    	btn_right.setAttribute('onclick' , "hide_or_show_Div('hide' , 'right');");
		    	// divDataRight.style.right = '5px';
		    	divDataRight.classList.add('active_div_data_right');
		    	divDataRight.classList.remove('Inactive_div_data_right');
		    	icon_right.setAttribute('class' , "fa-solid fa-chevrons-right");
		    	func_check_dragstart_map();
		    }else{
		    	btn_right.setAttribute('onclick' , "hide_or_show_Div('show' , 'right');");
		    	// divDataRight.style.right = '-310px';
		    	divDataRight.classList.remove('active_div_data_right');
		    	divDataRight.classList.add('Inactive_div_data_right');
		    	icon_right.setAttribute('class' , "fa-solid fa-chevrons-left");
		    }
	    }
	    
	}

	let lock_div_left = "No" ;
	let lock_div_right = "No" ;

	function lock_or_unlock(type , left_or_right){

		// console.log(type + " >> DIV : " + left_or_right);

		let btn_lock_div_left = document.querySelector('#btn_lock_div_left');
		let btn_lock_div_right = document.querySelector('#btn_lock_div_right');

	    let icon_left = document.querySelector('#icon_hide_or_show_Div_left');
	    let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

	    let icon_lock_left = document.querySelector('#icon_lock_or_unlock_Div_left');
	    let icon_lock_right = document.querySelector('#icon_lock_or_unlock_Div_right');

		if(type == "lock"){

			if(left_or_right == "left"){

				lock_div_left = "Yes";

				if(status_show_div_left == "show"){
					icon_left.setAttribute('class' , "fa-duotone fa-chevrons-left");
				}else{
					icon_left.setAttribute('class' , "fa-duotone fa-chevrons-right");
				}

				icon_left.setAttribute('style' , "--fa-primary-color: #bababa; --fa-secondary-color: #bababa;");
				icon_lock_left.setAttribute('class' , "fa-solid fa-lock");
				btn_lock_div_left.setAttribute('onclick' , "lock_or_unlock('unlock' , 'left');");

			}else if(left_or_right == "right"){

				lock_div_right = "Yes";

				if(status_show_div_right == "show"){
					icon_right.setAttribute('class' , "fa-duotone fa-chevrons-right");
				}else{
					icon_right.setAttribute('class' , "fa-duotone fa-chevrons-left");
				}

				icon_right.setAttribute('style' , "--fa-primary-color: #bababa; --fa-secondary-color: #bababa;");
				icon_lock_right.setAttribute('class' , "fa-solid fa-lock");
				btn_lock_div_right.setAttribute('onclick' , "lock_or_unlock('unlock' , 'right');");

			}

		}else if(type == "unlock"){

			if(left_or_right == "left"){

				lock_div_left = "No" ;

				if(status_show_div_left == "show"){
					icon_left.setAttribute('class' , "fa-solid fa-chevrons-left");
				}else{
					icon_left.setAttribute('class' , "fa-solid fa-chevrons-right");
				}

				icon_left.setAttribute('style' , "");
				icon_lock_left.setAttribute('class' , "fa-solid fa-lock-keyhole-open");
				btn_lock_div_left.setAttribute('onclick' , "lock_or_unlock('lock' , 'left');");

			}else if(left_or_right == "right"){

				lock_div_right = "No";

				if(status_show_div_right == "show"){
					icon_right.setAttribute('class' , "fa-solid fa-chevrons-right");
				}else{
					icon_right.setAttribute('class' , "fa-solid fa-chevrons-left");
				}

				icon_right.setAttribute('style' , "");
				icon_lock_right.setAttribute('class' , "fa-solid fa-lock-keyhole-open");
				btn_lock_div_right.setAttribute('onclick' , "lock_or_unlock('lock' , 'right');");

			}

		}

	}

	// เมนูฝั่งขวา
	let active_menu_div_right = 'area' ;

	function click_menu_div_right(menu){
		// console.log(menu);
		active_menu_div_right = menu ;

		document.querySelector('#icon_view_div_data_area').classList.remove('text-success');
		document.querySelector('#icon_view_div_data_gotohelp').classList.remove('text-success');
		document.querySelector('#icon_view_div_data_officer').classList.remove('text-success');

		document.querySelector('#icon_view_div_data_area').classList.add('text-secondary');
		document.querySelector('#icon_view_div_data_gotohelp').classList.add('text-secondary');
		document.querySelector('#icon_view_div_data_officer').classList.add('text-secondary');

		document.querySelector('#icon_view_div_data_'+menu).classList.add('text-success');
		document.querySelector('#icon_view_div_data_'+menu).classList.remove('text-secondary');

		document.querySelector('#menu_div_right_'+menu).click();

		if(status_show_div_right != 'show'){
			document.querySelector('#btn_hide_or_show_Div_right').click();
		}

	}

	// เช็คการแสดงผลข้อมูลฝั่ง OFFICER
	function main_check_view_officer(){
    	// console.log("check_view_area_all_or_district >> " + check_view_area_all_or_district) ;
    	// console.log("check_view_officer_type >> " + check_view_officer_type) ;
    	// console.log("check_view_officer_data >> " + check_view_officer_data) ;

    	// เลือกอำเภอหรือพิ้นที่ทั้งหมด
    	if(check_view_area_all_or_district == 'district'){
    		open_map_district();
    	}else{
    		open_map_show_data_officer_area();
    	}

	}

	// สร้างเนื้อหา infowindow ของเจ้าหน้าที่
	function create_content_infowindow(photo_user , name_officer , focus_markerIndex){
		let contentString = `
	        <div id="infowindow_user_id_`+focus_markerIndex+`" style="width: auto; height: auto;">
		    	<div>
		    		<center>
		    		<img src="`+photo_user+`" class="rounded-circle" style="width:45px;height:45px;">
		    		</center>
		    		<br>
		    		<h6 style="margin-top:10px;"><b>`+name_officer+`</b></h6>
		    	</div>
		    </div>
	    `;

	    return contentString ;
	}

	// สร้างเนื้อหา officer ใส่ใน DIV ด้านขวา
	function create_content_div_right(photo_user , name_officer , focus_markerIndex , level , vehicle , unit , count_case , type_div){

		let class_level ;

		if(level == "FR"){
			class_level = "text-success";
		}else if(level == "ALS"){
			class_level = "text-danger";
		}else{
			class_level = "text-warning";
		}

		if(!count_case){
			count_case = 0 ;
		}

		let html_div_right = `
	        <div show_name="div_show_name_officer" class="" id="div_right_`+type_div+`_`+focus_markerIndex+`" level="`+level+`" style="width: auto; height: auto;" onmouseover="focus_infowindow_officer('`+photo_user+`' , '`+name_officer+`' , `+focus_markerIndex+`);">
			    <div class="row">
			        <div class="col-2">
			            <img src="`+photo_user+`" class="rounded-circle" style="width:45px;height:45px; margin: 0 auto; text-align: center">
			        </div>
			        <div class="col-10">
			            <h6 style="margin-top:10px;"><b>`+name_officer+`</b></h6>
			        </div>
			        <div class="col-12 mt-2">
			        	<span class="float-start">
			        		ระดับ : <b class="`+class_level+`">`+level+`</b> | <b>`+vehicle+`</b>
			        	</span>
			        </div>
			        <div class="col-12 mt-1">
			        	<span class="float-start">
			        		ปฏิบัติการ : <b>`+count_case+`</b> เคส
			        	</span>
			        </div>
			        <div class="col-12 mt-1">
			        	<span class="float-start">
			        		หน่วย : `+unit+`
			        	</span>
			        </div>
			    </div>
				<hr>
			</div>
	    `;

	    return html_div_right ;
	}

	// focus DIV ด้านขวาตามที่มีการกดหมุดในแมพ
	function focus_officer_div_right(focus_markerIndex , type_div){

		console.log("type_div >> " + type_div);

		let div_card_focus_all = document.querySelectorAll('div[class="card_focus"]');
			div_card_focus_all.forEach(card_item => {
				card_item.classList.remove('card_focus');
			})

		let div_fosuc = document.querySelector('#div_right_' + type_div + "_" + focus_markerIndex);

		setTimeout(function() {
		    // ถ้าหากมี div ที่ตรงกับ id ที่กรอก
		    if (div_fosuc) {
		      	// ทำการเลื่อนไปยังตำแหน่งของ div นั้นๆ
		      	div_fosuc.scrollIntoView({ behavior: 'smooth' });

		      	div_fosuc.classList.add('card_focus');

	            const animated = document.querySelector('.card_focus');
	            animated.onanimationend = () => {
	                div_fosuc.classList.remove('card_focus');
	            };

		    } else {
		      	// หากไม่พบ div ที่ตรงกับ id ที่กรอก
		      	alert('ไม่พบ ข้อมูลที่ค้นหา');
		    }
		}, 500);

	}

    let check_view_focus_infowindow = 'Yes' ;

    function change_check_view_focus_infowindow(){

    	let icon = document.querySelector('#icon_change_check_view_focus_infowindow'); 

    	if(check_view_focus_infowindow == 'Yes'){
    		// เดิม "เปิด" อยู่
    		check_view_focus_infowindow = 'No';
    		icon.setAttribute('class' , 'fa-sharp fa-solid fa-eye-slash');
    		focus_infowindows.close();

    	}else{
    		// เดิม "ปิด" อยู่
    		check_view_focus_infowindow = 'Yes';
    		icon.setAttribute('class' , 'fa-sharp fa-solid fa-eye');

    	}
    }

	let delayTimer;
    let focus_infowindows = new google.maps.InfoWindow();

	// focus DIV ด้านขวาตามที่มีการกดหมุดในแมพ
	function focus_infowindow_officer(photo_user , name_officer , focus_markerIndex){

		// console.log("focus infowindow >> " + focus_markerIndex);

		if(check_view_focus_infowindow == "Yes"){
			clearTimeout(delayTimer);


			delayTimer = setTimeout(function() {
			    		
				focus_infowindows.close();

		    	let contentString = `
			        <div id="infowindow_user_id_`+focus_markerIndex+`" style="width: auto; height: auto;border: solid red 1px;border-radius: 10px;padding: 10px;">
				    	<div>
				    		<center>
				    		<img src="`+photo_user+`" class="rounded-circle" style="width:45px;height:45px;">
				    		</center>
				    		<br>
				    		<h6 style="margin-top:10px;"><b>`+name_officer+`</b></h6>
				    	</div>
				    </div>
			    `;

				// เซ็ตข้อมูลใน InfoWindow
				focus_infowindows.setContent(contentString);

				focus_infowindows.open(map_show_data_officer_area, markers[focus_markerIndex]);

				show_infowindow();

			}, 200);
		}

	}

	function clear_infowindow(type){
    	
    	if(type == 'close'){

    		// ต้องการปิด infowindow 
    		for (let i = 0; i < infowindows.length; i++) {
		        // ปิด infowindow
		        infowindows[i].close();
		    }

		    // เคลียข้อมูลที่เก็บว่าอันไหนเปิดอยู่
		    arr_infowindow_officer = [] ;

    	}else if(type == 're_marker'){

			// เลือกเจ้าหน้าที่ใหม่ หรือ รีข้อมูล
    		for (let i = 0; i < infowindows.length; i++) {
    		
	    		// เช็คอันไหนเปิดอยู่
	    		if (infowindows[i].getMap()) {
		            // console.log('Infowindow ' + i + ' ถูกเปิด');
	    			arr_infowindow_officer.push(infowindows[i]['user_id']);
		        }

		        // ปิด infowindow
		        infowindows[i].close();

		    }

    	}

    	active_infowindow = "No" ;
		document.querySelector('#show_btn_clear_infowindow').classList.add('d-none');
    }

    function show_infowindow(){
    	active_infowindow = "Yes" ;
		document.querySelector('#show_btn_clear_infowindow').classList.remove('d-none');
    }

    // เลือกระดับ DIV ด้านขวา
    function func_select_area_and_level(){

    	let select_level = document.querySelector('#select_level').value;
    	// console.log(select_level);

    	let div_show_name_officer = document.querySelectorAll('div[show_name="div_show_name_officer"]');
			
			div_show_name_officer.forEach(div_item => {

				if(select_level == 'all'){

					div_item.classList.remove('d-none');

				}else{

					let check_level = div_item.getAttribute('level');
				    // console.log(check_level);
				    if(check_level != select_level){
				    	div_item.classList.add('d-none');
				    }else{
				    	div_item.classList.remove('d-none');
				    }

				}

			})

    }


	// <!-- ****** LOOP GET DATA ****** -->
    let get_data_officer_all ;

    function loop_get_data_officer_all() {

		get_data_officer_all = setInterval(function() {

		// console.log("check_view_officer_or_sos >> " + check_view_officer_or_sos) ;
    	// console.log("check_view_area_all_or_district >> " + check_view_area_all_or_district) ;
    	// console.log("check_view_officer_type >> " + check_view_officer_type) ;
    	// console.log("check_view_officer_data >> " + check_view_officer_data) ;
    	// console.log("check_view_type_sos >> " + check_view_type_sos) ;
			
		// data officer all
    	fetch("{{ url('/') }}/api/get_data_officer_all/" + "{{ $area }}")
	        .then(response => response.json())
	        .then(result_data_officer_all => {
	            // console.log('GET NEW DATA');
	            // console.log('--------------');
	            // console.log(result_data_officer_all);

	            for (let i = 0; i < markers.length; i++) {
			        markers[i].setMap(null);
			    }
			    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด


	            data_officer_all = result_data_officer_all ;

	            if(check_view_officer_or_sos == 'officer'){
	            	setTimeout(function() {
		            	view_officer_select(check_view_officer_type, check_view_officer_data);
		    		}, 500);
	            }

    		});

	    // sos success all
    	fetch("{{ url('/') }}/api/get_sos_help_center_success/" + "{{ $area }}")
	        .then(response => response.json())
	        .then(result_sos_success_all => {
	            // console.log('GET NEW DATA sos_help_center');
	            // console.log(result_sos_success_all);
	            sos_success_all = result_sos_success_all ;
    			document.querySelector('#count_sos_success').innerHTML = sos_success_all.length ;

    			setTimeout(function() {
	            	if(check_view_officer_or_sos == 'sos'){
	    				btn_view_sos(check_view_type_sos);
	    			}
	    		}, 500);
    			
    		});

		}, 60000);
		// }, 10000);
	}

	function Stop_get_data_officer_all() {
        clearInterval(get_data_officer_all);
    }

	// <!-- CHECK POSITION IN POLYGON -->
	function check_area(lat , lng , polygon) {

        let arr_lat_lng = JSON.parse(polygon);
        
        if (arr_lat_lng !== null) {
            let area_arr = [] ;

            let arr_length = JSON.parse(polygon).length;

            for(z = 0; z < arr_length; z++){
                
                let text_latlng = parseFloat(arr_lat_lng[z]['lat']) + "," + parseFloat(arr_lat_lng[z]['lng']) ;
                    text_latlng = JSON.parse("[" + text_latlng + "]");

                area_arr.push(text_latlng);
            }
            
            if ( inside([ lat, lng ], area_arr) ) {
				// console.log('>> อยู่ในพื้นที่');
				return "Yes" ;
            }else{
				// console.log('>> NO');
				return "No" ;
            }
            
        }

    }

    function inside(point, vs) {

        let x = point[0], y = point[1];
        
        let inside = false;

        for (let i = 0, j = vs.length - 1; i < vs.length; j = i++) {
            let xi = vs[i][0], yi = vs[i][1];
            let xj = vs[j][0], yj = vs[j][1];
            
            let intersect = ((yi > y) != (yj > y))
                && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) inside = !inside;
        }
        // console.log(inside);
        return inside;

    };

	// <!-- SHOW ALL AMPHOE -->
	function show_all_amphoe(){
    	fetch("{{ url('/') }}/api/get_polygon_all_amphoe")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            let polygon_all_amphoe = [] ;
	            let iiii = 0 ;
	            for(let item of result){

	            	// let randomColor = getRandomHexColor();
	            	let randomColor = '#008450';

		            // สร้าง Polygon ใหม่
		            polygon_all_amphoe[iiii] = new google.maps.Polygon({
		                paths: JSON.parse(item['polygon']),
		                strokeColor: randomColor,
		                strokeOpacity: 1,
		                strokeWeight: 1,
		                fillColor: randomColor,
		                fillOpacity: 0.5,
		            });

		            // กำหนดให้ Polygon ใหม่แสดงบนแผนที่
		            polygon_all_amphoe[iiii].setMap(map_show_data_officer_area);

		            // mouseover on polygon
                    google.maps.event.addListener(polygon_all_amphoe[iiii], 'click', function (event) {
                        
                        // console.log(item.amphoe_name);

                    });

		            iiii = iiii + 1 ;

	            }

	        });
    }

    function getRandomHexColor() {
	    // สร้างค่าสีแบบ RGB แบบสุ่ม
	    var r = Math.floor(Math.random() * 256);
	    var g = Math.floor(Math.random() * 256);
	    var b = Math.floor(Math.random() * 256);

	    // แปลงค่า RGB เป็นสี Hex
	    var hex = "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);

	    return hex;
	}

	function componentToHex(c) {
	    var hex = c.toString(16);
	    return hex.length == 1 ? "0" + hex : hex;
	}
</script>

@endsection('content')
