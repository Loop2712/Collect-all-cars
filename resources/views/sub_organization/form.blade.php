<div class="form-group {{ $errors->has('name_sub_organization') ? 'has-error' : ''}}">
    <label for="name_sub_organization" class="control-label">{{ 'Name Sub Organization' }}</label>
    <input class="form-control" name="name_sub_organization" type="text" id="name_sub_organization" value="{{ isset($sub_organization->name_sub_organization) ? $sub_organization->name_sub_organization : ''}}" >
    {!! $errors->first('name_sub_organization', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sub_organization->phone) ? $sub_organization->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($sub_organization->name_partner) ? $sub_organization->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_partner') ? 'has-error' : ''}}">
    <label for="id_partner" class="control-label">{{ 'Id Partner' }}</label>
    <input class="form-control" name="id_partner" type="text" id="id_partner" value="{{ isset($sub_organization->id_partner) ? $sub_organization->id_partner : ''}}" >
    {!! $errors->first('id_partner', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
