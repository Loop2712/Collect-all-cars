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
                                <div class="testimon">
                                    <a href="#">
                                        <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                                </div>
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
                                    <div class="testimon">
                                        <a href="#">
                                            <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
