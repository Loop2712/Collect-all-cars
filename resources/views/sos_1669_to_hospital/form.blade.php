<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($sos_1669_to_hospital->area) ? $sos_1669_to_hospital->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_hospital_id') ? 'has-error' : ''}}">
    <label for="officer_hospital_id" class="control-label">{{ 'Officer Hospital Id' }}</label>
    <input class="form-control" name="officer_hospital_id" type="text" id="officer_hospital_id" value="{{ isset($sos_1669_to_hospital->officer_hospital_id) ? $sos_1669_to_hospital->officer_hospital_id : ''}}" >
    {!! $errors->first('officer_hospital_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('command_id') ? 'has-error' : ''}}">
    <label for="command_id" class="control-label">{{ 'Command Id' }}</label>
    <input class="form-control" name="command_id" type="text" id="command_id" value="{{ isset($sos_1669_to_hospital->command_id) ? $sos_1669_to_hospital->command_id : ''}}" >
    {!! $errors->first('command_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sos_help_center_id') ? 'has-error' : ''}}">
    <label for="sos_help_center_id" class="control-label">{{ 'Sos Help Center Id' }}</label>
    <input class="form-control" name="sos_help_center_id" type="text" id="sos_help_center_id" value="{{ isset($sos_1669_to_hospital->sos_help_center_id) ? $sos_1669_to_hospital->sos_help_center_id : ''}}" >
    {!! $errors->first('sos_help_center_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('form_yellow_id') ? 'has-error' : ''}}">
    <label for="form_yellow_id" class="control-label">{{ 'Form Yellow Id' }}</label>
    <input class="form-control" name="form_yellow_id" type="text" id="form_yellow_id" value="{{ isset($sos_1669_to_hospital->form_yellow_id) ? $sos_1669_to_hospital->form_yellow_id : ''}}" >
    {!! $errors->first('form_yellow_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_1669_to_hospital->status) ? $sos_1669_to_hospital->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
