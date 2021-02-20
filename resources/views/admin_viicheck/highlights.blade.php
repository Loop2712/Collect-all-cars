<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">รถลงขาย 28 วันที่ผ่านมา</h5>
          <span class="h2 font-weight-bold mb-0">{{ number_format($new_car) }}</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
            <i class="icofont-car-alt-4"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-sm">
        <span class="text-nowrap mr-1">คิดเป็น</span>
        <span class="text-success mr-2"><b> {{ number_format(($new_car/$count_car)*100,1) }} %</b></span>
        <span class="text-nowrap">จากรถทั้งหมด <b class="text-danger">{{ number_format($count_car) }}</b> คัน</span>
      </p>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <p class="card-title text-muted mb-0">ลงทะเบียน Vmove 28 วันที่ผ่านมา</p>
          <span class="h2 font-weight-bold mb-0">{{ number_format($new_vmove) }}</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
            <i class="fas fa-arrows-alt"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-sm">
        <span class="text-nowrap mr-1">คิดเป็น</span>
        <span class="text-success mr-2"><b> {{ number_format(($new_vmove/$count_vmove)*100,1) }} %</b></span>
        <span class="text-nowrap">จากรถทั้งหมด <b class="text-danger">{{ number_format($count_vmove) }}</b> คัน</span>
      </p>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
          <span class="h2 font-weight-bold mb-0">924</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
            <i class="ni ni-money-coins"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
      </p>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
          <span class="h2 font-weight-bold mb-0">49,65%</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
            <i class="ni ni-chart-bar-32"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
      </p>
    </div>
  </div>
</div>