@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
    <div class="container" style="font-family: 'Mitr', sans-serif;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 25px;padding: 8px;background-image: linear-gradient(to left top, #48cae4, #009ace, #006ab3, #003b8e, #03045e);">
                    <div class="card-body" style="color: white;" >
                        สวัสดี {{ $data_users->name }}
                        <br>
                        บอกให้เรารู้ การช่วยเหลือเป็นอย่างไรบ้าง
                        <hr >
                        <b>เจ้าหน้าที่ :</b> {{ $data_sos_map->helper }}
                        <br>
                        <b>จาก :</b> {{ $data_sos_map->organization_helper }}
                    </div>
                </div>
                <br>
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 8px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ความประทับใจในการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 8px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ระยะเวลาในการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 8px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ภาพรวมการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>

                <br>
                <button type="button" class="btn btn-primary float-right" style="border-radius: 50px;">ให้คะแนน</button>
            </div>
        </div>
    </div>
@endsection
