<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ViiCHECK ประเทศไทย</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ url('img/logo/logo_x-icon.png')}}" type="image/x-icon" />

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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    </style>
    
    
</head>

<body class="bg-white">

    <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact.viicheck@gmail.com">contact.viicheck@gmail.com</a>
        <i class="bi bi-phone"></i> <a href="tel:020277856">020277856</a> 
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://www.facebook.com/ViiCheck-100959585396310" target="bank"><i class="fab fa-facebook-square text-primary"></i></a>
        <a href="https://line.me/R/ti/p/%40702ytkls" target="bank"><i class="fab fa-line text-success"></i></a>
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

      <!-- <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->
      <!-- .navbar -->
      <div  style="padding-top: 10px; ">
          <a href="{{ route('login') }}?redirectTo={{ url()->full() }}" class="appointment-btn scrollto"><span class="d-block d-md-inline">เข้าสู่ระบบ</a>
      </div>
    </div>
  </header><!-- End Header -->


    @yield('content')

<!-- ======= Footer WEB ======= -->
  <footer class="d-none d-lg-block" id="footer">
    <div class="container d-md-flex py-3">
      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          <div class="row">
            <div class="col-1">
                <p id="Certificate-banners"></p>
            </div>
            <!-- <div class="col-1">
                <img width="100%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
            </div> -->
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
                  <div class="col-8">
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
</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        var name_user = document.querySelector("#name_user");

            fetch("{{ url('/') }}/api/explode_name/" + name_user.value)
                .then(response => response.json())
                .then(result => {
                    console.log(result[0]);
                    let input_name = document.querySelector("#input_name");
                    input_name.innerHTML = result[0];
                    
                    
                });
    });
</script>
</body>



</html>
