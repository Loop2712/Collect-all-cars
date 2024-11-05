@extends('layouts.viicheck')
{{-- @extends('layouts.partners.theme_partner_new') --}}

@section('content')

<style>
    footer,
    header,
    #topbar {
        display: none !important;
    }

    /* Carousel */
    .owl-nav {
        position: absolute;
        top: 60%;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .owl-nav button {
        background: none;
        border: none;
        font-size: 3rem;
    }

    .owl-nav .owl-prev {
        position: absolute;
        left: -15px;
        transform: translateY(-50%);
    }

    .owl-nav .owl-next {
        position: absolute;
        right: -15px;
        transform: translateY(-50%);
    }

    /* End Carousel */

     /* Next & previous buttons */
     .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: #fff !important;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
        background-color: rgba(0, 0, 0, 0.2);
    }


    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 24px;
        padding: 8px 20px;
        position: absolute;
        top: 5px;
        left: 5px;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 50px;
    }

    /* The Modal (background) */
    .modal-light-box.modal {
        display: none;
        position: fixed !important;
        z-index: 999999999999999999999999999999999999999999999999999999 !important;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-light-box .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .mySlides img {
        opacity: 1;
        border-radius: 0;
    }

    .mySlides img:hover {
        opacity: 1;
    }


    .cursor {
        cursor: pointer;
    }

    /*End modal */

    select option {
        background: white !important;
        color: #212925 !important;
    }

    /* #cardInfo{
        background-color: #deeef8;
    }
    #cardOfficer{
        background-color: #f5dfcd;
    } */


    /* input[type="datetime-local"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        display: none;
    } */

    .bg_warning_missed_data{
        background-color: #f37151;
    }

    .img-box {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .img-item {
        width: 75px;
        height: 75px;
        border-radius: 10px;
        border: rgb(14, 16, 17, .25) 1px solid;
        cursor: pointer;
        position: relative;

    }

    .icon-img-item {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
        z-index: 1;
    }
    .img-preview{
        background-color: #fff !important;
    }

    #glightbox-body{
        /* display: none !important; */
    }

</style>

<link rel="stylesheet" href="path/to/owl.carousel.min.css">
<link rel="stylesheet" href="path/to/owl.theme.default.min.css">

<!-- Modal ตารางงานช่าง -->
<div class="modal fade" id="modal_schedule" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_btn_open_modal_schedule" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title notranslate" id="Label_btn_open_modal_schedule">
                    <i class="fa-solid fa-calendar-days"></i> ตารางงาน
                </h5>
                <span type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body notranslate" id="modal_schedule_content">
                <!-- CONTENT -->
            </div>
            <hr>
            <div>
                <center>
                    <span style="width:35%;" type="button" class="btn btn-primary" data-dismiss="modal">ปิด</span>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Modal เพิ่มวัสดุ -->
<div class="modal fade" id="modal_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_btn_open_modal_material" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title notranslate" id="Label_btn_open_modal_material">
                    <i class="fa-solid fa-calendar-days"></i> เพิ่มวัสดุ
                </h5>
                <span id="modal_material_close_btn" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body notranslate" id="modal_material_content">
                <div id="material-inputs">
                    <div class="form-group d-flex justify-content-between material-row">
                        <input class="form-control" style="width: 70%;" type="text" name="material_name[]" placeholder="ชื่อ">
                        <input class="form-control" style="width: 25%;" type="number" name="material_quantity[]" placeholder="จำนวน">
                    </div>
                </div>
                <button type="button" class="btn btn-success" id="add-row"><i class="fa-solid fa-plus"></i></button>
            </div>
            <hr>
            <div>
                <center>
                    <span style="width:35%;" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</span>
                    <span style="width:35%;" type="button" class="btn btn-primary" id="save-materials" >บันทึก</span>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>



<div class="col-12 col-md-12 col-lg-12 my-4">
    <div id="cardInfo" class="card radius-10 mb-2">
        <div class="row p-4">

            <div class="d-flex my-3 justify-content-between flex-wrap">
                <div class="d-flex">
                    <i class="fa-regular fa-screwdriver-wrench me-1 text-dark" style="font-size: 22px;"></i>
                    <h4 class="mb-0 text-dark"><b>รายละเอียดการแจ้งซ่อม</b></h4>
                </div>
                <div>
                    @if($data_maintains->created_at)
                        <b style="font-size: 16px; color:#000000;">วันที่แจ้ง : <span style="font-weight: normal; color:#6c757d;">{{ thaidate("lที่ j F Y" , strtotime($data_maintains->created_at)) }} เวลา {{ thaidate("H:i" , strtotime($data_maintains->created_at)) }} น.</span></b>
                    @else
                        <b style="font-size: 16px; color:#000000;">วันที่แจ้ง : <span style="font-weight: normal; color:#6c757d;"> - </span></b>
                    @endif
                </div>
            </div>

            <div class="w-100 p-2">
                <p class="h5" style="font-weight: bold; color:#000000;">หมวดหมู่ : {{$data_maintains->name_categories ? $data_maintains->name_categories : "-"}}</p>
                <p class="h5 mr-2 " style="font-weight: bold; color:#000000;">หมวดหมู่ย่อย : <span class="text-danger">{{$data_maintains->name_subs_categories ? $data_maintains->name_subs_categories  : "-"}}</span></p>

                <p style="font-weight: bold;font-size: 18px; color:#000000;">รหัสอุปกรณ์ : <span class="text-primary">{{$data_maintains->device_code ? $data_maintains->device_code : "-"}}</span></p>
                <button id="btn_ModalReceipt_Officer" class="btn btn-danger d-none" data-bs-toggle="modal" data-bs-target="#imageModalOfficer">Modal Open</button>

                <div class=" row mt-4">
                    <div class="container mb-2">
                        <div class="row no-gutters mx-3">
                            <div class="owl-carousel deerCarousel owl-theme">
                                    @php
                                        $photos = is_array($data_maintains->photo) ? $data_maintains->photo : json_decode($data_maintains->photo, true);  // ตรวจสอบและแปลงข้อมูล photo ให้เป็น array
                                        $photosCount = count($photos);
                                    @endphp
                                    @foreach($photos as $item)

                                        {{-- <div class="gallery-item item ">
                                            <a class="galelry-lightbox">
                                                <img class="receipt_main_image" style="object-fit: cover; height: 150px;" src="{{ url('/').$item}}" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                            </a>
                                        </div> --}}

                                        <div class="gallery-item item">
                                            <a class="galelry-lightbox">
                                                <img class="receipt_main_image_officer" style="object-fit: cover; height: 150px;" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                            </a>
                                        </div>
                                    @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    /* The Modal (background) */
                    .modalReceipt.modal {
                        display: none;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: black;
                    }

                    /* Modal Content */
                    .modalReceipt .modal-content {
                        position: relative;
                        background-color: #fefefe;
                        margin: auto;
                        padding: 0;
                        width: 90%;
                        max-width: 1200px;
                    }

                    .btn-closes {
                        position: absolute;
                        top: 40px;
                        right: 20px;
                        transform: translate(-50%, -50%);
                        color: #fff !important;
                        z-index: 9999999;
                        font-size: 40px;
                        background-color: transparent;
                        border: none;
                    }

                    .BTNprev,
                    .BTNnext {
                        position: absolute;
                        cursor: pointer;
                        position: absolute;
                        top: 50%;
                        width: auto;
                        padding: 16px;
                        color: #fff !important;
                        font-weight: bold;
                        font-size: 20px;
                        transition: 0.6s ease;
                        border-radius: 0 3px 3px 0;
                        user-select: none;
                        -webkit-user-select: none;
                        background-color: rgba(0, 0, 0, 0.2);
                    }

                    .BTNprev {
                        left: 20px;

                    }

                    .BTNnext {
                        right: 20px;
                    }

                    .BTNprev:hover,
                    .BTNnext:hover {
                        background-color: rgba(0, 0, 0, 0.8);
                    }
                </style>
                <div class="modal fade h-100 modalReceipt" id="imageModalOfficer" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <button type="button" class="btn-closes" data-bs-dismiss="modal">&times;</button>
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content position-relative p-0" style="background-color: transparent;">

                            <div class="modal-body d-flex justify-content-center align-items-center p-0" style="width:100%;">
                                <img id="modal_main_image_receipt" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100 h-100 px-4 ">
                                <!-- <button type="button" class="prev" id="prevImageReceipt" style="width: 120px;">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                                <span id="imageCounterReceiptOfficer" class="numbertext " style="font-weight: bold; font-size:16px;"></span>
                                <button type="button" class="next" id="nextImageReceipt" style="width: 120px;">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button> -->
                                <span id="imageCounterReceiptOfficer" class="numbertext " style="font-weight: bold; font-size:16px;left: 25px;"></span>

                                <a class="BTNprev" id="prevImageReceipt">&#10094;</a>
                                <a class="BTNnext" id="nextImageReceipt">&#10095;</a>
                            </div>

                            <!-- <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" id="prevImageReceipt" style="width: 120px;">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                                <span id="imageCounterReceiptOfficer" class="mx-3 " style="font-weight: bold; font-size:16px;"></span>
                                <button type="button" class="btn btn-secondary" id="nextImageReceipt" style="width: 120px;">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>


                <div class="repair_detail row">
                    <div class="col-12 col-md-4 mb-2">
                        <div>
                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">ปัญหา : <b class="text-secondary">{{ $data_maintains->title ? $data_maintains->title : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">รายละเอียด : <b class="text-secondary">{{ $data_maintains->detail_title ? $data_maintains->detail_title : "-" }}</b></p>
                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold; color:#000000;">สถานที่ : <b class="text-secondary">{{ $data_maintains->name_area ? $data_maintains->name_area : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">รายละเอียดสถานที่ : <b class="text-secondary">{{ $data_maintains->detail_location ? $data_maintains->detail_location : "-" }}</b></p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">ชื่อผู้แจ้ง : <b class="text-secondary">{{ $data_maintains->name_user ? $data_maintains->name_user : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">เบอร์ : <b class="text-secondary">{{ $data_maintains->phone_user ? $data_maintains->phone_user : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">E-Mail : <b class="text-secondary">{{ $data_maintains->mail_user ? $data_maintains->mail_user : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">ตำแหน่ง : <b class="text-secondary">{{ $data_maintains->position_user ? $data_maintains->position_user : "-" }}</b></p>
                            <p class="overflow-dot mb-0" style="font-weight: bold; color:#000000;">แผนก : <b class="text-secondary">{{ $data_maintains->department_user ? $data_maintains->department_user : "-" }}</b></p>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>


    <form id="form_create_officer_notis" method="POST" action="{{ url('/maintain_officer_Store'.'/'.$data_maintains->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="cardOfficer" class="card radius-10 mb-2">
            <div class="row p-4">
                <div style="text-align: right;">
                    <div class="dropdown float-end px-1">
                        <select required class="form-select btn-secondary" name="status" id="select_status_repair">
                            <option value="" {{ $data_maintains->status == '' ? 'selected' : '' }}>เลือกสถานะ</option>
                            <option value="รอดำเนินการ" class="text-warning" {{ $data_maintains->status == 'รอดำเนินการ' ? 'selected' : '' }}>รอดำเนินการ</option>
                            <option value="ไม่สามารถดำเนินการได้" class="text-danger" {{ $data_maintains->status == 'ไม่สามารถดำเนินการได้' ? 'selected' : '' }}>ไม่สามารถดำเนินการได้</option>
                            <option value="เสร็จสิ้น" class="text-success" {{ $data_maintains->status == 'เสร็จสิ้น' ? 'selected' : '' }}>เสร็จสิ้น</option>
                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="device_code" class="control-label">{{ 'รหัสอุปกรณ์' }}</label>
                    <input required class="form-control" name="device_code" type="text" id="device_code" value="{{ isset($data_maintains->device_code) ? $data_maintains->device_code : ''}}" >
                </div>
                <div class="form-group">
                    <div class="mx-auto mb-2">
                        <label for="datetime_start" class="control-label">{{ 'วันที่คาดว่าจะเริ่มดำเนินการ' }}</label>
                        <span class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modal_schedule" onclick="createWorkCalendar();"><i class="fa-solid fa-calendar-days"></i></span>
                    </div>
                    <input required class="form-control datepicker" name="datetime_start" type="datetime-local" id="datetime_start" placeholder="เลือกวันที่เริ่มดำเนินการ" value="{{ isset($data_maintains->datetime_start) ? $data_maintains->datetime_start : ''}}">
                </div>
                <div class="form-group">
                    <label for="datetime_end" class="control-label">{{ 'วันที่คาดว่าจะเสร็จสิ้น' }}</label>
                    <input required class="form-control datepicker" name="datetime_end" type="datetime-local" id="datetime_end" placeholder="เลือกวันที่เสร็จสิ้น" value="{{ isset($data_maintains->datetime_end) ? $data_maintains->datetime_end : ''}}">
                </div>

                <div class="form-group">
                    <div class="mx-auto mb-2">
                        <label for="material" class="control-label">{{ 'วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม ' }}</label>
                        <span class="btn btn-warning" style="float: right; "  data-toggle="modal" data-target="#modal_material" ><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <input readonly class="form-control" name="material" id="material" value="{{ isset($data_maintains->material) ? $data_maintains->material : ''}}" >
                </div>
                <div class="form-group ">
                    <label for="repair_costs" class="control-label">{{ 'ค่าใช้จ่ายในการซ่อม' }}</label>
                    <input class="form-control" name="repair_costs" type="text" id="repair_costs" value="{{ isset($data_maintains->repair_costs) ? $data_maintains->repair_costs : ''}}" >

                </div>
                <div class="form-group ">
                    <label for="photo_repair_costs" class="control-label">{{ 'หลักฐานค่าใช้จ่าย(ไม่เกิน 10 รูป)' }}</label>
                    {{-- <input required class="form-control" name="photo_repair_costs" type="text" id="photo_repair_costs" value="" > --}}

                </div>

                <div class="col-12">
                    {{-- <label for="inputAddress3" class="form-label">รูปภาพ</label> --}}
                    <div id="image-upload-container" class="img-box">
                        <label for="img1" class="img-item mb-5" id="img-label-1" style="display: block;">
                            <div class="icon-img-item">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <input class="d-none" type="file" name="photo_repair_costs[]" id="img1" accept="image/*" onchange="previewImage(this, 'preview1', 1)">
                            <img id="preview1" class="img-preview" alt="Image Preview" style="background-color: #fff; display:none; width: 100%; height:100%; object-fit: contain; z-index: 2; position: relative;" />
                            <button type="button" class="mt-1 btn btn-danger btn-sm w-100" id="remove-btn-1" onclick="removeImage(1)" style="display: none;">ลบรูป</button>
                        </label>
                    </div>
                </div>

                <script>
                    let imgCount = 1; // จำนวน input ที่ใช้งาน
                    let maxImages = 10; // จำนวนสูงสุดของรูปภาพ

                    function previewImage(input, previewId, count) {
                        const preview = document.getElementById(previewId);
                        const removeBtn = document.getElementById(`remove-btn-${count}`);

                        // รีเซ็ตค่าของ preview ก่อนที่จะโหลดใหม่
                        preview.style.display = 'none';
                        preview.src = '';

                        const file = input.files[0];

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';

                                // แสดงปุ่มลบเมื่อมีการเพิ่มรูปภาพ
                                removeBtn.style.display = 'block';

                                // ปิดการใช้งาน input หลังจากเลือกไฟล์แล้ว
                                input.disabled = true;

                                // เพิ่ม input ถัดไปถ้ายังไม่เกิน 10 ช่อง
                                if (document.querySelectorAll('.img-item').length < maxImages) {
                                    addImageUploadField();
                                }
                            };

                            reader.readAsDataURL(file);
                        }
                    }

                    function addImageUploadField() {
                        const container = document.getElementById('image-upload-container');

                        // ตรวจสอบว่ามีช่องเพิ่มรูปอยู่หรือยัง ถ้ายังไม่มีค่อยเพิ่ม
                        if (!document.querySelector('.img-item input:not([disabled])')) {
                            imgCount++; // เพิ่มตัวนับ imgCount ทุกครั้งที่สร้าง input ใหม่
                            const newLabel = document.createElement('label');
                            newLabel.setAttribute('for', `img${imgCount}`);
                            newLabel.setAttribute('class', 'img-item mb-5');
                            newLabel.setAttribute('id', `img-label-${imgCount}`);

                            // ใช้ imgCount ในการสร้าง ID ที่ไม่ซ้ำกัน
                            newLabel.innerHTML = `
                                <div class="icon-img-item">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <input class="d-none" type="file" name="photos[]" id="img${imgCount}" accept="image/*" onchange="previewImage(this, 'preview${imgCount}', ${imgCount})">
                                <img id="preview${imgCount}" class="img-preview" alt="Image Preview" style="display:none; width: 100%; height:100%; object-fit: contain; z-index: 2; position: relative;" />
                                <button type="button" class="mt-1 btn btn-danger btn-sm w-100" id="remove-btn-${imgCount}" onclick="removeImage(${imgCount})" style="display: none;">ลบรูป</button>
                            `;

                            container.appendChild(newLabel); // เพิ่มกล่อง input ใหม่ลงใน container
                        }

                        console.log(container);
                    }

                    function removeImage(count) {
                        const labelToRemove = document.getElementById(`img-label-${count}`);
                        if (labelToRemove) {
                            labelToRemove.remove(); // ลบ label ที่มีรูปภาพ
                            // ตรวจสอบว่าต้องเพิ่มช่องเพิ่มรูปไหม ถ้าไม่มีแล้วให้เพิ่ม 1 ช่อง
                            if (document.querySelectorAll('.img-item').length < maxImages) {
                                addImageUploadField();
                            }
                        }
                    }

                    // ฟังก์ชันนี้จะเรียกใช้เมื่อหน้าโหลดขึ้น
                    function loadOldImages(images) {
                        images.forEach((image, index) => {
                            // สร้าง input ใหม่ให้กับรูปภาพแต่ละอัน
                            const imgInput = document.createElement('input');
                            imgInput.type = 'file';
                            imgInput.name = 'photo_repair_costs[]';
                            imgInput.id = `img${index + 1}`;
                            imgInput.accept = 'image/*';
                            imgInput.disabled = true; // ปิดการใช้งาน input เพราะเป็นการโหลดภาพเก่า

                            // สร้าง label สำหรับรูปภาพ
                            const newLabel = document.createElement('label');
                            newLabel.setAttribute('for', imgInput.id);
                            newLabel.setAttribute('class', 'img-item mb-5');
                            newLabel.setAttribute('id', `img-label-${index + 1}`);

                            // สร้าง tag img สำหรับแสดงตัวอย่าง
                            const imgPreview = document.createElement('img');
                            imgPreview.id = `preview${index + 1}`;
                            imgPreview.classList.add('img-preview');
                            imgPreview.src = `{{ url('/') }}/${image}`; // กำหนด src ของรูปภาพ
                            imgPreview.style.display = 'block'; // แสดงภาพ
                            imgPreview.style.width = '100%'; // กำหนดขนาด
                            imgPreview.style.height = '100%';
                            imgPreview.style.objectFit = 'contain';
                            imgPreview.style.zIndex = '2';
                            imgPreview.style.position = 'relative';

                            // สร้างปุ่มลบ
                            const removeBtn = document.createElement('button');
                            removeBtn.type = 'button';
                            removeBtn.className = 'mt-1 btn btn-danger btn-sm w-100';
                            removeBtn.id = `remove-btn-${index + 1}`;
                            removeBtn.style.display = 'block'; // แสดงปุ่มลบ
                            removeBtn.onclick = () => removeImage(index + 1);
                            removeBtn.innerText = 'ลบรูป';

                            // เพิ่ม input, img, และ button เข้าไปใน label
                            newLabel.appendChild(imgInput);
                            newLabel.appendChild(imgPreview);
                            newLabel.appendChild(removeBtn);

                            // เพิ่ม label เข้าไปใน container
                            document.getElementById('image-upload-container').appendChild(newLabel);
                        });
                    }


                </script>

                <div class="form-group">
                    <label for="remark_officer" class="control-label">{{ 'ข้อคิดเห็นจากช่างหรือผู้รับผิดชอบ' }}</label>
                    <textarea class="form-control" name="remark_officer" type="text" id="remark_officer" value="{{ isset($data_maintains->remark_officer) ? $data_maintains->remark_officer : ''}}" ></textarea>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-md-4 mb-2 " style="float: right;">
            <button class="btn btn-success w-100" type="button" onclick="confirmSave()">บันทึก</button>
        </div>
    </form>
</div>

<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- fullCalendar -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<script>
    let officer_id = '{{$data_officer->id}}';
    console.log("officer_id :"+officer_id);
    document.addEventListener('DOMContentLoaded', function () {
        updateImageCounterInReceipt(); // ตั้งค่าเลขภาพเริ่มต้นตอนโหลดหน้า ของ ค่าใช้จ่ายในการซ่อม
        // getOldImageOfficer();
        // ดึงเฉพาะฟิลด์ที่มี required
        const requiredFields = document.querySelectorAll('form [required]');

        requiredFields.forEach(field => {
            // เมื่อมีการพิมพ์หรือเปลี่ยนค่าฟิลด์
            field.addEventListener('input', () => {
                if (field.value) {
                    field.classList.remove('is-invalid'); // ลบ class is-invalid เมื่อกรอกข้อมูลแล้ว
                }
            });
        });

        let dataMaintains = @json($data_maintains);
        console.log(dataMaintains);

        // เรียกใช้ฟังก์ชัน initDateTimePickers เมื่อลงโหลดหน้า
        window.onload = initDateTimePickers;

        let selectElement = document.getElementById('select_status_repair');
        // เรียกฟังก์ชันทันทีเมื่อโหลดหน้ามาเพื่ออัพเดต class
        updateClassBasedOnValue(selectElement);
        // เพิ่ม event listener สำหรับการเปลี่ยนค่าใน select
        selectElement.addEventListener('change', function() {
            updateClassBasedOnValue(selectElement);
        });

    });

    function getOldImageOfficer (){
        console.log("getOldImageOfficer");
        fetch("{{ url('/') }}/api/WorkCalendar/" + officer_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if (Array.isArray(result.photo_repair_costs)) {
                    loadOldImages(result.photo_repair_costs);
                } else {
                    console.error("photo_repair_costs data is not in expected format:", result.photo_repair_costs);
                }
            });

    }

    // ฟังก์ชันนี้จะทำให้ datepicker ขึ้นเมื่อคลิกที่ input
    function initDateTimePickers() {
        // เลือก input ทั้งหมดที่มี class 'datepicker'
        const datePickers = document.querySelectorAll('.datepicker');

        datePickers.forEach(picker => {
            picker.addEventListener('focus', function() {
                this.showPicker(); // เรียกใช้ฟังก์ชัน showPicker สำหรับ input type datetime-local
            });
        });
    }

    function updateClassBasedOnValue(selectElement) { //ฟังก์ชันสำหรับตัวเปลี่ยนสถานะ
        if (selectElement.value == "ไม่สามารถดำเนินการได้") {
            selectElement.setAttribute('class', 'form-select btn-danger');
        } else if (selectElement.value == "รอดำเนินการ") {
            selectElement.setAttribute('class', 'form-select btn-warning text-dark');
        } else if (selectElement.value == "เสร็จสิ้น") {
            selectElement.setAttribute('class', 'form-select btn-success');
        } else {
            selectElement.setAttribute('class', 'form-select btn-secondary');
        }
    }

    $('.deerCarousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    let currentImageIndexReceiptOfficer = 0;
    const receipt_OfficerThumbnail = document.querySelectorAll('.receipt_main_image_officer');
    const totalImagesInReceiptOfficer = receipt_OfficerThumbnail.length; // จำนวนทั้งหมดของภาพ
    const imageCounterReceiptOfficer = document.getElementById('imageCounterReceiptOfficer'); // ตัวแสดงเลขภาพ

    function updateImageCounterInReceipt() {
        imageCounterReceiptOfficer.textContent = `${currentImageIndexReceiptOfficer + 1}/${totalImagesInReceiptOfficer}`;
    }

    function changeImage_receipt(element) {
        var main_image_receipt = document.getElementById('modal_main_image_receipt');
        main_image_receipt.src = element.src;

        document.querySelector('#modal_main_image_receipt').src = element.src;

        // Remove 'active' class from all thumbnails
        receipt_OfficerThumbnail.forEach(function(receipt_thumbnail) {
            receipt_thumbnail.classList.remove('active');
        });

        // Add 'active' class to the clicked thumbnail
        element.classList.add('active');

        // Update current image index
        currentImageIndexReceiptOfficer = Array.from(receipt_OfficerThumbnail).indexOf(element);

        updateImageCounterInReceipt();

        document.querySelector('#btn_ModalReceipt_Officer').click();
    }

    function showImageByIndex_receipt(indexReceipt) {
        if (indexReceipt >= 0 && indexReceipt < receipt_OfficerThumbnail.length) {
            const thumbnailReceipt = receipt_OfficerThumbnail[indexReceipt];
            changeImage_receipt(thumbnailReceipt);
            currentImageIndexReceiptOfficer = indexReceipt;
        }
    }

    document.getElementById('nextImageReceipt').addEventListener('click', function() {
        showImageByIndex_receipt(currentImageIndexReceiptOfficer + 1);
        console.log("arrow right");
    });

    document.getElementById('prevImageReceipt').addEventListener('click', function() {
        showImageByIndex_receipt(currentImageIndexReceiptOfficer - 1);
        console.log("arrow left");

    });

</script>

<script>
    // function validateFormFiles() {
    //     const fileInputs = document.querySelectorAll('.img-item input[type="file"]');
    //     let hasFile = Array.from(fileInputs).some(input => input.files.length > 0); // เช็คว่าอย่างน้อยมี input หนึ่งที่มีไฟล์

    //     if (!hasFile) {
    //         Swal.fire({
    //             icon: 'warning',
    //             title: 'กรุณาอัปโหลดรูปภาพอย่างน้อยหนึ่งรูป',
    //         });
    //     }

    //     return hasFile; // ถ้ามีไฟล์อย่างน้อยหนึ่งจะ return true
    // }

    // เก็บค่าเริ่มต้นของ select_status_repair
    let previousStatusValue = document.querySelector('#select_status_repair').value;

    function confirmSave() {
        const form_create_officer_notis = document.getElementById('form_create_officer_notis'); // อ้างอิงฟอร์มที่ต้องการส่ง

        // ดึงเฉพาะ input และ select ที่มี required
        const requiredFields = document.querySelectorAll('form [required]');
        let isValid = true;

        // ตรวจสอบว่าฟิลด์ที่ required กรอกครบหรือยัง
        requiredFields.forEach((field) => {
            if (!field.value) {
                isValid = false;
                field.classList.add('is-invalid'); // เพิ่ม class สำหรับแสดงเตือนฟิลด์ที่ยังไม่ได้กรอก
            } else {
                field.classList.remove('is-invalid'); // ลบ class หากกรอกแล้ว
            }
        });

        // ถ้ามีฟิลด์ที่ required แต่ยังไม่ได้กรอกครบ ให้แสดง SweetAlert เตือน
        if (!isValid) {
            Swal.fire({
                icon: "warning",
                title: "กรุณากรอกข้อมูลให้ครบถ้วน",
                confirmButtonText: "ตกลง"
            });
            return;
        }

        // if (!validateFormFiles()) {
        //     return; // ถ้าไม่มีไฟล์อัปโหลดหยุดการทำงาน
        // }

        Swal.fire({
            title: "ต้องการบันทึกการเปลี่ยนแปลงหรือไม่?",
            showDenyButton: true,
            showCancelButton: false,
            imageUrl: "{{url('img/stickerline/PNG/7.png')}}",
            imageWidth: 270,
            imageHeight: 220,
            imageAlt: "Custom image",
            confirmButtonText: "บันทึก",
            denyButtonText: `ไม่บันทึก`
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "บันทึกข้อมูลเรียบร้อย",
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then(() => {
                    // หลังจากแสดงการแจ้งเตือนเสร็จแล้ว จะทำการบันทึกค่าและส่ง form
                    previousStatusValue = document.querySelector('#select_status_repair').value; // อัปเดตค่าเมื่อบันทึก
                    const inputs = document.querySelectorAll('.img-item input[type="file"]');
                    // ลบ disabled ใน input ของรูปภาพก่อนส่งฟอร์ม
                    inputs.forEach(input => {
                        input.disabled = false; // ปล่อยให้ input ใช้งานได้
                    });

                    form_create_officer_notis.submit(); // ส่งฟอร์ม
                });
            } else if (result.isDenied) {
                Swal.fire({
                    icon: "info",
                    title: "ไม่บันทึกข้อมูล",
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                });
                // คืนค่ากลับไปเป็นค่าเดิม
                document.querySelector('#select_status_repair').value = previousStatusValue;
            }
        });
    }

    // ผูก event กับปุ่มบันทึกให้เรียก confirmSave แทนการ submit ปกติ
    document.querySelector("button[type='submit']").addEventListener("click", function (e) {
        e.preventDefault(); // ป้องกันการ submit ปกติ
        confirmSave(); // เรียกใช้งาน confirmSave
    });

</script>


<style>
    .fc-toolbar-title { /* อักษร header schedule */
        font-size: 1rem !important;
        font-family: 'Mitr', sans-serif !important;
    }

    .fc .fc-button { /* ปุ่ม header schedule */
        font-size: 0.75rem !important;
        font-family: 'Mitr', sans-serif !important;
    }

    .fc-list-event .fc-list-event-dot { /* ทำให้จุดสีหมวดหมู่ใน ตารางงานเจ้าหน้าที่ซ่อมอยู่กึ่งกลางบรรทัด*/
        margin-top: 0.4rem !important;
    }
</style>

<script>  //ฟังก์ชันสำหรับตารางงานเจ้าหน้าที่
    const createWorkCalendar = () => {
        fetch("{{ url('/') }}/api/WorkCalendar/" + officer_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let formattedDateNow = new Date().toISOString().split('T')[0];
                // ตรวจสอบขนาดหน้าจอ
                let initialView = window.innerWidth <= 768 ? 'listWeek' : 'dayGridMonth';

                let calendarEl = document.getElementById('modal_schedule_content');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'th', // Set locale to Thai

                    initialView: initialView, // ใช้มุมมองที่เหมาะสมตามขนาดหน้าจอ
                    initialDate: formattedDateNow,
                    // navLinks: true, // คลิ๊กที่เลขวันหรือเดือน เพื่อแสดงผลรูปแบบวันหรือเดือน
                    selectable: true,
                    nowIndicator: true,
                    // editable: true,
                    selectable: true,
                    businessHours: true,
                    dayMaxEvents: true, // อนุญาตให้แสดงปุ่ม more เพื่อดูข้อมูลทั้งหมด
                    events: [],
                    eventContent: function (arg) {
                        let eventTitle = document.createElement('div');
                        eventTitle.textContent = arg.event.title;
                        eventTitle.setAttribute('class', 'eventTitle');

                        let circle = document.createElement('span');
                        circle.setAttribute('class', 'event-circle');

                        // circle.style.backgroundColor = arg.event.backgroundColor || arg.event.color;
                        // circle.style.backgroundColor = getRandomColor();


                        let container = document.createElement('div');
                        container.setAttribute('class', 'event-container');

                        container.appendChild(circle);
                        container.appendChild(eventTitle);

                        return { domNodes: [container] };
                    },
                    eventDidMount: function (info) {
                        info.el.style.border = '1px solid #000'; // เพิ่มขอบสีดำ
                    }
                });
                // Loop through the result to populate events
                result.forEach(event => {
                    console.log(event);
                    if (event.datetime_start) {
                        calendar.addEvent({
                            title: 'ชื่อ : '+event.name_device + ' , รหัส : '+event.device_code,
                            start: event.datetime_start,
                            color: '#' + event.color_categories + 'CC',
                        });
                    }
                });

                // ตรวจสอบว่า event ถูกเพิ่มใน calendar หรือไม่
                console.log("Events in Calendar:");
                calendar.getEvents().forEach(event => {
                    console.log(event.title, event.start);
                });

                calendar.render();
            });

    }
</script>

<script> // สำหรับ เพิ่ม material
    document.getElementById('add-row').addEventListener('click', function() { // สร้างแถวใหม่เพื่อใช้เพิ่ม ชื่อและจำนวน
        let newRow = document.createElement('div');
        newRow.classList.add('form-group', 'd-flex', 'justify-content-between', 'material-row');
        newRow.innerHTML = `
            <input class="form-control" style="width: 70%;" type="text" name="material_name[]" placeholder="ชื่อ">
            <input class="form-control" style="width: 25%;" type="number" name="material_quantity[]" placeholder="จำนวน">
        `;
        document.getElementById('material-inputs').appendChild(newRow);
    });

    document.getElementById('save-materials').addEventListener('click', function() { // เมื่อกดปุ่มบันทึกให้เอาข้อมูลใน modal มาใส่ใน array materials เพื่อส่งไปยัง form
        let materials = [];
        let materialRows = document.querySelectorAll('.material-row');
        let hasError = false;

        materialRows.forEach(function(row) {
            let name = row.querySelector('input[name="material_name[]"]').value;
            let quantity = row.querySelector('input[name="material_quantity[]"]').value;

            if (name && !quantity) {
                // ถ้ามีชื่อ แต่ไม่มีจำนวน
                // alert("กรุณากรอกจำนวนสำหรับวัสดุ: " + name);
                row.querySelector('input[name="material_quantity[]"]').classList.add('bg_warning_missed_data'); // เพิ่ม bg_warning_missed_data
                hasError = true; // มีข้อผิดพลาด
            } else if (!name && quantity) {
                // ถ้ามีชื่อ แต่ไม่มีจำนวน
                // alert("กรุณากรอกชื่อสำหรับวัสดุ: " + quantity);
                row.querySelector('input[name="material_name[]"]').classList.add('bg_warning_missed_data'); // เพิ่ม bg_warning_missed_data
                hasError = true; // มีข้อผิดพลาด
            } else if (name && quantity){
                // ถ้ามีชื่อและจำนวนครบ
                materials.push(`${name} ${quantity}`);
            }

        });

        if (!hasError) {
            // ตรวจสอบว่า materials ไม่ว่างก่อนที่จะ join
            if (materials.length > 0) {
                document.getElementById('material').value = materials.join(' , ');
                console.log(document.getElementById('material').value);
            } else {
                document.getElementById('material').value = ''; // ถ้าไม่มีข้อมูล ให้เป็นค่าว่าง
            }
            document.getElementById('modal_material_close_btn').click(); // ปิด modal
        }
    });

    document.getElementById('save-materials').addEventListener('click', function() {
        addInputListeners();
    });

    // ฟังก์ชันสำหรับเพิ่ม event listener ให้กับ input สำหรับชื่อและจำนวน
    function addInputListeners() {
        document.querySelectorAll('input[name="material_name[]"], input[name="material_quantity[]"]').forEach(function(input) {
            input.addEventListener('input', function() {
                let row = this.closest('.material-row');
                let name = row.querySelector('input[name="material_name[]"]').value;
                let quantity = row.querySelector('input[name="material_quantity[]"]').value;
                let index = Array.from(row.parentNode.children).indexOf(row) + 1;

                if (this.name === 'material_name[]') {
                    if (this.value && quantity) {
                        this.classList.remove('bg_warning_missed_data');
                        row.querySelector('input[name="material_quantity[]"]').classList.remove('bg_warning_missed_data');
                        console.log(`Removed bg_warning_missed_data from row ${index}: ${this.value} ${quantity}`);
                    }
                    // else {
                    //     if (!this.value) {
                    //         this.classList.add('bg_warning_missed_data');
                    //     }
                    // }
                } else if (this.name === 'material_quantity[]') {
                    if (name && this.value) {
                        this.classList.remove('bg_warning_missed_data');
                        row.querySelector('input[name="material_name[]"]').classList.remove('bg_warning_missed_data');
                        console.log(`Removed bg_warning_missed_data from row ${index}: ${name} ${this.value}`);
                    }
                    // else {
                    //     if (!this.value) {
                    //         this.classList.add('bg_warning_missed_data');
                    //     }
                    // }
                }
            });
        });
    }

</script>




@endsection
