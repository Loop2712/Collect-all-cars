<div class="container">
    <div class="row">
        <!-- ข้อมูลรถที่ต้องการติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถที่ต้องการติดต่อ / Vehicle information to contact'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'ข้อความ / Message' }}</label>
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
                            }">
                             <option value="" selected >
                                 - เลือกข้อความ / Select text - 
                             </option>  
                        @foreach (json_decode('{"1":"กรุณาเลื่อนรถด้วยค่ะ","2":"รถคุณเปิดไฟค้างไว้ค่ะ","3":"มีเด็กอยู่ในรถค่ะ","4":"รถคุณเกิดอุบัติเหตุค่ะ","5":"แจ้งปัญหาการขับขี่","6":"อื่นๆ"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"  {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>
                    <br>
                </div>

                <div class="col-12 col-md-2">
                    <label id="masseng_label" for="masseng" class="d-none control-label">{{ 'ข้อความอื่นๆ / Other messages' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div id="masseng_input" class="d-none form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
                        <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}">
                        {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="registration" class="control-label">{{ 'ทะเบียนรถ / Car registration' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
                        <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required>
                        {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="county" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('county') ? 'has-error' : ''}}">
                        <select name="county" id="county" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            
            <div class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                <label for="photo" class="control-label">{{ 'Photo' }}</label>
                <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($guest->photo) ? $guest->photo : ''}}" >
                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="d-none form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                <label for="brand" class="control-label">{{ 'brand' }}</label>
                <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($guest->brand) ? $guest->brand : ''}}" >
                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลผู้ติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลของท่าน / Your information'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="name" class="control-label">{{ 'ชื่อ / Name' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($guest->name) ? $guest->name : ''}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="phone" class="control-label">{{ 'เบอร์โทร / Phone number' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone" type="tel" id="phone" value="{{ isset($guest->phone) ? $guest->phone : ''}}" placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}">
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : Auth::user()->provider_id}}" readonly>
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>
<!-- 
<script>
function myFunction(val) {
    if(val =='7'){ 
        document.querySelector('#masseng_label').classList.remove('d-none'),
        document.querySelector('#masseng_input').classList.remove('d-none')
    }else{ 
        document.querySelector('#masseng_label').classList.add('d-none'),
        document.querySelector('#masseng_input').classList.add('d-none')
    }
}
</script> -->