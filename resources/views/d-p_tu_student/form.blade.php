<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($dp_tu_student->name) ? $dp_tu_student->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ isset($dp_tu_student->last_name) ? $dp_tu_student->last_name : ''}}" >
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('faculty') ? 'has-error' : ''}}">
    <label for="faculty" class="control-label">{{ 'Faculty' }}</label>
    <input class="form-control" name="faculty" type="text" id="faculty" value="{{ isset($dp_tu_student->faculty) ? $dp_tu_student->faculty : ''}}" >
    {!! $errors->first('faculty', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'Department' }}</label>
    <input class="form-control" name="department" type="text" id="department" value="{{ isset($dp_tu_student->department) ? $dp_tu_student->department : ''}}" >
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
    <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($dp_tu_student->student_id) ? $dp_tu_student->student_id : ''}}" >
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_line') ? 'has-error' : ''}}">
    <label for="status_line" class="control-label">{{ 'Status Line' }}</label>
    <input class="form-control" name="status_line" type="text" id="status_line" value="{{ isset($dp_tu_student->status_line) ? $dp_tu_student->status_line : ''}}" >
    {!! $errors->first('status_line', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($dp_tu_student->user_id) ? $dp_tu_student->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
