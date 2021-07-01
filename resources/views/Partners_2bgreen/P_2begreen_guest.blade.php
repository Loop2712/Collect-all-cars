@extends('layouts.partners.2bgreen')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รายการรถที่ถูกแจ้งปัญหาการขับขี่ (มากไปน้อย)</h3>
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
                        <a class="btn btn-sm btn-outline-danger text-danger" href="{{ url('/guest_2bgreen') }}">
                            <i class="fas fa-angle-double-up"></i> รายการรถที่ถูกแจ้งปัญหาการขับขี่
                        </a>

                        <a class="btn btn-sm btn-outline-success text-success" href="{{ url('/guest_latest_2bgreen') }}">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>

                        <a class="btn btn-sm btn-outline-primary text-primary float-right" >
                            <i class="fas fa-calendar-alt"></i> เลือกเดือน
                        </a>
                    </div>
                        <!-- มากสุด -->
                        <div id="the_most" class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1"></div>
                                        <div class="col-3">
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
                                        <div class="col-2">
                                            <center>
                                                <b>รายงานทั้งหมด</b><br>
                                                All reports
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>รายงานประจำเดือน</b><br>
                                                Monthly reports
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($guest as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>{{ $loop->iteration }}</center>
                                        </div>
                                        <div class="col-3">
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
                                        <div class="col-2">
                                            <center>
                                                <b>{{ $item->count }}</b>
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b></b>
                                                <br>
                                                <span class="text-secondary" style="font-size:14px;">คิดเป็น .. % ของทั้งหมด</span>
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
