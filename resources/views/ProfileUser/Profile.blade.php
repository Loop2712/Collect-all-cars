@extends('layouts.main')

@section('content')
<div class="container">
<div class="row flex-lg-nowrap">
@include('layouts.sidebar')

  <div class="col order-lg-1 order-2">
    <div class="row">

      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4"><br><br>
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><span class="glyphicon glyphicon-star">{{ $data->name }}      </span></li>
                <li><span class="glyphicon glyphicon-star" style="font-size: 13px;">เป็นสมาชิกมาแล้ว ปี  เดือน  วัน</span></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
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
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                created                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            20 jul 20014
                        </td>
                    </tr>
                    <tr>        
                        <td>
                          @if(Auth::check())
                                @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                {{ 'ใบอนุญาตขับรถ / Driver license ' }} <br>
                                <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>                                              
                            </strong>
                        </td>
                        <td class="text-primary"> 
                                    <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="massengbox" class="control-label">&nbsp;&nbsp;&nbsp;รถยนต์</label>
                                              <br>
                                              <img src="{{ url('storage')}}/{{ $data->driver_license }}" width="170" /><br/><br/> 
                                          </div>
                                        <div class="col-12 col-md-6">
                                              <label for="massengbox" class="control-label">&nbsp;&nbsp;&nbsp;รถจักรยานยนต์</label>
                                              <br>
                                              <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" width="170" /><br/><br/> 
                                        </div>
                                    </div>
                                    @endif 
                                @endif
                      </div>
                        </td>
                    </tr> 
                                                      
                </tbody>
                
            </table>
            
            </div>
        </div>
            <div class="row">
                    <div class="col d-flex justify-content-end">
                        <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                        <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="แก้ไขโปรไฟล์">
                        <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>แก้ไขโปรไฟล์</h6> </button></a>
                    <!-- </div>
                    <div class="col d-flex justify-content-end"> -->
                    <form method="POST" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                        <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($profile->active) ? $profile->active : 'No'}}" >
                        <button class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i><h6>ลบโปรไฟล์</h6> </button></a>
                        </form>
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

@endsection