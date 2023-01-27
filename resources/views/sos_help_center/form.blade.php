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
}

</style>

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
                                <button  type="button" class="btn btn-info text-white" style="width: 100%;" onclick="submit_locations_sos();">
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
</style>
<div>
    <div class="card radius-10">
        <div class="row d-flex justify-content-between">
            <div class="col-md-2 col-lg-2 col-12 menu-header bg-transparent d-inline">
                <h6 class=" font-weight-bold m-0 p-0">รหัสปฏิบัติการ</h6>
                <h1><b><u>{{ $sos_help_center->id }}</u></b></h1>
            </div>
            <div class="col-10 d-flex justify-content-end">
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
                        color: #6c757d;
                        }
                        .nav-pills-secondary.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                    </style>
                    <ul class="nav nav-pills m-3" role="tablist">
                        <li class="nav-item nav-pills nav-pills-warning m-2" role="presentation">
                            <a class="nav-link btn-outline-warning btn active" data-bs-toggle="pill" href="#form_yellow" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเหลือง</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item nav-pills nav-pills-info m-2" role="presentation">
                            <a class="nav-link  btn-outline-info btn" data-bs-toggle="pill" href="#form-blue" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มฟ้า</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item  nav-pills nav-pills-success m-2" role="presentation">
                            <a class="nav-link btn-outline-success btn" data-bs-toggle="pill" href="#form-green" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเขียว</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item nav-pills nav-pills-pink m-2" role="presentation">
                            <a class="nav-link btn-outline-pink btn" data-bs-toggle="pill" href="#form-pink" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มชมพู</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item nav-pills nav-pills-secondary m-2" role="presentation">
                            <a class="nav-link  btn-outline-secondary btn" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false">
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
                <span>
                    ชื่อ/รหัสผู้แจ้งเหตุ
                </span>
                <h4>
                    <u>Teerasak Senarak</u>
                </h4>
                <hr>
                <span class="mt-2">
                    โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ
                </span>
                <h4>
                    <u>081-234-5678</u>
                </h4>
            </div>
            <div class="card radius-10 p-3">
                <div class="row d-flex justify-content-between">
                    <div class="col h6 d-flex align-items-center">
                        <b>จุดเกิดเหตุ</b>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <span class="btn btn-sm btn-danger" style="font-size:15px;width: 100%;" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="mapMarkLocation('12.870032','100.992541','6');">
                            เลือกจุด <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
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
                                        000000000000000
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
                        @include ('test_test')
                        
				
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="form-blue" role="tabpanel">
                <p>@include ('sos_help_center.form_sos_blue')</p>
            </div>

            <div class="tab-pane fade" id="form-green" role="tabpanel">
                <p>@include ('sos_help_center.form_sos_green')</p>div_form_pink
            </div>

            <div class="tab-pane fade" id="form-pink" role="tabpanel">
                <p>@include ('sos_help_center.form_sos_pink')</p>
            </div>

            <div class="tab-pane fade" id="operating_unit" role="tabpanel">
                <p>@include ('sos_help_center.form_operating_unit_map')</p>
            </div>
        </div>
        
    </div>
</div>






















































<div class="item sos-map col-12 col-md-12 bg-white">
    <div class="row">
        <div class="col-12">
            <h4 style="color:black;">
                รหัสปฏิบัติการ : <b><u>{{ $sos_help_center->id }}</u></b>
            </h4>
        </div>
        <div class="col-12">
            <div style="float:right;">
                <button  type="button" class="btn btn-warning text-white btn-center-block" onclick="click_select_btn('form_yellow');">
                   <i class="fa-solid fa-files-medical"></i> แบบฟอร์มเริ่มต้น (yellow)
                </button>
                <button  type="button" class="btn btn-info text-white btn-center-block" onclick="click_select_btn('form_blue');">
                    <i class="fa-solid fa-hospital-user"></i> แบบฟอร์ม (blue)
                </button>
                <button  type="button" class="btn btn-success text-white btn-center-block" onclick="click_select_btn('form_green');">
                    <i class="fa-solid fa-hospital-user"></i> แบบฟอร์ม (green)
                </button>
                <button  type="button" class="btn text-white btn-center-block" style="background-color:#fa93f0;" onclick="click_select_btn('form_pink');">
                    <i class="fa-solid fa-hospital-user"></i> แบบฟอร์ม (pink)
                </button>
                <button id="btn_select_operating_unit" disabled  type="button" class="btn-center-block btn btn-secondary" onclick="click_select_btn('operating_unit');">
                    <i class="fa-solid fa-truck-medical"></i> เลือกหน่วยแพทย์
                </button>
            </div>
        </div>
        <center>
            <hr><br>
        </center>
    </div>
</div>

<div class="item sos-map col-12 col-md-12" style="background-color: #F8F8FF; padding-top: 20px;">
    <div class="row">

        <div class="col-12 col-md-3">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="row">
                        <!-- ชื่อ -->
                        <div class="col-12" style="margin-top: 10px;">
                            <h5>
                                <b>ชื่อ/รหัสผู้แจ้งเหตุ</b>
                            </h5>
                            <span style="font-size:18px;">{{ $sos_help_center->name_user }}</span>
                        </div>
                        <!-- เบอร์ -->
                        <div class="col-12" style="margin-top: 10px;">
                            <h5>
                                <b>โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ</b>
                            </h5>
                            <span style="font-size:18px;">{{ $sos_help_center->phone_user }}</span>
                        </div>
                    </div>
                </div>

                <center>
                    <br>
                    <hr style="width:75%;">
                    <br>
                </center>

                <div class="col-12">
                    <div class="row text-center">
                        <div class="col-6">
                            <h5 class="float-start"><b>#จุดเกิดเหตุ</b></h5>
                        </div>
                        <div class="col-6">
                            <span class="btn btn-sm btn-danger" style="font-size:15px;width: 80%;" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="mapMarkLocation('12.870032','100.992541','6');">
                                เลือกจุด <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div style="padding-right:15px;margin-top: 5px;">
                        <div class="card">
                            <div id="map"></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center mb-3">
                                        <span style="margin-top:20px;width: 75%;" class="btn btn-warning text-white main-shadow main-radius" onclick="go_to_maps();">
                                            นำทาง <i class="fa-solid fa-location-arrow"></i>
                                        </span>
                                        <a id="go_to_maps" href="" target="bank"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- form yellow -->
        <div id="div_form_yellow" class="col-12 col-md-9 d-none" style="background-color:#FAE693;height: auto;border: 0px solid black;padding: 25px;border-radius: 25px;">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-4">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <h6><b>วันที่ :</b> {{ $result }}</h6>
                            </div>
                            <div class="col-4">
                                <h6><b>เลขที่ปฏิบัติการ(ON) :</b> {{ $sos_help_center->operating_code }}</h6>
                            </div>
                            <div class="col-4">
                                <h6><b>ลำดับผู้ป่วย(CN) :</b> .....................</h6>
                            </div>
                        </div>
                        <div class="row">
                            @include ('sos_help_center.form_sos_yellow')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- form blue -->
        <div id="div_form_blue" class="col-12 col-md-9 d-none" style="background-color: #93f0fa;height: auto;border: 0px solid black;padding: 25px;border-radius: 25px;">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @include ('sos_help_center.form_sos_blue')
                    </div>
                </div>
            </div>
        </div>

        <!-- form green -->
        <div id="div_form_green" class="col-12 col-md-9 d-none" style="background-color: #93faa6;height: auto;border: 0px solid black;padding: 25px;border-radius: 25px;">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @include ('sos_help_center.form_sos_green')
                    </div>
                </div>
            </div>
        </div>

        <!-- form pink -->
        <div id="div_form_pink" class="col-12 col-md-9 d-none" style="background-color: #fa93f0;height: auto;border: 0px solid black;padding: 25px;border-radius: 25px;">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @include ('sos_help_center.form_sos_pink')
                    </div>
                </div>
            </div>
        </div>

        <!-- form operating unit map -->
        <div id="div_form_operating_unit_map" class="col-12 col-md-9 d-" style="height: auto;border: 3px solid red;padding: 25px;border-radius: 25px;">
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




<div class="item sos-map bg-white d-none">
<br><br><br><br>
    
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
    <div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
        <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
        <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($sos_help_center->partner_id) ? $sos_help_center->partner_id : ''}}" >
        {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
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

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script> -->

<!-- KEY BENZE for test -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHrdKXlaset7m3Na7pMCEj8efChb6qJio&language=th"></script>


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

    #mapTest {
      height: calc(80vh);
    }
</style>
<script>

    const image = "https://www.viicheck.com/img/icon/flag_2.png";
    var markers = [] ;
    let marker  ;
    var sos_markers = [] ;
    let sos_marker  ;
    var sos_operating_markers = [] ;
    let sos_operating_marker  ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
        click_select_btn('operating_unit');
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

    function click_select_btn(btn){

        switch(btn) {
            case "operating_unit":
                document.querySelector('#div_form_operating_unit_map').classList.remove('d-none');

                document.querySelector('#div_form_yellow').classList.add('d-none');
                document.querySelector('#div_form_blue').classList.add('d-none');
                document.querySelector('#div_form_green').classList.add('d-none');
                document.querySelector('#div_form_pink').classList.add('d-none');
          
                map_operating_unit();
            break;
            case "form_yellow":
                document.querySelector('#div_form_yellow').classList.remove('d-none');

                document.querySelector('#div_form_operating_unit_map').classList.add('d-none');
                document.querySelector('#div_form_blue').classList.add('d-none');
                document.querySelector('#div_form_green').classList.add('d-none');
                document.querySelector('#div_form_pink').classList.add('d-none');
            break;
            case "form_blue":
                document.querySelector('#div_form_blue').classList.remove('d-none');

                document.querySelector('#div_form_yellow').classList.add('d-none');
                document.querySelector('#div_form_operating_unit_map').classList.add('d-none');
                document.querySelector('#div_form_green').classList.add('d-none');
                document.querySelector('#div_form_pink').classList.add('d-none');
            break;
            break;
            case "form_green":
                document.querySelector('#div_form_green').classList.remove('d-none');

                document.querySelector('#div_form_blue').classList.add('d-none');
                document.querySelector('#div_form_yellow').classList.add('d-none');
                document.querySelector('#div_form_operating_unit_map').classList.add('d-none');
                document.querySelector('#div_form_pink').classList.add('d-none');
            break;
            case "form_pink":
                document.querySelector('#div_form_pink').classList.remove('d-none');

                document.querySelector('#div_form_green').classList.add('d-none');
                document.querySelector('#div_form_blue').classList.add('d-none');
                document.querySelector('#div_form_yellow').classList.add('d-none');
                document.querySelector('#div_form_operating_unit_map').classList.add('d-none');
            break;
        }
        
    }


</script>