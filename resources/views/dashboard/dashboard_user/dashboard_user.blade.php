<style>
    .progress_bg {
        background-color: rgb(255 255 255 / 12%) !important;
    }
    .progress_bar_USER {
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        color: #000000b0;
        text-align: center;
        white-space: nowrap;
        background-color: #ffffff;
        transition: width .6s ease;
        font-weight: bold;
    }
    .logo-image {
        width: 20px; /* ปรับขนาดตามที่คุณต้องการ */
        height: 20px; /* ปรับขนาดตามที่คุณต้องการ */
    }
</style>
<!-- ======================================================================
                                ข้อมูลผู้ใช้
=========================================================================== -->

<!-- ============================= 4 card ================================= -->
@php
    // % ของผู้ใช้เดือนนี้
    $percent_user_new_m = ($all_user_m / $all_user) * 100;
    $percent_user_new_m = number_format($percent_user_new_m,0);

    // % ของผู้ใช้ในองค์กร
    $percent_user_officer = (count($data_officer) / $all_user) * 100;
    $percent_user_officer = number_format($percent_user_officer,0);

    // % ของผู้ใช้จาก API
    $percent_user_from = (count($data_user_from) / $all_user) * 100;
    $percent_user_from = number_format($percent_user_from,0);

@endphp

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white">ผู้ใช้งานทั้งหมด</h5>
                        <h3 class="mb-0 text-white">{{$all_user}}</h3>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-regular fa-user font-30"></i>
                    </div>
                </div>
                <div class="progress progress_bg mt-4">
                    <div class="progress_bar_USER" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white">ผู้ใช้งานใหม่เดือนนี้</h5>
                        <h3 class="mb-0 text-white">{{$all_user_m}}</h3>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-regular fa-user-plus font-30"></i>
                    </div>
                </div>
                <div class="progress progress_bg mt-4">
                    <div class="progress_bar_USER" role="progressbar" style="width: {{$percent_user_new_m}}%;" aria-valuenow="{{$percent_user_new_m}}" aria-valuemin="0" aria-valuemax="100">{{$percent_user_new_m}}%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white">เจ้าหน้าที่ภายในองค์กร</h5>
                        <h3 class="mb-0 text-white">{{count($data_officer)}}</h3>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-duotone fa-users font-30"></i>
                    </div>
                </div>
                <div class="progress progress_bg mt-4">
                    <div class="progress_bar_USER" role="progressbar" style="width: {{$percent_user_officer}}%;" aria-valuenow="{{$percent_user_officer}}" aria-valuemin="0" aria-valuemax="100">{{$percent_user_officer}}%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white">ผู้ใช้งานจากช่องทางอื่น</h5>
                        <h3 class="mb-0 text-white">{{count($data_user_from)}}</h3>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-solid fa-user-tie font-30"></i>
                    </div>
                </div>
                <div class="progress progress_bg mt-4">
                    <div class="progress_bar_USER" role="progressbar" style="width: {{$percent_user_from}}%;" aria-valuenow="{{$percent_user_from}}" aria-valuemin="0" aria-valuemax="100">{{$percent_user_from}}%</div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<!-- ============================= User from other organization ================================= -->

<div class="row mb-3 ">
    <div class="col-12 col-xl-7 ">
        <div class="card radius-10 mb-0 h-100">
            <div class="card-body ">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">เจ้าหน้าที่ภายในองค์กร</h5>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ url('/dashboard_user_index') }}" class="btn btn-primary btn-sm radius-30">ดูข้อมูลผู้ใช้ทั้งหมด</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0 ">
                        <thead class="table-light">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                <th>วันเกิด</th>
                                <th>สถานะ</th>
                                <th>เป็นสมาชิกมาแล้ว</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_officer as $user)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($user->avatar) && empty($user->photo))
                                                    <img src="{{ $user->avatar }}">
                                                @endif
                                                @if(!empty($user->photo))
                                                    <img src="{{ url('storage') }}/{{ $user->photo }}">
                                                @endif
                                                @if(empty($user->avatar) && empty($user->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{$user->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$user->sex}}</td>
                                    <td>{{$user->brith}}</td>
                                    <td class=""><span class="badge bg-light-success text-success w-40">{{$user->status}}</span></td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-12 col-xl-5 ">
        <div class="card radius-10 mb-0 h-100">
            <div class="card-body ">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">ผู้ใช้งานจากช่องทางอื่น</h5>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ url('/dashboard_user_index') }}" class="btn btn-primary btn-sm radius-30">ดูข้อมูลผู้ใช้ทั้งหมด</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0 ">
                        <thead class="table-light">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                <th>เป็นสมาชิกมาแล้ว</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_user_from as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($user->avatar) && empty($user->photo))
                                                    <img src="{{ $user->avatar }}">
                                                @endif
                                                @if(!empty($user->photo))
                                                    <img src="{{ url('storage') }}/{{ $user->photo }}">
                                                @endif
                                                @if(empty($user->avatar) && empty($user->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{$user->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$user->sex}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div><!--end row-->

<!-- ============================= User from Login with Bar Chart ================================= -->

<div class="row mb-3">
    <div class="col-12 col-lg-7">
        <div class="card h-100">
            <div class="d-flex align-items-center m-3">
                <div>
                    <h5 class="mb-1">ช่องทางเข้าสู่ระบบ</h5>
                </div>
            </div>
            <div class="card-body">
                <div id="chartUser_from_Login"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5">
        <div class="card h-100">
            <div class="d-flex align-items-center m-3">
                <div>
                    <h5 class="mb-1">จังหวัดของผู้ใช้สูงสุด 5 อันดับ</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div id="chartUser_Location"></div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Bar Chart แสดงช่องทางการ login -->
<script>

    let user_type_login_arr = [];
    let name_user_type_login_arr = [];
    let color_type_login_arr = [];
    let logo_type_login_arr = [
        'https://www.viicheck.com/Medilab/img/icon.png',
        'https://www.viicheck.com/Medilab/img/icon.png',
        'https://www.viicheck.com/Medilab/img/icon.png',
        'https://www.viicheck.com/Medilab/img/icon.png',
    ];
    @foreach ($count_type_login as $item)
        user_type_login_arr.push('{{ $item->user_type_count }}');
    @endforeach

    let type_login;

    @foreach ($count_type_login as $item)
        @if (empty($item->type))
            type_login = "web";
        @else
            type_login = '{{ $item->type }}';
        @endif

        name_user_type_login_arr.push(type_login);
    @endforeach

    let color_loop;
    let logo_loop;
    @foreach ($count_type_login as $item)
        @if (empty($item->type))
            color_loop = '#546E7A';
            logo_loop = "https://www.viicheck.com/Medilab/img/icon.png"
        @elseif($item->type == 'line')
            color_loop = '#13d8aa';
            logo_loop = "https://www.viicheck.com/Medilab/img/icon.png"
        @elseif($item->type == 'google')
            color_loop = '#d4526e';
            logo_loop = "https://www.viicheck.com/Medilab/img/icon.png"
        @elseif($item->type == 'facebook')
            color_loop = '#33b2df';
            logo_loop = "https://www.viicheck.com/Medilab/img/icon.png"
        @endif

        // logo_type_login_arr.push(logo_loop);
        color_type_login_arr.push(color_loop);

    @endforeach


    var options = {
        series: [{
            data: user_type_login_arr,
        }],
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: color_type_login_arr,
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
            categories: name_user_type_login_arr,
        },
        yaxis: {
            labels: {
                categories: name_user_type_login_arr,
                show: false
            }
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

var chart = new ApexCharts(document.querySelector("#chartUser_from_Login"), options);
chart.render();


</script>

<!-- Pie Chart แสดงจังหวัด -->
<script>
    let user_location_arr = [];
    let type_location_arr = [];

    @foreach ($count_user_location as $item)
        user_location_arr.push(Number('{{ $item->user_location_count }}'));
    @endforeach
    console.log(user_location_arr);
    console.log(typeof(user_location_arr));
    let type_location;
    @foreach ($count_user_location as $item)
        @if (empty($item->location_P))
            type_location = "ไม่ได้ระบุ";
        @else
            type_location = '{{ $item->location_P }}';
        @endif
        type_location_arr.push(type_location);
    @endforeach

    var options = {
        series: user_location_arr,
        chart: {
            width: 500,
            type: 'pie',
        },
        labels: type_location_arr,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 400
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

    var chart = new ApexCharts(document.querySelector("#chartUser_Location"), options);
    chart.render();
</script>





