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
<!-- check_in แต่ละพื้นที่ -->
<div class="row row-cols-1 row-cols-lg-1">
    <div class="accordion" id="accordion_ByCheckIn">
        <div class="card radius-10 w-100 ">

            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">
                            <b>ข้อมูลการเข้าพื้นที่ 15 วัน</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">


                        <div class="btn-group" role="group">

                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach ($all_data_partner as $select_area)
                                        @if (!empty($select_area->name_area))
                                            <a class="dropdown-item" onclick="select_area_check_in('{{$select_area->id}}')" href="javaScript:;">พื้นที่ : {{ $select_area->name_area}}</a>
                                        @else
                                            <a class="dropdown-item" onclick="select_area_check_in('{{$select_area->id}}')" href="javaScript:;">พื้นที่ : รวม</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--  พื้นที่ : ทั้งหมด -->
            <div id="area_div_checkin">
                <div class="mt-3 mb-0">
                    <h5 class="text-center font-weight-bold">พื้นที่ : รวม</h5>
                    @php

                        $today = \Carbon\Carbon::now()->addYears(543);

                        $date_now_thai = $today->locale('th')->isoFormat('LL');

                        // สร้างวัตถุ Carbon สำหรับวันที่คาดหวังให้ลบออกจากวันปัจจุบัน
                        $date_delete_15_days_ago = $today->subDays(15);
                        // แปลงรูปแบบวันที่เป็นภาษาไทย
                        $date_delete_15_thai = $date_delete_15_days_ago->locale('th')->isoFormat('LL');



                    @endphp
                    <h6 class="text-center">ข้อมูลตั้งแต่วันที่ {{ $date_delete_15_thai}} - {{$date_now_thai}}</h6>
                </div>
                <div class="row p-3 mb-3 ">
                    <div class="col-12 col-lg-2">
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">จำนวนการเข้าพื้นที่</p>
                                        <h4 class="mb-0">{{ $count_check_in_at_area }} คน</h4>
                                    </div>
                                    <div class="ms-auto">
                                        <img width="55px" src="{{ asset("/img/stickerline/PNG/37.2.png") }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class=" row">
                                    <div class="d-flex align-items-center justify-content-around col-12 col-lg-6" style="border-right: 1px solid rgb(216, 208, 208)">
                                        <div>
                                            <p class="mb-0 text-success">วันที่เข้ามากที่สุด</p>
                                            <span class="mb-0 font-weight-bold font-18 m-1">
                                                @if (count($maxThaiDay) === 1)
                                                    {{$maxThaiDay[0]}}
                                                @else
                                                    @foreach ($maxThaiDay as $maxThaiDay )
                                                        {{$maxThaiDay}}
                                                    @endforeach
                                                @endif

                                            </span>
                                        </div>
                                        <div class="text-dark text-weight-bold">
                                            <span class="font-30">{{ $maxDayCount }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 " >
                                        <div>
                                            <p class="mb-0 text-danger">วันที่เข้าน้อยที่สุด</p>
                                            <span class="mb-0 font-weight-bold font-18 ">
                                                @if (count($minThaiDay) === 1)
                                                    {{$minThaiDay[0]}}
                                                @else
                                                    @foreach ($minThaiDay as $minThaiDay )
                                                        {{$minThaiDay}}
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                        <div class="text-dark text-weight-bold">
                                            <span class="font-30">{{ $minDayCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class=" row">
                                    <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 " style="border-right: 1px solid rgb(216, 208, 208)">
                                        <div>
                                            <p class="mb-0 text-success">เวลาที่เข้ามากที่สุด</p>
                                            <span class="mb-0 font-weight-bold font-18">
                                                @if (count($maxTimeCounts) === 1)
                                                    {{$maxTimeCounts[0]}}.00
                                                @else
                                                    @foreach ($maxTimeCounts as $index => $maxTimeCount)
                                                        {{$maxTimeCount}}.00 {{$index !== count($maxTimeCounts) - 1 ? ', ' : ''}}
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                        <div class="text-dark text-weight-bold">
                                            <span class="font-30">{{ $maxValue }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                        <div>
                                            <p class="mb-0 text-danger">เวลาที่เข้าน้อยที่สุด</p>
                                            <span class="mb-0 font-weight-bold font-18">
                                                @if (count($minTimeCounts) === 1)
                                                    {{$minTimeCounts[0]}}.00
                                                @else
                                                    @foreach ($minTimeCounts as $index => $minTimeCount)
                                                        {{$minTimeCount}}.00 {{$index !== count($minTimeCounts) - 1 ? ', ' : ''}}
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                        <div class=" text-dark text-weight-bold ">
                                            <span class="font-30">{{ $minValue }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ พื้นที่ : ทั้งหมด -->


        </div>
    </div>
</div>

<!-- เวลาที่เช็คอินของแต่ละพื้นที่ -->
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

<!-- check_in แต่ละหัวข้อ -->
<div class="dropdown ms-auto">
    <div class="float-end" data-bs-toggle="dropdown">
        <span class="btn btn-secondary">เลือกพื้นที่</span>
    </div>
    <div class="dropdown-menu dropdown-menu-right">
        @foreach ($all_data_partner as $select_area)
            @if (!empty($select_area->name_area))
                <a class="dropdown-item" onclick="select_area_3_topic('{{$select_area->id}}')" href="javaScript:;">พื้นที่ : {{ $select_area->name_area}}</a>
            @else
                <a class="dropdown-item" onclick="select_area_3_topic('{{$select_area->id}}')" href="javaScript:;">พื้นที่ : รวม</a>
            @endif
        @endforeach
    </div>
</div>

<div id="area_viinews" class="bg-transparent">
    <div class="row">
        <div class="col-12 mt-1">
            <h3 class="font-weight-bold">พื้นที่ : รวม</h3>
        </div>
    </div>

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
                                <a class="dropdown-item" href="{{ url('/dashboard_viinews_3_topic?type_page=longest_btn') }}">ดูข้อมูลเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 mb-3">
                    @foreach ($sorted_last_checkIn_data as $last_checkIn_data)
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

                                $checkout_timeDifference = $currentDate->diff($checkOutDate);

                                $daysDifference = $checkout_timeDifference->days;
                                $hoursDifference = $checkout_timeDifference->h;
                                $minutesDifference = $checkout_timeDifference->i;

                                if(!empty($daysDifference)){
                                    $checkout_time_unit = $daysDifference . ' วัน ';
                                }elseif (empty($daysDifference) && !empty($hoursDifference) ) {
                                    $checkout_time_unit = $hoursDifference . ' ชม. '  . $minutesDifference . ' น. ';
                                }elseif (empty($daysDifference) && empty($hoursDifference) && !empty($minutesDifference)) {
                                    $checkout_time_unit = $minutesDifference . ' น. ';
                                }

                            @endphp
                            <p class="ms-auto mb-0 text-purple">{{ $checkout_time_unit }}</p>
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
                                <a class="dropdown-item" href="{{ url('/dashboard_viinews_3_topic?type_page=most_often_btn') }}">ดูข้อมูลเพิ่มเติม</a>
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
                                <a class="dropdown-item" href="{{ url('/dashboard_viinews_3_topic?type_page=lastest_btn') }}">ดูข้อมูลเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 mb-3">
                    @foreach ($sorted_lastest_checkIn_data as $lastest_checkIn_data)
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
                                $checkin_time_current = \Carbon\Carbon::now();
                                $checkin_time_in = \Carbon\Carbon::parse($lastest_checkIn_data->time_in);

                                $checkin_timeDifference = $checkin_time_current->diff($checkin_time_in);

                                $daysDifference = $checkin_timeDifference->days;
                                $hoursDifference = $checkin_timeDifference->h;
                                $minutesDifference = $checkin_timeDifference->i;

                                if(!empty($daysDifference)){
                                    $checkin_time_unit = $daysDifference . ' วัน ';
                                }elseif (empty($daysDifference) && !empty($hoursDifference) ) {
                                    $checkin_time_unit = $hoursDifference . ' ชม. '  . $minutesDifference . ' น. ';
                                }elseif (empty($daysDifference) && empty($hoursDifference) && !empty($minutesDifference)) {
                                    $checkin_time_unit = $minutesDifference . ' น. ';
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
    let chartData_arr = [];
    let chartData = @json($check_in_chart_arr);

    let options_ViiNews = {
        series: chartData.series,
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            nabled: true
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


<script>
    // document.document.querySelector('.top5_score_unit_toggleDataBtn').addEventListener('click', () => {
    function select_area_check_in(area_id) {
        console.log(area_id);
        let user_login = '{{Auth::user()->organization}}';
        let area_div = document.getElementById('area_div_checkin');

        // ดึงข้อมูลผ่าน Fetch API จากหลังบ้าน
        fetch("{{ url('/') }}/api/get_area_checkin" + '/' + area_id + '/' + user_login)
            .then(response => response.json()) // แปลงข้อมูลเป็น JSON
            .then(data => {
                console.log(data);
                console.log(data.count_check_in_at_area);
                // ล้างข้อมูลในตาราง
                area_div.innerHTML = '';

                let data_div;
                // สร้างแถวและเพิ่มข้อมูลในตาราง

                //รูปภาพ icon
                let img_count_user_check_in = '<img width="55px" src="{{ asset("/img/stickerline/PNG/37.2.png") }}">';
                let img_count_birthday = '<img width="55px" src="{{ asset("/img/stickerline/PNG/48.png") }}">';

                let maxThaiDay;
                if (data.maxThaiDay.length === 1) {
                    maxThaiDay = data.maxThaiDay[0];
                } else  {
                    maxThaiDay = data.maxThaiDay[0] + " " + data.maxThaiDay[1];
                    // maxThaiDay = [...data.maxThaiDay];
                }

                let minThaiDay;
                if (data.minThaiDay.length === 1) {
                    minThaiDay = data.minThaiDay[0];
                } else {
                    minThaiDay = data.minThaiDay[0] + " " + data.minThaiDay[1];
                }

                let maxTimeCounts;
                if (data.maxTimeCounts.length === 1) {
                    maxTimeCounts = data.maxTimeCounts[0]+".00";
                } else {
                    maxTimeCounts = [...data.maxTimeCounts]+".00";
                }

                let minTimeCounts;
                if (data.minTimeCounts.length === 1) {
                    minTimeCounts = data.minTimeCounts[0]+".00";
                } else {
                    minTimeCounts = [...data.minTimeCounts]+".00";
                }

                // วันที่ปัจจุบัน

                let currentDate = new Date();
                let months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];

                let dayOfMonth = currentDate.getDate();
                let monthName = months[currentDate.getMonth()];
                let yearBE = currentDate.getFullYear();
                let yearThai = yearBE + 543;

                let formattedDateNow =  dayOfMonth + ' ' + monthName + ' ' + yearThai;

                // คำนวณวันที่ 15 วันก่อน
                let dateDelete15 = new Date();
                dateDelete15.setDate(currentDate.getDate() - 15);

                let dayOfMonth15 = dateDelete15.getDate();
                let monthName15 = months[dateDelete15.getMonth()];
                let yearBE15 = dateDelete15.getFullYear();
                let yearThai15 = yearBE15 + 543;

                let formattedDate15 =  dayOfMonth15 + ' ' + monthName15 + ' ' + yearThai15;


                if (data.name_area == 'all_area') {
                    data.name_area = "รวม";
                }

                data_div = `
                    <div class="mt-3 mb-0">
                        <h5 class="text-center font-weight-bold">พื้นที่ : <span>` + data.name_area + `</span></h5>
                        <h6 class="text-center">ข้อมูลตั้งแต่วันที่ `+ formattedDate15 + ` - `+ formattedDateNow +  `</h6>
                    </div>
                    <div class="row p-3 mb-3 ">
                        <div class="col-12 col-lg-2">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">จำนวนการเข้าพื้นที่</p>
                                            <h4 class="mb-0">`+ data.count_check_in_at_area + ` คน</h4>
                                        </div>
                                        <div class="ms-auto">
                                            `+ img_count_user_check_in + `
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">คนที่เกิดเดือนนี้</p>
                                            <h4 class="mb-0">`+ data.count_hbd + ` คน</h4>
                                        </div>
                                        <div class="ms-auto">
                                            `+ img_count_birthday + `
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class=" row">
                                        <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 " style="border-right: 1px solid rgb(216, 208, 208)">
                                            <div>
                                                <p class="mb-0 text-success">วันที่เข้ามากที่สุด</p>
                                                <span class="mb-0 font-weight-bold font-18 m-1">
                                                    `+ maxThaiDay + `
                                                </span>
                                            </div>
                                            <div class="text-dark text-weight-bold">
                                                <span class="font-30">`+ data.maxDayCount + `</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                            <div>
                                                <p class="mb-0 text-danger">วันที่เข้าน้อยที่สุด</p>
                                                <span class="mb-0 font-weight-bold font-18 ">
                                                    `+ minThaiDay + `
                                                </span>
                                            </div>
                                            <div class="text-dark text-weight-bold">
                                                <span class="font-30">`+ data.minDayCount + `</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class=" row">
                                        <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 " style="border-right: 1px solid rgb(216, 208, 208)">
                                            <div>
                                                <p class="mb-0 text-success">เวลาที่เข้ามากที่สุด</p>
                                                <span class="mb-0 font-weight-bold font-18">
                                                    `+ maxTimeCounts + `
                                                </span>
                                            </div>
                                            <div class="text-dark text-weight-bold">
                                                <span class="font-30">`+ data.maxValue + `</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                            <div>
                                                <p class="mb-0 text-danger">เวลาที่เข้าน้อยที่สุด</p>
                                                <span class="mb-0 font-weight-bold font-18">
                                                    `+ minTimeCounts + `
                                                </span>
                                            </div>
                                            <div class=" text-dark text-weight-bold f">
                                                <span class="font-30">`+ data.minValue + `</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                area_div.insertAdjacentHTML('afterbegin', data_div); // แทรกบนสุด


            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
            });
    };
</script>


<script>
    // document.document.querySelector('.top5_score_unit_toggleDataBtn').addEventListener('click', () => {
    function select_area_3_topic(area_id) {

        let user_login = '{{ Auth::user()->organization }}';
        let area_div = document.getElementById('area_viinews');

        // ดึงข้อมูลผ่าน Fetch API จากหลังบ้าน
        fetch("{{ url('/') }}/api/get_area_checkin_3_topic" + '/' + area_id + '/' + user_login)
            .then(response => response.json()) // แปลงข้อมูลเป็น JSON
            .then(data => {
                // console.log(data);

                // ล้างข้อมูลในตาราง
                area_div.innerHTML = '';

                let data_div;
                // สร้างแถวและเพิ่มข้อมูลในตาราง

                if (data.name_area == 'all_area') {
                    data.name_area = "รวม";
                }

                //============================== ไม่ได้เข้าพื้นที่นานที่สุด ==============================

                let generatedContent_1 = '';
                data.sorted_last_checkIn_data.forEach(longTime_checkIn => {

                    // หาเวลาเพื่อเปลี่ยนรูปแบบและนำไปใช้
                    let currentDate = new Date();
                    let checkOutDate = new Date(longTime_checkIn.time_out);

                    let checkout_timeDifference = new Date(currentDate - checkOutDate);

                    let daysDifference = checkout_timeDifference.getUTCDate() - 1; // Subtracting 1 to get the correct day difference
                    let hoursDifference = checkout_timeDifference.getUTCHours();
                    let minutesDifference = checkout_timeDifference.getUTCMinutes();

                    let checkout_time_unit = '';

                    if (daysDifference > 0) {
                        checkout_time_unit = daysDifference + ' วัน ';
                    } else if (daysDifference === 0 && hoursDifference > 0) {
                        checkout_time_unit = hoursDifference + ' ชม. ' + minutesDifference + ' น. ';
                    } else if (daysDifference === 0 && hoursDifference === 0 && minutesDifference > 0) {
                        checkout_time_unit = minutesDifference + ' น. ';
                    }

                    //หารูปภาพโปรไฟล์

                    let htmlProfile_1 = '';
                    if(longTime_checkIn.photo){
                        htmlProfile_1 = `<img src="{{ url('storage') }}/`+longTime_checkIn.photo +`" class="p-0" alt="">`;
                    }
                    else if(!longTime_checkIn.photo && longTime_checkIn.avatar){
                        htmlProfile_1 = `<img src="`+longTime_checkIn.avatar +`" class="p-0" alt="">`;
                    }
                    else if(!longTime_checkIn.photo && !longTime_checkIn.avatar){
                        htmlProfile_1 = `<img src="https://www.viicheck.com/Medilab/img/icon.png" class="p-0" alt="">`;
                    }


                    data_div1 = `
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                `+ htmlProfile_1 +`
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14"> `+ longTime_checkIn.name +` </span>
                            </div>

                            <p class="ms-auto mb-0 text-purple"> `+ checkout_time_unit +`</p>
                        </div>
                        <hr />
                    `;

                    generatedContent_1 += data_div1;
                });

                //============================== เข้าพื้นที่บ่อยที่สุด ==============================

                let generatedContent_2 = '';
                data.most_often_checkIn_data.forEach(most_checkIn => {

                    // หาเวลาเพื่อเปลี่ยนรูปแบบและนำไปใช้
                    let currentDate2 = new Date();
                    let checkOutDate2 = new Date(most_checkIn.time_out);

                    let checkout_timeDifference2 = new Date(currentDate2 - checkOutDate2);

                    let daysDifference2 = checkout_timeDifference2.getUTCDate() - 1; // Subtracting 1 to get the correct day difference
                    let hoursDifference2 = checkout_timeDifference2.getUTCHours();
                    let minutesDifference2 = checkout_timeDifference2.getUTCMinutes();

                    let checkout_time_unit2 = '';

                    if (daysDifference2 > 0) {
                        checkout_time_unit2 = daysDifference2 + ' วัน ';
                    } else if (daysDifference2 === 0 && hoursDifference2 > 0) {
                        checkout_time_unit2 = hoursDifference2 + ' ชม. ' + minutesDifference2 + ' น. ';
                    } else if (daysDifference2 === 0 && hoursDifference2 === 0 && minutesDifference2 > 0) {
                        checkout_time_unit2 = minutesDifference2 + ' น. ';
                    }

                    //หารูปภาพโปรไฟล์

                    let htmlProfile_2 = '';
                    if(most_checkIn.photo){
                        htmlProfile_2 = `<img src="{{ url('storage') }}/`+most_checkIn.photo +`" class="p-0" alt="">`;
                    }
                    else if(!most_checkIn.photo && most_checkIn.avatar){
                        htmlProfile_2 = `<img src="`+most_checkIn.avatar +`" class="p-0" alt="">`;
                    }
                    else if(!most_checkIn.photo && !most_checkIn.avatar){
                        htmlProfile_2 = `<img src="https://www.viicheck.com/Medilab/img/icon.png" class="p-0" alt="">`;
                    }


                    data_div2 = `
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                `+ htmlProfile_2 +`
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14">`+ most_checkIn.name +`</span>
                            </div>

                            <p class="ms-auto mb-0 text-purple">`+ most_checkIn.count_user_checkin +` ครั้ง</p>
                        </div>
                        <hr />
                    `;

                    generatedContent_2 += data_div2;
                });

                //============================== เข้าพื้นที่บ่อยที่สุด ==============================

                let generatedContent_3 = '';
                data.sorted_lastest_checkIn_data.forEach(lastest_checkIn => {

                    // หาเวลาเพื่อเปลี่ยนรูปแบบและนำไปใช้
                    let currentDate3 = new Date();
                    let checkOutDate3 = new Date(lastest_checkIn.time_in);

                    let checkout_timeDifference3 = new Date(currentDate3 - checkOutDate3);

                    let daysDifference3 = checkout_timeDifference3.getUTCDate() - 1; // Subtracting 1 to get the correct day difference
                    let hoursDifference3 = checkout_timeDifference3.getUTCHours();
                    let minutesDifference3 = checkout_timeDifference3.getUTCMinutes();

                    let checkout_time_unit3 = '';

                    if (daysDifference3 > 0) {
                        checkout_time_unit3 = daysDifference3 + ' วัน ';
                    } else if (daysDifference3 === 0 && hoursDifference3 > 0) {
                        checkout_time_unit3 = hoursDifference3 + ' ชม. ' + minutesDifference3 + ' น. ';
                    } else if (daysDifference3 === 0 && hoursDifference3 === 0 && minutesDifference3 > 0) {
                        checkout_time_unit3 = minutesDifference3 + ' น. ';
                    }

                    //หารูปภาพโปรไฟล์

                    let htmlProfile_3 = '';
                    if(lastest_checkIn.photo){
                        htmlProfile_3 = `<img src="{{ url('storage') }}/`+lastest_checkIn.photo +`" class="p-0" alt="">`;
                    }
                    else if(!lastest_checkIn.photo && lastest_checkIn.avatar){
                        htmlProfile_3 = `<img src="`+lastest_checkIn.avatar +`" class="p-0" alt="">`;
                    }
                    else if(!lastest_checkIn.photo && !lastest_checkIn.avatar){
                        htmlProfile_3 = `<img src="https://www.viicheck.com/Medilab/img/icon.png" class="p-0" alt="">`;
                    }


                    data_div3 = `
                        <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                                `+ htmlProfile_3 +`
                            </div>
                            <div class="ms-2">
                                <span class="mt-2 font-14">`+ lastest_checkIn.name +`</span>
                            </div>

                            <p class="ms-auto mb-0 text-purple"> `+ checkout_time_unit3 +`</p>
                        </div>
                        <hr />
                    `;

                    generatedContent_3 += data_div3;
                });

                data_div = `
                    <h3 class="font-weight-bold">พื้นที่ : <span> ` + data.name_area + `</span></h3>
                    <div class="row row-cols-1 row-cols-md-2">

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
                                    ${generatedContent_1}
                                </div>
                            </div>
                        </div>

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
                                    ${generatedContent_2}
                                </div>
                            </div>
                        </div>

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
                                    ${generatedContent_3}
                                </div>
                            </div>
                        </div>


                    </div>

                `;

                area_div.insertAdjacentHTML('afterbegin', data_div); // แทรกบนสุด

            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
            });
    };
</script>
