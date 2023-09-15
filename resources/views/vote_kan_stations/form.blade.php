<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($vote_kan_station->name) ? $vote_kan_station->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
    <label for="province" class="control-label">{{ 'Province' }}</label>
    <input class="form-control" name="province" type="text" id="province" value="{{ isset($vote_kan_station->province) ? $vote_kan_station->province : ''}}" >
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amphoe') ? 'has-error' : ''}}">
    <label for="amphoe" class="control-label">{{ 'Amphoe' }}</label>
    <input class="form-control" name="amphoe" type="text" id="amphoe" value="{{ isset($vote_kan_station->amphoe) ? $vote_kan_station->amphoe : ''}}" >
    {!! $errors->first('amphoe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tambon') ? 'has-error' : ''}}">
    <label for="tambon" class="control-label">{{ 'Tambon' }}</label>
    <input class="form-control" name="tambon" type="text" id="tambon" value="{{ isset($vote_kan_station->tambon) ? $vote_kan_station->tambon : ''}}" >
    {!! $errors->first('tambon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($vote_kan_station->area) ? $vote_kan_station->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($vote_kan_station->user_id) ? $vote_kan_station->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($vote_kan_station->name_user) ? $vote_kan_station->name_user : ''}}" >
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
