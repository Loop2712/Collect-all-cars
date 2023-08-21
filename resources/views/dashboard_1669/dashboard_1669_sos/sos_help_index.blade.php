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
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 ">ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_case_sos_show') }}">ข้อมูลการช่วยเหลือเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>ชื่อผู้ขอความช่วยเหลือ</th>
                                <th>ชื่อเจ้าหน้าที่สั่งการ</th>
                                <th>ชื่อเจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                <th>ชื่อหน่วยปฏิบัติการ</th>
                                <th>ระยะเวลาในการช่วยเหลือ</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data_sos as $all_data_sos)
                            <tr>
                                <!-- รหัสเคส -->
                                <td>{{ $all_data_sos->operating_code ? $all_data_sos->operating_code : "--"}}</td>
                                <!-- ชื่อผู้ขอความช่วยเหลือ -->
                                <td>
                                    @if( !empty($all_data_sos->name_user) )
                                        {{ $all_data_sos->name_user }}
                                    @else
                                        @php
                                            $command_create = App\Models\Data_1669_officer_command::where('id',$all_data_sos->command_by)->first();
                                            $name_command_create = $command_create->name_officer_command ;
                                        @endphp
                                        {{ $name_command_create }} (เจ้าหน้าที่)
                                    @endif
                                </td>
                                <!-- ชื่อเจ้าหน้าที่สั่งการ -->
                                @if (!empty($all_data_sos->command_by))
                                    <td>{{ $all_data_sos->officers_command_by->name_officer_command ? $all_data_sos->officers_command_by->name_officer_command : "--"}}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <!-- ชื่อเจ้าหน้าที่หน่วยปฏิบัติการ -->
                                @if (!empty($all_data_sos->helper_id))
                                    <td> {{ $all_data_sos->operating_officer->name_officer}} </td>
                                @else
                                    <td> -- </td>
                                @endif
                                <!-- ชื่อหน่วยปฏิบัติการ -->
                                @if (!empty($all_data_sos->operating_unit_id))
                                    <td>{{ $all_data_sos->operating_unit->name ? $all_data_sos->operating_unit->name : "--"}}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <!-- ระยะเวลาในการช่วยเหลือ -->
                                @php
                                    if(!empty($all_data_sos->time_sos_success)){
                                        $all_data_sos_time_sos_success = strtotime($all_data_sos->time_sos_success);
                                        $all_data_sos_time_command = strtotime($all_data_sos->time_command);

                                        $all_data_sos_timeDifference = abs($all_data_sos_time_sos_success - $all_data_sos_time_command);

                                        if ($all_data_sos_timeDifference >= 3600) {
                                            $all_data_sos_hours = floor($all_data_sos_timeDifference / 3600);
                                            $all_data_sos_remainingMinutes = floor(($all_data_sos_timeDifference % 3600) / 60);
                                            $all_data_sos_remainingSeconds = $all_data_sos_timeDifference % 60;

                                            $all_data_sos_time_unit = $all_data_sos_hours . ' ชั่วโมง ' . $all_data_sos_remainingMinutes . ' นาที ' . $all_data_sos_remainingSeconds . ' วินาที';
                                        } elseif ($all_data_sos_timeDifference >= 60) {
                                            $all_data_sos_minutes = floor($all_data_sos_timeDifference / 60);
                                            $all_data_sos_seconds = $all_data_sos_timeDifference % 60;
                                            $all_data_sos_time_unit = $all_data_sos_minutes . ' นาที ' . $all_data_sos_seconds . ' วินาที';
                                        } else {
                                            $all_data_sos_time_unit = $all_data_sos_timeDifference . ' วินาที';
                                        }
                                    }else{
                                        $all_data_sos_time_unit  = "--";
                                    }
                                @endphp
                                <td>{{ $all_data_sos_time_unit}}</td>
                                <!-- สถานะ -->
                                <td>{{ $all_data_sos->status ? $all_data_sos->status : "--"}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

<!--======= คะแนนการช่วยเหลือต่อเคส 5 อันดับ ============-->
<div class="row mb-4">
    <div class="col-7 d-flex align-items-stretch">
        <div class="row w-100">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">เวลาในการช่วยเหลือ ไว ที่สุด {{ count($data_sos_fastest_5) }} อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
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
                                    if(!empty($data_sos_fastest_5->time_sos_success)){
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
                                    }else{
                                        $sos_fastest_5_time_unit  = "--";
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{ $data_sos_fastest_5->operating_code ? $data_sos_fastest_5->operating_code : "--"}}</td>
                                        <td>{{ $data_sos_fastest_5->address ? $data_sos_fastest_5->address : "--"}}</td>
                                        <td>{{ $data_sos_fastest_5->name_helper ? $data_sos_fastest_5->name_helper : "--"}}</td>
                                        <td>{{ $data_sos_fastest_5->organization_helper ? $data_sos_fastest_5->organization_helper : "--"}}</td>
                                        <td>{{ $sos_fastest_5_time_unit }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-danger">เวลาในการช่วยเหลือ ช้า ที่สุด {{ count($data_sos_slowest_5) }} อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
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
                                    if(!empty($data_sos_slowest_5->time_sos_success)){

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
                                    }else{
                                        $time_unit  = "--";
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{ $data_sos_slowest_5->operating_code ? $data_sos_slowest_5->operating_code : "--"}}</td>
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
    </div>
    <div class="col-5 d-flex align-items-stretch">
        <!-- การปฏิบัติการ -->
        <div class="card radius-10 w-100">
            <div class="card-body w-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-12  ">
                        <h5 class="mb-0 font-weight-bold"> การปฏิบัติการ</h5>
                    </div>
                </div>
                <div class="p-2 h-100">
                    <div id="operation"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-5 d-flex align-items-stretch">
        <!--พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
        <div class="card radius-10 w-100">
            <div class="d-flex align-items-center m-3">
                <div class="col-10">
                    <h5 class="mb-1 font-weight-bold">พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="w-100 h-100">
                    <div id="Top5_Area_SOS"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7 d-flex align-items-stretch">
        <div class="row w-100">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">คะแนนการช่วยเหลือต่อเคส มาก ที่สุด {{ count($data_sos_score_best_5) }} อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body p-3 pt-0">
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
                                        <td>{{ $sos_score_best_5->operating_code ? $sos_score_best_5->operating_code : "--"}}</td>
                                        <td>{{ $sos_score_best_5->address ? $sos_score_best_5->address : "--"}}</td>
                                        <td>{{ $sos_score_best_5->name_helper ? $sos_score_best_5->name_helper : "--"}}</td>
                                        <td>{{ $sos_score_best_5->organization_helper ? $sos_score_best_5->organization_helper : "--"}}</td>
                                        <td>
                                            <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_best_5->score_total ? $sos_score_best_5->score_total : "--"}}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-danger">คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด {{ count($data_sos_score_worst_5) }} อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body p-3 pt-0">
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
                                        <td>{{ $sos_score_worst_5->operating_code ? $sos_score_worst_5->operating_code : "--"}}</td>
                                        <td>{{ $sos_score_worst_5->address ? $sos_score_worst_5->address : "--"}}</td>
                                        <td>{{ $sos_score_worst_5->name_helper ? $sos_score_worst_5->name_helper : "--"}}</td>
                                        <td>{{ $sos_score_worst_5->organization_helper ? $sos_score_worst_5->organization_helper : "--"}}</td>
                                        <td>
                                            <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_worst_5->score_total ? $sos_score_worst_5->score_total : "--"}}</p>
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
    </div>
    <!-- <div class="col-12 col-lg-6">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 text-success">คะแนนการช่วยเหลือต่อเคส มาก ที่สุด {{ count($data_sos_score_best_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
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
                                <td>{{ $sos_score_best_5->operating_code ? $sos_score_best_5->operating_code : "--"}}</td>
                                <td>{{ $sos_score_best_5->address ? $sos_score_best_5->address : "--"}}</td>
                                <td>{{ $sos_score_best_5->name_helper ? $sos_score_best_5->name_helper : "--"}}</td>
                                <td>{{ $sos_score_best_5->organization_helper ? $sos_score_best_5->organization_helper : "--"}}</td>
                                <td>
                                    <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_best_5->score_total ? $sos_score_best_5->score_total : "--"}}</p>
                                </td>
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
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 text-danger">คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด {{ count($data_sos_score_worst_5) }} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
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
                                <td>{{ $sos_score_worst_5->operating_code ? $sos_score_worst_5->operating_code : "--"}}</td>
                                <td>{{ $sos_score_worst_5->address ? $sos_score_worst_5->address : "--"}}</td>
                                <td>{{ $sos_score_worst_5->name_helper ? $sos_score_worst_5->name_helper : "--"}}</td>
                                <td>{{ $sos_score_worst_5->organization_helper ? $sos_score_worst_5->organization_helper : "--"}}</td>
                                <td>
                                    <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>{{ $sos_score_worst_5->score_total ? $sos_score_worst_5->score_total : "--"}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> -->
</div>
<!-- Column CHART พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
<script>
    let series_arr = [];
    let categories_arr = [];
    let i_count = 0;
    let i_name = 0;

    @foreach ($count_area as $item)
        if(i_count < 5){
            series_arr.push(Number('{{ $item }}'));
        }
        i_count++;
    @endforeach

    @foreach ($name_area as $item)
        if(i_name < 5){
            categories_arr.push('{{ $item }}');
        }
        i_name++;
    @endforeach

    var options = {
            series: [{
            data: series_arr
        }],
            chart: {
            type: 'bar',
            height: '100%',
            width: '100%'
        },
        plotOptions: {
            bar: {
                barHeight: '100%',
                distributed: true,
                horizontal: true,
                dataLabels: {
                    position: 'bottom'
                },
            }
        },
        colors: ['#33b2df',  '#d4526e',  '#f48024',  '#f9a3a4', '#90ee7e',],
        dataLabels: {
            enabled: true,
            textAnchor: 'start',
            style: {
                fontSize: '16px',
                colors: ['#000']
            },
            formatter: function (val, opt) {
                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
            },
            offsetX: 0,
            dropShadow: {
            enabled: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: categories_arr,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            },
        },
        yaxis: {
            labels: {
            show: false
            }
        },
        legend: {
            fontSize: '16px',
            fontWeight: 'bold',
        },
        tooltip: {
            theme: 'dark',
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function () {
                    return ''
                    }
                }
            }
        }
    };

       var chart = new ApexCharts(document.querySelector("#Top5_Area_SOS"), options);
       chart.render();

</script>


<!-- Bar CHART การปฏิบัติการ -->
<script>
    let treatment_count_arr = [];
    let treatment_categories_arr = [];

    @foreach ($treatment_data as $item)
        // นับจำนวน หัวข้อ
        treatment_count_arr.push(Number('{{ $item->count_treatment }}'));

        // นับประเภท หัวข้อ
        treatment_categories_arr.push('{{ $item->treatment }}');

    @endforeach

    var options = {
        series: [{
            data: treatment_count_arr
        }],
        chart: {
            height: '100%',
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                //   console.log(chart, w, e)
                }
            }
        },
        colors: ['#0d6efd','#e62e2e'],
        plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
        },
        dataLabels: {
            enabled: true,
            distributed: false,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            },
            background: {
                borderRadius: 10,
            }
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: treatment_categories_arr,
            labels: {
                style: {
                    colors: '#000000',
                    fontSize: '16px',
                    fontWeight: 'bold',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#operation"), options);
    chart.render();

</script>