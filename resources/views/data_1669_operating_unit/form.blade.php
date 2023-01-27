<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($data_1669_operating_unit->name) ? $data_1669_operating_unit->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($data_1669_operating_unit->area) ? $data_1669_operating_unit->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'Level' }}</label>
    <input class="form-control" name="level" type="text" id="level" value="{{ isset($data_1669_operating_unit->level) ? $data_1669_operating_unit->level : ''}}" >
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
