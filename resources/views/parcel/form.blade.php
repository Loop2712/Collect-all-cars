<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($parcel->photo) ? $parcel->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_staff') ? 'has-error' : ''}}">
    <label for="name_staff" class="control-label">{{ 'Name Staff' }}</label>
    <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ isset($parcel->name_staff) ? $parcel->name_staff : ''}}" >
    {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
    <label for="time_in" class="control-label">{{ 'Time In' }}</label>
    <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ isset($parcel->time_in) ? $parcel->time_in : ''}}" >
    {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
    <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
    <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ isset($parcel->time_out) ? $parcel->time_out : ''}}" >
    {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($parcel->staff_id) ? $parcel->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ isset($parcel->condo_id) ? $parcel->condo_id : ''}}" >
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_condo_id') ? 'has-error' : ''}}">
    <label for="user_condo_id" class="control-label">{{ 'User Condo Id' }}</label>
    <input class="form-control" name="user_condo_id" type="number" id="user_condo_id" value="{{ isset($parcel->user_condo_id) ? $parcel->user_condo_id : ''}}" >
    {!! $errors->first('user_condo_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
