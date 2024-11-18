@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .circle_img {
        width: 50px;
        height: 50px;
        background-color: #000;
        /* สีของวงกลม */
        border-radius: 50%;
    }

    .circle_img img {
        border-radius: 50%;
    }
</style>
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">การประเมินคุณภาพการซ่อม</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>พื้นที่</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <select class="form-select" id="select_status_repair" >
            <option selected="" value="ทั้งหมด">พื้นที่ : ทั้งหมด</option>
            <option value="พระนครศรีอยุธยา" >พระนครศรีอยุธยา</option>
            <option value="นครนายก" >นครนายก</option>
        </select>

    </div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                    <h5 class="mb-0 mt-2"><b>Pauline I. Bird</b></h5>
                    <p class="mb-3 mt-0">พระนครศรีอยุธยา</p>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">ดำเนินการ</span>
                        <span class="text-primary"><b>278 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">รอดำเนินการ</span>
                        <span class="text-info"><b>5 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">เสร็จสิ้น</span>
                        <span class="text-success"><b>273 เคส</b></span>
                    </div>
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
                    <div class="d-grid mt-3"> <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                    <h5 class="mb-0 mt-2"><b>Pauline I. Bird</b></h5>
                    <p class="mb-3 mt-0">นครนายก</p>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">ดำเนินการ</span>
                        <span class="text-primary"><b>278 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">รอดำเนินการ</span>
                        <span class="text-info"><b>5 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">เสร็จสิ้น</span>
                        <span class="text-success"><b>273 เคส</b></span>
                    </div>
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
                    <div class="d-grid mt-3"> <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                    <h5 class="mb-0 mt-2"><b>Pauline I. Bird</b></h5>
                    <p class="mb-3 mt-0">พระนครศรีอยุธยา</p>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">ดำเนินการ</span>
                        <span class="text-primary"><b>278 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">รอดำเนินการ</span>
                        <span class="text-info"><b>5 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">เสร็จสิ้น</span>
                        <span class="text-success"><b>273 เคส</b></span>
                    </div>
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
                    <div class="d-grid mt-3"> <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                    <h5 class="mb-0 mt-2"><b>Pauline I. Bird</b></h5>
                    <p class="mb-3 mt-0">นครนายก</p>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">ดำเนินการ</span>
                        <span class="text-primary"><b>278 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">รอดำเนินการ</span>
                        <span class="text-info"><b>5 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">เสร็จสิ้น</span>
                        <span class="text-success"><b>273 เคส</b></span>
                    </div>
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
                    <div class="d-grid mt-3"> <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="p-4">
    <div class="row">
        <div class="col-12 col-md-10 ">
            <span class="h3 px-0" style="font-weight: bold;">การประเมินคุณภาพการซ่อม</span>
        </div>
        <div class="col-12 col-md-2 text-center">
            <div class="dropdown px-4 ">
                <button style="width: 150px;" id="btn_dropdown_health_type"
                    class="btn btn-outline-secondary text-dark dropdown-toggle radius-10" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    เลือกพื้นที่
                </button>
                <div id="item_dropdown" class="dropdown-menu " aria-labelledby="btn_dropdown_health_type"
                    style="cursor: pointer;">
                    <a class="dropdown-item" onclick="change_select_area('พระนครศรีอยุธยา')">ViiCHECK
                        พระนครศรีอยุธยา</a>
                    <a class="dropdown-item" onclick="change_select_area('นครนายก')">ViiCHECK นครนายก</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            {{-- card --}}
            <div class="card p-3">
                <div class="row mb-4 p-2">
                    <div class="col-12 col-md-10 mt-2">
                        <span class="h4" style="font-weight: bold;">พื้นที่ : <b class="text-primary">ViiCHECK
                                พระนครศรีอยุธยา</b></span>
                    </div>
                    <div class="col-12 col-md-2 text-center mt-2">
                        <span class="h4" style="font-weight: bold;">
                            เจ้าหน้าที่ : 1 คน
                        </span>
                    </div>
                </div>
                {{-- item #1 --}}
                <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #0f72ac;">
                    <div class="col-12 col-md-11 d-flex flex-wrap  flex-column">
                        <div class="m-2 d-flex justify-content-start align-items-center">
                            <div class="">
                                <div class="circle_img">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/White-tailed_deer.jpg/640px-White-tailed_deer.jpg" width="100%" height="100%">
                                </div>
                            </div>
                            <div class="mx-2">
                                <span class="h4" style="font-weight: bold;">{ name_officer } </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="mx-1 ">
                                <span class="d-flex align-items-center justify-content-between btn btn-white radius-30 px-4" style="cursor: text;">ดำเนินการทั้งหมด&nbsp;&nbsp;
                                    <b style="font-size: 25px;">278</b>
                                </span>
                            </div>
                            <div class="mx-1 ">
                                <span class="d-flex align-items-center justify-content-between btn btn-white radius-30 px-4" style="cursor: text;">เสร็จสิ้น&nbsp;&nbsp;
                                    <b style="font-size: 25px;">278</b>
                                </span>
                            </div>
                            <div class="mx-1 ">
                                <span class="d-flex align-items-center justify-content-between btn btn-white radius-30 px-4" style="cursor: text;">รอดำเนินการ&nbsp;&nbsp;
                                    <b style="font-size: 25px;">278</b>
                                </span>
                            </div>
                            <div class="mx-1 ">
                                <span class="d-flex align-items-center justify-content-between btn btn-white radius-30 px-4" style="cursor: text;">การให้คะแนน&nbsp;&nbsp;
                                    <b style="font-size: 25px;">278</b>
                                </span>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                {{-- #1 --}}
                                <div class="col-md-3 col-lg-3 col-12 " style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                    <div style="background-color:#dae6ec;border-radius: 15px;padding:10px;">
                                        <div class="row">
                                            <div class="col-4" style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                                <div style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                    <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                    <p class="text-center  m-0" style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
                                                </div>
                                            </div>
                                            <div class="col-8 p-0 d-flex align-items-center" style="font-family: 'Kanit', sans-serif;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="m-0">คุณภาพงานซ่อมบำรุง</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- #2 --}}
                                <div class="col-md-3 col-lg-3 col-12 " style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                    <div style="background-color:#dae6ec;border-radius: 15px;padding:10px;">
                                        <div class="row">
                                            <div class="col-4" style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                                <div style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                    <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                    <p class="text-center  m-0" style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
                                                </div>
                                            </div>
                                            <div class="col-8 p-0 d-flex align-items-center" style="font-family: 'Kanit', sans-serif;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="m-0">ความรวดเร็ว</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- #3 --}}
                                <div class="col-md-3 col-lg-3 col-12 " style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                    <div style="background-color:#dae6ec;border-radius: 15px;padding:10px;">
                                        <div class="row">
                                            <div class="col-4" style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                                <div style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                    <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                    <p class="text-center  m-0" style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
                                                </div>
                                            </div>
                                            <div class="col-8 p-0 d-flex align-items-center" style="font-family: 'Kanit', sans-serif;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="m-0">ความประทับใจ</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- #4 --}}
                                <div class="col-md-3 col-lg-3 col-12 " style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                    <div style="background-color:#dae6ec;border-radius: 15px;padding:10px;">
                                        <div class="row">
                                            <div class="col-4" style="padding:0px 10px 0px 10px;border-radius: 10px;">
                                                <div style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                    <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                    <p class="text-center  m-0" style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
                                                </div>
                                            </div>
                                            <div class="col-8 p-0 d-flex align-items-center" style="font-family: 'Kanit', sans-serif;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="m-0">คะแนนความประทับใจเฉลี่ย</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i><i class="fa-solid fa-star" style="color:#FFD058"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-1 d-flex flex-wrap  flex-column justify-content-center align-items-end">
                        <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-danger d-flex justify-content-center align-items-center h-100 w-100">
                            <i class="fa-solid fa-chevron-right" style="font-size: 25px;"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> -->
@endsection
