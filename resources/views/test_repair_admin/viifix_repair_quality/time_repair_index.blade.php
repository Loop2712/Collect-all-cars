@extends('layouts.partners.theme_partner_new')

@section('content')
    <style>
        #img_bg_1 {
            background-image: url("{{ asset('/img/bg car/am.png') }}");
            background-size: cover;
        }

        #img_bg_2 {
            background-image: url("{{ asset('/img/bg car/pm.png') }}");
            background-size: cover;

        }

        #img_bg_3 {
            background-image: url("{{ asset('/img/more/0112.jpg') }}");
            background-size: cover;
            height: 500px;
        }
    </style>
    <br>

    <div id="filter_div" class="row " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-0 bg-transparent ">
                    <div class="d-flex align-items-center col-12" style="margin-top:10px;">
                        <div class="col-6">
                            <h5 class="font-weight-bold mb-0">เลือกพื้นที่และช่วงเวลา</h5>
                        </div>
                        <div class="col-6 ">
                            <a style="float: right;">การแจ้งซ่อมทั้งหมด : <span id="maintain_count">{{$data_maintains_count}}</span>
                                ครั้ง</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="row justify-content-center" style="margin-top:-30px">
                                <div class="col-md-2">
                                    <label class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_area" onchange="dataSearch();">
                                        <option value="" name_area="ทั้งหมด">พื้นที่ : ทั้งหมด</option>
                                        @foreach ($data_partner_area as $area)
                                            <option value="{{ $area->id }}" name_area="{{ $area->name_area }}">
                                                {{ $area->name_area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_year" onchange="dataSearch();">
                                        <option value="">เลือกปี</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{{ '' }}</label>
                                    <select class="form-control" id="select_month" onchange="dataSearch();">
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
                            <!-- ปุ่มล้างการค้นหา -->
                            <div class="col-md-2 col-6 d-none d-lg-block">
                                <br>
                                <button class="btn btn-danger" onclick="clearSearch();">
                                    ล้างการค้นหา
                                </button>
                            </div>

                            <div class="col-md-2 col-6 d-block d-md-none" style="margin-top:8px;">
                                <br>
                                <button class="btn btn-danger" onclick="clearSearch();">
                                    ล้างการค้นหา
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card radius-10 " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center" style="margin-top:10px;">
                <div class="col-6">
                    <h5 class="font-weight-bold mb-0">
                        @if (!empty($name_area))
                            ขอความช่วยเหลือในพื้นที่ {{ $name_area }}
                        @else
                            ขอความช่วยเหลือ
                        @endif
                    </h5>
                </div>
                <div class="col-6">
                    <div style="float: right;">ขอความช่วยเหลือในเดือนที่ค้นหา : <b>{{ $total }}</b> ครั้ง</div>
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
        <div class="d-none d-lg-block " id="chartpc"></div>
        <div class="d-block d-md-none"id="chart1111">
            <div id="chartmobileam"></div>
        </div>
        <div class="d-block d-md-none" id="chart2222">
            <div id="chartmobilepm"></div>
        </div>

    </div> --}}
    <div class="card radius-10 pt-4" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="d-flex align-items-center" style="margin-top:10px;">
            <div class="col-4" style="padding-left:1.5rem;">
                <h5 id="text_area_repair_chart" class="font-weight-bold mb-0">

                </h5>
            </div>
            <div class="col-3">
                <h5 id="text_year_repair_chart" class="font-weight-bold mb-0">

                </h5>
            </div>
            <div class="col-3">
                <h5 id="text_month_repair_chart" class="font-weight-bold mb-0">

                </h5>
            </div>
            {{-- <div class="col-6">
                <div style="float: right;">ขอความช่วยเหลือในเดือนที่ค้นหา : <b>{{ $total }}</b> ครั้ง</div>
            </div> --}}
        </div>
        <div class="d-none d-lg-block " id="chartpc"></div>
    </div>

<!-- ใช้ CDN APEX CHART-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/th.js"></script>

<script>
    let partner_id = '{{ $data_partner->id }}';
    document.addEventListener('DOMContentLoaded', function() {
        dataSearch();
    });
</script>

<script>
    // ฟังก์ชันล้างการค้นหา
    function clearSearch() {
        // ตั้งค่าทุกตัวเลือกให้เป็นค่าเริ่มต้น
        document.getElementById('select_area').value = "";
        document.getElementById('select_year').value = "";
        document.getElementById('select_month').value = "";

        document.getElementById('text_area_repair_chart').innerHTML = "การแจ้งซ่อมพื้นที่ทั้งหมด";
        document.getElementById('text_year_repair_chart').innerHTML = "ปี : --";
        document.getElementById('text_month_repair_chart').innerHTML = "เดือน : --";
        // เรียกฟังก์ชัน createDataRepair() หลังจากล้างค่าต่างๆ
        createDataRepair(null,null,null);
    }

    function dataSearch () {
        // รับค่าจาก select elements
        let selectArea = document.getElementById('select_area');
        let selectYear = document.getElementById('select_year').value;
        let selectMonth = document.getElementById('select_month').value;

        if (selectArea.value) {
            let selectedOption = selectArea.options[selectArea.selectedIndex];
            let areaName = selectedOption.getAttribute('name_area'); // ดึงค่า attribute name_area

            document.querySelector('#text_area_repair_chart').innerHTML = "การแจ้งซ่อม : " + areaName;
        }else{
            document.querySelector('#text_area_repair_chart').innerHTML = "การแจ้งซ่อม : พื้นที่ทั้งหมด";
        }
        if (selectYear) {
            document.querySelector('#text_year_repair_chart').innerHTML = "ปี : " + selectYear;
        }else{
            document.querySelector('#text_year_repair_chart').innerHTML = "ปี : --";
        }
        if (selectMonth) {
            document.querySelector('#text_month_repair_chart').innerHTML = "เดือน : " + selectMonth;
        }else{
            document.querySelector('#text_month_repair_chart').innerHTML = "เดือน : --";
        }

        createDataRepair(selectArea.value,selectYear,selectMonth);
    }

    async function createDataRepair(selectArea,selectYear,selectMonth) {

        console.log(selectArea);
        console.log(selectYear);
        console.log(selectMonth);

        // กำหนดค่าเป็น null ถ้าไม่ได้เลือก (เลือกค่าที่เป็นค่าเริ่มต้น "" หรือไม่เลือก)
        if (selectArea === "") selectArea = null;
        if (selectYear === "") selectYear = null;
        if (selectMonth === "") selectMonth = null;

        try {
            // ส่งข้อมูลไปยัง server ด้วย fetch
            let response = await fetch("{{ url('/') }}/api/create_data_time_repair", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    partner_id: partner_id,
                    area_id: selectArea,
                    year: selectYear,
                    month: selectMonth
                })
            });

            // ตรวจสอบการตอบกลับจาก server
            if (!response.ok) {
                throw new Error('ไม่สามารถเชื่อมต่อกับ server');
            }

            // แปลงข้อมูลที่ได้รับเป็น JSON
            let data = await response.json();
            console.log('ผลลัพธ์จาก server');
            console.log(data);

            document.querySelector('#chartpc').innerHTML = "";

             // ดึงค่าช่วงเวลา (AM/PM) จาก datetime_command
            let amData = Array(12).fill(null); // เตรียม array สำหรับเวลา AM (00:00 - 11:00)
            let pmData = Array(12).fill(null); // เตรียม array สำหรับเวลา PM (12:00 - 23:00)

            Object.keys(data).forEach((key) => {
                // ข้าม key "count"
                if (key === "count") return;

                const item = data[key];
                const datetime = new Date(item.datetime_command); // แปลงเป็นวันที่
                const hour = datetime.getHours(); // ดึงชั่วโมง

                // แยกข้อมูล AM และ PM
                if (hour < 12) {
                    amData[hour] = (amData[hour] || 0) + 1; // เพิ่มข้อมูลในช่วง AM
                } else {
                    pmData[hour - 12] = (pmData[hour - 12] || 0) + 1; // เพิ่มข้อมูลในช่วง PM
                }
            });

            // let amData = [30, 40, 35, 50, 49, 60, 70, 91, 125, 155, 170, 200]; // ตัวอย่างค่า AM (จาก 00:00 ถึง 11:00)
            // let pmData = [120, 110, 150, 170, 190, 210, 240, 250, 290, 300, 350, 400]; // ตัวอย่างค่า PM (จาก 12:00 ถึง 23:00)

            // ออปชั่นของกราฟ
            let options = {
                series: [{
                    name: 'AM',
                    data: amData
                },
                {
                    name: 'PM',
                    data: pmData
                }],
                chart: {
                    height: 400,
                    type: 'area'
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    // curve: 'straight',
                    curve: 'smooth',
                },
                xaxis: {
                    type: 'category',
                    categories: [
                        "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00",
                        "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"
                    ]
                },
                tooltip: {
                    x: {
                        format: 'HH:mm'
                    }
                },
                };

            // สร้างกราฟ
            let chart = new ApexCharts(document.querySelector("#chartpc"), options);
            chart.render();

            document.querySelector('#maintain_count').innerHTML = data['count'];

            // คุณสามารถดำเนินการกับข้อมูลที่ได้รับจาก server ที่นี่ เช่นอัปเดต DOM เป็นต้น

        } catch (error) {
            console.error('ข้อผิดพลาด:', error);
        }
    }
</script>


@endsection
