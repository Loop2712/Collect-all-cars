@extends('layouts.partners.theme_partner_sos')

@section('content')

<h3>พื้นที่ : <b class="text-primary">{{ $data_area->name_area }}</b></h3>
<hr>

<div class="row row-cols-1 row-cols-2">

    <div class="col">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title row">
                    <div class="col-6">
                        <h5 class="mb-0 text-primary">
                            <i class="fas fa-siren-on me-1 font-22 text-primary"></i> Vii SOS
                        </h5>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/draw_area') }}?id={{ $data_area->id }}" type="button" class="btn btn-warning btn-sm float-end">แก้ไขพื้นที่</a>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="d-flex justify-content-between">
                        <h4>สถานะ</h4>
                        @if($data_area->open_sos == "Yes")
                            <h4 class="text-success">Active</h4>
                        @else
                            <h4 class="text-danger">Inactive</h4>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>การกำหนดพื้นที่</h4>
                        @if(!empty($data_area->sos_area))
                            <h4><i class="fa-solid fa-badge-check" style="color: #63E6BE;"></i></h4>
                        @else
                            <h4><i class="fa-solid fa-octagon-xmark" style="color: #e44444;"></i></h4>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>จำนวนการแจ้งเหตุ</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>ช่วยเหลือเสร็จสิ้น</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>กำลังดำเนินการ</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>ยกเลิก</h4>
                        <h4>..</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="card-title row">
                    <div class="col-6">
                        <h5 class="mb-0 text-danger">
                            <i class="fa-duotone fa-solid fa-screwdriver-wrench me-1 font-22 text-danger"></i> Vii FIX
                        </h5>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/categorie_repair_index') }}?id={{ $data_area->id }}" type="button" class="btn btn-warning btn-sm float-end">แก้ไขหมวดหมู่</a>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="d-flex justify-content-between">
                        <h4>สถานะ</h4>
                        @if($data_area->open_repair == "Yes")
                            <h4 class="text-success">Active</h4>
                        @else
                            <h4 class="text-danger">Inactive</h4>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h3><b>หมวดหมู่</b></h3>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>จำนวนหมวดหมู่</h4>
                        <h4 id="text_cat_count_all">..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>หมวดหมู่ที่เปิดใช้งาน</h4>
                        <h4 id="text_cat_count_open">..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>หมวดหมู่ที่ปิดใช้งาน</h4>
                        <h4 id="text_cat_count_close">..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>หมวดหมู่ที่ยกเลิก</h4>
                        <h4 id="text_cat_count_cancel">..</h4>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h3><b>การแจ้ง</b></h3>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>จำนวนการแจ้งรวม</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>จำนวนที่เสร็จสิ้น</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>กำลังดำเนินการ</h4>
                        <h4>..</h4>
                    </div>
                    <div class="d-flex justify-content-between" style="margin-left: 15px;">
                        <h4>รอดำเนินการ</h4>
                        <h4>..</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_categorie();
    });

    function get_data_categorie(){
        fetch("{{ url('/') }}/api/get_data_categorie/" + "{{ $data_area->id }}")
            .then(response => response.json())
            .then(result => {

                if(result){
                    console.log(result);

                    let cat_all = result.length ;
                    let cat_open = 0 ;
                    let cat_close = 0 ;
                    let cat_cancel = 0 ;

                    for (let i = 0; i < result.length; i++) {
                        if(result[i].status == "Active"){
                            cat_open = cat_open + 1 ;
                        }

                        if(result[i].status == "Inactive"){
                            cat_close = cat_close + 1 ;
                        }

                        if(result[i].status == "Cancel"){
                            cat_cancel = cat_cancel + 1 ;
                        }
                    }

                    setTimeout(() => {
                        document.querySelector('#text_cat_count_all').innerHTML = cat_all;
                        document.querySelector('#text_cat_count_open').innerHTML = cat_open;
                        document.querySelector('#text_cat_count_close').innerHTML = cat_close;
                        document.querySelector('#text_cat_count_cancel').innerHTML = cat_cancel;
                    }, 700);
                }

            });
    }
</script>

@endsection