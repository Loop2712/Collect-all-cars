@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }
    .table th {
        text-align: center; /* จัดข้อความให้อยู่กึ่งกลางแนวนอน */
        vertical-align: middle; /* จัดข้อความให้อยู่กึ่งกลางแนวตั้ง */
        padding: 1rem; /* เพิ่มระยะห่างในเซลล์ของตาราง */
    }
</style>
@section('content')

    {{-- เพิ่มหัวข้อ --}}
    <div class="modal fade h-100 " id="modalAddID" tabindex="-2" aria-labelledby="modalAddID" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-12 text-center">
                        <span  style="font-weight: bold; font-size: 25px;">เพิ่มหัวข้อ</span>
                    </div>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center" >
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 my-2" >
                            <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">หัวข้อ</label>
                            <input class="form-control radius-15" list="" name="" value="" placeholder="กรอกหัวข้อ">
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 my-2" >
                            <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">รหัส</label>
                            <input class="form-control radius-15" list="" name="" value="" placeholder="กรอกรหัส">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-evenly ">
                    <button type="button" class="btn btn-secondary radius-10 h-100" id="btnCancelLinkGroupLine" data-bs-dismiss="modal" aria-label="Close" style="width: 150px;">
                        ปิด
                    </button>
                    <button type="button" class="btn btn-success radius-10 h-100" id="" style="width: 150px;">
                        ยืนยัน
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="row">
            <div class="col-12 col-md-7 ">
                <span class="h3 px-0" style="font-weight: bold;" >การซ่อมบำรุง</span>
            </div>
            <div class="col-12 col-md-5 d-flex justify-content-evenly">
                <a class="btn btn-primary radius-30 align-content-center" style="width: 45%;" data-bs-toggle="modal" data-bs-target="#modalAddID">เพิ่มหัวข้อ</a>
                <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger radius-30 align-content-center" style="width: 45%;">ประวัติการซ่อมบำรุง</a>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="row">
            <div class="col-12 col-md-6 ">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                ค้นหา
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table id="maintenanceTableId" class="table table-bordered mb-0 align-middle">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>หัวข้อ</th>
                        <th>รหัส</th>
                        <th>จำนวนซ่อมบำรุง</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding-left: 15px; width:50%;">
                            <span style="font-size: 18px;">ตู้เย็น ชั้น 1</span>
                        </td>
                        <td class="text-center">
                            <span style="font-size: 18px;">ABC-115151</span>
                        </td>
                        <td class="text-center" style="width:10%;">
                            <span style="font-size: 18px;">5</span>
                        </td>
                        <td class="text-center" style="padding: 15px;">
                            <!-- PC -->
                            <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger w-50 d-none d-md-inline" >ดูข้อมูล</a>
                            <!-- Mobile -->
                            <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger w-50 d-inline d-md-none" ><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; width:50%;">
                            <span style="font-size: 18px;">ตู้เย็น ชั้น 99</span>
                        </td>
                        <td class="text-center">
                            <span style="font-size: 18px;">ABC-1151599</span>
                        </td>
                        <td class="text-center" style="width:10%;">
                            <span style="font-size: 18px;">2</span>
                        </td>
                        <td class="text-center" style="padding: 15px;">
                            <!-- PC -->
                            <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger w-50 d-none d-md-inline">ดูข้อมูล</a>
                            <!-- Mobile -->
                            <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger w-50 d-inline d-md-none" >
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="pagination round-pagination " style="margin-top:10px;"> </div> --}}
        </div>
    </div>


@endsection
