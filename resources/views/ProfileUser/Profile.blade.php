@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div style="float:right;">
                <a href="{{ url('/profile') }}" type="button" class="btn btn-danger text-white">ข้อมูลโปรไฟล์</a>
                <a href="{{ url('/register_car') }}" type="button" class="btn btn-outline-danger text-danger">ข้อมูลรถของฉัน</a>
                <a type="button" class="btn btn-outline-danger text-danger">ข้อมูลรถองค์</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="main-shadow" style="padding:15px;">
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
                        <center>
                            @if(!empty($data->avatar) and empty($data->photo))
                                <a href="{{ $data->avatar }}" class="glightbox play-btn mb-4">
                                    <img alt="" style="width:65%; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ $data->avatar }}" data-original-title="Usuario"> 
                                </a>
                            @endif
                            @if(!empty($data->photo))
                                <a href="{{ url('storage')}}/{{ $data->photo }}" class="glightbox play-btn mb-4">
                                    <img alt="" style="width:65%; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario">
                                </a>
                            @endif
                            @if(empty($data->avatar) and empty($data->photo))
                                <img alt="" style="width:65%; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('/img/icon/user.png') }}" data-original-title="Usuario">
                            @endif
                            <br><br>
                            <h4 class="text-primary"><b>{{ $data->name }}</b></h4>
                            <span class="text-dark">
                                <i class="fas fa-map-marker-alt text-danger"></i> <b>{{ $data->location_A }} {{ $data->location_P }}</b>
                            </span>
                            <br>
                            <span style="line-height: 30pt;">
                                เป็นสมาชิกเมื่อ {{$data->created_at->diffForHumans()}}
                            </span>
                        </center>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div style="float:right;">
                                    <p>
                                        <a class="btn btn-sm btn-warning text-white" href="{{ url('/profile/' . $data->id . '/edit') }}">
                                            <i class="fas fa-user-edit"></i> แก้ไขข้อมูลโปรไฟล์
                                        </a>
                                        &nbsp;
                                        <a  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-sort-down"></i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <a style="float:right;" class="text-danger" href="#">
                                            <i class="fas fa-user-times"></i> ยกเลิกการเป็นสมาชิก
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if(Auth::check())
                        @if(Auth::user()->id == $data->id or Auth::user()->role == "admin")
                            <div class="main-shadow" style="padding:15px;">
                                <button style="width: 100%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">ใบอนุญาตขับขี่</button>
                                <br>
                                <span style="color:red;font-size: 14px;line-height: 30pt;">*ใบอนุญาตขับขี่จะไม่แสดงให้ผู้อื่นเห็น</span>
                                <h5><i class="fas fa-car-side text-danger"></i> รถยนต์</h5>
                                <br>
                                <center>
                                    @if(!empty($data->driver_license))
                                    <a href="{{ url('storage')}}/{{ $data->driver_license }}" class="glightbox play-btn mb-4">
                                        <img width="70%" src="{{ url('storage')}}/{{ $data->driver_license }}">
                                    </a>
                                    @endif
                                </center>
                                <br><br>
                                <h5><i class="fas fa-motorcycle text-success"></i> รถจักรยานยนต์</h5>
                                <br>
                                <center>
                                    @if(!empty($data->driver_license2))
                                    <a href="{{ url('storage')}}/{{ $data->driver_license2 }}" class="glightbox play-btn mb-4">
                                        <img width="70%" src="{{ url('storage')}}/{{ $data->driver_license2 }}">
                                    </a>
                                    @endif 
                                </center>
                                <br>
                            </div>
                        @endif               
                    @endif
                </div>
                <div class="col-8">
                    <div class="main-shadow" style="padding:15px;">
                        <div class="row">
                            <button style="width: 40%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">ข้อมูลพื้นฐาน</button>
                            <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                            <div class="col-4">
                                <center><i class="far fa-user"></i> <b>&nbsp;ชื่อผู้ใช้</b></center>
                            </div>
                            <div class="col-8">
                                {{ $data->username }}
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center><i class="fas fa-birthday-cake"></i> <b>&nbsp;วันเกิด</b></center>
                            </div>
                            <div class="col-8">
                                {{ $data->birth }}
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center><i class="fas fa-venus-mars"></i></i> <b>&nbsp;เพศ</b></center>
                            </div>
                            <div class="col-8">
                                {{ $data->sex }}
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center><i class="far fa-envelope"></i></i> <b>&nbsp;อีเมล</b></center>
                            </div>
                            <div class="col-8">
                                {{ $data->email }}
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center><i class="fas fa-phone-alt"></i></i> <b>&nbsp;เบอร์โทร</b></center>
                            </div>
                            <div class="col-8">
                                {{ $data->phone }}
                            </div>
                            <hr style="margin-bottom: 0;margin-top: 20px;height:0.1px;width: 96%;">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="main-shadow" style="padding:15px;">
                        <div class="row">
                            <button style="width: 40%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">ข้อมูลทั่วไป</button>
                            <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                            <div class="col-4">
                                <center> <b>รถของฉัน</b></center>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-2">
                                        <img width="30" src="{{ url('/img/icon/line_car.png') }}">
                                    </div>
                                    <div class="col-2">
                                        <b class="text-primary">{{ count($myCars) }}</b>
                                    </div>
                                    <div class="col-2">
                                        <img width="30" src="{{ url('/img/icon/line_motorcycle.png') }}">
                                    </div>
                                    <div class="col-2">
                                        <b class="text-primary">{{ count($myMotors) }}</b>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center> <b>รถองค์กร</b></center>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-2">
                                        <img width="30" src="{{ url('/img/icon/line_car.png') }}">
                                    </div>
                                    <div class="col-2">
                                        <b class="text-primary">2</b>
                                    </div>
                                    <div class="col-2">
                                        <img width="30" src="{{ url('/img/icon/line_motorcycle.png') }}">
                                    </div>
                                    <div class="col-2">
                                        <b class="text-primary">0</b>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center> <b>ขอความช่วยเหลือ</b></center>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-2">
                                        <b class="text-primary">&nbsp;&nbsp;{{ count($mySos) }}</b>
                                    </div>
                                    <div class="col-2">
                                        ครั้ง
                                    </div>
                                    <div class="col-8"></div>
                                </div>
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center> <b>ถูกเรียก / ถูกรายงาน</b></center>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-2">
                                        <b class="text-primary">&nbsp;&nbsp;2</b>
                                    </div>
                                    <div class="col-2">
                                        ครั้ง
                                    </div>
                                    <div class="col-8"></div>
                                </div>
                            </div>
                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                            <div class="col-4">
                                <center> <b>การแจ้งเตือนหาผู้อื่น</b></center>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-2">
                                        <b class="text-primary">&nbsp;&nbsp;2</b>
                                    </div>
                                    <div class="col-2">
                                        ครั้ง
                                    </div>
                                    <div class="col-8"></div>
                                </div>
                            </div>
                            <hr style="margin-bottom: 0;margin-top: 20px;height:0.1px;width: 96%;">
                        </div>
                    </div>
                </div>

                <!-- องค์กร -->
                @if(!empty($organization))
                    @foreach ($organization as $itemkey)
                        <div class="col-12">
                            <br>
                            <div class="main-shadow" style="padding:15px;">
                                <h2 style="margin-top: 10px;margin-left: 10px;">ข้อมูลองค์กร {{ $itemkey->juristicNameTH }}</h2>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <button style="width: 45%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">รายละเอียดองค์กร</button>
                                        <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                                        <div class="row">
                                            <div class="col-5">
                                                <center><b>&nbsp;หมายเลขนิติบุคคล</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->juristicID }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ชื่อนิติบุคคล(TH)</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->juristicNameTH }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ชื่อนิติบุคคล(EN)</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->juristicNameEN }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ประเภทนิติบุคคล</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->juristicType }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;วันที่จดทะเบียน</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->registerDate }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;สถานะนิติบุคคล</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->juristicStatus }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ทุนจดทะเบียน</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ number_format($itemkey->registerCapital) }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;รหัสหมวดหมู่ tsic</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->standardObjective }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;วัตถุประสงค์จัดตั้ง</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->standardObjectiveDetail }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;อีเมล </b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->mail }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 90%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;โทรศัพท์</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->phone }}
                                            </div>
                                            <hr style="margin-bottom: 0;margin-top: 20px;height:0.1px;width: 90%;">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <button style="width: 45%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">ที่อยู่องค์กร</button>
                                        <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                                        <div class="row">
                                            <div class="col-5">
                                                <center><b>&nbsp;ชื่อสาขา</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->addressName }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;อาคาร</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->buildingName }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;เลขที่ห้อง</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->roomNo }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ชั้นที่</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->floor }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;หมู่บ้าน</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->villageName }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;เลขที่บ้าน</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->houseNumber }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;หมู่ที่</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->moo }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ซอย</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->soi }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;ถนน</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->street }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;แขวง / ตำบล</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->subDistrict }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;เขต / อำเภอ</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->district }}
                                            </div>
                                            <hr style="margin-top: 20px;height:0.1px;width: 96%;">

                                            <div class="col-5">
                                                <center><b>&nbsp;จังหวัด</b></center>
                                            </div>
                                            <div class="col-7">
                                                {{ $itemkey->province }}
                                            </div>
                                            <hr style="margin-bottom: 0;margin-top: 20px;height:0.1px;width: 96%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<br>

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