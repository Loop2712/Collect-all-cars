<div class="form-group {{ $errors->has('code_9_digit') ? 'has-error' : ''}}">
    <label for="code_9_digit" class="control-label">{{ 'Code 9 Digit' }}</label>
    <input class="form-control" name="code_9_digit" type="text" id="code_9_digit" value="{{ isset($hospital_office->code_9_digit) ? $hospital_office->code_9_digit : ''}}" >
    {!! $errors->first('code_9_digit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code_5_digit') ? 'has-error' : ''}}">
    <label for="code_5_digit" class="control-label">{{ 'Code 5 Digit' }}</label>
    <input class="form-control" name="code_5_digit" type="text" id="code_5_digit" value="{{ isset($hospital_office->code_5_digit) ? $hospital_office->code_5_digit : ''}}" >
    {!! $errors->first('code_5_digit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code_11_digit') ? 'has-error' : ''}}">
    <label for="code_11_digit" class="control-label">{{ 'Code 11 Digit' }}</label>
    <input class="form-control" name="code_11_digit" type="text" id="code_11_digit" value="{{ isset($hospital_office->code_11_digit) ? $hospital_office->code_11_digit : ''}}" >
    {!! $errors->first('code_11_digit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_type') ? 'has-error' : ''}}">
    <label for="organization_type" class="control-label">{{ 'Organization Type' }}</label>
    <input class="form-control" name="organization_type" type="text" id="organization_type" value="{{ isset($hospital_office->organization_type) ? $hospital_office->organization_type : ''}}" >
    {!! $errors->first('organization_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('health_type') ? 'has-error' : ''}}">
    <label for="health_type" class="control-label">{{ 'Health Type' }}</label>
    <input class="form-control" name="health_type" type="text" id="health_type" value="{{ isset($hospital_office->health_type) ? $hospital_office->health_type : ''}}" >
    {!! $errors->first('health_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('affiliation') ? 'has-error' : ''}}">
    <label for="affiliation" class="control-label">{{ 'Affiliation' }}</label>
    <input class="form-control" name="affiliation" type="text" id="affiliation" value="{{ isset($hospital_office->affiliation) ? $hospital_office->affiliation : ''}}" >
    {!! $errors->first('affiliation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'Department' }}</label>
    <input class="form-control" name="department" type="text" id="department" value="{{ isset($hospital_office->department) ? $hospital_office->department : ''}}" >
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('actual_bed') ? 'has-error' : ''}}">
    <label for="actual_bed" class="control-label">{{ 'Actual Bed' }}</label>
    <input class="form-control" name="actual_bed" type="text" id="actual_bed" value="{{ isset($hospital_office->actual_bed) ? $hospital_office->actual_bed : ''}}" >
    {!! $errors->first('actual_bed', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('usage_status') ? 'has-error' : ''}}">
    <label for="usage_status" class="control-label">{{ 'Usage Status' }}</label>
    <input class="form-control" name="usage_status" type="text" id="usage_status" value="{{ isset($hospital_office->usage_status) ? $hospital_office->usage_status : ''}}" >
    {!! $errors->first('usage_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('service_area') ? 'has-error' : ''}}">
    <label for="service_area" class="control-label">{{ 'Service Area' }}</label>
    <input class="form-control" name="service_area" type="text" id="service_area" value="{{ isset($hospital_office->service_area) ? $hospital_office->service_area : ''}}" >
    {!! $errors->first('service_area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($hospital_office->address) ? $hospital_office->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
    <label for="province" class="control-label">{{ 'Province' }}</label>
    <input class="form-control" name="province" type="text" id="province" value="{{ isset($hospital_office->province) ? $hospital_office->province : ''}}" >
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
    <label for="district" class="control-label">{{ 'District' }}</label>
    <input class="form-control" name="district" type="text" id="district" value="{{ isset($hospital_office->district) ? $hospital_office->district : ''}}" >
    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_district') ? 'has-error' : ''}}">
    <label for="sub_district" class="control-label">{{ 'Sub District' }}</label>
    <input class="form-control" name="sub_district" type="text" id="sub_district" value="{{ isset($hospital_office->sub_district) ? $hospital_office->sub_district : ''}}" >
    {!! $errors->first('sub_district', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('village') ? 'has-error' : ''}}">
    <label for="village" class="control-label">{{ 'Village' }}</label>
    <input class="form-control" name="village" type="text" id="village" value="{{ isset($hospital_office->village) ? $hospital_office->village : ''}}" >
    {!! $errors->first('village', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
    <label for="zip_code" class="control-label">{{ 'Zip Code' }}</label>
    <input class="form-control" name="zip_code" type="text" id="zip_code" value="{{ isset($hospital_office->zip_code) ? $hospital_office->zip_code : ''}}" >
    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('server') ? 'has-error' : ''}}">
    <label for="server" class="control-label">{{ 'Server' }}</label>
    <input class="form-control" name="server" type="text" id="server" value="{{ isset($hospital_office->server) ? $hospital_office->server : ''}}" >
    {!! $errors->first('server', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('founding_date') ? 'has-error' : ''}}">
    <label for="founding_date" class="control-label">{{ 'Founding Date' }}</label>
    <input class="form-control" name="founding_date" type="text" id="founding_date" value="{{ isset($hospital_office->founding_date) ? $hospital_office->founding_date : ''}}" >
    {!! $errors->first('founding_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('closing_date') ? 'has-error' : ''}}">
    <label for="closing_date" class="control-label">{{ 'Closing Date' }}</label>
    <input class="form-control" name="closing_date" type="text" id="closing_date" value="{{ isset($hospital_office->closing_date) ? $hospital_office->closing_date : ''}}" >
    {!! $errors->first('closing_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('latest_update') ? 'has-error' : ''}}">
    <label for="latest_update" class="control-label">{{ 'Latest Update' }}</label>
    <input class="form-control" name="latest_update" type="text" id="latest_update" value="{{ isset($hospital_office->latest_update) ? $hospital_office->latest_update : ''}}" >
    {!! $errors->first('latest_update', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
