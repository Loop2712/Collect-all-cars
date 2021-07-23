@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <br>
          <h3 class="text-light">ข้อมูล 28 วันที่ผ่านมา</h3>
          <br>
          <!-- Card stats -->
          <div class="row">
            @include('admin_viicheck/highlights')
          </div>
          <hr>
        </div>
        <br>
        <h3 class="text-light">ข้อมูลทั้งหมด</h3>
        <br>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-muted ls-1 mb-1">VMarket</h6>
                  <h5 class="h3 mb-0">รถยนต์ลงประกาศขาย</h5>
                  <hr>
                  <span>จัดอันดับตามสถานที่ 5 อันดับ</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                @include('admin_viicheck/vmarketChart')
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-muted ls-1 mb-1">VMarket</h6>
                  <h5 class="h3 mb-0">รถจักรยานยนต์ลงประกาศขาย</h5>
                  <hr>
                  <span>จัดอันดับตามสถานที่ 5 อันดับ</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                @include('admin_viicheck/vmarket_motorcycleChart')
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-muted ls-1 mb-1">VMove</h6>
                  <h5 class="h3 mb-0">รถลงทะเบียน</h5>
                  <hr>
                  <span>จัดอันดับตามจังหวัด 5 อันดับ</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                @include('admin_viicheck/register_carsChart')
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <div class="row">
                      <div class="col-md-9">
                          <h6 class=" text-muted ls-1 mb-1">Vmove</h6>
                      </div>
                      <div class="col-md-3">
                          <a style="float: right;" href="{{ url('/guest') }}" class="btn btn-sm btn-primary"> <i class="far fa-eye"></i> See more</a>
                      </div>
                  </div>
                  <h5 class="h3 mb-0">รายงานแจ้งเตือนเจ้าของรถ</h5>
                  <hr>
                  @include('admin_viicheck/guest')
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-muted ls-1 mb-1">VNews</h6>
                  <h5 class="h3 mb-0">ลงประกาศข่าว</h5>
                  <hr>
                  <span>จัดอันดับตามสถานที่ 5 อันดับ</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                @include('admin_viicheck/vnewsChart')
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <div class="row">
                      <div class="col-md-9">
                          <h6 class=" text-muted ls-1 mb-1">VNews</h6>
                      </div>
                      <div class="col-md-3">
                          <a style="float: right;" href="{{ url('/report_news') }}" class="btn btn-sm btn-primary"> <i class="far fa-eye"></i> See more</a>
                      </div>
                  </div>
                  <h5 class="h3 mb-0">รายงานความไม่เหมาะสม</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
                @include('admin_viicheck/report_news')
            </div>
          </div>
        </div>
        <!-- type_login -->
      </div>
      <div class="chart">
        @include('admin_viicheck/type_login')
      </div>
    </div>
@endsection
