<div class="form-group {{ $errors->has('groupId') ? 'has-error' : ''}}">
    <label for="groupId" class="control-label">{{ 'Groupid' }}</label>
    <input class="form-control" name="groupId" type="text" id="groupId" value="{{ isset($nationalitie_group_line->groupId) ? $nationalitie_group_line->groupId : ''}}" >
    {!! $errors->first('groupId', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('groupName') ? 'has-error' : ''}}">
    <label for="groupName" class="control-label">{{ 'Groupname' }}</label>
    <input class="form-control" name="groupName" type="text" id="groupName" value="{{ isset($nationalitie_group_line->groupName) ? $nationalitie_group_line->groupName : ''}}" >
    {!! $errors->first('groupName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pictureUrl') ? 'has-error' : ''}}">
    <label for="pictureUrl" class="control-label">{{ 'Pictureurl' }}</label>
    <input class="form-control" name="pictureUrl" type="text" id="pictureUrl" value="{{ isset($nationalitie_group_line->pictureUrl) ? $nationalitie_group_line->pictureUrl : ''}}" >
    {!! $errors->first('pictureUrl', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
    <label for="language" class="control-label">{{ 'Language' }}</label>
    <input class="form-control" name="language" type="text" id="language" value="{{ isset($nationalitie_group_line->language) ? $nationalitie_group_line->language : ''}}" >
    {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_nationalitie') ? 'has-error' : ''}}">
    <label for="id_nationalitie" class="control-label">{{ 'Id Nationalitie' }}</label>
    <input class="form-control" name="id_nationalitie" type="text" id="id_nationalitie" value="{{ isset($nationalitie_group_line->id_nationalitie) ? $nationalitie_group_line->id_nationalitie : ''}}" >
    {!! $errors->first('id_nationalitie', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
