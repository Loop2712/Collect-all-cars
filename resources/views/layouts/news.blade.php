<!DOCTYPE html>
<html lang="en">

<head>

    @yield('meta')
    

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

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    
</head>

<body>
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
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="header__logo">
                                <a href="{{URL::to('/')}}"><img width="200px" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </header>
    

    @yield('content')


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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/car/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/car/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/car/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/car/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/car/main.js')}}"></script>
</body>

</html>