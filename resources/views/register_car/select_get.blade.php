@extends('layouts.viicheck')

@section('content')
<!-- แสดงเฉพาะคอม -->
<div class="container d-none d-lg-block" style="margin-top:168px; ">
    <center>
        <div class="row">
            <div class="col-8 offset-2 main-shadow">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8 offset-2">
                                <br><br>
                                <center>
                                    <img  width="75%" src="{{ asset('/img/stickerline/PNG/25.png') }}">
                                </center>
                            </div>
                            <div class="col-12">
                                <br>
                                <center>
                                    <h4 style="line-height: 2;">ปริ้นท์และนำไปแปะรถของท่านได้เลยค่ะ</h4>
                                    <p>Print & put on the windscreen of your car.</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="100%" src="{{ asset('/img/more/sticker-VII-v1.png') }}"/>
                                </div>
                                <button style="padding-left: 95px;padding-right: 95px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v1').click(); "> Download
                                </button>
                            </center>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="100%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}"/>
                                </div>
                                <button style="padding-left: 95px;padding-right: 95px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v2').click(); "> ดาวน์โหลด
                                </button>
                                <br><br>
                            </center>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://lin.ee/xnFKMfc">
                          <button type="button" class="btn btn-success" style="padding-left: 130px;padding-right: 130px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; border: none;">เสร็จสิ้น</button>
                        </a>
                        <br><br>
                    </di130
                </div>
            </div>
        </div>
    </center>
</div>
<br>
<a class="d-none" id="sticker_v1" href="{{ asset('/img/more/sticker-VII-v1.png') }}" download ></a>
<a class="d-none" id="sticker_v2" href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download ></a>
<!-- แสดงเฉพาะมือถือ -->
<div style="margin-left: 2px; margin-top:110px;"  class="container d-block d-md-none">
    <center>
        <div class="row">
            <div class="col-12 main-shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8 offset-2">
                                    <center>
                                        <img  width="90%" src="{{ asset('/img/stickerline/PNG/25.png') }}">
                                    </center>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <center>
                                        <h6 style="line-height: 2;">ปริ้นท์และนำไปแปะรถของท่านได้เลยค่ะ</h6>
                                        <p>Print & put on the windscreen of your car.</p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-left: -35px;" class="row">
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="120%" src="{{ asset('/img/more/sticker-VII-v1.png') }}"/>
                                </div>
                                <button style="padding-left: 40px;padding-right: 40px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v1').click(); "> Download
                                </button>
                                <br><br>
                            </center>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="120%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}"/>
                                </div>
                                <button style="padding-left: 40px;padding-right: 40px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v2').click(); "> ดาวน์โหลด
                                </button>
                                <br><br>
                            </center>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://lin.ee/xnFKMfc">
                          <button type="button" class="btn btn-success" style="padding-left: 70px;padding-right: 70px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; border: none;">เสร็จสิ้น</button>
                        </a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
<br>
@endsection
