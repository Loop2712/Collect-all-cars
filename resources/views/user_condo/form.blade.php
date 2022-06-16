<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user_condo->name) ? $user_condo->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ isset($user_condo->last_name) ? $user_condo->last_name : ''}}" >
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($user_condo->phone) ? $user_condo->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_condo') ? 'has-error' : ''}}">
    <label for="name_condo" class="control-label">{{ 'Name Condo' }}</label>
    <input class="form-control" name="name_condo" type="text" id="name_condo" value="{{ isset($user_condo->name_condo) ? $user_condo->name_condo : ''}}" >
    {!! $errors->first('name_condo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('building') ? 'has-error' : ''}}">
    <label for="building" class="control-label">{{ 'Building' }}</label>
    <input class="form-control" name="building" type="text" id="building" value="{{ isset($user_condo->building) ? $user_condo->building : ''}}" >
    {!! $errors->first('building', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('floor') ? 'has-error' : ''}}">
    <label for="floor" class="control-label">{{ 'Floor' }}</label>
    <input class="form-control" name="floor" type="text" id="floor" value="{{ isset($user_condo->floor) ? $user_condo->floor : ''}}" >
    {!! $errors->first('floor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('room_number') ? 'has-error' : ''}}">
    <label for="room_number" class="control-label">{{ 'Room Number' }}</label>
    <input class="form-control" name="room_number" type="text" id="room_number" value="{{ isset($user_condo->room_number) ? $user_condo->room_number : ''}}" >
    {!! $errors->first('room_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rich_menu_language') ? 'has-error' : ''}}">
    <label for="rich_menu_language" class="control-label">{{ 'Rich Menu Language' }}</label>
    <input class="form-control" name="rich_menu_language" type="text" id="rich_menu_language" value="{{ isset($user_condo->rich_menu_language) ? $user_condo->rich_menu_language : ''}}" >
    {!! $errors->first('rich_menu_language', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($user_condo->user_id) ? $user_condo->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ isset($user_condo->condo_id) ? $user_condo->condo_id : ''}}" >
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
