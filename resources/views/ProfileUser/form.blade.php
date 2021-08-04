<div class="container">
    <div class="row">
        </body>
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลพื้นฐาน'}}</b></span>
          
          <br><br>
          <div class="row">
                <div class="col-12 col-md-2">
                    <label  class="control-label"><b>{{ 'รูปภาพ' }}</b></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($data->photo) ? $data->photo : ''}}" accept="image/*" multiple="multiple">
                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'ชื่อผู้ใช้' }}</b></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                    <input class="form-control" name="username" type="text" id="username" value="{{ isset($data->username) ? $data->username : ''}}" >
                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'ชื่อ' }}</b></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <input class="form-control" name="name" type="text" id="name" value="{{ isset($data->name) ? $data->name : ''}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'วันเกิด' }}</b></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('brith') ? 'has-error' : ''}}">
                    <input class="form-control" name="brith" type="date" id="brith" value="{{ isset($data->brith) ? $data->brith : ''}}" >
                        {!! $errors->first('brith', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'เพศ' }}</b></label></label>
                </div>
                <div class="col-12 col-md-4">
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
                            <option  ption value="{{ $optionKey }}"  {{ (isset($data->sex) && $data->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>  
                </div>
            </div>
            </div>
            
            <div class="col-12">
            <br><br>
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลติดต่อ'}}</b></span>
          
          <br><br>
           
          
        
        

        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'อีเมล' }}</b></label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}" >
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'โทรศัพท์' }}</b></label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                    <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-md-2">
                <label for="massengbox" class="control-label">
                    <b>{{ 'ใบอนุญาตขับรถ' }}</b><br>
                    <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>
                </label>
            </div>
            <div class="col-12 col-md-4">
                <span style="font-size: 15px;">รถยนต์</span><br>
                <div class="form-group {{ $errors->has('driver_license') ? 'has-error' : ''}}">
                <input class="form-control" name="driver_license" type="file" id="driver_license" value="{{ isset($data->driver_license) ? $data->driver_license : ''}}" >
                    {!! $errors->first('driver_license', '<p class="help-block">:message</p>') !!}
                </div>
                <br>
                <span style="font-size: 15px;">รถจักยานยนต์</span><br>
                <div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
                <input class="form-control" name="driver_license2" type="file" id="driver_license2" value="{{ isset($data->driver_license2) ? $data->driver_license2 : ''}}" >
                    {!! $errors->first('driver_license2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <hr>

    </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-6">
            <div class="form-group float-left">
                <br>
                <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
            </div>
        </div>
        <div class="col-6">
            <div class="float-right">
                <br>
                <a href="{{ url('/profile') }}" class="btn btn-warning btn-sm" title="Back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ----------------------------------------------------------------- -->
<a onclick="capture_registration();">กด</a>

<input class="form-control" name="photo" type="file" id="photo_canvas" value="">

<div id="div_photo_registration" class="d-none">
    <div class="d-block d-md-none">
        <div class="col-12">
            <div id="container">
                <div class="row">
                    <div class="col-12">
                            <canvas style="background-color: none; position: absolute;border-color: red;border-width: 2px;border-style: solid;top:30%;left: 10%;" width="220" height="120"></canvas>
                        <video width="100%" height="100%" autoplay="true" id="videoElement"></video>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <center>
                <div id="div_videoSource" class="select">
                    <label for="videoSource">เลือกกล้อง</label>
                    <select id="videoSource"></select>
                </div>
                <br>
                <a class="btn btn-sm btn-primary text-white" onclick="capture();"><i class="fas fa-camera"></i> ถ่ายภาพ</a>
                <a class="btn btn-sm btn-primary text-white" onclick="stop();">X</a>
            </center>
        </div>
        
        <div class="col-12">
            <input type="text" name="" id="text_img">
            <canvas id="canvas" width="250" height="100"></canvas>
            <img src="" width="250" height="100" id="photo2">
        </div>
    </div>
</div>
    <!-- <a id="dl_img" href="" download>ดาวน์โหลด</a> -->
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

    function capture_registration(){
        document.querySelector('#div_photo_registration').classList.remove('d-none');

        var video = document.querySelector("#videoElement");
        var photo2 = document.querySelector("#photo2");
        var canvas = document.querySelector("#canvas");
        var text_img = document.querySelector("#text_img");
        var context = canvas.getContext('2d');

        if (navigator.mediaDevices.getUserMedia) {
          navigator.mediaDevices.getUserMedia({ video: true })
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
        document.querySelector('#div_photo_registration').classList.add('d-none');
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

    function capture() {
        var video = document.querySelector("#videoElement");
        var photo2 = document.querySelector("#photo2");
        var canvas = document.querySelector("#canvas");
        var text_img = document.querySelector("#text_img");
        var photo_canvas = document.querySelector("#photo_canvas");
        var context = canvas.getContext('2d');

        context.drawImage(video, 30, 200, 500, 255, 0, 0, 250, 100);
        photo2.setAttribute('src',canvas.toDataURL('image/png'));
        text_img.value = canvas.toDataURL('image/png');
        
        // var dl_img = document.getElementById("dl_img");
        //     var att = document.createAttribute("href");
        //     att.value = text_img.value;
        //     dl_img.setAttributeNode(att);

    }

    const videoElement = document.querySelector('video');
    const videoSelect = document.querySelector('select#videoSource');
    const selectors = [videoSelect];

    function gotDevices(deviceInfos) {
      // Handles being called several times to update labels. Preserve values.
      const values = selectors.map(select => select.value);
      selectors.forEach(select => {
        while (select.firstChild) {
          select.removeChild(select.firstChild);
        }
      });
      for (let i = 0; i !== deviceInfos.length; ++i) {
        const deviceInfo = deviceInfos[i];
        const option = document.createElement('option');
        option.value = deviceInfo.deviceId;
        if (deviceInfo.kind === 'videoinput') {
          option.text = deviceInfo.label || `camera ${videoSelect.length + 1}`;
          videoSelect.appendChild(option);
        } else {
          console.log('Some other kind of source/device: ', deviceInfo);
        }
      }
      selectors.forEach((select, selectorIndex) => {
        if (Array.prototype.slice.call(select.childNodes).some(n => n.value === values[selectorIndex])) {
          select.value = values[selectorIndex];
        }
      });
    }

    navigator.mediaDevices.enumerateDevices().then(gotDevices).catch(handleError);


    function gotStream(stream) {
      window.stream = stream; // make stream available to console
      videoElement.srcObject = stream;
      // Refresh button list in case labels have become available
      return navigator.mediaDevices.enumerateDevices();
    }

    function handleError(error) {
      console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
    }

    function start() {
      if (window.stream) {
        window.stream.getTracks().forEach(track => {
          track.stop();
        });
      }
      const videoSource = videoSelect.value;
      const constraints = {
        video: {deviceId: videoSource ? {exact: videoSource} : undefined}
      };
      navigator.mediaDevices.getUserMedia(constraints).then(gotStream).then(gotDevices).catch(handleError);
    }


    videoSelect.onchange = start;

</script>
