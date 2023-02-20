
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
                <h3><b><u>{{ $sos_help_center->operating_code }}</u></b></h3>
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
                            <a id="tag_a_operation" class="nav-link btn-outline-purple btn" data-bs-toggle="pill" href="#operation" role="tab" aria-selected="true" onclick="reface_map_go_to_help();">
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