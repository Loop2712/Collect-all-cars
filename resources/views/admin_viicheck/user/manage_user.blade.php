@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">จัดการผู้ใช้</h3>
                    <div class="card-body">
                        <a href="{{ url('/manage_user') }}?search=admin" class="btn btn-outline-danger ">
                            <img width="30" src="https://market.viicheck.com/img/logo/VII-check-LOGO-W-v1.png"> Admin
                        </a>
                        <a href="{{ url('/manage_user') }}?search=JS100" class="btn btn-outline-success ">
                            <img width="22" src="https://lh3.googleusercontent.com/proxy/5qHARNc2MRWZ27WlrQN1fYk2_IuHsX0BDV0JXzoXupg9j9lBJGoNyKIzdySeL5LWrpAIT1lox-ul2fq72LriHIh-jm3MpUrBDxl_6WdNEd_nF9o2wb7KZg"> JS100
                        </a>
                        <a href="{{ url('/manage_user') }}?search=2BGreen" class="btn btn-outline-success ">
                            <img width="22" src="https://www.viicheck.com/images/GreenLogo.png"> 2BGreen
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
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row alert alert-secondary">
                                    <!-- <div class="col-1">
                                        <center><b>Id</b></center>
                                    </div> -->
                                    <div class="col-4">
                                        <center><b>ชื่อ</b></center>
                                    </div>
                                    <div class="col-1">
                                        <center><b>ประเภท</b></center>
                                    </div>
                                    <div class="col-2">
                                        <center><b>การจัดอันดับ</b></center>
                                    </div>
                                    <div class="col-2">
                                        <center><b>เบอร์</b></center>
                                    </div>
                                    <div class="col-1">
                                        <center><b>สถานะ</b></center>
                                    </div>
                                    <div class="col-2">
                                        <center><b>เปลี่ยนสถานะ</b></center>
                                    </div>
                                </div>
                                @foreach($all_user as $item)
                                    <div class="row">
                                        <!-- <div class="col-1">
                                            <center><b>{{ $item->id }}</b></center>
                                        </div> -->
                                        <div class="col-4">
                                            <h4 class="text-success">&nbsp;&nbsp;{{ $item->name }}&nbsp;
                                            <span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span></h4>
                                        </div>
                                        <div class="col-1">
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
                                        <div class="col-2">
                                            <center>
                                            @switch($item->ranking)
                                                @case('Senior')
                                                    <a class="btn btn-sm btn-light " href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                                @break
                                                @case('Common')
                                                    <a class="btn btn-sm btn-light " href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                                @break
                                                @case('Normal')
                                                    <a class="btn btn-sm btn-light " href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
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
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    เปลี่ยน <i class="fas fa-sync"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('/manage_user/change_ToGuest') }}?id={{ $item->id }}"><i class="fas fa-user "></i> Guest</a>
                                                    <a class="dropdown-item" href="{{ url('/manage_user/change_ToAdmin') }}?id={{ $item->id }}"><img width="30" src="https://market.viicheck.com/img/logo/VII-check-LOGO-W-v1.png"> Admin</a>
                                                  </div>
                                                </div>
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
@endsection
