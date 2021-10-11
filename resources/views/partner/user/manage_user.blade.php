@extends('layouts.partners.theme_partner')


@section('content')
<br>
<!-- --------------------------------- แสดงเฉพาะคอม ------------------------------- -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">จัดการผู้ใช้ / <span style="font-size: 18px;"> Manage users </span>
                    </h3>
                    <div class="card-body">
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
                                    <!-- <div class="col-1">
                                        <center><b>Id</b></center>
                                    </div> -->
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
                                        <!-- <div class="col-1">
                                            <center><b>{{ $item->id }}</b></center>
                                        </div> -->
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
                    </div>
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
                                    <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'admin-partner'; type_user_partner('admin-partner');"> Admin &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="type" onclick="document.querySelector('#type_user_partner').value = 'partner'; type_user_partner('partner');"> Member
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

</script>

@endsection
