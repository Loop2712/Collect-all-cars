@extends('layouts.partners.theme_hospital')

@section('content')

<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div>
                <i class="fa-solid fa-pen-to-square me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">แก้ไขข้อมูล <b>{{ $hospital_offices->name }}</b></h5>
        </div>
        <hr>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="name" value="{{ $hospital_offices->name }}">
            </div>
            <div class="col-md-6">
                <label for="health_type" class="form-label">ประเภทหน่วยบริการสุขภาพ</label>
                <input type="text" class="form-control" id="health_type" value="{{ $hospital_offices->health_type }}">
            </div>

            <div class="col-md-3">
                <label for="organization_type" class="form-label">ประเภทองค์กร</label>
                <input type="text" class="form-control" id="organization_type" value="{{ $hospital_offices->organization_type }}">
            </div>
            <div class="col-md-3">
                <label for="affiliation" class="form-label">สังกัด</label>
                <input type="text" class="form-control" id="affiliation" value="{{ $hospital_offices->affiliation }}">
            </div>
            <div class="col-md-3">
                <label for="code_9_digit" class="form-label">รหัส 9 หลัก</label>
                <input type="text" class="form-control" id="code_9_digit" value="{{ $hospital_offices->code_9_digit }}">
            </div>
            <div class="col-md-3">
                <label for="code_5_digit" class="form-label">รหัส 5 หลัก</label>
                <input type="text" class="form-control" id="code_5_digit" value="{{ $hospital_offices->code_5_digit }}">
            </div>

            <div class="col-md-3">
                <label for="code_11_digit" class="form-label">เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก</label>
                <input type="text" class="form-control" id="code_11_digit" value="{{ $hospital_offices->code_11_digit }}">
            </div>
            <div class="col-md-3">
                <label for="service_area" class="form-label">เขตบริการ</label>
                <input type="text" class="form-control" id="service_area" value="{{ $hospital_offices->service_area }}">
            </div>
            <div class="col-md-3">
                <label for="district" class="form-label">อำเภอ/เขต</label>
                <input type="text" class="form-control" id="district" value="{{ $hospital_offices->district }}">
            </div>
            <div class="col-md-3">
                <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                <input type="text" class="form-control" id="sub_district" value="{{ $hospital_offices->sub_district }}">
            </div>

            <div class="col-md-6">
                <label for="address"><b>ที่อยู่</b></label>
                <textarea class="form-control" id="address" name="address" rows="4">{{ $hospital_offices->address }}</textarea>
            </div>
            <div class="col-md-3">
                <label for="lat" class="form-label">Lat</label>
                <input type="text" class="form-control" id="lat" value="{{ $hospital_offices->lat }}">
            </div>
            <div class="col-md-3">
                <label for="lng" class="form-label">Long</label>
                <input type="text" class="form-control" id="lng" value="{{ $hospital_offices->lng }}">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-info float-end px-5">ยืนยันแก้ไขข้อมูล</button>
            </div>
        </form>
    </div>
</div>

@endsection
