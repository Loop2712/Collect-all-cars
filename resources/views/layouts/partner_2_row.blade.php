
<!-- carousel -->
<link href="{{ asset('carousel-12/css/owl.carousel.min.css') }}" rel="stylesheet">

<div class="col-12 owl-4-style align-self-center">
    <div class="owl-carousel owl-4">
        @php
          $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
        @endphp
        @foreach($partner as $item)
            @if($loop->iteration % 2 != 0)
            <div class="item" style="padding:5px;z-index:-1;">
                <div class="testimon">
                    <a href="{{$item->link}}" target="bank">
                        <img class="login-w-120 p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                    </a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <div class="col-12 d-block d-md-none"><br> <br></div>
    
    <div class="owl-carousel owl-4 mt-3 partner_2_row_login">
        @php
          $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
        @endphp
        @foreach($partner as $item)
            @if($loop->iteration % 2 == 0)
                <div class="item" style="padding:5px;z-index:-1;">
                    <div class="testimon">
                        <a href="{{$item->link}}" target="bank">
                            <img class="login-w-120 p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-12 d-block d-md-none"><br> <br></div>
</div>   
<script src="{{ asset('js/car/owl.carousel.min.js')}}"></script>
<script src="{{ asset('carousel-12/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/popper.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/main.js') }}"></script> 