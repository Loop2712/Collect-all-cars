
<!doctype html>
<html lang="en" id="html_class">


<head>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('partner_new/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/js/pace.min.js') }}"></script>
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
 	<link href="https://kit-pro.fontawesome.com/releases/v6.0.0/css/pro.min.css" rel="stylesheet">
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

	<title>Partner Viicheck</title>

	<style>
		.main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
        .main-radius{
            border-radius: 5px;
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

	</style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div id="switcher-wrapper_menu" class="sidebar-wrapper menu-background" data-simplebar="true">
			<div id="header-wrapper_menu" class="sidebar-header menu-background">
                    <div>
                        <a href="{{ url('/partner_index') }}" >
                            <h4 id="h4_name_partner" class="logo-text" style="font-family: 'Baloo Bhaijaan 2', cursive;
                            font-family: 'Prompt', sans-serif;"></h4>
                        </a>
                    </div>
                <div class="toggle-icon ms-auto">
                    <i class='bx bx-first-page'></i>
                </div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
				<!-- Admin -->
				@if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
						<li>
							<a href="#" class="has-arrow">
								<div class="parent-icon"><i class="fas fa-user-shield"></i>
								</div>
								<div class="menu-title">Admin</div>
							</a>
							<ul>
								<li> <a href="{{ url('/manage_user_partner') }}"><i class='fas fa-users-cog'></i> Admin</a>
								</li>
							</ul>
						</li>
					@endif
				@endif
				<!-- Admin -->

				<!-- Broadcast -->
				<!-- ใหม่ -->
				<li id="div_menu_Broadcast" class="d-none">
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
										<a href="#" class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard Checkin
										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li>
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
									<li class="div-tooltip"> 
										<a  href="#" class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard User
										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li>
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
									<li class="div-tooltip">  
										<a href="#"class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard Cars

										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li>
									<li class="div-tooltip"> 
										<a id="li_menu_Car" class="" href="{{ url('/broadcast/broadcast_by_car') }}">
											<i class='fas fa-users-cog'></i> Boardcast Cars
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
					</ul>
				</li>

				<!-- เก่า -->
				<!-- <li id="div_menu_Broadcast" class="d-none">
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="fas fa-bullhorn"></i>
						</div>
						<div class="menu-title">Broadcast <span style="color: green;">LINE</span> </div>
					</a>
					<ul>
						@if(Auth::user()->id == "1")
							<li> <a id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}"><i class='fas fa-users-cog'></i> Dashboard</a>
							</li>
							<li class="div-tooltip"> 
								<a id="li_menu_Check_in" href="{{ url('/broadcast/broadcast_by_check_in') }}"><i class="fas fa-map-marker-check"></i> by Check In</a>
								<span id="tip_check_in" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
										โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ 
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>  
								</span>
							</li>
							<li class="div-tooltip"> 
								<a id="li_menu_User"href="{{ url('/broadcast/broadcast_by_user') }}"><i class="fad fa-users"></i> by User</a>
								<span  id="tip_user" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
									โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ 
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>  
								</span>
							</li>
						@endif
							<li class="div-tooltip"> 
								<a id="li_menu_Cars"href="{{ url('/broadcast/broadcast_by_car') }}"><i class="fad fa-car-bus"></i> by cars</a>
								<span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
									โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ 
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>  
								</span>
							</li>
					</ul>
				</li> -->


				
				<!-- Broadcast -->

				<!-- สำหรับ องค์กร / คอนโด -->
					@if(Auth::check())
						@if(Auth::user()->role == "admin-condo")
							<li>
								<a href="#" class="has-arrow">
									<div class="parent-icon"><i class="fas fa-building"></i>
									</div>
									<div class="menu-title">For Corporation</div>
								</a>
								<ul>
									<li> <a href="{{ url('/sos_partner') }}"><i class='fas fa-hands-helping'></i> ให้ความช่วยเหลือ</a>
									</li>
									<li> <a href="{{ url('/add_area') }}"><i class='far fa-map'></i> พื้นที่บริการ</a>
									</li>
									<li> <a href="{{ url('/parcel') }}"><i class="fas fa-truck-loading"></i> พัสดุ</a>
									</li>
									<li> <a href="{{ url('/notify_repair') }}"><i class="fas fa-tools"></i> แจ้งซ่อม</a>
									</li>
									<li> <a href="{{ url('/cleaning_appointment') }}"><i class="fas fa-broom"></i> นัดหมายทำความสะอาด</a>
									</li>
									<li> <a href="{{ url('/bill_payment') }}"><i class="fas fa-file-invoice-dollar"></i> บิลเรียกชำระ</a>
									</li>
									<li> <a href="{{ url('/news_condo') }}"><i class="fas fa-newspaper"></i> ข่าวสาร</a>
									</li>
									<li> <a href="{{ url('/report_condo') }}"><i class="fas fa-exclamation-circle"></i> การแจ้งปัญหา</a>
									</li>
									<li> <a href="{{ url('/report_condo') }}"><i class="fas fa-tasks"></i> แบบประเมิน</a>
									</li>
								</ul>
							</li>
						@endif
					@endif
				<!-- สำหรับ องค์กร / คอนโด -->

				<!-- ViiCare -->
					<li>
						<a href="#" class="has-arrow">
							<div class="parent-icon"><i class="fas fa-hand-holding-heart"></i>
							</div>
							<div class="menu-title">Vii Care</div>
						</a>
						<ul>
							<li> <a href="{{ url('/check_in/view') }}"><i class="fas fa-map-marker-check"></i> ข้อมูลการเข้าออก</a>
							</li>
							<li> <a href="{{ url('/check_in/add_new_check_in') }}"><i class="fas fa-qrcode"></i> เพิ่มจุด Check in</a>
							</li>
							<li> <a href="{{ url('/check_in/gallery') }}"><i class="far fa-images"></i>คลังภาพ</a>
							</li>
						</ul>
					</li>
				<!-- ViiCare -->

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
							<li> <a href="{{ url('/partner_guest_latest') }}"><i class="fas fa-history"></i>รถที่ถูกรายงานล่าสุด</a>
							</li>
						</ul>
					</li>
				<!-- ViiMove -->

				<!-- Vii SOS -->
					@if(Auth::check())
						@if(Auth::user()->role == "admin-partner" or Auth::user()->role == "partner")
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
											<li> <a href="{{ url('/add_area') }}" data-submenu="{{ url('/service_current') }}" data-submenu-2="{{ url('/service_pending') }}" data-submenu-3="{{ url('/service_area') }}" class="sub-menu"><i class='far fa-map'></i>พื้นที่บริการ</a></li>
										@endif
									@endif

									@if(Auth::user()->organization == "JS100 Radio" or Auth::user()->organization == "2บี กรีน จำกัด")
										<li> 

											<a href="{{ url('/sos_emergency_js100') }}" data-submenu="{{ url('/sos_detail_js100') }}" class="d-block sub-menu">
											<i class="fal fa-siren-on"></i>
												
												<span id="div_menu_help_js100">
													SOS by calling
												</span>
												
												<span id="div_menu_alert_js100" class="d-none">
													<i  class="fas fa-exclamation-circle notify_alert float-end mt-1"></i>
												</span>
											</a>
										</li>
									@endif
								</ul>
							</li>
						@endif
					@endif
				<!-- Vii SOS -->

				<!-- Other -->
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="fas fa-braille"></i>
						</div>
						<div class="menu-title">อื่นๆ</div>
					</a>
					<ul>
						<li> <a href="{{ url('/how_to_use') }}"><i class='fad fa-book'></i> วิธีใช้งาน</a>
						</li>
						<li> <a href="{{ url('/partner_media?menu=all') }}"><i class="fas fa-photo-video"></i> สื่อประชาสัมพันธ์</a>
						</li>
					</ul>
				</li>
				<!-- Other -->

				<br>

				<!------------------------------------------------------------------- menu เก่า ------------------------------------------------------------------->
				<!-- ----------------- Admin -------------------- -->
				<!-- @if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
						<div class="accordion" id="accordion_admin">
					    	<div id="heading_admin">
					    		<a href="#" data-toggle="collapse" data-target="#collapse_admin" aria-expanded="true" aria-controls="collapse_admin">
									<div class="parent-icon">
										<i class="fas fa-user-shield"></i>
									</div>
									<div class="menu-title">
										Admin
										<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
									</div>
								</a>
					    	</div>

					    	<div id="collapse_admin" class="collapse" aria-labelledby="heading_admin" data-parent="#accordion_admin">
					      		<div class="card-body">
					      			<li>
						        		<a href="{{ url('/manage_user_partner') }}#collapse_admin">
											<div class="parent-icon">
												<i class='fas fa-users-cog'></i>
											</div>
											<div class="menu-title">จัดการผู้ใช้</div>
										</a>
									</li>
					      		</div>
					    	</div>
			    			<hr class="text-white">
						</div>
					@endif
				@endif -->
				<!-- ----------------- END Admin -------------------- -->

				<!-- ----------------- Broadcast -------------------- -->
				<!-- <div id="div_menu_Broadcast" class="d-none">
					<div class="accordion" id="accordion_broadcast">
				    	<div id="heading_broadcast">
				    		<a href="#" data-toggle="collapse" data-target="#collapse_broadcast" aria-expanded="true" aria-controls="collapse_broadcast">
								<div class="parent-icon">
									<i class="fas fa-bullhorn"></i>
								</div>
								<div class="menu-title">
									Broadcast Line
									<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
								</div>
							</a>
				    	</div>

				    	<div id="collapse_broadcast" class="collapse" aria-labelledby="heading_broadcast" data-parent="#accordion_broadcast">
				      		<div class="card-body">
				      			@if(Auth::user()->id == "1")
				      			<li>
					      			<a class="" id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fas fa-file-chart-pie"></i>
										</div>
										<div class="menu-title">&nbsp;&nbsp;Dashboard</div>
									</a>
								</li>
								<li>
					      			<a class="" id="li_menu_Check_in" href="{{ url('/broadcast/broadcast_by_check_in') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fas fa-map-marker-check"></i>
										</div>
										<div class="menu-title">&nbsp;&nbsp;By Check in</div>
									</a>
								</li>
								@endif
								<li>
			      					<a class="" id="li_menu_Cars" href="{{ url('/broadcast/broadcast_by_car') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fad fa-car-bus"></i>
										</div>
										<div class="menu-title">By cars</div>
									</a>
								</li>
				      			@if(Auth::user()->id == "1")
								<li>
									<a class="" id="li_menu_User" href="{{ url('/broadcast/broadcast_by_user') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fad fa-users"></i>
										</div>
										<div class="menu-title">By user</div>
									</a>
								</li>
								@endif
				      		</div>
				    	</div>
		    			<hr class="text-white">
					</div>
				</div> -->
				<!-- ---------------- END Broadcast ----------------- -->

				<!-- สำหรับ องค์กร / คอนโด -->
					<!-- @if(Auth::check())
						@if(Auth::user()->role == "admin-condo")

							<div class="accordion" id="accordion_condo">
								<div id="heading_condo">
									<a href="#" data-toggle="collapse" data-target="#collapse_condo" aria-expanded="true" aria-controls="collapse_condo">
										<div class="parent-icon">
											<i class="fas fa-building"></i>
										</div>
										<div class="menu-title">
											For Corporation
											<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
										</div>
									</a>
								</div>

								<div id="collapse_condo" class="collapse" aria-labelledby="heading_condo" data-parent="#accordion_condo">
									<div class="card-body">
										<li>
											<a href="{{ url('/sos_partner') }}#collapse_condo">
												<div class="parent-icon"><i class='fas fa-hands-helping'></i>
												</div>
												<div id="div_menu_help_1" class="menu-title">ให้ความช่วยเหลือ</div>
												<div id="div_menu_help" class="d-none">
													&nbsp;
													<i class="fas fa-exclamation-circle notify_alert"></i>
												</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/add_area') }}#collapse_condo">
												<div class="parent-icon"><i class='far fa-map'></i>
												</div>
												<div class="menu-title">พื้นที่บริการ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/parcel') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-truck-loading"></i>
												</div>
												<div class="menu-title">พัสดุ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/notify_repair') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-tools"></i>
												</div>
												<div class="menu-title">แจ้งซ่อม</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/cleaning_appointment') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-broom"></i>
												</div>
												<div class="menu-title">นัดหมายทำความสะอาด</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/bill_payment') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-file-invoice-dollar"></i>
												</div>
												<div class="menu-title">บิลเรียกชำระ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/news_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-newspaper"></i>
												</div>
												<div class="menu-title">ข่าวสาร</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/report_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-exclamation-circle"></i>
												</div>
												<div class="menu-title">การแจ้งปัญหา</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/report_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-tasks"></i>
												</div>
												<div class="menu-title">แบบประเมิน</div>
											</a>
										</li>
									</div>
								</div>
								<hr class="text-white">
							</div>
						@endif
					@endif -->
				<!-- สิ้นสุด สำหรับ องค์กร / คอนโด -->


				<!-- ---------------- Vii CARE ----------------- -->
				<!-- <div class="accordion" id="accordion_Vii_Care">
			    	<div id="heading_Vii_Care">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_Care" aria-expanded="true" aria-controls="collapse_Vii_Care">
							<div class="parent-icon">
								<i class="fas fa-hand-holding-heart"></i>
							</div>
							<div class="menu-title">
								Vii Care
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Vii_Care" class="collapse" aria-labelledby="heading_Vii_Care" data-parent="#accordion_Vii_Care">
			      		<div class="card-body">
			      			<li>
				        		<a href="{{ url('/check_in/view') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="fas fa-map-marker-check"></i>
									</div>
									<div class="menu-title">ข้อมูลการเข้าออก</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/check_in/add_new_check_in') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="fas fa-qrcode"></i>
									</div>
									<div class="menu-title">เพิ่มจุด Check in</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/check_in/gallery') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="far fa-images"></i>
									</div>
									<div class="menu-title">คลังภาพ</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Vii CARE ----------------- -->

				<!-- ---------------- Vii MOVE ----------------- -->
				<!-- <div class="accordion" id="accordion_Vii_Move">
			    	<div id="heading_Vii_Move">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_Move" aria-expanded="true" aria-controls="collapse_Vii_Move">
							<div class="parent-icon">
								<i class="fas fa-car-crash"></i>
							</div>
							<div class="menu-title">
								Vii Move
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Vii_Move" class="collapse" aria-labelledby="heading_Vii_Move" data-parent="#accordion_Vii_Move">
			      		<div class="card-body">
			      			<li>
				      			<a href="{{ url('/register_cars_partner') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class='fas fa-car'></i>
									</div>
									<div class="menu-title">รถลงทะเบียน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/guest_partner') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class="fas fa-file-signature"></i>
									</div>
									<div class="menu-title">รถที่ถูกรายงาน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/partner_guest_latest') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class="fas fa-history"></i>
									</div>
									<div class="menu-title">รถที่ถูกรายงานล่าสุด</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Vii MOVE ----------------- -->

				<!-- ---------------- Vii SOS ----------------- -->
				<!-- @if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "partner")
						<div class="accordion" id="accordion_Vii_SOS">
					    	<div id="heading_Vii_SOS">
					    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_SOS" aria-expanded="true" aria-controls="collapse_Vii_SOS">
									<div class="parent-icon">
										<i class="fas fa-siren-on"></i>
									</div>
									<div class="menu-title">
										Vii SOS
										<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
									</div>
								</a>
					    	</div>

					    	<div id="collapse_Vii_SOS" class="collapse" aria-labelledby="heading_Vii_SOS" data-parent="#accordion_Vii_SOS">
					      		<div class="card-body">
					      			<li>
						      			<a href="{{ url('/sos_partner') }}#collapse_Vii_SOS">
											<div class="parent-icon"><i class='fas fa-hands-helping'></i>
											</div>
											<div id="div_menu_help_1" class="menu-title">ให้ความช่วยเหลือ</div>
											<div id="div_menu_help" class="d-none">
												&nbsp;
												<i class="fas fa-exclamation-circle notify_alert"></i>
											</div>
										</a>
									</li>
									@if(Auth::check())
					                    @if(Auth::user()->role == "admin-partner")
					                    <li>
											<a href="{{ url('/add_area') }}#collapse_Vii_SOS">
												<div class="parent-icon"><i class='far fa-map'></i>
												</div>
												<div class="menu-title">พื้นที่บริการ</div>
											</a>
										</li>
										@endif
									@endif
									@if(Auth::user()->organization == "JS100 Radio" or Auth::user()->organization == "2บี กรีน จำกัด")
										<li>
											<a href="{{ url('/sos_emergency_js100') }}#collapse_Vii_SOS">
												<div class="parent-icon"><i class="fal fa-siren-on"></i>
												</div>
												<div id="div_menu_help_js100" class="menu-title">SOS by calling</div>
												<div id="div_menu_alert_js100" class="d-none">
													&nbsp;
													<i class="fas fa-exclamation-circle notify_alert"></i>
												</div>
											</a>
										</li>
									@endif
					      		</div>
					    	</div>
			    			<hr class="text-white">
						</div>
					@endif
				@endif -->
				<!-- ---------------- END Vii SOS ----------------- -->

				<!-- ---------------- Other ----------------- -->
				<!-- <div class="accordion" id="accordion_Other">
			    	<div id="heading_Other">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Other" aria-expanded="true" aria-controls="collapse_Other">
							<div class="parent-icon">
								<i class="fas fa-braille"></i>
							</div>
							<div class="menu-title">
								อื่นๆ
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Other" class="collapse" aria-labelledby="heading_Other" data-parent="#accordion_Other">
			      		<div class="card-body">
			      			<li>
				      			<a href="{{ url('/how_to_use') }}#collapse_Other" target="blank">
									<div class="parent-icon"><i class='fad fa-book'></i>
									</div>
									<div class="menu-title">วิธีใช้งาน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/partner_media?menu=all') }}#collapse_Other,javascript:;">
									<div class="parent-icon"><i class="fas fa-photo-video"></i>
									</div>
									<div class="menu-title">สื่อประชาสัมพันธ์</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Other ----------------- -->

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->

		<!--start header -->
		<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
			<div id="div_color_navbar" class="topbar d-flex align-items-center header_nav-background" style="">
				<nav class="navbar navbar-expand ">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu-left d-none d-lg-block">
						<ul class="nav">
						  <li class="nav-item">
							<a class="nav-link" href="tel:020277856"><i class='bx bx-phone'></i>
                            </a>
						  </li>
                          <li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                            <a class="nav-link" href="tel:020277856">
                                <span  style="font-size:15px;margin-top:15px;">02-0277856</span> 
                            </a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="mailto:contact.viicheck@gmail.com"><i class='bx bx-envelope'></i>
                            </a>
						  </li>
                          <li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                            <a class="nav-link" href="mailto:contact.viicheck@gmail.com">
                                <span style="font-size:15px;">contact.viicheck@gmail.com</span>
                            </a>
						  </li>
					  </ul>
					 </div>
					 <div class="search-bar flex-grow-1 header-notifications-list header-message-list">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
					</div>
					 <div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(!empty(Auth::user()->photo))
                                <img alt="" style="width:50px;"class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ Auth::user()->photo }}" data-original-title="Usuario"> 
                            @else
                                <img src="{{ asset('/partner/images/user/avatar-1.jpg') }}" width="25%" class="img-radius" alt="User-Profile-Image">
                            @endif
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
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
			  <button type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#modal_notify">modal</button>
			  <span onclick="check_sos_alarm();" class="btn btn-danger">check_sos_alarm</span>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<!-- <p class="mb-0">Copyright © 2021. All right reserved.</p> -->
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		@if(Auth::check())
            @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
				<div id="div_switcher" class="switcher-btn" onclick="change_color();" style=""> 
					<i class='bx bx-cog bx-spin'></i>
				</div>
			@endif
		@endif
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">เครื่องมือปรับแต่งธีม</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">
				พื้นหลังส่วนหัว
				<i class="fas fa-sync-alt btn" style="float: right;" onclick="random_color();"></i>
			</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator" id="color_item_1"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_2"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_3"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_4"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_5"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_6"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_7"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_8"></div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-5">
								<div style="float: right;" class="indigator" id="color_item_Ex"></div>
							</div>
							<div class="col-7">
								<input style="margin-top:5px;" type="text" class="form-control" id="code_color" name="code_color" placeholder="color code" oninput="add_color_item_Ex();">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">พื้นหลังแถบเมนู</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1" onclick="add_input_color_menu('1')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2" onclick="add_input_color_menu('2')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3" onclick="add_input_color_menu('3')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4" onclick="add_input_color_menu('4')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5" onclick="add_input_color_menu('5')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6" onclick="add_input_color_menu('6')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7" onclick="add_input_color_menu('7')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8" onclick="add_input_color_menu('8')"></div>
					</div>
				</div>
			</div>
			<hr/>
			<hr/>
			<h6 type="button" class="mb-0" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				<i class="fab fa-line text-success" style="font-size: 25px;"></i> ตั้งค่ากลุ่มไลน์
				<a type="button" style="float:right;" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-sort-down"></i>
            </a>
			</h6>
            <div class="collapse" id="collapseExample">
            	<br>
                <ul id="ul_group_line" class="list-group">
                	
				</ul>
            </div>
			<hr/>
		</div>
	</div>
	<!--end switcher-->

	<!-- modal set_group_line -->

	<button id="btn_modal_set_group_line" class="d-none" data-toggle="modal" data-target="#set_group_line">
	</button>

	<div class="modal fade" id="set_group_line" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">
	        	ตั้งค่ากลุ่มไลน์ <b><span id="span_name_line" class="text-info"></span></b>
	        </h5>
	        <button id="btn_close_set_group" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="col-12">
	            <div class="row">
	                <div class="col-12">
	                    <label class="control-label">ชื่อกลุ่มไลน์</label>
	                    <input class="form-control" type="text" name="input_name_group_line" id="input_name_group_line" value="">
	                    <hr>
	                </div>
	                <div class="col-6">
	                    <label id="label_old_language" class="control-label"></label>
	                    <select class="form-control" name="input_language" id="input_language" required>
	                        <option id="old_language" value="" selected>- เลือกภาษา -</option>
	                        <option value="th" >ไทย (th)</option>
	                        <option value="en" >English (en)</option>
	                        <option value="zh-TW" >中國人 (zh-TW)</option>
	                        <option value="ja" >日本 (ja)</option>
	                        <option value="ko" >한국인 (ko)</option>
	                        <option value="es" >Español (es)</option>
	                        <option value="lo" >ພາສາລາວ (lo)</option>
	                        <option value="my" >မြန်မာ (my)</option>
	                        <option value="de" >Deutsch (de)</option>
	                        <option value="hi" >हिन्दी (hi)</option>
	                        <option value="ar" >عربي (ar)</option>
	                        <option value="ru" >русский (ru)</option>
	                        <option value="zh-CN" >中国人 (zh-CN)</option>
	                    </select>
	                </div>
	                <div class="col-6">
	                    <label id="label_old_time_zone" class="control-label"></label>
	                    <select class="form-control" name="input_time_zone" id="input_time_zone" required>
	                        <option id="old_time_zone" value="" selected>- เลือก Time zone -</option>
	                        
	                    </select>
	                </div>
	            </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button id="btn_cf_set" type="button" class="btn btn-info text-white" data-dismiss="modal" >ยืนยัน</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end modal set_group_line -->

    <!-- Button trigger modal -->
	<button id="btn_modal_notify" type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#modal_notify">
	</button>

	<!-- Modal -->
	<div class="modal fade " id="modal_notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    <div class="modal-content">
	      	<div class="modal-header " style="background-color:#D85261;">
	        	<h4 class="modal-title text-white text-center"  id="exampleModalLabel"> <b>แจ้งเตือน<br>การขอความช่วยเหลือ</b> </h4>
				<img width="45%" src="{{ asset('/img/stickerline/PNG/21.png') }}">
	      	</div>
	      	<div class="modal-body text-center" style="padding:0px;">
			  <br>
			  <div class="row">
				  <div class="col-12">
                    <h2 class="text-info"><b id="modal_notify_name">THANAKORN</b>
						<button type="button" class="btn btn-primary text-center d-none" id="btn_modal_notify_img" data-toggle="modal" data-target="#asd" style="border-radius: 50px;">
							<i class="fad fa-images"></i>
						</button>
					</h2>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0"></h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_time"></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0"></h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_phone"></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0"></h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_name_area"></span>
						</li>
					</ul>
				</div>
	      	</div>
	     	<div class="modal-footer">
	     	<button id="btn_go_to_help" type="button" style="border-radius: 25px;" class="btn notify_alert_gotohelp" >
	     		<i class="fa-solid fa-truck-medical"></i> กำลังไปช่วยเหลือ
	     	</button>

	        <button type="button" style="border-radius: 25px; background-color:#408AF4" class="btn text-white" onclick="document.querySelector('#div_menu_help_1').click();"><i class="fal fa-eye"></i>ดูข้อมูล</button>
	        <a id="tag_a_link_ggmap" target="bank" class="btn text-white" style="border-radius: 25px; background-color:#26A664"><i class="far fa-map-marker-alt"></i>ดูแผนที่</a>
	      </div>
	    </div>
	  </div>
	</div>

<div class="modal fade" id="asd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-sm " role="document"style="right: -411px;z-index: 10040;">
    <div class="modal-content">
      <div class="modal-body text-center" style="padding:0px;">
      	<a id="tag_a_modal_notify_img" href="" target="bank">
	        <img src="{{ asset('/img/icon/zoom-in.png') }}" style="position:absolute;right: 10px;bottom: 10px;width: 20px;">
	    </a>
        <img src="" alt="" id="modal_notify_img">
      </div>
    </div>
  </div>
</div>

<input type="text" class="d-none" name="user_organization" id="user_organization" value="{{ Auth::user()->organization }}">
<input id="color_of_partner" type="text" class="d-none" name="" value="">
<input id="class_color_menu" type="text" class="d-none" name="" value="">
<input id="check_name_partner" type="hidden" name="" value="">


<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/highcharts.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/exporting.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/variable-pie.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/export-data.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/accessibility.js') }}"></script>
<script src="{{ asset('partner_new/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
	new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="{{ asset('partner_new/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('partner_new/js/app.js') }}"></script>
<!-- dataTables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


 <!-- src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"> -->





<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // show_menu_bar();
		check_data_partner();
		check_submenu();

		// check_sos_alarm();
	    // check_sos_js100();
	    setInterval(function() {
	    	// เช็ค SOS
	       	check_sos_alarm();
	    	// เช็ค JS100
	       	check_sos_js100();
	    }, 5000);
        
    });

    function check_data_partner()
    {
    	let user_organization = document.querySelector('#user_organization').value ;
    	// console.log(user_organization);

    	fetch("{{ url('/') }}/api/check_data_partner/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result[0]['class_color_menu']);
                let delayInMilliseconds = 200; 

		        setTimeout(function() {
		        	if (result[0]['class_color_menu'] !== "other"){
			    		document.querySelector('#sidebarcolor' + result[0]['class_color_menu'] ).click();
		        	}
		        }, delayInMilliseconds);
                
                document.querySelector('#h4_name_partner').innerHTML = result[0]['name'];
                document.querySelector('#color_of_partner').value = result[0]['name'];
                document.querySelector('#check_name_partner').value = result[0]['name'];
                document.querySelector('#class_color_menu').value = result[0]['class_color_menu'];
                document.querySelector('#div_color_navbar').style = "background: " + result[0]['color_navbar'] + ";" ;
                document.querySelector('#div_switcher').style = "background: " + result[0]['color_navbar'] + ";" ;

		});

        fetch("{{ url('/') }}/api/all_group_line/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let ul_group_line = document.querySelector('#ul_group_line') ;

                for(let item of result){
                    let tag_li = document.createElement("li");
                    let class_tag_li = document.createAttribute("class");
                    	class_tag_li.value = "list-group-item";
                    	tag_li.setAttributeNode(class_tag_li);

                    tag_li.innerHTML = 
                    	"<b>" + item.line_group + "</b>" +
                    	"<br><span class='btn' onclick='set_group_line(" + item.group_line_id + ")' style='float:right;font-style: italic;color: red;font-size: 14px;''>แก้ไข</span> "
                    ;
                    ul_group_line.appendChild(tag_li);
                }
        });

        fetch("{{ url('/') }}/api/check_data_partner_premium/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                
                if (result.length >= 1) {
                	document.querySelector('#div_menu_Broadcast').classList.remove('d-none');
                }else{
                	document.querySelector('#div_menu_Broadcast').classList.add('d-none');
                }

                if (!result[0]['BC_by_check_in_max'] || result[0]['BC_by_check_in_max'] == '0') {
                	document.querySelector('#li_menu_Check_in').classList.add('disabled');
                	document.querySelector('#li_menu_Check_in').href = "";
					document.querySelector('#tip_check_in').classList.remove("d-none");
                }

                if (!result[0]['BC_by_car_max'] || result[0]['BC_by_car_max'] == '0') {
                	document.querySelector('#li_menu_Car').classList.add('disabled');
                	document.querySelector('#li_menu_Car').href = "";
					document.querySelector('#tip_car').classList.remove("d-none");
                }

                if (!result[0]['BC_by_user_max'] || result[0]['BC_by_user_max'] == '0') {
                	document.querySelector('#li_menu_User').classList.add('disabled');
                	document.querySelector('#li_menu_User').href = "";
					document.querySelector('#tip_user').classList.remove("d-none");
                }

        });
            
    }

    function check_sos_alarm()
    {
    	let check_name_partner = document.querySelector('#check_name_partner').value;
    	var audio = new Audio("{{ asset('sound/Alarm Clock.mp3') }}");

    	fetch("{{ url('/') }}/api/check_sos_alarm/" + check_name_partner)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if (result.length != 0) {
                	// console.log(result.length);

                	document.querySelector('#div_menu_help').classList.remove('d-none');

                	fetch("{{ url('/') }}/api/check_sos_alarm/notify/" + check_name_partner)
			            .then(response => response.json())
			            .then(result => {
			                // console.log(result);
			                if (result.length != 0) {

								document.querySelector('#modal_notify_name').innerHTML = result[0]['name'];
								document.querySelector('#modal_notify_phone').innerHTML = result[0]['phone'];

								document.querySelector('#modal_notify_time').innerHTML = result[0]['created_at'];
								document.querySelector('#modal_notify_name_area').innerHTML = result[0]['name_area'];

								if (result[0]['photo']) {
									document.querySelector('#btn_modal_notify_img').classList.remove('d-none');
									
									let tag_a_modal_notify_img = document.querySelector('#tag_a_modal_notify_img');
									let tag_a_notify_img_href = document.createAttribute("href");
									tag_a_notify_img_href.value = "{{ url('storage' )}}"+"/"+ result[0]['photo'];
									tag_a_modal_notify_img.setAttributeNode(tag_a_notify_img_href);

									let modal_notify_img = document.querySelector('#modal_notify_img');

				                	let modal_notify_img_src = document.createAttribute("src");
									modal_notify_img_src.value = "{{ url('storage' )}}"+"/"+ result[0]['photo'];

									modal_notify_img.setAttributeNode(modal_notify_img_src);
									
								}else {
									document.querySelector('#btn_modal_notify_img').classList.add('d-none');
								}

								let btn_go_to_help = document.querySelector('#btn_go_to_help');
									let btn_go_to_help_onclick = document.createAttribute("onclick");
				                  		btn_go_to_help_onclick.value = "go_to_help(" +  {{ Auth::user()->id }} + ")";
									
								btn_go_to_help.setAttributeNode(btn_go_to_help_onclick);


								let tag_a_link_ggmap = document.querySelector('#tag_a_link_ggmap');

				                let tag_a_class = document.createAttribute("href");
				                  	tag_a_class.value = "https://www.google.co.th/maps/search/"+ result[0]['lat'] +","+ result[0]['lng'] +"/@"+ result[0]['lat'] +","+ result[0]['lng'] +",16z";

				                  	tag_a_link_ggmap.setAttributeNode(tag_a_class); 

								document.querySelector('#btn_modal_notify').click();

								if (result[0]['photo']) {
									document.querySelector('#btn_modal_notify_img').click();
								}
								
								audio.play();
			                }
			        });
                }else{
                	document.querySelector('#div_menu_help').classList.add('d-none');
                }
        });
    }
    
    function change_color()
    {
        let delayInMilliseconds = 500; //0.5 second

        setTimeout(function() {
            random_color();
        }, delayInMilliseconds);

    }

    function add_color_item_Ex()
    {
    	let code_color = document.querySelector('#code_color').value ;

    	let color_item_Ex = document.querySelector('#color_item_Ex');
            let color_item_Ex_style = document.createAttribute("style");
                color_item_Ex_style.value = "background-color:" + code_color + " ;";
                color_item_Ex.setAttributeNode(color_item_Ex_style); 
            let click_color_item_Ex = document.createAttribute("onclick");
                click_color_item_Ex.value = "add_input_color('" + code_color + "')";
                 color_item_Ex.setAttributeNode(click_color_item_Ex); 
    }

    function add_color_item_Ex_menu()
    {
    	let code_color_menu = document.querySelector('#code_color_menu').value ;

    	let color_item_Ex_menu = document.querySelector('#color_item_Ex_menu');
    		color_item_Ex_menu.style = "";
    		color_item_Ex_menu.onclick = "";

            let color_item_Ex_style_menu = document.createAttribute("style");
                color_item_Ex_style_menu.value = "background-color:" + code_color_menu + " ;";
                color_item_Ex_menu.setAttributeNode(color_item_Ex_style_menu); 
            let click_color_item_Ex_menu = document.createAttribute("onclick");
                click_color_item_Ex_menu.value = "add_input_color_menu('" + code_color_menu + "')";
                 color_item_Ex_menu.setAttributeNode(click_color_item_Ex_menu); 
    }

    function random_color()
    {
        let letters = '0123456789ABCDEF'.split('');
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        add_color_to_item(color)
    }

    function add_color_to_item(color)
    {
        let text_color = color.split('');

        let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" ;
        let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" ;
        let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" ;
        let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" ;
        let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" ;
        let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
        let color_7 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "11" ;
        let color_8 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

        // 1
        let color_item_1 = document.querySelector('#color_item_1');
            let color_item_1_style = document.createAttribute("style");
                color_item_1_style.value = "background-color:" + color_1 + " ;";
                color_item_1.setAttributeNode(color_item_1_style); 
            let click_color_item_1 = document.createAttribute("onclick");
                click_color_item_1.value = "add_input_color('" + color_1 + "')";
                 color_item_1.setAttributeNode(click_color_item_1); 

        // 2
        let color_item_2 = document.querySelector('#color_item_2');
            let color_item_2_style = document.createAttribute("style");
                color_item_2_style.value = "background-color:" + color_2 + " ;";
                color_item_2.setAttributeNode(color_item_2_style); 
            let click_color_item_2 = document.createAttribute("onclick");
                click_color_item_2.value = "add_input_color('" + color_2 + "')";
                 color_item_2.setAttributeNode(click_color_item_2); 

        // 3
        let color_item_3 = document.querySelector('#color_item_3');
            let color_item_3_style = document.createAttribute("style");
                color_item_3_style.value = "background-color:" + color_3 + " ;";
                color_item_3.setAttributeNode(color_item_3_style); 
            let click_color_item_3 = document.createAttribute("onclick");
                click_color_item_3.value = "add_input_color('" + color_3 + "')";
                 color_item_3.setAttributeNode(click_color_item_3); 

        // 4
        let color_item_4 = document.querySelector('#color_item_4');
            let color_item_4_style = document.createAttribute("style");
                color_item_4_style.value = "background-color:" + color_4 + " ;";
                color_item_4.setAttributeNode(color_item_4_style); 
            let click_color_item_4 = document.createAttribute("onclick");
                click_color_item_4.value = "add_input_color('" + color_4 + "')";
                 color_item_4.setAttributeNode(click_color_item_4); 

        // 5
        let color_item_5 = document.querySelector('#color_item_5');
            let color_item_5_style = document.createAttribute("style");
                color_item_5_style.value = "background-color:" + color_5 + " ;";
                color_item_5.setAttributeNode(color_item_5_style); 
            let click_color_item_5 = document.createAttribute("onclick");
                click_color_item_5.value = "add_input_color('" + color_5 + "')";
                 color_item_5.setAttributeNode(click_color_item_5); 

        // 6
        let color_item_6 = document.querySelector('#color_item_6');
            let color_item_6_style = document.createAttribute("style");
                color_item_6_style.value = "background-color:" + color_6 + " ;";
                color_item_6.setAttributeNode(color_item_6_style); 
            let click_color_item_6 = document.createAttribute("onclick");
                click_color_item_6.value = "add_input_color('" + color_6 + "')";
                 color_item_6.setAttributeNode(click_color_item_6); 

        // 7
        let color_item_7 = document.querySelector('#color_item_7');
            let color_item_7_style = document.createAttribute("style");
                color_item_7_style.value = "background-color:" + color_7 + " ;";
                color_item_7.setAttributeNode(color_item_7_style); 
            let click_color_item_7 = document.createAttribute("onclick");
                click_color_item_7.value = "add_input_color('" + color_7 + "')";
                 color_item_7.setAttributeNode(click_color_item_7); 

        // 8
        let color_item_8 = document.querySelector('#color_item_8');
            let color_item_8_style = document.createAttribute("style");
                color_item_8_style.value = "background-color:" + color_8 + " ;";
                color_item_8.setAttributeNode(color_item_8_style); 
            let click_color_item_8 = document.createAttribute("onclick");
                click_color_item_8.value = "add_input_color('" + color_8 + "')";
                 color_item_8.setAttributeNode(click_color_item_8); 

    }

    function add_input_color(color)
    {
    	let div_color_navbar = document.querySelector('#div_color_navbar');
    		div_color_navbar.style = "";
    		div_color_navbar.style = "background-color:" + color + " ;";

    	let div_switcher = document.querySelector('#div_switcher');
    		div_switcher.style = "";
    		div_switcher.style = "background-color:" + color + " ;";

    		div_switcher

            color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_navbar/"+ color + "/" + color_of_partner);
    }

    function add_input_color_menu(color)
    {
    	var header_wrapper_menu = document.querySelector('#header-wrapper_menu');

    	switch (color) {
			case "1":
			    color = "#null" ;
			    class_color_menu = "1"
			    	header_wrapper_menu.style = "" ;
			break;
			case "2":
			    color = "#null" ;
			    class_color_menu = "2"
			    	header_wrapper_menu.style = "" ;
			break;
			case "3":
			    color = "#null" ;
			    class_color_menu = "3"
			    	header_wrapper_menu.style = "" ;
			break;
			case "4":
			    color = "#null" ;
			    class_color_menu = "4"
			    	header_wrapper_menu.style = "" ;
			break;
			case "5":
			    color = "#null" ;
			    class_color_menu = "5"
			    	header_wrapper_menu.style = "" ;
			break;
			case "6":
			    color = "#null" ;
			    class_color_menu = "6"
			    	header_wrapper_menu.style = "" ;
			break;
			case "7":
			    color = "#null" ;
			    class_color_menu = "7"
			    	header_wrapper_menu.style = "" ;
			break;
			case "8":
			    color = "#null" ;
			    class_color_menu = "8"
			    	header_wrapper_menu.style = "" ;
			break;
			default:
			    color = color ;
			    class_color_menu = "other"

			    let html_class = document.querySelector('#html_class');

		    	let html_class_class_1 = document.createAttribute("class");
            		html_class_class_1.value = "";
            		html_class.setAttributeNode(html_class_class_1);

            	let html_class_class_2 = document.createAttribute("class");
            		html_class_class_2.value = "";
            		html_class.setAttributeNode(html_class_class_2); 

			    let switcher_wrapper_menu = document.querySelector('#switcher-wrapper_menu');
			    	switcher_wrapper_menu.style = "" ;
			    	switcher_wrapper_menu.style = "background-color: " + color + ";" ;

			    	header_wrapper_menu.style = "" ;
			    	header_wrapper_menu.style = "background-color: " + color + ";" ;

			    	
		}

    	// console.log(color);
    	// console.log(class_color_menu);

        color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_menu/"+ color + "/" + color_of_partner + "/" + class_color_menu);
    }


    function set_group_line(group_line_id)
    {
        fetch("{{ url('/') }}/api/check_data_line_group/" + group_line_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                document.querySelector('#span_name_line').innerHTML = result[0]['groupName'] ;
                document.querySelector('#label_old_language').innerHTML = "Language  (" + result[0]['language'] + ")" ;
                document.querySelector('#label_old_time_zone').innerHTML = "Time zone  (" + result[0]['time_zone'] + ")" ;
                document.querySelector('#old_time_zone').value = result[0]['time_zone'];
                document.querySelector('#old_language').value = result[0]['language'];
                document.querySelector('#input_name_group_line').value = result[0]['groupName'];

                let btn_cf_set = document.querySelector('#btn_cf_set') ;
                let onclick = document.createAttribute("onclick");
                	onclick.value = "update_data_group_line('" + result[0]['id']+ "')";
                	btn_cf_set.setAttributeNode(onclick);
                
        });

        fetch("{{ url('/') }}/api/search_time_zone")
            .then(response => response.json())
            .then(result => {

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.TimeZone;
                    option.value = item.TimeZone;
                    input_time_zone.add(option);             
                } 

        });

        document.querySelector('#btn_modal_set_group_line').click();
    }

    function update_data_group_line(group_id)
    {
        let input_name_group_line = document.querySelector('#input_name_group_line').value;
        let input_language = document.querySelector('#input_language').value;
        let input_time_zone = document.querySelector('#input_time_zone').value;
            input_time_zone = input_time_zone.replace("/","_");

        fetch("{{ url('/') }}/api/set_group_line/"+ group_id + "/" + input_language + "/" + input_time_zone + "/" + input_name_group_line);

        document.querySelector('#btn_close_set_group').click();

        let delay = 800; 

        setTimeout(function() {
            alert("ตั้งค่ากลุ่มไลน์ "+ input_name_group_line + " เรียบร้อยแล้ว");
        }, delay);
    }

    function check_sos_js100(){
        // console.log("CHECK");
        fetch("{{ url('/') }}/api/check_new_sos_js100_by_theme" )
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result['length'] > 0) {
                	document.querySelector('#div_menu_alert_js100').classList.remove('d-none');
                }else{
                	document.querySelector('#div_menu_alert_js100').classList.add('d-none');
                }
        });
    }
	
	function check_submenu(){
		let menu = $('.sub-menu');
		var winlocation = window.location.href.split('?')[0]
		whole_string = winlocation;
		split_string = whole_string.split(/(\d+)/);
		

		for (i = 0; i < menu.length; i++) {
			if(winlocation == menu[i].getAttribute("data-submenu")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");

			}if(winlocation == menu[i].getAttribute("data-submenu-2")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-3")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-4")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-5")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(split_string[0] == menu[i].getAttribute("data-submenu-have-id")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}
		}
	}
</script>

</body>

</html>