<style>
    @media screen and (min-width: 1024px) {
        .image_size{
            width: 100px;
        }
    }
    @media screen and (max-width: 1024px) {
        .image_size{
            width: 50px;
        }
    }
</style>

<h4 class="text-dark font-weight-bold mt-5">ข้อมูลหน่วยปฏิบัติการ</h4>
<hr>
<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!--คะแนนเฉลี่ยของหน่วย 5 อันดับ -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">คะแนนเฉลี่ยของหน่วย {{count($avg_score_unit_data)}} อันดับ</h5>
                    </div>
                    <!-- ตัวอย่างปุ่มสลับ -->
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item btn" onclick="top5_score_unit_toggleDataBtn('least_data')">มากสุด 5 อันดับ</a>
                            <a class="dropdown-item btn" onclick="top5_score_unit_toggleDataBtn('most_data')">น้อยสุด 5 อันดับ</a>
                            <hr>
                            <a class="dropdown-item btn" href="{{ url('/dashboard_1669_all_score_unit') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table id="top5_score_unit_table" class="table align-middle mb-0" >
                        <thead class="fz_header">
                            <tr>
                                <th>ชื่อหน่วย</th>
                                <th>คะแนน</th>
                            </tr>
                        </thead>
                        <tbody id="top5_score_unit_tbody" class="fz_body">
                            @foreach ($avg_score_unit_data as $top5_score_unit)
                                <tr role="row" class="odd">
                                    <td>
                                        <div class="d-flex align-items-center p-2">
                                            <div>{{$top5_score_unit->operating_unit->name ? $top5_score_unit->operating_unit->name : "--"}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="ms-auto mb-0 ">
                                            <i class="bx bxs-star text-warning mr-1"></i>{{$top5_score_unit->avg_score_total}}
                                        </p>
                                    </td>
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
                <div class="col-10">
                    <h5 class="mb-0 font-weight-bold">ระดับหน่วยปฏิบัติการทั้งหมด</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="p-2">
                    <div id="chartlevel_op"></div>
                </div>
            </div>
        </div>
    </div>
    <!--จำนวนยานพาหนะทั้งหมด  -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class=" p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">จำนวนยานพาหนะทั้งหมด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item btn" onclick="downloadImage('all_vehicel_div')">Save PNG</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="all_vehicel_div" class="mb-3 p-3">
                @foreach ($vehicle_arr as $vehicle_arr)
                    @php
                        $color_benotified;
                        switch ( $vehicle_arr['vehicle_type'] ) {
                            case 'รถ':
                                $color_benotified = "#dc3545";
                                $vehicle_icon = 'car_img.png';
                                break;
                            case 'อากาศยาน':
                                $color_benotified = "#0d6efd";
                                $vehicle_icon = 'helicopter.png';

                                break;
                            case 'เรือ ป.1':
                                $color_benotified = "#198754";
                                $vehicle_icon = 'ship1.png';

                                break;
                            case 'เรือ ป.2':
                                $color_benotified = "#0dcaf0";
                                $vehicle_icon = 'ship2.png';

                                break;
                            case 'เรือ ป.3':
                                $color_benotified = "#ffc107";
                                $vehicle_icon = 'ship3.png';

                                break;
                            case 'เรือประเภทอื่นๆ':
                                $color_benotified = "#f48024";
                                $vehicle_icon = 'ship4.png';

                                break;
                            default:
                                $color_benotified = "#212529";
                                $vehicle_icon = 'warning.png';

                                break;
                        }

                        // % ของผู้ใช้เดือนนี้
                        $percent_vehicle_arr = ($vehicle_arr['count_vehicle_type'] / $count_vehicle_all) * 100;
                        $percent_vehicle_arr = number_format($percent_vehicle_arr,0);

                    @endphp

                    <div class="row mb-4">
                        <div class="col-2 mt-2 text-center">
                            <img src="{{ asset("/img/icon/$vehicle_icon") }}" width="35">
                        </div>
                        <div class="col-9">
                            <p class="mb-2" style="font-weight: bold; font-size: 16px">{{ $vehicle_arr['vehicle_type'] }}<strong class="float-end">{{ $vehicle_arr['count_vehicle_type'] }}</strong></p>
                            <div class="progress radius-10" style="height:6px;">
                                <div class="progress-bar bg-gradient-moonlit" role="progressbar" style="width: {{$percent_vehicle_arr}}%"></div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <canvas id="canvas" style="display: none;"></canvas>
        </div>
    </div>

</div>

<!--============= 2 card -- 5-7  ================-->

<div class="row mb-4">
    <!--======= คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ col-5 ============-->
    <div class="col-12 col-lg-5 mb-2">
        <div class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0" >คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด {{count($avg_score_by_case)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item btn " onclick="avg_score_by_case_toggleDataBtn('least_data')">มากสุด 5 อันดับ</a>
                            <a class="dropdown-item btn " onclick="avg_score_by_case_toggleDataBtn('most_data')">น้อยสุด 5 อันดับ</a>
                            <hr>
                            <a class="dropdown-item btn " href="{{ url('/dashboard_1669_all_average_score_by_case') }}">ดูข้อมูลเพิ่มเติม</a>

                            <!-- <button id="top5_score_unit_toggleDataBtn" class="btn btn-primary">สลับข้อมูล</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table id="avg_score_by_case_table" class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>ชื่อหน่วย</th>
                                <th>คะแนนเฉลี่ยต่อเคส</th>
                            </tr>
                        </thead>
                        <tbody id="avg_score_by_case_tbody">
                            @foreach ($avg_score_by_case as $avg_score_by_case)
                                <tr>
                                    <td>
                                        @php
                                            $data_user_avg_score_by_case = App\User::where('id',$avg_score_by_case->helper_id)->first();
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($data_user_avg_score_by_case->photo))
                                                    <img src="{{ url('storage') }}/{{ $data_user_avg_score_by_case->photo }}" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                                @if(empty($data_user_avg_score_by_case->photo) && !empty($data_user_avg_score_by_case->avatar))
                                                    <img src="{{ $data_user_avg_score_by_case->avatar }}" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                                @if(empty($data_user_avg_score_by_case->avatar) && empty($data_user_avg_score_by_case->photo))
                                                    <img src="{{ asset('/Medilab/img/icon.png') }}" width="35" height="35" class="rounded-circle" alt="">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <span class="mt-2 font-14">{{$avg_score_by_case->operating_officer->name_officer}}</span>
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
    <!--======= รายชื่อหน่วยปฏิบัติการ col-7 ============-->
    <div class="col-12 col-lg-7 mb-2">
        <div class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0" >รายชื่อหน่วยปฏิบัติการ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/data_1669_operating_unit') }}">ดูข้อมูลหน่วยทั้งหมด</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>ชื่อหน่วย</th>
                                <th>จำนวนสมาชิก</th>
                                <th>จำนวนออกปฏิบัติการ</th>
                                <th>ลงทะเบียนมาแล้วกี่วัน</th>
                                <th>คะแนนเฉลี่ย</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operating_unit_data as $operating_unit_data)
                                <tr>
                                    @php
                                        $count_amount_operator = App\Models\Data_1669_operating_officer::where('operating_unit_id',$operating_unit_data->operating_unit_id)->count();
                                    @endphp
                                    <td>{{$operating_unit_data->op_name}}</td>
                                    <td>{{$count_amount_operator}}</td>
                                    <td>{{$operating_unit_data->count_operating}}</td>
                                    @if (!empty($operating_unit_data->created_at))
                                        <td> {{ \Carbon\Carbon::parse($operating_unit_data->op_lastest)->locale('th')->diffForHumans() }}</td>
                                    @else
                                        <td> -- </td>
                                    @endif
                                    <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{$operating_unit_data->avg_score_by_unit}}</p></td>
                                    <td >
                                        <a href="{{ url('/data_1669_operating_unit'). '/' . $operating_unit_data->operating_unit_id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
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

<!-- ติดตั้ง html2canvas ผ่าน CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>



<script>
    // document.document.querySelector('.top5_score_unit_toggleDataBtn').addEventListener('click', () => {
    function top5_score_unit_toggleDataBtn(filter_data) {

        let user_login = '{{Auth::user()->sub_organization}}';
        let tbody = document.getElementById('top5_score_unit_tbody');

        // ดึงข้อมูลผ่าน Fetch API จากหลังบ้าน
        fetch("{{ url('/') }}/api/top5_score_unit" + '/' + filter_data + '/' + user_login)
            .then(response => response.json()) // แปลงข้อมูลเป็น JSON
            .then(data => {
                console.log(data);
                // หาตารางที่มี id เท่ากับ 'top5_score_unit_table'
                const table = document.getElementById('top5_score_unit_table').getElementsByTagName('tbody')[0];
                // ล้างข้อมูลในตาราง
                table.innerHTML = '';

                let data_table;
                // สร้างแถวและเพิ่มข้อมูลในตาราง
                data.forEach(top5_score_unit => {

                    data_table = `
                        <tr role="row" class="odd">
                            <td>
                                <div class="d-flex align-items-center p-2">
                                    <div>`+ top5_score_unit.name_unit +`</div>
                                </div>
                            </td>
                            <td>
                                <p class="ms-auto mb-0">
                                    <i class="bx bxs-star text-warning mr-1"></i>`+ top5_score_unit.avg_score_total +`
                                </p>
                            </td>
                        </tr>
                    `;

                    tbody.insertAdjacentHTML('afterbegin', data_table); // แทรกบนสุด
                });

            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
            });
    };
</script>

<script>
    // document.document.querySelector('.top5_score_unit_toggleDataBtn').addEventListener('click', () => {
    function avg_score_by_case_toggleDataBtn(filter_data) {

        let user_login = '{{Auth::user()->sub_organization}}';
        let tbody = document.getElementById('avg_score_by_case_tbody');

        // ดึงข้อมูลผ่าน Fetch API จากหลังบ้าน
        fetch("{{ url('/') }}/api/avg_score_by_case" + '/' + filter_data + '/' + user_login)
            .then(response => response.json()) // แปลงข้อมูลเป็น JSON
            .then(data => {
                console.log(data);
                // หาตารางที่มี id เท่ากับ 'top5_score_unit_table'
                const table = document.getElementById('avg_score_by_case_table').getElementsByTagName('tbody')[0];
                // ล้างข้อมูลในตาราง
                table.innerHTML = '';

                let data_table;
                // สร้างแถวและเพิ่มข้อมูลในตาราง
                data.forEach(avg_score_by_case => {

                    let htmlProfile = '';
                    if(avg_score_by_case.photo){
                        htmlProfile = `<img src="{{ url('storage') }}/`+avg_score_by_case.photo +`" width="35" height="35" class="rounded-circle" alt="">`;
                    }
                    else if(!avg_score_by_case.photo && avg_score_by_case.avatar){
                        htmlProfile = `<img src="`+avg_score_by_case.avatar +`" width="35" height="35" class="rounded-circle" alt="">`;
                    }
                    else if(!avg_score_by_case.photo && !avg_score_by_case.avatar){
                        htmlProfile = `<img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">`;
                    }

                    data_table = `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">`+ htmlProfile +`</div>
                                    <div class="ms-2">
                                        <h6 class="mt-2 font-14">`+ avg_score_by_case.name_officer +`</h6>
                                    </div>
                                </div>
                            </td>
                            <td>`+ avg_score_by_case.name_unit +`</td>
                            <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> `+ avg_score_by_case.avg_score_by_case +`</p></td>
                        </tr>
                    `;

                    tbody.insertAdjacentHTML('afterbegin', data_table); // แทรกบนสุด
                });

            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
            });
    };
</script>

<script>
    let lv_op_count_arr = [];
    let lv_op_categories_arr = [];
    let lv_op_color_arr = [];

    @foreach ($level_op_arr as $item)
        // นับจำนวน หัวข้อ
        lv_op_count_arr.push(Number('{{ $item['count_level_op'] }}'));

        // นับประเภท หัวข้อ
        lv_op_categories_arr.push('{{ $item['level'] }}');

        switch ('{{ $item['level'] }}') {
            case 'ALS':
                lv_op_color_arr.push("#dc3545");
                break;
            case 'ILS':
                lv_op_color_arr.push("#f48024");
                break;
            case 'BLS':
                lv_op_color_arr.push("#ffc107");
                break;
            case 'FR':
                lv_op_color_arr.push("#28a745");
                break;
            default:
                lv_op_color_arr.push("#121416");
                break;
        }

    @endforeach

    var options = {
        series: [{
            data: lv_op_count_arr
        }],
        chart: {
            height: 350,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                //   console.log(chart, w, e)
                }
            }
        },
        colors: lv_op_color_arr,
        plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',

            },
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: lv_op_categories_arr,
                labels: {
                    style: {
                    colors: lv_op_color_arr,
                    fontSize: '16px',
                    fontWeight: 'bold',
                    }
                }
            },
        yaxis: {
            labels: {
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold'
                }
            }
        }
    };

        var chart = new ApexCharts(document.querySelector("#chartlevel_op"), options);
        chart.render();
</script>

<script src="https://unpkg.com/modern-screenshot"></script>
    <script>
        function downloadImage(id_div) {
            setTimeout(() => {
                const targetElement = document.querySelector('#'+id_div);
                targetElement.style.backgroundColor = 'white';

                modernScreenshot.domToPng(targetElement).then(dataUrl => {
                    const link = document.createElement('a')
                    link.download = 'จำนวนยานพาหนะทั้งหมด.png'
                    link.href = dataUrl
                    link.click()
                })
            }, 500);
        }
    </script>



