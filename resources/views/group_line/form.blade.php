<div class="form-group {{ $errors->has('groupId') ? 'has-error' : ''}}">
    <label for="groupId" class="control-label">{{ 'Groupid' }}</label>
    <input class="form-control" name="groupId" type="text" id="groupId" value="{{ isset($group_line->groupId) ? $group_line->groupId : ''}}" >
    {!! $errors->first('groupId', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('groupName') ? 'has-error' : ''}}">
    <label for="groupName" class="control-label">{{ 'Groupname' }}</label>
    <input class="form-control" name="groupName" type="text" id="groupName" value="{{ isset($group_line->groupName) ? $group_line->groupName : ''}}" >
    {!! $errors->first('groupName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pictureUrl') ? 'has-error' : ''}}">
    <label for="pictureUrl" class="control-label">{{ 'Pictureurl' }}</label>
    <input class="form-control" name="pictureUrl" type="text" id="pictureUrl" value="{{ isset($group_line->pictureUrl) ? $group_line->pictureUrl : ''}}" >
    {!! $errors->first('pictureUrl', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
