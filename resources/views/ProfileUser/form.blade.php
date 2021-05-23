<div class="container">
    <div class="row">
        </body>
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลพื้นฐาน / Basic information '}}</b></span>
          
          <br><br>
          <div class="row">
                <div class="col-12 col-md-2">
                    <label  class="control-label"><b>{{ 'รูปภาพ  / Photo ' }}</b></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('avatar ') ? 'has-error' : ''}}">
                    <input class="form-control" name="avatar " type="file" id="avatar " value="{{ isset($data->avatar ) ? $data->avatar  : ''}}" accept="image/*" multiple="multiple">
                        {!! $errors->first('avatar ', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'ชื่อผู้ใช้  / Username' }}</b></label><span style="color: #FF0033;"> *</span>
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
                    <label for="massengbox" class="control-label"><b>{{ 'ชื่อ / Name' }}</b></label><span style="color: #FF0033;"> *</span>
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
                    <label for="massengbox" class="control-label"><b>{{ 'วันเกิด / Birthday ' }}</b></label>
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
                    <label for="massengbox" class="control-label"><b>{{ 'เพศ / Sex ' }}</b></label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                        <select name="sex" class="form-control"  id="sex" required onchange="if(this.value=='3'){ 
                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                document.querySelector('#masseng').focus();
                            }else{ 
                                document.querySelector('#masseng_label').classList.add('d-none'),
                                document.querySelector('#masseng_input').classList.add('d-none')
                            }">
                             <option value="" selected >
                                 - โปรดเลือก / Please select - 
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
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลติดต่อ / Contact information  '}}</b></span>
          
          <br><br>
           
          
        
        

        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label"><b>{{ 'อีเมล  / E-mail' }}</b></label></label>
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
                    <label for="massengbox" class="control-label"><b>{{ 'โทรศัพท์ / Phone ' }}</b></label></label>
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
                    <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b><br>
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }
</script>
