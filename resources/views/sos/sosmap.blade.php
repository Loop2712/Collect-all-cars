@extends('layouts.sos')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-12" style="margin-top:15px; margin-bottom:10px" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4989368.068715823!2d100.32470292487557!3d14.23861745451566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1625474458473!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-3" >
                <center>
                    <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #188038;">
                    <i class="fas fa-gas-pump" style="color:white"></i>
                    </button>
                    <p style="font-size:1px; text-align: center; margin-top:10px;color:#B3B6B7; ">ปั๊มน้ำมัน</p>
                </center>
            </div>
            <div class="col-3" >
                <center>    
                    <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #129EAF;">
                    <i class="fad fa-garage-open" style="color:white"></i>
                    </button>
                    <p style="font-size:1px; text-align: center; margin-top:10px;color:#B3B6B7; ">ศูนย์บริการรถยนต์</p>
                </center>
            </div>
            <div class="col-3" >
                <center>
                    <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #C5221F;">
                    <i class="far fa-hospital" style="color:white"></i>
                    </button>
                    <p style="font-size:3px; text-align: center; margin-top:10px;color:#B3B6B7; ">โรงพยาบาล</p>
                </center>
            </div>
            <div class="col-3" >
                <center>
                    <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #E37400;">
                    <i class="fad fa-siren-on" style="color:white"></i>
                    </button>
                    <p style="font-size:1px; text-align: center; margin-top:10px;color:#B3B6B7; ">สถานีตำรวจ</p>
                </center>
            </div>

        <div class="col-12" style="margin-top:-10px;">
            <div class="row">
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">เหตุด่วนเหตุร้าย</p>
                    <a class="btn btn-danger btn-block" href="tel:191" style="margin-top:-10px">191</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ไฟไหม้รถ</p>
                    <a class="btn btn-danger btn-block" href="tel:199" style="margin-top:-10px">199</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">หน่วยแพทย์กู้ชีวิต</p>
                    <a class="btn btn-danger btn-block" href="tel:1669" style="margin-top:-10px">1669</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">จ.ส.100</p>
                    <a class="btn btn-danger btn-block" href="tel:1137" style="margin-top:-10px">1137</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">สายด่วนทางหลวง</p>
                    <a class="btn btn-danger btn-block" href="tel:1193" style="margin-top:-10px">1193</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ทนายอาสา</p>
                    <a class="btn btn-danger btn-block" href="tel:1167" style="margin-top:-10px">1167</a>
                </div>
            </div>
        </div>

    </div>
</div>
<br><br>
@endsection