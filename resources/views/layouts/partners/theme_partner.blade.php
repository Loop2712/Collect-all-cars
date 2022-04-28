<!DOCTYPE html>
<html lang="en">

<head>
    <title>Partner Viicheck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

  <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('/partner/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('/partner/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('/partner/css/style.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/partner/css/menu_color.css') }}">
    <!-- google font -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

</head>

@foreach($data_partners as $data_partner)
<style>
    .navbar-brand  {
    background: {{ $data_partner->color  }} ;
    }

</style>
<body style="background-color: {{ $data_partner->color_body  }};">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <!-- <div class="navbar-brand header-logo">
                <div style="display: -webkit-box;overflow: hidden;width: 88%;text-overflow: '...';">
                    <div style="margin-left: -15px;">
                        @if(!empty($data_partner->logo))
                            <img src="{{ asset('/img/logo/GreenLogo.png') }}" class="navbar-brand-img" width="60%" style="margin-top:-5px">
                        @else
                            <ul class="nav pcoded-inner-navbar">
                                <li class="nav-item">
                                    <a href="{{ url('/partner_index') }}" class="nav-link " style="font-size: 0.8em;">
                                        <span class="pcoded-mtext text-white" > 
                                            <b>การท่าเรือแห่งประเทศไทยประเทศไทย</b> 
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                    <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
                </div>
            </div> -->
            <div style="background-color: {{ $data_partner->color_navbar  }};" class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li style="background: {{ $data_partner->color  }} ;">
                        <div style="width: 84%;font-size: 16px;">
                            <div style="margin-left: -5px;margin-top: 12px;">
                                @if(!empty($data_partner->logo))
                                    <img src="{{ asset('/img/logo/GreenLogo.png') }}" class="navbar-brand-img" width="60%">
                                @else
                                    <!-- <span class=" pcoded-mtext text-white"><b>{{ $data_partner->name }}</b></span> -->
                                    <ul class="nav pcoded-inner-navbar">
                                        <li class="nav-item">
                                            <a href="{{ url('/partner_index') }}" class="nav-link">
                                                <span class="pcoded-mtext text-white" > 
                                                    <b>{{ $data_partner->name }}</b> 
                                                    <!-- <b>การท่าเรือแห่งประเทศไทย</b>  -->
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
                        </div>
                    </li>
                    <br>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/register_cars_partner') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-car"></i></i></span><span class="pcoded-mtext" >รถลงทะเบียน</span></a>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/guest_partner') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-car-crash"></i></i></i></span><span class="pcoded-mtext">รถที่ถูกรายงาน</span></a>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/partner_guest_latest') }}" class="nav-link "><span class="pcoded-micon"><i class="fad fa-car-crash"></i></i></i></span><span class="pcoded-mtext">รถที่ถูกรายงานล่าสุด</span></a>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/sos_partner') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-hands-helping"></i></span><span class="pcoded-mtext">ให้ความช่วยเหลือ</span></a>
                    </li>
                    <!-- <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/sos_insurance') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-tools"></i></span><span class="pcoded-mtext">การเรียกประกัน</span></a>
                    </li> -->
                    @if(Auth::check())
                        @if(Auth::user()->role == "admin-partner")
                            <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                                <a href="{{ url('/add_area') }}" class="nav-link "><span class="pcoded-micon"><i class="far fa-map"></i></span><span class="pcoded-mtext">พื้นที่บริการ</span></a>
                            </li>
                            <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                                <a href="{{ url('/manage_user_partner') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-users-cog"></i></span><span class="pcoded-mtext" >จัดการผู้ใช้</span></a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item pcoded-menu-caption">
                        <label style="font-size:13px">การใช้งาน</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/how_to_use') }}" class="nav-link "><span class="pcoded-micon"><i class="fad fa-book"></i></span><span class="pcoded-mtext">วิธีใช้งาน</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label style="font-size:13px">ติดต่อ ViiCHECK</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="tel:020277856" class="nav-link "><span class="pcoded-micon"><i class="fas fa-phone-alt"></i></i></span><span class="pcoded-mtext">02-0277856</span></a>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="mailto:contact.viicheck@gmail.com" class="nav-link "><span class="pcoded-micon"><i class="far fa-envelope"></i></i></span><span class="pcoded-mtext">contact.viicheck@gmail.com</span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="#" class="b-brand">
                   <div class="b-bg">
                      <div class="sidenav-header  align-items-center">
                            <a class="navbar-brand" href="#">
                            </a>
                        </div>
                   </div>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <!-- <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li> -->
                <br>
            </ul>
            <ul class="navbar-nav ml-auto"></form>
                
                <li>
                <div class="profile-notification">
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification ">
                            <div style="background-color: {{ $data_partner->color  }} ;" class="pro-head">
                            @if(!empty(Auth::user()->photo))
                                <img alt="" style="width:60px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ Auth::user()->photo }}" data-original-title="Usuario"> 
                            @else
                                <img src="partner/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                            @endif
                            <!-- <img src="partner/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image"> -->
                                <span>{{ Auth::user()->name }}</span>
                                <a href="{{ route('logout') }}" class="dud-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->role == "admin-partner")
                                    <ul class="pro-body">
                                        <!-- <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li> -->
                                        <li>
                                            <a href="" class="dropdown-item" data-toggle="modal" data-target="#set_group_line">
                                                <i class="fab fa-line text-success"></i> ตั้งค่า Group line
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item" data-toggle="modal" data-target="#modal_change_color" onclick="random_color();">
                                                <i class="fas fa-palette text-danger"></i> เปลี่ยนสี Template
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <i class="fas fa-boxes text-info"></i> เปลี่ยนโลโก้ Template (soon)
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <!-- <center>
                <div class="card col-md-11" style="font-family: 'Prompt', sans-serif;border-radius: 25px;">
                    <div class="row">
                        <div class="card-body col-md-6" style="hight: 500px">
                            <img src="img/stickerline/PNG/1.png" width="100%" alt="viicheck">
                        </div>
                        <div class="card-body col-md-6 d-flex align-items-center">
                            <div class="col-md-12">
                                <h1 style="font-family: 'Prompt', sans-serif;"> <b>ยินดีต้อนรับ <br>เข้าสู่<br>ViiCheck-Partner</b> </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </center> -->
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

            @if(!empty($data_partner->group_line->language))
            <!-- set_group_line -->
            <div class="modal fade" id="set_group_line" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ตั้งค่ากลุ่มไลน์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h3>ชื่อกลุ่มไลน์ : 
                                    <b class="text-primary">
                                        <span id="span_name_line">{{ $data_partner->line_group }}</span>
                                    </b>
                                </h3>
                                <hr>
                            </div>
                            <div class="col-6">
                                <label class="control-label">ภาษา  (เดิม {{ $data_partner->group_line->language }})</label>
                                <select class="form-control" name="input_language" id="input_language" required>
                                    <option value="{{ $data_partner->group_line->language }}" selected>- เลือกภาษา -</option>
                                    <option value="th" >ไทย (th)</option>
                                    <option value="en" >English (en)</option>
                                    <option value="zh-TW" >中國人 (zh-TW)</option>
                                    <option value="ja" >日本 (ja)</option>
                                    <option value="ko" >한국인 (ko)</option>
                                    <option value="es" >Español (es)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="control-label">Time zone (เดิม {{ $data_partner->group_line->time_zone }})</label>
                                <select class="form-control" name="input_time_zone" id="input_time_zone" required>
                                    <option value="{{ $data_partner->group_line->time_zone }}" selected>- เลือก Time zone -</option>
                                    @foreach($data_time_zone as $time_zone)
                                        <option value="{{ $time_zone->TimeZone }}" 
                                        {{ request('TimeZone') == $time_zone->TimeZone ? 'selected' : ''   }} >
                                        {{ $time_zone->CountryCode }} , {{ $time_zone->TimeZone }} , @if($time_zone->UTC > 0)UTC +{{ $time_zone->UTC }}@else UTC {{ $time_zone->UTC }}@endif
                                        </option>
                                    @endforeach   
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="" id="input_id_partner" value="{{ $data_partner->id }}">
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="set_group_line();">ตั้งค่า</button>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @yield('content')

        </div>
    </section>
    <!-- [ Main Content ] end -->

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
<script src="partner/js/vendor-all.min.js"></script>
<script src="partner/plugins/bootstrap/js/bootstrap.min.js"></script>
    
<script src="partner/js/pcoded.min.js"></script>
<script src="partner/js/menu_color.js"></script>
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
@endforeach
</html>
