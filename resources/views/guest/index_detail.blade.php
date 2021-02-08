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
                                    <a class="btn btn-light" onclick="document.querySelector('#div_user').classList.remove('d-none')"><i class="fas fa-street-view text-success"></i> ข้อมูลผู้ใช้</a>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-4">
                                    @foreach($guest_corny as $item)
                                    <a style="float: right;" class="btn btn-light" title="{{ $item->registration }}&nbsp;&nbsp;{{ $item->county }}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-clone text-danger"></i> ซ้ำคันเดิมมากสุด {{ $item->count }} รอบ  &nbsp;&nbsp;<i class="far fa-eye"></i></a>
                                    @endforeach
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class=" text-info" id="exampleModalLongTitle">หมายเลขทะเบียนที่ซ้ำกัน</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <b>หมายเลข</b>
                                                        </div>
                                                        <div class="col-6">
                                                            <b>จังหวัด</b>
                                                        </div>
                                                        <div class="col-2">
                                                            <b>ซ้ำกัน</b>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                         @foreach($corny as $item)
                                                            @if($item->count > 1)
                                                            <div class="col-4">
                                                                {{ $item->registration }}
                                                            </div>
                                                            <div class="col-6">
                                                                {{ $item->county }}
                                                            </div>
                                                            <div class="col-2">
                                                                <center>
                                                                    <b class="text-danger">{{ $item->count }}</b>
                                                                </center>
                                                            </div>
                                                            @endif
                                                            <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            <!-- {{ $item->registration }}&nbsp;&nbsp;{{ $item->county }} -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    @foreach($all as $item)
                                    <a style="float: right;" class="btn btn-light"><i class="fas fa-check-circle text-primary"></i> ทั้งหมด {{ $item->count }} คัน</a>
                                    @endforeach
                                </div>
                                <div class="col-3">
                                    &nbsp;&nbsp;&nbsp;
                                    @switch($ranking)
                                        @case('Senior')
                                            <a class="btn btn-light" href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                        @break
                                        @case('Common')
                                            <a class="btn btn-light" href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                        @break
                                        @case('Normal')
                                            <a class="btn btn-light" href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                                        @break
                                    @endswitch
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sync"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/change_ToSenior') }}?name={{ request('name') }}"><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                        <a class="dropdown-item" href="{{ url('/change_ToCommon') }}?name={{ request('name') }}">&nbsp;<i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                        <a class="dropdown-item" href="{{ url('/change_ToNormal') }}?name={{ request('name') }}">&nbsp;<i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                                      </div>
                                    </div>
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
                                        <div class="col-4"><b>ข้อความที่แจ้ง</b></div>
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
                                        <div class="col-4">
                                            @switch($item->massengbox)
                                                @case ('1')
                                                    <span>กรุณาเลื่อนรถด้วยค่ะ</span>
                                                    @break
                                                @case ('2')  
                                                    <span>รถคุณเปิดไฟค้างไว้ค่ะ</span>
                                                    @break
                                                @case ('3')
                                                    <span>มีเด็กอยู่ในรถค่ะ</span>
                                                    @break
                                                @case ('4') 
                                                    <span>รถคุณเกิดอุบัติเหตุค่ะ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a target="bank" href="{{ url('storage')}}/{{ $item->photo }}"><img class="rounded-circle" width="120" src="{{ url('storage')}}/{{ $item->photo }}"></a>
                                                    @break
                                                @case ('5')  
                                                    <span>แจ้งปัญหาการขับขี่</span>
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
