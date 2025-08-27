
<!doctype html>
<html lang="en" id="html_class">


<head>

	<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- loader-->
	<link href="{{ asset('partner_new/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('partner_new/js/pace.min.js') }}"></script>



	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('partner_new/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('partner_new/plugins/notifications/css/lobibox.min.css') }}" />
	<link href="{{ asset('/partner_new/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- izitoast -->
	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>


	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('partner_new/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/header-colors.css') }}" />
	<!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('/partner/fonts/fontawesome/css/fontawesome-all.min.css') }}">
 	<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

	<!-- carousel -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;400&family=Taviraj&display=swap" rel="stylesheet">
    <!-- datatables -->

	<title id="title_theme">Partner Viicheck</title>

	<style>
		.main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
        .main-radius{
            border-radius: 5px;
        }

        .profile-circle {
            width: 75px; /* ปรับขนาดตามที่คุณต้องการ */
            height: 75px; /* ปรับขนาดตามที่คุณต้องการ */
            object-fit: cover; /* ปรับขนาดภาพให้เต็มพื้นที่องค์ประกอบ */
            border-radius: 50%; /* ทำให้รูปเป็นวงกลม */
            border-style: solid;
            border-width: 3px;
            border-color: lightblue;
        }

		.notify_alert{
          animation-name: notify_alert;
          color: red;
          animation-duration: 4s;
          animation-iteration-count: 99;
        }

        .notify_alert_gotohelp{
          animation-name: notify_alert_gotohelp;
          color: #ffffff;
          background-color: red;
          animation-duration: 4s;
          animation-iteration-count: 99;
        }

        a.disabled {
		  pointer-events: none;
		  cursor: default;
		  opacity: 0.2;
		}

		.main-disabled {
		  pointer-events: none;
		  cursor: default;
		  opacity: 0.4;
		}

        @keyframes notify_alert {
          0%   {color: red;}
          20%  {color: yellow;}
          40%  {color: red;}
          60% {color: yellow;}
          80%   {color: red;}
          100%  {color: yellow;}

        }

        @keyframes notify_alert_gotohelp {
          0%   {background-color: red;
          		color: #ffffff;}
          20%  {background-color: yellow;
          		color: #000000;}
          40%  {background-color: red;
          		color: #ffffff;}
          60% {background-color: yellow;
          		color: #000000;}
          80%   {background-color: red;
          		color: #ffffff;}
          100%  {background-color: yellow;
          		color: #000000;}

        }

		.bg-color-progressbar {
		  animation-name: change-color;
		  animation-duration: 10s;
		  animation-timing-function: linear;
		  animation-iteration-count: infinite;
		  background-color: green;
		  animation-play-state: running;
		}

		@keyframes change-color {
		  0% {background-color: green;}
		  30% {background-color: yellow;}
		  50% {background-color: orange;}
		  100% {background-color: red;}
		}

		.border-color-change-color {
		  animation-name: change-color-border;
		  animation-duration: 10s;
		  animation-timing-function: linear;
		  animation-iteration-count: infinite;
		  border-width: 2px;
		  border-style: solid;
		  border-radius: 20px;
		  border-color: green;
		  animation-play-state: running;
		}

		@keyframes change-color-border {
		  0% {border-color: green;}
		  30% {border-color: yellow;}
		  50% {border-color: orange;}
		  100% {border-color: red;}
		}

		.iziToast_forward {
		  	border: 10px solid yellow;
		  	animation: change-bordercolors;
		  	animation-play-state: running;
		  	animation-duration: 10s;
		  	animation-timing-function: linear;
		  	animation-iteration-count: infinite;
		  	background-image: url("https://www.viicheck.com/img/icon/sos_warning.gif") !important;
		}

		@keyframes change-bordercolors {
		  0% { border-color: yellow; }
		  10% { border-color: red; }
		  20% { border-color: yellow; }
		  30% { border-color: red; }
		  40% { border-color: yellow; }
		  50% { border-color: red; }
		  60% { border-color: yellow; }
		  70% { border-color: red; }
		  80% { border-color: yellow; }
		  90% { border-color: red; }
		  100% { border-color: yellow; }
		}
		.userSosWait {
			-webkit-transition: all 0.2s;
			-o-transition: all 0.2s;
			transition: all 0.2s;
			padding: .5rem;

		}

		.userSosWait:hover {
			background-color: #f8f9fa;
			border-radius: 10px;
			margin-top: -.25rem;
			margin-bottom: .25rem;
			-webkit-box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.2);
			box-shadow: 0 0.25rem 0.5rem 0 rgba(0, 0, 0, 0.2);
		}.btnSosWait{
			outline: 1px solid #dee2e6;
			border-radius: .375rem;
			background-color: #fff;
			padding:  .5rem 1rem;
			color: #2b2a2a;
			font-family: 'Mitr', sans-serif;
			transition: all .15s ease-in-out;


		}
		.btnSosWait:hover{
			border: 1px solid #dee2e6;
			background-color: #2b2a2a;
			color: #fff;
			outline-offset: .1rem;

		}
	</style>
</head>

@php
	$data_partner = App\Models\Sos_partner::where('id' , Auth::user()->organization_id)->first();

    if($data_partner !== null){
        $color_navbar = $data_partner->color_navbar ;
        $class_color_menu = $data_partner->class_color_menu ;
    }else{
        $color_navbar = '#ffffff';
        $class_color_menu = '#ffffff';
    }
@endphp

<body>
<!--wrapper-->
<div class="wrapper">
	<!--sidebar wrapper -->
	<div id="switcher-wrapper_menu" class="sidebar-wrapper menu-background" data-simplebar="true" style="background-color: {{ $class_color_menu }};">
		<div id="header-wrapper_menu" class="sidebar-header menu-background" style="background-color: {{ $class_color_menu }};">
                <div>
                    <a href="{{ url('/partner_index') }}" >
                        <h4 id="h4_name_partner" class="logo-text" style="font-family: 'Baloo Bhaijaan 2', cursive;
                        font-family: 'Prompt', sans-serif;">{{ Auth::user()->organization }}</h4>
                    </a>
                    <span class="d-none" id="span_sub_partner" style="margin-left: 5px;"></span>
                </div>
            <div class="toggle-icon ms-auto">
                <i class='bx bx-first-page'></i>
            </div>
		</div>
		<!--navigation-->
		<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">

			<!-- Admin -->
			@if(Auth::check())
                @if(Auth::user()->role == "admin-partner")

                    <li>
                        <a href="timeline.html">
                            <div class="parent-icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="has-arrow">
                            <div class="parent-icon">
                                <i class="fa-duotone fa-sitemap"></i>
                            </div>
                            <div class="menu-title">การจัดการองค์กร</div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ url('/manage_organization') }}">
                                	<i class="fa-duotone fa-sitemap"></i> ข้อมูลองค์กร
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/manage_group_line_organization') }}">
                                	<i class="fa-brands fa-line"></i> กลุ่มไลน์
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/manage_sos_area') }}">
                                	<i class="fa-solid fa-map-location-dot"></i> พื้นที่ SOS
                                </a>
                            </li>
                        </ul>
                    </li>

					<li>
						<a href="#" class="has-arrow">
							<div class="parent-icon"><i class="fas fa-user-shield"></i>
							</div>
							<div class="menu-title">การจัดการผู้ใช้</div>
						</a>
						<ul>
							<li>
								<a href="{{ url('/manage_user_partner') }}"><i class='fas fa-users-cog'></i> สมาชิก</a>
							</li>
						</ul>
					</li>
				@endif
			@endif
			<!-- Admin -->

            <!-- Dashboard Partner -->
            @if(Auth::check())
                @if(Auth::user()->role == "admin-partner" and Auth::user()->organization != "สพฉ")
                <li id="div_ll_Dashboard" class="d-none">
                    <a href="#" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('/dashboard_index#dashboard_user') }}"><i class='fas fa-users-cog'></i>User</a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard_index#dashboard_viisos') }}"><i class='fas fa-siren-on'></i>ViiSOS</a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard_index#dashboard_viinews') }}"><i class="fa-solid fa-newspaper"></i>ViiNews</a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard_index#dashboard_viimove') }}"><i class="fa-duotone fa-car"></i>ViiMove</a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard_index#dashboard_boardcast') }}"><i class='fas fa-bullhorn'></i>Broadcast</a>
                        </li>
                    </ul>
                </li>
                @endif
            @endif

			<!-- care move sos -->
			@if(Auth::check())
				@if( Auth::user()->role == "admin-partner" or Auth::user()->role == "partner" )
                    <!-- Vii SOS -->
                    <li class="main-submenu">
                        <a href="#" class="has-arrow">
                            <div class="parent-icon"><i class="fas fa-siren-on"></i>
                            </div>
                            <div class="menu-title">Vii SOS</div>
                        </a>
                        <ul >
                            <li>
                                <a href="{{ url('/sos_partner') }}" data-submenu="{{ url('/sos_detail_partner') }}" data-submenu-2="{{ url('/sos_score_helper') }}" data-submenu-have-id="{{ url('/score_helper') }}/"class="d-block sub-menu">
                                    <i class='fas fa-hands-helping'></i>

                                    <span id="div_menu_help_1">
                                        ให้ความช่วยเหลือ
                                    </span>

                                    <span id="div_menu_help" class="d-none">
                                        <i  class="fas fa-exclamation-circle notify_alert float-end mt-1"></i>
                                    </span>
                                </a>
                            </li>

                            @if(Auth::check())
                                @if(Auth::user()->role == "admin-partner")
									<li>
										<a href="{{ url('/sos_map_title') }}"><i class="fa-solid fa-list-ol"></i>
										หัวข้อขอความช่วยเหลือ</a>
									</li>
                                @endif
                            @endif
                        </ul>
                    </li>
                    <!-- Vii SOS -->

                    <!-- Vii Repair -->
                    <li class="main-submenu">
                        <a href="#" class="has-arrow">
                            <div class="parent-icon">
                                <i class="fa-regular fa-screwdriver-wrench"></i>
                            </div>
                            <div class="menu-title">Vii Repair</div>
                        </a>
                        <ul >
                            <li>
                                <a href="{{ url('/sos_partner') }}" data-submenu="{{ url('/sos_detail_partner') }}" data-submenu-2="{{ url('/sos_score_helper') }}" data-submenu-have-id="{{ url('/score_helper') }}/"class="d-block sub-menu">
                                    <i class="fa-regular fa-screwdriver-wrench"></i>

                                    <span id="div_menu_help_1">
                                        Repair
                                    </span>

                                    <span id="div_menu_help" class="d-none">
                                        <i  class="fas fa-exclamation-circle notify_alert float-end mt-1"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Vii Repair -->

					<!-- ViiMove -->
					<li>
						<a href="#" class="has-arrow">
							<div class="parent-icon"><i class="fas fa-car-crash"></i>
							</div>
							<div class="menu-title">Vii Move</div>
						</a>
						<ul>
							<li> <a href="{{ url('/register_cars_partner') }}"><i class='fas fa-car'></i> รถลงทะเบียน</a>
							</li>
							<li> <a href="{{ url('/guest_partner') }}"><i class="fas fa-file-signature"></i> รถที่ถูกรายงาน</a>
							</li>
							<li> <a href="{{ url('/partner_guest_latest') }}"><i class="fas fa-history"></i> รถที่ถูกรายงานล่าสุด</a>
							</li>
						</ul>
					</li>
					<!-- ViiMove -->

                    <!-- ViiNews Broadcast -->
                    <!-- ใหม่ -->
                    <li id="div_menu_Broadcast" class="d-">
                        <a class="has-arrow" href="javascript:;" >
                            <div class="parent-icon"><i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="menu-title">Broadcast (LINE) </div>
                        </a>



                        <ul class="mm-collapse " style="">
                            <li>
                                <a id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}">
                                    <i class='fas fa-users-cog'></i> Dashboard
                                </a>
                            </li>

                            <!--check in  -->
                            <li class="">
                                <a class="has-arrow" href="javascript:;">
                                    <i class="bx bx-right-arrow-alt"></i>by Checkin
                                </a>
                                <ul class="mm-collapse " style="">
                                    <li >
                                        <li class="div-tooltip">
                                            <a id="li_menu_Check_in" class="" href="{{ url('/broadcast/broadcast_by_check_in') }}">
                                            <i class="fas fa-map-marker-check"></i> Boardcast Checkin
                                            </a>
                                            <span id="tip_check_in" class="tooltip d-none" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
                                                    โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
                                                    <a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
                                            </span>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            <!-- check in -->

                            <!-- User -->
                            <li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by User</a>
                                <ul class="mm-collapse " style="">
                                    <li class="">
                                        <!-- <li class="div-tooltip">
                                            <a  href="#" class="disabled">
                                                <i class='fas fa-users-cog'></i> Dashboard User
                                            </a>
                                            <span class="tooltip" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
                                            </span>
                                        </li> -->
                                        <li class="div-tooltip">
                                            <a id="li_menu_User" class="" href="{{ url('/broadcast/broadcast_by_user') }}">
                                                <i class='fas fa-users-cog'></i> Boardcast User
                                            </a>
                                            <span id="tip_user" class="tooltip d-none" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
                                                    โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
                                                    <a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
                                            </span>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            <!-- User -->

                            <!-- Cars -->
                            <li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by Cars</a>
                                <ul class="mm-collapse " style="">
                                    <li class="">
                                        <!-- <li class="div-tooltip">
                                            <a href="#"class="disabled">
                                                <i class='fas fa-users-cog'></i> Dashboard Cars

                                            </a>
                                            <span class="tooltip" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
                                            </span>
                                        </li> -->
                                        <li class="div-tooltip">
                                            <a id="li_menu_Car" class="" href="{{ url('/broadcast/broadcast_by_car') }}">
                                                <i class="fa-duotone fa-car"></i> Boardcast Cars
                                            </a>
                                            <span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
                                                    โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
                                                    <a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
                                            </span>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            <!-- Cars -->

                            <!-- Sos -->
                            <li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by Sos</a>
                                <ul class="mm-collapse " style="">
                                    <li class="">
                                        <li class="div-tooltip">
                                            <a id="li_menu_Car" class="" href="{{ url('/broadcast/broadcast_by_sos') }}">
                                                <i class='fas fa-siren-on'></i> Boardcast Sos
                                            </a>
                                            <span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
                                                <center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
                                                    โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
                                                    <a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
                                            </span>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            <!-- Sos -->
                        </ul>
                    </li>
                    <!-- ViiNews Broadcast -->

				@endif
			@endif
			<!-- end care move sos -->

			<!-- Other -->
			<li>
				<a href="#" class="has-arrow">
					<div class="parent-icon"><i class="fas fa-braille"></i>
					</div>
					<div class="menu-title">อื่นๆ</div>
				</a>
				<ul>
					<li>
                        <a href="{{ url('/how_to_use') }}">
                            <i class='fad fa-book'></i> วิธีใช้งาน
                        </a>
					</li>
					<li>
                        <a href="{{ url('/partner_media?menu=all') }}">
                            <i class="fas fa-photo-video"></i> สื่อประชาสัมพันธ์
                        </a>
					</li>
					<li>
                        <a href="{{ url('/problem_report') }}">
                            <i class="fa-solid fa-message-exclamation"></i> แจ้งปัญหาการใช้งาน
                        </a>
					</li>
				</ul>
			</li>
			<!-- Other -->
			<br>

		</ul>
		<!--end navigation-->
	</div>
	<!--end sidebar wrapper -->

	<!--start header -->
	<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
		<div id="div_color_navbar" class="topbar d-flex align-items-center header_nav-background" style="background-color: {{ $color_navbar }};">
			<nav class="navbar navbar-expand d-flex">
				<div class="mobile-toggle-menu">
					<i class='bx bx-menu'></i>
				</div>
				<div class="top-menu-left d-none d-lg-block">
					<ul class="nav">
					  	<li class="nav-item">
							<a class="nav-link" href="tel:020277856">
								<i class='bx bx-phone'></i>
                        	</a>
					  	</li>
                      	<li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                        	<a class="nav-link" href="tel:020277856">
                            	<span  style="font-size:15px;margin-top:15px;">02-0277856</span>
                        	</a>
					  	</li>
					  	<li class="nav-item">
							<a class="nav-link" href="mailto:contact.viicheck@gmail.com">
								<i class='bx bx-envelope'></i>
                        	</a>
					  	</li>
                      	<li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                        	<a class="nav-link" href="mailto:contact.viicheck@gmail.com">
                            	<span style="font-size:15px;">contact.viicheck@gmail.com</span>
                        	</a>
					  	</li>
				  	</ul>
			 	</div>

				
                <div class="containerStatusofficer ms-auto">
                    <div class="tabsStatusOfficer">
                        <!-- ปุ่ม modal -->
                    </div>
                </div>

				<div class="search-bar flex-grow-1 header-notifications-list header-message-list">
					<div class="position-relative search-bar-box">
						<input type="text" class="form-control search-control" placeholder="Type to search...">
                        <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
						<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
					</div>
				</div>

				<div class="user-box dropdown">
					<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    	@if(!empty(Auth::user()->photo))
                            <img alt="" style="width:60px;" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ Auth::user()->photo }}" data-original-title="Usuario">
                        @else
                            <img src="{{ asset('/partner/images/user/avatar-1.jpg') }}" style="width:60px;" class="img-radius" alt="User-Profile-Image">
                        @endif
						<div class="user-info ps-3">
							<p class="user-name mb-0" style="max-width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                {{ Auth::user()->name }}
                            </p>
							<p class="designattion mb-0">
								@switch(Auth::user()->role)
                                    @case('partner')
                                        เจ้าหน้าที่
                                    @break
                                    @case('admin-partner')
                                        แอดมิน
                                    @break
                                    @case('admin-condo')
                                        แอดมิน
                                    @break
                                @endswitch
							</p>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--end header -->

	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content" style="margin-top:-25px;">
			<br>
		  	@yield('content')
		</div>
	</div>
	<!--end page wrapper -->

	<!--start overlay-->
	<div class="overlay toggle-icon"></div>
	<!--end overlay-->
	<!--Start Back To Top Button--> 
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	<!--End Back To Top Button-->
</div>
<!--end wrapper-->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://unpkg.com/izitoast/dist/js/iziToast.min.js'></script>
<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('partner_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/highcharts.js') }}"></script>
<script src="{{ asset('partner_new/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/exporting.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/variable-pie.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/export-data.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/accessibility.js') }}"></script>
<script src="{{ asset('partner_new/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- <script src="{{ asset('partner_new/js/index.js') }}"></script> -->
<!--app JS-->
<script src="{{ asset('partner_new/js/app.js') }}"></script>

<!--notification js -->
<script src="{{ asset('partner_new/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/notifications/js/notification-custom-script.js') }}"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script> -->



<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
    });

    
</script>




</body>

</html>
