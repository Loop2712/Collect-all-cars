<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('/partner_new/plugins/simplebar/css/simplebar.css') }}">
	<link href="{{ asset('/partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/partner_new/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/partner_new/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/partner_new/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/partner_new/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/partner_new/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/partner_new/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/partner_new/css/header-colors.css') }}" />
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('/partner/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
	<title>Partner Viicheck</title>
</head>

<<body>
	<!--wrapper-->
	@foreach($data_partners as $data_partner)
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
                    <div>
                        @if(!empty($data_partner->logo))
                            <img src="{{ asset('/img/logo/GreenLogo.png') }}" class="navbar-brand-img" width="60%">
                        @endif
                    </div>
                    <div>
                        <a href="{{ url('/partner_index') }}" >
                            <h4 class="logo-text" style="font-family: 'Baloo Bhaijaan 2', cursive;
                            font-family: 'Prompt', sans-serif;">{{ $data_partner->name }}</h4>
                        </a>
                    </div>
                <div class="toggle-icon ms-auto">
                    <i class='bx bx-first-page'></i>
                </div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <li class="menu-label" style="font-size:15px;">
                    จัดการรถ
                </li>
				<li>
					<a href="{{ url('/register_cars_partner') }}">
						<div class="parent-icon"><i class='fas fa-car'></i>
						</div>
						<div class="menu-title">รถลงทะเบียน</div>
					</a>
				</li>
                <li>
					<a href="{{ url('/guest_partner') }}">
						<div class="parent-icon"><i class='fas fa-car-crash'></i>
						</div>
						<div class="menu-title">รถที่ถูกรายงาน</div>
					</a>
				</li>
                <li>
					<a href="{{ url('/partner_guest_latest') }}">
						<div class="parent-icon"><i class='fad fa-car'></i>
						</div>
						<div class="menu-title">รถที่ถูกรายงานล่าสุด</div>
					</a>
				</li>
                <li class="menu-label" style="font-size:15px;">
                    พื้นที่ช่วยเหลือ
                </li>
                <li>
					<a href="{{ url('/sos_partner') }}">
						<div class="parent-icon"><i class='fas fa-hands-helping'></i>
						</div>
						<div class="menu-title">ให้ความช่วยเหลือ</div>
					</a>
				</li>
                <li>
					<a href="{{ url('/add_area') }}">
						<div class="parent-icon"><i class='far fa-map'></i>
						</div>
						<div class="menu-title">พื้นที่บริการ</div>
					</a>
				</li>
                <li class="menu-label" style="font-size:15px;">
                    ผู้ใช้
                </li>
                <li>
					<a href="{{ url('/manage_user_partner') }}">
						<div class="parent-icon"><i class='fas fa-users-cog'></i>
						</div>
						<div class="menu-title">จัดการผู้ใช้</div>
					</a>
				</li>
                <li class="menu-label" style="font-size:15px;">
                    การใช้งาน
                </li>
                <li>
					<a href="{{ url('/how_to_use') }}" target="blank">
						<div class="parent-icon"><i class='fad fa-book'></i>
						</div>
						<div class="menu-title">วิธีใช้งาน</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="topbar d-flex align-items-center" style="background-color:{{ $data_partner->color }}">
				<nav class="navbar navbar-expand" >
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
					<div class="search-bar flex-grow-1">
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
                                <img src="partner/images/user/avatar-1.jpg" width="25%" class="img-radius" alt="User-Profile-Image">
                            @endif
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">{{ Auth::user()->role }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							@if(Auth::user()->id == "0")
	                            <li><a href="" class="dropdown-item"><i class="lni lni-line"></i><span>ตั้งค่ากลุ่มไลน์</span></a>
								</li>
								<li><a href="" class="dropdown-item" data-toggle="modal" data-target="#modal_change_color" onclick="random_color();"><i class="bx bx-paint"></i><span>เปลี่ยนสี Template</span></a>
								</li>
	                            <li><a href="" class="dropdown-item"><i class="bx bx-edit-alt"></i><span>เปลี่ยนโลโก้ Template(soon)</span></a>
								</li>
								<li>
									<div class="dropdown-divider mb-0"></div>
								</li>
							@endif
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
			
			  @yield('content')
			
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
	@endforeach
	<!--end wrapper-->
	<!--start switcher-->
	<!-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--end switcher-->
    <!-- modal_change_color -->
    <div class="modal fade" id="modal_change_color" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เลือกสีที่คุณต้องการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <center>
                                    <div class="menu">
                                        <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" checked="" />
                                        <label class="menu-open-button" for="menu-open" onclick="change_color();"> 
                                            <i class="fas fa-sync-alt text-info"></i>
                                        </label>
                                        <a id="fa_item_1" href="#" class="menu-item item-1"> 
                                            <i class="fa fa"></i><span id="text_item_1"></span>
                                        </a>
                                        <a id="fa_item_2" href="#" class="menu-item item-2"> 
                                            <i class="fa fa"></i> <span id="text_item_2"></span>
                                        </a> 
                                        <a id="fa_item_3" href="#" class="menu-item item-3"> 
                                            <i class="fa fa"></i> <span id="text_item_3"></span>
                                        </a> 
                                        <a id="fa_item_4" href="#" class="menu-item item-4"> 
                                            <i class="fa fa"></i> <span id="text_item_4"></span>
                                        </a> 
                                        <a id="fa_item_5" href="#" class="menu-item item-5"> 
                                            <i class="fa fa"></i> <span id="text_item_5"></span>
                                        </a> 
                                        <a id="fa_item_6" href="#" class="menu-item item-6"> 
                                            <i class="fa fa"></i> <span id="text_item_6"></span>
                                        </a> 
                                    </div>
                                </center>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="col-3"></div>
                            <div class="col-2">
                                <i id="circle_color" class="fas fa-circle" style="font-size:45px;"></i>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="" id="input_color" oninput="view_color();">
                            </div>
                            <div class="col-1">
                                <!-- <button class="btn btn-sm btn-outline-success" onclick="view_color();">ดู</button> -->
                            </div>
                            <div class="col-2">
                                <input id="color_of_partner" type="hidden" name="" value="{{ $data_partner->name }}">
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button id="bnt_sub_color" type="button" class="btn btn-primary d-none" onclick="submit_color();">ตกลง</button>
                  </div>
                </div>
              </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
	<script src="{{ asset('partner_new/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('partner_new/js/app.js') }}"></script>
    <script>
    
    function change_color()
    {
        let delayInMilliseconds = 500; //0.5 second

        setTimeout(function() {
            document.querySelector('#menu-open').click();
            random_color();
        }, delayInMilliseconds);

        
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
        let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "66" ;
        let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
        let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

        // 1
        let text_item_1 = document.querySelector('#text_item_1');
            text_item_1.innerHTML =  color_1 ;

        let fa_item_1 = document.querySelector('#fa_item_1');
            let style_fa_item_1 = document.createAttribute("style");
                style_fa_item_1.value = "background-color:" + color_1 + " ;";
                fa_item_1.setAttributeNode(style_fa_item_1); 
            let click_fa_item_1 = document.createAttribute("onclick");
                click_fa_item_1.value = "add_input_color('" + color_1 + "')";
                 fa_item_1.setAttributeNode(click_fa_item_1); 

        // 2
        let text_item_2 = document.querySelector('#text_item_2');
            text_item_2.innerHTML =  color_2 ;

        let fa_item_2 = document.querySelector('#fa_item_2');
            let style_fa_item_2 = document.createAttribute("style");
                style_fa_item_2.value = "background-color:" + color_2 + " ;";
                fa_item_2.setAttributeNode(style_fa_item_2); 
            let click_fa_item_2 = document.createAttribute("onclick");
                click_fa_item_2.value = "add_input_color('" + color_2 + "')";
                 fa_item_2.setAttributeNode(click_fa_item_2); 

        // 3
        let text_item_3 = document.querySelector('#text_item_3');
            text_item_3.innerHTML =  color_3 ;

        let fa_item_3 = document.querySelector('#fa_item_3');
            let style_fa_item_3 = document.createAttribute("style");
                style_fa_item_3.value = "background-color:" + color_3 + " ;";
                fa_item_3.setAttributeNode(style_fa_item_3); 
            let click_fa_item_3 = document.createAttribute("onclick");
                click_fa_item_3.value = "add_input_color('" + color_3 + "')";
                 fa_item_3.setAttributeNode(click_fa_item_3); 

        // 4
        let text_item_4 = document.querySelector('#text_item_4');
            text_item_4.innerHTML =  color_4 ;

        let fa_item_4 = document.querySelector('#fa_item_4');
            let style_fa_item_4 = document.createAttribute("style");
                style_fa_item_4.value = "background-color:" + color_4 + " ;";
                fa_item_4.setAttributeNode(style_fa_item_4); 
            let click_fa_item_4 = document.createAttribute("onclick");
                click_fa_item_4.value = "add_input_color('" + color_4 + "')";
                 fa_item_4.setAttributeNode(click_fa_item_4); 

        // 5
        let text_item_5 = document.querySelector('#text_item_5');
            text_item_5.innerHTML =  color_5 ;

        let fa_item_5 = document.querySelector('#fa_item_5');
            let style_fa_item_5 = document.createAttribute("style");
                style_fa_item_5.value = "background-color:" + color_5 + " ;";
                fa_item_5.setAttributeNode(style_fa_item_5); 
            let click_fa_item_5 = document.createAttribute("onclick");
                click_fa_item_5.value = "add_input_color('" + color_5 + "')";
                 fa_item_5.setAttributeNode(click_fa_item_5); 

        // 6
        let text_item_6 = document.querySelector('#text_item_6');
            text_item_6.innerHTML =  color_6 ;

        let fa_item_6 = document.querySelector('#fa_item_6');
            let style_fa_item_6 = document.createAttribute("style");
                style_fa_item_6.value = "background-color:" + color_6 + " ;";
                fa_item_6.setAttributeNode(style_fa_item_6); 
            let click_fa_item_6 = document.createAttribute("onclick");
                click_fa_item_6.value = "add_input_color('" + color_6 + "')";
                 fa_item_6.setAttributeNode(click_fa_item_6); 
    }

    function add_input_color(color)
    {
        let input_color = document.querySelector('#input_color');
         input_color.value = color ;

         let circle_color = document.querySelector('#circle_color');
            let circle_color_style = document.createAttribute("style");
                circle_color_style.value = "font-size:45px;color:" + color + " ;";
                 circle_color.setAttributeNode(circle_color_style);
        document.querySelector('#bnt_sub_color').classList.remove('d-none');
    }

    function view_color()
    {
        let input_color = document.querySelector('#input_color');

        let circle_color = document.querySelector('#circle_color');
            let circle_color_style = document.createAttribute("style");
                circle_color_style.value = "font-size:45px;color:" + input_color.value + " ;";
                 circle_color.setAttributeNode(circle_color_style);

        document.querySelector('#bnt_sub_color').classList.remove('d-none');
    }

    function submit_color()
    {
        let input_color = document.querySelector('#input_color');
            input_color = input_color.value.replace("#","_");

        let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_partner/"+input_color + "/" + color_of_partner);

        let delay = 800; 

        setTimeout(function() {
            window.location.reload(true);
        }, delay);
    }

    function set_group_line()
    {
        let input_language = document.querySelector('#input_language').value;
        let input_time_zone = document.querySelector('#input_time_zone').value;
            input_time_zone = input_time_zone.replace("/","_");
        let input_id_partner = document.querySelector('#input_id_partner').value;

        let span_name_line = document.querySelector('#span_name_line').innerText;

        fetch("{{ url('/') }}/api/set_group_line/"+ input_id_partner + "/" + input_language + "/" + input_time_zone);

        let delay = 800; 

        setTimeout(function() {
            alert("ตั้งค่ากลุ่มไลน์ "+ span_name_line + " เรียบร้อยแล้ว");
        }, delay);
    }
</script>
</body>

</html>