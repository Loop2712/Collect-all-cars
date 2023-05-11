<div class="form-group {{ $errors->has('name_officer_command') ? 'has-error' : ''}}">
    <label for="name_officer_command" class="control-label">{{ 'Name Officer Command' }}</label>
    <input class="form-control" name="name_officer_command" type="text" id="name_officer_command" value="{{ isset($data_1669_officer_command->name_officer_command) ? $data_1669_officer_command->name_officer_command : ''}}" >
    {!! $errors->first('name_officer_command', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($data_1669_officer_command->user_id) ? $data_1669_officer_command->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($data_1669_officer_command->area) ? $data_1669_officer_command->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_role') ? 'has-error' : ''}}">
    <label for="officer_role" class="control-label">{{ 'Officer Role' }}</label>
    <input class="form-control" name="officer_role" type="text" id="officer_role" value="{{ isset($data_1669_officer_command->officer_role) ? $data_1669_officer_command->officer_role : ''}}" >
    {!! $errors->first('officer_role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
    <label for="number" class="control-label">{{ 'Number' }}</label>
    <input class="form-control" name="number" type="text" id="number" value="{{ isset($data_1669_officer_command->number) ? $data_1669_officer_command->number : ''}}" >
    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($data_1669_officer_command->status) ? $data_1669_officer_command->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('creator') ? 'has-error' : ''}}">
    <label for="creator" class="control-label">{{ 'Creator' }}</label>
    <input class="form-control" name="creator" type="text" id="creator" value="{{ isset($data_1669_officer_command->creator) ? $data_1669_officer_command->creator : ''}}" >
    {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
