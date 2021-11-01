<div style="display:none;">
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <label for="content" class="control-label">{{ 'Content' }}</label>
        <input class="form-control" name="content" type="text" id="content" value="{{ isset($sos_map->content) ? $sos_map->content : ''}}" >
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="control-label">{{ 'Name' }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($sos_map->name) ? $sos_map->name : Auth::user()->name}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        <label for="phone" class="control-label">{{ 'Phone' }}</label>
        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_map->phone) ? $sos_map->phone : Auth::user()->phone}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
        <label for="lat" class="control-label">{{ 'Lat' }}</label>
        <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_map->lat) ? $sos_map->lat : ''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
        <label for="lng" class="control-label">{{ 'Lng' }}</label>
        <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_map->lng) ? $sos_map->lng : ''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
        <label for="area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="area" type="text" id="area" value="{{ isset($sos_map->area) ? $sos_map->area : ''}}" >
        {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_map->user_id) ? $sos_map->user_id : Auth::user()->id}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    


    <div class="form-group"> 
        <input class="btn btn-primary" id="btn_submit" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>
</div>

<input class="d-none" type="text" id="latlng" name="latlng" readonly> 

<div class="container d-block d-md-none"> <!-- d-block d-md-none -->
        <div class="row">
            <div class="col-12 main-shadow main-radius" style="margin-top:15px; margin-bottom:10px" id="map">
                    <img style="  width: 100%;height: 100%;object-fit: contain; " src="{{ asset('/img/more/sorry.png') }}" class="card-img-top center" style="padding: 10px;">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4989368.068715823!2d100.32470292487557!3d14.23861745451566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1625474458473!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
            <div class="col-12 card shadow p-3 mb-5 bg-body rounded" >
                <div class="row">
                    <div class="col-12" >
                        <p style=" color:#B3B6B7" id="location_user">
                            <span class="text-danger">กรุณาเปิดตำแหน่งที่ตั้ง</span>
                            <span class="text-danger float-right notranslate" onclick="window.location.href = window.location.href;"><i class="fas fa-sync-alt"></i> refresh</span>
                        </p>
                    </div>
                    <div class="col-12">
                        <a id="a_help" class="btn btn-warning btn-block shadow-box  d-none text-center" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-bullhorn"></i> <b>ขอความช่วยเหลือ </b>
                            <br>
                            <b><span class="notranslate" id="area_help"></span></b>
                        </a>
                        <a id="btn_quick_help" class="btn btn-warning btn-block shadow-box " onclick="police();">
                            <i class="fas fa-bullhorn"></i> <b>ขอความช่วยเหลือด่วน</b>
                        </a>
                    </div> 
                </div>
            </div>

        <div class="col-12 card shadow" style="margin-top:-35px;">
            <div class="row d-none">
                <div id="div_goto" class="col-12 d-none">
                    <br>
                    <a id="btn_contact_insurance" class="btn btn-info btn-block shadow-box text-white" onclick="contact_insurance();">
                        <i class="fas fa-hands-helping"></i> ติดต่อประกัน
                    </a>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">เหตุด่วนเหตุร้าย</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="police();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">จ.ส.100</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="js100();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1137</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">หน่วยแพทย์กู้ชีวิต</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="life_saving();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1669</a>
                </div>
                <div class="col-6 ">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ป่อเต็กตึ๊ง</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="pok_tek_tung();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1418</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">สายด่วนทางหลวง</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="highway();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1193</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ทนายอาสา</p>
                    <a class="btn btn-danger btn-block shadow-box text-white" onclick="lawyers();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1167</a>
                </div>

               
            </div> <br>
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            @if(!empty($user))
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">สวัสดีคุณ <b style="color:blue;" id="text_name">{{ $user->name }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
              </div>
              <div class="modal-body text-center">
                <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}">
                <br><br>
                โปรดยืนยันหมายเลขโทรศัพท์ของคุณ
                <br>
                <input type="hidden" name="" id="input_phone_url" value="{{ url()->full() }}">
                <div style="margin-top:10px;">
                    <b>
                        <span style="font-size:22px;color: blue;" id="text_phone">
                            @if(!empty($user->phone)){{ $user->phone }}@endif
                        </span>
                        @if(!empty($user->phone))
                            <i style="font-size:25px;" class="fas fa-edit" onclick="document.querySelector('#input_phone').classList.remove('d-none');"></i>
                        @endif
                    </b>
                </div>
                
                @if(!empty($user->phone))
                    <!-- <span style="font-size:22px;" id="not_empty_phone">{{ $user->phone }}</span> -->
                    <input style="margin-top:15px;" class="form-control d-none text-center"  type="phone" id="input_phone" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์"  oninput="edit_phone();">
                @endif

                @if(empty($user->phone))
                    <input style="margin-top:15px;" class="form-control text-center"  type="phone" id="input_not_phone" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone();">
                @endif

                <hr>
                <div class="row">
                    <div class="col-12">
                        <h6 style="margin-top:8px;" class="control-label float-left" data-toggle="collapse" data-target="#div_photo" aria-expanded="false" aria-controls="div_photo" >
                            ถ่ายภาพเพื่อระบุตำแหน่งที่ชัดเจน &nbsp;&nbsp;
                            <i style="font-size: 20px" class="fas fa-arrow-alt-circle-down  text-info"></i>
                        </h6>
                        <div class="collapse" id="div_photo">
                            <br><br>
                            <img style="filter: backscale(50%);" width="100%" src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}">
                            <p style="position:absolute;top: 220px;right: 85px;color: #ffffff;">
                                <i class="fas fa-info-circle text-danger"></i> 
                                <b>ตัวอย่างการถ่ายภาพ</b>
                            </p>
                            <br>
                            <div class="col-12" id="div_cam">
                                <div class="d-flex justify-content-center bg-light"> 
                                   
                                    <video width="100%" height="100%" autoplay="true" id="videoElement"></video>

                                    <a class="align-self-end text-white btn-primary btn-circle" style="position: absolute; margin-bottom:10px" onclick="capture();"><i class="fas fa-camera"></i></a>
                                </div>
                            </div>
                            <input type="hidden" name="" id="text_img">
                            <div id="show_img" class="d-none">
                                <canvas class=""  id="canvas" width="250" height="100"></canvas>
                                <img class="" src="" width="250" height="100" id="photo2">
                            </div>
                        </div>
                        <div class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                            <input class="form-control" name="photo" type="text" id="photo" value="{{ isset($sos_map->photo) ? $sos_map->photo : '' }}" >
                            {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <!-- @if(!empty($user->phone))
                    <button type="button" class="btn btn-secondary" onclick="
                        document.querySelector('#input_phone').classList.remove('d-none');">
                        แก้ไข
                    </button>
                @endif

                @if(empty($user->phone))
                    <button type="button" class="btn btn-secondary" onclick="
                        document.querySelector('#input_not_phone').classList.remove('d-none');">
                        แก้ไข
                    </button>
                @endif -->
                

                <button type="button" class="btn btn-primary" onclick="confirm_phone();">ยืนยัน</button>
              </div>
            @endif
            </div>
          </div>
        </div>
    </div>
</div>
<br><br>
<input type="hidden" id="text_sos" name="" value="{{ $text_sos }}">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    #map {
      height: calc(45vh);
    }
    
</style>
<script src="{{ asset('js/sos_map.js')}}"></script>

<script>

    var result_area ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        fetch("{{ url('/') }}/api/sos_map/all_area")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                result_area = result ;

                if (typeof result_area !== "undefined") {
                    // console.log(result_area)
                    getLocation();
                }
        });

        let phone = document.querySelector('#phone').value ;

        if (phone === "") {

            let input_phone_url = document.querySelector('#input_phone_url').value ;
            let phone_url_sp = input_phone_url.split("=");

                if (phone_url_sp[1]) {
                    document.querySelector('#phone').value = phone_url_sp[1] ;
                    document.querySelector('#text_phone').innerHTML = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').value = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').classList.add('d-none') ;
                } 
        }

        

    });

    function contact_insurance(){

        let latlng = document.querySelector("#latlng").value;
        let div_goto = document.querySelector("#div_goto");
        
        let a = document.createElement("a");
        let href = document.createAttribute("href");
            href.value = "{{ url('/sos_insurance_blade') }}?latlng="+latlng;

        let id = document.createAttribute("id");
            id.value = "goto_sos_insurance";

        a.setAttributeNode(href); 
        a.setAttributeNode(id); 

        div_goto.appendChild(a);  

        document.querySelector("#goto_sos_insurance").click();
    }    

    function capture_registration(){
        document.querySelector('#div_photo_registration').classList.remove('d-none');

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
