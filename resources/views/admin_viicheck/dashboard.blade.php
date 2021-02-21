@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <br>
          <h3 class="text-light">ข้อมูล 28 วันที่ผ่านมา / Data of 28 days ago</h3>
          <br>
          <!-- Card stats -->
          <div class="row">
            @include('admin_viicheck/highlights')
          </div>
          <hr>
        </div>
        <br>
        <h3 class="text-light">ข้อมูลทั้งหมด / All Data </h3>
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
                  <h5 class="h3 mb-0">รถที่ลงประกาศขาย VMarket</h5>
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
                  <h6 class=" text-muted ls-1 mb-1">VMove</h6>
                  <h5 class="h3 mb-0">รถลงทะเบียน VMove</h5>
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
                  <h6 class=" text-muted ls-1 mb-1">VMarket</h6>
                  <h5 class="h3 mb-0">รถที่ลงประกาศขาย VMarket</h5>
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
        <!-- type_login -->
      </div>
      <div class="chart">
        @include('admin_viicheck/type_login')
      </div>
    </div>
@endsection
