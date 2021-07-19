@extends('layouts.viicheck')

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
                        <a class="btn btn-sm btn-outline-danger text-danger" href="{{ url('/guest') }}">
                            <i class="fas fa-angle-double-up"></i> จำนวนการรายงานมากที่สุด
                        </a>

                        <a class="btn btn-sm btn-outline-success text-success" href="{{ url('/guest_latest') }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
