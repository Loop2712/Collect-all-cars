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
                            <b>Check in</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="#" type="button" class="btn btn-sm btn-info text-white">
                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                        </a>
                        <!-- <a href="#" type="button" class="btn btn-sm btn-info text-white">
                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                        </a> -->

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In1" aria-expanded="true" aria-controls="collapse_By_Check_In1" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : ทั้งหมด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In2" aria-expanded="true" aria-controls="collapse_By_Check_In2" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : ViiCHECK พระนครศรีอยุธยา
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In3" aria-expanded="true" aria-controls="collapse_By_Check_In3" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : ViiCHECK จตุจักร
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In4" aria-expanded="true" aria-controls="collapse_By_Check_In4" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : ViiCHECK นครนายก
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In5" aria-expanded="true" aria-controls="collapse_By_Check_In5" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : วีเช็ค (ทดสอบ)
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_By_Check_In6" aria-expanded="true" aria-controls="collapse_By_Check_In6" href="javaScript:;" class="dropdown-item">
                                    พื้นที่ : ทดสอบ กรุงเทพ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  พื้นที่ : ทั้งหมด -->
            <div id="collapse_By_Check_In1" class="collapse show" data-parent="#accordion_ByCheckIn">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="mt-2">
                                <h5 class="text-center">พื้นที่ : ทั้งหมด</h5>
                            </div>
                            <div class="row p-3 mb-3 ps ps--active-y">
                                <div class="col-2">
                                    <div class="card radius-10 border shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary">จำนวนการเข้าพื้นที่</p>
                                                    <h4 class="mb-0">24,550</h4>
                                                </div>
                                                <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-category"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card radius-10 border shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary">คนที่เกิดเดือนนี้</p>
                                                    <h4 class="mb-0">98</h4>
                                                </div>
                                                <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-category"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card radius-10 border shadow-none">
                                        <div class="card-body">
                                            <div class=" row">
                                                <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                                    <div>
                                                        <p class="mb-0 text-success">วันที่เข้ามากที่สุด</p>
                                                        <h4 class="mb-0">เสาร์</h4>
                                                    </div>
                                                    <div class="count_checkin_number bg-gradient-lush text-white text-weight-bold">666
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                                    <div>
                                                        <p class="mb-0 text-danger">วันที่เข้าน้อยที่สุด</p>
                                                        <h4 class="mb-0">จันทร์</h4>
                                                    </div>
                                                    <div class="count_checkin_number bg-gradient-burning text-white text-weight-bold">150
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card radius-10 border shadow-none">
                                        <div class="card-body">
                                            <div class=" row">
                                                <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 " style="border-right: 1px solid rgb(216, 208, 208)">
                                                    <div>
                                                        <p class="mb-0 text-success">เวลาที่เข้ามากที่สุด</p>
                                                        <h4 class="mb-0">15.00 น.</h4>
                                                    </div>
                                                    <div class="count_checkin_number bg-gradient-lush text-white text-weight-bold">88
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-around col-12 col-lg-6 ">
                                                    <div>
                                                        <p class="mb-0 text-danger">เวลาที่เข้าน้อยที่สุด</p>
                                                        <h4 class="mb-0">10.30 น.</h4>
                                                    </div>
                                                    <div class="count_checkin_number bg-gradient-burning text-white text-weight-bold">22
                                                    </div>
                                                </div>
                                            </div>
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
<div id="area_viinews" class="bg-transparent">
    <h3 class="font-weight-bold mb-1">พื้นที่ : รวม</h3>
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
    let series_array = [];
    let timeObject = [];

    console.log("Here We Go");

    @foreach ($all_data_partner as $item)

        let dataObject = {
                name: '{{$item->name_area}}',
                data: [
                    array.forEach(element => {

                    });
                ]
            };
            series_array.push(dataObject);
            timeObject.push('{{$item->time_in}}');
    @endforeach

    var options = {
        series: series_array,
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
            type: 'datetime',
            categories: timeObject
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


<script>
    // document.document.querySelector('.top5_score_unit_toggleDataBtn').addEventListener('click', () => {
    function select_area_data(filter_data) {

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


