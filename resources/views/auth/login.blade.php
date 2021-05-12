@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card main-shadow">
                <!-- แสดงเฉพาะคอม -->
                <img class="d-none d-lg-block" style="position: absolute; width: 100%; height: 100%;"  src="{{ asset('/img/more/bg_login.png') }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-8 offset-md-2">
                                <center>
                                    <h5 style="padding : 7px;">ยินดีต้อนรับสู่</h5>
                                    <img width="40%" src="{{ asset('/img/more/logo_.png') }}">
                                    <br><br>
                                    <form method="POST" id="from_login" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label> -->
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
                                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label> -->
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <center>
                                                    <!-- แสดงเฉพาะคอม -->
                                                    <button style="padding-left: 100px;padding-right: 100px; border-radius: 20px; padding-top: 7px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;" type="submit" class="btn btn-danger d-none d-lg-block main-shadow">
                                                        {{ __('เข้าสู่ระบบ') }}
                                                    </button>

                                                    <!-- แสดงเฉพาะมือถือ -->
                                                    <button style="padding-left: 95px;padding-right: 95px; border-radius: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 14px; background-color: #db2d2e; border: none;" type="submit" class="btn btn-danger d-block d-md-none main-shadow">
                                                        {{ __('เข้าสู่ระบบ') }}
                                                    </button>
                                                </center>
                                                @if (Route::has('password.request'))
                                                    <a style="padding-right: 40px;" class="btn btn-link text-muted float-right" href="{{ route('password.request') }}">
                                                        {{ __('ลืมรหัสผ่าน ?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-5 d-none d-lg-block"></div>
                                            <span style="margin-top: -13px;color: #ccc;text-transform: uppercase;text-align: center;" class="col-md-2"> หรือ </span>
                                            <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-5 d-none d-lg-block"></div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <a href="{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a>
                                            <br>
                                            <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a>
                                            <br>
                                            <a href="{{ route('login.google') }}?redirectTo={{ request('redirectTo') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                            <br>
                                        </div>
                                        <br>

                                        <div class="form-group row">
                                            <span style="font-size: 15px; margin-top: -13px;color: #ccc;text-align: center;" class="col-md-12"> เพิ่งเคยเข้ามาใน ViiCHECK ใช่หรือไม่ 
                                                <a class="text-danger" href="{{ route('register') }}"><b>สมัครใหม่</b></a> 
                                            </span>
                                        </div>
                                        <hr>
                                    </form>
                                </center>
                            </div>
                            <div class="col-12 col-md-12 ">
                                <center>
                                    <p><b>การลงชื่อเข้าใช้หมายความว่าคุณยอมรับ</b><br></p> 
                                    <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/privacy_policy') }}"> 
                                        <span style="color:red"><b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></span>
                                    </a>
                                    <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> 
                                        <span style="color:red"><b>ข้อกำหนดและเงื่อนไขการใช้บริการบน เว็บไซต์ Viicheck.com</b></span>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
        <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
<br>
@endsection
