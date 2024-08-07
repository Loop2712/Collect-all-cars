@extends('layouts.partners.theme_partner_new')
    <style>
        .circle_img {
            width: 50px;
            height: 50px;
            background-color: #000; /* สีของวงกลม */
            border-radius: 50% ;
        }

        .circle_img img {
            border-radius: 50% ;
        }
    </style>
@section('content')
    <div class="p-4">
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
    </div>

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
                                                    <div  style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                        <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                        <p class="text-center  m-0"  style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
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
                                                    <div  style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                        <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                        <p class="text-center  m-0"  style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
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
                                                    <div  style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                        <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                        <p class="text-center  m-0"  style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
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
                                                    <div  style="background-color: #71c2ec;border-radius: 15px;font-family: 'Kanit', sans-serif; padding:10px 0px">
                                                        <h3 class="m-0 text-center " style="color: {x_impression_font};">5.0</h3>
                                                        <p class="text-center  m-0"  style="font-weight: bold;color:{x_impression_font}}">คะแนน</p>
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
    </div>
@endsection
