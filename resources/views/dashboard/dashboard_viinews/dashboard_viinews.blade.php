<style>
    .recent-product-img {
        width: 50px;
        height: 50px;
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        border: 1px solid #e6e6e6;
    }

</style>

<div class="card">
    <div class="card-header">
        <div>
            <h6 class="font-weight-bold mb-0">เวลาที่เช็คอินของแต่ละพื้นที่</h6>
        </div>
    </div>
    <div class="card-body">
        <div id="chartViiNews"></div>
    </div>
</div>
<div class="bg-transparent">
    <h3 class="font-weight-bold mb-1">กรุงเทพมหานคร</h3>
    <div class="row row-cols-1 row-cols-md-2">
        <!-- ไม่ได้เข้าพื้นที่นานที่สุด -->
        <div class="col-12 col-md-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="col-10">
                            <h5 class="font-weight-bold mb-0" >ไม่ได้เข้าพื้นที่นานที่สุด</h5>
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
                <div class="p-3 mb-3">
                    @foreach ($last_checkIn_data as $last_checkIn_data)
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                @if(!empty($last_checkIn_data->photo))
                                    <img src="{{ url('storage') }}/{{ $last_checkIn_data->photo }}" class="p-0" alt="">
                                @endif
                                @if(empty($last_checkIn_data->photo) && !empty($last_checkIn_data->avatar))
                                    <img src="{{ $last_checkIn_data->avatar }}" class="p-0" alt="">
                                @endif
                                @if(empty($last_checkIn_data->photo && empty($last_checkIn_data->avatar)))
                                    <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                @endif
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14">{{$last_checkIn_data->name}}</span>
                            </div>


                            @php
                                $currentDate = \Carbon\Carbon::now();
                                $checkOutDate = \Carbon\Carbon::parse($last_checkIn_data->time_out);

                                $daysDifference = $currentDate->diffInDays($checkOutDate);

                                if ($daysDifference >= 86400) {
                                    $checkin_days = floor($daysDifference / 86400);
                                    $checkin_hours = floor(($daysDifference % 86400) / 3600);
                                    // $checkin_remainingMinutes = floor((($daysDifference % 86400) % 3600) / 60);
                                    // $checkin_remainingSeconds = ($daysDifference % 86400) % 60;

                                    // $checkin_time_unit = $checkin_days . ' วัน ' . $checkin_hours . ' ชั่วโมง ' . $checkin_remainingMinutes . ' นาที ' . $checkin_remainingSeconds . ' วินาที';
                                    $checkin_time_unit = $checkin_days . ' วัน ' . $checkin_hours . ' ชั่วโมง ';

                                }else{
                                    $checkin_time_unit = 'น้อยกว่า 1 วัน';
                                }
                            @endphp
                            <p class="ms-auto mb-0 text-purple">{{ $checkin_time_unit }}</p>
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
        <!-- เข้าพื้นที่บ่อยที่สุด -->
        <div class="col-12 col-md-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="col-10">
                            <h5 class="font-weight-bold mb-0">เข้าพื้นที่บ่อยที่สุด</h5>
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
                <div class="p-3 mb-3">
                    @foreach ($most_often_checkIn_data as $most_often_checkIn_data)
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                @if(!empty($most_often_checkIn_data->photo))
                                    <img src="{{ url('storage') }}/{{ $most_often_checkIn_data->photo }}" class="p-0" alt="">
                                @endif
                                @if(empty($most_often_checkIn_data->photo) && !empty($most_often_checkIn_data->avatar))
                                    <img src="{{ $most_often_checkIn_data->avatar }}" class="p-0" alt="">
                                @endif
                                @if(empty($most_often_checkIn_data->photo && empty($most_often_checkIn_data->avatar)))
                                    <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                @endif
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14">{{$most_often_checkIn_data->name}}</span>
                            </div>

                            <p class="ms-auto mb-0 text-purple">{{$most_often_checkIn_data->count_user_checkin}} ครั้ง</p>
                        </div>
                        <hr />
                    @endforeach


                </div>
            </div>
        </div>
        <!-- เข้าพื้นที่ล่าสุด -->
        <div class="col-12 col-md-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="col-10">
                            <h5 class="font-weight-bold mb-0">เข้าพื้นที่ล่าสุด</h5>
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
                <div class="p-3 mb-3">
                    @foreach ($lastest_checkIn_data as $lastest_checkIn_data)
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                @if(!empty($lastest_checkIn_data->photo))
                                    <img src="{{ url('storage') }}/{{ $lastest_checkIn_data->photo }}" class="p-0" alt="">
                                @endif
                                @if(empty($lastest_checkIn_data->photo) && !empty($lastest_checkIn_data->avatar))
                                    <img src="{{ $lastest_checkIn_data->avatar }}" class="p-0" alt="">
                                @endif
                                @if(empty($lastest_checkIn_data->photo && empty($lastest_checkIn_data->avatar)))
                                    <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                @endif
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14">{{$lastest_checkIn_data->name}}</span>
                            </div>

                            @php
                                $checkin_time_current = date('Y-m-d H:i:s');
                                $checkin_time_in = \Carbon\Carbon::parse($lastest_checkIn_data->time_in);

                                $checkin_timeDifference = $checkin_time_in->diffInMinutes($checkin_time_current); // หรือ diffInSeconds() หากต้องการในหน่วยวินาที

                                if ($checkin_timeDifference >= 86400) {
                                    $checkin_days = floor($checkin_timeDifference / 86400);
                                    $checkin_hours = floor(($checkin_timeDifference % 86400) / 3600);
                                    // $checkin_remainingMinutes = floor((($checkin_timeDifference % 86400) % 3600) / 60);
                                    // $checkin_remainingSeconds = ($checkin_timeDifference % 86400) % 60;

                                    // $checkin_time_unit = $checkin_days . ' วัน ' . $checkin_hours . ' ชั่วโมง ' . $checkin_remainingMinutes . ' นาที ' . $checkin_remainingSeconds . ' วินาที';
                                    $checkin_time_unit = $checkin_days . ' วัน ' . $checkin_hours . ' ชั่วโมง ';

                                } elseif ($checkin_timeDifference >= 3600) {
                                    $checkin_hours = floor($checkin_timeDifference / 3600);
                                    $checkin_remainingMinutes = floor(($checkin_timeDifference % 3600) / 60);
                                    $checkin_remainingSeconds = $checkin_timeDifference % 60;

                                    $checkin_time_unit = $checkin_hours . ' ชั่วโมง ' . $checkin_remainingMinutes . ' นาที ' . $checkin_remainingSeconds . ' วินาที';
                                } elseif ($checkin_timeDifference >= 60) {
                                    $checkin_minutes = floor($checkin_timeDifference / 60);
                                    $checkin_seconds = $checkin_timeDifference % 60;

                                    $checkin_time_unit = $checkin_minutes . ' นาที ' . $checkin_seconds . ' วินาที';
                                } else {
                                    $checkin_time_unit = $checkin_timeDifference . ' วินาที';
                                }

                            @endphp

                            <p class="ms-auto mb-0 text-purple">{{$checkin_time_unit}}</p>
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<!--end row-->



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    let array = [];
    for (let index = 1; index < 3; index++) {
        let dataObject = {
            name: 'กรุงเทพมหานคร' + index,
            data: [ 31*index, 40*index, 28*index, 51*index, 42*index, 109*index, 100*index]
        };
        array.push(dataObject);
    }

    var options = {
        series: array,
        chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T08:30:00.000Z", "2018-09-19T12:30:00.000Z", "2018-09-19T16:30:00.000Z", "2018-09-19T19:30:00.000Z", "2018-09-19T23:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chartViiNews"), options);
        chart.render();
</script>


