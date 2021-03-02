@extends('layouts.main')

@section('add')
<style>
    body{
    margin-top:20px;
    /* background: #f6f9fc; */
    

}
.account-block {
    padding: 0;
    background-image: url(https://images.pexels.com/photos/1545743/pexels-photo-1545743.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
.account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.4);
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #5369f8 !important;
}

.btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
}
</style>
@endsection

@section('content')
<br><br>
<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">{{ __('ลงชื่อเข้าใช้') }}</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-theme">Login</button>
                                    <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register.html" class="text-primary ml-1">register</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

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


                                <div class="col-12 col-md-12">
                                    <a href="{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a>
                                    <br>
                                    <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a>
                                    <br>
                                    <a href="{{ route('login.google') }}?redirectTo={{ request('redirectTo') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                    <br><br>
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
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <center>
                            <P><br>การลงชื่อเข้าใช้หมายความว่าคุณยอมรับ<br></P> <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/privacy_policy') }}"> <b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></a>
                            <P><a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> <b>ข้อกำหนดและเงื่อนไขการใช้บริการบน เว็บไซต์ Viicheck.com</b></a>
                            <br><br><br>
                            <img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
