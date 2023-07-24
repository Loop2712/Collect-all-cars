<style>
    .fz_header {
        font-size: 18px;
    }
    .fz_body {
        font-size: 16px;
    }
    .font-weight-bold{
        font-weight: bold !important;
    }
</style>

<h4 class="text-dark">ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ</h4>

<!--=============== 4 card row =====================-->

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-blues">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark">เจ้าหน้าที่ศูนย์สั่งการ</h5>
                        <h3 class="mb-0 text-dark">{{ count($data_command )}} คน</h3>
                    </div>
                    <div class="ms-auto text-dark"><i class="fa-solid fa-user-vneck font-30"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-lush">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark" >พร้อมช่วยเหลือ</h5>
                        <h3 class="mb-0 text-dark">{{ $count_Standby }} คน</h3>
                    </div>
                    <div class="ms-auto text-dark"><i class="fa-solid fa-check font-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-kyoto">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark">กำลังช่วยเหลือ</h5>
                        <h3 class="mb-0 text-dark">{{ $count_Helping }} คน</h3>
                    </div>
                    <div class="ms-auto text-dark"><i class="fa-solid fa-hourglass-clock font-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark">ไม่พร้อม</h5>
                        <h3 class="mb-0 text-dark">{{ $count_notReady }} คน</h3>
                    </div>
                    <div class="ms-auto text-dark"><i class="fa-sharp fa-solid fa-xmark font-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<!--=============== top 5 info =====================-->
<div class="row ">
    <!--======= รายชื่อเจ้าหน้าที่ศูนย์สั่งการ 5 ลำดับ ล่าสุด ============-->
    <div class="col-12 col-lg-12 mb-3">
        <div class="card radius-10 w-100 h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >เจ้าหน้าที่ศูนย์สั่งการ {{count($data_command)}} ลำดับ ล่าสุด</h5>
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
            <div class="p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="fz_header">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                <th>สถานะ</th>
                                <th>เป็นสมาชิกมาแล้ว</th>
                                <th>ผู้สร้าง</th>
                            </tr>
                        </thead>
                        <tbody class="fz_body">
                            @foreach ($data_command as $top5_lastet_command_units)
                                <tr>
                                    <td>
                                        @php
                                            $data_command_2 = App\User::where('id',$top5_lastet_command_units->user_id)->first();
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($data_command_2->avatar) && empty($data_command_2->photo))
                                                    <img src="{{ $data_command_2->avatar }}">
                                                @endif
                                                @if(!empty($data_command_2->photo))
                                                    <img src="{{ url('storage') }}/{{ $data_command_2->photo }}">
                                                @endif
                                                @if(empty($data_command_2->avatar) && empty($data_command_2->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mt-3 font-14">{{$top5_lastet_command_units->name_officer_command}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    @if (!empty($top5_lastet_command_units->user->sex))
                                        <td>{{$top5_lastet_command_units->user->sex}}</td>
                                    @else
                                        <td> -- </td>
                                    @endif

                                    @switch($top5_lastet_command_units->status)
                                        @case('Standby')
                                            <td>
                                                <span class="badge badge-pill bg-success">{{$top5_lastet_command_units->status}}</span>
                                            </td>
                                            @break
                                        @case('Helping')
                                            <td>
                                                <span class="badge badge-pill bg-warning">{{$top5_lastet_command_units->status}}</span>
                                            </td>
                                            @break
                                        @default
                                            <td>
                                                <span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>
                                            </td>
                                    @endswitch

                                    @if (!empty($top5_lastet_command_units->created_at))
                                        <td> {{ \Carbon\Carbon::parse($top5_lastet_command_units->created_at)->locale('th')->diffForHumans() }}</td>
                                    @else
                                        <td> -- </td>
                                    @endif

                                    {{-- @php
                                        $user_creator = App\User::where('id', $top5_lastet_command_units->creator)->first();
                                    @endphp --}}
                                    @if (!empty($top5_lastet_command_units->creator))
                                        <td>{{ $top5_lastet_command_units->user_creator->name }}</td>
                                    @else
                                        <td> ViiCheck </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!--======= ลำดับการรับแจ้งเตือน 5 อันดับ ============-->
    <div class="col-12 col-lg-6 mb-3">
        <div class="card radius-10 w-100 h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >ลำดับการรับแจ้งเตือน {{count($noti_1669_data)}} อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">หน้าการจัดการ</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3">
                <div class="table-responsive p-3">
                    <table class="table align-middle mb-0 ">
                        <thead class="fz_header">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เลขลำดับ</th>
                            </tr>
                        </thead>
                        <tbody class="fz_body">
                            @foreach ($noti_1669_data as $top5_lastet_notification)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($top5_lastet_notification->avatar) && empty($top5_lastet_notification->photo))
                                                    <img src="{{ $top5_lastet_notification->avatar }}">
                                                @endif
                                                @if(!empty($top5_lastet_notification->photo))
                                                    <img src="{{ url('storage') }}/{{ $top5_lastet_notification->photo }}">
                                                @endif
                                                @if(empty($top5_lastet_notification->avatar) && empty($top5_lastet_notification->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mt-3 font-14">{{$top5_lastet_notification->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$top5_lastet_notification->number ? $top5_lastet_notification->number : "--"}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!--======= การสั่งการมากที่สุด 5 อันดับ ============-->
    <div class="col-12 col-lg-6 mb-3">
        <div class="card radius-10 w-100 h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >การสั่งการมากที่สุด {{count($command_1669_data)}} อันดับ</h5>
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
            <div class="p-3">
                <div class="table-responsive p-3">
                    <table class="table align-middle mb-0">
                        <thead class="fz_header">
                            <tr>
                                <th>ชื่อ</th>
                                <th>ทั้งหมด</th>
                                <th>เสร็จสิ้น</th>
                                <th>กำลังดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody class="fz_body">
                            @foreach ($command_1669_data as $top5_command)
                                <tr>
                                    <td>
                                        @php
                                            $data_user_command = App\User::where('id',$top5_command->officers_command_by->user_id)->first();

                                            $command_sos_by = App\Models\Sos_help_center::where('command_by',$top5_command->command_by)->get();

                                            $count_status_success = 0;
                                            $count_status_helping = 0;
                                            foreach ($command_sos_by as $key) {
                                                if($key->status == "เสร็จสิ้น"){
                                                    $count_status_success = $count_status_success + 1;
                                                }else {
                                                    $count_status_helping = $count_status_helping + 1;
                                                }
                                            }
                                        @endphp
                                        <div class="d-flex align-items-center mt-3">
                                            @if(!empty($data_user_command->avatar) && empty($data_user_command->photo))
                                                <img src="{{ $data_user_command->avatar }}" width="35" height="35" class="rounded-circle" alt="">
                                            @endif
                                            @if(!empty($data_user_command->photo))
                                                <img src="{{ url('storage') }}/{{ $data_user_command->photo }}" width="35" height="35" class="rounded-circle" alt="">
                                            @endif
                                            @if(empty($data_user_command->avatar) && empty($data_user_command->photo))
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">
                                            @endif

                                            <div class="flex-grow-1 ms-3">
                                                <p class="font-weight-bold mb-0">{{$top5_command->officers_command_by->name_officer_command}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ count($count_command_1669_data) }}</td>
                                    <td>{{$count_status_success}}</td>
                                    <td>{{$count_status_helping}}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
