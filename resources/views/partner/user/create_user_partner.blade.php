@extends('layouts.partners.theme_partner_new')


@section('content')
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
    alert("คัดลอก ข้อความแล้ว");
    document.querySelector('#go_back').classList.remove('d-none');
  }
}
</script>
@endsection
