@extends('layouts.admin')

@section('content')
<br>
<div class="col-md-12">
  <div class="card">
    <div class="card-header bg-transparent">
      <div class="row align-items-center">
        <div class="col">
          <div class="row">
              <div class="col-md-12">
                  <h6 class=" text-muted ls-1 mb-1">
                    SOS
                    <a style="float: right">ขอความช่วยเหลือทั้งหมด : <span id="sos_all">{{ $sos_all }}</span> ครั้ง</a>
                  </h6>
              </div>
          </div>
          <h5 class="h3 mb-0">
            ขอความช่วยเหลือ
          </h5>
          <br>
          <div class="row">
            <div class="col-md-2">
              <label  class="control-label">{{ 'เลือกปี' }}</label>
              <select class="form-control" id="select_year" onchange="select_year();" value="">
                <option value="">ทั้งหมด</option>
                <option value="2020">2563</option>
                <option value="2021">2564</option>
                <option value="2022">2565</option>
              </select>
            </div>
            <div class="col-md-2">
              <label  class="control-label">{{ 'เลือกเดือน' }}</label>
              <select class="form-control" id="select_month" onchange="select_month();">
                <option value="">ทั้งหมด</option>
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
            <div class="col-md-2">
              <label  class="control-label">{{ 'เลือกพื้นที่รับผิดชอบ' }}</label>
              <select class="form-control" id="select_area" onchange="select_area();">
                <option value="">ทั้งหมด</option> 
                @if(!empty($area))
                    @foreach($area as $item)
                        <option value="{{ $item->area }}">
                                {{ $item->area }}
                        </option>   

                    @endforeach
                @else
                    <option value="" selected></option> 
                @endif
              </select>
            </div>
            <div class="col-md-1">
              <br>
              <form style="float: right;" method="GET" action="{{ url('/sos_detail_chart') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                <div class="input-group">
                    <input type="hidden" class="form-control" id="input_year" name="year"value="{{ request('year') }}">
                    <input type="hidden" class="form-control" id="input_month" name="month" value="{{ request('month') }}">
                    <input type="hidden" class="form-control" id="input_area" name="area" value="{{ request('area') }}">

                    <button style="margin-top: 7px;" class="btn btn-primary" type="submit">
                        ค้นหา
                    </button>
                </div>
              </form>
            </div>
            <div class="col-md-2">
              <br>
              <a href="{{URL::to('/sos_detail_chart')}}" >
                <button style="margin-top: 7px;" class="btn btn-danger">
                        ล้างการค้นหา
                </button>
              </a>
            </div>
            <div class="col-md-3">
              <br><br>
              <div style="float: right;">ทั้งหมด : <b>{{ $total }}</b> ครั้ง</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        
        <div class="row">
          <canvas id="sosChart" height="70"></canvas>
            <script>
              var ctx = document.getElementById('sosChart').getContext('2d');
              var sosChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'],
                      datasets: [{
                          label: 'จำนวนการขอความช่วยเหลือ(ต่อชั่วโมง)',
                          data: [
                                <?php echo $sos_time_00 ?>,
                                <?php echo $sos_time_01 ?>,
                                <?php echo $sos_time_02 ?>,
                                <?php echo $sos_time_03 ?>,
                                <?php echo $sos_time_04 ?>,
                                <?php echo $sos_time_05 ?>,
                                <?php echo $sos_time_06 ?>,
                                <?php echo $sos_time_07 ?>,
                                <?php echo $sos_time_08 ?>,
                                <?php echo $sos_time_09 ?>,
                                <?php echo $sos_time_10 ?>,
                                <?php echo $sos_time_11 ?>,
                                <?php echo $sos_time_12 ?>,
                                <?php echo $sos_time_13 ?>,
                                <?php echo $sos_time_14 ?>,
                                <?php echo $sos_time_15 ?>,
                                <?php echo $sos_time_16 ?>,
                                <?php echo $sos_time_17 ?>,
                                <?php echo $sos_time_18 ?>,
                                <?php echo $sos_time_19 ?>,
                                <?php echo $sos_time_20 ?>,
                                <?php echo $sos_time_21 ?>,
                                <?php echo $sos_time_22 ?>,
                                <?php echo $sos_time_23 ?>,
                                
                            ],
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(255, 99, 132, 1)',
                              
                          ],
                          borderWidth: 1.5
                      }]
                  }
              });

              function select_year(){
                var select_year = document.getElementById('select_year').value;
                  // console.log(select_year);
                var input_year = document.getElementById('input_year');
                  input_year.value = select_year;
              }
              function select_month(){
                var select_month = document.getElementById('select_month').value;
                  // console.log(select_month);
                var input_month = document.getElementById('input_month');
                  input_month.value = select_month;
              }
              function select_area(){
                var select_area = document.getElementById('select_area').value;
                  // console.log(select_area);
                var input_area = document.getElementById('input_area');
                  input_area.value = select_area;
              }
              document.addEventListener('DOMContentLoaded', (event) => {
                var input_year = document.getElementById('input_year').value;
                var input_month = document.getElementById('input_month').value;
                var input_area = document.getElementById('input_area').value;

                var select_year = document.getElementById('select_year');
                var select_month = document.getElementById('select_month');
                var select_area = document.getElementById('select_area');

                  select_year.value = input_year ;
                  select_month.value = input_month ;
                  select_area.value = input_area ;

              });
            </script>
          </div>
    </div>
  </div>
</div>
@endsection