@extends('layouts.viicheck_for_officer')

@section('content')
@php
    if ($data_form->form_color_id_user_1 == $data_form->id){
        $idPatient = 1;
    }elseif ($data_form->form_color_id_user_2 == $data_form->id){
        $idPatient = 2;
    }elseif ($data_form->form_color_id_user_3 == $data_form->id){
        $idPatient = 3;
    }
@endphp
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" /> -->
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;
    }

    .container-form {
        background-color: #84e7fe !important;
        padding: 1rem;
        min-height: 100% !important;
        border-radius: 5px;
    }

    .menu-form {
        display: flex;
        /* justify-content: center; */
        overflow-x: auto;
        width: 100%;
        gap: 1rem;
        padding: 1rem;
    }

    .menu-form button {
        display: block;
        width: auto;
        white-space: nowrap;
        border-radius: 10px;
        padding: .5rem;
        transition: all .15s ease-in-out;
    }

    @media (width <=1200px) {
        .menu-form {}
    }

    @media (width > 1200px) {
        .menu-form {
            justify-content: center;
        }
    }

    .menu-content {
        display: none;
    }

    #content1 {
        display: block;
    }

    .card-input-element {
        margin-top: 0;
    }

    .input-group,
    .input-group input {
        height: calc(10px + 2*1rem);

    }

    .card-input-element+.card {
        height: calc(10px + 2*1rem);
        color: #0d6efd;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid transparent;
        border-radius: 10px;
        outline: 2px solid #0d6efd;

    }

    .card-input-element+.card:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card {
        border: 2px solid #0d6efd;
        color: #fff !important;
        background-color: #0d6efd !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-element:checked+.card::after {
        content: '\e5ca';
        color: #AFB8EA;
        font-family: 'Material Icons';
        font-size: 24px;
        -webkit-animation-name: fadeInCheckbox;
        animation-name: fadeInCheckbox;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-input-red+.card {
        outline: 2px solid #db2d2e !important;
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

    .btn-show-content {
        background-color: #fff;
    }

    .btn-show-content.active {
        background-color: #007bff;
        color: #fff;
    }

    /* label{
        width: 100% !important;
    } */
    .container-form-pink {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .text-female {
        color: #e5518d !important;
    }

    .card-input-female:checked+.card {
        border: 2px solid #e5518d !important;
        color: #fff !important;
        background-color: #e5518d !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;

    }

    .show-data {
        animation: myAnim .5s ease 0s 1 normal forwards;
    }

    @keyframes myAnim {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .select2-selection {
        min-width: 200px;
    }

    .select2-results__options[aria-multiselectable="true"] li {
        padding-left: 30px;
        position: relative
    }

    .select2-results__options[aria-multiselectable="true"] li:before {
        position: absolute;
        left: 8px;
        opacity: .6;
        top: 6px;
        font-family: "FontAwesome";
        content: "\f0c8";
    }

    .select2-results__options[aria-multiselectable="true"] li[aria-selected="true"]:before {
        content: "\f14a";
    }

    .radius-15 {
        border-radius: 15px;
    }

    .form-label {
        font-weight: bold;
    }

    .separater-section span {
        position: relative;
        /* top: 26px; */
        margin: 10px;
        background: #ffffff;
        padding: 5px;
        font-size: 18px;
        color: #000;
        z-index: 1;
        font-weight: bold;

    }

    .separater-section hr {
        margin: .2rem 0;
        position: relative;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25;
        top: -15px;

    }

    .menu-form-sos {
        position: fixed;
        right: 80px;
        bottom: 28px;
        z-index: 9999;
        border-radius: 50px;
        transition: all 0.4s;
        /* outline: #db2d2e 1px solid; */
        background-color: #fff;
        box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .menu-form-sos:hover {
        background: #fff;
        color: #db2d2e;
    }

    .menu-form-sos.show {
        visibility: visible;
        opacity: 1;
    }

    .menu-form-sos.active {
        width: calc(100% - 100px);
    }

    #saveButton {
        min-height: 38px;
        min-width: 64px;
    }

    #saveButton.loading::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border: 2px solid #fff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    .btn-save-data {
        border-radius: 50px;
        padding: 10px 20px;
    }

    .spinner {
        display: inline-block;
        margin: 0 8px;
        border-radius: 50%;
        width: 1.5em;
        height: 1.5em;
        border: .215em solid transparent;
        vertical-align: middle;
        font-size: 16px;
        border-top-color: white;
        animation: spiner 1s cubic-bezier(.55, .15, .45, .85) infinite;
    }

    @keyframes spiner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .v-btn-label-enter-active {
        animation: slide-in-down 260ms cubic-bezier(.0, .0, .2, 1);
    }

    .v-btn-label-leave-active {
        animation: slide-out-down 260ms cubic-bezier(.4, .0, 1, 1);
    }

    .icon-save-btn {
        display: inline-block;

    }

    @keyframes slide-in-down {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }

        50% {
            opacity: .8;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slide-out-down {
        0% {
            transform: translateY(0);
            opacity: 1;
        }

        40% {
            opacity: .2;
        }

        100% {
            transform: translateY(20px);
            opacity: 0;
        }
    }

    .timeline-wrapper {
        position: relative;
    }

    .card-timeline {
        position: relative;
        z-index: 5;
        max-width: 100%;
        margin-bottom: 40px;
        padding: 1rem;
        border-radius: 14px;
        background-color: #fff;
    }


    @media (width <= 768px) {
        .timeline-blue {
            position: absolute;
            left: 10%;
            top: 0%;
            right: auto;
            bottom: 5%;
            width: 6px;
            background-color: #1355ff;

        }

        .sub-card-timeline {
            margin-left: calc(10% + 20px);
        }

        .sub-card-timeline::after {
            left: -27px;
        }
    }

    @media (768px < width < 992px) {
        .timeline-blue {
            position: absolute;
            left: calc(50% - 3px);
            top: 0%;
            right: auto;
            bottom: 5%;
            width: 6px;
            background-color: #1355ff;

        }

        .card-left {
            width: 48%;
            right: calc(0% + 8px) !important;
            position: absolute;
        }

        .card-right {
            width: 48%;
            margin-left: calc(50% + 20px) !important;

        }

        .card-left.sub-card-timeline::after {
            right: -30px;
        }

        .card-right.sub-card-timeline::after {
            left: -30px;
        }
    }

    @media (992px <= width <=1200px) {
        .timeline-blue {
            position: absolute;
            left: calc(50% - 3px);
            top: 0%;
            right: auto;
            bottom: 5%;
            width: 6px;
            background-color: #1355ff;

        }

        .card-left {
            width: 48%;
            right: calc(0% + 8px) !important;
            position: absolute;
        }

        .card-right {
            width: 48%;
            margin-left: calc(50% + 20px) !important;

        }

        .card-left.sub-card-timeline::after {
            right: -34px;
        }

        .card-right.sub-card-timeline::after {
            left: -30px;
        }
    }

    @media (width >=1200px) {
        .timeline-blue {
            position: absolute;
            left: calc(50% - 3px);
            top: 0%;
            right: auto;
            bottom: 5%;
            width: 6px;
            background-color: #1355ff;
        }

        .card-left {
            width: 48%;
            right: calc(0% + 8px) !important;
            position: absolute;
        }

        .card-right {
            width: 48%;
            margin-left: calc(50% + 20px) !important;

        }

        .card-left.sub-card-timeline::after {
            right: -39px;
        }

        .card-right.sub-card-timeline::after {
            left: -30px;
        }
    }

    .card-timeline.end-card {
        margin-bottom: 0px;
    }

    .heading-large {
        margin-bottom: 14px;
        color: #061237;
        font-size: 20px;
        line-height: 32px;
        font-weight: 700;
        letter-spacing: -0.02em;
        display: flex;
        justify-content: space-between;
    }

    .paragraph-standard {
        margin-bottom: 0px;
        color: #67718e;
        font-size: 16px;
        line-height: 32px;
        font-weight: 400;
        letter-spacing: -0.02em;
    }

    .paragraph-standard-ul {
        color: #67718e !important;
    }

    .heading-text {
        margin-bottom: 8px;
        color: #1355ff;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .sub-card-timeline {

        position: relative;
        z-index: 5;
        margin-bottom: 40px;
        padding: 1rem;
        border-radius: 14px;
        background-color: #fff;
    }

    .sub-card-timeline::after {
        content: '';
        display: block;
        position: absolute;
        width: 20px;
        height: 20px;
        top: calc(50% - 10px);
        background: #1355ff;
        box-shadow: 0 0 5px rgba(0, 0, 0, .4);
        border-radius: 15px;
        z-index: 1;
    }
    .persen-success {
        z-index: 9999;
        border-radius: 50px;
        transition: all 0.4s;
        padding: 17px 18px;
        /* outline: #db2d2e 1px solid; */
        background-color: #fabd06;
        box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #28a644 !important;
    }fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        border-radius: 5px;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width: auto;
        padding: 0 10px;
        border-bottom: none;
        background-color: #fff;
        /* position: absolute; */
        margin-top: -12px;
    }.swal2-icon .swal2-icon-content {
        font-size: 1em !important;
    }.header_name{
        max-width: 80%;
        white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
    }
    .btn-delete-document-patient {
        padding: .5em 3em;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        font-family: 'Mitr', sans-serif;
        font-weight: bolder;
        outline: 3px #db2d2e solid ;
        margin-left: 10px;
        color: #db2d2e;
        float: right;
    }

    .btn-delete-document-patient:hover {
        background-color: #db2d2e;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-7px);
    }
    .btn-patient {
        padding: .5em 3em;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        font-family: 'Mitr', sans-serif;
        font-weight: bolder;
        outline: 3px #23c483 solid ;
        margin-left: 10px;
        color: #1ae588;
        display: inline-block;
    }.btn-patient:hover {
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-7px);
    }

    .btn-patient:active , .btn-patient-danger:active{
        transform: translateY(-1px);
    }.btn_verified_status_form {
        position: fixed;
        right: 350px;
        bottom: 28px;
        z-index: 9999;

    }
    @media screen and (max-width: 655px) {
        .btn_verified_status_form {
            position: fixed;
            right: 15px;
            bottom: 100px;
            z-index: 9999;
            /* background-color: #ffff; */
        
        }
        .sideIn{
            animation: sideIn 2s ease 0s 1 normal forwards;
        }

        .sideOut{
            animation: sideOUT 2s ease 0s 1 normal forwards;
        }
    }
    @media screen and (min-width: 656px) {
        .btn_verified_status_form {
            position: fixed;
            right: 350px;
            bottom: 28px;
            z-index: 9999;

        }#btn_hide_menu{
            display: none;
        }
    }
    
    .btn_verified_status_form button{
        border-radius: 50px;
        padding: 17px 18px;
    }

    

    @keyframes sideIn {
        0% {
            transform: translateX(calc(100% - 35px));
        }
        100% {
            transform: translateX(0);
        }
    }

    @keyframes sideOUT {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(100% - 35px));
        }
    }
</style>

<div class="btn_verified_status_form sideIn d-flex">
        <button class="btn mr-2" id="btn_hide_menu" style="background-color: #fff;border-radius: 10px;" onclick="
        document.querySelector('.btn_verified_status_form').classList.toggle('sideIn');
        document.querySelector('.btn_verified_status_form').classList.toggle('sideOut');
        document.querySelector('#icon_hide_menu').classList.toggle('fa-rotate-180');
        ">  
            <i style="transition: all .15s ease-in-out;" id="icon_hide_menu" class="fa-solid fa-chevron-right"></i>
        </button>
        <div class="persen-success btn" id="result_percentage">
        ความครบถ้วน <b><span id="result"></span></b>
    </div>
    <button id="btn_verified_status_form" class="btn btn-success d-none m-0" onclick="checkPercentages('ยืนยัน')">
        ยืนยันข้อมูล
    </button>
    <button id="btn_cancle_status_form" class="btn btn-danger d-none m-0" onclick="checkPercentages('ยกเลิกยืนยัน')">
        ยกเลิกยืนยัน
    </button>
</div>


<div class="menu-form-sos btn">
    <button class="text-primary btn" onclick="changePage(-1)">กลับ</button>
    <button class="btn btn-success btn-save-data" id="saveButton" onclick="saveCurrentPage()">
        <span class="text-save-btn d-non" style="display: inline-block;">ยืนยัน</span>

        <div class="spinner-save-btn d-none">
            <span class="spinner"></span>
        </div>

        <span class="icon-save-btn d-none my-1">
            <i class="fa-solid fa-check"></i>
        </span>
    </button>
    <button class="text-primary btn" onclick="changePage(1)">ต่อไป</button>
</div>
<div class="col-12">
</div>
<div class="container">
    <div class=" my-5 row">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="d-flex justify-content-between">
                <div class="header_name">
                    <span class="h2 header_name m-0">เอกสารผู้ป่วย </span>

                    <span class="h2 header_name m-0" id="header_name_title"> 
                        {{ isset($data_form->name_title) ? $data_form->name_title : ''}}
                    </span>
                    <span class="h2 header_name m-0" id="header_patient_name">
                        {{ isset($data_form->{'patient_name_' . $idPatient}) ? $data_form->{'patient_name_' . $idPatient} : '' }} 
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-end">
            @for($i = 1; $i <= 3; $i++)
                @php
                    $colorFormId = 'form_color_id_user_' . $i;
                    $userId = $data_form->$colorFormId;
                @endphp
                @if(!empty($userId) && $idPatient != $i)
                    <a class="btn-patient" href="{{ url('/officer_edit_form/' . $data_form->sos_help_center_id.'?color_form_id='.$userId) }}">   
                            ผู้ป่วย {{ $i }}
                    </a>    
                    <!-- <button href="{{ url('/officer_edit_form/' . $data_form->sos_help_center_id.'?color_form_id='.$userId) }}" class=" btn-patien">
                        ผู้ป่วย {{ $i }}
                    </button> -->
                @endif

                @if(empty($userId) && ($idPatient == ($i - 1)))
                    <button href="#" class=" btn-patient" onclick="create_and_delete_data_patient('เพิ่ม' , {{$i}})">
                        เพิ่มผู้ป่วย {{ $i }}
                    </button>
                @endif
            @endfor
        </div>
       
    </div>
</div>
<div class="container-form container">
    
@if($idPatient !== 1)
        <button class="btn-delete-document-patient" onclick="create_and_delete_data_patient('ลบ', {{$idPatient}})">
            ลบเอกสารผู้ป่วย
        </button>
    @endif
    

    <script>
        function create_and_delete_data_patient(status,patient_id) {

            let arr_data_patient = {
                "status": status,
                "patient_id": patient_id,
                "sos_id": "{{$data_form->sos_help_center_id}}",
                "form_color_id": "{{$data_form->id}}",
                "form": "blue",
            };

            Swal.fire({
                title: 'ต้องการ'+ status +'ผู้ป่วยคนที่ '+ patient_id + ' ใช่หรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ยืนยัน'
            }).then((result) => {
                if (result.isConfirmed) {
                     // console.log(arr_data_patient)
                fetch("{{ url('/') }}/api/create_and_delete_data_patient", {
                    method: 'post',
                    body: JSON.stringify(arr_data_patient),
                    headers: {
                        "Content-Type": "application/json"
                    }
                }).then(function(response) {
                    return response.json(); // เรียก .json() บน response
                }).then(function(data) {

                    if (data.status === 'เพิ่ม') {
                        // ใช้ data.data ที่ได้รับมาจาก response
                    window.location = `{{ url('/officer_edit_form/' . $data_form->sos_help_center_id) }}?color_form_id=${data.data.id}`;

                    } else if (data.status === 'ลบ') {
                        // ใช้ data.sos_help_center ที่ได้รับมาจาก response
                        // console.log('SOS Help Center:', data.sos_help_center);
                        // console.log('patient_id:', data.patient_id);
                        if (data.patient_id == 3) {
                            if(data.sos_help_center.form_color_id_user_2){
                                window.location = `{{ url('/officer_edit_form/' . $data_form->sos_help_center_id) }}?color_form_id=${data.sos_help_center.form_color_id_user_2}`
                            }else{
                                window.location = `{{ url('/officer_edit_form/' . $data_form->sos_help_center_id) }}?color_form_id=${data.sos_help_center.form_color_id_user_1}`
                            }
                        } else {
                            window.location = `{{ url('/officer_edit_form/' . $data_form->sos_help_center_id) }}?color_form_id=${data.sos_help_center.form_color_id_user_1}`
                        }
                    
                    }
            });

                  
                }
            })

           
        }
    </script>
    <br>
    <h3 class="text-center mt-4"><strong>แบบบันทึกการปฎิบัติงานหน่วยปฎิบัติการการแพทย์ฉุกเฉินระดับพื้นฐาน</strong></h3>

    <div class="w-100 menu-form mt-2" id="menuContainer">
        <button class="btn btn-outline-primary active btn-show-content ">1.หน่วยบริการ</button>
        <button class="btn btn-outline-primary btn-show-content">2.ข้อมูลเวลา</button>
        <button class="btn btn-outline-primary btn-show-content">3.ข้อมูลผู้ป่วย</button>
        <button class="btn btn-outline-primary btn-show-content">4.เกณฑ์การตัดสินใจส่งโรงพยาบาล</button>
        <button class="btn btn-outline-primary btn-show-content">5.การประเมิน/รับรองนำส่ง</button>
        <button class="btn btn-outline-primary btn-show-content">6.ผลการรักษาที่/ในโรงพยาบาล</button>
    </div>
    <form class="form mt-4 ">
        <div id="content1" class="menu-content  p-3">
            <div class="card p-3 radius-15">
                <div class="card-title d-flex align-items-center">
                    <h4 class="card-title">
                        <b>
                            <span class="mb-0 text-primary"> <i class="fa-solid fa-people-group me-1 font-22 text-primary "></i> หน่วยปฏิบัติการ</small> </span>
                        </b>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">ชื่อหน่วยปฏิบัติการ</label>
                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-shield-halved"></i></span>
                            <input type="text" class="form-control border-start-0 radius-2" value="{{ isset($data_form->organization_helper) ? $data_form->organization_helper : ''}}" placeholder="หน่วยปฏิบัติการ" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="created_at" class="form-label">วันที่</label>
                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="dateime" class="form-control border-start-0 radius-2" name="created_at" value="{{ isset($data_form->created_at) ? $data_form->created_at : ''}}" placeholder="วันที่" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="id" class="form-label">ปฏิบัติการที่</label>
                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-memo-pad"></i></span>
                            <input type="text" class="form-control border-start-0 radius-2" value="{{ isset($data_form->operating_code) ? $data_form->operating_code : ''}}" placeholder="ปฏิบัติการที่" readonly>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <label for="data_helper" class="form-label">เจ้าหน้าที่ผู้ให้บริการ</label>
                    </div>
                    <style>
                        .img-helper {
                            border-radius: 10px;
                            width: 80px;
                            object-fit: cover;
                        }

                        .detail-helper {
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            width: 100%;
                        }
                    </style>
                    <!-- /////////////////////////////////////////////// data helper ////////////////////////////////////////////// -->
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-1"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" value="{{ isset($data_form->name_helper) ? $data_form->name_helper : ''}}" placeholder="กรอกชื่อ" readonly>
                                </div>
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="id_helper_1" value="{{ isset($data_form->id_helper_1) ? $data_form->id_helper_1 : ''}}" placeholder="กรอกรหัส">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-2"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="name_helper_2" value="{{ isset($data_form->name_helper_2) ? $data_form->name_helper_2 : ''}}" placeholder="กรอกชื่อ">
                                </div>
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="id_helper_2" value="{{ isset($data_form->id_helper_2) ? $data_form->id_helper_2 : ''}}" placeholder="กรอกรหัส">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-3"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="name_helper_3" value="{{ isset($data_form->name_helper_3) ? $data_form->name_helper_3 : ''}}" placeholder="กรอกชื่อ">
                                </div>
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="id_helper_3" value="{{ isset($data_form->id_helper_3) ? $data_form->id_helper_3 : ''}}" placeholder="กรอกรหัส">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-4"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="name_helper_4" value="{{ isset($data_form->name_helper_4) ? $data_form->name_helper_4 : ''}}" placeholder="กรอกชื่อ">
                                </div>
                                <div class="input-group col">
                                    <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="id_helper_4" value="{{ isset($data_form->id_helper_4) ? $data_form->id_helper_4 : ''}}" placeholder="กรอกรหัส">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col mb-2">
                    <div class="card radius-6 p-3 d-flex">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-helper" src="{{ url('storage')}}/{{ Auth::user()->photo }}" alt="">
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <div class="p-2 detail-helper">
                                    <h4 class="p-0 m-0">ชื่อ : {{ Auth::user()->name }}</h4>
                                    <h6 class="p-0 m-0">รหัส : 60122420123</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-6 p-3 d-flex">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-helper" src="{{ url('storage')}}/{{ Auth::user()->photo }}" alt="">
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <div class="p-2 detail-helper">
                                    <h4 class="p-0 m-0">ชื่อ : {{ Auth::user()->name }}</h4>
                                    <h6 class="p-0 m-0">รหัส : 60122420123</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- /////////////////////////////////////////////// data helper ////////////////////////////////////////////// -->


                    <div class="col-12 mt-4">
                        <label for="result" class="form-label">ผลการปฏิบัติงาน</label>
                    </div>
                    <div class="col">
                        <label class="w-100">
                            <input type="radio" name="help_result" @if($data_form->help_result === "ไม่พบเหตุ") checked="yes" @endif value="ไม่พบเหตุ" class="card-input-red card-input-element d-none">
                            <div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger">
                                <b>
                                    ไม่พบเหตุ
                                </b>
                            </div>
                        </label>
                    </div>

                    <div class="col">
                        <label class="w-100">
                            <input type="radio" name="help_result" @if($data_form->help_result === "พบเหตุ") checked="yes" @endif value="พบเหตุ" class="card-input-element d-none">
                            <div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center">
                                <b>
                                    พบเหตุ
                                </b>
                            </div>
                        </label>
                    </div>
                    <div class="col-12 mt-4">
                        <label for="location_sos" class="form-label">สถานที่เกิดเหตุ</label>
                        <!-- <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-location-exclamation"></i></span>
                            <input type="text" class="form-control border-start-0 radius-2" name="location_sos" value="{{ isset($data_form->location_sos) ? $data_form->location_sos : ''}}" placeholder="สถานที่เกิดเหตุ">
                        </div> -->
                        <textarea class="form-control" id="location_sos" name="location_sos" placeholder="กรอก สถานที่เกิดเหตุ" rows="3">{{ isset($data_form->location_sos) ? $data_form->location_sos : ''}}</textarea>
                    </div>
                    <div class="col-12 mt-4">
                        <label for="symptom" class="form-label">เหตุการณ์</label>
                        <!-- <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                            <input type="text" class="form-control border-start-0 radius-2" name="symptom" value="{{ isset($data_form->symptom) ? $data_form->symptom : ''}}" placeholder="เหตุการณ์">
                        </div> -->
                        <textarea class="form-control" id="symptom" name="symptom" placeholder="กรอก เหตุการณ์" rows="3">{{ isset($data_form->symptom) ? $data_form->symptom : ''}}</textarea>
                    </div>
                </div>
            </div>

        </div>
        <div id="content2" class="menu-content p-3">
            <div class="card p-3 radius-15">
                <div class="card-title d-flex align-items-center">
                    <h4 class="card-title">
                        <b>
                            <span class="mb-0 text-primary"> <i class="fa-solid fa-timer me-1 font-22 text-primary "></i> ข้อมูลเวลา </span>
                        </b>
                    </h4>
                </div>

                <div class="timeline-wrapper">
                    <div class="card-timeline shadow">
                        <div class="heading-text">
                            {{ thaidate("lที่ j F Y" , strtotime($data_form->created_at)) }}
                            {{ isset($data_form->time_create_sos) ? \Carbon\Carbon::parse($data_form->time_create_sos)->format('H:i น.') : '' }}
                        </div>
                        <div class="heading-large m-0 ">รับแจ้งเหตุ</div>
                    </div>
                    <div class="sub-card-timeline card-left shadow">

                        <div class="heading-large">
                            <div>
                                สั่งการ
                            </div>
                            <div class="heading-text">
                                {{ isset($data_form->time_command) ? \Carbon\Carbon::parse($data_form->time_command)->format('H:i น.') : '' }}
                            </div>
                        </div>
                        <p class="paragraph-standard">ใช้เวลาในการ <b>"รับแจ้งเหตุ"</b> ถึง <b>"สั่งการ" : {{ $time_command }}</b> </p>
                    </div>
                    <div class="sub-card-timeline card-right shadow">
                        <div class="heading-large">
                            <div>ออกจากฐาน</div>
                            <div class="heading-text">{{ isset($data_form->time_go_to_help) ? \Carbon\Carbon::parse($data_form->time_go_to_help)->format('H:i น.') : '' }}</div>
                        </div>
                        <p class="paragraph-standard">
                        <ul class="paragraph-standard-ul">
                            <li>ใช้เวลาในการ <b>"สั่งการ"</b> ถึง <b>"ออกจากฐาน" : {{ $time_go_to_help }}</b></li>
                            <li>เลขกิโลเมตร ออกจากฐาน : <b>{{ number_format($data_form->km_create_sos_to_go_to_help) }} กม.</b></li>
                        </ul>
                        </p>
                    </div>
                    <div class="sub-card-timeline card-left shadow">
                        <div class="heading-large">
                            <div>ถึงที่เกิดเหตุ</div>
                            <div class="heading-text">
                                {{ isset($data_form->time_command) ? \Carbon\Carbon::parse($data_form->time_to_the_scene)->format('H:i น.') : '' }}
                            </div>

                        </div>
                        <p class="paragraph-standard">
                        <ul class="paragraph-standard-ul">
                            <li>ใช้เวลาในการ <b>"ออกจากฐาน"</b> ถึง <b>"ถึงที่เกิดเหตุ" : {{ $time_to_the_scene }}</b></li>
                            <li>เลขกิโลเมตร <b>"ถึงที่เกิดเหตุ" :{{ number_format($data_form->km_to_the_scene_to_leave_the_scene) }} กม.</b></li>
                            <li>ระยะทาง <b>"ออกจากฐาน"</b> ถึง <b>"ที่เกิดเหตุ" : {{ number_format($data_form->km_to_the_scene_to_leave_the_scene - $data_form->km_create_sos_to_go_to_help) }} กม.</b></li>
                        </ul>

                    </div>
                    <div class="sub-card-timeline card-right shadow">
                        <div class="heading-large">
                            <div>ออกจากที่เกิดเหตุ</div>
                            <div class="heading-text">{{ isset($data_form->time_leave_the_scene) ? \Carbon\Carbon::parse($data_form->time_leave_the_scene)->format('H:i น.') : '' }}</div>
                        </div>
                        <p class="paragraph-standard"> ใช้เวลาในการ <b>"ถึงที่เกิดเหตุ"</b> ถึง <b>"ออกจากฐาน" : {{ $time_leave_the_scene }}</b></p>
                    </div>
                    <div class="sub-card-timeline card-left shadow">
                        <div class="heading-large">
                            <div>ถึงโรงพยาบาล</div>

                            <div class="heading-text">
                                {{ isset($data_form->time_hospital) ? \Carbon\Carbon::parse($data_form->time_hospital)->format('H:i น.') : '' }}
                            </div>
                        </div>
                        <ul class="paragraph-standard-ul">
                            <li>ใช้เวลาในการ <b>"ออกจากที่เกิดเหตุ"</b> ถึง <b>"โรงพยาบาล" : {{ $time_hospital }}</b></li>
                            <li>เลขกิโลเมตร <b>"ถึงโรงพยาบาล" :{{ number_format($data_form->km_hospital) }} กม.</b></li>
                            <li>ระยะทาง <b>"ออกจากที่เกิดเหตุ"</b> ถึง <b>"โรงพยาบาล" : {{ number_format($data_form->km_hospital - $data_form->km_to_the_scene_to_leave_the_scene) }} กม.</b></li>
                        </ul>

                        <!-- <p class="paragraph-standard"> ใช้เวลาในการ <b>"ออกจากที่เกิดเหตุ"</b> ถึง <b>"โรงพยาบาล" : {{ $time_hospital }}</b></p> -->

                    </div>
                    <div class="sub-card-timeline card-right shadow">
                        <div class="heading-large">
                            <div>ถึงฐาน</div>
                            <div class="heading-text">{{ isset($data_form->time_to_the_operating_base) ? \Carbon\Carbon::parse($data_form->time_to_the_operating_base)->format('H:i น.') : '' }}</div>
                        </div>
                        <p class="paragraph-standard">

                        <ul class="paragraph-standard-ul">
                            <li>ใช้เวลาในการจาก <b>"โรงพยาบาล"</b> ถึง <b>"ถึงฐาน" : {{ $time_to_the_operating_base }}</b></li>
                            <li>เลขกิโลเมตร <b>"ถึงฐาน" :{{ number_format($data_form->km_operating_base) }} กม.</b></li>
                            <li>ระยะทางจาก <b>"โรงพยาบาล"</b> ถึง <b>"ถึงฐาน" : {{ number_format($data_form->km_operating_base - $data_form->km_hospital) }} กม.</b></li>
                        </ul>
                        </p>
                    </div>


                    <div class="card-timeline shadow">

                        <div class="heading-large m-0 ">
                            รวม
                        </div>
                        <p class="paragraph-standard">

                        <ul class="paragraph-standard-ul">
                            <li>หน่วยปฏิบัติการแพทย์ฉุกเฉินใช้เวลาในการช่วยเหลือ : <b>{{ $time_officer_help}}</b></li>
                            <li>ระยะทางทั้งหมด : <b>{{ number_format($data_form->km_operating_base - $data_form->km_create_sos_to_go_to_help) }} กม.</b> </li>
                            <li>เวลาในการช่วยเหลือทั้งหมด : <b>{{ $time_all}}</b></li>
                        </ul>
                        </p>
                    </div>
                    <div class="timeline-blue"></div>
                </div>
            </div>
        </div>
        <div id="content3" class="menu-content">
        <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-between">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-face-eyes-xmarks me-1 font-22 text-primary "></i> ข้อมูลผู้ป่วย</span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="container-form-pink">

                                <div class="mr-3 container-input ">
                                    <label for="name_user" class="form-label">คำนำหน้าชื่อผู้ป่วย</label>
                                    <input class="form-control" name="name_title" list="datalist_name_title" id="name_title" placeholder="กรอกคำนำหน้าชื่อ" value="{{ isset($data_form->name_title) ? $data_form->name_title : ''}}" onchange="document.querySelector('#header_name_title').innerHTML = this.value">
                                    <datalist id="datalist_name_title">
                                        <option value="นาย"></option>
                                        <option value="นาง"></option>
                                        <option value="นางสาว"></option>
                                        <option value="ด.ช."></option>
                                        <option value="ด.ญ."></option>
                                        <option value="ด.ช."></option>
                                        <option value="ด.ช."></option>
                                        <option value="ทหารเรือ"></option>
                                        <option value="พลทหาร"></option>
                                        <option value="พลเรือเอก"></option>
                                        <option value="พลเรือตรี"></option>
                                        <option value="นาวาโท"></option>
                                        <option value="เรือเอก"></option>
                                        <option value="เรือตรี"></option>
                                        <option value="พันจ่าโท"></option>
                                        <option value="จ่าเอก"></option>
                                        <option value="จ่าตรี"></option>
                                        <option value="พลเรือโท"></option>
                                        <option value="นาวาเอก"></option>
                                        <option value="นาวาตรี"></option>
                                        <option value="เรือโท"></option>
                                        <option value="พันจ่าเอก"></option>
                                        <option value="พันจ่าตรี"></option>
                                        <option value="จ่าโท"></option>
                                        <option value="พลอากาศเอก"></option>
                                        <option value="พลอากาศตรี"></option>
                                        <option value="นาวาอากาศโท"></option>
                                        <option value="เรืออากาศเอก"></option>
                                        <option value="เรืออากาศตรี"></option>
                                        <option value="พันจ่าอากาศโท"></option>
                                        <option value="จ่าอากาศเอก"></option>
                                        <option value="จ่าอากาศตรี"></option>
                                        <option value="พลอากาศโท"></option>
                                        <option value="นาวาอากาศเอก"></option>
                                        <option value="นาวาอากาศตรี"></option>
                                        <option value="เรืออากาศโท"></option>
                                        <option value="พันจ่าอากาศเอก"></option>
                                        <option value="พันจ่าอากาศตรี"></option>
                                        <option value="จ่าอากาศโท"></option>
                                        <option value="พลตำรวจเอก"></option>
                                        <option value="พลตำรวจตรี"></option>
                                        <option value="พันตำรวจโท"></option>
                                        <option value="ร้อยตำรวจเอก"></option>
                                        <option value="ร้อยตำรวจตรี"></option>
                                        <option value="จ่าสิบตำรวจ"></option>
                                        <option value="สิบตำรวจโท"></option>
                                        <option value="พลตำรวจ"></option>
                                        <option value="พลตำรวจโท"></option>
                                        <option value="พันตำรวจเอก"></option>
                                        <option value="พันตำรวจตรี"></option>
                                        <option value="ร้อยตำรวจโท"></option>
                                        <option value="นายดาบตำรวจ"></option>
                                        <option value="สิบตำรวจเอก"></option>
                                        <option value="สิบตำรวจตรี"></option>
                                    </datalist>
                                </div>
                                <div class="mr-3 container-input">
                                    <label for="name_user" class="form-label">ชื่อผู้ป่วย</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-location-exclamation"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="patient_name_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'patient_name_' . $idPatient}) ? $data_form->{'patient_name_' . $idPatient} : '' }}" placeholder="คำนำหน้าชื่อผู้ป่วย"  oninput="document.querySelector('#header_patient_name').innerHTML = this.value">
                                    </div>
                                </div>

                                <div class="mr-3 container-input">
                                    <label for="age" class="form-label">อายุผู้ป่วย</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="patient_age_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'patient_age_' . $idPatient}) ? $data_form->{'patient_age_' . $idPatient} : '' }}" placeholder="อายุผู้ป่วย">
                                    </div>
                                </div>
                                <div class="mr-3 container-input">
                                        <label for="result" class="form-label">เพศ</label><br> 
                                    <div class="separater-section text-center m-0 text-scuess"> <span>เพศผู้ป่วย</span>
                                        <hr>
                                    </div>
                                    <label class="m-2">
                                        <input type="radio" @if($data_form->gender === "ชาย") checked @endif name="gender" value="ชาย" class=" count-input card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                <i class="fa-solid fa-mars"></i> ชาย
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" @if($data_form->gender === "หญิง") checked @endif name="gender" value="หญิง" class=" count-input card-input-female card-input-element d-none">
                                        <div class="card card-body d-flex flex-row text-female justify-content-between align-items-center">
                                            <b>
                                                <i class="fa-solid fa-venus"></i> หญิง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                                <div class="mr-3 container-input">
                                    <label for="age" class="form-label">HN</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="patient_hn_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'patient_hn_' . $idPatient}) ? $data_form->{'patient_hn_' . $idPatient} : '' }}" placeholder="หมายเลขของผู้ป่วยนอก">
                                    </div>                                                                                      
                                </div>
                                <div class="mr-3 container-input">
                                    <label for="age" class="form-label">เลขประจำตัวประชาชนผู้ป่วย</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="patient_vn_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'patient_vn_' . $idPatient}) ? $data_form->{'patient_vn_' . $idPatient} : '' }}" placeholder="กรอกหมายเลขบัตรประจำตัวประชาชน ผู้ป่วย">
                                    </div>
                                </div>
                                <div class="mr-3 container-input">
                                    <label for="age" class="form-label">นำส่งที่จังหวัด</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="delivered_province_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'delivered_province_' . $idPatient}) ? $data_form->{'delivered_province_' . $idPatient} : '' }}" placeholder="กรอกจังหวัดที่นำส่งผู้ป่วย">
                                    </div>
                                </div>
                                <div class="mr-3 container-input">
                                    <label for="age" class="form-label">นำส่ง รพ.</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                        <input type="text" class=" count-input form-control border-start-0 radius-2" name="delivered_hospital_{{ $idPatient}}_yellow" value="{{ isset($data_form->{'delivered_hospital_' . $idPatient}) ? $data_form->{'delivered_hospital_' . $idPatient} : '' }}" placeholder="กรอกชื่อโรงพยาบาลที่นำส่งผู้ป่วย">
                                    </div>
                                </div>


                                <div class="mr-3 container-input">
                                        <label for="result" class="form-label">ประเภท</label><br> 
                                    <div class="separater-section text-center m-0"> <span>ประเภทผู้ป่วย</span>
                                        <hr>
                                    </div>
                                    <label class="m-2">
                                        <input type="radio" name="people_type" @if($data_form->people_type === "คนไทย") checked @endif value="คนไทย" class="card-input-element d-none" onchange="check_type_people(2)">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                คนไทย
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="people_type" @if($data_form->people_type === "แรงงานต่างด้าว") checked @endif value="แรงงานต่างด้าว" class=" card-input-element d-none" onchange="check_type_people(2)">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                แรงงานต่างด้าว
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="people_type" @if($data_form->people_type === "ชาวต่างชาติ") checked @endif value="ชาวต่างชาติ" class=" card-input-element d-none" onchange="check_type_people(2)">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                ชาวต่างชาติ
                                            </b>
                                        </div>
                                    </label>
                                </div>

                                <div id="country_foreigner" class="d-none mr-3">
                                    <label for="people_country" class="form-label">ประเทศ</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-earth-americas"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="people_country" name="people_country" value="{{ isset($data_form->people_country) ? $data_form->people_country : ''}}" placeholder="ประเทศผู้ป่วย">
                                    </div>
                                </div>
                                <div id="passport_foreigner" class="d-none mr-3">
                                    <label for="passport" class="form-label">หนังสือเดินทาง</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-passport"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="passport" name="passport" value="{{ isset($data_form->passport) ? $data_form->passport : ''}}" placeholder="หนังสือเดินทางประเทศ">
                                    </div>
                                </div>
                                <div class="mr-3 container-input">
                                    <div class="separater-section text-center m-0"> <span>สิทธิการรักษาผู้ป่วย</span>
                                        <hr>
                                    </div>
                                    <label class="m-2">
                                        <input type="radio" name="treatment_rights" @if($data_form->treatment_rights === "บัตรทอง") checked @endif value="บัตรทอง" class=" card-input-element d-none count-input">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                บัตรทอง
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="treatment_rights" @if($data_form->treatment_rights === "ข้าราชการ") checked @endif value="ข้าราชการ" class=" card-input-element d-none count-input">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                ข้าราชการ
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="treatment_rights" @if($data_form->treatment_rights === "ประกันสังคม") checked @endif value="ประกันสังคม" class=" card-input-element d-none count-input">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                ประกันสังคม
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="treatment_rights" @if($data_form->treatment_rights === "ไม่มีหลักประกัน") checked @endif value="ไม่มีหลักประกัน" class=" card-input-element d-none count-input">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                ไม่มีหลักประกัน
                                            </b>
                                        </div>
                                    </label>
                                    <label class="m-2">
                                        <input type="radio" name="treatment_rights" @if($data_form->treatment_rights === "แรงงานต่างด้าวขึ้นทะเบียน") checked @endif value="แรงงานต่างด้าวขึ้นทะเบียน" class=" card-input-element d-none count-input">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                            <b>
                                                แรงงานต่างด้าวขึ้นทะเบียน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="mr-3 container-input">
                                <!-- <label for="result" class="form-label">ประกันอื่นๆ (ถ้ามี)</label><br> -->
                                <div class="separater-section text-center m-0"> <span>ประกันอื่นๆ (ถ้ามี)</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="insurance" value="ประกันท่องเที่ยว" @if($data_form->insurance === "ประกันท่องเที่ยว") checked @endif class=" card-input-element d-none" onchange="check_insurance()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ประกันท่องเที่ยว
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="insurance" value="ผู้ประสบภัยจากรถ" @if($data_form->insurance === "ผู้ประสบภัยจากรถ") checked @endif class=" card-input-element d-none" onchange="check_insurance()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ผู้ประสบภัยจากรถ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div id="div_insurance_country" class="d-none">
                                <label for="insurance_country" class="form-label">ประเทศ</label>
                                <div class="input-group m-2"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-earth-americas"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="insurance_country" name="insurance_country" value="{{ isset($data_form->insurance_country) ? $data_form->insurance_country : ''}}" placeholder="ประเทศ">
                                </div>
                            </div>
                            <div id="div_insurance_type_car" class="d-none">
                                <label for="insurance_type_car" class="form-label">ประเภทรถ</label>
                                <div class="input-group m-2"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-car-bus"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="insurance_type_car" name="insurance_type_car" value="{{ isset($data_form->insurance_type_car) ? $data_form->insurance_type_car : ''}}" placeholder="ประเภทรถ">
                                </div>
                            </div>
                            <div id="div_insurance_type_license_plate" class="d-none">
                                <label for="registration_category_yellow" class="form-label">ทะเบียนรถหมวด</label>
                                <div class="input-group m-2"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-car-rear"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="registration_category_yellow" name="registration_category_yellow" value="{{ isset($data_form->registration_category) ? $data_form->registration_category : ''}}" placeholder="ทะเบียนรถหมวด">
                                </div>
                            </div>
                            <div id="div_insurance_license_plate" class="d-none">
                                <label for="registration_number_yellow" class="form-label">เลขทะเบียน</label>
                                <div class="input-group m-2"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-input-numeric"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="registration_number_yellow" name="registration_number_yellow" value="{{ isset($data_form->registration_number) ? $data_form->registration_number : ''}}" placeholder="เลขทะเบียน">
                                </div>
                            </div>
                            <div id="div_insurance_province" class="d-none">
                                <label for="registration_province_yellow" class="form-label">จังหวัด</label>
                                <div class="input-group m-2"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="registration_province_yellow" name="registration_province_yellow" value="{{ isset($data_form->registration_province) ? $data_form->registration_province : ''}}" placeholder="จังหวัด">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-face-thermometer me-1 font-22 text-primary "></i> สภาพผู้ป่วย</span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="mr-3 container-input">
                                <!-- <label for="result" class="form-label">เพศ</label><br> -->
                                <div class="separater-section text-center m-0"> <span>ประเภทผู้ป่วย</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="type_patient" @if($data_form->type_patient === "บาดเจ็บ/อุบัติเหตุ") checked="yes" @endif value="บาดเจ็บ/อุบัติเหตุ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            บาดเจ็บ/อุบัติเหตุ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="type_patient" @if($data_form->type_patient === "ป่วยฉุกเฉิน") checked="yes" @endif value="ป่วยฉุกเฉิน" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ป่วยฉุกเฉิน
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <!-- <div class="w-100 mt-4 table-responsive">
                                <table class="table  table-bordered border-secondary radius-15">
                                    <thead>
                                        <tr class="text-center">
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">Time</td>
                                            <td colspan="4">Vital Signs</td>
                                            <td colspan="3">Neoro Signs</td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">DTX</td>

                                        </tr>
                                        <tr class="text-center">
                                            <td>T</td>
                                            <td>BP</td>
                                            <td>PR</td>
                                            <td>RR</td>
                                            <td>E</td>
                                            <td>V</td>
                                            <td>M</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input id="time_of_measurement" name="time_of_measurement" type="text" width="10" value="{{ isset($data_form->time_of_measurement) ? $data_form->time_of_measurement : ''}}"> </td>
                                            <td><input id="vital_signs_t" name="vital_signs_t" type="text" width="10" value="{{ isset($data_form->vital_signs_t) ? $data_form->vital_signs_t : ''}}"> </td>
                                            <td><input id="vital_signs_bp" name="vital_signs_bp" type="text" width="10" value="{{ isset($data_form->vital_signs_bp) ? $data_form->vital_signs_bp : ''}}"> </td>
                                            <td><input id="vital_signs_pr" name="vital_signs_pr" type="text" width="10" value="{{ isset($data_form->vital_signs_pr) ? $data_form->vital_signs_pr : ''}}"> </td>
                                            <td><input id="vital_signs_rr" name="vital_signs_rr" type="text" width="10" value="{{ isset($data_form->vital_signs_rr) ? $data_form->vital_signs_rr : ''}}"> </td>
                                            <td><input id="neuro_signs_e" name="neuro_signs_e" type="text" width="10" value="{{ isset($data_form->neuro_signs_e) ? $data_form->neuro_signs_e : ''}}"> </td>
                                            <td><input id="neuro_signs_v" name="neuro_signs_v" type="text" width="10" value="{{ isset($data_form->neuro_signs_v) ? $data_form->neuro_signs_v : ''}}"> </td>
                                            <td><input id="neuro_signs_m" name="neuro_signs_m" type="text" width="10" value="{{ isset($data_form->neuro_signs_m) ? $data_form->neuro_signs_m : ''}}"> </td>
                                            <td><input id="dxt" name="dxt" type="text" width="10" value="{{ isset($data_form->dxt) ? $data_form->dxt : ''}}"> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>ความรู้สึกตัว</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="consciousness" @if($data_form->consciousness === "รู้สึกตัวดี") checked="yes" @endif value="รู้สึกตัวดี" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            รู้สึกตัวดี
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="consciousness" @if($data_form->consciousness === "ซึม") checked="yes" @endif value="ซึม" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ซึม
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="consciousness" @if($data_form->consciousness === "หมดสติปลุกตื่น") checked="yes" @endif value="หมดสติปลุกตื่น" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            หมดสติปลุกตื่น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="consciousness" @if($data_form->consciousness === "หมดสติปลุกไม่ตื่น") checked="yes" @endif value="หมดสติปลุกไม่ตื่น" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            หมดสติปลุกไม่ตื่น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="consciousness" @if($data_form->consciousness === "แอะอะโวยวาย") checked="yes" @endif value="แอะอะโวยวาย" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            แอะอะโวยวาย
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>การหายใจ</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="breathing" @if($data_form->breathing === "ปกติ") checked="yes" @endif value="ปกติ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ปกติ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="breathing" @if($data_form->breathing === "เร็ว") checked="yes" @endif value="เร็ว" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เร็ว
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="breathing" @if($data_form->breathing === "ช้า") checked="yes" @endif value="ช้า" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ช้า
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="breathing" @if($data_form->breathing === "ไม่สม่ำเสมอ") checked="yes" @endif value="ไม่สม่ำเสมอ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่สม่ำเสมอ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="breathing" @if($data_form->breathing === "ไม่หายใจ") checked="yes" @endif value="ไม่หายใจ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่หายใจ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>กระดูกผิดรูป</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="deformed_bone" @if($data_form->deformed_bone === "ไม่มี") checked="yes" @endif value="ไม่มี" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่มี
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="deformed_bone" @if($data_form->deformed_bone === "ผิดรูป") checked="yes" @endif value="ผิดรูป" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ผิดรูป
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>บาดแผล</span>
                                    <hr>
                                </div>
                                @php
                                $wound_values = explode(',', $data_form->wound);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("ไม่มี", $wound_values)) checked="yes" @endif value="ไม่มี" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่มี
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("แผลถลอก", $wound_values)) checked="yes" @endif value="แผลถลอก" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            แผลถลอก
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("ฉีกขาด/ตัด", $wound_values)) checked="yes" @endif value="ฉีกขาด/ตัด" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ฉีกขาด/ตัด
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("แผลฝกช้ำ", $wound_values)) checked="yes" @endif value="แผลฝกช้ำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            แผลฝกช้ำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("แผลไหม้", $wound_values)) checked="yes" @endif value="แผลไหม้" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            แผลไหม้
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("ถูกยิง", $wound_values)) checked="yes" @endif value="ถูกยิง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ถูกยิง
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("ถูกแทง", $wound_values)) checked="yes" @endif value="ถูกแทง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ถูกแทง
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("อวัยวะตัดขาด", $wound_values)) checked="yes" @endif value="อวัยวะตัดขาด" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            อวัยวะตัดขาด
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="wound" @if(in_array("ถูกระเบิด", $wound_values)) checked="yes" @endif value="ถูกระเบิด" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ถูกระเบิด
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-stomach me-1 font-22 text-primary "></i> อวัยวะ</span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="mr-3 container-input">
                                @php
                                $organ_values = explode(',', $data_form->organ);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("ศีรษะ/คอ", $organ_values)) checked="yes" @endif value="ศีรษะ/คอ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ศีรษะ/คอ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("ใบหน้า", $organ_values)) checked="yes" @endif value="ใบหน้า" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ใบหน้า
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("สันหลัง/หลัง", $organ_values)) checked="yes" @endif value="สันหลัง/หลัง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            สันหลัง/หลัง
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("หน้าอก/ไหปลาร้า", $organ_values)) checked="yes" @endif value="หน้าอก/ไหปลาร้า" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            หน้าอก/ไหปลาร้า
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("ช่องท้อง", $organ_values)) checked="yes" @endif value="ช่องท้อง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ช่องท้อง
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("เชิงกราน", $organ_values)) checked="yes" @endif value="เชิงกราน" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เชิงกราน
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("Extremities", $organ_values)) checked="yes" @endif value="Extremities" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            Extremities
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("ผิวหนัง", $organ_values)) checked="yes" @endif value="ผิวหนัง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ผิวหนัง
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="organ" @if(in_array("Multiple injury back", $organ_values)) checked="yes" @endif value="Multiple injury back" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            Multiple injury back
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-face-head-bandage me-1 font-22 text-primary "></i> การช่วยเหลือ</span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>ทางเดินหายใจ</span>
                                    <hr>
                                </div>
                                @php
                                $respiratory_tract_values = explode(',', $data_form->respiratory_tract);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="respiratory_tract" @if(in_array("ไม่ได้ทำ", $respiratory_tract_values)) checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="respiratory_tract" @if(in_array("จัดท่าผู้ป่วย", $respiratory_tract_values)) checked="yes" @endif value="จัดท่าผู้ป่วย" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            จัดท่าผู้ป่วย
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="respiratory_tract" @if(in_array("เปิดทางเดินหายใจ", $respiratory_tract_values)) checked="yes" @endif value="เปิดทางเดินหายใจ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เปิดทางเดินหายใจ
                                        </b>
                                    </div>
                                </label>
                                
                                <label class="m-2">
                                    <input type="checkbox" name="respiratory_tract" @if(in_array("Pocketmask", $respiratory_tract_values)) checked="yes" @endif value="Pocketmask" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ช่วยหายใจ (Pocket Mask)
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>บาดแผล/ห้ามเลือด</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="wound_hemostasis" @if($data_form->wound_hemostasis === "ไม่ได้ทำ") checked @endif value="ไม่ได้ทำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="wound_hemostasis" @if($data_form->wound_hemostasis === "การกดห้ามเลือด") checked @endif value="การกดห้ามเลือด" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            การกดห้ามเลือด
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="wound_hemostasis" @if($data_form->wound_hemostasis === "ทำแผล") checked @endif value="ทำแผล" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำแผล
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>ช่วยฟื้นคืนชีพ</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="help_revive" @if($data_form->help_revive === "ไม่ได้ทำ") checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="help_revive" @if($data_form->help_revive === "ทำ") checked="yes" @endif value="ทำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>การดามกระดูก</span>
                                    <hr>
                                </div>
                                @php
                                $bone_splint_values = explode(',', $data_form->bone_splint);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="bone_splint" @if(in_array("ไม่ได้ทำ", $bone_splint_values)) checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="bone_splint" @if(in_array("เฝือกลม/ไม้ดาม/sling", $bone_splint_values)) checked="yes" @endif value="เฝือกลม/ไม้ดาม" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เฝือกลม/ไม้ดาม/sling
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="bone_splint" @if(in_array("เฝือกดามคอและกระดานรองหลังยาว", $bone_splint_values)) checked="yes" @endif value="เฝือกดามคอและกระดานรองหลังยาว" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เฝือกดามคอและกระดานรองหลังยาว
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0"> <span>ผลการดูแลรักษาเบื้องต้น</span>
                                    <hr>
                                </div>
                                @php
                                $results_of_care_values = explode(',', $data_form->results_of_care);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("ไม่ยอมให้รักษา", $results_of_care_values)) checked="yes" @endif value="ไม่ยอมให้รักษา" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ยอมให้รักษา
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("ทุเลา", $results_of_care_values)) checked="yes" @endif value="ทุเลา" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทุเลา
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("คงเดิม/คงที่", $results_of_care_values)) checked="yes" @endif value="คงเดิม/คงที่" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            คงเดิม/คงที่
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("ทรุดหนัก", $results_of_care_values)) checked="yes" @endif value="ทรุดหนัก" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทรุดหนัก
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("เสียชีวิต ณ จุดเกิดเหตุ", $results_of_care_values)) checked="yes" @endif value="เสียชีวิต ณ จุดเกิดเหตุ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เสียชีวิต ณ จุดเกิดเหตุ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="results_of_care" @if(in_array("เสียชีวิตขณะนำส่ง", $results_of_care_values)) checked="yes" @endif value="เสียชีวิตขณะนำส่ง" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เสียชีวิตขณะนำส่ง
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div id="content4" class="menu-content">
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-truck-medical me-1 font-22 text-primary "></i> เกณฑ์การตัดสินใจส่งโรงพยาบาล <small>(โดยหัวหน้าทีมและ/ผ่านการเห็นชอบของศูนย์ฯ)</small> </span>
                            </b>
                        </h4>
                        <div class="container-form-pink">

                            <div class="mr-3">
                                <label for="name_hospital" class="form-label">นำส่งห้องฉุกเฉินโรงพยาบาล</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="name_hospital" value="{{ isset($data_form->name_hospital) ? $data_form->name_hospital : ''}}" placeholder="ชื่อโรงพยาบาล">
                                </div>
                            </div>
                            <div class="mr-3">
                                <label for="time_go_to_hospital" class="form-label">เวลา</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-clock"></i></span>
                                    <input type="datetime-local" class="form-control border-start-0 radius-2" name="time_go_to_hospital" value="{{ isset($data_form->time_go_to_hospital) ? $data_form->time_go_to_hospital : ''}}" placeholder="วันที่/เวลา">
                                </div>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>โรงพยาบาล</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="type_hospital" @if($data_form->type_hospital === "โรงพยาบาลรัฐ") checked="yes" @endif value="โรงพยาบาลรัฐ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            โรงพยาบาลรัฐ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="type_hospital" @if($data_form->type_hospital === "โรงพยาบาลเอกชน") checked="yes" @endif value="โรงพยาบาลเอกชน" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            โรงพยาบาลเอกชน
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>เหตุผล</span>
                                    <hr>
                                </div>
                                @php
                                $reason_choosing_hospital_values = explode(',', $data_form->reason_choosing_hospital);
                                @endphp
                                <label class="m-2">
                                    <input type="checkbox" name="reason_choosing_hospital" @if(in_array("เหมาะสม/รักษาได้", $reason_choosing_hospital_values)) checked="yes" @endif value="เหมาะสม/รักษาได้" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เหมาะสม/รักษาได้
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="reason_choosing_hospital" @if(in_array("อยู่ใกล้", $reason_choosing_hospital_values)) checked="yes" @endif value="อยู่ใกล้" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            อยู่ใกล้
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="reason_choosing_hospital" @if(in_array("มีหลักประกัน", $reason_choosing_hospital_values)) checked="yes" @endif value="มีหลักประกัน" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            มีหลักประกัน
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="reason_choosing_hospital" @if(in_array("เป็นผู้ป่วยเก่า", $reason_choosing_hospital_values)) checked="yes" @endif value="เป็นผู้ป่วยเก่า" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เป็นผู้ป่วยเก่า
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="checkbox" name="reason_choosing_hospital" @if(in_array("เป็นความประสงค์", $reason_choosing_hospital_values)) checked="yes" @endif value="เป็นความประสงค์" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เป็นความประสงค์
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3">
                                <label for="recorder" class="form-label">ผู้สรุปรายงาน</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-user-pen"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="recorder" value="{{ isset($data_form->recorder) ? $data_form->recorder : ''}}" placeholder="ชื่อผู้สรุปรายงาน">
                                </div>
                            </div>
                            <div class="mr-3">
                                <label for="id_recorder" class="form-label">รหัส</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-id-card-clip"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="id_recorder" value="{{ isset($data_form->id_recorder) ? $data_form->id_recorder : ''}}" placeholder="รหัส">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content5" class="menu-content">
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-user-doctor-message me-1 font-22 text-primary "></i> การประเมิน/รับรองการนำส่ง <small>(โดยแพทย์ พยาบาล ประจำโรงพยาบาลที่รับดูแลต่อ)</small> </span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="mr-3">
                                <label for="HN" class="form-label">HN</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-id-card"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="HN" value="{{ isset($data_form->HN) ? $data_form->HN : ''}}" placeholder="หมายเลขของผู้ป่วยนอก">
                                </div>
                            </div>
                            <div class="mr-3">
                                <label for="diagnosis" class="form-label">การวินิจฉัยโรค</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="diagnosis" value="{{ isset($data_form->diagnosis) ? $data_form->diagnosis : ''}}" placeholder="การวินิจฉัยโรค">
                                </div>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>ระดับการคัดแยก(ER Triage)</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="er" @if($data_form->er === "แดง(วิกฤติ)") checked="yes" @endif value="แดง(วิกฤติ)" class="card-input-red card-input-element d-none">
                                    <div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            แดง(วิกฤติ)
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="er" @if($data_form->er === "ขาว(ทั่วไป)") checked="yes" @endif value="ขาว(ทั่วไป)" class="card-input-element d-none">
                                    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            ขาว(ทั่วไป)
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="er" @if($data_form->er === "เหลือง(เร่งด่วน)") checked="yes" @endif value="เหลือง(เร่งด่วน)" class="card-input-warning card-input-element d-none">
                                    <div class="card card-body text-warning d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            เหลือง(เร่งด่วน)
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="er" @if($data_form->er === "ดำ(รับบริการสาธารณสุขอื่น)") checked="yes" @endif value="ดำ(รับบริการสาธารณสุขอื่น)" class="card-input-dark card-input-element d-none">
                                    <div class="card card-body  text-dark d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            ดำ(รับบริการสาธารณสุขอื่น)
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="er" @if($data_form->er === "แดง(วิกฤติ)") checked="yes" @endif value="แดง(วิกฤติ)" class="card-input-success card-input-element d-none">
                                    <div class="card card-body text-success d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            เขียว(ไม่รุนแรง)
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>ทางเดินหายใจ</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="respiratory_tract_by_doctor" @if($data_form->respiratory_tract_by_doctor === "ไม่จำเป็น") checked="yes" @endif value="ไม่จำเป็น" class=" card-input-element d-none" onchange="check_respiratory_tract_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่จำเป็น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="respiratory_tract_by_doctor" @if($data_form->respiratory_tract_by_doctor === "ไม่ได้ทำ") checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none" onchange="check_respiratory_tract_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="respiratory_tract_by_doctor" @if($data_form->respiratory_tract_by_doctor === "ทำและเหมาสม") checked="yes" @endif value="ทำและเหมาสม" class=" card-input-element d-none" onchange="check_respiratory_tract_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำและเหมาะสม
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" id="respiratory_tract_by_doctor" @if($data_form->respiratory_tract_by_doctor === "ทำแต่ไม่เหมาะ") checked="yes" @endif name="respiratory_tract_by_doctor" value="ทำแต่ไม่เหมาะ" class="card-input-element d-none" onchange="check_respiratory_tract_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำแต่ไม่เหมาะสม
                                            <button type="button" id="btn_respiratory_tract_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_respiratory_tract_by_doctor">
                                                แก้ไข
                                            </button>
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>การห้ามเลือด</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="hemostasis_by_doctor" @if($data_form->hemostasis_by_doctor === "ไม่จำเป็น") checked="yes" @endif value="ไม่จำเป็น" class=" card-input-element d-none" onchange="check_hemostasis_by_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่จำเป็น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="hemostasis_by_doctor" @if($data_form->hemostasis_by_doctor === "ไม่ได้ทำ") checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none" onchange="check_hemostasis_by_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="hemostasis_by_doctor" @if($data_form->hemostasis_by_doctor === "ทำและเหมาสม") checked="yes" @endif value="ทำและเหมาสม" class=" card-input-element d-none" onchange="check_hemostasis_by_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำและเหมาะสม
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" id="hemostasis_by_doctor" @if($data_form->hemostasis_by_doctor === "ทำแต่ไม่เหมาะ") checked="yes" @endif name="hemostasis_by_doctor" value="ทำแต่ไม่เหมาะ" class=" card-input-element d-none" onchange="check_hemostasis_by_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำแต่ไม่เหมาะสม
                                            <button type="button" id="btn_hemostasis_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_hemostasis_by_doctor">
                                                แก้ไข
                                            </button>
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>การดามกระดูก</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="splint_by_doctor" @if($data_form->splint_by_doctor === "ไม่จำเป็น") checked="yes" @endif value="ไม่จำเป็น" class=" card-input-element d-none" onchange="check_splint_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่จำเป็น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="splint_by_doctor" @if($data_form->splint_by_doctor === "ไม่ได้ทำ") checked="yes" @endif value="ไม่ได้ทำ" class=" card-input-element d-none" onchange="check_splint_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="splint_by_doctor" @if($data_form->splint_by_doctor === "ทำและเหมาสม") checked="yes" @endif value="ทำและเหมาสม" class=" card-input-element d-none" onchange="check_splint_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำและเหมาะสม
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" id="splint_by_doctor" @if($data_form->splint_by_doctor === "ทำแต่ไม่เหมาะ") checked="yes" @endif name="splint_by_doctor" value="ทำแต่ไม่เหมาะ" class=" card-input-element d-none" onchange="check_splint_by_doctor()">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทำแต่ไม่เหมาะสม
                                            <button type="button" id="btn_splint_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_splint_by_doctor">
                                                แก้ไข
                                            </button>
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="mr-3">
                                <div class="separater-section text-center m-0 text-scuess"> <span>ตำแหน่ง</span>
                                    <hr>
                                </div>
                                <label>
                                    <input type="radio" name="role_doctor" @if($data_form->role_doctor === "แพทย์") checked="yes" @endif value="แพทย์" class=" card-input-element d-none" onchange="check_role_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            แพทย์
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="role_doctor" @if($data_form->role_doctor === "พยาบาล") checked="yes" @endif value="พยาบาล" class=" card-input-element d-none" onchange="check_role_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            พยาบาล
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" id="role_doctor" @if($data_form->role_doctor === "อื่นๆ") checked="yes" @endif name="role_doctor" value="อื่นๆ" class=" card-input-element d-none" onchange="check_role_doctor();">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            อื่นๆ
                                        </b><br>
                                        <input type="text" id="role_other" disabled class="form-control border-start-0 radius-4" name="role_other" value="{{ isset($data_form->role_other) ? $data_form->role_other : ''}}" placeholder="ตำแหน่ง">
                                    </div>
                                </label>
                            </div>

                            <div class="mr-3">
                                <label for="name_doctor" class="form-label">ชื่อผู้ประเมิน</label>
                                <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-user-doctor"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" name="name_doctor" value="{{ isset($data_form->name_doctor) ? $data_form->name_doctor : ''}}" placeholder="ชื่อผู้ประเมิน">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal ทำแต่ไม่เหมาะสม ทางเดินหายใจ-->
            <div class="modal fade" id="modal_respiratory_tract_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดเพิ่มเติม การรักษาทางเดินหายใจ</h5>
                            <button type="button" class="close btn h6" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control radius-4" id="respiratory_tract_by_doctor_detail" name="respiratory_tract_by_doctor_detail" value="{{ isset($data_form->respiratory_tract_by_doctor_detail) ? $data_form->respiratory_tract_by_doctor_detail : ''}}" placeholder="ระบุ" rows="4" cols="100%">{{ isset($data_form->respiratory_tract_by_doctor_detail) ? $data_form->respiratory_tract_by_doctor_detail : ''}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-dismiss="modal">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal ทำแต่ไม่เหมาะสม การห้ามเลือด-->
            <div class="modal fade" id="modal_hemostasis_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายะละเอียดเพิ่มเติม การห้ามเลือด</h5>
                            <button type="button" class="close btn h6" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control radius-4" id="hemostasis_by_doctor_detail" name="hemostasis_by_doctor_detail" placeholder="ระบุ" rows="4" cols="100%">{{ isset($data_form->hemostasis_by_doctor_detail) ? $data_form->hemostasis_by_doctor_detail : ''}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-dismiss="modal">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal ทำแต่ไม่เหมาะสม การดามกระดูก-->
            <div class="modal fade" id="modal_splint_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายะละเอียดเพิ่มเติม การดามกระดูก</h5>
                            <button type="button" class="close btn h6" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control radius-4" id="splint_by_doctor_detail" name="splint_by_doctor_detail" value="{{ isset($data_form->splint_by_doctor_detail) ? $data_form->splint_by_doctor_detail : ''}}" placeholder="ระบุ" rows="4" cols="100%">{{ isset($data_form->splint_by_doctor_detail) ? $data_form->splint_by_doctor_detail : ''}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-dismiss="modal">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content6" class="menu-content">
            <div class="col py-2">
                <div class="card radius-15">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b>
                                <span class="mb-0 text-primary"> <i class="fa-solid fa-hospital me-1 font-22 text-primary "></i> ผลการรักษาที่/ในโรงพยาบาล <small>(ติดตามผลในวันสิ้นเดือน)</small> </span>
                            </b>
                        </h4>
                        <div class="container-form-pink">
                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>Admitted</span>
                                    <hr>
                                </div>
                                <label class="m-2">
                                    <input type="radio" name="admitted" @if($data_form->admitted === "Yes") checked="yes" @endif value="Yes" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            Yes
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="admitted" @if($data_form->admitted === "No") checked="yes" @endif value="No" class="card-input-red card-input-element d-none">
                                    <div class="card text-danger card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            No
                                        </b>
                                    </div>
                                </label>
                            </div>


                            <div class="mr-3 container-input">
                                <div class="separater-section text-center m-0 text-scuess"> <span>อาการ</span>
                                    <hr>
                                </div>

                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "ทุเลา") checked="yes" @endif value="ทุเลา" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ทุเลา
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "รักษาต่อที่อื่น") checked="yes" @endif value="รักษาต่อที่อื่น" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            รักษาต่อที่อื่น
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "ยังรักษาต่อในรพ.") checked="yes" @endif value="ยังรักษาต่อในรพ." class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ยังรักษาต่อในรพ.
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "เสียชีวิตใน รพ.") checked="yes" @endif value="เสียชีวิตใน รพ." class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            เสียชีวิตใน รพ.
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "ปฎิเสธการรักษา/หนีกลับ") checked="yes" @endif value="ปฎิเสธการรักษา/หนีกลับ" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ปฎิเสธการรักษา/หนีกลับ
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "กลับไปตายบ้าน") checked="yes" @endif value="กลับไปตายบ้าน" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            กลับไปตายบ้าน
                                        </b>
                                    </div>
                                </label>
                                <label class="m-2">
                                    <input type="radio" name="treatment_effect" @if($data_form->treatment_effect === "ตามแล้วไม่ทราบผล") checked="yes" @endif value="ตามแล้วไม่ทราบผล" class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center ">
                                        <b>
                                            ตามแล้วไม่ทราบผล
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        <script>
            let initialFormData = new FormData(document.querySelector('form'));
            let isInitialCall_splint_by_doctor = false;
            let isInitialCall_hemostasis_by_doctor = false;
            let isInitialCall_respiratory_tract_by_doctor = false;
            let isAnimating = true;

            let currentIndex = 0;
            const dataMap = {};

            const buttons_show_content = document.querySelectorAll('.btn-show-content');
            const contents = document.querySelectorAll('.menu-content');
            console.log(buttons_show_content);

            // เลือกเปลี่ยนข้อ ตรวจสอบการแก้ไขและส่งไปบันทึก
            buttons_show_content.forEach((button, index) => {
                button.addEventListener('click', () => {
                    const currentFormData = new FormData(document.querySelector('form'));

                    if (formDataHasChanged(initialFormData, currentFormData)) {
                        saveFormData(currentIndex, currentFormData);

                        initialFormData = currentFormData;
                    }

                    // ซ่อนทุก div ของเมนู
                    contents.forEach(content => {
                        content.style.display = 'none';
                    });

                    // ลบคลาส 'active' จากทุกปุ่ม
                    buttons_show_content.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    // แสดง div ที่เกี่ยวข้องกับปุ่มที่ถูกคลิก
                    contents[index].style.display = 'block';

                    // เพิ่มคลาส 'active' ให้กับปุ่มที่ถูกคลิก
                    button.classList.add('active');

                    // อัพเดต currentIndex เป็นตำแหน่งปัจจุบัน
                    currentIndex = index;
                });
            });

            // ตรวจสอบว่ามีการแก้ไข form ในหน้านั้นไหม สำหรับปุ่มหัวข้อด้านบน
            function formDataHasChanged(formData1, formData2) {
                // แปลง FormData เป็น JSON และเปรียบเทียบ
                const formDataToObject = (formData) => {
                    const obj = {};
                    for (const [key, value] of formData.entries()) {
                        if (key in obj) {
                            if (!Array.isArray(obj[key])) {
                                obj[key] = [obj[key]];
                            }
                            obj[key].push(value);
                        } else {
                            obj[key] = value;
                        }
                    }
                    return obj;
                }

                const json1 = JSON.stringify(formDataToObject(formData1));
                const json2 = JSON.stringify(formDataToObject(formData2));
                return json1 !== json2;
            }


            // บันทึกข้อมูล
            function saveFormData(index, formData) {
                console.log(`บันทึกข้อมูลของหมวดหมู่ที่ ${index + 1} ลงในฐานข้อมูล`);

                const dataArray = [];
                const dataMap = {};

                const categoryInputs = document.querySelectorAll('.menu-content')[index].querySelectorAll('input[name], textarea');

                categoryInputs.forEach(input => {
                    if (input.type === 'checkbox') {
                        if (input.checked) {
                            if (!dataMap[input.name]) {
                                dataMap[input.name] = [input.value];
                            } else {
                                dataMap[input.name].push(input.value);
                            }
                        } else {
                            // ถ้า checkbox ถูก unchecked ให้เพิ่มค่าว่างลงใน dataArray
                            if (!dataMap[input.name]) {
                                dataMap[input.name] = [''];
                            }
                        }
                    } else if (input.type === 'radio' && input.checked) {
                        const inputData = {
                            name: input.name,
                            value: input.value
                        };
                        dataArray.push(inputData);
                    } else if (input.type !== 'radio' && input.type !== 'checkbox') {
                        const inputData = {
                            name: input.name,
                            value: input.value
                        };
                        dataArray.push(inputData);
                    }
                });

                for (const name in dataMap) {
                    if (dataMap.hasOwnProperty(name)) {
                        if (dataMap[name].length === 1 && dataMap[name][0] === '') {
                            dataArray.push({
                                name,
                                value: ''
                            });
                        } else {
                            const value = dataMap[name].join(',');
                            dataArray.push({
                                name,
                                value
                            });
                        }
                    }
                }
                console.log(dataArray);


                // เริ่ม Fetch request เพื่อบันทึกข้อมูล

                fetch("{{ url('/') }}/api/update_data_form_officer?sos_id=" + '{{ $data_form->sos_help_center_id }}' + "&user_id=" + '{{ Auth::user()->id }}' + "&form_color_id=" + '{{ $data_form->id }}' + "&idPatient=" + '{{ $idPatient }}', {
                    method: 'post',
                    body: JSON.stringify(dataArray), // ส่งอาร์เรย์ข้อมูลในรูปแบบ JSON
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function(response) {}).then(function(data) {
                    console.log(data);
                    saveData();
                    checkPercentages()
                }).catch(function(error) {
                    // console.error(error);
                });

            }

            // เลื่อนเมนูเมื่อมีการเลือก และoverflow
            const menuContainer = document.getElementById("menuContainer");
            const buttons = menuContainer.querySelectorAll("button");

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    // เลื่อน .menu-form ไปทางซ้ายโดยตำแหน่งของปุ่มที่ถูกคลิก
                    menuContainer.scrollTo({
                        left: button.offsetLeft - 16, // 16 คือ margin หรือ padding ทางซ้ายของ .menu-form
                        behavior: "smooth", // เพื่อให้มีการเลื่อนแบบนุ่มนวล
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', (event) => {
                [1, 2, 3].forEach(check_type_people);

                checkPercentages()
                check_insurance();
                check_respiratory_tract_by_doctor();
                check_hemostasis_by_doctor();
                check_splint_by_doctor();
                check_role_doctor();
            });

            function check_insurance() {
                var check_insurance = document.getElementsByName('insurance');
                var insurance_country = document.querySelector('#insurance_country');
                //ประเภทรถ
                var insurance_type_car = document.querySelector('#insurance_type_car');
                //ทะเบียนรถหมวด
                var registration_category_yellow = document.querySelector('#registration_category_yellow');
                //เลขทะเบียน
                var registration_number_yellow = document.querySelector('#registration_number_yellow');
                //จังหวัด
                var registration_province_yellow = document.querySelector('#registration_province_yellow');
                // เช็คว่าเลือกคนประเทศใด หัวข้อประกันอื่นๆ ->หน้า 3
                for (var i = 0, length = check_insurance.length; i < length; i++) {
                    if (check_insurance[i].checked) {
                        if (check_insurance[i].value == "ประกันท่องเที่ยว") {
                            document.querySelector('#div_insurance_country').classList.remove('d-none');
                            document.querySelector('#div_insurance_type_car').classList.add('d-none');
                            document.querySelector('#div_insurance_type_license_plate').classList.add('d-none');
                            document.querySelector('#div_insurance_license_plate').classList.add('d-none');
                            document.querySelector('#div_insurance_province').classList.add('d-none');
                            document.querySelector('#div_insurance_country').classList.add('show-data');
                            insurance_type_car.value = null;
                            registration_category_yellow.value = null;
                            registration_number_yellow.value = null;
                            registration_province_yellow.value = null;

                        } else {
                            document.querySelector('#div_insurance_country').classList.add('d-none');
                            document.querySelector('#div_insurance_type_car').classList.add('show-data');
                            document.querySelector('#div_insurance_type_car').classList.remove('d-none');
                            document.querySelector('#div_insurance_type_license_plate').classList.add('show-data');
                            document.querySelector('#div_insurance_type_license_plate').classList.remove('d-none');
                            document.querySelector('#div_insurance_license_plate').classList.add('show-data');
                            document.querySelector('#div_insurance_license_plate').classList.remove('d-none');
                            document.querySelector('#div_insurance_province').classList.add('show-data');
                            document.querySelector('#div_insurance_province').classList.remove('d-none');
                            insurance_country.value = null;
                        }
                        break;
                    }
                }
            }

            function check_type_people(id) {
                let check_people_type = document.getElementsByName('people_type_' + id);
                let people_country = document.querySelector('#people_country_' + id);
                let passport = document.querySelector('#passport_' + id);
                let passport_foreigner = document.querySelector('#passport_foreigner_' + id);
                let country_foreigner = document.querySelector('#country_foreigner_' + id);
                // เช็คว่าเลือกคนประเทศใด แล้วเปิดช่อง input -> หน้า 3
                for (var i = 0, length = check_people_type.length; i < length; i++) {
                    if (check_people_type[i].checked) {
                        if (check_people_type[i].value == "คนไทย") {
                            passport_foreigner.classList.add('d-none');
                            country_foreigner.classList.add('d-none');
                            people_country.value = null;
                            passport.value = null;
                        } else if (check_people_type[i].value == "ชาวต่างชาติ") {
                            passport_foreigner.classList.remove('d-none');
                            passport_foreigner.classList.add('show-data');
                            country_foreigner.classList.remove('d-none');
                            country_foreigner.classList.add('show-data');

                        } else {
                            passport_foreigner.classList.add('d-none');
                            country_foreigner.classList.add('d-none');
                            people_country.value = null;
                            passport.value = null;
                        }
                        break;
                    }
                }
            }

            // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อทางเดินหายใจ เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
            function check_respiratory_tract_by_doctor() {
                let respiratory_tract_by_doctor = document.querySelector('#respiratory_tract_by_doctor');
                let respiratory_tract_by_doctor_detail = document.querySelector('#respiratory_tract_by_doctor_detail');

                if (respiratory_tract_by_doctor.checked) {
                    document.querySelector('#btn_respiratory_tract_by_doctor').classList.remove('d-none');
                    // document.querySelector('#btn_respiratory_tract_by_doctor').click();

                    if (isInitialCall_respiratory_tract_by_doctor) {
                        $('#modal_respiratory_tract_by_doctor').modal('show');
                    }
                    respiratory_tract_by_doctor_detail.focus();


                } else {
                    document.querySelector('#btn_respiratory_tract_by_doctor').classList.add('d-none');
                    respiratory_tract_by_doctor_detail.value = null;

                }

                isInitialCall_respiratory_tract_by_doctor = true;
            }

            // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อการห้ามเลือด เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
            function check_hemostasis_by_doctor() {
                let hemostasis_by_doctor = document.querySelector('#hemostasis_by_doctor');
                let hemostasis_by_doctor_detail = document.querySelector('#hemostasis_by_doctor_detail');

                if (hemostasis_by_doctor.checked) {
                    document.querySelector('#btn_hemostasis_by_doctor').classList.remove('d-none');
                    // document.querySelector('#btn_hemostasis_by_doctor').click();
                    if (isInitialCall_hemostasis_by_doctor) {
                        $('#modal_hemostasis_by_doctor').modal('show');
                    }
                    hemostasis_by_doctor_detail.focus();
                    isInitialCall = true;

                } else {
                    document.querySelector('#btn_hemostasis_by_doctor').classList.add('d-none');
                    hemostasis_by_doctor_detail.value = null;

                }
                isInitialCall_hemostasis_by_doctor = true;

            }

            // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อดามกระดูก เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
            function check_splint_by_doctor() {
                let splint_by_doctor = document.querySelector('#splint_by_doctor');
                let splint_by_doctor_detail = document.querySelector('#splint_by_doctor_detail');

                if (splint_by_doctor.checked) {
                    document.querySelector('#btn_splint_by_doctor').classList.remove('d-none');

                    if (isInitialCall_splint_by_doctor) {
                        $('#modal_splint_by_doctor').modal('show');
                    }


                    splint_by_doctor_detail.focus();
                } else {
                    document.querySelector('#btn_splint_by_doctor').classList.add('d-none');
                    splint_by_doctor_detail.value = null;
                }
                isInitialCall_splint_by_doctor = true;

            }

            // ถ้าเลือก ตำแหน่งอื่นๆ เปิดช่อง input ให้กรอก -> อยู่ข้อ 6
            function check_role_doctor() {
                var role_doctor = document.querySelector('#role_doctor');
                var role_other = document.querySelector('#role_other');

                if (role_doctor.checked) {
                    role_other.disabled = false;

                } else {
                    role_other.disabled = true;
                    role_other.value = null;
                }
            }
        </script>
        <script>
            // ตรวจสอบว่า radio หรือ checkbox ในข้อนั้นๆถูกเลือกหรือยัง
            $('input[type="radio"], input[type="checkbox"]').change(function() {
                var separaterSection = $(this).closest('.container-input').find('.separater-section span');

                // ตรวจสอบว่า input ถูกเลือกหรือไม่
                if ($(this).is(':checked')) {
                    // เพิ่ม class text-success ใน span ที่อยู่ใน separater-section
                    separaterSection.addClass('text-success');
                } else {
                    // ลบ class text-success ออกจาก span ที่อยู่ใน separater-section
                    separaterSection.removeClass('text-success');
                }
            });
        </script>

        <script>
            // เปลี่ยนหน้าด้วยปุ่ม ต่อไป กลับ
            function changePage(offset) {
                if (currentIndex + offset >= 0 && currentIndex + offset < contents.length) {
                    const targetIndex = currentIndex + offset;

                    // ตรวจสอบการเปลี่ยนแปลงในฟอร์มก่อนเปลี่ยนหน้า
                    const currentFormData = new FormData(document.querySelector('form'));
                    if (formDataHasChanged(initialFormData, currentFormData)) {
                        // บันทึกข้อมูลก่อนเปลี่ยนหน้า
                        saveFormData(currentIndex, currentFormData);
                    }

                    // เปลี่ยนหน้า
                    contents[currentIndex].style.display = 'none';
                    currentIndex = targetIndex;
                    contents[currentIndex].style.display = 'block';

                    // ลบคลาส "active" จากทุกปุ่มเมนู
                    buttons_show_content.forEach(btn => {
                        btn.classList.remove("active");
                    });

                    // เพิ่มคลาส "active" ให้กับปุ่มที่ถูกคลิก
                    buttons_show_content[currentIndex].classList.add("active");

                    // อัพเดต initialFormData เป็นค่าล่าสุดหลังจากการเปลี่ยนหน้า
                    initialFormData = new FormData(document.querySelector('form'));
                }
            }
            // เปรียบเทียบสองอาร์เรย์ว่าเหมือนหรือไม่
            function arraysEqual(arr1, arr2) {
                if (arr1.length !== arr2.length) return false;
                for (let i = 0; i < arr1.length; i++) {
                    if (arr1[i] !== arr2[i]) return false;
                }
                return true;
            }


            // animatin save button
            function saveData() {

                if (isAnimating) {
                    isAnimating = false;

                    document.querySelector('.text-save-btn').classList.remove('v-btn-label-enter-active');
                    document.querySelector('.text-save-btn').classList.add('v-btn-label-leave-active');

                    setTimeout(() => {
                        document.querySelector('.text-save-btn').classList.add('d-none');


                        document.querySelector('.text-save-btn').classList.remove('v-btn-label-leave-active');
                        document.querySelector('.spinner-save-btn').classList.remove('d-none');
                        document.querySelector('.spinner-save-btn').classList.add('v-btn-label-enter-active');
                    }, 200);

                    setTimeout(() => {
                        document.querySelector('.spinner-save-btn').classList.add('v-btn-label-leave-active');
                    }, 1280);

                    setTimeout(() => {
                        document.querySelector('.spinner-save-btn').classList.add('d-none');
                        document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-enter-active');
                        document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-leave-active');

                        document.querySelector('.icon-save-btn').classList.add('v-btn-label-enter-active');
                        document.querySelector('.icon-save-btn').classList.remove('d-none');
                    }, 1500);

                    setTimeout(() => {
                        document.querySelector('.icon-save-btn').classList.add('v-btn-label-leave-active');
                    }, 2000);

                    setTimeout(() => {
                        document.querySelector('.icon-save-btn').classList.add('d-none');
                        document.querySelector('.icon-save-btn').classList.remove('v-btn-label-enter-active');
                        document.querySelector('.icon-save-btn').classList.remove('v-btn-label-leave-active');
                        document.querySelector('.text-save-btn').classList.remove('d-none');
                        document.querySelector('.text-save-btn').classList.add('v-btn-label-enter-active');
                        isAnimating = true;
                    }, 2200);
                }
            }

            // ส่งบันทึกหน้าปัจจุบัน
            function saveCurrentPage() {
                // สร้างออบเจ็กต์ FormData สำหรับข้อมูลปัจจุบันในหน้าที่ถูกคลิก
                const currentFormData = new FormData(document.querySelector('form'));

                // เปรียบเทียบข้อมูลปัจจุบันกับข้อมูลเริ่มต้น
                if (formDataHasChanged(initialFormData, currentFormData)) {
                    // ถ้ามีการเปลี่ยนแปลงข้อมูล ให้บันทึกข้อมูลด้วย currentIndex
                    saveFormData(currentIndex, currentFormData);

                    // อัพเดตข้อมูลเริ่มต้นให้เป็นข้อมูลปัจจุบัน
                    initialFormData = currentFormData;
                }
            }
           
            function checkPercentages(status) {


                let arr = {
                    "user_id": '{{ Auth::user()->id }}',
                    "sos_id": '{{ $data_form->sos_help_center_id }}',
                    "idPatient": '{{ $idPatient }}',
                };
                fetch("{{ url('/') }}/api/check_percentage_sos", {
                    method: 'post',
                    body: JSON.stringify(arr),
                    headers: {
                        "Content-Type": "application/json"
                    }
                }).then(function(response) {
                    return response.json(); // เรียก .json() บน response
                }).then(function(data) {
                    // นับจำนวนคุณสมบัติที่ไม่ใช่ null หรือ undefined
                    let nonNullCount = 0;

                    let idPatient = '{{ $idPatient }}';
                    if (data.name_title) nonNullCount++;
                    if (data['patient_name_' + idPatient]) nonNullCount++;
                    if (data['patient_vn_' + idPatient]) nonNullCount++;
                    if (data['delivered_hospital_' + idPatient]) nonNullCount++;
                    if (data['patient_hn_' + idPatient]) nonNullCount++;
                    if (data.treatment_rights) nonNullCount++;
                    if (data.er) nonNullCount++;
                    if (data.admitted) nonNullCount++;
                    if ('{{ $data_form->time_create_sos}}') nonNullCount++;
                    if ('{{ $data_form->time_command}}') nonNullCount++;
                    if ('{{ $data_form->time_go_to_help}}') nonNullCount++;
                    if ('{{ $data_form->time_to_the_scene }}') nonNullCount++;
                    if ('{{ $data_form->time_leave_the_scene }}') nonNullCount++;
                    if ('{{ $data_form->time_hospital }}') nonNullCount++;
                    if ('{{ $data_form->time_to_the_operating_base }}') nonNullCount++;


                    // คำนวณเปอร์เซ็นต์
                    let totalProperties = 15; // จำนวนคุณสมบัติทั้งหมด


                    let percentage = Math.round(nonNullCount / totalProperties * 100);


                    const resultElement = document.getElementById('result');
                    const persensuccessElement = document.querySelector('.persen-success');

                    let currentPercentage = 0;
                    const updateInterval = 10; // ระยะเวลาในการอัปเดตเปอร์เซ็นต์

                    const updatePercentage = () => {
                        if (currentPercentage < percentage) {
                            currentPercentage += 1;
                            resultElement.innerHTML = `${currentPercentage}%`;
                        } else {
                            clearInterval(intervalId);
                        }

                        if(currentPercentage === 100){
                            if (status == "ยืนยัน" || status == "ยกเลิกยืนยัน") {
                                btn_verified_status(status);
                            }
                        }

                        if (currentPercentage === 100) {
                            persensuccessElement.classList.add('btn-success');
                            document.querySelector('#result_percentage').classList.add('d-none');
                            document.querySelector('#btn_verified_status_form').classList.remove('d-none');
                            if (data.verified_status == "Yes") {
                                document.querySelector('#btn_verified_status_form').innerHTML= "ยืนยันเรียบร้อยแล้ว";
                                document.querySelector("#btn_verified_status_form").disabled = true;
                                document.querySelector("#btn_cancle_status_form").classList.remove('d-none');

                            }
                        } else {
                            persensuccessElement.classList.remove('btn-success');
                            document.querySelector('#result_percentage').classList.remove('d-none');
                            document.querySelector('#btn_verified_status_form').classList.add('d-none');
                        }
                    };



                    const intervalId = setInterval(updatePercentage, updateInterval);



                });
            }

            // $(document).ready(function() {
            //     $(window).on("scroll", function() {
            //         if ($(this).scrollTop() > 300) {
            //             document.querySelector('.menu-form-sos').classList.add('show');
            //         } else {
            //             document.querySelector('.menu-form-sos').classList.remove('show');
            //         }
            //     });
            //     $('.menu-form-sos').on("click", function() {
            //         document.querySelector('.menu-form-sos').classList.toggle('active');
            //     });
            // });
            function btn_verified_status(status) {
                Swal.fire({
                    title: 'ต้องการ'+status+'ข้อมูลใช่หรือไม่?',
                    text: "โปรดตรวจสอบความถูกต้องก่อนยืนยัน",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#27c837',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน'
                }).then((result) => {
                    let arr = {
                        "form": 'blue',
                        "id": '{{$data_form->id}}',
                        "status": status,
                    };
                    let id = '{{$data_form->id}}';
                    // console.log(arr)
                    fetch("{{ url('/') }}/api/verified_status_form", {
                        method: 'post',
                        body: JSON.stringify(arr),
                        headers: {
                            "Content-Type": "application/json"
                        }
                    }).then(function(response) {
                        return response.json(); // เรียก .json() บน response
                    }).then(function(data) {

                        // console.log(data);
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data + 'เรียบร้อย',
                                showConfirmButton: false,
                                timer: 1500
                            })     

                            if (data == "ยืนยัน") {
                                 document.querySelector("#btn_verified_status_form").innerHTML = "ยืนยันเรียบร้อย";
                                 document.querySelector("#btn_verified_status_form").disabled = true;
                                document.querySelector("#btn_cancle_status_form").classList.remove('d-none');
                            }else{
                                document.querySelector("#btn_verified_status_form").innerHTML = "ยืนยันข้อมูล";
                                 document.querySelector("#btn_verified_status_form").disabled = false;
                                document.querySelector("#btn_cancle_status_form").classList.add('d-none');

                            }
                        }
                    });
                })
            }
        </script>

        @endsection