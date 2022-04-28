@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br>
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card main-shadow">
                <!-- แสดงเฉพาะคอม -->
                <img class="d-none d-lg-block" style="position: absolute; width: 100%; height: 100%;"  src="{{ asset('/img/more/bg_register.png') }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-8 offset-md-2">
                                <center>
                                    <h5 style="padding : 10px;">ยินดีต้อนรับสู่</h5>
                                    <img width="50%" src="{{ asset('/img/more/logo_.png') }}">
                                    <br><br><br>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ชื่อ" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ชื่อผู้ใช้" required autocomplete="username">

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="อีเมล" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="terms_of" id="terms_of" required="">
                                                <span>&nbsp;&nbsp;ฉันยอมรับ<br><br>
                                                    <a class="btn btn-link" style="font-size: 15px; color:red;" target="bank" href="{{ url('/privacy_policy') }}"><b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></a>
                                                    <br>
                                                    <a class="btn btn-link" style="font-size: 15px; color:red;" target="bank" href="{{ url('/terms_of_service') }}"><b>ข้อกำหนดและเงื่อนไขการใช้บริการบน เว็บไซต์ Viicheck.com</b></a>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <div class="col-md-12">
                                                <!-- แสดงเฉพาะคอม -->
                                                <button type="submit" class="btn btn-primary d-none d-lg-block main-shadow" style="padding-left: 110px;padding-right: 110px; padding-top: 10px; padding-bottom: 10px; border-radius: 20px; font-size: 14px; background-color: #db2d2e; border: none;">
                                                    {{ __('สมัครสมาชิก') }}
                                                </button>
                                                <!-- แสดงเฉพาะมือถือ -->
                                                <button type="submit" class="btn btn-primary d-block d-md-none main-shadow" style="padding-left: 90px;padding-right: 90px; padding-top: 10px; padding-bottom: 10px; border-radius: 20px; font-size: 14px; background-color: #db2d2e; border: none;">
                                                    {{ __('สมัครสมาชิก') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
