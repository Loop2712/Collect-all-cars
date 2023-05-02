<div class="form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'Name Officer' }}</label>
    <input class="form-control" name="name_officer" type="text" id="name_officer" value="{{ isset($nationalitie_officer->name_officer) ? $nationalitie_officer->name_officer : ''}}" >
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_officer') ? 'has-error' : ''}}">
    <label for="phone_officer" class="control-label">{{ 'Phone Officer' }}</label>
    <input class="form-control" name="phone_officer" type="text" id="phone_officer" value="{{ isset($nationalitie_officer->phone_officer) ? $nationalitie_officer->phone_officer : ''}}" >
    {!! $errors->first('phone_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_officer') ? 'has-error' : ''}}">
    <label for="photo_officer" class="control-label">{{ 'Photo Officer' }}</label>
    <input class="form-control" name="photo_officer" type="text" id="photo_officer" value="{{ isset($nationalitie_officer->photo_officer) ? $nationalitie_officer->photo_officer : ''}}" >
    {!! $errors->first('photo_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($nationalitie_officer->user_id) ? $nationalitie_officer->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_line_id') ? 'has-error' : ''}}">
    <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label>
    <input class="form-control" name="group_line_id" type="number" id="group_line_id" value="{{ isset($nationalitie_officer->group_line_id) ? $nationalitie_officer->group_line_id : ''}}" >
    {!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('all_case') ? 'has-error' : ''}}">
    <label for="all_case" class="control-label">{{ 'All Case' }}</label>
    <input class="form-control" name="all_case" type="text" id="all_case" value="{{ isset($nationalitie_officer->all_case) ? $nationalitie_officer->all_case : ''}}" >
    {!! $errors->first('all_case', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_per_case') ? 'has-error' : ''}}">
    <label for="score_per_case" class="control-label">{{ 'Score Per Case' }}</label>
    <input class="form-control" name="score_per_case" type="number" id="score_per_case" value="{{ isset($nationalitie_officer->score_per_case) ? $nationalitie_officer->score_per_case : ''}}" >
    {!! $errors->first('score_per_case', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
