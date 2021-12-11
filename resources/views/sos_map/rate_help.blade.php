@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        สวัสดี {{ $data_users->name }}
                        <br>
                        บอกให้เรารู้ การช่วยเหลือเป็นอย่างไรบ้าง
                        <hr>
                        <b>เจ้าหน้าที่ :</b> {{ $data_sos_map->helper }}
                        <br>
                        <b>จาก :</b> {{ $data_sos_map->organization_helper }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <p>ความประทับใจในการช่วยเหลือ</p>
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
                <div class="card">
                    <div class="card-body">
                        <p>ระยะเวลาในการช่วยเหลือ</p>
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
                <div class="card">
                    <div class="card-body">
                        <p>ภาพรวมการช่วยเหลือ</p>
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
                <button type="button" class="btn btn-success float-right">ให้คะแนน</button>
            </div>
        </div>
    </div>
@endsection
