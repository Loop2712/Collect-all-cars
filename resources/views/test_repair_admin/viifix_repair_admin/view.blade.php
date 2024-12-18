@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
    .breadcrumb-title {
        font-size: 20px;
        /* border-right: 1.5px solid #aaa4a4; */
        font-weight: bolder;
    }


    .page-breadcrumb .breadcrumb li.breadcrumb-item {
        font-size: 16px;
    }


    .page-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #6c757d;
        font-family: 'LineIcons';
        content: "\ea5c";
    }

    .area-maintain {
        display: flex;
        align-items: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        font-size: 16px;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
    }

    body {
        padding-bottom: 0 !important;
    }

    body.bg-white {
        background-color: #f0f3f8 !important;
    }



    .font-18 {
        font-size: 18px;
    }

    .font-16 {
        font-size: 16px;
    }

    .font-14 {
        font-size: 14px;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25;
    }

    hr:not([size]) {
        height: 1px;
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
    }

    .img-group {
        display: flex;
        width: 100%;
        overflow-y: auto;
        gap: 5px;

    }

    .img-show img {
        max-width: 200px;
        transition: all .15s ease-in-out;

    }

    .img-group img {
        transition: all .15s ease-in-out;
        max-width: 80px;
        cursor: pointer;
        filter: blur(1px) grayscale(100%);
        -webkit-filter: blur(1px) grayscale(100%);
        -moz-filter: blur(1px) grayscale(100%);
        -o-filter: blur(1px) grayscale(100%);
        -ms-filter: blur(1px) grayscale(100%);
    }

    .img-group img.active {
        filter: none !important;
    }

    .radius-50 {
        border-radius: 50px !important;
        color: #fff !important;
    }
</style>
<style>
    .tl-header .tl-time {
        line-height: 2.653 !important;
    }

    .tl-header .tl-title {
        line-height: 1.8 !important;
    }

    time {
        line-height: 1.6;
    }


    /* ===================== */
    /* ===================== */

    /* Timeline */
    /* Code Here ↓ */

    .timeline {
        padding: .2rem 2rem;

        max-width: 460px;
        border-radius: 12px;

    }

    .tl-content .tl-header,
    .tl-content .tl-body {
        padding-left: 25.6px;

        border-left: 3px solid gainsboro;
    }

    .tl-body {
        padding-bottom: 1rem;
    }

    .tl-content:last-child .tl-body {
        border-left: 3px solid transparent;
    }

    .tl-header {
        position: relative;
        display: grid;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .tl-title {
        font-weight: 600;
        font-size: 1em;
        margin: 0 !important;
        border-bottom: 1px solid gainsboro;
    }

    .tl-time {
        font-size: 0.7em;
    }

    .tl-marker {
        display: block;
        position: absolute;

        width: 16px;
        height: 16px;
        border-radius: 50% / 50%;

        background-color: limegreen;


        left: -1.1rem;
        top: 50%;

        transform: translate(50%, -50%);
    }

    .tl-content-active .tl-marker {
        padding: 1.6px;

        left: -1.25rem;

        width: 18px;
        height: 18px;

        border: 2px solid limegreen;

        background-color: limegreen;
        background-clip: content-box;

        box-shadow: 0 0 15px -2px limegreen;
    }

    .tl-content-active .tl-title {
        font-weight: 700;

        color: green;
    }

    /* Code Here ↑ */
    /* Timeline */

    /* ==================== */
    .font-14 {
        font-size: 14 !important;
    }

    .font-13 {
        font-size: 13 !important;
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .card_row {
        position: relative;
        display: flex;
        flex-direction: row;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: 0.25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
    }

    .border-repair {
        border-radius: 10px;
        border: 2px solid #000000;
    }

    .thick-hr {
        border: 1px solid rgb(255, 0, 0, 1);
        /* Set border width and color */
        border-radius: 10px;
    }

    .sticky-sidebar {
        position: -webkit-sticky;
        /* สำหรับ Safari */
        position: sticky;
        top: 80px;
        /* ระยะห่างจากด้านบนของหน้าจอ */
    }

    /* Thumbnail */
    .gallery-container {
        text-align: center;
        max-width: 800px;
        margin: auto;
    }

    .main-image img {
        height: 230px;
        border-radius: 10px;
        object-fit: contain;
    }

    .thumbnail-container {
        display: flex;
        gap: 10px;
        /* เพิ่มระยะห่างระหว่างรูปภาพซับ */
        margin-top: 5px;
        max-width: 100%;
        /* ให้ความกว้างไม่เกิน parent div */
        box-sizing: border-box;
        /* รวม padding และ border เข้าไปในความกว้าง */
        overflow: auto;
        padding: 0 10px;
    }

    .thumbnail {
        width: 100px;
        height: 100px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all .15s ease-in-out;
        border-radius: 5px;
        object-fit: cover;
    }

    .thumbnail:hover {
        border-color: #888;
    }

    .thumbnail-container:hover> :not(:hover) {
        opacity: .7;
    }

    .thumbnail.active {
        border-color: #f00;
    }

    /* End Thumbnail */

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

    /* Rating Stars*/
    .star_checked {
        color: orange;
    }

    #modal_main_image {
        height: calc(100% - 100px);
    }


    .img-group {
        display: flex;
        width: 100%;
        overflow-y: auto;
        gap: 5px;

    }

    .img-group:hover> :not(:hover) {
        opacity: .7;

    }

    .img-show img {
        max-width: 200px;
        transition: all .15s ease-in-out;

    }

    .img-group img {
        transition: all .15s ease-in-out;
        max-width: 80px;
        cursor: pointer;
        opacity: 0.6;
        cursor: pointer;
    }

    .img-group img:hover {
        opacity: 1;
    }

    .img-group img.active {
        opacity: 1;

    }

    .radius-50 {
        border-radius: 50px !important;
        color: #fff !important;
    }

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
</style>

@php
    $photos = json_decode($data_maintains->photo, true); // แปลง JSON เป็น Array
@endphp
<div class="modal fade h-100 " id="imageModal_in_sidebar" tabindex="-2" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center" style="height: 800px;">
                @if(!empty($photos))
                    <img id="modal_main_image" src="{{ url('/') }}/storage/{{ $photos[0] }}" alt="" class="img-fluid w-100 h-100">
                @endif
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" id="prevImage" style="width: 120px;">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <span id="imageCounter" class="mx-3 " style="font-weight: bold; font-size:16px;"></span>
                <button type="button" class="btn btn-secondary" id="nextImage" style="width: 120px;">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- modal แสดงภาพใหญ่ รูปอุปกรณ์ -->
<div id="myModal" class="modal modal-light-box">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        @if (!empty($photos) && is_array($photos))
            @foreach($photos as $index => $image)
                <div class="mySlides">
                    <div class="numbertext">{{ $index + 1 }} / {{ count($photos) }}</div>
                    <img src="{{ url('/') }}/storage/{{ $image }}" style="width:100%">
                </div>
            @endforeach
        @endif

        {{-- <div class="mySlides">
            <div class="numbertext">1 / 10</div>
            <img src="{{url('img/stickerline/PNG/1.png')}}" style="width:100%">
        </div> --}}
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</div>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-3 ">
            <div class="card radius-10 p-0 sticky-sidebar">
                <div class="text-center d-block my-3">
                    <div class="gallery-container">
                        <div>
                            <div class="d-block text-center">
                                <div class="img-show mb-2">
                                    @if(!empty($photos))
                                        <img src="{{ url('/') }}/storage/{{ $photos[0] }}" alt="" onclick="openModal();currentSlide(1)">
                                    @endif
                                </div>
                                <div class="img-group">
                                    @if (!empty($photos) && is_array($photos))
                                        @foreach($photos as $index => $image)
                                            <img src="{{ url('/') }}/storage/{{ $image }}" class="{{ $index === 0 ? 'active' : '' }}" alt="" data-slide="{{ $index + 1 }}">
                                        @endforeach
                                    @endif

                                    {{-- <img src="{{url('img/stickerline/PNG/1.png')}}" class="active" alt="" data-slide="1">
                                    <img src="{{url('img/stickerline/PNG/2.png')}}" alt="" data-slide="2">
                                    <img src="{{url('img/stickerline/PNG/3.png')}}" alt="" data-slide="3">
                                    <img src="{{url('img/stickerline/PNG/4.png')}}" alt="" data-slide="4">
                                    <img src="{{url('img/stickerline/PNG/5.png')}}" alt="" data-slide="5">
                                    <img src="{{url('img/stickerline/PNG/6.png')}}" alt="" data-slide="6">
                                    <img src="{{url('img/stickerline/PNG/7.png')}}" alt="" data-slide="7">
                                    <img src="{{url('img/stickerline/PNG/9.png')}}" alt="" data-slide="8">
                                    <img src="{{url('img/stickerline/PNG/10.png')}}" alt="" data-slide="9">
                                    <img src="{{url('img/stickerline/PNG/11.png')}}" alt="" data-slide="10"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const imgGroup = document.querySelectorAll('.img-group img');
                    const imgShow = document.querySelector('.img-show img');

                    imgGroup.forEach(img => {
                        img.addEventListener('click', function() {
                            // Remove 'active' class from all images
                            imgGroup.forEach(img => img.classList.remove('active'));
                            // Add 'active' class to the clicked image
                            this.classList.add('active');
                            // Set the src of the imgShow to the src of the clicked image
                            imgShow.src = this.src;
                            // Set the onclick attribute of imgShow
                            const slideNumber = this.getAttribute('data-slide');
                            imgShow.setAttribute('onclick', `openModal();currentSlide(${slideNumber})`);
                        });
                    });
                </script>



                <script>
                    // Wrap every letter in a span
                    var textWrapper = document.querySelector('.ml12');
                    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                    anime.timeline({
                            loop: true
                        })
                        .add({
                            targets: '.ml12 .letter',
                            translateX: [40, 0],
                            translateZ: 0,
                            opacity: [0, 1],
                            easing: "easeOutExpo",
                            duration: 1200,
                            delay: (el, i) => 500 + 40 * i
                        }).add({
                            targets: '.ml12 .letter',
                            translateX: [0, -30],
                            opacity: [1, 0],
                            easing: "easeInExpo",
                            duration: 1100,
                            delay: (el, i) => 5000 + 30 * i
                        });


                    ////////////////////////////////////////////////////////////////////
                    function openModal() {
                        document.getElementById("myModal").style.display = "block";
                    }

                    function closeModal() {
                        document.getElementById("myModal").style.display = "none";
                    }

                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("demo");
                        var captionText = document.getElementById("caption");
                        if (n > slides.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = slides.length
                        }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                        captionText.innerHTML = dots[slideIndex - 1].alt;
                    }
                </script>

                <div class="mt-2 px-3">
                    <textarea class="border-repair w-100 p-2" id="remark_textarea_admin_sidebar" placeholder="ข้อเสนอแนะจากแอดมิน" cols="30" rows="5" oninput="confirm_delay()">{{$data_maintains->remark_admin ? $data_maintains->remark_admin : ''}}</textarea>
                </div>

                <div class=" text-center p-3 ">
                    <div class="row ">
                        <div class="col-6">
                            <button id="btn_confirm_admin_remark" class="btn btn-success disabled h-100" onclick="change_remark_admin()"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                ยืนยันการเปลี่ยนแปลง
                            </button>
                        </div>
                        <div class="col-6">
                            <button id="btn_forward_repair" style="font-weight: bold; display: block; width:100%; " class="btn btn-warning disabled h-100" onclick="forward_repair();">
                                <b style="font-size:15px;">ดำเนินการจัดซื้อจัดจ้าง</b>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="my-2 text-center px-2">
                    <span style="display: block; font-size:14px;" class="text-danger">เมื่อกดปุ่มดำเนินการจัดซื้อจัดจ้าง
                        สถานะจะอัพเดทเป็นเสร็จสิ้นและจะส่งข้อความหาผู้ใช้ด้วยข้อเสนอแนะจากแอดมิน</span>
                </div>
            </div>
        </div>
        <style>
            select option {
                background: white !important;
                color: #212925 !important;
            }
        </style>
        <div class="col-12 col-md-9 col-lg-9">
            <div class="card radius-10">
                <div class="col-12 row p-4">
                    <div style="text-align: right;">
                        <div class="dropdown float-end px-1">
                            <?php
                                // กำหนดค่า class ของ select ตามสถานะ
                                $classStatusSelected = 'form-select btn-secondary';
                                if ($data_maintains->status == "แจ้งซ่อม" ) {
                                    $classStatusSelected = 'form-select btn-danger';
                                } elseif ($data_maintains->status == "รอดำเนินการ") {
                                    $classStatusSelected = 'form-select btn-warning text-dark';
                                } elseif ($data_maintains->status == "กำลังดำเนินการ") {
                                    $classStatusSelected = 'form-select btn-info';
                                } elseif ($data_maintains->status == "เสร็จสิ้น") {
                                    $classStatusSelected = 'form-select btn-success';
                                }elseif ($data_maintains->status == "ไม่สามารถดำเนินการได้") {
                                    $classStatusSelected = 'form-select btn-secondary disable';
                                }else{
                                    $classStatusSelected = 'form-select btn-secondary';
                                }
                            ?>
                            @if($data_maintains->status == "ไม่สามารถดำเนินการได้")
                            <div class="d-flex ">
                                <select disabled class="<?= $classStatusSelected ?>" id="select_status_repair" onchange="select_status_repair(this)">
                                    <option value="ไม่สามารถดำเนินการได้" disabled selected>ไม่สามารถดำเนินการได้</option>
                                </select>
                                <select class="form-select btn-secondary ms-2" id="select_officer_repair" onchange="select_officer_repair(this)">
                                    <option value="" disabled selected>เลือกเจ้าหน้าที่</option>
                                    @foreach($data_maintains->remain_officers as $officer)
                                        <option value="{{ $officer->id }}">{{ $officer->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                                <select class="<?= $classStatusSelected ?>" id="select_status_repair" onchange="select_status_repair(this)">
                                    <option value="" disabled <?= empty($data_maintains->status) ? 'selected' : '' ?>>เลือกสถานะ</option>
                                    <option value="แจ้งซ่อม" class="text-danger" <?= $data_maintains->status === "แจ้งซ่อม" ? 'selected' : '' ?>>แจ้งซ่อม</option>
                                    <option value="รอดำเนินการ" class="text-warning" <?= $data_maintains->status === "รอดำเนินการ" ? 'selected' : '' ?>>รอดำเนินการ</option>
                                    <option value="กำลังดำเนินการ" class="text-info" <?= $data_maintains->status === "กำลังดำเนินการ" ? 'selected' : '' ?>>กำลังดำเนินการ</option>
                                    <option value="เสร็จสิ้น" class="text-success" <?= $data_maintains->status === "เสร็จสิ้น" ? 'selected' : '' ?>>เสร็จสิ้น</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-regular fa-screwdriver-wrench me-1 font-22 text-dark"></i>
                            <h4 class="mb-0 text-dark"><b>รายละเอียดการแจ้งซ่อม</b></h4>
                        </div>
                        <div>
                            <b style="font-size: 16px; color:#000000;">วันที่แจ้ง : <span id="datetime_command_text" style="font-weight: normal; color:#6c757d;"></span></b>
                        </div>
                    </div>
                    <div class="w-100 p-2">
                        <p class="h5" style="font-weight: bold;">หมวดหมู่ : {{$data_maintains->name_categories ? $data_maintains->name_categories : '-'}}</p>
                        <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <span class="text-danger">{{$data_maintains->name_subs_categories ? $data_maintains->name_subs_categories : '-'}}</span></p>
                        <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <span class="text-primary">{{$data_maintains->device_code ? $data_maintains->device_code : '-'}}</span></p>

                        <div class="repair_detail row">

                            <div class="col-12 col-md-4">
                                <div>
                                    <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                                    <hr class="my-2">
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : {{$data_maintains->name_user ? $data_maintains->name_user : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : {{$data_maintains->phone_user ? $data_maintains->phone_user : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : {{$data_maintains->email_user ? $data_maintains->email_user : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : {{$data_maintains->position_user ? $data_maintains->position_user : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : {{$data_maintains->department_user ? $data_maintains->department_user : '-'}}</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div>
                                    <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                                    <hr class="my-2">
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : {{$data_maintains->title ? $data_maintains->title : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : {{$data_maintains->detail_title ? $data_maintains->detail_title : '-'}}</p>
                                    <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : {{$data_maintains->name_area ? $data_maintains->name_area : '-'}}</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : {{$data_maintains->detail_location ? $data_maintains->detail_location : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div>
                                    <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                                    <hr class="my-2">
                                    @if(isset($data_maintains->officers) && count($data_maintains->officers) > 0)
                                        @foreach($data_maintains->officers as $index => $officer)
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">
                                                ผู้รับผิดชอบ {{ $index + 1 }} : {{ $officer->full_name }}
                                            </p>
                                        @endforeach
                                    @else
                                        <p class="overflow-dot mb-0" style="font-weight: bold;">
                                            ไม่มีผู้รับผิดชอบ
                                        </p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="card radius-10">
                <div class="col-12 row p-4">
                    <div style="text-align: right;">
                    </div>
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-regular fa-screwdriver-wrench me-1 font-22 text-primary"></i>
                            <h4 class="mb-0 text-primary"><b>ข้อมูลการซ่อม</b></h4>
                        </div>
                        <div>
                            <?php
                                // กำหนด class ตาม priority
                                $priorityClass = 'form-select btn-secondary';
                                if ($data_maintains->priority == "ปรกติ") {
                                    $priorityClass = 'form-select btn-primary';
                                } elseif ($data_maintains->priority == "ด่วน") {
                                    $priorityClass = 'form-select btn-warning text-dark';
                                } elseif ($data_maintains->priority == "ด่วนมาก") {
                                    $priorityClass = 'form-select btn-danger';
                                }
                            ?>
                            <select class="<?= $priorityClass ?>" id="select_priority_repair" onchange="select_priority_repair(this)">
                                <option value="" disabled <?= empty($data_maintains->priority) ? 'selected' : '' ?>>เลือกความเร่งด่วน</option>
                                <option value="ปรกติ" class="text-primary" <?= $data_maintains->priority === "ปรกติ" ? 'selected' : '' ?>>ปรกติ</option>
                                <option value="ด่วน" class="text-warning" <?= $data_maintains->priority === "ด่วน" ? 'selected' : '' ?>>ด่วน</option>
                                <option value="ด่วนมาก" class="text-danger" <?= $data_maintains->priority === "ด่วนมาก" ? 'selected' : '' ?>>ด่วนมาก</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div style="text-align: right;">
                        <div class="dropdown float-end px-1">
                            <b id="text_priority" class="btn btn-danger">ลำดับความสำคัญ : ด่วนมาก</b>
                            <button class="btn btn-outline-secondary dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                เลือกลำดับความสำคัญ
                            </button>
                            <div id="item_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item btn text-danger"
                                    onclick="change_select_priority('very_urgent')">ด่วนมาก</a>
                                <a class="dropdown-item btn text-warning"
                                    onclick="change_select_priority('urgent')">ด่วน</a>
                                <a class="dropdown-item btn text-info"
                                    onclick="change_select_priority('normal')">ปกติ</a>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-12 mt-0">
                        <div class="d-flex flex-wrap justify-content-start">
                            <b style="font-size: 16px; color:#000000;border-right: 1px solid #000000;" class="me-2 pe-2">วันที่และเวลาที่เริ่มดำเนินการ :
                                <span id="datetime_start_text" style="font-weight: normal; color:#6c757d;"></span>
                            </b>
                            <b style="font-size: 16px; color:#000000;border-right: 1px solid #000000;" class="me-2 pe-2">วันที่และเวลาที่คาดว่าจะเสร็จ :
                                <span id="datetime_end_text" style="font-weight: normal; color:#6c757d;"></span>
                            </b>
                            <b style="font-size: 16px; color:#000000;border-right: 1px solid #000000;" class="me-2 pe-2">วันที่และเวลาที่ซ่อมเสร็จ :
                                <span id="datetime_success_text" style="font-weight: normal; color:#6c757d;"></span>
                            </b>
                        </div>
                        <!-- <div class=" row mt-4">
                            <div class="col-6">
                                <b style="font-size: 16px; color:#000000;">วันที่และเวลาที่เริ่มดำเนินการ :
                                    <span style="font-weight: normal; color:#6c757d;">........................</span>
                                </b>
                            </div>
                            <div class="col-6">
                                <b style="font-size: 16px; color:#000000;">วันที่และเวลาที่คาดว่าจะเสร็จ :
                                    <span style="font-weight: normal; color:#6c757d;">........................</span>
                                </b>
                            </div>
                        </div>
                        <div class=" row mt-2">
                            <b style="font-size: 16px; color:#000000;">วันที่และเวลาที่ซ่อมเสร็จ :
                                <span style="font-weight: normal; color:#6c757d;">นายฐนกร ตุงคโสภา</span>
                            </b>
                        </div> -->
                        <div class=" row mt-4">
                            <div class="col-12">
                                <b style="font-size: 16px; color:#000000;">วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม
                                    <div class="d-flex flex-wrap p-2 w-100">
                                        @php
                                            $materials = json_decode($data_maintains->material, true);
                                        @endphp

                                        @foreach($materials as $material)
                                            <div class="chip">{{ $material['material'] }} ({{ $material['quantity'] }})</div>
                                        @endforeach

                                        {{-- <div class="chip">
                                            สายไฟ(2)
                                        </div>
                                        <div class="chip">
                                            หลอดไฟ(1)
                                        </div>
                                        <div class="chip">
                                            ท่อ(2)
                                        </div>
                                        <div class="chip">
                                            เต้ารับ(2)
                                        </div> --}}
                                    </div>
                                    <!-- <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">1. .............. จำนวน .......</span>
                                    <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">2. .............. จำนวน .......</span>
                                    <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">3. .............. จำนวน .......</span>
                                    <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">n. .............. จำนวน .......</span> -->
                                </b>
                            </div>
                        </div>
                        <div class="col-12 row mt-2">
                            <b style="font-size: 16px; color:#000000;">ค่าใช้จ่ายในการซ่อม :
                                <span style="font-weight: normal; color:#6c757d;">{{$data_maintains->repair_costs ? $data_maintains->repair_costs : '-'}}</span>
                                บาท
                            </b>
                            <button id="btn_ModalReceipt" class="btn btn-danger d-none" data-bs-toggle="modal" data-bs-target="#imageModal1">Modal Open</button>
                        </div>
                        @php
                            $photos_receipt = json_decode($data_maintains->photo_repair_costs, true); // แปลง JSON เป็น Array
                        @endphp
                        <div class=" row mt-4">
                            <div class="container">
                                <div class="row no-gutters mx-3">
                                    <div class=" owl-1-style">
                                        <div class="owl-carousel myCarousel owl-1 ">
                                            @if (!empty($photos_receipt) && is_array($photos_receipt))
                                                @foreach($photos_receipt as $index_receipt => $image_receipt)
                                                    <div class="gallery-item item ">
                                                        <a class="galelry-lightbox">
                                                            <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="{{ url('/') }}/storage/{{ $image_receipt }}" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                            {{-- <div class="gallery-item item ">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div>

                                            <div class="gallery-item item">
                                                <a class="galelry-lightbox">
                                                    <img class="receipt_main_image" style="object-fit: cover; height: 200px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover" onclick="changeImage_receipt(this)">
                                                </a>
                                            </div> --}}

                                        </div>
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
                        <div class="modal fade h-100 modalReceipt" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <button type="button" class="btn-closes" data-bs-dismiss="modal">&times;</button>
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content position-relative p-0" style="background-color: transparent;">

                                    <div class="modal-body d-flex justify-content-center align-items-center p-0" style="width:100%;">
                                        <img id="modal_main_image_receipt" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100 h-100 px-4 ">
                                        <!-- <button type="button" class="prev" id="prevImageReceipt" style="width: 120px;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </button>
                                        <span id="imageCounterReceipt" class="numbertext " style="font-weight: bold; font-size:16px;"></span>
                                        <button type="button" class="next" id="nextImageReceipt" style="width: 120px;">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button> -->
                                        <span id="imageCounterReceipt" class="numbertext " style="font-weight: bold; font-size:16px;left: 25px;"></span>

                                        <a class="BTNprev" id="prevImageReceipt">&#10094;</a>
                                        <a class="BTNnext" id="nextImageReceipt">&#10095;</a>
                                    </div>

                                    <!-- <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" id="prevImageReceipt" style="width: 120px;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </button>
                                        <span id="imageCounterReceipt" class="mx-3 " style="font-weight: bold; font-size:16px;"></span>
                                        <button type="button" class="btn btn-secondary" id="nextImageReceipt" style="width: 120px;">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card radius-10">
                <div class="col-12 row p-4">
                    <div style="text-align: right;">
                    </div>
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-solid fa-star me-1 font-22 text-warning"></i>
                            <h4 class="mb-0 text-warning"><b>การประเมินคุณภาพการซ่อม</b></h4>
                        </div>

                    </div>
                    <div class="mt-4">
                        <div class="cursor-pointer" id="quality_repair_div">
                            <span>
                                <b style="font-size: 16px; color:#000000; display: block; margin-bottom: 1rem;">การประเมินคุณภาพการซ่อม </b>
                            </span>

                            {{-- <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                            (4) --}}
                        </div>
                    </div>

                    <div class=" row mt-4">
                        <b style="font-size: 16px; color:#000000; ">ข้อเสนอแนะหรือความคิดเห็นจากผู้แจ้งซ่อม :
                            <span style="font-weight: normal; color:#6c757d; display: block;">{{$data_maintains->remark_user ? $data_maintains->remark_user : '-'}}</span>
                        </b>
                    </div>
                    <div class=" row mt-4">
                        <b style="font-size: 16px; color:#000000;">ข้อคิดเห็นจากช่างหรือผู้รับผิดชอบ :
                            <span style="font-weight: normal; color:#6c757d; display: block;">{{$data_maintains->remark_officer ? $data_maintains->remark_officer : '-'}}</span>
                        </b>
                    </div>
                    <div class=" row mt-4">
                        <div class="col-6 d-flex align-items-center">
                            <b style="font-size: 16px; color:#000000;">ข้อเสนอแนะหรือความคิดเห็นจากแอดมิน : </b>
                        </div>
                        {{-- <div class="col-6" style="text-align: right;">
                                    <button id="btn_confirm_admin_remark" class="btn btn-success disabled"
                                        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        ยืนยันการเปลี่ยนแปลง
                                    </button>
                                </div> --}}
                        <div class="col-12 ">
                            <b style="font-size: 16px; color:#000000;">
                                <span id="admin_remark_textarea" style="font-weight: normal; color:#6c757d; display: block;">{{$data_maintains->remark_admin ? $data_maintains->remark_admin : '-'}}</span>
                            </b>
                            {{-- <textarea id="admin_remark_textarea" class="mt-3 radius-10 p-2 " style="width: 100%; background-color: #DEEEF8;"  placeholder="" cols="30" rows="5"></textarea> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="col-12 row p-4">
                    <div style="text-align: right;">
                    </div>
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-solid fa-timeline me-1 font-22 text-info"></i>
                            <h4 class="mb-0 text-info"><b>ขั้นตอนการแจ้งซ่อม</b></h4>
                        </div>

                    </div>

                    <div id="timeline_div" class="timeline">
                        {{-- <div id="repair_phase_div" class="tl-content ">
                            <div class="tl-header">
                                <span class="tl-marker"></span>
                                <p class="tl-title">
                                    แจ้งซ่อม
                                </p>
                                <time class="tl-time" datetime="2023-06-20">
                                    24 กรกฎาคม 2567 15:30 น.
                                </time>
                            </div>
                            <div class="tl-body">
                                <p>
                                    แจ้งซ่อมบำรุง คอมพิวเตอร์ อาการ เปิดไม่ติด สถานที่ ตึกA
                                </p>
                            </div>
                        </div>
                        <div id="pending_phase_div" class="tl-content">
                            <div class="tl-header">
                                <span class="tl-marker"></span>
                                <p class="tl-title">
                                    เจ้าหน้าที่รับแจ้ง
                                </p>
                                <time class="tl-time" datetime="2023-06-18">
                                    25 กรกฎาคม 2567 15:30 น. (1วัน 1ชั่วโมง 10นาที)

                                </time>
                            </div>
                            <div class="tl-body">
                                <p>
                                    เจ้าหน้าที่ thanakorn รับเรื่องแจ้งซ่อมบำรุง <b>จะดำเนินการภายในวันที่ 26 กรกฎาคม 2567 12:00 น.</b>และ
                                    <b>คาดว่าจะเสร็จภายในวันที่ 26 กรกฎาคม 2567 13:00 น.</b>
                                </p>
                                <div>
                                    <div class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                        <div class="">
                                            <img src="{{url('img/stickerline/PNG/10.png')}}" class="rounded-circle" width="46" height="46" alt="" style="object-fit: cover;">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14"><b>thanakorn tungkasopa</b></h6>
                                            <a href="tel:0812345678" class="mb-0 font-13 text-secondary">081-234-5678</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="progress_phase_div" class="tl-content">
                            <div class="tl-header">
                                <span class="tl-marker"></span>
                                <p class="tl-title">
                                    ดำเนินการ
                                </p>
                                <time class="tl-time" datetime="2023-06-14">
                                    26 กรกฎาคม 2567 12:00 น. (1 วัน)
                                </time>
                            </div>
                            <div class="tl-body">
                                <p>
                                    เจ้าหน้าที่ กำลังเดินทางไปซ่อมบำรุงคอมพิวเตอร์
                                </p>
                            </div>
                        </div>
                        <div id="success_phase_div" class="tl-content tl-content-active">
                            <div class="tl-header">
                                <span class="tl-marker"></span>
                                <p class="tl-title">
                                    เสร็จสิ้น
                                </p>
                                <time class="tl-time" datetime="2023-06-14">
                                    26 กรกฎาคม 2567 13:30 น. (1 ชั่วโมง 30นาที)
                                </time>
                            </div>
                            <div class="tl-body">
                                <p>
                                    ซ่อมบำรุงเสร็จสิ้น <br>
                                    <b>ล่าช้ากว่าที่กำหนด 30 นาที</b><br>
                                    <b>เร็วกว่าที่กำหนด 30 นาที</b>
                                </p>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Timeline -->
                </div>
            </div>
        </div>
    </div>


    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let maintain_id = '{{ $data_maintains->id }}';
        document.addEventListener('DOMContentLoaded', (event) => {
            getformatDateTime('{{ $data_maintains}}'); // นำข้อมูลเวลาไปแปลงรูปแบบ
            CreateTimeLineRepair(maintain_id,"ปรกติ"); //ตรวจสอบสถานะแล้วสร้างไทม์ไลน์
            updateImageCounterInSB(); // ตั้งค่าเลขภาพเริ่มต้นตอนโหลดหน้า ของ Sidebar Thumbnails
            updateImageCounterInReceipt(); // ตั้งค่าเลขภาพเริ่มต้นตอนโหลดหน้า ของ ค่าใช้จ่ายในการซ่อม
            generateStars('{{ $data_maintains->rating_sum }}'); // ฟังก์ชันสร้างดาวตามคะแนน
        });

        $(document).ready(function() {
            $(".myCarousel").owlCarousel({
                margin: 10,
                loop: false,
                autoWidth: true,
                items: 4
            });
        });

        let currentImageIndex = 0;
        const thumbnails = document.querySelectorAll('.thumbnail');
        const totalImages = thumbnails.length; // จำนวนทั้งหมดของภาพ
        const imageCounter = document.getElementById('imageCounter'); // ตัวแสดงเลขภาพ

        function updateImageCounterInSB() {
            imageCounter.textContent = `${currentImageIndex + 1}/${totalImages}`;
        }

        function changeImage(element) {
            var mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;

            document.querySelector('#modal_main_image').src = element.src;

            // Remove 'active' class from all thumbnails
            thumbnails.forEach(function(thumbnail) {
                thumbnail.classList.remove('active');
            });

            // Add 'active' class to the clicked thumbnail
            element.classList.add('active');

            // Update current image index
            currentImageIndex = Array.from(thumbnails).indexOf(element);

            updateImageCounterInSB();
        }

        function showImageByIndex(index) {
            if (index >= 0 && index < thumbnails.length) {
                const thumbnail = thumbnails[index];
                changeImage(thumbnail);
                currentImageIndex = index;
            }
        }

        document.getElementById('nextImage').addEventListener('click', function() {
            showImageByIndex(currentImageIndex + 1);
        });

        document.getElementById('prevImage').addEventListener('click', function() {
            showImageByIndex(currentImageIndex - 1);
        });



        let currentImageIndexReceipt = 0;
        const receipt_thumbnails = document.querySelectorAll('.receipt_main_image');
        const totalImagesInReceipt = receipt_thumbnails.length; // จำนวนทั้งหมดของภาพ
        const imageCounterReceipt = document.getElementById('imageCounterReceipt'); // ตัวแสดงเลขภาพ

        function updateImageCounterInReceipt() {
            imageCounterReceipt.textContent = `${currentImageIndexReceipt + 1}/${totalImagesInReceipt}`;
        }

        function changeImage_receipt(element) {
            var main_image_receipt = document.getElementById('modal_main_image_receipt');
            main_image_receipt.src = element.src;

            document.querySelector('#modal_main_image_receipt').src = element.src;

            // Remove 'active' class from all thumbnails
            receipt_thumbnails.forEach(function(receipt_thumbnail) {
                receipt_thumbnail.classList.remove('active');
            });

            // Add 'active' class to the clicked thumbnail
            element.classList.add('active');

            // Update current image index
            currentImageIndexReceipt = Array.from(receipt_thumbnails).indexOf(element);

            updateImageCounterInReceipt();

            document.querySelector('#btn_ModalReceipt').click();
        }

        function showImageByIndex_receipt(indexReceipt) {
            if (indexReceipt >= 0 && indexReceipt < receipt_thumbnails.length) {
                const thumbnailReceipt = receipt_thumbnails[indexReceipt];
                changeImage_receipt(thumbnailReceipt);
                currentImageIndexReceipt = indexReceipt;
            }
        }

        document.getElementById('nextImageReceipt').addEventListener('click', function() {
            showImageByIndex_receipt(currentImageIndexReceipt + 1);
        });

        document.getElementById('prevImageReceipt').addEventListener('click', function() {
            showImageByIndex_receipt(currentImageIndexReceipt - 1);
        });


        var delayTimer;
        var originalText = '';
        var btn_forward_repair = document.querySelector('#btn_forward_repair');
        // Save the original text on page load
        window.onload = () => {
            originalText = document.querySelector('#remark_textarea_admin_sidebar').value;
            let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;

            if (remark_textarea) {
                if (previousStatusValue !== "เสร็จสิ้น") {
                    btn_forward_repair.classList.remove('disabled');
                } else {
                    btn_forward_repair.classList.add('disabled');
                }
            } else {
                btn_forward_repair.classList.add('disabled');
            }
        };

        function confirm_delay() {
            clearTimeout(delayTimer);
            delayTimer = setTimeout(confirm_admin_remark, 500);
        }

        const confirm_admin_remark = () => {
            let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;
            let btn_confirm_admin_remark = document.querySelector('#btn_confirm_admin_remark');

            if (remark_textarea !== originalText) {
                console.log("if confirm_admin_remark");
                btn_confirm_admin_remark.classList.remove('disabled');

            } else {
                console.log("else confirm_admin_remark");
                btn_confirm_admin_remark.classList.add('disabled');
            }


        }

        const change_remark_admin = () => {
            let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;
            let btn_confirm_admin_remark = document.querySelector('#btn_confirm_admin_remark');
            originalText = remark_textarea;

            if (remark_textarea) {
                if (previousStatusValue !== "เสร็จสิ้น") {
                    btn_forward_repair.classList.remove('disabled');
                } else {
                    btn_forward_repair.classList.add('disabled');
                }
                document.querySelector('#admin_remark_textarea').innerHTML = remark_textarea;

                updateRemarkOnValue(remark_textarea); //ส่งไป update DB
            } else {
                btn_forward_repair.classList.add('disabled');
                document.querySelector('#admin_remark_textarea').innerHTML = document.querySelector('#remark_textarea_admin_sidebar').value;

                updateRemarkOnValue(remark_textarea); //ส่งไป update DB
            }
            btn_confirm_admin_remark.classList.add('disabled');
        }

        let previousStatusValue = document.querySelector('#select_status_repair').value;
        let previousPriorityValue = document.querySelector('#select_priority_repair').value;

        function select_status_repair(selectObject) {
            let select_status_repair = document.querySelector('#select_status_repair');

            Swal.fire({
                title: "ต้องการเปลี่ยนสถานะหรือไม่?",
                showDenyButton: true,
                showCancelButton: false,
                imageUrl: "{{url('img/stickerline/PNG/7.png')}}",
                imageWidth: 270,
                imageHeight: 220,
                imageAlt: "Custom image",
                confirmButtonText: "ยืนยัน",
                denyButtonText: `ยกเลิก`
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");
                    Swal.fire({
                        icon: "success",
                        title: "เปลี่ยนสถานะเรียบร้อย",
                        timer: 1000,
                        timerProgressBar: true,
                        // didOpen: () => {
                        //     const timer = Swal.getPopup().querySelector("b");
                        //     timerInterval = setInterval(() => {
                        //         timer.textContent = `${Swal.getTimerLeft()}`;
                        //     }, 100);
                        // },
                        // willClose: () => {
                        //     clearInterval(timerInterval);
                        // }
                    })
                    updateStatusOnValue(selectObject.value, select_status_repair);
                } else if (result.isDenied) {
                    // Swal.fire("Changes are not saved", "", "info");
                    Swal.fire({
                        icon: "info",
                        title: "ไม่เปลี่ยนเปลี่ยนสถานะ",
                        timer: 1000,
                        timerProgressBar: true,
                        // didOpen: () => {
                        //     const timer = Swal.getPopup().querySelector("b");
                        //     timerInterval = setInterval(() => {
                        //         timer.textContent = `${Swal.getTimerLeft()}`;
                        //     }, 100);
                        // },
                        // willClose: () => {
                        //     clearInterval(timerInterval);
                        // }
                    })
                    select_status_repair.value = previousStatusValue; // คืนค่ากลับไปเป็นค่าเดิม
                }
            });
        }

        function select_priority_repair(selectObject) {
            let select_priority_repair = document.querySelector('#select_priority_repair');

            Swal.fire({
                title: "ต้องการเปลี่ยนความเร่งด่วนหรือไม่?",
                showDenyButton: true,
                showCancelButton: false,
                imageUrl: "{{url('img/stickerline/PNG/7.png')}}",
                imageWidth: 270,
                imageHeight: 220,
                imageAlt: "Custom image",
                confirmButtonText: "ยืนยัน",
                denyButtonText: `ยกเลิก`
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");

                    Swal.fire({
                        icon: "success",
                        title: "เปลี่ยนความเร่งด่วนเรียบร้อย",
                        timer: 1000,
                        timerProgressBar: true,
                        // didOpen: () => {
                        //     const timer = Swal.getPopup().querySelector("b");
                        //     timerInterval = setInterval(() => {
                        //         timer.textContent = `${Swal.getTimerLeft()}`;
                        //     }, 100);
                        // },
                        // willClose: () => {
                        //     clearInterval(timerInterval);
                        // }
                    })
                    updatePriorityOnValue(selectObject.value, select_priority_repair);
                } else if (result.isDenied) {
                    // Swal.fire("ไม่บันทึกการเปลี่ยนแปลง", "", "info");
                    Swal.fire({
                        icon: "info",
                        title: "ไม่เปลี่ยนความเร่งด่วน",
                        timer: 1000,
                        timerProgressBar: true,
                        // didOpen: () => {
                        //     const timer = Swal.getPopup().querySelector("b");
                        //     timerInterval = setInterval(() => {
                        //         timer.textContent = `${Swal.getTimerLeft()}`;
                        //     }, 100);
                        // },
                        // willClose: () => {
                        //     clearInterval(timerInterval);
                        // }
                    })
                    select_priority_repair.value = previousPriorityValue; // คืนค่ากลับไปเป็นค่าเดิม
                }
            });
        }

        function forward_repair() {
            let btn_forward_repair = document.querySelector('#btn_forward_repair');

            Swal.fire({
                title: "ต้องดำเนินการจัดซื้อจัดจ้างหรือไม่?",
                showDenyButton: true,
                showCancelButton: false,
                imageUrl: "{{url('img/stickerline/PNG/7.png')}}",
                imageWidth: 270,
                imageHeight: 220,
                imageAlt: "Custom image",
                confirmButtonText: "ยืนยัน",
                denyButtonText: `ยกเลิก`
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");
                    Swal.fire({
                        icon: "success",
                        title: "ดำเนินการจัดซื้อจัดจ้างเรียบร้อย",
                        timer: 1000,
                        timerProgressBar: true,
                    })
                    confirm_forward();
                } else if (result.isDenied) {
                    // Swal.fire("ไม่บันทึกการเปลี่ยนแปลง", "", "info");
                    Swal.fire({
                        icon: "info",
                        title: "ไม่ดำเนินการจัดซื้อจัดจ้าง",
                        timer: 1000,
                        timerProgressBar: true,
                    })
                }
            });
        }

        async function updateStatusOnValue(status, select_status_repair) {
            try {
                const response = await fetch("{{ url('/') }}/api/change_status_maintain_admin_view", {
                    method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                        maintain_id: maintain_id,
                        status: status,
                    })
                });
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                const data = await response.json();
                console.log(data);

                if (data.status == "แจ้งซ่อม") {
                    select_status_repair.setAttribute('class', 'form-select btn-danger');
                } else if (data.status == "รอดำเนินการ") {
                    select_status_repair.setAttribute('class', 'form-select btn-warning text-dark');
                } else if (data.status == "กำลังดำเนินการ") {
                    select_status_repair.setAttribute('class', 'form-select btn-info');
                } else if (data.status == "เสร็จสิ้น") {
                    select_status_repair.setAttribute('class', 'form-select btn-success');
                } else {
                    select_status_repair.setAttribute('class', 'form-select btn-secondary');
                }

                previousStatusValue = data.status; // อัปเดตค่าเมื่อบันทึก
                CreateTimeLineRepair(maintain_id,"ปรกติ"); //ตรวจสอบสถานะแล้วสร้างไทม์ไลน์

                //เช็คปุ่มจัดซื้อจัดจ้าง status เสร็จสิ้น = ปิด
                let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;
                if (remark_textarea) {
                    if (previousStatusValue !== "เสร็จสิ้น") {
                        btn_forward_repair.classList.remove('disabled');
                    } else {
                        btn_forward_repair.classList.add('disabled');
                    }
                } else {
                    btn_forward_repair.classList.add('disabled');
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);

                select_status_repair.value = previousStatusValue; // คืนค่ากลับไปเป็นค่าเดิม
            }
        }

        async function updatePriorityOnValue(priority, select_priority_repair) {
            try {
                const response = await fetch("{{ url('/') }}/api/change_priority_maintain_admin_view", {
                    method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                        maintain_id: maintain_id,
                        priority: priority,
                    })
                });
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                const data = await response.json();
                console.log(data);

                if (data.priority == "ด่วนมาก") {
                    select_priority_repair.setAttribute('class', 'form-select btn-danger');
                } else if (data.priority == "ด่วน") {
                    select_priority_repair.setAttribute('class', 'form-select btn-warning text-dark');
                } else if (data.priority == "ปรกติ") {
                    select_priority_repair.setAttribute('class', 'form-select btn-info');
                } else {
                    select_priority_repair.setAttribute('class', 'form-select btn-secondary');
                }

                previousPriorityValue = data.priority; // อัปเดตค่าเมื่อบันทึก

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);

                select_priority_repair.value = previousPriorityValue; // คืนค่ากลับไปเป็นค่าเดิม
            }
        }

        async function updateRemarkOnValue(remark_admin) {
            try {
                const response = await fetch("{{ url('/') }}/api/change_remark_admin_maintain_admin_view", {
                    method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                        maintain_id: maintain_id,
                        remark_admin: remark_admin,
                    })
                });
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                const data = await response.json();
                console.log(data);

                Swal.fire({
                    icon: "success",
                    title: "ดำเนินการเรียบร้อยแล้ว",
                    timer: 3000,
                    timerProgressBar: true,
                })

                if (data.remark_admin) {
                    document.querySelector('#admin_remark_textarea').innerHTML = data.remark_admin;
                } else {
                    document.querySelector('#admin_remark_textarea').innerHTML = "-";
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);

                Swal.fire({
                    icon: "error",
                    title: "ดำเนินการไม่สำเร็จ กรุณาลองอีกครั้ง",
                    timer: 3000,
                    timerProgressBar: true,
                })

                document.querySelector('#admin_remark_textarea').innerHTML = document.querySelector('#admin_remark_textarea').value;
            }
        }

        async function confirm_forward() {
            try {
                const response = await fetch("{{ url('/') }}/api/confirm_forward_maintain_admin_view", {
                    method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                        maintain_id: maintain_id,
                    })
                });
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                const data = await response.json();
                console.log(data);

                previousStatusValue = data.status; // อัปเดตค่าเมื่อบันทึก
                CreateTimeLineRepair(maintain_id,"จัดซื้อจัดจ้าง"); //ตรวจสอบสถานะแล้วสร้างไทม์ไลน์

                // เปลี่ยนค่า select เป็น "เสร็จสิ้น"
                const selectOptionStatusRepair = document.querySelector('#select_status_repair'); // ค้นหา <select>
                if (selectOptionStatusRepair) {
                    selectOptionStatusRepair.value = previousStatusValue; // ตั้งค่า value เป็น "เสร็จสิ้น"
                    selectOptionStatusRepair.setAttribute('class', 'form-select btn-success');
                }

                //เช็คปุ่มจัดซื้อจัดจ้าง status เสร็จสิ้น = ปิด
                let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;
                if (remark_textarea) {
                    if (previousStatusValue !== "เสร็จสิ้น") {
                        btn_forward_repair.classList.remove('disabled');
                    } else {
                        btn_forward_repair.classList.add('disabled');
                    }
                } else {
                    btn_forward_repair.classList.add('disabled');
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);

                select_status_repair.value = previousStatusValue; // คืนค่ากลับไปเป็นค่าเดิม
                // คืนค่า <select> กลับเป็นค่าเดิม
                const selectOptionStatusRepair = document.querySelector('#select_status_repair');
                if (selectOptionStatusRepair) {
                    selectOptionStatusRepair.value = previousStatusValue; // คืนค่าเดิมก่อนเกิดข้อผิดพลาด
                    if (data.status == "แจ้งซ่อม") {
                        selectOptionStatusRepair.setAttribute('class', 'form-select btn-danger');
                    } else if (data.status == "รอดำเนินการ") {
                        selectOptionStatusRepair.setAttribute('class', 'form-select btn-warning text-dark');
                    } else if (data.status == "กำลังดำเนินการ") {
                        selectOptionStatusRepair.setAttribute('class', 'form-select btn-info');
                    } else if (data.status == "เสร็จสิ้น") {
                        selectOptionStatusRepair.setAttribute('class', 'form-select btn-success');
                    } else {
                        selectOptionStatusRepair.setAttribute('class', 'form-select btn-secondary');
                    }
                }
            }
        }
    </script>

    <script>
        async function CreateTimeLineRepair(maintain_id,form) {
            try {
                const response = await fetch("{{ url('/') }}/api/create_timeline_maintain_admin_view", {
                    method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                        maintain_id: maintain_id,
                    })
                });
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                const data = await response.json();
                console.log('Data Maintain created:', data);

                document.getElementById('timeline_div').innerHTML = "";
                // ส่งไปสร้าง html ตามสถานะ
                const htmlContent = generateTimelineHtml(data,form);
                getformatDateTime(data)//นำเวลาไปแสดงใน ส่วน detail;

                document.getElementById('timeline_div').insertAdjacentHTML('beforeend', htmlContent);


            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        // ฟังก์ชันสร้าง HTML ตามสถานะ
        function generateTimelineHtml(data,form) {
            // HTML template สำหรับแต่ละสถานะ
            let datetime_command_th = formatThaiDate(data.datetime_command);//แจ้งเหตุ
            let datetime_start_th = formatThaiDate(data.datetime_start);//คาดว่าจะเริ่ม
            let datetime_end_th = formatThaiDate(data.datetime_end);//คาดว่าจะเสร็จสิ้น
            let datetime_process_th = formatThaiDate(data.datetime_process);//เริ่มจริง
            let datetime_success_th = formatThaiDate(data.datetime_success); //เสร็จสิ้น

            let datetime_command_to_start_th = DateTimeCal(data.datetime_start,data.datetime_command);
            let datetime_command_to_process_th = DateTimeCal(data.datetime_process,data.datetime_command);
            let datetime_command_to_success_th = DateTimeCal(data.datetime_success,data.datetime_command);

            let deadLine_cal = DateTimeDeadLine(data.datetime_success,data.datetime_end);

            const repairPhaseHtml = `
                <div id="repair_phase_div" class="tl-content">
                    <div class="tl-header">
                        <span class="tl-marker"></span>
                        <p class="tl-title">แจ้งซ่อม</p>
                        <time class="tl-time" datetime="${data.datetime_command}" >${datetime_command_th}</time>
                    </div>
                    <div class="tl-body">
                        <p>แจ้งซ่อมบำรุง ${data.name_subs_categories ? data.name_subs_categories : '-'} อาการ ${data.title ? data.title : '-'} สถานที่ ${data.detail_location ? data.detail_location : '-'}</p>
                    </div>
                </div>
            `;

            const unableProcessPhaseHtml = `
                <div id="repair_phase_div" class="tl-content">
                    <div class="tl-header">
                        <span class="tl-marker"></span>
                        <p class="tl-title" style="color:red;">ไม่สามารถดำเนินการได้</p>
                        <time class="tl-time" datetime="" >{เวลาที่แจ้งว่าไม่สามารถดำเนินการได้}</time>
                    </div>
                    <div class="tl-body">
                        <p>รอแอดมินดำเนินการเปลี่ยนเจ้าหน้าที่</p>
                    </div>
                </div>
            `;

            // const changeOfficerPhaseHtml = `
            //     <div id="repair_phase_div" class="tl-content">
            //         <div class="tl-header">
            //             <span class="tl-marker"></span>
            //             <p class="tl-title">แจ้งซ่อม</p>
            //             <time class="tl-time" datetime="${data.datetime_command}" >${datetime_command_th}</time>
            //         </div>
            //         <div class="tl-body">
            //             <p>แจ้งซ่อมบำรุง ${data.name_subs_categories ? data.name_subs_categories : '-'} อาการ ${data.title ? data.title : '-'} สถานที่ ${data.detail_location ? data.detail_location : '-'}</p>
            //         </div>
            //     </div>
            // `;
            let photo_officer;
            if (data.officers[0].photo) {
                photo_officer = '{{ url('/') }}/storage/' + data.officers[0].photo;
            } else {
                photo_officer = '{{ url('img/stickerline/PNG/10.png') }}'; // ใช้รูป default ถ้าไม่มี photo
            }
            const pendingPhaseHtml = `
                <div id="pending_phase_div" class="tl-content">
                    <div class="tl-header">
                        <span class="tl-marker"></span>
                        <p class="tl-title">เจ้าหน้าที่รับแจ้ง</p>
                        <time class="tl-time" datetime="${data.datetime_start}">${datetime_start_th} (${datetime_command_to_start_th})</time>
                    </div>
                    <div class="tl-body">
                        <p>
                            เจ้าหน้าที่ ${data.officers[0].full_name} รับเรื่องแจ้งซ่อมบำรุง <b>จะดำเนินการภายในวันที่ ${datetime_start_th}</b>
                            และ <b>คาดว่าจะเสร็จภายในวันที่ ${datetime_end_th}</b>
                        </p>
                        <div>
                            <div class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                <div>
                                    <img src="${photo_officer}" class="rounded-circle" width="46" height="46" alt="" style="object-fit: cover;">
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1 font-14"><b>${data.officers[0].full_name}</b></h6>
                                    <a href="tel:${data.officers[0].phone}" class="mb-0 font-13 text-secondary">${data.officers[0].phone}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            const progressPhaseHtml = `
                <div id="progress_phase_div" class="tl-content">
                    <div class="tl-header">
                        <span class="tl-marker"></span>
                        <p class="tl-title">ดำเนินการ</p>
                        <time class="tl-time" datetime="${data.datetime_process}">${datetime_process_th} (${datetime_command_to_process_th})</time>
                    </div>
                    <div class="tl-body">
                        <p>เจ้าหน้าที่ กำลังเดินทางไปซ่อมบำรุง${data.name_subs_categories ? data.name_subs_categories : ''}</p>
                    </div>
                </div>
            `;
            // let successForm;
            // if (form === "จัดซื้อจัดจ้าง") {
            //     successForm = `<p>
            //                         ไม่สามารถซ่อมบำรุงได้ <br>
            //                         ทำการจัดซื้อจัดจ้าง
            //                     </p>`;
            // } else {
            //     successForm = `<p>
            //                         ซ่อมบำรุงเสร็จสิ้น <br>
            //                         ${deadLine_cal}
            //                     </p>`;
            // }
            const successPhaseHtml = `
                <div id="success_phase_div" class="tl-content">
                    <div class="tl-header">
                        <span class="tl-marker"></span>
                        <p class="tl-title">เสร็จสิ้น</p>
                        <time class="tl-time" datetime="${data.datetime_success}">${datetime_success_th} (${datetime_command_to_success_th})</time>
                    </div>
                    <div class="tl-body">
                        <p>
                            ซ่อมบำรุงเสร็จสิ้น <br>
                            ${deadLine_cal}
                        </p>
                    </div>
                </div>
            `;

            // รวม HTML ตามสถานะ และเพิ่มคลาส tl-content-active ให้กับ HTML สุดท้าย
            let html = '';
            if (data.status === 'แจ้งซ่อม') {
                html += setActiveClass(repairPhaseHtml, true);
            } else if (data.status === 'ไม่สามารถดำเนินการได้') {
                html += repairPhaseHtml + setActiveClass(unableProcessPhaseHtml, true);
            } else if (data.status === 'รอดำเนินการ') {
                html += repairPhaseHtml + setActiveClass(pendingPhaseHtml, true);
            } else if (data.status === 'กำลังดำเนินการ') {
                html += repairPhaseHtml + pendingPhaseHtml + setActiveClass(progressPhaseHtml, true);
            } else if (data.status === 'เสร็จสิ้น') {
                html += repairPhaseHtml + pendingPhaseHtml + progressPhaseHtml + successPhaseHtml;
            }

            return html;
        }

        // ฟังก์ชันช่วยเหลือสำหรับเพิ่มคลาส tl-content-active
        function setActiveClass(html, isLast) {
            return isLast ? html.replace('class="tl-content"', 'class="tl-content tl-content-active"') : html;
        }

        function getformatDateTime(data_maintain) {
            let datetime_command = data_maintain.datetime_command ? formatThaiDate(data_maintain.datetime_command) : '-';
            let datetime_start = data_maintain.datetime_start ? formatThaiDate(data_maintain.datetime_start) : '-';
            let datetime_end = data_maintain.datetime_end ? formatThaiDate(data_maintain.datetime_end) : '-';
            let datetime_success = data_maintain.datetime_success ? formatThaiDate(data_maintain.datetime_success) : '-';

            document.querySelector('#datetime_command_text').innerHTML = datetime_command;
            document.querySelector('#datetime_start_text').innerHTML = datetime_start;
            document.querySelector('#datetime_end_text').innerHTML = datetime_end;
            document.querySelector('#datetime_success_text').innerHTML = datetime_success;

        }
        // ฟังก์ชันสำหรับแปลงวันที่
        function formatThaiDate(datetime) {
            if (datetime) {
                const months = [
                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                    "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ];

                // แปลง string เป็น Date object
                const dateObj = new Date(datetime);

                // ดึงข้อมูลวัน เดือน ปี และเวลา
                const day = dateObj.getDate();
                const month = months[dateObj.getMonth()];
                const year = dateObj.getFullYear() + 543; // เพิ่ม 543 สำหรับปีพุทธศักราช
                const hours = dateObj.getHours().toString().padStart(2, '0'); // เติม 0 หากชั่วโมงเป็นตัวเลขหลักเดียว
                const minutes = dateObj.getMinutes().toString().padStart(2, '0'); // เติม 0 หากนาทีเป็นตัวเลขหลักเดียว

                // คืนค่าข้อความในรูปแบบที่ต้องการ
                return `${day} ${month} ${year} เวลา ${hours}.${minutes} น.`;
            } else {
                return `-`;
            }

        }

        function DateTimeCal(dateA,dateB){
            if (!dateA || !dateB) {
                console.error("หนึ่งในค่าที่ส่งมาเป็น null หรือ undefined");
                return "-"; // คืนค่าเริ่มต้นหรือข้อความแจ้ง
            }

            // แปลง string เป็น Date object
            let dateTime_A = new Date(dateA.replace(" ", "T")); // แปลง ' ' เป็น 'T' เพื่อใช้ ISO 8601
            let dateTime_B = new Date(dateB.replace(" ", "T"));

            // หาค่าต่างระหว่างสองเวลา (ผลลัพธ์เป็นมิลลิวินาที)
            let differenceInMilliseconds = dateTime_A - dateTime_B;

            // แปลงมิลลิวินาทีเป็นวัน ชั่วโมง นาที
            let differenceInSeconds = differenceInMilliseconds / 1000; // แปลงมิลลิวินาทีเป็นวินาที
            let differenceInMinutes = differenceInSeconds / 60; // แปลงวินาทีเป็นนาที
            let differenceInHours = differenceInMinutes / 60; // แปลงนาทีเป็นชั่วโมง
            let differenceInDays = Math.floor(differenceInHours / 24); // แปลงชั่วโมงเป็นวัน
            let remainingHours = Math.floor(differenceInHours % 24); // ชั่วโมงที่เหลือจากวันที่
            let remainingMinutes = Math.floor(differenceInMinutes % 60); // นาทีที่เหลือจากชั่วโมง

            // สร้างข้อความที่แสดงผล
            let result = '';

            if (differenceInDays > 0) {
                result += `${differenceInDays} วัน `;
            }

            if (remainingHours > 0) {
                result += `${remainingHours} ชั่วโมง `;
            }

            if (remainingMinutes > 0 || (differenceInDays === 0 && remainingHours === 0)) {
                result += `${remainingMinutes} นาที`;
            }

            return result;
        }

        function DateTimeDeadLine(dateA,dateB){
            if (!dateA || !dateB) {
                console.error("หนึ่งในค่าที่ส่งมาเป็น null หรือ undefined");
                return "-"; // คืนค่าเริ่มต้นหรือข้อความแจ้ง
            }
            // แปลง string เป็น Date object
            let deadLine_A = new Date(dateA.replace(" ", "T"));
            let deadLine_B = new Date(dateB.replace(" ", "T"));

            // คำนวณความแตกต่างในมิลลิวินาที
            let differenceInMilliseconds = deadLine_A - deadLine_B;

            // แปลงเป็นนาที
            let differenceInMinutes = Math.floor(differenceInMilliseconds / (1000 * 60));

           // ตรวจสอบว่าเสร็จเร็วหรือล่าช้า
            let resultMessage = "";
            if (differenceInMilliseconds > 0) {
                // ล่าช้า
                resultMessage = `<b>ล่าช้ากว่าที่กำหนด ${formatTimeDifference(differenceInMilliseconds)}</b>`;
            } else {
                // เร็วกว่า
                resultMessage = `<b>เร็วกว่าที่กำหนด ${formatTimeDifference(differenceInMilliseconds)}</b>`;
            }
            return resultMessage;
        }

        // แปลงเป็นวัน ชั่วโมง และนาที
        function formatTimeDifference(milliseconds) {
            const totalMinutes = Math.abs(Math.floor(milliseconds / (1000 * 60))); // เปลี่ยนเป็นนาทีทั้งหมด
            const days = Math.floor(totalMinutes / (60 * 24)); // คำนวณจำนวนวัน
            const hours = Math.floor((totalMinutes % (60 * 24)) / 60); // คำนวณจำนวนชั่วโมงที่เหลือ
            const minutes = totalMinutes % 60; // คำนวณจำนวนนาทีที่เหลือ

            // สร้างข้อความ
            let result = "";
            if (days > 0) result += `${days} วัน `;
            if (hours > 0) result += `${hours} ชั่วโมง `;
            if (minutes > 0 || result === "") result += `${minutes} นาที`; // ถ้านาทีเป็น 0 และไม่มีวัน/ชั่วโมง ให้แสดงเป็น "0 นาที"

            return result.trim(); // ตัดช่องว่างด้านหน้าและด้านหลัง
        }

        // ฟังก์ชันสร้างดาว
        function generateStars(rating) {
            const stars = [];
            const fullStars = rating ? Math.floor(rating) : 0; // คะแนนเต็ม
            const halfStars = rating && rating % 1 >= 0.5 ? 1 : 0; // คะแนนครึ่ง
            const emptyStars = 5 - fullStars - halfStars; // คะแนนว่าง

            for (let i = 0; i < fullStars; i++) {
                stars.push('<i class="fa-solid fa-star" style="color:#FFD058"></i>');
            }
            for (let i = 0; i < halfStars; i++) {
                stars.push('<i class="fa-solid fa-star-half-stroke" style="color:#FFD058"></i>');
            }
            for (let i = 0; i < emptyStars; i++) {
                stars.push('<i class="fa-solid fa-star" style="color:#e0e0e0"></i>');
            }

            // รวมดาวเป็น string และเพิ่มคะแนน
            document.querySelector('#quality_repair_div').innerHTML = stars.join('') + ' ' + "("+(rating || 0) +")";
        }



    </script>

@endsection
