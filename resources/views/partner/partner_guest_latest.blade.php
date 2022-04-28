@extends('layouts.partners.theme_partner_new')


@section('content')
<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="font-weight-bold mb-0">รถที่ถูกรายงานล่าสุด</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>คันที่</th>
                            <th>ยี่ห้อ/รุ่น</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>เหตุผล</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guest_latest as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td> 
                                    <span> <b>{{ $item->register_cars->brand }}</b> </span><br>
                                    <span style="font-size: 15px;color: #708090">{{ $item->register_cars->generation }} </span>
                                </td>
                                <td>
                                    <span> <b>{{ $item->registration }}</b> </span><br>
                                    <span style="font-size: 15px;color: #708090">{{ $item->county }}</span>
                                </td>
                                <td>
                                    @switch($item->massengbox)
                                        @case('1')
                                            กรุณาเลื่อนรถด้วยค่ะ
                                        @break
                                        @case('2')
                                            รถคุณเปิดไฟค้างไว้ค่ะ
                                        @break
                                        @case('3')
                                            มีเด็กอยู่ในรถค่ะ
                                        @break
                                        @case('4')
                                            รถคุณเกิดอุบัติเหตุค่ะ
                                        @break
                                        @case('5')
                                            แจ้งปัญหาการขับขี่
                                        @break
                                        @case('6')
                                            {{ $item->masseng }}
                                        @break
                                    @endswitch
                                    <br>
                                    @if(!empty($item->report_drivingd_detail))
                                        <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                    @endif
                                </td>
                                <td>
                                    <b>
                                        {{ $item->created_at->format('l d F Y') }} <br>
                                        {{ $item->created_at->format('H:i') }}
                                    </b>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
<br>
    
                    <!----------------------------------------------- pc ----------------------------------------------->
                    <!-- <div class="card-block table-border-style d-none d-lg-block" style="margin-top:-30px">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>คันที่</th>
                                        <th>ยี่ห้อ/รุ่น</th>
                                        <th>หมายเลขทะเบียน</th>
                                        <th>เหตุผล</th>
                                        <th>วันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guest_latest as $item)
                                    <center>  
                                        <tr class="text-center">
                                        <td scope="row">  {{ $item->id }}</th>
                                        <td>
                                            <b>{{ $item->register_cars->brand }}</b><br>
                                                {{ $item->register_cars->generation }}
                                        </td>
                                        <td>
                                            <b>{{ $item->registration }}</b><br>
                                            {{ $item->county }}
                                        </td>
                                        <td class="col-md-2">
                                            @switch($item->massengbox)
                                                @case('1')
                                                    กรุณาเลื่อนรถด้วยค่ะ
                                                @break
                                                @case('2')
                                                    รถคุณเปิดไฟค้างไว้ค่ะ
                                                @break
                                                @case('3')
                                                    มีเด็กอยู่ในรถค่ะ
                                                @break
                                                @case('4')
                                                    รถคุณเกิดอุบัติเหตุค่ะ
                                                @break
                                                @case('5')
                                                    แจ้งปัญหาการขับขี่
                                                @break
                                                @case('6')
                                                    {{ $item->masseng }}
                                                @break
                                            @endswitch
                                            <br>
                                            @if(!empty($item->report_drivingd_detail))
                                                <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                            @endif
                                        </td>
                                        <td>
                                        <b>{{ $item->created_at }}</b>
                                        </td>
                                    
                                    </tr>  </center>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <!--------------------------------------------- end pc --------------------------------------------->
                    <!--------------------------------------------- Mobile --------------------------------------------->
                    <div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                        <div class="row">
                            <div class="card-header border-bottom-0 bg-transparent">
                                <div class="col-12"  style="margin-top:10px">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">รถที่ถูกรายงานล่าสุด</h5>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="card-body" style="padding: 0px 10px 0px 10px;">
                            @foreach($guest_latest as $item)
                                    @foreach($data_partners as $data_partner)
                                    @endforeach
                                    <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                                        <center>
                                        <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                                <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                
                                                </div>
                                                <div class="col-8" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                        <h5 style="margin-bottom:0px; margin-top:10px; ">{{ $item->registration }} <br> {{ $item->county }}</h5>

                                                </div> 
                                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                    <i class="fas fa-angle-down" ></i>
                                                </div>
                                                <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                                    <hr>
                                                    <p style="font-size:18px;padding:0px"> ยี่ห้อ <br>  {{ $item->register_cars->brand }}  </p> <hr>
                                                    <p style="font-size:18px;padding:0px">รุ่น <br> {{ $item->register_cars->generation }}  </p> <hr>
                                                    <p style="font-size:18px;padding:0px">รายงาน <br> 
                                                        @switch($item->massengbox)
                                                            @case('1')
                                                                กรุณาเลื่อนรถด้วยค่ะ
                                                            @break
                                                            @case('2')
                                                                รถคุณเปิดไฟค้างไว้ค่ะ
                                                            @break
                                                            @case('3')
                                                                มีเด็กอยู่ในรถค่ะ
                                                            @break
                                                            @case('4')
                                                                รถคุณเกิดอุบัติเหตุค่ะ
                                                            @break
                                                            @case('5')
                                                                แจ้งปัญหาการขับขี่
                                                            @break
                                                            @case('6')
                                                                {{ $item->masseng }}
                                                            @break
                                                        @endswitch
                                                        <br>
                                                        @if(!empty($item->report_drivingd_detail))
                                                            <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                                        @endif
                                                    </p> <hr>
                                                    <p style="font-size:18px;padding:0px">วันที่ <br> 
                                                        {{ $item->created_at->format('l d F Y') }}
                                                        <br>
                                                        เวลา
                                                        <br>
                                                        {{ $item->created_at->format('H:i') }}
                                                    </p> 
                                                </div>
                                            </div>
                                        </center>   
                                    </div>  
                                @endforeach
                                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                    
                     
                    <!--------------------------------------------- end Mobile --------------------------------------------->
                    
                    
                    
                    
                    <!-- <div id="latest" class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>ครั้งที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ยี่ห้อ / รุ่น</b><br>
                                                Brand / Model
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>หมายเลขทะเบียน</b><br>
                                                Registration number
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>เหตุผล</b><br>
                                                Reason
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>วันที่</b><br>
                                                Date
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($guest_latest as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>{{ $item->id }}</center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>{{ $item->register_cars->brand }}</b><br>
                                                {{ $item->register_cars->generation }}
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>{{ $item->registration }}</b><br>
                                                {{ $item->county }}
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                @switch($item->massengbox)
                                                    @case('1')
                                                        กรุณาเลื่อนรถด้วยค่ะ
                                                    @break
                                                    @case('2')
                                                        รถคุณเปิดไฟค้างไว้ค่ะ
                                                    @break
                                                    @case('3')
                                                        มีเด็กอยู่ในรถค่ะ
                                                    @break
                                                    @case('4')
                                                        รถคุณเกิดอุบัติเหตุค่ะ
                                                    @break
                                                    @case('5')
                                                        แจ้งปัญหาการขับขี่
                                                    @break
                                                    @case('6')
                                                        {{ $item->masseng }}
                                                    @break
                                                @endswitch
                                                <br>
                                                @if(!empty($item->report_drivingd_detail))
                                                    <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                                @endif
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>{{ $item->created_at }}</b>
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
