<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($notify_repair->title) ? $notify_repair->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($notify_repair->content) ? $notify_repair->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($notify_repair->photo) ? $notify_repair->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($notify_repair->status) ? $notify_repair->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_wait_cf') ? 'has-error' : ''}}">
    <label for="time_wait_cf" class="control-label">{{ 'Time Wait Cf' }}</label>
    <input class="form-control" name="time_wait_cf" type="datetime-local" id="time_wait_cf" value="{{ isset($notify_repair->time_wait_cf) ? $notify_repair->time_wait_cf : ''}}" >
    {!! $errors->first('time_wait_cf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_pending') ? 'has-error' : ''}}">
    <label for="time_pending" class="control-label">{{ 'Time Pending' }}</label>
    <input class="form-control" name="time_pending" type="datetime-local" id="time_pending" value="{{ isset($notify_repair->time_pending) ? $notify_repair->time_pending : ''}}" >
    {!! $errors->first('time_pending', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_finished') ? 'has-error' : ''}}">
    <label for="time_finished" class="control-label">{{ 'Time Finished' }}</label>
    <input class="form-control" name="time_finished" type="datetime-local" id="time_finished" value="{{ isset($notify_repair->time_finished) ? $notify_repair->time_finished : ''}}" >
    {!! $errors->first('time_finished', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_date') ? 'has-error' : ''}}">
    <label for="appointment_date" class="control-label">{{ 'Appointment Date' }}</label>
    <input class="form-control" name="appointment_date" type="text" id="appointment_date" value="{{ isset($notify_repair->appointment_date) ? $notify_repair->appointment_date : ''}}" >
    {!! $errors->first('appointment_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_time') ? 'has-error' : ''}}">
    <label for="appointment_time" class="control-label">{{ 'Appointment Time' }}</label>
    <input class="form-control" name="appointment_time" type="text" id="appointment_time" value="{{ isset($notify_repair->appointment_time) ? $notify_repair->appointment_time : ''}}" >
    {!! $errors->first('appointment_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_staff') ? 'has-error' : ''}}">
    <label for="name_staff" class="control-label">{{ 'Name Staff' }}</label>
    <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ isset($notify_repair->name_staff) ? $notify_repair->name_staff : ''}}" >
    {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($notify_repair->staff_id) ? $notify_repair->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ isset($notify_repair->condo_id) ? $notify_repair->condo_id : ''}}" >
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_condo_id') ? 'has-error' : ''}}">
    <label for="user_condo_id" class="control-label">{{ 'User Condo Id' }}</label>
    <input class="form-control" name="user_condo_id" type="number" id="user_condo_id" value="{{ isset($notify_repair->user_condo_id) ? $notify_repair->user_condo_id : ''}}" >
    {!! $errors->first('user_condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('building') ? 'has-error' : ''}}">
    <label for="building" class="control-label">{{ 'Building' }}</label>
    <input class="form-control" name="building" type="text" id="building" value="{{ isset($notify_repair->building) ? $notify_repair->building : ''}}" >
    {!! $errors->first('building', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ isset($notify_repair->category) ? $notify_repair->category : ''}}" >
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
