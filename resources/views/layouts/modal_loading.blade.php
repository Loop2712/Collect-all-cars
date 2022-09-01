@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br><br>
@include ('layouts.partner_2_row')
<br><br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_thx">
  Launch demo modal
</button>

<div class="modal fade " data-keyboard="false" id="modal_thx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-end" style="padding: 15px;">
                <div class="line-spinner"></div>
            </div>
            <div class="modal-body text-center">
                <img width="60%" src="{{ url('/img/stickerline/PNG/10.png') }}">
                <br>
                <center style="margin-top:15px;">
                    <h6 style="font-family: 'Kanit', sans-serif;">กำลังโหลด โปรดรอสักครู่..</h6>
                </center>
                <br>
                <h5 style="font-family: 'Kanit', sans-serif;">สนับสนุนโดย</h5>
                <div class="col-12 owl-style align-self-center" style="padding:0px;">
                    <div class="owl-carousel owl-4">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                            @if($loop->iteration % 2 == 0)
                            <div class="item" style="padding:0px;z-index:-1;">
                                <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="owl-carousel owl-4">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                            @if($loop->iteration % 2 != 0)
                                <div class="item" style="padding:0px;z-index:-1;">
                                    <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  @keyframes bouncing-loader {
  to {
    opacity: 0.1;
    transform: translate3d(0, -0.5rem, 0);
  }
}
.bouncing-loader {
  display: flex;
  justify-content: center;
}
.bouncing-loader > div {
  width: 0.3rem;
  height: 0.3rem;
  margin: 1rem 0.2rem;
  background: #8385aa;
  border-radius: 50%;
  animation: bouncing-loader 0.6s infinite alternate;
}
.bouncing-loader > div:nth-child(3) {
  animation-delay: 0.2s;
}
.bouncing-loader > div:nth-child(4) {
  animation-delay: 0.4s;
}
.owl-item{
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: auto !important;
}
.owl-stage {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;

    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
</style>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-loading">
  Launch demo modal
</button>

<div class="modal fade" id="btn-loading" tabindex="-1" role="dialog" aria-labelledby="btn-loading" aria-hidden="true" data-backdrop="static" data-keyboard="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="border-radius: 25px;">
      <div class="modal-body text-center" >
        <img width="60%" src="{{ url('/img/icon/cars.gif') }}">
        <br>
        <center style="margin-top:15px;">
                <div class="bouncing-loader">
                    <span style="font-family: 'Kanit', sans-serif;"> <b>กำลังโหลด โปรดรอสักครู่</b> </span>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
        </center>
        <h4 style="font-family: 'Kanit', sans-serif;"><b>สนับสนุนโดย</b> </h4>
        <div class="row">
            <div class="col-12">
                <div class=" owl-4-style">
                    <div class="owl-carousel owl-4 ">
                        <!-- <span id="foot_logo_partner"></span> -->
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                            @if($loop->iteration % 2 == 0)
                            <div class="item" style="padding:0px;z-index:-1;">
                                <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class=" owl-4-style">
                    <div class="owl-carousel owl-4 ">
                        @foreach($partner as $item)
                            @if($loop->iteration % 2 != 0)
                                <div class="item" style="padding:0px;z-index:-1;">
                                    <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
