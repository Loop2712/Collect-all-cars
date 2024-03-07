<div class="form-group d-none {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($sos_by_organization->name_partner) ? $sos_by_organization->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($sos_by_organization->partner_id) ? $sos_by_organization->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_sub_organization') ? 'has-error' : ''}}">
    <label for="name_sub_organization" class="control-label">{{ 'Name Sub Organization' }}</label>
    <input class="form-control" name="name_sub_organization" type="text" id="name_sub_organization" value="{{ isset($sos_by_organization->name_sub_organization) ? $sos_by_organization->name_sub_organization : ''}}" >
    {!! $errors->first('name_sub_organization', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_by_organization->phone) ? $sos_by_organization->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_line_id') ? 'has-error' : ''}}">
    <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label>
    <input class="form-control" name="group_line_id" type="number" id="group_line_id" value="{{ isset($sos_by_organization->group_line_id) ? $sos_by_organization->group_line_id : ''}}" >
    {!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
