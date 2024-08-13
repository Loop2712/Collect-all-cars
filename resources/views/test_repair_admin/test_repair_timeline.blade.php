@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="row " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent ">
                    <div class="d-flex align-items-center col-12" style="margin-top:10px;">
                        <div class="col-6">
                            <h5 class="font-weight-bold mb-0">เลือกช่วงเวลา</h5>
                        </div>
                        <div class="col-6 ">
                            <a style="float: right;">การแจ้งทั้งหมด : <span id=""></span> ครั้ง</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="row justify-content-center" style="margin-top:-30px">
                            <div class="col-md-2">
                                <label class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_year" onchange="select_year();">
                                    <option value="">พื้นที่ : ทั้งหมด</option>
                                    <option value="area1">พื้นที่ 1</option>
                                    <option value="area2">พื้นที่ 2</option>
                                    <option value="area3">พื้นที่ 3</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{{ '' }}</label>
                                <select class="form-control" id="select_year" onchange="select_year();">
                                    <option value="">เลือกปี</option>
                                    <option value="2020">2565</option>
                                    <option value="2021">2566</option>
                                    <option value="2022">2567</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{{ '' }}</label>
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
                                <form style="float: right;" method="GET" action="{{ url('/sos_detail_js100') }}"
                                    accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                    <div class="input-group ">
                                        <input type="hidden" class="form-control" id="input_year" name="year"value="">
                                        <input type="hidden" class="form-control" id="input_month" name="month"
                                            value="">
                                    </div>
                                    <button class="btn btn-primary" type="submit">
                                        ค้นหา
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-2 col-6 d-none d-lg-block ">
                                <br>
                                <a href="{{ url('/sos_detail_js100') }}">
                                    <button class="btn btn-danger">
                                        ล้างการค้นหา
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-2 col-6 d-block d-md-none " style="margin-top:8px;">
                                <br>
                                <a href="{{ url('/sos_detail_js100') }}">
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
                    <h5 class="font-weight-bold mb-0"></h5>
                </div>
                <div class="col-6">
                    <div style="float: right;">การแจ้งในเดือนที่ค้นหา : <b></b> ครั้ง</div>
                </div>
            </div>
            <div class="col-12 col-md-11 text-center d-block d-md-none" style="margin-top:20px;">
                <ul class="nav nav-pills nav-pills-danger mt-4 d-flex justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a id="chartam" class="active btn btn-outline-danger" href="#" role="tab"
                            data-toggle="tab" style=" width: 115px;"
                            onclick="
                      document.querySelector('#chart2222').classList.remove('d-none'),
                      document.querySelector('#chart1111').classList.add('d-none');">
                            <b style="font-size: 15px;">AM</b>
                        </a>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <a id="chartpm" class="btn btn-outline-danger" href="#" role="tab"
                            data-toggle="tab"
                            onclick="
                          document.querySelector('#chart2222').classList.add('d-none'),
                          document.querySelector('#chart1111').classList.remove('d-none');">
                            <b style="font-size: 15px;">PM</b>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        {{-- <div class="d-none d-lg-block " id="chartpc"></div>
        <div class="d-block d-md-none"id="chart1111">
            <div id="chartmobileam"></div>
        </div>
        <div class="d-block d-md-none" id="chart2222">
            <div id="chartmobilepm"></div>
        </div> --}}
        <div class="card">
            <div class="card-header">
                <div>
                    <h6 class="font-weight-bold mb-0">เวลาที่แจ้งซ่อม</h6>
                </div>
            </div>
            <div class="card-body">
                <div id="chartViiNews"></div>
            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        let chartData_arr = [];

        let chartData = {
            "categories": [
                "00:00",
                "01:00",
                "02:00",
                "03:00",
                "04:00",
                "05:00",
                "06:00",
                "07:00",
                "08:00",
                "09:00",
                "10:00",
                "11:00",
                "12:00",
                "13:00",
                "14:00",
                "15:00",
                "16:00",
                "17:00",
                "18:00",
                "19:00",
                "20:00",
                "21:00",
                "22:00",
                "23:00"
            ],
            "series": [{
                    "name": "พื้นที่ 1",
                    "data": [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0
                    ],
                    "group": "apexcharts-axis-0"
                },
                // {
                //     "name": "พื้นที่ 2",
                //     "data": [
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0,
                //         0
                //     ],
                //     "group": "apexcharts-axis-0"
                // }
            ]
        };
        let options_ViiNews = {
            series: chartData.series,
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'time',
                categories: chartData.categories,
            },
            tooltip: {
                x: {
                    format: 'HH:mm'
                },
            },
        };

        let chartViiNews = new ApexCharts(document.querySelector("#chartViiNews"), options_ViiNews);
        chartViiNews.render();
    </script>

    {{-- <script>
        var options = {
            series: [{
                    name: 'AM',
                    data: [<?php echo $sos_time_00; ?>, <?php echo $sos_time_01; ?>, <?php echo $sos_time_02; ?>, <?php echo $sos_time_03; ?>,
                        <?php echo $sos_time_04; ?>, <?php echo $sos_time_05; ?>, <?php echo $sos_time_06; ?>, <?php echo $sos_time_07; ?>,
                        <?php echo $sos_time_08; ?>, <?php echo $sos_time_09; ?>, <?php echo $sos_time_10; ?>, <?php echo $sos_time_11; ?>,
                        null, null, null, null, null, null, null, null, null, null, null, null,
                    ]
                },
                {
                    name: 'PM',
                    data: [null, null, null, null, null, null, null, null, null, null, null, null,
                        <?php echo $sos_time_12; ?>, <?php echo $sos_time_13; ?>, <?php echo $sos_time_14; ?>, <?php echo $sos_time_15; ?>,
                        <?php echo $sos_time_16; ?>, <?php echo $sos_time_17; ?>, <?php echo $sos_time_18; ?>, <?php echo $sos_time_19; ?>,
                        <?php echo $sos_time_20; ?>, <?php echo $sos_time_21; ?>, <?php echo $sos_time_22; ?>, <?php echo $sos_time_23; ?>,
                    ]
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
                categories: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00",
                    "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00",
                    "20:00", "21:00", "22:00", "23:00", "24:00",
                ]
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
                data: [<?php echo $sos_time_00; ?>, <?php echo $sos_time_01; ?>, <?php echo $sos_time_02; ?>, <?php echo $sos_time_03; ?>,
                    <?php echo $sos_time_04; ?>, <?php echo $sos_time_05; ?>, <?php echo $sos_time_06; ?>, <?php echo $sos_time_07; ?>,
                    <?php echo $sos_time_08; ?>, <?php echo $sos_time_09; ?>, <?php echo $sos_time_10; ?>, <?php echo $sos_time_11; ?>
                ]
            }, ],
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
                categories: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00",
                    "010:00", "011:00"
                ]
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
                data: [<?php echo $sos_time_12; ?>, <?php echo $sos_time_13; ?>, <?php echo $sos_time_14; ?>, <?php echo $sos_time_15; ?>,
                    <?php echo $sos_time_16; ?>, <?php echo $sos_time_17; ?>, <?php echo $sos_time_18; ?>, <?php echo $sos_time_19; ?>,
                    <?php echo $sos_time_20; ?>, <?php echo $sos_time_21; ?>, <?php echo $sos_time_22; ?>, <?php echo $sos_time_23; ?>,
                ]
            }, ],
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
                categories: ["12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00",
                    "22:00", "23:00", "24:00",
                ]
            },
            tooltip: {
                x: {
                    format: 'HH:mm'
                },

            },
        };

        var chart = new ApexCharts(document.querySelector("#chartmobileam"), options);
        chart.render();
    </script> --}}
@endsection
