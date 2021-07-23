@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
                        <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด</span>
                    </h3>
                    <div class="card-body">
                        <a href="{{ url('/sos') }}?search=police" class="btn btn-outline-dark ">
                             ตำรวจ
                        </a>
                        <a href="{{ url('/sos') }}?search=JS100" class="btn btn-outline-success ">
                             JS100
                        </a>
                        <a href="{{ url('/sos') }}?search=life_saving" class="btn btn-outline-warning ">
                            แพทย์
                        </a>
                        <a href="{{ url('/sos') }}?search=pok_tek_tung" class="btn btn-outline-info ">
                            <i class="fas fa-users"></i> ป่อเต็กตึ๊ง
                        </a>
                        <a href="{{ url('/sos') }}?search=highway" class="btn btn-outline-danger ">
                             ทางหลวง
                        </a>
                        <a href="{{ url('/sos') }}?search=lawyers" class="btn btn-outline-secondary ">
                             ทนายอาสา
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
                                <div class="row alert alert-secondary text-center">
                                    <!-- <div class="col-1">
                                        <center><b>Id</b></center>
                                    </div> -->
                                    <div class="col-2">
                                            <b>เวลา</b><br>
                                            Time
                                    </div>
                                    <div class="col-1">
                                            <b>ประเภท</b><br>
                                            Type
                                    </div>
                                    <div class="col-2">
                                            <b>ละติจูด</b><br>
                                            Latitude
                                    </div>
                                    <div class="col-2">
                                            <b>ลองติจูด</b><br>
                                            Longitude
                                    </div>
                                    <div class="col-1">
                                            <b>พื้นที่</b><br>
                                            Area
                                    </div>
                                    <div class="col-2">
                                            <b>ชื่อ</b><br>
                                            Name
                                    </div>
                                    <div class="col-2">
                                            <b>เบอร์</b><br>
                                            Phone
                                    </div>
                                

                                   
                                </div>
                                @foreach($view_map as $item)
                                    <div class="row text-center">
                                        <div class="col-2 ">
                                            <h6>
                                                {{ $item->	created_at }}
                                            </h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>
                                                {{ $item->	content }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                {{ $item->	lat }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                {{ $item->	lng }}
                                            </h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>
                                                {{ $item->	area }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h5 class="text-success"><span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;{{ $item->name }}
                                            </h5>
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                {{ $item->	phone }}
                                            </h6>
                                        </div>
                                        
                                    </div>
                                    <br>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
