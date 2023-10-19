<div class="form-group {{ $errors->has('sos_map_id') ? 'has-error' : ''}}">
    <label for="sos_map_id" class="control-label">{{ 'Sos Map Id' }}</label>
    <input class="form-control" name="sos_map_id" type="text" id="sos_map_id" value="{{ isset($sos_map_wait_delete->sos_map_id) ? $sos_map_wait_delete->sos_map_id : ''}}" >
    {!! $errors->first('sos_map_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_id') ? 'has-error' : ''}}">
    <label for="officer_id" class="control-label">{{ 'Officer Id' }}</label>
    <input class="form-control" name="officer_id" type="text" id="officer_id" value="{{ isset($sos_map_wait_delete->officer_id) ? $sos_map_wait_delete->officer_id : ''}}" >
    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
