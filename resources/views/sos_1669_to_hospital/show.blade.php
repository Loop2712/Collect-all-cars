@extends('layouts.partners.theme_hospital')

@section('content')

    <style>
        #map_operating_hospital {
            height: calc(65vh);
        }

        .btn-status{
            padding:5px;
            font-size: 16px;
            border: none;
            border-radius:5px;
            cursor: context-menu;
        }

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

    <div class="row">
        <div class="col-12 col-md-3 col-lg-3">
            <div class="card radius-10 p-0">
                <div class="col-12 menu-header bg-transparent d-inline" style="padding:15px 15px 15px 15px;">
                    <h5 class=" font-weight-bold m-0 p-0">
                        รหัสปฏิบัติการ
                    </h5>
                    <h4>
                        <b><u id="text_u_operating_code">
                                {{-- 2405-7103-0001 --}}
                                {{$data->centers_operating_code ? $data->centers_operating_code : "--"}}
                            </u></b>
                    </h4>

                    @php
                        use Carbon\Carbon;
                        $date_data = $data->centers_time_create_sos; // ตัวอย่างวันที่
                        $carbonDate = Carbon::parse($date_data);

                        $data_officer = App\Models\Data_1669_operating_officer::where('operating_unit_id' , $data->centers_operating_unit_id)->where('user_id',$data->centers_helper_id)->first();

                        $months = [
                            1 => 'มกราคม',
                            2 => 'กุมภาพันธ์',
                            3 => 'มีนาคม',
                            4 => 'เมษายน',
                            5 => 'พฤษภาคม',
                            6 => 'มิถุนายน',
                            7 => 'กรกฎาคม',
                            8 => 'สิงหาคม',
                            9 => 'กันยายน',
                            10 => 'ตุลาคม',
                            11 => 'พฤศจิกายน',
                            12 => 'ธันวาคม',
                        ];

                        $date_month = (object) [
                            'date' => $carbonDate->day,
                            'month' => $months[$carbonDate->month],
                        ];

                        // IDC
                        switch ($data->yellows_idc) {
                            case 'แดง(วิกฤติ)':
                                $idc = "(วิกฤติ)";
                                $color_btn_idc = "btn-status-crisis";
                                break;
                            case 'เขียว(ไม่รุนแรง)':
                                $idc = "(ไม่รุนแรง)";
                                $color_btn_idc = "btn-status-weak";
                                break;
                            case 'ขาว(ทั่วไป)':
                                $idc = "(ทั่วไป)";
                                $color_btn_idc = "btn-status-normal";
                                break;
                            case 'เหลือง(เร่งด่วน)':
                                $idc = "(เร่งด่วน)";
                                $color_btn_idc = "btn-status-hurry";
                                break;
                            case 'ดำ(รับบริการสาธารณสุขอื่น)':
                                $idc = "(รับบริการสาธารณสุขอื่น)";
                                $color_btn_idc = "btn-status-other";
                                break;
                            default:
                                $idc = "(ไม่ได้ระบุ)";
                                $color_btn_idc = "btn-status-normal";
                                break;
                        }
                        //RC
                        switch ($data->yellows_rc) {
                            case 'แดง(วิกฤติ)':
                                $rc = "(วิกฤติ)";
                                $color_btn_rc = "btn-status-crisis";
                                break;
                            case 'เขียว(ไม่รุนแรง)':
                                $rc = "(ไม่รุนแรง)";
                                $color_btn_rc = "btn-status-weak";
                                break;
                            case 'ขาว(ทั่วไป)':
                                $rc = "(ทั่วไป)";
                                $color_btn_rc = "btn-status-normal";
                                break;
                            case 'เหลือง(เร่งด่วน)':
                                $rc = "(เร่งด่วน)";
                                $color_btn_rc = "btn-status-hurry";
                                break;
                            case 'ดำ(รับบริการสาธารณสุขอื่น)':
                                $rc = "(รับบริการสาธารณสุขอื่น)";
                                $color_btn_rc = "btn-status-other";
                                break;
                            default:
                                $rc = "(ไม่ได้ระบุ)";
                                $color_btn_rc = "btn-status-normal";
                                break;
                        }

                        // จับเวลาเคส(ผ่านมาแล้วกี่นาที)
                        $timeString = $data->centers_time_create_sos;
                        // สร้าง DateTime object จากเวลาที่กำหนด
                        $specifiedTime = new DateTime($timeString);
                        // สร้าง DateTime object สำหรับเวลาปัจจุบัน
                        $currentTime = new DateTime();
                        // คำนวณความแตกต่าง
                        $interval = $specifiedTime->diff($currentTime);
                        // แปลงความแตกต่างเป็นนาที
                        $minutesDiff = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

                    @endphp

                    <div class="d-flex justify-content-center ">
                        <a href="{{ url('/video_call_4/before_video_call_4') }}?type=sos_1669&sos_id={{ $data->sos_help_center_id}}" target="_blank" class="btn btn-success w-75" style="border-radius: 10px;">เข้าร่วมสนทนา</a>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around  mb-3 ">
                <div class="m-0 p-0">
                    <span id="title_case_detail" class="btn btn-primary" style="font-weight: bold; border-radius:10px; height: 100%; width:100%; font-size:16px; " onclick="switch_div_data('case_detail')">รายละเอียดเคส</span>
                </div>
                <div class="m-0 p-0">
                    <span id="title_data_operation" class="btn btn-outline-primary" style="font-weight: bold; border-radius:10px; height: 100%; width:100%; font-size:16px;" onclick="switch_div_data('data_operation')">ข้อมูลหน่วยปฏิบัติการ</span>
                </div>
            </div>

            <div class="sticky" style="overflow: auto;height: 100%;">
                <div id="div_case_detail" class="card radius-10 p-3 fade-slide" style="display: block;">
                    <h4><b>รายละเอียดเคส</b></h4>
                    {{-- <div class="div" style="background-color:rgba(228, 49, 49, 0.5); padding:5px; border-radius:5px;)"> --}}
                        <span class="h6 d-block " >
                            วันที่แจ้งเหตุ : <b id="u_phone" class="font-weight-bold">{{$date_month->date ? $date_month->date : "--"}}  {{$date_month->month ? $date_month->month : "--"}}</b>
                        </span>
                        <span class="h6 d-block " >
                            ชื่อผู้แจ้ง : <b id="u_name_user" class="font-weight-bold">{{$data->yellows_name_user ? $data->yellows_name_user : "-"}}</b>
                        </span>
                        <span class="h6 d-block">
                            เบอร์ : <b id="u_phone" class="font-weight-bold">{{$data->yellows_phone_user ? $data->yellows_phone_user : "-"}}</b>
                        </span>
                        <span class="h6 d-block">
                            ประเภทผู้แจ้งเหตุ : <b id="u_type" class="font-weight-bold">{{ $data->centers_type_reporter ? $data->centers_type_reporter : "-"}}</b>
                        </span>
                    {{-- </div> --}}
                    <hr>

                    {{-- <div class="div" style="background-color:rgba(87, 231, 68, 0.5); padding:5px; border-radius:5px;)"> --}}
                        <h5><b>อาการนำสำคัญ</b></h5>
                        <span class="h6">
                            <b id="u_name_user" class="font-weight-bold">{{$data->yellows_symptom ? $data->yellows_symptom : "--"}}</b>
                        </span>
                    {{-- </div> --}}
                    <hr>
                    {{-- <div class="div" style="background-color:rgba(68, 179, 231, 0.5); padding:5px; border-radius:5px;)"> --}}
                        <h5><b>รายละเอียดอาการ</b></h5>
                        <span class="h6">
                            <b id="u_name_user" class="font-weight-bold">{{$data->yellows_symptom_other ? $data->yellows_symptom_other : "--"}}</b>
                        </span>
                    {{-- </div> --}}
                    <hr>

                    <div class="col-12 row">
                        <div class="col-6 text-center">
                            <button style="min-width: 120px; max-width:150px; border-radius:10px; font-weight: bold;" class=" btn-status {{$color_btn_idc}} px-3">
                                IDC
                                <br>
                                {{ $idc }}
                            </button>
                        </div>
                        <div class="col-6  text-center">
                            <button style="min-width: 120px; max-width:150px; border-radius:10px; font-weight: bold;" class=" btn-status {{$color_btn_rc}} px-3">
                                RC
                                <br>
                                {{ $rc }}
                            </button>
                        </div>
                    </div>
                    <br>

                    <h5><b>เวลาการช่วยเหลือ</b></h5>
                    @if( $data->centers_status != "เสร็จสิ้น" )
                        <h4 id="h4_minutesDiff_sos">
                            @if($minutesDiff < 4)
                                <span class="text-success">
                                <i class="fa-solid fa-timer"></i> ผ่านมาแล้ว {{ $minutesDiff }} นาที
                                </span>
                            @elseif($minutesDiff >= 4 && $minutesDiff < 8)
                                <span style="color:#FF6000;">
                                <i class="fa-solid fa-triangle-exclamation fa-beat"></i> ผ่านมาแล้ว {{ $minutesDiff }} นาที
                                </span>
                            @elseif($minutesDiff >= 8)
                                <span class="text-danger">
                                <i class="fa-solid fa-triangle-exclamation fa-shake"></i> ผ่านมาแล้ว {{ $minutesDiff }} นาที
                                </span>
                            @endif
                        </h4>
                    @else
                        <h4 class="text-success">การช่วยเหลือเสร็จสิ้นแล้ว</h4>
                    @endif

                </div>

                <div id="div_data_operating" class="card radius-10 p-3 " style="display: none;">
                    <!-- div_data_operating -->
                    <h4>
                        <b>ข้อมูลหน่วยปฏิบัติการ</b>
                    </h4>
                    <span>
                        ชื่อหน่วย
                    </span>
                    <h5>
                        <u id="data_name_operating_unit">{{ isset($data->centers_organization_helper) ? $data->centers_organization_helper : '-'}}</u>
                    </h5>
                    <span class="mt-2">
                        พื้นที่ (สังกัด)
                    </span>
                    <h5>
                        <u id="data_area_operating_unit">{{ isset($data_officer->operating_unit->area) ? $data_officer->operating_unit->area : '-'}}</u>
                    </h5>
                    <hr>
                    <h5><b>ข้อมูลเจ้าหน้าที่</b></h5>
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                @php

                                $color_btn_level = 'info' ;

                                if(!empty($data_officer->level)){
                                    switch($data_officer->level){
                                        case 'FR':
                                            $color_btn_level = 'success' ;
                                        break;
                                        case 'BLS':
                                            $color_btn_level = 'warning' ;
                                        break;
                                        case 'ILS':
                                            $color_btn_level = 'danger' ;
                                        break;
                                        case 'ALS':
                                            $color_btn_level = 'danger' ;
                                        break;
                                    }
                                }

                            @endphp
                                <!-- //// PHP //// -->
                                <div id="data_officers_by_php" class="p-4 border radius-15 row">
                                    <div class="col-12">
                                        <br>
                                        <span style="position:absolute;top: 6%;left: 1%;border-radius: 0px 10px 10px 0px; width:45%;" class="btn-sm btn-info main-shadow main-radius float-start">
                                            @if(!empty($data_officer->vehicle_type))
                                                <b>{{ $data_officer->vehicle_type }}</b>
                                            @else
                                                ...
                                            @endif
                                        </span>
                                        <span style="position:absolute;top: 6%;right: 1%;border-radius: 10px 0px 0px 10px; width:45%;" class="btn-sm btn-{{ $color_btn_level }} main-shadow main-radius float-end">
                                            @if(!empty($data_officer->level))
                                                <b>{{ $data_officer->level }}</b>
                                            @else
                                                ...
                                            @endif
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        @if(!empty($data_officer->user->photo))
                                            <img src="{{ url('storage')}}/{{ $data_officer->user->photo }}" width="80" height="80" class="rounded-circle shadow">
                                        @else
                                            <img src="{{ url('/img/stickerline/Flex/12.png') }}" width="80" height="80"  class="rounded-circle shadow">
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        @if(!empty($data_officer->user->name))
                                            <h5 class="m-0">{{ $data_officer->user->name }}</h5>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        @if(!empty($data_officer->user->sub_organization))
                                            <p>{{ str_replace("_"," ",$data_officer->user->sub_organization) }}</p>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center col-12 p-0">
                                        @if(!empty($data_officer->user->phone))
                                            <a href="tel:{{ $data_officer->user->phone }}" style="width:90%;" class="btn btn-outline-success radius-15">
                                                <i class="fa-solid fa-phone"></i> {{ $data_officer->user->phone }}
                                            </a>
                                        @else
                                            <br>ไม่ได้ระบุ
                                        @endif
                                    </div>


                                </div>
                                <!-- //// END PHP //// -->

                                <!-- //// JAVA SCRIPT //// -->
                                <div id="data_officers_by_js" class="p-4 border radius-15 row d-none">

                                    <div class="col-12">
                                        <br>
                                        <span id="data_vehicle_type_operating_unit" style="position:absolute;top: 6%;left: 1%;border-radius: 0px 10px 10px 0px; width:45%;" class="btn-sm btn-info main-shadow main-radius float-start font-weight-bold">
                                            <!--  -->
                                        </span>
                                        <span id="data_level_operating_unit" style="position:absolute;top: 6%;right: 1%;border-radius: 10px 0px 0px 10px; width:45%;" class="btn-sm main-shadow main-radius float-end font-weight-bold">
                                            <!--  -->
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        <img id="data_img_officers" src="http://localhost/Collect-all-cars/public/img/stickerline/Flex/12.png" width="80" height="80" class="rounded-circle shadow">
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        <h5 class="m-0" id="data_name_officers"></h5>
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        <p id="data_sub_organization_officers"></p>
                                    </div>
                                    <div class="d-flex justify-content-center col-12 p-0">
                                        <a id="data_phone_officers" href="" style="width:90%;" class="btn btn-outline-success radius-15">
                                            <i class="fa-solid fa-phone"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- //// END JAVA SCRIPT //// -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-9 col-lg-9" style="">
            <div class="card radius-10 p-3">
                <div class="row">
                    <div class="col-12">
                        @php
                            if($data->centers_status != 'เสร็จสิ้น'){
                                $class_span_status = 'float-end' ;
                            }else{
                                $class_span_status = 'float-start' ;
                            }
                        @endphp
                        <div class="row">
                            <h4>
                                <span class="{{ $class_span_status }}">
                                    สถานะหน่วยปฏิบัติการ :  <b><span id="show_status" class=""></span></b>
                                    <span id="show_remark_status" class="d-none text-secondary">(<span id="text_remark_status"></span>)</span>
                                </span>

                                @if($data->centers_status != 'เสร็จสิ้น')
                                    <span id="text_duration" class="text-warning"></span> (<span id="show_distance" ></span>) ● <span id="text_arrivalTime"></span>
                                @endif

                            </h4>
                        </div>
                    </div>
                    <style>
                        .div-map{
                            position: relative;
                        }
                    </style>
                    <div class="card radius-10 p-3 fade-slide" id="div_detail_sos">
                        <div class="div-map">
                            <div class="col w-100 p-0 m-0">
                                <span class="btn btn-sm btn-danger" style="position: absolute;top: 0.5rem;left: 13rem;z-index: 2;height: 2.8rem;display: flex; align-items: center;" data-toggle="modal" data-target="#see_img_sos">
                                <i class="fa-duotone fa-images"></i>รูปภาพ
                                </span>
                            </div>
                            <div id="map_operating_hospital" style="position: relative; overflow: hidden; background-color: transparent;"></div>
                        </div>
                    </div>

                    {{-- <div class="col-12" style="position: relative;">

                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Image -->
    <div class="modal fade" id="see_img_sos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รูปภาพการขอความช่วยเหลือ</h5>
                    <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <div class="row mt-1">
                        <div class="col-12 col-md-6 col-lg-4">

                            <div class="masonry_block">
                                <div class="masonry-folio">
                                    <div class="masonry_thum">

                                        @if( !empty($data->centers_photo_sos))
                                            <img src="{{ url('storage')}}/{{ $data->centers_photo_sos }}" class="img-fluid" alt="image" / >
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos }}" class="glightbox" data-gallery="edu-gallery"></a>
                                        @else
                                            <img src="https://www.viicheck.com/img/stickerline/PNG/17.png" class="img-fluid" alt="image" / >
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery"></a>
                                        @endif

                                        @if( !empty($data->centers_photo_sos_by_officers))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos_by_officers }}" class="glightbox" data-gallery="edu-gallery"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery"></a>
                                        @endif

                                        @if( !empty($data->centers_photo_succeed))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_succeed }}" class="glightbox" data-gallery="edu-gallery"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery"></a>
                                        @endif

                                    </div>

                                    <div class="masonry_text">
                                        @if( !empty($data->centers_photo_sos))
                                            <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                            <p class="masonry_cat">เพิ่มโดย {{ $data->yellows_name_user }}</p>
                                        @else
                                            <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                            <p class="masonry_cat">ผู้ใช้ไม่ได้เพิ่มรูปภาพ</p>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end masonry_block -->

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="masonry_block">
                                <div class="masonry-folio">
                                    <div class="masonry_thum">

                                        @if( !empty($data->centers_photo_sos_by_officers))
                                            <img src="{{ url('storage')}}/{{ $data->centers_photo_sos_by_officers }}" class="img-fluid" alt="image" />

                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos_by_officers }}" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @else
                                            <img src="https://www.viicheck.com/img/stickerline/PNG/49.png" class="img-fluid" alt="image" / >

                                            <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @endif

                                        @if( !empty($data->centers_photo_sos))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos }}" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @endif

                                        @if( !empty($data->centers_photo_succeed))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_succeed }}" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery2"></a>
                                        @endif

                                        <style>
                                            .comment-sos{
                                                padding: .5rem;
                                                background-color:#30344c ;
                                                color: #909ce4;
                                            }
                                        </style>
                                        @if( !empty($data->centers_remark_photo_sos) )
                                            <div class="comment-sos">
                                                <strong>คำแนะนำขณะเกิดเหตุ</strong>
                                                <p class="p-0 m-0">{{$data->centers_remark_photo_sos}}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="masonry_text">
                                        @if( !empty($data->centers_photo_sos_by_officers) )
                                            <h3 class="masonry_title">รูปภาพที่เกิดเหตุ</h3>
                                            <p class="masonry_cat">เพิ่มโดย {{ $data->centers_name_helper }}</p>
                                        @else
                                            <h3 class="masonry_title">รูปภาพที่เกิดเหตุ</h3>
                                            <p class="masonry_cat">เจ้าหน้าที่ไม่ได้เพิ่มรูปภาพ</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end masonry_block -->
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="masonry_block">
                                <div class="masonry-folio">
                                    <div class="masonry_thum">
                                        @if( !empty($data->centers_photo_succeed))
                                            <img src="{{ url('storage')}}/{{ $data->centers_photo_succeed }}" class="img-fluid" alt="image" />

                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_succeed }}" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @else
                                            <img src="https://www.viicheck.com/img/stickerline/PNG/49.png" class="img-fluid" alt="image" / >

                                            <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @endif

                                        @if( !empty($data->centers_photo_sos_by_officers))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos_by_officers }}" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @endif


                                        @if( !empty($data->centers_photo_sos))
                                            <a href="{{ url('storage')}}/{{ $data->centers_photo_sos }}" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @else
                                            <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery3"></a>
                                        @endif
                                    </div>

                                    <div class="masonry_text">
                                        @if( !empty($data->centers_photo_succeed) )
                                            <h3 class="masonry_title">รูปภาพเสร็จสิ้น</h3>
                                            <p class="masonry_cat">เพิ่มโดย {{ $data->name_helper }}</p>
                                        @else
                                            <h3 class="masonry_title">รูปภาพเสร็จสิ้น</h3>
                                            <p class="masonry_cat">เจ้าหน้าที่ไม่ได้เพิ่มรูปภาพ</p>
                                        @endif
                                    </div>

                                    @if(!empty($data->centers_remark_helper) )
                                        <div class="comment-sos">
                                            <strong>ข้อเสนอแนะจากเจ้าหน้าที่</strong>
                                            <p class="p-0 m-0">{{$data->centers_remark_helper}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- end masonry_block -->
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


<!-- Google Map -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script> --}}
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        map_hospital();
        timer_minutesDiff_sos();
    })
    const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
    var Active_reface_map_operating_hospital ;
    var map_operating_hospital ;
    var officer_go_to_help_marker;
    var sos_go_to_help_marker  ;
    var directionsDisplay_go_to_help ;
    var service_go_to_help ;
    function map_hospital() {
        // console.log("map_hospital");
        open_map_operating_hospital();

        fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + '{{$data->sos_help_center_id}}' )
        .then(response => response.json())
        .then(start_result => {
            // console.log("start_result");
            // console.log(start_result);


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

            if (start_result['status_sos'] != 'เสร็จสิ้น') {

                set_marker_go_to_help(start_result['officer_lat'] , start_result['officer_lng'] , start_result['officer_level']);

                // เส้นทาง
                get_Directions_map_go_to_help(officer_go_to_help_marker,sos_go_to_help_marker);

                let start_Item_1 = new google.maps.LatLng('{{ $data->lat_centers }}', '{{ $data->lng_centers }}');
                let start_myPlace = new google.maps.LatLng(start_result['officer_lat'], start_result['officer_lng']);

                let start_bounds = new google.maps.LatLngBounds();
                    start_bounds.extend(start_myPlace);
                    start_bounds.extend(start_Item_1);
                    map_operating_hospital.fitBounds(start_bounds);

                // document.querySelector('#span_btn_steps_travel').classList.remove('d-none');

            }


        });

        // LOOP ---------------------------------------------------------------------------------------

        reface_map_operating_hospital = setInterval(() => {

            fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + '{{$data->sos_help_center_id}}' )
            .then(response => response.json())
            .then(start_result => {
                // console.log("start_result");
                // console.log(start_result);


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

                if (start_result['status_sos'] != 'เสร็จสิ้น') {
                    set_marker_go_to_help(start_result['officer_lat'] , start_result['officer_lng'] , start_result['officer_level']);
                    // เส้นทาง
                    get_Directions_map_go_to_help(officer_go_to_help_marker,sos_go_to_help_marker);

                    let start_Item_1 = new google.maps.LatLng('{{ $data->lat_centers }}', '{{ $data->lng_centers }}');
                    let start_myPlace = new google.maps.LatLng(start_result['officer_lat'], start_result['officer_lng']);

                    let start_bounds = new google.maps.LatLngBounds();
                        start_bounds.extend(start_myPlace);
                        start_bounds.extend(start_Item_1);
                        map_operating_hospital.fitBounds(start_bounds);

                    // document.querySelector('#span_btn_steps_travel').classList.remove('d-none');

                }else{
                    myStop_reface_map_operating_hospital()
                }


            });
        }, 10000);
    }

    function myStop_reface_map_operating_hospital() {
        clearInterval(reface_map_operating_hospital);
        // console.log("STOP LOOP");
    }

    function set_marker_go_to_help(officer_lat , officer_lng , officer_level){
        let icon_level ;
        // console.log("set_marker_go_to_help");

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
            map: map_operating_hospital,
            icon: icon_level,
        });

    }

    function open_map_operating_hospital(){
        // console.log("open_map_operating_hospital");
        let m_lat = parseFloat("{{ $data->lat_centers }}");
        let m_lng = parseFloat("{{ $data->lng_centers }}");
        // console.log(parseFloat(m_lat));
        // console.log(parseFloat(m_lng));
        let m_numZoom = parseFloat('17');

        map_operating_hospital = new google.maps.Map(document.getElementById("map_operating_hospital"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (m_lat && m_lng) {
            if (sos_go_to_help_marker) {
                sos_go_to_help_marker.setMap(null);
            }

            sos_go_to_help_marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map_operating_hospital,
                icon: image_sos,
            });
        }
    }

    function get_Directions_map_go_to_help(markerA, markerB) {

        // console.log('get_Directions');

        if (directionsDisplay_go_to_help) {
            directionsDisplay_go_to_help.setMap(null);
        }

        service_go_to_help = new google.maps.DirectionsService();
        directionsDisplay_go_to_help = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map_operating_hospital,
            suppressMarkers: true, // suppress the default markers
        });

        service_go_to_help.route({
            origin: markerA.getPosition(),
            destination: markerB.getPosition(),
            travelMode: 'DRIVING',
        }, function(response, status) {
            // console.log(response);
            if (status === 'OK') {
                directionsDisplay_go_to_help.setDirections(response);
                // ระยะทาง
                let text_distance = response.routes[0].legs[0].distance.text;
                document.querySelector('#show_distance').innerHTML = text_distance;
                // เวลา
                let text_duration = response.routes[0].legs[0].duration.text ;
                document.querySelector('#text_duration').innerHTML = text_duration ;
                // เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner

                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value) ;
                document.querySelector('#text_arrivalTime').innerHTML = text_arrivalTime ;

                // แนะนำการเดินทาง
                // let div_steps_travel = document.querySelector('#div_steps_travel');
                //     div_steps_travel.innerHTML = '' ;

                // var steps_travel = response.routes[0].legs[0].steps;
                // for (var i = 0; i < steps_travel.length; i++) {

                //     let No_step = i + 1 ; // ข้อที่
                //     let distance_step = steps_travel[i].distance.text ; // ระยะทางก่อนเปลี่ยน
                //     let instructions_step = steps_travel[i].instructions ; // คำอธิบาย
                //     let maneuver = steps_travel[i].maneuver;


                //     // console.log(i + "-" + steps_travel[i].maneuver);

                //     if (maneuver) {
                //         maneuver = steps_travel[i].maneuver ; // วิธีเปลี่ยนเส้นทาง
                //     }else{
                //         if (instructions_step.includes("มุ่งหน้าทาง") || instructions_step.includes("ขับต่อไป")){
                //             maneuver = "straight" ;
                //         }
                //         if (instructions_step.includes("ขวาหักศอก")){
                //             maneuver = "sharp-right-turn" ;
                //         }

                //         if (instructions_step.includes("หักศอก")){
                //             if (instructions_step.includes("ซ้าย")){
                //                 maneuver = "sharp-left-turn" ;
                //             }
                //             if (instructions_step.includes("ขวา")){
                //                 maneuver = "sharp-right-turn" ;
                //             }
                //         }

                //         if (instructions_step.includes("เบี่ยง")){

                //             if (instructions_step.includes("ซ้าย")){
                //                 maneuver = "deviate-left" ;
                //             }
                //             if (instructions_step.includes("ขวา")){
                //                 maneuver = "deviate-right" ;
                //             }
                //         }

                //         if (instructions_step.includes("ตัดเข้าไปยัง")){
                //             maneuver = "merge" ;
                //         }

                //     }



                //     let steps_travel_html =
                //     '<div class="row gg-travel-guide">'+
                //         '<div class=" gg-travel-guide-img">'+
                //             '<img src="{{ url("/") }}/img/traffic sign/' + maneuver + '.png" width="70" height="70" >'+
                //         '</div>'+
                //         '<div class="gg-travel-guide-text">' +
                //         '<div>' + instructions_step + '</div>' +
                //         '</div>'+
                //         '<div class="d-flex justify-content-end py-3">'+
                //         '    <div class="gg-travel-guide-bottom">'+
                //         '        <span>' + distance_step + '</span>'+
                //         '    </div>'+
                //         '</div>'+
                //     '</div>';
                //     // let steps_travel_html =
                //     //     '<div class="col-2">'+
                //     //         maneuver +
                //     //     '</div>'+
                //     //     '<div class="col-8">'+
                //     //         instructions_step +
                //     //     '</div>'+
                //     //     '<div class="col-2">'+
                //     //         instructions_step +
                //     //     '</div>'+
                //     //     '<hr>'
                //     // ;

                //     div_steps_travel.insertAdjacentHTML('beforeend', steps_travel_html); // แทรกล่างสุด
                // }
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });

    }

    function func_arrivalTime(duration){
        // assuming you have already obtained the duration from Google Maps API and stored it in a variable called `duration`
        let date_now = new Date(); // get the current time
        let travelTimeInSeconds = duration; // get the travel time in seconds
        let arrivalTime = new Date(date_now.getTime() + (travelTimeInSeconds * 1000)); // add the travel time to the current time and create a new date object
        // let formattedTime = arrivalTime.toLocaleTimeString(); // format the arrival time as a string in a readable format
        let options = { hourCycle: 'h24' };
        let formattedTime = arrivalTime.toLocaleTimeString('th-TH', options);
            let timeWithoutSeconds = formattedTime.slice(0, -3); // ตัดวินาทีออก
            let timeWithSuffix = `${timeWithoutSeconds} น.`; // เติม "น." เข้าไป

        return timeWithSuffix ;
    }

    function switch_div_data(type){

        let div_case_detail = document.getElementById('div_case_detail');
        let div_data_operating = document.getElementById('div_data_operating');

        let title_case_detail = document.getElementById('title_case_detail');
        let title_data_operation = document.getElementById('title_data_operation');
        if (type == "case_detail") {
            title_case_detail.setAttribute('class','btn btn-primary');
            title_data_operation.setAttribute('class','btn btn-outline-primary');

            div_case_detail.classList.remove('fade-out');
            div_case_detail.classList.add('fade-in');
            div_case_detail.style.display = 'block';

            div_data_operating.classList.remove('fade-in');
            div_data_operating.classList.add('fade-out');
            div_data_operating.style.display = 'none';
        } else {
            title_data_operation.setAttribute('class','btn btn-primary');
            title_case_detail.setAttribute('class','btn btn-outline-primary');

            div_case_detail.classList.remove('fade-in');
            div_case_detail.classList.add('fade-out');
            div_case_detail.style.display = 'none';

            div_data_operating.classList.remove('fade-out');
            div_data_operating.classList.add('fade-in');
            div_data_operating.style.display = 'block';
        }
    }

    function timer_minutesDiff_sos(){
        // console.log(">>> timer_minutesDiff_sos <<<");
        timer_minutesDiff = setInterval(function () {
            let timeString = "{{ $data->centers_time_create_sos }}"; // ตัวอย่างของเวลาที่กำหนด
            // สร้าง Date object จากเวลาที่กำหนด
            let specifiedTime = new Date(timeString);
            // สร้าง Date object สำหรับเวลาปัจจุบัน
            let currentTime = new Date();
            // คำนวณความแตกต่าง
            let interval = currentTime - specifiedTime;
            // แปลงความแตกต่างเป็นนาที
            let minutesDiff = Math.floor(interval / 60000);
            // แสดงผล
            // console.log("ระยะห่างเป็นนาที: " + minutesDiff);

            let text_html = '' ;

            if(minutesDiff < 4){
            text_html = `
                <span class="text-success">
                    <i class="fa-solid fa-timer"></i> ผ่านมาแล้ว `+minutesDiff+` นาที
                    </span>
                `;
            }else if(minutesDiff >= 4 && minutesDiff < 8){
            text_html = `
                <span style="color:#FF6000;">
                    <i class="fa-solid fa-triangle-exclamation fa-beat"></i> ผ่านมาแล้ว `+minutesDiff+` นาที
                </span>
                `;
            }else if(minutesDiff >= 8){
            text_html = `
                <span class="text-danger">
                    <i class="fa-solid fa-triangle-exclamation fa-shake"></i> ผ่านมาแล้ว `+minutesDiff+` นาที
                </span>
                `;
            }

            document.querySelector('#h4_minutesDiff_sos').innerHTML = text_html;

        }, 60000);
    }

</script>

@endsection
