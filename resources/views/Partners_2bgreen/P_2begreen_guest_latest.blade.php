@extends('layouts.partners.2bgreen')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รถที่ถูกรายงานล่าสุด</h3>
                    <div class="card-body">
                        <a class="btn btn-sm btn-outline-danger text-danger" href="{{ url('/guest_2bgreen') }}">
                            <i class="fas fa-angle-double-up"></i> รายการรถที่ถูกแจ้งปัญหาการขับขี่
                        </a>

                        <a class="btn btn-sm btn-outline-success text-success" href="{{ url('/guest_latest_2bgreen') }}">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>
                    </div>
                        <!-- ล่าสุด -->
                        <div id="latest" class="container">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
