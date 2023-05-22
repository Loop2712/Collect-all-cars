@extends('layouts.partners.theme_partner_new')


@section('content')
<style>
    .div_alert {
        position: fixed;
        top: -10%;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        text-align: center;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 18px;

    }

    .div_alert span {
        background-color: #2DD284;
        border-radius: 10px;
        color: white;
        padding: 15px;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 1em;
    }

    .up_down {
        animation-name: slideDownAndUp;
        animation-duration:3s;
    }

    @keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(100px);
        }
        90% {
            transform: translateY(100px);
        }
        100% {
            transform: translateY(0);
        }
    }

*{
    font-family: 'Mitr', sans-serif;
}
    
    #userpass{
        resize: none;
    }
</style>
<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<br>
    <div class="card radius-10 " >
       
        @if($user_old == "No") 

            <div class="row g-0">
                <div class="col-lg-5 border-end">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="{{ asset('/img/logo/VII-check-LOGO-W-v3.png') }}" width="130" alt="">
                            </div>
                            <h4 class="mt-5 font-weight-bold">สร้างบัญชีสำเร็จ</h4>
                            <p class="text-muted">คุณได้สร้างบัญชีใหม่เรียบร้อยแล้ว! สามารถเข้าสู่ระบบด้วยชื่อผู้ใช้และรหัสผ่านของคุณ</p>
                            <div class="mb-3 mt-5">
                                <label class="form-label">ชื่อผู้ใช้และรหัสผ่าน</label>
                                <input class="form-control" type="hidden" name="username" id="username" value="{{ $username }}" readonly="">
                                <input class="form-control" type="hidden" name="password" id="password" value="{{ $password }}" readonly="">
                                <textarea class="form-control " name="userpass" id="userpass" readonly></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary" onclick="CopyToClipboard('userpass')">คัดลอก</button> 
                                <a class="btn btn-light" onclick="window.history.back();"><i class="bx bx-arrow-back mr-1"></i>ย้อนกลับ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center p-5">
                    <img src="{{ asset('/img/more/success.svg') }}" class="img-fluid" width="70%" height="70%" alt="...">
                </div>
            </div>


            <!-- <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">บัญชีผู้ใช้ {{ $partners }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="hidden" name="username" id="username" value="{{ $username }}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="hidden" name="password" id="password" value="{{ $password }}" readonly="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <textarea class="form-control" name="userpass" id="userpass" readonly></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-sm btn-outline-secondary" onclick="CopyToClipboard('userpass')">
                            <i class="fas fa-copy"></i> copy
                        </button>
                        <a style="float:right;" id="go_back" onclick="window.history.back();" class="btn btn-sm btn-outline-warning d-none">
                            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="go_back" class="col-12 d-">
                        <br>
                        <a onclick="window.history.back();" class="btn btn-sm btn-outline-warning">
                            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
            </div> -->
        @else
            <div class="row g-0 py-5">
                <div class="col col-xl-5 d-flex align-items-center">
                    <div class="card-body p-4 ">
                        <h1 class="display-1">
                            <span class="text-primary">E</span><span class="text-danger">R</span><span class="text-success">R</span><span class="text-primary">O</span><span class="text-danger">R</span>
                        </h1>
                        @php
                            $name = request()->query('name');
                        @endphp
                        <h2 class="font-weight-bold display-4">การสร้างไม่สำเร็จ</h2>
                            <p>ไม่สามารถสร้างบัญชี <b>{{$name}}</b> ได้
                            <br>เนื่องจากมีบัญชีนี้อยู่ในระบบแล้ว.
                        <div class="mt-5"> <a href="{{ url('/partner_index') }}" class="btn btn-primary btn-lg px-md-5 radius-30">หน้าหลัก</a>
                            <a onclick="window.history.back();" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <img src="{{ asset('/img/more/create_user.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
            <!--end row-->
        @endif
    </div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    copy();
});
function copy()
{
    let user = document.querySelector("#username");
    let pass = document.querySelector("#password");
    let username = user.value ;
    let password = pass.value ;

    let str = "Username : " + username + "\n" + "Password : " + password
    // console.log(str);
    let userpass = document.querySelector("#userpass");
        userpass.value = str;
}
function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
    document.querySelector('#go_back').classList.remove('d-none');
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");

    document.querySelector('#alert_text').innerHTML = "คัดลอกเรียบร้อย";
        document.querySelector('#alert_copy').classList.add('up_down');

        const animated = document.querySelector('.up_down');
        animated.onanimationend = () => {
            document.querySelector('#alert_copy').classList.remove('up_down');
        };
    document.querySelector('#go_back').classList.remove('d-none');
  }
}
</script>
@endsection
