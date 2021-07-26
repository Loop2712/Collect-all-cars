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
                <select class="form-control" id="sos_year" onchange="getChart();">
                  <option value="ทั้งหมด">ทั้งหมด</option>
                  <option value="2021">2564</option>
                </select>
              </div>
              <div class="col-md-2">
                <label  class="control-label">{{ 'เลือกเดือน' }}</label>
                <select class="form-control" id="select_month" onchange="getChart();">
                  <option value="ทั้งหมด">ทั้งหมด</option>
                  <option value="มกราคม">มกราคม</option>
                </select>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-3">
                <br><br>
                <div style="float: right;">ทั้งหมด : <span id="sos_all"></span> ครั้ง</div>
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
            </script>
          </div>
    </div>
  </div>
</div>
@endsection