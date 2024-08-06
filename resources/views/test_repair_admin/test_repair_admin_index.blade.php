@extends('layouts.partners.theme_partner_new')

<style>
    .border-repair {
        border-radius: 10px;
        border: 2px solid #000000;
    }

    .vertical-divider {
        position: absolute;
        top: 10%; /* ปรับให้ไม่ชิดด้านบน */
        bottom: 10%; /* ปรับให้ไม่ชิดด้านล่าง */
        left: 50%;
        width: 1px;
        background-color: #000; /* สีของเส้นกั้น */
    }

    .overflow-dot {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between">
            <div>
                <button id="btn_select_active_repair" type="button" class="btn btn-outline-danger active" onclick="change_select_active('repair');">
                    สถานะ : แจ้งซ่อม
                </button>
                <button id="btn_select_active_wait" type="button" class="btn btn-outline-warning" onclick="change_select_active('wait');">
                    สถานะ : รอดำเนินการ
                </button>
                <button id="btn_select_active_progress" type="button" class="btn btn-outline-info" onclick="change_select_active('progress');">
                    สถานะ : กำลังดำเนินการ
                </button>
                <button id="btn_select_active_success" type="button" class="btn btn-outline-success" onclick="change_select_active('success');">
                    สถานะ : เสร็จสิ้น
                </button>
            </div>
            <div class="dropdown float-end px-1">
                <button id="btn_dropdown_health_type" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    เลือกหมวดหมู่
                </button>
                <div id="item_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- item -->
                    <a class="dropdown-item btn" onclick="change_select_health_type('ทั้งหมด')">ทั้งหมด</a>
                    <a class="dropdown-item btn" onclick="change_select_health_type('ทั้งหมด')">อุปกรณ์สำนักงาน</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-md-12">
                {{-- card --}}
                <div class="card p-3 border-repair">
                    <div class="row">
                        <div class="col-2 text-center mt-2">
                            <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; border:#000000 solid 1px;" width="175px" height="175px">
                        </div>
                        <div class="col-10">
                            <div class="col-12 row ">
                                <div class="col-8">
                                    <span class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</span>
                                </div>
                                <div class="col-4" style="text-align: right;">
                                    <span class="btn btn-danger">สถานะ : แจ้งซ่อม </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <span class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">เครื่องปริ้น</b></span>&nbsp;&nbsp;&nbsp;
                                <span class="h5" style="font-weight: bold;">รหัสอุปกรณ์ : <b class="text-primary">ไม่มี</b></span>
                            </div>
                            <div class="col-12 row mb-4">
                                <div class="col-5">
                                    <div class="d-flex flex-column mb-4">
                                        <span class="overflow-dot" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</span>
                                        <span class="overflow-dot" style="font-weight: bold;">เบอร์ : .............</span>
                                        <span class="overflow-dot" style="font-weight: bold;">E-Mail : ........</span>
                                        <span class="overflow-dot" style="font-weight: bold;">ตำแหน่ง : .........</span>
                                        <span class="overflow-dot" style="font-weight: bold;">แผนก : ............</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 1 : <a >deer</a></span>
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 2 : <a >benze</a></span>
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 3 : <a >lucky</a></span>
                                    </div>
                                </div>
                                {{-- <div class="vertical-divider"></div> --}}
                                <div class="col-7">
                                    <div class="d-flex flex-column mb-4">
                                        <span class="overflow-dot" style="font-weight: bold;">สถานที่ : .................</span>
                                        <span class="overflow-dot" style="font-weight: bold;">รายละเอียดสถานที่ : .................</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="overflow-dot" style="font-weight: bold;">ลักษณะของปัญหาหรือความเสียหาย : ..................</span>
                                        <span class="overflow-dot" style="font-weight: bold;">รายละเอียดเพิ่มเติมเกี่ยวกับปัญหา : ..................</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="col-6">
                                    <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info" style="width: 150px;">ดูข้อมูล</a>
                                </div>

                                <div class="col-6 " style="text-align: end;">
                                    <span><b>วันที่แจ้ง  : 11 ธันวาคม 2024 เวลา 00.00 น.</b></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- card --}}
                <div class="card p-3 border-repair">
                    <div class="row">
                        <div class="col-2 text-center mt-2">
                            <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; " width="175px" height="175px">
                        </div>
                        <div class="col-10">
                            <div class="col-12 row ">
                                <div class="col-8">
                                    <span class="h4" style="font-weight: bold;">หมวดหมู่ : <b class="text-primary">อุปกรณ์สำนักงาน</b></span>
                                </div>
                                <div class="col-4" style="text-align: right;">
                                    <span class="btn btn-warning">สถานะ : รอดำเนินการ </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <span class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b>เครื่องปริ้น</b></span>&nbsp;&nbsp;&nbsp;
                                <span class="h5" style="font-weight: bold;">รหัสอุปกรณ์ : <b>ไม่มี</b></span>
                            </div>
                            <div class="col-12 row mb-4">
                                <div class="col-5">
                                    <div class="d-flex flex-column mb-4">
                                        <span class="overflow-dot" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</span>
                                        <span class="overflow-dot" style="font-weight: bold;">เบอร์ : .............</span>
                                        <span class="overflow-dot" style="font-weight: bold;">E-Mail : ........</span>
                                        <span class="overflow-dot" style="font-weight: bold;">ตำแหน่ง : .........</span>
                                        <span class="overflow-dot" style="font-weight: bold;">แผนก : ............</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 1 : <a >deer</a></span>
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 2 : <a >benze</a></span>
                                        <span class="overflow-dot" style="font-weight: bold;">ผู้รับผิดชอบ 3 : <a >lucky</a></span>
                                    </div>
                                </div>
                                {{-- <div class="vertical-divider"></div> --}}
                                <div class="col-7">
                                    <div class="d-flex flex-column mb-4">
                                        <span class="overflow-dot" style="font-weight: bold;">สถานที่ : .................</span>
                                        <span class="overflow-dot" style="font-weight: bold;">รายละเอียดสถานที่ : .................</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="overflow-dot" style="font-weight: bold;">ลักษณะของปัญหาหรือความเสียหาย : ..................</span>
                                        <span class="overflow-dot" style="font-weight: bold;">รายละเอียดเพิ่มเติมเกี่ยวกับปัญหา : ..................</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="col-6">
                                    <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info" style="width: 150px;">ดูข้อมูล</a>
                                </div>

                                <div class="col-6 " style="text-align: end;">
                                    <span><b>วันที่แจ้ง  : 12 ธันวาคม 2024 เวลา 00.00 น.</b></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    const change_select_active = (type_active) =>{

    //console.log(type_active);
    document.querySelector('#btn_select_active_repair').classList.remove('active');
    document.querySelector('#btn_select_active_wait').classList.remove('active');
    document.querySelector('#btn_select_active_progress').classList.remove('active');
    document.querySelector('#btn_select_active_success').classList.remove('active');

    document.querySelector('#btn_select_active_'+type_active).classList.add('active');

    data_type_active = type_active;
    }
</script>
@endsection
