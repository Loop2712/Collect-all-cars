<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($data_1669_operating_unit->name) ? $data_1669_operating_unit->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($data_1669_operating_unit->area) ? $data_1669_operating_unit->area : Auth::user()->sub_organization }}" readonly>
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group mt-3">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
