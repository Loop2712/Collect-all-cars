@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .status-repair {
        position: absolute;
        top: 40px;
        right: 10px;
        transform: translate(-50%, -50%);
    }

    .overflow {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: calc(100% - 80px);

    }

    .overflow-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* 
    .overflow:hover {
        white-space: normal; 
        overflow: visible; 
        text-overflow: unset; 
    } */
    .sticky {
        position: relative;
        top: 60px;
        height: fit-content;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3" style="border-right:none ;">รายละเอียดการประเมินคุณภาพการซ่อม</div>

    </div>
    <div class="row">
        <div class="col-md-3 col-12 ">
            <div class="card radius-15">
                <div class="card-body text-center">
                    <div class="p-4 border radius-15">
                        <span class="badge bg-danger status-repair">แจ้งซ่อม</span>
                        <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                        <h5 class="mb-0 mt-2"><b>{name_user}</b></h5>
                        <p class="mb-3 mt-0">{date}</p>

                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="fm-file-box bg-light-primary text-primary"><i class="fa-duotone fa-solid fa-medal"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class=" text-start mb-0"><b>คุณภาพ</b></h6>
                                <div class="d-flex">
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                </div>
                            </div>
                            <h6 class="text-primary mb-0">5 คะแนน</h6>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div class="fm-file-box bg-light-success text-success"><i class="fa-solid fa-person-running-fast"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class=" text-start mb-0"><b>ความเร็ว</b></h6>
                                <div class="d-flex">
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                                </div>
                            </div>
                            <h6 class="text-primary mb-0">4 คะแนน</h6>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div class="fm-file-box bg-light-danger text-danger"><i class="fa-solid fa-face-smile-beam"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class=" text-start mb-0"><b>พึงพอใจ</b></h6>
                                <div class="d-flex">
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                                    <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                                </div>
                            </div>
                            <h6 class="text-primary mb-0">3 คะแนน</h6>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div class="fm-file-box bg-light-info text-info"><i class="fa-solid fa-stars"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class=" text-start mb-0"><b>รวม</b></h6>
                                <div class="d-flex">
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                    <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                                </div>
                            </div>
                            <h6 class="text-primary mb-0">4 คะแนน</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12 " style="position: relative;height: fit-content;">
            <div class="card radius-15 p-3">
                <div class="">
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-regular fa-screwdriver-wrench me-1 font-22 text-dark"></i>
                            <h4 class="mb-0 text-dark"><b>รายละเอียดการแจ้งซ่อม</b></h4>
                        </div>

                    </div>
                    <div class="w-100 p-2">
                        <p class="h5" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                        <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <span class="text-danger">เครื่องปริ้น</span></p>
                        <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <span class="text-primary">ไม่มี</span></p>

                        <div class="repair_detail row">

                            <div class="col-12 col-md-12 ">
                                <div>
                                    <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                                    <hr class="my-2">
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ..................</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ..................</p>
                                    <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : .................</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : .................</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mt-3">
                                <div>
                                    <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                                    <hr class="my-2">
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                                    <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                                </div>
                            </div>

                        </div>

                     
                    </div>
                </div>
            </div>
            <div class="card radius-15 p-3">
                <div class="">
                    <div class="d-flex my-3 justify-content-between flex-wrap">
                        <div class="d-flex">
                            <i class="fa-solid fa-comment-captions me-2 font-22 text-dark"></i>
                            <h4 class="mb-0 text-dark"><b>หมายเหตุ</b></h4>
                        </div>

                    </div>
                    <div class="repair_detail row">

                        <div class="col-12 col-md-4 mt-3">
                            <div>
                                <h5 class="mb-0 text-danger" style="font-weight: bolder;">จากแอดมิน</h5>
                                <hr class="my-2">
                                <p class="overflow-dot mb-0" style="font-weight: bold;">{$remark_admin}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-3">
                            <div>
                                <h5 class="mb-0 text-info" style="font-weight: bolder;">จากเจ้าหน้าที่</h5>
                                <hr class="my-2">
                                <p class="overflow-dot mb-0" style="font-weight: bold;">{$remark_admin}</p>

                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-3">
                            <div>
                                <h5 class="mb-0 text-info" style="font-weight: bolder;">จากผู้แจ้ง</h5>
                                <hr class="my-2">
                                <p class="overflow-dot mb-0" style="font-weight: bold;">{$remark_admin}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection