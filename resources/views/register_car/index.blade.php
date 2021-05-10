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
                                    <b style="font-size: 15px; hover:rad;">รถยนต์</b>
                                </button>
                                <button type="button" class="btn btn-danger main-shadow main-radius text-danger bg-white"  onclick="
                                document.querySelector('#img_show_car').classList.add('d-none'),
                                document.querySelector('#img_show_mortor').classList.remove('d-none'),

                                document.querySelector('#show_car').classList.add('d-none'),
                                document.querySelector('#show_mortor').classList.remove('d-none');">
                                    <b style="font-size: 15px;">รถจักรยานยนต์</b>
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
                                    <p class="text-right" style="margin: -20px -10px -10px 0px;"><a href="{{ url('/register_car/' . $item->id . '/edit') }}"><u>แก้ไข</u></a> </p>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="row">  
                                                <div class="d-none d-lg-block col-md-4" >
                                                <img width="50" style="margin-left:13px;" src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div> 
                                                <div class="d-block d-md-none col-4">
                                                        <img width="50" src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div> 
                                                    <div class="col-7 col-md-8">
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
                                                                    <a class="btn btn-warning btn-sm  main-shadow main-radius" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;แก้ไข</i>
                                                                    </a>
                                                                </span>
                                                            <br>
                                                                    <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        @if(!empty($item->insurance))
                                                            @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                 <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                             @else
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="btn btn-warning btn-sm  main-shadow main-radius" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;แก้ไข</i>
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
                                                            <br>
                                                            <h5 style="position: relative; z-index: 5">{{ $item->registration_number }}</h5>
                                                            <p style="position: relative; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="margin-top: -110px; z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- แสดงเฉพาะคอม -->
                                                <div class="row d-none d-lg-block">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <h5 style="position: relative; z-index: 5">{{ $item->registration_number }}</h5>
                                                            <p style="position: relative; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="position: absolute;right: 24%;top: 16%;z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr style="margin-top: -25px;">
                                            </div>
                                        </div>

                                        <a href="{{ url('/register_car/' . $item->id ) }}">
                                            <button type="button" class="btn btn-success main-shadow main-radius"style="font-size: 14px;">
                                                <b><i class="fas fa-hand-holding-usd" ></i>&nbsp;ขาย </b>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-primary main-shadow main-radius" style="font-size: 14px;">
                                                <b><i class="fas fa-donate"></i> &nbsp;ขอสินเชื่อ</b>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/register_car/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-sm btn-danger main-shadow main-radius float-right"   title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                        </form>
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
                                    <p class="text-right" style="margin: -20px -10px -10px 0px;"><a href="{{ url('/register_car/' . $item->id . '/edit') }}"><u>แก้ไข</u></a> </p>
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
                                                                    <a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;แก้ไข</i>
                                                                    </a>
                                                                </span>
                                                            <br>
                                                                    <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        @if(!empty($item->insurance))
                                                            @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                 <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                             @else
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                            <h6 class="f-left">Insurance</h6>
                                                            <br>
                                                            <span style="font-size: 13px;">
                                                                <a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;แก้ไข</i>
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
                                                            <br>
                                                            <h5 style="position: relative; z-index: 5">{{ $item->registration_number }}</h5>
                                                            <p style="position: relative; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="position: absolute;right: 14%;top: 16%;z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- แสดงเฉพาะคอม -->
                                                <div class="row d-none d-lg-block">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <h5 style="position: relative; z-index: 5">{{ $item->registration_number }}</h5>
                                                            <p style="position: relative; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="position: absolute;right: 24%;top: 16%;z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr style="margin-top: -5px;">
                                            </div>
                                        </div>

                                        <a href="{{ url('/register_car/' . $item->id ) }}">
                                            <button type="button" class="btn btn-success main-shadow main-radius"style="font-size: 14px;">
                                                <b><i class="fas fa-hand-holding-usd" ></i>&nbsp;ขาย </b>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-primary main-shadow main-radius" style="font-size: 14px;">
                                                <b><i class="fas fa-donate"></i> &nbsp;ขอสินเชื่อ</b>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/register_car/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-sm btn-danger main-shadow main-radius float-right"   title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                        </form>
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
