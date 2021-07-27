@extends('layouts.partners.2bgreen')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        รายการรถที่ถูกแจ้งปัญหาการขับขี่ (มากไปน้อย)
                    </h3>
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
                                                <div class="row">
                                                    <div class="col-10">
                                                        <b>
                                                            รายงานเดือน 
                                                            (<span id="month_th_1"></span> - <span id="month_th_2"></span>)
                                                        </b>
                                                        <br>
                                                        <span>
                                                            Monthly reports
                                                            (<span id="month_en_1"></span> - <span id="month_en_2"></span>)
                                                        </span>
                                                    </div>
                                                    <div class="col-2">
                                                       <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                                                          <i class="fas fa-calendar-alt"></i>
                                                        </button> 
                                                    </div>
                                                </div>
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
                                                <b>{{ $count_per_month }}</b>
                                                <br>
                                                @if(gettype($count_per_month) == 'integer')
                                                    <span class="text-secondary" style="font-size:14px;">คิดเป็น {{ number_format(($count_per_month / $item->count) * 100,2) }} % ของทั้งหมด({{ $item->count }})</span>
                                                @endif
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">กรุณาเลือกเดือนที่ต้องการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="select_year" onchange="select_year();">
            <option value="">เลือกปี</option>
            <option value="2020">2563</option>
            <option value="2021">2564</option>
            <option value="2022">2565</option>
        </select>
        <hr>
        <div class="row">
            <div class="col-5">
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
            <div class="col-2">
                <center>
                    <span>ถึง</span>
                </center>
            </div>
            <div class="col-5">
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
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="monthly();">ยืนยัน</button> -->
        <form style="float: right;" method="GET" action="{{ url('/guest_2bgreen') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
            <div class="input-group">
                <input type="hidden" class="form-control" id="input_year" name="year"value="{{ request('year') }}">
                <input type="hidden" class="form-control" id="input_month_1" name="month_1" value="{{ request('month_1') }}">
                <input type="hidden" class="form-control" id="input_month_2" name="month_2" value="{{ request('month_2') }}">

                <button style="margin-top: 7px;" class="btn btn-primary" type="submit">
                    ค้นหา
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function select_year(){
        var select_year = document.getElementById('select_year').value;
          // console.log(select_year);
        var input_year = document.getElementById('input_year');
          input_year.value = select_year;
    }
    function select_month_1(){
        var select_month_1 = document.getElementById('select_month_1').value;
          // console.log(select_month_1);
        var input_month_1 = document.getElementById('input_month_1');
          input_month_1.value = select_month_1;

        var select_month_2 = document.getElementById('select_month_2');
          select_month_2.value = select_month_1 ;
        var input_month_2 = document.getElementById('input_month_2');
          input_month_2.value = select_month_2.value;
    }
    function select_month_2(){
        var select_month_2 = document.getElementById('select_month_2').value;
          // console.log(select_month_2);
        var input_month_2 = document.getElementById('input_month_2');
          input_month_2.value = select_month_2;
    }
    document.addEventListener('DOMContentLoaded', (event) => {
        var input_year = document.getElementById('input_year').value;
        var input_month_1 = document.getElementById('input_month_1').value;
        var input_month_2 = document.getElementById('input_month_2').value;

        var select_year = document.getElementById('select_year');
        var select_month_1 = document.getElementById('select_month_1');
        var select_month_2 = document.getElementById('select_month_2');

        select_year.value = input_year ;
        select_month_1.value = input_month_1 ;
        select_month_2.value = input_month_2 ;

        var month_th_1 = document.getElementById('month_th_1');
            month_th_1.innerHTML = select_month_1.value;
        var month_th_2 = document.getElementById('month_th_2');
            month_th_2.innerHTML = select_month_2.value;

        var month_en_1 = document.getElementById('month_en_1');
            month_en_1.innerHTML = select_month_1.value;
        var month_en_2 = document.getElementById('month_en_2');
            month_en_2.innerHTML = select_month_2.value;

    });

</script>
@endsection
