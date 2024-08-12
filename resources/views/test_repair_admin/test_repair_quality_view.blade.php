@extends('layouts.partners.theme_partner_new')
    <style>

    </style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                {{-- card --}}
                <div class="card p-3">
                    <div class="row mb-4 p-2">
                        <div class="col-12 col-md-10 mt-2">
                            <div class="m-2 d-flex justify-content-start align-items-center">
                                <div class="" style="margin-right: 1rem;">
                                    <div class="header_img">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/White-tailed_deer.jpg/640px-White-tailed_deer.jpg" style="object-fit: cover;border-radius:50%" alt="" width="75px" height="75px">
                                    </div>
                                </div>
                                <div class="mx-2">
                                    <span class="h4" style="font-weight: bold;">{ name_officer } </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 d-flex justify-content-start align-items-center">
                            <span class="d-flex align-items-center justify-content-between btn btn-success radius-10 px-4" style="cursor: text;">ดำเนินการทั้งหมด&nbsp;&nbsp;
                                <b style="font-size: 25px;">278</b>
                            </span>
                        </div>
                    </div>
                    {{-- item #1 --}}
                    <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #cfeeef;">
                        <div class="col-12 col-md-12 d-flex  flex-column">
                            <div class="m-2 row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/20.png" style="object-fit: cover;border-radius:50%" style="object-fit: cover;border-radius:50%" alt="" width="50px" height="50px"alt="" width="50px" height="50px">
                                        </div>
                                        <div class="d-flex align-items-center" style="margin-left: 10px;">
                                            <div style="font-family: 'Kanit', sans-serif;">
                                                <h4 class="m-0">
                                                    <b>{ User } </b>
                                                </h4>
                                                <p class="m-0">{ date }</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <span class="btn btn-danger" style="float: right;">สถานะ : แจ้งซ่อม</span>
                                </div>
                            </div>
                            <div class="row my-3 px-0">
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">คุณภาพงานซ่อม</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ความรวดเร็ว</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ความประทับใจ</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ภาพรวม</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 ">
                                    <div class=" bg-secondary radius-10 d-flex justify-content-center align-items-center m-2 px-4">
                                        <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/20.png" style="object-fit: cover; border-radius:10px;"  alt="" width="170px" height="170px"alt="">
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">หมายเหตุจากแอดมิน</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark_admin}</span>
                                    </div>
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">หมายเหตุจากเจ้าหน้าที่</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark }</span>
                                    </div>
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">คำแนะนำติชมจากผู้แจ้ง</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark }</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- item #2 --}}
                    <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #cfeeef;">
                        <div class="col-12 col-md-12 d-flex  flex-column">
                            <div class="m-2 row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/20.png" style="object-fit: cover;border-radius:50%" style="object-fit: cover;border-radius:50%" alt="" width="50px" height="50px"alt="" width="50px" height="50px">
                                        </div>
                                        <div class="d-flex align-items-center" style="margin-left: 10px;">
                                            <div style="font-family: 'Kanit', sans-serif;">
                                                <h4 class="m-0">
                                                    <b>{ User } </b>
                                                </h4>
                                                <p class="m-0">{ date }</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <span class="btn btn-warning" style="float: right;">สถานะ : รอดำเนินการ</span>
                                </div>
                            </div>
                            <div class="row my-3 px-0">
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">คุณภาพงานซ่อม</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ความรวดเร็ว</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ความประทับใจ</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 ">
                                    <div class="w-100 bg-white radius-30 d-flex justify-content-evenly align-items-center"  >
                                        <b style="color:black;">ภาพรวม</b>
                                        <b style="font-size: 35px; color:black;">4.5</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 ">
                                    <div class=" bg-secondary radius-10 d-flex justify-content-center align-items-center m-2 px-4">
                                        <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/20.png" style="object-fit: cover; border-radius:10px;"  alt="" width="170px" height="170px"alt="">
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">หมายเหตุจากแอดมิน</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark_admin}</span>
                                    </div>
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">หมายเหตุจากเจ้าหน้าที่</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark }</span>
                                    </div>
                                    <div class="col-12 card px-4 py-2 radius-10 ">
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">คำแนะนำติชมจากผู้แจ้ง</span>
                                        <span style="font-weight: bold; font-size: 26px; color:#000000;">{$remark }</span>
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
