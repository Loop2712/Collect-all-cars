<!-- ======================================================================
                                ข้อมูลผู้ใช้
=========================================================================== -->

<!-- ============================= 4 card ================================= -->

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">ผู้ใช้ใหม่เดือนนี้</p>
                        <h5 class="mb-0 text-white">867</h5>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-regular fa-user-plus font-30"></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 46%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white" >ผู้ใช้ทั้งหมด</p>
                        <h5 class="mb-0 text-white">24.5K</h5>
                    </div>
                    <div class="ms-auto text-white"><i class="fa-regular fa-user font-30"></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">---</p>
                        <h5 class="mb-0 text-white">$52,945</h5>
                    </div>
                    <div class="ms-auto text-white"><i class="bx bx-wallet font-30"></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 72%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">---</p>
                        <h5 class="mb-0 text-white">869</h5>
                    </div>
                    <div class="ms-auto text-white"><i class="bx bx-chat font-30"></i>
                    </div>
                </div>
                <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 66%"></div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<!-- ============================= User from other organization ================================= -->

<div class="row mb-3">
    <div class="col-12 col-xl-8">
        <div class="card radius-10 mb-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">ข้อมูลผู้ใช้ขององค์กร</h5>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ url('/dashboard_user_index') }}" class="btn btn-primary btn-sm radius-30">ดูข้อมูลผู้ใช้ทั้งหมด</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0 ">
                        <thead class="table-light">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($total_userData as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                @if(!empty($user->avatar) && empty($user->photo))
                                                    <img src="{{ $user->avatar }}">
                                                @endif
                                                @if(!empty($user->photo))
                                                    <img src="{{ url('storage') }}/{{ $user->photo }}">
                                                @endif
                                                @if(empty($user->avatar) && empty($user->photo))
                                                    <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                                @endif
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{$user->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$user->location_P}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td class=""><span class="badge bg-light-success text-success w-40">{{$user->status}}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header ">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">ผู้ใช้จากส่วนอื่น(Sub_Organization)</h6>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
            </div>
            <div class="dashboard-top-countries mb-3 p-3 ps ps--active-y">
                @foreach ($countSub as $countSub)
                    <div class="row mb-4">
                        <div class="col">
                            <p class="mb-2">{{$countSub->sub_organization}}<strong class="float-end">{{ $countSub->sub_organization_count }} </strong></p>
                            <div class="progress radius-10" style="height:6px;">
                                <div class="progress-bar bg-gradient-blues" role="progressbar" style="width: {{ ($countSub->sub_organization_count / $totalCount) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 330px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 269px;"></div></div></div>
        </div>
     </div>
</div><!--end row-->






