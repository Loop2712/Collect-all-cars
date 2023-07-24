<h4 class="text-dark">ข้อมูลหน่วยปฏิบัติการ</h4>
<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!--คะแนนเฉลี่ยของหน่วย 5 อันดับ -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold">คะแนนเฉลี่ยของหน่วย {{count($avg_score_unit_data)}} อันดับ</h5>
                    <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                    </p>
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody>
                            @foreach ($avg_score_unit_data as $top5_score_unit)
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <div><i class='bx bxs-checkbox me-2 font-24 text-primary'></i>
                                            </div>
                                            <div>{{$top5_score_unit->operating_unit->name ? $top5_score_unit->operating_unit->name : "--"}}</div>
                                        </div>
                                    </td>
                                    <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{$top5_score_unit->avg_score_total}}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <!--ระดับหน่วยปฏิบัติการทั้งหมด-->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="d-flex align-items-center m-3">
                <div>
                    <h5 class="mb-0 font-weight-bold">ระดับหน่วยปฏิบัติการทั้งหมด</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div id="chartVehicleTop5"></div>
                </div>
            </div>
        </div>
    </div>
    <!--จำนวนยานพาหนะทั้งหมด  -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="card-body ">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 font-weight-bold">จำนวนยานพาหนะทั้งหมด </h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
            </div>
            <div class="mb-3 p-3">
                @foreach ($vechicle_area as $vehicle_data)
                    <div class="row mb-4">
                        <div class="col-2 mt-2 text-center">
                            <i class="fa-solid fa-motorcycle" style="font-size: 2rem"></i>
                        </div>
                        <div class="col">
                            <p class="mb-2" style="font-weight: bold;">ประเภทยานพาหนะ<strong class="float-end">จำนวน</strong></p>
                            <div class="progress radius-10" style="height:6px;">
                                <div class="progress-bar bg-gradient-lush" role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<!--============= 2 card -- 5-7  ================-->

<div class="row mb-4">
    <!--======= คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ col-5 ============-->
    <div class="col-12 col-lg-5">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด {{count($avg_score_by_case)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>ชื่อหน่วย</th>
                                <th>คะแนนเฉลี่ยต่อเคส</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avg_score_by_case as $avg_score_by_case)
                                <tr>
                                    <td>
                                        @php
                                            $data_user_avg_score_by_case = App\User::where('id',$avg_score_by_case->officers_command_by->user_id)->first();
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($data_user_avg_score_by_case->avatar) && empty($data_user_avg_score_by_case->photo))
                                                    <img src="{{ $data_user_avg_score_by_case->avatar }}" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                                @if(!empty($data_user_avg_score_by_case->photo))
                                                    <img src="{{ url('storage') }}/{{ $data_user_avg_score_by_case->photo }}" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                                @if(empty($data_user_avg_score_by_case->avatar) && empty($data_user_avg_score_by_case->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mt-2 font-14">{{$avg_score_by_case->officers_user->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$avg_score_by_case->operating_unit->name}}</td>
                                    <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> {{$avg_score_by_case->avg_score_by_case}}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!--======= ลำดับการรับแจ้งเตือน 5 อันดับ col-7 ============-->
    <div class="col-12 col-lg-7">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >รายชื่อหน่วยปฏิบัติการ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>ชื่อหน่วย</th>
                                <th>จำนวนสมาชิก</th>
                                <th>จำนวนออกปฏิบัติการ</th>
                                <th>ลงทะเบียนมาแล้วกี่วัน</th>
                                <th>คะแนนเฉลี่ย</th>
                                <th>ลำดับ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($operating_unit_data as $operating_unit_data)
                            <tr>
                                @php
                                    $count_amount_operator = App\Models\Sos_help_center::where('operating_unit_id',$operating_unit_data->id)->count();

                                @endphp
                                <td>{{$operating_unit_data->name}}</td>
                                <td>{{$count_amount_operator}}</td>
                                <td>จำนวนออกปฏิบัติการ</td>
                                @if (!empty($operating_unit_data->created_at))
                                    <td> {{ \Carbon\Carbon::parse($operating_unit_data->created_at)->locale('th')->diffForHumans() }}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>ลำดับ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
        width: 450,
        type: 'donut',
    },
    plotOptions: {
        pie: {
        startAngle: -90,
        endAngle: 270
        }
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: 'gradient',
    },
    legend: {
        position: 'bottom',
        formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
        }
    },
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

    var chart = new ApexCharts(document.querySelector("#chartVehicleTop5"), options);
    chart.render();

</script>
