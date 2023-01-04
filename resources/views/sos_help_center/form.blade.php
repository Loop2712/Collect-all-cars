<div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_help_center->lat) ? $sos_help_center->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_help_center->lng) ? $sos_help_center->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_sos') ? 'has-error' : ''}}">
    <label for="photo_sos" class="control-label">{{ 'Photo Sos' }}</label>
    <input class="form-control" name="photo_sos" type="file" id="photo_sos" value="{{ isset($sos_help_center->photo_sos) ? $sos_help_center->photo_sos : ''}}" >
    {!! $errors->first('photo_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}" >
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_user') ? 'has-error' : ''}}">
    <label for="phone_user" class="control-label">{{ 'Phone User' }}</label>
    <input class="form-control" name="phone_user" type="text" id="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}" >
    {!! $errors->first('phone_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_help_center->user_id) ? $sos_help_center->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_helper') ? 'has-error' : ''}}">
    <label for="organization_helper" class="control-label">{{ 'Organization Helper' }}</label>
    <input class="form-control" name="organization_helper" type="text" id="organization_helper" value="{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}" >
    {!! $errors->first('organization_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_helper') ? 'has-error' : ''}}">
    <label for="name_helper" class="control-label">{{ 'Name Helper' }}</label>
    <input class="form-control" name="name_helper" type="text" id="name_helper" value="{{ isset($sos_help_center->name_helper) ? $sos_help_center->name_helper : ''}}" >
    {!! $errors->first('name_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($sos_help_center->partner_id) ? $sos_help_center->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('helper_id') ? 'has-error' : ''}}">
    <label for="helper_id" class="control-label">{{ 'Helper Id' }}</label>
    <input class="form-control" name="helper_id" type="number" id="helper_id" value="{{ isset($sos_help_center->helper_id) ? $sos_help_center->helper_id : ''}}" >
    {!! $errors->first('helper_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_impression') ? 'has-error' : ''}}">
    <label for="score_impression" class="control-label">{{ 'Score Impression' }}</label>
    <input class="form-control" name="score_impression" type="number" id="score_impression" value="{{ isset($sos_help_center->score_impression) ? $sos_help_center->score_impression : ''}}" >
    {!! $errors->first('score_impression', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_period') ? 'has-error' : ''}}">
    <label for="score_period" class="control-label">{{ 'Score Period' }}</label>
    <input class="form-control" name="score_period" type="number" id="score_period" value="{{ isset($sos_help_center->score_period) ? $sos_help_center->score_period : ''}}" >
    {!! $errors->first('score_period', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_total') ? 'has-error' : ''}}">
    <label for="score_total" class="control-label">{{ 'Score Total' }}</label>
    <input class="form-control" name="score_total" type="number" id="score_total" value="{{ isset($sos_help_center->score_total) ? $sos_help_center->score_total : ''}}" >
    {!! $errors->first('score_total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('commemt_help') ? 'has-error' : ''}}">
    <label for="commemt_help" class="control-label">{{ 'Commemt Help' }}</label>
    <input class="form-control" name="commemt_help" type="text" id="commemt_help" value="{{ isset($sos_help_center->commemt_help) ? $sos_help_center->commemt_help : ''}}" >
    {!! $errors->first('commemt_help', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_succeed') ? 'has-error' : ''}}">
    <label for="photo_succeed" class="control-label">{{ 'Photo Succeed' }}</label>
    <input class="form-control" name="photo_succeed" type="file" id="photo_succeed" value="{{ isset($sos_help_center->photo_succeed) ? $sos_help_center->photo_succeed : ''}}" >
    {!! $errors->first('photo_succeed', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_succeed_by') ? 'has-error' : ''}}">
    <label for="photo_succeed_by" class="control-label">{{ 'Photo Succeed By' }}</label>
    <input class="form-control" name="photo_succeed_by" type="file" id="photo_succeed_by" value="{{ isset($sos_help_center->photo_succeed_by) ? $sos_help_center->photo_succeed_by : ''}}" >
    {!! $errors->first('photo_succeed_by', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark_helper') ? 'has-error' : ''}}">
    <label for="remark_helper" class="control-label">{{ 'Remark Helper' }}</label>
    <input class="form-control" name="remark_helper" type="text" id="remark_helper" value="{{ isset($sos_help_center->remark_helper) ? $sos_help_center->remark_helper : ''}}" >
    {!! $errors->first('remark_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notify') ? 'has-error' : ''}}">
    <label for="notify" class="control-label">{{ 'Notify' }}</label>
    <input class="form-control" name="notify" type="text" id="notify" value="{{ isset($sos_help_center->notify) ? $sos_help_center->notify : ''}}" >
    {!! $errors->first('notify', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_help_center->status) ? $sos_help_center->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('help_complete_time') ? 'has-error' : ''}}">
    <label for="help_complete_time" class="control-label">{{ 'Help Complete Time' }}</label>
    <input class="form-control" name="help_complete_time" type="datetime-local" id="help_complete_time" value="{{ isset($sos_help_center->help_complete_time) ? $sos_help_center->help_complete_time : ''}}" >
    {!! $errors->first('help_complete_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_go_to_help') ? 'has-error' : ''}}">
    <label for="time_go_to_help" class="control-label">{{ 'Time Go To Help' }}</label>
    <input class="form-control" name="time_go_to_help" type="datetime-local" id="time_go_to_help" value="{{ isset($sos_help_center->time_go_to_help) ? $sos_help_center->time_go_to_help : ''}}" >
    {!! $errors->first('time_go_to_help', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
