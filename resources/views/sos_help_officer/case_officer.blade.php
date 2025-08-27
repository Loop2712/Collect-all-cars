@extends('layouts.viicheck_for_officer')

@section('content')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;
    }

    html,
    body {
        background-color: #f5f7fd !important;
    }

    .badge {
        display: inline-block;
        padding: .35em .65em;
        font-size: .75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem
    }

    .badge:empty {
        display: none
    }

    .btn .badge {
        position: relative;
        top: -1px
    }

    .separater-section span {
        position: relative;
        top: 26px;
        margin-top: -10px;
        background: #ffffff;
        padding: 5px;
        font-size: 12px;
        color: #cbcbcb;
        z-index: 1;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25
    }

    .object-fit-cover {
        object-fit: cover !important;
        width: 100px;
        height: 110px;

    }

    @media (width > 381px) {
        .badge-status-case {
            position: absolute;
            right: 10;
            top: 10;
        }
    }

    @media (width < 381px) {
        .badge-status-case {
            position: relative;
            margin-top: 5px;
            /* float: right; */
            /* width: 100%; */
        }
    }

    .group-data-case {
        display: flex;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
        border-radius: .25rem
    }

    .data-case-group-flush {
        border-radius: 0
    }

    .data-case-group-flush>.list-data-case-item {
        border-width: 0 0 1px
    }

    .data-case-group-flush>.list-data-case-item:last-child {
        border-bottom-width: 0
    }

    .list-data-case-item {
        position: relative;
        display: block;
        padding: .5rem 1rem;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, .125);
    }

    .list-data-case-item+.list-data-case-item {
        border-top-width: 0
    }
</style>
<div class="w-100 h-100" style=" background-color: #f5f7fd !important;">

    <style>
        .item {
            align-items: center;
            color: white;
            display: flex;
            justify-content: center;
        }

        .owl-nav {
            margin-top: 0;
            margin-bottom: -20px;
        }

        .owl-prev,
        .owl-next {
            width: 30px;
            outline: #cbcbcb solid 1px;
        }
    </style>
    <div class="container py-2">
        <h2 class="font-weight-light text-center text-muted py-3">การช่วยเหลือของ <br>{{$name_officer}}</h2>
        <!-- timeline item 1 -->
        @foreach($data_help_officer as $item)
        <div class="row">
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill @if(!empty($item->time_sos_success)) bg-success @else bg-light border @endif ">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-11 w-100 my-2">
                <div class="card @if(!empty($item->time_sos_success)) border-success @endif shadow radius-15">
                    <div class="card-body">
                        <div class="float-end @if(!empty($item->time_sos_success)) text-success @endif"></div>
                        <div class="card-title mb-0 @if(!empty($item->time_sos_success)) text-success @endif">
                            <h4 class="m-0">{{$item->operating_code}}</h4>
                            <small class="font-5">{{ thaidate("lที่ j F Y H:i" , strtotime($item->created_at)) }}</small>
                        </div>
                        <span class="mb-1 badge @if($item->status != 'เสร็จสิ้น') bg-warning text-dark @else bg-success @endif badge-status-case">สถานะเคส : {{$item->status}}</span>
                        <div class="separater-section text-center m-0"> <span>ข้อมูลเคส</span>
                            <hr>
                        </div>

                        <div class="owl-carousel owl-theme">
                           

                            @php
                            $data = [];
                            $form_color_id = [
                            $item->form_color_id_user_1,
                            $item->form_color_id_user_2,
                            $item->form_color_id_user_3,
                            ];

                            foreach ($form_color_id as $form_color_id_user) {
                            if (!empty($form_color_id_user)) {
                            switch ($item->form_color_name) {
                            case "green":
                            $data[] = \App\Models\Sos_1669_form_green::where(['id' => $form_color_id_user])->first();
                            break;
                            case "pink":
                            $data[] = \App\Models\Sos_1669_form_pink::where(['id' => $form_color_id_user])->first();
                            break;
                            case "blue":
                            $data[] = \App\Models\Sos_1669_form_blue::where(['id' => $form_color_id_user])->first();
                            break;
                            }
                            }
                            }
                            @endphp

                            @foreach ($data as $item)

                            @if ($item)
                            <div class="card-body py-0">
                                <div class="">
                                    <div class="d-flex">
                                        @if (!empty($item->photo_user))
                                        <img src="{{ asset('/storage').'/' }}{{ $item->photo_user}}" alt="user" class="m-2 rounded p-1 bg-primary object-fit-cover" style="width: 100px; margin-left:0">
                                        @else
                                        <img src="{{ asset('/img/icon/user_white.png') }}" alt="user" class="my-2 rounded p-1 bg-primary object-fit-cover" style="width: 100px; margin-right:10px">
                                        @endif

                                        <div class="mt-2">
                                            <h4 class="text-dark">
                                                {{ isset($item->form_yellow->{"patient_name_" . $loop->iteration}) ? $item->form_yellow->{"patient_name_" . $loop->iteration} : 'ไม่ระบุชื่อ'}}
                                            </h4>
                                            @php
                                            $badge_idc = "bg-primary";
                                            $badge_rc = "bg-primary";

                                            if( !empty($item->form_yellow->idc) ){
                                            if( $item->form_yellow->idc == 'แดง(วิกฤติ)' ){
                                            $badge_idc = "bg-danger";
                                            }else if ( $item->form_yellow->idc == 'เหลือง(เร่งด่วน)' ){
                                            $badge_idc = "bg-warning text-dark";
                                            }else if ( $item->form_yellow->idc == 'เขียว(ไม่รุนแรง)' ){
                                            $badge_idc = "bg-success";
                                            }else if ( $item->form_yellow->idc == 'ขาว(ทั่วไป)' ){
                                            $badge_idc = "bg-primary";
                                            }else if ( $item->form_yellow->idc == 'ดำ(รับบริการสาธารณสุขอื่น)' ){
                                            $badge_idc = "bg-dark";
                                            }
                                            }

                                            if( !empty($item->form_yellow->rc) ){
                                            if( $item->form_yellow->rc == 'แดง(วิกฤติ)' ){
                                            $badge_rc = "bg-danger";
                                            }else if ( $item->form_yellow->rc == 'เหลือง(เร่งด่วน)' ){
                                            $badge_rc = "bg-warning text-dark";
                                            }else if ( $item->form_yellow->rc == 'เขียว(ไม่รุนแรง)' ){
                                            $badge_rc = "bg-success";
                                            }else if ( $item->form_yellow->rc == 'ขาว(ทั่วไป)' ){
                                            $badge_rc = "bg-primary";
                                            }else if ( $item->form_yellow->rc == 'ดำ(รับบริการสาธารณสุขอื่น)' ){
                                            $badge_rc = "bg-dark";
                                            }
                                            }

                                            $totalData = 15;

                                            $nonEmptyDataCount = 0; // ตัวแปรนับจำนวนข้อมูลที่ไม่ว่างเปล่า

                                            $number_form = null;

                                            if ($item->sos_help_center->form_color_id_user_1 == $item->id) {
                                            $number_form = '1';
                                            } elseif ($item->sos_help_center->form_color_id_user_2 == $item->id) {
                                            $number_form = '2';
                                            } elseif ($item->sos_help_center->form_color_id_user_3 == $item->id) {
                                            $number_form = '3';
                                            }


                                            $fieldsToCheck = [
                                            'name_title',
                                            'patient_name_'.$number_form,
                                            'patient_vn_'.$number_form,
                                            'delivered_hospital_'.$number_form,
                                            'patient_hn_'.$number_form,
                                            'treatment_rights',
                                            'er',
                                            'admitted',
                                            'time_create_sos',
                                            'time_command',
                                            'time_go_to_help',
                                            'time_to_the_scene',
                                            'time_leave_the_scene',
                                            'time_hospital',
                                            'time_to_the_operating_base',
                                            ];

                                            foreach ($fieldsToCheck as $field) {
                                            if (!empty($item->$field) || !empty($item->form_yellow->$field)) {
                                            $nonEmptyDataCount++;
                                            }
                                            }

                                            $percentage = round($nonEmptyDataCount / $totalData * 100);
                                            @endphp
                                            <div class="text-secondary mb-1">
                                                <span class="badge {{$badge_idc}} mb-1">IDC:{{$item->form_yellow->idc}}</span>
                                                <span class="badge {{$badge_rc}} mb-1">RC:{{$item->form_yellow->rc}}</span>

                                            </div>
                                            <p class="text-muted font-size-sm">{{isset($item->symptom_other) ? $item->symptom_other : $item->symptom}}</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-target="#t2_details_{{$item->sos_help_center_id}}" data-bs-toggle="collapse">ข้อมูลอื่นๆ ▼</button>

                                <a href="{{ url('/officer_edit_form/' . $item->sos_help_center_id . '/?color_form_id=' . $item->id) }}" class="btn btn-sm btn-outline-success float-end ml-2" type="button">แก้ไข/ยืนยัน ผู้ป่วย {{$number_form}}</a>

                                @if($percentage !== 0)
                                <div class="progress my-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                                </div>
                                @endif
                            </div>
                            @endif
                            @endforeach

                        </div>
                        <div class="collapse  " id="t2_details_{{$item->sos_help_center_id}}">
                            <h5 class="mt-2 text-center text-secondary">การดำเนินการ : {{$item->form_yellow->sub_treatment}}</h5>
                            <ul class="group-data-case data-case-group-flush">
                                @if(!empty($item->form_yellow->time_create_sos))
                                <li class="list-data-case-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0 text-seconda"><b>ออกจากฐาน</b> </h6>
                                    <span class="text-secondary float-end">
                                        <span class="float-end">เวลา <b>{{ thaidate("H:i" , strtotime($item->form_yellow->time_create_sos))}}</b></span><br>
                                        <span class="float-end"> เลขกม. <b>{{ number_format($item->form_yellow->km_create_sos_to_go_to_help)}}</b></span>
                                    </span>
                                </li>
                                @endif

                                @if(!empty($item->form_yellow->time_to_the_scene))
                                <li class="list-data-case-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0 text-seconda"><b>ถึงที่เกิดเหตุ</b></h6>
                                    <span class="text-secondary">
                                        <span class="float-end">
                                            เวลา <b>{{ thaidate("H:i" , strtotime($item->form_yellow->time_to_the_scene))}}</b>
                                        </span> <br>
                                        <span class="float-end">
                                            เลขกม. <b>{{ number_format($item->form_yellow->km_to_the_scene_to_leave_the_scene)}}</b>
                                        </span>
                                    </span>
                                </li>
                                @endif


                                @if(!empty($item->form_yellow->time_leave_the_scene))
                                <li class="list-data-case-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0 text-seconda"><b>ออกจากที่เกิดเหตุ</b></h6>
                                    <span class="text-secondary float-end">
                                        เวลา <b>{{ thaidate("H:i" , strtotime($item->form_yellow->time_leave_the_scene))}}</b><br>
                                    </span>
                                </li>
                                @endif

                                @if(!empty($item->form_yellow->time_hospital))
                                <li class="list-data-case-item d-flex justify-content-between    ntent-between align-items-center flex-wrap">
                                    <h6 class="mb-0 text-seconda"><b>ถึงรพ.</b></h6>
                                    <span class="text-secondary">
                                        <span class="float-end">
                                            เวลา <b>{{ thaidate("H:i" , strtotime($item->form_yellow->time_hospital))}}</b>
                                        </span><br>
                                        <span class="float-end">
                                            เลขกม. <b>{{ number_format($item->form_yellow->km_hospital)}}</b>
                                        </span>
                                    </span>
                                </li>
                                @endif

                                @if(!empty($item->time_to_the_operating_base))
                                <li class="list-data-case-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0 text-seconda"><b>ถึงฐาน</b></h6>
                                    <span class="text-secondary">
                                        <span class="float-end">
                                            เวลา <b>{{ thaidate("H:i" , strtotime($item->time_to_the_operating_base))}}</b>
                                        </span> <br>
                                        <span class="float-end">
                                            เลขกม. <b>{{ number_format($item->form_yellow->km_operating_base)}}</b>
                                        </span>
                                    </span>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endforeach
    </div>
</div>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'>
<link rel="stylesheet" href="./style.css">


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        dots: true,
        nav: true,
        items: 1,
    })
</script>
@endsection