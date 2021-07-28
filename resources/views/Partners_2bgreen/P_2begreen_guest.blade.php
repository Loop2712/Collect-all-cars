@extends('layouts.partners.2bgreen')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        รายการรถที่ถูกแจ้งปัญหาการขับขี่ (มากไปน้อย)
                        <a style="float:right;" class="btn btn-sm btn-outline-success text-success" href="{{ url('/guest_latest_2bgreen') }}">
                            <i class="fas fa-clock"></i> วันที่รายงานล่าสุด
                        </a>
                    </h3>
                    <div class="card-body">
                        <!-- <a class="btn btn-sm btn-outline-danger text-danger" href="{{ url('/guest_2bgreen') }}">
                            <i class="fas fa-angle-double-up"></i> รายการรถที่ถูกแจ้งปัญหาการขับขี่
                        </a> -->
                        <div class="row">
                            <div class="col-md-2">
                              <br><br>
                            </div>
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
                                <form style="float: right;" method="GET" action="{{ url('/guest_2bgreen') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
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
                                <a href="{{URL::to('/guest_2bgreen')}}" >
                                    <button class="btn btn-danger">
                                        ล้างการค้นหา
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                        <!-- มากสุด -->
                        <div id="the_most" class="container">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function select_year(){
        let select_year = document.getElementById('select_year').value;
          // console.log(select_year);
        let input_year = document.getElementById('input_year');
          input_year.value = select_year;
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
        let input_month_1 = document.getElementById('input_month_1').value;
        let input_month_2 = document.getElementById('input_month_2').value;

        let select_year = document.getElementById('select_year');
        let select_month_1 = document.getElementById('select_month_1');
        let select_month_2 = document.getElementById('select_month_2');

        select_year.value = input_year ;
        select_month_1.value = input_month_1 ;
        select_month_2.value = input_month_2 ;

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
