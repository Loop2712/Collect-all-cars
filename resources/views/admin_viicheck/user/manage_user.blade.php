@extends('layouts.admin')

@section('content')
<br>
<!-- --------------------------------- แสดงเฉพาะคอม ------------------------------- -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">จัดการผู้ใช้ / <span style="font-size: 18px;"> Manage users </span>
                        <a href="{{ url('/view_new_user') }}" class="btn btn-outline-primary float-right">
                            <i class="fas fa-user-plus"></i> สร้างบัญชีผู้ใช้
                        </a>
                    </h3>
                    <div class="card-body">
                        <a href="{{ url('/manage_user') }}?search=admin" class="btn btn-outline-danger ">
                            <img width="30" src="https://market.viicheck.com/img/logo/VII-check-LOGO-W-v1.png"> Admin ViiCHECK
                        </a>
                        <a href="{{ url('/manage_user') }}?search=admin-partner" class="btn btn-outline-success ">
                            Admin Partner
                        </a>
                        <a href="{{ url('/manage_user') }}?search=partner" class="btn btn-outline-secondary ">
                            Partner
                        </a>
                        <a href="{{ url('/manage_user') }}?search=" class="btn btn-outline-info ">
                            <i class="fas fa-users"></i> ทั้งหมด
                        </a>

                        <form method="GET" action="{{ url('/manage_user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="row alert alert-secondary">
                                    <!-- <div class="col-1">
                                        <center><b>Id</b></center>
                                    </div> -->
                                    <div class="col-3">
                                        <center>
                                            <b>ชื่อ</b><br>
                                            Name
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>ประเภท</b><br>
                                            Type
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>การจัดอันดับ</b><br>
                                            Ranking
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>เบอร์</b><br>
                                            Phone number
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>สถานะ</b><br>
                                            Role
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>สถานะ</b><br>
                                            Status
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>ผู้สร้าง</b><br>
                                            Creator
                                        </center>
                                    </div>
                                </div>
                                @foreach($all_user as $item)
                                    <div class="row">
                                        <!-- <div class="col-1">
                                            <center><b>{{ $item->id }}</b></center>
                                        </div> -->
                                        <div class="col-3">
                                            <h5 class="text-success"><span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;{{ $item->name }}
                                            </h5>
                                        </div>
                                        <div class="col-1">
                                            <center>
                                            @switch($item->type)
                                                @case('line')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-line text-success"></i></a>
                                                @break
                                                @case('facebook')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-facebook-square text-primary"></i></a>
                                                @break
                                                @case('google')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-google text-danger"></i></a>
                                                @break
                                                @case(null)
                                                    <a class="btn btn-sm btn-light"><i class="fas fa-globe" style="color: #5F9EA0"></i></a>
                                                @break
                                            @endswitch
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                            @switch($item->ranking)
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
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center><a class="btn btn-sm btn-light">{{ $item->phone }}</a></center>
                                        </div>
                                        <div class="col-1">
                                            <center><a class="btn btn-sm btn-light">{{ $item->role }}</a></center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                @switch($item->status)
                                                    @case('active')
                                                        <p class="btn btn-sm btn-success " href="">
                                                            <i class="fas fa-check"></i> Active
                                                        </p>
                                                    @break
                                                    @case('expired')
                                                        <p class="btn btn-sm btn-danger " href="">
                                                            <i class="fas fa-times"></i> Expired
                                                        </p>
                                                    @break
                                                @endswitch
                                            </center>
                                        </div>
                                        <div class="col-1">
                                            <center>
                                                @if(!empty($item->creator))
                                                    <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                                        <i class="far fa-eye text-primary"></i>
                                                    </a>
                                                @endif
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                                <div class="pagination-wrapper"> {!! $all_user->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- --------------------------------- สิ้นสุดแสดงเฉพาะคอม ------------------------------- -->


<!-- --------------------------------- แสดงเฉพาะมือถือ ------------------------------- -->
    <div class="container-fluid d-block d-md-none">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/view_new_user') }}" class="btn btn-primary float-right">
                    <i class="fas fa-user-plus"></i> สร้างบัญชีผู้ใช้
                </a>
                <br><br>
            </div>
            <div class="col-12">
                <div class="card">
                    <h3 class="card-header">จัดการผู้ใช้</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="btn-group" style="margin-top: 5px;">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        เลือกประเภท
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ url('/manage_user') }}?search=admin" class="btn btn-outline-danger dropdown-item">
                                            Admin
                                        </a>
                                        <a href="{{ url('/manage_user') }}?search=JS100" class="btn btn-outline-success dropdown-item">
                                            JS100
                                        </a>
                                        <a href="{{ url('/manage_user') }}?search=2BGreen" class="btn btn-outline-success dropdown-item">
                                            2BGreen
                                        </a>
                                        <a href="{{ url('/manage_user') }}?search=" class="btn btn-outline-info dropdown-item">
                                            ทั้งหมด
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <form method="GET" action="{{ url('/manage_user') }}" accept-charset="UTF-8" class="form-inline float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            @foreach($all_user as $item)
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="">
                                            @switch($item->status)
                                                @case('active')
                                                    <p class="btn btn-sm btn-success " href="">
                                                        <i class="fas fa-check"></i> Active
                                                    </p>
                                                @break
                                                @case('expired')
                                                    <p class="btn btn-sm btn-danger " href="">
                                                        <i class="fas fa-times"></i> Expired
                                                    </p>
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="text-success">
                                            <span style="font-size: 15px;">
                                                <a target="break" href="{{ url('/').'/profile/'.$item->id }}">
                                                    <i class="far fa-eye text-primary"></i>
                                                </a>
                                            </span>
                                            &nbsp;&nbsp;{{ $item->name }}
                                        </h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="float-right">
                                            @switch($item->type)
                                                @case('line')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-line text-success"></i></a>
                                                @break
                                                @case('facebook')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-facebook-square text-primary"></i></a>
                                                @break
                                                @case('google')
                                                    <a class="btn btn-sm btn-light"><i class="fab fa-google text-danger"></i></a>
                                                @break
                                                @case(null)
                                                    <a class="btn btn-sm btn-light"><i class="fas fa-globe" style="color: #5F9EA0"></i></a>
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="col-5">
                                        <center>{{ $item->phone }}</center>
                                    </div>
                                    <div class="col-4">
                                        <center>{{ $item->role }}</center>
                                    </div>
                                    <div class="col-3">
                                        <div class="float-right">
                                            @switch($item->ranking)
                                                @case('Gold')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/gold.png') }}"></p>
                                                @break
                                                @case('Silver')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/silver.png') }}"></p>
                                                @break
                                                @case('Bronze')
                                                    <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/bronze.png') }}"></p>
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                            <div class="pagination-wrapper"> {!! $all_user->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- --------------------------------- สิ้นสุดแสดงเฉพาะมือถือ ------------------------------- -->
@endsection
