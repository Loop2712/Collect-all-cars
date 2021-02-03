@extends('layouts.main')

@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-header"> <h3>ข้อมูลส่วนบุคคล / Personal information </h3> </div>
                    
                         <br/><br/>
                         <section class="car-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลพื้นฐาน / Basic information '}}</span>
                                        <br><br>
                                    <div class="row">
                                        <div class="col-12">
                                                <img src="{{$data->avatar}}" width="100" /> 
                                        </div>
                                        <br/><br/>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <label class="control-label">{{ 'ชื่อผู้ใช้  / Username' }}</label></label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            {{ $data->username }}<br/><br/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <label  class="control-label">{{ 'ชื่อ / Name' }}</label></label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            {{ $data->name }}<br/><br/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <label  class="control-label">{{ 'วันเกิด / Birthday ' }}</label></label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            {{ $data->brith }}<br/><br/>     
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <label for="massengbox" class="control-label">{{ 'เพศ / Sex ' }}</label></label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            {{ $data->sex }}<br/><br/> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br><br>
                                    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลติดต่อ / Contact information  '}}</span>
                                    <br><br>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <label for="massengbox" class="control-label">{{ 'อีเมล  / E-mail' }}</label></label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        {{ $data->email }}<br/><br/> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <label for="massengbox" class="control-label">{{ 'โทรศัพท์ / Phone ' }}</label></label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        {{ $data->phone }}<br/><br/> 
                                    </div>
                                </div>
                            
                                </div>
                            </div>
                                <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="Edit Wishlist"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <br/><br/>
                        </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>
    
@endsection
