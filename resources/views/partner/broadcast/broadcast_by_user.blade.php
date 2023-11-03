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
</style>
  <!-- carousel -->
  <link href="{{ asset('carousel-12/css/owl.carousel.min.css') }}" rel="stylesheet">


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
        <span id="text_car_max">
            ขออภัย เกินจำนวนที่กำหนด
        </span>
</div>

<form method="POST" action="{{ url('/') }}/api/send_content_BC_by_car" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
{{ csrf_field() }}

<input class="form-control d-none" type="text" name="arr_user_id_send_to_user" id="arr_user_id_send_to_user" readonly>

<input class="form-control d-none" type="text" name="arr_car_id_selected" id="arr_car_id_selected" readonly>
<input class="form-control d-none" type="text" name="arr_user_id_selected" id="arr_user_id_selected" readonly>
<input class="form-control d-none" type="text" name="type_content" id="type_content" value="BC_by_car">
<input class="form-control d-none" type="text" name="name_partner" id="name_partner" value="">
<input class="form-control d-none" type="text" name="id_partner" id="id_partner" value="">

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
                                    <h4 class="text-dark">สร้างเนื้อหาใหม่</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group {{ $errors->has('name_content') ? 'has-error' : ''}}">
                                                <label for="name_content" class="control-label">{{ 'ชื่อเนื้อหา' }}</label>
                                                <input style="border-radius: 10px;" class="form-control" name="name_content" type="text" id="name_content" value="" onchange="check_send_content();">
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                                                <label for="link" class="control-label">{{ 'ลิงก์' }}</label>
                                                <input  style="border-radius: 10px;"class="form-control" name="link" type="text" id="link" value="" onchange="check_send_content();">
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-12 d-none">
                                            <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
                                                <label for="detail" class="control-label">{{ 'คำอธิบาย' }}</label>
                                                <!-- <span class="text-secondary">(ไม่แสดงต่อผู้ใช้)</span> -->
                                                <textarea class="form-control" name="detail" rows="4" type="text" id="detail" value="" onchange="check_send_content();"></textarea>
                                                <br>
                                            </div>
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


                                            <div class="item item-content " >
                                                <h5>$ads->name_content</h5>
                                                <div class="img-content">
                                                    <img src="" alt="">
                                                </div>
                                                <div class="content-status">
                                                    <div class="col-6">
                                                        <h6>
                                                            ส่ง -- ครั้ง
                                                        </h6>
                                                    </div >
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-md-12 col-6 col-lg-6 p-0 ">
                                                                <h6 style="float: right; padding-right:10px;">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-12  col-6 col-lg-6 p-0" >
                                                                <h6 style="float: right; padding-right:10px;">
                                                                    <i class="fad fa-eye"></i>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="float: right;width: 100%;margin-top:15px;margin-bottom:5px;" class="btn-select btn btn-success btn-sm main-shadow main-radius" onclick="select_content_again(' $ads->id ');">
                                                    เลือก
                                                </span>
                                            </div>

                                    </div>
                                    <!-- <div class="row text-center">

                                    </div> -->

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
                                <div  class="phone-content" >
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
                                                <span id="tell_BC_by_user_max" class=""></span>
                                            <input min="1" max="" style="width:100%;" placeholder="ไม่เกิน 0 คน"  class="form-control" type="number" name="select_amount" id="select_amount"
                                            oninput="document.querySelector('#span_select_from_amount').innerHTML = '(' + document.querySelector('#select_amount').value + ')' ">
                                        </div>
                                        <div class="col-5">
                                            <button id="btn_select_from_amount" style="width: 100%;" class="btn-select btn btn-primary btn-md" onclick="select_from_amount();">
                                                เลือก<span id="span_select_from_amount" class="d-none"></span>
                                            </button>
                                        </div>
                                        </div>

                                    </div>

                                    </div> -->
                                    <div class="col-12 mt-3">
                                        <button id="btn_amount_remain_all" style="margin-top: 0px;width: 100%;" class="btn btn-md btn-info text-white btn-select" onclick="click_select_car_all();">
                                            เลือกทั้งหมด&nbsp;(<span id="amount_remain_all"></span>)
                                        </button>
                                        <!-- <button id="btn_select_from_amount" style="margin-top: 10px;width: 100%;" class="btn btn-primary btn-sm" onclick="select_from_amount();">
                                            เลือก<span id="span_select_from_amount"></span>
                                        </button> -->
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
                                        <h5>เลือกแล้ว</h5> &nbsp;<h5 id="car_selected">0</h5>&nbsp; <h5>/  คน</h5>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <button id="btn_next_selected_car" type="button" class="btn-select btn btn-md btn-success main-shadow main-radius" style="width:70%;" data-toggle="modal" data-target="#exampleModalCenter" disabled>
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
                            <input type="radio" name="plan" id="basic" onclick="select_type_car('car');search_data();"/>
                            <div class="plan-content">
                                <img loading="lazy" src="{{ asset('/img/icon/businessman.png') }}" alt="" />
                                <div class="plan-details">
                                <span>ผู้ใช้ในองค์กร</span>
                                </div>
                            </div>
                        </label>

                        <label class="plan complete-plan" for="complete">
                            <input type="radio" id="complete" name="plan"  onclick="select_type_car('motorcycle');search_data();"/>
                            <div class="plan-content">
                                <img loading="lazy" src="{{ asset('/img/icon/anonymity.png') }}" alt="" />

                                <div class="plan-details">
                                <span>ผู้ใช้จาก API</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <input class="form-control d-none" type="text" name="car_type" id="car_type" value="">
                    <div  class="form-filter d-none" id="div_filter">
                        <hr>
                        <!-- ผู้ใช้ในองค์กร -->
                        <div class="col-12 d-none" id="div_car_brand">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input_car_brand" class="form-label">เพศ</label>
                                    <select name="input_car_brand" class="notranslate form-control select-form" id="input_car_brand" onchange="">
                                        <option class="translate" value="ผู้ชาย"> ชาย </option>
                                        <option class="translate" value="ผู้หญิง"> หญิง </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="input_car_model" class="form-label">รุ่นรถ</label>
                                    <select name="input_car_model" class="notranslate form-control select-form" id="input_car_model" onchange="search_data();">
                                        <option class="translate" value="" selected> - เลือกรุ่น - </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- ผู้ใช้จาก API -->
                        <div class="col-12  d-none" id="div_motor_brand">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input_motor_brand" class="form-label">ยี่ห้อรถ</label>
                                    <select name="input_motor_brand" class="notranslate form-control select-form" id="input_motor_brand"  onchange="showMotor_model();search_data();">
                                        <option class="translate" value="" selected> - เลือกยี่ห้อ - </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="input_motor_model" class="form-label">รุ่นรถ</label>
                                    <select name="input_motor_model" class="notranslate form-control select-form" id="input_motor_model" onchange="search_data();">
                                        <option class="translate" value="" selected> - เลือกรุ่น - </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="location_user" class="form-label">พื้นที่ผู้ลงทะเบียนรถ</label>
                            <select name="location_user" class="notranslate form-control select-form" id="location_user" onchange="search_data();">
                                <option class="translate" value="" selected> - เลือกพื้นที่ - </option>

                                <option class="translate" value="">

                                </option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="province_registration" class="form-label">จังหวัดของทะเบียนรถ</label>
                            <select name="province_registration" class="notranslate form-control select-form" id="province_registration" onchange="search_data();">
                                <option class="translate" value="" selected> - เลือกพื้นที่ - </option>

                                <option class="translate" value="">

                                </option>

                            </select>
                        </div>
                        <div id="type_car_registration" class="col-12 d-none">
                            <div class="form-group">
                                <label for="type_registration" class="control-label">{{ 'ประเภท' }}</label>
                                <select name="type_registration" class="notranslate form-control" id="type_registration" onchange="search_data();">
                                    <option class="translate" value="" selected> - เลือกประเภท - </option>

                                        <option class="translate" value="">

                                        </option>

                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="birth_month" class="control-label">{{ 'เดือนเกิดเจ้าของรถ' }}</label>
                                <select name="birth_month" class="notranslate form-control" id="birth_month" onchange="search_data();">
                                    <option class="translate" value="" selected> - เลือกเดือนเกิด - </option>
                                    <option class="translate" value="1"> มกราคม </option>
                                    <option class="translate" value="2"> กุมภาพันธ์ </option>
                                    <option class="translate" value="3"> มีนาคม </option>
                                    <option class="translate" value="4"> เมษายน </option>
                                    <option class="translate" value="5"> พฤษภาคม </option>
                                    <option class="translate" value="6"> มิถุนายน </option>
                                    <option class="translate" value="7"> กรกฎาคม </option>
                                    <option class="translate" value="8"> สิงหาคม </option>
                                    <option class="translate" value="9"> กันยายน </option>
                                    <option class="translate" value="10"> ตุลาคม </option>
                                    <option class="translate" value="11"> พฤศจิกายน </option>
                                    <option class="translate" value="12"> ธันวาคม </option>
                                </select>
                            </div>
                            <br>
                        </div>
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



<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log(remain);
        // document.querySelector('#btn_next_selected_car').disabled = false;
        // document.querySelector('#btn_next_selected_car').click();
    });

    // ตัวแปรที่ใช้ร่วมกันทั้งหมด ==========================================================================

    var delayInMilliseconds = 1000; // Delay
    var count_arr_car_id = 0 ;
    var text_BC_remain = "";
    var amount_remain = document.querySelector('#amount_remain') ;
    var amount_remain_all = document.querySelector('#amount_remain_all') ;

    var arr_car_id = [] ; // array() car_id
    var arr_car_id_selected = document.querySelector('#arr_car_id_selected'); // input array car_id

    var arr_user_id = [] ; // array() user_id
    var arr_user_id_selected = document.querySelector('#arr_user_id_selected'); // input array user_id

    if (arr_car_id_selected.value) {
        count_arr_car_id = JSON.parse(arr_car_id_selected.value).length ;
    }

    var remain = {{ $BC_by_car_max - $BC_by_car_sent }} - count_arr_car_id ; // จำนวนคงเหลือ

    //===============================================================================================

    // เลือกประเภทรถ
    function select_type_car(type){
        document.querySelector('#select_amount').value = "" ;
        document.querySelector('#span_select_from_amount').innerHTML = "" ;
        document.querySelector('#tell_BC_by_user_max').classList.remove('text-danger');
        document.querySelector('#warn_BC_by_car_max').classList.add('d-none');

        document.querySelector('#car_type').value = type ;
        document.querySelector('#div_btn_search').classList.remove('d-none');

        document.querySelector("#birth_month").value = "";
        let location_user = document.querySelector("#location_user").value = "";
        let province_registration = document.querySelector("#province_registration").value = "";
        let type_registration = document.querySelector("#type_registration").value = "";


        if (type === "car") {

            showCar_brand();

            let input_motor_brand = document.querySelector("#input_motor_brand").innerHTML = "";
            let input_motor_model = document.querySelector("#input_motor_model").innerHTML = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.remove('d-none');
        }else{

            showMotor_brand();

            let input_car_brand = document.querySelector("#input_car_brand").innerHTML = "";
            let input_car_model = document.querySelector("#input_car_model").innerHTML = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.add('d-none');

            document.querySelector('#type_registration').value = "";
        }

    }


</script>

{{--
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

<!-- ข้อมูล ยี่ห้อ / รุ่น รถ -->
<script>

    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/select_car_brand_user")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let input_car_brand = document.querySelector("#input_car_brand");
                    // input_car_brand.innerHTML = "";

                let option_first = document.createElement("option");
                    option_first.text = "เลือกยี่ห้อ";
                    option_first.value = "";
                    input_car_brand.add(option_first);

                let option_first_class = document.createAttribute("class");
                        option_first_class.value = "translate";

                    option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_car_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_car_brand.add(option);

                    let option_class = document.createAttribute("class");
                        option_class.value = "translate";

                    option.setAttributeNode(option_class);
            });
            return input_car_brand.value;
    }
    function showCar_model(){

        while (input_car_model.options.length > 1) {
            input_car_model.remove(1);
        }

        let input_car_brand = document.querySelector("#input_car_brand");
        // console.log(input_car_brand.value);

        fetch("{{ url('/') }}/api/select_car_brand_user/"+input_car_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let option_first = document.createElement("option");
                    option_first.text = "เลือกรุ่น";
                    option_first.value = "";
                    input_car_model.add(option_first);

                let option_first_class = document.createAttribute("class");
                        option_first_class.value = "translate";

                    option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.generation;
                    option.value = item.generation;
                    input_car_model.add(option);
                }
                let option = document.createElement("option");
                    option.text = "other";
                    option.value = "other";
                    input_car_model.add(option);
            });
    }

    // motorcycle
    function showMotor_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/select_motor_brand_user")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                let input_motor_brand = document.querySelector("#input_motor_brand");
                    // input_motor_brand.innerHTML = "";

                let option_first = document.createElement("option");
                    option_first.text = "เลือกยี่ห้อ";
                    option_first.value = "";
                    input_motor_brand.add(option_first);

                let option_first_class = document.createAttribute("class");
                    option_first_class.value = "translate";

                option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_motor_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_brand.add(option);

                    let option_class = document.createAttribute("class");
                        option_class.value = "translate";

                    option.setAttributeNode(option_class);

            });
            return input_motor_brand.value;
    }
    function showMotor_model(){

        while (input_motor_model.options.length > 1) {
            input_motor_model.remove(1);
        }

        let input_motor_brand = document.querySelector("#input_motor_brand");

        fetch("{{ url('/') }}/api/select_motor_brand_user/"+input_motor_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let option_first = document.createElement("option");
                    option_first.text = "เลือกรุ่น";
                    option_first.value = "";
                    input_motor_model.add(option_first);

                let option_first_class = document.createAttribute("class");
                    option_first_class.value = "translate";

                option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.generation;
                    option.value = item.generation;
                    input_motor_model.add(option);
                }
                let option = document.createElement("option");
                    option.text = "other";
                    option.value = "other";
                    input_motor_model.add(option);
            });
    }

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
        "<i style='background-color: #F8F8F8;border-radius:50px;padding:20px 25px' class='fa fa-chevron-right btn_con btn'></i>"],
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
</script> --}}
@endsection
