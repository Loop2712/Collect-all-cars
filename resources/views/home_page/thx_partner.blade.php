<div class=" notranslate" style="margin-top:-20px;">
  <div class="site-section bg-left-half mb-5"style="padding:80px 0px 80px 0px">
    <div class=" owl-2-style">
      <div class="section-title">
        <h2 style="font-family: 'Kanit', sans-serif;">Powered by</h2>
      </div>
      <div class="owl-carousel owl-2">
        
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 120px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/js100.png') }}">
            <h5 class="text-danger thx_partner">จส.100</h5>
          </center>
        </div>

        @foreach($data_partner_show as $item_show)
          <div class="media-29101 text-center">
            <center>
              <img style="width: 50%;height: 120px;object-fit: contain;padding: 10px;" src="{{ url('storage')}}/{{ $item_show->logo }}">
              <h5 class="text-danger thx_partner">{{ $item_show->full_name }}</h5>
            </center>
          </div>
        @endforeach

        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 120px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/logo-ph.png') }}">
            <h5 class="text-danger thx_partner" >PeddyHub</h5>
          </center>
        </div>


        <!-- <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/IMPACT.jpg') }}">
            <h5 class="text-danger thx_partner">IMPACT</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/KMUTNB.png') }}">
            <h5 class="text-danger thx_partner">KMUTNB</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/RMUTP.png') }}">
            <h5 class="text-danger thx_partner">RMUTP</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/TU.png') }}">
            <h5 class="text-danger thx_partner">TU</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/southerncoffee-1.png') }}">
            <h5 class="text-danger thx_partner">Southern Coffee</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/การท่าเรือแห่งประเทศไทย.png') }}">
            <h5 class="text-danger">การท่าเรือแห่งประเทศไทย</h5>
          </center>
        </div>
        <div class="media-29101 text-center">
          <center>
            <img style="width: 40%;height: 100px;object-fit: contain;padding: 10px;" src="{{ url('/img/logo-partner/ตลาดคลองเตย.png') }}">
            <h5 class="text-danger thx_partner" >บริษัท ตลาดคลองเตย (2551) จำกัด</h5>
          </center>
        </div> -->
        
      </div>
    </div>
  </div>
</div>
    
  <script src="{{ asset('carousel-12/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/popper.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('carousel-12/js/main.js') }}"></script>             
