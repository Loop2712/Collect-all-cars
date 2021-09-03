<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($cancel_after_6_month->name) ? $cancel_after_6_month->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    <label for="username" class="control-label">{{ 'Username' }}</label>
    <input class="form-control" name="username" type="text" id="username" value="{{ isset($cancel_after_6_month->username) ? $cancel_after_6_month->username : ''}}" >
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($cancel_after_6_month->email) ? $cancel_after_6_month->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
    <label for="provider_id" class="control-label">{{ 'Provider Id' }}</label>
    <input class="form-control" name="provider_id" type="text" id="provider_id" value="{{ isset($cancel_after_6_month->provider_id) ? $cancel_after_6_month->provider_id : ''}}" >
    {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
    <label for="avatar" class="control-label">{{ 'Avatar' }}</label>
    <input class="form-control" name="avatar" type="text" id="avatar" value="{{ isset($cancel_after_6_month->avatar) ? $cancel_after_6_month->avatar : ''}}" >
    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($cancel_after_6_month->role) ? $cancel_after_6_month->role : ''}}" >
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($cancel_after_6_month->type) ? $cancel_after_6_month->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($cancel_after_6_month->phone) ? $cancel_after_6_month->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brith') ? 'has-error' : ''}}">
    <label for="brith" class="control-label">{{ 'Brith' }}</label>
    <input class="form-control" name="brith" type="text" id="brith" value="{{ isset($cancel_after_6_month->brith) ? $cancel_after_6_month->brith : ''}}" >
    {!! $errors->first('brith', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
    <label for="sex" class="control-label">{{ 'Sex' }}</label>
    <input class="form-control" name="sex" type="text" id="sex" value="{{ isset($cancel_after_6_month->sex) ? $cancel_after_6_month->sex : ''}}" >
    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ranking') ? 'has-error' : ''}}">
    <label for="ranking" class="control-label">{{ 'Ranking' }}</label>
    <input class="form-control" name="ranking" type="text" id="ranking" value="{{ isset($cancel_after_6_month->ranking) ? $cancel_after_6_month->ranking : ''}}" >
    {!! $errors->first('ranking', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('driver_license') ? 'has-error' : ''}}">
    <label for="driver_license" class="control-label">{{ 'Driver License' }}</label>
    <input class="form-control" name="driver_license" type="text" id="driver_license" value="{{ isset($cancel_after_6_month->driver_license) ? $cancel_after_6_month->driver_license : ''}}" >
    {!! $errors->first('driver_license', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('driver_license2') ? 'has-error' : ''}}">
    <label for="driver_license2" class="control-label">{{ 'Driver License2' }}</label>
    <input class="form-control" name="driver_license2" type="text" id="driver_license2" value="{{ isset($cancel_after_6_month->driver_license2) ? $cancel_after_6_month->driver_license2 : ''}}" >
    {!! $errors->first('driver_license2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_P') ? 'has-error' : ''}}">
    <label for="location_P" class="control-label">{{ 'Location P' }}</label>
    <input class="form-control" name="location_P" type="text" id="location_P" value="{{ isset($cancel_after_6_month->location_P) ? $cancel_after_6_month->location_P : ''}}" >
    {!! $errors->first('location_P', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_A') ? 'has-error' : ''}}">
    <label for="location_A" class="control-label">{{ 'Location A' }}</label>
    <input class="form-control" name="location_A" type="text" id="location_A" value="{{ isset($cancel_after_6_month->location_A) ? $cancel_after_6_month->location_A : ''}}" >
    {!! $errors->first('location_A', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
    <label for="organization" class="control-label">{{ 'Organization' }}</label>
    <input class="form-control" name="organization" type="text" id="organization" value="{{ isset($cancel_after_6_month->organization) ? $cancel_after_6_month->organization : ''}}" >
    {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
    <label for="branch" class="control-label">{{ 'Branch' }}</label>
    <input class="form-control" name="branch" type="text" id="branch" value="{{ isset($cancel_after_6_month->branch) ? $cancel_after_6_month->branch : ''}}" >
    {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('branch_district') ? 'has-error' : ''}}">
    <label for="branch_district" class="control-label">{{ 'Branch District' }}</label>
    <input class="form-control" name="branch_district" type="text" id="branch_district" value="{{ isset($cancel_after_6_month->branch_district) ? $cancel_after_6_month->branch_district : ''}}" >
    {!! $errors->first('branch_district', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('branch_province') ? 'has-error' : ''}}">
    <label for="branch_province" class="control-label">{{ 'Branch Province' }}</label>
    <input class="form-control" name="branch_province" type="text" id="branch_province" value="{{ isset($cancel_after_6_month->branch_province) ? $cancel_after_6_month->branch_province : ''}}" >
    {!! $errors->first('branch_province', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="text" id="photo" value="{{ isset($cancel_after_6_month->photo) ? $cancel_after_6_month->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
