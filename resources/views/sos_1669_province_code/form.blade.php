<div class="form-group {{ $errors->has('area_code') ? 'has-error' : ''}}">
    <label for="area_code" class="control-label">{{ 'Area Code' }}</label>
    <input class="form-control" name="area_code" type="text" id="area_code" value="{{ isset($sos_1669_province_code->area_code) ? $sos_1669_province_code->area_code : ''}}" >
    {!! $errors->first('area_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_code') ? 'has-error' : ''}}">
    <label for="province_code" class="control-label">{{ 'Province Code' }}</label>
    <input class="form-control" name="province_code" type="text" id="province_code" value="{{ isset($sos_1669_province_code->province_code) ? $sos_1669_province_code->province_code : ''}}" >
    {!! $errors->first('province_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_name') ? 'has-error' : ''}}">
    <label for="province_name" class="control-label">{{ 'Province Name' }}</label>
    <input class="form-control" name="province_name" type="text" id="province_name" value="{{ isset($sos_1669_province_code->province_name) ? $sos_1669_province_code->province_name : ''}}" >
    {!! $errors->first('province_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('district_code') ? 'has-error' : ''}}">
    <label for="district_code" class="control-label">{{ 'District Code' }}</label>
    <input class="form-control" name="district_code" type="text" id="district_code" value="{{ isset($sos_1669_province_code->district_code) ? $sos_1669_province_code->district_code : ''}}" >
    {!! $errors->first('district_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('district_name') ? 'has-error' : ''}}">
    <label for="district_name" class="control-label">{{ 'District Name' }}</label>
    <input class="form-control" name="district_name" type="text" id="district_name" value="{{ isset($sos_1669_province_code->district_name) ? $sos_1669_province_code->district_name : ''}}" >
    {!! $errors->first('district_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_district_code') ? 'has-error' : ''}}">
    <label for="sub_district_code" class="control-label">{{ 'Sub District Code' }}</label>
    <input class="form-control" name="sub_district_code" type="text" id="sub_district_code" value="{{ isset($sos_1669_province_code->sub_district_code) ? $sos_1669_province_code->sub_district_code : ''}}" >
    {!! $errors->first('sub_district_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_district_name') ? 'has-error' : ''}}">
    <label for="sub_district_name" class="control-label">{{ 'Sub District Name' }}</label>
    <input class="form-control" name="sub_district_name" type="text" id="sub_district_name" value="{{ isset($sos_1669_province_code->sub_district_name) ? $sos_1669_province_code->sub_district_name : ''}}" >
    {!! $errors->first('sub_district_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('count_sos') ? 'has-error' : ''}}">
    <label for="count_sos" class="control-label">{{ 'Count Sos' }}</label>
    <input class="form-control" name="count_sos" type="text" id="count_sos" value="{{ isset($sos_1669_province_code->count_sos) ? $sos_1669_province_code->count_sos : ''}}" >
    {!! $errors->first('count_sos', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
