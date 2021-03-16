@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
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
                        <a class="btn btn-sm btn-outline-danger text-danger" onclick="
                        document.querySelector('#the_most').classList.remove('d-none');
                        document.querySelector('#latest').classList.add('d-none');">
                            <i class="fas fa-angle-double-up"></i> จำนวนการรายงานมากที่สุด
                        </a>

                        <a class="btn btn-sm btn-outline-success text-success"onclick="
                        document.querySelector('#the_most').classList.add('d-none');
                        document.querySelector('#latest').classList.remove('d-none');">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>
                    </div>
                        <!-- มากสุด -->
                        <div id="the_most" class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1"></div>
                                        <div class="col-3">
                                            <b>ชื่อ</b><br>
                                            Name
                                        </div>
                                        <div class="col-2">
                                            <b>รายงานทั้งหมด</b><br>
                                            All reports
                                        </div>
                                        <div class="col-2">
                                            <b>การจัดอันดับ</b><br>
                                            Ranking
                                        </div>
                                        <div class="col-2">
                                            <b>แก้ไขอันดับล่าสุด</b><br>
                                            Last edit ranking
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <hr>
                                    @foreach($guest as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>{{ $loop->iteration }}</center>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="text-success"><b>{{ $item->name }}</b></h5>
                                        </div>
                                        <div class="col-2">
                                            <b>{{ $item->count }}</b>
                                        </div>
                                        <div class="col-2">
                                            @if(!empty($item->user->ranking))
                                            @switch($item->user->ranking)
                                                @case('Gold')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/gold.png') }}"> Gold</p>
                                                @break
                                                @case('Silver')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/silver.png') }}"> Silver</p>
                                                @break
                                                @case('Bronze')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/bronze.png') }}"> Bronze</p>
                                                @break
                                            @endswitch
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            @if(!empty($item->user->last_edit))
                                            <b>{{ $item->user->last_edit }}</b>
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            <a class="btn btn-sm btn-outline-info" href="{{ url('/index_detail/') }}?name={{ $item->name }}"><i class="fas fa-eye"></i> ดูข้อมูล</a>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        <!-- ล่าสุด -->
                        <div id="latest" class="container d-none">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1"></div>
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
                                            <center>{{ $loop->iteration }}</center>
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
                                    <div class="pagination-wrapper" onclick="
                        document.querySelector('#the_most').classList.add('d-none');
                        document.querySelector('#latest').classList.remove('d-none');"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
