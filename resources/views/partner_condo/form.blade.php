<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($partner_condo->name) ? $partner_condo->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_line_oa') ? 'has-error' : ''}}">
    <label for="name_line_oa" class="control-label">{{ 'Name Line Oa' }}</label>
    <input class="form-control" name="name_line_oa" type="text" id="name_line_oa" value="{{ isset($partner_condo->name_line_oa) ? $partner_condo->name_line_oa : ''}}" >
    {!! $errors->first('name_line_oa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link_line_oa') ? 'has-error' : ''}}">
    <label for="link_line_oa" class="control-label">{{ 'Link Line Oa' }}</label>
    <input class="form-control" name="link_line_oa" type="text" id="link_line_oa" value="{{ isset($partner_condo->link_line_oa) ? $partner_condo->link_line_oa : ''}}" >
    {!! $errors->first('link_line_oa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('channel_access_token') ? 'has-error' : ''}}">
    <label for="channel_access_token" class="control-label">{{ 'Channel Access Token' }}</label>
    <input class="form-control" name="channel_access_token" type="text" id="channel_access_token" value="{{ isset($partner_condo->channel_access_token) ? $partner_condo->channel_access_token : ''}}" >
    {!! $errors->first('channel_access_token', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('channel_secret') ? 'has-error' : ''}}">
    <label for="channel_secret" class="control-label">{{ 'Channel Secret' }}</label>
    <input class="form-control" name="channel_secret" type="text" id="channel_secret" value="{{ isset($partner_condo->channel_secret) ? $partner_condo->channel_secret : ''}}" >
    {!! $errors->first('channel_secret', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rich_menu_TH') ? 'has-error' : ''}}">
    <label for="rich_menu_TH" class="control-label">{{ 'Rich Menu Th' }}</label>
    <input class="form-control" name="rich_menu_TH" type="text" id="rich_menu_TH" value="{{ isset($partner_condo->rich_menu_TH) ? $partner_condo->rich_menu_TH : ''}}" >
    {!! $errors->first('rich_menu_TH', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rich_menu_EN') ? 'has-error' : ''}}">
    <label for="rich_menu_EN" class="control-label">{{ 'Rich Menu En' }}</label>
    <input class="form-control" name="rich_menu_EN" type="text" id="rich_menu_EN" value="{{ isset($partner_condo->rich_menu_EN) ? $partner_condo->rich_menu_EN : ''}}" >
    {!! $errors->first('rich_menu_EN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rich_menu_zh_TW') ? 'has-error' : ''}}">
    <label for="rich_menu_zh_TW" class="control-label">{{ 'Rich Menu Zh Tw' }}</label>
    <input class="form-control" name="rich_menu_zh_TW" type="text" id="rich_menu_zh_TW" value="{{ isset($partner_condo->rich_menu_zh_TW) ? $partner_condo->rich_menu_zh_TW : ''}}" >
    {!! $errors->first('rich_menu_zh_TW', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rich_menu_zh_CN') ? 'has-error' : ''}}">
    <label for="rich_menu_zh_CN" class="control-label">{{ 'Rich Menu Zh Cn' }}</label>
    <input class="form-control" name="rich_menu_zh_CN" type="text" id="rich_menu_zh_CN" value="{{ isset($partner_condo->rich_menu_zh_CN) ? $partner_condo->rich_menu_zh_CN : ''}}" >
    {!! $errors->first('rich_menu_zh_CN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($partner_condo->partner_id) ? $partner_condo->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
