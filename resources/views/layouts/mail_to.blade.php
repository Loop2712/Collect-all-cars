<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>ViiCHECK</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('Medilab/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
            .circle {
              width: 330px;
              height: 150px;
              border-radius: 50%;
              font-size: 22px;
              color: #fff;
              line-height: 155px;
              text-align: center;
              background: radial-gradient(
                ellipse at center,
                rgba(0, 128, 172, 1) 0%,
                rgba(0, 118, 162, 1) 70%,
                rgba(0, 108, 172, 0) 70.3%
              );
            }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <br>
                    <img width="200" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"> 
                    <div style="float: right;margin-top: 40px;" id="google_translate_element"></div>
                </div>
                <hr style="color:red;">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
