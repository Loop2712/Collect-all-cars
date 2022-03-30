
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
                        <div class="notranslate form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <input class="form-control" name="name" type="text" id="name" value="{{ isset($data->name) ? $data->name : ''}}" >
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'ชื่อจริง' }}</b></label>
                        <div class="notranslate form-group {{ $errors->has('name_staff') ? 'has-error' : ''}}">
                            <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ isset($data->name_staff) ? $data->name_staff : ''}}" >
                                {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'วันเกิด' }}</b></label>
                        <div class="form-group {{ $errors->has('brith') ? 'has-error' : ''}}">
                            <input class="form-control" name="brith" type="date" id="brith" value="{{ isset($data->brith) ? $data->brith : ''}}" >
                                    {!! $errors->first('brith', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'Gender' }}</b></label>
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
                        <div class="notranslate form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}" >
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label for="massengbox" class="control-label"><b>{{ 'เบอร์โทรศัพท์' }}</b></label>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>

                        @if(!empty($data->std_of))
                            <label for="massengbox" class="control-label"><b>{{ 'มหาวิทยาลัย' }}</b></label>
                            <div class="form-group {{ $errors->has('std_of') ? 'has-error' : ''}}">
                                <select name="std_of" id="std_of" class="form-control notranslate">
                                    <option class="translate" value="{{ $data->std_of }}" selected >{{ $data->std_of }}</option>
                                    @foreach($name_university as $university)
                                        <option class="notranslate" value="{{ $university->initials_en }}" >
                                            <b>{{ $university->initials_th }} : </b>{{ $university->full_name_th }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="massengbox" class="control-label"><b>{{ 'รหัสนักศึกษา' }}</b></label>
                            <div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
                                <input class="form-control" name="student_id" type="number" id="student_id" value="{{ isset($data->student_id) ? $data->student_id : ''}}" >
                                {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        @endif

                        <div id="div_change_language">
                            <label for="massengbox" class="control-label"><b>{{ 'ภาษา' }}</b></label>
                            <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
                                <div style="margin-top: 10px;" class="row">
                                    <div class="col-12" style="top:-15px">
                                        <div class="row">
                                            <div class="col-lg-1 d-block d-lg-none"></div>
                                            <div class="col-md-4 col-lg-2 col-4">
                                                <img class="btn" id="img_flag_en" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/flex-en.png') }}" onclick="change_language('en' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2" style="top:4px">
                                                <img class="btn" id="img_flag_in" style="filter: grayscale(100%); " width="82" src="{{ url('/img/national-flag/flex-in.png') }}" onclick="change_language('hi' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2" style="top:5px;right:-2px;">
                                                <img class="btn" id="img_flag_ae" style="filter: grayscale(100%);"  width="79" src="{{ url('/img/national-flag/flex-ar.png') }}" onclick="change_language('ar' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-md-4 col-lg-2 col-4" style="top:2px" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                <img class="btn" id="img_flag_zh" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/flex-zh-TW.png') }}">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2" style="top:5px;right:-2px;">
                                                <img class="btn" id="img_flag_ru" style="filter: grayscale(100%); " width="79"  src="{{ url('/img/national-flag/flex-ru.png') }}" onclick="change_language('ru' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-md-4 col-lg-2 col-4" style="top:2px">
                                                <img class="btn" id="img_flag_es" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/flex-es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                            </div>
                                            <!-- จีนเสริม -->
                                            <div class="col-md-12 col-lg-12 col-12 collapse text-center" id="collapseExample">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 col-6" style="top:2px">
                                                        <img class="btn" id="img_flag_zh_TW" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/flex-zh-TW.png') }}" onclick="change_language('zh-TW' , '{{ $data->id }}');">
                                                        <span class="notranslate">Traditional Chinese</span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-6" style="top:2px">
                                                        <img class="btn" id="img_flag_zh_CN" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/flex-zh-TW.png') }}" onclick="change_language('zh-CN' , '{{ $data->id }}');">
                                                        <span class="notranslate">Simplified Chinese</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- จบจีนเสริม -->
                                            <div class="col-md-4 col-lg-2 col-4" style="top:2px">
                                                <img class="btn" id="img_flag_de" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/flex-de.png') }}" onclick="change_language('de' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-md-4 col-lg-2 col-4">
                                                <img class="btn" id="img_flag_ja" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/flex-ja.png') }}" onclick="change_language('ja' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-md-4 col-lg-2 col-4">
                                                <img class="btn" id="img_flag_ko" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/flex-ko.png') }}" onclick="change_language('ko' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2" >
                                                <img class="btn" id="img_flag_th" style="filter: grayscale(100%); " width="85" src="{{ url('/img/national-flag/flex-th.png') }}" onclick="change_language('th' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2">
                                                <img class="btn" id="img_flag_lo" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/flex-la.png') }}" onclick="change_language('lo' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2 " >
                                                <img class="btn" id="img_flag_my" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/flex-mm.png') }}" onclick="change_language('my' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-md-4 col-lg-2 col-4 d-none">
                                                <img class="btn"  width="85" src="{{ url('/img/national-flag/flex-other.png') }}" type="button" data-toggle="collapse" data-target="#modal_language" aria-expanded="false" aria-controls="modal_language">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="collapse " id="modal_language" style="padding:0px">
                                                <div class="card col-md-12 card-body no-radius border-0 " style="padding-top:5px;">
                                                    <div class="row text-center">
                                                        
                                                        <!-- <div class="col-4 col-md-2" style="padding:0px;">
                                                            <img class="btn" id="img_flag_es" style="filter: grayscale(100%); padding:0px;" width="55"  src="{{ url('/img/national-flag/es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control" name="language" type="hidden" id="language" value="{{ isset($data->language) ? $data->language : ''}}">
                                            {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="div_change_language">
                            <label for="massengbox" class="control-label"><b>{{ 'ภาษา' }}</b></label>
                            <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
                                <div style="margin-top: 10px;" class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 col-md-2" style="top:1px;">
                                                <img class="btn" id="img_flag_th" style="filter: grayscale(100%); " width="85" src="{{ url('/img/national-flag/th.png') }}" onclick="change_language('th' , '{{ $data->id }}');">
                                            </div>
                                            <div style="margin-top: 5px;" class="col-4 col-md-2">
                                                <img class="btn" id="img_flag_lo" style="filter: grayscale(100%);"  width="78" src="{{ url('/img/national-flag/lo.png') }}" onclick="change_language('lo' , '{{ $data->id }}');">
                                            </div>
                                            <div class="col-4 col-md-2 " style="top:4px">
                                                <img class="btn" id="img_flag_my" style="filter: grayscale(100%);"  width="78" src="{{ url('/img/national-flag/my.png') }}" onclick="change_language('my' , '{{ $data->id }}');">
                                            </div>
                                            <div style="ml-lg: -10px;" class="col-4 col-md-2">
                                                <img class="btn" id="img_flag_en" style="filter: grayscale(100%);"  width="85" src="{{ url('/img/national-flag/en.png') }}" onclick="change_language('en' , '{{ $data->id }}');">
                                            </div>
                                            <div style="mt-lg: 1px;" class="col-4 col-md-2">
                                                <img class="btn" id="img_flag_zh_TW" style="filter: grayscale(100%);"  width="80" src="{{ url('/img/national-flag/zh-TW.png') }}" onclick="change_language('zh-TW' , '{{ $data->id }}');">
                                            </div>
                                            <div style="margin-left: -5px;" class="col-4 col-md-2">
                                                <img class="btn"  width="83" src="{{ url('/img/national-flag/flex-other.png') }}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            </div>
                                                <div class="collapse " id="collapseExample">
                                                    <div class="card col-md-12 card-body no-radius border-0 " style="p-sm:0px;">
                                                        <div class="row text-center">
                                                            <div class="col-4 col-md-2" style="padding:0px;margin-left:-10px;">
                                                                <img class="btn" id="img_flag_ja" style="filter: grayscale(100%); " width="105"  src="{{ url('/img/national-flag/ja.png') }}" onclick="change_language('ja' , '{{ $data->id }}');">
                                                            </div>
                                                            <div class="col-4 col-md-2">
                                                                <img class="btn" id="img_flag_ko" style="filter: grayscale(100%); " width="84"  src="{{ url('/img/national-flag/ko.png') }}" onclick="change_language('ko' , '{{ $data->id }}');">
                                                            </div>
                                                            <div class="col-4 col-md-2" >
                                                                <img class="btn" id="img_flag_es" style="filter: grayscale(100%); " width="85"  src="{{ url('/img/national-flag/es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <input class="form-control" name="language" type="hidden" id="language" value="{{ isset($data->language) ? $data->language : ''}}">
                                {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div> -->
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
    <div class="container d-block d-lg-none">
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
                                                    
                                                    <img class="align-self-center" style="position: absolute;margin-top: -100px;" width="80%" height="43%" src="{{ asset('/img/icon/16.png') }}">

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
                        <center>
                            <div id="driver_license_old_mobile" class="">
                                <!-- รูปตัวอย่าง -->
                                <img width="250" height="150" src="{{ url('storage')}}/{{ $data->driver_license }}">
                            </div>
                            <div id="driver_license_new_mobile" class="d-none">
                                <div class="col-12">
                                    <input type="hidden" name="text_img_car" id="text_img_car">
                                    <canvas id="canvas_car" width="250" height="150" class="d-none"></canvas>
                                    <img style="margin-left:-10px;" src="" width="250" height="150" id="photo_car">
                                </div>
                            </div>
                        </center>
                        <br>
                    </div>
                    <hr>
                    <div class="col-12">
                        <label class="control-label"><b>{{ 'รถจักยานยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
                            <center>
                                <button id="btn_click_capture2" type="button" class="btn btn-sm btn-outline-info main-shadow main-radius" onclick="
                                document.querySelector('#driver_license_capture2').classList.remove('d-none'),
                                document.querySelector('#btn_click_capture2').classList.add('d-none'),
                                capture_driver_license2();">
                                    <i class="fas fa-camera"></i> ถ่ายรูป
                                </button>
                            </center>
                            <br>
                            <div id="driver_license_capture2" class="d-none">
                                <center>
                                    <div id="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-end bg-light"> 
                                                    <a style="position: absolute; z-index:10; margin-right:10px" class="text-white" onclick="stop2();"> <b>X</b> </a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center bg-light">

                                                    <video width="100%" height="100%" autoplay="true" id="video_driver_license2"></video>
                                                    
                                                    <img class="align-self-center" style="position: absolute;margin-top: -100px;" width="80%" height="43%" src="{{ asset('/img/icon/16.png') }}">

                                                    <ul class="ul-dot align-self-center" style=" position: absolute;margin-top: 130px;padding-right: 20px;padding-left: 25px;">
                                                       <span style="color:#ffff;">ข้อแนะนำ  </span> 
                                                        <li class="li-dot">หลีกเลี่ยงแสงสะท้อน ไม่มืดหรือสว่างเกินไป</li>
                                                        <li class="li-dot">รูปไม่เบลอ เห็นตัวอักษรชัดเจน</li>
                                                    </ul>
                                                    <a class="align-self-end text-white btn-primary btn-circle" style="position: absolute; margin-bottom:10px" onclick="capture2();"><i class="fas fa-camera"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <center>
                            <div id="driver_license_old_mobile2" class="">
                                <!-- รูปตัวอย่าง -->
                                <img width="250" height="150" src="{{ url('storage')}}/{{ $data->driver_license2 }}">
                            </div>
                            <div id="driver_license_new_mobile2" class="d-none">
                                <div class="col-12">
                                    <input type="hidden" name="text_img_motor" id="text_img_motor">
                                    <canvas id="canvas_motor" width="250" height="150" class="d-none"></canvas>
                                    <img style="margin-left:-10px;" src="" width="250" height="150" id="photo_motor">
                                </div>
                            </div>
                        </center>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group float-left">
                    <br>

                </div>
            </div>
            <div class="col-6">
                <div class="float-right">
                    <br>
                    <a href="{{ url('/profile') }}" class="btn btn-warning text-white" title="Back">
                        BACK
                    </a>
                    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'SAVE' : 'ส่งข้อมูล' }}">
                </div>
            </div>
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        let input_language = document.querySelector('#language');
        change_color_img(input_language.value);

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

    function change_language(language , user_id)
    {
        let input_language = document.querySelector('#language');
            input_language.value = language ;
            change_color_img(language);

            fetch("{{ url('/') }}/api/change_language/" + language + "/"  + user_id);

            switch(language) {
            case 'th':
                alert("เปลี่ยนภาษาเรียบร้อย");
                document.querySelector('#btn_change_language_th').click();
              break;
            case 'en':
                alert("The language has been changed successfully.");
                document.querySelector('#btn_change_language_en').click();
              break;
            case 'zh-TW':
                alert("更改語言成功");
                document.querySelector('#btn_change_language_zh-TW').click();
              break;
            case 'zh-CN':
                alert("更改语言成功");
                document.querySelector('#btn_change_language_zh-CN').click();
              break;
            case 'ja':
                alert("言語は正常に変更されました。");
                document.querySelector('#btn_change_language_ja').click();
              break;
            case 'ko':
                alert("언어가 성공적으로 변경되었습니다.");
                document.querySelector('#btn_change_language_ko').click();
              break;
            case 'es':
                alert("El idioma se ha cambiado correctamente.");
                document.querySelector('#btn_change_language_es').click();
              break;
            case 'lo':
                alert("ພາສາໄດ້ຖືກປ່ຽນແປງຢ່າງສໍາເລັດຜົນ.");
                document.querySelector('#btn_change_language_lo').click();
              break;
            case 'my':
                alert("ဘာသာစကားကို အောင်မြင်စွာ ပြောင်းလဲပြီးပါပြီ။.");
                document.querySelector('#btn_change_language_my').click();
              break;
            case 'de':
                alert("Die Sprache wurde erfolgreich geändert.");
                document.querySelector('#btn_change_language_de').click();
            break;
            case 'hi':
                alert("सफलतापूर्वक भाषा बदलें");
                document.querySelector('#btn_change_language_hi').click();
            break;
            case 'ar':
                alert("تغيير اللغة بنجاح");
                document.querySelector('#btn_change_language_ar').click();
            break;
            case 'ru':
                alert("Изменить язык успешно");
                document.querySelector('#btn_change_language_ru').click();
            break;
          }

    }

    function change_color_img(language)
    {
        let img_th = document.querySelector('#img_flag_th');
        let img_en = document.querySelector('#img_flag_en');

        let img_zh = document.querySelector('#img_flag_zh');
        let img_zh_TW = document.querySelector('#img_flag_zh_TW');
        let img_zh_CN = document.querySelector('#img_flag_zh_CN');

        let img_ja = document.querySelector('#img_flag_ja');
        let img_ko = document.querySelector('#img_flag_ko');
        let img_es = document.querySelector('#img_flag_es');
        let img_lo = document.querySelector('#img_flag_lo');
        let img_my = document.querySelector('#img_flag_my');
        let img_de = document.querySelector('#img_flag_de');
        let img_in = document.querySelector('#img_flag_in');
        let img_ae = document.querySelector('#img_flag_ae');
        let img_ru = document.querySelector('#img_flag_ru');

        let style_gray_th= document.createAttribute("style");
            style_gray_th.value = "filter: grayscale(100%);";

        let style_gray_en= document.createAttribute("style");
            style_gray_en.value = "filter: grayscale(100%);";

        let style_gray_zh= document.createAttribute("style");
            style_gray_zh.value = "filter: grayscale(100%);";

        let style_gray_zh_TW= document.createAttribute("style");
            style_gray_zh_TW.value = "filter: grayscale(100%);";

        let style_gray_zh_CN= document.createAttribute("style");
            style_gray_zh_CN.value = "filter: grayscale(100%);";

        let style_gray_ja= document.createAttribute("style");
            style_gray_ja.value = "filter: grayscale(100%);";

        let style_gray_ko= document.createAttribute("style");
            style_gray_ko.value = "filter: grayscale(100%);";

        let style_gray_es= document.createAttribute("style");
            style_gray_es.value = "filter: grayscale(100%);";

        let style_gray_lo= document.createAttribute("style");
            style_gray_lo.value = "filter: grayscale(100%);";

        let style_gray_my= document.createAttribute("style");
            style_gray_my.value = "filter: grayscale(100%);";
        
        let style_gray_de= document.createAttribute("style");
            style_gray_de.value = "filter: grayscale(100%);";

        let style_gray_in= document.createAttribute("style");
            style_gray_in.value = "filter: grayscale(100%);";

        let style_gray_ae= document.createAttribute("style");
            style_gray_ae.value = "filter: grayscale(100%);";

        let style_gray_ru= document.createAttribute("style");
            style_gray_ru.value = "filter: grayscale(100%);";

        if (language === "zh-TW" || language === "zh-CN") {

            img_zh.setAttributeNode(style_gray_zh);

            let attr_zh = img_zh.getAttributeNode("style"); 
                img_zh.removeAttributeNode(attr_zh);
        }

        switch(language) {
            case 'th':
                let attr_th = img_th.getAttributeNode("style");   
                img_th.removeAttributeNode(attr_th);

                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'en':
                let attr_en = img_en.getAttributeNode("style");   
                img_en.removeAttributeNode(attr_en);

                img_th.setAttributeNode(style_gray_th);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'zh-TW':
                // let attr_zh = img_zh.getAttributeNode("style"); 
                // img_zh.removeAttributeNode(attr_zh);

                let attr_zh_TW = img_zh_TW.getAttributeNode("style");   
                img_zh_TW.removeAttributeNode(attr_zh_TW);

                img_zh_CN.setAttributeNode(style_gray_zh_CN);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'zh-CN':
                // let attr_zh = img_zh.getAttributeNode("style");  
                //     img_zh.removeAttributeNode(attr_zh_2);

                let attr_zh_CN = img_zh_CN.getAttributeNode("style");   
                img_zh_CN.removeAttributeNode(attr_zh_CN);

                img_zh_TW.setAttributeNode(style_gray_zh_TW);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'ja':
                let attr_ja = img_ja.getAttributeNode("style");   
                img_ja.removeAttributeNode(attr_ja);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'ko':
                let attr_ko = img_ko.getAttributeNode("style");   
                img_ko.removeAttributeNode(attr_ko);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'es':
                let attr_es = img_es.getAttributeNode("style");   
                img_es.removeAttributeNode(attr_es);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'lo':
                let attr_lo = img_lo.getAttributeNode("style");   
                img_lo.removeAttributeNode(attr_lo);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_es.setAttributeNode(style_gray_es);
                img_ko.setAttributeNode(style_gray_ko);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'my':
                let attr_my = img_my.getAttributeNode("style");   
                img_my.removeAttributeNode(attr_my);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
            case 'de':
                let attr_de = img_de.getAttributeNode("style");   
                img_de.removeAttributeNode(attr_de);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
              
            case 'hi':
                let attr_in = img_in.getAttributeNode("style");   
                img_in.removeAttributeNode(attr_in);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
              break;
          
          case 'ar':
                let attr_ae = img_ae.getAttributeNode("style");   
                img_ae.removeAttributeNode(attr_ae);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ru.setAttributeNode(style_gray_ru);
              break;
        

          case 'ru':
                let attr_ru = img_ru.getAttributeNode("style");   
                img_ru.removeAttributeNode(attr_ru);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh.setAttributeNode(style_gray_zh);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_zh_CN.setAttributeNode(style_gray_zh_CN);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
              break;
          }

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
<!-- ใบขับขี่รถยนต์ -->
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

    context_car.drawImage(video, 20, 90, 430, 270, 0, 0, 250, 150);
    photo_car.setAttribute('src',canvas_car.toDataURL('image/png'));
    text_img_car.value = canvas_car.toDataURL('image/png');

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

<!-- ใบขับขี่มอไซต์ -->
<script>
function capture_driver_license2(){

    var video = document.querySelector("#video_driver_license2");
    var photo_motor = document.querySelector("#photo_motor");
    var canvas_motor = document.querySelector("#canvas_motor");
    var text_img_motor = document.querySelector("#text_img_motor");
    var context_motor = canvas_motor.getContext('2d');

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

function stop2(e) {
    document.querySelector("#driver_license_capture2").classList.add('d-none');
    document.querySelector("#btn_click_capture2").classList.remove('d-none');

    var video = document.querySelector("#video_driver_license2");
    var photo_motor = document.querySelector("#photo_motor");
    var canvas_motor = document.querySelector("#canvas_motor");
    var text_img_motor = document.querySelector("#text_img_motor");
    var context_motor = canvas_motor.getContext('2d');
      
      var stream = video.srcObject;
      var tracks = stream.getTracks();

      for (var i = 0; i < tracks.length; i++) {
        var track = tracks[i];
        track.stop();
      }

      video.srcObject = null;
}

function capture2() {
    document.querySelector("#driver_license_old_mobile2").classList.add('d-none');
    document.querySelector("#driver_license_new_mobile2").classList.remove('d-none');

    var video = document.querySelector("#video_driver_license2");
    var photo_motor = document.querySelector("#photo_motor");
    var canvas_motor = document.querySelector("#canvas_motor");
    var text_img_motor = document.querySelector("#text_img_motor");
    var context_motor = canvas_motor.getContext('2d');

    context_motor.drawImage(video, 20, 90, 430, 270, 0, 0, 250, 150);
    photo_motor.setAttribute('src',canvas_motor.toDataURL('image/png'));
    text_img_motor.value = canvas_motor.toDataURL('image/png');

    var stream = video.srcObject;
        var tracks = stream.getTracks();

        for (var i = 0; i < tracks.length; i++) {
            var track = tracks[i];
            track.stop();
        }

        video.srcObject = null;
    document.querySelector('#driver_license_capture2').classList.add('d-none');
    document.querySelector("#btn_click_capture2").classList.remove('d-none');
}
</script>
