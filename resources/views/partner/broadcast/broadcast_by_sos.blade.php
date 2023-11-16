@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    .header{
        font-family: 'Kanit', sans-serif;
        padding: 15px;
        align-items: center;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    .text-filter h4 {
        color:#db2d2e;
    }
    .text-result h4 {
        color:#3b5998;
    }
    .filter{
        border-top: red solid 4px;
        border-radius: 20px;
    }
    .result{
        border-top: #3b5998 solid 4px;
        border-radius: 20px;
    }
    .form-filter{
        padding: 10px;
    }
    .form-filter .form-label{
        font-family: 'Kanit', sans-serif;

    }
    .select-form{
        font-family: 'Kanit', sans-serif;
        margin-bottom: 10px;
        border-radius: 9px;
    }
    .form-filter button{
        font-family: 'Kanit', sans-serif;
        margin-top: 10px;
    }
    .div-result{
        padding: 10px 20px 10px 20px;
    }
    .div-result .result-content{
        border-radius: 15px;
        background-color: #DAE3F8;
        cursor: pointer;
    }

    .div-result .result-selected{
        border-radius: 15px;
        background-color: #A8D1B8;
        cursor: pointer;
    }
    .div-result .result-car{

        padding: 10px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .div-result .result-car .result-header{
        white-space: nowrap;
        width: 60%;
        overflow: hidden;
        text-overflow: ellipsis;
        display: flex;
        flex-direction: column;
        font-family: 'Kanit', sans-serif;
        padding-left: 5px;
        line-height: 110%;

    }
    .result-header .name-brand{
        font-size: 20px;
        font-family: 'Kanit', sans-serif;
        font-weight: bold;

    }

    .result-content .license-plate{
        text-align: center;
        font-family: 'Kanit', sans-serif;
        line-height: 110%;
        padding-bottom: 10px;

    }
    .result-content .license-plate h5{
        margin: 0;
    }
    .div-result .result-car img{
        height: 30px;
    }
    .container-data-car {
        justify-content: space-around;
        align-items: flex-start;
    }

    .section-filter {
        position: -webkit-sticky;
        position: sticky;
        top: 4rem;
    }
    @media (min-width:1281px) {
        .section-filter{
            max-height: 85vh;
            overflow:auto;
            min-width: 100%;
            padding: 5px;
        }
        .section-filter::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .section-filter::-webkit-scrollbar
        {
            width: 5px;
            background-color: #F5F5F5;
        }

        .section-filter::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: red;

        }
    }
    .status{
        margin-top: -15px;
    }
.text-selected {
    justify-content: center;


    display: flex;

}
.text-selected h5{
    color:#3b5998;

  font-family: 'Kanit', sans-serif;
}.phone-frame{
    border-radius: 40px;
    border: black 12px solid;
    flex-direction:  column;
    font-family: 'Kanit', sans-serif;
    padding:0px 10px 0px 10px;
    min-width: 300px;
    max-width: 300px;

}
.phone-camera{
    padding: 0px;
    border-radius: 0px 0px 15px 15px;
    color: black;
    background-color: black;
}
.phone-icon{
    font-size: 10px;


}
.phone-header{
    background-color: #8CABD9;
    flex-direction:  row;

}
.phone-name{
    padding: 10px 10px 10px 10px;
}
.phone-icon-header{
    display: flex;
     align-items: center;
}
.phone-footer{
    padding: 10px 10px 10px 20px;
}
.richmenu{
    z-index: 99;
    padding: 0;
}
.phone-content{
    background-color: #8CABD9;
    padding:0px;
    display: flex;
    align-items: flex-start;
    height: 250px;
    z-index: 1;
}
.no-richmenu{
    height: 420px !important;
}
.sand{
animation: myAnim 1s ease 0s 1 normal forwards;
}

@keyframes myAnim {
	0% {
		transform: translateY(180px);
	}

	100% {
		transform: translateY(0);
	}
}

.remove-scrollbar::-webkit-scrollbar {
    display:none;
}

.div_alert{
  position: fixed;
  top: 115%;
  bottom: 0;
  left: 0;
  width: 100%;
  text-align: center;
  font-family: 'Kanit', sans-serif;
  z-index: 9999;

}
.div_alert span{
  background-color: #D64646;
  border-radius:10px;
  color:white;
  padding:15px;
  font-family: 'Kanit', sans-serif;
  z-index: 9999;

}
.up_down{
  animation: up-down 2s cubic-bezier(0.5, 0, 0.75, 0) 1s 2 alternate-reverse both;
}

@keyframes up-down {
	0% {
		opacity: 1;
		transform: translateY(-20vh);
	}

	100% {
		opacity: 0;
		transform: translateY(0vh);
	}
}

/*-------- modal loading ------------*/
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
.form-select-car{
    font-family: 'Kanit', sans-serif;
    font-size: 16px;
}
.btn-select{
    border-radius:12px;
    font-family: 'Kanit', sans-serif;
} .button-reset-img {
	display: flex;
	height: 30px;
	padding: 0;
	background: #FF6961;
	border: none;
	outline: none;
	border-radius: 5px;
	overflow: hidden;
	font-family: "Quicksand", sans-serif;
	font-size: 12px;
	font-weight: 500;
	cursor: pointer;
    float: right;
    margin: 5px;
}

.button-reset-img:hover {
	background: #FD4B41;
}

.button-reset-img:active {
	background: #F13E34;
}

.button-reset-img-text,
.button-reset-img-icon {
	display: inline-flex;
	align-items: center;
	padding: 0 5px;
	color: #fff;
	height: 100%;
}

.button-reset-img-icon {
	font-size: 1em;
	background: rgba(0, 0, 0, 0.08);
} @media (min-width:1281px) {
        .owl-carousel{
            padding: 0px 100px;

        }
        .owl-carousel .owl-nav{
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .owl-carousel .owl-nav .owl-prev{
            background-color: #000000;
            border-radius: 50%;
        margin-left: -100px;
        margin-top: -25%;
    }
    .owl-carousel .owl-nav .owl-next{
        background-color: #000000;
        border-radius: 50%;
        margin-right: -100px;
        margin-top: -25%;

    }
    .content{
        padding: 0px 100px;
    }
  }

  @media (min-width:200px) and (max-width:1200px){
    .owl-nav{
        display: none;
    }
  }.item-content{
        background-color: #DAE3F8;
        border-radius: 20px;
        padding: 10px 10px;
    }
    .item-content h5{
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }.img-content img{
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
    }.content-status{
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }.content-status h6{
        margin: 0px;
    }
    .icon-circle{
        margin: 10px;
    }
    .icon-circle-hover {
        transition: transform .2s; /* Animation */
        opacity: 0;
        margin: 10px;
    }
    .item-content:hover .icon-circle-hover{
        transform: scale(1.2);
        opacity: 1;
    }
    #lat_lng_div {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform-origin: top;
    }
    #lat_lng_div_sos {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform-origin: top;
    }

    /* =================ตัว loading animation==================== */
    #lds-ring {
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 1); /* ปรับสีพื้นหลังตามความต้องการ */
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 28px;
        height: 28px;
        margin: 8px;
        border: 8px solid #2f0cf3;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #1a6ce7 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    /* ----------------- End ตัว loading animation ----------------- */


</style>
  <!-- carousel -->
  <link href="{{ asset('carousel-12/css/owl.carousel.min.css') }}" rel="stylesheet">

    <div id="user_max" class="div_alert d-none" role="alert">
        <span id="text_user_max">
            ขออภัย เกินจำนวนที่กำหนด
        </span>
    </div>

<!-- MODAL LOADING -->
<div class="modal fade" id="btn-loading" tabindex="-1" role="dialog" aria-labelledby="btn-loading" aria-hidden="true" data-backdrop="static" data-keyboard="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="border-radius: 25px;">
      <div class="modal-body text-center" >
        <img class="mt-3" width="60%" src="{{ url('/img/icon/cars.gif') }}">
        <br>
        <center style="margin-top:15px;">
            <div class="bouncing-loader">
                <span style="font-family: 'Kanit', sans-serif;"> <b>กำลังโหลด โปรดรอสักครู่</b> </span>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </center>
    </div>
  </div>
</div>
</div>
<div id="car_max" class=" div_alert" role="alert">
        <span id="text_user_max">
            ขออภัย เกินจำนวนที่กำหนด
        </span>
</div>

<form method="POST" action="{{ url('/') }}/api/send_content_BC_by_user" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input class="form-control d-none" type="text" name="arr_user_id_send_to_user" id="arr_user_id_send_to_user" readonly>

    <input class="form-control d-none" type="text" name="arr_user_id_selected" id="arr_user_id_selected" readonly>
    <input class="form-control d-none" type="text" name="type_content" id="type_content" value="BC_by_car">
    <input class="form-control d-none" type="text" name="name_partner" id="name_partner" value="{{ $name_partner }}">
    <input class="form-control d-none" type="text" name="id_partner" id="id_partner" value="{{ $partner_id }}">

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;font-family: 'Kanit', sans-serif;">
                                    กำหนดบรอดแคสต์
                                </h5>
                                <div>
                                    <a class="btn btn-warning btn-sm text-white main-shadow main-radius " onclick="reset_BC();">
                                        <i class="fas fa-sync"></i> reset
                                    </a>
                                    <button type="button" class="close btn btn-md" data-dismiss="modal" aria-label="Close">
                                        <span style="font-size: 28px;" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12" style="font-family: 'Kanit', sans-serif;">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <h4 class="text-dark float-start">สร้างเนื้อหาใหม่</h4>
                                            </div>
                                            <div class="col-3">
                                                <span id="btn_select_text_content" style="width:80%;" class="btn btn-outline-primary main-shadow main-radius" onclick="switch_type_content('text');">
                                                    ข้อความ
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <span id="btn_select_img_content" style="width:80%;" class="btn btn-primary main-shadow main-radius" onclick="switch_type_content('img');">
                                                    รูปภาพ
                                                </span>
                                            </div>
                                            <div class="col-12 d-none">
                                                <input class="d-none" type="text" name="type_content_bc" id="type_content_bc" value="img">
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- name content -->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group {{ $errors->has('name_content') ? 'has-error' : ''}}">
                                                    <label for="name_content" class="control-label">{{ 'ชื่อเนื้อหา' }}</label>
                                                    <input style="border-radius: 10px;" class="form-control" name="name_content" type="text" id="name_content" value="" onchange="check_send_content();">
                                                </div>
                                                <br>
                                            </div>
                                            <!-- IMG -->
                                            <div class="col-6" id="div_bc_img">
                                                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                                                    <label for="link" class="control-label">{{ 'ลิงก์' }}</label>
                                                    <input  style="border-radius: 10px;"class="form-control" name="link" type="text" id="link" value="" onchange="check_send_content();">
                                                </div>
                                                <br>
                                            </div>
                                            <!-- TEXT -->
                                            <div class="col-12 d-none" id="div_bc_text">
                                                <textarea class="form-control" id="detail" name="detail" rows="4" placeholder="เพิ่มข้อความของคุณที่นี่" oninput="document.querySelector('#add_text_content').innerHTML = document.querySelector('#detail').value ;check_send_content();"></textarea>
                                            </div>

                                            <div id="div_user_unique" class="col-12 d-none d-flex align-items-center">
                                                <input class="" name="user_unique" type="checkbox" id="user_unique" value="" style="border-radius:50px;width:20px;height: 20px;cursor: pointer;" onclick="check_user_unique();">
                                                    &nbsp;<label for="user_unique" style="cursor: pointer;">ไม่ซ้ำกับผู้ใช้ที่เคยส่งแล้ว</label>
                                                <!-- &nbsp; ไม่ซ้ำกับผู้ใช้ที่เคยส่งแล้ว -->
                                                <br>
                                            </div>
                                            <div class="col-12 d-none">
                                                <div class="form-group {{ $errors->has('arr_show_user') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="arr_show_user" type="text" id="arr_show_user" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-3 d-none">
                                                <div class="form-group {{ $errors->has('send_again') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="send_again" type="text" id="send_again" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-3 d-none">
                                                <div class="form-group {{ $errors->has('id_ads') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="id_ads" type="text" id="id_ads" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-6 d-none">
                                                <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                                    <!-- <label for="photo" class="control-label">{{ 'รูปภาพ' }}</label> -->
                                                    <input class="form-control" name="photo" id="photo" type="file" accept="image/*" onchange="loadFile(event),check_send_content();">
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-6">
                                                <span style="font-size:20px;color:blue;">จำนวน <span id="span_amount_send">0</span> คน</span>
                                                <div class="d-none form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                                                    <!-- <label for="amount" class="control-label">{{ 'Amount' }}</label> -->
                                                    <input class="form-control" name="amount" type="text" id="amount" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button id="btn_send_content" style="float: right;width: 40%;" class="btn-select btn btn-success btn-md main-shadow main-radius" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" disabled onclick="document.querySelector('#btn_btn_send_content_submit').click();">
                                                        ยืนยัน
                                                    </button>
                                                    <input class="d-none" id="btn_btn_send_content_submit" type="submit" value="{{ 'ยืนยัน' }}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <br>

                                        <h4>เลือกเนื้อหา</h4>
                                        <br>
                                        <div class="owl-carousel owl-theme content">
                                            @foreach($ads_contents as $ads)
                                                <div class="item item-content ">
                                                    <h5>{{$ads->name_content}}</h5>
                                                    <div class="img-content">
                                                        @if ($ads->photo)
                                                            <img src="{{ url('storage')}}/{{ $ads->photo }}" alt="" style="width:100% ;">
                                                        @else
                                                            <img src="{{ asset("/img/stickerline/PNG/7.png") }}" alt="" style="width:100% ;">
                                                        @endif
                                                    </div>
                                                    <div class="content-status">
                                                        <div class="col-6">
                                                            <h6>
                                                                ส่ง {{ $ads->send_round }} ครั้ง
                                                            </h6>
                                                        </div >
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-6 col-lg-6 p-0 ">
                                                                    <h6 style="float: right; padding-right:10px;">
                                                                        <i class="fa-solid fa-user"></i> {{ $ads->count_show_user }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-12  col-6 col-lg-6 p-0" >
                                                                    <h6 style="float: right; padding-right:10px;">
                                                                        <i class="fad fa-eye"></i> {{ $ads->count_user_click }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span style="float: right;width: 100%;margin-top:15px;margin-bottom:5px;" class="btn-select btn btn-success btn-sm main-shadow main-radius" onclick="select_content_again('{{ $ads->id }}');">
                                                        เลือก
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- <div class="row text-center">

                                        </div> -->
                                        <div class="col-12">
                                            <p id="warn_BC_by_user_max" class=" text-danger mb-0" style="margin-top:15px;font-family: 'Kanit', sans-serif;">
                                                <!-- ข้อความแจ้งเตือน -->
                                            </p>
                                        </div>

                                    </div>
                                <!-- ----------------phone----------------- -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 col-lg-3">
                        <center>
                            <br class="mt-5 d-block d-md-none">
                            <div class="phone-frame ml-5 modal-content" style="padding-top: 0px;">
                                <div class="row">
                                    <div class="col-12 " style="background-color: #FFFFFF;  border-radius:50px 50px 0px 0px;margin-top:-0.5%">
                                        <div class="row">
                                        <div class="col-3 text-center">{{ date('H:i') }}</div>
                                        <div class="col-6 phone-camera"></div>
                                        <div class="col-3 d-flex align-items-center">
                                            <div class="col-12 p-0">
                                                <div class="row ">
                                                    <div class="col p-0 phone-icon"><i class="fa-sharp fa-solid fa-signal-bars"></i></div>
                                                    <div class="col p-0 phone-icon"><i class="fa-solid fa-wifi"></i></div>
                                                    <div class="col p-0 phone-icon"><i class="fa-solid fa-battery-full"></i></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="phone-header">
                                        <div class="row">
                                            <div class="col-7 phone-name ">
                                                <div class="row">
                                                    <div class="col-2 text-center"><i class="fa-solid fa-chevron-left"></i></div>
                                                    <div class="col-10 text-start p-0"> <img src="{{ asset('/img/icon/โล่.png') }}" alt="" width="8%"> ViiCHECK</div>
                                                </div>
                                            </div>
                                            <div class="col-5 phone-icon-header">
                                                <div class="row ">
                                                    <div class="col"><img src="{{ asset('/img/icon/search.png') }}" alt="" width="100%"></i></div>
                                                    <div class="col"><img src="{{ asset('/img/icon/document.png') }}" alt="" width="100%"></div>
                                                    <div class="col"><img src="{{ asset('/img/icon/more.png') }}" alt="" width="100%"></i></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- IMG SHOW CONTENT ----------------------------------------------------------------- -->
                                    <div id="show_img_content"  class="phone-content" >
                                        <div id="div_img" class="col-12 d-none remove-scrollbar div_img" style="min-width: 100%;max-height: 100%;overflow:auto;cursor: grab;">
                                            <div class="col-12" >
                                                <div id="send-img">
                                                    <img src="{{ asset('/img/logo/VII-check-LOGO-W-v3.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#db2d2e 1px solid ; background-color:white;margin:5px" alt="" width="13%">

                                                    <button id="img_exchange" type="button" class="button-reset-img" onclick="document.querySelector('#photo').click();">
                                                        <span class="button-reset-img-icon">
                                                            <i class="fa-solid fa-arrows-rotate"></i>
                                                        </span>
                                                        <span class="button-reset-img-text">Reset</span>
                                                    </button>
                                                    <img src="" alt="" width="100%" style="padding: 0px 5px;border-radius:10px" id="img-content"  >
                                                </div>
                                            </div>

                                            <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                        </div>
                                        <div id="div_add_img" class="col-12 remove-scrollbar" style="min-width: 100%;max-height: 250px;overflow:auto;cursor: grab;" onclick="document.querySelector('#photo').click();">
                                            <div class="col-12" >
                                                <div id="send-img">
                                                    <img src="{{ asset('/img/logo/VII-check-LOGO-W-v3.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#db2d2e 1px solid ; background-color:white;margin:5px" alt="" width="13%">
                                                    <img src="{{ asset('/img/more/add_img_2.png') }}" alt="" width="100%" style="padding: 0px 5px;border-radius:10px" id="img_add_img"  >
                                                </div>
                                            </div>
                                            <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                        </div>
                                    </div>
                                    <!-- END IMG SHOW CONTENT ----------------------------------------------------- -->

                                    <!-- TEXT SHOW CONTENT ----------------------------------------------------------------- -->
                                    <div id="show_text_content" class="phone-content d-none" >
                                        <div class="col-12 remove-scrollbar" style="min-width: 100%;max-height: 250px;overflow:auto;cursor: grab;">
                                            <div class="col-12">
                                                <img src="{{ asset('/img/logo/VII-check-LOGO-W-v3.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#db2d2e 1px solid ; background-color:white;margin:5px" alt="" width="13%">
                                                <p class="float-start" style="font-size:10px;margin-top: 7px;width: 75%;float:left;">
                                                    <span id="add_text_content" style="background-color: #66d470;" class="btn btn-sm">เพิ่มข้อความของคุณ</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TEXT SHOW CONTENT --------------------------------------------------------- -->


                                    <div class="richmenu text-center" >
                                        <img src="{{ asset('/img/new_rich_menu/rich_menu_new/richmenu-th.png') }}" alt="" width="100%">
                                    </div>
                                    <div class="row phone-footer d-flex justify-content-start">
                                        <div class="col d-flex justify-content-start" style="float: left;"><img src="{{ asset('/img/icon/keyboard.png') }}" alt="" width="20%"></div>
                                        <div class="col d-flex justify-content-start" style="cursor: pointer;float: left;">
                                            <span onclick="document.querySelector('.richmenu').classList.toggle('d-none');
                                            document.querySelector('.phone-content').classList.toggle('no-richmenu');
                                            document.querySelector('.div_img').classList.toggle('no-richmenu');">เมนู▾</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container-data-car">
    <div class="row">
        <div class="col-12 col-lg-3 col-md-3 ">
            <div class="item section-filter">
                <div class="card filter text-center" style="padding:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row form-select-car" >
                                    <div class="col-12 text-center text-selected">
                                        <h5>เลือกจำนวน</h5>
                                        <span id="tell_BC_by_user_max" class="d-none">
                                            (ไม่เกิน <span id="amount_remain"></span>)
                                        </span>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            <div class="col-7">
                                                <span id="" class=""></span>
                                                {{-- <input min="1" max="" style="width:100%;" placeholder="ไม่เกิน 0 คน"  class="form-control" type="number" name="select_amount" id="select_amount">

                                                oninput="document.querySelector('#span_select_from_amount').innerHTML = '(' + document.querySelector('#select_amount').value + ')' "> --}}
                                                <input min="0" max="{{ $BC_by_user_max - $BC_by_user_sent }}" style="width:100%;" placeholder="ไม่เกิน {{ $BC_by_user_max - $BC_by_user_sent }} คน" class="form-control" type="number" name="select_amount" id="select_amount" oninput="document.querySelector('#span_select_from_amount').innerHTML = '(' + document.querySelector('#select_amount').value + ')',document.querySelector('#span_select_from_amount').classList.remove('d-none');">
                                            </div>
                                            <div class="col-5">
                                                <button id="btn_select_from_amount" style="width: 100%;" class="btn-select btn btn-primary btn-md" onclick="select_from_amount();">
                                                    เลือก<span id="span_select_from_amount" class="d-none"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button id="btn_amount_remain_all" style="margin-top: 0px;width: 100%;" class="btn btn-md btn-info text-white btn-select" onclick="click_select_all();">
                                            เลือกทั้งหมด&nbsp;(<span id="amount_remain_all">{{ $BC_by_user_max - $BC_by_user_sent }}</span>)
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p id="warn_BC_by_car_max" class="d-none text-danger mb-0" style="margin-top:15px;font-family: 'Kanit', sans-serif;">
                                    <!-- ข้อความแจ้งเตือน -->
                                </p>
                            </div>
                            <hr style="margin-top:20px;border:1px solid #db2d2e;" >
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-12 text-selected">
                                        <h5>
                                            เลือกแล้ว
                                            <span id="user_selected">0</span> / {{ $BC_by_user_max - $BC_by_user_sent }} คน
                                        </h5>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <button id="btn_next_selected_user" type="button" class="btn-select btn btn-md btn-success main-shadow main-radius" style="width:70%;" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                                                ต่อไป
                                            </button>
                                        </center>
                                    </div>
                                </div>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card filter">
                    <div class="header text-filter ">
                        <h5>
                            <i class="fa-regular fa-filter-list"></i> กรองข้อมูล
                        </h5>
                    </div>
                    <div class="plans">
                        <label class="plan basic-plan" for="basic">
                            <input type="radio" name="plan" id="basic" onclick="select_type_user('sos');search_data();"/>
                            <div class="plan-content">
                                <img loading="lazy" src="{{ asset('/img/icon/sos.png') }}" alt="" />
                                <div class="plan-details">
                                    <span>ข้อมูล SOS</span>
                                </div>
                            </div>
                        </label>

                        <label class="plan complete-plan" for="complete">
                            <input type="radio" id="complete" name="plan"  onclick="select_type_user('user');search_data();"/>
                            <div class="plan-content">
                                <img loading="lazy" src="{{ asset('/img/icon/menu_user.png') }}" alt="" />

                                <div class="plan-details">
                                    <span>ข้อมูลผู้ใช้</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <input class="form-control d-none" type="text" name="user_type" id="user_type" value="">
                    <div  class="form-filter d-none" id="div_filter">
                        <hr>
                        <!-- ขอความช่วยเหลือ -->
                        <div class="col-12 d-none" id="div_from_sos">
                            <!-- ประเภทการขอความช่วยเหลือ -->
                            <div class="col-md-12">
                                <label for="type_sos" class="form-label">ประเภทการขอความช่วยเหลือ</label>
                                <select name="type_sos" class="notranslate form-control select-form" id="type_sos" onchange="search_data();">
                                    <option class="translate" value="" selected> - ทั้งหมด - </option>
                                    <option class="translate" value="tag_sos"> ขอความช่วยเหลือ  </option>
                                    <option class="translate" value="tag_repair"> แจ้งซ่อม </option>
                                </select>
                            </div>

                            <!-- created_sos -->
                            <div class="col-md-12">
                                <label for="created_sos" class="form-label">ช่วงเวลา</label>
                                <select name="created_sos" class="notranslate form-control select-form" id="created_sos" onchange="search_data();">
                                    <option class="translate" value="" selected> - ทั้งหมด - </option>
                                    <option class="translate" value="day"> 1 วัน </option>
                                    <option class="translate" value="week"> 1 สัปดาห์ </option>
                                    <option class="translate" value="1month"> 1 เดือน </option>
                                    <option class="translate" value="3month"> 3 เดือน </option>
                                    <option class="translate" value="6month"> 6 เดือน </option>
                                </select>
                            </div>

                            <!-- amount_sos -->
                            <div class="col-md-12">
                                <label for="amount_sos" class="form-label">ขอความช่วยเหลือกี่ครั้ง</label>
                                <select name="amount_sos" class="notranslate form-control select-form" id="amount_sos" onchange="search_data();">
                                    <option class="translate" value="" selected> - ทั้งหมด - </option>
                                    <option class="translate" value="2"> 2 ครั้งขึ้นไป</option>
                                    <option class="translate" value="10"> 10 ครั้งขึ้นไป</option>
                                    <option class="translate" value="25"> 25 ครั้งขึ้นไป</option>
                                    <option class="translate" value="50"> 50 ครั้งขึ้นไป</option>
                                </select>
                            </div>

                            <!-- name_area_sos -->
                            <div class="col-md-12">
                                <label for="name_area_sos" class="form-label">พื้นที่ย่อย</label>
                                <select name="name_area_sos" class="notranslate form-control select-form" id="name_area_sos" onchange="search_data();">
                                    <option class="translate" value="" selected> - ทั้งหมด - </option>
                                    @foreach ($name_area_sos as $name_area)
                                        @if (!empty($name_area->name_area))
                                            <option class="translate" value="">{{ $name_area->name_area }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- title_sos -->
                            <div class="col-md-12">
                                <label for="title_sos" class="form-label">หัวข้อขอความช่วยเหลือ</label>
                                <select name="title_sos" class="notranslate form-control select-form" id="title_sos" onchange="search_data();">
                                    <option class="translate" value="" selected> - ทั้งหมด - </option>
                                    <option class="translate" value="เหตุด่วนเหตุร้าย" > เหตุด่วนเหตุร้าย </option>
                                    <option class="translate" value="อุบัติเหตุ" > อุบัติเหตุ </option>
                                    <option class="translate" value="ไฟไหม้" > ไฟไหม้ </option>
                                    @foreach ($title_sos_arr as $title_sos)
                                        @if (!empty($title_sos))
                                            <option class="translate" value="{{$title_sos}}" >{{$title_sos}}</option>
                                        @endif
                                    @endforeach
                                    <option class="translate" value="อื่นๆ" > อื่นๆ </option>
                                </select>
                            </div>

                            <!-- ภายในรัศมี(กม.)-->
                            <div class="col-md-12">
                                <label for="radius_sos" class="form-label">ภายในรัศมี .. กม.</label>
                                <select name="radius_sos" class="notranslate form-control select-form" id="radius_sos" onchange="find_lat_lng();show_fade_div('lat_lng_div_sos');">
                                    <option class="translate" value="" selected> - เลือก ภายในรัศมี .. กม. - </option>
                                    <option class="translate" value="2">2 กิโลเมตร</option>
                                    <option class="translate" value="5">5 กิโลเมตร</option>
                                    <option class="translate" value="10">10 กิโลเมตร</option>
                                    <option class="translate" value="25">25 กิโลเมตร</option>
                                    <option class="translate" value="50">50 กิโลเมตร</option>
                                </select>
                            </div>

                            <!-- lat_sos && lng_sos-->
                            <div id="lat_lng_div_sos">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="language_user" class="form-label">latitude</label>
                                            <input class="form-control" placeholder="ใส่ค่า lat" type="text" name="lat_sos" id="lat_sos" value="">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="time_zone_user" class="form-label">longtitude</label>
                                            <input class="form-control" placeholder="ใส่ค่า lng" type="text" name="lng_sos" id="lng_sos" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-2 col-2 d-flex justify-content-center align-items-center">
                                            <div id="lds-ring" class="lds-ring d-none"><div></div><div></div><div></div><div></div></div>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <span class="btn btn-success d-block" onclick="search_data();">ยืนยัน</span>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <span class="btn btn-primary" onclick="getLocation()">
                                                <i class="fa-regular fa-location-dot"></i>
                                            </span>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <span class="btn btn-danger" onclick="clearLocation()">
                                                <i class="fa-solid fa-trash-xmark"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ผู้ใช้ -->
                        <div class="col-12  d-none" id="div_from_user">
                            <!-- เพศ && อายุ -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- input_car_brand ==> gender_user -->
                                        <label for="gender_user" class="form-label">เพศ</label>
                                        <select name="gender_user" class="notranslate form-control select-form" id="gender_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกเพศ - </option>
                                            <option class="translate" value="ผู้ชาย"> ชาย </option>
                                            <option class="translate" value="ผู้หญิง"> หญิง </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- input_car_model ==> age_user -->
                                        <label for="age_user" class="form-label">อายุ</label>
                                        <select name="age_user" class="notranslate form-control select-form" id="age_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกช่วงอายุ - </option>
                                            <option value="<20" > น้อยกว่า 20 </option>
                                            <option value="21-29" > 21 - 29 </option>
                                            <option value="30-45" > 30 - 45 </option>
                                            <option value="46-59" > 46 - 59 </option>
                                            <option value="60+" > 60 ขึ้นไป </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- ประเทศ && สัญชาติ-->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="country_user" class="form-label">ประเทศ</label>
                                        <select name="country_user" class="notranslate form-control select-form" id="country_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกประเทศ - </option>
                                            @foreach($country_all_of_user as $item)
                                                @if (!empty($item->country))
                                                    <option class="translate" value="{{ $item->country }}">
                                                        {{ $item->country }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nationalitie_user" class="form-label">สัญชาติ</label>
                                        <select name="nationalitie_user" class="notranslate form-control select-form" id="nationalitie_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกสัญชาติ - </option>
                                            @foreach($nationalitie_all_of_user as $item)
                                                @if (!empty($item->nationalitie))
                                                    <option class="translate" value="{{ $item->nationalitie }}">
                                                        {{ $item->nationalitie }}
                                                    </option>
                                                @endif

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- ภาษาที่ใช้ && time_zone-->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="language_user" class="form-label">ภาษาที่ใช้</label>
                                        <select name="language_user" class="notranslate form-control select-form" id="language_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกภาษาที่ใช้ - </option>
                                            @foreach($language_all_of_user as $item)
                                                @if (!empty($item->language))
                                                    <option class="translate" value="{{ $item->language }}">
                                                        {{ $item->language }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time_zone_user" class="form-label">time_zone</label>
                                        <select name="time_zone_user" class="notranslate form-control select-form" id="time_zone_user" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือก time_zone - </option>
                                            @foreach($time_zone_all_of_user as $item)
                                                @if (!empty($item->time_zone))
                                                    <option class="translate" value="{{ $item->time_zone }}">
                                                        {{ $item->time_zone }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- จังหวัดของผู้ใช้ -->
                            <div class="col-md-12">
                                <label for="province_user" class="form-label">จังหวัดของผู้ใช้</label>
                                <select name="province_user" class="notranslate form-control select-form" id="province_user" onchange="show_location_A();search_data();">
                                    <option class="translate" value="" selected> - เลือกจังหวัด - </option>
                                </select>
                            </div>
                            <!-- อำเภอของผู้ใช้ -->
                            <div class="col-md-12">
                                <label for="district_user" class="form-label">อำเภอของผู้ใช้</label>
                                <select name="district_user" class="notranslate form-control select-form" id="district_user" onchange="search_data();">
                                    <option class="translate" value="" selected> - เลือกอำเภอ - </option>
                                </select>
                            </div>

                            <!-- ภายในรัศมี(กม.)-->
                            <div class="col-md-12">
                                <label for="radius_user" class="form-label">ภายในรัศมี .. กม.</label>
                                <select name="radius_user" class="notranslate form-control select-form" id="radius_user" onchange="find_lat_lng();show_fade_div('lat_lng_div');">
                                    <option class="translate" value="" selected> - เลือก ภายในรัศมี .. กม. - </option>
                                    <option class="translate" value="15">15 กิโลเมตร</option>
                                    <option class="translate" value="30">30 กิโลเมตร</option>
                                    <option class="translate" value="50">50 กิโลเมตร</option>
                                    <option class="translate" value="1000">1000 กิโลเมตร</option>
                                </select>
                            </div>

                            <!-- lat_user && lng_user-->
                            <div id="lat_lng_div">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="language_user" class="form-label">latitude</label>
                                            <input class="form-control" placeholder="ใส่ค่า lat" type="text" name="lat_user" id="lat_user" value="">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="time_zone_user" class="form-label">longtitude</label>
                                            <input class="form-control" placeholder="ใส่ค่า lng" type="text" name="lng_user" id="lng_user" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-2 col-2 d-flex justify-content-center align-items-center">
                                            <div id="lds-ring" class="lds-ring d-none"><div></div><div></div><div></div><div></div></div>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <span class="btn btn-success d-block" onclick="search_data();">ยืนยัน</span>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <span class="btn btn-primary" onclick="getLocation()">
                                                <i class="fa-regular fa-location-dot"></i>
                                            </span>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <span class="btn btn-danger" onclick="clearLocation()">
                                                <i class="fa-solid fa-trash-xmark"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="mt-2">

                        <div class="col-12" id="div_btn_search">
                            <button type="submit" class="btn btn-secondary px-5" onclick="clear_search_input_data();">ล้างการค้นหา</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-9 col-md-9 test item" id="div_data_user_search" >
            <br class="mt-5 d-block d-md-none">
            <div class="card result">
                <div class="header text-result">
                    <h4>
                        <i class="fa-solid fa-square-poll-horizontal"></i> ผลการค้นหา&nbsp;&nbsp;
                        <span style="font-size:15px;color: grey;">
                            <span>ทั้งหมด</span> <span id="count_search_data">0</span>&nbsp;<span>คน</span>
                        </span>
                    </h4>
                    <div id="div_btn_view_all_user" class="d-none" style="float: right;display: none;">
                        <span class="btn btn-info btn-sm text-white main-shadow main-radius">
                            <i class="fa-solid fa-eye"></i> ดูผู้ใช้ที่เลือกทั้งหมด
                        </span>
                        <span class="btn btn-danger btn-sm text-white main-shadow main-radius">
                            <i class="fa-sharp fa-solid fa-delete-left"></i> ยกเลิกการเลือกทั้งหมด
                        </span>
                    </div>
                </div>
                <div class="div-result" >
                    <div class="row ">

                        <div class="col-12">
                            <!-- content_search_data -->
                            <div class="row"id="content_search_data"></div>
                        </div>

                        <div class="col-3 section-filter d-none"style="height:650px;overflow:auto;">
                            <div class="row ">
                                <div class="col-12" id="content_selected_user">
                                    <!-- <div class="col-12 p-1">
                                        <div class="result-content">
                                            <div class="result-car">
                                                <div class="result-img">
                                                    <img loading="lazy" src="{{ asset('/img/icon/user.png') }}" alt="" />
                                                </div>
                                                <div class="result-header">
                                                <span class="name-brand">กก1234</span>
                                                <span>กรุงเทพมหานคร</span>
                                                </div>
                                                <div class="status">
                                                <i class="fa-regular fa-circle"></i>
                                                </div>
                                            </div>
                                            <div class="license-plate">
                                                <span>ส่วนบุคคล</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>

    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"
        async >
</script>

<script>
    function show_fade_div(type_div){
        let radius_user = document.querySelector("#radius_user").value;
        let radius_sos = document.querySelector("#radius_sos").value;
        let lat_lng_div = document.getElementById("lat_lng_div");
        let lat_lng_div_sos = document.getElementById("lat_lng_div_sos");
        if(type_div == "lat_lng_div"){
            if (radius_user) {
                lat_lng_div.style.display = "block";
                setTimeout(() => {
                    lat_lng_div.style.opacity = "1";
                    lat_lng_div.style.maxHeight = "50%";
                }, 10);
            } else {
                lat_lng_div.style.opacity = "0";
                lat_lng_div.style.maxHeight = "0";
                setTimeout(() => {
                    lat_lng_div.style.display = "none";
                }, 500);
            }
        }else{
            if (radius_sos) {
                lat_lng_div_sos.style.display = "block";
                setTimeout(() => {
                    lat_lng_div_sos.style.opacity = "1";
                    lat_lng_div_sos.style.maxHeight = "50%";
                }, 10);
            } else {
                lat_lng_div_sos.style.opacity = "0";
                lat_lng_div_sos.style.maxHeight = "0";
                setTimeout(() => {
                    lat_lng_div_sos.style.display = "none";
                }, 500);
            }
        }


    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        search_data();
    });

    // ตัวแปรที่ใช้ร่วมกันทั้งหมด ==========================================================================
    var delayInMilliseconds = 1000;
    var count_arr_user_id = 0 ;
    var text_BC_remain = "";
    var amount_remain = document.querySelector('#amount_remain') ;
    var amount_remain_all = document.querySelector('#amount_remain_all') ;

    var arr_user_id = [] ; // array() user_id
    var arr_user_id_selected = document.querySelector('#arr_user_id_selected'); // input array user_id

    if (arr_user_id_selected.value) {
        count_arr_user_id = JSON.parse(arr_user_id_selected.value).length ;
    }

    // var remain =  $BC_by_car_max - $BC_by_car_sent  - count_arr_user_id ; // จำนวนคงเหลือ
    var remain =  '{{$BC_by_user_max}}' - '{{$BC_by_user_sent}}'   - count_arr_user_id ; // จำนวนคงเหลือ
    //===============================================================================================

    // เลือกประเภทรถ
    function select_type_user(type){
        document.querySelector('#select_amount').value = "" ;
        document.querySelector('#span_select_from_amount').innerHTML = "" ;
        document.querySelector('#tell_BC_by_user_max').classList.remove('text-danger');
        document.querySelector('#warn_BC_by_user_max').classList.add('d-none');

        document.querySelector('#user_type').value = type ;
        // document.querySelector('#div_btn_search').classList.remove('d-none');

        let lat_user = document.querySelector("#lat_user").value = "";
        let lng_user = document.querySelector("#lng_user").value = "";
        let gender_user = document.querySelector("#gender_user").value = "";
        let age_user = document.querySelector("#age_user").value = "";
        let country_user = document.querySelector("#country_user").value = "";
        let nationalitie_user = document.querySelector("#nationalitie_user").value = "";
        let language_user = document.querySelector("#language_user").value = "";
        let time_zone_user = document.querySelector("#time_zone_user").value = "";
        let province_user = document.querySelector("#province_user").value = "";
        let district_user = document.querySelector("#district_user").value = "";
        let radius_user = document.querySelector("#radius_user").value = "";

        if (type === "sos") {

            // showCar_brand();
            show_location_P();

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_from_sos').classList.remove('d-none');
            document.querySelector('#div_from_user').classList.add('d-none');

            let lat_lng_div = document.querySelector("#lat_lng_div");
            lat_lng_div.classList.add('d-none');
        }else{

            // showMotor_brand();
            show_location_P();

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_from_user').classList.remove('d-none');
            document.querySelector('#div_from_sos').classList.add('d-none');

            let lat_lng_div = document.querySelector("#lat_lng_div");
            lat_lng_div.classList.add('d-none');
        }

    }

    // ล้างการค้นหา
    function clear_search_input_data(){
        let lat_lng_div = document.querySelector("#lat_lng_div");
            lat_lng_div.classList.add('d-none');

        let user_type = document.querySelector("#user_type").value;
        let gender_user = document.querySelector("#gender_user").value = '';
        let age_user = document.querySelector("#age_user").value = '';
        let country_user = document.querySelector("#country_user").value = '';
        let nationalitie_user = document.querySelector("#nationalitie_user").value = '';
        let language_user = document.querySelector("#language_user").value = '';
        let time_zone_user = document.querySelector("#time_zone_user").value = '';
        let province_user = document.querySelector("#province_user").value = '';
        let district_user = document.querySelector("#district_user").value = '';
        let radius_user = document.querySelector("#radius_user").value = '';

        let lat_sos = document.querySelector("#lat_sos").value = '';
        let lng_sos = document.querySelector("#lng_sos").value = '';
        let type_sos = document.querySelector("#type_sos").value = '';
        let created_sos = document.querySelector("#created_sos").value = '';
        let amount_sos = document.querySelector("#amount_sos").value = '';
        let name_area_sos = document.querySelector("#name_area_sos").value = '';
        let title_sos = document.querySelector("#title_sos").value = '';
        let radius_sos = document.querySelector("#radius_sos").value = '';

        search_data();

    }

    // ค้นหารถและโชว์ content
    function search_data(){
        let user_type = document.querySelector("#user_type").value;

        let province_user = document.querySelector("#province_user").value;
        let district_user = document.querySelector("#district_user").value;

        let partner_name = '{{ $name_partner }}';
        let gender_user = document.querySelector("#gender_user").value;
        let age_user = document.querySelector("#age_user").value;
        let country_user = document.querySelector("#country_user").value;
        let nationalitie_user = document.querySelector("#nationalitie_user").value;
        let language_user = document.querySelector("#language_user").value;
        let time_zone_user = document.querySelector("#time_zone_user").value;

        let radius_user = document.querySelector("#radius_user").value;
        let lat_user = document.querySelector("#lat_user").value;
        let lng_user = document.querySelector("#lng_user").value;

        let title_sos_arr = [];
            @foreach ($title_sos_arr as $title_sos)
                @if (!empty($title_sos))
                    title_sos_arr.push("{{$title_sos}}");
                @endif
            @endforeach
            title_sos_arr.push("เหตุด่วนเหตุร้าย","อุบัติเหตุ","ไฟไหม้");

        let lat_sos = document.querySelector("#lat_sos").value;
        let lng_sos = document.querySelector("#lng_sos").value;
        let type_sos = document.querySelector("#type_sos").value;
        let created_sos = document.querySelector("#created_sos").value;
        let amount_sos = document.querySelector("#amount_sos").value;
        let name_area_sos = document.querySelector("#name_area_sos").value;
        let title_sos = document.querySelector("#title_sos").value;
        let radius_sos = document.querySelector("#radius_sos").value;

        let data_search_data ;

        if (user_type == "sos") {
            data_search_data = {
                'partner_name' : partner_name,
                'user_type' : user_type,
                'title_sos_arr' : title_sos_arr,
                'name_area_sos' : name_area_sos,
                'amount_sos' : amount_sos,
                'type_sos' : type_sos,
                'title_sos' : title_sos,
                'created_sos' : created_sos,
                'province_user' : province_user,
                'district_user' : district_user,
                'radius_sos' : radius_sos,
                'lat' : lat_sos,
                'lng' : lng_sos,
            };
        }else{
            data_search_data = {
                'partner_name' : partner_name,
                'user_type' : user_type,
                'gender_user' : gender_user,
                'age_user' : age_user,
                'country_user' : country_user,
                'nationalitie_user' : nationalitie_user,
                'language_user' : language_user,
                'time_zone_user' : time_zone_user,
                'province_user' : province_user,
                'district_user' : district_user,
                'radius_user' : radius_user,
                'lat' : lat_user,
                'lng' : lng_user,
            };
        }

        fetch("{{ url('/') }}/api/search_data_broadcast_by_sos",
        {
            method: 'post',
            body: JSON.stringify(data_search_data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
            .then(result => {
                try {
                    console.log(result);

                    document.querySelector('#count_search_data').innerHTML = result['length'] ;

                    let content_search_data = document.querySelector('#content_search_data');
                        content_search_data.innerHTML = "" ;

                    let content_count = 1 ;

                    for (let i = 0; i < result.length; i++) {
                        console.log(result[i].name);
                        console.log(result[i].distance);
                        if (!result[i]['name']) {
                            result[i]['name'] = "ไม่ได้ระบุ" ;
                        }

                        if (!result[i]['sex']) {
                            result[i]['sex'] = "ไม่ได้ระบุ" ;
                        }

                        let age_user = "" ;
                        if (!result[i]['brith']) {
                            age_user = "ไม่ได้ระบุ" ;
                        }else{
                            // สร้างวัตถุ Date สำหรับวันเกิด
                            let birthday = new Date(result[i]['brith']);

                            // สร้างวัตถุ Date สำหรับวันปัจจุบัน
                            let today = new Date();

                            // คำนวณอายุโดยหาความแตกต่างในปี
                            let ageInMilliseconds = today - birthday;
                            let ageInYears = ageInMilliseconds / (1000 * 60 * 60 * 24 * 365.25); // 31,536,000,000 milliseconds per year
                                age_user = ageInYears.toFixed(0); // ปัดเลขทศนิยมไปยังจำนวนเต็ม
                            console.log(age_user);

                            // แสดงผล
                            // console.log("อายุของคุณคือ: " + age_user + " ปี");
                        }
                        console.log(result[i]['name']);console.log(result[i]['sex']);console.log(result[i]['brith']);

                        let div_data_name = `<div class="col-12 col-md-3 col-lg-3 card main-shadow item-content  m-1" onclick="click_select('`+result[i]['id']+`')" id="div_result_content_count_`+content_count+`">
                                <div class="content-header">
                                    <i id="btn_select_user_id_`+result[i]['id']+`" name="i_btn_select_`+content_count+`" data="`+result[i]['id']+`" class="far fa-circle btn"></i>
                                    <span class="name-user"><b class="h5">`+ result[i]['name'] +`</b></span>
                                </div>
                                <div class="content-age">
                                    <span class='text-secondary' style='font-size: 14px;'><b>เพศ :</b> `+ result[i]['sex'] +` <b>อายุ :</b> `+ age_user +`</span>
                                </div>
                            </div>`

                        content_search_data.insertAdjacentHTML('beforeend', div_data_name); // แทรกบนสุด

                        let text_user_id = result[i]['id'].toString();
                        let btn_select = document.querySelector('#btn_select_user_id_'+result[i]['id']);

                        if (arr_user_id.includes(text_user_id)) {
                            btn_select.setAttribute('class', 'fas fa-solid fa-circle-check text-success icon-circle h6');
                        } else {
                            btn_select.setAttribute('class', 'far fa-regular fa-circle icon-circle-hover icon-circle');
                        }

                        content_count = content_count + 1 ;
                    }

                }
                catch(err) {
                    // console.log(err);
                }

            });
    }

    function show_location_P(){
        fetch("{{ url('/') }}/api/location/show_location_P")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_P = document.querySelector("#province_user");
                    location_P.innerHTML = "";

                let option_start_P = document.createElement("option");
                    option_start_P.text = " - เลือกจังหวัด - ";
                    option_start_P.value = "";
                    location_P.add(option_start_P);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    location_P.add(option);
                }

            });

            // return location_P.value;
    }

    function show_location_A(){
        let location_P = document.querySelector("#province_user");
        console.log("location_P.value");
        console.log(location_P.value);
        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#district_user");
                    location_A.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = " - เลือกอำเภอ - ";
                    option_start_A.value = "";
                    location_A.add(option_start_A);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });

            // change_language_user();

            // return location_A.value;
    }


    // ตรวจสอบเกินจำนวนหรือไม่และเลือกหรือลบ
    function click_select(user_id){

        document.querySelector('#user_unique').checked = false ;
        document.querySelector('#arr_user_id_send_to_user').value = null ;

        let btn_select_user_id = document.querySelector('#btn_select_user_id_'+user_id);
        let class_btn_select_user_id = btn_select_user_id.classList[0] ;

        if (remain <= 0) { // ไม่มีโควต้า
            if (class_btn_select_user_id == "fas") {
                document.querySelector('#warn_BC_by_user_max').classList.add('d-none');
                drop_user(user_id);
            }else{
                // เกินจำนวนที่กำหนด
                // console.log(remain + " <= 0");
                document.querySelector('#warn_BC_by_user_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
                document.querySelector('#warn_BC_by_user_max').classList.remove('d-none');

                document.querySelector('#text_user_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
                document.querySelector('#user_max').classList.add('up_down');

                const animated = document.querySelector('.up_down');
                animated.onanimationend = () => {
                    document.querySelector('#user_max').classList.remove('up_down');
                };
            }
        }else{ // มีโควต้า
            if (class_btn_select_user_id == "far") {
                document.querySelector('#warn_BC_by_user_max').classList.add('d-none');
                select_user(user_id);
            }else{
                // เลือกแล้ว
                drop_user(user_id);
            }
        }

    }

    // คลิกเลือก
    function select_user(user_id){
        // console.log("select_user");

        if (!arr_user_id_selected.value) {
            arr_user_id = JSON.parse( '["'+user_id +'"]' );
            arr_user_id_selected.value = JSON.stringify(arr_user_id) ;
        }else{
            arr_user_id = JSON.parse(arr_user_id_selected.value) ;

            if ( arr_user_id.includes(user_id) ) {
                //
            }else{
                arr_user_id.push(user_id);
                arr_user_id_selected.value = JSON.stringify(arr_user_id) ;
            }
        }

        // ยังไม่ได้เลือก
        let btn_select_user_id = document.querySelector('#btn_select_user_id_'+user_id);
            btn_select_user_id.classList = "fa-solid fa-circle-check text-success icon-circle h6" ;

        document.querySelector('#user_selected').innerHTML = JSON.parse(arr_user_id_selected.value).length ;

        remain = remain - 1 ;
        text_BC_remain = remain.toString();
        amount_remain.innerHTML = text_BC_remain ;
        amount_remain_all.innerHTML = text_BC_remain ;

        remain_it_0(remain);
    }

    function drop_user(user_id){
        // console.log("drop_user");

        let btn_select_user_id = document.querySelector('#btn_select_user_id_'+user_id);

        try{
            btn_select_user_id.classList = "far fa-circle icon-circle-hover icon-circle" ;
        }
        catch{
            //
        }

        let arr_select_user_id = JSON.parse(arr_user_id_selected.value) ;
        // delete array by user_id
        for( var ii = 0; ii < arr_select_user_id.length; ii++){
            if ( arr_select_user_id[ii] === user_id) {
                arr_select_user_id.splice(ii, 1);
            }
        }
        arr_user_id_selected.value = JSON.stringify(arr_select_user_id) ;
        document.querySelector('#user_selected').innerHTML = JSON.parse(arr_user_id_selected.value).length ;

        remain = remain + 1 ;
        text_BC_remain = remain.toString();
        amount_remain.innerHTML = text_BC_remain ;
        amount_remain_all.innerHTML = text_BC_remain ;

        remain_it_0(remain);
    }

    // เช็คจำนวน = 0
    function remain_it_0(remain){
        document.querySelector("#select_amount").placeholder = "ไม่เกิน " + remain + " คน" ;
        document.querySelector("#select_amount").max = remain  ;
        document.querySelector("#select_amount").value = ""  ;
        document.querySelector("#span_select_from_amount").classList.add('d-none') ;

        arr_user_id = arr_user_id_selected.value ;

        if (remain <= 0) {
            document.querySelector('#btn_amount_remain_all').disabled = true ;
            document.querySelector('#btn_select_from_amount').disabled = true ;
        }else{
            document.querySelector('#btn_amount_remain_all').disabled = false ;
            document.querySelector('#btn_select_from_amount').disabled = false ;
        }

        // เช็คเพื่อเปิด / ปิด ปุ่มต่อไป
        let count_i = 0 ;
        let arr_user_i = document.querySelector('#arr_user_id_selected'); // input array user_id
        if (arr_user_i.value) {
            count_i = JSON.parse(arr_user_i.value).length ;
        }

        if (count_i != 0) {
            document.querySelector('#btn_next_selected_user').disabled = false ;
            document.querySelector('#amount').value = count_i.toString(); // MODAL
            document.querySelector('#span_amount_send').innerHTML = count_i.toString(); // MODAL
        }else{
            document.querySelector('#btn_next_selected_user').disabled = true ;
        }
    }

    // เลือกจากจำนวน
    function select_from_amount(){
        // console.log("select_from_amount");

        search_data();

        // ส่งต่อฟังก์ชั่น
        setTimeout(function() {
            let select_amount = document.querySelector('#select_amount').value ;
            select_content_from_amount(select_amount);
        }, delayInMilliseconds);
    }

    // คลิกเลือกทั้งหมด
    function click_select_all(){
        // console.log("click_select_all");

        search_data();

        // ส่งต่อฟังก์ชั่น
        setTimeout(function() {
            select_content_from_amount(remain);
        }, delayInMilliseconds);
    }

    // คลิกเลือกตามจำนวนที่เลือก
    async function select_content_from_amount(amount){
        // console.log("select_content_from_amount :: " + amount);

        // เช็ค จำนวนที่เลือกเกินกำหนดหรือไม่
        if ( amount <= remain ) {
            document.querySelector('#warn_BC_by_user_max').classList.add('d-none');
            document.querySelector('#tell_BC_by_user_max').classList.remove('text-danger');

            // คลิกเลือกตามจำนวน
            for (let i = 1; i <= amount; i++) {

                let i_btn_select = document.getElementsByName('i_btn_select_'+i);
                let class_i_btn_select = i_btn_select[0].classList[0] ;

                let uid_i_btn_select = i_btn_select[0].getAttribute('data') ;

                if (!arr_user_id_selected.value) {
                    // arr_user_id ว่าง
                    if (class_i_btn_select == "far") {
                        document.querySelector('#div_result_content_count_' + i).click();
                    }else{
                        amount = parseInt(amount) + 1 ;
                    }
                }else{
                    // arr_user_id ไม่ว่าง
                    arr_user_id = JSON.parse(arr_user_id_selected.value) ;

                    if ( arr_user_id.includes(uid_i_btn_select) ) {
                        // มี user id ใน arr_user_id แล้ว
                        amount = parseInt(amount) + 1 ;

                    }else{
                        // ยังไม่มี user id ใน arr_user_id แล้ว
                        if (class_i_btn_select == "far") {
                            document.querySelector('#div_result_content_count_' + i).click();
                        }else{
                            amount = parseInt(amount) + 1 ;
                        }
                    }
                }
            }
        }else{
            document.querySelector('#warn_BC_by_user_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#warn_BC_by_user_max').classList.remove('d-none');
            document.querySelector('#tell_BC_by_user_max').classList.add('text-danger');

            document.querySelector('#text_user_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#user_max').classList.add('up_down');

            const animated = document.querySelector('.up_down');
            animated.onanimationend = () => {
                document.querySelector('#user_max').classList.remove('up_down');
            };
        }

    }

    // ----------------------------- function in modal -----------------------------------

    function check_send_content(){
        let type_content_bc = document.querySelector('#type_content_bc') ;

        let name_content = document.querySelector("#name_content").value;
        let photo = document.querySelector("#photo").value;
        let detail = document.querySelector("#detail").value;

            if (type_content_bc.value === 'text') {
                if (name_content && detail) {
                    document.querySelector('#btn_send_content').disabled = false ;
                }else{
                    document.querySelector('#btn_send_content').disabled = true ;
                }
            }else{
                if (name_content && photo) {
                    document.querySelector('#btn_send_content').disabled = false ;
                }else{
                    document.querySelector('#btn_send_content').disabled = true ;
                }
            }

    }

    function reset_BC(){
        document.querySelector('#arr_user_id_send_to_user').value = null ;
        document.querySelector('#id_ads').value = null ;
        document.querySelector('#div_user_unique').classList.add('d-none');
        document.querySelector('#send_again').value = null ;
        document.querySelector('#name_content').readOnly = false ;
        document.querySelector('#name_content').value = null;
        document.querySelector('#link').readOnly = false ;
        document.querySelector('#link').value = null;
        document.querySelector('#arr_show_user').value = null;
        document.querySelector('#img_exchange').classList.remove('d-none') ;
        document.querySelector('#send-img').classList.add('sand');
        document.querySelector('#div_img').classList.add('d-none');
        document.querySelector('#div_add_img').classList.remove('d-none');
        // document.querySelector('#img-content').src = null ;
        document.querySelector('#photo').value = null ;
        document.querySelector('#img_add_img').src = "{{ asset('/img/more/add_img_2.png') }}" ;

    }

    function select_content_again(ads_id){

        let arr_user_id_send_to_user = document.querySelector('#arr_user_id_send_to_user') ;
            arr_user_id_send_to_user.value = arr_user_id_selected.value;

        document.querySelector('#user_unique').checked = false ;
        document.querySelector('#send_again').value = 'Yes' ;
        document.querySelector('#div_user_unique').classList.remove('d-none');

        document.querySelector('#name_content').readOnly = true ;
        document.querySelector('#link').readOnly = true ;
        document.querySelector('#img_exchange').classList.add('d-none') ;
        document.querySelector('#photo').value = null ;

        @foreach($ads_contents as $ads)
            if ({{ $ads->id }} == ads_id) {

                let text_show_user = '{{ $ads->show_user }}'.replaceAll('&quot;' , '"');

                document.querySelector('#arr_show_user').value = text_show_user;
                document.querySelector('#name_content').value = '{{ $ads->name_content }}';
                document.querySelector('#id_ads').value = '{{ $ads->id }}';

                let link_url = '{{ $ads->link }}' ;
                    link_url = link_url.split("/api");
                let new_link_url = link_url[0];
                console.log(new_link_url);
                document.querySelector('#link').value = new_link_url ;
                document.querySelector('#detail').value = '{{ $ads->detail }}' ;
                document.querySelector('#img-content').src = '{{ url("/storage") }}' + '/' + '{{ $ads->photo }}' ;

                document.querySelector('#send-img').classList.remove('sand');

                setTimeout(function(){
                    document.querySelector('#div_img').classList.remove('d-none');
                    document.querySelector('#div_add_img').classList.add('d-none');

                    document.querySelector('#send-img').classList.add('sand');
                }, 100);

            }
        @endforeach

        document.querySelector('#btn_send_content').disabled = false ;
    }

    function check_user_unique(){
        let user_unique =  document.querySelector('#user_unique').checked ;
            // console.log(user_unique);
        let arr_selected = JSON.parse(arr_user_id_selected.value) ;
        let text_arr_show_user = document.querySelector('#arr_show_user') ;
        let arr_user_id_send_to_user = document.querySelector('#arr_user_id_send_to_user') ;
            arr_user_id_send_to_user.value = arr_user_id_selected.value;

        let arr_send_to_user = JSON.parse(arr_user_id_send_to_user.value) ;

        if (user_unique) {
            if (text_arr_show_user.value) {

                let arr_show_user = JSON.parse(text_arr_show_user.value) ;
                    // console.log(arr_show_user);
                    // console.log(arr_selected);

                // console.log(arr_send_to_user);
                // console.log(">>>>>>-----------<<<<<<<");

                let delete_at_index = 0 ;
                for (let ii = 0; ii < arr_selected.length; ii++) {
                    // console.log(">>>>>> รอบที่ " + ii + " <<<<<<<");

                    if ( arr_show_user.includes(arr_selected[ii]) ) {
                        // console.log(">> id ที่ ซ้ำ >> : " + arr_selected[ii]);

                        // console.log(">> ก่อนลบ <<");
                        // console.log(arr_send_to_user);

                        // delete array
                        arr_send_to_user.splice(delete_at_index, 1);

                        remain = remain + 1 ;
                        text_BC_remain = remain.toString();
                        amount_remain.innerHTML = text_BC_remain ;
                        amount_remain_all.innerHTML = text_BC_remain ;
                        // console.log(">> ลบแล้ว <<");
                        // console.log(arr_send_to_user);

                    }else{
                        delete_at_index = delete_at_index + 1 ;
                        // console.log('ไม่ซ้ำ บวก delete_at_index + 1 = ' + delete_at_index);
                    }
                }

                document.querySelector('#span_amount_send').innerHTML = arr_send_to_user.length ;
                document.querySelector('#user_selected').innerHTML = arr_send_to_user.length ;
                // ส่ง content เดิม แบบไม่ซ้ำ user เดิม
                arr_user_id_send_to_user.value = JSON.stringify(arr_send_to_user) ;
                arr_user_id_selected.value = JSON.stringify(arr_send_to_user) ;

                remain_it_0(remain);
                search_data();
            }
        }else{
            arr_user_id_send_to_user.value = null ;
            document.querySelector('#span_amount_send').innerHTML = arr_selected.length ;
            document.querySelector('#user_selected').innerHTML = arr_selected.length ;

            remain_it_0(remain);
            search_data();

        }

    }

    function switch_type_content(type){

        document.querySelector('#type_content_bc').value = type ;
        if (type === 'text') {
            // btn
            document.querySelector('#btn_select_text_content').classList.add('btn-primary');
            document.querySelector('#btn_select_text_content').classList.remove('btn-outline-primary');
            document.querySelector('#btn_select_img_content').classList.remove('btn-primary');
            document.querySelector('#btn_select_img_content').classList.add('btn-outline-primary');
            // div
            document.querySelector('#div_bc_text').classList.remove('d-none');
            document.querySelector('#div_bc_img').classList.add('d-none');
            // show line
            document.querySelector('#show_img_content').classList.add('d-none');
            document.querySelector('#show_text_content').classList.remove('d-none');
        }else{
            // btn
            document.querySelector('#btn_select_text_content').classList.remove('btn-primary');
            document.querySelector('#btn_select_text_content').classList.add('btn-outline-primary');
            document.querySelector('#btn_select_img_content').classList.add('btn-primary');
            document.querySelector('#btn_select_img_content').classList.remove('btn-outline-primary');
            // div
            document.querySelector('#div_bc_text').classList.add('d-none');
            document.querySelector('#div_bc_img').classList.remove('d-none');
            // show line
            document.querySelector('#show_img_content').classList.remove('d-none');
            document.querySelector('#show_text_content').classList.add('d-none');
        }

        check_send_content();
    }


    function find_lat_lng(){
        let lat_lng_div = document.querySelector('#lat_lng_div');
            lat_lng_div.classList.remove('d-none');

        let lat_input = document.querySelector('#lat_user').value;
        let lng_input = document.querySelector('#lng_user').value;
    }

    function getLocation() {
        let loadingAnimation = document.getElementById('lds-ring');
            loadingAnimation.classList.remove('d-none');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(set_now_location);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function set_now_location(position)
    {
        let lat_text = document.querySelector("#lat_user");
        let lng_text = document.querySelector("#lng_user");
        // let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        // latlng.value = position.coords.latitude+","+position.coords.longitude ;
        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        // -----------------------------------------------------
        let loadingAnimation = document.getElementById('lds-ring');
            loadingAnimation.classList.add('d-none');

        lat_text.value = lat;
        lng_text.value  = lng;

        lat_text.setAttribute("readonly", true);
        lng_text.setAttribute("readonly", true);
    }

    function clearLocation() {
        let lat_text = document.querySelector("#lat_user");
        let lng_text = document.querySelector("#lng_user");
        lat_text.value = "";
        lng_text.value = "";

        // Remove the readonly attribute
        lat_text.removeAttribute("readonly");
        lng_text.removeAttribute("readonly");
    }

</script>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){


            document.querySelector('#send-img').classList.remove('sand');

            setTimeout(function(){
                document.querySelector('#div_img').classList.remove('d-none');
                document.querySelector('#div_add_img').classList.add('d-none');

                document.querySelector('#send-img').classList.add('sand');
                var img_content = document.getElementById('img-content');
                img_content.src = reader.result;
            }, 100);



        };
        reader.readAsDataURL(event.target.files[0]);
    };
  </script>


    <script src="{{ asset('carousel-12/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('carousel-12/js/popper.min.js') }}"></script>
    <script src="{{ asset('carousel-12/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('carousel-12/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('carousel-12/js/main.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        pading:10,
        navText : ["<i style='background-color: #F8F8F8;border-radius:50px;padding:20px 25px' class='fa-solid fa-chevron-left'></i>",
        "<i style='background-color: #F8F8F8;border-radius:50px;padding:20px 25px' class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
    </script>

@endsection
