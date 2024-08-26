@extends('layouts.partners.theme_partner_new')
    <style>
        .overflow-dot {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .fontMT{
            color: #000000;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
@section('content')
    <div class="p-4">
        <div class="row">
            <div class="col-12 col-md-10 ">
                <span class="h3 px-0" style="font-weight: bold;">ประวัติการซ่อมบำรุง</span>
            </div>
            <div class="col-12 col-md-2 text-center">
                <div class="dropdown px-4 ">
                    <button style="width: 150px;" id="btn_dropdown_health_type"
                        class="btn btn-outline-secondary text-dark dropdown-toggle radius-10" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        หัวข้อ
                    </button>
                    <div id="item_dropdown" class="dropdown-menu " aria-labelledby="btn_dropdown_health_type"
                        style="cursor: pointer;">
                        <a class="dropdown-item" onclick="change_select_area('ABC-115151')">ตู้เย็น ชั้น 1</a>
                        <a class="dropdown-item" onclick="change_select_area('ABC-1151599')">ตู้เย็น ชั้น 99</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{-- item #1 --}}
        <div class="card p-4 border-repair" style="background-color: #71c2ec;">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 fontMT" style="text-align: right;">
                        <span><b>วันที่แจ้ง  : 11 ธันวาคม 2024 เวลา 00.00 น.</b></span>
                    </div>
                    <div class="col-12 row mb-4">
                        <div class="col-12">
                            <span class="h3" style="font-weight: bold; color:#000000;">ตู้เย็น ชั้น 1 | รหัส ABC-115151</span>
                        </div>
                    </div>
                    <div class="col-12 row mb-4">
                        <div class="col-5">
                            <div class="d-flex flex-column mb-4">
                                <span class="overflow-dot fontMT">ชื่อผู้แจ้ง : <a style="font-weight: normal;">...................</a></span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="overflow-dot fontMT">ผู้รับผิดชอบ 1 : <a style="font-weight: normal;">deer</a></span>
                                <span class="overflow-dot fontMT">ผู้รับผิดชอบ 2 : <a style="font-weight: normal;">benze</a></span>
                                <span class="overflow-dot fontMT">ผู้รับผิดชอบ 3 : <a style="font-weight: normal;">lucky</a></span>
                            </div>
                        </div>
                        {{-- <div class="vertical-divider"></div> --}}
                        <div class="col-7">
                            <div class="d-flex flex-column mb-4">
                                <span class="overflow-dot fontMT">ลักษณะของปัญหาหรือความเสียหาย : ...................................................................................................</span>
                            </div>
                            <div class="d-flex flex-column mb-4">
                                <span class="overflow-dot fontMT">วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม </span>
                                <span class="overflow-dot fontMT">  1. .............................................    จำนวน .......</span>
                                <span class="overflow-dot fontMT">  2. .............................................    จำนวน .......</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="overflow-dot fontMT">ค่าใช้จ่ายในการซ่อม : ....................................</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div style="text-align: end;">
                            <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-success radius-15" style="width: 180px;">ดูเพิ่มเติม</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
