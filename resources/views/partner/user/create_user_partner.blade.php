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
        animation: up-down 2s cubic-bezier(0.87, 0, 0.13, 1) 0s 2 alternate-reverse both;
    }

    @keyframes up-down {
        0% {
            opacity: 1;
            transform: translateY(23vh);
        }

        100% {
            opacity: 0;
            transform: translateY(0px);
        }
    }
</style>
<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<br>
    <div class="card radius-10 " >
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="font-weight-bold mb-0">บัญชีผู้ใช้ {{ $partners }}</h5>
                </div>
            </div>
        </div>
        @if($user_old == "No")
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
                        <textarea class="form-control" name="userpass" id="userpass" cols="20" rows="3" readonly></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-sm btn-outline-secondary" onclick="CopyToClipboard('userpass')">
                            <i class="fas fa-copy"></i> copy
                        </button>
                        <a style="float:right;" id="go_back" href="{{ url('/manage_user_partner') }}" class="btn btn-sm btn-outline-warning d-none">
                            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
            </div>
        @else

        

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        มีผู้ใช้นี้อยู่แล้ว
                    </div>
                    <div id="go_back" class="col-12 d-">
                        <br>
                        <a href="{{ url('/manage_user_partner') }}" class="btn btn-sm btn-outline-warning">
                            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
            </div>
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
