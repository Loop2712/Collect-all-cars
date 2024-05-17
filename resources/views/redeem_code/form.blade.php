<div class="form-group {{ $errors->has('redeem_code') ? 'has-error' : ''}}">
    <label for="redeem_code" class="control-label">{{ 'Redeem Code' }}</label>
    <input class="form-control" name="redeem_code" type="text" id="redeem_code" value="{{ isset($redeem_code->redeem_code) ? $redeem_code->redeem_code : ''}}" >
    {!! $errors->first('redeem_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('privilege_id') ? 'has-error' : ''}}">
    <label for="privilege_id" class="control-label">{{ 'Privilege Id' }}</label>
    <input class="form-control" name="privilege_id" type="number" id="privilege_id" value="{{ isset($redeem_code->privilege_id) ? $redeem_code->privilege_id : ''}}" >
    {!! $errors->first('privilege_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($redeem_code->status) ? $redeem_code->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_update_status') ? 'has-error' : ''}}">
    <label for="time_update_status" class="control-label">{{ 'Time Update Status' }}</label>
    <input class="form-control" name="time_update_status" type="datetime-local" id="time_update_status" value="{{ isset($redeem_code->time_update_status) ? $redeem_code->time_update_status : ''}}" >
    {!! $errors->first('time_update_status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
