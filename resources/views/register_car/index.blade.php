@extends('layouts.main')
@section('add')
<style>
.order-card {
    color: #fff;
}

.bg-c-monte-carlo {
    background: linear-gradient(45deg,#CC95C0,#DBD4B4,#7AA1D2);
}

.bg-c-paradise {
    background: linear-gradient(30deg,#7AA1D2,#F8CDDA);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 17px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9 order-lg-1 order-2">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size: 25px;" class="text-dark"><b>รถของฉัน</b></span>
                        <a href="{{ url('/register_car/create') }}" class="float-right btn btn-danger main-shadow main-radius" title="Add New Register_car">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรถคันใหม่
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9 col-md-11">
                                <button type="button" class="btn btn-danger main-shadow main-radius" onclick="
                                document.querySelector('#img_show_car').classList.remove('d-none'),
                                document.querySelector('#img_show_mortor').classList.add('d-none'),

                                document.querySelector('#show_car').classList.remove('d-none'),
                                document.querySelector('#show_mortor').classList.add('d-none');">
                                    <b>รถยนต์</b>
                                </button>
                                <button type="button" class="btn btn-danger main-shadow main-radius text-danger bg-white"  onclick="
                                document.querySelector('#img_show_car').classList.add('d-none'),
                                document.querySelector('#img_show_mortor').classList.remove('d-none'),

                                document.querySelector('#show_car').classList.add('d-none'),
                                document.querySelector('#show_mortor').classList.remove('d-none');">
                                    <b>รถจักรยานยนต์</b>
                                </button>
                                <br><br>
                            </div>
                            <div class="col-3 col-md-1">
                                <img id="img_show_car" width="40" src="{{ url('/img/icon/menu_car.png' ) }}">
                                <img class="d-none" id="img_show_mortor" width="40" src="{{ url('/img/icon/menu_motorcycle.png' ) }}">
                            </div>
                        </div>
                        <div id="show_car" class="row">
                        @foreach($register_car as $item)
                            <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-12 col-md-12">

                                                <div class="row">
                                                    <div class="col-4 col-md-3">
                                                        <img width="50"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div>
                                                    <div class="col-8 col-md-9">
                                                        <h4>{{ $item->brand }}</h4>
                                                        <p>{{ $item->generation }} </p>
                                                    </div>
                                                </div>
                                                <hr style="margin-top: -5px;">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        @if(!empty($item->act))
                                                            @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                                
                                                                <h6 class="f-left">Vehicle Act</h6>
                                                                <br>
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>    
                                                                    <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                                
                                                                <h6 class="f-left">Vehicle Act</h6>
                                                                <br>
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>
                                                                        <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                            @else
                                                                <h6 class="f-left">Vehicle Act</h6>
                                                                <br>
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </span>
                                                                <br>
                                                                <!-- <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                                <h6 class="f-left">Vehicle Act</h6>
                                                                <br>
                                                                <span style="font-size: 13px;">
                                                                    <a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 12px;"></i>
                                                                    </a>
                                                                </span>
                                                            <br>
                                                                    <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        @if(!empty($item->insurance))
                                                            @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            
                                                            <h6 class="f-left">insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <h6 class="f-left">insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                 <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                             @else
                                                            <h6 class="f-left">insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                            <h6 class="f-left">insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 12px;"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                    </div>
                                                </div>
                                                <br>
                                                <hr style="margin-top: -8px;">
                                                <!-- แสดงเฉพาะมือถือ -->
                                                <div class="row d-block d-md-none">
                                                    <div class="col-12">
                                                        <center>
                                                            <h5 style="position: absolute;right: 37%;top: 20%;">{{ $item->registration_number }}</h5>
                                                            <p style="position: absolute;right: 30%;top: 50%;">{{ $item->province }} </p>
                                                            <img width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- แสดงเฉพาะคอม -->
                                                <div class="row d-none d-lg-block">
                                                    <div class="col-12">
                                                        <center>
                                                            <h5 style="position: absolute;right: 40%;top: 20%;">{{ $item->registration_number }}</h5>
                                                            <p style="position: absolute;right: 35%;top: 50%;">{{ $item->province }} </p>
                                                            <img width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr style="margin-top: -5px;">
                                            </div>
                                        </div>

                                        <a href="{{ url('/register_car/' . $item->id ) }}">
                                            <button type="button" class="btn btn-success main-shadow main-radius">
                                                <b><i class="fas fa-hand-holding-usd"></i> &nbsp;ขาย</b>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-primary main-shadow main-radius">
                                                <b><i class="fas fa-donate"></i> &nbsp;ขอสินเชื่อ</b>
                                            </button>
                                        </a>
                                        @php
                                            $id = $item->id;
                                        @endphp
                                        <button title="Click to show/hide content" type="button"  class="btn btn-sm float-right" action="{{ url('/register_car/' . $item->id ) }}"
                                            onclick="if(document.getElementById('spoiler') .style.display=='none') 
                                                {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler')
                                                .style.display='none'}"> <h6 class="text-right" href="{{ url('/register_car/' . $item->id . '/edit') }}">
                                                    <h6 style="color:#7D7D7D">
                                                        <i class="fas fa-angle-double-down"></i>
                                                    </h6>
                                        </button>

                                        <div id="spoiler" style="display:none"> 
                                            <br>
                                            <form method="POST" action="{{ url('/register_car/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    
                                                    <button type="submit" class="btn btn-sm btn-danger main-shadow main-radius float-right"   title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> ฉันไม่ใช้รถคันนี้แล้ว
                                                    </button>

                                            </form> 
                                            <span class="float-right">&nbsp;&nbsp;</span>
                                            <a href="{{ url('/register_car/' . $item->id . '/edit') }}">
                                                <button class="btn btn-sm btn-warning main-shadow main-radius float-right text-white">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> แก้ไขข้อมูลรถ
                                                </button>
                                            </a>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        </div>
                        <div id="show_mortor" class="row d-none">
                        @foreach($register_motorcycles as $item)
                        <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                        <h4>{{ $item->brand }} {{ $item->generation }} </h4><br>
                                            @if(!empty($item->act))
                                                @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>    
                                                        <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>
                                                            <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                    <!-- <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                        <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif

                                            @if(!empty($item->insurance))
                                                @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                     <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                 @else
                                                 <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                    <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                            <h6 class="text-right"><span class="f-left">insurance</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif
                                        <!-- <h6 class="text-right"><span class="f-left">insurance</span><span>2021-02-12</span></h6><br> -->
                                        <a class="btn btn-success btn-sm f-left" style="border-radius: 15px;" href="{{ url('/register_car/' . $item->id ) }}"><i class="fas fa-hand-holding-usd"></i> Sell </a>
                                        <a class="btn btn-primary btn-sm f-right" style="border-radius: 15px;" href="#"><i class="fas fa-donate"></i> Promise</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
