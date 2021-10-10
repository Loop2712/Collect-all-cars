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
</head>

@foreach($data_partners as $data_partner)
<style>
    .navbar-brand  {
    background: {{ $data_partner->color  }} ;
    }
</style>
<body style="background-color: {{ $data_partner->color  }};">
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
            <div class="navbar-brand header-logo">
               <a href="#" class="b-brand">
                   <div class="b-bg">
                      <div class="sidenav-header  align-items-center">
                            <a class="navbar-brand" href="#">
                                <!-- <img src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}" class="navbar-brand-img"  width="40%" style="margin-top:-10px">
                                <span style="color:#FFFFFF ;"> <b>x</b>  </span> -->
                                @if(!empty($data_partner->logo))
                                    <img src="{{ asset('/img/logo/GreenLogo.png') }}" class="navbar-brand-img" width="60%" style="margin-top:-5px">
                                @else
                                    <span class="text-white"><b>{{ $data_partner->name }}</b></span>
                                @endif
                            </a>
                        </div>
                   </div>
               </a>
               <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
           </div>
            <div style="background-color: {{ $data_partner->color_navbar  }};" class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
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
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="{{ url('/service_area') }}" class="nav-link "><span class="pcoded-micon"><i class="far fa-map"></i></span><span class="pcoded-mtext">พื้นที่บริการ</span></a>
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
                                <img src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}" class="navbar-brand-img"  width="20%" style="margin-top:-10px">
                                <span> <b style="color:#888;"> x </b>  </span>
                                <img src="{{ asset('/img/logo/GreenLogo.png') }}" class="navbar-brand-img" width="20%" style="margin-top:-2px">
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
                            @if(!empty($data->photo))
                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario"> 
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
                            <ul class="pro-body">
                                <!-- <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li> -->
                                <li>
                                    <a href="" class="dropdown-item">
                                        <i class="fab fa-line text-success"></i> ตั้งค่า Group line
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <i class="fas fa-palette text-danger"></i> เปลี่ยนสี Template
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <i class="fas fa-boxes text-info"></i> เปลี่ยนโลโก้ Template
                                    </a>
                                </li>
                            </ul>
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

</body>
@endforeach
</html>
