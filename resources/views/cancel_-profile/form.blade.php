<div class="form-group {{ $errors->has('reason') ? 'has-error' : ''}}">
    <label for="reason" class="control-label">{{ 'Reason' }}</label>
    <input class="form-control" name="reason" type="text" id="reason" value="{{ isset($cancel_profile->reason) ? $cancel_profile->reason : ''}}" >
    {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reason_other') ? 'has-error' : ''}}">
    <label for="reason_other" class="control-label">{{ 'Reason Other' }}</label>
    <input class="form-control" name="reason_other" type="text" id="reason_other" value="{{ isset($cancel_profile->reason_other) ? $cancel_profile->reason_other : ''}}" >
    {!! $errors->first('reason_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amend') ? 'has-error' : ''}}">
    <label for="amend" class="control-label">{{ 'Amend' }}</label>
    <input class="form-control" name="amend" type="text" id="amend" value="{{ isset($cancel_profile->amend) ? $cancel_profile->amend : ''}}" >
    {!! $errors->first('amend', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($cancel_profile->user_id) ? $cancel_profile->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
