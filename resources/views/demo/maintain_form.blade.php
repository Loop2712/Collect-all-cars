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
</style>
<div class="container">
    <div class="pt-4">
        <h6 class="mb-0">แบบฟอร์มแจ้งซ่อม</h6>
        <hr>
        <div class="content">
            <div class="row p-3">
                <div class="px-3 py-1 col-12 col-md-6 mb-4">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">ข้อมูลผู้แจ้ง</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="maintain_notified_name" name="maintain_notified_name">
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">เบอร์</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                                <div class="col-12">
                                    <label for="mail" class="form-label">อีเมล</label>
                                    <input type="email" class="form-control" id="mail">
                                </div>
                                <div class="col-6">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="position" name>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">แผนก</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-1 col-12 col-md-6">

                    <div class="card border-top border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-wrench me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">ข้อมูลการแจ้ง</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="categoty" class="form-label">หมวดหมู่</label>
                                    <input type="text" class="form-control" id="categoty">
                                </div>
                                <div class="col-12">
                                    <label for="sub_category" class="form-label">หมวดหมู่ย่อย</label>
                                    <input type="text" class="form-control" id="sub_category">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">สถานที่</label>
                                    <input type="" class="form-control" id="" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รายละเอียดสถานที่</label>
                                    <textarea class="form-control" id="inputAddress3" placeholder="กรอกรายละเอียดสถานที่ เช่น อาคาร ชั้น" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">ลักษณะของปัญหาหรือความเสียหาย</label>
                                    <input type="" class="form-control" id="">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รายละเอียดเพิ่มเติม</label>
                                    <textarea class="form-control" id="inputAddress3" placeholder="กรอกรายละเอียดเพิ่มเติมเกี่ยวกับปัญหา" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รูปภาพ</label>
                                    <div class="img-box">

                                        <div class="img-item">
                                            <div class="icon-img-item">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="img-item">
                                            <div class="icon-img-item">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-5">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection