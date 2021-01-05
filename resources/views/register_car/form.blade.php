<div class="container">
    <div class="row">
        <!-- ข้อมูลเจ้าของรถ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลเจ้าของรถ' }}</span><span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล)</span>
            <br><br>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <input class="form-control" name="name" type="text" id="name" value="{{ isset($register_car->name) ? $register_car->name : Auth::user()->name}}" required placeholder="ชื่อ">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone : ''}}" required placeholder="เบอร์โทร">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลรถ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถ' }}</span><span style="color: #FF0033;"> *</span>
            <br><br>
            <div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($register_car->brand) ? $register_car->brand : ''}}" required placeholder="ยี่ห้อรถยนต์ของคุณ">
                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('generation') ? 'has-error' : ''}}">
                <input class="form-control" name="generation" type="text" id="generation" value="{{ isset($register_car->generation) ? $register_car->generation : ''}}" placeholder="รุ่นรถยนต์ของคุณ" required>
                {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                <input class="form-control" name="year" type="text" id="year" value="{{ isset($register_car->year) ? $register_car->year : ''}}" placeholder="ปี่ที่ผลิตรถยนต์ของคุณ">
                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                <input class="form-control" name="registration_number" type="text" id="registration_number" value="{{ isset($register_car->registration_number) ? $register_car->registration_number : ''}}" placeholder="ทะเบียนรถของคุณ" required>
                {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                <input class="form-control" name="province" type="text" id="province" value="{{ isset($register_car->province) ? $register_car->province : ''}}" required placeholder="จังหวัดทะเบียนรถของคุณ">
                {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>
