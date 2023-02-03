<style>
    .center-block {
  display: flex;
  align-items: center;
  height: 35px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}

.btn-center-block {
  align-items: center;
  height: 70px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}#loading_success{
    animation: success 500ms ease 0s 1 normal forwards;
}
@keyframes success {
	0% {
		transform: scale(0);
	}

	100% {
		transform: scale(1);
	}
}
</style> 

<button id="btn_save" class="btn btn-success d-flex justify-content-center" type="button" onclick="btn_save_data();"> 
    <span id="loading" class="d-flex align-items-center d-none">
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>&nbsp;
        Loading...
    </span>

    <div id="loading_success" class="d-none">
    <i class="fa-duotone fa-circle-check"></i>
        success
    </div>
    

    <span id="save">
        save
    </span>
    
</button>

<!-- Modal -->
<div class="modal fade" id="modal_mapMarkLocation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i></h4>
                <span id="btn_close_modal_mapMarkLocation" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <select name="location_P" id="location_P" class="form-control" onchange="show_amphoe();">
                                        <option class="location_P_start" value="" selected > - เลือกจังหวัด - </option>
                                        @foreach($all_provinces as $item)
                                            <option value="{{ $item->province }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_A" id="location_A" class="form-control" onchange="show_tambon();">
                                        <option value="" selected > - เลือกอำเภอ - </option> 
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_T" id="location_T" class="form-control" onchange="select_T();">
                                        <option value="" selected > - เลือกตำบล - </option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <center>
                                <button  type="button" class="btn btn-warning text-white" style="width: 80%;" onclick="re_mapMarkLocation();">
                                    <i class="fa-solid fa-repeat"></i> คืนค่า
                                </button>
                            </center>
                        </div>
                        <div class="col-2">
                            <center>
                                <button  type="button" class="btn btn-info text-white" style="width: 100%;" onclick="submit_locations_sos();open_map_operating_unit();">
                                    <i class="fa-solid fa-circle-check"></i> ยืนยัน
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
                <hr>
                <div style="padding-right:15px;margin-top: 5px;">
                    <div class="card">
                        <div id="mapMarkLocation"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal ดูรูปภาพ -->
<div class="modal fade" id="see_img_sos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



























<style>
    div{
        font-family: 'Kanit', sans-serif;
    }
    .menu-header{
        background-color: transparent;
        padding: 20px 25px;
        position: relative;
    }#map{
        border-radius: 10px;
    } .div-map{
        position: relative;
    }.btn_go_to_map{
        position: absolute;
        bottom: 5%;
        left: 5%;
    }.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 4rem;
    }.yellow-form{
        background-color:#FAE693;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }
    .blue-form{
        background-color:#89acff;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }.pink-form{
        background-color:#ea91c6;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }
</style>
<div>
    <div class="card radius-10">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 col-lg-6 col-12 menu-header bg-transparent d-inline">
                <h6 class=" font-weight-bold m-0 p-0">รหัสปฏิบัติการ</h6>
                <h3><b><u>XXXX-XXXX-00{{ $sos_help_center->id }}</u></b></h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div class="d-flex align-items-center">
                    <!-- <button type="button" class="btn btn-warning m-2" onclick="click_select_btn('form_yellow');">
                        <i class="fa-solid fa-files-medical"></i> <br> แบบฟอร์มเหลือง
                    </button>
                    <button type="button" class="btn btn-info m-2" onclick="click_select_btn('operating_unit');">
                        <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มฟ้า
                    </button>
                    <button type="button" class="btn btn-success m-2" onclick="click_select_btn('operating_unit');">
                    <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มเขียว
                    </button>
                    <button type="button" class="btn m-2 " style="background-color:#fa93f0;" onclick="click_select_btn('operating_unit');">
                    <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มชมพู
                    </button>
                    <button id="btn_select_operating_unit" disabled  type="button" class="btn btn-secondary m-2" onclick="click_select_btn('operating_unit');">
                        <i class="fa-solid fa-truck-medical"></i> <br> เลือกหน่วยแพทย์
                    </button> -->
                    <style>
                        .nav-pills-success.nav-pills .nav-link{
                        color: #29cc39;
                        }
                        .nav-pills-success.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-warning.nav-pills .nav-link{
                        color: #ffc107;
                        }
                        .nav-pills-warning.nav-pills .nav-link:hover{
                        color: #000;
                        }

                        .nav-pills-info.nav-pills .nav-link{
                        color: #0dcaf0;
                        }
                        .nav-pills-info.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-pink.nav-pills .nav-link{
                        color: #fa93f0;
                        }
                        .nav-pills-pink.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-secondary.nav-pills .nav-link{
                        color: #fff;
                        }
                        .nav-pills-secondary.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-purple.nav-pills .nav-link{
                        color: #7b2bec;
                        border: 1px solid #7b2bec;
                        }
                        .nav-pills-purple.nav-pills .nav-link:hover{
                            background-color: #7b2bec;
                        color: #fff;
                        }

                        .nav-pills-danger.nav-pills .nav-link{
                        color: #db2d2e;
                        }
                        .nav-pills-danger.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                    </style>
                    <ul class="nav nav-pills m-3" role="tablist">
                        <li id="btn_operation" class="nav-item nav-pills nav-pills-purple m-2 d-none" role="presentation">
                            <a id="tag_a_operation" class="nav-link btn-outline-purple btn" data-bs-toggle="pill" href="#operation" role="tab" aria-selected="true" onclick="reface_map_go_to_help();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">การดำเนินการ</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_yellow" class="nav-item nav-pills nav-pills-warning m-2" role="presentation">
                            <a class="nav-link btn-outline-warning btn active" data-bs-toggle="pill" href="#form_yellow" role="tab" aria-selected="true" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#form_data_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเหลือง</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_blue" class="nav-item nav-pills nav-pills-info m-2 d-none" role="presentation">
                            <a class="nav-link  btn-outline-info btn" data-bs-toggle="pill" href="#form-blue" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_blue_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มฟ้า</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_green" class="nav-item  nav-pills nav-pills-success m-2 d-none" role="presentation">
                            <a class="nav-link btn-outline-success btn" data-bs-toggle="pill" href="#form-green" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_green_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเขียว</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_pink" class="nav-item nav-pills nav-pills-pink m-2 d-none" role="presentation">
                            <a class="nav-link btn-outline-pink btn" data-bs-toggle="pill" href="#form-pink" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_pink_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มชมพู</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_select_operating_unit" class="nav-item nav-pills nav-pills-danger m-2 " role="presentation">
                            <a class="nav-link btn-outline-danger btn" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false" onclick="open_map_operating_unit();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">เลือกหน่วยแพทย์</div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-3 col-lg-3">
        <div class="sticky">
            <div class="card radius-10 p-3">
                <h3><b>ข้อมูลผู้แจ้งเหตุ</b></h3>
                <span>
                    ชื่อ/รหัสผู้แจ้งเหตุ
                </span>
                <h4>
                    <u id="u_name_user">{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}</u>
                </h4>
                <hr>
                <span class="mt-2">
                    โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ
                </span>
                <h4>
                    <u id="u_phone_user">{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}</u>
                </h4>
            </div>
            <div class="card radius-10 p-3" id="div_detail_sos">
                <div class="row d-flex justify-content-between">
                    <div class="col h6 d-flex align-items-center">
                        <b>จุดเกิดเหตุ</b>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <span class="btn btn-sm btn-danger" style="font-size:15px;width: 100%;" data-toggle="modal" data-target="#see_img_sos">
                            ดูรูปภาพ <i class="fa-duotone fa-images"></i>
                        </span>
                    </div>
                </div>
                <div class="div-map">
                    <div id="map" class="mt-2"></div>
                    <span class="btn btn-warning btn_go_to_map" onclick="go_to_maps();">
                        นำทาง <i class="fa-solid fa-location-arrow"></i>
                    </span>
                    <a id="go_to_maps" href="" target="bank"></a>
                </div>
            </div>
            <div class="card radius-10 p-3 d-none" id="div_data_operating">
                <!-- div_data_operating -->
                <h3>
                    <b>ข้อมูลหน่วยแพทย์</b>
                    <span id="data_level_operating_unit">
                    @if(!empty($sos_help_center->operating_unit->level))
                        @switch($sos_help_center->operating_unit->level)
                            @case('FR')
                                <span class="float-end btn btn-sm btn-success main-shadow main-radius">
                                    {{ $sos_help_center->operating_unit->level }}
                                </span>
                            @break
                            @case('BLS')
                                <span class="float-end btn btn-sm btn-warning text-white main-shadow main-radius">
                                    {{ $sos_help_center->operating_unit->level }}
                                </span>
                            @break
                            @case('ILS')
                                <span class="float-end btn btn-sm btn-danger main-shadow main-radius">
                                    {{ $sos_help_center->operating_unit->level }}
                                </span>
                            @break
                            @case('ALS')
                                <span class="float-end btn btn-sm btn-danger main-shadow main-radius">
                                    {{ $sos_help_center->operating_unit->level }}
                                </span>
                            @break
                        @endswitch
                    @endif
                    </span>
                </h3>
                <span>
                    ชื่อหน่วย
                </span>
                <h5>
                    <u id="data_name_operating_unit">{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}</u>
                </h5>
                <span class="mt-2">
                    พื้นที่ (สังกัด)
                </span>
                <h5>
                    <u id="data_area_operating_unit">{{ isset($sos_help_center->operating_unit->area) ? $sos_help_center->operating_unit->area : ''}}</u>
                </h5>
                <hr>
                <h5><b>ข้อมูลเจ้าหน้าที่</b></h5>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 border radius-15 row">

                                <div id="data_officers_by_js" class="d-none">
                                    <div class="col-3">
                                        <img id="data_img_officers" src="" width="80" height="80" class="rounded-circle shadow">
                                    </div>
                                    <div class="col-9">
                                        <h5 id="data_name_officers" class="mb-0 mt-3"></h5>
                                        <p id="data_sub_organization_officers" class="mb-3 mt-1"></p>
                                    </div>
                                    <div class="d-grid">
                                        <br>
                                        <a id="data_phone_officers" href="" class="btn btn-outline-primary radius-15">
                                            เบอร์ 
                                        </a>
                                    </div>
                                </div>
                                
                                <div id="data_officers_by_php" class="">
                                    <div id="" class="col-3">
                                        @if(!empty($sos_help_center->officers_user->photo))
                                            <img src="{{ url('storage')}}/{{ $sos_help_center->officers_user->photo }}" width="80" height="80" class="rounded-circle shadow">
                                        @else
                                            <img src="{{ url('/img/stickerline/Flex/12.png') }}" width="80" height="80"  class="rounded-circle shadow">
                                        @endif
                                    </div>
                                    <div class="col-9">
                                        @if(!empty($sos_help_center->officers_user->name))
                                            <h5 class="mb-0 mt-3">{{ $sos_help_center->officers_user->name }}</h5>
                                            <p class="mb-3 mt-1">{{ str_replace("_"," ",$sos_help_center->officers_user->sub_organization) }}</p>
                                        @endif
                                    </div>
                                    <div class="d-grid">
                                        <br>
                                        @if(!empty($sos_help_center->officers_user->phone))
                                            <a href="tel:{{ $sos_help_center->officers_user->phone }}" class="btn btn-outline-primary radius-15">
                                                เบอร์ {{ $sos_help_center->officers_user->phone }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .box-status{
            background: rgba(255, 255, 255, .5);
            padding: 5px 15px 5px 15px;
            border-radius: 15px;
            margin-bottom: 25px;
            /* border: #000000 solid 1px; */
        }
    </style>
    
    <div class="col-12 col-md-9 col-lg-9  "  >
        <div class="tab-content" id="pills-tabContent">

            <!--------------------------------- operation --------------------------------->
            <div class="tab-pane fade" id="operation" role="tabpanel">
                <div class="card radius-10 p-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                สถานะ :  <b><span id="show_status" class="text-warning"></span></b>
                                &nbsp;&nbsp;
                                ระยะทาง (รัศมี) :  <b><span id="show_distance" class="text-warning">1.7</span></b> กม.
                            </h4>
                        </div>
                        <div class="col-12">
                            <div id="map_go_to_help"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- form yellow --------------------------------->
            <div class="tab-pane fade show active" id="form_yellow" role="tabpanel">
                <div class="card radius-10 p-3 yellow-form">
                    <div class="row">
                        <div class="col">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">เลขที่ปฏิบัติการ(ON)</span>
                                <h5 class="m-0 h5">
                                    <b>{{ $sos_help_center->operating_code }}
                                        XXXX-XXXX-00{{ $sos_help_center->id }}
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        .............
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            @include ('sos_help_center.form_sos_yellow')
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- form blue --------------------------------->
            <div class="tab-pane fade" id="form-blue" role="tabpanel">
                <div class="card radius-10 p-3 blue-form">
                    <div class="row">
                        <div class="col">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">เลขที่ผู้ป่วย</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient Number
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient sequence
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            @include ('sos_help_center.form_sos_blue')
                        </div>
                    </div>
                </div>
            </div>


            <!--------------------------------- form green --------------------------------->
            <div class="tab-pane fade" id="form-green" role="tabpanel">
                <p>@include ('sos_help_center.form_sos_green')</p>
            </div>

            <!--------------------------------- form pink --------------------------------->
            <div class="tab-pane fade" id="form-pink" role="tabpanel">
                <div class="card radius-10 p-3 pink-form">
                    <div class="row">
                        <div class="col">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">เลขที่ผู้ป่วย</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient Number
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient sequence
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            @include ('sos_help_center.form_sos_pink')
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- operating_unit --------------------------------->
            <div class="tab-pane fade" id="operating_unit" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @include ('sos_help_center.form_operating_unit_map')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<span type="button" class="btn btn-info px-5" onclick="img_info_noti('{{ url("/") }}/img/stickerline/PNG/37.2.png','HELLO')"> 
    <i class="bx bx-info-circle"></i>Info
</span>


<!-- ⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇ - ห้ามลบ - ⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇ -->
<div class="item sos-map bg-white d-none">

    <div class="form-group {{ $errors->has('photo_sos') ? 'has-error' : ''}}">
        <label for="photo_sos" class="control-label">{{ 'Photo Sos' }}</label>
        <input class="form-control" name="photo_sos" type="file" id="photo_sos" value="{{ isset($sos_help_center->photo_sos) ? $sos_help_center->photo_sos : ''}}" >
        {!! $errors->first('photo_sos', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_help_center->user_id) ? $sos_help_center->user_id : ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('organization_helper') ? 'has-error' : ''}}">
        <label for="organization_helper" class="control-label">{{ 'Organization Helper' }}</label>
        <input class="form-control" name="organization_helper" type="text" id="organization_helper" value="{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}" >
        {!! $errors->first('organization_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name_helper') ? 'has-error' : ''}}">
        <label for="name_helper" class="control-label">{{ 'Name Helper' }}</label>
        <input class="form-control" name="name_helper" type="text" id="name_helper" value="{{ isset($sos_help_center->name_helper) ? $sos_help_center->name_helper : ''}}" >
        {!! $errors->first('name_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('operating_unit_id') ? 'has-error' : ''}}">
        <label for="operating_unit_id" class="control-label">{{ 'Partner Id' }}</label>
        <input class="form-control" name="operating_unit_id" type="number" id="operating_unit_id" value="{{ isset($sos_help_center->operating_unit_id) ? $sos_help_center->operating_unit_id : ''}}" >
        {!! $errors->first('operating_unit_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('helper_id') ? 'has-error' : ''}}">
        <label for="helper_id" class="control-label">{{ 'Helper Id' }}</label>
        <input class="form-control" name="helper_id" type="number" id="helper_id" value="{{ isset($sos_help_center->helper_id) ? $sos_help_center->helper_id : ''}}" >
        {!! $errors->first('helper_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_impression') ? 'has-error' : ''}}">
        <label for="score_impression" class="control-label">{{ 'Score Impression' }}</label>
        <input class="form-control" name="score_impression" type="number" id="score_impression" value="{{ isset($sos_help_center->score_impression) ? $sos_help_center->score_impression : ''}}" >
        {!! $errors->first('score_impression', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_period') ? 'has-error' : ''}}">
        <label for="score_period" class="control-label">{{ 'Score Period' }}</label>
        <input class="form-control" name="score_period" type="number" id="score_period" value="{{ isset($sos_help_center->score_period) ? $sos_help_center->score_period : ''}}" >
        {!! $errors->first('score_period', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_total') ? 'has-error' : ''}}">
        <label for="score_total" class="control-label">{{ 'Score Total' }}</label>
        <input class="form-control" name="score_total" type="number" id="score_total" value="{{ isset($sos_help_center->score_total) ? $sos_help_center->score_total : ''}}" >
        {!! $errors->first('score_total', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('commemt_help') ? 'has-error' : ''}}">
        <label for="commemt_help" class="control-label">{{ 'Commemt Help' }}</label>
        <input class="form-control" name="commemt_help" type="text" id="commemt_help" value="{{ isset($sos_help_center->commemt_help) ? $sos_help_center->commemt_help : ''}}" >
        {!! $errors->first('commemt_help', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed') ? 'has-error' : ''}}">
        <label for="photo_succeed" class="control-label">{{ 'Photo Succeed' }}</label>
        <input class="form-control" name="photo_succeed" type="file" id="photo_succeed" value="{{ isset($sos_help_center->photo_succeed) ? $sos_help_center->photo_succeed : ''}}" >
        {!! $errors->first('photo_succeed', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed_by') ? 'has-error' : ''}}">
        <label for="photo_succeed_by" class="control-label">{{ 'Photo Succeed By' }}</label>
        <input class="form-control" name="photo_succeed_by" type="text" id="photo_succeed_by" value="{{ isset($sos_help_center->photo_succeed_by) ? $sos_help_center->photo_succeed_by : ''}}" >
        {!! $errors->first('photo_succeed_by', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('remark_helper') ? 'has-error' : ''}}">
        <label for="remark_helper" class="control-label">{{ 'Remark Helper' }}</label>
        <input class="form-control" name="remark_helper" type="text" id="remark_helper" value="{{ isset($sos_help_center->remark_helper) ? $sos_help_center->remark_helper : ''}}" >
        {!! $errors->first('remark_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('notify') ? 'has-error' : ''}}">
        <label for="notify" class="control-label">{{ 'Notify' }}</label>
        <input class="form-control" name="notify" type="text" id="notify" value="{{ isset($sos_help_center->notify) ? $sos_help_center->notify : ''}}" >
        {!! $errors->first('notify', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'Status' }}</label>
        <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_help_center->status) ? $sos_help_center->status : ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>

</div>
<!-- ⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆ - ห้ามลบ - ⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆ -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>


<style type="text/css">
    #map {
      height: calc(40vh);
    }

    #mapMarkLocation {
      height: calc(65vh);
    }

    #map_operating_unit {
      height: calc(80vh);
    }

    #map_go_to_help {
      height: calc(80vh);
    }

    #mapTest {
      height: calc(80vh);
    }
</style>

<!-- MAP GO TO HELP -->
<script>
    var Active_reface_map_go_to ;

    function reface_map_go_to_help(){
        show_div_sos_or_unit('show_unit');

        open_map_go_to_help();
        let sos_id =  '{{ $sos_help_center->id }}' ;

        let sos_lat = document.querySelector('#lat'); 
        let sos_lng = document.querySelector('#lng'); 
        let m_lat = parseFloat(sos_lat.value);
        let m_lng = parseFloat(sos_lng.value);

        fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id )
            .then(response => response.json())
            .then(start_result => {
                // console.log("start_result");

                document.querySelector('#show_status').innerHTML = start_result['status_sos'] ;
                document.querySelector('#show_distance').innerHTML = start_result['distance'].toFixed(2) ;
                set_marker_go_to_help(start_result['officer_lat'] , start_result['officer_lng'] , start_result['officer_level']);

                let start_Item_1 = new google.maps.LatLng(m_lat, m_lng);
                let start_myPlace = new google.maps.LatLng(start_result['officer_lat'], start_result['officer_lng']);

                let start_bounds = new google.maps.LatLngBounds();
                    start_bounds.extend(start_myPlace);
                    start_bounds.extend(start_Item_1);
                map_go_to_help.fitBounds(start_bounds);


            });

        // ---------------------------------------------------------------------------------------

        reface_map_go_to = setInterval(function() {
            Active_reface_map_go_to = "Yes" ;
            fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id )
                .then(response => response.json())
                .then(result => {
                    // console.log("LOOP");
                    // console.log(result);

                    if (result['status_sos'] === 'ถึงที่เกิดเหตุ') {
                        myStop_reface_map_go_to();
                        alerts_status(result['status_sos']);
                    }

                    document.querySelector('#show_status').innerHTML = result['status_sos'] ;
                    document.querySelector('#show_distance').innerHTML = result['distance'].toFixed(2) ;
                    set_marker_go_to_help(result['officer_lat'] , result['officer_lng'] , result['officer_level']);

                    let Item_1 = new google.maps.LatLng(m_lat, m_lng);
                    let myPlace = new google.maps.LatLng(result['officer_lat'], result['officer_lng']);

                    let bounds = new google.maps.LatLngBounds();
                        bounds.extend(myPlace);
                        bounds.extend(Item_1);
                    map_go_to_help.fitBounds(bounds);

            });

        }, 15000);

    }

    function myStop_reface_map_go_to() {
        clearInterval(reface_map_go_to);
    }

    function open_map_go_to_help(){

        let sos_lat = document.querySelector('#lat'); 
        let sos_lng = document.querySelector('#lng'); 
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        let m_lat = parseFloat(sos_lat.value);
        let m_lng = parseFloat(sos_lng.value);
        let m_numZoom = parseFloat('17');

        map_go_to_help = new google.maps.Map(document.getElementById("map_go_to_help"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (sos_lat.value && sos_lng.value) {
            if (sos_go_to_help_marker) {
                sos_go_to_help_marker.setMap(null);
            }

            sos_go_to_help_marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map_go_to_help,
                icon: image_sos,
            });
        }
    }

    function set_marker_go_to_help(officer_lat , officer_lng , officer_level){
        let icon_level ;

        switch(officer_level) {
            case 'FR':
                icon_level = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
            break;
            case 'BLS':
                icon_level = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
            break;
            default:
                icon_level = "{{ url('/img/icon/operating_unit/แดง.png') }}";
        }

        if (officer_go_to_help_marker) {
            officer_go_to_help_marker.setMap(null);
        }
        officer_go_to_help_marker = new google.maps.Marker({
            position: {lat: parseFloat(officer_lat) , lng: parseFloat(officer_lng) },
            map: map_go_to_help,
            icon: icon_level,
        });
    }
</script>
<!-- END MAP GO TO HELP -->


<script>
    function alerts_status(status){
        console.log(status);
    }
</script>

<script>

    const image = "{{ url('/img/icon/operating_unit/sos.png') }}";
    var markers = [] ;
    let marker  ;
    var sos_markers = [] ;
    let sos_marker  ;
    var sos_operating_markers = [] ;
    let sos_operating_marker  ;

    let sos_go_to_help_marker  ;
    let officer_go_to_help_marker  ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
        check_show_btn_form_color(null);
        check_show_btn_select_unit();
        // click_select_btn('operating_unit');
        document.querySelector('#form_data_1').click();
    });

    function initMap() {

        let lat = document.querySelector('#lat'); 
        let lng = document.querySelector('#lng'); 
            // console.log(parseFloat(lat.value));
            // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (lat.value && lng.value) {
            m_lat = parseFloat(lat.value);
            m_lng = parseFloat(lng.value);
            m_numZoom = parseFloat('13');

            document.querySelector('#location_user').innerHTML = "(Lat: "+ parseFloat(lat.value).toFixed(5) + " , Long: " + parseFloat(lng.value).toFixed(5) + ")";
        }else{
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }
        
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (lat.value && lng.value) {
            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map,
                icon: image,
            });
            markers.push(marker);
        }

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        document.getElementById("btn_get_location_user").addEventListener("click", () => {
            
            geocodeLatLng(geocoder, map, infowindow);
        });
    }

    function mapMarkLocation(lat , lng , numZoom) {

        let m_lat = parseFloat(lat);
        let m_lng = parseFloat(lng);
        let m_numZoom = parseFloat(numZoom);

        mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });

    }

    function add_marker(marker_lat , marker_lng){
        if (marker) {
            marker.setMap(null);
        }

        marker = new google.maps.Marker({
            position: {lat: parseFloat(marker_lat) , lng: parseFloat(marker_lng) },
            map: mapMarkLocation,
            icon: image,
        });
        markers.push(marker);

        document.querySelector('#lat').value = marker_lat ;
        document.querySelector('#lng').value = marker_lng ;
    }

    function show_amphoe(){

        let location_P = document.querySelector("#location_P");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#location_A");
                    location_A.innerHTML = "";
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = " - เลือกอำเภอ - ";
                    option_start_A.value = "";
                    location_A.add(option_start_A);

                let option_start_T = document.createElement("option");
                    option_start_T.text = " - เลือกตำบล - ";
                    option_start_T.value = "";
                    location_T.add(option_start_T);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_A.value;
    }

    function show_tambon(){

        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/"+location_A.value+"/show_location_T")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start = document.createElement("option");
                    option_start.text = " - เลือกตำบล - ";
                    option_start.value = "";
                    location_T.add(option_start);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.district;
                    option.value = item.district;
                    location_T.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_T.value;
    }

    function select_T(){
        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");
        let location_T = document.querySelector("#location_T");
        zoom_map(location_P.value , location_A.value , location_T.value) ;
    }

    function zoom_map(province , amphoe , district){

        if (!province) {
            province = "null" ;
        }
        if (!amphoe) {
            amphoe = "null" ;
        }
        if (!district) {
            district = "null" ;
        }

        let all_lat_lng = [];

        // console.log(province);
        // console.log(amphoe);
        // console.log(district);

        fetch("{{ url('/') }}/api/zoom_map/" + province + "/" + amphoe + "/" + district)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for(let item of result){
                    all_lat_lng.push( JSON.parse('{"lat":'+parseFloat(item.lat)+',"lng":'+parseFloat(item.lng)+'}') ) ;
                }

                let bounds = new google.maps.LatLngBounds();

                for (let vc = 0; vc < all_lat_lng.length; vc++) {
                    bounds.extend(all_lat_lng[vc]);
                }

                if (district != "null" || result.length === 1) {
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        center: all_lat_lng[0],
                        zoom: 13,
                    });
                }else{
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        // zoom: num_zoom,
                        center: bounds.getCenter(),
                    });
                    mapMarkLocation.fitBounds(bounds);
                }

                // Create the initial InfoWindow.
                let infoWindow = new google.maps.InfoWindow({
                    // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
                    // position: myLatlng,
                });

                infoWindow.open(mapMarkLocation);
                // Configure the click listener.
                mapMarkLocation.addListener("click", (mapsMouseEvent) => {
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        // position: mapsMouseEvent.latLng,
                    });

                    infoWindow.setContent(
                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    );

                    let text_content = infoWindow.content ;
                        // console.log(text_content)

                    const contentArr = text_content.split(",");
                    const lat_Arr = contentArr[0].split(":");
                        let marker_lat = lat_Arr[1];
                    const lng_Arr = contentArr[1].split(":");
                        let marker_lng = lng_Arr[1].replace("\n}", "");

                    // console.log(marker_lat)
                    // console.log(marker_lng)
                    add_marker(marker_lat , marker_lng);
                    
                    infoWindow.open(mapMarkLocation);

                });
                    
            });
        
    }

    function re_mapMarkLocation(){

        let location_P = document.querySelector("#location_P");
        let location_P_start = document.querySelector(".location_P_start");
            // console.log(location_P_start);
            location_P_start.selected =  true;

        let location_A = document.querySelector("#location_A");
            location_A.innerHTML = "" ;
        let location_T = document.querySelector("#location_T");
            location_T.innerHTML = "" ;

        let option_start_A = document.createElement("option");
            option_start_A.text = " - เลือกอำเภอ - ";
            option_start_A.value = "";
            location_A.add(option_start_A);

        let option_start_T = document.createElement("option");
            option_start_T.text = " - เลือกตำบล - ";
            option_start_T.value = "";
            location_T.add(option_start_T);

        mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
            center: {lat: 12.870032, lng: 100.992541 },
            zoom: 6,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });
    }

    function submit_locations_sos(){
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        if (sos_marker) {
            sos_marker.setMap(null);
        }

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: parseFloat(input_lat.value), lng:  parseFloat(input_lng.value) },
            zoom: 14,
        });

        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(input_lat.value) , lng: parseFloat(input_lng.value) },
            map: map,
            icon: image,
        });
        sos_markers.push(sos_marker);

        document.querySelector('#location_user').innerHTML = "(Lat: "+ parseFloat(input_lat.value).toFixed(5) + " , Long: " + parseFloat(input_lng.value).toFixed(5) + ")";

        let detail_location_sos = document.querySelector("#detail_location_sos");
            detail_location_sos.innerHTML = "";

        document.querySelector('#btn_close_modal_mapMarkLocation').click();
        check_lat_lng();
        check_go_to(null);
    }

    function go_to_maps(){
        let tag_a = document.querySelector('#go_to_maps');
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        tag_a.href = "https://www.google.co.th/maps/dir//"+input_lat.value+ ","+input_lng.value+"/@"+input_lat.value+","+input_lng.value+",17z";
        document.querySelector('#go_to_maps').click();
    }

    function geocodeLatLng(geocoder, map, infowindow) {

        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        const latlng = {
            lat: parseFloat(input_lat.value),
            lng: parseFloat(input_lng.value),
        };
        geocoder
            .geocode({ location: latlng })
            .then((response) => {
                if (response.results[0]) {
                    map.setZoom(15);
                    const marker = new google.maps.Marker({
                      position: latlng,
                      map: map,
                    });
                    infowindow.setContent(response.results[0].formatted_address);
                    infowindow.open(map, marker);

                    let detail_location_sos = document.querySelector("#detail_location_sos");
                        detail_location_sos.innerHTML = response.results[0].formatted_address;
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function show_div_sos_or_unit(type){

        if (type === 'show_sos') {
            document.querySelector('#div_detail_sos').classList.remove('d-none');
            document.querySelector('#div_data_operating').classList.add('d-none');
            if (Active_reface_map_go_to === "Yes") {
                myStop_reface_map_go_to();
            }
        }else if(type === 'show_unit'){
            document.querySelector('#div_detail_sos').classList.add('d-none');
            document.querySelector('#div_data_operating').classList.remove('d-none');
        }

    }

    function check_show_btn_form_color(suit){

        let type = "" ;

        if (suit != null) {
           type = suit ;
        }else{
            let operating_suit_type = document.querySelectorAll('input[name="operating_suit_type"]');
            let operating_suit_type_value = "" ;
                operating_suit_type.forEach(operating_suit_type => {
                    if(operating_suit_type.checked){
                        operating_suit_type_value = operating_suit_type.value;
                    }
                })
           type = operating_suit_type_value ;
        }

        switch(type) {
            case 'FR':
                document.querySelector('#btn_form_blue').classList.remove('d-none');
                document.querySelector('#btn_form_green').classList.add('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
            case 'BLS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.add('d-none');
                document.querySelector('#btn_form_pink').classList.remove('d-none');
            break;
            case 'ILS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.remove('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
            case 'ALS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.remove('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
        }

    }

    function check_show_btn_select_unit(){

        let status = '{{ $sos_help_center->status }}' ;

        if (status === 'รอการยืนยัน' || status === 'ปฏิเสธ' || !status) {
            document.querySelector('#btn_operation').classList.add('d-none');
            document.querySelector('#btn_select_operating_unit').classList.remove('d-none');
        }else{
            document.querySelector('#btn_operation').classList.remove('d-none');
            document.querySelector('#btn_select_operating_unit').classList.add('d-none');
        }

    }

</script>
<script>
    function btn_save_data() {
         document.getElementById("btn_save").disabled = true;
         document.getElementById("save").classList.add('d-none');
         document.getElementById("loading").classList.remove('d-none');
        

         setTimeout(() => {
            document.getElementById("loading").classList.add('d-none');
        }, 1000);

        setTimeout(() => {
            
            document.getElementById("loading_success").classList.remove('d-none');
        }, 1010);

        setTimeout(() => {
            document.getElementById("btn_save").disabled = false;
            document.getElementById("loading_success").classList.add('d-none');
         document.getElementById("save").classList.remove('d-none');

        }, 2000);
    }
</script>