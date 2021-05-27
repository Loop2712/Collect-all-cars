@extends('layouts.viicheck')
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
    <div class="container" style="margin-top:168px; ">
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9 order-lg-1 order-2" >
                <div class="card">
                
                    <div class="card-header">
                        <span style="font-size: 25px;" class="text-dark"><b>รถของฉัน</b></span>
                        <a href="{{ url('/register_car/create') }}" class="float-right btn btn-danger main-shadow main-radius" title="Add New Register_car">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรถคันใหม่
                        </a>
                    </div>
                    <div class="card-body" style="font-family: K2D, sans-serif;">
                        <div class="row" >
                            <div class="col-9 col-md-11" style="margin-top:-20px;">
                            <ul class="nav nav-pills nav-pills-danger mt-4"   role="tablist" >
                                    <li class="nav-item" >
                                        <a class="nav-link active " href="#" role="tab" data-toggle="tab" style=" width: 115px;" onclick="
                                            document.querySelector('#img_show_car').classList.remove('d-none'),
                                            document.querySelector('#img_show_mortor').classList.add('d-none'),
                                            document.querySelector('#show_car').classList.remove('d-none'),
                                            document.querySelector('#show_mortor').classList.add('d-none');">
                                            <b style="font-size: 15px; text-center;">รถยนต์</b>
                                        </a>
                                    </li>&nbsp;<li class="col-5 d-block d-md-none"></li>
                                    <li class="nav-item d-block d-md-none" style="margin-top:10px;">
                                        <a class="nav-link" href="#" role="tab" data-toggle="tab" onclick="
                                                document.querySelector('#img_show_car').classList.add('d-none'),
                                                document.querySelector('#img_show_mortor').classList.remove('d-none'),

                                                document.querySelector('#show_car').classList.add('d-none'),
                                                document.querySelector('#show_mortor').classList.remove('d-none');">
                                        <b style="font-size: 15px;">รถจักรยานยนต์</b>
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href="#" role="tab" data-toggle="tab" onclick="
                                                document.querySelector('#img_show_car').classList.add('d-none'),
                                                document.querySelector('#img_show_mortor').classList.remove('d-none'),

                                                document.querySelector('#show_car').classList.add('d-none'),
                                                document.querySelector('#show_mortor').classList.remove('d-none');">
                                        <b style="font-size: 15px;">รถจักรยานยนต์</b>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-3 col-md-1">
                                <img id="img_show_car" width="40" src="{{ url('/img/icon/menu_car.png' ) }}">
                                <img class="d-none" id="img_show_mortor" width="40" src="{{ url('/img/icon/menu_motorcycle.png' ) }}">
                            </div>
                        </div><br>
                        <div id="show_car" class="row">
                        @foreach($register_car as $item)
                            <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                    <p class="text-right" style="margin: 5px 10px 0px 0px; font-size:15px"><a href="{{ url('/register_car/' . $item->id . '/edit') }}"><u>แก้ไข</u></a> </p>
                                        <div class="row">
                                            <div class="col-12 col-md-12" style="margin-top:-15px;">
                                                <div class="row" style="margin:10px;">  
                                                <div class="d-none d-lg-block col-md-4" >
                                                <img width="50" style="margin:-5px 13px;" src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div> 
                                                    <!-- แสดงเฉพาะมือถือ -->
                                                <div class="d-block d-md-none col-4">
                                                        <img width="50" src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div> 
                                                    <div class="col-7 col-md-8">
                                                        <p style="font-size:24px;margin-top:-10px"><b>{{ $item->brand }}</b></p>
                                                        <p style="margin-top:-20px; font-size:16px">{{ $item->generation }} </p>
                                                    </div>
                                                </div><center>
                                                <hr style="margin-top: -20px; width: 90%; height:0.3px; color:#BEBEBE;"></center>
                                                <div class="row d-block d-md-none">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <p style="position: relative;top: 0px; z-index: 5; font-size:18px;"><b>{{ $item->registration_number }}</b></p>
                                                            <p style="position: relative;top: -18px; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="margin-top: -150px; z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- แสดงเฉพาะคอม -->
                                                <div class="row d-none d-lg-block"  style="font-family: K2D, sans-serif;">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <p style="position: relative;top: -10px; z-index: 5; font-size:18px;"><b>{{ $item->registration_number }}</b></p>
                                                            <p style="position: relative;top: -25px; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="position: absolute;right: 104px;top: 8%;z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                
                                                <br>
                                                <center><hr style="margin-top: -50px; width: 90%; height:0.3px; color:#BEBEBE;"></center>
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                    <center>
                                                        @if(!empty($item->act))
                                                            @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                                
                                                                <h6 style="text-align: center; margin-bottom:10px;">พรบ.</h6>
                                                                
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>    
                                                                    <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                                
                                                                <h6 style="text-align: center; margin-bottom:10px;">พรบ.</h6>
                                                                
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>
                                                                        <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                            @else
                                                                <h6 style="text-align: center; margin-bottom:10px;">พรบ.</h6>
                                                                
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </span>
                                                                <br>
                                                                <!-- <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                                <!-- <h6 style="text-align: center;">พรบ.</h6> -->
                                                                <span style="font-size: 13px; margin: 0px 10px;">
                                                                    <a class="btn btn-warning btn-md  main-shadow main-radius " style="padding:2px 0px;  width: 90%;" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">
                                                                        <i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;พรบ.</i>
                                                                    </a>
                                                                </span>
                                                            <br>
                                                                  <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                    </center>  
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                    <center>
                                                        @if(!empty($item->insurance))
                                                            @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            
                                                            <h6 style="text-align: center; margin-bottom:10px;">ประกัน</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <h6 style="text-align: center; margin-bottom:10px;">ประกัน</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                 <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                             @else
                                                            <h6 style="text-align: center; margin-bottom:10px;">ประกัน</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                            <!-- <h6 style="text-align: center;">ประกัน</h6> -->
                                                            <span style="font-size: 13px; ">
                                                                <a class="btn btn-warning btn-md  main-shadow main-radius" style="padding:2px 0px; width: 90%; margin: 0px 0px 0px -15px;" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;ประกัน</i>
                                                                </a>
                                                            </span>
                                                            <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<br>
                                        <a href="{{ url('/register_car/' . $item->id ) }}">
                                            <button type="button" class="btn btn-success main-shadow main-radius"style="font-size: 14px; margin: 0px 0px 20px 20px; padding: 4px 12px;  width: 90px;">
                                                <b><i class="fas fa-hand-holding-usd" ></i>&nbsp;ขาย   </b>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-primary main-shadow main-radius" style=" width: 90px; font-size: 14px; margin-top: -20px; padding: 4px 12px ">
                                                <b><i class="fas fa-donate"></i> &nbsp;สินเชื่อ</b>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/register_car/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="d-block d-md-none btn btn-sm btn-danger main-shadow main-radius float-right" style="font-size: 14px; margin-right: 13px; padding: 0px 0px"  title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                                        <button type="submit" class="d-none d-lg-block btn btn-sm btn-danger main-shadow main-radius float-right" style="font-size: 14px; margin: 0px 20px; padding: 4px 12px"  title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                        </form>
                                       
                                    </div>
                                </div> <br>
                            </div>
                        
                        @endforeach
                        </div>
                        <div id="show_mortor" class="row d-none">
                        @foreach($register_motorcycles as $item)
                        <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                    <p class="text-right" style="margin: 5px 10px 0px 0px;"><a href="{{ url('/register_car/' . $item->id . '/edit') }}"><u>แก้ไข</u></a> </p>
                                        <div class="row">
                                            <div class="col-12 col-md-12" style="margin-top:-15px;">
                                                <div class="row" style="margin:10px;">  
                                                    <div class="col-4 col-md-4">
                                                        <img width="50" style="margin:0px 13px;" src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div> 
                                                    <div class="col-7 col-md-8">
                                                        <p style="font-size:24px;margin-top:-10px"><b>{{ $item->brand }}</b></p>
                                                        <p style="margin-top:-20px; font-size:16px">{{ $item->generation }} </p>
                                                    </div>
                                                </div>
                                                 <center><hr style="margin-top: -20px; width: 90%; height:0.3px; color:#BEBEBE;"></center>
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                    <center>
                                                        @if(!empty($item->act))
                                                            @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                                
                                                                <h6 style="text-align: center; margin-bottom:10px;">Vehicle Act</h6>
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>    
                                                                    <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                                
                                                                <h6 style="text-align: center; margin-bottom:10px;">Vehicle Act</h6>
                                                                <span style="font-size: 13px;">
                                                                    <a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                                </span>
                                                                <br>
                                                                        <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                            @else
                                                            <h6 style="text-align: center; margin-bottom:10px;">Insurance</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                        <h6 style="text-align: center;">Vehicle Act</h6>
                                                                <span style="font-size: 13px; margin: 0px 10px;">
                                                                    <a class="btn btn-warning btn-md  main-shadow main-radius " style="  width: 90%;" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">
                                                                        <i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;แก้ไข</i>
                                                                    </a>
                                                                </span>
                                                            <br>
                                                            <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                        </center>
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                    <center>
                                                        @if(!empty($item->insurance))
                                                            @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            
                                                            <h6 style="text-align: center; margin-bottom:10px;">Insurance</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <h6 style="text-align: center; margin-bottom:10px;">Insurance</h6>
                                                            <span style="font-size: 13px;">
                                                                <a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                 <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                             @else 
                                                            <h6 style="text-align: center; margin-bottom:10px;">Insurance</h6>
                                                            <span style="font-size: 13px; text-align: center;">
                                                                <a class="text-success"  href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                                <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                            @endif
                                                        @else
                                                            <h6 style="text-align: center;">Insurance</h6>
                                                            <span style="font-size: 13px; ">
                                                                <a class="btn btn-warning btn-md  main-shadow main-radius" style="width: 90%; margin: 0px 0px 0px -15px;" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt" style="font-size: 13px;">&nbsp;&nbsp;แก้ไข</i>
                                                                </a>
                                                            </span>
                                                            <br>
                                                            <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                                        @endif
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                <center><hr style="margin-top: -15px; width: 90%; height:0.3px; color:#BEBEBE;"></center>
                                                <!-- แสดงเฉพาะมือถือ -->
                                                <div class="row d-block d-md-none">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <p style="position: relative;top: 0px; z-index: 5; font-size:18px;"><b>{{ $item->registration_number }}</b></p>
                                                            <p style="position: relative;top: -18px; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="margin-top: -150px; z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            
                                                        </center>
                                                    </div>
                                                </div>
                                                <!-- แสดงเฉพาะคอม -->
                                                <div class="row d-none d-lg-block" style="font-family: K2D, sans-serif;">
                                                    <div class="col-12">
                                                        <center>
                                                            <br>
                                                            <p style="position: relative;top: 5px; z-index: 5; font-size:18px;"><b>{{ $item->registration_number }}</b></p>
                                                            <p style="position: relative;top: -13px; color: #000000; z-index: 5">{{ $item->province }} </p>
                                                            <img style="position: absolute;right: 104px;top: 20%;z-index: 2" width="200"src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                
                                            </div>
                                        </div>
                                        <center>
                                                <hr class="row d-block d-md-none" style="margin-top: -50px; width: 90%; height:0.3px; color:#BEBEBE;">
                                                <hr class="d-none d-lg-block" style="margin-top: -15px; width: 90%; height:0.3px; color:#BEBEBE;"></center>
                                                <a href="{{ url('/register_car/' . $item->id ) }}">
                                            <button type="button" class="btn btn-success main-shadow main-radius"style="font-size: 14px; margin: 0px 0px 20px 20px; padding: 4px 12px;  width: 90px;">
                                                <b><i class="fas fa-hand-holding-usd" ></i>&nbsp;ขาย   </b>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-primary main-shadow main-radius" style=" width: 90px; font-size: 14px; margin-top: -20px; padding: 4px 12px ">
                                                <b><i class="fas fa-donate"></i> &nbsp;สินเชื่อ</b>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/register_car/' . $item->id ) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="d-block d-md-none btn btn-sm btn-danger main-shadow main-radius float-right" style="font-size: 14px; margin-right: 13px; padding: 7px 12px"  title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                                        <button type="submit" class="d-none d-lg-block btn btn-sm btn-danger main-shadow main-radius float-right" style="font-size: 14px; margin: 0px 20px; padding: 7px 12px"  title="Delete registercar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash"  aria-hidden="true"></i>
                                                        </button>
                                        </form>
                                    </div>
                                </div><br>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_registercar').classList.add('btn-danger');
        document.querySelector('#btn_registercar').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_registercar').classList.add('text-white');
        document.querySelector('#btn_a_registercar').classList.remove('text-danger');
    }
</script>
@endsection

