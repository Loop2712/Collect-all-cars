<style>
    .gm-style-iw-a {
        margin-top: -45px;
    }

    /* #card_data_operating {
        height: calc(75vh);
    } */

    .text-select-officer{
        font-size: 18px;
    }
    /* ปิดคลุมดำ */
    body{
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
    }.spinner-border{
        height: 80px;
        width: 80px;
        border-width: 10px;
    }
</style>
<!-- Modal cf_select_operating_unit -->
<button id="btn_cf_select_operating_unit" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#cf_select_operating_unit">
    modal cf_select_operating_unit
</button>

<link href="{{ asset('partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />


<!-- Modal -->
<div class="modal fade" id="cf_select_operating_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"style="border-radius: 20px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="border-radius: 20px;">
        <div class="modal-content"style="border-radius: 20px;">
            <div class="modal-header d-none">
                <button id="btn_close_modal_cf_select" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- CF SELECT UNIT -->
            <div id="div_cf_select_unit" class="">
                <!-- <div class="modal-body" style="background-color:lightblue;"> -->
                <div class="modal-body pb-0">
                    <div class="col-12 d-flex align-items-center">
                       <img style="width:50px;" src="{{ url('/') }}/img/stickerline/PNG/7.png">
                        <span class="h4 m-0 pl-2 mx-2"> ยืนยันการเลือก "หน่วยปฏิบัติการ"</span>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 text-center mb-3">
                                <span class="text-select-officer">เจ้าหน้าที่ :</span>
                                <span class="h4 font-weight-bold" id="cf_select_name_officer">cf_select_name_officer</span>
                            </div>

                            <div class="col-12 text-center mt-2">
                                <span class="px-2 py-1" id="cf_select_level_tag" style="border-radius: 10px;"><b>cf_select_level</b></span>
                                <span class="h5" id="cf_select_name">cf_select_name</span>
                            </div>
                            
                            <div class="col-12 text-center mt-2">
                                <span class="text-select-officer">พื้นที่ (สังกัด) :</span>
                                <span class="h5 font-weight-bold" id="cf_select_area">cf_select_area</span>
                            </div>

                            <div class="col-12 text-center mt-2">
                                <span class=" text-select-officer">ระยะห่าง (รัศมี) :</span>
                                <span class="h5 font-weight-bold" id="cf_select_distance">cf_select_distance</span>
                            </div>

                            <div class="col-12 text-center mt-2">
                                <span class=" text-select-officer">ระดับปฏิบัติการ :</span>
                                <span class="h5" id="cf_select_level">cf_select_level</span>
                            </div>
                            <!-- <div class="col-5">
                                <h5>ชื่อหน่วย : </h5>
                            </div>
                            <div class="col-7">
                                <span id="cf_select_name">cf_select_name</span>
                            </div>
                            <div class="col-5">
                                <h5>พื้นที่ (สังกัด) : </h5>
                            </div>
                            <div class="col-7">
                                <span id="cf_select_area">cf_select_area</span>
                            </div>
                            <div class="col-5">
                                <h5>ระยะห่าง (รัศมี) : </h5>
                            </div>
                            <div class="col-7">
                                <span id="cf_select_distance">cf_select_distance</span>
                            </div>
                            <div class="col-5">
                                <h5>ระดับปฏิบัติการ : </h5>
                            </div>
                            <div class="col-7">
                                <span id="cf_select_level">cf_select_level</span>
                            </div> -->
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="modal-body text-center m-0 p-0">
                    <div class="row m-0 p-0">
                        <span id="btn_change_unit" class="col-6 btn-warning btn" style="border-radius: 0 0 0 15px;">
                            เปลี่ยน <i class="fa-duotone fa-right-left"></i>
                        </span>
                        <span id="btn_cf_unit" class="col-6 btn-success btn" style="border-radius: 0 0 15px 0;">
                            ยืนยัน <i class="fa-solid fa-circle-check"></i>
                        </span>
                    </div>
                    
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <span  style="width:80%;" class="btn btn-sm btn-warning text-white main-shadow main-radius">
                                    เปลี่ยน <i class="fa-duotone fa-right-left"></i>
                                </span>
                            </div>
                            <div class="col-6">
                                <span  style="width:80%;" class="btn btn-sm btn-success main-shadow main-radius">
                                    ยืนยัน <i class="fa-solid fa-circle-check"></i>
                                </span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- WAIT UNIT -->
            <!-- <div id="div_wait_unit" class="d-none">
                <div class="modal-body" style="background-color:lightblue;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <br>
                                <h2>รอการยืนยัน<br>จากหน่วยปฏิบัติการ</h2>
                            </div>
                            <div class="col-4">
                                <br>
                                <img style="width:100%;" src="{{ url('/') }}/img/stickerline/flex/2.png">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-body text-center">
                    <div class="col-12">
                        <img style="width:70%;" src="{{ url('/') }}/img/more/ออกแบบหน้าจอ สพฉ..gif">
                        <br>
                        <h3>กำลังรอ..</h3>
                    </div>
                </div>
            </div> -->

            <div id="div_wait_unit" class="d-none">
                <div class="modal-body">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <div class="spinner-border" role="status"> 
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <h2 class="text-center mt-5">
                        รอการยืนยัน จากหน่วยปฏิบัติการ
                    </h2>
                    <h4 class="text-center mt-5">
                        <span id="name_officer_wait_unit"></span>
                    </h4>
                    <h5 class="text-center mt-5">
                        โปรดรอสักครู่... (<span id="timer_wait_officer"></span>)
                    </h5>
                </div>
            </div>

            <!-- UNIT refuse -->
            <!-- <div id="div_unit_refuse" class="d-none">
                <div class="modal-body" style="background-color:lightblue;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <br>
                                <h2>หน่วยปฏิบัติการ<br>ปฏิเสธ</h2>
                            </div>
                            <div class="col-4">
                                <br>
                                <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/17.png">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-body text-center">
                    <div class="col-12">
                        <img style="width:70%;" src="{{ url('/') }}/img/icon/wrong.png">
                        <br>
                        <h3 class="text-danger">ปฏิเสธ</h3>
                    </div>
                </div>
                <hr>
                <div class="modal-body text-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <span style="width:80%;" class="btn btn-sm btn-warning text-white main-shadow main-radius close" type="button" data-dismiss="modal" aria-label="Close">
                                    เปลี่ยน <i class="fa-duotone fa-right-left"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div id="div_unit_refuse" class="d-none">
                <div class="modal-body">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <svg class="checkmark-cross" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark-circle-cross" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark-check-cross" fill="none" d="M14.1 14.1l23.8 23.8 m0,-23.8 l-23.8,23.8"/>
                        </svg>
                    </div>
                    <h2 class="text-center mt-5">
                        หน่วยปฏิบัติการปฏิเสธ
                    </h2>
                    <h4 class="text-center mt-5">
                        (<span id="name_officer_unit_refuse"></span>)
                    </h4>
                    <h5 class="text-center mt-5">
                        โปรดเปลี่ยนหน่วย
                    </h5>
                </div>
                <hr class="mb-0">
                <div class="modal-body text-center m-0 p-0">
                    <div class="row m-0 p-0">
                        <span class="col-12 btn-warning btn close" style="border-radius: 0 0 15px 15px;" type="button" data-dismiss="modal" aria-label="Close">
                            เปลี่ยน <i class="fa-duotone fa-right-left"></i>
                        </span>
                    </div>
                </div>
            </div>

            
            <!-- <div id="div_unit_refuse" class="d-none">
                <div class="modal-body" style="background-color:lightblue;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <br>
                                <h2>หน่วยปฏิบัติการ<br>ปฏิเสธ</h2>
                            </div>
                            <div class="col-4">
                                <br>
                                <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/17.png">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-body text-center">
                    <div class="col-12">
                        <img style="width:70%;" src="{{ url('/') }}/img/icon/wrong.png">
                        <br>
                        <h3 class="text-danger">ปฏิเสธ</h3>
                    </div>
                </div>
                <hr>
                <div class="modal-body text-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <span style="width:80%;" class="btn btn-sm btn-warning text-white main-shadow main-radius close" type="button" data-dismiss="modal" aria-label="Close">
                                    เปลี่ยน <i class="fa-duotone fa-right-left"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>


<div class="container">
    <div id="div_show_data_unit" class="row">
        <!-- <div class="col-12" style="position:absolute;z-index: 999;right: 4%;margin-top: 0.3%; ">
            <div class="btn-group float-end" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-info text-white" onclick="select_level('all');">All</button>
                <button type="button" class="btn btn-success" onclick="select_level('FR');">FR</button>
                <button type="button" class="btn btn-warning" onclick="select_level('BLS');">BLS</button>
                <button style="background-color:orange;" type="button" class="btn" onclick="select_level('ILS');">ILS</button>
                <button type="button" class="btn btn-danger" onclick="select_level('ALS');">ALS</button>
            </div>
        </div> -->
        <div class="col-9">
            <div class="card">
                <div id="div_text_Directions" class="card-body d-none main-shadow" style="position:absolute;z-index: 999;left: 0%;margin-top: 8%; background-color: #ffffff;border-radius: 20px;width: 45%;">
                    <div class="col-12 p-0 d-flex align-items-center">
                        <img style="width:100%; border-radius: 50%;outline: #db2d2e 1px solid; width: 50px; height: 50px;margin-right: 10px;" src="{{ url('/') }}/img/stickerline/Flex/7.png">
                        <h6 id="show_text_Directions" class="text-danger p-0"></h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-9">
            <div class="card">
                <div id="div_text_Directions" class="card-body d-none " style="border:#db2d2e solid;border-width: 1px 1px 1px 5px;position:absolute;z-index: 999;left: 0%;margin-top: 8%; background-color: #ffffff;border-radius: 5px;width: 35%;">
                    <h6 id="show_text_Directions" class="text-danger"></h6>
                </div>
            </div>
        </div> -->



        <style>
            .switcher-data-sos {
                position: absolute;
                z-index: 999;
                right: 1%;
                margin-top: 25%;
                opacity: 1;

            }

            .slide-switcher-open {
                animation: slide-open 1s ease 0s 1 normal forwards;
            }

            @keyframes slide-open {
                0% {
                    transform: translateX(365px);
                }

                100% {
                    transform: translateX(0px);
                }
            }

            .slide-switcher-close {
                animation: slide-close 1s ease 0s 1 normal forwards;
            }

            @keyframes slide-close {
                0% {
                    transform: translateX(-100px);
                }

                100% {
                    transform: translateX(365px);
                }
            }

            .main-sos-switcher {
                position: absolute;
                z-index: 2;
                right: 1%;
                margin-top: 20%;
                opacity: 1;
                width: 25rem;


            }

            .data-sos-switcher {
                padding: 0;
                max-height: calc(75vh) !important;
            }

            .main-sos-switcher .switcher-btn-sos {
                opacity: 1 !important;
                border-radius: 10px 0 0 10px;
                color: #000;
                background-color: #fff;
                margin-left: -20px;
                height: 110px;
            }

            .rotate {
                transform: rotate(180deg);
            }

            .checkmark-cross {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #db2d2e;
            animation:  fill-check-mark-cross .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            }

            .checkmark-circle-cross {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #db2d2e;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
            }

            .checkmark-check-cross {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
            }

            @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
            }
            @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
            }
            @keyframes fill-check-mark-cross {
            100% {
                box-shadow: inset 0px 0px 0px 50px #db2d2e;
            }
            }
           
           
        </style>
        <div class="col-3">
            <div class="card">
                <div class="row main-sos-switcher slide-switcher-open">
                    <div class="col-1">
                        <button class="btn switcher-btn-sos slide-switcher-open mt-2 ml-2" onclick="hide_data_officer()"> <i class="fa-solid fa-chevron-right hide-data-sos"></i></button>
                    </div>
                    <div class="col-11 d-flex data-sos-switcher slide-switcher-open">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">ข้อมูลเจ้าหน้าที่</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="row text-center mb-3">
                                <div class="col-12">
                                    <button id="btn_search_officer_by_type" onclick="search_by_officer('type');" type="button" class="btn btn-sm btn-info">
                                        ค้นหาจากประเภท
                                    </button>
                                    <button id="btn_search_officer_by_name" onclick="search_by_officer('name');" type="button" class="btn btn-sm btn-outline-info">
                                        ค้นหาจากชื่อ
                                    </button>
                                    <button id="btn_search_officer_by_unit" onclick="search_by_officer('unit');" type="button" class="btn btn-sm btn-outline-info">
                                        ค้นหาจากหน่วย
                                    </button>
                                </div>
                            </div>

                            <center>
                                <input style="width: 90%;" id="div_search_name_officer" type="text" class="form-control mb-3 d-none" name="" placeholder="ค้นหา.." oninput="search_nameofficer_delay();">
                            </center>

                            <center>
                                <select style="width: 90%;" id="div_search_unit_officer" class="form-control mb-3 d-none" onchange="change_select_unit_offiecr();">
                                    <option>เลือกหน่วย</option>
                                </select>
                            </center>

                            <!-- BTN Select Level -->
                            <div id="div_carousel_level" class="chat-tab-menu">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a id="btn_select_level_all" class="nav-link  menu-select-one-lv-all all-active" href="javascript:;" 
                                        onclick="document.querySelector('#input_select_level').value = 'all';select_level();">
                                            <div class="font-24">ALL
                                            </div>
                                            <div><small>ทั้งหมด</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  menu-select-one-lv-fr" href="javascript:;" 
                                        onclick="document.querySelector('#input_select_level').value = 'fr';select_level()">
                                            <div class="font-24">FR
                                                </div>
                                            <div>
                                                <small>เบื้องต้น</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-one-lv-bls" href="javascript:;" 
                                        onclick="document.querySelector('#input_select_level').value = 'bls';select_level()">
                                            <div class="font-24">BLS
                                            </div>
                                            <div><small>ทั่วไป</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-one-lv-ils" href="javascript:;" 
                                        onclick="document.querySelector('#input_select_level').value = 'ils';select_level()">
                                            <div class="font-24">ILS
                                            </div>
                                            <div><small>กลาง</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-one-lv-als" href="javascript:;" 
                                        onclick="document.querySelector('#input_select_level').value = 'als';select_level()">
                                            <div class="font-24">ALS
                                            </div>
                                            <div><small>สูง</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- BTN Select vehicle  -->
                            <div id="div_carousel_vehicle" class="owl-carousel owl-theme owlmenu-vehicle p-3">
                                <div class="item" style="width:100%">
                                    <a id="btn_select_vehicle_all" class="btn menu-select-vehicle-officer-all vehicle-one-officer-active" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'all';select_level();">
                                    ทั้งหมด
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-officer-car" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'รถ';select_level();">
                                    รถ  
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-officer-aircraft" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'อากาศยาน';select_level();">
                                    อากาศยาน
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-officer-boat-1" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'เรือ ป.1';select_level();">
                                    เรือ ป.1
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-officer-boat-2" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'เรือ ป.2';select_level();">
                                    เรือ ป.2
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-officer-boat-3" href="javascript:;" 
                                        onclick="document.querySelector('#input_vehicle_type').value = 'เรือ ป.3';select_level();">
                                    เรือ ป.3
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn  menu-select-vehicle-officer-boat-other" href="javascript:;" 
                                    onclick="document.querySelector('#input_vehicle_type').value = 'เรือประเภทอื่นๆ';select_level();">
                                        เรืออื่นๆ
                                    </a>
                                </div>
                            </div>
                            
                            <input class="d-none" type="text" name="input_select_level" id="input_select_level" value="{{ isset($data_form_yellow->operating_suit_type) ? $data_form_yellow->operating_suit_type : 'all'}}">
                            <input class="d-none" type="text" name="input_vehicle_type" id="input_vehicle_type" value="{{ isset($data_form_yellow->vehicle_type) ? $data_form_yellow->vehicle_type : 'all'}}" >
                                
                            <style>
                                .overflow-data-officer{
                                    overflow: auto;
                                    height: 100%;
                                }
                            </style>
                            <div class="data-officer test p-3 mb-3 ps ps--active-y" >

                                <div class="overflow-data-officer" id="card_data_operating">
                                    <!-- data officer -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function hide_data_officer() {
            document.querySelector('.main-sos-switcher').classList.toggle('slide-switcher-close');
            document.querySelector('.hide-data-sos').classList.toggle('rotate');
        }
    </script>
    <!-- MAP -->
    <div class="row">
        <div id="map_operating_unit" class="d-none" style="margin-top: -30px;">
            <!-- MAP SHOW UNIT -->
        </div>
        <div id="map_operating_no_location" class="d-none" style="margin-top: -30px;">
            <div class="row">
                <div class="col-12 text-center">
                    <br><br><br>
                    <img style="width:50%;" src="{{ url('/') }}/img/stickerline/PNG/10.png">
                    <br><br><br>
                    <h6>ไม่พบตำแหน่งของจุดเกิดเหตุ</h6>
                    <h3>..กรุณาเลือกจุดเกิดเหตุ..</h3>
                    <br>
                    <span class="btn btn-sm btn-danger main-shadow main-radius" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="open_mapMarkLocation('12.870032','100.992541','6');">
                        เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var start_infoWindow = [];
    var view_infoWindow = "";
    var service;
    var directionsDisplay;

    let select_marker_goto;

    var location_unit_markers = [];
    let location_unit_marker;
    const image_empty = "{{ url('/img/icon/flag_empty.png') }}";
    const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
    const image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    const image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    const image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
    const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

    function open_map_operating_unit() {
        show_div_sos_or_unit('show_sos');

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        if (sos_lat.value && sos_lng.value) {

            document.querySelector('#map_operating_unit').classList.remove('d-none');
            document.querySelector('#div_show_data_unit').classList.remove('d-none');
            document.querySelector('#map_operating_no_location').classList.add('d-none');

            let m_lat = parseFloat(sos_lat.value);
            let m_lng = parseFloat(sos_lng.value);
            let m_numZoom = parseFloat('14');

            let m_lng_ct = m_lng + 0.002;

            map_operating_unit = new google.maps.Map(document.getElementById("map_operating_unit"), {
                center: {
                    lat: m_lat,
                    lng: m_lng_ct
                },
                zoom: m_numZoom,
            });

            if (sos_lat.value && sos_lng.value) {
                if (sos_operating_marker) {
                    sos_operating_marker.setMap(null);
                }

                sos_operating_marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(m_lat),
                        lng: parseFloat(m_lng)
                    },
                    map: map_operating_unit,
                    icon: image_sos,
                });
                sos_operating_markers.push(sos_operating_marker);
            }

            let level_start = document.querySelector('#input_select_level').value;
            let vehicle_type_start = document.querySelector('#input_vehicle_type').value;

            // console.log('open_map');
            location_operating_unit(m_lat, m_lng, level_start ,vehicle_type_start,'open_map');

        } else {
            document.querySelector('#map_operating_unit').classList.add('d-none');
            document.querySelector('#div_show_data_unit').classList.add('d-none');
            document.querySelector('#map_operating_no_location').classList.remove('d-none');
        }
    }


    function location_operating_unit(m_lat, m_lng, level ,vehicle_type, check_click) {
        // console.log("level >> " + level);
        // console.log("vehicle_type >> " + vehicle_type);

        let sub_organization = "{{ Auth::user()->sub_organization }}";

        level = level.toLowerCase();

        let check_forward = "{{ $sos_help_center->forward_operation_from }}";
        let forward_level = "{{ $sos_help_center->form_yellow->idc }}";

        if (forward_level){
            forward_level = forward_level ;
        }else{
            forward_level = "null" ;
        }

        if (check_forward && check_click == "open_map"){
            set_active_btn_menu_select_forward(forward_level);
        }else{
            set_active_btn_menu_select(level , vehicle_type);
            forward_level = "null" ;
        }

        // ------------------------------------------------------------------------------------------
        let data_arr = [];
        let text_data_arr = [];

        fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level + "/" + vehicle_type + "/" + forward_level + "/" +  sub_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (var i = 0; i < result.length; i++) {

                    let card_data_operating = document.querySelector('#card_data_operating');

                    // add div in to card_data_operating
                    let div_operating = document.createElement("div");
                    let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = "div_operating_id_" + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                    card_data_operating.appendChild(div_operating);

                    switch (result[i]['level']) {
                        case "FR":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_operating_unit,
                                icon: image_operating_unit_green,
                            });
                            location_unit_markers.push(location_unit_marker);
                            break;
                        case "BLS":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_operating_unit,
                                icon: image_operating_unit_yellow,
                            });
                            location_unit_markers.push(location_unit_marker);
                            break;
                        default:
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_operating_unit,
                                icon: image_operating_unit_red,
                            });
                            location_unit_markers.push(location_unit_marker);
                    }

                    let myLatlng = {
                        lat: parseFloat(result[i]['lat']),
                        lng: parseFloat(result[i]['lng'])
                    };
                    let round_i = i + 1;

                    div_operating.setAttribute("name_officer" , result[i]['name_officer']);
                    div_operating.setAttribute("unit_officer" , result[i]['name']);
                    div_operating.setAttribute("name" , 'data_tag_officer');

                    let text_data_operating =
                        '<div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">' +
                            '<div class="data-officer-item d-flex align-items-center p-2 cursor-pointer" id="btn_marker_id_' + result[i]['id'] + '">'+
                                '<div class="level  ' + result[i]['level'] + ' d-flex align-items-center ">' +
                                    ' <center> ' + result[i]['level'] + '</center>' +
                                '</div>' +
                                '<div class="ms-2">' +
                                    '<h6 class="mb-1 font-16"><b>' + result[i]['name_officer'] + '</b></h6>' +
                                    '<p class="mb-0 font-14">' + result[i]['name'] + ' ('+ result[i]['vehicle_type'] +')</p>' +
                                    '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + result[i]['distance'].toFixed(2) + ' กม. </p>' +
                                '</div>' +
                            '</div>'+
                            '<div class="list-inline d-flex customers-contacts ms-auto">' +
                                '<a href="javascript:;" class="list-inline-item"><i class="fa-solid fa-location-arrow" id="get_Directions_id_' + result[i]['id'] + '"></i></a>' +
                                '<a href="javascript:;" class="btn-select-officer list-inline-item" id="btn_select_id_' + result[i]['id'] + '"> เลือก </a>' +
                            '</div>' +
                        '</div>';

                    // div_operating_id_
                    document.querySelector('#div_operating_id_' + result[i]['id']).innerHTML = text_data_operating;

                    // ------------------------------------------
                    // add onclick to btn_marker_id_
                    let btn_marker_id = document.querySelector('#btn_marker_id_' + result[i]['id']);
                    let btn_marker_onclick = document.createAttribute("onclick");
                    btn_marker_onclick.value = "view_data_marker(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] + ");";
                    btn_marker_id.setAttributeNode(btn_marker_onclick);

                    // add onclick to btn_select_id_
                    let bnt_select_id = document.querySelector('#btn_select_id_' + result[i]['id']);
                    let btn_select_id_onclick = document.createAttribute("onclick");
                    btn_select_id_onclick.value = "select_operating_unit(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['operating_unit_id'] + "," + result[i]['user_id'] + ",'" + result[i]['area'] + "','"+result[i]['name_officer']+"');";
                    bnt_select_id.setAttributeNode(btn_select_id_onclick);

                    // add onclick to get_Directions_id_
                    let get_Directions_id = document.querySelector('#get_Directions_id_' + result[i]['id']);
                    let get_Directions_onclick = document.createAttribute("onclick");
                    get_Directions_onclick.value = "get_dir(" + result[i]['lat'] + "," + result[i]['lng'] + ");";
                    get_Directions_id.setAttributeNode(get_Directions_onclick);

                }

            });

        let m_lng_ct = m_lng + 0.002;

        map_operating_unit.setCenter({
            lat: m_lat,
            lng: m_lng_ct
        });

    }


    function view_data_marker(id, name, distance, level, lat, lng) {

        if (directionsDisplay) {
            directionsDisplay.setMap(null);
            document.querySelector('#div_text_Directions').classList.add('d-none');
        }

        if (view_infoWindow) {
            view_infoWindow.setMap(null);
        }
        if (start_infoWindow[0]) {
            start_infoWindow[0].setMap(null);
            start_infoWindow[1].setMap(null);
            start_infoWindow[2].setMap(null);
        }
        const myLatlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let contentString =
            '<div id="content data_sos_map">'+
                '<div  class="data-officer-item d-flex align-items-center  p-2 cursor-pointer">' +
                    ' <div class="level  ' + level + ' d-flex align-items-center ">' +
                        ' <center> ' + level + '</center>' +
                    '</div>' +
                    '<div class="ms-2">' +
                        '<h6 class="mb-1 font-14">' + name + '</h6>' +
                        '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + distance + ' กม. </p>' +
                    '</div>' +
                '</div>'+
                '<button onclick="click_btn_in_map(' + id + ')" class="btn btn-sm btn-success text-white main-shadow main-radius my-3" style="width:100%;border-radius:25px;"> เลือก </button>' +
            '</div>';

            
            // '<div id="content" >' +
            
            // '<h6 id="firstHeading" class="firstHeading"><b>' + name + '</b></h6>' +
            // '<span class="text-secondary">' +
            // 'ระยะห่าง(รัศมี) ≈ ' + distance + ' กม.<br>' +
            // 'ระดับ :  ' + level + '</span><br><br>' +
            // '<button class="btn btn-sm btn-success text-white main-shadow main-radius" style="width:100%;">เลือก</button>' +
            // "</div>";

        view_infoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: myLatlng,
        });

        view_infoWindow.open(map_operating_unit);

    }

    function click_btn_in_map(id){
        document.querySelector("#btn_select_id_" + id ).click();
    }


    function get_dir(lat, lng) {

        if (select_marker_goto) {
            select_marker_goto.setMap(null);
        }
        if (view_infoWindow) {
            view_infoWindow.setMap(null);
        }
        if (start_infoWindow[0]) {
            start_infoWindow[0].setMap(null);
            start_infoWindow[1].setMap(null);
            start_infoWindow[2].setMap(null);
        }

        select_marker_goto = new google.maps.Marker({
            position: {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            },
            map: map_operating_unit,
            icon: image_sos,
        });

        get_Directions_API(sos_operating_marker, select_marker_goto, lat, lng);
        hide_data_officer();
    }

    function get_Directions_API(markerA, markerB) {

        if (directionsDisplay) {
            directionsDisplay.setMap(null);
        }

        service = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map_operating_unit,
            suppressMarkers: true, // suppress the default markers
        });

        service.route({
            origin: markerB.getPosition(),
            destination: markerA.getPosition(),
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                let text_distance = response.routes[0].legs[0].distance.text;
                // console.log(text_distance);

                document.querySelector('#show_text_Directions').innerHTML = "ระยะการเดินทาง " + text_distance;
                document.querySelector('#div_text_Directions').classList.remove('d-none');
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });

    }

    function select_level() {

        let level = document.querySelector('#input_select_level').value;
            level = level.toLowerCase();
        let vehicle_type = document.querySelector('#input_vehicle_type').value;

        level = level.toLowerCase();
        // set_active_btn_menu_select(level , vehicle_type);
        // ------------------------------------------------------------------------------

        document.querySelector('#card_data_operating').innerHTML = "";

        for (var select_level_i = 0; select_level_i < location_unit_markers.length; select_level_i++) {
            location_unit_markers[select_level_i].setMap(null);
        }

        if (select_marker_goto) {
            select_marker_goto.setMap(null);
        }
        if (view_infoWindow) {
            view_infoWindow.setMap(null);
        }
        if (start_infoWindow[0]) {
            start_infoWindow[0].setMap(null);
            start_infoWindow[1].setMap(null);
            start_infoWindow[2].setMap(null);
        }

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (sos_lat.value && sos_lng.value) {
            m_lat = parseFloat(sos_lat.value);
            m_lng = parseFloat(sos_lng.value);
            m_numZoom = parseFloat('14');
        } else {
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }

        // console.log('select_level');
        location_operating_unit(m_lat, m_lng, level, vehicle_type,'select_level');

    }

    function select_operating_unit(id, name, distance, level, operating_unit_id, user_id, area , name_officer) {

        if (view_infoWindow) {
            view_infoWindow.setMap(null);
        }

        document.querySelector('#div_cf_select_unit').classList.remove('d-none');
        document.querySelector('#div_wait_unit').classList.add('d-none');
        document.querySelector('#div_unit_refuse').classList.add('d-none');

        document.querySelector('#cf_select_name_officer').innerHTML = name_officer;
        document.querySelector('#cf_select_name').innerHTML = name;
        document.querySelector('#cf_select_area').innerHTML = area;
        document.querySelector('#cf_select_distance').innerHTML = distance;
        document.querySelector('#cf_select_level_tag').className = '';
        document.querySelector('#cf_select_level_tag').classList.add(level , 'px-2' , 'py-1');
        document.querySelector('#cf_select_level_tag').innerHTML = level;
        document.querySelector('#cf_select_level').innerHTML = level;
        document.querySelector('#btn_change_unit').onclick = function() {
            change_unit();
        };
        document.querySelector('#btn_cf_unit').onclick = function() {
            send_data_sos_tooperating_unit('{{ $sos_help_center->id }}', operating_unit_id, user_id, distance);
        };

        document.querySelector('#btn_cf_select_operating_unit').click();

        // console.log(id);
        // console.log(name);
        // console.log(distance);
        // console.log(level);
        // console.log(operating_unit_id);
        // console.log(user_id);
        // console.log(area);

    }

    function change_unit() {
        document.querySelector('#cf_select_name').innerHTML = "";
        document.querySelector('#cf_select_area').innerHTML = "";
        document.querySelector('#cf_select_distance').innerHTML = "";
        document.querySelector('#cf_select_level').innerHTML = "";
        


        document.querySelector('#btn_close_modal_cf_select').click();
    }

    function set_active_btn_menu_select(level , vehicle_type){
        
        //  LEVEL
        
        document.querySelector('.menu-select-one-lv-all').classList.remove("all-active");
        document.querySelector('.menu-select-one-lv-fr').classList.remove("fr-active");
        document.querySelector('.menu-select-one-lv-bls').classList.remove("bls-active");
        document.querySelector('.menu-select-one-lv-ils').classList.remove("ils-active");
        document.querySelector('.menu-select-one-lv-als').classList.remove("als-active");
        document.querySelector('.menu-select-one-lv-' + level).classList.add(level + "-active");

        // VEHICLE TYPE
        document.querySelector('.menu-select-vehicle-officer-all').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-car').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-aircraft').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-boat-1').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-boat-2').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-boat-3').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-officer-boat-other').classList.remove("vehicle-one-officer-active");


        let text_vehicle_type ;

        switch(vehicle_type) {
            case 'all':
                text_vehicle_type = "all" ;
            break;
            case 'รถ':
                text_vehicle_type = "car" ;
            break;
            case 'อากาศยาน':
                text_vehicle_type = "aircraft" ;
            break;
            case 'เรือ ป.1':
                text_vehicle_type = "boat-1" ;
            break;
            case 'เรือ ป.2':
                text_vehicle_type = "boat-2" ;
            break;
            case 'เรือ ป.3':
                text_vehicle_type = "boat-3" ;
            break;
            case 'เรือประเภทอื่นๆ':
                text_vehicle_type = "boat-other" ;
            break;
        }

        // console.log(vehicle_type);   
        document.querySelector('.menu-select-vehicle-officer-' + text_vehicle_type).classList.add("vehicle-one-officer-active");
        // console.log('.menu-select-vehicle-' + text_vehicle_type);
    
    }

    function set_active_btn_menu_select_forward(forward_level){
        
        //  LEVEL
        document.querySelector('.menu-select-one-lv-all').classList.remove("all-active");
        document.querySelector('.menu-select-one-lv-fr').classList.remove("fr-active");
        document.querySelector('.menu-select-one-lv-bls').classList.remove("bls-active");
        document.querySelector('.menu-select-one-lv-ils').classList.remove("ils-active");
        document.querySelector('.menu-select-one-lv-als').classList.remove("als-active");

        if (forward_level == "เขียว(ไม่รุนแรง)"){
            document.querySelector('.menu-select-one-lv-' + "fr").classList.add("fr" + "-active");
            document.querySelector('.menu-select-one-lv-' + "bls").classList.add("bls" + "-active");
            document.querySelector('.menu-select-one-lv-' + "ils").classList.add("ils" + "-active");
            document.querySelector('.menu-select-one-lv-' + "als").classList.add("als" + "-active");
        }
        else if (forward_level == "เหลือง(เร่งด่วน)"){
            document.querySelector('.menu-select-one-lv-' + "bls").classList.add("bls" + "-active");
            document.querySelector('.menu-select-one-lv-' + "ils").classList.add("ils" + "-active");
            document.querySelector('.menu-select-one-lv-' + "als").classList.add("als" + "-active");
        }
        else if (forward_level == "แดง(วิกฤติ)"){
            document.querySelector('.menu-select-one-lv-' + "ils").classList.add("ils" + "-active");
            document.querySelector('.menu-select-one-lv-' + "als").classList.add("als" + "-active");
        }else{
            document.querySelector('.menu-select-one-lv-all').classList.remove("all-active");
        }


    }

    function send_data_sos_tooperating_unit(sos_id, operating_unit_id, user_id, distance) {
        // console.log("sos_id >> " + sos_id);
        // console.log("operating_unit_id >> " + operating_unit_id);
        // console.log("user_id >> " + user_id);

        let admin_id = "{{ Auth::user()->id }}" ;

        fetch("{{ url('/') }}/api/sos_1669_command_by" + "/" + sos_id + "/" + admin_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });

        fetch("{{ url('/') }}/api/send_data_sos_to_operating_unit" + "/" + sos_id + "/" + operating_unit_id + "/" + user_id + "/" + distance)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result) {
                    document.querySelector('#name_officer_wait_unit').innerHTML = result['name_officer'];
                    wait_operating_unit(result['id'] , result['name_officer']);
                }

            });

        document.querySelector('#div_cf_select_unit').classList.add('d-none');
        document.querySelector('#div_wait_unit').classList.remove('d-none');
        document.querySelector('#div_unit_refuse').classList.add('d-none');

        startTimer_wait_officer();

    }

    // Set up global variables to hold the timer and start time
    var timerInterval_wait_officer;
    var startTime_wait_officer;

    // Function to start the timer
    function startTimer_wait_officer() {
        // Get the timer element
        var timerElem = document.getElementById('timer_wait_officer');

        // If the timer is already running, stop it and reset the start time
        if (timerInterval_wait_officer) {
            clearInterval(timerInterval_wait_officer);
            startTime_wait_officer = null;
        }

        // Start the timer
        startTime_wait_officer = Date.now();

        timerInterval_wait_officer = setInterval(function() {
            // Calculate the elapsed time
            var elapsedTime = Date.now() - startTime_wait_officer;

            // Convert the elapsed time to minutes and seconds
            var minutes = Math.floor(elapsedTime / 60000);
            var seconds = Math.floor((elapsedTime % 60000) / 1000);

            // Format the time as a string with leading zeros
            var timeString = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            // Update the timer element
            timerElem.innerText = timeString;
        }, 1000);
    }


    var myInterval;
    function wait_operating_unit(sos_id , name_helper) {

        myInterval = setInterval(function() {
            // console.log(sos_id);

            fetch("{{ url('/') }}/api/check_status_wait_operating_unit" + "/" + sos_id)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    let status = result['status'];
                    let officer_id = result['helper_id'];
                    let operating_unit_id = result['operating_unit_id'];
                    let sos_id = result['id'];

                    if (status === "ปฏิเสธ") {

                        myStop_setInterval();

                        // เปลี่ยน DIV ใน MODAL ให้แสดงถึงการปฏิเสธ
                        document.querySelector('#name_officer_unit_refuse').innerHTML = name_helper ;
                        document.querySelector('#div_cf_select_unit').classList.add('d-none');
                        document.querySelector('#div_wait_unit').classList.add('d-none');
                        document.querySelector('#div_unit_refuse').classList.remove('d-none');

                        let audio_refuse = new Audio("{{ asset('sound/เจ้าหน้าที่ปฏิเสธ.mp3') }}");
                        audio_refuse.play();

                    } else if (status === "ออกจากฐาน") {

                        myStop_setInterval();
                        document.querySelector('#btn_close_modal_cf_select').click();
                        // คลิก tag a หรือ เปลี่ยนการแสดงผลข้อมูลเจ้าหน้าที่
                        document.querySelector('#btn_operation').classList.remove('d-none');
                        document.querySelector('#btn_open_meet').classList.remove('d-none');
                        document.querySelector('#btn_select_operating_unit').classList.add('d-none');

                        // ตรวจสอบว่ามีคนอยู๋ใน วิดีโอคอลหรือไม่
                        // loop_check_user_operation_meet();

                        fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id)
                            .then(response => response.json())
                            .then(result_2 => {
                                // console.log(result_2);

                                // ADD DATA level
                                let data_level_operating_unit = document.querySelector('#data_level_operating_unit');
                                let color_btn_level ;
                                switch (result_2['officer_level']) {
                                    case 'FR':
                                        color_btn_level = 'btn-success' ;
                                    break;
                                    case 'BLS':
                                        color_btn_level = 'btn-warning' ;
                                    break;
                                    case 'ILS':
                                        color_btn_level = 'btn-danger' ;
                                    break;
                                    case 'ALS':
                                        color_btn_level = 'btn-danger' ;
                                    break;
                                }
                                data_level_operating_unit.innerHTML = result_2['officer_level'];
                                data_level_operating_unit.classList.add(color_btn_level);

                                // ADD DATA vehicle_type
                                let data_vehicle_type_operating_unit = document.querySelector('#data_vehicle_type_operating_unit');
                                    data_vehicle_type_operating_unit.innerHTML = result_2['officer_vehicle_type'];

                                let data_name_operating_unit = document.querySelector('#data_name_operating_unit');
                                data_name_operating_unit.innerHTML = result_2['unit_name'];
                                let data_area_operating_unit = document.querySelector('#data_area_operating_unit');
                                data_area_operating_unit.innerHTML = result_2['unit_area'];

                                // ADD DATA officers
                                if (result_2['img_officer']) {
                                    let data_img_officers = document.querySelector('#data_img_officers');
                                    data_img_officers.src = '{{ url("storage") }}' + '/' + result_2['img_officer'];
                                }
                                let data_name_officers = document.querySelector('#data_name_officers');
                                data_name_officers.innerHTML = result_2['name_officer'];
                                let data_sub_organization_officers = document.querySelector('#data_sub_organization_officers');
                                data_sub_organization_officers.innerHTML = result_2['sub_organization_officer'];
                                let data_phone_officers = document.querySelector('#data_phone_officers');
                                data_phone_officers.innerHTML = '<i class="fa-solid fa-phone"></i> ' + result_2['phone_officer'];
                                data_phone_officers.href = 'tel:' + result_2['phone_officer'];

                                document.querySelector('#data_officers_by_js').classList.remove('d-none');
                                document.querySelector('#data_officers_by_php').classList.add('d-none');
                            });

                        let audio_go_to_help = new Audio("{{ asset('sound/เจ้าหน้าที่กำลังไปช่วยเหลือ.mp3') }}");
                        audio_go_to_help.play();

                        document.querySelector('#tag_a_operation').click();

                    }

                });

        }, 5000);

    }

    function myStop_setInterval() {
        clearInterval(myInterval);
    }

    function search_by_officer(tag){

        document.querySelector('#btn_search_officer_by_type').classList.remove('btn-info');
        document.querySelector('#btn_search_officer_by_name').classList.remove('btn-info');
        document.querySelector('#btn_search_officer_by_unit').classList.remove('btn-info');

        document.querySelector('#btn_search_officer_by_type').classList.add('btn-outline-info');
        document.querySelector('#btn_search_officer_by_name').classList.add('btn-outline-info');
        document.querySelector('#btn_search_officer_by_unit').classList.add('btn-outline-info');

        document.querySelector('#btn_search_officer_by_'+tag).classList.add('btn-info');
        document.querySelector('#btn_search_officer_by_'+tag).classList.remove('btn-outline-info');

        show_data_officer_by(tag);

    }
                       
    function show_data_officer_by(tag){

        let div_carousel_vehicle = document.querySelector('#div_carousel_vehicle');
        let div_carousel_level = document.querySelector('#div_carousel_level');
        let div_search_name_officer = document.querySelector('#div_search_name_officer');
        let div_search_unit_officer = document.querySelector('#div_search_unit_officer');

        div_carousel_vehicle.classList.add('d-none');
        div_carousel_level.classList.add('d-none');
        div_search_name_officer.classList.add('d-none');
        div_search_unit_officer.classList.add('d-none');

        document.querySelector('#card_data_operating').classList.add('d-none');
        document.querySelector('#btn_select_level_all').click();
        document.querySelector('#btn_select_vehicle_all').click();

        setTimeout(function() {

            let div_tag_officer = document.querySelectorAll('div[name="data_tag_officer"]');
                
            if(tag == "type"){
                div_tag_officer.forEach(item => {
                    item.classList.remove('d-none');
                })
                div_carousel_vehicle.classList.remove('d-none');
                div_carousel_level.classList.remove('d-none');
            }
            else if(tag == "name"){
                div_tag_officer.forEach(item => {
                    item.classList.add('d-none');
                })
                div_search_name_officer.classList.remove('d-none');
            }
            else if(tag == "unit"){
                div_tag_officer.forEach(item => {
                    item.classList.add('d-none');
                })
                div_search_unit_officer.classList.remove('d-none');
                get_unit_offiecr();
            }

            document.querySelector('#card_data_operating').classList.remove('d-none');

        }, 650);
    }

    function get_unit_offiecr(){

        fetch("{{ url('/') }}/api/get_unit_offiecr" + "/" + "{{ Auth::user()->sub_organization }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_search_unit_officer = document.querySelector('#div_search_unit_officer');
                    div_search_unit_officer.innerHTML = '';

                let option_first = document.createElement("option");
                    option_first.text = "เลือกหน่วย";
                    option_first.value = "";
                    div_search_unit_officer.add(option_first);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.name;
                    option.value = item.name;
                    div_search_unit_officer.add(option);
                }
            });

    }

    function change_select_unit_offiecr(){

        let div_search_unit_officer = document.querySelector('#div_search_unit_officer');
        let unit_officer = div_search_unit_officer.value ;
        // console.log("unit_officer > " + unit_officer);

        let div_tag_officer = document.querySelectorAll('div[name="data_tag_officer"]');
            div_tag_officer.forEach(item_1 => {
                item_1.classList.add('d-none');
            })

        let div_unit_officer = document.querySelectorAll('div[unit_officer="'+unit_officer+'"]');
            div_unit_officer.forEach(item_2 => {
                item_2.classList.remove('d-none');
            })

    }

    let delayTimer_search_nameofficer;
    function search_nameofficer_delay(){
        // Clear any pending delay timer
        clearTimeout(delayTimer_search_nameofficer);
        delayTimer_search_nameofficer = setTimeout(search_data_officer_by_name, 1500);
    }

    function search_data_officer_by_name(){
        let input_search = document.querySelector('#div_search_name_officer')
        // console.log(input_search.value);

        let div_tag_officer = document.querySelectorAll('div[name="data_tag_officer"]');
            div_tag_officer.forEach(item_1 => {
                item_1.classList.add('d-none');
            })

        if(input_search.value){
            let search_by_name = document.querySelectorAll('div[name="data_tag_officer"]');
                search_by_name.forEach(item_2 => {
                    let nameOfficerAttribute = item_2.getAttribute('name_officer').toLowerCase(); 
                    let inputValue = input_search.value.toLowerCase();

                    if (nameOfficerAttribute.includes(inputValue)) {
                        // console.log(nameOfficerAttribute);
                        item_2.classList.remove('d-none');
                    }
                })
        }

    }

</script>
<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

<script>
    new PerfectScrollbar('.data-officer');
</script>

<script>
    $(function() {
    // Owl Carousel
    var owl = $(".owlmenu-vehicle");
    owl.owlCarousel({
        margin: 5,
        loop: false,
        autoWidth:true,
        dots:false
    });
    });
</script>