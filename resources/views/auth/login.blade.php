@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('ลงชื่อเข้าใช้') }}</div>

                <div class="card-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 offset-md-2">
                        <center>
                            <div class="row">
                            <!-- ซ้าย -->
                                <!-- <div class="col-12 col-md-6">
                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                    <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                </div> -->
                                <!-- ขวา -->
                                <!-- <div class="col-12 col-md-6">
                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                    <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                    <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                </div> -->

                                <div class="col-12 col-md-12">
                                    <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                    <br>
                                    <a class="btn btn-link text-muted" onclick="document.querySelector('#from_login').classList.remove('d-none')">เข้าสู่ระบบด้วยชื่อผู้ใช้</a>
                                </div>
                                <div class="col-12 col-md-12">
                                    <br>
                                    <a class="btn btn-link text-muted" href="{{ route('register') }}">สมัครสมาชิก</a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-2"></div>
                    <br>
                    <form class="d-none" method="POST" id="from_login" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label> -->
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ชื่อผู้ใช้" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label> -->
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
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
                            <div class="col-md-8 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('จดจำฉัน') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <div class="row">
                                    <center>
                                        <div class="col-md-11">
                                            <button style="padding-left: 106px;padding-right: 106px;" type="submit" class="btn btn-primary">
                                                {{ __('เข้าสู่ระบบ') }}
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link text-muted float-left" href="{{ route('password.request') }}">
                                                    {{ __('ลืมรหัสผ่าน ?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                                <br>
                                <!-- <div class="row"> -->
                                    <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                    <!-- <span style="margin-top: -10px;color: #ccc;text-transform: uppercase;text-align: center;" class="col-md-12">
                                        หรือ
                                    </span> -->
                                    
                                    <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                    <!-- <center>
                                        <div class="row">
                                        
                                            <div class="col-12 col-md-6">
                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                                <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                            </div>
                                            
                                            <div class="col-12 col-md-6">
                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                                <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                            </div>
                                        </div>
                                    </center> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <center>
                            <P><br>การลงชื่อเข้าใช้หมายความว่าคุณยอมรับ<br></P> <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> <b>ข้อกำหนดในการให้บริการ</b></a>
                            <br><br><br>
                            <img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
                        </center>
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
@endsection
