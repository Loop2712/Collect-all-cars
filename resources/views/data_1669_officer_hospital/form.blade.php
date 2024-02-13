<div class="form-group {{ $errors->has('name_officer_hospital') ? 'has-error' : ''}}">
    <label for="name_officer_hospital" class="control-label">{{ 'Name Officer Hospital' }}</label>
    <input class="form-control" name="name_officer_hospital" type="text" id="name_officer_hospital" value="{{ isset($data_1669_officer_hospital->name_officer_hospital) ? $data_1669_officer_hospital->name_officer_hospital : ''}}" >
    {!! $errors->first('name_officer_hospital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($data_1669_officer_hospital->user_id) ? $data_1669_officer_hospital->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hospital_offices_id') ? 'has-error' : ''}}">
    <label for="hospital_offices_id" class="control-label">{{ 'Hospital Offices Id' }}</label>
    <input class="form-control" name="hospital_offices_id" type="text" id="hospital_offices_id" value="{{ isset($data_1669_officer_hospital->hospital_offices_id) ? $data_1669_officer_hospital->hospital_offices_id : ''}}" >
    {!! $errors->first('hospital_offices_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($data_1669_officer_hospital->area) ? $data_1669_officer_hospital->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('creator') ? 'has-error' : ''}}">
    <label for="creator" class="control-label">{{ 'Creator' }}</label>
    <input class="form-control" name="creator" type="text" id="creator" value="{{ isset($data_1669_officer_hospital->creator) ? $data_1669_officer_hospital->creator : ''}}" >
    {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($data_1669_officer_hospital->status) ? $data_1669_officer_hospital->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
