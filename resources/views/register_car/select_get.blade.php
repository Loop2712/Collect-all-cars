@extends('layouts.main')

@section('content')
<!-- แสดงเฉพาะคอม -->
<div class="container d-none d-lg-block">
    <center>
        <div class="row">
            <div class="col-8 offset-2 main-shadow">
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div><br><br>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="100%" src="{{ asset('/img/more/sticker-VII-v1.png') }}"/>
                                </div>
                                <br>
                                <button style="padding-left: 95px;padding-right: 95px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v1').click(); "> Download
                                </button>
                            </center>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <center>
                                <div><br><br>
                                    <!-- <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://market.viicheck.com/guest/create/&choe=UTF-8"  /> -->
                                    <img width="100%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}"/>
                                </div>
                                <br>
                                <button style="padding-left: 95px;padding-right: 95px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v2').click(); "> ดาวน์โหลด
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download >
                        <div class="row">
                            <div class="col-3">
                                <br><br><br>
                                    <img  width="110%" src="{{ asset('/img/stickerline/PNG/25.png') }}">
                                <br><br><br>
                            </div>
                            <div class="col-9">
                                <br><br><br><br>
                                <h4 style="line-height: 2;">ปริ้นและนำไปแปะไว้หน้ารถได้เลยค่ะ</h4>
                                    <hr>
                                    <p>Print & put on the windscreen of your car.</p>
                                
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </center>
</div>
<a class="d-none" id="sticker_v1" href="{{ asset('/img/more/sticker-VII-v1.png') }}" download ></a>
<a class="d-none" id="sticker_v2" href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download ></a>
<!-- แสดงเฉพาะมือถือ -->
<div style="margin-left: 2px;" class="container d-block d-md-none">
    <center>
        <div class="row">
            <div class="col-12 main-shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <br>
                                        <img style="margin-left: -20px;" width="200%" src="{{ asset('/img/stickerline/PNG/25.png') }}">
                                    <br>
                                </div>
                                <div class="col-9">
                                    <br>
                                    <h4 style="line-height: 2;">ปริ้นและนำไปแปะไว้หน้ารถได้เลยค่ะ</h4>
                                    <hr>
                                    <p>Print & put on the windscreen of your car.</p>
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
                                <br>
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
                                <br>
                                <button style="padding-left: 40px;padding-right: 40px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;"  class="btn btn-danger main-shadow" onclick="document.getElementById('sticker_v2').click(); "> ดาวน์โหลด
                                </button>
                                <br><br>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
@endsection
