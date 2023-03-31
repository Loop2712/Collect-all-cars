@extends('layouts.partners.theme_partner_new')


@section('content')

<style>
    .btn-outline-delete{
        color: #db2d2e !important;
        border: none !important;
        padding: .5rem 1rem !important;
        border-radius: 5px !important;
    }.btn-outline-delete:hover{
        background-color: #db2d2e !important;
        color: #fff !important;

    }
    div {
        font-family: 'Mitr', sans-serif;
    }
    label {
    width: 100%;
    font-size: 1rem;
    }
    .card-input-element+.card {
        height: calc(36px + 2*1rem);
        color: #0d6efd;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid transparent;
        border-radius: 10px;
        outline: #0d6efd 1px solid;
    }

    .card-input-element+.card:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card {
        border: 2px solid #0d6efd;
        color: #fff !important;
        background-color: #0d6efd !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-element:checked+.card::after {
        content: '\f00c';
        color: #AFB8EA;
        font-family: 'Font Awesome\ 5 Free';
        font-weight: 900; /* Fix version 5.0.9 */
        font-size: 24px;
        -webkit-animation-name: fadeInCheckbox;
        animation-name: fadeInCheckbox;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    @-webkit-keyframes fadeInCheckbox {
        from {
            opacity: 0;
            -webkit-transform: rotateZ(-20deg);
        }

        to {
            opacity: 1;
            -webkit-transform: rotateZ(0deg);
        }
    }

    @keyframes fadeInCheckbox {
        from {
            opacity: 0;
            transform: rotateZ(-20deg);
        }

        to {
            opacity: 1;
            transform: rotateZ(0deg);
        }
    }

    .card-input-red{
        outline: #db2d2e 1px solid !important;
        width: 100% !important;
    }
    .card-input-red:checked+.card {
        

        border: 2px solid #db2d2e !important;
        background-color: #db2d2e !important;
        color: #fff !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }
    .btn-close-modal{
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 99;
    }
</style>
<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="row mt-2">
            <div class="col-12">
                <h3 class="font-weight-bold float-start mb-0">
                    การจัดการผู้ใช้
                </h3>

                <a style="margin-left: 10px;margin-right: 10px;" class="float-end ms-auto mt-1" type="button" data-toggle="modal" data-target="#Partner_user">
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-info-circle"></i>วิธีใช้
                    </button>
                </a>
                <button style="margin-left: 10px;margin-right: 10px;" type="button" class="btn btn-white radius-10 float-end ms-auto" data-toggle="modal" data-target="#exampleModal">
                    <i class='bx bx-user-plus'></i>สร้างบัญชีผู้ใช้ใหม่
                </button>

                <!-- <button  type="button" class="d-none btn btn-dark radius-10 float-end ms-auto" >
                    ค้นหาขั้นสูง
                </button> -->
                @if ( auth()->user()->sub_organization == "ศูนย์ใหญ่" )
                    <select style="margin-left: 10px;margin-right: 10px;" name="search_area" id="search_area"  class="btn btn-white radius-10 float-end ms-auto" onchange="search_all_name_user_partner()">
                        <option value="" selected>เลือกพื้นที่</option>
                        @foreach($area_user as $item)
                        <option value="{{$item->sub_organization}}">{{$item->sub_organization}}</option>
                        @endforeach
                    </select>
                @endif

                <select style="margin-left: 10px;margin-right: 10px;" name="search_status" id="search_status"  class="btn btn-white radius-10 float-end ms-auto" onchange="search_all_name_user_partner()">
                    <option value="" selected>เลือกสถานะ</option>
                    <option value="admin-partner">แอดมิน</option>
                    <option value="partner">เจ้าหน้าที่</option>

                </select>
                
                <div style="margin-left: 10px;margin-right: 10px;" class=" float-end ms-auto">
                        <div class="input-group"> 
                            <input type="text" class="form-control border-end-0"  name="normal_search" id="normal_search" placeholder="พิมพ์ในช่องเพื่อค้นหา" oninput="search_all_name_user_partner();">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    <!-- <div class="input-group form-inline">
                        <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="ค้นหา..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn " type="submit" style="border-color:#D2D7DC;border-style: solid;border-width: 1px 1px 1px 1px;border-radius: 0px 30px 30px 0px">
                                <i class="bx bx-search"></i>
                            </button>
                        </span>
                    </div> -->
                </div>

            </div>


        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อ</th>
                        <th>ประเภท</th>
                        <th>เบอร์</th>
                        <th>สถานะ</th>
                        <th>พื้นที่</th>
                        <th>ผู้สร้าง</th>
                        <!-- <th>การใช้งาน</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody_data_admin">
                    @foreach($all_user as $item)
                    <tr>
                        <td>
                            <span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;{{ $item->name }}
                        </td>
                        <td class="text-center">
                            @switch($item->type)
                            @case('line')
                            <i class="fab fa-line text-success"></i>
                            @break
                            @case('facebook')
                            <i class="fab fa-facebook-square text-primary"></i>
                            @break
                            @case('google')
                            <i class="fab fa-google text-danger"></i>
                            @break
                            @case(null)
                            <i class="bx bx-globe" style="color: #5F9EA0"></i>
                            @break
                            @endswitch
                        </td>
                        <td class="text-center">{{ $item->phone }}</td>
                        <td class="text-center">
                            @switch($item->role)
                            @case('partner')
                            เจ้าหน้าที่
                            @break
                            @case('admin-partner')
                            <b>แอดมิน</b>
                            @break
                            @case(null)
                            พนักงาน
                            @break
                            @endswitch
                        </td>
                        <td class="text-center">
                            @if(!empty($item->sub_organization))
                            <span>{{ $item->sub_organization }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!empty($item->creator))
                            @php
                            $user_creator = App\User::where('id', $item->creator)->first();
                            @endphp
                            <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                <i class="far fa-eye text-primary"></i>
                            </a>
                            <br>
                            {{ $user_creator->name }}
                            @else
                            <img src="{{ asset('/img/logo/logo_x-icon_2.png') }}" style="width:50px;" class="img-radius">
                            @endif
                        </td>
                        <!-- <td class="text-center">
                                    @switch($item->status)
                                        @case('active')
                                            <a href="#" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Active</a>
                                        @break
                                        @case('expired')
                                            <a href="#" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>Expired</a>
                                        @break
                                    @endswitch
                                </td> -->
                        <td class="text-center">
                            @if($item->role != 'admin-partner')
                            <button class="btn-outline-delete" onclick="cancel_membership('{{ $item->id }}');">
                                <i class="fa-solid fa-trash-can"></i> ยกเลิกสถานะ
                            </button>
                            @else
                            <!--  -->
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination round-pagination " style="margin-top:10px;"> {!! $all_user->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>

<!-- --------------------------------- แสดงเฉพาะคอม ------------------------------- -->
<!-- Button trigger modal -->
<button id="btn_modal_confirm_create" class="btn d-none" data-toggle="modal" data-target="#exampleModal">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header d-none">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button class="btn btn-close-modal"  data-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body ">
                <center>
                    <img width="40%" class="m-2" src="{{ asset('/img/more/my_answe.svg') }}">
                    <br><br>
                    <h5 class="text-danger">ยืนยันการสร้างสมาชิก</h5>
                    <br>
                    <div class="row">
                        
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class=" col-12">
                                <label>
                                    <input type="radio" name="type" class="card-input-red card-input-element d-none" onclick="document.querySelector('#type_user_partner').value = 'admin-partner'; type_user_partner('admin-partner');">
                                    <div class="w-100 card card-body d-flex flex-row justify-content-between align-items-center text-danger card-input-red">
                                        <b>
                                            แอดมิน
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="">
                                <label>
                                    <input type="radio" name="type" class="card-input-element d-none" onclick="document.querySelector('#type_user_partner').value = 'partner'; type_user_partner('partner');">
                                    <div class="w-100 card card-body d-flex flex-row-reverse  justify-content-between align-items-center">
                                        <b>
                                            เจ้าหน้าที่
                                        </b>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'admin-partner'; type_user_partner('admin-partner');"> แอดมิน &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'partner'; type_user_partner('partner');"> เจ้าหน้าที่ -->
                </center>
                <div id="div_data_officer_partner" class="row d-none">
                    <div class="col-12 d-none">
                        <input class="form-control" type="text" name="type_user_partner" id="type_user_partner" readonly>
                    </div>
                    <div class="col-12">
                        @if($sub_organization != "ศูนย์ใหญ่")
                        <input class="form-control d-none" type="text" name="sub_organization" id="sub_organization" value="{{ $sub_organization }}" readonly>
                        @else
                        <div class="col-12 mb-3">
                            <div class="input-group">
                             <span class="input-group-text bg-transparent"><i class="fa-solid fa-location-dot"></i></span>
                                <select class="form-select border-start-0" name="sub_organization" id="sub_organization">
                                    <span class="input-group-text bg-transparent"><i class="fa-duotone fa-signature"></i></span>
                                    <option value="ศูนย์ใหญ่">ศูนย์ใหญ่</option>
                                    @foreach($polygon_provinces as $item_op)
                                    <option value="{{ $item_op->province_name }}">{{ $item_op->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <label class="control-label" style="font-size:17px;">เลือกพื้นที่</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-duotone fa-signature"></i></span>
                                <select class="form-control border-start-0" name="sub_organization" id="sub_organization">
                                    <span class="input-group-text bg-transparent"><i class="fa-duotone fa-signature"></i></span>
                                    <option value="ศูนย์ใหญ่">ศูนย์ใหญ่</option>
                                    @foreach($polygon_provinces as $item_op)
                                    <option value="{{ $item_op->province_name }}">{{ $item_op->province_name }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                        </div>
                        @endif
                    </div>
                    <!-- <div class="col-12" style="margin-top:15px;">
                        <label class="control-label" style="font-size:17px;"><b>ชื่อเจ้าหน้าที่</b> </label>
                        <span class="text-secondary">(ใช้สำหรับแสดงในระบบ)</span>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name_officer" id="name_officer">
                        </div>
                    </div> -->
                    <div class="col-12">
                        <label for="name_officer" class="form-label">ชื่อเจ้าหน้าที่</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-duotone fa-signature"></i></span>
                            <input type="text" class="form-control border-start-0"  name="name_officer" id="name_officer" placeholder="ชื่อที่ใช้สำหรับแสดงในระบบ">
                        </div>
                    </div>
                    <!-- <div class="col-12" style="margin-top:15px;">
                        <label class="control-label notranslate" style="font-size:17px;"><b>Username</b> </label>
                        <span class="text-secondary">(ใช้สำหรับเข้าสู่ระบบ)</span>
                        <div class="form-group">
                            <input class="form-control" type="text" name="user_name_officer" id="user_name_officer">
                        </div>
                    </div> -->
                    <style>
                        .nav-pill-danger{
                            color:#db2d2e;
                    } .nav-pill-danger:hover{
                            color:#fff;
                            background-color: #db2d2e;
                    } 
                    </style>
                   
                    <div class="col-12 mt-3">
                        <label for="user_name_officer" class="form-label">Username</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control border-start-0"  name="user_name_officer" id="user_name_officer" placeholder="Username ที่ใช้ในการเข้าสู่ระบบ">
                        </div>
                    </div>
                </div>
            </div>
            <div id="div_submit_create_user_partner" class="modal-footer d-none pt-0" style="border: none;">
                <a id="btn_link_creat" class="d-none">btn_link_creat</a>
                <a style="width:100%;" id="btn_modal" class="btn btn-primary text-white" onclick="creat_officer_partner();">
                    ยืนยัน
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- --------------------------------- สิ้นสุดแสดงเฉพาะคอม ------------------------------- -->
<!------------------------------------------------ mobile---------------------------------------------- -->
<div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="row">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="col-12" style="margin-top:10px">
                <div>
                    <h5 class="font-weight-bold mb-0">จัดการผู้ใช้ / Manage users</h5>
                </div>
                <form method="GET" action="{{ url('/manage_user_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right ms-auto" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="ค้นหา..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn " type="submit" style="border-color:#D2D7DC;border-style: solid;border-width: 1px 1px 1px 1px;border-radius: 0px 30px 30px 0px">
                                <i class="bx bx-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-white radius-10" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-user-plus'></i>สร้างบัญชีผู้ใช้ใหม่</button>
                </div>
            </div>
        </div>
        <div class="card-body" style="padding: 0px 10px 0px 10px;">
            @foreach($all_user as $item)
                @foreach($data_partners as $data_partner)
                @endforeach
            <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                <center>
                    <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                        <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}">
                            @switch($item->type)
                            @case('line')
                            <i class="bx bx-line text-success"></i>
                            @break
                            @case('facebook')
                            <i class="bx bx-facebook-oval text-primary"></i>
                            @break
                            @case('google')
                            <i class="lni lni-google text-danger"></i>
                            @break
                            @case(null)
                            <i class="bx bx-globe" style="color: #5F9EA0"></i>
                            @break
                            @endswitch
                        </div>
                        <div class="col-8" style="margin-bottom:0px;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}">
                            <h5 style="margin-bottom:0px; margin-top:0px; ">
                                <a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;
                                {{ $item->name }}
                                @switch($item->ranking)
                                @case('Gold')
                                <img width="20" src="{{ url('/img/ranking/gold.png') }}"> Gold
                                @break
                                @case('Silver')
                                <img width="20" src="{{ url('/img/ranking/silver.png') }}"> Silver
                                @break
                                @case('Bronze')
                                <img width="20" src="{{ url('/img/ranking/bronze.png') }}"> Bronze
                                @break
                                @endswitch

                            </h5>
                        </div>
                        <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="Line_{{ $item->id }}">
                            <hr>
                            <p style="font-size:18px;padding:0px"> เบอร์ : {{ $item->phone }} </p>
                            <hr>
                            <p style="font-size:18px;padding:0px"> สถานะ : {{ $item->role }} </p>
                            <hr>
                            <p style="font-size:18px;padding:0px"> การใช้งาน :
                                @switch($item->status)
                                @case('active')
                                <a href="#" class="btn btn-sm btn-success radius-30"><i class="bx bx-check-double"></i>Active</a>
                                @break
                                @case('expired')
                                <a href="#" class="btn btn-sm btn-danger radius-30"><i class="fadeIn animated bx bx-x"></i>Expired</a>
                                @break
                                @endswitch
                            </p>
                            @if(!empty($item->creator))
                            <hr>
                            <p style="font-size:18px;padding:0px">ผู้ลงทะเบียน <br>
                                <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                    <i class="far fa-eye text-primary"></i> {{$item->creator}}
                                </a>
                            </p>
                            @endif
                        </div>
                    </div>
                </center>
            </div>
            @endforeach
            <div class="pagination-wrapper"> {!! $all_user->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>
<!------------------------------------------- Modal จัดการผู้ใช้ ------------------------------------------->
<div class="modal fade" id="Partner_user" tabindex="-1" role="dialog" aria-labelledby="Partner_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_userTitle">จัดการผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/img/วิธีใช้งาน_p/12.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.สร้างบัญชีผู้ใช้ใหม่</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="login">
                            <br>
                            <center><img src="{{ asset('/img/วิธีใช้งาน_p/13.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.สถานะสมาชิก
                                <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1 Admin : สามารถใช้ระบบ ViiCHECK PARTNER และมีสิทธิ์จัดการข้อมูลภายในองค์กรได้</h5>
                                <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2 Member : สามารถใช้ระบบ ViiCHECK PARTNER แต่ไม่มีสิทธิ์ในการจัดการข้อมูลภายในองค์กร</h5>
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 2.ปิด : หากไม่ต้องการเพิ่มสมาชิกให้คลิกที่ปุ่มปิด</h5>
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 3.ยืนยัน : เมื่อกำหนดสถานะสมาชิกแล้วให้คลิกที่ปุ่มยืนยัน</h5>

                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางสมาชิก</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="Social_login">
                            <br>
                            <center><img src="{{ asset('/img/วิธีใช้งาน_p/14.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อผู้ใช้</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.ประเภท : แสดงประเภทการเข้าสู้ระบบ มีดังนี้
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-line text-success"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี LINE </h5>
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-facebook-square text-primary"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Facebook</h5>
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-google text-danger"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Google </h5>
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-globe" style="color: #5F9EA0"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชีที่สมัครสมาชิกผ่านหน้าเว็บ</h5>
                            </h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.การจัดอันดับ มีดังนี้
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/gold.png') }}"> " หมายถึง ระดับ Gold </h5>
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/silver.png') }}"> " หมายถึง ระดับ Silver</h5>
                                <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/bronze.png') }}"> " หมายถึง ระดับ Bronze </h5>
                            </h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 4.เบอร์ : แสดงเบอร์ผู้ใช้</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 5.สถานะ : แสดงสถานะบทบาทของบัญชี</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 6.สถานะการใช้งาน : แสดงสถานะการใช้งานของบัญชี</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 7.ผู้สร้าง : แสดงชื่อผู้สร้างบัญชี</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ค้นหาผู้ใช้</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="sos_detail">
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">ค้นหารายการจากชื่อผู้ใช้ตามคำที่กำหนด </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------- Modal จัดการผู้ใช้------------------------------------------->

<!------------------------------------------------ end mobile---------------------------------------------- -->

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // document.querySelector('#btn_modal_confirm_create').click();
    });

    function type_user_partner(type_user) {
        document.querySelector('#div_submit_create_user_partner').classList.remove('d-none');
        document.querySelector('#div_data_officer_partner').classList.remove('d-none');

    }

    function type_user_partner_m(type_user) {
        document.querySelector('#div_submit_create_user_partner_m').classList.remove('d-none');

    }

    function creat_officer_partner() {
        let type_user_partner = document.querySelector('#type_user_partner').value;
        let name_officer = document.querySelector('#name_officer').value;
        let user_name_officer = document.querySelector('#user_name_officer').value;
        let sub_organization = document.querySelector('#sub_organization').value;

        if (!name_officer) {
            document.querySelector('#name_officer').focus();
        } else if (!user_name_officer) {
            document.querySelector('#user_name_officer').focus();
        } else {
            console.log(type_user_partner);
            console.log(name_officer);
            console.log(user_name_officer);

            let btn_link_creat = document.querySelector('#btn_link_creat');
            let a_href = document.createAttribute("href");
            a_href.value = "{{ url('/create_user_partner') }}?type_user=" + type_user_partner + "&name=" + name_officer + "&user_name=" + user_name_officer + "&sub_organization=" + sub_organization;
            btn_link_creat.setAttributeNode(a_href);

            document.querySelector('#btn_link_creat').click();
        }
    }

    function cancel_membership(user_id) {

        fetch("{{ url('/') }}/api/cancel_membership/" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                window.location.reload(true);
            });
    }

    function search_all_name_user_partner() {
       
        let normal_search = document.querySelector('#normal_search').value;
        let search_area = document.querySelector('#search_area').value;
        let search_status = document.querySelector('#search_status').value;

        
        // alert(search_area);
        switch (normal_search) {
            case "เจ้าหน้าที่":
                normal_search = "partner";
            break;
            case "แอดมิน":
                normal_search = "admin-partner";
            break;
        }
        user_id = {{ auth()->id() }};
        // setTimeout(() => {
       
        fetch("{{ url('/') }}/api/search_all_name_user_partner/?search=" + normal_search + "&id=" + user_id + "&area=" + search_area + "&status=" + search_status)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                let tbody_data_admin = document.querySelector('#tbody_data_admin');
                tbody_data_admin.innerHTML = "" ;
                

                
                for (var xxiv = 0; xxiv < result.length; xxiv++) {

                    console.log(result[xxiv]['id']);

                    let admin_type;
                    switch (result[xxiv]['type']) {
                        case 'line':
                            admin_type = `<i class="fab fa-line text-success"></i>`;
                            break;
                        case 'facebook':
                            admin_type = `<i class="fab fa-facebook-square text-primary"></i>`;
                            break;
                        case 'google':
                            admin_type = `<i class="fab fa-google text-danger"></i>`;
                            break;
                        default:
                            admin_type = `<i class="bx bx-globe" style="color: #5F9EA0"></i>`;
                            break;
                    }

                    let admin_role;
                    switch (result[xxiv]['role']) {
                        case 'partner':
                            admin_role = `เจ้าหน้าที่`;
                        break;
                        case 'admin-partner':
                            admin_role = `<b>แอดมิน</b>`;
                        break;
                        case null :
                            admin_role = `พนักงาน`;
                        break;
                    }

                    let name_creator;
                    if (result[xxiv]['creator_name']) {
                        name_creator = `   <a href="{{ url('/').'/profile/'}} ` + result[xxiv]['creator'] + `" target="bank">
                                                <i class="far fa-eye text-primary"></i>
                                            </a>
                                            <br>
                                            ` + result[xxiv]['creator_name']  + `
                                        `;
                    } else {
                        name_creator =`<img src="{{ asset('/img/logo/logo_x-icon_2.png') }}" style="width:50px;" class="img-radius">`;
                    }

                    let phone_admin;
                    if (result[xxiv]['phone']) {
                        phone_admin = result[xxiv]['phone'];
                    }else{
                        phone_admin = "";

                    }
                    
                    let btn_cancle_role;
                    if (result[xxiv]['role'] != 'admin-partner') {
                        btn_cancle_role = `<button class="btn-outline-delete btn" onclick="cancel_membership('`+ result[xxiv]['id'] +`');">
                                                <i class="fa-solid fa-trash-can"></i> ยกเลิกสถานะ
                                            </button>`
                    }else{
                        btn_cancle_role =""
                    }

                    


                    let div_data_help_center = 
                    `<tr>
                        <td>
                            <span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'}} ` + result[xxiv]['id'] + `"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;`+ result[xxiv]['name'] +`
                        </td>
                        <td class="text-center">
                            `+ admin_type+`
                        </td>
                        <td class="text-center">
                            `+ phone_admin +`
                        </td > 
                        <td class="text-center"> 
                            `+ admin_role +`
                        </td>
                        <td class="text-center">
                            `+ result[xxiv]['sub_organization'] +`
                        </td>
                        <td class="text-center">
                            `+ name_creator +`
                        </td>
                        <td>
                        `+ btn_cancle_role +`
                        </td>
                    </tr>
                    `

                    tbody_data_admin.innerHTML += div_data_help_center ;

                }

            });
        // }, 2000);
    }
</script>

@endsection