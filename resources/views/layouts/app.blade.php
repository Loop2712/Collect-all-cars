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


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style> 
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

    </style>

</head>
<body style="background-image: url('{{ asset('/img/hero-bg.jpg') }}');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;">
    <div id="app">
        <div class="header__logo">
            <br>
            <center>
                <img width="150" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
            </center>        
        </div>
        <main class="py-5">
            <div class="container">
                <div class="row">

                    @yield('content')
                    
                </div>
            </div>
        </main>

    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
