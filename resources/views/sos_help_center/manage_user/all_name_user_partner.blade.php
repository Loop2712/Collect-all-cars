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
    .text-nocopy {
      -webkit-user-select: none;   
      -moz-user-select: none;     
      -ms-user-select: none;   
      user-select: none;          
    }.customers-list {
        height: auto !important;
    }
    .badge-offline {
        background-color: #817e81;
        font-size: 11px;
        width: 10px;
        height: 10px;
        border-radius: 50%; 
        
    }


    .badge-online {
        background-color: #11c77c;
        font-size: 11px;
        width: 10px;
        height: 10px;
        border-radius: 50%; animation-name: wave;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        
    }
    .badge-online + .textStatusOffilcer{
        color: #11c77c;
    }
    @keyframes wave {
        0% {box-shadow: 0 0 0px 0px rgb(17, 199, 124 , 0.5);}
        100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
    }

    .badge-busy {
        background-color: #f5424e;
        font-size: 11px;
        width: 10px;
        height: 10px;
        border-radius: 50%; animation-name: busy;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        
    }
    .badge-busy + .textStatusOffilcer{
        color: #f5424e;
    }
    @keyframes busy {
        0% {box-shadow: 0 0 0px 0px rgb(245, 66, 78 ,0.5);}
        100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
    }

    .textStatusOffilcer{
        margin-left: 0.7rem;
    }
</style>

<!-- Modal change number officer -->
<div class="text-nocopy modal fade" id="modal_change_number_officer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="change_number_officerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="change_number_officerLabel">
                    เปลี่ยนลำดับของเจ้าหน้าที่ศูนย์สั่งการ : {{ $sub_organization }}
                </h5>
                <button type="button" class="close btn btn-outline-secondary" data-dismiss="modal" aria-label="Close" onclick="search_all_name_user_partner();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($all_user as $item)
                <div class="card main-shadow main-radius" style="padding: 10px;">
                    <div class="row">
                        <div class="col-3 text-center">
                            <style>
                                .profile-image {
                                    width: 75px; /* ปรับขนาดตามที่คุณต้องการ */
                                    height: 75px; /* ปรับขนาดตามที่คุณต้องการ */
                                    object-fit: cover; /* ปรับขนาดภาพให้เต็มพื้นที่องค์ประกอบ */
                                    border-radius: 50%; /* ทำให้รูปเป็นวงกลม */
                                    border-style: solid;
                                    border-width: 3px;
                                    border-color: lightblue;
                                }

                                @keyframes slideOutRight {
                                  0% {
                                    transform: translateX(0);
                                    opacity: 1;
                                  }
                                  100% {
                                    transform: translateX(100px); /* ปรับค่าที่ต้องการให้เหมาะสม */
                                    opacity: 0;
                                  }
                                }

                                .slide-out-right {
                                  animation: slideOutRight 0.3s forwards;
                                }

                                @keyframes slideInLeft {
                                  0% {
                                    transform: translateX(-100px); /* ปรับค่าที่ต้องการให้เหมาะสม */
                                    opacity: 0;
                                  }
                                  100% {
                                    transform: translateX(0);
                                    opacity: 1;
                                  }
                                }

                                .slide-in-left {
                                  animation: slideInLeft 0.3s forwards;
                                }


                            </style>
                            @if(!empty($item->user->photo))
                                <img class="profile-image" src="{{ url('/storage') .'/'. $item->user->photo  }}">
                            @else
                                <img class="profile-image" src="{{ url('/partner/images/user/avatar-1.jpg') }}">
                            @endif
                        </div>
                        <div class="col-7 mt-3">
                            <div class="row">
                                <div class="col-8">
                                   
                                    <h5>{{ $item->name_officer_command }}</b></h5>
                                    <span>
                                        @switch($item->officer_role)
                                            @case('partner')
                                                (เจ้าหน้าที่)
                                            @break
                                            @case('admin-partner')
                                                (<b>แอดมิน</b>)
                                            @break
                                            @case(null)
                                                (พนักงาน)
                                            @break
                                        @endswitch
                                    </span>
                                </div>
                                <div id="div_change_number_officer_{{ $item->id }}" class="col-4" style="font-size: 20px;">
                                    
                                    @if(!empty($item->number))
                                        <i id="drop_number_{{ $item->id }}" class="fa-sharp fa-solid fa-caret-left" onclick="click_slide_icon('drop','{{ $item->number }}','{{ $item->id }}');"></i>&nbsp;&nbsp;
                                        <i id="tag_icon_{{ $item->id }}" dataNumber="{{ $item->number }}" class="fa-solid fa-circle-{{ $item->number }}" style="color: #20ccee;"></i>&nbsp;&nbsp;
                                        <i id="add_number_{{ $item->id }}" class="fa-sharp fa-solid fa-caret-right" onclick="click_slide_icon('add','{{ $item->number }}','{{ $item->id }}');"></i>
                                    @else
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <i id="tag_icon_{{ $item->id }}" class="fa-sharp fa-solid fa-circle-exclamation"></i>
                                    @endif

                                    <div id="mock_change_icon" class="d-none">
                                        <i mark="drop_number" class="fa-sharp fa-solid fa-caret-left"></i>&nbsp;&nbsp;
                                        <i mark="tag_icon" class="fa-solid fa-circle-1" style="color: #20ccee;"></i>&nbsp;&nbsp;
                                        <i mark="add_number" class="fa-sharp fa-solid fa-caret-right" ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 mt-3 text-center">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เลือก
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <span class="dropdown-item dd_item_{{ $item->id }}" item="0" onclick="click_select_num_officer('','{{ $item->id }}','{{ $item->number }}');">
                                    ว่าง
                                </span>
                                @for ($i = 1; $i <= $count_officer; $i++) 
                                    <span class="dropdown-item dd_item_{{ $item->id }}" item="{{ $i }}" onclick="click_select_num_officer('{{ $i }}','{{ $item->id }}','{{ $item->number }}');">
                                        ลำดับที่ {{ $i }}
                                    </span>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="modal-footer d-none">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

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
                            <input type="text" class="form-control border-end-0"  name="normal_search" id="normal_search" placeholder="ค้นหา.. ชื่อ สถานะ ตำแหน่ง" oninput="search_all_name_user_partner();">
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
                        <th>
                            ลำดับ &nbsp;
                            @if(Auth::user()->role == "admin-partner")
                                @if($sub_organization != "ศูนย์ใหญ่")
                                <span class="btn btn-sm btn-outline-info main-shadow main-radius" data-toggle="modal" data-target="#modal_change_number_officer">
                                    <i class="fa-duotone fa-repeat"></i>
                                </span>
                                @endif
                            @endif
                        </th>
                        <!-- <th>ตำแหน่ง</th> -->
                        <th>เจ้าหน้าที่</th>
                        <th>พื้นที่</th>
                        <th>สถานะ</th>
                        <th>ผู้สร้าง</th>
                        <th>จัดการ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody_data_admin">
                    @foreach($all_user as $item)
                    <tr>
                        <td class="text-center">
                            @switch($item->officer_role)
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
                            
                            @if(!empty($item->number))
                                <span class="font-weight-bold">
                                   - {{ $item->number }}
                                </span>
                            @endif
                            
                        </td>
                        <!-- <td class="text-center">
                            
                        </td> -->
                        <td>
                            <div class="customers-list  ">
                                <a target="break" href="{{ url('/').'/profile/'.$item->id }}" class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                    <div class="">
                                        @if(!empty($item->user->photo))
                                            <img src="{{ url('/storage') .'/'. $item->user->photo  }}"  class="rounded-circle" width="46" height="46" alt="">
                                        @else
                                            <img src="{{ url('/partner/images/user/avatar-1.jpg') }}"  class="rounded-circle" width="46" height="46" alt="">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $item->name_officer_command }}</h6>
                                        @if(!empty($item->user->phone))
                                        <p class="mb-0 font-13 text-secondary">{{ substr_replace(substr_replace($item->user->phone, '-', 3, 0), '-', 7, 0) }}</p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            @if(!empty($item->area))
                                <span>{{ $item->area }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @switch($item->status)
                                @case('Standby')
                                    <div class="d-flex align-items-center  justify-content-center">
                                        <div class="badge-online"></div> 
                                        <span class="textStatusOffilcer" >พร้อมช่วยเหลือ</span> 
                                    </div>
                                @break
                                @case('Helping')
                                    <div class="d-flex align-items-center  justify-content-center">
                                        <div class="badge-busy"></div> 
                                        <span class="textStatusOffilcer">กำลังช่วยเหลือ</span> 
                                    </div>
                                @break
                                @default
                                    <div class="d-flex align-items-center  justify-content-center">
                                        <div class="badge-offline"></div> 
                                        <span class="textStatusOffilcer">ไม่อยู่</span> 
                                    </div>
                                @break
                            @endswitch
                            <!-- @switch($item->status)
                                @case('Standby')
                                    <b><i class="fa-solid fa-circle-check" style="color: #2cb706;font-size: 25px;"></i></b>
                                    <br>
                                    พร้อมช่วยเหลือ
                                @break
                                @case('Helping')
                                    <b><i class="fa-regular fa-hourglass-clock" style="color: #ff881a;font-size: 25px;"></i></b>
                                    <br>
                                    กำลังช่วยเหลือ
                                @break
                                @default
                                    <b><i class="fa-duotone fa-circle-exclamation" style="font-size: 25px;"></i></b>
                                    <br>
                                    ไม่อยู่
                                @break
                            @endswitch -->
                        </td>
                        <td class="text-center">
                            @php
                                $user_creator = App\User::where('id', $item->creator)->first();
                            @endphp
                            @if(!empty($item->creator))
                            <div class="customers-list  ">
                                <a target="break" href="{{ url('/profile/' . $item->creator) }}" class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                    <div class="">
                                        @if(!empty($user_creator->photo))
                                            <img src="{{ url('/storage') .'/'. $user_creator->photo  }}"  class="rounded-circle" width="46" height="46" alt="">
                                        @else
                                            <img src="{{ url('/partner/images/user/avatar-1.jpg') }}"  class="rounded-circle" width="46" height="46" alt="">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $user_creator->name }}</h6>
                                    </div>
                                </a>
                            </div>
                            @else
                                <img src="{{ asset('/img/logo/logo_x-icon_2.png') }}" style="width:50px;" class="img-radius">
                            @endif
                            <!-- @if(!empty($item->creator))
                                
                                <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                    <i class="far fa-eye text-primary"></i>
                                </a>
                                <br>
                                {{ $user_creator->name }}
                            @else
                                <img src="{{ asset('/img/logo/logo_x-icon_2.png') }}" style="width:50px;" class="img-radius">
                            @endif -->
                        </td>
                        <td class="text-center">
                            @if($item->role != 'admin-partner')
                            <button class="btn-outline-delete" onclick="cancel_membership('{{ $item->user_id }}');">
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
            <h4>ระบบนี้สามารถใช้งานได้บนโหมด PC เท่านั้น</h4>
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
            // console.log(type_user_partner);
            // console.log(name_officer);
            // console.log(user_name_officer);

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
                console.log(result);
                window.location.reload(true);
            });
    }

    function search_all_name_user_partner() {
       
        let normal_search = document.querySelector('#normal_search').value;
        let search_status = document.querySelector('#search_status').value;
        let search_area = "" ;

        if ( '{{ auth()->user()->sub_organization }}' == "ศูนย์ใหญ่" ){
            search_area = document.querySelector('#search_area').value;
        }else{
            search_area = '{{ auth()->user()->sub_organization }}';
        }

        
        // alert(search_area);
        switch (normal_search) {
            case "เจ้าหน้าที่":
                normal_search = "partner";
            break;
            case "แอดมิน":
                normal_search = "admin-partner";
            break;
        }

        user_id = '{{ auth()->id() }}';

        // console.log(" user_id >> " + user_id);
        // console.log(" search_area >> " + search_area);
        // console.log(" normal_search >> " + normal_search);
        // console.log(" search_status >> " + search_status);

        fetch("{{ url('/') }}/api/search_all_name_user_partner/?search=" + normal_search + "&id=" + user_id + "&area=" + search_area + "&status=" + search_status)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let tbody_data_admin = document.querySelector('#tbody_data_admin');
                tbody_data_admin.innerHTML = "" ;
                
                for (var xxiv = 0; xxiv < result.length; xxiv++) {

                    // console.log(result[xxiv]['id']);

                    let admin_role;
                    switch (result[xxiv]['officer_role']) {
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

                    let status_officers ;
                    switch (result[xxiv]['status']) {
                        case 'Standby':
                            status_officers = `<div class="d-flex align-items-center  justify-content-center">
                                                <div class="badge-online"></div> 
                                                <span class="textStatusOffilcer">พร้อมช่วยเหลือ</span> 
                                            </div>`;
                        break;
                        case 'Helping':
                            status_officers = ` <div class="d-flex align-items-center  justify-content-center">
                                                    <div class="badge-busy"></div> 
                                                    <span class="textStatusOffilcer" style="color: #f5424e;">กำลังช่วยเหลือ</span> 
                                                </div>`;
                        break;
                        case null :
                            status_officers = ` <div class="d-flex align-items-center  justify-content-center">
                                                    <div class="badge-offline"></div> 
                                                    <span class="textStatusOffilcer">ไม่อยู่</span> 
                                                </div>`;
                        break;
                    }

                    let creator_name ;

                    if (result[xxiv]['creator_name']){
                        creator_name =  `<div class="customers-list  ">
                                    <a target="break" href="{{ url('/profile/') }}/`+ result[xxiv]['creator'] +`" target="bank" class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                        <div class="">
                                            @if(!empty($user_creator->photo))
                                                <img src="{{ url('/storage') .'/'. $user_creator->photo  }}"  class="rounded-circle" width="46" height="46" alt="">
                                            @else
                                                <img src="{{ url('/partner/images/user/avatar-1.jpg') }}"  class="rounded-circle" width="46" height="46" alt="">
                                            @endif
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">`+ result[xxiv]['creator_name'] +`</h6>
                                        </div>
                                    </a>
                                </div>`;
                    }else{
                        creator_name = `<img src="{{ asset('/img/logo/logo_x-icon_2.png') }}" style="width:50px;" class="img-radius">`;
                    }

                    let phone_user ;
                    if (result[xxiv]['phone']){
                        phone_user = result[xxiv]['phone'].substr(0, 3) + '-' + result[xxiv]['phone'].substr(3, 4) + '-' + result[xxiv]['phone'].substr(7);
                    }else{
                        phone_user = '';
                    }

                    let photo_user ;
                    if (result[xxiv]['photo']){
                        photo_user = `<img src="{{ url('/profile/') }}/`+ result[xxiv]['photo'] +`"  class="rounded-circle" width="46" height="46" alt="">`;
                    }else{
                        photo_user = `<img src='{{ url('/partner/images/user/avatar-1.jpg') }}'  class="rounded-circle" width="46" height="46" alt="">`;
                    }

                    let number_officer;
                    if (result[xxiv]['number']) {
                        number_officer =    "-" + result[xxiv]['number'];
                    } else {
                        number_officer ="";
                    }

                    let div_data_help_center = 
`
                    <tbody id="tbody_data_admin">
                    <tr>
                        <td class="text-center">
                           `+ admin_role +`
                           `+ number_officer +`
                        </td>
                        <td>
                            <div class="customers-list  ">
                                <a target="break" href="{{ url('/').'/profile/'}}`+ result[xxiv]['user_id'] +`" class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                    <div class="">
                                       `+photo_user+`
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">`+ result[xxiv]['name_officer_command'] +`</h6>
                                        `+phone_user+`
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            `+ result[xxiv]['area'] +`
                        </td>
                        <td class="text-center">
                            `+ status_officers +`
                        </td>
                        <td class="text-center">
                            `+ creator_name +`
                        </td>
                        <td class="text-center">
                            <button class="btn-outline-delete" onclick="cancel_membership('`+ result[xxiv]['user_id'] +`');">
                                <i class="fa-solid fa-trash-can"></i> ยกเลิกสถานะ
                            </button>
                        </td>
                    </tr>
                </tbody>
                `



                   ;

                    tbody_data_admin.innerHTML += div_data_help_center ;

                }

            });
    }
</script>

<script>
    function click_slide_icon(type , number , id){

        let count_officer = '{{ $count_officer }}' ;
        // console.log(count_officer);

        let new_number = 0 ;
        if (type === 'add'){
            new_number = parseInt(number) + 1 ;
            if (new_number > count_officer){
                new_number = 1 ;
            }
        }else{
            new_number = parseInt(number) - 1 ;
            if (new_number < 1){
                new_number = count_officer ;
            }
        }

        // ค้นหาเจ้าของ number เดิม เพื่อเปลี่ยนสลับกัน
        let owner_old_number = document.querySelector('[dataNumber="'+new_number+'"]');

        // tag icon ที่เลือก
        const circleIcon = document.querySelector('#tag_icon_'+id);

        circleIcon.classList.remove('slide-in-left');
        circleIcon.classList.add('slide-out-right');

        setTimeout(function() {
            circleIcon.classList.remove('slide-out-right');
            circleIcon.classList.add('slide-in-left');
        }, 500);
        
        circleIcon.classList.replace('fa-circle-'+number, 'fa-circle-'+new_number.toString());
        circleIcon.setAttribute('dataNumber',new_number);

        const btn_drop_number = document.querySelector('#drop_number_'+id);
        const btn_add_number = document.querySelector('#add_number_'+id);

        btn_drop_number.setAttribute('onclick',"click_slide_icon('drop',"+new_number+","+id+");");
        btn_add_number.setAttribute('onclick',"click_slide_icon('add',"+new_number+","+id+");");

        // ค้นหาเจ้าของ number เดิม เพื่อเปลี่ยนสลับกัน
        let id_tag_old_number = "" ;
        if (owner_old_number){

            owner_old_number.classList.remove('slide-in-left');
            owner_old_number.classList.add('slide-out-right');

            setTimeout(function() {
                owner_old_number.classList.remove('slide-out-right');
                owner_old_number.classList.add('slide-in-left');
            }, 500);

            owner_old_number.classList.replace('fa-circle-'+new_number, 'fa-circle-'+number.toString());
            owner_old_number.setAttribute('dataNumber',number);

            id_tag_old_number = owner_old_number.id.split('_')[2];

            let btn_drop_old_number = document.querySelector('#drop_number_'+id_tag_old_number);
            let btn_add_old_number = document.querySelector('#add_number_'+id_tag_old_number);
            btn_drop_old_number.setAttribute('onclick',"click_slide_icon('drop',"+number+","+id_tag_old_number+");");
            btn_add_old_number.setAttribute('onclick',"click_slide_icon('add',"+number+","+id_tag_old_number+");");
        }

        // เปลี่ยน dropdown_item สลับกัน
        let dd_item_old = document.querySelectorAll('.dd_item_'+id);

        for (let i_old = 0; i_old < dd_item_old.length; i_old++) {
            // console.log(dd_item_old[i_old]);
            // console.log( dd_item_old[i_old].getAttribute('item') );
            if (i_old == 0){
                i_old_c = '';
            }else{
                i_old_c = i_old;
            }
            dd_item_old[i_old].setAttribute('onclick', "click_select_num_officer('"+i_old_c+"','"+id+"','"+new_number+"');");
        }

        let dd_item_new = document.querySelectorAll('.dd_item_'+id_tag_old_number);

        for (let i_new = 0; i_new < dd_item_new.length; i_new++) {
            // console.log(dd_item_new[i_new]);
            // console.log( dd_item_new[i_new].getAttribute('item') );
            if (i_new == 0){
                i_new_c = '';
            }else{
                i_new_c = i_new;
            }
            dd_item_new[i_new].setAttribute('onclick', "click_select_num_officer('"+i_new_c+"','"+id_tag_old_number+"','"+number+"');");
        }

        let data_arr = [];

        data_arr = {
            "id_new_number" : id.toString(),
            "int_new_number" : new_number.toString(),
            "id_old_number" : id_tag_old_number.toString(),
            "int_old_number" : number.toString(),
        }

        // console.log(data_arr);

        // ส่งข้อมูลไปอัพเดท DB
        fetch("{{ url('/') }}/api/update_number_officer/data_1669_officer_commands", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            // return response.text();
        }).then(function(data){
            // console.log(data);
        }).catch(function(error){
            // console.error(error);
        });

    }

    function click_select_num_officer(new_number , id , old_number){
        // console.log(new_number);

        let owner_old_number = document.querySelector('[dataNumber="'+new_number+'"]');

        // เพิ่มตัวเลขใหม่เข้าไป
        if (!new_number){
            let text_i_empty = '&nbsp;&nbsp;&nbsp;&nbsp;'+
            '<i id="tag_icon_'+id+'" class="fa-sharp fa-solid fa-circle-exclamation"></i>';

            document.querySelector('#div_change_number_officer_'+id).innerHTML = text_i_empty ;
        }else{

            let mock_change_icon = document.querySelector('#mock_change_icon');
            let change_icon = mock_change_icon.cloneNode(true);
                change_icon.classList.remove('d-none');
                change_icon.setAttribute('id','');

            let i_drop_number = change_icon.querySelector('[mark="drop_number"]');
                i_drop_number.setAttribute('id','drop_number_'+id);
                i_drop_number.setAttribute('onclick',"click_slide_icon('drop',"+new_number+","+id+");");

            let tag_icon = change_icon.querySelector('[mark="tag_icon"]');
                tag_icon.setAttribute('id','tag_icon_'+id);
                tag_icon.setAttribute('dataNumber',new_number);
                tag_icon.setAttribute('class',"fa-solid fa-circle-"+new_number+" slide-in-left");

            let i_add_number = change_icon.querySelector('[mark="add_number"]');
                i_add_number.setAttribute('id','add_number_'+id);
                i_add_number.setAttribute('onclick',"click_slide_icon('add',"+new_number+","+id+");");

            // console.log("------------------------------------");
            // console.log(change_icon);

            let text_html = change_icon.outerHTML ;
            document.querySelector('#div_change_number_officer_'+id).innerHTML = text_html ;

            
            tag_icon.classList.remove('slide-in-left');
            tag_icon.classList.add('slide-out-right');

            setTimeout(function() {
                tag_icon.classList.remove('slide-out-right');
                tag_icon.classList.add('slide-in-left');
            }, 500);

        }


        // ค้นหาเจ้าของ number เดิม เพื่อเปลี่ยนสลับกัน
        let id_tag_old_number = "" ;
        if (owner_old_number){

            id_tag_old_number = owner_old_number.id.split('_')[2];

            if (!old_number){
                let text_i_empty = '&nbsp;&nbsp;&nbsp;&nbsp;'+
                '<i id="tag_icon_'+id_tag_old_number+'" class="fa-sharp fa-solid fa-circle-exclamation"></i>';

                document.querySelector('#div_change_number_officer_'+id_tag_old_number).innerHTML = text_i_empty ;

            }else{

                owner_old_number.classList.remove('slide-in-left');
                owner_old_number.classList.add('slide-out-right');

                setTimeout(function() {
                    owner_old_number.classList.remove('slide-out-right');
                    owner_old_number.classList.add('slide-in-left');
                }, 500);

                owner_old_number.classList.replace('fa-circle-'+new_number, 'fa-circle-'+old_number.toString());
                owner_old_number.setAttribute('dataNumber',old_number);

                let btn_drop_old_number = document.querySelector('#drop_number_'+id_tag_old_number);
                let btn_add_old_number = document.querySelector('#add_number_'+id_tag_old_number);
                btn_drop_old_number.setAttribute('onclick',"click_slide_icon('drop',"+old_number+","+id_tag_old_number+");");
                btn_add_old_number.setAttribute('onclick',"click_slide_icon('add',"+old_number+","+id_tag_old_number+");");
            }
        }

        // เปลี่ยน dropdown_item สลับกัน
        let dd_item_old = document.querySelectorAll('.dd_item_'+id);
        // console.log(dd_item_old)

        for (let i_old = 0; i_old < dd_item_old.length; i_old++) {
            // console.log(dd_item_old[i_old]);
            // console.log( dd_item_old[i_old].getAttribute('item') );
            if (i_old == 0){
                i_old_c = '';
            }else{
                i_old_c = i_old;
            }
            dd_item_old[i_old].setAttribute('onclick', "click_select_num_officer('"+i_old_c+"','"+id+"','"+new_number+"');");
        }

        let dd_item_new = document.querySelectorAll('.dd_item_'+id_tag_old_number);
        // console.log(dd_item_new)

        for (let i_new = 0; i_new < dd_item_new.length; i_new++) {
            // console.log(dd_item_new[i_new]);
            // console.log( dd_item_new[i_new].getAttribute('item') );
            if (i_new == 0){
                i_new_c = '';
            }else{
                i_new_c = i_new;
            }
            dd_item_new[i_new].setAttribute('onclick', "click_select_num_officer('"+i_new_c+"','"+id_tag_old_number+"','"+old_number+"');");
        }

        let data_arr = [];

        data_arr = {
            "id_new_number" : id.toString(),
            "int_new_number" : new_number.toString(),
            "id_old_number" : id_tag_old_number.toString(),
            "int_old_number" : old_number.toString(),
        }

        // console.log(data_arr);
        
        // ส่งข้อมูลไปอัพเดท DB
        fetch("{{ url('/') }}/api/update_number_officer/data_1669_officer_commands", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            // return response.text();
        }).then(function(data){
            // console.log(data);
        }).catch(function(error){
            // console.error(error);
        });
    }

</script>

@endsection