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
<!--========================== 4 Content ===============================-->

    @php
         // % ของ content Check_In
        $percent_by_checkin = ($count_all_by_checkin / $count_all_content) * 100;
        $percent_by_checkin = number_format($percent_by_checkin,0);

        // % ของ content By_user
        $percent_by_user = ($count_all_by_user / $count_all_content) * 100;
        $percent_by_user = number_format($percent_by_user,0);

        // % ของ content By_car
        $percent_by_car = ($count_all_by_car / $count_all_content) * 100;
        $percent_by_car = number_format($percent_by_car,0);
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
                                    บรอดแคสต์ที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_2" aria-expanded="true" aria-controls="collapse_check_in_2" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_3" aria-expanded="true" aria-controls="collapse_check_in_3" href="javaScript:;" class="dropdown-item">
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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

            <!-- บรอดแคสต์ที่มีคนดูมากที่สุด -->
            <div id="collapse_check_in_3" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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

            <!-- บรอดแคสต์ที่มีคนดูมากที่สุด -->
            <div id="collapse_car_3" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_user_click->name_content ? $by_car_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_user_click->count_user_click}} ครั้ง</p>
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
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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
                                            <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
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

            <!-- บรอดแคสต์ที่มีคนดูมากที่สุด -->
            <div id="collapse_user_3" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-dark font-weight-bold" style="font-size:16px;">
                                    บรอดแคสต์ที่มีคนดูมากที่สุด
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
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_user_user_click->name_content ? $by_user_user_click->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_user_user_click->count_user_click}} ครั้ง</p>
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
    <!-- END User  -->
</div>




