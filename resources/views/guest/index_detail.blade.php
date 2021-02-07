@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- ข้อมูลผู้ใช้ -->
                <div class="d-none card" id="div_user">
                    <div class="card-header">
                        <h5>ข้อมูลผู้ใช้
                            <a href="" style="float: right;font-size: 18px;" onclick="document.querySelector('#div_user').classList.add('d-none')"><i class="fas fa-times"></i>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                @foreach($users as $item)
                                <div class="col-2">
                                    @if(!empty($item->avatar))
                                        <img width="150" src="{{ $item->avatar }}" class="rounded-circle">
                                    @endif
                                    @if(empty($item->avatar))
                                        <img width="150" src="{{ asset('/img/icon/user.png') }}" class="rounded-circle">
                                    @endif
                                </div>
                                <div class="col-3">
                                    @switch($item->ranking)
                                        @case('Senior')
                                            <a class="btn btn-light " href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                        @break
                                        @case('Common')
                                            <a class="btn btn-light " href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                        @break
                                        @case('Normal')
                                            <a class="btn btn-light " href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                                        @break
                                    @endswitch
                                    <br><br>
                                    <h3>{{ $item->name }}</h3>
                                    @switch($item->type)
                                        @case('line')
                                            <h3><i class="fab fa-line text-success"></i></h3>
                                        @break
                                        @case('facebook')
                                            <h3><i class="fab fa-facebook-square text-primary"></i></h3>
                                        @break
                                        @default
                                            <h5><i class="fas fa-user-shield text-secondary"></i></h5>
                                        @break
                                    @endswitch
                                </div>
                                <div class="col-3">
                                    <br><br><br><br>
                                    <p><b><i class="fas fa-paper-plane text-danger"></i> {{ $item->email }}</b></p>
                                </div>
                                <div class="col-2">
                                    <br><br><br><br>
                                    <p><b><i class="fas fa-phone-alt text-info"></i> {{ $item->phone }}</b></p>
                                </div>
                                <div class="col-2">
                                    <br><br><br><br>
                                    <p><b><i style="color: #FF00FF" class="fas fa-venus-mars"></i> {{ $item->sex }}</b></p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main -->
                <div class="card">
                    <h5 class="card-header">Owner alert report</h5>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <a class="btn btn-light " onclick="document.querySelector('#div_user').classList.remove('d-none')"><i class="fas fa-street-view text-success"></i> ข้อมูลผู้ใช้</a>
                                </div>
                                <div class="col-2"> </div>
                                <div class="col-1"></div>
                                <div class="col-3">
                                    @foreach($guest_corny as $item)
                                    <a class="btn btn-light " onclick="document.querySelector('#div_user').classList.remove('d-none')"><i class="fas fa-check-circle text-primary"></i> ซ้ำคันเดิมมากสุด {{ $item->count }} รอบ</a>
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    @foreach($all as $item)
                                    <a class="btn btn-light " onclick="document.querySelector('#div_user').classList.remove('d-none')"><i class="fas fa-check-circle text-primary"></i> ทั้งหมด {{ $item->count }} คัน</a>
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    &nbsp;&nbsp;&nbsp;
                                    @switch($ranking)
                                        @case('Senior')
                                            <a class="btn btn-light " href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                        @break
                                        @case('Common')
                                            <a class="btn btn-light " href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                        @break
                                        @case('Normal')
                                            <a class="btn btn-light " href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                                        @break
                                    @endswitch
                                </div>
                            </div>
                            <hr>

                            <!-- วันที่ล่าสุด -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-3"><b>วันที่แจ้ง</b></div>
                                        <div class="col-4"><b>ทะเบียนรถ</b></div>
                                        <div class="col-3"><b>ข้อความที่แจ้ง</b></div>
                                    </div>
                                    <hr>
                                    @foreach($guest_date as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            &nbsp;&nbsp;&nbsp;{{ $loop->iteration }}
                                        </div>
                                        <div class="col-3">
                                            {{ $item->created_at }}
                                        </div>
                                        <div class="col-4">
                                            {{ $item->registration }}&nbsp;&nbsp;{{ $item->county }}
                                        </div>
                                        <div class="col-3">
                                            @switch($item->massengbox)
                                                @case ('1')
                                                    <p>กรุณาเลื่อนรถด้วยค่ะ</p>
                                                    @break
                                                @case ('2')  
                                                    <p>รถคุณเปิดไฟค้างไว้ค่ะ</p>
                                                    @break
                                                @case ('3')
                                                    <p>มีเด็กอยู่ในรถค่ะ</p>
                                                    @break
                                                @case ('4') 
                                                    <span>รถคุณเกิดอุบัติเหตุค่ะ</span>&nbsp;&nbsp;<a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">ดูรปภาพ</a>
                                                    @break
                                                @case ('5')  
                                                    <p>แจ้งปัญหาการขับขี่</p>
                                                    @break
                                                @case ('6') 
                                                    {{ $item->masseng }}
                                                    @break
                                            @endswitch
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
