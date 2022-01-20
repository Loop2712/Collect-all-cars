<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($check_in_kmutnb->user_id) ? $check_in_kmutnb->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
    <label for="time_in" class="control-label">{{ 'Time In' }}</label>
    <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ isset($check_in_kmutnb->time_in) ? $check_in_kmutnb->time_in : ''}}" >
    {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
    <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
    <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ isset($check_in_kmutnb->time_out) ? $check_in_kmutnb->time_out : ''}}" >
    {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
