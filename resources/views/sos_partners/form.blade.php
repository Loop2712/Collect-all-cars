<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($sos_partner->name) ? $sos_partner->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_partner->phone) ? $sos_partner->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    <label for="mail" class="control-label">{{ 'Mail' }}</label>
    <input class="form-control" name="mail" type="text" id="mail" value="{{ isset($sos_partner->mail) ? $sos_partner->mail : ''}}" >
    {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <textarea class="form-control" rows="5" name="logo" type="textarea" id="logo" >{{ isset($sos_partner->logo) ? $sos_partner->logo : ''}}</textarea>
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color_main') ? 'has-error' : ''}}">
    <label for="color_main" class="control-label">{{ 'Color Main' }}</label>
    <input class="form-control" name="color_main" type="text" id="color_main" value="{{ isset($sos_partner->color_main) ? $sos_partner->color_main : ''}}" >
    {!! $errors->first('color_main', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color_navbar') ? 'has-error' : ''}}">
    <label for="color_navbar" class="control-label">{{ 'Color Navbar' }}</label>
    <input class="form-control" name="color_navbar" type="text" id="color_navbar" value="{{ isset($sos_partner->color_navbar) ? $sos_partner->color_navbar : ''}}" >
    {!! $errors->first('color_navbar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color_body') ? 'has-error' : ''}}">
    <label for="color_body" class="control-label">{{ 'Color Body' }}</label>
    <input class="form-control" name="color_body" type="text" id="color_body" value="{{ isset($sos_partner->color_body) ? $sos_partner->color_body : ''}}" >
    {!! $errors->first('color_body', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('class_color_menu') ? 'has-error' : ''}}">
    <label for="class_color_menu" class="control-label">{{ 'Class Color Menu' }}</label>
    <input class="form-control" name="class_color_menu" type="text" id="class_color_menu" value="{{ isset($sos_partner->class_color_menu) ? $sos_partner->class_color_menu : ''}}" >
    {!! $errors->first('class_color_menu', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_partner') ? 'has-error' : ''}}">
    <label for="type_partner" class="control-label">{{ 'Type Partner' }}</label>
    <input class="form-control" name="type_partner" type="text" id="type_partner" value="{{ isset($sos_partner->type_partner) ? $sos_partner->type_partner : ''}}" >
    {!! $errors->first('type_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="control-label">{{ 'Full Name' }}</label>
    <textarea class="form-control" rows="5" name="full_name" type="textarea" id="full_name" >{{ isset($sos_partner->full_name) ? $sos_partner->full_name : ''}}</textarea>
    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('show_homepage') ? 'has-error' : ''}}">
    <label for="show_homepage" class="control-label">{{ 'Show Homepage' }}</label>
    <input class="form-control" name="show_homepage" type="text" id="show_homepage" value="{{ isset($sos_partner->show_homepage) ? $sos_partner->show_homepage : ''}}" >
    {!! $errors->first('show_homepage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('secret_token') ? 'has-error' : ''}}">
    <label for="secret_token" class="control-label">{{ 'Secret Token' }}</label>
    <input class="form-control" name="secret_token" type="text" id="secret_token" value="{{ isset($sos_partner->secret_token) ? $sos_partner->secret_token : ''}}" >
    {!! $errors->first('secret_token', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('open_sos') ? 'has-error' : ''}}">
    <label for="open_sos" class="control-label">{{ 'Open Sos' }}</label>
    <input class="form-control" name="open_sos" type="text" id="open_sos" value="{{ isset($sos_partner->open_sos) ? $sos_partner->open_sos : ''}}" >
    {!! $errors->first('open_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('open_repair') ? 'has-error' : ''}}">
    <label for="open_repair" class="control-label">{{ 'Open Repair' }}</label>
    <input class="form-control" name="open_repair" type="text" id="open_repair" value="{{ isset($sos_partner->open_repair) ? $sos_partner->open_repair : ''}}" >
    {!! $errors->first('open_repair', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('open_move') ? 'has-error' : ''}}">
    <label for="open_move" class="control-label">{{ 'Open Move' }}</label>
    <input class="form-control" name="open_move" type="text" id="open_move" value="{{ isset($sos_partner->open_move) ? $sos_partner->open_move : ''}}" >
    {!! $errors->first('open_move', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('open_news') ? 'has-error' : ''}}">
    <label for="open_news" class="control-label">{{ 'Open News' }}</label>
    <input class="form-control" name="open_news" type="text" id="open_news" value="{{ isset($sos_partner->open_news) ? $sos_partner->open_news : ''}}" >
    {!! $errors->first('open_news', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
