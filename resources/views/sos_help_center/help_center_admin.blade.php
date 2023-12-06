@extends('layouts.partners.theme_partner_new')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
    div{
        font-family: 'Kanit', sans-serif;
    }
    .div-map{
        position: relative;
    }.btn-reset{
        position: absolute;
        bottom: 4rem;
        left: 1rem;
    }.btn-area{
        position: absolute;
        bottom: 7rem;
        left: 1rem;
    }.btn-new-help{
        background-color: #881111;
        color: white;
        font-family: 'Kanit', sans-serif;
    }
    .btn-new-help:hover{
        background-color: white;
        color: #881111;
        border:solid 1px #881111;
    }.btn-more{
        color: darkgrey;
        border: darkgray 1px solid;
    }.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 4rem;
    }.card-sos{
        border-radius: 20px;
    }.sos-header{
        padding: 15px 15px 0 15px;
        display: flex;
        justify-content: space-between;
    }
    .btn-status{
        padding:5px;
        font-size: 12px;
        border: none;
        border-radius:5px;
        cursor: context-menu;
    }
    
    .sos-username{
        padding: 0 15px 16px 15px;
        display: inline;
    }
    .sos-username div i{
        font-size: 25px;
    }.sos-helper{
        padding: 0 15px 0px 15px;
        
    }
    .helper-border{
        border-right: 1px solid darkgray;
    }
    .helper{
        min-height: 60px;
    }.icon-help{
        font-size: 25px;
    }.icon-organization{
        padding: 10px 0 0 20px;
        font-size: 25px;
    }.data-overflow{
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }.topic{
        font-size: 12px;
    }.a_data_user{
        color: unset;
    }.a_data_user:hover{
        color: unset;
    }.btn-search{
        color: none;
        border: none;
        background-color: white;
    } 
    .data-show{
        animation: data-open 1s ease 0s 1 normal forwards;
    }

    @keyframes data-open {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

</style>

<style>
    /* https://css-tricks.com/styling-cross-browser-compatible-range-inputs-css/ */
    .range-slider {
        position: relative;
        width: 200px;
        height: 35px;
        text-align: center;
    }

    .range-slider input {
        pointer-events: none;
        position: absolute;
        overflow: hidden;
        left: 0;
        top: 15px;
        width: 200px;
        outline: none;
        height: 18px;
        margin: 0;
        padding: 0;
    }

    .range-slider input::-webkit-slider-thumb {
        pointer-events: all;
        position: relative;
        z-index: 1;
        outline: 0;
    }

    .range-slider input::-moz-range-thumb {
        pointer-events: all;
        position: relative;
        z-index: 10;
        -moz-appearance: none;
        width: 9px;
    }

    .range-slider input::-moz-range-track {
        position: relative;
        z-index: -1;
        background-color: rgba(0, 0, 0, 1);
        border: 0;
    }

    .range-slider input:last-of-type::-moz-range-track {
        -moz-appearance: none;
        background: none transparent;
        border: 0;
    }

    .range-slider input[type=range]::-moz-focus-outer {
      border: 0;
    }

    .rangeValue {
        width: 30px;
    }

    .output {
      position: absolute;
      border:1px solid #999;
      width: 40px;
      height: 30px;
      text-align: center;
      color: #999;
      border-radius: 4px;
      display: inline-block;
      font: bold 15px/30px Helvetica, Arial;
      bottom: 75%;
      left: 50%;
      transform: translate(-50%, 0);
    }

    .output.outputTwo {
        left: 100%;
    }

    .container {
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
    }

    input[type=range] {
      -webkit-appearance: none;
      background: none;
    }

    input[type=range]::-webkit-slider-runnable-track {
      height: 5px;
      border: none;
      border-radius: 3px;
      background: transparent;
    }

    input[type=range]::-ms-track {
      height: 5px;
      background: transparent;
      border: none;
      border-radius: 3px;
    }

    input[type=range]::-moz-range-track {
      height: 5px;
      background: transparent;
      border: none;
      border-radius: 3px;
    }

    input[type=range]::-webkit-slider-thumb {
      -webkit-appearance: none;
      border: none;
      height: 16px;
      width: 16px;
      border-radius: 50%;
      background: #555;
      margin-top: -5px;
      position: relative;
      z-index: 10000;
    }

    input[type=range]::-ms-thumb {
      -webkit-appearance: none;
      border: none;
      height: 16px;
      width: 16px;
      border-radius: 50%;
      background: #555;
      margin-top: -5px;
      position: relative;
      z-index: 10000;
    }

    input[type=range]::-moz-range-thumb {
      -webkit-appearance: none;
      border: none;
      height: 16px;
      width: 16px;
      border-radius: 50%;
      background: #555;
      margin-top: -5px;
      position: relative;
      z-index: 10000;
    }

    input[type=range]:focus {
      outline: none;
    }

    .full-range,
    .incl-range {
        width: 100%;
        height: 5px;
        left: 0;
        top: 21px;
        position: absolute;
        background: rgba(55, 55, 55, 0.2) ;
        border-radius: 20%;
    }

    .incl-range {
        background: linear-gradient(to right, lightblue ,blue);
    }

    .card-input-red:checked+.card {
        border: 2px solid #db2d2e !important;
        background-color: #db2d2e !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }
        
    .card-input-success:checked+.card {
        border: 2px solid #29cc39 !important;
        background-color: #29cc39 !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-warning:checked+.card {
        border: 2px solid #ffc30e !important;
        background-color: #ffc30e !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-dark:checked+.card {
        border: 2px solid #000 !important;
        background-color: #000 !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-white:checked+.card {
        border: 2px solid lightblue !important;
        background-color: #CBF3F8FF !important;
        color: #000 !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-all:checked+.card {
        border: 2px solid #0dcaf0 !important;
        background-color: #0dcaf0 !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }#div_search{
        padding: 1rem .2rem;
        border-radius:15px ;background-color: #fff;
        margin: 0;
    }
    .card-search{
        padding: 0rem 1rem;
        
        
        overflow-x: hidden; /* Hide horizontal scrollbar */
        overflow-y: scroll;
        height: 80vh;
        width: 100%;
    }
    .card-search::-webkit-scrollbar-track
    {
        -webkit-box-shadow: 0;
        background-color: #F5F5F5;
    }

    .card-search::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    .card-search::-webkit-scrollbar-thumb
    {
        background-color: #5b667b;
        border-radius: 10px;
    }.idc-screch {
        position: relative;
        font-size: 14px;
        }

        .idc-screch .radio {
        flex: 1 1 auto;
        text-align: center;
        }

        .idc-screch .radio input {
        display: none;
        }

        .idc-screch .radio .name {
        display: flex;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: none;
        padding: .5rem 0rem;
        color: rgba(51, 65, 85, 1);
        transition: all .15s ease-in-out;
        }

        .idc-screch .radio input:checked + .name{
            font-weight: 600;
            padding:  .5rem 1rem;
        } 

        .idc-screch .radio .redio-success:hover {
            background-color: #3ac47d;
            color: #fff;
            padding:  .5rem .5rem;

        }
        .idc-screch .radio .redio-danger:hover{
            background-color: #d92550;
            color: #fff;
            padding:  .5rem .5rem;
        }
        .idc-screch .radio .redio-wrinning:hover {
            background-color: #f7b924;
            color: #000;
            padding:  .5rem .5rem;
        }
        .idc-screch .radio .redio-dark:hover {
            background-color: #343a40;
            color: #fff;
            padding:  .5rem .5rem;
        }
        .idc-screch .radio .redio-normal:hover {
            background-color: #3f6ad8;
            color: #fff;
            padding:  .5rem .5rem;
        }.idc-screch .radio .redio-all:hover {
            background-color: #794c8a;
            color: #fff;
            padding:  .5rem .5rem;
        }


        .idc-screch .radio input:checked + .redio-all {
            background-color: #794c8a;
            color: #fff;
        }
        .idc-screch .radio input:checked + .redio-success {
            background-color: #3ac47d;
            color: #fff;
        }
        .idc-screch .radio input:checked + .redio-danger{
            background-color: #d92550;
            color: #fff;
        }
        .idc-screch .radio input:checked + .redio-wrinning {
            background-color: #f7b924;
            color: #000;
        }
        .idc-screch .radio input:checked + .redio-dark {
            background-color: #343a40;
            color: #fff;
        }
        .idc-screch .radio input:checked + .redio-normal {
            background-color: #3f6ad8;
            color: #fff;
        }
        .owl-nav{
            display: flex;
            justify-content: space-between;
        }
        /* .owl-next ,.owl-prev{
            background-color: #881111 !important;
            width: 1rem !important;
            font-size: 1rem !important;
            color: #fff !important;
            height: 1rem !important;
            border-radius: 50% !important;
        } */
        .owl-stage {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-box;
            display: box;
        }
        @media (min-width:1281px) {  
                .owl-carousel .owl-nav{
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
            
                }
                .owl-carousel .owl-nav .owl-prev{
                    background-color: #000000;
                    border-radius: 50%;
                    margin-left: -10px;
                    margin-top: -3.3rem;
                }
                .owl-carousel .owl-nav .owl-next{
                    background-color: #000000;
                    border-radius: 50%;
                    margin-right: -10px;
                    margin-top: -3.3rem;
                    
            }
        }
        .close{
            animation: close 1s ease 0s 1 normal forwards;
        }
        @keyframes close {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(-100px);
            }
            
        }
        .open{
            animation: open 1s ease 0s 1 normal forwards;
        }

        @keyframes open {
            0% {
                transform: translateX(-100px);
            }

            100% {
                transform: translateX(0);
            }
        }

</style>

<div class="">
    <div class="item col-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 div-map">
                <div class="sticky open" id="div_map">
                    <div id="map" style="border-radius:25px"></div>

                    @if( Auth::user()->sub_organization == "ศูนย์ใหญ่")
                        <h6 class="mt-3">
                            <i class="fa-solid fa-circle" style="color: #006400;"></i> เปิดให้บริการ
                            <i class="fa-solid fa-circle" style="color: #696969;"></i> ยังไม่เปิดบริการ
                            <i class="fa-solid fa-circle" style="color: #FF4500;"></i> พื้นที่ทดสอบ
                        </h6>
                    @endif

                    @if( Auth::user()->sub_organization != "ศูนย์ใหญ่")
                        <a style="background-color: green;" type="button" class="btn text-white btn-reset" onclick="initMap();">
                            <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                        </a>
                    @endif
                    @if( Auth::user()->sub_organization == "ศูนย์ใหญ่")
                        <a style="background-color: green;" type="button" class="btn text-white btn-reset" onclick="click_select_area_map('ทั้งหมด');">
                            <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                        </a>
                        <div class="btn-group btn-area">
                            <button type="button" class="btn btn-info text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เลือกพื้นที่
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="click_select_area_map('ทั้งหมด');">
                                    ทั้งหมด
                                </a>
                                @foreach($polygon_provinces as $item)
                                    <a class="dropdown-item btn" onclick="click_select_area_map('{{ $item->province_name }}');">
                                        {{ $item->province_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="sticky main-shadow d-none close" id="div_search">
                    <div class="card-search ">
                        <h5>ทั่วไป</h5>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" id="id" name="id" value="" class="form-control" placeholder="รหัสเคส" oninput="search_data_help();"> 
                            </div>
                            <div class="col-6 mt-3">
                                <select class="form-control" id="search_be_notified" name="search_be_notified" oninput="search_data_help();">
                                    <option value="" selected>ช่องทางรับแจ้งเหตุ</option>
                                    <option value="แพลตฟอร์มวีเช็ค">แพลตฟอร์มวีเช็ค</option>
                                    <option value="โทรศัพท์หมายเลข ๑๖๖๙">โทรศัพท์หมายเลข ๑๖๖๙</option>
                                    <option value="โทรศัพท์หมายเลข ๑๖๖๙ (second call)">โทรศัพท์หมายเลข ๑๖๖๙ (second call)</option>
                                    <option value="โทรศัพท์หมายเลขอื่นๆ">โทรศัพท์หมายเลขอื่นๆ</option>
                                    <option value="วิทยุสื่อสาร">วิทยุสื่อสาร</option>
                                    <option value="วิธีอื่นๆ">วิธีอื่นๆ</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <select class="form-control" id="search_status" name="search_status" oninput="search_data_help();">
                                    <option value="" selected>สถานะ</option>
                                    <option value="รับแจ้งเหตุ">รับแจ้งเหตุ</option>
                                    <option value="สั่งการ">สั่งการ</option>
                                    <option value="ออกจากฐาน">ออกจากฐาน</option>
                                    <option value="ถึงที่เกิดเหตุ">ถึงที่เกิดเหตุ</option>
                                    <option value="ออกจากที่เกิดเหตุ">ออกจากที่เกิดเหตุ</option>
                                    <option value="เสร็จสิ้น">เสร็จสิ้น</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3" style="position: relative; margin-bottom: 3rem;">
                                <span class="">คะแนน</span>
                                <section  class="range-slider container mt-5" oninput="search_data_help();">
                                    <span class="output outputOne"></span>
                                    <span class="output outputTwo"></span>
                                    <span class="full-range"></span>
                                    <span class="incl-range"></span>
                                    <input name="rangeOne_officer_rating" id="rangeOne_officer_rating" value="0" min="0" max="5" step="1" type="range">
                                    <input name="rangeTwo_officer_rating" id="rangeTwo_officer_rating" value="5" min="0" max="5" step="1" type="range">
                                </section>
                            </div>
                        </div>

                        <h5 class="mt-4">ข้อมูลผู้ขอความช่วยเหลือ</h5>
                        <div class="row">
                            <div class="col-12">                                   
                                 <input type="text" id="name" name="name" value="" class="form-control" placeholder="ชื่อผู้ขอความช่วยเหลือ" oninput="search_data_help();">
                                </div>
                            <div class="col-12 mt-3">
                                <input type="text" id="search_phone_sos" name="search_phone_sos" value="" class="form-control" placeholder="เบอรโทรผู้ขอความช่วยเหลือ" oninput="search_data_help();">
                            </div>
                        </div>


                        <h5 class="mt-4">ข้อมูลองค์กร</h5>
                        <div class="row">
                            <div class="col-12">                                   
                                <input type="text" id="organization" name="organization" value="" class="form-control" placeholder="หน่วยงาน" oninput="search_data_help();">
                            </div>
                            <div class="col-12 mt-3">
                                <input type="text" id="helper" name="helper" value="" class="form-control" placeholder="เจ้าหน้าที่" oninput="search_data_help();">
                            </div>
                        </div>

                        <h5 class="mt-4">พื้นที่</h5>
                        <div class="row">
                            <div class="col-4 px-1">
                                @if( Auth::user()->sub_organization == "ศูนย์ใหญ่")
                                    <select class="form-control" id="search_P" name="search_P" oninput="search_data_help();show_location_A();">
                                        <option value="" selected>จังหวัด</option>
                                        @foreach($polygon_provinces as $province)
                                            <option value="{{ $province->province_name }}" >
                                                {{ $province->province_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" id="search_P" name="search_P" value="" class="form-control d-none" readonly>
                                    <input type="text" id="search_P_for_sub" value="{{ Auth::user()->sub_organization }}" class="form-control" readonly>
                                @endif
                            </div>
                            <div class="col-4 px-1">
                                <select class="form-control" id="search_A" name="search_A" oninput="search_data_help();show_location_T();">
                                    <option value="" selected>อำเภอ</option>
                                </select>
                            </div>
                            <div class="col-4 px-1">
                                <select class="form-control" id="search_T" name="search_T" oninput="search_data_help();">
                                    <option value="" selected>ตำบล</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="mt-4">วันที่</h5>
                        <div class="row">
                            <div class="col-12">
                                <input type="date" name="date" id="date" value="" class="form-control datepicker" aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                            <div class="col-5 mt-3" style="padding-right: 0;">
                                <input type="time" name="time1" id="time1" value="" class="form-control datepicker " aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                            <div class="col-2 mt-3 d-flex align-items-center text-center">
                                <div class="justify-content-center col-12">
                                    -
                                </div>
                            </div>
                            <div class="col-5 mt-3" style="padding-left: 0;">
                                <input type="time" name="time2" id="time2" value="" class="form-control datepicker " aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                        </div>

                        <h5 class="mt-4">IDC</h5>
                        <div class="idc-screch px-2">
                            <div class="owl-carousel-search owl-carousel owl-theme">
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  checked="" data-idc="ทั้งหมด" name="search_idc" value="" onchange="search_data_help();">
                                        <span class="name redio-all">ทั้งหมด</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  data-idc="แดง(วิกฤติ)" name="search_idc" value="แดง(วิกฤติ)"  onchange="search_data_help();" >
                                        <span class="name redio-danger">วิกฤติ</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="เหลือง(เร่งด่วน)" name="search_idc" value="เหลือง(เร่งด่วน)"   onchange="search_data_help();">
                                        <span class="name redio-wrinning">เร่งด่วน</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="เขียว(ไม่รุนแรง)" name="search_idc" value="เขียว(ไม่รุนแรง)"   onchange="search_data_help();">
                                        <span class="name redio-success">ไม่รุนแรง</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="ขาว(ทั่วไป)" name="search_idc" value="ขาว(ทั่วไป)"  onchange="search_data_help();">
                                        <span class="name redio-normal">ทั่วไป</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  data-idc="ดำ(รับบริการสาธารณสุขอื่น)" name="search_idc" value="ดำ(รับบริการสาธารณสุขอื่น)" onchange="search_data_help();">
                                        <span class="name redio-dark">ดำ</span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <h5 class="mt-4">RC</h5>
                        <div class="idc-screch px-2">
                            <div class="owl-carousel-search owl-carousel owl-theme">
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  data-idc="ทั้งหมด" name="search_rc" class="check" value="" onchange="search_data_help();" checked="checked">
                                        <span class="name redio-all">ทั้งหมด</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  data-idc="แดง(วิกฤติ)" name="search_rc" value="แดง(วิกฤติ)"  onchange="search_data_help();" >
                                        <span class="name redio-danger">วิกฤติ</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="เหลือง(เร่งด่วน)" name="search_rc" value="เหลือง(เร่งด่วน)"   onchange="search_data_help();">
                                        <span class="name redio-wrinning">เร่งด่วน</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="เขียว(ไม่รุนแรง)" name="search_rc" value="เขียว(ไม่รุนแรง)"   onchange="search_data_help();">
                                        <span class="name redio-success">ไม่รุนแรง</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio" data-idc="ขาว(ทั่วไป)" name="search_rc" value="ขาว(ทั่วไป)"  onchange="search_data_help();">
                                        <span class="name redio-normal">ทั่วไป</span>
                                    </label>
                                </div>
                                <div class="item">
                                    <label class="radio">
                                        <input type="radio"  data-idc="ดำ(รับบริการสาธารณสุขอื่น)" name="search_rc" value="ดำ(รับบริการสาธารณสุขอื่น)" onchange="search_data_help();">
                                        <span class="name redio-dark">ดำ</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        
                        <button type="button" class="w-100 btn btn-primary btn-md btn-block d-block" onclick="clear_search_data_help();">ล้างการค้นหา</button>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9 m-0">
                <div class="card p-4 m-0" style="border: 2px solid {{ $color_theme }};">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-new-help" onclick="create_new_sos_help_center();">
                                การช่วยเหลือใหม่
                            </button>
                        </div>  
                        <div>
                            <div class="input-group input-group-md">
                                <input type="text" class="form-control border-end-0" id="search" name="search" placeholder="ค้นหา รหัสเคส" oninput="search_data_help();">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                &nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" onclick="swip_div_map_search()">
                                    <i class="fa-solid fa-filter-list"></i> ค้นหาขั้นสูง
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            <div class="col-12">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-blues">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">พื้นที่</p>
                                        @if( Auth::user()->sub_organization != "ศูนย์ใหญ่")
                                            <h5 class="mb-0 text-white">{{ Auth::user()->sub_organization }}</h5>
                                        @else
                                            <h5 class="mb-0 text-white" id="span_text_show_area">ทั้งหมด</h5>
                                        @endif
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-sharp fa-solid fa-map-location-dot font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">จำนวนทั้งหมด</p>
                                        <h5 class="mb-0 text-white"><span id="span_count_data">{{ count($data_sos) }}</span> รายการ</h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-sharp fa-solid fa-light-emergency-on font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div id="div_card_average" class="card radius-10 overflow-hidden bg-gradient-kyoto">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เวลาโดยเฉลี่ย (เสร็จสิ้น)</p>
                                        <h5 class="mb-0 text-white"> 
                                            <b><span id="span_min_average_per_case">กำลังโหลดข้อมูล
                                            ..</span></b> / เคส (<span id="span_count_success_average">..</span>)
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-timer font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .card-data-sos{
                    padding: 1rem;
                    display: flex !important;
                    
                }.card-header-sos{
                    display: inline;
                }.card-header-sos span{
                    font-size: 1.2rem;
                }
                
                .card-main-sos{
                    display: flex !important;
                    margin-top: .8rem;
                    justify-content: space-between;
                }.card-main-sos img{
                    width: 5rem;
                    height: 6rem;
                    object-fit: cover;
                    background-color: #626c80;
                    padding: .5rem;
                    border-radius: .5rem;
                }
                .card-user-sos{
                    display: inline-flex !important;
                }.data-user-sos{
                    margin: 0 1rem;
                }.idc-rc-sos button{
                    display: block;
                    justify-content: center;
                }
                .rate-time{
                    margin-top: 1rem;
                    display: flex;
                    justify-content: space-between;
                }.forward_operation{
                    display: flex;
                    justify-content: end;
                    align-items: center;
                    margin-top: 1rem;
                }.icon-forward-operation{
                    background-color: #db2d2e;
                    padding: 1rem 1.2rem;
                    border-radius: 50%;
                }
                .icon-forward-operation i{
                    color: #fff;
                    border-radius: 50%;
                }
            </style>
            <div class="col-12">
                 <!-- div_data_help -->
                <div id="div_body_help" class="row"></div>

                    <div class="row" id="data_help">

                        <!-- ///////////////////////////////// MOCK UP ////////////////////////////// -->
                        <div class="div_card_mook_up col-12 d-none">
                            <a mock_up_mark="link_data_sos" class="a_data_user data-show">
                                <div class="card card-data-sos card-sos shadow">
                                    <div class="card-header-sos">
                                        <span><b mock_up_mark="operating_code"> 123456789</b></span>
                                        <span class="mx-3">
                                            <button mock_up_mark="be_notified" class=" btn-status  main-shadow main-radius">
                                            แพลตฟอร์มวีเช็ค
                                            </button>

                                            <button mock_up_mark="status" class=" btn-status main-shadow main-radius">
                                                รับแจ้งเหตุ
                                            </button>
                                            <!-- command_by -->
                                            <!-- <button class="btn btn-sm btn-info text-white main-shadow main-radius float-end">
                                                สั่งการโดย : <text mock_up_mark="name_command_by"></text>
                                            </button> -->
                                        </span>
                                    </div>
                                        
                                    <div class="card-main-sos">
                                        <div class="card-user-sos">
                                            <img mock_up_mark="photo_user" src="{{ url('/img/stickerline/PNG/37.2.png') }}" alt="">
                                            
                                            <div class="data-user-sos">
                                                <h6 class=" p-0 m-0 color-dark data-overflow">
                                                    <b mock_up_mark="name_user">
                                                        Teerasak
                                                    </b>
                                                </h6>

                                                <p class="mt-1 p-0 m-0 color-dark data-overflow" mock_up_mark="address">
                                                    ท่าช้าง เมือง นครนายก
                                                </p>

                                                <p class="mt-1 p-0 m-0 color-dark data-overflow" mock_up_mark="phone_user">
                                                    0812345678
                                                </p>

                                            
                                                <p class="mt-1 p-0 m-0 color-dark data-overflow" mock_up_mark="helper">
                                                    ช่วยเหลือโดย Thanakron
                                                    ●
                                                    ViiCHECK
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="idc-rc-sos">
                                            <center>
                                                <!-- IDC -->
                                                <button class=" btn-status px-3" mock_up_mark="btn_IDC">
                                                    <b>IDC<br><span mock_up_mark="text_IDC">(ไม่รุนแรง)</span></b>
                                                </button>
                                                <!-- RC -->
                                                <button class=" btn-status px-3 mt-1 " mock_up_mark="btn_RC">
                                                    <b>RC<br><span mock_up_mark="text_RC">(ไม่รุนแรง)</span></b>
                                                </button>
                                            </center> 
                                        </div>
                                    </div>
                                    <div class="rate-time">
                                        <div mock_up_mark="grade">
                                            <!-- grade -->
                                        </div>
                                        <div mock_up_mark="date_time">วันที่ &nbsp;&nbsp;เวลา</div>
                                    </div>
                                </a>
                                <div class="forward_operation forward_operation_to d-none">

                                    <!-- เคสนี้ส่งต่อ "ไปที่" ใด -->
                                    <div class="text-end mx-3"> 
                                        เคสถูกส่งต่อไปที่ <b mock_up_mark="forward_operation_to_code"></b> <br>
                                        สถานะของเคสที่ส่งต่อ <b mock_up_mark="forward_operation_to_status"></b> 
                                    </div>
                                    <div>
                                        <a mock_up_mark="forward_operation_to_link" class="icon-forward-operation" href="#">
                                            <i mock_up_mark="forward_operation_to_tag_i" class=" fa-regular fa-chevrons-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="forward_operation forward_operation_from d-none">

                                    <!-- เคสนี้ส่งต่อ "มาจาก" ที่ใด -->
                                    <div class="text-end mx-3"> 
                                        เคสถูกส่งต่อมาจาก <b mock_up_mark="forward_operation_from_code"></b> <br>
                                        โดย <b mock_up_mark="forward_operation_from_name_helper"></b> 
                                    </div>
                                    <div>
                                        <a mock_up_mark="forward_operation_from_link" class="icon-forward-operation" href="#">
                                            <i mock_up_mark="forward_operation_from_tag_i" class=" fa-regular fa-chevrons-right"></i>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- ///////////////////////////////// END MOCK UP ////////////////////////////// -->

                        <style>
                            .notification-refuse {
                                position: absolute;
                                top: -15px;
                                right: 90% !important;
                                background-color: red; 
                                color: #fff;
                                width: 30px;
                                height: 30px;
                                font-size: 18px;
                                border-radius: 50%;
                                z-index: 9999;
                            }

                            .notification-call {
                                position: absolute;
                                top: -15px;
                                right: 85% !important;
                                background-color: green; 
                                color: #fff;
                                width: 30px;
                                height: 30px;
                                font-size: 18px;
                                border-radius: 50%;
                                z-index: 9999;
                            }

                            .notification-meet {
                                position: absolute;
                                top: -15px;
                                right: 80% !important;
                                background-color: orange; 
                                color: #fff;
                                width: 30px;
                                height: 30px;
                                font-size: 18px;
                                border-radius: 50%;
                                z-index: 9999;
                            }
                        </style>
                        
                        <div class="pagination-wrapper mb-3"> 
                            <!-- $show_data_sos->appends(['search' => Request::get('search')])->render()  -->
                            <b class="text-danger">แสดงผล 10 เคสล่าสุด (เคสอื่นๆ สามารถค้นหาได้ที่ด้านบนขวา)</b>
                        </div>

                        @foreach($show_data_sos as $item)

                            <div class="col-12" style="position: relative;">
                                <span id="notification_refuse_sos_id_{{ $item->id }}" class="notification-refuse d-none">
                                    <center>
                                        <i class="fa-solid fa-triangle-exclamation fa-bounce"></i>
                                    </center>
                                </span>

                                <span id="notification_call_sos_id_{{ $item->id }}" class="notification-call d-none">
                                    <center>
                                        <i class="fa-solid fa-phone-volume fa-shake"></i>
                                    </center>
                                </span>

                                <span id="notification_meet_sos_id_{{ $item->id }}" class="notification-meet d-none">
                                    <center>
                                        <i class="fa-duotone fa-user-police-tie fa-shake"></i>
                                    </center>
                                </span>

                                <a id="card_data_sos_id_{{ $item->id }}" class="a_data_user data-show" href="{{ url('/sos_help_center/' . $item->id . '/edit') }}">
                                    <div class="card card-data-sos card-sos shadow card_sos_id_{{ $item->id }}">
                                        <div class="card-header-sos">

                                            <span><b> {{$item->operating_code}}</b></span>

                                            @php
                                                $img_user = \App\User::find($item->user_id);

                                                if($item->form_yellow->be_notified == 'แพลตฟอร์มวีเช็ค'){
                                                    $color_be_notified = 'danger' ;
                                                }else if($item->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙' or $item->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)'){
                                                    $color_be_notified = 'info text-white' ;
                                                }else if($item->form_yellow->be_notified == 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า'){
                                                    $color_be_notified = 'warning' ;
                                                }else{
                                                    $color_be_notified = 'secondary' ;
                                                }
                                            @endphp
                                            <span class="mx-3">
                                                <!-- อุบัติเหตุร่วม -->
                                                @php
                                                    if(!empty($item->joint_case)){
                                                        $arr_joint_case = json_decode($item->joint_case, true);
                                                        $count_joint_case = count($arr_joint_case);

                                                        if($count_joint_case >= 2){
                                                            $html_joint_case = 'อุบัติเหตุร่วม';
                                                        }else{
                                                            $html_joint_case = 'อุบัติเหตุหมู่';
                                                        }
                                                    }

                                                @endphp

                                                @if($item->joint_case)
                                                    <button class="btn-status-hurry btn-status main-shadow main-radius" >
                                                        {{ $html_joint_case }}
                                                    </button>
                                                @endif

                                                <!-- รับแจ้งเหตุ -->
                                                @if(!empty($item->form_yellow->be_notified))
                                                    <button class="btn-{{ $color_be_notified }} btn-status  main-shadow main-radius">
                                                        {{ $item->form_yellow->be_notified }}
                                                    </button>
                                                @endif

                                                <!-- สถานะ -->
                                                @switch($item->status)
                                                    @case('รับแจ้งเหตุ')
                                                        <button class="btn-request btn-status main-shadow main-radius">
                                                            รับแจ้งเหตุ
                                                        </button>
                                                    @break
                                                    @case('รอการยืนยัน')
                                                        <button class="btn-order btn-status main-shadow main-radius">
                                                            สั่งการ
                                                        </button>
                                                    @break
                                                    @case('ออกจากฐาน')
                                                        <button class="btn-leave btn-status main-shadow main-radius">
                                                            ออกจากฐาน
                                                        </button>
                                                    @break
                                                    @case('ถึงที่เกิดเหตุ')
                                                        <button class="btn-to btn-status main-shadow main-radius">
                                                            ถึงที่เกิดเหตุ
                                                        </button>
                                                    @break
                                                    @case('ออกจากที่เกิดเหตุ')
                                                        <button class="btn-leave-the-scene btn-status main-shadow main-radius">
                                                            ออกจากที่เกิดเหตุ
                                                        </button>
                                                    @break
                                                    @case('เสร็จสิ้น')
                                                        <button class="btn-hospital btn-status main-shadow main-radius" >
                                                            เสร็จสิ้น ({{ $item->remark_status }})
                                                        </button>
                                                    @break
                                                @endswitch

                                                <!-- command_by -->
                                                @if(!empty($item->command_by))
                                                <button class="btn btn-sm btn-info text-white main-shadow main-radius float-end">
                                                    สั่งการโดย : <text>{{ $item->officers_command_by->name_officer_command }}</text>
                                                </button>
                                                @endif
                                            </span>
                                           
                                        </div>
                                        
                                        <div class="card-main-sos">
                                            <div class="card-user-sos">
                                                @if ($img_user)
                                                    @if ($img_user->photo)
                                                    <img  src="{{ url('storage')}}/{{ $img_user->photo }}" alt="">
                                                    @else
                                                    <img  src="{{ url('/img/stickerline/PNG/37.2.png') }}" alt="">
                                                    @endif
                                                @else
                                                    <img  src="{{ url('/img/stickerline/PNG/37.2.png') }}" alt="">
                                                @endif
                                                <div class="data-user-sos">
                                                    <h6 class=" p-0 m-0 color-dark data-overflow">
                                                        <b>
                                                            @if(!empty($item->name_user))
                                                                {{ $item->name_user }}
                                                            @else
                                                                ไม่ทราบชื่อ
                                                            @endif
                                                        </b>
                                                    </h6>

                                                    <p class="mt-1 p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->address))
                                                            @php
                                                                $address_ex = explode("/",$item->address);
                                                            @endphp
                                                            <span>
                                                                {{ $address_ex[0] }}
                                                                {{ $address_ex[1] }} {{ $address_ex[2] }}
                                                            </span>
                                                        @else
                                                            <span>ไม่มีข้อมูลที่อยู่</span>
                                                        @endif
                                                    </p>

                                                    <p class="mt-1 p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->phone_user))
                                                            {{ $item->phone_user }}
                                                        @else
                                                            ไม่ได้ระบุเบอร์
                                                        @endif
                                                    </p>

                                                
                                                    <p class="mt-1 p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->name_helper))
                                                            ช่วยเหลือโดย {{ $item->name_helper }}
                                                        @else
                                                            ช่วยเหลือโดย ไม่ทราบชื่อ
                                                        @endif
                                                        ●
                                                        @if(!empty($item->organization_helper))
                                                             {{ $item->organization_helper }}
                                                        @else
                                                            ไม่ทราบหน่วยงาน
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="idc-rc-sos">
                                                <center>
                                                    <!-- IDC -->
                                                    @if(!empty($item->form_yellow->idc))
                                                        @switch($item->form_yellow->idc)
                                                            @case('แดง(วิกฤติ)')
                                                                <button class="btn-status-crisis btn-status px-3">
                                                                    <b>IDC<br>(วิกฤติ)</b>
                                                                </button>
                                                            @break
                                                            @case('ขาว(ทั่วไป)')
                                                                <button class="btn-status-normal btn-status px-3">
                                                                    <b>IDC<br>(ทั่วไป)</b>
                                                                </button>
                                                            @break
                                                            @case('เหลือง(เร่งด่วน)')
                                                                <button class="btn-status-hurry btn-status px-3">
                                                                    <b>IDC<br>(เร่งด่วน)</b>
                                                                </button>
                                                            @break
                                                            @case('ดำ(รับบริการสาธารณสุขอื่น)')
                                                                <button class="btn-status-other btn-status px-3">
                                                                    <b>IDC<br>(รับบริการอื่นๆ)</b>
                                                                </button>
                                                            @break
                                                            @case('เขียว(ไม่รุนแรง)')
                                                                <button class="btn-status-weak btn-status px-3">
                                                                    <b>IDC<br>(ไม่รุนแรง)</b>
                                                                </button>
                                                            @break
                                                        @endswitch
                                                    @else
                                                        <button class="btn-status-normal btn-status px-3">
                                                            <b>IDC<br>(ไม่ได้ระบุ)</b>
                                                        </button>
                                                    @endif
                                                    <!-- RC -->
                                                    @if(!empty($item->form_yellow->rc))
                                                        @switch($item->form_yellow->rc)
                                                            @case('แดง(วิกฤติ)')
                                                                <button class="btn-status-crisis btn-status px-3 mt-1 ">
                                                                    <b>RC<br>(วิกฤติ)</b>
                                                                </button>
                                                            @break
                                                            @case('ขาว(ทั่วไป)')
                                                                <button class="btn-status-normal btn-status px-3 mt-1 ">
                                                                    <b>RC<br>(ทั่วไป)</b>
                                                                </button>
                                                            @break
                                                            @case('เหลือง(เร่งด่วน)')
                                                                <button class="btn-status-hurry btn-status px-3 mt-1 ">
                                                                    <b>RC<br>(เร่งด่วน)</b>
                                                                </button>
                                                            @break
                                                            @case('ดำ')
                                                                <button class="btn-status-other btn-status px-3 mt-1 ">
                                                                    <b>RC<br>({{ $item->form_yellow->rc_black_text }})</b>
                                                                </button>
                                                            @break
                                                            @case('เขียว(ไม่รุนแรง)')
                                                                <button class="btn-status-weak btn-status px-3 mt-1 ">
                                                                    <b>RC<br>(ไม่รุนแรง)</b>
                                                                </button>
                                                            @break
                                                        @endswitch
                                                    @else
                                                        <button class="btn-status-normal btn-status px-3 mt-1 ">
                                                            <b>RC<br>(ไม่ได้ระบุ)</b>
                                                        </button>
                                                    @endif
                                                </center> 
                                            </div>
                                        </div>
                                        <div class="rate-time">
                                            <div>
                                                @php
                                                    $total_time = 0 ;

                                                    if($item->status == "เสร็จสิ้น"){

                                                        if($item->form_yellow->time_create_sos){
                                                            $zone1_time1 = $item->form_yellow->time_create_sos  ;
                                                        }

                                                        if($item->form_yellow->time_command){
                                                            $zone1_time2 = $item->form_yellow->time_command  ;
                                                        }
                                                        if($item->form_yellow->time_go_to_help){
                                                            $zone1_time2 = $item->form_yellow->time_go_to_help  ;
                                                        }
                                                        if($item->form_yellow->time_to_the_scene){
                                                            $zone1_time2 = $item->form_yellow->time_to_the_scene  ;
                                                        }
                                                        if($item->form_yellow->time_leave_the_scene){
                                                            $zone1_time2 = $item->form_yellow->time_leave_the_scene  ;
                                                        }
                                                        if($item->form_yellow->time_hospital){
                                                            $zone1_time2 = $item->form_yellow->time_hospital  ;
                                                        }

                                                        list($zone1_hours1, $zone1_minutes1, $zone1_seconds1) = explode(':', $zone1_time1);
                                                        list($zone1_hours2, $zone1_minutes2, $zone1_seconds2) = explode(':', $zone1_time2);


                                                        $zone1_totalSeconds1 = intval($zone1_hours1) * 3600 + intval($zone1_minutes1) * 60 + intval($zone1_seconds1);
                                                        $zone1_totalSeconds2 = intval($zone1_hours2) * 3600 + intval($zone1_minutes2) * 60 + intval($zone1_seconds2);

                                                        $zone1_TotalSeconds = $zone1_totalSeconds2 - $zone1_totalSeconds1;

                                                        $zone1_Time_min = floor($zone1_TotalSeconds / 60);
                                                        $zone1_Time_Seconds = $zone1_TotalSeconds - ($zone1_Time_min * 60);

                                                        $min_1_to_sec = $zone1_Time_min * 60 ;
                                                        $total_time = $total_time + $min_1_to_sec + $zone1_Time_Seconds ;
                                                        
                                                    }   


                                                    $hours_all_time = floor($total_time / 3600);
                                                    $minutes_all_time = floor(($total_time % 3600) / 60);
                                                    $seconds_all_time = floor($total_time % 60);

                                                    $text_total_time = '';
                                                    if ($hours_all_time > 0) {
                                                        $text_total_time .= "{$hours_all_time} ชั่วโมง".($hours_all_time > 1 ? '' : '')." ";
                                                    }
                                                    $text_total_time .= "{$minutes_all_time} นาที".($minutes_all_time > 1 ? '' : '')." ";
                                                    $text_total_time .= "{$seconds_all_time} วินาที".($seconds_all_time > 1 ? '' : '');
                                                        
                                                    $show_min_case = $text_total_time;

                                                    // ตรวจสอบว่าเกิน 8 หรือ 12 หรือไม่

                                                    if($total_time < 480){
                                                        $bg_show_min_case = "text-success";
                                                    }else if($total_time >= 480 && $total_time < 720){
                                                        $bg_show_min_case = "text-warning";
                                                    }else if($total_time >= 720){
                                                        $bg_show_min_case = "text-danger";
                                                    }
                                                    

                                                @endphp
                                                @if($item->status == "เสร็จสิ้น")

                                                    ใช้เวลารวม : <span class="{{ $bg_show_min_case }}">{{ $show_min_case }}</span>

                                                    @php
                                                        $grade = $item->score_total; 
                                                        $rounded_grade = ceil($grade);
                                                    @endphp
                                                    
                                                    @if(!empty($item->score_total))
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rounded_grade)
                                                                @if ($i < $rounded_grade)
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                    @if ($grade - $i + 1 >= 0.75)
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    @elseif ($grade - $i + 1 >= 0.25)
                                                                        <i class="fa-solid fa-star-half-stroke text-warning"></i> 
                                                                    @else
                                                                        <i class="fa-regular fa-star text-warning"></i>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                            @endif
                                                        @endfor
                                                    @else
                                                        <span class="text-secondary">ไม่มีการประเมิน</span>
                                                    @endif

                                                @endif

                                            </div>
                                            <div>
                                                {{ thaidate("วันlที่ j M Y" , strtotime($item->created_at)) }} &nbsp;&nbsp;{{ thaidate("เวลา H:i" , strtotime($item->created_at)) }}

                                                <br>
                                                <span class="btn btn-danger main-shadow main-radius float-end mt-3" onclick="delete_case('{{ $item->id }}');">
                                                    <i class="fa-solid fa-delete-right"></i> ลบเคสนี้
                                                </span>

                                                @if($item->status == "รับแจ้งเหตุ" && empty($item->command_by))
                                                    <span class="btn btn-success main-shadow main-radius float-end mt-3 mx-2" onclick="sos_1669_command_by('{{ Auth::user()->id }}' , '{{ $item->id }}');">
                                                        <i class="fa-solid fa-location-arrow fa-beat"></i> สั่งการ
                                                    </span>
                                                @endif

                                                <script>
                                                    function delete_case(sos_id){
                                                        fetch("{{ url('/') }}/api/delete_case" + "?sos_id=" + sos_id )
                                                            .then(response => response.text())
                                                            .then(result => {
                                                                // console.log(result);
                                                                if (result == "OK") {
                                                                    window.location.reload();
                                                                }
                                                            });
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </a>
                                        
                                        @if(!empty($item->forward_operation_to) || $item->forward_operation_from)
                                            <div class="forward_operation">
                                                <!-- เคสนี้ส่งต่อ "ไปที่" ใด -->
                                                @if(!empty($item->forward_operation_to))
                                                    <div class="text-end mx-3"> 
                                                            เคสถูกส่งต่อไปที่ <b>{{ $item->forwardOperation_to->operating_code }}</b>  <br>
                                                            สถานะของเคสที่ส่งต่อ <b>{{ $item->forwardOperation_to->status }}</b> 
                                                        </div>
                                                        <div>
                                                            <a class="icon-forward-operation" href="#" onclick="event.preventDefault(); window.open('{{ url('/sos_help_center/' . $item->forward_operation_to . '/edit') }}', '_blank', 'width=1600,height=1200'); ">
                                                                <i id="icon_forward_operation_{{$item->id}}" class=" fa-regular fa-chevrons-right" data-animation-class="fa-beat"></i>
                                                            </a>
                                                            
                                                    </div>
                                                @endif
                                                <!-- เคสนี้ส่งต่อ "มาจาก" ที่ใด -->
                                                @if(!empty($item->forward_operation_from))
                                                    <div class="text-end mx-3"> 
                                                        เคสถูกส่งต่อมาจาก <b>{{ $item->forwardOperation_from->operating_code }}</b>  <br>
                                                        โดย <b>{{ $item->forwardOperation_from->name_helper }}</b> 
                                                    </div>
                                                    <div>
                                                        <a class="icon-forward-operation" href="#" onclick="event.preventDefault(); window.open('{{ url('/sos_help_center/' . $item->forward_operation_from . '/edit') }}', '_blank', 'width=1600,height=1200'); ">
                                                            <i id="icon_forward_operation_{{$item->id}}" class=" fa-regular fa-chevrons-right" data-animation-class="fa-beat"></i>
                                                        </a>
                                                        
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                            </div>













                            <!-- <a id="card_data_sos_id_{{ $item->id }}" class="data-show col-lg-6 col-md-6 col-12 a_data_user" href="{{ url('/sos_help_center/' . $item->id . '/edit') }}">
                                <div >
                                    <div class="card card-sos shadow">
                                        <div class="sos-header">
                                            <div>
                                                @php
                                                    if($item->form_yellow->be_notified == 'แพลตฟอร์มวีเช็ค'){
                                                        $color_be_notified = 'danger' ;
                                                    }else if($item->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙' or $item->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)'){
                                                        $color_be_notified = 'info text-white' ;
                                                    }else if($item->form_yellow->be_notified == 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า'){
                                                        $color_be_notified = 'warning' ;
                                                    }else{
                                                        $color_be_notified = 'secondary' ;
                                                    }
                                                @endphp
                                                <div style="position:absolute;top: 0px;left: 0px;">
                                                    <button style="border-radius: 0px 20px 20px 0px;" class="btn btn-sm btn-{{ $color_be_notified }} main-shadow main-radius">
                                                        <b>{{ $item->form_yellow->be_notified }}</b>
                                                    </button>
                                                </div>
                                                <br>
                                                <h4 class="mt-2 m-0 p-0 data-overflow">
                                                    รหัส <b class="text-dark">{{$item->operating_code}}</b>
                                                </h4>
                                                <p class="m-0 mt-1 data-overflow">
                                                    {{ thaidate("วันlที่ j M Y" , strtotime($item->created_at)) }} &nbsp;&nbsp;{{ thaidate("เวลา H:i" , strtotime($item->created_at)) }}
                                                </p>
                                                <p class="m-0 mt-1 data-overflow">
                                                    เวลาของแต่ละเคส
                                                    @php
                                                        $total_time = 0 ;

                                                        if($item->status == "เสร็จสิ้น"){

                                                            if($item->form_yellow->time_create_sos){
                                                                $zone1_time1 = $item->form_yellow->time_create_sos  ;
                                                            }

                                                            if($item->form_yellow->time_command){
                                                                $zone1_time2 = $item->form_yellow->time_command  ;
                                                            }
                                                            if($item->form_yellow->time_go_to_help){
                                                                $zone1_time2 = $item->form_yellow->time_go_to_help  ;
                                                            }
                                                            if($item->form_yellow->time_to_the_scene){
                                                                $zone1_time2 = $item->form_yellow->time_to_the_scene  ;
                                                            }
                                                            if($item->form_yellow->time_leave_the_scene){
                                                                $zone1_time2 = $item->form_yellow->time_leave_the_scene  ;
                                                            }
                                                            if($item->form_yellow->time_hospital){
                                                                $zone1_time2 = $item->form_yellow->time_hospital  ;
                                                            }

                                                            list($zone1_hours1, $zone1_minutes1, $zone1_seconds1) = explode(':', $zone1_time1);
                                                            list($zone1_hours2, $zone1_minutes2, $zone1_seconds2) = explode(':', $zone1_time2);


                                                            $zone1_totalSeconds1 = intval($zone1_hours1) * 3600 + intval($zone1_minutes1) * 60 + intval($zone1_seconds1);
                                                            $zone1_totalSeconds2 = intval($zone1_hours2) * 3600 + intval($zone1_minutes2) * 60 + intval($zone1_seconds2);

                                                            $zone1_TotalSeconds = $zone1_totalSeconds2 - $zone1_totalSeconds1;

                                                            $zone1_Time_min = floor($zone1_TotalSeconds / 60);
                                                            $zone1_Time_Seconds = $zone1_TotalSeconds - ($zone1_Time_min * 60);

                                                            $min_1_to_sec = $zone1_Time_min * 60 ;
                                                            $total_time = $total_time + $min_1_to_sec + $zone1_Time_Seconds ;
                                                            
                                                        }   

                                                        $hours_all_time = floor($total_time / 3600);
                                                        $minutes_all_time = floor(($total_time % 3600) / 60);
                                                        $seconds_all_time = floor($total_time % 60);

                                                        $text_total_time = '';
                                                        if ($hours_all_time > 0) {
                                                          $text_total_time .= "{$hours_all_time} ชั่วโมง".($hours_all_time > 1 ? '' : '')." ";
                                                        }
                                                        $text_total_time .= "{$minutes_all_time} นาที".($minutes_all_time > 1 ? '' : '')." ";
                                                        $text_total_time .= "{$seconds_all_time} วินาที".($seconds_all_time > 1 ? '' : '');
                                                          
                                                        $show_min_case = $text_total_time;

                                                        // ตรวจสอบว่าเกิน 8 หรือ 12 หรือไม่

                                                        if($total_time < 480){
                                                            $bg_show_min_case = "text-success";
                                                        }else if($total_time >= 480 && $total_time < 720){
                                                            $bg_show_min_case = "text-warning";
                                                        }else if($total_time >= 720){
                                                            $bg_show_min_case = "text-danger";
                                                        }
                                                        

                                                    @endphp
                                                    @if($item->status == "เสร็จสิ้น")
                                                        ใช้เวลารวม : <span class="{{ $bg_show_min_case }}">{{ $show_min_case }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <span class="float-end h6">
                                                    @php
                                                        $grade = $item->score_total; 
                                                        $rounded_grade = ceil($grade);
                                                    @endphp

                                                    @if(!empty($item->score_total))
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rounded_grade)
                                                                @if ($i < $rounded_grade)
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                    @if ($grade - $i + 1 >= 0.5)
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-star-half-stroke text-warning"></i> 
                                                                    @endif
                                                                @endif
                                                            @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                            @endif
                                                        @endfor
                                                    @else
                                                        <span class="text-secondary">ไม่มีการประเมิน</span>
                                                    @endif
                                                </span>
                                                <br>
                                                @switch($item->status)
                                                    @case('รับแจ้งเหตุ')
                                                        <button class="float-end btn-request btn-status main-shadow main-radius">
                                                            รับแจ้งเหตุ
                                                        </button>
                                                    @break
                                                    @case('รอการยืนยัน')
                                                        <button class="float-end btn-order btn-status main-shadow main-radius">
                                                            สั่งการ
                                                        </button>
                                                    @break
                                                    @case('ออกจากฐาน')
                                                        <button class="float-end btn-leave btn-status main-shadow main-radius">
                                                            ออกจากฐาน
                                                        </button>
                                                    @break
                                                    @case('ถึงที่เกิดเหตุ')
                                                        <button class="float-end btn-to btn-status main-shadow main-radius">
                                                            ถึงที่เกิดเหตุ
                                                        </button>
                                                    @break
                                                    @case('ออกจากที่เกิดเหตุ')
                                                        <button class="float-end btn-leave-the-scene btn-status main-shadow main-radius">
                                                            ออกจากที่เกิดเหตุ
                                                        </button>
                                                    @break
                                                    @case('เสร็จสิ้น')
                                                        <button class="float-end btn-hospital btn-status main-shadow main-radius" >
                                                            เสร็จสิ้น ({{ $item->remark_status }})
                                                        </button>
                                                    @break
                                                @endswitch
                                                <br>
                                                <p class="mt-4 data-overflow">
                                                    @if(!empty($item->address))
                                                        @php
                                                            $address_ex = explode("/",$item->address);
                                                        @endphp
                                                        <span class="float-end">
                                                            {{ $address_ex[0] }}
                                                            <br>
                                                            {{ $address_ex[1] }} {{ $address_ex[2] }}
                                                        </span>
                                                    @else
                                                        <span class="float-end">ไม่มีข้อมูล</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div> 
                                        
                                        <hr style="margin-top: -5px;">

                                        <div class="sos-username">
                                            <div class="row">
                                                <div class="col-2 m-0 text-center d-flex align-items-center">
                                                    <i class="fa-duotone fa-user"></i>
                                                </div>
                                                <div class="col-6 m-0 p-0">
                                                    <p class="p-0 m-0 color-darkgrey data-overflow topic">ผู้ขอความช่วยเหลือ</p>
                                                    <h5 class="p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->name_user))
                                                            <b>{{ $item->name_user }}</b>
                                                        @else
                                                            ไม่ทราบชื่อ
                                                        @endif
                                                    </h5>
                                                </div>
                                                <div class="col-4 m-0 p-0">
                                                    <p class="p-0 m-0 color-darkgrey data-overflow topic">เบอร์ติดต่อ</p>
                                                    <h5 class="p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->phone_user))
                                                            <b>{{ $item->phone_user }}</b>
                                                        @else
                                                            ไม่ได้ระบุ
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="p-0 m-0" style="margin-bottom:0 ;">

                                        <div class="sos-helper">
                                            <div class="row">
                                                <div class="col-6 p-0 helper helper-border">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-duotone fa-sitemap"></i>
                                                        </div>
                                                        <div class="col-8 m-0  pt-2 "style="padding-left:5px">
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">หน่วยงาน</p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                @if(!empty($item->organization_helper))
                                                                    {{ $item->organization_helper }}
                                                                @else
                                                                    ไม่ทราบหน่วยงาน
                                                                @endif
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 p-0 helper">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-duotone fa-user-police"></i>
                                                        </div>
                                                        <div class="col-8 m-0 p-0 pt-2" >
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">เจ้าหน้าที่</p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                @if(!empty($item->name_helper))
                                                                    {{ $item->name_helper }}
                                                                @else
                                                                    ไม่ทราบชื่อ
                                                                @endif
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        เคสนี้ส่งต่อ "ไปที่" ใด
                                        @if(!empty($item->forward_operation_to))
                                        <hr class="p-0 m-0" style="margin-bottom:0 ;">

                                        <div class="sos-helper div-tooltip" onclick="event.preventDefault(); window.open('{{ url('/sos_help_center/' . $item->forward_operation_to . '/edit') }}', '_blank', 'width=1600,height=1200'); ">
                                            <span class="tooltip" style="font-size: 0.95em;">
                                                <center><i class="fa-solid fa-eye"></i> คลิกเพื่อดูเคสที่ส่งต่อ</center>
                                            </span>
                                            <div class="row">
                                                <div class="col-6 p-0 helper helper-border">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-sharp fa-solid fa-share-from-square"></i>
                                                        </div>
                                                        <div class="col-8 m-0  pt-2 "style="padding-left:5px">
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">
                                                                <b>เคสนี้ถูกส่งต่อไปที่</b>
                                                            </p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                <b>{{ $item->forwardOperation_to->operating_code }}</b>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 p-0 helper">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-solid fa-circle-exclamation"></i>
                                                        </div>
                                                        <div class="col-8 m-0  pt-2 "style="padding-left:5px">
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">
                                                                <b>สถานะของเคสที่ส่งต่อ</b>
                                                            </p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                <b>{{ $item->forwardOperation_to->status }}</b>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        เคสนี้ส่งต่อ "มาจาก" ที่ใด
                                        @if(!empty($item->forward_operation_from))
                                        <hr class="p-0 m-0" style="margin-bottom:0 ;">

                                        <div class="sos-helper div-tooltip" onclick="event.preventDefault(); window.open('{{ url('/sos_help_center/' . $item->forward_operation_from . '/edit') }}', '_blank', 'width=1600,height=1200'); ">
                                            <span class="tooltip" style="font-size: 0.95em;">
                                                <center><i class="fa-solid fa-eye"></i> คลิกเพื่อดูเคสก่อนหน้า</center>
                                            </span>
                                            <div class="row">
                                                <div class="col-6 p-0 helper helper-border">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-sharp fa-solid fa-share-from-square"></i>
                                                        </div>
                                                        <div class="col-8 m-0  pt-2 "style="padding-left:5px">
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">
                                                                <b>เคสนี้รับการส่งต่อมาจาก</b>
                                                            </p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                <b>{{ $item->forwardOperation_from->operating_code }}</b>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 p-0 helper">
                                                    <div class="row">
                                                        <div class="col-4 text-center d-flex align-items-center icon-organization">
                                                            <i class="fa-sharp fa-regular fa-user-police-tie"></i>
                                                        </div>
                                                        <div class="col-8 m-0  pt-2 "style="padding-left:5px">
                                                            <p class="p-0 m-0 color-darkgrey data-overflow topic">
                                                                <b>เจ้าหน้าที่ผู้ส่งต่อ</b>
                                                            </p>
                                                            <h6 class="p-0 m-0 color-dark data-overflow">
                                                                <b>{{ $item->forwardOperation_from->name_helper }}</b>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <hr class="p-0 m-0" style="margin-bottom:0 ;">

                                        <div class="sos-helper m-0 p-0">
                                            <div class="row m-0 p-0">
                                                IDC
                                                @if(!empty($item->form_yellow->idc))
                                                    @switch($item->form_yellow->idc)
                                                        @case('แดง(วิกฤติ)')
                                                            <button class="btn-status-crisis btn-status col-6" style="border-radius:0 0 0 20px;">
                                                                <b>สถานะการณ์ ( IDC )<br>(วิกฤติ)</b>
                                                            </button>
                                                        @break
                                                        @case('ขาว(ทั่วไป)')
                                                            <button class="btn-status-normal btn-status col-6" style="border-radius:0 0 0 20px;">
                                                                <b>สถานะการณ์ ( IDC )<br>(ทั่วไป)</b>
                                                            </button>
                                                        @break
                                                        @case('เหลือง(เร่งด่วน)')
                                                            <button class="btn-status-hurry btn-status col-6" style="border-radius:0 0 0 20px;">
                                                                <b>สถานะการณ์ ( IDC )<br>(เร่งด่วน)</b>
                                                            </button>
                                                        @break
                                                        @case('ดำ(รับบริการสาธารณสุขอื่น)')
                                                            <button class="btn-status-other btn-status col-6" style="border-radius:0 0 0 20px;">
                                                                <b>สถานะการณ์ ( IDC )<br>(รับบริการอื่นๆ)</b>
                                                            </button>
                                                        @break
                                                        @case('เขียว(ไม่รุนแรง)')
                                                            <button class="btn-status-weak btn-status col-6" style="border-radius:0 0 0 20px;">
                                                                <b>สถานะการณ์ ( IDC )<br>(ไม่รุนแรง)</b>
                                                            </button>
                                                        @break
                                                    @endswitch
                                                @else
                                                    <button class="btn-status-normal btn-status col-6" style="border-width: 0px;border-radius:0 0 0 20px;">
                                                        <b>สถานะการณ์ ( IDC )<br>ไม่ได้ระบุ</b>
                                                    </button>
                                                @endif
                                                RC
                                                @if(!empty($item->form_yellow->rc))
                                                    @switch($item->form_yellow->rc)
                                                        @case('แดง(วิกฤติ)')
                                                            <button class="btn-status-crisis btn-status col-6" style="border-radius:0 0 20px 0;">
                                                                <b>สถานะการณ์ ( RC )<br>(วิกฤติ)</b>
                                                            </button>
                                                        @break
                                                        @case('ขาว(ทั่วไป)')
                                                            <button class="btn-status-normal btn-status col-6" style="border-radius:0 0 20px 0;">
                                                                <b>สถานะการณ์ ( RC )<br>(ทั่วไป)</b>
                                                            </button>
                                                        @break
                                                        @case('เหลือง(เร่งด่วน)')
                                                            <button class="btn-status-hurry btn-status col-6" style="border-radius:0 0 20px 0;">
                                                                <b>สถานะการณ์ ( RC )<br>(เร่งด่วน)</b>
                                                            </button>
                                                        @break
                                                        @case('ดำ')
                                                            <button class="btn-status-other btn-status col-6" style="border-radius:0 0 20px 0;">
                                                                <b>สถานะการณ์ ( RC )<br>({{ $item->form_yellow->rc_black_text }})</b>
                                                            </button>
                                                        @break
                                                        @case('เขียว(ไม่รุนแรง)')
                                                            <button class="btn-status-weak btn-status col-6" style="border-radius:0 0 20px 0;">
                                                                <b>สถานะการณ์ ( RC )<br>(ไม่รุนแรง)</b>
                                                            </button>
                                                        @break
                                                    @endswitch
                                                @else
                                                    <button class="btn-status-normal btn-status col-6" style="border-width: 0px;border-radius:0 0 20px 0;">
                                                        <b>สถานะการณ์ ( RC )<br>ไม่ได้ระบุ</b>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                        @endforeach

                    </div>
                       
                    <style>
                        .btn-request{
                            color: white;
                            background-color: #881111;
                        }.btn-order{
                            color: white;
                            background-color: #8C52FF;
                        }.btn-leave{
                            color: white;
                            background-color: #EF671D;
                        }.btn-to{
                            color: white;
                            background-color: #25548F;
                        }.btn-status-other{
                            color: white;
                            background-color: #000000;
                        }.btn-status-normal{
                            color: black;
                            background-color:#ffffff ;
                            border: #000000 1px solid;
                        }.btn-status-weak{
                            color: black;
                            background-color: #15FC25;
                        }
                        .btn-status-hurry{
                            color: black;
                            background-color: #FCB315;
                        }
                        .btn-status-crisis{
                            color: white;
                            background-color: #FF0000;
                        }
                        .btn-leave-the-scene{
                            color: white;
                            background-color:#1877F2 ;
                        }
                        .btn-hospital{
                            color: white;
                            background-color: #00B900;
                        }
                    </style>
                    <div class="col-12 d-none">
                        <h1>สถานะต่างๆ</h1>
                        <hr>
                        <button class=" btn-request btn-status">
                            รับแจ้งเหตุ
                        </button>
                        <button class=" btn-order btn-status">
                            สั่งการ
                        </button>
                        <button class="btn-leave btn-status">
                            ออกจากฐาน
                        </button>
                        <button class="btn-to btn-status">
                            ถึงที่เกิดเหตุ
                        </button>
                        <button class="btn-status-other btn-status">
                            สถานะการณ์<br>(รับบริการอื่นๆ)
                        </button>
                        <button class="btn-status-normal btn-status">
                            สถานะการณ์<br>(ทั่วไป)
                        </button>
                        <button class="btn-status-weak btn-status">
                            สถานะการณ์<br>(ไม่รุนแรง)
                        </button>
                        <button class="btn-status-hurry btn-status">
                            สถานะการณ์<br>(เร่งด่วน)
                        </button>
                        <button class="btn-status-crisis btn-status">
                            สถานะการณ์<br>(วิกฤติ)
                        </button>
                        <button class="btn-leave-the-scene btn-status">
                            ออกจากที่เกิดเหตุ
                        </button>
                        <button class="btn-hospital btn-status" >
                            ถึง รพ.
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="container-partner-sos">
    <div class="item sos-map col-md-12 col-12 col-lg-4">
        <div class="row">
            <div class="col-6">
                <a style="float: left; background-color: green;" type="button" class="btn text-white" onclick="initMap();">
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>
                <br><br>
            </div>
            <div class="col-6">
            </div>
            <div class="col-12">
                <div style="padding-right:15px ;">
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8 d-none d-lg-block">
        <div class="row">
            <div class="col-3">
                <div class="btn-group">
                    <button type="button" class="btn btn-info text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เลือกพื้นที่
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">พื้นที่ 1</a>
                        <a class="dropdown-item" href="#">พื้นที่ 2</a>
                        <a class="dropdown-item" href="#">พื้นที่ 3</a>
                        <a class="dropdown-item" href="#">พื้นที่ 4</a>
                        <a class="dropdown-item" href="#">พื้นที่ 5</a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div style="float:right;">
                    <button  type="button" class="btn btn-danger text-white" onclick="create_new_sos_help_center();">
                       <i class="fa-solid fa-circle-plus"></i> การขอความช่วยเหลือใหม่
                    </button>
                    <button  type="button" class="btn btn-primary">
                        <i class="fas fa-chart-line"></i> ดูช่วงเวลา
                    </button>
                    <button  type="button" class="btn btn-primary">
                        <i class="fa-solid fa-hundred-points"></i> คะแนนการช่วยเหลือ
                    </button>
                    <button  type="button" class="btn btn-success">
                        <i class="fas fa-info-circle"></i> วิธีใช้
                    </button>
                </div>
            </div>
            <br><br>
            <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="margin-top: 10px;" onclick="document.querySelector('').classList">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
                            <br>
                            <h3>ชื่อพื้นที่ : <span class="text-info">ทั้งหมด</span></h3>
                            <br>

                            <h5 class="font-weight-bold mb-0" style="margin-top:10px;">
                                การขอความช่วยเหลือ
                                <span style="font-size: 15px; float: right; margin-top:-5px;">
                                จำนวนทั้งหมด <b> $count_data </b> ครั้ง
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                ระยะเวลาโดยเฉลี่ย <b> 5 วัน 6 ชม. 7 นาที </b> / เคส (8)
                            </span>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="item sos-map" id="menu_card" style="background-color:#E0FFFF;z-index: 999;">
                    <hr style="color:black;background-color:black;height:2px;">
                    <div class="card-body">
                        <div id="menu_card_br"></div>
                        <div class="row text-center">
                            <div class="col-3">
                                <b>ผู้ขอความช่วยเหลือ</b>
                            </div>
                            <div class="col-2">
                                <b>เวลาแจ้งเหตุ</b>
                            </div>
                            <div class="col-2">
                                <b>สถานะ</b>
                            </div>
                            <div class="col-2">
                                <b>ระยะเวลา</b>
                            </div>
                            <div class="col-1">
                                <b>ตำแหน่ง</b>
                            </div>
                            <div class="col-2">
                                <b></b>
                            </div>
                        </div>
                    </div>
                    <hr style="color:black;background-color:black;height:2px;">
                </div>

                <div class="card-body">
                    @foreach($data_sos as $item)
                        <div class="row text-center"> 
                            <div class="col-3">
                                {{ $item->name_user }}
                            </div>
                            <div class="col-2">
                                {{ $item->created_at }}
                            </div>
                            <div class="col-2">
                                {{ $item->status }}
                            </div>
                            <div class="col-2">
                                ...
                            </div>
                            <div class="col-1">
                                {{ $item->lat }} , {{ $item->lng }}
                            </div>
                            <div class="col-2">
                                <a href="{{ url('/sos_help_center/' . $item->id . '/edit') }}" class="btn btn-sm btn-info text-white">ดูข้อมูล</a>
                            </div>
                            <br><br>
                            <hr>
                            <br>
                        </div>
                        <div style="float: right;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<script>
   $(function() {
  // Owl Carousel
  var owl = $(".owl-carousel-search");
  owl.owlCarousel({
    margin: 10,
    loop: false,
    nav: true,
    autoWidth:true,
    items:4,
    dots:false,
    responsive:{
    0:{
     items:1,
     autoWidth:false 
    },
    768:{
     items:3
    }
   } 
  });
});

</script>
<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();

        if('{{ Auth::user()->organization }}' == 'สพฉ' && '{{ Auth::user()->sub_organization }}' != 'ศูนย์ใหญ่'){
            show_location_A();
        }

        fist_real_time_check_refuse_and_call();

    });

    var show_min_average_per_case ;
    var show_count_success_average ;
    var show_div_card_average ;

    function show_average_time(){

        let area = "{{ Auth::user()->sub_organization }}" ;

        fetch("{{ url('/') }}/api/sos_help_center/show_average_time/" + area)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){
                    show_min_average_per_case = result['show_min_average_per_case'] ;
                    show_count_success_average = result['count_success'] ;
                    show_div_card_average = result['bg_average'] ;

                    document.querySelector('#span_min_average_per_case').innerHTML = show_min_average_per_case ;
                    document.querySelector('#span_count_success_average').innerHTML = show_count_success_average ;

                    let div_card_average = document.querySelector('#div_card_average');
                    // console.log(div_card_average.classList[3]);

                    let drop_class_div_card_average = div_card_average.classList[3] ;

                    document.querySelector('#div_card_average').classList.remove(drop_class_div_card_average);
                    document.querySelector('#div_card_average').classList.add(show_div_card_average);
                }
        });
    }
    
    const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";

    function initMap() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        @foreach($data_sos as $item)
            marker = new google.maps.Marker({
                position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
                map: map,
                icon: image_sos,
            });
        @endforeach
        
        show_average_time();
        // click_select_area_map("{{ Auth::user()->sub_organization }}");

        if ('{{ Auth::user()->organization }}' == 'สพฉ' && '{{ Auth::user()->sub_organization }}' != 'ศูนย์ใหญ่') {
            draw_area_help_center('{{ Auth::user()->sub_organization }}') ;
        }else if('{{ Auth::user()->organization }}' == 'สพฉ' && '{{ Auth::user()->sub_organization }}' == 'ศูนย์ใหญ่'){
            draw_area_help_center('ศูนย์ใหญ่') ;
        }

    }

    function draw_area_help_center(type){

        let all_lat_lng = [];

        fetch("{{ url('/') }}/api/draw_area_help_center/" + type)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let bounds = new google.maps.LatLngBounds();

                for (let ii = 0; ii < result.length; ii++) {
                    for (let xx = 0; xx < JSON.parse(result[ii]['polygon']).length; xx++) {

                        all_lat_lng.push(JSON.parse(result[ii]['polygon'])[xx]);

                        bounds.extend(all_lat_lng[xx]);
                    }
                }

                if (type != 'ศูนย์ใหญ่') {
                    map.fitBounds(bounds);
                }


                for (let xi = 0; xi < result.length; xi++) {

                    let color_poly = [] ;

                    if (result[xi]['sos_1669_show'] == 'show') {
                        color_poly[xi] = '#006400' ;
                    }else if (result[xi]['sos_1669_show'] == 'test'){
                        color_poly[xi] = '#FF4500' ;
                    }else if (result[xi]['sos_1669_show'] == 'no'){
                        color_poly[xi] = '#696969' ;
                    }

                    // วาดแยกแต่ละพื้นที่
                    let draw_area_other = new google.maps.Polygon({
                        paths: JSON.parse(result[xi]['polygon']),
                        strokeColor: color_poly[xi],
                        strokeOpacity: 0.8,
                        strokeWeight: 1,
                        fillColor: color_poly[xi],
                        fillOpacity: 0.25,
                        zIndex:10,
                    });
                    draw_area_other.setMap(map);

                }
        });
    }

    function create_new_sos_help_center(){

        let user_id = {{ $data_user->id }} ;

        fetch("{{ url('/') }}/api/create_new_sos_help_center/" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result) {
                    window.location.replace("{{ url('/') }}/sos_help_center/" + result + "/edit");
                }
        });

    }

    function click_select_area_map(province_name){

        // console.log("click_select_area_map >> " + province_name);

        document.querySelector('#span_text_show_area').innerHTML = province_name ;

        if(province_name == "ทั้งหมด"){

            initMap();

            document.querySelector('#div_body_help').classList.add('d-none');

            let div_body_help = document.querySelector('#div_body_help');
                div_body_help.innerHTML = "" ;

            document.querySelector('#data_help').classList.remove('d-none');
            document.querySelector('#span_count_data').innerHTML = "{{ count($data_sos) }}";

            document.querySelector('#span_min_average_per_case').innerHTML = show_min_average_per_case ;
            document.querySelector('#span_count_success_average').innerHTML = show_count_success_average ;

        }else{

            if (marker) {
                marker.setMap(null);
            }

            let all_draw_area_select = [] ;
            fetch("{{ url('/') }}/api/draw_area_select/" + province_name)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    let bounds = new google.maps.LatLngBounds();

                    for (let ii = 0; ii < result.length; ii++) {
                        for (let xx = 0; xx < JSON.parse(result[ii]['polygon']).length; xx++) {

                            all_draw_area_select.push(JSON.parse(result[ii]['polygon'])[xx]);

                            bounds.extend(all_draw_area_select[xx]);
                        }
                    }

                    map = new google.maps.Map(document.getElementById("map"), {
                        // center: {lat: m_lat, lng: m_lng },
                        // zoom: m_numZoom,
                    });
                    map.fitBounds(bounds);


                    for (let xi = 0; xi < result.length; xi++) {

                        let color_poly = [] ;

                        if (result[xi]['sos_1669_show'] == 'show') {
                            color_poly[xi] = '#006400' ;
                        }else if (result[xi]['sos_1669_show'] == 'test'){
                            color_poly[xi] = '#FF4500' ;
                        }else if (result[xi]['sos_1669_show'] == 'no'){
                            color_poly[xi] = '#696969' ;
                        }

                        // วาดแยกแต่ละพื้นที่
                        let draw_area_other = new google.maps.Polygon({
                            paths: JSON.parse(result[xi]['polygon']),
                            strokeColor: color_poly[xi],
                            strokeOpacity: 0.8,
                            strokeWeight: 1,
                            fillColor: color_poly[xi],
                            fillOpacity: 0.25,
                            zIndex:10,
                        });
                        draw_area_other.setMap(map);

                    }
            });

            fetch("{{ url('/') }}/api/marker_area_select/" + province_name)
                .then(response => response.json())
                .then(result => {
                    // console.log('marker_area_select');
                    // console.log(result);

                    document.querySelector('#div_body_help').classList.remove('d-none');

                    let div_body_help = document.querySelector('#div_body_help');
                        div_body_help.innerHTML = "" ;

                    document.querySelector('#data_help').classList.add('d-none');
                    document.querySelector('#span_count_data').innerHTML = result.length;

                    let all_time = 0 ;
                    let count_all_time = 0 ;

                    for (var xxi = 0; xxi < result.length; xxi++) {

                        marker = new google.maps.Marker({
                            position: {lat: parseFloat( result[xxi]['lat'] ) , lng: parseFloat( result[xxi]['lng'] ) },
                            map: map,
                            icon: image_sos,
                        });

                        let div_data_add = document.createElement("div");
                        let id_div_data_add = document.createAttribute("id");
                            id_div_data_add.value = "data_id_" + result[xxi]['id'];
                            div_data_add.setAttributeNode(id_div_data_add);
                        let class_div_data_add = document.createAttribute("class");
                            class_div_data_add.value = "col-12";
                            div_data_add.setAttributeNode(class_div_data_add);
                        div_body_help.appendChild(div_data_add);

                        let data_html = [] ;
                            data_html['id'] = result[xxi]['id'] ;
                            data_html['lat'] = result[xxi]['lat'] ;
                            data_html['lng'] = result[xxi]['lng'] ;
                            data_html['name_user'] = result[xxi]['name_user'] ;
                            data_html['phone_user'] = result[xxi]['phone_user'] ;
                            data_html['photo_sos'] = result[xxi]['photo_sos'] ;
                            data_html['operating_code'] = result[xxi]['operating_code'] ;
                            data_html['created_at'] = result[xxi]['created_at'] ;
                            data_html['status'] = result[xxi]['status'] ;
                            data_html['remark_status'] = result[xxi]['remark_status'] ;
                            data_html['address'] = result[xxi]['address'] ;
                            data_html['organization_helper'] = result[xxi]['organization_helper'] ;
                            data_html['name_helper'] = result[xxi]['name_helper'] ;

                            data_html['be_notified'] = result[xxi]['be_notified'] ;
                            data_html['idc'] = result[xxi]['idc'] ;
                            data_html['rc'] = result[xxi]['rc'] ;
                            data_html['rc_black_text'] = result[xxi]['rc_black_text'] ;
                            data_html['score_total'] = result[xxi]['score_total'] ;

                            data_html['time_create_sos'] = result[xxi]['time_create_sos'] ;
                            data_html['time_command'] = result[xxi]['time_command'] ;
                            data_html['time_go_to_help'] = result[xxi]['time_go_to_help'] ;
                            data_html['time_to_the_scene'] = result[xxi]['time_to_the_scene'] ;
                            data_html['time_leave_the_scene'] = result[xxi]['time_leave_the_scene'] ;
                            data_html['time_hospital'] = result[xxi]['time_hospital'] ;

                            data_html['forward_operation_to'] = result[xxi]['forward_operation_to'] ;
                            data_html['forward_operation_from'] = result[xxi]['forward_operation_from'] ;
                            data_html['photo_user'] = result[xxi]['photo_user'] ;

                        let result_id = result[xxi]['id'] ;

                        if(result[xxi]['forward_operation_to']){

                            fetch("{{ url('/') }}/api/get_forward_operation/" + result[xxi]['forward_operation_to'] )
                                .then(response => response.json())
                                .then(result_forward => {
                                    // console.log("result_forward");
                                    // console.log(result_forward);

                                    data_html['forward_operation_to_code'] = result_forward['operating_code'];
                                    data_html['forward_operation_to_status'] = result_forward['status'];
                                    data_html['forward_operation_to_name_helper'] = result_forward['name_helper'];

                                    let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                                    document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                                });

                        }else if(result[xxi]['forward_operation_from']){

                            fetch("{{ url('/') }}/api/get_forward_operation/" + result[xxi]['forward_operation_from'] )
                                .then(response => response.json())
                                .then(result_forward => {
                                    // console.log("result_forward");
                                    // console.log(result_forward);

                                    data_html['forward_operation_from_code'] = result_forward['operating_code'];
                                    data_html['forward_operation_from_status'] = result_forward['status'];
                                    data_html['forward_operation_from_name_helper'] = result_forward['name_helper'];

                                    let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                                    document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                                });

                        }else{
                            let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                            document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                        }

                        if (result[xxi]['status'] == "เสร็จสิ้น"){

                            count_all_time = count_all_time + 1 ;
                            // ---------------------- TIME  ---------------------- //
                            let time1 ;
                            let time2 ;

                            // time 1
                            if (result[xxi]['time_create_sos']) {
                                time1 = result[xxi]['time_create_sos'] ;
                            }
                            // time 2
                            if (result[xxi]['time_command'] ) {
                                time2 = result[xxi]['time_command'] ;
                            }
                            if (result[xxi]['time_go_to_help']) {
                                time2 = result[xxi]['time_go_to_help'] ;
                            }
                            if (result[xxi]['time_to_the_scene']) {
                                time2 = result[xxi]['time_to_the_scene'] ;
                            }
                            if (result[xxi]['time_leave_the_scene']) {
                                time2 = result[xxi]['time_leave_the_scene'] ;
                            }
                            if (result[xxi]['time_hospital']) {
                                time2 = result[xxi]['time_hospital'] ;
                            }

                            if (time1 && time2) {

                                time1 = time1.split(" ")[1];
                                time2 = time2.split(" ")[1];

                                // Extract the hours, minutes, and seconds from the two times
                                let [zone1_hours1, zone1_minutes1, zone1_seconds1] = time1.split(":");
                                let [zone1_hours2, zone1_minutes2, zone1_seconds2] = time2.split(":");
                                // Convert the hours, minutes, and seconds to the total number of seconds
                                let zone1_totalSeconds1 = parseInt(zone1_hours1) * 3600 + parseInt(zone1_minutes1) * 60 + parseInt(zone1_seconds1);
                                let zone1_totalSeconds2 = parseInt(zone1_hours2) * 3600 + parseInt(zone1_minutes2) * 60 + parseInt(zone1_seconds2);
                                // Calculate the time difference in seconds
                                let zone1_TotalSeconds = zone1_totalSeconds2 - zone1_totalSeconds1;
                                    // console.log('TotalSeconds >> ' + TotalSeconds);
                                let zone1_Time_min =  Math.floor(zone1_TotalSeconds / 60);
                                    // console.log('Time_min >> ' + Time_min);
                                let zone1_Time_Seconds = zone1_TotalSeconds - (zone1_Time_min*60);
                                    // console.log('Time_Seconds >> ' + Time_Seconds);

                                let min_1_to_sec = zone1_Time_min * 60 ;
                                all_time = all_time + min_1_to_sec + zone1_Time_Seconds ;

                                all_time = all_time / count_all_time ;
                            }

                        }

                    }

                    // ---------------------- TIME ALL ---------------------- //

                    // Convert seconds to hours, minutes, and seconds
                    let hours_all_time = Math.floor(all_time / 3600);
                    let minutes_all_time = Math.floor((all_time % 3600) / 60);
                    let seconds_all_time = Math.floor(all_time % 60);

                    // Create a string to display the time in the desired format
                    let text_all_time = '';
                    if (hours_all_time > 0) {
                      text_all_time += `${hours_all_time} ชั่วโมง${hours_all_time > 1 ? '' : ''} `;
                    }
                    text_all_time += `${minutes_all_time} นาที${minutes_all_time > 1 ? '' : ''} `;
                    text_all_time += `${seconds_all_time} วินาที${seconds_all_time > 1 ? '' : ''}`;

                    document.querySelector('#span_min_average_per_case').innerHTML = text_all_time ;
                    document.querySelector('#span_count_success_average').innerHTML = count_all_time ;
            });

        }
        
    }

</script>

<script>
    // Get the menu element
    const menu = document.querySelector('#menu_card');

    // Add an event listener that updates the visibility of the menu when the page is scrolled
    window.addEventListener('scroll', function() {

        // Calculate the distance from the top of the page
        const distanceFromTop = window.pageYOffset || document.documentElement.scrollTop;
            // console.log(distanceFromTop);
        
        if (menu) {
            // If the distance from the top is greater than 0, hide the menu
            if (distanceFromTop >= 270) {
                menu.classList.add('mt-0') ;
            } else {
                menu.classList.remove('mt-0'); 
            }
        }
    });

</script>
<script>

    let delayTimer; // Global variable to store the delay timer

    function search_data_help(){
        // Clear any pending delay timer
        clearTimeout(delayTimer);
        
        // Start a new delay timer of 2 seconds before executing data_help_center()
        delayTimer = setTimeout(delay_2_seconds, 1000);
    }

    function delay_2_seconds(){
        // console.log("search_data_help");
        // search_data_help

        let data_search = document.querySelector('#search').value;

        // ข้อมูลทั่วไป
        let data_id = document.querySelector('#id').value;
        let data_search_be_notified = document.querySelector('#search_be_notified').value;
        let data_search_status = document.querySelector('#search_status').value;
        let data_rangeOne_officer_rating = document.querySelector('#rangeOne_officer_rating').value;
        let data_rangeTwo_officer_rating = document.querySelector('#rangeTwo_officer_rating').value;
        // ข้อมูลผู้ขอความช่วยเหลือ
        let data_name = document.querySelector('#name').value;
        let data_search_phone_sos = document.querySelector('#search_phone_sos').value;
        // ข้อมูลองค์กร
        let data_helper = document.querySelector('#helper').value;
        let data_organization = document.querySelector('#organization').value;
        // พื้นที่
        let search_P = document.querySelector('#search_P').value;
        let search_A = document.querySelector('#search_A').value;
        let search_T = document.querySelector('#search_T').value;
        // วันที่
        let data_date = document.querySelector('#date').value;
        let data_time1 = document.querySelector('#time1').value;
        let data_time2 = document.querySelector('#time2').value;
        // ระดับสถานะการณ์
        let idc = document.querySelectorAll('input[name="search_idc"]');
        let data_search_idc = "" ;
            idc.forEach(idc => {
                if(idc.checked){
                    data_search_idc = idc.value;
                }
            })
        let rc = document.querySelectorAll('input[name="search_rc"]');
        let data_search_rc = "" ;
            rc.forEach(rc => {
                if(rc.checked){
                    data_search_rc = rc.value;
                }
            })
            
        // -------------------------------------------------------------

        if(data_rangeOne_officer_rating != 0 || data_rangeTwo_officer_rating != 5){
            data_arr_data_rangeOne_officer_rating = data_rangeOne_officer_rating ;
            data_arr_data_rangeTwo_officer_rating = data_rangeTwo_officer_rating ;
        }else if(data_rangeOne_officer_rating == 0 && data_rangeTwo_officer_rating == 5){
            data_arr_data_rangeOne_officer_rating = "" ;
            data_arr_data_rangeTwo_officer_rating = "" ;
        }

        let data_arr = {
            'data_search' : data_search,
            'data_id' : data_id,
            'data_search_be_notified' : data_search_be_notified,
            'data_search_status' : data_search_status,
            'data_rangeOne_officer_rating' : data_arr_data_rangeOne_officer_rating,
            'data_rangeTwo_officer_rating' : data_arr_data_rangeTwo_officer_rating,
            'data_name' : data_name,
            'data_search_phone_sos' : data_search_phone_sos,
            'data_helper' : data_helper,
            'data_organization' : data_organization,
            'search_P' : search_P,
            'search_A' : search_A,
            'search_T' : search_T,
            'data_date' : data_date,
            'data_time1' : data_time1,
            'data_time2' : data_time2,
            'data_search_idc' : data_search_idc,
            'data_search_rc' : data_search_rc,
            'sub_organization' : "{{ Auth::user()->sub_organization }}",
        }

        // console.log(data_arr);

        const data_arr_values = Object.values(data_arr);

        let have_data = null ;
        for (let value of data_arr_values) {
            if(value){
                // console.log(value);
                have_data = "Yes" ;
                break;
            }
        }

        if ( have_data != "Yes" ) {
            // console.log("if");
            document.querySelector('#div_body_help').classList.add('d-none');
            document.querySelector('#data_help').classList.remove('d-none');

        }else{
            // console.log("else");
            data_help_center(data_arr); 
        }
    }

    function data_help_center(data_arr){

        document.querySelector('#div_body_help').classList.remove('d-none');

        let div_body_help = document.querySelector('#div_body_help');
            div_body_help.innerHTML = "" ;

        document.querySelector('#data_help').classList.add('d-none');
        let all_time = [] ;
        let count_all_time = 0 ;

        fetch("{{ url('/') }}/api/data_help_center?" + new URLSearchParams(data_arr))
            .then(response => response.json())
            .then(result => {
                // console.log("data_help_center");
                // console.log(result);

                if (result) {
                    for (var xxi = 0; xxi < result.length; xxi++) {

                        let div_data_add = document.createElement("div");
                        let id_div_data_add = document.createAttribute("id");
                            id_div_data_add.value = "data_id_" + result[xxi]['id'];
                            div_data_add.setAttributeNode(id_div_data_add);
                        let class_div_data_add = document.createAttribute("class");
                            class_div_data_add.value = "col-12";
                            div_data_add.setAttributeNode(class_div_data_add);
                        div_body_help.appendChild(div_data_add);

                        let data_html = [] ;
                            data_html['id'] = result[xxi]['id'] ;
                            data_html['lat'] = result[xxi]['lat'] ;
                            data_html['lng'] = result[xxi]['lng'] ;
                            data_html['name_user'] = result[xxi]['name_user'] ;
                            data_html['phone_user'] = result[xxi]['phone_user'] ;
                            data_html['photo_sos'] = result[xxi]['photo_sos'] ;
                            data_html['operating_code'] = result[xxi]['operating_code'] ;
                            data_html['created_at'] = result[xxi]['created_at'] ;
                            data_html['status'] = result[xxi]['status'] ;
                            data_html['remark_status'] = result[xxi]['remark_status'] ;
                            data_html['address'] = result[xxi]['address'] ;
                            data_html['organization_helper'] = result[xxi]['organization_helper'] ;
                            data_html['name_helper'] = result[xxi]['name_helper'] ;

                            data_html['be_notified'] = result[xxi]['be_notified'] ;
                            data_html['idc'] = result[xxi]['idc'] ;
                            data_html['rc'] = result[xxi]['rc'] ;
                            data_html['rc_black_text'] = result[xxi]['rc_black_text'] ;
                            data_html['score_total'] = result[xxi]['score_total'] ;

                            data_html['time_create_sos'] = result[xxi]['time_create_sos'] ;
                            data_html['time_command'] = result[xxi]['time_command'] ;
                            data_html['time_go_to_help'] = result[xxi]['time_go_to_help'] ;
                            data_html['time_to_the_scene'] = result[xxi]['time_to_the_scene'] ;
                            data_html['time_leave_the_scene'] = result[xxi]['time_leave_the_scene'] ;
                            data_html['time_hospital'] = result[xxi]['time_hospital'] ;

                            data_html['forward_operation_to'] = result[xxi]['forward_operation_to'] ;
                            data_html['forward_operation_from'] = result[xxi]['forward_operation_from'] ;
                            data_html['photo_user'] = result[xxi]['photo_user'] ;

                        let result_id = result[xxi]['id'] ;

                        if(result[xxi]['forward_operation_to']){

                            fetch("{{ url('/') }}/api/get_forward_operation/" + result[xxi]['forward_operation_to'] )
                                .then(response => response.json())
                                .then(result_forward => {
                                    // console.log("result_forward");
                                    // console.log(result_forward);

                                    data_html['forward_operation_to_code'] = result_forward['operating_code'];
                                    data_html['forward_operation_to_status'] = result_forward['status'];
                                    data_html['forward_operation_to_name_helper'] = result_forward['name_helper'];

                                    let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                                    document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                                });

                        }else if(result[xxi]['forward_operation_from']){

                            fetch("{{ url('/') }}/api/get_forward_operation/" + result[xxi]['forward_operation_from'] )
                                .then(response => response.json())
                                .then(result_forward => {
                                    // console.log("result_forward");
                                    // console.log(result_forward);

                                    data_html['forward_operation_from_code'] = result_forward['operating_code'];
                                    data_html['forward_operation_from_status'] = result_forward['status'];
                                    data_html['forward_operation_from_name_helper'] = result_forward['name_helper'];

                                    let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                                    document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                                });

                        }else{
                            let div_data_help_center = new_gen_html_div_data_sos_1669(data_html);
                            document.querySelector('#data_id_' + result_id).innerHTML = div_data_help_center ;
                        }

                        // console.log("data_html");
                        // console.log(data_html);


                        if (result[xxi]['status'] == "เสร็จสิ้น"){

                            count_all_time = count_all_time + 1 ;
                            // ---------------------- TIME  ---------------------- //
                            let time1 ;
                            let time2 ;

                            // time 1
                            if (result[xxi]['time_create_sos']) {
                                time1 = result[xxi]['time_create_sos'] ;
                            }
                            // time 2
                            if (result[xxi]['time_command'] ) {
                                time2 = result[xxi]['time_command'] ;
                            }
                            if (result[xxi]['time_go_to_help']) {
                                time2 = result[xxi]['time_go_to_help'] ;
                            }
                            if (result[xxi]['time_to_the_scene']) {
                                time2 = result[xxi]['time_to_the_scene'] ;
                            }
                            if (result[xxi]['time_leave_the_scene']) {
                                time2 = result[xxi]['time_leave_the_scene'] ;
                            }
                            if (result[xxi]['time_hospital']) {
                                time2 = result[xxi]['time_hospital'] ;
                            }

                            if (time1 && time2) {

                                time1 = time1.split(" ")[1];
                                time2 = time2.split(" ")[1];

                                // Extract the hours, minutes, and seconds from the two times
                                let [zone1_hours1, zone1_minutes1, zone1_seconds1] = time1.split(":");
                                let [zone1_hours2, zone1_minutes2, zone1_seconds2] = time2.split(":");
                                // Convert the hours, minutes, and seconds to the total number of seconds
                                let zone1_totalSeconds1 = parseInt(zone1_hours1) * 3600 + parseInt(zone1_minutes1) * 60 + parseInt(zone1_seconds1);
                                let zone1_totalSeconds2 = parseInt(zone1_hours2) * 3600 + parseInt(zone1_minutes2) * 60 + parseInt(zone1_seconds2);
                                // Calculate the time difference in seconds
                                let zone1_TotalSeconds = zone1_totalSeconds2 - zone1_totalSeconds1;
                                    // console.log('TotalSeconds >> ' + TotalSeconds);
                                let zone1_Time_min =  Math.floor(zone1_TotalSeconds / 60);
                                    // console.log('Time_min >> ' + Time_min);
                                let zone1_Time_Seconds = zone1_TotalSeconds - (zone1_Time_min*60);
                                    // console.log('Time_Seconds >> ' + Time_Seconds);

                                let min_1_to_sec = zone1_Time_min * 60 ;

                                all_time[result[xxi]['id']] = min_1_to_sec + zone1_Time_Seconds ;

                            }

                        }

                    }

                    // ---------------------- TIME ALL ---------------------- //
                    if(count_all_time != 0){

                        let sum_time_total_help = 0 ;

                        all_time.forEach(
                            element => sum_time_total_help += element
                        );

                        sum_time_total_help = Math.floor(sum_time_total_help / count_all_time);

                        // Convert seconds to hours, minutes, and seconds
                        let hours_all_time = Math.floor(sum_time_total_help / 3600);
                        let minutes_all_time = Math.floor((sum_time_total_help % 3600) / 60);
                        let seconds_all_time = Math.floor(sum_time_total_help % 60);

                        // Create a string to display the time in the desired format
                        let text_all_time = '';
                        if (hours_all_time > 0) {
                          text_all_time += `${hours_all_time} ชั่วโมง${hours_all_time > 1 ? '' : ''} `;
                        }
                        text_all_time += `${minutes_all_time} นาที${minutes_all_time > 1 ? '' : ''} `;
                        text_all_time += `${seconds_all_time} วินาที${seconds_all_time > 1 ? '' : ''}`;

                        document.querySelector('#span_count_data').innerHTML = result.length;
                        document.querySelector('#span_min_average_per_case').innerHTML = text_all_time ;
                        document.querySelector('#span_count_success_average').innerHTML = count_all_time ;

                         // ตรวจสอบว่าเกิน 8 หรือ 12 หรือไม่
                        let bg_average ;

                        if(sum_time_total_help < 480){
                            bg_average = "bg-gradient-Ohhappiness";
                        }else if(sum_time_total_help >= 480 && sum_time_total_help < 720){
                            bg_average = "bg-gradient-kyoto";
                        }else if(sum_time_total_help >= 720){
                            bg_average = "bg-gradient-burning";
                        }

                        let class_div_card_average = document.querySelector('#div_card_average').classList;
                            // console.log(class_div_card_average);
                        let class_num = parseInt(class_div_card_average.length) - 1 ;
                        document.querySelector('#div_card_average').classList.remove(class_div_card_average[class_num]);
                        document.querySelector('#div_card_average').classList.add(bg_average);

                    }else{
                        document.querySelector('#span_count_data').innerHTML = '';
                        document.querySelector('#span_min_average_per_case').innerHTML = "ไม่มีข้อมูล" ;
                        document.querySelector('#span_count_success_average').innerHTML = '' ;

                        let class_div_card_average = document.querySelector('#div_card_average').classList;
                            // console.log(class_div_card_average);
                        let class_num = parseInt(class_div_card_average.length) - 1 ;
                        document.querySelector('#div_card_average').classList.remove(class_div_card_average[class_num]);
                        document.querySelector('#div_card_average').classList.add('bg-gradient-moonlit');
                    }
                    // ---------------------- END TIME ALL ---------------------- //

                }   

                

            })

    }

    // var old_bg_average = "{ $bg_average }" ;
    var old_bg_average = "bg-gradient-kyoto" ;

    function clear_search_data_help(){

        let class_div_card_average = document.querySelector('#div_card_average').classList;
            // console.log(class_div_card_average);
        let class_num = parseInt(class_div_card_average.length) - 1 ;
        document.querySelector('#div_card_average').classList.remove(class_div_card_average[class_num]);
        document.querySelector('#div_card_average').classList.add(old_bg_average);

        document.querySelector('#search').value = "";

        // ข้อมูลทั่วไป
        document.querySelector('#id').value = "";
        document.querySelector('#search_be_notified').value = "";
        document.querySelector('#search_status').value = "";
        document.querySelector('#rangeOne_officer_rating').value = 0;
        document.querySelector('#rangeTwo_officer_rating').value = 5;
        // ข้อมูลผู้ขอความช่วยเหลือ
        document.querySelector('#name').value = "";
        document.querySelector('#search_phone_sos').value = "";
        // ข้อมูลองค์กร
        document.querySelector('#helper').value = "";
        document.querySelector('#organization').value = "";
        // พื้นที่
        document.querySelector('#search_P').value = "";
        document.querySelector('#search_A').value = "";
        document.querySelector('#search_T').value = "";
        // วันที่
        document.querySelector('#date').value = "";
        document.querySelector('#time1').value = "";
        document.querySelector('#time2').value = "";
        // ระดับสถานะการณ์
        let idc = document.querySelectorAll('input[name="search_idc"]');
        let data_search_idc = "" ;
            idc.forEach(idc => {
                if(idc.value == ""){
                    idc.checked = true ;
                }
            })
        let rc = document.querySelectorAll('input[name="search_idc"]');
        let data_search_rc = "" ;
            rc.forEach(rc => {
                if(rc.value == ""){
                    rc.checked = true ;
                }
            })

        updateView.call(rangeOne_officer_rating);
        updateView.call(rangeTwo_officer_rating);

        document.querySelector('#div_body_help').classList.add('d-none');
        document.querySelector('#data_help').classList.remove('d-none');
        document.querySelector('#span_count_data').innerHTML = "{{ count($data_sos) }}";

        document.querySelector('#span_min_average_per_case').innerHTML = show_min_average_per_case ;
        document.querySelector('#span_count_success_average').innerHTML = show_count_success_average ;

        if('{{ Auth::user()->organization }}' == 'สพฉ' && '{{ Auth::user()->sub_organization }}' == 'ศูนย์ใหญ่'){
            click_select_area_map('ทั้งหมด');
        }
    }

    function fist_real_time_check_refuse_and_call(){
        
        // console.log('real_time_check_refuse_and_call');

        let all_notification_refuse = document.querySelectorAll('.notification-refuse');
        let all_notification_call = document.querySelectorAll('.notification-call');
        let all_notification_meet = document.querySelectorAll('.notification-meet');
        let card_data_sos = document.querySelectorAll('.card-data-sos');

        all_notification_refuse.forEach(Item_1 => {
           Item_1.classList.add('d-none');
        })

        all_notification_call.forEach(Item_2 => {
           Item_2.classList.add('d-none');
        })

        all_notification_meet.forEach(Item_3 => {
           Item_3.classList.add('d-none');
        })

        card_data_sos.forEach(Item_4 => {
           Item_4.classList.remove('border-color-change-color');
        })

        fetch("{{ url('/') }}/api/real_time_check_refuse_and_call?user_id="+'{{ Auth::user()->id }}')
            .then(response => response.json())
            .then(result => {
                // console.log("real_time_check_refuse_and_call");
                // console.log(result);
                // console.log('--------------------------------');

                let result_refuse = result['refuse'].split(",");
                let result_call = result['call'].split(",");
                let result_meet = result['meet'].split(",");
                    // console.log('result_refuse >> ' + result_refuse);
                    // console.log('result_call >> ' + result_call);
                    // console.log('result_refuse[0] >> ' + result_refuse[0]);
                    // console.log('result_call[0] >> ' + result_call[0]);

                if(result_refuse[0] && result_refuse[0] != 'ไม่มีข้อมูล'){
                    for(let ii = 0; ii < result_refuse.length; ii++){
                        document.querySelector('#notification_refuse_sos_id_'+result_refuse[ii]).classList.remove('d-none');
                        // border-color-change-color
                        let div_card_refuse = document.querySelector('.card_sos_id_'+result_refuse[ii]);
                            div_card_refuse.classList.add('border-color-change-color');
                    }
                }

                if(result_call[0] && result_call[0] != 'ไม่มีข้อมูล'){
                    for(let xx = 0; xx < result_call.length; xx++){
                        document.querySelector('#notification_call_sos_id_'+result_call[xx]).classList.remove('d-none');
                        let div_card_call = document.querySelector('.card_sos_id_'+result_call[xx]);
                            div_card_call.classList.add('border-color-change-color');
                    }
                }

                if(result_meet[0] && result_meet[0] != 'ไม่มีข้อมูล'){
                    for(let xx = 0; xx < result_meet.length; xx++){
                        document.querySelector('#notification_meet_sos_id_'+result_meet[xx]).classList.remove('d-none');
                        let div_card_meet = document.querySelector('.card_sos_id_'+result_meet[xx]);
                            div_card_meet.classList.add('border-color-change-color');
                    }
                }

            });

        real_time_check_refuse_and_call();

    }

    function real_time_check_refuse_and_call(){
        
        setInterval(function() {
            // console.log('real_time_check_refuse_and_call');

            let all_notification_refuse = document.querySelectorAll('.notification-refuse');
            let all_notification_call = document.querySelectorAll('.notification-call');
            let all_notification_meet = document.querySelectorAll('.notification-meet');
            let card_data_sos = document.querySelectorAll('.card-data-sos');

            all_notification_refuse.forEach(Item_1 => {
               Item_1.classList.add('d-none');
            })

            all_notification_call.forEach(Item_2 => {
               Item_2.classList.add('d-none');
            })

            all_notification_meet.forEach(Item_3 => {
               Item_3.classList.add('d-none');
            })

            card_data_sos.forEach(Item_4 => {
               Item_4.classList.remove('border-color-change-color');
            })

            fetch("{{ url('/') }}/api/real_time_check_refuse_and_call?user_id="+'{{ Auth::user()->id }}')
                .then(response => response.json())
                .then(result => {
                    // console.log("real_time_check_refuse_and_call");
                    // console.log(result);
                    // console.log('--------------------------------');

                    let result_refuse = result['refuse'].split(",");
                    let result_call = result['call'].split(",");
                    let result_meet = result['meet'].split(",");
                        // console.log('result_refuse >> ' + result_refuse);
                        // console.log('result_call >> ' + result_call);
                        // console.log('result_refuse[0] >> ' + result_refuse[0]);
                        // console.log('result_call[0] >> ' + result_call[0]);

                    if(result_refuse[0] && result_refuse[0] != 'ไม่มีข้อมูล'){
                        for(let ii = 0; ii < result_refuse.length; ii++){
                            document.querySelector('#notification_refuse_sos_id_'+result_refuse[ii]).classList.remove('d-none');
                            // border-color-change-color
                            let div_card_refuse = document.querySelector('.card_sos_id_'+result_refuse[ii]);
                                div_card_refuse.classList.add('border-color-change-color');
                        }
                    }

                    if(result_call[0] && result_call[0] != 'ไม่มีข้อมูล'){
                        for(let xx = 0; xx < result_call.length; xx++){
                            document.querySelector('#notification_call_sos_id_'+result_call[xx]).classList.remove('d-none');
                            let div_card_call = document.querySelector('.card_sos_id_'+result_call[xx]);
                                div_card_call.classList.add('border-color-change-color');
                        }
                    }

                    if(result_meet[0] && result_meet[0] != 'ไม่มีข้อมูล'){
                        for(let xx = 0; xx < result_meet.length; xx++){
                            document.querySelector('#notification_meet_sos_id_'+result_meet[xx]).classList.remove('d-none');
                            let div_card_meet = document.querySelector('.card_sos_id_'+result_meet[xx]);
                                div_card_meet.classList.add('border-color-change-color');
                        }
                    }

                });

        }, 6000);

    }
</script>

<!-- input range -->
<script>
    let rangeOne_officer_rating = document.querySelector('input[name="rangeOne_officer_rating"]'),
        rangeTwo_officer_rating = document.querySelector('input[name="rangeTwo_officer_rating"]'),
        outputOne = document.querySelector('.outputOne'),
        outputTwo = document.querySelector('.outputTwo'),
        inclRange = document.querySelector('.incl-range'),
        updateView = function () {
            if (this.getAttribute('name') === 'rangeOne_officer_rating') {
                outputOne.innerHTML = this.value;
                outputOne.style.left = this.value / this.getAttribute('max') * 100 + '%';
            } else {
                outputTwo.style.left = this.value / this.getAttribute('max') * 100 + '%';
                outputTwo.innerHTML = this.value
            }
            if (parseInt(rangeOne_officer_rating.value) > parseInt(rangeTwo_officer_rating.value)) {
                inclRange.style.width = (rangeOne_officer_rating.value - rangeTwo_officer_rating.value) / this.getAttribute('max') * 100 + '%';
                inclRange.style.left = rangeTwo_officer_rating.value / this.getAttribute('max') * 100 + '%';
            } else {
                inclRange.style.width = (rangeTwo_officer_rating.value - rangeOne_officer_rating.value) / this.getAttribute('max') * 100 + '%';
                inclRange.style.left = rangeOne_officer_rating.value / this.getAttribute('max') * 100 + '%';
            }
        };

    document.addEventListener('DOMContentLoaded', function () {
        updateView.call(rangeOne_officer_rating);
        updateView.call(rangeTwo_officer_rating);
        $('input[type="range"]').on('mouseup', function() {
            this.blur();
        }).on('mousedown input', function () {
            updateView.call(this);
        });
    });

    function show_location_A(){
        let location_P = document.querySelector("#search_P");
        let province_name ;

        if(!location_P.value){
            province_name = search_P_for_sub.value ;
        }else{
            province_name = location_P.value ;
        }

        fetch("{{ url('/') }}/api/location/"+province_name+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#search_A");
                    location_A.innerHTML = "";

                let option_selected = document.createElement("option");
                    option_selected.text = "อำเภอ";
                    option_selected.value = "";
                    option_selected.selected = true;
                    location_A.add(option_selected);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });

        if('{{ Auth::user()->organization }}' == 'สพฉ' && '{{ Auth::user()->sub_organization }}' == 'ศูนย์ใหญ่'){
            click_select_area_map(province_name);
        }
    }

    function show_location_T(){

        let location_P = document.querySelector("#search_P");
        let location_A = document.querySelector("#search_A");

        let province_name ;

        if(!location_P.value){
            province_name = search_P_for_sub.value ;
        }else{
            province_name = location_P.value ;
        }

        fetch("{{ url('/') }}/api/location/"+province_name+"/"+location_A.value+"/show_location_T")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_T = document.querySelector("#search_T");
                    location_T.innerHTML = "";

                let option_start = document.createElement("option");
                    option_start.text = "ตำบล";
                    option_start.value = "";
                    option_start.selected = true;
                    location_T.add(option_start);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.district;
                    option.value = item.district;
                    location_T.add(option);
                }
            });

    }
</script>
<script>
    function swip_div_map_search(){
        let div_map = document.getElementById('div_map');
        let div_search = document.getElementById('div_search');

        div_map.classList.toggle("open"); 
        div_map.classList.toggle("close");

        div_search.classList.toggle("open"); 
        div_search.classList.toggle("close");

        setTimeout(() => {
                document.querySelector('#div_map').classList.toggle('d-none');
        document.querySelector('#div_search').classList.toggle('d-none');
        }, 1000);
        
    }
    
</script>
@endsection
