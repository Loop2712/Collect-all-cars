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

<h3>จำนวน Content ที่ส่งแล้ว</h3>
<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">All Content</p>
                        <h4 class="font-weight-bold">{{ $count_all_content }}
                            {{-- <small class="text-success font-13"> (+2 วันนี้) </small> --}}
                        </h4>
                    </div>
                    <div class="widgets-icons bg-gradient-cosmic text-white"><i class="fa-solid fa-folder-grid"></i>
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
                        <p class="mb-0">By Check in</p>
                        <h4 class="font-weight-bold">{{ $count_all_by_checkin }}
                            {{-- <small class="text-success font-13"> (+2 วันนี้) </small> --}}
                        </h4>
                    </div>
                    <div class="widgets-icons bg-gradient-kyoto text-white"><i class="fa-solid fa-location-check "></i>
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_checkin }}%"></div>
                </div>
                <br>
                <span class="text-dark">คิดเป็น : {{ $percent_by_checkin }} % จากเนื้อหาทั้งหมด</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">By User</p>
                        <h4 class="font-weight-bold">{{ $count_all_by_user }}
                            {{-- <small class="text-dark font-13"> (+0 วันนี้) </small> --}}
                        </h4>
                    </div>
                    <div class="widgets-icons bg-gradient-blues text-white"><i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_user }}%"></div>
                </div>
                <br>
                <span class="text-dark">คิดเป็น : {{ $percent_by_user }} % จากเนื้อหาทั้งหมด</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">By Car</p>
                        <h4 class="font-weight-bold"> {{ $count_all_by_car }}
                            {{-- <small class="text-dark font-13">(+0 วันนี้)</small> --}}
                        </h4>
                    </div>
                    <div class="widgets-icons bg-gradient-burning text-white"><i class="fa-solid fa-car-side"></i>
                    </div>
                </div>
                <div class="progress bg-dark-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $percent_by_car }}%"></div>
                </div>
                <br>
                <span class="text-dark">คิดเป็น : {{ $percent_by_car }} % จากเนื้อหาทั้งหมด</span>
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
                            <b>By_Check_In</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="#" type="button" class="btn btn-sm btn-primary text-white">
                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_check_in_1" aria-expanded="true" aria-controls="collapse_check_in_1" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_2" aria-expanded="true" aria-controls="collapse_check_in_2" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_check_in_3" aria-expanded="true" aria-controls="collapse_check_in_3" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่มีคนดูมากที่สุด
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด -->
            <div id="collapse_check_in_1" class="collapse show" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_checkin_show_user as $checkin_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_show_user->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $checkin_show_user->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $checkin_show_user->name_content ? $checkin_show_user->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $checkin_show_user->count_show_user ? $checkin_show_user->count_show_user : "0"}} รอบ</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ เนื้อหาที่ส่งหาเยอะที่สุด -->

            <!-- เนื้อหาที่ส่งบ่อยที่สุด -->
            <div id="collapse_check_in_2" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_checkin_send_round as $checkin_send_round)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_send_round->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $checkin_send_round->photo}}" class="p-1" alt="">
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
            <!-- จบ เนื้อหาที่ส่งบ่อยที่สุด -->

            <!-- เนื้อหาที่มีคนดูมากที่สุด -->
             <div id="collapse_check_in_3" class="collapse" data-parent="#accordion_of_check_in">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่มีคนดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_checkin_user_click as $checkin_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($checkin_user_click->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $checkin_user_click->photo}}" class="p-1" alt="">
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
            <!-- จบ เนื้อหาที่มีคนดูมากที่สุด -->

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
                            <b>By_Car</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="#" type="button" class="btn btn-sm btn-primary text-white">
                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_car_1" aria-expanded="true" aria-controls="collapse_car_1" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_car_2" aria-expanded="true" aria-controls="collapse_car_2" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_car_3" aria-expanded="true" aria-controls="collapse_car_3" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่มีคนดูมากที่สุด
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
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_car_show_user as $by_car_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_show_user->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $by_car_show_user->photo}}" class="p-1" alt="">
                                            @else
                                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                                            @endif
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="mb-0 font-weight-bold">{{ $by_car_show_user->name_content ? $by_car_show_user->name_content : "--"}}</h5>
                                        </div>
                                        <p class="ms-auto mb-0 text-purple">{{ $by_car_show_user->count_show_user }} ครั้ง</p>
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
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_car_send_round as $by_car_send_round)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_send_round->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $by_car_send_round->photo}}" class="p-1" alt="">
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

            <!-- เนื้อหาที่มีคนดูมากที่สุด -->
            <div id="collapse_car_3" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่มีคนดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_car_user_click as $by_car_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_car_user_click->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $by_car_user_click->photo}}" class="p-1" alt="">
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
            <!-- จบ เนื้อหาที่มีคนดูมากที่สุด -->


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
                            <b>By_User</b>
                        </h5>
                    </div>
                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                        <a href="#" type="button" class="btn btn-sm btn-primary text-white">
                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                        </a>

                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                ตัวเลือก
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="collapse" data-target="#collapse_user_1" aria-expanded="true" aria-controls="collapse_user_1" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_user_2" aria-expanded="true" aria-controls="collapse_user_2" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </a>
                                <a data-toggle="collapse" data-target="#collapse_user_3" aria-expanded="true" aria-controls="collapse_user_3" href="javaScript:;" class="dropdown-item">
                                    เนื้อหาที่มีคนดูมากที่สุด
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด -->
            <div id="collapse_user_1" class="collapse show" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_user_show_user as $by_user_show_user)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_user_show_user->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $by_user_show_user->photo}}" class="p-1" alt="">
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
            <!-- จบ เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด -->

            <!-- เนื้อหาที่ส่งบ่อยที่สุด -->
            <div id="collapse_user_2" class="collapse" data-parent="#accordion_of_user">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่ส่งบ่อยที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_user_send_round as $by_user_send_round)
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                    </div>
                                    <div class="product-img">
                                        @if (!empty($by_user_send_round->photo))
                                            <img src="https://www.viicheck.com/storage/{{ $by_user_send_round->photo}}" class="p-1" alt="">
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

            <!-- เนื้อหาที่มีคนดูมากที่สุด -->
            <div id="collapse_user_3" class="collapse" data-parent="#accordion_of_car">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="best-selling-products p-3 mb-3">
                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                    เนื้อหาที่มีคนดูมากที่สุด
                                </span>
                                <hr>
                                @foreach ($all_by_user_user_click as $by_user_user_click)
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                        </div>
                                        <div class="product-img">
                                            @if (!empty($by_user_user_click->photo))
                                                <img src="https://www.viicheck.com/storage/{{ $by_user_user_click->photo}}" class="p-1" alt="">
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
            <!-- จบ เนื้อหาที่มีคนดูมากที่สุด -->

        </div>
    </div>
    <!-- END User  -->
</div>

<hr>

<!--========================== By Check In ===============================-->
<h3>By Check In</h3>
<div class="row row-cols-1 row-cols-lg-3">

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

                            <div class="store-metrics p-3 mb-3 ps ps--active-y">
                                <h5 class="text-center">พื้นที่ : ทั้งหมด</h5>
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
                                <div class="card mt-3 radius-10 border shadow-none">
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

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ พื้นที่ : ทั้งหมด -->

            <!-- พื้นที่ : ViiCHECK พระนครศรีอยุธยา -->
            <div id="collapse_By_Check_In2" class="collapse" data-parent="#accordion_ByCheckIn">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">

                            <div class="store-metrics p-3 mb-3 ps ps--active-y">
                                <h5 class="text-center">พื้นที่ : ViiCHECK พระนครศรีอยุธยา</h5>
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
                                <div class="card mt-3 radius-10 border shadow-none">
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

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- พื้นที่ : ViiCHECK จตุจักร -->
            <div id="collapse_By_Check_In3" class="collapse" data-parent="#accordion_ByCheckIn">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">

                            <div class="store-metrics p-3 mb-3 ps ps--active-y">
                                <h5 class="text-center">พื้นที่ : ViiCHECK จตุจักร</h5>
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
                                <div class="card mt-3 radius-10 border shadow-none">
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

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- พื้นที่ : ViiCHECK นครนายก -->
            <div id="collapse_By_Check_In4" class="collapse" data-parent="#accordion_ByCheckIn">
                <div class="card-body">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">

                            <div class="store-metrics p-3 mb-3 ps ps--active-y">
                                <h5 class="text-center">พื้นที่ : ViiCHECK นครนายก</h5>
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
                                <div class="card mt-3 radius-10 border shadow-none">
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

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="col-12 col-xl-4 d-flex">
       <div class="card radius-10 w-100 overflow-hidden">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <h5 class="mb-0">Store Metrics</h5>
                   </div>
                   <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                   </div>
               </div>
           </div>

           <div class="store-metrics p-3 mb-3 ps ps--active-y">

               <div class="card mt-3 radius-10 border shadow-none">
                   <div class="card-body">
                       <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Products</p>
                               <h4 class="mb-0">856</h4>
                           </div>
                           <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class="bx bxs-shopping-bag"></i>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card radius-10 border shadow-none">
                   <div class="card-body">
                       <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Customers</p>
                               <h4 class="mb-0">45,241</h4>
                           </div>
                           <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-group"></i>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card radius-10 border shadow-none">
                   <div class="card-body">
                       <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Categories</p>
                               <h4 class="mb-0">98</h4>
                           </div>
                           <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-category"></i>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card radius-10 border shadow-none">
                   <div class="card-body">
                       <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Orders</p>
                               <h4 class="mb-0">124</h4>
                           </div>
                           <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bxs-cart-add"></i>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card radius-10 border shadow-none mb-0">
                   <div class="card-body">
                       <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Vendors</p>
                               <h4 class="mb-0">55</h4>
                           </div>
                           <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class="bx bxs-user-account"></i>
                           </div>
                       </div>
                   </div>
               </div>
           <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div></div>
       </div>
    </div> --}}

</div>

<hr>

<!--========================== By Car ===============================-->
<h3>By Car</h3>
<div class="row row-cols-1 row-cols-lg-2">
    <div class="col"> <!-- Card 1 -->
        <div class="card radius-10">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-lg-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-2 mb-lg-0" style="font-weight: bold">รถที่ลงทะเบียน</h6>
                    </div>
                    <div class="ms-lg-auto mb-2 mb-lg-0">
                        <div class="btn-group-round">
                            <div class="btn-group">
                                <button type="button" class="btn btn-white">Day</button>
                                <button type="button" class="btn btn-white">Week</button>
                                <button type="button" class="btn btn-white">Month</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary radius-10 ms-lg-3">Download CSV</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart1"></div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อสกุล</th>
                                <th scope="col">รถ</th>
                                <th scope="col">วันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>All-new</td>
                                <td>1-1-2023</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>All-new</td>
                                <td>1-1-2023</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td >Larry the Bird</td>
                                <td>All-new</td>
                                <td>1-1-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="col"> <!-- Card 2 -->
        <div class="card radius-10">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-lg-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-2 mb-lg-0" style="font-weight: bold">รถที่ถูกรายงาน</h6>
                    </div>
                    <div class="ms-lg-auto mb-2 mb-lg-0">
                        <div class="btn-group-round">
                            <div class="btn-group">
                                <button type="button" class="btn btn-white">Day</button>
                                <button type="button" class="btn btn-white">Week</button>
                                <button type="button" class="btn btn-white">Month</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary radius-10 ms-lg-3">Download CSV</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart2"></div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อสกุล</th>
                                <th scope="col">รถ</th>
                                <th scope="col">จำนวนครั้ง</th>
                                <th scope="col">วันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>All-new</td>
                                <td>2</td>
                                <td>22-6-2023</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>All-new</td>
                                <td>1</td>
                                <td>22-6-2023</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td >Larry the Bird</td>
                                <td>All-new</td>
                                <td>1</td>
                                <td>22-6-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>




