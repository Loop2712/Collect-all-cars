<!-- <h1>BC_by_check_in_max : {{ $BC_by_check_in_max }}</h1>
<h1>BC_by_check_in_sent : {{ $BC_by_check_in_sent }}</h1>
<h1>name_partner : {{ $name_partner }}</h1>
<h1>partner_id : {{ $partner_id }}</h1>

<br>
 -->
<!-- @foreach($ads_contents as $item)
	<h3>name_content : {{ $item->name_content }}</h3>
@endforeach -->

@extends('layouts.partners.theme_partner_new')

@section('content')

<!-- คิด % -->
@php
    function percent($data_find , $data_total){

        if($data_find == 0 or $data_total == 0 ){
            $data = 0 ;
        }
        else{
            $data = number_format( ( $data_find * 100 ) / $data_total, 2 ) ;
        }

        return $data ;
    }
@endphp
<!-- จบคิด % -->

@php
    $count_user = count($check_in);
    $count_man = 0;
    $count_female = 0;
    $count_sex_not_specified = 0;

    $count_age_Range_1 = 0 ;
    $count_age_Range_2 = 0 ;
    $count_age_Range_3 = 0 ;
    $count_age_Range_4 = 0 ;
    $count_age_Range_5 = 0 ;
    $count_age_not_specified = 0 ;

    $count_location_bkk = 0 ;
    $count_location_near_bkk = 0 ;
    $count_location_other = 0 ;
    $count_location_not_specified = 0 ;

    foreach($check_in as $item){
        // เพศ
        if( $item->sex == "ผู้ชาย" ){
            $count_man = $count_man + 1 ;
        }else if( $item->sex == "ผู้หญิง" ){
            $count_female = $count_female + 1 ;
        }else{
            $count_sex_not_specified = $count_sex_not_specified + 1 ;
        }
        $percent_man = percent( $count_man , $count_user ) ;
        $percent_female = percent( $count_female , $count_user );
        $percent_sex_not_specified = percent( $count_sex_not_specified , $count_user );

        // อายุ
        $year_now = date('Y');
        $birth = $item->birth ;

        if(empty($birth)){
            $count_age_not_specified = $count_age_not_specified + 1 ;
        }else{
            $birth_sp = explode("-" , $birth);
            $birth_year = $birth_sp[0];
            $age_user = (int)$year_now - (int)$birth_year ;

            if($age_user < 20){
                $count_age_Range_1 = $count_age_Range_1 + 1 ;
            }else if($age_user >= 21 && $age_user < 30){
                $count_age_Range_2 = $count_age_Range_2 + 1 ;
            }else if($age_user >= 30 && $age_user < 46){
                $count_age_Range_3 = $count_age_Range_3 + 1 ;
            }else if($age_user >= 46 && $age_user < 60){
                $count_age_Range_4 = $count_age_Range_4 + 1 ;
            }else if($age_user >= 60){
                $count_age_Range_5 = $count_age_Range_5 + 1 ;
            }
        }

        $percent_age_Range_1 = percent( $count_age_Range_1 , $count_user ) ;
        $percent_age_Range_2 = percent( $count_age_Range_2 , $count_user ) ;
        $percent_age_Range_3 = percent( $count_age_Range_3 , $count_user ) ;
        $percent_age_Range_4 = percent( $count_age_Range_4 , $count_user ) ;
        $percent_age_Range_5 = percent( $count_age_Range_5 , $count_user ) ;
        $percent_age_not_specified = percent( $count_age_not_specified , $count_user ) ;

        // สถานที่
    }
@endphp
<style>

.lightbox {
  /* Default to hidden */
  display: none;

  /* Overlay entire screen */
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;

  /* A bit of padding around image */
  padding: 1em;

  /* Translucent background */
  background: rgba(0, 0, 0, 0.8);
}

/* Unhide the lightbox when it's the target */
.lightbox:target {
  display: block;
}

.lightbox span {
  /* Full width and height */
  display: block;
  width: 100%;
  height: 100%;

  /* Size and position background image */
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
}
.btn-peddyhub{
    background-color:#B8205B;
    color:white;

}
.btn-peddyhub:hover {
    color:white;
      }
      .sub-filter{
    border-radius: 10px;
    border: #b5bfd9 1px solid;
    background-color: #fff;
    padding:10px;
} .sub-filter:hover{
    cursor: pointer;
}
    /* Hide default radio style */
.input-checkbox {
opacity: 0;
visibility: hidden;
margin: 0;
}
.tile-checkbox{
    font-size: 1rem;
}
/* Change icon, border and text color when radio is checked */
.input-checkbox:checked + .tile-checkbox,
.input-checkbox:checked + .tile-checkbox span ,
.input-checkbox:checked + .tile-checkbox::before{
border-color: #b8205b!important;
color: #b8205b!important;
}

/* Checkbox display */
.input-checkbox:checked + .tile-checkbox::before  {
transform: scale(1);
opacity: 1;
background-color: #b8205b;
border-color: #b8205b;

}


.tile-checkbox:hover::before  ,.tile-checkbox:hover{
transform: scale(1);
opacity: 1;
border-color: #b5bfd9;
cursor: pointer;

}
/* Checkmark (icon inside checker) */
.tile-checkbox::before {
content: "";
display: inline-block;
margin-right: 1rem;
position: relative;
min-width: 1rem !important;
min-height: 1rem !important;
background-color: #fff;
border-radius: 50%;
top: 0.25rem;
left: 0.25rem;
opacity: 0;
transform: scale(0);
transition: 0.25s ease;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='192' height='192' fill='%23FFFFFF' viewBox='0 0 256 256'%3E%3Crect width='256' height='256' fill='none'%3E%3C/rect%3E%3Cpolyline points='216 72.005 104 184 48 128.005' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'%3E%3C/polyline%3E%3C/svg%3E");
border: 2px solid #b8205b;
background-size: 12px;
background-repeat: no-repeat;
background-position: 50% 50%;

}
#chart {
    height: 10px;
max-width: 650px;
}.apexcharts-toolbar{
display: none;
}.chart-border{
border:black solid 1px;
border-radius: 10px;
}
.result{
border-top: #3b5998 solid 4px;
border-radius: 20px;
padding: 15px;
font-family: 'Kanit', sans-serif;

}.text-result h4 {
color:#3b5998;
}.item-content{
border-radius: 10px;
padding: 10px;
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
}.content-header{
display: flex;
align-items: center;
justify-content: space-between;

}.name-user{
width: 100%;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
padding-left: 10px;
}.content-age{
display: flex;
justify-content: center;
align-items: center;
} .filter{
        border-top: #B8205B solid 4px;
        border-radius: 20px;
    font-family: 'Kanit', sans-serif;

    }.form-select-user{
    font-family: 'Kanit', sans-serif;
    font-size: 16px;
}.btn{
    border-radius: 10px;
    font-family: 'Kanit', sans-serif;

}.text-selected {
    justify-content: center;
    display: flex;
}
.text-selected h5{
    color:#3b5998;
    font-family: 'Kanit', sans-serif;
    font-weight: bold;
}.text-filter h5{
        font-family: 'Kanit', sans-serif;
        font-weight: 900;
    } .remove-scrollbar::-webkit-scrollbar {
display:none;
}
    .phone-frame{
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
    height: 100%!important;
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
    height: 440px !important;
}
.button-reset-img {
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
}

@media (min-width:1281px) {
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

<div id="check_in_max" class="div_alert d-none" role="alert">
    <span id="text_check_in_max">
        ขออภัย เกินจำนวนที่กำหนด
    </span>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<form method="POST" action="{{ url('/') }}/api/send_content_BC_by_check_in" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input class="form-control d-none" type="text" name="type_content" id="type_content" value="BC_by_check_in">
    <input class="form-control d-none" type="text" name="arr_user_id_selected" id="arr_user_id_selected" readonly>
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
                                <input class="form-control d-none" type="text" name="arr_user_id_send_to_user" id="arr_user_id_send_to_user" readonly>

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
                                            <div class="col-6 d-none">
                                                <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                                    <!-- <label for="photo" class="control-label">{{ 'รูปภาพ' }}</label> -->
                                                    <input class="form-control" name="photo" id="photo" type="file" accept="image/*" onchange="loadFile(event),check_send_content();">
                                                </div>
                                                <br>
                                            </div>

                                            <!-- TEXT -->
                                            <div class="col-12 d-none" id="div_bc_text">
                                                <textarea class="form-control" id="detail" name="detail" rows="4" placeholder="เพิ่มข้อความของคุณที่นี่" oninput="document.querySelector('#add_text_content').innerHTML = document.querySelector('#detail').value ;check_send_content();"></textarea>
                                            </div>

                                        </div>
                                        <hr>
                                        <!-- ALL -->
                                        <div class="row">
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
                                            @if(!empty($ads_contents))
                                                @foreach($ads_contents as $ads)
                                                    @php
                                                        if(!empty($ads->show_user)){
                                                            $show_user = json_decode($ads->show_user) ;
                                                            $count_show_user = count($show_user) ;
                                                        }else{
                                                            $count_show_user = '0' ;
                                                        }

                                                        if(!empty($ads->user_click)){
                                                            $user_click = json_decode($ads->user_click) ;
                                                            $count_user_click = count($user_click) ;
                                                        }else{
                                                            $count_user_click = '0' ;
                                                        }
                                                    @endphp

                                                    <div class=" item-content-send " >
                                                        <h5>{{ $ads->name_content }}</h5>
                                                        <div class="img-content">
                                                            <img src="{{ url('storage')}}/{{ $ads->photo }}" alt="" style="width:100% ;">
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
                                                                            <i class="fa-solid fa-user"></i> {{ $count_show_user }}
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-12  col-6 col-lg-6 p-0" >
                                                                        <h6 style="float: right; padding-right:10px;">
                                                                            <i class="fad fa-eye"></i> {{ $count_user_click }}
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
                                            @endif
                                        </div>

                                    </div>
                                <!-- ----------------phone----------------- -->
                                </div>
                            </div>
                        </div>

                    </div>


                    <style>

                    </style>
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

        <div class="row">

            <!-- DIV เลือกจำนวน / กรองข้อมูล -->
            <div class="col-12 col-md-3 col-lg-3">
                <div class="row">
                    <div class="card filter"  style="padding:20px;">
                        <div class="col-12">
                            <div class="row form-select-user" >
                                <div class="col-12 text-center text-selected">
                                    <h5> <b>เลือกจำนวน </b> </h5>
                                    <span class="" id="tell_BC_by_check_in_max">
                                        (ไม่เกิน <span id="amount_remain">{{ $BC_by_check_in_max - $BC_by_check_in_sent }}</span>)
                                    </span>

                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-7">
                                            <span id="" class=""></span>
                                            <input min="0" max="{{ $BC_by_check_in_max - $BC_by_check_in_sent }}" style="width:100%;" placeholder="ไม่เกิน {{ $BC_by_check_in_max - $BC_by_check_in_sent }} คน" class="form-control" type="number" name="select_amount" id="select_amount" oninput="document.querySelector('#span_select_from_amount').innerHTML = '(' + document.querySelector('#select_amount').value + ')',document.querySelector('#span_select_from_amount').classList.remove('d-none');">
                                    </div>
                                    <div class="col-5">
                                        <button id="btn_select_from_amount" style="width: 100%;" class="btn-select btn btn-primary btn-md" onclick="select_from_amount();">
                                            เลือก<span id="span_select_from_amount" class=""></span>
                                        </button>
                                    </div>
                                    </div>

                                </div>

                                <div class="col-12 mt-3">
                                    <button id="btn_amount_remain_all" style="margin-top: 0px;width: 100%;" class="btn btn-md btn-info text-white btn-select" onclick="click_select_all();">
                                        เลือกทั้งหมด&nbsp;(<span id="amount_remain_all">{{ $BC_by_check_in_max - $BC_by_check_in_sent }}</span>)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p id="warn_BC_by_check_in_max" class=" text-danger mb-0" style="margin-top:15px;font-family: 'Kanit', sans-serif;">
                                <!-- ข้อความแจ้งเตือน -->
                            </p>
                        </div>
                        <hr style="margin-top:20px;border:1px solid #db2d2e;" >
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-12 text-selected">
                                    <h5>
                                        เลือกแล้ว
                                        <span id="user_selected">0</span> / {{ $BC_by_check_in_max - $BC_by_check_in_sent }} คน
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

                    <br>

                    <!-- ตัวกรองข้อมูล -->
                    <div class="card filter accordion" id="accordion_data_filter" style="padding:20px;">
                        <div>
                            <div class="text-filter ">
                                <h5>
                                    <i class="fa-regular fa-filter-list"></i> กรองข้อมูล
                                </h5>
                            </div>
                            <div class="row ">
                                <div class="col-12 p-0">
                                    <select name="name_area" class="notranslate form-control" id="name_area" style="border-radius: 10px;" onchange="search_data();">
                                        <option class="translate" value="" selected> พื้นที่ : <b>ทั้งหมด</b> </option>
                                        @foreach($all_area_partners as $area)
                                        <option value="{{ $area->id }}">
                                            พื้นที่ : <b>{{ $area->name_area }}</b>
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- เข้าพื้นที่มากกว่า -->
                                <div class="sub-filter mt-2">
                                    <label for="check_click_time" class="col-12 form-label" data-toggle="collapse" data-target="#collapse_time" aria-expanded="true" aria-controls="collapse_time">
                                        <div class="row">
                                            <input type="checkbox" name="check_click_time" id="check_click_time" class=" input-checkbox"  onclick="check_click_checked('time');">
                                            <span class="tile-checkbox">ช่วงเวลา</span>
                                        </div>
                                    </label>

                                    <div id="collapse_time" class="collapse" data-parent="#accordion_data_filter">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="time" class="form-control" name="time_1" id="time_1" onchange="search_data();">
                                            </div>
                                            <div class="col-2">
                                                <center style="margin-top:10px;">
                                                    <span>ถึง</span>
                                                </center>
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control" name="time_2" id="time_2" onchange="search_data();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- เข้าพื้นที่มากกว่า -->

                                <!-- วัน -->
                                <div class="sub-filter mt-2">
                                    <label for="check_click_select_day" class="col-12 form-label" data-toggle="collapse" data-target="#collapse_select_day" aria-expanded="true" aria-controls="collapse_select_day">
                                        <div class="row">
                                            <input type="checkbox" name="check_click_select_day" id="check_click_select_day" class=" input-checkbox" onclick="check_click_checked('select_day');">
                                            <span class="tile-checkbox">วัน (จันทร์ - อาทิตย์)</span>
                                        </div>
                                    </label>

                                    <div id="collapse_select_day" class="collapse" data-parent="#accordion_data_filter">
                                        <select name="select_day" id="select_day" class="notranslate form-control" onchange="search_data();">
                                            <option value="" selected> - เลือก - </option>
                                            <option value="Monday" > จันทร์ </option>
                                            <option value="Tuesday" > อังคาร </option>
                                            <option value="Wednesday" > พุธ </option>
                                            <option value="Thursday" > พฤหัสบดี </option>
                                            <option value="Friday" > ศุกร์ </option>
                                            <option value="Saturday" > เสาร์ </option>
                                            <option value="Sunday" > อาทิตย์ </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- วัน -->

                                <!-- จำนวนการเข้าพื้นที่ -->
                                <div class="sub-filter mt-2">
                                    <label for="check_click_amount_in_out" class="col-12 form-label" data-toggle="collapse" data-target="#collapse_amount_in_out" aria-expanded="true" aria-controls="collapse_amount_in_out">
                                        <div class="row">
                                            <input type="checkbox" name="check_click_amount_in_out" class=" input-checkbox" id="check_click_amount_in_out" onclick="check_click_checked('amount_in_out');">
                                            <span class="tile-checkbox">จำนวนการเข้าพื้นที่</span>
                                        </div>
                                    </label>

                                    <div id="collapse_amount_in_out" class="collapse" data-parent="#collapse_amount_in_out">
                                        <div class="form-inline">
                                            <div class="input-group d-flex align-items-center">
                                                <span style="margin-right:15px">เข้าพื้นที่มากกว่า </span>
                                                <input type="number" name="amount_in_out" id="amount_in_out"style='width:1em' class="form-control" min="0" value="" placeholder="ใส่จำนวนครั้ง" onchange="search_data();">
                                                <span style="margin-left:15px">คร้ัง</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- จำนวนการเข้าพื้นที่ -->

                                <!-- เข้า-ออก ล่าสุด -->
                                <div class="sub-filter mt-2">
                                    <label for="check_click_last_entry" class="col-12 form-label" data-toggle="collapse" data-target="#collapse_last_entry" aria-expanded="true" aria-controls="collapse_last_entry">
                                        <div class="row">
                                            <input type="checkbox" name="check_click_last_entry" id="check_click_last_entry" class=" input-checkbox" onclick="check_click_checked('last_entry');">
                                            <span class="tile-checkbox">เข้า-ออก ล่าสุด</span>
                                        </div>
                                    </label>

                                    <div id="collapse_last_entry" class="collapse" data-parent="#collapse_last_entry">
                                        <div class="form-inline">
                                            <div class="input-group d-flex align-items-center">
                                                <span style="margin-right:15px">เข้า-ออก </span>
                                                <input type="number" name="amount_last_entry" id="amount_last_entry" class="form-control" min="0" value="" onchange="search_data();">
                                                <span style="margin-left:15px">วันล่าสุด</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- เข้า-ออก ล่าสุด -->

                                 <!-- เกิดเดือนนี้ -->
                                 <div class="sub-filter mt-2">
                                    <label for="this_month" class="col-12 form-label" >
                                        <div class="row">
                                            <input type="checkbox" name="this_month" id="this_month" class=" input-checkbox" onclick="search_data();">
                                            <span class="tile-checkbox">ผู้ใช้ที่เกิดเดือนนี้<span class="text-secondary"> ( {{ thaidate("F", mktime(0, 0, 0, date('m'), 10)) }} )</span>
                                        </div>
                                    </label>
                                </div>
                                <!-- เกิดเดือนนี้ -->

                                 <!-- ข้อมูลผู้ใช้ -->
                                 <div class="sub-filter mt-2">
                                    <label for="check_click_user_data" class="col-12 form-label" data-toggle="collapse" data-target="#collapse_user_data" aria-expanded="true" aria-controls="collapse_user_data">
                                        <div class="row">
                                            <input type="checkbox" name="check_click_user_data" id="check_click_user_data" class=" input-checkbox" onclick="check_click_checked('user_data');">

                                            <span class="tile-checkbox">ข้อมูลผู้ใช้</span>
                                        </div>
                                    </label>

                                    <div id="collapse_user_data" class="collapse" data-parent="#collapse_user_data">
                                        <div class="chart-border text-center p-2">
                                            <h4 class="m-0 p-0 mt-2">เพศ</h4>
                                            <div id="chart-gender"></div>
                                            <select  name="select_user_sex" id="select_user_sex" class="notranslate form-control" onchange="search_data();">
                                                <option value="" selected> - ทั้งหมด - </option>
                                                <option value="ผู้ชาย" > ผู้ชาย </option>
                                                <option value="ผู้หญิง" > ผู้หญิง </option>
                                            </select>
                                        </div>
                                        <div class="chart-border text-center p-2 mt-2">
                                            <h4 class="m-0 p-0 mt-2">อายุ</h4>
                                            <div id="chart-age"></div>
                                            <select style="margin-top:8px;" name="select_user_age" id="select_user_age" class="notranslate form-control" onchange="search_data();">
                                                <option value="" selected> - ทั้งหมด - </option>
                                                <option value="<20" > น้อยกว่า 20 </option>
                                                <option value="21-29" > 21 - 29 </option>
                                                <option value="30-45" > 30 - 45 </option>
                                                <option value="46-59" > 46 - 59 </option>
                                                <option value="60+" > 60 ขึ้นไป </option>
                                            </select>
                                        </div>
                                        <div class="chart-border text-center p-2 mt-2">
                                            <h4 class="m-0 p-0 mt-2">สถานที่</h4>
                                            <div id="chart-position"></div>
                                            <select style="margin-top:8px;" name="select_user_location" id="select_user_location" class="notranslate form-control" onchange="search_data();">
                                                <option value="" selected> - ทั้งหมด - </option>
                                                <!-- loop location -->

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- ข้อมูลผู้ใช้ -->

                                <div class="col-12">
                                    <br>
                                    <center>
                                        <span class="btn btn-sm btn-secondary main-shadow main-radius" style="width:80%;">
                                            ล้างการค้นหา
                                        </span>
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DIV ผลการค้นหา -->
            <div class="col-12 col-lg-9 col-md-9 test item" >
            <br class="mt-5 d-block d-m">
            <div class="card result">
                <div class="text-result">
                    <h4>
                        <i class="fa-solid fa-square-poll-horizontal"></i> ผลการค้นหา&nbsp;&nbsp;
                        <span style="font-size:15px;color: grey;">
                            <span>ทั้งหมด</span> <span id="count_search_data">0</span>&nbsp;<span>คน</span>
                        </span>
                    </h4>
                </div>
                <div class="div-result" >
                    <div class="row ">
                    <div class="col-12">
                        <span>
                            <b>กำลังค้นหา : </b> <span id="text_searching"></span>
                        </span>
                    </div>
                    <div class="col-12">
                        <!-- content_search_data -->
                        <div class="row p-3" id="content_search_data">

                        </div>
                    </div>


                    </div>

                </div>
            </div>
        <div>
        </div>

<script>

document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    search_data();
    document.querySelector('#text_searching').innerHTML = "พื้นที่ = " + "ทั้งหมด";
});

// -------------------------------------------------------------------------------------------------------------

var delayInMilliseconds = 1000; // Delay
var count_arr_user_id = 0 ;
var text_BC_remain = "";

var arr_user_id = [] ; // array() user_id
var arr_user_id_selected = document.querySelector('#arr_user_id_selected'); // input array user_id

if (arr_user_id_selected.value) {
    count_arr_user_id = JSON.parse(arr_user_id_selected.value).length ;
}

var remain = {{ $BC_by_check_in_max - $BC_by_check_in_sent }} - count_arr_user_id ; // จำนวนคงเหลือ

var amount_remain = document.querySelector('#amount_remain') ;
var amount_remain_all = document.querySelector('#amount_remain_all') ;

// -------------------------------------------------------------------------------------------------------------

function search_data(){

    let op_name_area = document.querySelector('#name_area') ;
    let id_name_area = document.querySelector('#name_area').value;
    let name_area = op_name_area.options[op_name_area.selectedIndex].text ;

    let op_select_day = document.querySelector('#select_day');
    let select_day = document.querySelector('#select_day').value;
    let TH_select_day = op_select_day.options[op_select_day.selectedIndex].text ;


    let time_1 = document.querySelector('#time_1').value;
    let time_2 = document.querySelector('#time_2').value;
    let amount_in_out = document.querySelector('#amount_in_out').value;
    let amount_last_entry = document.querySelector('#amount_last_entry').value;

    // data user
    let this_month = document.querySelector('#this_month').checked;
    let check_click_user = document.querySelector('#check_click_user_data').checked;
    let select_user_sex = document.querySelector('#select_user_sex').value;
    let select_user_age = document.querySelector('#select_user_age').value;
    let select_user_location = document.querySelector('#select_user_location').value;

    let data_search = {
            "partner_id" : {{ $partner_id }},
            "id_name_area" : id_name_area,
            "time_1" : time_1,
            "time_2" : time_2,
            "select_day" : select_day,
            "amount_in_out" : amount_in_out,
            "amount_last_entry" : amount_last_entry,
            "this_month" : this_month,
            "check_click_user" : check_click_user,
            "select_user_sex" : select_user_sex,
            "select_user_age" : select_user_age,
            "select_user_location" : select_user_location,
        };

    // console.log(data_search);

    fetch("{{ url('/') }}/api/search_data_broadcast_by_check_in",
    {
        method: 'post',
        body: JSON.stringify(data_search),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
        .then(result => {
            try {
                // console.log(result);

                document.querySelector('#count_search_data').innerHTML = result['length'] ;

                let content_search_data = document.querySelector('#content_search_data');
                    content_search_data.innerHTML = "" ;

                let content_count = 1 ;

                for (var i = 0; i < result.length; i++) {

                    if (!result[i]['name']) {
                        result[i]['name'] = "ไม่ได้ระบุ" ;
                    }

                    if (!result[i]['sex']) {
                        result[i]['sex'] = "ไม่ได้ระบุ" ;
                    }

                    let age_user = "" ;
                    if (!result[i]['age']) {
                        result[i]['age'] = "ไม่ได้ระบุ" ;
                    }else{
                        const user_birth = new Date( result[i]['age'] );
                        user_birth_year = user_birth.getFullYear();
                        const date_now = new Date();
                        year_now = date_now.getFullYear();
                        age_user = year_now - user_birth_year ;
                    }

                    // DIV COL-3
                    let div_data_name = document.createElement("div");
                        let class_div_data_name = document.createAttribute("class");
                            class_div_data_name.value = "col-12 col-md-3 col-lg-3 card main-shadow item-content  m-1";
                            div_data_name.setAttributeNode(class_div_data_name);
                        let onclick_btn_select = document.createAttribute("onclick");
                            onclick_btn_select.value = "click_select('" + result[i]['user_id'] + "')";
                            div_data_name.setAttributeNode(onclick_btn_select);
                        let id_div_result_content = document.createAttribute("id");
                            id_div_result_content.value = "div_result_content_count_" + content_count ;
                            div_data_name.setAttributeNode(id_div_result_content);

                    // div header
                    let div_header = document.createElement("div");
                        let class_div_header = document.createAttribute("class");
                            class_div_header.value = "content-header";
                            div_header.setAttributeNode(class_div_header);
                            div_data_name.appendChild(div_header);

                    // user name
                    let data_name_user = document.createElement("span");
                        let class_name_user = document.createAttribute("class");
                            class_name_user.value = "name-user";
                            data_name_user.setAttributeNode(class_name_user);
                    data_name_user.innerHTML =  "<b><h5>"+ result[i]['name']  +"</h5></b>";
                    div_header.appendChild(data_name_user);

                    // ------------------------------------------------------------
                    let btn_select = document.createElement("i");
                        let name_btn_select = document.createAttribute("name");
                            name_btn_select.value = "i_btn_select_"  + content_count;
                        btn_select.setAttributeNode(name_btn_select);
                        let uid = document.createAttribute("data");
                            uid.value = result[i]['user_id']  ;
                        btn_select.setAttributeNode(uid);
                        let class_btn_select = document.createAttribute("class");
                            class_btn_select.value = "far fa-circle btn";
                            btn_select.setAttributeNode(class_btn_select);
                        let id_btn_select = document.createAttribute("id");
                            id_btn_select.value = "btn_select_user_id_" + result[i]['user_id'] ;
                            btn_select.setAttributeNode(id_btn_select);

                        let text_user_id = result[i]['user_id'].toString();
                            if ( arr_user_id.includes(text_user_id) ) {
                                // console.log("เลือกแล้ว");

                                class_btn_select.value = "fas fa-solid fa-circle-check text-success icon-circle h6";
                            }else{
                                class_btn_select.value = "far fa-regular fa-circle icon-circle-hover icon-circle";
                                // console.log("ยังไม่ได้เลือก");
                            }
                        btn_select.setAttributeNode(class_btn_select);
                        div_header.appendChild(btn_select);

                    // user detail
                    let data_age_user = document.createElement("div");
                        let class_age_user = document.createAttribute("class");
                            class_age_user.value = "content-age";
                            data_age_user.setAttributeNode(class_age_user);
                            div_data_name.appendChild(data_age_user);


                    let span_detail_user = document.createElement("span");
                    span_detail_user.innerHTML = "<span class='text-secondary ' style='font-size: 14px;'><b>เพศ :</b> " + result[i]['sex'] + " <b>อายุ :</b> " + age_user +"</span>";
                    data_age_user.appendChild(span_detail_user);

                    // let span_name_user = document.createElement("span");
                        // span_name_user.innerHTML = "<center><h5>" + result[i]['name'] + "<span class='text-secondary' style='font-size: 14px;'>(" + result[i]['user_id'] +")</span></h5>  <br> <b>เพศ :</b> " + result[i]['sex'] + " <b>อายุ :</b> " + age_user + "</center>" ;

                        // span_name_user.innerHTML = "<center><h5>" + result[i]['name'] + "</h5>  <br> <b>เพศ :</b> " + result[i]['sex'] + " <b>อายุ :</b> " + age_user + "</center>" ;
                        // div_data_name.appendChild(span_name_user);

                    // -------------------------------------------------------
                    content_search_data.appendChild(div_data_name);
                    content_count = content_count + 1 ;
                }
            }
            catch(err) {
                // console.log(err);
            }

        });

    // ---------- แสดงการค้นหา -------------------------------

    let text_searching = document.querySelector('#text_searching');
        text_searching.innerHTML = "" ;
    let new_text_searching = "" ;

    if (!name_area) {
        new_text_searching = new_text_searching + "พื้นที่ = " + "ทั้งหมด";
    }else{
        new_text_searching = new_text_searching + "พื้นที่ = " + name_area;
    }

    let check_click_time = document.querySelector('#check_click_time').checked;
    if (check_click_time) {
        new_text_searching = new_text_searching + ", เวลาเข้า = " + time_1;
        new_text_searching = new_text_searching + ", เวลาออก = " + time_2;
    }

    let check_click_select_day = document.querySelector('#check_click_select_day').checked;
    if (check_click_select_day) {
        new_text_searching = new_text_searching + ", วัน = " + TH_select_day;
    }

    let check_click_amount_in_out = document.querySelector('#check_click_amount_in_out').checked;
    if (check_click_amount_in_out) {
        new_text_searching = new_text_searching + ", จำนวนการเข้า-ออก มากกว่า = " + amount_in_out + " ครั้ง";
    }

    let check_click_last_entry = document.querySelector('#check_click_last_entry').checked;
    if (check_click_last_entry) {
        new_text_searching = new_text_searching + ", เข้า-ออก ล่าสุด = " + amount_last_entry + " วัน ล่าสุด";
    }

    if (this_month) {
        new_text_searching = new_text_searching + ", ผู้ใช้ที่เกิดเดือนนี้ (" + {{ date('m') }} + ")";
    }

    let check_click_user_data = document.querySelector('#check_click_user_data').checked;
    if (check_click_user_data) {
        new_text_searching = new_text_searching + ", เพศ  = " + select_user_sex;
        new_text_searching = new_text_searching + ", อายุ  = " + select_user_age;
        new_text_searching = new_text_searching + ", สถานที่  = " + select_user_location;
    }

    text_searching.innerHTML = new_text_searching ;

}

// ตรวจสอบเกินจำนวนหรือไม่และเลือกหรือลบ
function click_select(user_id){

    document.querySelector('#user_unique').checked = false ;
    document.querySelector('#arr_user_id_send_to_user').value = null ;

    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);
    let class_btn_select_user_id = btn_select_user_id.classList[0] ;

    if (remain <= 0) { // ไม่มีโควต้า
        if (class_btn_select_user_id == "fas") {
            document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
            drop_user(user_id);
        }else{
            // เกินจำนวนที่กำหนด
            // console.log(remain + " <= 0");
            document.querySelector('#warn_BC_by_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#warn_BC_by_check_in_max').classList.remove('d-none');

            document.querySelector('#text_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#check_in_max').classList.add('up_down');

            const animated = document.querySelector('.up_down');
            animated.onanimationend = () => {
                document.querySelector('#check_in_max').classList.remove('up_down');
            };
        }
    }else{ // มีโควต้า
        if (class_btn_select_user_id == "far") {
            document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
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
    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);
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

    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);

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
        document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
        document.querySelector('#tell_BC_by_check_in_max').classList.remove('text-danger');

        // คลิกเลือกตามจำนวน
        for (var i = 1; i <= amount; i++) {

            let i_btn_select = document.getElementsByName('i_btn_select_' + i);
            let class_i_btn_select = i_btn_select[0].classList[0] ;

            let uid_i_btn_select = i_btn_select[0].getAttribute('data') ;
                // console.log(uid_i_btn_select);

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
        document.querySelector('#warn_BC_by_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
        document.querySelector('#warn_BC_by_check_in_max').classList.remove('d-none');
        document.querySelector('#tell_BC_by_check_in_max').classList.add('text-danger');

        document.querySelector('#text_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
        document.querySelector('#check_in_max').classList.add('up_down');

        const animated = document.querySelector('.up_down');
        animated.onanimationend = () => {
            document.querySelector('#check_in_max').classList.remove('up_down');
        };
    }

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
    let arr_check_in_i = document.querySelector('#arr_user_id_selected'); // input array user_id
    if (arr_check_in_i.value) {
        count_i = JSON.parse(arr_check_in_i.value).length ;
    }

    if (count_i != 0) {
        document.querySelector('#btn_next_selected_user').disabled = false ;
        document.querySelector('#amount').value = count_i.toString(); // MODAL
        document.querySelector('#span_amount_send').innerHTML = count_i.toString(); // MODAL
    }else{
        document.querySelector('#btn_next_selected_user').disabled = true ;
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

// ----------------------------- function in modal -----------------------------------


function check_click_checked($checked){
    let check_input_checked = document.querySelector('#check_click_' + $checked).checked ;

    if (!check_input_checked) {
        // console.log($checked);

        switch($checked) {
            case 'time':
                document.querySelector('#time_1').value = "";
                document.querySelector('#time_2').value = "";
            break;
            case 'select_day':
                document.querySelector('#select_day').value = "";
            break;
            case 'amount_in_out':
                document.querySelector('#amount_in_out').value = "";
            break;
            case 'last_entry':
                document.querySelector('#amount_last_entry').value = "";
            break;
            case 'user_data':
                document.querySelector('#select_user_sex').value = "";
                document.querySelector('#select_user_age').value = "";
                document.querySelector('#select_user_location').value = "";
            break;
        }

        search_data();
    }
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
