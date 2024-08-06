<div class="form-group {{ $errors->has('sos_partner_id') ? 'has-error' : ''}}">
    <label for="sos_partner_id" class="control-label">{{ 'Sos Partner Id' }}</label>
    <input class="form-control" name="sos_partner_id" type="text" id="sos_partner_id" value="{{ isset($sos_partner_area->sos_partner_id) ? $sos_partner_area->sos_partner_id : ''}}" >
    {!! $errors->first('sos_partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('creator') ? 'has-error' : ''}}">
    <label for="creator" class="control-label">{{ 'Creator' }}</label>
    <input class="form-control" name="creator" type="text" id="creator" value="{{ isset($sos_partner_area->creator) ? $sos_partner_area->creator : ''}}" >
    {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
    <label for="name_area" class="control-label">{{ 'Name Area' }}</label>
    <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($sos_partner_area->name_area) ? $sos_partner_area->name_area : ''}}" >
    {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_line_id') ? 'has-error' : ''}}">
    <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label>
    <input class="form-control" name="group_line_id" type="text" id="group_line_id" value="{{ isset($sos_partner_area->group_line_id) ? $sos_partner_area->group_line_id : ''}}" >
    {!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sos_area') ? 'has-error' : ''}}">
    <label for="sos_area" class="control-label">{{ 'Sos Area' }}</label>
    <textarea class="form-control" rows="5" name="sos_area" type="textarea" id="sos_area" >{{ isset($sos_partner_area->sos_area) ? $sos_partner_area->sos_area : ''}}</textarea>
    {!! $errors->first('sos_area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_partner_area->status) ? $sos_partner_area->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
