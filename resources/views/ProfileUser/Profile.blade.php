@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>

<!-- โปรไฟล์บุคคล -->
<div class="container" id="profile_person">
    <div class="row flex-lg-nowrap">
        @include('layouts.sidebar')

        <div class="col order-lg-1 order-2">
            <div class="row">

                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span style="font-size: 25px;" class="text-dark"><b>ข้อมูลของฉัน</b></span>
                            @if(Auth::check())
                                @if(Auth::user()->id == $data->id )
                            <a href="{{ url('/profile/' . $data->id . '/edit') }}" class="text-white float-right btn btn-warning main-shadow main-radius" >
                                <i class="fas fa-user-edit"></i> แก้ไขโปรไฟล์
                            </a>
                                @endif
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="container bootstrap snippets bootdey">
                                <div class="panel-body inf-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if(!empty($data->ranking))
                                            @switch($data->ranking)
                                                @case('Gold')
                                                    <p class="btn btn-sm btn-light " href=""><img width="30" src="{{ url('/img/ranking/gold.png') }}"> &nbsp;&nbsp;<b style="font-size: 15px;">Gold</b></p>
                                                @break
                                                @case('Silver')
                                                    <p class="btn btn-sm btn-light " href=""><img width="30" src="{{ url('/img/ranking/silver.png') }}"> &nbsp;&nbsp;<b style="font-size: 15px;">Silver</b></p>
                                                @break
                                                @case('Bronze')
                                                    <p class="btn btn-sm btn-light " href=""><img width="30" src="{{ url('/img/ranking/bronze.png') }}"> &nbsp;&nbsp;<b style="font-size: 15px;">Bronze</b></p>
                                                @break
                                            @endswitch
                                            @endif

                                            @if(!empty($data->photo))
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario"> 
                                            @else
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
                                            @endif
                                            
                                            <ul title="Ratings" class="list-inline ratings text-center">
                                                <li><span class="glyphicon glyphicon-star">{{ $data->name }}    <br> เป็นสมาชิกเมื่อ {{$data->created_at->diffForHumans()}}</span></li>
                                                <li>
                                                    
                                                </li>
                                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                            </ul>
                                        </div>
                                        <!---------------------------------------มือถือ------------------------------------------------------>
                                        <div class="col-md-8 profile-user d-block d-md-none" style="margin:-20px 0px 0px 0px">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <center>
                                                        <br><br><h4>ข้อมูลพื้นฐาน <hr style=" height:0.3px; color:#778899;"> </h4>
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <center>
                                                    <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้ </b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->username }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                    </center>
                                                </div>
                                     
                                                <div class="col-12">
                                                    <center>
                                                    <i class="far fa-address-card"></i> &nbsp;<b>ชื่อ</b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->name }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <center>
                                                    <i class="fas fa-birthday-cake"></i> &nbsp;<b>วันเกิด</b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->brith }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <center>
                                                    <i class="fas fa-venus-mars"></i></i> &nbsp;<b>เพศ</b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->sex }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <center>
                                                    <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล</b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->email }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <center>
                                                    <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์</b> 
                                                    <br>
                                                    <span class="text-primary">{{ $data->phone }}<hr style=" height:0.3px; color:#778899;"></span>
                                                    </center>
                                                </div>

                                                @if(Auth::check())
                                                    @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                                                        <div class="col-md-12"> 
                                                            <center>
                                                            <img src="{{ url('/img/icon/driver-license-icon.png' ) }}" style="width: 18px;" />
                                                            <b>
                                                            {{ 'ใบอนุญาตขับรถ / Driver license ' }}</b> <br>
                                                            <center>   
                                                        </div>
                                                        @if(!empty($data->driver_license))
                                                            <div class="col-md-6">
                                                                <center>
                                                                <label for="massengbox" class="control-label">&nbsp;รถยนต์</label>
                                                                <br>
                                                                <img src="{{ url('storage')}}/{{ $data->driver_license }}" style="width:200px" /><br/><br/> 
                                                                </center>
                                                            </div>
                                                        @endif
                                                        @if(!empty($data->driver_license2))
                                                            <div class="col-md-6">
                                                                <center>
                                                                <label for="massengbox" class="control-label">&nbsp;รถจักรยานยนต์</label>
                                                                <br>
                                                                <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" style="width:200px" /><br/><br/>
                                                                </center> 
                                                            </div>
                                                        @endif 
                                                    @endif               
                                                @endif


                                                            <div class="col md-12" >
                                                                <!-- @if(Auth::check())
                                                                    @if(Auth::user()->id == $data->id )
                                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                        <center>
                                                                                <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="แก้ไขโปรไฟล์">
                                                                                    <button class="btn ">
                                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                        <h6>แก้ไขโปรไฟล์</h6> 
                                                                                    </button>
                                                                                </a>
                                                                        </center>
                                                                    @endif
                                                                @endif -->
                                                                <!-- </div>
                                                                 <div class="col d-flex justify-content-end"> -->
                                                                <form method="POST" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                                                                    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($profile->active) ? $profile->active : 'No'}}" >
                                                                    <!-- /////   ปุ่มลบโปรไฟล์   //// -->
                                                                    <!-- <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>ลบโปรไฟล์</h6> </button></a> -->
                                                                </form>
                                                            </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------คอม------------------------------------------------------>
                                        <div class="col-md-8 profile-user d-none d-lg-block" style="margin:-20px 0px 0px 0px">
                                            <div class="row">
                                                <div class="col d-flex justify-content-end" style="margin:-10px 0px 0px 0px" >
                                                        <!-- @if(Auth::check())
                                                            @if(Auth::user()->id == $data->id )
                                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="แก้ไขโปรไฟล์">
                                                                    <button class="btn ">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                        <h6>แก้ไขโปรไฟล์</h6> 
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        @endif -->
                                                            <!-- </div>
                                                            <div class="col d-flex justify-content-end"> -->
                                                    <form method="POST" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                        <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                                                        <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($profile->active) ? $profile->active : 'No'}}" >
                                                        <!-- /////   ปุ่มลบโปรไฟล์   //// -->
                                                        <!-- <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>ลบโปรไฟล์</h6> </button></a> -->
                                                    </form>
                                                </div>
                                                
                                                <div class="col-md-12" style="margin:-40px 0px 0px 0px">
                                                
                                                    <center>
                                                        <br><br><h4>ข้อมูลพื้นฐาน<hr style=" height:0.1px; color:#778899;"></h4>
                                                    </center>
                                                </div>
                                                <div class="col-md-12">
                                                    <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->username }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                </div><br>
                                     
                                                <div class="col-md-12">
                                                    <i class="far fa-address-card"></i> &nbsp;<b>ชื่อ</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->name }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                </div>
                                                <div class="col-md-7">
                                                    <i class="fas fa-birthday-cake"></i> &nbsp;<b>วันเกิด</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->brith }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                </div>
                                                <div class="col-md-5">
                                                    <i class="fas fa-venus-mars"></i></i> &nbsp;<b>เพศ</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->sex }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                </div>
                                                <div class="col-md-12">
                                                    <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->email }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                </div>
                                                <div class="col-md-12">
                                                    <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์</b> 
                                                    &nbsp;&nbsp;
                                                    <span class="text-primary">{{ $data->phone }}<hr style=" height:0.3px; color:#778899;"></span>
                                                </div>
                                                @if(Auth::check())
                                                    @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                                                        <div class="col-md-12">
                                                            <img src="{{ url('/img/icon/driver-license-icon.png' ) }}" style="width: 18px;" />
                                                            <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b>   
                                                        </div>
                                                        @if(!empty($data->driver_license))
                                                            <div class="col-md-12">
                                                                <center>
                                                                <br>
                                                                <label for="massengbox" class="control-label">&nbsp;รถยนต์</label>
                                                                <br>
                                                                <img src="{{ url('storage')}}/{{ $data->driver_license }}" style="width:200px" /><br/><br/>
                                                                </center>
                                                            </div>
                                                        @endif
                                                        @if(!empty($data->driver_license2))
                                                            <div class="col-md-12">
                                                                <center>
                                                                <br>
                                                                <label for="massengbox" class="control-label">&nbsp;รถจักรยานยนต์</label>
                                                                <br>
                                                                <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" style="width:200px" /><br/><br/>
                                                                </center> 
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- โปรไฟล์องค์กร -->
@if(!empty($data->organization))
@foreach ($organization as $itemkey)
    <div class="container d-none" id="profile_organization">
        <div class="row">
            <div class="col-md-12">
                <div class="row flex-lg-nowrap">
                    @include('layouts.organization_sidebar')

                    <div class="col order-lg-1 order-2">
                        <div class="row">

                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size: 25px;" class="text-dark"><b>ข้อมูลองค์กร</b></span>
                                        @if(Auth::check())
                                            @if(Auth::user()->id == $data->id )
                                        <a href="{{ url('/organization/' . $itemkey->id . '/edit') }}" class="text-white float-right btn btn-warning main-shadow main-radius" >
                                            <i class="fas fa-user-edit"></i> แก้ไขข้อมูลองค์กร
                                        </a>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="container bootstrap snippets bootdey">
                                            <div class="panel-body inf-content">
                                                <div class="row">
                                                    <div class="col-md-4">

                                                        @if(!empty($data->photo))
                                                            <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario"> 
                                                        @else
                                                            <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
                                                        @endif
                                                        
                                                        <ul title="Ratings" class="list-inline ratings text-center">
                                                            <li><span class="glyphicon glyphicon-star">{{ $data->name }}    <br> เป็นสมาชิกเมื่อ {{$data->created_at->diffForHumans()}}</span></li>
                                                            <li>
                                                                
                                                            </li>
                                                            <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                                            <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                                            <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <!---------------------------------------มือถือ------------------------------------------------------>
                                                    <div class="col-md-8 profile-user d-block d-md-none" style="margin:-20px 0px 0px 0px">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <center>
                                                                    <br><br><h4>ข้อมูลพื้นฐาน<hr style=" height:0.3px; color:#778899;"> </h4>
                                                                </center>
                                                            </div>
                                                            <div class="col-12">
                                                                <center>
                                                                <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้</b> 
                                                                <br>
                                                                <span class="text-primary">{{ $data->username }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                                </center>
                                                            </div>
                                                 
                                                            <div class="col-12">
                                                                <center>
                                                                <i class="far fa-address-card"></i> &nbsp;<b>ชื่อองค์กร</b> 
                                                                <br>
                                                                <span class="text-primary">{{ $itemkey->juristicNameTH }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                                </center>
                                                            </div>
                                                            <div class="col-12">
                                                                <center>
                                                                <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล</b> 
                                                                <br>
                                                                <span class="text-primary">{{ $itemkey->mail }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                                </center>
                                                            </div>
                                                            <div class="col-12">
                                                                <center>
                                                                <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์</b> 
                                                                <br>
                                                                <span class="text-primary">{{ $itemkey->phone }}<hr style=" height:0.3px; color:#778899;"></span>
                                                                </center>
                                                            </div>
                                                            <div class="col md-12" >
                                                                <!-- @if(Auth::check())
                                                                    @if(Auth::user()->id == $data->id )
                                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                        <center>
                                                                                <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="แก้ไขโปรไฟล์">
                                                                                    <button class="btn ">
                                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                        <h6>แก้ไขโปรไฟล์</h6> 
                                                                                    </button>
                                                                                </a>
                                                                        </center>
                                                                    @endif
                                                                @endif -->
                                                                <!-- </div>
                                                                 <div class="col d-flex justify-content-end"> -->
                                                                <form method="POST" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                                                                    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($profile->active) ? $profile->active : 'No'}}" >
                                                                    <!-- /////   ปุ่มลบโปรไฟล์   //// -->
                                                                    <!-- <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>ลบโปรไฟล์</h6> </button></a> -->
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---------------------------------------คอม------------------------------------------------------>
                                                    <div class="col-md-8 profile-user d-none d-lg-block" style="margin:-20px 0px 0px 0px">
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end" style="margin:-10px 0px 0px 0px" >
                                                                    <!-- @if(Auth::check())
                                                                        @if(Auth::user()->id == $data->id )
                                                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                            <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="แก้ไขโปรไฟล์">
                                                                                <button class="btn ">
                                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                    <h6>แก้ไขโปรไฟล์</h6> 
                                                                                </button>
                                                                            </a>
                                                                        @endif
                                                                    @endif -->
                                                                        <!-- </div>
                                                                        <div class="col d-flex justify-content-end"> -->
                                                                <form method="POST" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                    <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                                                                    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($profile->active) ? $profile->active : 'No'}}" >
                                                                    <!-- /////   ปุ่มลบโปรไฟล์   //// -->
                                                                    <!-- <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>ลบโปรไฟล์</h6> </button></a> -->
                                                                </form>
                                                            </div>
                                                            
                                                            <div class="col-md-12" style="margin:-40px 0px 0px 0px">
                                                            
                                                                <center>
                                                                    <br><br><h4>ข้อมูลพื้นฐาน<hr style=" height:0.1px; color:#778899;"></h4>
                                                                </center>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้</b> 
                                                                &nbsp;&nbsp;
                                                                <span class="text-primary">{{ $data->username }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                            </div><br>
                                                 
                                                            <div class="col-md-12">
                                                                <i class="far fa-address-card"></i> &nbsp;<b>ชื่อองค์กร</b> 
                                                                &nbsp;&nbsp;
                                                                <span class="text-primary">{{ $itemkey->juristicNameTH }}<hr style=" height:0.1px; color:#778899;"> </span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล</b> 
                                                                &nbsp;&nbsp;
                                                                <span class="text-primary">{{ $itemkey->mail }}<hr style=" height:0.3px; color:#778899;"> </span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์</b> 
                                                                &nbsp;&nbsp;
                                                                <span class="text-primary">{{ $itemkey->phone }}<hr style=" height:0.3px; color:#778899;"></span>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                        <div class="col md-12" >
                                                            <div class="row">
                                                                <div class="col-md-12"> 
                                                                    <b>
                                                                        <h4 class="text-center">รายละเอียดองค์กร</h4>
                                                                    </b>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>หมายเลขนิติบุคคล</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->juristicID }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>ชื่อนิติบุคคล(TH)</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->juristicNameTH }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>ชื่อนิติบุคคล(EN)</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->juristicNameEN }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>ประเภทนิติบุคคล</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->juristicType }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>วันที่จดทะเบียน</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->registerDate }}</span>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <b>สถานะนิติบุคคล</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->juristicStatus }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>ทุนจดทะเบียน</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->registerCapital }}</span>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <b>	รหัสหมวดหมู่ tsic</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->standardObjective }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-12">
                                                                   <b>รายละเอียดวัตถุประสงค์จัดตั้ง</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->standardObjectiveDetail }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>

                                                                <div class="col-md-12"> 
                                                                    <b>
                                                                        <h4 class="text-center">ที่อยู่องค์กร</h4>
                                                                    </b>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>รายการที่อยู่</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->addressDetail }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>ชื่อสาขา</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->addressName }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>อาคาร</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->buildingName }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>เลขที่ห้อง</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->roomNo }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>	ชั้นที่</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->floor }}</span>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <b>หมู่บ้าน</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->villageName }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>เลขที่บ้าน</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->houseNumber }}</span>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <b>หมู่ที่</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->moo }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <b>ซอย</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->soi }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>	ถนน</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->street }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>	แขวง / ตำบล</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->subDistrict }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>เขต / อำเภอ</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->district}}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <b>	จังหวัด</b> 
                                                                    &nbsp;&nbsp;
                                                                    <span class="text-primary">{{ $itemkey->province }}</span>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr style=" height:0.3px; color:#778899;">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <a class="btn d-none" id="click_profile_organization" onclick="click_profile_organization()"></a>
@endif
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        document.getElementById("click_profile_organization").click();
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }
    function click_profile_organization(){
        document.querySelector('#profile_person').classList.add('d-none');
        document.querySelector('#profile_organization').classList.remove('d-none');
    }
</script>
@endsection