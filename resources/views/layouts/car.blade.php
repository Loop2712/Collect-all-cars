<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  

  <!-- Custom StyleSheet -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <title>Car</title>
</head>

<body>

  <!-- Navigation -->
  
    <nav class="nav">
    <div class="wrapper container">
      <div ><a href="{{URL::to('/car')}}">LOGO</a></div>
      <ul class="nav-list">
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        
        @guest
                            <li >

                                <a class="desktop-item" href="{{ route('login') }}"><i class="fas fa-user"></i>   {{ __('Login') }}</a>
                            </li>
                            
                        @else
                            <li >
                                <a class="desktop-item"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span><i class="fas fa-chevron-down"></i></span>
                                </a>
                                <input type="checkbox" id="showdrop1" />
                                <label for="showdrop1" class="mobile-item">Dropdown <span><i class="fas fa-chevron-down"></i></span></label>
                                    <ul class="drop-menu1">
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
  @yield('content')


  <footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>


  <!-- Custom Scripts -->
  <script src="{{ asset('js/products.js') }}"></script>
  <script src="{{ asset('js/slider.js') }}"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>




