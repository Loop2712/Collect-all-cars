@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">การแจ้งเตือนหาเจ้าของรถ / <span style="font-size: 18px;">Owner alert report</span> </h3>
                    <div class="card-body">
                        <!-- <div>
                            <form method="GET" action="{{ url('/guest') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div> -->
                        <a class="btn btn-sm btn-outline-danger text-danger" href="{{ url('/guest') }}">
                            <i class="fas fa-angle-double-up"></i> จำนวนการรายงานมากที่สุด
                        </a>

                        <a class="btn btn-sm btn-outline-success text-success" href="{{ url('/guest_latest') }}">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>
                    </div>
                        <!-- ล่าสุด -->
                        <div id="latest" class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>ครั้งที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-3">
                                            <b>ชื่อ</b><br>
                                            Name
                                        </div>
                                        <div class="col-3">
                                            <b>เหตุผล</b><br>
                                            Reason
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>หมายเลขทะเบียน</b><br>
                                                Registration number
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
                                        <div class="col-3">
                                            <p style="color: #FF0000; font-size: 18px; display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;" class="text-success">
                                                <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i></a>
                                                <b>{{ $item->name }}</b>
                                            </p>
                                        </div>
                                        <div class="col-3">
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
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>{{ $item->registration }}</b><br>
                                                {{ $item->county }}
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
