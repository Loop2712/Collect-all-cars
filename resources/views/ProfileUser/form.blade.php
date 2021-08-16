
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button style="width: 30%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger d-none d-lg-block">ข้อมูลพื้นฐาน</button>
                <button style="width: 60%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger d-block d-md-none">ข้อมูลพื้นฐาน</button>
                <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label  class="control-label"><b>{{ 'รูปภาพโปรไฟล์' }}</b></label>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                            <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($data->photo) ? $data->photo : ''}}" accept="image/*" multiple="multiple" onchange="document.querySelector('#img_profile_old').classList.add('d-none');">
                                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            <div id="img_profile_old" class="">
                                @if(!empty($data->avatar) and empty($data->photo))
                                    <img style="border-radius: 50%;" width="300" src="{{ $data->avatar }}" class="img-circle img-thumbnail isTooltip">
                                @endif
                                @if(!empty($data->photo))
                                    <img style="border-radius: 50%;" width="300" src="{{ url('storage')}}/{{ $data->photo }}" class="img-circle img-thumbnail isTooltip">
                                @endif
                                @if(empty($data->avatar) and empty($data->photo))
                                    <img style="border-radius: 50%;" width="300" src="{{ url('/img/icon/user.png') }}" class="img-circle img-thumbnail isTooltip">
                                @endif
                            </div>
                            
                            <div id="img_profile_new"></div>
                        </center>
                            
                    </div>

                    <div class="col-12 col-md-6">
                        <br class="d-block d-md-none">
                        <label for="massengbox" class="control-label"><b>{{ 'ชื่อ' }}</b></label><span style="color: #FF0033;"> *</span>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <input class="form-control" name="name" type="text" id="name" value="{{ isset($data->name) ? $data->name : ''}}" >
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'วันเกิด' }}</b></label>
                        <div class="form-group {{ $errors->has('brith') ? 'has-error' : ''}}">
                            <input class="form-control" name="brith" type="date" id="brith" value="{{ isset($data->brith) ? $data->brith : ''}}" >
                                    {!! $errors->first('brith', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'เพศ' }}</b></label>
                        <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                            <select name="sex" class="form-control"  id="sex" onchange="if(this.value=='3'){ 
                                    document.querySelector('#masseng_label').classList.remove('d-none'),
                                    document.querySelector('#masseng_input').classList.remove('d-none'),
                                    document.querySelector('#masseng').focus();
                                }else{ 
                                    document.querySelector('#masseng_label').classList.add('d-none'),
                                    document.querySelector('#masseng_input').classList.add('d-none')
                                }">
                                <option value="" selected >
                                     - โปรดเลือก - 
                                </option>  
                                @foreach (json_decode('{"ผู้ชาย":"ผู้ชาย","ผู้หญิง":"ผู้หญิง","ไม่ต้องการตอบ":"ไม่ต้องการตอบ"}', true) as $optionKey => $optionValue)
                                    <option  ption value="{{ $optionKey }}"  {{ (isset($data->sex) && $data->sex == $optionKey) ? 'selected' : ''}}>    {{ $optionValue }}
                                    </option>
                                @endforeach
                            </select>
                            {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'อีเมล' }}</b></label>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}" >
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'เบอร์โทรศัพท์' }}</b></label>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>

    <!-- ใบขับขี่คอม -->
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-12">
                <button style="width: 30%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger ">ใบอนุญาตขับขี่</button>
                <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="control-label"><b>{{ 'รถยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license') ? 'has-error' : ''}}">
                            <input class="form-control" name="driver_license" type="file" id="driver_license" value="{{ isset($data->driver_license) ? $data->driver_license : ''}}" onchange="document.querySelector('#driver_license_old').classList.add('d-none');">
                            {!! $errors->first('driver_license', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            <div id="driver_license_old" class="">
                                <img width="250" src="{{ url('storage')}}/{{ $data->driver_license }}">
                            </div>
                            <div id="driver_license_new"></div>
                        </center>
                        <br>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="control-label"><b>{{ 'รถจักยานยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
                            <input class="form-control" name="driver_license2" type="file" id="driver_license2" value="{{ isset($data->driver_license2) ? $data->driver_license2 : ''}}" onchange="document.querySelector('#driver_license2_old').classList.add('d-none');">
                            {!! $errors->first('driver_license2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            <div id="driver_license2_old" class="">
                                <img width="250" src="{{ url('storage')}}/{{ $data->driver_license2 }}">
                            </div>
                            <div id="driver_license2_new"></div>
                        </center>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ใบขับขี่มือถือ -->
    <div class="container d-block d-md-none">
        <div class="row">
            <div class="col-12">
                <button style="width: 60%;border-radius: 100px 0px 100px 0px;"  class="btn btn-danger">ใบอนุญาตขับขี่</button>
                <hr style="margin-top: 0px;height:0.1px;width: 96%;border-color: red;">
                <div class="row">
                    <div class="col-12">
                        <label class="control-label"><b>{{ 'รถยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license') ? 'has-error' : ''}}">
                            <center>
                                <button id="btn_click_capture" type="button" class="btn btn-sm btn-outline-info main-shadow main-radius" onclick="
                                document.querySelector('#driver_license_capture').classList.remove('d-none'),
                                document.querySelector('#btn_click_capture').classList.add('d-none'),
                                capture_driver_license();">
                                    <i class="fas fa-camera"></i> ถ่ายรูป
                                </button>
                            </center>
                            <br>
                            <div id="driver_license_capture" class="d-none">
                                <center>
                                    <div id="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-end bg-light"> 
                                                    <a style="position: absolute; z-index:10; margin-right:10px" class="text-white" onclick="stop();"> <b>X</b> </a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center bg-light">

                                                    <video width="100%" height="100%" autoplay="true" id="video_driver_license"></video>
                                                    
                                                    <img class="align-self-center" style="position: absolute;margin-top: -100px;" width="76%" height="43%" src="{{ asset('/img/icon/16.png') }}">

                                                    <ul class="ul-dot align-self-center" style=" position: absolute;margin-top: 130px;padding-right: 20px;padding-left: 25px;">
                                                       <span style="color:#ffff;">ข้อแนะนำ  </span> 
                                                        <li class="li-dot">หลีกเลี่ยงแสงสะท้อน ไม่มืดหรือสว่างเกินไป</li>
                                                        <li class="li-dot">รูปไม่เบลอ เห็นตัวอักษรชัดเจน</li>
                                                    </ul>
                                                    <a class="align-self-end text-white btn-primary btn-circle" style="position: absolute; margin-bottom:10px" onclick="capture();"><i class="fas fa-camera"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <script>
                            function capture_driver_license(){

                                var video = document.querySelector("#video_driver_license");
                                var photo_car = document.querySelector("#photo_car");
                                var canvas_car = document.querySelector("#canvas_car");
                                var text_img_car = document.querySelector("#text_img_car");
                                var context_car = canvas_car.getContext('2d');

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

                            function stop(e) {
                                document.querySelector("#driver_license_capture").classList.add('d-none');
                                document.querySelector("#btn_click_capture").classList.remove('d-none');

                                var video = document.querySelector("#video_driver_license");
                                var photo_car = document.querySelector("#photo_car");
                                var canvas_car = document.querySelector("#canvas_car");
                                var text_img_car = document.querySelector("#text_img_car");
                                var context_car = canvas_car.getContext('2d');
                                  
                                  var stream = video.srcObject;
                                  var tracks = stream.getTracks();

                                  for (var i = 0; i < tracks.length; i++) {
                                    var track = tracks[i];
                                    track.stop();
                                  }

                                  video.srcObject = null;
                            }

                            function capture() {
                                document.querySelector("#driver_license_old_mobile").classList.add('d-none');
                                document.querySelector("#driver_license_new_mobile").classList.remove('d-none');

                                var video = document.querySelector("#video_driver_license");
                                var photo_car = document.querySelector("#photo_car");
                                var canvas_car = document.querySelector("#canvas_car");
                                var text_img_car = document.querySelector("#text_img_car");
                                var context_car = canvas_car.getContext('2d');

                                context_car.drawImage(video, 10, 10, 380, 170, 0, 0, 250, 150);
                                photo_car.setAttribute('src',canvas_car.toDataURL('image/png'));
                                text_img_car.value = canvas_car.toDataURL('image/png');

                                // fetch("{{ url('/') }}/api/img_register", {
                                //     method: 'post',
                                //     body: JSON.stringify(text_img.value),
                                //     headers: {
                                //         'Content-Type': 'application/json'
                                //     }
                                // }).then(function (response){
                                //     return response.text();
                                // }).then(function(text){
                                //     console.log(text);
                                // }).catch(function(error){
                                //     console.error(error);
                                // });

                                var stream = video.srcObject;
                                    var tracks = stream.getTracks();

                                    for (var i = 0; i < tracks.length; i++) {
                                        var track = tracks[i];
                                        track.stop();
                                    }

                                    video.srcObject = null;
                                document.querySelector('#driver_license_capture').classList.add('d-none');
                                document.querySelector("#btn_click_capture").classList.remove('d-none');
                            }
                        </script>
                        <center>
                            <div id="driver_license_old_mobile" class="">
                                <!-- รูปตัวอย่าง -->
                                <img width="250" height="150" src="{{ url('storage')}}/{{ $data->driver_license }}">
                            </div>
                            <div id="driver_license_new_mobile" class="d-none">
                                <div class="col-12">
                                    <input type="hidden" name="" id="text_img_car">
                                    <canvas id="canvas_car" width="250" height="150" class="d-none"></canvas>
                                    <img src="" width="250" height="150" id="photo_car">
                                </div>
                            </div>
                        </center>
                        <br>
                    <hr>
                    <div class="col-12">
                        <label class="control-label"><b>{{ 'รถจักยานยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
                            <center>
                                <button type="button" class="btn btn-sm btn-outline-info main-shadow main-radius" onclick="document.querySelector('#driver_license2_capture').classList.remove('d-none');">
                                    <i class="fas fa-camera"></i> ถ่ายรูป
                                </button>
                            </center>
                            <br>
                            <div id="driver_license2_capture" class="d-none">
                                <center>
                                    <img width="250" src="{{ url('storage')}}/{{ $data->driver_license }}">
                                </center>
                            </div>
                        </div>
                        <!-- รูปตัวอย่าง -->
                        <center>
                            <img width="250" src="{{ url('storage')}}/{{ $data->driver_license2 }}">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group float-left">
                    <br>
                    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'ส่งข้อมูล' }}">
                </div>
            </div>
            <div class="col-6">
                <div class="float-right">
                    <br>
                    <a href="{{ url('/profile') }}" class="btn btn-warning text-white" title="Back">
                        กลับ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        add_color();
        
    });
    function add_color(){
        // console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }

</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#photo").change(function () {
            var img_profile_new = $("#img_profile_new");
            img_profile_new.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var divImagePreview = $("<div/>");

                    var hiddenRotation = $("<input type='hidden' id='hfRotation' value='0' />");
                    divImagePreview.append(hiddenRotation);

                    var img = $("<img />");
                    img.attr("style", "border-radius: 50%;");
                    img.attr("class", "img-circle img-thumbnail isTooltip");
                    img.attr("width", "300");
                    img.attr("src", e.target.result);
                    divImagePreview.append(img);

                    img_profile_new.append(divImagePreview);
                }
                reader.readAsDataURL(file[0]);
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#driver_license").change(function () {
            var driver_license_new = $("#driver_license_new");
            driver_license_new.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var divImagePreview = $("<div/>");

                    var hiddenRotation = $("<input type='hidden' id='hfRotation' value='0' />");
                    divImagePreview.append(hiddenRotation);

                    var img = $("<img />");
                    img.attr("width", "250");
                    img.attr("src", e.target.result);
                    divImagePreview.append(img);

                    driver_license_new.append(divImagePreview);
                }
                reader.readAsDataURL(file[0]);
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#driver_license2").change(function () {
            var driver_license2_new = $("#driver_license2_new");
            driver_license2_new.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var divImagePreview = $("<div/>");

                    var hiddenRotation = $("<input type='hidden' id='hfRotation' value='0' />");
                    divImagePreview.append(hiddenRotation);

                    var img = $("<img />");
                    img.attr("width", "250");
                    img.attr("src", e.target.result);
                    divImagePreview.append(img);

                    driver_license2_new.append(divImagePreview);
                }
                reader.readAsDataURL(file[0]);
            });
        });
    });
</script>
