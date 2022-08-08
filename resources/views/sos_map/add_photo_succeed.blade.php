@extends('layouts.viicheck')

@section('content')

<br><br><br><br><br>
<input type="hidden" name="photo_succeed_old" id="photo_succeed_old" value="{{ $photo_succeed }}">

<div class="container" style="font-family: 'Mitr', sans-serif;">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border-radius: 25px;padding: 8px;background-image: linear-gradient(to left top, #48cae4, #009ace, #006ab3, #003b8e, #03045e);">
                <div class="card-body" style="color: white;" >
                    <h4>สวัสดีคุณ : <b>{{ $user->name }}</b> </h4>
                    <hr >
                    <b>คุณกำลังเพิ่มภาพถ่าย</b>
                    <br>
                    การช่วยเหลือ : {{ $data_sos_map->name }}
                    <br>
                    พื้นที่ : {{ $data_sos_map->area }} - {{ $data_sos_map->name_area }}
                </div>
            </div>
            <br>
        </div>
        <div id="content_data_officer" class="col-md-12 d-none">
            <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                <div class="card-body" style="color: white;">
                    <p class="text-center" style="font-size:18px;">
                        @if(!empty($data_officer->name))
                            เจ้าหน้า : {{ $data_officer->name }} ได้เพิ่มภาพถ่ายแล้ว
                        @endif
                    </p>
                    <center>
                        <img class="main-shadow" style="border-radius: 50%; object-fit:cover;" width="150px" height="150px" src="{{ url('storage')}}/{{ $data_sos_map->photo_succeed }}">
                    </center>
                </div>
            </div>
        </div>
        <div id="content_add_photo" class="col-md-12 d-none">
            <div class="card">
                <div class="card-body">
                    <div id="btn_open_camera" class="d-none">
                        <center>
                            <br>
                            <a class="btn btn-sm text-white btn-primary" onclick="document.querySelector('#btn_close_camera').classList.remove('d-none'),document.querySelector('#div_cam').classList.remove('d-none'),document.querySelector('#btn_open_camera').classList.add('d-none');">
                                เพิ่มภาพถ่าย
                                <i id="i_down" class="fas fa-camera"></i>
                                <i id="i_up" class="fas fa-chevron-up d-none"></i>
                            </a>
                        </center>
                    </div>
                    <div id="btn_close_camera">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stop();">
                            <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                        </button>
                    </div>

                    <br>

                    <div class="col-12" id="div_cam" style="margin-top:17px;">
                        <div class="d-flex justify-content-center bg-light"> 
                           
                            <video width="100%" height="100%" autoplay="true" id="videoElement"></video>
                            <a class="align-self-end text-white btn-primary btn-circle" style="position: absolute; margin-bottom:10px" onclick="capture();">
                                <i class="fas fa-camera"></i>
                            </a>
                        </div>
                    </div>

                    <input class="d-none" type="text" name="text_img" id="text_img" value="">

                    <div style="margin-top:15px;" id="show_img" class="">
                        <canvas class="d-none"  id="canvas" width="266" height="400" ></canvas>
                        <img class="d-none" src="" width="266" height="400"  id="photo2">

                        <div id="btn_check_time" class="row d-none" style="margin-top:15px;">
                            <div class="col-12">
                                <p class="btn btn-sm btn-danger" onclick="document.querySelector('#btn_check_time').classList.add('d-none'),capture_registration();">
                                    <i class="fas fa-undo"></i> ถ่ายใหม่
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
        
document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    let photo_succeed_old = document.querySelector('#photo_succeed_old').value;

    if (photo_succeed_old === 'Yes') {
        document.querySelector('#content_data_officer').classList.remove('d-none');
        document.querySelector('#content_add_photo').classList.add('d-none');
    }else{
        document.querySelector('#content_data_officer').classList.add('d-none');
        document.querySelector('#content_add_photo').classList.remove('d-none');
    }

});

function capture() {

    var video = document.querySelector("#videoElement");
    var text_img = document.querySelector("#text_img");

    var photo2 = document.querySelector("#photo2");
    var canvas = document.querySelector("#canvas");

    var div_cam = document.querySelector("#div_cam");
        div_cam.classList.add('d-none');

        photo2.classList.remove('d-none');

        let context = canvas.getContext('2d');
            context.drawImage(video, 0, 0,266,400);

        photo2.setAttribute('src',canvas.toDataURL('image/png'));
        text_img.value = canvas.toDataURL('image/png');

    document.querySelector('#btn_check_time').classList.remove('d-none');
    
}

function stop(e) {

    document.querySelector("#div_cam").classList.add('d-none');
    document.querySelector("#btn_close_camera").classList.add('d-none');
    document.querySelector("#btn_open_camera").classList.remove('d-none');

    var video = document.querySelector("#videoElement");
    var photo2 = document.querySelector("#photo2");
    var canvas = document.querySelector("#canvas");
    var text_img = document.querySelector("#text_img");
    var context = canvas.getContext('2d');
      
      var stream = video.srcObject;
      var tracks = stream.getTracks();

      for (var i = 0; i < tracks.length; i++) {
        var track = tracks[i];
        track.stop();
      }

      video.srcObject = null;
}

function capture_registration(){

    var video = document.querySelector("#videoElement");
    var photo2 = document.querySelector("#photo2");
    var canvas = document.querySelector("#canvas");
    var text_img = document.querySelector("#text_img");
    var context = canvas.getContext('2d');
    var div_cam = document.querySelector("#div_cam");
        div_cam.classList.remove('d-none');
        
        photo2.classList.add('d-none');

    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: { facingMode: { exact: "environment" } } }) 
      // { video: true }
      // { video: { facingMode: { exact: "environment" } } }
        .then(function (stream) {
          if (typeof video.srcObject == "object") {
              video.srcObject = stream;
            } else {
              video.src = URL.createObjectURL(stream);
            }
        })
        .catch(function (err0r) {
          console.log("Something went wrong!");
        });
    }

}

</script>

@endsection
