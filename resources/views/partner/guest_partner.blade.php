@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="row d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent">
                    <div class="d-flex align-items-center" style="margin-top:10px;">
                        <div>
                            <h5 class="font-weight-bold mb-0">เลือกช่วงเวลา</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    <div class="row align-items-center">
                    <div class="row justify-content-center" style="margin-top:-30px">
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_year" onchange="select_year();">
                                    <option value="">เลือกปี</option>
                                        @if(!empty($guest_year))
                                            @foreach($guest_year as $item)
                                                <option value="{{ $item->date }}">
                                                        {{ $item->date + 543 }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_month_1" onchange="select_month_1();">
                                    <option value="">เลือกเดือน</option>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <center>
                                    <br>
                                    <label style="margin-top:7px;" class="control-label">{{ 'ถึง' }}</label>
                                </center>
                            </div>
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_month_2" onchange="select_month_2();">
                                    <option value="">เลือกเดือน</option>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <br>
                                <form style="float: right;" method="GET" action="{{ url('/guest_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                    <div class="input-group">
                                        <input type="number" class="form-control d-none" id="input_year" name="year"value="{{ request('year') }}">
                                        <input type="number" class="form-control d-none" id="input_month_1" name="month_1" value="{{ request('month_1') }}">
                                        <input type="number" class="form-control d-none" id="input_month_2" name="month_2" value="{{ request('month_2') }}">
                                    </div>
                                    <button class="btn btn-primary" type="submit">
                                        ค้นหา
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <a href="{{URL::to('/guest_partner')}}" >
                                    <button class="btn btn-danger">
                                        ล้างการค้นหา
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="row col-12">
                <div class="col-9">
                    <h5 style="margin-top: 8px;" class="font-weight-bold mb-0">
                        รายการรถที่ถูกแจ้งปัญหาการขับขี่ (มากไปน้อย)
                    </h5>
                </div>
                <div class="col-3">
                    <a style="float: right;" type="button" data-toggle="modal" data-target="#Partner_report">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>วิธีใช้
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>ยี่ห้อ / รุ่น</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>รายงานทั้งหมด</th>
                            <th><b>รายงานต่อเดือน</b> (<span id="month_th_1"></span> - <span id="month_th_2"></span>)</th>
                            <th>ผู้ลงทะเบียน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guest as $item)
                            <tr class="text-center">
                                <td>
                                    <span> <b>{{ $item->register_cars->brand }}</b> </span><br>
                                    <span style="font-size: 15px;color: #708090"> {{ $item->register_cars->generation }}</span>
                                </td>
                                <td>
                                    <span> <b>{{ $item->registration }}</b> </span><br>
                                    <span style="font-size: 15px;color: #708090"> {{ $item->county }}</span>
                                </td>
                                <td><b>{{ $item->count }}</b></td>
                                <td>
                                    <b>{{ $count_per_month[$item->register_car_id] }}</b>
                                    <br>
                                    @if(gettype($count_per_month[$item->register_car_id]) == 'integer')
                                        <span class="text-secondary" style="font-size:14px;">คิดเป็น <b class="text-warning">{{ number_format(($count_per_month[$item->register_car_id] / $item->count) * 100,2) }} %</b> จากทั้งหมด <b>{{ $item->count }}</b> ครั้ง</span>
                                    @endif
                                </td>
                                <td>
                                    <b>{{ $item->register_cars->name }}</b>
                                    <a target="bank" href="{{ url('/profile/'.$item->register_cars->user_id) }}"><i class="fas fa-eye"></i></a>
                                    <br>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>

    <div class="container d-block d-lg-none">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   
                    <!-- <h4 class="d-block d-lg-none">
                        <a style="float:right;" class="btn btn-sm btn-outline-success text-success" href="{{ url('/partner_guest_latest') }}">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>
                    </h4> -->
                    <!------------------------------------------------- pc ------------------------------------------------->
    
<!--                     
                    <div class="card-body d-none d-lg-block">
                        
                        <div class="row justify-content-center" style="margin-top:-15px">
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_year" onchange="select_year();">
                                    <option value="">เลือกปี</option>
                                        @if(!empty($guest_year))
                                            @foreach($guest_year as $item)
                                                <option value="{{ $item->date }}">
                                                        {{ $item->date + 543 }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_month_1" onchange="select_month_1();">
                                    <option value="">เลือกเดือน</option>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <center>
                                    <br>
                                    <label style="margin-top:7px;" class="control-label">{{ 'ถึง' }}</label>
                                </center>
                            </div>
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_month_2" onchange="select_month_2();">
                                    <option value="">เลือกเดือน</option>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <br>
                                <form style="float: right;" method="GET" action="{{ url('/guest_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                    <div class="input-group">
                                        <input type="number" class="form-control d-none" id="input_year" name="year"value="{{ request('year') }}">
                                        <input type="number" class="form-control d-none" id="input_month_1" name="month_1" value="{{ request('month_1') }}">
                                        <input type="number" class="form-control d-none" id="input_month_2" name="month_2" value="{{ request('month_2') }}">

                                        <button class="btn btn-primary" type="submit">
                                            ค้นหา
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <a href="{{URL::to('/guest_partner')}}" >
                                    <button class="btn btn-danger">
                                        ล้างการค้นหา
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block table-border-style d-none d-lg-block" style="margin-top:-30px">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>ยี่ห้อ / รุ่น</th>
                                        <th>หมายเลขทะเบียน</th>
                                        <th>รายงานทั้งหมด</th>
                                        <th>
                                            <b>รายงานต่อเดือน</b> (<span id="month_th_1"></span> - <span id="month_th_2"></span>)
                                            
                                        </th>
                                        <th>ผู้ลงทะเบียน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guest as $item)
                                        <tr class="text-center">
                                            <td scope="row">
                                                <b>{{ $item->register_cars->brand }}</b><br>
                                                {{ $item->register_cars->generation }}
                                            </td>
                                            <td>
                                                <b>{{ $item->registration }}</b><br>
                                                    {{ $item->county }}
                                            </td>
                                            <td><b>{{ $item->count }}</b></td>
                                            
                                            <td >
                                                <b>{{ $count_per_month[$item->register_car_id] }}</b>
                                                <br>
                                                @if(gettype($count_per_month[$item->register_car_id]) == 'integer')
                                                    <span class="text-secondary" style="font-size:14px;">คิดเป็น <b class="text-warning">{{ number_format(($count_per_month[$item->register_car_id] / $item->count) * 100,2) }} %</b> จากทั้งหมด <b>{{ $item->count }}</b> ครั้ง</span>
                                                @endif
                                            </td>
                                            <td>
                                                <b>{{ $item->register_cars->name }}</b>
                                                <br>
                                                <a target="bank" href="{{ url('/profile/'.$item->register_cars->user_id) }}"><i class="fas fa-eye"></i> ดูข้อมูลโปรไฟล์</a>
                                                <br>
                                            </td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                                <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                            </table>
                        </div>
                    </div> -->
                    <!--------------------------------------------- End pc --------------------------------------------->
                    
                        <!-- <div id="the_most" class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
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
                                                        <b>รายงานทั้งหมด</b><br>
                                                        All reports
                                                    </center>
                                                </div>
                                                <div class="col-3">
                                                    <center>
                                                        <b>รายงานต่อเดือน</b> (<span id="month_th_1"></span> - <span id="month_th_2"></span>)
                                                        <br>
                                                        Reports per month (<span id="month_en_1"></span> - <span id="month_en_2"></span>)
                                                    </center>
                                                </div>
                                                <div class="col-3">
                                                    <center>
                                                        <b>ผู้ลงทะเบียน</b><br>
                                                        Registrant
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($guest as $item)
                                            <div class="row">
                                                <div class="col-2">
                                                    <center>
                                                        <b>{{ $item->register_cars->brand }}</b><br>
                                                        {{ $item->register_cars->generation }}
                                                    </center>
                                                </div>
                                                <div class="col-2">
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
                                                        <b>{{ $count_per_month[$item->register_car_id] }}</b>
                                                        <br>
                                                        @if(gettype($count_per_month[$item->register_car_id]) == 'integer')
                                                            <span class="text-secondary" style="font-size:14px;">คิดเป็น <b>{{ number_format(($count_per_month[$item->register_car_id] / $item->count) * 100,2) }} %</b> จากทั้งหมด <b>{{ $item->count }}</b> ครั้ง</span>
                                                        @endif
                                                    </center>
                                                </div>
                                                <div class="col-3">
                                                    <center>
                                                        <b>{{ $item->register_cars->name }}</b>
                                                        <br>
                                                        <a target="bank" href="{{ url('/profile/'.$item->register_cars->user_id) }}"><i class="fas fa-eye"></i> ดูข้อมูลโปรไฟล์</a>
                                                        <br>
                                                    </center>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!---------------------------------------------- Mobile ---------------------------------------------->
    <div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="row">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="col-12"  style="margin-top:10px">
                    <div>
                        <h5 class="font-weight-bold mb-0">รายการรถที่ถูกแจ้งปัญหาการขับขี่ (มากไปน้อย)</h5>
                    </div>
                        <div class="card-harder">
                            <div class="row">
                                <div class="col-12">
                                    <label  class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_year_m" onchange="select_year_m();">
                                        <option value="">เลือกปี</option>
                                            @if(!empty($guest_year))
                                                @foreach($guest_year as $item)
                                                    <option value="{{ $item->date }}">
                                                            {{ $item->date + 543 }}
                                                    </option>   

                                                @endforeach
                                            @else
                                                <option value="" selected></option> 
                                            @endif
                                    </select>
                                </div>                          
                                <div class="col-5 align-self-center" >
                                    <label  class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_month_1_m" onchange="select_month_1_m();">
                                        <option value="">เลือกเดือน</option>
                                        <option value="01">มกราคม</option>
                                        <option value="02">กุมภาพันธ์</option>
                                        <option value="03">มีนาคม</option>
                                        <option value="04">เมษายน</option>
                                        <option value="05">พฤษภาคม</option>
                                        <option value="06">มิถุนายน</option>
                                        <option value="07">กรกฎาคม</option>
                                        <option value="08">สิงหาคม</option>
                                        <option value="09">กันยายน</option>
                                        <option value="10">ตุลาคม</option>
                                        <option value="11">พฤศจิกายน</option>
                                        <option value="12">ธันวาคม</option>
                                    </select>
                                </div>
                                <div class="col-2 align-self-center" style="vertical-align: middle;" >
                                    <center> <br> ถึง</center>
                                </div>
                                <div class="col-5" >
                                    <label  class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_month_2_m" onchange="select_month_2_m();">
                                        <option value="">เลือกเดือน</option>
                                        <option value="01">มกราคม</option>
                                        <option value="02">กุมภาพันธ์</option>
                                        <option value="03">มีนาคม</option>
                                        <option value="04">เมษายน</option>
                                        <option value="05">พฤษภาคม</option>
                                        <option value="06">มิถุนายน</option>
                                        <option value="07">กรกฎาคม</option>
                                        <option value="08">สิงหาคม</option>
                                        <option value="09">กันยายน</option>
                                        <option value="10">ตุลาคม</option>
                                        <option value="11">พฤศจิกายน</option>
                                        <option value="12">ธันวาคม</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <form style="float: right;" method="GET" action="{{ url('/guest_partner') }}" accept-charset="UTF-8"  role="search">
                                        <div class="input-group">
                                            <input type="number" class="form-control d-none" id="input_year_m" name="year"value="{{ request('year') }}">
                                            <input type="number" class="form-control d-none" id="input_month_1_m" name="month_1" value="{{ request('month_1') }}">
                                            <input type="number" class="form-control d-none" id="input_month_2_m" name="month_2" value="{{ request('month_2') }}">

                                            <button class="btn btn-primary" type="submit">
                                                ค้นหา
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <a href="{{URL::to('/guest_partner')}}" >
                                        <button class="btn btn-danger">
                                            ล้างการค้นหา
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding: 0px 10px 0px 10px;">
                @foreach($guest as $item)
                    @foreach($data_partners as $data_partner)
                    @endforeach
                    <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                        <center>
                            <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                <span> รายงาน</span>
                                    <br>
                                    {{ $item->count }}
                                </div>
                                <div class="col-8" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                        <h5 style="margin-bottom:0px; margin-top:10px; ">{{ $item->registration }} <br> {{ $item->county }}</h5>


                                </div> 
                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <i class="fas fa-angle-down" ></i>
                                </div>
                                <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                    <hr>
                                    <p style="font-size:18px;padding:0px"> ยี่ห้อ <br>  {{ $item->register_cars->brand }}  </p> <hr>
                                    <p style="font-size:18px;padding:0px">รุ่น <br> {{ $item->register_cars->generation }}  </p> <hr>
                                    <p style="font-size:18px;padding:0px"> 
                                        รายงานต่อเดือน <br>  
                                        {{ $count_per_month[$item->register_car_id] }}
                                        @if(gettype($count_per_month[$item->register_car_id]) == 'integer')
                                            <span class="text-secondary" style="font-size:14px;">คิดเป็น <b style="color:#F1C40F">{{ number_format(($count_per_month[$item->register_car_id] / $item->count) * 100,2) }} %</b> จากทั้งหมด <b>{{ $item->count }}</b> ครั้ง</span>
                                        @endif
                                    </p> <hr>
                                    <p style="font-size:18px;padding:0px">ผู้ลงทะเบียน <br> 
                                        <a target="bank" href="{{ url('/profile/'.$item->register_cars->user_id) }}"><i class="fas fa-eye"></i> {{ $item->register_cars->name }}</a>
                                        <br>
                                        @if(!empty($item->user->branch))
                                            <b>สาขา</b> {{ $item->user->branch }}
                                        @endif
                                    </p> 
                                </div>
                            </div>
                        </center>   
                    </div>  
                @endforeach
                <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
                
                <!---------------------------------------------- End Mobile ---------------------------------------------->
            </div>
        </div>
    </div>
    <!------------------------------------------- Modal รถที่ถูกรายงาน ------------------------------------------->
  <div class="modal fade"  id="Partner_report" tabindex="-1" role="dialog" aria-labelledby="Partner_reportTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_reportTitle">รถที่ถูกรายงาน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/3.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.การค้นหารรายการรถที่ถูกรายงาน รายเดือน/ปี</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="register">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/4.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกปี : เลือกปีที่ต้องการค้นหารายการรถที่ถูกแจ้งปัญหาการขับขี่</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เลือกเดือน : สามารถระบุช่วงเดือนที่ถูกแจ้งปัญหาการขับขี่ได้ โดยเลือกช่วงเดือนจาก Dropdown List เพื่อเลือกเดือนที่ที่ต้องการค้นหา</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มค้นหาเพื่อทำการค้นหาข้อมูล</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.ล้างการค้นหา : หากต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา เพื่อยกเลิกการค้นหา</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px"  data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.รายการรถที่ถูกแจ้งปัญหาการขับขี่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="registerline">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/5.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ยี่ห้อรถ/รุ่น : แสดงยี่ห้อรถและรุ่นรถที่ถูกรายงาน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.รายงานทั้งหมด : แสดงจำนวนครั้งที่ถูกรายงานทั้งหมด</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รายงานต่อเดือน : แสดงจำนวนครั้งที่ถูกรายงานตามเดือนที่ทำการค้นหา</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ผู้ลงทะเบียน : แสดงชื่อผู้ลงทะเบียนรถ</h5>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!------------------------------------------- Modal รถที่ถูกรายงาน ------------------------------------------->
<script>
    function select_year(){
        let select_year = document.getElementById('select_year').value;
          // console.log(select_year);
        let input_year = document.getElementById('input_year');
          input_year.value = select_year;
    }
    function select_year_m(){
        let select_year_m = document.getElementById('select_year_m').value;
          // console.log(select_year);
        let input_year_m = document.getElementById('input_year_m');
          input_year_m.value = select_year_m;
    }
    function select_month_1(){
        let select_month_1 = document.getElementById('select_month_1').value;
          // console.log(select_month_1);
        let input_month_1 = document.getElementById('input_month_1');
          input_month_1.value = select_month_1;

        let select_month_2 = document.getElementById('select_month_2');
          select_month_2.value = select_month_1 ;
        let input_month_2 = document.getElementById('input_month_2');
          input_month_2.value = select_month_2.value;
    }
    function select_month_1_m(){
        let select_month_1_m = document.getElementById('select_month_1_m').value;
          // console.log(select_month_1);
        let input_month_1_m = document.getElementById('input_month_1_m');
          input_month_1_m.value = select_month_1_m;

        let select_month_2_m = document.getElementById('select_month_2_m');
          select_month_2_m.value = select_month_1_m ;
        let input_month_2_m = document.getElementById('input_month_2_m');
          input_month_2_m.value = select_month_2_m.value;
    }
    function select_month_2_m(){
        let select_month_2_m = document.getElementById('select_month_2_m').value;
        let select__m = document.getElementById('select_month_1').value;
            int_month_1_m = parseInt(select_month_1_m);
            int_month_2_m = parseInt(select_month_2_m);

            if (int_month_2_m < int_month_1_m) {
                let va_1 = select_month_1_m ;
                    select_month_1_m = select_month_2_m;
                    select_month_2_m = va_1;

                let input_month_1_m = document.getElementById('input_month_1_m');
                    input_month_1_m.value = select_month_1_m;
                let input_month_2_m = document.getElementById('input_month_2_m');
                    input_month_2_m.value = select_month_2_m;
            }else{
                let input_month_2_m = document.getElementById('input_month_2_m');
                    input_month_2_m.value = select_month_2_m;
            }
    }
    function select_month_2(){
        let select_month_2 = document.getElementById('select_month_2').value;
        let select_month_1 = document.getElementById('select_month_1').value;
            int_month_1 = parseInt(select_month_1);
            int_month_2 = parseInt(select_month_2);

            if (int_month_2 < int_month_1) {
                let va_1 = select_month_1 ;
                    select_month_1 = select_month_2;
                    select_month_2 = va_1;

                let input_month_1 = document.getElementById('input_month_1');
                    input_month_1.value = select_month_1;
                let input_month_2 = document.getElementById('input_month_2');
                    input_month_2.value = select_month_2;
            }else{
                let input_month_2 = document.getElementById('input_month_2');
                    input_month_2.value = select_month_2;
            }
    }
    document.addEventListener('DOMContentLoaded', (event) => {
        let input_year = document.getElementById('input_year').value;
        let input_year_m = document.getElementById('input_year_m').value;
        let input_month_1 = document.getElementById('input_month_1').value;
        let input_month_2 = document.getElementById('input_month_2').value;
        let input_month_1_m = document.getElementById('input_month_1_m').value;
        let input_month_2_m = document.getElementById('input_month_2_m').value;

        let select_year = document.getElementById('select_year');
        let select_year_m = document.getElementById('select_year_m');
        let select_month_1 = document.getElementById('select_month_1');
        let select_month_2 = document.getElementById('select_month_2');
        let select_month_1_m = document.getElementById('select_month_1_m');
        let select_month_2_m = document.getElementById('select_month_2_m');

        select_year.value = input_year ;
        select_year_m.value = input_year_m ;
        select_month_1.value = input_month_1 ;
        select_month_2.value = input_month_2 ;
        select_month_1_m.value = input_month_1_m ;
        select_month_2_m.value = input_month_2_m ;

        let month_th_1 = document.getElementById('month_th_1');
            month_th_1.innerHTML = select_month_1.value;
        let month_th_2 = document.getElementById('month_th_2');
            month_th_2.innerHTML = select_month_2.value;

        let month_en_1 = document.getElementById('month_en_1');
            month_en_1.innerHTML = select_month_1.value;
        let month_en_2 = document.getElementById('month_en_2');
            month_en_2.innerHTML = select_month_2.value;

    });

</script>
@endsection
