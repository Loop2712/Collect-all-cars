<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
    <title>viicheck</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krub:wght@200&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="{{URL::to('/')}}"><img width="150px" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{URL::to('/')}}"><img width="200px" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header__nav">
                        <div class="header__menu" style="text-align:left;margin-left: 20px;">
                            <ul>
                                <li>
                                <a href="{{ url('/car') }}" >รถยนต์มือสอง</a>
                                </li>
                                <li>
                                <a href="{{ url('/motercycle') }}" >รถจักรยานต์ยนต์มือสอง</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header__nav">
                        <nav class="header__menu">
                            <ul>
                                
                                
                                @guest
                                    <li >
                                        <a  href="{{ route('login') }}" >ขายรถ</a>
                                    </li> 
                                    <li>
                                        <a href="{{ route('login') }}">รายการโปรด</a>
                                    </li>
                                    <li >
                                        <a  href="{{ route('login') }}?redirectTo={{ url()->current() }}" >เข้าสู่ระบบ / สมัครสมาชิก</a>
                                    </li> 
                                    <li>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Launch demo modal
                                        </button>
                                    </li>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div>
                                                        <div class="card-body">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8 offset-md-2">
                                                                <center>
                                                                    <div class="row">
                                                                    <!-- ซ้าย -->
                                                                        <!-- <div class="col-12 col-md-6">
                                                                            <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                                                            <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                                                            <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                                                        </div> -->
                                                                        <!-- ขวา -->
                                                                        <!-- <div class="col-12 col-md-6">
                                                                            <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                                                            <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                                            <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                                                        </div> -->

                                                                        <div class="col-12 col-md-12">
                                                                            <a href="{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                                            <br>
                                                                            <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a>
                                                                            <br><br>
                                                                            <a class="btn btn-link text-muted" onclick="document.querySelector('#from_login').classList.remove('d-none')">เข้าสู่ระบบด้วยชื่อผู้ใช้</a>
                                                                        </div>
                                                                        <div class="col-12 col-md-12">
                                                                            <br>
                                                                            <a class="btn btn-link text-muted" href="{{ route('register') }}">สมัครสมาชิก</a>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <br>
                                                            <form class="d-none" method="POST" id="from_login" action="{{ route('login') }}?redirectTo={{ request('redirectTo') }}">
                                                                @csrf

                                                                <div class="form-group row">
                                                                    <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label> -->
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-8">
                                                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ชื่อผู้ใช้" required autocomplete="username">

                                                                        @error('username')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label> -->
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-8">
                                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required autocomplete="current-password">

                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-md-8 offset-md-2">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                            <label class="form-check-label" for="remember">
                                                                                {{ __('จดจำฉัน') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-8 offset-md-2">
                                                                        <div class="row">
                                                                            <center>
                                                                                <div class="col-md-11">
                                                                                    <button style="padding-left: 106px;padding-right: 106px;" type="submit" class="btn btn-primary">
                                                                                        {{ __('เข้าสู่ระบบ') }}
                                                                                    </button>
                                                                                    @if (Route::has('password.request'))
                                                                                        <a class="btn btn-link text-muted float-left" href="{{ route('password.request') }}">
                                                                                            {{ __('ลืมรหัสผ่าน ?') }}
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                            </center>
                                                                        </div>
                                                                        <br>
                                                                        <!-- <div class="row"> -->
                                                                            <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                                                            <!-- <span style="margin-top: -10px;color: #ccc;text-transform: uppercase;text-align: center;" class="col-md-12">
                                                                                หรือ
                                                                            </span> -->
                                                                            
                                                                            <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                                                            <!-- <center>
                                                                                <div class="row">
                                                                                
                                                                                    <div class="col-12 col-md-6">
                                                                                        <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                                                                        <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                                                                        <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-12 col-md-6">
                                                                                        <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                                                                        <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                                                        <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                                                                    </div>
                                                                                </div>
                                                                            </center> -->
                                                                        <!-- </div> -->
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="col-md-12">
                                                                <center>
                                                                    <P><br>การลงชื่อเข้าใช้หมายความว่าคุณยอมรับ<br></P> <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> <b>ข้อกำหนดในการให้บริการ</b></a>
                                                                    <br><br><br>
                                                                    <img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                @else
                                    <li >
                                        <a  href="{{ url('/sell') }}" >ขาย</a>
                                        <ul class="dropdown">
                                                <li>
                                                    <a href="{{ url('/sell') }}" >รถยนต์</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/motercycles') }}" >รถมอเตอร์ไซต์</a>
                                                </li>
                                        </ul>
                                    </li> 
                                    <li>
                                        <a href="{{ url('/wishlist') }}">รายการโปรด</a>
                                    </li>
                                    <li>
                                        <a aria-haspopup="true" aria-expanded="false" v-pre href="#">
                                        <!-- <img src=""style=" width: 30px;height: 30px;border-radius: 50%;" alt=""> -->
                                            {{ Auth::user()->name }}
                                        </a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="{{ url('/profile') }}" > Profile</a>
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
                                @endguest
                            </ul>
                        </nav>
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
            <!-- <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>Any questions? Let us know in store at 625 Gloria Union, California, United Stated or call us
                            on (+1) 96 123 8888</p>
                        <div class="footer__social">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google"><i class="fa fa-google"></i></a>
                            <a href="#" class="skype"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3">
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
                </div>
            </div> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <div class="footer__copyright__text">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('js/car/jquery-3.3.1.min.js')}}"></script>
    <!-- <script src="{{ asset('js/car/bootstrap.min.js')}}"></script> -->
    <script src="{{ asset('js/car/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/car/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/car/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/car/main.js')}}"></script>
    
</body>

</html>