
@if(Auth::user()->id == '1' || Auth::user()->id == '2')
<div style="display:none;">
@else
<div style="display:none;">
@endif
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
    <div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
        <label for="name_area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($sos_map->name_area) ? $sos_map->name_area : ''}}" >
        {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_map->user_id) ? $sos_map->user_id : Auth::user()->id}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>

    <input type="text" id="condo_id" name="condo_id" value="{{ $condo_id }}">
    


    <div class="form-group"> 
        <input class="btn btn-primary" id="btn_submit" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>
</div>

<input class="d-none" type="text" id="latlng" name="latlng" readonly> 

<div class="container d-block d-lg-none"> <!-- d-block d-md-none -->
        <div class="row">
            <center>
            <div class="col-12 main-shadow main-radius p-0" style="margin-top:25px; margin-bottom:10px;border-radius:20px;"  id="map">
                    <!-- <img style="  width: 100%;height: 100%;object-fit: contain; " src="{{ asset('/img/more/sorry.png') }}" class="card-img-top center" style="padding: 10px;"> -->
                    <img style=" object-fit: cover; border-radius:15px" width="280 px" src="{{ asset('/img/more/sorry-no-text.png') }}" class="card-img-top center" style="padding: 10px;">
                    <!-- <img style="" width="230" src="{{ asset('/img/more/sorry-no-text.png') }}"> -->
                    <div style="position: relative; z-index: 5">
                        <div class="translate">
                            <h4 style="top:-330px;left: 100px;;position: absolute;font-family: 'Sarabun', sans-serif;">ขออภัยค่ะ</h4>
                            <h6 style="top:-290px;left:50px;width: 200px;position: absolute;font-family: 'Sarabun', sans-serif;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</h6>
                        </div>
                    </div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4989368.068715823!2d100.32470292487557!3d14.23861745451566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1625474458473!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
            </div></center>
            <div id="location_users">

            </div>
            <div class="col-12 p-3 mb-5 rounded " >
                <div class="row">
                    <div class="col-12 mt-2" id="location_user">
                        <br>
                        <p  style=" color:#B3B6B7;font-family: 'Kanit', sans-serif;" >
                            <span class="text-danger">กรุณาเปิดตำแหน่งที่ตั้ง</span>
                            <span class="text-danger float-right notranslate" onclick="window.location.href = window.location.href;"><i class="fas fa-sync-alt"></i> refresh</span>
                        </p>
                    </div>

                    <div class="col-12  order-1">
                        <!-- a_help click modal -->
                        <a id="a_help_modal" class="order-1 shadow btn btn-warning btn-block shadow-box  d-none text-center" data-toggle="modal" data-target="#staticBackdrop"></a>

                        <!-- <a id="a_help" style="font-family: 'Kanit', sans-serif;border-radius:15px" class="order-1 shadow btn btn-warning btn-block shadow-box  d-none text-center" onclick="area_help_general();">
                            <i class="fas fa-bullhorn"></i> <b>Ask for HELP </b>
                            <br>
                            <b><span class="notranslate" id="area_help"></span></b>
                        </a> -->

                        <a id="a_help" class="d-none mail-shadow btn btn-md btn-block btn-warning text-dark"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;"  onclick="area_help_general();">
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img id="logo_help" src="" width="70%" style="border:white solid 3px;border-radius:50%;background-color: #ffffff;"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block" >
                                                <i class="fas fa-bullhorn"></i> Ask for HELP
                                            </span>
                                            <span class="d-block notranslate" id="area_help"></span>
                                        </b>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-12 order-3">
                        <a style="font-family: 'Kanit', sans-serif;border-radius:15px" href="tel:112" id="btn_quick_help" class="shadow btn btn-warning btn-block shadow-box " onclick="save_sos_content('police' , '112');">
                                <i class="fas fa-bullhorn"></i> <b>Ask for HELP (police)</b>
                        </a>
                    </div>
                        
                    <div class="col-12 d-none order-2 mt-3 mb-3" id="btn_emergency_volunteer">
                        <!-- <button class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#08361d;" onclick="call_sos_of_js100();">
                            <b><i class="fa-regular fa-light-emergency-on"></i> &nbsp;Call Emergency  JS 100</b>
                        </button> -->

                        <!-- <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <b><i class="fa-regular fa-light-emergency-on"></i> &nbsp; ขอความช่วยเหลือ ชาลีกรุงเทพ</b>
                        </span> -->

                        <!-- <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <img src="https://www.viicheck.com/Medilab/img/icon.png" width="40%"> 
                            <b class="text-center">ช่วยเหลือทั่วไป<br>ชาลีกรุงเทพ</b>
                        </span> -->
<!-- 
                        <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <div class="flex">
                                <div class="col-3">
                                    <img src="{{ asset('/img/logo-partner/logo 250x250/chalie-2.2.png') }}" width="100%"> 
                                </div>
                                <div class="col-9 d-flex align-items-center">
                                    <div>
                                        asd
                                    </div>
                                </div>
                            </div>
                            
                        </span> -->

                        <!-- /////// BTN SOS 1669 /////// -->
                        <span  class="mail-shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#modal_sos_1669">
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน</span>
                                            <span class="d-block" style="color: #ffffff;">(1669)</span>
                                        </b>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </span>
                    <!-- /////// END BTN SOS 1669 /////// -->

                        <span  class="mail-shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img src="{{ asset('/img/logo-partner/logo 250x250/chalie-2.2.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block">ช่วยเหลือทั่วไป</span>
                                            <span class="d-block">(ชาลีกรุงเทพ)</span>
                                        </b>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </span>

                        
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
            <!-- เบอร์ SOS ประเทศต่างๆ -->
            @include ('sos_map.phone_sos_country')
            <br>
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height: calc(100%);overflow-y: auto;">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            @if(!empty($user))
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">สวัสดีคุณ <br>
                    <b style="color:blue;" id="text_name">{{ $user->name }}</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stop();">
                  <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
              </div>
              <div class="modal-body text-center">
                <div id="div_data_phone">
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
                </div>

                <div class="row">
                    <div class="col-12">
                        <h6 style="margin-top:4px;" class="control-label " data-toggle="collapse" data-target="#div_photo" aria-expanded="false" aria-controls="div_photo" 
                            onclick="if(document.getElementById('div_cam').style.display=='none'){
                                document.getElementById('div_cam').style.display='',
                                document.querySelector('#i_down').classList.add('d-none'),
                                document.querySelector('#i_up').classList.remove('d-none'),
                                document.querySelector('#div_data_phone').classList.add('d-none'),
                                capture_registration();
                            }else{
                                document.getElementById('div_cam') .style.display='none',
                                document.querySelector('#i_down').classList.remove('d-none'),
                                document.querySelector('#i_up').classList.add('d-none'),
                                document.querySelector('#div_data_phone').classList.remove('d-none'),
                                stop();
                            }">

                            ถ่ายภาพเพื่อระบุตำแหน่งที่ชัดเจน &nbsp;
                            <br><br>
                            <a class="align-self-end text-white btn-primary btn-circle">
                                <i id="i_down" class="fas fa-camera"></i>
                                <i id="i_up" class="fas fa-chevron-up d-none"></i>
                            </a>
                            <br>
                            <br>
                            <span id="text_add_img" class="text-danger d-none">กรุณาเพิ่มภาพถ่าย</span>
                            <!-- <i id="i_down" style="font-size: 20px;" class="fas fa-camera text-info"></i>
                            <i id="i_up" style="font-size: 20px" class="fas fa-arrow-alt-circle-up text-info d-none"></i> -->
                        </h6>
                        <div class="collapse" id="div_photo">
                            <div style="margin-top:15px;" class="control-label" data-toggle="collapse" data-target="#img_ex" aria-expanded="false" aria-controls="img_ex" >
                                ตัวอย่างการถ่ายภาพ <i class="fas fa-angle-down"></i>
                            </div>
                            <img id="img_ex" class="collapse" style="filter: backscale(50%);margin-top:15px;" width="100%" src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}">
                            <div class="col-12" id="div_cam" style="display:none;margin-top:17px;">
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

                <button id="btn_help_area" style="width:40%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" onclick="confirm_phone();">
                    ยืนยัน
                </button>

              </div>
            @endif
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<span id="btn_modal_sos_1669" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_sos_1669">
    ทดสอบ 1669
</span>
<!-- Modal -->
<div class="modal fade" id="modal_sos_1669" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel_modal_sos_1669" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <span id="btn_Close_modal_sos_1669" class="d-none" data-toggle="modal" data-dismiss="modal" aria-label="Close">
                ปิด
            </span>
            <a id="go_to_show_user" class="d-none" href="">
                Go To SHOW USER
            </a>

            <div id="div_wait_unit" class="d-none">
                <div class="modal-body">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <div class="spinner-border" role="status"> 
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <h3 class="text-center text-info mt-5">
                        <b>เจ้าหน้าที่ได้รับข้อมูลแล้ว</b>
                    </h3>
                    <h4 class="text-center mt-2">
                        กำลังค้นหาหน่วยแพทย์
                    </h4>
                    <h5 class="text-center mt-">
                        โปรดรอสักครู่...
                    </h5>
                </div>
            </div>

            <div id="div_data_ask_for_help" class="">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="BackdropLabel_modal_sos_1669">
                        สวัสดีคุณ<br>
                        <b style="color:blue;">{{ $user->name }}</b>
                    </h4>
                    <span class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark-large"></i></span>
                    </span>
                </div>

                <div class="modal-body text-center">
                    <div class="col-12">
                        <div id="div_data_phone_1669">
                            <!-- <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}"> -->
                            <br>
                            <h3>โปรดยืนยันหมายเลขโทรศัพท์</h3>

                            <div style="margin-top:10px;">
                                <b>
                                    <span style="font-size:22px;color: blue;" id="text_phone_1669">
                                        @if(!empty($user->phone)){{ $user->phone }}@endif
                                    </span>
                                    @if(!empty($user->phone))
                                        <i style="font-size:25px;" class="fas fa-edit" onclick="document.querySelector('#input_phone_1669').classList.remove('d-none');"></i>
                                    @endif
                                </b>
                            </div>
                            
                            @if(!empty($user->phone))
                                <input style="margin-top:15px;" class="form-control d-none text-center"  type="phone" id="input_phone_1669" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="edit_phone_1669();">
                            @endif

                            @if(empty($user->phone))
                                <input style="margin-top:15px;" class="form-control text-center"  type="phone" id="input_not_phone_1669" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone_1669();">
                            @endif
                            <hr>
                        </div>
                        <label class="col-12" style="padding:0px;" for="photo_sos_1669" >
                            <div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
                                <div class="form-group p-3"id="add_select_img">
                                    <input class="form-control d-none" name="photo_sos_1669" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_1669" value="" accept="image/*" onchange="document.getElementById('show_photo_sos_1669').src = window.URL.createObjectURL(this.files[0]);check_add_img();">
                                    <div  class="text-center">
                                        <center>
                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                        </center>
                                        <br>
                                        <h3 class="text-center m-0">
                                            <b>เพิ่มภาพถ่าย "คลิก"</b> 
                                        </h3>
                                    </div>
                                    
                                </div>
                                <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_1669" />
                                <div class="child">
                                    <span>เลือกรูป</span>
                                </div>
                            </div>
                        </label>
                    </div>

                </div>
                <div class="text-center">
                    <center>
                    <span class="mail-shadow btn btn-md btn-block" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;width: 90%;" onclick="send_ask_for_help_1669();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block" style="color: #ffffff;">ขอความช่วยเหลือ</span>
                                        <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </span>
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //// SOS 1669 //// -->
<script>
    function send_ask_for_help_1669(){
        // console.log('send_ask_for_help_1669');

        let data_sos_1669 = [] ;
        let type_help = 'by_user' ;

        let name = document.querySelector("#name");
        let phone = document.querySelector("#phone");
        let user_id = document.querySelector("#user_id");
        let lat = document.querySelector("#lat");
        let lng = document.querySelector("#lng");
        let photo_sos_1669 = document.querySelector("#photo_sos_1669");
        
        // console.log("name >> " + name.value);
        // console.log("phone >> " + phone.value);
        // console.log("user_id >> " + user_id.value);
        // console.log("lat >> " + lat.value);
        // console.log("lng >> " + lng.value);
        // console.log("photo_sos_1669 >> " + photo_sos_1669.value);

        data_sos_1669 = {
            "name_user" : name.value,
            "phone_user" : phone.value,
            "user_id" : user_id.value,
            "lat" : lat.value,
            "lng" : lng.value,
            "photo_sos" : photo_sos_1669.value,
        }

        fetch("{{ url('/') }}/api/create_new_sos_by_user", {
            method: 'post',
            body: JSON.stringify(data_sos_1669),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
            document.querySelector('#div_data_ask_for_help').classList.add('d-none');
            document.querySelector('#div_wait_unit').classList.remove('d-none');

            check_unit_cf_sos(data);
        }).catch(function(error){
            // console.error(error);
        });
    }

    function edit_phone_1669() {
        let phone = document.querySelector("#phone");
        let text_phone_1669 = document.querySelector("#text_phone_1669");
        let input_phone_1669 = document.querySelector("#input_phone_1669");
            text_phone_1669.innerHTML = input_phone_1669.value ;
            phone.value = input_phone_1669.value ;
            // console.log(text_phone_1669.innerHTML);
    }

    function add_phone_1669() {
        let phone = document.querySelector("#phone");
        let text_phone_1669 = document.querySelector("#text_phone_1669");
        let input_not_phone_1669 = document.querySelector("#input_not_phone_1669");
            text_phone_1669.innerHTML = input_not_phone_1669.value ;
            phone.value = input_not_phone_1669.value ;
            // console.log(text_phone.innerHTML);
    }

    function check_add_img(){
        document.getElementById('add_select_img').classList.add('d-none')
        document.getElementById('photo_sos_1669').classList.add('d-none');
        document.getElementById('show_photo_sos_1669').classList.remove('d-none');

    }

    function check_unit_cf_sos(sos_id){
        reface_check_unit_cf_sos = setInterval(function() {
            send_api_check_unit_cf_sos(sos_id);
        }, 5000);
    }

    function myStop_reface_check_unit_cf_sos() {
        clearInterval(reface_check_unit_cf_sos);
    }

    function send_api_check_unit_cf_sos(sos_id){

        fetch("{{ url('/') }}/api/check_unit_cf_sos_form_user" + "/" + sos_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result['status']);
                
                if (result['status'] === "ออกจากฐาน") {
                    myStop_reface_check_unit_cf_sos();
                    // document.querySelector('#btn_Close_modal_sos_1669').click();

                    let go_to_show_user = document.querySelector('#go_to_show_user');
                    let go_to_show_user_href = document.createAttribute("href");
                        go_to_show_user_href.value = '{{ url("/") }}/sos_help_center/'+sos_id+'/show_user' ;
                        go_to_show_user.setAttributeNode(go_to_show_user_href);

                    setTimeout(function() {
                        document.querySelector('#go_to_show_user').click();
                    }, 1000);
                }
        });
    }

    
</script>
<!-- //// SOS 1669 //// -->

<br><br>


@include ('layouts.modal_loading')


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

        let condo_id = document.querySelector('#condo_id').value ;

        if (condo_id) {
            // console.log( "condo_id == " +  condo_id  );

            fetch("{{ url('/') }}/api/sos_map/area_condo_id" + "/" + condo_id)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    result_area = result ;

                    if (typeof result_area !== "undefined") {
                        // console.log(result_area)
                        getLocation();
                    }
            });
        }else{
            // console.log( "NOT condo_id");
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
        }

        let phone = document.querySelector('#phone').value ;
            
        if (phone === "") {

            // click modal pls input phone
            document.querySelector('#btn_open_pls_input_phone').click();
            // end click modal pls input phone

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

        document.querySelector('#btn_help_area').disabled = true;

    }

    function stop(e) {
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
        document.querySelector('#btn_help_area').disabled = false;
        
    }

    function call_sos_of_js100() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");
        content.value = 'emergency_js100';

        let btn_tel = document.querySelector('#btn_tel');

        let tag_a = document.createElement("a");

        let tag_a_href = document.createAttribute("href");
        tag_a_href.value = 'tel:1137';
        tag_a.setAttributeNode(tag_a_href);

        let tag_a_id = document.createAttribute("id");
        tag_a_id.value = 'btn_js_1137';
        tag_a.setAttributeNode(tag_a_id);

        btn_tel.appendChild(tag_a);

        document.querySelector("#btn_js_1137").click();
        document.querySelector("#btn_submit").click();


    }

    function area_help_general(){
        let content = document.querySelector("#content");
            content.value = 'help_area';

        document.querySelector('#text_add_img').classList.add('d-none');
        document.querySelector('#btn_help_area').disabled = false;

        document.querySelector("#a_help_modal").click();
    }

    function sos_of_Charlie_Bangkok() {

        let content = document.querySelector("#content");
            content.value = 'emergency_Charlie_Bangkok';

        document.querySelector('#text_add_img').classList.remove('d-none');
        document.querySelector('#btn_help_area').disabled = true;

        document.querySelector("#a_help_modal").click();

    }

    function check_input_pls_input_phone(){

        let input_pls_input_phone = document.querySelector('#input_pls_input_phone').value;

        if (input_pls_input_phone) {
            document.querySelector('#cf_input_pls_input_phone').classList.remove('d-none');
        }else{
            document.querySelector('#cf_input_pls_input_phone').classList.add('d-none');
        }
    }

    function click_cf_input_pls_input_phone(){
        let input_pls_input_phone = document.querySelector('#input_pls_input_phone');
        let user_id = document.querySelector('#user_id');

        fetch("{{ url('/') }}/api/input_pls_input_phone/" + input_pls_input_phone.value + "/" + user_id.value)
            .then(response => response.text())
            .then(result => {
                console.log(result);
            });

        window.location.href = window.location.href;
        // document.querySelector('#btn_close_pls_input_phone').click();
    }

</script>
