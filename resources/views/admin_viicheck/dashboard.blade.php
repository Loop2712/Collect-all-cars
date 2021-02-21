@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <br><br>
          <!-- Card stats -->
          <div class="row">
            @include('admin_viicheck/highlights')
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-muted ls-1 mb-1">VMarket</h6>
                  <h5 class="h3 mb-0">รถที่ลงประกาศขาย</h5>
                  <hr>
                  <span>จัดอันดับตามจังหวัด 6 อันดับ</span>
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
        <div class="col-xl-6">
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
      </div>
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/index.html
                    </th>
                    <td>
                      3,985
                    </td>
                    <td>
                      319
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/charts.html
                    </th>
                    <td>
                      3,513
                    </td>
                    <td>
                      294
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/tables.html
                    </th>
                    <td>
                      2,050
                    </td>
                    <td>
                      147
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Type User Login</h3>
                </div>
                <div class="col text-right">
            		<p class="btn btn-sm">total : {{ $all_user }}</p>
              		<!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">TYPE</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <i class="fab fa-line text-success"></i> Line 
                    </th>
                    <td>
                      {{ $count_line }}
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">{{ number_format(($count_line/$all_user)*100,1) }} %</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{ number_format(($count_line/$all_user)*100,1) }}%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <i class="fab fa-facebook-square text-primary"></i> Facebook 
                    </th>
                    <td>
                      {{ $count_facebook }}
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">{{ number_format(($count_facebook/$all_user)*100,1) }} %</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{ number_format(($count_facebook/$all_user)*100,1) }}%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <i class="fab fa-google text-danger"></i> Google 
                    </th>
                    <td>
                      {{ $count_google }}
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">{{ number_format(($count_google/$all_user)*100,1) }} %</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{ number_format(($count_google/$all_user)*100,1) }}%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <i class="fas fa-globe" style="color: #5F9EA0"></i> Web Viicheck 
                    </th>
                    <td>
                      {{ $count_web }}
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">{{ number_format(($count_web/$all_user)*100,1) }} %</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-dark" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{ number_format(($count_web/$all_user)*100,1) }}%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
