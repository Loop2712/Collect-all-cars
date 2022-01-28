@extends('layouts.partners.theme_partner_new')

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
  #img_bg_3{
    background-image: url("{{ asset('/img/more/0112.jpg') }}");
    background-size: cover;
    height: 500px;
  }
</style>
<br>

<div class="row " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent ">
                    <div class="d-flex align-items-center col-12" style="margin-top:10px;">
                          <div class="col-6">
                            <h5 class="font-weight-bold mb-0">เลือกช่วงเวลา</h5>
                          </div>
                          <div class="col-6 ">
                              <a style="float: right;">ขอความช่วยเหลือทั้งหมด : <span id="sos_all">{{ $sos_all }}</span> ครั้ง</a>
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
                                  <option value="2020">2563</option>
                                  <option value="2021">2564</option>
                                  <option value="2022">2565</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label  class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_month" onchange="select_month();">
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
                            <div class="col-md-1 col-6">
                                <br>
                                <form style="float: right;" method="GET" action="{{ url('/sos_detail_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                    <div class="input-group ">
                                      <input type="hidden" class="form-control" id="input_year" name="year"value="{{ request('year') }}">
                                      <input type="hidden" class="form-control" id="input_month" name="month" value="{{ request('month') }}">
                                    </div>
                                    <button class="btn btn-primary" type="submit">
                                        ค้นหา
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-2 col-6 d-none d-lg-block ">
                                <br>
                                <a href="{{ url('/sos_detail_partner') }}" >
                                    <button class="btn btn-danger">
                                        ล้างการค้นหา
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-2 col-6 d-block d-md-none " style="margin-top:8px;">
                                <br>
                                <a href="{{ url('/sos_detail_partner') }}" >
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
      <div class="card radius-10 " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center" style="margin-top:10px;">
                <div class="col-6">
                    <h5 class="font-weight-bold mb-0">ขอความช่วยเหลือ</h5>
                </div>
                <div class="col-6">
                    <div style="float: right;">ขอความช่วยเหลือในเดือนที่ค้นหา : <b>{{ $total }}</b> ครั้ง</div>
                </div>
            </div>
            <div class="col-12 col-md-11 text-center d-block d-md-none" style="margin-top:20px;">
              <ul class="nav nav-pills nav-pills-danger mt-4 d-flex justify-content-center"   role="tablist" >
                  <li class="nav-item" >
                  <a id="chartam" class="active btn btn-outline-danger" href="#" role="tab" data-toggle="tab" style=" width: 115px;" onclick="
                          document.querySelector('#chart2222').classList.remove('d-none'),
                          document.querySelector('#chart1111').classList.add('d-none');">
                          <b style="font-size: 15px;">AM</b>
                      </a>
                  </li>
              &nbsp;
                  <li class="nav-item" >
                  <a id="chartpm" class="btn btn-outline-danger" href="#" role="tab" data-toggle="tab" onclick="
                              document.querySelector('#chart2222').classList.add('d-none'),
                              document.querySelector('#chart1111').classList.remove('d-none');">
                      <b style="font-size: 15px;">PM</b>
                      </a>
                  </li>
              
              </ul>
            </div>
        </div>
        <div class="d-none d-lg-block " id="chartpc"></div>
        <div class="d-block d-md-none"id="chart1111"><div  id="chartmobileam"></div></div>
        <div class="d-block d-md-none" id="chart2222"><div id="chartmobilepm"></div></div>
        
        
        <!-- <div class="card-body">
          <div class="row main-shadow main-radius" id="img_bg_3">
              <div class="col-md-6" style="z-index: 10; ">
                <center>
                  <canvas id="canvas_1" width="185px" height="185" style="margin-top:140px"></canvas>
                  
                </center>
              </div>
              <div class="col-md-6" style="z-index: 10;">
                <center>
                  <canvas id="canvas_2"  width="185px" height="185" style="margin-top:140px"></canvas>
                </center>
              </div>
              <div id="" class="col-md-6" style="margin-top:-360px;">
                <img style="position:absolute;right: 50px; margin-top:-20px;"  width="80px" src="{{ asset('/img/more/sun.png') }}" >
                <center>
                  <img  width="400px" src="{{ asset('/img/more/clock-am.png') }}" >
                  <h2 class="text-danger" style="margin-top: -330px;margin-left: 60px;">
                    <b> {{ $sos_time_00 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -45px;margin-left: -60px;">
                    <b> {{ $sos_time_11 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -15px;margin-left: -160px;">
                    <b> {{ $sos_time_10 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -50px;margin-left: 155px;">
                    <b> {{ $sos_time_01 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: 12px;margin-left: 220px;">
                    <b> {{ $sos_time_02 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -42px;margin-left: -220px;">
                    <b> {{ $sos_time_09 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top:20px;margin-left: -210px;">
                    <b> {{ $sos_time_08 }}</b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -55px;margin-left: 225px;">
                    <b> {{ $sos_time_03 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: 15px;margin-left: 165px;">
                    <b> {{ $sos_time_04 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -40px;margin-left: -155px;">
                    <b> {{ $sos_time_07 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -15px;margin-left: -50px;">
                    <b> {{ $sos_time_06 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -50px;margin-left: 70px;">
                    <b> {{ $sos_time_05 }} </b>
                  </h2>
                </center>
              </div>
              <div id="" class="col-md-6" style="margin-top:-360px;">
                <img style="position:absolute;left: 20px; margin-top:-20px;" width="70px" src="{{ asset('/img/more/moon.png') }}" >
                <center>
                  <img width="400px" src="{{ asset('/img/more/clock-pm.png') }} ">
                  <h2 class="text-danger" style="margin-top: -330px;margin-left: 60px;">
                    <b> {{ $sos_time_12 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -45px;margin-left: -60px;">
                    <b> {{ $sos_time_23 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -15px;margin-left: -160px;">
                    <b> {{ $sos_time_22 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -50px;margin-left: 155px;">
                    <b> {{ $sos_time_13 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: 12px;margin-left: 220px;">
                    <b> {{ $sos_time_14 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -42px;margin-left: -220px;">
                    <b> {{ $sos_time_21 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top:20px;margin-left: -210px;">
                    <b> {{ $sos_time_20 }}</b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -55px;margin-left: 225px;">
                    <b> {{ $sos_time_15 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: 15px;margin-left: 165px;">
                    <b> {{ $sos_time_16 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -40px;margin-left: -155px;">
                    <b> {{ $sos_time_19 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -15px;margin-left: -50px;">
                    <b> {{ $sos_time_18 }} </b>
                  </h2>
                  <h2 class="text-danger" style="margin-top: -50px;margin-left: 70px;">
                    <b> {{ $sos_time_17 }} </b>
                  </h2>
                  <h2 style="margin-bottom:70px"></h2>
                </center>
              </div>
            </div>
          </div>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- <div class="col-12 text-center d-block d-md-none">
  <h1>ระบบนี้ใช้ได้เฉพาะ pc เท่านั้น</h1>
</div> -->
<script>
          var options = {
          series: [{
          name: 'AM',
          data: [  <?php echo $sos_time_00 ?>, <?php echo $sos_time_01 ?> , <?php echo $sos_time_02 ?>, <?php echo $sos_time_03 ?>, <?php echo $sos_time_04 ?>, <?php echo $sos_time_05 ?>, <?php echo $sos_time_06 ?>, <?php echo $sos_time_07 ?>, <?php echo $sos_time_08 ?>, <?php echo $sos_time_09 ?>, <?php echo $sos_time_10 ?>, <?php echo $sos_time_11 ?>,null , null , null , null , null , null , null , null , null , null , null , null ,]
          },
          {
          name: 'PM',
          data: [ null , null , null , null , null , null , null , null , null , null , null , null , <?php echo $sos_time_12 ?>,  <?php echo $sos_time_13 ?>, <?php echo $sos_time_14 ?>, <?php echo $sos_time_15 ?>, <?php echo $sos_time_16 ?>, <?php echo $sos_time_17 ?>, <?php echo $sos_time_18 ?>, <?php echo $sos_time_19 ?>, <?php echo $sos_time_20 ?>, <?php echo $sos_time_21 ?>, <?php echo $sos_time_22 ?>, <?php echo $sos_time_23 ?>, ]
          },
        ],
          chart: {
          height: 400,
          type: 'area'
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'time',
          categories: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00" ,"13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00",]
        },
        tooltip: {
          x: {
            format: 'HH:mm'
          },
          
        },
        };

        var chart = new ApexCharts(document.querySelector("#chartpc"), options);
        chart.render();
</script>
<script>
          var options = {
          series: [{
          name: 'AM',
          data: [  <?php echo $sos_time_00 ?>, <?php echo $sos_time_01 ?> , <?php echo $sos_time_02 ?>, <?php echo $sos_time_03 ?>, <?php echo $sos_time_04 ?>, <?php echo $sos_time_05 ?>, <?php echo $sos_time_06 ?>, <?php echo $sos_time_07 ?>, <?php echo $sos_time_08 ?>, <?php echo $sos_time_09 ?>, <?php echo $sos_time_10 ?>, <?php echo $sos_time_11 ?>]
          },],
          chart: {
          height: 400,
          type: 'area'
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'time',
          categories: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "010:00", "011:00" ]
        },
        tooltip: {
          x: {
            format: 'HH:mm'
          },
          
        },
        };

        var chart = new ApexCharts(document.querySelector("#chartmobilepm"), options);
        chart.render();
        var options = {
          series: [{
          name: 'PM',
          data: [<?php echo $sos_time_12 ?>,  <?php echo $sos_time_13 ?>, <?php echo $sos_time_14 ?>, <?php echo $sos_time_15 ?>, <?php echo $sos_time_16 ?>, <?php echo $sos_time_17 ?>, <?php echo $sos_time_18 ?>, <?php echo $sos_time_19 ?>, <?php echo $sos_time_20 ?>, <?php echo $sos_time_21 ?>, <?php echo $sos_time_22 ?>, <?php echo $sos_time_23 ?>, ]
          },
        ],
          chart: {
          height: 400,
          type: 'area'
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'time',
          categories: ["12:00" ,"13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00",]
        },
        tooltip: {
          x: {
            format: 'HH:mm'
          },
          
        },
        };

        var chart = new ApexCharts(document.querySelector("#chartmobileam"), options);
        chart.render();
</script>
<script>
          
</script>
<script>
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
  document.addEventListener('DOMContentLoaded', (event) => {
    var input_year = document.getElementById('input_year').value;
    var input_month = document.getElementById('input_month').value;

    var select_year = document.getElementById('select_year');
    var select_month = document.getElementById('select_month');

      select_year.value = input_year ;
      select_month.value = input_month ;

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
    ctx.font = radius*0.175 + "px arial";
    ctx.textBaseline="middle";
    ctx.textAlign="center";
    ctx.fillText('AM', 0, 20);
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
      // console.log(now);
      var hour = now.getHours();
      var minute = now.getMinutes();
      var second = now.getSeconds();
      if (hour < 12 ) {
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
      }else {
        //hour
        drawHand_2(ctx, 12.56, radius*0.5, radius*0.07);
        //minute
        minute=(12.56);
        drawHand_2(ctx, minute, radius*0.8, radius*0.07);
      }
      
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
    ctx_2.font = radius_2*0.175 + "px arial";
    ctx_2.textBaseline="middle";
    ctx_2.textAlign="center";
    ctx_2.fillText('PM', 0, 20);
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
      if (hour_2 >= 12 ) {
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
      }else {
        //hour
        drawHand_2(ctx_2, 12.56, radius_2*0.5, radius_2*0.07);
        //minute
        minute_2=(12.56);
        drawHand_2(ctx_2, minute_2, radius_2*0.8, radius_2*0.07);
      }
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
@endsection