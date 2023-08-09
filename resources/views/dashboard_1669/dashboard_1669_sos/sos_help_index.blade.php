<!--================== 4 row card ======================-->

<div class="row row-cols-1 row-cols-md-4 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ขอความช่วยเหลือทั้งหมด</h5>
                        <h4 class="my-1 font-weight-bold">{{ count($data_sos) }}</h4>
                    </div>
                    <div class="text-primary ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/21.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/21.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ช่วยเหลือเสร็จสิ้น</h5>
                        <h4 class="my-1 font-weight-bold">{{ $count_sos_success }}</h4>
                    </div>
                    <div class="text-danger ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/18.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/18.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">กำลังดำเนินการ</h5>
                        <h4 class="my-1 font-weight-bold">{{ $count_sos_helping }}</h4>
                    </div>
                    <div class="text-warning ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/Flex/2.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/Flex/2.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ยังไม่ได้ดำเนินการ</h5>
                        <h4 class="my-1 font-weight-bold">{{ $count_sos_notReady }}</h4>
                    </div>
                    <div class="text-success ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/5.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/5.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======= ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด ============-->

<div class="row mb-4">
    <div class="col-12 col-lg-12">
        <div class="card radius-10 w-100 h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0 " >ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>

<!--======= คะแนนการช่วยเหลือต่อเคส 5 อันดับ ============-->
<div class="row mb-4">
    <div class="col-12 col-lg-6">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0 text-success" >คะแนนการช่วยเหลือต่อเคส มาก ที่สุด {{ count($data_sos_score_best_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>address</th>
                                <th>name_helper</th>
                                <th>organization_helper</th>
                                <th>คะแนน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sos_score_best_5 as $sos_score_best_5)
                                <tr>
                                    <td>{{ $sos_score_best_5->id ? $sos_score_best_5->id : "--"}}</td>
                                    <td>{{ $sos_score_best_5->address ? $sos_score_best_5->address : "--"}}</td>
                                    <td>{{ $sos_score_best_5->name_helper ? $sos_score_best_5->name_helper : "--"}}</td>
                                    <td>{{ $sos_score_best_5->organization_helper ? $sos_score_best_5->organization_helper : "--"}}</td>
                                    <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_best_5->score_total ? $sos_score_best_5->score_total : "--"}}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0 text-danger" >คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด {{ count($data_sos_score_worst_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>address</th>
                                <th>name_helper</th>
                                <th>organization_helper</th>
                                <th>คะแนน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sos_score_worst_5 as $sos_score_worst_5)
                                <tr>
                                    <td>{{ $sos_score_worst_5->id ? $sos_score_worst_5->id : "--"}}</td>
                                    <td>{{ $sos_score_worst_5->address ? $sos_score_worst_5->address : "--"}}</td>
                                    <td>{{ $sos_score_worst_5->name_helper ? $sos_score_worst_5->name_helper : "--"}}</td>
                                    <td>{{ $sos_score_worst_5->organization_helper ? $sos_score_worst_5->organization_helper : "--"}}</td>
                                    <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_worst_5->score_total ? $sos_score_worst_5->score_total : "--"}}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!--======= เวลาในการช่วยเหลือ 5 อันดับ ============-->
<div class="row mb-4">
    <div class="col-12 col-lg-6">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0 text-success" >เวลาในการช่วยเหลือ ไว ที่สุด {{ count($data_sos_fastest_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>address</th>
                                <th>name_helper</th>
                                <th>organization_helper</th>
                                <th>ระยะเวลารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sos_fastest_5 as $data_sos_fastest_5)

                            @php
                                $sos_fastest_5_time_sos_success = strtotime($data_sos_fastest_5->time_sos_success);
                                $sos_fastest_5_time_command = strtotime($data_sos_fastest_5->time_command);

                                $sos_fastest_5_timeDifference = abs($sos_fastest_5_time_sos_success - $sos_fastest_5_time_command);

                                if ($sos_fastest_5_timeDifference >= 3600) {
                                    $sos_fastest_5_hours = floor($sos_fastest_5_timeDifference / 3600);
                                    $sos_fastest_5_remainingMinutes = floor(($sos_fastest_5_timeDifference % 3600) / 60);
                                    $sos_fastest_5_remainingSeconds = $sos_fastest_5_timeDifference % 60;

                                    $sos_fastest_5_time_unit = $sos_fastest_5_hours . ' ชั่วโมง ' . $sos_fastest_5_remainingMinutes . ' นาที ' . $sos_fastest_5_remainingSeconds . ' วินาที';
                                } elseif ($sos_fastest_5_timeDifference >= 60) {
                                    $sos_fastest_5_minutes = floor($sos_fastest_5_timeDifference / 60);
                                    $sos_fastest_5_seconds = $sos_fastest_5_timeDifference % 60;

                                    $sos_fastest_5_time_unit = $sos_fastest_5_minutes . ' นาที ' . $sos_fastest_5_seconds . ' วินาที';
                                } else {
                                    $sos_fastest_5_time_unit = $sos_fastest_5_timeDifference . ' วินาที';
                                }

                            @endphp
                                <tr>
                                    <td>{{ $data_sos_fastest_5->id ? $data_sos_fastest_5->id : "--"}}</td>
                                    <td>{{ $data_sos_fastest_5->address ? $data_sos_fastest_5->address : "--"}}</td>
                                    <td>{{ $data_sos_fastest_5->name_helper ? $data_sos_fastest_5->name_helper : "--"}}</td>
                                    <td>{{ $data_sos_fastest_5->organization_helper ? $data_sos_fastest_5->organization_helper : "--"}}</td>
                                    <td >{{ $sos_fastest_5_time_unit }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0 text-danger" >เวลาในการช่วยเหลือ ช้า ที่สุด {{ count($data_sos_slowest_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>address</th>
                                <th>name_helper</th>
                                <th>organization_helper</th>
                                <th>ระยะเวลารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sos_slowest_5 as $data_sos_slowest_5)

                            @php
                                $time_sos_success = strtotime($data_sos_slowest_5->time_sos_success);
                                $time_command = strtotime($data_sos_slowest_5->time_command);

                                $timeDifference = abs($time_sos_success - $time_command);

                                if ($timeDifference >= 3600) {
                                    $hours = floor($timeDifference / 3600);
                                    $remainingMinutes = floor(($timeDifference % 3600) / 60);
                                    $remainingSeconds = $timeDifference % 60;

                                    $time_unit = $hours . ' ชั่วโมง ' . $remainingMinutes . ' นาที ' . $remainingSeconds . ' วินาที';
                                } elseif ($timeDifference >= 60) {
                                    $minutes = floor($timeDifference / 60);
                                    $seconds = $timeDifference % 60;

                                    $time_unit = $minutes . ' นาที ' . $seconds . ' วินาที';
                                } else {
                                    $time_unit = $timeDifference . ' วินาที';
                                }

                            @endphp
                            <tr>
                                <td>{{ $data_sos_slowest_5->id ? $data_sos_slowest_5->id : "--"}}</td>
                                <td>{{ $data_sos_slowest_5->address ? $data_sos_slowest_5->address : "--"}}</td>
                                <td>{{ $data_sos_slowest_5->name_helper ? $data_sos_slowest_5->name_helper : "--"}}</td>
                                <td>{{ $data_sos_slowest_5->organization_helper ? $data_sos_slowest_5->organization_helper : "--"}}</td>
                                <td>{{ $time_unit }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

