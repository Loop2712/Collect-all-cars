@extends('layouts.partners.theme_partner')


@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">บัญชีผู้ใช้ {{ $partners }}</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <input class="form-control" type="hidden" name="username" id="username" value="{{ $username }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
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
                                        <div class="col-12 col-md-3">
                                            <button class="btn btn-sm btn-outline-secondary" onclick="CopyToClipboard('userpass')"><i class="fas fa-copy"></i> copy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
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
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("คัดลอก ข้อความแล้ว");
    window.location.replace("{{url('/view_new_user')}}");
  }
}
</script>
@endsection
