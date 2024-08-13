@extends('layouts.partners.theme_partner_new')

@section('content')
    <style>
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
            position: -webkit-sticky; /* สำหรับ Safari */
            position: sticky;
            top: 80px; /* ระยะห่างจากด้านบนของหน้าจอ */
        }

        /* Thumbnail */
        .gallery-container {
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        .main-image img {
            width: 85%;
            height: 230px;
            border-radius: 10px;
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap; /* ให้รูปภาพซับห่อไลน์เมื่อพื้นที่ไม่พอ */
            gap: 10px; /* เพิ่มระยะห่างระหว่างรูปภาพซับ */
            margin-top: 5px;
            max-width: 100%; /* ให้ความกว้างไม่เกิน parent div */
            box-sizing: border-box; /* รวม padding และ border เข้าไปในความกว้าง */
        }

        .thumbnail {
            width: 50px;
            height: 50px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.3s;
            border-radius: 5px;
        }

        .thumbnail:hover {
            border-color: #888;
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

        #modal_main_image{
            height: calc(100% - 100px);
        }



    </style>

    <!-- carousel -->
  <link href="{{ asset('carousel-12/css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Modal Structure -->
    {{-- <div class="modal fade" id="imageModal_in_sidebar" tabindex="-2" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modal_main_image" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100">
            </div>
        </div>
        </div>
    </div> --}}

    <div class="modal fade h-100 " id="imageModal_in_sidebar" tabindex="-2" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 800px;">
                    <img id="modal_main_image" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100 h-100">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" id="prevImage" style="width: 120px;">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button type="button" class="btn btn-secondary" id="nextImage" style="width: 120px;">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3 ">
                <div class="card radius-10 p-0 sticky-sidebar">
                    <div class="text-center d-block my-3">
                        <div class="gallery-container">
                            <div class="main-image p-2">
                                <img data-bs-toggle="modal" data-bs-target="#imageModal_in_sidebar" id="mainImage" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="Main Image">
                            </div>
                            <div class="thumbnail-container">
                                <img class="thumbnail" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="Image 1" onclick="changeImage(this)">
                                <img class="thumbnail" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" alt="Image 2" onclick="changeImage(this)">
                                <img class="thumbnail" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="Image 3" onclick="changeImage(this)">
                                <img class="thumbnail" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" alt="Image 4" onclick="changeImage(this)">
                                <img class="thumbnail" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="Image 5" onclick="changeImage(this)">
                            </div>
                        </div>
                    </div>
                    <div class="m-2">
                        <b class="h4" style="font-weight: bold; display: block;">หมวดหมู่ :
                            <span class="text-primary">อุปกรณ์สำนักงาน</span></b>
                        <b class="h5" style="font-weight: bold; display: block;">หัวข้อ : <span>เครื่องปริ้น</span></b>
                        <b class="h5" style="font-weight: bold; display: block;">รหัสอุปกรณ์ :
                            <span>ไม่มีข้อมูล</span></b>
                    </div>
                    <div  class="mt-2 px-3">
                        <textarea class="border-repair w-100 p-2" id="remark_textarea_admin_sidebar" placeholder="ข้อเสนอแนะจากแอดมิน" cols="30" rows="5" oninput="confirm_delay()"></textarea>
                    </div>

                    <div class=" text-center p-3 ">
                        <div class="row ">
                            <div class="col-6">
                                <button id="btn_confirm_admin_remark" class="btn btn-success disabled h-100" onclick="forward_repair()"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    ยืนยันการเปลี่ยนแปลง
                                </button>
                            </div>
                            <div class="col-6">
                                <button id="btn_forward_repair" style="font-weight: bold; display: block; width:100%; " class="btn btn-warning disabled h-100">
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

            <div class="col-12 col-md-9 col-lg-9">
                <div class="card radius-10">
                    <div class="col-12 row p-4">
                        <div class="col-6 d-flex align-items-center">
                            {{-- <span style="font-size: 16px; font-weight: bold;">วันที่แจ้ง  : 32 ธันวาคม 3024 เวลา 00.00 น.</span> --}}
                            <b style="font-size: 16px; color:#000000;">วันที่แจ้ง : <span
                                    style="font-weight: normal; color:#6c757d;">32 ธันวาคม 3024 เวลา 00.00 น.</span></b>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <div class="dropdown float-end px-1">
                                <b id="text_status" class="btn btn-danger">สถานะ : แจ้งซ่อม</b>
                                <button id="btn_dropdown_health_type" class="btn btn-outline-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    เลือกสถานะ
                                </button>
                                <div id="item_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <!-- item -->
                                    <a class="dropdown-item btn text-danger"
                                        onclick="change_select_status_repair('แจ้งซ่อม')">แจ้งซ่อม</a>
                                    <a class="dropdown-item btn text-warning"
                                        onclick="change_select_status_repair('รอดำเนินการ')">รอดำเนินการ</a>
                                    <a class="dropdown-item btn text-info"
                                        onclick="change_select_status_repair('กำลังดำเนินการ')">กำลังดำเนินการ</a>
                                    <a class="dropdown-item btn text-success"
                                        onclick="change_select_status_repair('เสร็จสิ้น')">เสร็จสิ้น</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <b style="font-size: 16px; color:#000000;">ผู้แจ้ง :
                                <span style="font-weight: normal; color:#6c757d;">นายฐนกร ตุงคโสภา</span>
                            </b>
                            <div class="row mt-2">
                                <div class="col-4"> <b style="font-size: 16px; color:#000000;">เบอร์ :
                                        <span style="font-weight: normal; color:#6c757d;">082-3456789</span>
                                    </b></div>
                                <div class="col-4"><b style="font-size: 16px; color:#000000;">Email :
                                        <span style="font-weight: normal; color:#6c757d;">deer@gmail.com</span>
                                    </b></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4"> <b style="font-size: 16px; color:#000000;">ตำแหน่ง :
                                        <span style="font-weight: normal; color:#6c757d;">พนักงานทั่วไป</span>
                                    </b></div>
                                <div class="col-4"><b style="font-size: 16px; color:#000000;">แผนก :
                                        <span style="font-weight: normal; color:#6c757d;">แผนกใหม่</span>
                                    </b></div>
                            </div>

                        </div>

                        <div class="col-12 mt-4">
                            <b style="font-size: 16px; color:#000000;">ผู้รับผิดชอบ :
                                <span style="font-weight: normal; color:#6c757d;">นายก ขคง</span>
                            </b>
                        </div>
                        <div class="col-12 mt-4">
                            <b style="font-size: 16px; color:#000000;">สถานที่ :
                                <span style="font-weight: normal; color:#6c757d;">พื้นที่ A</span>
                            </b>
                        </div>
                        <div class="col-12 mt-2">
                            <b style="font-size: 16px; color:#000000;">รายละเอียดสถานที่ :
                                <span
                                    style="font-weight: normal; color:#6c757d;">......................................</span>
                            </b>
                        </div>

                        <div class="col-12 mt-4">
                            <b style="font-size: 16px; color:#000000;">ลักษณะของปัญหาหรือความเสียหาย :
                                <span
                                    style="font-weight: normal; color:#6c757d;">......................................</span>
                            </b>
                        </div>
                        <div class="col-12 mt-2">
                            <b style="font-size: 16px; color:#000000;">รายละเอียดเพิ่มเติมเกี่ยวกับปัญหา :
                                <span
                                    style="font-weight: normal; color:#6c757d;">......................................</span>
                            </b>
                        </div>
                    </div>

                    <hr class="thick-hr my-4 mx-3">

                    <div class="col-12 row p-4">
                        <div style="text-align: right;">
                            <div class="dropdown float-end px-1">
                                <b id="text_priority" class="btn btn-danger">ลำดับความสำคัญ : ด่วนมาก</b>
                                <button  class="btn btn-outline-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    เลือกลำดับความสำคัญ
                                </button>
                                <div id="item_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <!-- item -->
                                    <a class="dropdown-item btn text-danger"
                                        onclick="change_select_priority('very_urgent')">ด่วนมาก</a>
                                    <a class="dropdown-item btn text-warning"
                                        onclick="change_select_priority('urgent')">ด่วน</a>
                                    <a class="dropdown-item btn text-info"
                                        onclick="change_select_priority('normal')">ปกติ</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class=" row mt-4">
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
                            </div>
                            <div class=" row mt-4">
                                <div class="col-4">
                                    <b style="font-size: 16px; color:#000000;">วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม
                                        <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">1. ..............    จำนวน .......</span>
                                        <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">2. ..............    จำนวน .......</span>
                                        <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">3. ..............    จำนวน .......</span>
                                        <span style="font-weight: normal; color:#6c757d; display: block; margin-left: 20px;">n. ..............    จำนวน .......</span>
                                    </b>
                                </div>
                            </div>
                            <div class="col-12 row mt-4">
                                <b style="font-size: 16px; color:#000000;">ค่าใช้จ่ายในการซ่อม :
                                    <span style="font-weight: normal; color:#6c757d;">................</span>
                                </b>
                            </div>

                            <div class=" row mt-4">
                                <div class="container">
                                    <div class="row no-gutters mx-3">
                                        <div class=" owl-1-style">
                                            <div class="owl-carousel myCarousel owl-1 ">

                                                <div class="gallery-item item ">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal1" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                                <div class="gallery-item item">
                                                    <a data-bs-toggle="modal" data-bs-target="#imageModal2" class="galelry-lightbox">
                                                        <img class="receipt_main_image" style="object-fit: cover; height: 100px;" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-cover">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!-- Modal Structure -->
                            {{-- <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                </div>
                                </div>
                            </div> --}}

                            <div class="modal fade h-100 " id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body d-flex justify-content-center align-items-center" style="height: 800px;">
                                            <img id="modal_main_image_receipt" src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" alt="" class="img-fluid w-100 h-100 px-4 ">
                                        </div>

                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" id="prevImageReceipt" style="width: 120px;">
                                                <i class="fa-solid fa-arrow-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary" id="nextImageReceipt" style="width: 120px;">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-4">
                                <b style="font-size: 16px; color:#000000; display: block; margin-bottom: 1rem;">การประเมินคุณภาพการซ่อม </b>
                                <span class="mx-2 fa fa-star star_checked"></span>
                                <span class="mx-2 fa fa-star star_checked"></span>
                                <span class="mx-2 fa fa-star star_checked"></span>
                                <span class="mx-2 fa fa-star star_checked"></span>
                                <span class="mx-2 fa fa-star star_checked"></span>
                            </div>

                            <div class=" row mt-4">
                                <b style="font-size: 16px; color:#000000; ">ข้อเสนอแนะหรือความคิดเห็นจากผู้แจ้งซ่อม :
                                    <span style="font-weight: normal; color:#6c757d; display: block;">...............................................................</span>
                                </b>
                            </div>
                            <div class=" row mt-4">
                                <b style="font-size: 16px; color:#000000;">ข้อคิดเห็นจากช่างหรือผู้รับผิดชอบ :
                                    <span style="font-weight: normal; color:#6c757d; display: block;">...............................................................</span>
                                </b>
                            </div>
                            <div class=" row mt-4">
                                <div class="col-6 d-flex align-items-center">
                                    <b style="font-size: 16px; color:#000000;">ข้อเสนอแนะหรือความคิดเห็นจากแอดมิน :</b>
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
                                        <span id="admin_remark_textarea" style="font-weight: normal; color:#6c757d; display: block;">...............................................................</span>
                                    </b>
                                    {{-- <textarea id="admin_remark_textarea" class="mt-3 radius-10 p-2 " style="width: 100%; background-color: #DEEEF8;"  placeholder="" cols="30" rows="5"></textarea> --}}
                                </div>
                            </div>

                            <!-- Timeline -->
                            <div class="py-2 my-4">
                                {{-- card or border --}}
                                <div class="border radius-10 ">
                                    <div class="card-header bg-danger rounded-top">
                                        <h5 class="font-weight-light text-white px-2">รายการแจ้งซ่อม คอมพิวเตอร์</h5>
                                        <h6 class="font-weight-light text-white px-2">สถานะปัจจุบัน : เสร็จสิ้น</h6>
                                    </div>

                                    <!-- timeline item 1 -->
                                    <div class="row col-12 px-2">
                                        <div class="col-3 py-2 flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-center text-danger">แจ้งซ่อม</h5>
                                        </div>
                                        <!-- timeline item 1 left dot -->
                                        <div class="col-1 text-center flex-column d-none d-sm-flex">
                                            <div class="row h-100" >
                                                <div class="col">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                            <h6 class="m-2">
                                                <span class="badge rounded-pill bg-danger border" >&nbsp;</span>
                                            </h6>
                                            <div class="row h-100" >
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                        </div>
                                        <div class="col-8 py-2  flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-danger mt-2">2/7/2567</h5>
                                            <p class="card-text text-info">ใช้เวลา ........</p>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <!-- timeline item 2 -->
                                    <div class="row col-12 px-2">
                                        <div class="col-3 py-2 flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-center text-danger">รอดำเนินการ</h5>
                                        </div>
                                        <!-- timeline item 1 left dot -->
                                        <div class="col-1 text-center flex-column d-none d-sm-flex">
                                            <div class="row h-100">
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                            <h6 class="m-2">
                                                <span class="badge rounded-pill bg-danger border">&nbsp;</span>
                                            </h6>
                                            <div class="row h-100">
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                        </div>
                                        <div class="col-8 py-2  flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-danger mt-2">2/7/2567</h5>
                                            {{-- <p class="card-text text-info">ใช้เวลา ........</p> --}}
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <!-- timeline item 3 -->
                                    <div class="row col-12 px-2">
                                        <div class="col-3 py-2 flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-center text-danger">กำลังดำเนินการ</h5>
                                        </div>
                                        <!-- timeline item 1 left dot -->
                                        <div class="col-1 text-center flex-column d-none d-sm-flex">
                                            <div class="row h-100">
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                            <h6 class="m-2">
                                                <span class="badge rounded-pill bg-danger border">&nbsp;</span>
                                            </h6>
                                            <div class="row h-100">
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                        </div>
                                        <div class="col-8 py-2  flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-danger mt-2">2/7/2567</h5>
                                            {{-- <p class="card-text text-info">ใช้เวลา ........</p> --}}
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <!-- timeline item 4 -->
                                    <div class="row col-12 px-2">
                                        <div class="col-3 py-2 flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-center text-info">ส่งต่อ</h5>
                                        </div>
                                        <!-- timeline item 1 left dot -->
                                        <div class="col-1 text-center flex-column d-none d-sm-flex">
                                            <div class="row h-100">
                                                <div class="col border-end">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                            <h6 class="m-2">
                                                <span class="badge rounded-pill bg-info border">&nbsp;</span>
                                            </h6>
                                            <div class="row h-100">
                                                <div class="col border-end d-none">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                            </div>
                                        </div>
                                        <div class="col-8 py-2  flex-column d-flex justify-content-center">
                                            <h5 class="col-auto text-danger mt-2">2/7/2567</h5>
                                            <p class="card-text text-info">จาก ....... ไปยัง ..........</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


 <!-- Include jQuery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

 <script>
    $(document).ready(function(){
        $(".myCarousel").owlCarousel({
            autoplay: false,
            loop: false,
            items: 5,
            nav: true,
        });
    });

    // function changeImage(element) {
    //     // Change the main image source to the clicked thumbnail source
    //     var mainImage = document.getElementById('mainImage');
    //     mainImage.src = element.src;

    //     document.querySelector('#modal_main_image').src = element.src;

    //     // Remove 'active' class from all thumbnails
    //     var thumbnails = document.querySelectorAll('.thumbnail');
    //     thumbnails.forEach(function(thumbnail) {
    //         thumbnail.classList.remove('active');
    //     });

    //     // Add 'active' class to the clicked thumbnail
    //     element.classList.add('active');
    // }

    let currentImageIndex = 0;
    const thumbnails = document.querySelectorAll('.thumbnail');

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

    function changeImage_receipt(element) {
        var main_image_receipt = document.getElementById('modal_main_image_receipt');
        main_image_receipt.src = element.src;

        document.querySelector('#modal_main_image').src = element.src;

        // Remove 'active' class from all thumbnails
        receipt_thumbnails.forEach(function(receipt_thumbnail) {
            receipt_thumbnail.classList.remove('active');
        });

        // Add 'active' class to the clicked thumbnail
        element.classList.add('active');

        // Update current image index
        currentImageIndexReceipt = Array.from(receipt_thumbnails).indexOf(element);
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
    // Save the original text on page load
    window.onload = () => {
        originalText = document.querySelector('#remark_textarea_admin_sidebar').value;
    };

    function confirm_delay(){
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

    const forward_repair = () => {
        let remark_textarea = document.querySelector('#remark_textarea_admin_sidebar').value;
        let btn_confirm_admin_remark = document.querySelector('#btn_confirm_admin_remark');
        originalText = remark_textarea;

        if (remark_textarea) {
            console.log("if forward_repair");

            btn_forward_repair.classList.remove('disabled');
            document.querySelector('#admin_remark_textarea').innerHTML = remark_textarea;
        }else{
            console.log("else forward_repair");

            btn_forward_repair.classList.add('disabled');
            document.querySelector('#admin_remark_textarea').innerHTML = "..............................................................";
        }
        btn_confirm_admin_remark.classList.add('disabled');
    }


    const change_select_status_repair = (status) => {
        let repair_status = document.querySelector('#text_status');
            repair_status.setAttribute('class','btn btn-secondary');
            repair_status.innerHTML = "";

        if (status == "แจ้งซ่อม") {
            repair_status.setAttribute('class','btn btn-danger');
            repair_status.innerHTML = "สถานะ : แจ้งซ่อม";
        } else if(status == "รอดำเนินการ"){
            repair_status.setAttribute('class','btn btn-warning');
            repair_status.innerHTML = "สถานะ : รอดำเนินการ";
        }else if(status == "กำลังดำเนินการ"){
            repair_status.setAttribute('class','btn btn-info');
            repair_status.innerHTML = "สถานะ : กำลังดำเนินการ";
        }else{
            repair_status.setAttribute('class','btn btn-success');
            repair_status.innerHTML = "สถานะ : เสร็จสิ้น";
        }
    }

    const change_select_priority = (priority) => {
        let priority_status = document.querySelector('#text_priority');

        if (priority == "very_urgent") {
            priority_status.setAttribute('class','btn btn-danger');
            priority_status.innerHTML = "ลำดับความสำคัญ : ด่วนมาก";
        } else if(priority == "urgent"){
            priority_status.setAttribute('class','btn btn-warning');
            priority_status.innerHTML = "ลำดับความสำคัญ : ด่วน";
        }else{
            priority_status.setAttribute('class','btn btn-info');
            priority_status.innerHTML = "ลำดับความสำคัญ : ปกติ";
        }
    }

 </script>


@endsection
