@extends('layouts.admin')

@section('content')
<style>
  #img_bg_1{
    background-image: url("{{ asset('/img/bg car/am.png') }}");
    background-size: cover;
  }
  #img_bg_2{
    background-image: url("{{ asset('/img/bg car/pm.png') }}");
    background-size: cover;
  }
</style>
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
              <select class="form-control" id="select_year" onchange="select_year();">
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
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <div class="row main-shadow main-radius">
              <!-- <div style="z-index: 10;position: absolute;margin-top: 9%;margin-left: 17%;">
                <canvas id="canvas_1" width="250" height="250"></canvas>
              </div>
              <div style="z-index: 10;position: absolute;margin-top: 120px;margin-left: 65%;">
                <canvas id="canvas_2" width="250" height="250"></canvas>
              </div> -->

              <div class="col-12">
                <div class="row">
                  <div class="col-md-12" style="z-index: 15;">
                    <!-- 00.00 -->
                    <h2 class="text-danger" style="position:absolute;margin-top: 5.5%;margin-left: 25.3%;">
                      <b> {{ $sos_time_00 }} </b>
                    </h2>
                    <!-- 01.00 -->
                    <h2 class="text-danger" style="position:absolute;margin-top: 9%;margin-left: 31%;">
                      <b> {{ $sos_time_01 }} </b>
                    </h2>
                  </div>
                  <div class="col-md-6" style="z-index: 10; ">
                    <center>
                      <canvas id="canvas_1" width="185px" height="185" style="margin-top:120px"></canvas>
                    </center>
                  </div>
                  <div class="col-md-6" style="z-index: 10;">
                    <center>
                      <canvas id="canvas_2"  width="185px" height="185" style="margin-top:120px"></canvas>
                    </center>
                  </div>
                  <div id="img_bg_1" class="col-md-6" style="margin-top:-300px;">
                    <center>
                      <img width="400px" src="{{ asset('/img/more/clock-am.png') }}" >
                    </center>
                  </div>
                  <div id="img_bg_2" class="col-md-6" style="margin-top:-300px;">
                    <center>
                      <img width="400px" src="{{ asset('/img/more/clock-pm.png') }} ">
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <br><br>
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
            <script>
              var canvas = document.getElementById("canvas_1");
              var ctx = canvas.getContext("2d");
              var radius = canvas.height / 2;
              ctx.translate(radius, radius);
              radius = radius * 0.90
              setInterval(drawClock, 1000);

              function drawClock() {
                drawFace(ctx, radius);
                drawNumbers(ctx, radius);
                drawTime(ctx, radius);
              }

              function drawFace(ctx, radius) {
                var grad;
                ctx.beginPath();
                ctx.arc(0, 0, radius, 0, 2*Math.PI);
                ctx.fillStyle = 'white';
                ctx.fill();
                grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                grad.addColorStop(0, '#333');
                grad.addColorStop(0.5, 'white');
                grad.addColorStop(1, '#333');
                ctx.strokeStyle = grad;
                ctx.lineWidth = radius*0.1;
                ctx.stroke();
                ctx.beginPath();
                ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                ctx.fillStyle = '#333';
                ctx.fill();
              }

              function drawNumbers(ctx, radius) {
                var ang;
                var num;
                ctx.font = radius*0.15 + "px arial";
                ctx.textBaseline="middle";
                ctx.textAlign="center";
                for(num = 1; num < 13; num++){
                  ang = num * Math.PI / 6;
                  ctx.rotate(ang);
                  ctx.translate(0, -radius*0.85);
                  ctx.rotate(-ang);
                  ctx.fillText(num.toString(), 0, 0);
                  ctx.rotate(ang);
                  ctx.translate(0, radius*0.85);
                  ctx.rotate(-ang);
                }
              }

              function drawTime(ctx, radius){
                  var now = new Date();
                  var hour = now.getHours();
                  var minute = now.getMinutes();
                  var second = now.getSeconds();
                  //hour
                  hour=hour%12;
                  hour=(hour*Math.PI/6)+
                  (minute*Math.PI/(6*60))+
                  (second*Math.PI/(360*60));
                  drawHand(ctx, hour, radius*0.5, radius*0.07);
                  //minute
                  minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                  drawHand(ctx, minute, radius*0.8, radius*0.07);
                  // second
                  second=(second*Math.PI/30);
                  drawHand(ctx, second, radius*0.9, radius*0.02);
              }

              function drawHand(ctx, pos, length, width) {
                  ctx.beginPath();
                  ctx.lineWidth = width;
                  ctx.lineCap = "round";
                  ctx.moveTo(0,0);
                  ctx.rotate(pos);
                  ctx.lineTo(0, -length);
                  ctx.stroke();
                  ctx.rotate(-pos);
              }
            </script>
            <script>
              var canvas_2 = document.getElementById("canvas_2");
              var ctx_2 = canvas_2.getContext("2d");
              var radius_2 = canvas_2.height / 2;
              ctx_2.translate(radius_2, radius_2);
              radius_2 = radius_2 * 0.90
              setInterval(drawClock_2, 1000);

              function drawClock_2() {
                drawFace_2(ctx_2, radius_2);
                drawNumbers_2(ctx_2, radius_2);
                drawTime_2(ctx_2, radius_2);
              }

              function drawFace_2(ctx_2, radius_2) {
                var grad_2;
                ctx_2.beginPath();
                ctx_2.arc(0, 0, radius_2, 0, 2*Math.PI);
                ctx_2.fillStyle = 'white';
                ctx_2.fill();
                grad_2 = ctx_2.createRadialGradient(0,0,radius_2*0.95, 0,0,radius_2*1.05);
                grad_2.addColorStop(0, '#333');
                grad_2.addColorStop(0.5, 'white');
                grad_2.addColorStop(1, '#333');
                ctx_2.strokeStyle = grad_2;
                ctx_2.lineWidth = radius_2*0.1;
                ctx_2.stroke();
                ctx_2.beginPath();
                ctx_2.arc(0, 0, radius_2*0.1, 0, 2*Math.PI);
                ctx_2.fillStyle = '#333';
                ctx_2.fill();
              }

              function drawNumbers_2(ctx_2, radius_2) {
                var ang_2;
                var num_2;
                ctx_2.font = radius_2*0.15 + "px arial";
                ctx_2.textBaseline="middle";
                ctx_2.textAlign="center";
                for(num_2 = 1; num_2 < 13; num_2++){
                  ang_2 = num_2 * Math.PI / 6;
                  ctx_2.rotate(ang_2);
                  ctx_2.translate(0, -radius_2*0.85);
                  ctx_2.rotate(-ang_2);
                  ctx_2.fillText(num_2.toString(), 0, 0);
                  ctx_2.rotate(ang_2);
                  ctx_2.translate(0, radius_2*0.85);
                  ctx_2.rotate(-ang_2);
                }
              }

              function drawTime_2(ctx_2, radius_2){
                  var now_2 = new Date();
                  var hour_2 = now_2.getHours();
                  var minute_2 = now_2.getMinutes();
                  var second_2 = now_2.getSeconds();
                  //hour
                  hour_2=hour_2%12;
                  hour_2=(hour_2*Math.PI/6)+
                  (minute_2*Math.PI/(6*60))+
                  (second_2*Math.PI/(360*60));
                  drawHand_2(ctx_2, hour_2, radius_2*0.5, radius_2*0.07);
                  //minute
                  minute_2=(minute_2*Math.PI/30)+(second_2*Math.PI/(30*60));
                  drawHand_2(ctx_2, minute_2, radius_2*0.8, radius_2*0.07);
                  // second
                  second_2=(second_2*Math.PI/30);
                  drawHand_2(ctx_2, second_2, radius_2*0.9, radius_2*0.02);
              }

              function drawHand_2(ctx_2, pos_2, length_2, width_2) {
                  ctx_2.beginPath();
                  ctx_2.lineWidth = width_2;
                  ctx_2.lineCap = "round";
                  ctx_2.moveTo(0,0);
                  ctx_2.rotate(pos_2);
                  ctx_2.lineTo(0, -length_2);
                  ctx_2.stroke();
                  ctx_2.rotate(-pos_2);
              }
            </script>
          </div>
    </div>
  </div>
</div>
@endsection