@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    div{
        font-family: 'Kanit', sans-serif;
    }
    .div-map{
        position: relative;
    }.btn-reset{
        position: absolute;
        bottom: 5%;
        left: 5%;
    }.btn-area{
        position: absolute;
        bottom: 12%;
        left: 5%;
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
</style>
<div class="">
    <div class="item col-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 div-map">
                <div class="sticky">
                    <div id="map" style="border-radius:25px"></div>

                    <a style="background-color: green;" type="button" class="btn text-white btn-reset" onclick="initMap();">
                        <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                    </a>

                    <div class="btn-group btn-area">
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
            </div>
            <div class="col-12 col-md-9 col-lg-9 m-0">
                <div class="card p-2 m-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-new-help" onclick="create_new_sos_help_center();">การช่วยเหลือใหม่</button>
                            <button class="btn btn-new-help" onclick="tteesstt();">ทดสอบ</button>
                        </div>  
                        <div>
                            <div class="btn-group ">
                                <div class="flex-grow-1 mx-xl-2 my-2 my-xl-0"> 
                                    <form method="GET" action="{{ url('/help_center_admin') }}" accept-charset="UTF-8" role="search">
                                        <div class="input-group">	
                                            <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา รหัสเคส,ผู้ขอความช่วยเหลือ,หน่วยงาน" value="" oninput="search_data_help();">
                                            <button class="input-group-text bg-transparent"type="submit">
                                                <i class="bx bx-search"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary" style="border-radius: 0 5px 5px 0;"data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                ค้นหาขั้นสูง
                                            </button>
                                            
                                            <!-- Modal -->
                                            <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" style="border-radius: 15px;">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h6>
                                                                        ข้อมูลทั่วไป
                                                                    </h6>
                                                                    <div class="row">
                                                                         <div class="col-6">
                                                                            <input type="text" id="id" name="id" value="{{ request('id') }}" class="form-control" placeholder="รหัสเคส"> 
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="text" id="name" name="name" value="{{ request('name') }}" class="form-control" placeholder="ผู้ขอความช่วยเหลือ">
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <h6>
                                                                        องค์กร
                                                                    </h6>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <input type="text" id="organization" name="organization" value="{{ request('organization') }}" class="form-control" placeholder="หน่วยงาน">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="text" id="helper" name="helper" value="{{ request('helper') }}" class="form-control" placeholder="เจ้าหน้าที่">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <h6>
                                                                        ค้นหาวันที่
                                                                    </h6>
                                                                    <div class="row">
                                                                        <div class="col-md-5 col-12">
                                                                            <input type="date" name="date" id="date" value="{{ request('date') }}" class="form-control datepicker " aria-haspopup="true" >
                                                                        </div>
                                                                        <div class="col-md-3 col-12">
                                                                            <input type="time" name="time1" id="time1" value="{{ request('time1') }}" class="form-control datepicker " aria-haspopup="true" >
                                                                        </div>
                                                                        <div class="col-md-1 col-12 d-flex align-items-center">
                                                                            -
                                                                        </div>
                                                                        <div class="col-md-3 col-12">
                                                                            <input type="time" name="time2" id="time2" value="{{ request('time2') }}" class="form-control datepicker " aria-haspopup="true" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="float-end">
                                                                <button type="button" class="btn " data-dismiss="modal">ปิด</button>
                                                                <button  class="btn btn-primary" type="submit">ค้นหา</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <button type="button" class="btn btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                รายละเอียด
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="card">
                                                    asd
                                                </div>
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                                <button type="button" class="btn btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    รายละเอียด
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">ดูช่วงเวลา</a>
                                    <a class="dropdown-item" href="#">คะแนนการช่วยเหลือ</a>
                                </div>
                                <button class="btn btn-more">
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                            </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class=" m-0">
                        
                        <div class="row mt-3">
                            <div class="col-6">
                                <h6 m-0>
                                    ข้อมูลทั่วไป
                                </h6>
                            </div> 
                            <div class="col-6">
                                <h6 m-0>
                                    ข้อมูลองค์กร
                                </h6>
                            </div>

                            <div class="col-3">
                                <input type="text" id="id" name="id" value="" class="form-control" placeholder="รหัสเคส" oninput="search_data_help();"> 
                            </div>
                            <div class="col-3">
                                <input type="text" id="name" name="name" value="" class="form-control" placeholder="ผู้ขอความช่วยเหลือ" oninput="search_data_help();">
                            </div>

                           
                            <div class="col-3">
                                <input type="text" id="organization" name="organization" value="" class="form-control" placeholder="หน่วยงาน" oninput="search_data_help();">
                            </div>
                            <div class="col-3">
                                <input type="text" id="helper" name="helper" value="" class="form-control" placeholder="เจ้าหน้าที่" oninput="search_data_help();">
                            </div>

                            <div class="col-12 mt-3 ">
                                <h6 class="m-0">
                                    วันที่
                                </h6>
                                
                            </div>
                            <div class="col-5">
                                <input type="date" name="date" id="date" value="" class="form-control datepicker" aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                            <div class="col-3">
                                <input type="time" name="time1" id="time1" value="" class="form-control datepicker " aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                            <div class="d-flex align-items-center col-1 text-center">
                                <div class="justify-content-center col-12">
                                    -
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="time" name="time2" id="time2" value="" class="form-control datepicker " aria-haspopup="true"  oninput="search_data_help();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-2">
                    <div class="col-4  ">
                        <div class="card p-3 radius-10 ">
                            <p class="m-0">พื้นที่</p>
                            <h5><span class="text-info">ทั้งหมด</span></h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card p-3 radius-10" >
                            <p class="m-0">จำนวนทั้งหมด</p>
                            <h5>{{$count_data}} รายการ</h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card p-3 radius-10" >
                            <p class="m-0">เวลาโดยเฉลี่ย</p>
                            <h5>5นาที / เคส</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                 <!-- div_data_help -->
                 <div id="div_body_help" class="card-body row m-2">
                </div>


                <div class="row m-2" id="data_help">
                        @foreach($data_sos as $item)
                            <a class="col-lg-6 col-md-6 col-12 a_data_user" href="{{ url('/sos_help_center/' . $item->id . '/edit') }}"">
                                <div >
                                    <div class="card card-sos shadow">
                                        <div class="sos-header">
                                            <div>
                                                <h6 class="m-0 p-0 data-overflow">รหัส{{$item->id}}</h6>
                                                <p class="m-0 data-overflow">{{ thaidate("วันlที่ j M Y" , strtotime($item->created_at)) }}</p>
                                                <p class="m-0 data-overflow">{{ thaidate("เวลา H:i" , strtotime($item->created_at)) }}</p>

                                            </div>
                                            <div>
                                            <button class=" btn-request btn-status">
                                                รับแจ้งเหตุ
                                            </button>
                                            </div>
                                        </div> 
                                        
                                        <hr>

                                        <div class="sos-username">
                                            <div class="row">
                                                <div class="col-2 m-0 text-center d-flex align-items-center">
                                                    <i class="fa-duotone fa-user"></i>
                                                </div>
                                                <div class="col-10 m-0 p-0">
                                                    <p class="p-0 m-0 color-darkgrey data-overflow topic">ผู้ขอความช่วยเหลือ</p>
                                                    <h6 class="p-0 m-0 color-dark data-overflow">
                                                        @if(!empty($item->name_user))
                                                            {{ $item->name_user }}
                                                        @else
                                                            ไม่ทราบชื่อ
                                                        @endif
                                                    </h6>
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
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <div class="pagination-wrapper"> {!! $data_sos->appends(['search' => Request::get('search')])->render() !!} </div>
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
                                color: white;
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
                        <div class="col-12">
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


               
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><b></b>

<div class="container-partner-sos">
    <div class="item sos-map col-md-12 col-12 col-lg-4">
        <div class="row">
            <div class="col-6">
                <a style="float: left; background-color: green;" type="button" class="btn text-white" onclick="initMap();">
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>
                <br><br>
            </div>
            <div class="col-6">
                <!-- COL-6 -->
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
                            <!--  -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();

    });

    function initMap() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
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

</script>

<script>
    // Get the menu element
    const menu = document.querySelector('#menu_card');

    // Add an event listener that updates the visibility of the menu when the page is scrolled
    window.addEventListener('scroll', function() {

        // Calculate the distance from the top of the page
        const distanceFromTop = window.pageYOffset || document.documentElement.scrollTop;
            // console.log(distanceFromTop);
        
        // If the distance from the top is greater than 0, hide the menu
        if (distanceFromTop >= 270) {
            menu_card.classList.add('mt-0') ;
        } else {
            menu_card.classList.remove('mt-0'); 
        }
    });

</script>
<script>
    function search_data_help(){
        let data_id = document.querySelector('#id').value;
        let data_name = document.querySelector('#name').value;
        let data_helper = document.querySelector('#helper').value;
        let data_organization = document.querySelector('#organization').value;
        let data_date = document.querySelector('#date').value;
        let data_time1 = document.querySelector('#time1').value;
        let data_time2 = document.querySelector('#time2').value;
        let data_search = document.querySelector('#search').value;



        if (!data_id && !data_name &&! data_helper && !data_organization && !data_date && !data_time1 && !data_time2 && !data_search) {
            document.querySelector('#div_body_help').classList.add('d-none');
            document.querySelector('#data_help').classList.remove('d-none');

        }else{
            data_help_center(data_id , data_name ,data_helper , data_organization , data_date , data_time1 , data_time2 , data_search); 
        }
    }

    function tteesstt(){

        let div_body_help = document.querySelector('#div_body_help');
            div_body_help.innerHTML = "" ;

        fetch("{{ url('/') }}/api/data_help_center/?&name=ฐ" )
            .then(response => response.json())
            .then(result => {
                console.log(result['data']);
                console.log(result['data']['length']);
            
                for (var i = 0; i < result['data']['length']; i++) {

                    let div_data_add = document.createElement("div");
                    let id_div_data_add = document.createAttribute("id");
                        id_div_data_add.value = "data_id_" + result['data'][i]['id'];
                        div_data_add.setAttributeNode(id_div_data_add);
                    let class_div_data_add = document.createAttribute("class");
                        class_div_data_add.value = "col-6";
                        div_data_add.setAttributeNode(class_div_data_add);
                    div_body_help.appendChild(div_data_add);

                    let div_data_help_center = 
                    
                    `
                    <div id='box'>
                        <button id='button-1'>`+ result['data'][i]['id'] + `</button>
                        <button id='button-1'>` + result['data'][i]['name_user'] +  `</button>
                        
                    </div>
                    
                    `;

                    document.querySelector('#data_id_' + result['data'][i]['id']).innerHTML = div_data_help_center ;

                }

                
        });
            
        
                 
    }

    function data_help_center(search_by_id , search_by_name , search_by_helper , search_by_organization , search_by_date ,search_by_time1 ,search_by_time2 ,search_data){

        document.querySelector('#div_body_help').classList.remove('d-none');

        let div_body_help = document.querySelector('#div_body_help');
            div_body_help.innerHTML = "" ;

        document.querySelector('#data_help').classList.add('d-none');

        fetch("{{ url('/') }}/api/data_help_center/?id=" + search_by_id + "&name=" + search_by_name + "&helper=" + search_by_helper + "&organization=" + search_by_organization + "&date=" + search_by_date + "&time1=" + search_by_time1 + "&time2=" + search_by_time2 + "&search=" + search_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result.data);
                
                if (result.data) {
                    for (var i = 0; i < result['data']['length']; i++) {

                        let div_data_add = document.createElement("div");
                        let id_div_data_add = document.createAttribute("id");
                            id_div_data_add.value = "data_id_" + result['data'][i]['id'];
                            div_data_add.setAttributeNode(id_div_data_add);
                        let class_div_data_add = document.createAttribute("class");
                            class_div_data_add.value = "col-6";
                            div_data_add.setAttributeNode(class_div_data_add);
                        div_body_help.appendChild(div_data_add);

                        let name = result['data'][i]['name_user'];
                        let organization_helper = result['data'][i]['organization_helper'];
                        let name_helper = result['data'][i]['name_helper'];
                        let url_edit = "/sos_help_center/" + result['data'][i]['id'] + "/edit" ;

                        
                        
                        // วันที่
                        
                        const date = new Date(result['data'][i]['created_at'])

                        
                        const date_created = date.toLocaleDateString('th-TH', {
                            weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' 
                        });

                        // เวลา
                        const time_created = date.toLocaleTimeString('th-TH', {
                            hour: '2-digit', minute: '2-digit' 
                        });

                        if(!name){
                            name = "ไม่ทราบชื่อ";
                        }

                        if(!organization_helper){
                            organization_helper = "ไม่ทราบหน่วยงาน";
                        }

                        if(!name_helper){
                            name_helper = "ไม่ทราบชื่อ";
                        }

                        //--------------------สถานะของแต่ละเคสยังไม่ได้ทำนะจ๊ะ--------------------//

                        let div_data_help_center = 
                        
                        `
                        <a class="col-lg-6 col-md-6 col-12 a_data_user show"  href="{{url('/') }}` + url_edit + ` ">
                            <div >
                                <div class="card card-sos shadow">
                                    <div class="sos-header">
                                        <div>
                                            <h6 class="m-0 p-0 data-overflow">รหัส`+ result['data'][i]['id'] + `</h6>
                                            <p class="m-0 data-overflow">`+ date_created +`</p>
                                            <p class="m-0 data-overflow">เวลา `+ time_created +`</p>

                                        </div>
                                        <div>
                                        <button class=" btn-request btn-status">
                                            รับแจ้งเหตุ
                                        </button>
                                        </div>
                                    </div> 
                                    
                                    <hr>

                                    <div class="sos-username">
                                        <div class="row">
                                            <div class="col-2 m-0 text-center d-flex align-items-center">
                                                <i class="fa-duotone fa-user"></i>
                                            </div>
                                            <div class="col-10 m-0 p-0">
                                                <p class="p-0 m-0 color-darkgrey data-overflow topic">ผู้ขอความช่วยเหลือ</p>
                                                <h6 class="p-0 m-0 color-dark data-overflow">
                                                `+
                                               name
                                                + `
                                                </h6>
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
                                                            `+
                                                            organization_helper
                                                            + `
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
                                                            `+
                                                            name_helper
                                                            + `
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        `;

                        document.querySelector('#data_id_' + result['data'][i]['id']).innerHTML = div_data_help_center ;

                    }
                }
                

                
        });

    }
</script>
@endsection