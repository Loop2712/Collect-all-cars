@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .not_area {
        width: 100%;
        height: calc(100dvh);
        position: relative;
    }

    .icon_sorry {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
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

    .detail-item-maintain {
        /* white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
        /* width: 100%; */
        margin-left: 10px;
    }

    .text-item-maintain {
        line-height: 1.3;
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

    .text-overflow-1 {
        display: -webkit-box;
        width: 100%;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-overflow-2 {
        display: -webkit-box;
        width: 100%;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-danger,
    .bg-light-danger {
        background-color: #fbe0e0;
        color: #e62e45;
    }

    .text-warning,
    .bg-light-warning {
        background-color: #ede1ff !important;
        color: #8833ff !important;
    }

    .bg-light-primary {
        background-color: #e2e5ff;
    }

    .text-success,
    .bg-light-success {
        background-color: #dff7e1;
    }

    .tag-new {
        background-color: #e62e45;
        color: #fff;
        border-radius: 50px;
        padding: 3px 15px;
        font-size: 12px !important;
        position: absolute;
        top: 0%;
        right: 0%;
        transform: translate(-50%, -50%);
    }
</style>
<div class="container">
    <div class="not_area d-none">
        <div class="icon_sorry">
            <img src="{{url('img/stickerline/PNG/5.png')}}" style="max-width: 150px;" alt="">
            <p class="text-center mt-3 mb-0"><b>ขออภัย</b></p>
            <p class="text-center"><b>คุณไม่อยู่ในพื้นที่</b></p>
        </div>
    </div>

    <div class="pt-4 ">
        <div class="page-breadcrumb d-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                <p class="mb-0">การแแจ้งซ่อมของฉัน</p>
                <div class="area-maintain">
                    พื้นที่ : <span>asasdadafd</span>
                </div>
            </div>
            <div class="ms-auto">
                <button class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12 col-md-6 d-flex mb-3">
                    <div class="card radius-10 w-100">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{url('img/stickerline/PNG/5.png')}}" style="max-width:80px;object-fit: cover;" alt="">

                                </div>
                                <div class="detail-item-maintain">
                                    <span class="tag-new">NEW</span>
                                    <div class="d-flex mb-1">
                                        <span class="badge badge-pill bg-light-danger text-danger">แจ้งซ่อม</span>
                                        <span class="badge badge-pill bg-light-warning text-warning">รอดำเนินการ</span>
                                        <span class="badge badge-pill bg-light-primary text-primary">กำลังดำเนินการ</span>
                                        <span class="badge badge-pill bg-light-success text-success">เสร็จสิ้น</span>
                                    </div>
                                    <p class="mb-0 text-item-maintain font-18 text-overflow-1">แจ้งซ่อม : <span>sub_category</span></p>
                                    <p class="mb-0 text-item-maintain font-16 text-overflow-1">ประเภท : <span>category</span></p>
                                    <div class="text-overflow-2">

                                        <p class="mb-0 text-item-maintain font-14 ">detail</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex mb-3">
                    <div class="card radius-10 w-100">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{url('img/stickerline/PNG/5.png')}}" style="max-width:80px;object-fit: cover;" alt="">

                                </div>
                                <div class="detail-item-maintain">
                                    <div class="d-flex mb-1">
                                        <span class="badge badge-pill bg-light-danger text-danger">แจ้งซ่อม</span>
                                    </div>
                                    <p class="mb-0 text-item-maintain font-18 text-overflow-1">แจ้งซ่อม : <span>คอมพิวเตอร์</span></p>
                                    <p class="mb-0 text-item-maintain font-16 text-overflow-1">ประเภท : <span>อุปกรณ์สำนักงาน</span></p>
                                    <div class="text-overflow-2">

                                        <p class="mb-0 text-item-maintain font-14 ">เปิดไม่ติด</p>
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
@endsection