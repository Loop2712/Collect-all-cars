
<!--========================= เลือกพื้นที่ - ข้อมูลการช่วยเหลือ && คะแนนผู้ใช้เหลือ  =============================-->
<div class="row">
    <div class="card radius-10 overflow-hidden col-12 col-xl-4 col-xxl-4 d-flex">
        <div class="card-body mb-0">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">ข้อมูลการช่วยเหลือ</h5>
                </div>
            </div>
            <hr class="mb-0">
        </div>

        <div class="store-metrics p-3 mb-3 ps ps--active-y">

            <div class="card mt-3 radius-10 border shadow-none">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">ขอความช่วยเหลือ</p>

                            <span class="mb-0 h4">{{ $count_sos_all_data }}</span> <small>ครั้ง</small>
                        </div>
                        <div class="widgets-icons bg-light-primary text-primary ms-auto">
                            <img width="30" src="{{ asset('/img/icon/sos.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10 border shadow-none">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">เวลาช่วยเหลือเฉลี่ย</p>
                                 @php
                                    if(!empty($averageDifference)){
                                        if ($averageDifference >= 3600) {
                                            $sos_hours = floor($averageDifference / 3600);
                                            $sos_remainingMinutes = floor(($averageDifference % 3600) / 60);

                                            $sos_remainingSeconds = $averageDifference % 60;
                                            $sos_remainingSeconds = number_format($sos_remainingSeconds, 2);

                                            $sos_time_unit = $sos_hours . ' ชั่วโมง ' . $sos_remainingMinutes . ' นาที ' . $sos_remainingSeconds . ' วินาที';
                                        } elseif ($averageDifference >= 60) {
                                            $sos_minutes = floor($averageDifference / 60);
                                            $sos_seconds = $averageDifference % 60;
                                            $sos_seconds = number_format($sos_seconds, 2);

                                            $sos_time_unit = $sos_minutes . ' นาที ' . $sos_seconds . ' วินาที';
                                        } else {
                                            $sos_time_unit = number_format($averageDifference, 2) . ' วินาที';
                                        }
                                    }else{
                                        $sos_time_unit  = "0 วินาที";
                                    }
                                @endphp
                            <span class="mb-0 h4">{{ $sos_time_unit}}</span >
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto">
                            <img width="30" src="{{ asset('/img/icon/hourglass.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10 border shadow-none">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">ช่วงเวลาที่เกิดเหตุบ่อย</p>
                            <h4 class="mb-0" id="sos_maxTimeCounts"></h4>
                        </div>
                        <div class="widgets-icons bg-light-success text-success ms-auto">
                            <img width="30" src="{{ asset('/img/icon/fast-time.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10 border shadow-none">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">ช่วงเวลาที่เกิดเหตุน้อย</p>
                            <h4 class="mb-0" id="sos_minTimeCounts"></h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-info ms-auto">
                            <img width="30" src="{{ asset('/img/icon/slow.png') }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-xl-8 col-xxl-8 d-flex">
        <div class="card w-100 radius-10">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold ">การขอความช่วยเหลือในพื้นที่</h5>
                        <h2 class="mt-4 mb-1 font-weight-bold">{{$mostCommonDistrict}} <span class="text-danger">{{$countMostCommonDistrict}}</span>  ครั้ง </h2>
                        <p class="mb-0 text-secondary">{{$mostCommonDistrict}} เป็นพื้นที่ที่ขอความช่วยเหลือมากที่สุด</p>
                    </div>

                    <ul class="list-group mt-4 list-group-flush list-group-sos-province">
                        @foreach($orderedDistricts as $district => $count)
                        <li class="font-18 list-group-item d-flex align-items-center">
                            <span>{{$district}}</span>
                            <strong class="ms-auto">{{$count}}</strong>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="p-3">
                        <div class="" id="sos_map_organization">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======= ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด ============-->

<div class="row mb-4">
    <div class="col-12 col-lg-12">
        <div id="all_data_sos_lastest_10" class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 ">ข้อมูลการขอความช่วยเหลือ {{count($all_data_sos)}} ลำดับล่าสุด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos') }}" target="_blank">ข้อมูลการช่วยเหลือเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>สถานที่</th>
                                <th>ชื่อผู้ขอความช่วยเหลือ</th>
                                <th>ชื่อเจ้าหน้าที่</th>
                                <th>ชื่อหน่วยปฏิบัติการ</th>
                                <th>ระยะเวลาในการช่วยเหลือ</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data_sos as $all_data_sos)
                            <tr>
                                <!-- สถานที่ -->
                                <td>
                                    @if(!empty($all_data_sos->name) )
                                        {{ $all_data_sos->name_area }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <!-- ชื่อผู้ขอความช่วยเหลือ -->
                                <td>
                                    @if( !empty($all_data_sos->name) )
                                        {{ $all_data_sos->name }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <!-- ชื่อเจ้าหน้าที่ -->
                                @if (!empty($all_data_sos->helper))
                                    <td>{{ $all_data_sos->helper ? $all_data_sos->helper : "--"}}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <!-- ชื่อหน่วยปฏิบัติการ -->
                                @if (!empty($all_data_sos->organization_helper))
                                    <td>{{ $all_data_sos->organization_helper ? $all_data_sos->organization_helper : "--"}}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <!-- ระยะเวลาในการช่วยเหลือ -->
                                @php
                                    if(!empty($all_data_sos->help_complete_time) && !empty($all_data_sos->time_go_to_help)){
                                        $all_data_sos_time_sos_success = strtotime($all_data_sos->help_complete_time);
                                        $all_data_sos_time_command = strtotime($all_data_sos->time_go_to_help);

                                        $all_data_sos_timeDifference = abs($all_data_sos_time_sos_success - $all_data_sos_time_command);
                                        if ($all_data_sos_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                            $all_data_sos_days = floor($all_data_sos_timeDifference / 86400);
                                            $all_data_sos_remainingHours = floor(($all_data_sos_timeDifference % 86400) / 3600);

                                            $all_data_sos_time_unit = $all_data_sos_days . ' วัน ' . $all_data_sos_remainingHours . ' ชั่วโมง ';

                                        }elseif ($all_data_sos_timeDifference >= 3600) {
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
                                @if ($all_data_sos->help_complete == "Yes")
                                    <td class="text-success">เสร็จสิ้น</td>
                                @else
                                    <td class="text-danger">กำลังดำเนินการ</td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

<!--======= ข้อมูลผู้ใช้ที่เคยขอความช่วยเหลือ 10 ลำดับล่าสุด ============-->
<!-- Button trigger modal -->
<button id="btn_open_modal_cf_block_sos" type="button" class="d-none" data-toggle="modal" data-target="#modal_cf_block_sos"></button>

<!-- Modal -->
<div class="modal fade" id="modal_cf_block_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:999999!important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <button id="close_modal_cf_block_sos" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <!-- <div class="modal-header">
            <h5 class="modal-title" id="Label_cf_block_sos">โปรดยืนยัน</h5>
            </div> -->
            <div id="content_modal_cf_block_sos" class="modal-body">
                <!--  -->
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12 col-lg-12">
        <div id="amount_ten_data_sos_lastest" class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 ">ข้อมูลผู้ใช้ที่เคยขอความช่วยเหลือ {{count($amount_ten_data_sos)}} ลำดับล่าสุด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_used') }}" target="_blank">ข้อมูลการช่วยเหลือเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>ชื่อผู้ขอความช่วยเหลือ</th>
                                <th>จำนวนขอความช่วยเหลือ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amount_ten_data_sos as $amount_ten_sos)

                            <tr>
                                <!-- ชื่อผู้ขอความช่วยเหลือ -->
                                <td>
                                    @if( !empty($amount_ten_sos->user->name) )
                                        {{ $amount_ten_sos->user->name }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <!-- ชื่อเจ้าหน้าที่ -->
                                @if (!empty($amount_ten_sos->amount_sos))
                                    <td>{{ $amount_ten_sos->amount_sos ? $amount_ten_sos->amount_sos : "--"}}</td>
                                @else
                                    <td> -- </td>
                                @endif
                                <td class="text-end" id="block_sos_btn_{{$amount_ten_sos->user_id}}">
                                    @if (!empty($amount_ten_sos->user->block_sos))
                                        <span class="btn btn-secondary" onclick="confirm_block_sos('block','{{$amount_ten_sos->user_id}}','{{$amount_ten_sos->user->name}}')">ถูกระงับแล้ว</span>
                                    @else
                                        <span class="btn btn-danger" onclick="confirm_block_sos('free','{{$amount_ten_sos->user_id}}','{{$amount_ten_sos->user->name}}')">ระงับการใช้งาน</span>
                                    @endif
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

<!--========================= คะแนนผู้ช่วยเหลือ  =============================-->
<style>
    .product-list{
        overflow: auto;
    }
</style>

<div class="row row-cols-1 row-cols-lg-3">
    <div class="col-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100 ">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">เคสที่ช่วยเหลือเร็วที่สุด {{count($data_sos_fastest_5)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-list p-3 mb-3">
                @foreach ($data_sos_fastest_5 as $fastest_5)

                    @php
                        if(!empty($fastest_5->helper_id)){
                            $fastest_5_user = App\User::where('id',$fastest_5->helper_id)->first();
                        }else{
                            $fastest_5_user = "no_helper_id";
                        }


                        if(!empty($fastest_5->help_complete_time) && !empty($fastest_5->time_go_to_help)){
                            $sos_fastest_5_time_sos_success = strtotime($fastest_5->help_complete_time);
                            $sos_fastest_5_time_command = strtotime($fastest_5->time_go_to_help);

                            $sos_fastest_5_timeDifference = abs($sos_fastest_5_time_sos_success - $sos_fastest_5_time_command);
                            if ($sos_fastest_5_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                $sos_fastest_5_days = floor($sos_fastest_5_timeDifference / 86400);
                                $sos_fastest_5_hours = floor(($sos_fastest_5_timeDifference % 86400) / 3600);

                                $sos_fastest_5_time_unit = $sos_fastest_5_days . ' วัน ' . $sos_fastest_5_hours . ' ชั่วโมง ';

                            }elseif ($sos_fastest_5_timeDifference >= 3600) {
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

                    <div class="d-flex align-items-center py-3 border-bottom ">
                        <div class="product-img me-2">
                            @if ($fastest_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                            @if(!empty($fastest_5_user->avatar) && empty($fastest_5_user->photo))
                                <img src="{{ $fastest_5_user->avatar }}">
                            @endif
                            @if(!empty($fastest_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $fastest_5_user->photo }}">
                            @endif
                            @if(empty($fastest_5_user->avatar) && empty($fastest_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                        </div>
                        <div class="">
                            <h6 class="mb-0 font-14">{{ $fastest_5->helper ? $fastest_5->helper : "--"}}</h6>
                            <p class="mb-0">หน่วย : {{ $fastest_5->organization_helper ? $fastest_5->organization_helper : "--"}}</p>
                        </div>
                        <div class="ms-auto">
                            <h6 class="mb-0">{{ $sos_fastest_5_time_unit ? $sos_fastest_5_time_unit : "--"}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0" >เคสที่ช่วยเหลือเร็วที่สุด {{count($data_sos_fastest_5)}} อันดับ</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 mb-3">
                @foreach ($data_sos_fastest_5 as $fastest_5)

                    @php
                        if(!empty($fastest_5->helper_id)){
                            $fastest_5_user = App\User::where('id',$fastest_5->helper_id)->first();
                        }else{
                            $fastest_5_user = "no_helper_id";
                        }


                        if(!empty($fastest_5->help_complete_time) && !empty($fastest_5->time_go_to_help)){
                            $sos_fastest_5_time_sos_success = strtotime($fastest_5->help_complete_time);
                            $sos_fastest_5_time_command = strtotime($fastest_5->time_go_to_help);

                            $sos_fastest_5_timeDifference = abs($sos_fastest_5_time_sos_success - $sos_fastest_5_time_command);
                            if ($sos_fastest_5_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                $sos_fastest_5_days = floor($sos_fastest_5_timeDifference / 86400);
                                $sos_fastest_5_hours = floor(($sos_fastest_5_timeDifference % 86400) / 3600);

                                $sos_fastest_5_time_unit = $sos_fastest_5_days . ' วัน ' . $sos_fastest_5_hours . ' ชั่วโมง ';

                            }elseif ($sos_fastest_5_timeDifference >= 3600) {
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

                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            @if ($fastest_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                            @if(!empty($fastest_5_user->avatar) && empty($fastest_5_user->photo))
                                <img src="{{ $fastest_5_user->avatar }}">
                            @endif
                            @if(!empty($fastest_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $fastest_5_user->photo }}">
                            @endif
                            @if(empty($fastest_5_user->avatar) && empty($fastest_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">{{ $fastest_5->helper ? $fastest_5->helper : "--"}}</h6>
                            <p class="mb-0 font-weight-bold">ชื่อหน่วย : {{ $fastest_5->organization_helper ? $fastest_5->organization_helper : "--"}}</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple font-weight-bold font-16">{{ $sos_fastest_5_time_unit ? $sos_fastest_5_time_unit : "--"}}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div> -->


    <div class="col-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100 ">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">เคสที่ช่วยเหลือช้าที่สุด {{count($data_sos_slowest_5)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class=" text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-list p-3 mb-3">
               @foreach ($data_sos_slowest_5 as $slowest_5)

                    @php
                        if(!empty($slowest_5->helper_id)){
                            $slowest_5_user = App\User::where('id',$slowest_5->helper_id)->first();
                        }else{
                            $slowest_5_user = "no_helper_id";
                        }


                        if(!empty($slowest_5->help_complete_time) && !empty($slowest_5->time_go_to_help)){
                            $sos_slowest_5_time_sos_success = strtotime($slowest_5->help_complete_time);
                            $sos_slowest_5_time_command = strtotime($slowest_5->time_go_to_help);

                            $sos_slowest_5_timeDifference = abs($sos_slowest_5_time_sos_success - $sos_slowest_5_time_command);
                            if ($sos_slowest_5_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                $sos_slowest_5_days = floor($sos_slowest_5_timeDifference / 86400);
                                $sos_slowest_5_hours = floor(($sos_slowest_5_timeDifference % 86400) / 3600);

                                $sos_slowest_5_time_unit = $sos_slowest_5_days . ' วัน ' . $sos_slowest_5_hours . ' ชั่วโมง ';

                            }elseif ($sos_slowest_5_timeDifference >= 3600) {
                                $sos_slowest_5_hours = floor($sos_slowest_5_timeDifference / 3600);
                                $sos_slowest_5_remainingMinutes = floor(($sos_slowest_5_timeDifference % 3600) / 60);
                                $sos_slowest_5_remainingSeconds = $sos_slowest_5_timeDifference % 60;

                                $sos_slowest_5_time_unit = $sos_slowest_5_hours . ' ชั่วโมง ' . $sos_slowest_5_remainingMinutes . ' นาที ' . $sos_slowest_5_remainingSeconds . ' วินาที';
                            } elseif ($sos_slowest_5_timeDifference >= 60) {
                                $sos_slowest_5_minutes = floor($sos_slowest_5_timeDifference / 60);
                                $sos_slowest_5_seconds = $sos_slowest_5_timeDifference % 60;

                                $sos_slowest_5_time_unit = $sos_slowest_5_minutes . ' นาที ' . $sos_slowest_5_seconds . ' วินาที';
                            } else {
                                $sos_slowest_5_time_unit = $sos_slowest_5_timeDifference . ' วินาที';
                            }
                        }else{
                            $sos_slowest_5_time_unit  = "--";
                        }
                    @endphp

                    <div class="d-flex align-items-center py-3 border-bottom">
                        <div class="product-img me-2">
                           @if ($slowest_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                            @if(!empty($slowest_5_user->avatar) && empty($slowest_5_user->photo))
                                <img src="{{ $slowest_5_user->avatar }}">
                            @endif
                            @if(!empty($slowest_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $slowest_5_user->photo }}">
                            @endif
                            @if(empty($slowest_5_user->avatar) && empty($slowest_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                        </div>
                        <div class="">
                            <h6 class="mb-0 font-14">{{ $slowest_5->helper ? $slowest_5->helper : "--"}}</h6>
                            <p class="mb-0">หน่วย : {{ $slowest_5->organization_helper ? $slowest_5->organization_helper : "--"}}</p>
                        </div>
                        <div class="ms-auto">
                            <h6 class="mb-0">{{ $sos_slowest_5_time_unit ? $sos_slowest_5_time_unit : "--"}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0">เคสที่ช่วยเหลือช้าที่สุด {{count($data_sos_slowest_5)}} อันดับ</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 mb-3 ">
                @foreach ($data_sos_slowest_5 as $slowest_5)

                    @php
                        if(!empty($slowest_5->helper_id)){
                            $slowest_5_user = App\User::where('id',$slowest_5->helper_id)->first();
                        }else{
                            $slowest_5_user = "no_helper_id";
                        }


                        if(!empty($slowest_5->help_complete_time) && !empty($slowest_5->time_go_to_help)){
                            $sos_slowest_5_time_sos_success = strtotime($slowest_5->help_complete_time);
                            $sos_slowest_5_time_command = strtotime($slowest_5->time_go_to_help);

                            $sos_slowest_5_timeDifference = abs($sos_slowest_5_time_sos_success - $sos_slowest_5_time_command);
                            if ($sos_slowest_5_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                $sos_slowest_5_days = floor($sos_slowest_5_timeDifference / 86400);
                                $sos_slowest_5_hours = floor(($sos_slowest_5_timeDifference % 86400) / 3600);

                                $sos_slowest_5_time_unit = $sos_slowest_5_days . ' วัน ' . $sos_slowest_5_hours . ' ชั่วโมง ';

                            }elseif ($sos_slowest_5_timeDifference >= 3600) {
                                $sos_slowest_5_hours = floor($sos_slowest_5_timeDifference / 3600);
                                $sos_slowest_5_remainingMinutes = floor(($sos_slowest_5_timeDifference % 3600) / 60);
                                $sos_slowest_5_remainingSeconds = $sos_slowest_5_timeDifference % 60;

                                $sos_slowest_5_time_unit = $sos_slowest_5_hours . ' ชั่วโมง ' . $sos_slowest_5_remainingMinutes . ' นาที ' . $sos_slowest_5_remainingSeconds . ' วินาที';
                            } elseif ($sos_slowest_5_timeDifference >= 60) {
                                $sos_slowest_5_minutes = floor($sos_slowest_5_timeDifference / 60);
                                $sos_slowest_5_seconds = $sos_slowest_5_timeDifference % 60;

                                $sos_slowest_5_time_unit = $sos_slowest_5_minutes . ' นาที ' . $sos_slowest_5_seconds . ' วินาที';
                            } else {
                                $sos_slowest_5_time_unit = $sos_slowest_5_timeDifference . ' วินาที';
                            }
                        }else{
                            $sos_slowest_5_time_unit  = "--";
                        }
                    @endphp

                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            @if ($slowest_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                            @if(!empty($slowest_5_user->avatar) && empty($slowest_5_user->photo))
                                <img src="{{ $slowest_5_user->avatar }}">
                            @endif
                            @if(!empty($slowest_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $slowest_5_user->photo }}">
                            @endif
                            @if(empty($slowest_5_user->avatar) && empty($slowest_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">{{ $slowest_5->helper ? $slowest_5->helper : "--"}}</h6>
                            <p class="mb-0 font-weight-bold">ชื่อหน่วย : {{ $slowest_5->organization_helper ? $slowest_5->organization_helper : "--"}}</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple font-weight-bold font-16">{{ $sos_slowest_5_time_unit ? $sos_slowest_5_time_unit : "--"}}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div> -->



    <div class="col-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100 ">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">คะแนนผู้ช่วยเหลือสูงสุด {{count($data_sos_score_best_5)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class=" text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-list p-3 mb-3">
                 @foreach ($data_sos_score_best_5 as $score_best_5)
                    @php
                        if(!empty($score_best_5->helper_id)){
                            $score_best_5_user = App\User::where('id',$score_best_5->helper_id)->first();
                        }else{
                            $score_best_5_user = "no_helper_id";
                        }
                    @endphp
                    <div class="d-flex align-items-center py-3 border-bottom ">
                        <div class="product-img me-2">
                            @if ($score_best_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @elseif(!empty($score_best_5_user->avatar) && empty($score_best_5_user->photo))
                                <img src="{{ $score_best_5_user->avatar }}">
                            @elseif(!empty($score_best_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $score_best_5_user->photo }}">
                            @elseif(empty($score_best_5_user->avatar) && empty($score_best_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif

                        </div>
                        <div class="">
                            <h6 class="mb-0 font-14">{{ $score_best_5->helper ? $score_best_5->helper : "--"}}</h6>
                            <p class="mb-0">หน่วย : {{ $score_best_5->organization_helper ? $score_best_5->organization_helper : "--"}}</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto mb-0 font-weight-bold font-16"><i class="bx bxs-star text-warning mr-1"></i> {{ $score_best_5->avg_score ? $score_best_5->avg_score : "--"}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0">คะแนนผู้ช่วยเหลือสูงสุด {{count($data_sos_score_best_5)}} อันดับ</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_viisos_3_topic') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 mb-3">
                @foreach ($data_sos_score_best_5 as $score_best_5)

                @php
                    if(!empty($score_best_5->helper_id)){
                        $score_best_5_user = App\User::where('id',$score_best_5->helper_id)->first();
                    }else{
                        $score_best_5_user = "no_helper_id";
                    }
                @endphp

                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            @if ($score_best_5_user == "no_helper_id")
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                            @if(!empty($score_best_5_user->avatar) && empty($score_best_5_user->photo))
                                <img src="{{ $score_best_5_user->avatar }}">
                            @endif
                            @if(!empty($score_best_5_user->photo))
                                <img src="{{ url('storage') }}/{{ $score_best_5_user->photo }}">
                            @endif
                            @if(empty($score_best_5_user->avatar) && empty($score_best_5_user->photo))
                                <img src="{{ asset('/Medilab/img/icon.png') }}">
                            @endif
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">{{ $score_best_5->helper ? $score_best_5->helper : "--"}}</h6>
                            <p class="mb-0 font-weight-bold">ชื่อหน่วย : {{ $score_best_5->organization_helper ? $score_best_5->organization_helper : "--"}}</p>
                        </div>
                        <p class="ms-auto mb-0 font-weight-bold font-16"><i class="bx bxs-star text-warning mr-1"></i> {{ $score_best_5->score_total ? $score_best_5->score_total : "--"}}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div> -->
</div>

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- map-googleAPI -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<style type="text/css">
    #sos_map_organization {
      min-height: calc(40vh);
      height: calc(100% - 5vh);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        districts_sos();

        initMap();
        let maxTimeCount = 0;
        let minTimeCount = 0;

        maxTimeCount = parseFloat('{{$sos_maxTimeCounts[0]}}');
        minTimeCount = parseFloat('{{$sos_minTimeCounts[0]}}');

        //แสดงช่วงเวลาที่มีการขอความช่วยเหลือมากสุด
        if(maxTimeCount){
            let max_startTime = maxTimeCount.toFixed(2); // แปลงเป็นสตริงที่มี 2 ตำแหน่งทศนิยม
            let max_endTime = (maxTimeCount + 1).toFixed(2); // เพิ่มเวลาอีก 1 ชั่วโมงและแปลงเป็นสตริงที่มี 2 ตำแหน่งทศนิยม
            document.querySelector('#sos_maxTimeCounts').innerHTML = max_startTime + ' - ' + max_endTime + ' น.';
        }else{
            document.querySelector('#sos_maxTimeCounts').innerHTML = "ไม่มีข้อมูล";
        }
        //แสดงช่วงเวลาที่มีการขอความช่วยเหลือมากสุด
        if(minTimeCount){
            let min_startTime = minTimeCount.toFixed(2); // แปลงเป็นสตริงที่มี 2 ตำแหน่งทศนิยม
            let min_endTime = (minTimeCount + 1).toFixed(2); // เพิ่มเวลาอีก 1 ชั่วโมงและแปลงเป็นสตริงที่มี 2 ตำแหน่งทศนิยม
            document.querySelector('#sos_minTimeCounts').innerHTML = min_startTime + ' - ' + min_endTime + ' น.';
        }else{
            document.querySelector('#sos_minTimeCounts').innerHTML = "ไม่มีข้อมูล";
        }

    });
</script>

<!-- MAP พื้นที่การขอความช่วยเหลือในจังหวัด -->
<script>
    function initMap() {

        var map_sos_organization;
        var marker_sos_organization;

        let user_login_organization = '{{Auth::user()->organization}}';

        let all_lat_lng = [];

        fetch("{{ url('/') }}/api/sos_data_map_organization/" + user_login_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {
                    let lat = parseFloat(result[ii].lat);
                    let lng = parseFloat(result[ii].lng);

                    if (lat) {
                        all_lat_lng.push({"lat": lat, "lng": lng});
                    }
                }


                let bounds = new google.maps.LatLngBounds();

                    for (let vc = 0; vc < all_lat_lng.length; vc++) {
                        bounds.extend(all_lat_lng[vc]);
                    }

                    map_sos_organization = new google.maps.Map(document.getElementById("sos_map_organization"), {
                        // zoom: num_zoom,
                        // center: bounds.getCenter(),
                    });
                    map_sos_organization.fitBounds(bounds);

                    //ปักหมุด
                    // let image_marker_sos = "https://www.viicheck.com/img/icon/operating_unit/sos.png";
                    let image_marker_sos = "{{ asset('/img/icon/operating_unit/sos.png') }}";
                    @foreach($sos_map_data as $sos_map_data)
                        @if(!empty($sos_map_data->lat))
                            marker_sos_organization = new google.maps.Marker({
                                position: { lat: {{ $sos_map_data->lat }} , lng: {{ $sos_map_data->lng }}  },
                                map: map_sos_organization,
                                icon: image_marker_sos,
                                zIndex:5,
                            });
                        @endif
                    @endforeach

        });

    }
</script>

<script>
    function confirm_block_sos(type,user_id,name_user){

        console.log("confirm_block_sos");

        let content_modal_cf_block_sos = document.querySelector('#content_modal_cf_block_sos')
            content_modal_cf_block_sos.innerHTML = '';
        let html_cf_user;
        if (type == "block") {
            html_cf_user = '<h5 class="text-success">ยืนยันการยกเลิกระงับผู้ใช้</h5>';
        } else {
            html_cf_user = '<h5 class="text-danger">ยืนยันการระงับผู้ใช้</h5>';
        }

        let html = `
        <div class="text-center p-3">
            <center>
            <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/7.png" width="150">
            </center>
            <br>
            `+html_cf_user+`
            <h3 class="mt-2 mb-2"><b>`+name_user+`</b></h3>
        </div>
        <div class="float-end mt-3">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            <button type="button" class="btn btn-primary" onclick="update_block_sos('`+type+`','`+user_id+`','`+name_user+`')">ยืนยัน</button>
        </div>
        `;

        content_modal_cf_block_sos.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

        document.querySelector('#btn_open_modal_cf_block_sos').click();
    }

    function update_block_sos(type,user_id,name_user){
        console.log("update_block_sos");
        document.querySelector('#close_modal_cf_block_sos').click();

        fetch("{{ url('/') }}/api/update_status_block_user/" + "?user_id=" + user_id + "&type=" + type)
            .then(response => response.text())
            .then(result => {
                console.log(result);

                if (result == "block") {
                    document.querySelector('#block_sos_btn_'+user_id).innerHTML = `<span class="btn btn-secondary" onclick="confirm_block_sos('block','`+user_id+`','`+name_user+`')">ถูกระงับแล้ว</span>`;
                } else {
                    document.querySelector('#block_sos_btn_'+user_id).innerHTML = `<span class="btn btn-danger" onclick="confirm_block_sos('free','`+user_id+`','`+name_user+`')">ระงับการใช้งาน</span>`;
                }

        });
    }
</script>


