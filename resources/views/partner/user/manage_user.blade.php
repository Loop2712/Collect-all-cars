@extends('layouts.partners.theme_partner_new')


@section('content')
 
    <div class="card radius-10 d-none d-lg-block" >
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center">
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
                <div class="ms-auto">
                    <button type="button" class="btn btn-white radius-10" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-user-plus'></i>สร้างบัญชีผู่ใช้ใหม่</button>
                </div>
                &nbsp;
                <a style="float: right;" type="button" data-toggle="modal" data-target="#Partner_user">
                        <button class="btn btn-primary btn-sm">
                                <i class="fas fa-info-circle"></i>วิธีใช้
                        </button>
                    </a>
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
                            <th>การใช้งาน</th>
                            <th>ผู้สร้าง</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    @switch($item->status)
                                        @case('active')
                                            <a href="#" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Active</a>
                                        @break
                                        @case('expired')
                                            <a href="#" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>Expired</a>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @if(!empty($item->creator))
                                        <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                            <i class="far fa-eye text-primary"></i>
                                        </a>
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
    <!-- <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">จัดการผู้ใช้ / <span style="font-size: 18px;"> Manage users </span>
                    </h3>
                    <div class="card-body" >
                        <a class="btn btn-outline-primary text-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-user-plus"></i> สร้างบัญชีผู้ใช้ใหม่
                        </a>
                        <form method="GET" action="{{ url('/manage_user_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="row alert alert-secondary">
                                    <div class="col-3">
                                        <center>
                                            <b>ชื่อ</b><br>
                                            Name
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>ประเภท</b><br>
                                            Type
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>การจัดอันดับ</b><br>
                                            Ranking
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>เบอร์</b><br>
                                            Phone number
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>สถานะ</b><br>
                                            Role
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <b>สถานะ</b><br>
                                            Status
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <b>ผู้สร้าง</b><br>
                                            Creator
                                        </center>
                                    </div>
                                </div>
                                @foreach($all_user as $item)
                                    <div class="row">
                                        <div class="col-3">
                                            <h5 class="text-success"><span style="font-size: 15px;"><a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>&nbsp;&nbsp;{{ $item->name }}
                                            </h5>
                                        </div>
                                        <div class="col-1">
                                            <center>
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
                                                    <i class="fas fa-globe" style="color: #5F9EA0"></i>
                                                @break
                                            @endswitch
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
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
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>{{ $item->phone }}</center>
                                        </div>
                                        <div class="col-1">
                                            <center>{{ $item->role }}</center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                @switch($item->status)
                                                    @case('active')
                                                        <i class="fas fa-check"></i> Active
                                                    @break
                                                    @case('expired')
                                                        <i class="fas fa-times"></i> Expired
                                                    @break
                                                @endswitch
                                            </center>
                                        </div>
                                        <div class="col-1">
                                            <center>
                                                @if(!empty($item->creator))
                                                    <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                                        <i class="far fa-eye text-primary"></i>
                                                    </a>
                                                @endif
                                            </center>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                                <div class="pagination-wrapper"> {!! $all_user->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Button trigger modal -->
                        <button id="btn_modal_confirm_create" class="btn d-none" data-toggle="modal" data-target="#exampleModal">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header d-none">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <center>
                                    <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}">
                                    <br><br>
                                    <h5 class="text-danger">ยืนยันการสร้างสมาชิก</h5>
                                    <br>
                                    <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'admin-partner'; type_user_partner('admin-partner');"> แอดมิน &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'partner'; type_user_partner('partner');"> เจ้าหน้าที่
                                    <input type="hidden" name="type_user_partner" id="type_user_partner" value="">
                                </center>
                              </div>
                              <div id="div_submit_create_user_partner" class="modal-footer d-none">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <a id="btn_modal" class="btn btn-primary text-white">ยืนยัน</a>
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
            <div class="col-12"  style="margin-top:10px">
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
                    <button type="button" class="btn btn-white radius-10" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-user-plus'></i>สร้างบัญชีผู่ใช้ใหม่</button>
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
                            <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
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
                            <div class="col-8" style="margin-bottom:0px;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
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
                            <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                <i class="fas fa-angle-down" ></i>
                            </div>
                            <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                <hr>
                                <p style="font-size:18px;padding:0px"> เบอร์ :  {{ $item->phone }}  </p> <hr>
                                <p style="font-size:18px;padding:0px"> สถานะ : {{ $item->role }}  </p> <hr>
                                <p style="font-size:18px;padding:0px"> การใช้งาน :  
                                    @switch($item->status)
                                        @case('active')
                                            <a href="#" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Active</a>
                                        @break
                                        @case('expired')
                                            <a href="#" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>Expired</a>
                                        @break
                                    @endswitch
                                </p>
                                @if(!empty($item->creator)) <hr>
                                    <p style="font-size:18px;padding:0px">ผู้ลงทะเบียน <br> 
                                        <a href="{{ url('/profile/' . $item->creator) }}" target="bank">
                                            <i class="far fa-eye text-primary"></i> {{$item->creator}}
                                        </a>
                                    </p>  
                                @endif
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header d-none">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}">
                                            <br><br>
                                            <h5 class="text-danger">ยืนยันการสร้างสมาชิก</h5>
                                            <br>
                                            <input type="radio" name="type" onclick="document.querySelector('#type_user_partner_m').value = 'admin-partner'; type_user_partner_m('admin-partner');"> Admin &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="type" onclick="document.querySelector('#type_user_partner_m').value = 'partner'; type_user_partner_m('partner');"> Member
                                            <input type="hidden" name="type_user_partner_m" id="type_user_partner_m" value="">
                                        </center>
                                    </div>
                                    <div id="div_submit_create_user_partner_m" class="modal-footer d-none">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                        <a id="btn_modal_m" class="btn btn-primary text-white">ยืนยัน</a>
                                    </div>
                                    </div>
                                </div>
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
  <div class="modal fade"  id="Partner_user" tabindex="-1" role="dialog" aria-labelledby="Partner_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_userTitle">จัดการผู้ใช้</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/12.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.สร้างบัญชีผู้ใช้ใหม่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/13.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.สถานะสมาชิก
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1 Admin : สามารถใช้ระบบ ViiCHECK PARTNER และมีสิทธิ์จัดการข้อมูลภายในองค์กรได้</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2 Member : สามารถใช้ระบบ ViiCHECK PARTNER แต่ไม่มีสิทธิ์ในการจัดการข้อมูลภายในองค์กร</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  2.ปิด : หากไม่ต้องการเพิ่มสมาชิกให้คลิกที่ปุ่มปิด</h5> 
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  3.ยืนยัน : เมื่อกำหนดสถานะสมาชิกแล้วให้คลิกที่ปุ่มยืนยัน</h5> 
                      
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางสมาชิก</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/14.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ :  แสดงชื่อผู้ใช้</h5>
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
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ค้นหาผู้ใช้</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
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

    function type_user_partner(type_user)
    {
        document.querySelector('#div_submit_create_user_partner').classList.remove('d-none');

        let type_user_partner = document.querySelector('#type_user_partner').value;

        let btn_modal = document.querySelector('#btn_modal');

        let a_href = document.createAttribute("href");
        a_href.value = "{{ url('/create_user_partner') }}?type_user=" + type_user;

        btn_modal.setAttributeNode(a_href); 

    }
    function type_user_partner_m(type_user)
    {
        document.querySelector('#div_submit_create_user_partner_m').classList.remove('d-none');

        let type_user_partner_m = document.querySelector('#type_user_partner_m').value;

        let btn_modal = document.querySelector('#btn_modal_m');

        let a_href = document.createAttribute("href");
        a_href.value = "{{ url('/create_user_partner') }}?type_user=" + type_user;

        btn_modal.setAttributeNode(a_href); 

    }

</script>

@endsection
