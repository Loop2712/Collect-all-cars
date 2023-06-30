<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($sos_map_title->title) ? $sos_map_title->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($sos_map_title->name_partner) ? $sos_map_title->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ask_to_partner') ? 'has-error' : ''}}">
    <label for="ask_to_partner" class="control-label">{{ 'Ask To Partner' }}</label>
    <input class="form-control" name="ask_to_partner" type="text" id="ask_to_partner" value="{{ isset($sos_map_title->ask_to_partner) ? $sos_map_title->ask_to_partner : ''}}" >
    {!! $errors->first('ask_to_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_map_title->status) ? $sos_map_title->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
