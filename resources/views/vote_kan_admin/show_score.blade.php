@extends('layouts.viicheck_for_vote_kan')

@section('content')

<style>
    .divScore{
        background: linear-gradient(to right, #3b80e9, #1f62e0)!important;
    }
    .rank_score {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        border-radius: 50px;
        border-style: double;
    }

    .gold_color_gradient {
        background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                    radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
    }

    .silver_color_gradient {
    background:
        radial-gradient(ellipse farthest-corner at right bottom, #C0C0C0 0%, #B0B0B0 8%, #A9A9A9 30%, #808080 40%, transparent 80%),
        radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #F0F0F0 8%, #D3D3D3 25%, #A9A9A9 62.5%, #A9A9A9 100%);
    }

    .bronze_color_gradient {
        background:
            radial-gradient(ellipse farthest-corner at right bottom, #CD7F32 0%, #A0522D 8%, #8B4513 30%, #704214 40%, transparent 80%),
            radial-gradient(ellipse farthest-corner at left top, #D2691E 0%, #A0522D 8%, #8B4513 25%, #704214 62.5%, #704214 100%);
    }


</style>



<div class="row ">
    <div class="col-6">
        <h1>ผลการนับคะแนนอย่างไม่เป็นทางการ</h1>
    </div>
    <div class="col-6">
        <span class="float-end">
            อัพเดทล่าสุด : {{ date("H:i") }}
        </span>
    </div>
</div>

<hr>

<div class="row row-cols-1 row-cols-lg-2 ">

    @php

        if($score_num_1 > $score_num_2){
            $class_bg_1 = "gold_color_gradient";
            $class_bg_2 = "divScore";
        }else{
            $class_bg_1 = "divScore";
            $class_bg_2 = "gold_color_gradient";
        }

    @endphp

    <div class="col">
        <div class="card radius-10 overflow-hidden {{ $class_bg_1 }}">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white">
                        <div class="rank_score divScore text-white">
                            <span class="font-35">1</span>
                            {{-- <img width="40" src="{{ asset('/img/icon/user_white.png') }}"> --}}
                        </div>
                    </div>
                    <div class="text-center flex-grow-1"> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นาย A</h3>
                        <h3 class="mb-0 text-white font-weight-bold">{{ $score_num_1 }} คะแนน</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 overflow-hidden {{ $class_bg_2 }}">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white">
                        <div class="rank_score divScore text-white">
                            <span class="font-35">2</span>
                            {{-- <img width="40" src="{{ asset('/img/icon/user_white.png') }}"> --}}
                        </div>
                    </div>
                    <div class="text-center flex-grow-1"> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นาย B</h3>
                        <h3 class="mb-0 text-white font-weight-bold">{{ $score_num_2 }} คะแนน</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!--end row-->

<hr>

<!-- <div class="row mb-3">
    <div class="col-12 col-lg-8">
        <div class="card radius-10 w-100 h-100">
            <h4 class="font-weight-bold m-3">ส่งผลคะแนนแล้ว</h4>
            <hr class="m-0">
            <div class="card-body">
                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody class="fz_body font-weight-bold">
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 1</div>
                                    </div>
                                </td>
                                <td>5,555 คะแนน</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 2</div>
                                    </div>
                                </td>
                                <td>4,541 คะแนน</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 3</div>
                                    </div>
                                </td>
                                <td>3,000 คะแนน </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100 h-100">
            <div id="amphoeSendScoreChart"></div>
        </div>
    </div>
</div> -->

<div class="row row-cols-1 row-cols-lg-4 mb-4">

    <!-- เมืองกาญจนบุรี -->
    @php
        $data_amphoe_1 = App\Models\Vote_kan_score::where('amphoe' , 'เมืองกาญจนบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_1_score_num_1 = 0 ;
        $amphoe_1_score_num_2 = 0 ;

        foreach ($data_amphoe_1 as $amphoe_1) {
            $amphoe_1_score_num_1 = $amphoe_1_score_num_1 + $amphoe_1->number_1 ;
            $amphoe_1_score_num_2 = $amphoe_1_score_num_2 + $amphoe_1->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>เมืองกาญจนบุรี</h3>
            </div>
            <div class="card-body">
                <div id="เมืองกาญจนบุรี"></div>
            </div>

        </div>
    </div>

    <!-- ท่ามะกา -->
    @php
        $data_amphoe_2 = App\Models\Vote_kan_score::where('amphoe' , 'ท่ามะกา')
            ->where('last', 'Yes')->get();

        $amphoe_2_score_num_1 = 0 ;
        $amphoe_2_score_num_2 = 0 ;

        foreach ($data_amphoe_2 as $amphoe_2) {
            $amphoe_2_score_num_1 = $amphoe_2_score_num_1 + $amphoe_2->number_1 ;
            $amphoe_2_score_num_2 = $amphoe_2_score_num_2 + $amphoe_2->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ท่ามะกา</h3>
            </div>
            <div class="card-body">
                <div id="ท่ามะกา"></div>
            </div>

        </div>
    </div>

    <!-- ทองผาภูมิ -->
    @php
        $data_amphoe_3 = App\Models\Vote_kan_score::where('amphoe' , 'ทองผาภูมิ')
            ->where('last', 'Yes')->get();

        $amphoe_3_score_num_1 = 0 ;
        $amphoe_3_score_num_2 = 0 ;

        foreach ($data_amphoe_3 as $amphoe_3) {
            $amphoe_3_score_num_1 = $amphoe_3_score_num_1 + $amphoe_3->number_1 ;
            $amphoe_3_score_num_2 = $amphoe_3_score_num_2 + $amphoe_3->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ทองผาภูมิ</h3>
            </div>
            <div class="card-body">
                <div id="ทองผาภูมิ"></div>
            </div>

        </div>
    </div>

    <!-- สังขละบุรี -->
    @php
        $data_amphoe_4 = App\Models\Vote_kan_score::where('amphoe' , 'สังขละบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_4_score_num_1 = 0 ;
        $amphoe_4_score_num_2 = 0 ;

        foreach ($data_amphoe_4 as $amphoe_4) {
            $amphoe_4_score_num_1 = $amphoe_4_score_num_1 + $amphoe_4->number_1 ;
            $amphoe_4_score_num_2 = $amphoe_4_score_num_2 + $amphoe_4->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>สังขละบุรี</h3>
            </div>
            <div class="card-body">
                <div id="สังขละบุรี"></div>
            </div>

        </div>
    </div>

    <!-- พนมทวน -->
    @php
        $data_amphoe_5 = App\Models\Vote_kan_score::where('amphoe' , 'พนมทวน')
            ->where('last', 'Yes')->get();

        $amphoe_5_score_num_1 = 0 ;
        $amphoe_5_score_num_2 = 0 ;

        foreach ($data_amphoe_5 as $amphoe_5) {
            $amphoe_5_score_num_1 = $amphoe_5_score_num_1 + $amphoe_5->number_1 ;
            $amphoe_5_score_num_2 = $amphoe_5_score_num_2 + $amphoe_5->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>พนมทวน</h3>
            </div>
            <div class="card-body">
                <div id="พนมทวน"></div>
            </div>

        </div>
    </div>

    <!-- เลาขวัญ -->
    @php
        $data_amphoe_6 = App\Models\Vote_kan_score::where('amphoe' , 'เลาขวัญ')
            ->where('last', 'Yes')->get();

        $amphoe_6_score_num_1 = 0 ;
        $amphoe_6_score_num_2 = 0 ;

        foreach ($data_amphoe_6 as $amphoe_6) {
            $amphoe_6_score_num_1 = $amphoe_6_score_num_1 + $amphoe_6->number_1 ;
            $amphoe_6_score_num_2 = $amphoe_6_score_num_2 + $amphoe_6->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>เลาขวัญ</h3>
            </div>
            <div class="card-body">
                <div id="เลาขวัญ"></div>
            </div>

        </div>
    </div>

    <!-- ศรีสวัสดิ์ -->
    @php
        $data_amphoe_7 = App\Models\Vote_kan_score::where('amphoe' , 'ศรีสวัสดิ์')
            ->where('last', 'Yes')->get();

        $amphoe_7_score_num_1 = 0 ;
        $amphoe_7_score_num_2 = 0 ;

        foreach ($data_amphoe_7 as $amphoe_7) {
            $amphoe_7_score_num_1 = $amphoe_7_score_num_1 + $amphoe_7->number_1 ;
            $amphoe_7_score_num_2 = $amphoe_7_score_num_2 + $amphoe_7->number_2;
        }
    @endphp
    <div class="col mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ศรีสวัสดิ์</h3>
            </div>
            <div class="card-body">
                <div id="ศรีสวัสดิ์"></div>
            </div>

        </div>
    </div>

</div><!--end row-->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- <script>
    let options = {
          series: [21, 22],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        let chart = new ApexCharts(document.querySelector("#amphoeSendScoreChart"), options);
        chart.render();

</script> -->

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        setTimeout(() => {
            window.location.reload();
        }, 60000);
    });

    // เมืองกาญจนบุรี
    let options_1 = {
        series: [{
            data: ['{{ $amphoe_1_score_num_1 }}', '{{ $amphoe_1_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_1_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_1_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_1 = new ApexCharts(document.querySelector("#เมืองกาญจนบุรี"), options_1);
    chart_1.render();

    // ท่ามะกา
    let options_2 = {
        series: [{
            data: ['{{ $amphoe_2_score_num_1 }}', '{{ $amphoe_2_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_2_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_2_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_2 = new ApexCharts(document.querySelector("#ท่ามะกา"), options_2);
    chart_2.render();

    // ทองผาภูมิ
    let options_3 = {
        series: [{
            data: ['{{ $amphoe_3_score_num_1 }}', '{{ $amphoe_3_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_3_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_3_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_3 = new ApexCharts(document.querySelector("#ทองผาภูมิ"), options_3);
    chart_3.render();

    // สังขละบุรี
    let options_4 = {
        series: [{
            data: ['{{ $amphoe_4_score_num_1 }}', '{{ $amphoe_4_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_4_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_4_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_4 = new ApexCharts(document.querySelector("#สังขละบุรี"), options_4);
    chart_4.render();

    // พนมทวน
    let options_5 = {
        series: [{
            data: ['{{ $amphoe_5_score_num_1 }}', '{{ $amphoe_5_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_5_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_5_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_5 = new ApexCharts(document.querySelector("#พนมทวน"), options_5);
    chart_5.render();

    // เลาขวัญ
    let options_6 = {
        series: [{
            data: ['{{ $amphoe_6_score_num_1 }}', '{{ $amphoe_6_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_6_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_6_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_6 = new ApexCharts(document.querySelector("#เลาขวัญ"), options_6);
    chart_6.render();

    // ศรีสวัสดิ์
    let options_7 = {
        series: [{
            data: ['{{ $amphoe_7_score_num_1 }}', '{{ $amphoe_7_score_num_2 }}']
        }],
            chart: {
            height: 350,
            type: 'bar',
            events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
            }
        },

        plotOptions: {
            bar: {
            columnWidth: '45%',
            distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['เบอร์ 1', 'นาย A','{{ $amphoe_7_score_num_1 }} คะแนน'],
                ['เบอร์ 2', 'นาย B','{{ $amphoe_7_score_num_2 }} คะแนน'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_7 = new ApexCharts(document.querySelector("#ศรีสวัสดิ์"), options_7);
    chart_7.render();

</script>

@endsection
