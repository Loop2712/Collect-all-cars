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
}.iziToast > .iziToast-body .iziToast-texts {
  margin: 100px 0 0 0;
  padding-right: 2px;
  display: contents !important;
  float: left;
}
.iziToast-texts p{
    margin-top: 5px !important;
    white-space: nowrap;
    overflow: hidden;
  text-overflow: ellipsis;
}
.iziToast {
    width:30% !important;
    max-height: 100% !important;
}
.iziToast-texts{
    min-width: 10% !important;
    max-width: 40% !important;
}

.iziToast > .iziToast-body .iziToast-message {
  margin-top: 5px;
  white-space: normal !important;
}
</style> 

<!-- TEST alet_new_data -->
<!-- <div class="container">
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'TNK' , 'B')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'b' , 'Bdd')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'Bdd' , 'B451')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
</div> -->

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
                                <button id="span_submit_locations_sos" type="button" class="btn btn-info text-white" style="width: 100%;" onclick="submit_locations_sos();open_map_operating_unit();">
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
                <h3><b><u id="text_u_operating_code">{{ $sos_help_center->operating_code }}</u></b></h3>
            </div>
            <div class="col-md-6 col-lg-6 col-12  d-flex justify-content-end">
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
                            <a id="tag_a_operation" class="nav-link btn-outline-purple btn" data-bs-toggle="pill" href="#operation" role="tab" aria-selected="true" onclick="reface_map_go_to_help();Stop_reface_check_form_yellow();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">การดำเนินการ</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_yellow" class="nav-item nav-pills nav-pills-warning m-2" role="presentation">
                            <!-- <a class="nav-link btn-outline-warning btn active" data-bs-toggle="pill" href="#form_yellow" role="tab" aria-selected="true" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#form_data_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเหลือง</div>
                                </div>
                            </a> -->
                            <a class="nav-link btn-outline-warning btn active" href="{{ url('/sos_help_center') . '/' . $sos_help_center->id . '/edit' }}" >
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
                            <a id="tag_a_open_map_operating_unit" class="nav-link btn-outline-danger btn" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false" onclick="open_map_operating_unit();select_level();">
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
                    <div class="col w-100 p-0 m-0">
                        <span class="btn btn-sm btn-danger" style="font-size:15px;width: 100%;" data-toggle="modal" data-target="#see_img_sos">
                        <i class="fa-duotone fa-images"></i>รูปภาพ 
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
                    @php
                        $data_officer = App\Models\Data_1669_operating_officer::where('operating_unit_id' , $sos_help_center->operating_unit_id)->where('user_id',$sos_help_center->helper_id)->first();
                    @endphp

                    @if(!empty($data_officer->level))
                        @switch($data_officer->level)
                            @case('FR')
                                <span class="float-end btn btn-sm btn-success main-shadow main-radius">
                                    {{ $data_officer->level }}
                                </span>
                            @break
                            @case('BLS')
                                <span class="float-end btn btn-sm btn-warning text-white main-shadow main-radius">
                                    {{ $data_officer->level }}
                                </span>
                            @break
                            @case('ILS')
                                <span class="float-end btn btn-sm btn-danger main-shadow main-radius">
                                    {{ $data_officer->level }}
                                </span>
                            @break
                            @case('ALS')
                                <span class="float-end btn btn-sm btn-danger main-shadow main-radius">
                                    {{ $data_officer->level }}
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
                                สถานะ :  <b><span id="show_status" class=""></span></b>
                                <span id="show_remark_status" class="d-none text-secondary">(<span id="text_remark_status"></span>)</span>
                                &nbsp;&nbsp;
                                <span id="h4_show_distance" class="">ระยะทาง (รัศมี) :  <b><span id="show_distance" class="text-warning"></span></b> กม.</span>
                            </h4>
                            <div class="row text-center">
                                <div class="col-6">
                                    <p>การให้รหัสความรุนแรง (IDC) : <span id="show_idc" class="btn btn-sm px-5 radius-30 d-none"></span></p>
                                </div>
                                <div class="col-6">
                                    <p>รหัสความรุนแรง ณ จุดเกิดเหตุ (RC): <span id="show_rc" class="btn btn-sm px-5 radius-30 d-none"></span></p>
                                </div>
                                
                            </div>
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
                        <div class="col-3">
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
                        <div class="col-4">
                            <div class="box-status">
                                <span class="m-0">เลขที่ปฏิบัติการ(ON)</span>
                                <h5 class="m-0 h5">
                                    <b id="text_in_formyellow_operating_code">
                                        {{ $sos_help_center->operating_code }}
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        .............
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 float-end">
                            <button style="width: 100%;" id="btn_save" class=" btn btn-success d-flex justify-content-center btn-block" type="button" onclick="btn_save_data();send_save_data();"> 
                                <div id="icon_save_data" class="d-none">
                                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                    </svg>
                                </div>
                                    &nbsp;
                                <span id="text_btn_save">
                                    บันทึก
                                </span>
                                
                            </button>

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
                            <!--  -->
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
    var status_old ;
    var rc_old ;

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

                status_old = start_result['status_sos'] ;
                rc_old = start_result['rc'] ;
                if (rc_old) {
                    document.querySelector('#show_rc').classList.remove('d-none');
                    document.querySelector('#show_rc').innerHTML = rc_old ;

                    let start_class_text_show_rc ;
                    switch(start_result['rc']) {
                        case 'ดำ':
                            start_class_text_show_rc = "btn-dark";
                        break;
                        case 'ขาว(ทั่วไป)':
                            start_class_text_show_rc = "btn-light";
                        break;
                        case 'เขียว(ไม่รุนแรง)':
                            start_class_text_show_rc = "btn-success";
                        break;
                        case 'เหลือง(เร่งด่วน)':
                            start_class_text_show_rc = "btn-warning";
                        break;
                        case 'แดง(วิกฤติ)':
                            start_class_text_show_rc = "btn-danger";
                        break;
                    }
                    document.querySelector('#show_rc').classList.add(start_class_text_show_rc);
                }

                if (start_result['idc']) {
                    document.querySelector('#show_idc').classList.remove('d-none');
                    document.querySelector('#show_idc').innerHTML = start_result['idc'] ;

                    let start_class_text_show_idc ;
                    switch(start_result['idc']) {
                        case 'ดำ':
                            start_class_text_show_idc = "btn-dark";
                        break;
                        case 'ขาว(ทั่วไป)':
                            start_class_text_show_idc = "btn-light";
                        break;
                        case 'เขียว(ไม่รุนแรง)':
                            start_class_text_show_idc = "btn-success";
                        break;
                        case 'เหลือง(เร่งด่วน)':
                            start_class_text_show_idc = "btn-warning";
                        break;
                        case 'แดง(วิกฤติ)':
                            start_class_text_show_idc = "btn-danger";
                        break;
                    }
                    document.querySelector('#show_idc').classList.add(start_class_text_show_idc);
                }



                document.querySelector('#show_status').innerHTML = start_result['status_sos'] ;
                switch(start_result['status_sos']) {
                    case 'เสร็จสิ้น':
                        start_class_text_show_status = "text-success";
                    break;
                    default:
                        start_class_text_show_status = "text-warning";
                    break;
                }
                let start_class_show_status = document.querySelector('#show_status').classList ;
                    document.querySelector('#show_status').classList.remove(start_class_show_status[0]);
                    document.querySelector('#show_status').classList.add(start_class_text_show_status);

                if (start_result['remark_status']) {
                    document.querySelector('#show_remark_status').classList.remove('d-none');
                    document.querySelector('#text_remark_status').innerHTML = start_result['remark_status'];
                }else{
                    document.querySelector('#show_remark_status').classList.add('d-none');
                    document.querySelector('#text_remark_status').innerHTML = "";
                }

                document.querySelector('#h4_show_distance').classList.add('d-none');

                if (start_result['status_sos'] != 'เสร็จสิ้น') {

                    document.querySelector('#show_distance').innerHTML = start_result['distance'].toFixed(2) ;
                    document.querySelector('#h4_show_distance').classList.remove('d-none');

                    set_marker_go_to_help(start_result['officer_lat'] , start_result['officer_lng'] , start_result['officer_level']);

                    let start_Item_1 = new google.maps.LatLng(m_lat, m_lng);
                    let start_myPlace = new google.maps.LatLng(start_result['officer_lat'], start_result['officer_lng']);

                    let start_bounds = new google.maps.LatLngBounds();
                        start_bounds.extend(start_myPlace);
                        start_bounds.extend(start_Item_1);
                    map_go_to_help.fitBounds(start_bounds);
                }


            });

        // LOOP ---------------------------------------------------------------------------------------

        reface_map_go_to = setInterval(function() {
            Active_reface_map_go_to = "Yes" ;
            fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id )
                .then(response => response.json())
                .then(result => {
                    // console.log("LOOP");
                    // console.log(result);

                    if (result['status_sos'] != status_old) {

                        let img_stk = '{{ url("/") }}/img/stickerline/PNG/37.2.png' ;
                        alerts_status(img_stk , result['status_sos'] , 'status');
                        
                        status_old = result['status_sos'] ;
                    }

                    if (result['rc'] != rc_old) {

                        document.querySelector('#show_rc').classList.remove('d-none');
                        document.querySelector('#show_rc').innerHTML = result['rc'] ;

                        let class_text_show_rc ;
                        switch(result['rc']) {
                            case 'ดำ':
                                class_text_show_rc = "btn-dark";
                            break;
                            case 'ขาว(ทั่วไป)':
                                class_text_show_rc = "btn-light";
                            break;
                            case 'เขียว(ไม่รุนแรง)':
                                class_text_show_rc = "btn-success";
                            break;
                            case 'เหลือง(เร่งด่วน)':
                                class_text_show_rc = "btn-warning";
                            break;
                            case 'แดง(วิกฤติ)':
                                class_text_show_rc = "btn-danger";
                            break;
                        }
                        document.querySelector('#show_rc').classList.add(class_text_show_rc);

                        // let img_stk = '{{ url("/") }}/img/stickerline/PNG/37.2.png' ;
                        // alerts_status(img_stk , , 'rc');
                        
                        rc_old = result['rc'] ;
                    }

                    document.querySelector('#show_status').innerHTML = result['status_sos'] ;
                    switch(result['status_sos']) {
                        case 'เสร็จสิ้น':
                            class_text_show_status = "text-success";
                        break;
                        default:
                            class_text_show_status = "text-warning";
                        break;
                    }
                    let class_show_status = document.querySelector('#show_status').classList ;
                        document.querySelector('#show_status').classList.remove(class_show_status[0]);
                        document.querySelector('#show_status').classList.add(class_text_show_status);

                    if (result['remark_status']) {
                        document.querySelector('#show_remark_status').classList.remove('d-none');
                        document.querySelector('#text_remark_status').innerHTML = result['remark_status'];
                    }else{
                        document.querySelector('#show_remark_status').classList.add('d-none');
                        document.querySelector('#text_remark_status').innerHTML = "";
                    }

                    

                    if (result['status_sos'] === 'เสร็จสิ้น') {
                        document.querySelector('#h4_show_distance').classList.add('d-none');
                        myStop_reface_map_go_to();
                    }else{
                        document.querySelector('#show_distance').innerHTML = result['distance'].toFixed(2) ;
                        set_marker_go_to_help(result['officer_lat'] , result['officer_lng'] , result['officer_level']);

                        let Item_1 = new google.maps.LatLng(m_lat, m_lng);
                        let myPlace = new google.maps.LatLng(result['officer_lat'], result['officer_lng']);

                        let bounds = new google.maps.LatLngBounds();
                            bounds.extend(myPlace);
                            bounds.extend(Item_1);
                        map_go_to_help.fitBounds(bounds);

                        // if ( map_go_to_help.getZoom() ){   // or set a minimum
                        //     map_go_to_help.setZoom(map_go_to_help.getZoom() - 2);  // set zoom here
                        //     console.log(map_go_to_help.getZoom());
                        //     console.log(map_go_to_help.getZoom() -2 );
                        //     console.log("-----------");
                        // }
                    }

            });

        }, 10000);

    }

    function myStop_reface_map_go_to() {
        clearInterval(reface_map_go_to);
        // console.log("STOP LOOP");
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
    function alerts_status(img , status , type){
        // console.log(status);

        // notifications.js
        // notifications.min.js
        // notification-custom-script.js
        if (type === 'status') {
            img_info_noti(img , status);
        }

        let audio_update_status = new Audio("{{ asset('sound/เปลี่ยนสถานะ.mp3') }}");
            audio_update_status.play();
    }
</script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
        check_show_btn_form_color(null);
        check_show_btn_select_unit();
        // click_select_btn('operating_unit');
        setTimeout(function() {
            document.querySelector('#form_data_1').click();
        }, 1000);
    });


    const image = "{{ url('/img/icon/operating_unit/sos.png') }}";
    var markers = [] ;
    let marker  ;
    var sos_markers = [] ;
    let sos_marker  ;
    var sos_operating_markers = [] ;
    let sos_operating_marker  ;

    let sos_go_to_help_marker  ;
    let officer_go_to_help_marker  ;

    

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

        document.getElementById("span_submit_locations_sos").addEventListener("click", () => {
            
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
                // console.log(response);
                
                let district_P ;
                let district_A ;
                let district_T ;

                //// ถ้าอยากรับอย่างอื่นเข้าไปดูที่ results[0]['address_components']['types'] ////
                
                const resultType_P = "administrative_area_level_1";
                const resultType_A = "administrative_area_level_2";
                const resultType_T = "locality";

                //// รับ จังหวัด อย่างเดียว ////
                for (const component_p of response.results[0].address_components) {
                    if (component_p.types.includes(resultType_P)) {
                        district_P = component_p.long_name;
                        // console.log(district_P);
                        break;
                    }
                }
                //// รับ อำเภอ อย่างเดียว ////
                for (const component_a of response.results[0].address_components) {
                    if (component_a.types.includes(resultType_A)) {
                        district_A = component_a.long_name;
                        // console.log(district_A);
                        break;
                    }
                }
                //// รับ ตำบล อย่างเดียว ////
                for (const component_t of response.results[0].address_components) {
                    if (component_t.types.includes(resultType_T)) {
                        district_T = component_t.long_name;
                        // console.log(district_T);
                        break;
                    }
                }

                let formData = new FormData();

                let data_sos_1669 = {
                    "id" : "{{ $sos_help_center->id }}",
                    "changwat" : district_P,
                    "amphoe" : district_A,
                    "tambon" : district_T,
                }
                // console.log(data_sos_1669);

                formData.append('id', data_sos_1669.id);
                formData.append('changwat', data_sos_1669.changwat);
                formData.append('amphoe', data_sos_1669.amphoe);
                formData.append('tambon', data_sos_1669.tambon);

                fetch("{{ url('/') }}/api/update_code_sos_1669", {
                    method: 'POST',
                    body: formData
                }).then(function (response){
                    return response.text();
                }).then(function(data){
                    // console.log(data);
                    document.querySelector('#text_u_operating_code').innerHTML = data ;
                    document.querySelector('#text_in_formyellow_operating_code').innerHTML = data ;
                }).catch(function(error){
                    // console.error(error);
                });


                if (response.results[0]) {
                    map.setZoom(15);

                    let detail_location_sos = document.querySelector("#detail_location_sos");
                        detail_location_sos.value = response.results[0].formatted_address;

                        check_lat_lng();
                        check_go_to(null);

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

        if (status === 'รอการยืนยัน' || status === 'ปฏิเสธ' || status === 'รับแจ้งเหตุ' || !status) {
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
        document.querySelector('#icon_save_data').classList.remove('d-none');
        document.querySelector('#text_btn_save').innerHTML = "บันทึก..";
        const animated = document.querySelector('.checkmark__check');
        animated.onanimationend = () => {
            setTimeout(() => {
                document.querySelector('#icon_save_data').classList.add('d-none');
                document.querySelector('#text_btn_save').innerHTML = "บันทึก";

            }, 1000);

        };

    }
</script>


<!-- alet_new_data -->
<script>

    function alet_new_data(form_color , key , value , old) {

        // เช็คว่ามีอันเดิมที่แสดงอยู่หรือไม่
        let elms_check = document.querySelectorAll('div[class~="iziToast"]')
        let check_alet_new_data = "No" ;

        let text_check = key + "_" + value + "_" + old ;

        for(let i_check = 0; i_check < elms_check.length; i_check++){

            // console.log(elms_check[i_check]['attributes']['data-change']['value']);

            if(elms_check[i_check]['attributes']['data-change']['value'] && elms_check[i_check]['attributes']['data-change']['value'] === text_check) {
                check_alet_new_data = "Yes" ;
                // console.log(i_check);
                break;
            }else{
                check_alet_new_data = "No" ;
            }
        }
        // จบ เช็คว่ามีอันเดิมที่แสดงอยู่หรือไม่

        if (check_alet_new_data === "No") {

            // console.log("SHOW alet_new_data");

            let pass = Math.floor(1000 + Math.random() * 9000);
            let text_form_yellow ;

            switch(form_color) {
                case 'form_yellow':
                    text_form_yellow = 'สีเหลือง' ;
                break;
            }

            let text_key = change_key_to_text_key(key);

            iziToast.show({
                color: 'dark',
                icon: 'fa-duotone fa-file-import',
                close: false,
                timeout: 8000,
                resetOnHover: true,
                title: 'ฟอร์ม "' +text_form_yellow+ '" มีข้อมูลใหม่!!',
                message: 'การเปลี่ยนแปลง ข้อ : ' +text_key+ '<br>ข้อมูลที่เปลี่ยนแปลง : จาก <b>' +old+ '</b> เป็น <b>' +value+ '</b>',
                position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                  [
                    '<button>บันทึก (<span id="nub_vi_'+pass+'">8</span>)</button>',
                    function (instance, toast) {
                        save_data(key , value , old)
                      instance.hide({
                        transitionOut: 'fadeOutUp'
                      }, toast);
                    }
                  ],
                  [
                    '<button class="btn-danger">ไม่บันทึก</button>',
                    function (instance, toast) {
                        dont_save_data(key , value , old);
                        instance.hide({
                        transitionOut: 'fadeOutUp'
                      }, toast);
                    }
                  ]
                ],onClosed: function asdfa(instance, toast, closedBy){
                    if (closedBy === 'timeout') {
                        save_data(key , value , old);
                    }
                   
                },onOpening: function () {
                    // console.log(pass);
                    startTimer_nub_vi(pass);
                    let audio_alet_new_data = new Audio("{{ asset('sound/เตือน.mp3') }}");
                        audio_alet_new_data.play();
                }
            
            });

            // ----------------------------
            let tag_iziToast = [] ;

            // check data-id
            let elms = document.querySelectorAll('div[class~="iziToast"]')

            for(let i=0; i < elms.length; i++){
                // var test = elms[i].getAttribute("data-izitoast-ref")

                if (!elms[i]['attributes']['data-id']) {
                    // console.log("NO data-id");
                    let data_id = document.createAttribute("data-id");
                        data_id.value = pass ;
                        elms[i].setAttributeNode(data_id);
                }

                if (!elms[i]['attributes']['data-change']) {
                    let data_change = document.createAttribute("data-change");
                        data_change.value = key + "_" + value + "_" + old ;
                        elms[i].setAttributeNode(data_change);
                }
            }

            // กำหนด Tag ให้ tag_iziToast
            for(let xi =0; xi < elms.length; xi++){
                tag_iziToast[pass] = elms[xi] ;
            }

            // เมาส์วาง
            tag_iziToast[pass].addEventListener("mouseout", (event) => {
                // นับวิใหม่
                startTimer_nub_vi(pass);
            }, false);

            tag_iziToast[pass].addEventListener("mouseover", (event) => {
                // หยุดนับ
                myStop_startTimer_nub_vi(pass);
            }, false);
            // จบ เมาส์วาง
        }
        
    }

    var timer_nub_vi = [] ;

    function startTimer(duration, display,pass) {
        let timer = duration, seconds;
        
        timer_nub_vi[pass] = setInterval(function () {

            seconds = parseInt(timer % 60, 10);
            display.textContent =  seconds;

            if (--timer < 0) {
                timer = duration;
            }

        }, 1000);
    }

    function startTimer_nub_vi(pass) {
        let fiveMinutes = 7,
            display = document.querySelector('#nub_vi_'+pass);
        startTimer(fiveMinutes, display,pass);
    };

    function myStop_startTimer_nub_vi(pass) {
        clearInterval(timer_nub_vi[pass]);
        // alert("STOP");
    }

    function save_data(key , value , old){

        let text_key = change_key_to_text_key(key);

        iziToast.success({
            timeout: 4000,
            position: "bottomLeft",
            icon: 'fa-solid fa-file-check',
            title: 'บันทึกข้อมูลเรียบร้อย',
            message: 'บันทึกข้อมูล ข้อ : ' + text_key + ' เรียบร้อย ข้อมูลที่เปลี่ยนแปลง : ' + value
        });
        // บันทึกข้อมูลใหม่
        edit_form_yellow(key , value , old);
        let audio_save_data = new Audio("{{ asset('sound/ยืนยัน.mp3') }}");
            audio_save_data.play();

    }
    function dont_save_data(key , value , old){

        let text_key = change_key_to_text_key(key);

        iziToast.warning({
            timeout: 4000,
            position: "bottomLeft",
            icon: 'fa-solid fa-file-excel',
            title: 'บันทึกข้อมูลไม่สำเร็จ',
            message: 'ปฏิเสธการบันทึกข้อมูล ข้อ : ' + text_key + ' เรียบร้อย'
        });

        // เปลี่ยนข้อมูลกลับเหมือนเดิม
        check_go_to(null);
        let audio_dont_save_data = new Audio("{{ asset('sound/ปฏิเสธ.mp3') }}");
            audio_dont_save_data.play();
    }

    function change_key_to_text_key(key){

        let text_key ;

        switch(key) {

            case 'be_notified':
                text_key = "รับแจ้งเหตุทาง" ;
            break;
            case 'name_user':
                text_key = "ชื่อ/รหัสผู้แจ้งเหตุ" ;
            break;
            case 'phone_user':
                text_key = "โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ" ;
            break;
            case 'lat':
                text_key = "ละติจูด" ;
            break;
            case 'lng':
                text_key = "ลองติจูด" ;
            break;
            case 'location_sos':
                text_key = "รายละเอียดสถานที่เกิดเหตุ" ;
            break;
            case 'symptom':
                text_key = "อาการนำสำคัญ" ;
            break;
            case 'symptom_other':
                text_key = "อาการนำสำคัญ รายละเอียดอื่นๆ" ;
            break;
            case 'idc':
                text_key = "การให้รหัสความรุนแรง" ;
            break;
            case 'vehicle_type':
                text_key = "ชนิดยานพาหนะ" ;
            break;
            case 'operating_suit_type':
                text_key = "ประเภทชุดปฏิบัติการ" ;
            break;
            case 'operation_unit_name':
                text_key = "ชื่อหน่วยปฏิบัติการ" ;
            break;
            case 'action_set_name':
                text_key = "ชื่อชุดปฏิบัติการ" ;
            break;
            case 'time_create_sos':
                text_key = "เวลารับแจ้งเหตุ" ;
            break;
            case 'time_command':
                text_key = "เวลาสั่งการ" ;
            break;
            case 'time_go_to_help':
                text_key = "เวลาออกจากฐาน" ;
            break;
            case 'time_to_the_scene':
                text_key = "เวลาถึงที่เกิดเหตุ" ;
            break;
            case 'time_leave_the_scene':
                text_key = "เวลาออกจากที่เกิดเหตุ" ;
            break;
            case 'time_hospital':
                text_key = "เวลาถึง รพ." ;
            break;
            case 'time_to_the_operating_base':
                text_key = "เวลากลับถึงฐาน" ;
            break;
            case 'km_create_sos_to_go_to_help':
                text_key = "เลขไมค์ก่อนออกจากฐาน" ;
            break;
            case 'km_to_the_scene_to_leave_the_scene':
                text_key = "เลขไมค์ถึงที่เกิดเหตุ" ;
            break;
            case 'km_hospital':
                text_key = "เลขไมค์ถึง รพ." ;
            break;
            case 'km_operating_base':
                text_key = "เลขไมค์กลับถึงฐาน" ;
            break;
            case 'rc':
                text_key = "การให้รหัสความรุนแรง ณ จุดเกิดเหตุ" ;
            break;
            case 'rc_black_text':
                text_key = "รหัส สีดำ" ;
            break;
            case 'treatment':
                text_key = "การปฏิบัติการ" ;
            break;
            case 'sub_treatment':
                text_key = "การปฏิบัติการ เพิ่มเติม" ;
            break;
            case 'patient_name_1':
                text_key = "ผู้ป่วย ๑. ชื่อ-สกุล" ;
            break;
            case 'patient_age_1':
                text_key = "ผู้ป่วย ๑. อายุ (ปี)" ;
            break;
            case 'patient_hn_1':
                text_key = "ผู้ป่วย ๑. รหัสผู้ป่วย" ;
            break;
            case 'patient_vn_1':
                text_key = "ผู้ป่วย ๑. เลขประจำตัวประชาชน" ;
            break;
            case 'delivered_province_1':
                text_key = "ผู้ป่วย ๑. จังหวัดที่นำส่ง" ;
            break;
            case 'delivered_hospital_1':
                text_key = "ผู้ป่วย ๑. โรงพยาบาลที่นำส่ง" ;
            break;
            case 'patient_name_2':
                text_key = "ผู้ป่วย ๒. ชื่อ-สกุล" ;
            break;
            case 'patient_age_2':
                text_key = "ผู้ป่วย ๒. อายุ (ปี)" ;
            break;
            case 'patient_hn_2':
                text_key = "ผู้ป่วย ๒. รหัสผู้ป่วย" ;
            break;
            case 'patient_vn_2':
                text_key = "ผู้ป่วย ๒. เลขประจำตัวประชาชน" ;
            break;
            case 'delivered_province_2':
                text_key = "ผู้ป่วย ๒. จังหวัดที่นำส่ง" ;
            break;
            case 'delivered_hospital_2':
                text_key = "ผู้ป่วย ๒. โรงพยาบาลที่นำส่ง" ;
            break;
            case 'submission_criteria':
                text_key = "เกณฑ์การนำส่ง" ;
            break;
            case 'communication_hospital':
                text_key = "การติดต่อสื่อสารกับ รพ.ที่นำส่ง" ;
            break;
            case 'registration_category':
                text_key = "เพิ่มเติม ทะเบียนรถหมวด" ;
            break;
            case 'registration_number':
                text_key = "เพิ่มเติม เลขทะเบียน" ;
            break;
            case 'registration_province':
                text_key = "เพิ่มเติม จังหวัด" ;
            break;
            case 'owner_registration':
                text_key = "เพิ่มเติม เจ้าของ" ;
            break;
            
            default:
                text_key = "..." ;
        }

        return text_key ;
    }

</script>
<!-- END alet_new_data -->