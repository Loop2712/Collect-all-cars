<div class="container">
    <div class="row">
        <!-- ข้อมูลรถที่ต้องการติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถที่ต้องการติดต่อ / Vehicle information'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'ข้อความ / Message' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('massengbox') ? 'has-error' : ''}}">
                        <select name="massengbox" class="form-control"  id="massengbox" required onchange="if(this.value=='6'){ 
                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                document.querySelector('#masseng').focus();
                            }else{ 
                                document.querySelector('#masseng_label').classList.add('d-none'),
                                document.querySelector('#masseng_input').classList.add('d-none')
                            }
                            if (this.value=='4') {
                                document.querySelector('#photo_label').classList.remove('d-none'),
                                document.querySelector('#photo_input').classList.remove('d-none'),
                                add_required_photo(),
                                document.querySelector('#photo').focus();
                            }else{ 
                                document.querySelector('#photo_label').classList.add('d-none'),
                                document.querySelector('#photo_input').classList.add('d-none'),
                                remove_required_photo();
                            }
                            if (this.value=='5') {
                                document.querySelector('#report_drivingd_detail_label').classList.remove('d-none'),
                                document.querySelector('#report_drivingd_detail_input').classList.remove('d-none'),
                                remove_required_photo(),
                                document.querySelector('#report_drivingd_detail').focus();
                            }else{ 
                                document.querySelector('#report_drivingd_detail_label').classList.add('d-none'),
                                document.querySelector('#report_drivingd_detail_input').classList.add('d-none')
                            }">
                             <option value="" selected >
                                 - เลือกข้อความ / Select text - 
                             </option>  
                        @foreach (json_decode('{
                        "1":"กรุณาเลื่อนรถด้วยค่ะ / Please move the car",
                        "2":"รถคุณเปิดไฟค้างไว้ค่ะ / The lights are on",
                        "3":"มีเด็กอยู่ในรถค่ะ / Children in car",
                        "4":"รถคุณเกิดอุบัติเหตุค่ะ / Car Accident",
                        "5":"แจ้งปัญหาการขับขี่ / Driving Problems"}',
                         true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"  {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>
                    <br>
                </div>
                
                <div class="col-12 col-md-2">
                    <!-- ข้อความอื่นๆ -->
                    <label id="masseng_label" for="masseng" class="d-none control-label">{{ 'ข้อความอื่นๆ / Other messages' }}</label>
                    <!-- รูปภาพ -->
                    <label id="photo_label" for="photo" class="d-none control-label">{{ 'รูปภาพ / Photo' }}</label>
                    <!-- รายละเอียดปัญหาการขับขี่ -->
                    <label id="report_drivingd_detail_label" for="photo" class="d-none control-label">{{ 'ปัญหาการขับขี่ / Driving problems' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <!-- ข้อความอื่นๆ -->
                    <div id="masseng_input" class="d-none form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
                        <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}">
                        {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
                    </div>
                    <!-- รูปภาพ -->
                    <div id="photo_input" class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($guest->photo) ? $guest->photo : ''}}" accept="image/*" multiple="multiple">
                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                    </div>
                    <!-- รายละเอียดปัญหาการขับขี่ -->
                    <div id="report_drivingd_detail_input" class="d-none form-group {{ $errors->has('report_drivingd_detail') ? 'has-error' : ''}}">
                        <select name="report_drivingd_detail" class="form-control"  id="report_drivingd_detail">
                            @foreach (json_decode('{
                            "ขับรถอันตราย":"ขับรถอันตราย / Dangerous driving",
                            "ไม่เปิดไฟเลี้ยว":"ไม่เปิดไฟเลี้ยว / Does not turn on the turn signal",
                            "หยุดรถกะทันหัน":"หยุดรถกะทันหัน / Stop the car suddenly",
                            "เล่นโทรศัพท์ขณะขับขี่":"เล่นโทรศัพท์ขณะขับขี่ / Playing phone while driving",
                            "จอดตรงที่ห้ามจอด":"จอดตรงที่ห้ามจอด / Park where parking is prohibited"}',
                             true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"  {{ (isset($guest->report_drivingd_detail) && $guest->report_drivingd_detail == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('report_drivingd_detail', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <!-- ถ่ายภาพป้ายทะเบียน -->
                <div id="div_photo_registration" class="d-none">
                    <div class="col-12">
                        <div id="container">
                            <video width="100%" height="300" autoplay="true" id="videoElement"></video>
                        </div>

                        <img style="position: absolute; z-index: 5;top: 0px;right: 0px;"  src="{{ asset('/img/more/testtest.png') }}" width="100%" height="300">

                        <a style="position: relative; z-index: 6;top: -280px;right: -225px;" class="btn btn-sm btn-primary" onclick="stop();">X</a>

                        <a style="position: relative; z-index: 6;top: -60px;right: -55px;" class="btn btn-sm btn-primary" onclick="capture();"><i class="fas fa-camera"></i> ถ่ายภาพ</a>
                    </div>
                    <div class="col-12">
                        <input type="text" name="" id="text_img">
                        <canvas style="background-color: red;" id="canvas" width="250" height="100"></canvas>
                        <img src="" width="250" height="100" id="photo2">
                    </div>
                </div>
                
                <!-- สิ้นสุดถ่ายภาพป้ายทะเบียน -->

                <div class="col-12 col-md-2">
                    <label for="registration" class="control-label">{{ 'ทะเบียนรถ / Car Registration number' }}</label><span style="color: #FF0033;"> *</span>
                </div>

                <div class="col-12 col-md-4">
                  <label class="sr-only" for="inlineFormInputGroupUsername">เช่น กก9999 / Ex. กก9999</label>
                  <div class="input-group">
                    <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required onchange="check_registration()">
                        {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
                    <div class="input-group-prepend" onclick="">
                      <div class="input-group-text"><i class="fas fa-camera"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-2">
                    <label for="county" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of Vehicle registration' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('county') ? 'has-error' : ''}}">
                        <select name="county" id="county" class="form-control" required onchange="add_reg_id();">
                                <option value="" selected > - กรุณาเลือกจังหวัด / Select province - </option> 
                                <!-- @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach    -->                                  
                        </select>
                        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="d-none form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                <label for="brand" class="control-label">{{ 'brand' }}</label>
                <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($guest->brand) ? $guest->brand : ''}}" >
                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลผู้ติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ท่านต้องการที่จะแสดงเบอร์ของท่านหรือไม่'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br>
            <!-- <input type="radio" name="show_phone" onclick="document.querySelector('#name').classList.remove('d-none'),
            document.querySelector('#name_input').classList.remove('d-none'),
            document.querySelector('#phone').classList.remove('d-none'),
            document.querySelector('#phone_input').classList.remove('d-none')">
            &nbsp;&nbsp;&nbsp;แสดง / Show&nbsp;&nbsp;&nbsp; -->
            <!-- <br> -->
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="phone" id="phone" class="control-label">{{ 'เบอร์โทร / Phone number' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone" type="tel" id="phone_input" value="{{ isset($guest->phone) ? $guest->phone : Auth::user()->phone}}" placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}" required>
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="d-none col-12 col-md-2">
                    <label for="name" id="name" class="d-none control-label">{{ 'ชื่อ / Name' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="name" type="hidden" id="name_input" value="{{ isset($guest->name) ? $guest->name : Auth::user()->name}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <input type="radio" name="phonephone" checked class="d-none" id="show_phone_check">
            <span class="d-none" id="p_phone">&nbsp;&nbsp;&nbsp;แสดง / Show</span>
            <input type="radio" name="phonephone" class="d-none" id="not_show_phone_check">
            <span class="d-none" id="pnot_phone">&nbsp;&nbsp;&nbsp;ไม่แสดง / Do not show</span>

            <input type="checkbox" name="checkbox" onchange="if(this.checked){
                not_show_phone();
                document.getElementById('not_show_phone_check').click(); 
            }else{
                show_phone();
                document.getElementById('show_phone_check').click(); 
            }">&nbsp;&nbsp;&nbsp;ไม่แสดง / Do not show

            <br>

            <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : Auth::user()->provider_id}}" readonly>
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('register_car_id') ? 'has-error' : ''}}">
                <input class="form-control" name="register_car_id" type="hidden" id="register_car_id" value="{{ isset($register_car->register_car_id) ? $register_car->register_car_id : ''}}" required readonly>
                {!! $errors->first('register_car_id', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
                <input class="form-control" name="organization" type="hidden" id="organization" value="{{ isset($register_car->organization) ? $register_car->organization : ''}}" required readonly>
                {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
    </div>
</div>

<div class="form-group">
    <input class="d-none btn btn-primary" id="submit_form" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>

<!-- ไม่มีในระบบ -->
<!-- Button trigger modal -->
<button id="btn_not_system" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#not_system">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="not_system" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/cry.png') }}">
            <br><br>
            <h5 class="text-danger">รถหมายเลขทะเบียนนี้ไม่มีในระบบค่ะ</h5>
            <p style="line-height: 2;">กรุณาตรวจสอบใหม่อีกครั้งค่ะ</p>
            <h5 class="text-danger">This car registration number is not in the system.</h5>
            <p style="line-height: 2;">Please check and try again.</p>
            <br>
        </center>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- ซ้ำ -->
<!-- Button trigger modal -->
<button id="btn_repeatedly" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#repeatedly">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="repeatedly" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/nono.png') }}">
            <br><br>
            <h5 class="text-danger">ท่านแจ้งเตือนไปยังเจ้าของรถคันนี้แล้ว</h5>
            <p style="line-height: 2;">โปรดรออย่างน้อย 5 นาทีค่ะ</p>
            <h5 class="text-danger">You have already sent the message to the car owner.</h5>
            <p style="line-height: 2;">Please wait at least 5 mins Thank you.</p>
        </center>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // capture_registration();
    });
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
        var context = canvas.getContext('2d');

        context.drawImage(video, 30, 200, 500, 255, 0, 0, 250, 100);
        photo2.setAttribute('src',canvas.toDataURL('image/png'));
        text_img.value = canvas.toDataURL('image/png');

    }

    function check_registration(){
        let registration = document.querySelector("#registration");
        //PARAMETERS
        fetch("{{ url('/') }}/api/check_registration/"+registration.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
            for(let item of result){
                var registration_car = item.registration_number;
                // console.log(registration_car);
            }

            if (registration_car == null ) {
                // console.log("null");
                document.querySelector('#submit_form').classList.add('d-none');
                // alert("รถหมายเลขทะเบียนนี้ไม่มีในระบบ");
                document.getElementById("btn_not_system").click();
                let registration_reset = document.querySelector("#registration");
                    registration_reset.value = "";
                document.querySelector('#registration').focus();
            }else{ 
                // console.log("Yess");
                document.querySelector('#submit_form').classList.remove('d-none');
                document.querySelector('#county').focus();
            }

                check_province();
            });
            return registration.value;
    }

    function check_province(){
        let registration = document.querySelector("#registration");
        //PARAMETERS
        fetch("{{ url('/') }}/api/check_registration/"+registration.value+"/province")
            .then(response => response.json())
            .then(result => {
                // console.log(result.length);
                //UPDATE SELECT OPTION
                if (result.length == 1 ) {
                    let county = document.querySelector("#county");
                    county.innerHTML = "";

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.province;
                        option.value = item.province;
                        county.add(option);                
                    }
                }else{ 
                    let option = document.createElement("option");
                    option.text = "- กรุณาเลือกจังหวัด / Select province -";
                    option.value = "- กรุณาเลือกจังหวัด / Select province -";
                    
                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.province;
                        option.value = item.province;
                        county.add(option);                
                    }
                }
                
                check_time();
                add_reg_id();
            });
    }

    function check_time(){
        let registration = document.querySelector("#registration");
        let county = document.querySelector("#county");
        let user_id = document.querySelector("#user_id");
        // console.log(registration.value);
        // console.log(county.value);
        // console.log(user_id.value);
        //PARAMETERS
        fetch("{{ url('/') }}/api/check_time/" + registration.value + "/" + county.value + "/" + user_id.value)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (result == "No" ) {
                    document.querySelector('#submit_form').classList.remove('d-none');
                }else if (result == "Yes" ){ 
                    // alert("ซ้ำ");
                    document.getElementById("btn_repeatedly").click();
                    document.querySelector('#submit_form').classList.add('d-none');
                    let registration_reset = document.querySelector("#registration");
                        registration_reset.value = "";
                    let county_reset = document.querySelector("#county");
                        county_reset.value = "";
                }

            
            });
    }

    function show_phone(){
        console.log("show_phone"); 

        var name = document.querySelector('#name');
            name.classList.remove('d-none');

        var name_input = document.querySelector('#name_input');
            name_input.classList.remove('d-none');

        var phone = document.querySelector('#phone');
            phone.classList.remove('d-none');

        var phone_input = document.querySelector('#phone_input');
        var att = document.createAttribute('required'); 
            phone_input.setAttributeNode(att);
            phone_input.classList.remove('d-none');
            phone_input.value = '{{ isset($guest->phone) ? $guest->phone : Auth::user()->phone}}';

    }

    function not_show_phone(){
        console.log("not_show_phone"); 

        var name = document.querySelector('#name');
            name.classList.add('d-none');

        var name_input = document.querySelector('#name_input');
            name_input.classList.add('d-none');

        var phone = document.querySelector('#phone');
            phone.classList.add('d-none');

        var phone_input = document.querySelector('#phone_input');
            phone_input.removeAttribute('value');
            phone_input.removeAttribute('required');
            phone_input.classList.add('d-none');
            

    }
    function add_required_photo(){ 

        var photo = document.querySelector('#photo');
        photo.setAttributeNode(document.createAttribute('required'));


    }
    function remove_required_photo(){ 

        var photo = document.querySelector('#photo');

        photo.removeAttribute('required');

    }

    function add_reg_id(){
        let registration = document.querySelector("#registration");
        let county = document.querySelector("#county");
        // console.log(registration.value);
        // console.log(county.value);
        let register_car_id = document.querySelector("#register_car_id");
        let organization = document.querySelector("#organization");
        //PARAMETERS
        fetch("{{ url('/') }}/api/add_reg_id/"+registration.value+"/"+county.value)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                for(let item of result){
                    register_car_id.value = item.id;
                    organization.value = item.juristicNameTH;
                    // console.log(registration_car);
                }
                
            });
    }

</script>