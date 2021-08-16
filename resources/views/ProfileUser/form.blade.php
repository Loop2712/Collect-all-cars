
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
                            <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($data->photo) ? $data->photo : ''}}" accept="image/*" multiple="multiple">
                                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            @if(!empty($data->avatar) and empty($data->photo))
                                <img style="border-radius: 50%;" width="300" src="{{ $data->avatar }}" class="img-circle img-thumbnail isTooltip">
                            @endif
                            @if(!empty($data->photo))
                                <img style="border-radius: 50%;" width="300" src="{{ url('storage')}}/{{ $data->photo }}" class="img-circle img-thumbnail isTooltip">
                            @endif
                            @if(empty($data->avatar) and empty($data->photo))
                                <img style="border-radius: 50%;" width="300" src="{{ url('/img/icon/user.png') }}" class="img-circle img-thumbnail isTooltip">
                            @endif
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
                            <input class="form-control" name="driver_license" type="file" id="driver_license" value="{{ isset($data->driver_license) ? $data->driver_license : ''}}" >
                            {!! $errors->first('driver_license', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            <img width="250" src="{{ url('storage')}}/{{ $data->driver_license }}">
                        </center>
                        <br>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="control-label"><b>{{ 'รถจักยานยนต์' }}</b></label>
                        <div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
                            <input class="form-control" name="driver_license2" type="file" id="driver_license2" value="{{ isset($data->driver_license2) ? $data->driver_license2 : ''}}" >
                            {!! $errors->first('driver_license2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <br>
                        <center>
                            <img width="250" src="{{ url('storage')}}/{{ $data->driver_license2 }}">
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
                                <button type="button" class="btn btn-sm btn-outline-info main-shadow main-radius" onclick="document.querySelector('#driver_license_capture').classList.remove('d-none');">
                                    <i class="fas fa-camera"></i> ถ่ายรูป
                                </button>
                            </center>
                            <br>
                            <div id="driver_license_capture" class="d-none">
                                <center>
                                    <img width="250" src="{{ url('storage')}}/{{ $data->driver_license }}">
                                </center>
                            </div>
                        </div>
                        <!-- รูปตัวอย่าง -->
                        <center>
                            <img width="250" src="{{ url('storage')}}/{{ $data->driver_license }}">
                        </center>
                        <br>
                    </div>
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
