            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">

                            <!-- .........  LOGO  ......... -->
                            
                            <a href="{{URL::to('/car')}}">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Free_logo.svg/1200px-Free_logo.svg.png" alt="Logo">

                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search" >

                            <!-- .........  Search  ......... -->
                            <form action="{{URL::to('/car')}}" method="get" >
                                <input type="text" placeholder="search" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="navbar-nav mr-auto">

                            <!-- .........  Login  ......... -->
                            @guest
                            
                            <li class="nav-item dropdown">
 
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"></i>{{ __('Login') }}</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        @endguest
                                
                            
                            
                        </div>
                    </div>
                </div>
            </div>