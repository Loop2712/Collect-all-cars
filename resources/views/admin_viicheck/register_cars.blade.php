@extends('layouts.admin')

@section('content')
<br>
    <!--------------------------------------------------------------- pc --------------------------------------------------------------->
    <div class="container-fluid d-none d-lg-block">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
                    <h3 class="card-header">
                        รถลงทะเบียน Vmove / <span style="font-size: 18px;">Vmove register</span> 
                        <form method="GET" action="{{ url('/report_register_cars') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    </h3>
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>คันที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>ยี่ห้อ / รุ่น</b><br>
                                                Brand / Model
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>หมายเลขทะเบียน</b><br>
                                                Registration number
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ประเภท</b><br>
                                                Car type
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>องค์กร</b><br>
                                                organizationr
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ผู้ลงทะเบียน</b><br>
                                                Registrant
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($report_register_cars as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>
                                                {{ $item->id }}
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <span style="color: #FF0000; font-size: 20px;"><b>{{ $item->brand }}</b></span>
                                                <br>
                                                <span style="color: #ff6363; font-size: 17px;">{{ $item->generation }}</span>
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <span> {{ $item->registration_number }}</span><br>
                                                <span style="font-size: 15px;color: #708090">{{ $item->province }}</span>
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                @if( $item->car_type == "car")
                                                    <img width="25%" src="https://www.viicheck.com/img/icon/car.png">
                                                @endif
                                                @if( $item->car_type == "motorcycle")
                                                    <img width="25%" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                                @endif
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                @if(!empty($item->juristicNameTH))
                                                    <b>{{ $item->juristicNameTH }}</b>
                                                    <br>
                                                    สาขา {{ $item->branch }}
                                                @else
                                                    ส่วนบุคคล
                                                @endif
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <p class="float-right text-success">
                                                <span style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                    <b>{{ $item->name }}</b>
                                                    <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i></a>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------- End pc --------------------------------------------------------------->
    <!--------------------------------------------------------------- Mobile --------------------------------------------------------------->
    <div class="container-fluid d-block d-md-none">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 text-center" >
                                <h2><i class="fad fa-cars"></i> รถลงทะเบียน <br> Vmove</h2>
                            </div>
                            <div class="col-md-3 col-sm-0 "></div>
                            <br style="d-block d-md-none">
                            <div class="col-md-3 col-sm-8 text-center d-flex justify-content-end">
                                <form method="GET" action="{{ url('/report_register_cars') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="p-3"><span style="color:#1ABC9C;">&#11044;</span> &nbsp;รถส่วนบุคคล </div>
                                    <div class="p-3"><span style="color:#DC7633;">&#11044;</span> &nbsp;รถองค์กร </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @foreach($report_register_cars as $item)
                            @if(!empty($item->juristicNameTH))
                                <div class="card col-12 " style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#DC7633;border-bottom-width: 4px; margin-bottom: 10px;">
                            @else
                                <div class="card col-12 " style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#1ABC9C;border-bottom-width: 4px; margin-bottom: 10px;">
                            @endif
                                <center>
                                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                                        <div class="col-10" style="margin-bottom:0px">
                                                <h5 style="margin-bottom:0px;margin-top:0px;">
                                                @if( $item->car_type == "car")
                                                    <img width="15%" src="https://www.viicheck.com/img/icon/car.png">
                                                @endif
                                                @if( $item->car_type == "motorcycle")
                                                    <img width="15%" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                                @endif
                                                {{ $item->registration_number }}</h5>
                                                <h6 style="margin-bottom:0px;margin-top:0px;">{{ $item->province }}</h6>

                                        </div> 
                                        <div class="col-2 align-self-center" style="vertical-align: middle;">
                                            <i class="fas fa-angle-down" data-toggle="collapse" data-target="#register_cars_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" ></i>
                                        </div>
                                        <div class="col-12 collapse" id="register_cars_{{ $item->id }}">
                                            <hr>
                                                <b>{{ $item->name }}</b>
                                                <span>  
                                                    <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i></a>
                                                </span>
                                            <hr>
                                            <span style="color: #FF0000; font-size: 20px;"><b>{{ $item->brand }}</b></span>
                                            <br>
                                            <span style="color: #ff6363; font-size: 17px;">{{ $item->generation }}</span> <hr>
                                            @if(!empty($item->juristicNameTH))
                                                <b>{{ $item->juristicNameTH }}</b>
                                                <br>
                                                สาขา {{ $item->branch }}
                                            @endif
                                        </div>
                                    </div>
                                </center>   
                            </div>
                        @endforeach
                        <div class="col-12 pagination-wrapper"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    <!---------------------------------------------------------------End Mobile --------------------------------------------------------------->

@endsection
