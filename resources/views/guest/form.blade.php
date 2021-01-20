<div class="container">
    <div class="row">
        <!-- ข้อมูลผู้ติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลของท่าน / Your information'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="control-label">{{ 'ชื่อ / Name' }}</label>
                <input class="form-control" name="name" type="text" id="name" value="{{ isset($guest->name) ? $guest->name : ''}}" >
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label for="phone" class="control-label">{{ 'เบอร์โทร / Phone number' }}</label>
                <input class="form-control" name="phone" type="tel" id="phone" value="{{ isset($guest->phone) ? $guest->phone : ''}}" placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <label for="provider_id" class="control-label">{{ 'Provider Id' }}</label>
                <input class="form-control" name="provider_id" type="text" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : ''}}" >
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลรถ -->
        <div class="col-12">
            <div class="d-none form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
                <label for="masseng" class="control-label">{{ 'Masseng' }}</label>
                <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}" >
                {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('massengbox') ? 'has-error' : ''}}">
                <label for="massengbox" class="control-label">{{ 'ข้อความ / Message' }}</label></label><span style="color: #FF0033;"> *</span>
                <select name="massengbox" class="form-control" id="massengbox" required>
                    <option value="" selected > - เลือกข้อความ / Select text - </option> 
                @foreach (json_decode('{"1":"กรุณามาเลื่อนรถด้วย ครับ/ค่ะ","2":"รบกวนมาเลื่อนรถด้วย!!"}', true) as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}" {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>
                {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
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
            <div class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
                <label for="registration" class="control-label">{{ 'ทะเบียนรถ / Car registration' }}</label></label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required>
                {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('county') ? 'has-error' : ''}}">
                <label for="county" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label></label><span style="color: #FF0033;"> *</span>
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
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>
