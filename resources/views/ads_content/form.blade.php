<div class="form-group {{ $errors->has('name_content') ? 'has-error' : ''}}">
    <label for="name_content" class="control-label">{{ 'Name Content' }}</label>
    <input class="form-control" name="name_content" type="text" id="name_content" value="{{ isset($ads_content->name_content) ? $ads_content->name_content : ''}}" >
    {!! $errors->first('name_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($ads_content->detail) ? $ads_content->detail : ''}}" >
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($ads_content->link) ? $ads_content->link : ''}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($ads_content->photo) ? $ads_content->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_content') ? 'has-error' : ''}}">
    <label for="type_content" class="control-label">{{ 'Type Content' }}</label>
    <input class="form-control" name="type_content" type="text" id="type_content" value="{{ isset($ads_content->type_content) ? $ads_content->type_content : ''}}" >
    {!! $errors->first('type_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($ads_content->name_partner) ? $ads_content->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_partner') ? 'has-error' : ''}}">
    <label for="id_partner" class="control-label">{{ 'Id Partner' }}</label>
    <input class="form-control" name="id_partner" type="number" id="id_partner" value="{{ isset($ads_content->id_partner) ? $ads_content->id_partner : ''}}" >
    {!! $errors->first('id_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('show_user') ? 'has-error' : ''}}">
    <label for="show_user" class="control-label">{{ 'Show User' }}</label>
    <input class="form-control" name="show_user" type="text" id="show_user" value="{{ isset($ads_content->show_user) ? $ads_content->show_user : ''}}" >
    {!! $errors->first('show_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_click') ? 'has-error' : ''}}">
    <label for="user_click" class="control-label">{{ 'User Click' }}</label>
    <input class="form-control" name="user_click" type="text" id="user_click" value="{{ isset($ads_content->user_click) ? $ads_content->user_click : ''}}" >
    {!! $errors->first('user_click', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
