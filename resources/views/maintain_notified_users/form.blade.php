<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($maintain_notified_user->name) ? $maintain_notified_user->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'Department' }}</label>
    <input class="form-control" name="department" type="text" id="department" value="{{ isset($maintain_notified_user->department) ? $maintain_notified_user->department : ''}}" >
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="number" id="position" value="{{ isset($maintain_notified_user->position) ? $maintain_notified_user->position : ''}}" >
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($maintain_notified_user->user_id) ? $maintain_notified_user->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
