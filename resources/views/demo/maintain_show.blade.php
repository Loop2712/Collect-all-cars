@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    footer,
    header,
    #topbar {
        display: none !important;
    }



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
    } .radius-50{
        border-radius: 50px !important;
        color: #fff !important;
    }
</style>
<div class="container">
    <div class="pt-4">
        <div class="content">
            <div class="row p-3">
                <div class="px-3 py-1 col-12 mb-3">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">ข้อมูลการแจ้งซ่อม</h5>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <h3><b>ซ่อม<span>catgory</span></b></h3>
                                    <p class="mb-0">สถานที่ : location</p>
                                    <p>ปัญหา : เปิดไม่ติด</p>
                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ea ab in sint magni aperiam ipsam inventore possimus enim. Voluptate impedit quos nisi minus, nulla quas consequuntur nobis eligendi cupiditate?</p>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="d-block text-center">
                                        <div class="img-show">
                                            <img src="{{url('img/stickerline/PNG/1.png')}}" alt="">
                                        </div>
                                        <div class="img-group">
                                            <img src="{{url('img/stickerline/PNG/1.png')}}" class="active" alt="">
                                            <img src="{{url('img/stickerline/PNG/2.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/3.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/4.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/5.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/6.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/7.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/8.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/9.png')}}" alt="">
                                            <img src="{{url('img/stickerline/PNG/10.png')}}" alt="">
                                        </div>
                                    </div>
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
                        });
                    });
                </script>
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
                <div class="px-3 py-1 col-12 col-md-6 mb-3">

                    <div class="card border-top border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-wrench me-1 font-22 text-success"></i>
                                </div>
                                <h5 class="mb-0 text-success">ระยะเวลาการแจ้ง</h5>
                            </div>
                            <hr>
                            <div class="timeline">
                                <div class="tl-content ">
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
                                <div class="tl-content">
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
                                <div class="tl-content">
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
                                <div class="tl-content tl-content-active">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-1 col-12 col-md-6 mb-5">

                    <div class="card border-top border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-wrench me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">ข้อมูลผู้แจ้ง</h5>
                            </div>
                            <hr>
                            <h3><b>Teerasak Senarak</b></h3>
                            <p class="mb-0">เบอร์ : 081-234-5678</p>
                            <p>อีเมล : test@test.com</p>
                            <p class="mb-0"><b>ผู้รับผิดชอบ 1 :</b> นาย ABCD</p>
                            <p class="mb-0"><b>ผู้รับผิดชอบ 2 :</b> นาย ABCDEFG</p>
                        </div>
                    </div>
                </div>
                <style>
                    .btn-rating{
                        position: fixed;
                        right: 15px;
                        bottom: 15px;
                        z-index: 996;
                        height: 40px;
                        width:  150px;
                        border-radius: 4px;
                        transition: all 0.4s;
                        margin-right: 10px;
                        margin-bottom: 15px;
                        transition: all .15s ease-in-out;
                    }
                    #a_up_short.active ~ div div div div a.btn-rating{
                        right: 65px !important;

                    }
                </style>
                <a type="submit" class="btn btn-primary radius-50 btn-rating">ประเมินงานซ่อม</a>
            </div>
        </div>

    </div>
</div>
@endsection
