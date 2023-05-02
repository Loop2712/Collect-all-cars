<div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($nationalitie_so->lat) ? $nationalitie_so->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($nationalitie_so->lng) ? $nationalitie_so->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($nationalitie_so->name_user) ? $nationalitie_so->name_user : ''}}" >
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_user') ? 'has-error' : ''}}">
    <label for="phone_user" class="control-label">{{ 'Phone User' }}</label>
    <input class="form-control" name="phone_user" type="text" id="phone_user" value="{{ isset($nationalitie_so->phone_user) ? $nationalitie_so->phone_user : ''}}" >
    {!! $errors->first('phone_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
    <label for="id_user" class="control-label">{{ 'Id User' }}</label>
    <input class="form-control" name="id_user" type="number" id="id_user" value="{{ isset($nationalitie_so->id_user) ? $nationalitie_so->id_user : ''}}" >
    {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nationalities_user') ? 'has-error' : ''}}">
    <label for="nationalities_user" class="control-label">{{ 'Nationalities User' }}</label>
    <input class="form-control" name="nationalities_user" type="text" id="nationalities_user" value="{{ isset($nationalitie_so->nationalities_user) ? $nationalitie_so->nationalities_user : ''}}" >
    {!! $errors->first('nationalities_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language_user') ? 'has-error' : ''}}">
    <label for="language_user" class="control-label">{{ 'Language User' }}</label>
    <input class="form-control" name="language_user" type="text" id="language_user" value="{{ isset($nationalitie_so->language_user) ? $nationalitie_so->language_user : ''}}" >
    {!! $errors->first('language_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_helper') ? 'has-error' : ''}}">
    <label for="organization_helper" class="control-label">{{ 'Organization Helper' }}</label>
    <input class="form-control" name="organization_helper" type="text" id="organization_helper" value="{{ isset($nationalitie_so->organization_helper) ? $nationalitie_so->organization_helper : ''}}" >
    {!! $errors->first('organization_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_helper') ? 'has-error' : ''}}">
    <label for="name_helper" class="control-label">{{ 'Name Helper' }}</label>
    <input class="form-control" name="name_helper" type="text" id="name_helper" value="{{ isset($nationalitie_so->name_helper) ? $nationalitie_so->name_helper : ''}}" >
    {!! $errors->first('name_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_helper') ? 'has-error' : ''}}">
    <label for="phone_helper" class="control-label">{{ 'Phone Helper' }}</label>
    <input class="form-control" name="phone_helper" type="text" id="phone_helper" value="{{ isset($nationalitie_so->phone_helper) ? $nationalitie_so->phone_helper : ''}}" >
    {!! $errors->first('phone_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_helper') ? 'has-error' : ''}}">
    <label for="id_helper" class="control-label">{{ 'Id Helper' }}</label>
    <input class="form-control" name="id_helper" type="number" id="id_helper" value="{{ isset($nationalitie_so->id_helper) ? $nationalitie_so->id_helper : ''}}" >
    {!! $errors->first('id_helper', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('organization_other') ? 'has-error' : ''}}">
    <label for="organization_other" class="control-label">{{ 'Organization Other' }}</label>
    <input class="form-control" name="organization_other" type="text" id="organization_other" value="{{ isset($nationalitie_so->organization_other) ? $nationalitie_so->organization_other : ''}}" >
    {!! $errors->first('organization_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_data_sos') ? 'has-error' : ''}}">
    <label for="id_data_sos" class="control-label">{{ 'Id Data Sos' }}</label>
    <input class="form-control" name="id_data_sos" type="number" id="id_data_sos" value="{{ isset($nationalitie_so->id_data_sos) ? $nationalitie_so->id_data_sos : ''}}" >
    {!! $errors->first('id_data_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail_sos') ? 'has-error' : ''}}">
    <label for="detail_sos" class="control-label">{{ 'Detail Sos' }}</label>
    <input class="form-control" name="detail_sos" type="text" id="detail_sos" value="{{ isset($nationalitie_so->detail_sos) ? $nationalitie_so->detail_sos : ''}}" >
    {!! $errors->first('detail_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($nationalitie_so->status) ? $nationalitie_so->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'Name Officer' }}</label>
    <input class="form-control" name="name_officer" type="text" id="name_officer" value="{{ isset($nationalitie_so->name_officer) ? $nationalitie_so->name_officer : ''}}" >
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_officer') ? 'has-error' : ''}}">
    <label for="phone_officer" class="control-label">{{ 'Phone Officer' }}</label>
    <input class="form-control" name="phone_officer" type="text" id="phone_officer" value="{{ isset($nationalitie_so->phone_officer) ? $nationalitie_so->phone_officer : ''}}" >
    {!! $errors->first('phone_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_officer') ? 'has-error' : ''}}">
    <label for="id_officer" class="control-label">{{ 'Id Officer' }}</label>
    <input class="form-control" name="id_officer" type="number" id="id_officer" value="{{ isset($nationalitie_so->id_officer) ? $nationalitie_so->id_officer : ''}}" >
    {!! $errors->first('id_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_impression_officer') ? 'has-error' : ''}}">
    <label for="score_impression_officer" class="control-label">{{ 'Score Impression Officer' }}</label>
    <input class="form-control" name="score_impression_officer" type="number" id="score_impression_officer" value="{{ isset($nationalitie_so->score_impression_officer) ? $nationalitie_so->score_impression_officer : ''}}" >
    {!! $errors->first('score_impression_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_period_officer') ? 'has-error' : ''}}">
    <label for="score_period_officer" class="control-label">{{ 'Score Period Officer' }}</label>
    <input class="form-control" name="score_period_officer" type="number" id="score_period_officer" value="{{ isset($nationalitie_so->score_period_officer) ? $nationalitie_so->score_period_officer : ''}}" >
    {!! $errors->first('score_period_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('score_total_officer') ? 'has-error' : ''}}">
    <label for="score_total_officer" class="control-label">{{ 'Score Total Officer' }}</label>
    <input class="form-control" name="score_total_officer" type="number" id="score_total_officer" value="{{ isset($nationalitie_so->score_total_officer) ? $nationalitie_so->score_total_officer : ''}}" >
    {!! $errors->first('score_total_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('comment_officer') ? 'has-error' : ''}}">
    <label for="comment_officer" class="control-label">{{ 'Comment Officer' }}</label>
    <input class="form-control" name="comment_officer" type="text" id="comment_officer" value="{{ isset($nationalitie_so->comment_officer) ? $nationalitie_so->comment_officer : ''}}" >
    {!! $errors->first('comment_officer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
