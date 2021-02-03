<div class="container">
    <div class="row">
        </body>
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลพื้นฐาน / Basic information '}}</span>
          
          <br><br>
          <div class="row">
                <div class="col-12 col-md-2">
                    <label  class="control-label">{{ 'รูปภาพ  / Photo ' }}</label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('avatar ') ? 'has-error' : ''}}">
                    <input class="form-control" name="avatar " type="file" id="avatar " value="{{ isset($data->avatar ) ? $data->avatar  : ''}}" >
                        {!! $errors->first('avatar ', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'ชื่อผู้ใช้  / Username' }}</label></label><span style="color: #FF0033;"> *</span>
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
                    <label for="massengbox" class="control-label">{{ 'ชื่อ / Name' }}</label></label><span style="color: #FF0033;"> *</span>
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
                    <label for="massengbox" class="control-label">{{ 'วันเกิด / Birthday ' }}</label></label>
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
                    <label for="massengbox" class="control-label">{{ 'เพศ / Sex ' }}</label></label>
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
                            <option value="{{ $optionKey }}"  {{ (isset($data->sex) && $data->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>  
                </div>
            </div>
            </div>
            
            <div class="col-12">
            <br><br>
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลติดต่อ / Contact information  '}}</span>
          
          <br><br>
           
          
        
        

        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'อีเมล  / E-mail' }}</label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('email ') ? 'has-error' : ''}}">
                    <input class="form-control" name="email " type="text" id="email " value="{{ isset($data->email ) ? $data->email  : ''}}" >
                        {!! $errors->first('email ', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'โทรศัพท์ / Phone ' }}</label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                    <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'วันหมดอายุ พรบ  / Expiration date act ' }}</label></label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('act') ? 'has-error' : ''}}">
                    <input class="form-control" name="act" type="date" id="act" value="{{ isset($data->act) ? $data->act : ''}}" >
                        {!! $errors->first('act', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
    </div>
    </div>
</div>
<div class="form-group">
<br>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>
