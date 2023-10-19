@extends('layouts.partners.theme_partner_new')

@section('content')

<h2 class="mb-3 mt-3 text-dark">
    <i class="fa-solid fa-trash-clock me-1 font-22 text-dark"></i> คำขอลบเคส
</h2>

@foreach($sos_map_wait_delete as $item)

@php
    $class_div_status = '';
    $text_div_status = '';
    $class_tga_i_status = '';
    $time_of_status = '';

    if($item->sos_map->status == "รับแจ้งเหตุ"){
        $class_div_status = 'btn-danger' ;
        $text_div_status = 'text-white' ;
        $class_tga_i_status = 'fa-solid fa-light-emergency-on' ;
        $time_of_status = $item->sos_map->created_at ;
    }else if($item->sos_map->status == "กำลังไปช่วยเหลือ"){
        $class_div_status = 'bg-warning' ;
        $class_tga_i_status = 'fa-solid fa-truck-medical' ;
        $time_of_status = $item->sos_map->time_go_to_help ;
    }else if($item->sos_map->status == "ถึงที่เกิดเหตุ"){
        $class_div_status = 'btn-warning' ;
        $class_tga_i_status = 'fa-solid fa-location-dot' ;
        $time_of_status = $item->sos_map->time_to_the_scene ;
    }else if($item->sos_map->status == "ออกจากที่เกิดเหตุ"){
        $class_div_status = 'bg-warning' ;
        $class_tga_i_status = 'fa-duotone fa-person-walking-arrow-right' ;
        $time_of_status = $item->sos_map->time_leave_the_scene ;
    }else if($item->sos_map->status == "เสร็จสิ้น"){
        $class_div_status = 'btn-success' ;
        $text_div_status = 'text-white' ;
        $class_tga_i_status = 'fa-solid fa-shield-check' ;
        $time_of_status = $item->help_complete_time ;
    }
@endphp

<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title ">
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-0 text-dark">
                        ผู้ขอความช่วยเหลือ : {{ $item->sos_map->name }}
                    </h4>
                </div>
                <div class="col-6">
                    <span class="{{ $text_div_status }} float-end btn btn-sm {{ $class_div_status }} radius-10 px-5 py-2">
                    @if($item->sos_map->tag_sos_or_repair == "tag_repair" && $item->sos_map->status == "กำลังไปช่วยเหลือ")
                        <i class="fa-regular fa-screwdriver-wrench"></i> อยู่ระหว่างดำเนินการ
                    @elseif($item->sos_map->tag_sos_or_repair == "tag_repair" && $item->sos_map->status == "รับแจ้งเหตุ")
                        <i class="fa-sharp fa-solid fa-timer"></i> รอดำเนินการ
                    @else
                        <i class="{{ $class_tga_i_status }}"></i> {{ $item->sos_map->status }}
                    @endif
            </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-4">
                <h5 class="form-label"><b>วันที่ / เวลา</b></h5>
                <h6 class="text-secondary">{{ $item->sos_map->created_at }}</h6>
                <br>
                <h5 class="form-label"><b>เจ้าหน้าที่ผู้ขอลบ</b></h5>
                @php
                    $data_officer =  App\User::where('id' , $item->officer_id)->first();
                @endphp
                <h6 class="text-secondary">{{ $data_officer->name }}</h6>
            </div>
            <div class="col-4">
                <!-- หัวข้อขอความช่วยเหลือ -->
                <h5 class="form-label"><b>หัวข้อขอความช่วยเหลือ</b></h5>
                <h6 class="text-secondary">{{ $item->sos_map->title_sos }}</h6>
                <br>
                <h5 class="form-label"><b>รายละเอียด</b></h5>
                <h6 class="text-secondary">{{ $item->sos_map->title_sos_other }}</h6>
            </div>
            <div class="col-4 row">
                <div class="col-6 text-center" >
                    <span style="font-size:16px;">
                        ภาพจากผู้ใช้
                    </span>
                    <div class="card mt-2" style="position:relative;">
                        <center>
                            @if(!empty($item->sos_map->photo))
                            <a href="{{ url('storage')}}/{{ $item->sos_map->photo }}" target="bank">
                                <img src="{{ url('storage')}}/{{ $item->sos_map->photo }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                            </a>
                            @else
                                <img src="{{ url('/img/stickerline/PNG/17.png') }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                            @endif
                        </center>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <span style="font-size:16px;">
                        ภาพจากเจ้าหน้าที่
                    </span>
                    <div class="card mt-2" style="position:relative;">
                        <center>
                            @if(!empty($item->sos_map->photo_succeed))
                            <a href="{{ url('storage')}}/{{ $item->sos_map->photo_succeed }}" target="bank">
                                <img src="{{ url('storage')}}/{{ $item->sos_map->photo_succeed }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                            </a>
                            @else
                                <img src="{{ url('/img/stickerline/PNG/17.png') }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                            @endif
                        </center>
                    </div>
                    @if(!empty($item->sos_map->photo_succeed))
                    <span class="mt-2">
                        {{ $item->sos_map->remark }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-12 mt-2">
                @if($item->sos_map->tag_sos_or_repair != "tag_repair")
                    <a href="{{ url('/sos_map/command') . '/' . $item->sos_map->id }}" type="button" class="btn btn-info px-5 mx-2">
                        <i class="fa-duotone fa-bars-progress mr-1"></i> ดูข้อมูล
                    </a>
                @else
                    <a href="{{ url('/sos_map/report_repair') . '/' . $item->sos_map->id }}" type="button" class="btn btn-info px-5 mx-2">
                        <i class="fa-duotone fa-bars-progress mr-1"></i> ดูข้อมูล
                    </a>
                @endif
                <a href="{{ url('/sos_map/delete_case_from_wait_delete') . '/' . $item->sos_map_id }}" type="button" class="btn btn-danger mr-2 ml-2">
                    <i class="fa-solid fa-delete-right mr-1"></i> ยืนยันการลบ
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
