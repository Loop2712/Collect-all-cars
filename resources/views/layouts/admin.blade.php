@if(Auth::check())
    @if(Auth::user()->role == "admin" )
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>viicheck admin</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('admin/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('admin/icofont/icofont.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/car/font-awesome.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/argon.css?v=1.2.0') }}" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- script Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <style type="text/css">
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

        @keyframes notify_alert {
          0%   {color: red;}
          20%  {color: yellow;}
          40%  {color: red;}
          60% {color: yellow;}
          80%   {color: red;}
          100%  {color: yellow;}

        }
  </style>
</head>

<body style="background-color: #F0FFFF">
  <!-- Sidenav -->
  <nav style="margin-top: -10px;" class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{url('/dashboard')}}">
          <img src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}" class="navbar-brand-img">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text"><b>ภาพรวมของระบบ</b></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/manage_user') }}">
                <i class="fas fa-user-cog text-primary"></i>
                <span class="nav-link-text">จัดการผู้ใช้</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/sos') }}">
              <i class="fas fa-question-circle text-warning"></i>
                <span class="nav-link-text">การขอความช่วยเหลือ</span>
              </a>
            </li>

            <!-- V Market -->
            <li class="nav-item" id="Vmarket" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              <a class="nav-link" href="#">
                <i class="ni ni-cart" style="color:#9F5900;"></i>
                <span class="nav-link-text">V Market</span><span>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></span>
              </a>
            </li>
            <div class="dropdown-menu" aria-labelledby="Vmarket">
                <li class="nav-item dropdown-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-car text-primary"></i>
                  <span class="nav-link-text">การซื้อรถยนต์</span>
                </a>
                </li>
                <li class="nav-item dropdown-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-hand-holding-usd text-orange"></i>
                  <span class="nav-link-text">การขายรถยนต์</span>
                </a>
                </li>
                <li class="nav-item dropdown-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-motorcycle text-warning"></i>
                  <span class="nav-link-text">การซื้อรถจักรยานยนต์</span>
                </a>
                </li>
                <li class="nav-item dropdown-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-coins text-success"></i>
                  <span class="nav-link-text">การขายรถจักรยานยนต์</span>
                </a>
                </li>
            </div>

            <!-- V Move -->
            <div class="dropdown">
              <li class="dropdown" id="vmove_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-link" href="#">
                <i class="fas fa-car text-danger"></i>
                  <span class="nav-link-text">V Move</span><span>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></span>
                </a>
              </li>
              <div class="dropdown-menu" aria-labelledby="vmove_menu">
                 <li class="nav-item">
                  <a class="nav-link" href="{{ url('/report_register_cars') }}">
                    <i class="fas fa-car text-success"></i>
                    <span class="nav-link-text">รถลงทะเบียน </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/guest') }}">
                    <i class="fas fa-car-crash text-danger"></i>
                    <span class="nav-link-text">แจ้งเตือนเจ้าของรถ</span>
                  </a>
                </li>
              </div>
            </div>

            <!-- V new -->
            <div class="dropdown">
              <li class="dropdown" id="vnew_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-link" href="#">
                <i class="far fa-newspaper text-info"></i>
                  <span class="nav-link-text">V New</span><span>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></span>
                </a>
              </li>
              <div class="dropdown-menu" aria-labelledby="vnew_menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/add_news') }}">
                    <i class="far fa-newspaper" style="color: #5F9EA0"></i>
                    <span class="nav-link-text">การเพิ่มข่าว</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/report_news') }}">
                    <i class="fas fa-video-slash" style="color: #FA8072"></i>
                    <span class="nav-link-text">การรายงานไม่เหมาะสม</span>
                  </a>
                </li>
              </div>
            </div>

            <!-- Partner -->
            <div class="dropdown">
              <li class="dropdown" id="partner_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a id="partner_menu_url" class="nav-link" href="#">
                  <i class="fas fa-hands-helping text-success"></i>
                  <span class="nav-link-text">Partner</span><span>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></span>&nbsp;&nbsp;
                </a>
              </li>
              <div class="dropdown-menu" aria-labelledby="partner_menu">
                <li class="nav-item">
                  <a id="btn_Partner_url" class="nav-link" href="{{ url('/partner_viicheck') }}">
                    <i class="fas fa-hands-helping text-success"></i>
                    <span class="nav-link-text">Partner ViiCHECK</span>
                    &nbsp;&nbsp;
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/insurance') }}">
                    <i class="fas fa-user-shield text-info"></i>
                    <span class="nav-link-text">บริษัทประกันภัย</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/group_line') }}">
                    <i style="color: lightgreen" class="fab fa-line"></i>
                    <span class="nav-link-text">Group Line</span>
                  </a>
                </li>
              </div>
            </div>
            
            <!-- more -->
            <div class="dropdown">
              <li class="dropdown" id="more_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-link" href="#">
                  <i class="fas fa-ellipsis-h text-danger"></i>
                  <span class="nav-link-text">เพิ่มเติม</span><span>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></span>
                </a>
              </li>
              <div class="dropdown-menu" aria-labelledby="more_menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/text_topic') }}">
                    <i class="fas fa-font text-danger"></i>
                    <span class="nav-link-text">Text Topic</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/profanity') }}">
                    <i class="fas fa-ban text-orange"></i>
                    <span class="nav-link-text">แบนคำหยาบคาย</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/promotion/create') }}">
                    <i class="fas fa-ad text-success"></i>
                    <span class="nav-link-text">ลงโปรโมชั่น</span>
                  </a>
                </li>
              </div>
            </div>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Social</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://manager.line.biz/account/@702ytkls" target="_blank">
                <i style="color: lightgreen" class="fab fa-line"></i>
                <span class="nav-link-text">Line Official Account</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" target="_blank">
                <i style="color: lightblue" class="fab fa-facebook-square"></i>
                <span class="nav-link-text">Facebook Page</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img  src="{{ Auth::user()->avatar }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('content')
    
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('admin/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{ asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('admin/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <!-- <script src="{{ asset('admin/js/argon.js?v=1.2.0')}}"></script> -->

  <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        check_new_sos_area();
    });

    function check_new_sos_area() {

      fetch("{{ url('/') }}/api/check_new_sos_area")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

              let check = "no" ;
              for (var i = 0; i < result.length; i++) {

                if (result[i]['new_sos_area']) {
                    check = "yes";
                }
              }
                
              if (check === "yes") {
                  let btn_Partner_url = document.querySelector('#btn_Partner_url');
                  let partner_menu_url = document.querySelector('#partner_menu_url');
        
                  let tag_i = document.createElement("i");
                  let tag_i_class = document.createAttribute("class");
                  tag_i_class.value = "fas fa-exclamation-circle notify_alert";

                  tag_i.setAttributeNode(tag_i_class); 

                  partner_menu_url.appendChild(tag_i);

                  let tag_i_2 = document.createElement("i");
                  let tag_i_class_2 = document.createAttribute("class");
                  tag_i_class_2.value = "fas fa-exclamation-circle notify_alert";

                  tag_i_2.setAttributeNode(tag_i_class_2); 

                  btn_Partner_url.appendChild(tag_i_2);
              }
        });
    }

  </script>


</html>
  @endif
@endif
