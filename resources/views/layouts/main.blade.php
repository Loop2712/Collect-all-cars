<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>viicheck</title>

    @yield('add')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krub:wght@200&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/car/bootstrap.min.css')}}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/car/font-awesome.min.css')}}" type="text/css"> -->
    <link rel="stylesheet" href="{{ asset('css/car/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/car/wishlist.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}" type="text/css">

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <style type="text/css">
        .main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
    </style>
    
    
</head>

<body class="bg-white">

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    
    <div class="offcanvas-menu-overlay"></div>
    
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="{{URL::to('/')}}"><img width="100%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
        </div>
    <div class="row bootstrap snippets bootdeys">

        <div class="col-md-3">
            <div class="panel text-center">
                
                        <!-- <button class="btn btn-primary"> -->
                        @guest
                        <div class="pad-all">
                            <div class="pad-btm">
                        <button class="btn btn-primary">
                            <a  href="{{ route('login') }}?redirectTo={{ url()->full() }}" style=" color: white;"  >เข้าสู่ระบบ </a>
                        </button>
                        <!-- <a  href="{{ route('login') }}?redirectTo={{ url()->full() }}" style=" color: #4169E1;"  >เข้าสู่ระบบ &emsp;&emsp;</a> -->
                        @else
                        
                        <div class="panel-body">
                        @if( Auth::user()->avatar == 'null')
                            <img src="https://www.flaticon.com/svg/vstatic/svg/1077/1077114.svg?token=exp=1614951730~hmac=d767afebfe3a53e8d86895bf639cfe3a" style="border-radius: 50%;height: 100px;">
                        @else
                            <img style="border-radius: 50%;height: 100px;" src="{{Auth::user()->avatar}}" data-original-title="Usuario"> 
                        @endif
                            <h4 class="mar-no" ><br>{{ Auth::user()->name }}</h4>
                            <p>วันเดือนปีที่ใช้</p>
                        </div>
                        <div class="pad-all">
                            <div class="pad-btm">
                        <a href="{{ url('/profile') }} " style=" color: #4169E1;" >แก้ไขโปรไฟล์ &emsp;&emsp;</a>   
                        <!-- </button> -->
                        <!-- <button class="btn btn-success"> -->
                            <a href="{{ route('logout') }} " style=" color: #4169E1;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('ออกจากระบบ') }}</a>
                                            <!-- </button> -->
                        <br>
                        <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="massengbox" class="control-label">
                                @if (Route::has('password.request'))
                                    <a class="text-secondary" href="{{ route('password.request') }}">
                                        {{ __('เปลี่ยนรหัสผ่าน') }}
                                    </a>
                                @endif
                            </label>
                        </div>            
                    </div>
                        @endguest
                    </div>
                    
                    <hr>
                    <ul class="nav-news-feed">
                        <li><i class="fa fa-car"></i><div><a href="{{ url('/car') }}">รถยนต์</a></div></li>
                        <li><i class="fa fa-bicycle"></i><div><a href="{{ url('/motercycle') }}">รถจักรยานยนต์</a></div></li>
                    </ul>
                </div>
                <div class="col-12">
                    <img width="100%" src="{{ asset('/img/more/line_oa.png') }}">
                </div>
            </div>
        </div>    
    </div>
        
        <!-- <div id="mobile-menu-wrap"></div> -->
        
    </div>





    <!-- Header Section Begin -->
    <header class="header" style="background-color: #FFFFFF; margin-top: -10px;border-bottom: 2px solid red">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="header__logo">
                                <a href="{{URL::to('/')}}"><img width="200px" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="header__nav">
                                <nav class="header__menu" style="text-align:left;margin-left: 20px;">
                                    <ul>
                                        <li>
                                        <a href="{{ url('/car') }}" ><h5><b><i class="fas fa-car"></i> รถยนต์</b></h5></a>
                                        </li>
                                        <li style="margin-left: 60px;">
                                        <a href="{{ url('/motercycle') }}" ><h5><b><i class="fas fa-motorcycle"></i> รถจักรยานยนต์</b></h5></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                        <div class="header__nav" style="padding: 30px;">
                                <nav class="header__menu" style="text-align:left;margin-left: 20px;">
                            
                            <ul>
                            @guest
                            <li>
                                <a href="{{ url('/wishlist') }}"><i class="far fa-heart"></i></a>
                            </li>
                            <li tyle="padding-right: 20px;">
                                <a  href="{{ route('login') }}?redirectTo={{ url()->full() }}"  >เข้าสู่ระบบ / สมัครสมาชิก</a>
                            </li>
                            
                                <a href="{{ url('/sell') }}" class="primary-btn" style="color: white;margin-left: 15px;border-radius: 10px;">ลงขาย</a>
                            

                                @else
                                <li>
                                    <a href="{{ url('/wishlist') }}"><i class="far fa-heart"></i></a>
                                </li>
                                <li tyle="padding-right: 20px;">
                                    <input type="hidden" name="name_user" id="name_user" value="{{ Auth::user()->name }}">
                                    <a aria-haspopup="true" aria-expanded="false" v-pre href="#">
                                       <center>
                                           <span id="input_name"></span>
                                       </center>
                                     
                                        
                                    </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('/register_car') }}">
                                                 รถของฉัน</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/profile') }}" > โปรไฟล์ </a>
                                            </li>
                                            @if(Auth::check())
                                                @if(Auth::user()->role == "admin" )
                                                    <li>
                                                        <a href="{{ url('/dashboard') }}" target="blank"> Admin</a>
                                                    </li>
                                                @endif
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>
                                        </ul>
                                </li>
                                    <a href="{{ url('/sell') }}" class="primary-btn " style="color: white;margin-left: 35px;border-radius: 10px;">ลงขาย</a>
                                @endguest
                            </ul> 
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>

     <!-- <div class="breadcrumb-option set-bg" data-setbg="https://images.pexels.com/photos/3422964/pexels-photo-3422964.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"></div>  -->
     <!-- <img src="https://www.w3schools.com/w3css/img_snow_wide.jpg" alt="Snow" style="width:100%;   padding-right: 8%;  padding-left: 8%;"> -->


    @yield('content')



    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <!-- <p>Any questions? Let us know in store at 625 Gloria Union, California, United Stated or call us
                            on (+1) 96 123 8888</p> -->
                        <div class="footer__social">
                            <a href="https://www.facebook.com/ViiCheck-100959585396310" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="google"><i class="fab fa-youtube"></i></a>
                        
                        </div>
                        
                    </div>
                </div>

                <!-- <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="footer__widget">
                        <h5>Infomation</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Purchase</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Payemnt</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Shipping</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Return</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer__widget">
                        <h5>Infomation</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Hatchback</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Sedan</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> SUV</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Crossover</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer__brand">
                        <h5>Top Brand</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Abarth</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Acura</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Alfa Romeo</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Audi</a></li>
                        </ul>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> BMW</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Chevrolet</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Ferrari</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Honda</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <div class="footer__copyright__text">
                <p>
                    <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script>  -->
                    WWW.ViiCHECK.COM 
                    <a class="btn btn-link" style="font-size: 15px;" target="bank" href="{{ url('/privacy_policy') }}"><b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></a>
                    <a class="btn btn-link" style="font-size: 15px;" target="bank" href="{{ url('/terms_of_service') }}"><b>ข้อกำหนดและเงื่อนไขการใช้บริการ</b></a>
                    <br><h7>รูปภาพที่ใช้ในการพัฒนาในเว็บไซต์ อ้างอิงจาก www.one2car.com</h7>
                </p>
            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

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
        console.log("START");

        var name_user = document.querySelector("#name_user");
            console.log(name_user.value);

            fetch("{{ url('/') }}/api/explode_name/" + name_user.value)
                .then(response => response.json())
                .then(result => {
                    console.log(result[0]);
                    let input_name = document.querySelector("#input_name");
                    input_name.innerHTML = result[0];
                    
                    
                });
    });
</script>

</html>