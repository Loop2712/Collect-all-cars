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
                                                <b>{{ $item->count }}</b>
                                                <br>
                                                <span class="text-secondary" style="font-size:14px;">คิดเป็น {{ ($item->count / $item->count) * 100 }} % ของทั้งหมด</span>
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
        <select class="form-control" id="select_year">
            <option value="2021">2564</option>
            <option value="2020">2563</option>
            <option value="2019">2562</option>
            <option value="2018">2561</option>
            <option value="2017">2560</option>
        </select>
        <hr>
        <div class="row">
            <div class="col-5">
                <select class="form-control" id="select_month_1">
                    <option value="jan">มกราคม</option>
                    <option value="feb">กุมภาพันธ์</option>
                    <option value="mar">มีนาคม</option>
                    <option value="apr">เมษายน</option>
                    <option value="may">พฤษภาคม</option>
                    <option value="jun">มิถุนายน</option>
                    <option value="jul">กรกฎาคม</option>
                    <option value="aug">สิงหาคม</option>
                    <option value="sep">กันยายน</option>
                    <option value="oct">ตุลาคม</option>
                    <option value="nov">พฤศจิกายน</option>
                    <option value="dec">ธันวาคม</option>
                </select>
            </div>
            <div class="col-2">
                <center>
                    <span>ถึง</span>
                </center>
            </div>
            <div class="col-5">
                <select class="form-control" id="select_month_2">
                    <option value="jan">มกราคม</option>
                    <option value="feb">กุมภาพันธ์</option>
                    <option value="mar">มีนาคม</option>
                    <option value="apr">เมษายน</option>
                    <option value="may">พฤษภาคม</option>
                    <option value="jun">มิถุนายน</option>
                    <option value="jul">กรกฎาคม</option>
                    <option value="aug">สิงหาคม</option>
                    <option value="sep">กันยายน</option>
                    <option value="oct">ตุลาคม</option>
                    <option value="nov">พฤศจิกายน</option>
                    <option value="dec">ธันวาคม</option>
                </select>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-4">
                <input type="checkbox" name="jan">&nbsp;&nbsp;&nbsp;มกราคม <br>
                <input type="checkbox" name="apr">&nbsp;&nbsp;&nbsp;เมษายน <br>
                <input type="checkbox" name="jul">&nbsp;&nbsp;&nbsp;กรกฎาคม <br>
                <input type="checkbox" name="oct">&nbsp;&nbsp;&nbsp;ตุลาคม <br>
            </div>
            <div class="col-4">
                <input type="checkbox" name="feb">&nbsp;&nbsp;&nbsp;กุมภาพันธ์ <br>
                <input type="checkbox" name="may">&nbsp;&nbsp;&nbsp;พฤษภาคม <br>
                <input type="checkbox" name="aug">&nbsp;&nbsp;&nbsp;สิงหาคม <br>
                <input type="checkbox" name="nov">&nbsp;&nbsp;&nbsp;พฤศจิกายน <br>
            </div>
            <div class="col-4">
                <input type="checkbox" name="mar">&nbsp;&nbsp;&nbsp;มีนาคม <br>
                <input type="checkbox" name="jun">&nbsp;&nbsp;&nbsp;มิถุนายน <br>
                <input type="checkbox" name="sep">&nbsp;&nbsp;&nbsp;กันยายน. <br>
                <input type="checkbox" name="dec">&nbsp;&nbsp;&nbsp;ธันวาคม <br>
            </div>
        </div> -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="monthly();">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
});

function monthly() {
    let select_year = document.querySelector("#select_year");
    let select_month_1 = document.querySelector("#select_month_1");
    let select_month_2 = document.querySelector("#select_month_2");
    console.log(select_year.value);
    console.log(select_month_1.value);
    console.log(select_month_2.value);

    let month_en_1 = document.querySelector("#month_en_1");
    let month_en_2 = document.querySelector("#month_en_2");
    month_en_1.innerHTML = select_month_1.value;
    month_en_2.innerHTML = select_month_2.value;

    let month_th_1 = document.querySelector("#month_th_1");
    let month_th_2 = document.querySelector("#month_th_2");
    
    switch (month_en_1.innerHTML) {
        case "jan":
            month_th_1.innerHTML  = "ม.ค.";
            break;
        case "feb":
            month_th_1.innerHTML  = "ก.พ.";
            break;
        case "mar":
            month_th_1.innerHTML  = "มี.ค.";
            break;
        case "apr":
            month_th_1.innerHTML  = "เม.ย.";
            break;
        case "may":
            month_th_1.innerHTML  = "พ.ค.";
            break;
        case "jun":
            month_th_1.innerHTML  = "มิ.ย.";
            break;
        case "jul":
            month_th_1.innerHTML  = "ก.ค.";
            break;
        case "aug":
            month_th_1.innerHTML  = "ส.ค.";
            break;
        case "sep":
            month_th_1.innerHTML  = "ก.ย.";
            break;
        case "oct":
            month_th_1.innerHTML  = "ต.ค.";
            break;
        case "nov":
            month_th_1.innerHTML  = "พ.ย.";
            break;
        case "dec":
            month_th_1.innerHTML  = "ธ.ค.";
            break;

        }

    switch (month_en_2.innerHTML) {
        case "jan":
            month_th_2.innerHTML  = "ม.ค.";
            break;
        case "feb":
            month_th_2.innerHTML  = "ก.พ.";
            break;
        case "mar":
            month_th_2.innerHTML  = "มี.ค.";
            break;
        case "apr":
            month_th_2.innerHTML  = "เม.ย.";
            break;
        case "may":
            month_th_2.innerHTML  = "พ.ค.";
            break;
        case "jun":
            month_th_2.innerHTML  = "มิ.ย.";
            break;
        case "jul":
            month_th_2.innerHTML  = "ก.ค.";
            break;
        case "aug":
            month_th_2.innerHTML  = "ส.ค.";
            break;
        case "sep":
            month_th_2.innerHTML  = "ก.ย.";
            break;
        case "oct":
            month_th_2.innerHTML  = "ต.ค.";
            break;
        case "nov":
            month_th_2.innerHTML  = "พ.ย.";
            break;
        case "dec":
            month_th_2.innerHTML  = "ธ.ค.";
            break;

        }

        fetch("{{ url('/') }}/guest_2bgreen/select_month/" + month_en_1.innerHTML + "/" + month_en_2.innerHTML + "/" + select_year.value)
            // .then(response => response.json())
            // .then(result => {
            //     console.log(result);
                
                
            // });
}

</script>
@endsection
