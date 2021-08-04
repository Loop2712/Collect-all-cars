<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ViiCHECK ประเทศไทย</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Medilab/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('Medilab/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('Medilab/css/style.css') }}" rel="stylesheet">
  

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <style type="text/css">
        .main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
        .main-radius{
            border-radius: 5px;
        }
        body {
            top: 0px !important; 
            }

        .goog-logo-link {
                display:none !important;
            } 
                
        .goog-te-gadget {
                color: transparent !important;
            }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
            } 

        .btn_register{
          position: relative;
          animation-name: btn_register;
          animation-duration: 10s;
          animation-delay: 0s;
        }

        .text_click{
          color: white;
          animation-name: text_click;
          animation-duration: 5s;
          animation-delay: 2s;
        }

        @keyframes btn_register {
          0%   {left:200px;}
          25%  {left:0px;}
          50%  {left:0px;}
          75%  {left:0;}
          100% {left:0;}
        }

        @keyframes text_click {
          0%   {color: white;}
          20%  {color: black;}
          40%  {color: white;}
          60%   {color: black;}
          80%  {color: white;}
          95%  {color: black;}
          100%  {color: white;}

        }

        .data_organization{
          position: relative;
          animation-name: data_organization;
          animation-duration: 3s;
          animation-delay: 0s;
        }

        @keyframes data_organization {
          0%   {left:0px; top:-160px; opacity: 0.1;}
          100% {left:0px; top:0px; opacity: 1;}
        }

    </style>
    
    
</head>

<body class="bg-white">

    <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <!-- คอม -->
        <div class="d-none d-lg-block">
          <h6 style="margin-bottom:-8px;">
            <span>
              <a href="https://www.facebook.com/ViiCheck-100959585396310" target="bank">
                <i style="font-size:22px;" class="fab fa-facebook text-primary"></i>
              </a>
              <a href="https://line.me/R/ti/p/%40702ytkls" target="bank"> 
                <i style="font-size:23px;" class="fab fa-line text-success"></i>
              </a>
            </span>

            <i class="bi bi-envelope"></i> <a href="mailto:contact.viicheck@gmail.com">contact.viicheck@gmail.com</a>
            <i class="bi bi-phone"></i> <a  style="font-family: K2D, sans-serif;" href="tel:020277856">02-0277856</a>

            <span>
              <div style="margin-top:-25px; margin-left:955px;position: absolute;">
                <div id="google_translate_element" onchange="check_language();"></div>
              </div>
              <div style="margin-top:-12px; margin-left:1070px;position: absolute;">
                <i style="font-size:30px;" class="fas fa-language float-right"></i>
              </div>
            </span>
          </h6>

        </div>

        <!-- มือถือ -->
        <div class="d-block d-md-none">
            <div>
              <i class="bi bi-envelope"></i> <a href="mailto:contact.viicheck@gmail.com">contact.viicheck@gmail.com</a>
              <i class="bi bi-phone"></i> <a href="tel:020277856">02-0277856</a> 
            </div>
        </div>
        
      </div>
      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="border-bottom: 2px solid red;">
    <div class="container d-flex align-items-center" >
      <div class="row">
        <div class="col-3 d-none d-lg-block">
            <a href="{{URL::to('/')}}"><img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
        </div>
        <div class="col-6 d-block d-md-none">
            <a href="{{URL::to('/')}}"><img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
        </div>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      @guest
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/middle_price_car') }}"><b>เช็คราคากลาง</b></a></li>
          <li><a class="nav-link scrollto" href="{{ url('/promotion') }}"><b>โปรโมชั่น</b></a></li>
          <li><a class="nav-link scrollto" href="{{ url('/register_car/create') }}"><b>ลงทะเบียนรถ</b></a></li>
        </ul>
      </nav>
      <a href="{{ route('login') }}?redirectTo={{ url()->full() }}" style="margin-right:10px" class="appointment-btn scrollto">
        <span class="d-block d-md-inline">เข้าสู่ระบบ</span>
      </a>
          
      @else
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li>
          <!-- <div id="google_translate_element"></div> -->
        </li>
          <li><a class="nav-link scrollto" href="{{ url('/middle_price_car') }}"><b>เช็คราคากลาง</b></a></li>
          <li><a class="nav-link scrollto" href="{{ url('/promotion') }}"><b>โปรโมชั่น</b></a></li>
          <li><a class="nav-link scrollto" href="{{ url('/register_car/create') }}"><b>ลงทะเบียนรถ</b></a></li>
          <li class="dropdown">
              <input type="hidden" name="name_user" id="name_user" value="{{ Auth::user()->name }}">
              <a href="#" style="font-size: 18px;">
                <span class="btn btn-primary main-shadow main-radius">
                  <b><span id="input_name"></span></b>
                  <i class="bi bi-chevron-down"></i>
                </span> 
                
              </a>
              <ul class="dropdown-active">
                <a href="{{ url('/profile') }}">
                <li>
                  <img width="25" style="margin-left: -5px;" src="{{ url('/img/stickerline/PNG/tab.png') }}">&nbsp;โปรไฟล์
                </li>
                </a>
                @if(!empty(Auth::user()->organization))
                    <li><a href="{{ url('/register_car') }}">🚗 &nbsp;รถองค์กร</a></li>
                @else
                    <li><a href="{{ url('/register_car') }}">🚗 &nbsp;รถของฉัน</a></li>
                @endif
                <li>
                    @if(Auth::check())
                        <!-- @if(Auth::user()->role == "admin" )
                            <a href="{{ url('/dashboard') }}" target="blank">📊 &nbsp;Admin</a>
                        @endif -->
                      @switch (Auth::user()->role)
                        @case("admin") 
                          <a href="{{ url('/dashboard') }}" target="blank">📊 &nbsp;Admin</a>
                        @break
                        @case("2bgreen") 
                          <a href="{{ url('/report_register_cars_2bgreen') }}" target="blank">📊 &nbsp; Partners 2bgreen</a>
                        @break
                      @endswitch
                    @endif
                </li>
                <li>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">🔑 &nbsp;เปลี่ยนรหัสผ่าน</a>
                    @endif
                </li>
                <li>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    🏃‍♂️ &nbsp;{{ __(' Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                </li>
              </ul>
          </li>
        </ul>
        <img class="mobile-nav-toggle main-shadow main-radius" style="margin-right: 15px;" width="35" src="{{ Auth::user()->avatar }}">
      </nav>
      @endguest
      <!-- .navbar -->
    </div>
  </header><!-- End Header -->


    @yield('content')

<!-- ======= Footer WEB ======= -->
  <footer class="d-none d-lg-block" id="footer">
    <div class="container d-md-flex py-3">
      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          <div class="row">
            <!-- <div class="col-1">
                <p id="Certificate-banners"></p>
            </div> -->
            <!-- <div class="col-1">
                <img width="100%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
            </div> -->
            <div class="col-1">
                <a href="https://www.trustmarkthai.com/callbackData/popup.php?data=0fb7dd20-26-5-1dd80cec414c4d670072026d423afa933e149&markID=firstmar" target="bank">
                  <img width="100%" src="{{ asset('/img/logo/bns_registered.png') }}">
                </a>
              </div>
            <div class="col-1">
                <img width="100%" src="{{ asset('/img/logo/GreenLogo.png') }}">
            </div>
            <div class="col-1">
                <img width="100%" src="{{ asset('/img/logo/js100.png') }}">
            </div>
          </div>
        </div>
        <div class="copyright">
          <div class="row">
            <div class="col-12">
              <div class="row">
                  <div class="col-8" style="margin-top:10px">
                    <span>WWW.ViiCHECK.COM</span>
                    &nbsp;&nbsp;
                    <a class="link" style="font-size: 15px;" target="bank" href="{{ url('/privacy_policy') }}"><b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></a>
                    &nbsp;&nbsp;
                    <a class="link" style="font-size: 15px;" target="bank" href="{{ url('/terms_of_service') }}"><b>ข้อกำหนดและเงื่อนไขการใช้บริการ</b></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                
                <div class="col-4">
                  <div class="social-links float-right">
                    <a href="https://www.facebook.com/ViiCheck-100959585396310" ><i class="fab fa-facebook"></i></a>
                    <a href="https://line.me/R/ti/p/%40702ytkls" ><i class="fab fa-line"></i></a>
                    <a href="mailto:contact.viicheck@gmail.com" ><i class="fas fa-mail-bulk"></i></a>
                    <a href="#" ><i class="fab fa-youtube"></i></a>
                    <a href="tel:020277856" ><i class="fas fa-phone-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- ======= Footer mobile  ======= -->
  <footer class="d-block d-md-none" id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          <div class="row">
              <div class="col-4">
                <a href="https://www.trustmarkthai.com/callbackData/popup.php?data=0fb7dd20-26-5-1dd80cec414c4d670072026d423afa933e149&markID=firstmar" target="bank">
                  <img width="100%" src="{{ asset('/img/logo/bns_registered.png') }}">
                </a>
              </div>
            <div class="col-4">
                <img width="100%" src="{{ asset('/img/logo/GreenLogo.png') }}">
            </div>
            <div class="col-4">
                <img width="100%" src="{{ asset('/img/logo/js100.png') }}">
            </div>
          </div>
        </div>
        <div class="copyright">
          <div class="row">
            <div class="col-12">
              <div class="row">
                  <div class="col-12">
                    <br>
                    <a class="link" style="font-size: 15px;" target="bank" href="{{ url('/privacy_policy') }}">
                      <b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b>
                    </a>
                    <br>
                    <a class="link" style="font-size: 15px;" target="bank" href="{{ url('/terms_of_service') }}">
                      <b>ข้อกำหนดและเงื่อนไขการใช้บริการ</b>
                    </a>
                    <br><br>
                </div>

                
                <div class="col-12">
                  <div class="social-links">
                    <a href="https://www.facebook.com/ViiCheck-100959585396310" ><i class="fab fa-facebook"></i></a>
                    <a href="https://line.me/R/ti/p/%40702ytkls" ><i class="fab fa-line"></i></a>
                    <a href="mailto:contact.viicheck@gmail.com" ><i class="fas fa-mail-bulk"></i></a>
                    <a href="#" ><i class="fab fa-youtube"></i></a>
                    <a href="tel:020277856" ><i class="fas fa-phone-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

    <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Medilab/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Medilab/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Medilab/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('Medilab/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('Medilab/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('Medilab/js/main.js') }}"></script>

  <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=0fb7dd20-26-5-1dd80cec414c4d670072026d423afa933e149"></script>

  <!-- Js Plugins -->
    
    <!-- <script src="{{ asset('js/car/bootstrap.min.js')}}"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('js/car/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="{{ asset('js/car/jquery.nice-select.min.js')}}"></script> -->
    <script src="{{ asset('js/car/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/car/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/car/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/car/main.js')}}"></script>
    <script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'th'}, 'google_translate_element');
              }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        var name_user = document.querySelector("#name_user");

            fetch("{{ url('/') }}/api/explode_name/" + name_user.value)
                .then(response => response.json())
                .then(result => {
                    // console.log(result[0]);
                    let input_name = document.querySelector("#input_name");
                    input_name.innerHTML = result[0];
                    
                    
                });
    });
</script>
</body>



</html>
