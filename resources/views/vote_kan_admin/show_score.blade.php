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

<div class="row row-cols-1 row-cols-lg-3 ">

    <div class="col">
        <div class="card radius-10 overflow-hidden divScore">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white">
                        <div class="rank_score gold_color_gradient text-white">
                            <span class="font-35">1</span>
                            {{-- <img width="40" src="{{ asset('/img/icon/user_white.png') }}"> --}}
                        </div>
                    </div>
                    <div class="text-center flex-grow-1"> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นาย A</h3>
                        <h3 class="mb-0 text-white font-weight-bold">16,525 คะแนน</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 overflow-hidden divScore">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white">
                        <div class="rank_score silver_color_gradient text-white">
                            <span class="font-35">2</span>
                            {{-- <img width="40" src="{{ asset('/img/icon/user_white.png') }}"> --}}
                        </div>
                    </div>
                    <div class="text-center flex-grow-1"> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นาย B</h3>
                        <h3 class="mb-0 text-white font-weight-bold">14,422 คะแนน</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 overflow-hidden divScore">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white">
                        <div class="rank_score bronze_color_gradient text-white">
                            <span class="font-35">3</span>
                            {{-- <img width="40" src="{{ asset('/img/icon/user_white.png') }}"> --}}
                        </div>
                    </div>
                    <div class="text-center flex-grow-1"> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นาย C</h3>
                        <h3 class="mb-0 text-white font-weight-bold">12,354 คะแนน</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!--end row-->

<div class="row mb-3">
    <div class="col-12 col-lg-8">
        <div class="card radius-10 w-100 h-100">
            <h4 class="font-weight-bold m-3">คะแนนทั้งหมด</h4>
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
</div>

<div class="row row-cols-1 row-cols-lg-2 mb-4">
    <div class="col">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>อำเภอ 1</h3>
            </div>
            <div class="card-body">
                <div id="amphoeChart"></div>
            </div>

        </div>
    </div>

</div><!--end row-->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    let options = {
          series: [44, 55],
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

</script>

<script>
    let options_2 = {
        series: [{
            data: [21, 22, 10, 28, 16, 21, 13, 30]
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
                ['John', 'Doe'],
                ['Joe', 'Smith'],
                ['Jake', 'Williams'],
                ['Peter', 'Brown'],
                ['Mary', 'Evans'],
                ['David', 'Wilson'],
                ['Lily', 'Roberts'],
            ],
            labels: {
                style: {

                    fontSize: '12px'
                }
            }
        }
    };

    let chart_2 = new ApexCharts(document.querySelector("#amphoeChart"), options_2);
    chart_2.render();

</script>

@endsection
