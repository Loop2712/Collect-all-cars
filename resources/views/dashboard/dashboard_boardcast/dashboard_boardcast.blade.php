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

    #all_broadcast_table_filter{
        display: none;
    }

</style>
<!--========================== 4 Content ===============================-->

    @php
         // % ของ content Check_In
        if ($count_all_content != 0) {
            $percent_by_checkin = ($count_all_by_checkin / $count_all_content) * 100;
            $percent_by_checkin = number_format($percent_by_checkin, 0);
        } else {
            $percent_by_checkin = 0;
        }

        // % ของ content By_user
        if ($count_all_content != 0) {
            $percent_by_user = ($count_all_by_user / $count_all_content) * 100;
            $percent_by_user = number_format($percent_by_user, 0);
        } else {
            $percent_by_user = 0;
        }

        // % ของ content By_car
        if ($count_all_content != 0) {
            $percent_by_car = ($count_all_by_car / $count_all_content) * 100;
            $percent_by_car = number_format($percent_by_car, 0);
        } else {
            $percent_by_car = 0;
        }

    @endphp

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-0 font-weight-bold text-dark">บรอดแคสต์ทั้งหมด</h5>
                        <h3 class="font-weight-bold">{{ $count_all_content }}
                            {{-- <small class="text-success font-13"> (+2 วันนี้) </small> --}}
                        </h3>
                    </div>
                    <div class="widgets-icons bg-gradient-cosmic text-white">
                        <img width="35px" src="{{ asset('/img/icon/newspaper.png') }}">
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: 100%"></div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-0 font-weight-bold text-dark">บรอดแคสต์เช็คอิน</h5>
                        <h3 class="font-weight-bold">{{ $count_all_by_checkin }}
                            {{-- <small class="text-success font-13"> (+2 วันนี้) </small> --}}
                        </h3>
                    </div>
                    <div class="widgets-icons bg-gradient-Ohhappiness text-white">
                        <img width="35px" src="{{ asset('/img/icon/check-in.png') }}">
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_checkin }}%"></div>
                </div>
                <br>
                <h6 class="text-dark font-weight-bold">คิดเป็น : {{ $percent_by_checkin }} % จากบรอดแคสต์ทั้งหมด</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-0 font-weight-bold text-dark">บรอดแคสต์รถที่ลงทะเบียน</h5>
                        <h3 class="font-weight-bold"> {{ $count_all_by_car }}
                            {{-- <small class="text-dark font-13">(+0 วันนี้)</small> --}}
                        </h3>
                    </div>
                    <div class="widgets-icons bg-gradient-kyoto text-white">
                        <img width="35px" src="{{ asset('/img/icon/car.png') }}">
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_car }}%"></div>
                </div>
                <br>
                <h6 class="text-dark font-weight-bold">คิดเป็น : {{ $percent_by_car }} % จากบรอดแคสต์ทั้งหมด</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-0 font-weight-bold text-dark">บรอดแคสต์ผู้ใช้งาน</h5>
                        <h3 class="font-weight-bold">{{ $count_all_by_user }}
                            {{-- <small class="text-dark font-13"> (+0 วันนี้) </small> --}}
                        </h3>
                    </div>
                    <div class="widgets-icons bg-gradient-blues text-white">
                        <img width="35px" src="{{ asset('/img/icon/user.png') }}">
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_user }}%"></div>
                </div>
                <br>
                <h6 class="text-dark font-weight-bold ">คิดเป็น : {{ $percent_by_user }} % จากบรอดแคสต์ทั้งหมด</h6>
            </div>
        </div>
    </div>

</div>

<!--========================== Most Often Content ===============================-->
<div class="row row-cols-1 row-cols-lg-3">
    <!-- CHECK IN  -->
    <div class="accordion" id="accordion_of_check_in">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">
                            <b>บรอดแคสต์เช็คอิน</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ url('/dashboard_boardcast_3_topic?type_page=check_in_btn') }}" type="button" class="btn btn-sm btn-primary text-white">
                            <img width="25px" src="{{ asset('/img/icon/eye_white.png') }}"> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_check_in_1" aria-expanded="true" aria-controls="collapse_check_in_1" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด(ไม่ซ้ำผู้ใช้)
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_2" aria-expanded="true" aria-controls="collapse_check_in_2" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_3" aria-expanded="true" aria-controls="collapse_check_in_3" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_4" aria-expanded="true" aria-controls="collapse_check_in_4" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด -->
            <div id="collapse_check_in_1" class="collapse show" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_checkin_show_user as $checkin_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_show_user->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $checkin_show_user->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $checkin_show_user->name_content ? $checkin_show_user->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $checkin_show_user->count_show_user ? $checkin_show_user->count_show_user : "0"}} คน</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่ส่งหาเยอะที่สุด -->

            <!-- บรอดแคสต์ที่ส่งบ่อยที่สุด -->
            <div id="collapse_check_in_2" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_checkin_send_round as $checkin_send_round)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_send_round->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $checkin_send_round->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $checkin_send_round->name_content ? $checkin_send_round->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $checkin_send_round->send_round ? $checkin_send_round->send_round : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่ส่งบ่อยที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_check_in_3" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_checkin_amount_user_click as $checkin_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $checkin_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $checkin_user_click->name_content ? $checkin_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $checkin_user_click->count_amount_user_click ? $checkin_user_click->count_amount_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_check_in_4" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_checkin_user_click as $checkin_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $checkin_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $checkin_user_click->name_content ? $checkin_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $checkin_user_click->count_user_click ? $checkin_user_click->count_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีคนดูมากที่สุด -->

        </div>
    </div>
    <!-- END CHECK IN  -->

    <!-- CAR  -->
    <div class="accordion" id="accordion_of_car">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">
                            <b>บรอดแคสต์รถที่ลงทะเบียน</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ url('/dashboard_boardcast_3_topic?type_page=car_btn') }}" type="button" class="btn btn-sm btn-primary text-white">
                            <img width="25px" src="{{ asset('/img/icon/eye_white.png') }}"> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_car_1" aria-expanded="true" aria-controls="collapse_car_1" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_car_2" aria-expanded="true" aria-controls="collapse_car_2" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_car_3" aria-expanded="true" aria-controls="collapse_car_3" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_car_4" aria-expanded="true" aria-controls="collapse_car_4" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด -->
            <div id="collapse_car_1" class="collapse show" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_car_show_user as $by_car_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_show_user->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_car_show_user->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_show_user->name_content ? $by_car_show_user->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_show_user->count_show_user }} คน</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด -->

            <!-- เนื้อหาที่ส่งบ่อยที่สุด -->
            <div id="collapse_car_2" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_car_send_round as $by_car_send_round)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_send_round->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_car_send_round->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_send_round->name_content ? $by_car_send_round->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_send_round->send_round ? $by_car_send_round->send_round : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ การคลิกมากที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_car_3" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_car_amount_user_click as $by_car_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_car_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_user_click->name_content ? $by_car_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_user_click->count_amount_user_click ? $by_car_user_click->count_amount_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_car_4" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_car_user_click as $by_car_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_car_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_user_click->name_content ? $by_car_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_user_click->count_user_click ? $by_car_user_click->count_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->


        </div>
    </div>
    <!-- END CAR  -->

    <!-- User  -->
    <div class="accordion" id="accordion_of_user">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">
                            <b>บรอดแคสต์สำหรับผู้ใช้งาน</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ url('/dashboard_boardcast_3_topic?type_page=user_btn') }}" type="button" class="btn btn-sm btn-primary text-white">
                            <img width="25px" src="{{ asset('/img/icon/eye_white.png') }}"> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_user_1" aria-expanded="true" aria-controls="collapse_user_1" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_user_2" aria-expanded="true" aria-controls="collapse_user_2" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_user_3" aria-expanded="true" aria-controls="collapse_user_3" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_user_4" aria-expanded="true" aria-controls="collapse_user_4" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด -->
            <div id="collapse_user_1" class="collapse show" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_user_show_user as $by_user_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_user_show_user->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_user_show_user->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_user_show_user->name_content ? $by_user_show_user->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_user_show_user->count_show_user }} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด -->

            <!-- บรอดแคสต์ที่ส่งบ่อยที่สุด -->
            <div id="collapse_user_2" class="collapse" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_user_send_round as $by_user_send_round)
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                    </div>
                                    <div class="product-img">
                                        @if (!empty($by_user_send_round->photo))
                                            <img src="{{ asset('/storage').'/' }}{{ $by_user_send_round->photo}}" class="p-1" alt="">
                                        @else
                                            <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                        @endif
                                    </div>
                                    <div class="ps-3">
                                        <h5 class="mb-0 font-weight-bold">{{ $by_user_send_round->name_content ? $by_user_send_round->name_content : "--"}}</h5>
                                    </div>
                                    <p class="ms-auto mb-0 text-purple">{{ $by_user_send_round->send_round ? $by_user_send_round->send_round : "0"}} ครั้ง</p>
                                </div>
                                <hr>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ การคลิกมากที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_user_3" class="collapse" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_user_amount_user_click as $by_user_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_user_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_user_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_user_user_click->name_content ? $by_user_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_user_user_click->count_amount_user_click ? $by_user_user_click->count_amount_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->

            <!-- บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->
            <div id="collapse_user_4" class="collapse" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)
                                </span>
                                <hr>
                                @foreach ($sorted_all_by_user_user_click as $by_user_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_user_user_click->photo))
                                                <img src="{{ asset('/storage').'/' }}{{ $by_user_user_click->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_user_user_click->name_content ? $by_user_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_user_user_click->count_user_click ? $by_user_user_click->count_user_click : "0"}} ครั้ง</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ บรอดแคสต์ที่มีผู้ใช้ดูมากที่สุด -->

        </div>
    </div>
    <!-- END User  -->
</div>

<div class="row">
    <div class="col-12 col-lg-12 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0">
                            <b>เนื้อหาที่โดดเด่น</b>
                        </h3>
                    </div>
                    <div class="font-22 ms-auto">
                        <!-- <i class="bx bx-dots-horizontal-rounded"></i> -->
                        <!-- <a href="{{ url('/broadcast/content') }}" class="btn btn-primary main-shadow main-radius text-white" style="width:100%;">
                            ดูข้อมูลเพิ่มเติม
                        </a> -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <b>บรอดแคสต์ที่ผู้ใช้ดูมากที่สุด</b>
                        <br><br>
                        @if(!empty($most_amount_user_click))
                            <div class="card" style="width: 18rem;">
                                <center>
                                    @if (!empty($most_amount_user_click->photo))
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $most_amount_user_click->photo }}" class="main-shadow main-radius">
                                    @else
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ asset("/img/stickerline/PNG/7.png") }}" class="main-shadow main-radius">
                                    @endif
                                </center>
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ $most_amount_user_click->name_content }}
                                    </h5>
                                    <p class="card-text">
                                        จำนวนทั้งหมด : <b>{{ $most_amount_user_click->count_amount_user_click }}</b> ครั้ง
                                        <br>
                                        @switch($most_amount_user_click->type_content)
                                            @case('BC_by_check_in')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-burning text-white radius-30">
                                                    By Check in
                                                </span>
                                                @break
                                            @case('BC_by_car')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-Ohhappiness text-white radius-30">
                                                    By Cars
                                                </span>
                                                @break
                                            @case('BC_by_user')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-moonlit text-white radius-30">
                                                    By User
                                                </span>
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        @else
                            ไม่มีข้อมูล
                        @endif
                    </div>
                    <div class="col-3">
                        <b>บรอดแคสต์ที่ผู้ใช้ดูมากที่สุด(ไม่ซ้ำผู้ใช้)</b>
                        <br><br>
                        @if(!empty($most_user_click))
                            <div class="card" style="width: 18rem;">
                                <center>
                                    @if (!empty($most_user_click->photo))
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $most_user_click->photo }}" class="main-shadow main-radius">
                                    @else
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ asset("/img/stickerline/PNG/7.png") }}" class="main-shadow main-radius">
                                    @endif
                                </center>
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ $most_user_click->name_content }}
                                    </h5>
                                    <p class="card-text">
                                        จำนวนทั้งหมด : <b>{{ $most_user_click->count_user_click }}</b> คน
                                        <br>
                                        @switch($most_user_click->type_content)
                                            @case('BC_by_check_in')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-burning text-white radius-30">
                                                    By Check in
                                                </span>
                                                @break
                                            @case('BC_by_car')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-Ohhappiness text-white radius-30">
                                                    By Cars
                                                </span>
                                                @break
                                            @case('BC_by_user')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-moonlit text-white radius-30">
                                                    By User
                                                </span>
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        @else
                            ไม่มีข้อมูล
                        @endif
                    </div>
                    <div class="col-3">
                        <b>บรอดแคสต์ที่ส่งถึงผู้ใช้มากที่สุด</b>
                        <br><br>
                        @if(!empty($most_show_user))
                            <div class="card" style="width: 18rem;">
                                <center>
                                    @if (!empty($most_show_user->photo))
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $most_show_user->photo }}" class="main-shadow main-radius">
                                    @else
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ asset("/img/stickerline/PNG/7.png") }}" class="main-shadow main-radius">
                                    @endif
                                </center>
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ $most_show_user->name_content }}
                                    </h5>
                                    <p class="card-text">
                                        จำนวนทั้งหมด : <b>{{ $most_show_user->count_show_user }}</b> ครั้ง
                                        <br>
                                        @switch($most_show_user->type_content)
                                            @case('BC_by_check_in')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-burning text-white radius-30">
                                                    By Check in
                                                </span>
                                                @break
                                            @case('BC_by_car')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-Ohhappiness text-white radius-30">
                                                    By Cars
                                                </span>
                                                @break
                                            @case('BC_by_user')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-moonlit text-white radius-30">
                                                    By User
                                                </span>
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        @else
                            ไม่มีข้อมูล
                        @endif
                    </div>
                    <div class="col-3">
                        <b>บรอดแคสต์ที่ส่งมากที่สุด(รอบ)</b>
                        <br><br>
                        @if(!empty($most_send_round))
                            <div class="card" style="width: 18rem;">
                                <center>
                                    @if (!empty($most_send_round->photo))
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $most_send_round->photo }}" class="main-shadow main-radius">
                                    @else
                                        <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ asset("/img/stickerline/PNG/7.png") }}" class="main-shadow main-radius">
                                    @endif
                                </center>
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ $most_send_round->name_content }}
                                    </h5>
                                    <p class="card-text">
                                        จำนวนทั้งหมด : <b>{{ $most_send_round->send_round }}</b> รอบ
                                        <br>
                                        @switch($most_send_round->type_content)
                                            @case('BC_by_check_in')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-burning text-white radius-30">
                                                    By Check in
                                                </span>
                                                @break
                                            @case('BC_by_car')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-Ohhappiness text-white radius-30">
                                                    By Cars
                                                </span>
                                                @break
                                            @case('BC_by_user')
                                                ประเภท :
                                                <span class="px-3 bg-gradient-moonlit text-white radius-30">
                                                    By User
                                                </span>
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        @else
                            ไม่มีข้อมูล
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-lg-1">
    <div class="col">
        <!-- Content เรียงลำดับ ทั้งหมด -->
        <div class="card radius-10">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div>
                        <h3 class="mb-0">
                            <b>การจัดอันดับ</b> <span class="text-secondary" style="font-size:15px;">(รวม)</span>
                        </h3>
                    </div>
                    <div class="ms-auto">
                        <!-- <a href="{{ url('/broadcast/content') }}" class="btn btn-primary main-shadow main-radius text-white" style="width:100%;">
                            ดูข้อมูลเพิ่มเติม
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="all_broadcast_table" class="table table-striped  align-middle" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th>จำนวนบรอดแคสต์ที่ส่ง</th>
                                <th>จำนวนบรอดแคสต์ที่ส่งถึงผู้ใช้(ไม่ซ้ำผู้ใช้)</th>
                                <th>จำนวนผู้ใช้ที่ดูบรอดแคสต์</th>
                                <th>จำนวนผู้ใช้ที่ดูบรอดแคสต์(ไม่ซ้ำผู้ใช้)</th>
                                <th>ประเภท</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_show_user as $item_contents)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <div class="product-img bg-transparent border">
                                            @if (!empty($item_contents->photo))
                                                <img src="{{ url('storage')}}/{{ $item_contents->photo }}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class="p-1" alt="">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $item_contents->name_content }}</td>
                                    <td>{{ $item_contents->send_round }}</td>
                                    <td>{{ $item_contents->count_show_user }}</td>
                                    <td>{{ $item_contents->count_amount_user_click }}</td>
                                    <td>{{ $item_contents->count_user_click }}</td>
                                    <td>
                                        @switch($item_contents->type_content)
                                                @case('BC_by_check_in')
                                                    <span class="px-2 bg-gradient-burning text-white radius-30">
                                                        By Check in
                                                    </span>
                                                    @break
                                                @case('BC_by_car')
                                                    <span class="px-2 bg-gradient-Ohhappiness text-white radius-30">
                                                        By Cars
                                                    </span>
                                                    @break
                                                @case('BC_by_user')
                                                    <span class="px-2 bg-gradient-moonlit text-white radius-30">
                                                        By User
                                                    </span>
                                                    @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th>จำนวนบรอดแคสต์ที่ส่ง</th>
                                <th>จำนวนบรอดแคสต์ที่ส่งถึงผู้ใช้</th>
                                <th>จำนวนคนที่ดูบรอดแคสต์</th>
                                <th>ประเภท</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
        <!-- END Content เรียงลำดับ ทั้งหมด -->
    </div>

</div>

<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<!-- user_table -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table3 = $("#all_broadcast_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            buttons: false,
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 7,
            columnDefs: [
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0,1,6], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[2, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table3.order([[2, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
                    }
                },
                // {
                //     extend: "excelHtml5",
                //     text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                // },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            // initComplete: function (settings, json) {
            //     let footer3 = $("#all_broadcast_table tfoot tr");
            //     $("#all_broadcast_table thead").append(footer3);

            // }
        });

        // $("#all_broadcast_table tfoot th").each(function () {
        //     if($(this).text()){
        //         let title3 = $(this).text();
        //         if(title3){
        //             $(this).html('<input type="text" style="width:100%; " placeholder="🔎 ' + title3 + '" />');
        //         }
        //     }
        // });

        // $("#all_broadcast_table thead").on("keyup", "input", function () {
        //     table3.column($(this).parent().index())
        //         .search(this.value)
        //         .draw();

        // });
    });
</script>







