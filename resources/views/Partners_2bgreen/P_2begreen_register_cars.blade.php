@extends('layouts.partners.2bgreen')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        รถลงทะเบียน องค์กร <b>2บี กรีน จำกัด</b></span> 
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
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>คันที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-3">
                                            <b>ยี่ห้อ</b><br>
                                            Brand
                                        </div>
                                        <div class="col-3">
                                            <b>รุ่น</b><br>
                                            Model
                                        </div>
                                        <div class="col-3">
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
                                        <!-- <div class="col-3">
                                            <center>
                                                <b>เจ้าของรถ</b><br>
                                                Car owner
                                            </center>
                                        </div> -->
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
                                            <p style="color: #FF0000; font-size: 20px;"><b>{{ $item->brand }}</b></p>
                                        </div>
                                        <div class="col-3">
                                            <p style="color: #ff6363; font-size: 20px;"><b>{{ $item->generation }}</b></p>
                                        </div>
                                        <div class="col-3">
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
                                        <!-- <div class="col-3">
                                            <p class="float-right text-success">
                                                <span style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                    <b>{{ $item->name }}</b>
                                                    <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i></a>
                                                </span>
                                            </p>
                                        </div> -->
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
@endsection
