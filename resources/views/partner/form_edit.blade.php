
<div class="col-12">
    <div class="row">
        <div class="col-4">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="control-label">{{ 'ชื่อพาร์ทเนอร์' }}</label>
                <input class="form-control" name="name" type="text" id="name" value="{{ isset($partner->name) ? $partner->name : ''}}" required>
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label for="phone" class="control-label">{{ 'เบอร์' }}</label>
                <input class="form-control" name="phone" type="phone" id="phone" value="{{ isset($partner->phone) ? $partner->phone : ''}}" required pattern="[0-9]{9-10}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
                <label for="mail" class="control-label">{{ 'mail' }}</label>
                <input class="form-control" name="mail" type="mail" id="mail" value="{{ isset($partner->mail) ? $partner->mail : ''}}" required >
                {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
                <label for="logo" class="control-label">{{ 'โลโก้' }}</label>
                <input class="form-control" name="logo" type="file" id="logo" value="{{ isset($partner->logo) ? $partner->logo : ''}}" >
                {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group {{ $errors->has('type_partner') ? 'has-error' : ''}}">
                <label for="type_partner" class="control-label">{{ 'ประเภทพาร์ทเนอร์' }}</label>

                <select name="type_partner" class="form-control"  id="type_partner">
                        <option selected value="">- กรุณาเลือก -</option>
                        <option value="university">- สถานศึกษา -</option>
                        <option value="government">- สถานที่ราชการ -</option>
                        <option value="company">- บริษัทเอกชน -</option>
                        <option value="condo">- คอนโด -</option>
                        <option value="other">- อื่นๆ -</option>
                </select>
                {!! $errors->first('type_partner', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group {{ $errors->has('type_partner') ? 'has-error' : ''}}">
                <label for="full_name" class="control-label">{{ 'ชื่อเต็ม' }}</label>
                <input class="form-control" name="full_name" type="text" id="full_name" value="{{ isset($partner->full_name) ? $partner->full_name : ''}}" required >
                {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="btn_submit_new_partner" class="form-group col-12">
            <br>
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
        </div>
    </div>
</div>




