@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
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

            <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><span class="glyphicon glyphicon-star">{{ $data->name }}      </span></li>
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
                        <br><br><h4>ข้อมูลพื้นฐาน <br> Basic information<hr> </h4>
                    </center>
                </div>
                <div class="col-12">
                    <center>
                    <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้  / Username </b> 
                    <br>
                    <span class="text-primary">{{ $data->username }}<hr> </span>
                    </center>
                </div>
     
                <div class="col-12">
                    <center>
                    <i class="far fa-address-card"></i> &nbsp;<b>ชื่อ / name </b> 
                    <br>
                    <span class="text-primary">{{ $data->name }}<hr> </span>
                    </center>
                </div>
                <div class="col-12">
                    <center>
                    <i class="fas fa-birthday-cake"></i> &nbsp;<b>วันเกิด / Birthday </b> 
                    <br>
                    <span class="text-primary">{{ $data->brith }}<hr> </span>
                    </center>
                </div>
                <div class="col-12">
                    <center>
                    <i class="fas fa-venus-mars"></i></i> &nbsp;<b>เพศ / Sex </b> 
                    <br>
                    <span class="text-primary">{{ $data->sex }}<hr> </span>
                    </center>
                </div>
                <div class="col-12">
                    <center>
                    <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล  / E-mail </b> 
                    <br>
                    <span class="text-primary">{{ $data->email }}<hr> </span>
                    </center>
                </div>
                <div class="col-12">
                    <center>
                    <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์ / Phone</b> 
                    <br>
                    <span class="text-primary">{{ $data->phone }}<hr></span>
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
                        <br><br><h4>ข้อมูลพื้นฐาน / Basic information<hr> </h4>
                    </center>
                </div>
                <div class="col-md-12">
                    <i class="far fa-user"></i> &nbsp;<b>ชื่อผู้ใช้  / Username </b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->username }}<hr> </span>
                </div><br>
     
                <div class="col-md-12">
                    <i class="far fa-address-card"></i> &nbsp;<b>ชื่อ / name </b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->name }}<hr> </span>
                </div>
                <div class="col-md-7">
                    <i class="fas fa-birthday-cake"></i> &nbsp;<b>วันเกิด / Birthday </b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->brith }}<hr> </span>
                </div>
                <div class="col-md-5">
                    <i class="fas fa-venus-mars"></i></i> &nbsp;<b>เพศ / Sex </b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->sex }}<hr> </span>
                </div>
                <div class="col-md-12">
                    <i class="far fa-envelope"></i></i> &nbsp;<b>อีเมล  / E-mail </b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->email }}<hr> </span>
                </div>
                <div class="col-md-12">
                    <i class="fas fa-phone-alt"></i></i> &nbsp;<b>โทรศัพท์ / Phone</b> 
                    &nbsp;&nbsp;
                    <span class="text-primary">{{ $data->phone }}<hr></span>
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



                <!-- @if(is_null($data->driver_license) )
                    <div class="col-md-12">
                        <img src="{{ url('/img/icon/driver-license-icon.png' ) }}" style="width: 18px;" />
                        <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b>   
                    </div>
                @elseif($data->driver_license == "" ) 
                    <div class="col-md-12">
                        <img src="{{ url('/img/icon/driver-license-icon.png' ) }}" style="width: 18px;" />
                        <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b>   
                    </div>
                @else
                    @if(Auth::check())
                        @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                            <div class="col-md-12">
                            <img src="{{ url('/img/icon/driver-license-icon.png' ) }}" style="width: 18px;" />
                                <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b >
                            </div>
                            <div class="col-md-6">
                            <center>
                            <label for="massengbox" class="control-label">&nbsp;รถยนต์</label>
                            <br>
                            <img src="{{ url('storage')}}/{{ $data->driver_license }}" style="width:200px" /><br/><br/> 
                            </center>
                        </div>
                        <div class="col-md-6">
                            <center>
                            <label for="massengbox" class="control-label">&nbsp;รถจักรยานยนต์</label>
                            <br>
                            <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" style="width:200px" /><br/><br/>
                            </center> 
                        </div>
                        @endif 
                    @endif               
                @endif -->
            </div>
        </div>
        <!--<div class="col-md-6" style="margin:-20px 0px 0px 0px;">
        <br><br><strong>ข้อมูลพื้นฐาน / Basic information </strong><br><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                {{ 'ชื่อผู้ใช้  / Username' }}                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $data->username }}    
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                {{ 'ชื่อ / Name' }}                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                              {{ $data->name }}    
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                {{ 'วันเกิด / Birthday ' }}                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $data->brith }}
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                {{ 'เพศ / Sex ' }}                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $data->sex }}
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                {{ 'อีเมล  / E-mail' }}                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $data->email }}
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                {{ 'โทรศัพท์ / Phone ' }}                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                          {{ $data->phone }}  
                        </td>
                    </tr>
                    @if(is_null($data->driver_license) )
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                {{ 'ใบอนุญาตขับรถ / Driver license ' }} <br>
                                <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>                                              
                            </strong>
                        </td>
                    </tr>
                    @elseif($data->driver_license == "" ) 
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                {{ 'ใบอนุญาตขับรถ / Driver license ' }} <br>
                                <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>                                              
                            </strong>
                        </td>
                    </tr>
                    @else
                    <tr>        
                    
                        <td>
                          @if(Auth::check())
                                @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                {{ 'ใบอนุญาตขับรถ / Driver license ' }} <br>
                                <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>                                              
                            </strong>
                        </td>-->
                        <!---------------คอม--------------------------->
                        <!---<td class="text-primary d-none d-lg-block"> -->
                                    <!-- <div class="row"> -->
                                          <!--<div class="col-12 col-md-6">
                                              <label for="massengbox" class="control-label">&nbsp;รถยนต์</label>
                                              <br>
                                              <img src="{{ url('storage')}}/{{ $data->driver_license }}" style="width:200px" /><br/><br/> 
                                          </div>
                                        <div class="col-12 col-md-6">
                                              <label for="massengbox" class="control-label">&nbsp;รถจักรยานยนต์</label>
                                              <br>
                                              <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" style="width:200px" /><br/><br/> 
                                        </div>
                        </td>
                        <td class="d-block d-md-none"></td>
                    </tr>                                     
                </tbody>
            </table>-->
            <!----------------------มือถือ------------------------------->
            <!--<div class="d-block d-md-none" style="margin:-20px 0px 0px 0px">
                                <label for="massengbox" class="control-label">&nbsp;รถยนต์</label>
                                    <br>
                                <img src="{{ url('/img/icon/ป้ายทะเบียน.png' ) }}" style="width:200px" /><br/><br/> 
                            </div>
                            <div class="d-block d-md-none">
                                <label for="massengbox" class="control-label">&nbsp;รถจักรยานยนต์</label>
                                    <br>
                                 <img src="{{ url('/img/icon/ป้ายทะเบียน.png' ) }}" style="width:200px" /><br/><br/> 
                            </div>
            </div> @endif 
                @endif               
            @endif   
        </div>   -->  
        

                    
            
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
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }
</script>
@endsection