@extends('layouts.partners.theme_partner_new')
<style>
*:not(i) {
        font-family: 'Kanit', sans-serif;

    }
</style>
@section('content')
<div class="container-fluid">
    <div class="page-breadcrumb d-flex flex-wrap align-items-center mb-3">
        <div class="breadcrumb-title pe-3" style="border-right:none !important ;">การจัดการวัสดุ / อุปกรณ์ที่ใช้ในการซ่อม</div>
        <div class="ms-auto d-flex">
            <select name="" class="form-control" id="">
                <option value="ทั้งหมด">ทั้งหมด</option>
                <option value="">A001 หลอดไฟ</option>
                <option value="">A002 สายไฟ</option>
                <option value="">A003 กาว</option>
            </select>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark bg-dark text-white">
            <tr>
                <th scope="col">วัสดุ / อุปกรณ์</th>
                <th scope="col">ใช้วันที่</th>
                <th scope="col">ผู้ใช้</th>
                <th scope="col">จำนวน</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>AC001 หลอดไฟ</td>
                <td>วันที่ 10 ธันวาคม 2567</td>
                <td>Tharabut</td>
                <td>
                    2
                </td>
            </tr>
            <tr>
                <td>AC002 สายไฟ</td>
                <td>วันที่ 10 ธันวาคม 2567</td>
                <td>Teenabut</td>
                <td>
                    2
                </td>
            </tr>
            <tr>
                <td>AC003 กาว</td>
                <td>วันที่ 10 ธันวาคม 2567</td>
                <td>Pirakorn</td>
                <td>
                    1
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <!-- <div class="p-4">
        <div class="row">
            <div class="col-12 col-md-10 ">
                <span class="h3 px-0" style="font-weight: bold;">การจัดการหมวดหมู่และกลุ่มไลน์</span>
            </div>
            <div class="col-12 col-md-2 text-center">
                <div class="dropdown px-4 ">
                    <button style="width: 150px;" id="btn_dropdown_health_type"
                        class="btn btn-outline-secondary text-dark dropdown-toggle radius-10" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        วัสดุ / อุปกรณ์
                    </button>
                    <div id="item_dropdown" class="dropdown-menu " aria-labelledby="btn_dropdown_health_type"
                        style="cursor: pointer;">
                        <a class="dropdown-item" onclick="change_select_area('AC001 หลอดไฟ')">AC001 หลอดไฟ</a>
                        <a class="dropdown-item" onclick="change_select_area('AC002 สายไฟ')">AC002 สายไฟ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        {{-- item #1 --}}
        <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #71c2ec;">
            <div class="col-12 col-md-12 ">
                <div class="row">
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">วันที่ 32 ธันวาคม 2599</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">Tharabut</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">AC001 หลอดไฟ</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">12</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- item #2 --}}
        <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #71c2ec;">
            <div class="col-12 col-md-12 ">
                <div class="row">
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">วันที่ 32 ธันวาคม 2599</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">Teenabut</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">AC002 สายไฟ</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">59</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- item #3 --}}
        <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #71c2ec;">
            <div class="col-12 col-md-12 ">
                <div class="row">
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">วันที่ 32 ธันวาคม 2599</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">Pirakorn</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">AC003 กาว</span>
                    </div>
                    <div class="col-3 text-center py-2">
                        <span style="font-size: 22px; font-weight: bold;" class="text-dark">1</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
