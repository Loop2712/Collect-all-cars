@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .btn-add-categorie {
        transition: all .15s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        line-height: 40px;
        font-size: 18px;
        color: #6c757d;
        text-align: center;
        border-radius: 50px;
        margin: 3px;
        background-color: white;
        border: 1px solid rgb(0 0 0 / 15%);
    }

    .btn-add-categorie.success:hover {
        background-color: #1fb52e;
        color: #fff;
        width: 185px;

    }

    .btn-add-categorie.danger:hover {
        background-color: #7b2bec;
        color: #fff;
        width: 185px;

    }

    .btn-add-categorie:not(:hover) .text-btn {
        display: none;
        color: #fff !important;
    }

    .btn-add-categorie:hover .text-btn {
        display: block;
        color: #fff !important;

    }
</style>
@section('content')
<div class="container-fluid">
    <div class="page-breadcrumb d-flex flex-wrap align-items-center mb-3">
        <div class="breadcrumb-title pe-3" style="border-right:none !important ;">การจัดการวัสดุ / อุปกรณ์ที่ใช้ในการซ่อม</div>
        <div class="ms-auto d-flex">
            <a class="btn-add-categorie success" href="{{ url('/demo_categorie_repair_create') }}">
                <i class="bx bx-plus"></i>
                <p class="text-btn mb-0 ms-1">เพิ่มวัสดุ / อุปกรณ์</p>
            </a>

            <a class="btn-add-categorie danger" href="{{ url('/demo_categorie_repair_create') }}">
                <i class="fa-solid fa-table-list relative"></i>
                <p class="text-btn mb-0 ms-1">ประวัติการใช้งาน</p>
            </a>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark bg-dark text-white">
            <tr>
                <th scope="col">วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม</th>
                <th scope="col">คงเหลือ</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>AC001 หลอดไฟ</td>
                <td>12</td>
                <td>
                    <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_" style="min-width: 104px !important;">เพิ่มจำนวน</span>
                </td>
            </tr>
            <tr>
                <td>AC002 สายไฟ</td>
                <td>59</td>
                <td>
                    <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_" style="min-width: 104px !important;">เพิ่มจำนวน</span>
                </td>
            </tr>
            <tr>
                <td>AC003 กาว</td>
                <td>1</td>
                <td>
                    <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_" style="min-width: 104px !important;">เพิ่มจำนวน</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{-- เพิ่มวัสดุ / อุปกรณ์ --}}
<div class="modal fade h-100 " id="modalAddMaterial" tabindex="-2" aria-labelledby="modalAddMaterial" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12 text-center">
                    <span style="font-weight: bold; font-size: 25px;">เพิ่มวัสดุ / อุปกรณ์</span>
                </div>
                {{-- <div class="col-1">
                        <button id="close_modalAddMaterial" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 my-2">
                        {{-- <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">ชื่อวัสดุ / อุปกรณ์</label> --}}
                        <input class="form-control radius-15" list="" name="" value="" placeholder="ชื่อวัสดุ / อุปกรณ์">
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 my-2">
                        {{-- <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">จำนวน</label> --}}
                        <input class="form-control radius-15" list="" name="" value="" placeholder="จำนวน">
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

{{-- เพิ่มจำนวน --}}
<div class="modal fade h-100 " id="modalIncItem_" tabindex="-1" aria-labelledby="modalIncItem_" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12 text-center">
                    <span style="font-weight: bold; font-size: 25px;">เพิ่มจำนวน</span>
                </div>
                {{-- <button id="close_modalIncItem_Confirm" type="button" class="btn-close d-none" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row w-100">
                    <div class="col-12 col-md-12 col-lg-12 text-center">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label text-danger">{ชื่อไอเท็ม}</label>
                        <input class="form-control radius-1 " list="cfPassWordGroupLind" placeholder="ใส่จำนวน" name="cfPassWordGroupLind" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-around ">
                <button type="button" class="btn btn-secondary radius-10 h-100" id="Cancel_modalChangeGroupLineConfirm" style="width: 150px;" data-bs-dismiss="modal" aria-label="Close">
                    ปิด
                </button>
                <button type="button" class="btn btn-success radius-10 h-100" id="" style="width: 150px;">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="p-4">
    <div class="row">
        <div class="col-12 col-md-7 ">
            <span class="h3 px-0" style="font-weight: bold;">การจัดการวัสดุ / อุปกรณ์ที่ใช้ในการซ่อม</span>
        </div>
        <div class="col-12 col-md-5 d-flex justify-content-evenly">
            <a class="btn btn-primary radius-30 align-content-center" style="width: 45%;" data-bs-toggle="modal" data-bs-target="#modalAddMaterial">เพิ่มวัสดุ / อุปกรณ์</a>
            <a href="{{ url('/demo_repair_mat_view') }}" class="btn btn-danger radius-30 align-content-center" style="width: 45%;">ประวัติการใช้งาน</a>
        </div>
    </div>
</div> -->

<!-- <div class="card">
    <div class="table-responsive">
        <table class="table table-bordered mb-0 align-middle">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th>วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม</th>
                    <th>คงเหลือ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-left: 15px;">
                        <span style="font-size: 18px;">AC001 หลอดไฟ</span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 18px;">12</span>
                    </td>
                    <td class="text-center">
                        <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_">เพิ่มจำนวน</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 15px;">
                        <span style="font-size: 18px;">AC002 สายไฟ</span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 18px;">59</span>
                    </td>
                    <td class="text-center">
                        <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_">เพิ่มจำนวน</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 15px;">
                        <span style="font-size: 18px;">AC003 กาว</span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 18px;">1</span>
                    </td>
                    <td class="text-center">
                        <span class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modalIncItem_">เพิ่มจำนวน</span>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <div class="pagination round-pagination " style="margin-top:10px;"> </div> --}}
    </div> -->
</div>
@endsection