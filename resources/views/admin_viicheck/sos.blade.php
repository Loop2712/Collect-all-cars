@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
                        <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ $sos_all }}</span>
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
                        <a href="{{ url('/sos') }}" class="btn btn-outline-info ">
                            <i class="fas fa-users"></i> ทั้งหมด
                        </a>

                        <!-- <form method="GET" action="{{ url('/sos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->
                        <div class="col-md-2 float-right">
                        <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                @if(!empty($area))
                                    <option value="">เลือกสถานที่</option>   
                                    @foreach($area as $item)
                                        <option value="{{ url('/sos') }}?search={{ $item->area }}">
                                                {{ $item->area }}
                                        </option>   

                                    @endforeach
                                @else
                                    <option value="" selected></option> 
                                @endif
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row alert alert-secondary text-center">
                                    <!-- <div class="col-1">
                                        <center><b>Id</b></center>
                                    </div> -->
                                    <div class="col-1">
                                            <b>ที่</b><br>
                                            
                                    </div>
                                    <div class="col-2">
                                            <b>เวลา</b><br>
                                            Time
                                    </div>
                                    <div class="col-1">
                                            <b>ประเภท</b><br>
                                            Type
                                    </div>
                                    <div class="col-2">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                    </div>
                                    <div class="col-2">
                                            <b>พื้นที่รับผิดชอบ</b><br>
                                            Area
                                    </div>
                                    <div class="col-2">
                                            <b>เบอร์</b><br>
                                            Phone
                                    </div>
                                    <div class="col-2">
                                            <b>ชื่อ</b><br>
                                            Name
                                    </div>
                                    
                                

                                   
                                </div>
                                @foreach($view_map as $item)
                                    <div class="row text-center">
                                    <div class="col-1 ">
                                            <h6>
                                                {{ $loop->iteration }}
                                            </h6>
                                        </div>
                                        <div class="col-2 ">
                                            <h6>
                                                {{ $item->created_at }}
                                            </h6>
                                        </div>
                                        <div class="col-1">
                                                @switch($item->content)
                                                @case('police')
                                                    <h6>ตำรวจ</h6>
                                                @break
                                                @case('JS100')
                                                    <h6>จส.100</h6>
                                                @break
                                                @case('life_saving')
                                                    <h6>หน่วยแพทย์กู้ชีวิต</h6>
                                                @break
                                                @case('pok_tek_tung')
                                                    <h6>ป่อเต็กตึ๊ง</h6>
                                                @break
                                                @case('highway')
                                                    <h6>สายด่วนทางหลวง</h6>
                                                @break
                                                @case('lawyers')
                                                    <h6>ทนายอาสา</h6>
                                                @break
                                                @case(null)
                                                    <h6></h6>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                ...
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                {{ $item->area }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>
                                                {{ $item->phone }}
                                            </h6>
                                        </div>
                                        <div class="col-2">
                                            <h5 class="text-success"><span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;{{ $item->name }}
                                            </h5>
                                        </div>
                                        
                                        
                                    </div>
                                    <br>
                                @endforeach
                                 <div class="pagination-wrapper"> {!! $view_map->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
