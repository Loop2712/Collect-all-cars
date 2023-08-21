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

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-lush">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">จำนวนรถทั้งหมด</h5>
                        <h3 class="mb-0 text-dark font-weight-bold">{{ count($all_car_organization) }} คัน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img width="40" src="{{ asset('/img/icon/car_img.png') }}">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold" >จำนวนรถยนต์</h5>
                        <h3 class="mb-0 text-dark font-weight-bold">{{ $car_type_data }} คัน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img width="40" src="{{ asset('/img/icon/car.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-blues">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">จำนวนรถจักรยานยนต์</h5>
                        <h3 class="mb-0 text-dark font-weight-bold">{{ $motorcycle_type_data}} คัน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img width="40" src="{{ asset('/img/icon/motorcycle2.png') }}">
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
                        <h5 class="mb-0 text-dark font-weight-bold">จำนวนรถประเภทอื่นๆ</h5>
                        <h3 class="mb-0 text-dark font-weight-bold">{{ $other_type_data}} คัน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img width="40" src="{{ asset('/img/icon/semi.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<div class="row row-cols-1 row-cols-lg-3">
    <!-- รถที่ถูกรายงานมากที่สุด -->
    <div class="col-12 col-md-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0" >รถที่ถูกรายงานมากที่สุด {{ count($report_car_top5) }} อันดับ</h5>
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
                @foreach ($report_car_top5 as $report_car_top5)
                    <div class="d-flex align-items-center ">
                        <div class="product-img ">
                            @if(!empty($report_car_top5->photo))
                                <img src="{{ url('storage') }}/{{ $report_car_top5->photo }}" class="p-0" alt="">
                            @endif
                            @if(empty($report_car_top5->photo) && !empty($report_car_top5->avatar))
                                <img src="{{ $report_car_top5->avatar }}" class="p-0" alt="">
                            @endif
                            @if(empty($report_car_top5->photo && empty($report_car_top5->avatar)))
                                <img src="{{ asset('/Medilab/img/icon.png') }}" class="p-0" alt="">
                            @endif
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-0 text-dark">{{ $report_car_top5->name_from_users }}</h5>
                            <h6 class="mb-0 ps-0">{{$report_car_top5->registration}} {{$report_car_top5->county}}</h6>
                        </div>
                        <div class="count_checkin_number bg-gradient-burning text-white text-weight-bold ms-auto">{{$report_car_top5->amount_report}} ครั้ง
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>

        </div>
    </div>
    <!-- ประเภทรถมากที่สุด -->
    <div class="col-12 col-md-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0" >ประเภทรถมากที่สุด {{ count($type_car_registration_top5)}} อันดับ</h5>
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
                @foreach ($type_car_registration_top5 as $type_car_top5)

                    @php
                        switch ($type_car_top5->type_car_registration) {
                            case 'รถยนต์นั่งส่วนบุคคลไม่เกิน 7 คน':
                                    $img_type_car = 'car1.png';
                                break;
                            case 'รถจักรยานยนต์':
                                    $img_type_car = 'car2.png';
                                break;
                            case 'รถยนต์บรรทุกส่วนบุคคล':
                                    $img_type_car = 'pickup-truck.png';
                                break;
                            default:
                                # code...
                                break;
                        }
                    @endphp
                    <div class="d-flex align-items-center ">
                        <div class="p-1">
                            <img src="{{ asset("/img/icon/$img_type_car") }}" width="40" alt="" />
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-0 text-dark">{{$type_car_top5->type_car_registration}}</h5>
                        </div>
                        <div class="count_checkin_number bg-gradient-cosmic text-white text-weight-bold ms-auto">{{$type_car_top5->amount_type_car}} คัน
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>
    <!-- ยี่ห้อรถมากที่สุด -->
    <div class="col-12 col-md-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0" >ยี่ห้อรถมากที่สุด {{ count($brand_car_top5) }} อันดับ</h5>
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
                @foreach ($brand_car_top5 as $brand_car_top5)

                    <div class="d-flex align-items-center ">
                        <div class="ps-3">
                            <div class="p-1 d-flex align-items-center">
                                @if ($brand_car_top5->car_type != "other")
                                    <img src="{{ asset('img/logo_brand/logo-' . Illuminate\Support\Str::lower($brand_car_top5->brand) . '.png') }}" width="40" alt="" />
                                @else
                                    <img src="{{ asset('img/logo_brand/logo-.png') }}" width="40" alt="" />
                                @endif
                                <span class="mb-0 text-dark font-22 ms-2">{{ $brand_car_top5->brand }}</span>
                            </div>
                        </div>
                        <div class="count_checkin_number bg-gradient-moonlit text-white text-weight-bold ms-auto">
                            {{ $brand_car_top5->amount_brand_car }} คัน
                        </div>
                    </div>
                <hr>
                @endforeach
            </div>

        </div>
    </div>
</div><!--end row-->
