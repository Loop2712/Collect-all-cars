<div class="form-group {{ $errors->has('full_name_th') ? 'has-error' : ''}}">
    <label for="full_name_th" class="control-label">{{ 'Full Name Th' }}</label>
    <input class="form-control" name="full_name_th" type="text" id="full_name_th" value="{{ isset($name_university->full_name_th) ? $name_university->full_name_th : ''}}" >
    {!! $errors->first('full_name_th', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('full_name_en') ? 'has-error' : ''}}">
    <label for="full_name_en" class="control-label">{{ 'Full Name En' }}</label>
    <input class="form-control" name="full_name_en" type="text" id="full_name_en" value="{{ isset($name_university->full_name_en) ? $name_university->full_name_en : ''}}" >
    {!! $errors->first('full_name_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('initials_th') ? 'has-error' : ''}}">
    <label for="initials_th" class="control-label">{{ 'Initials Th' }}</label>
    <input class="form-control" name="initials_th" type="text" id="initials_th" value="{{ isset($name_university->initials_th) ? $name_university->initials_th : ''}}" >
    {!! $errors->first('initials_th', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('initials_en') ? 'has-error' : ''}}">
    <label for="initials_en" class="control-label">{{ 'Initials En' }}</label>
    <input class="form-control" name="initials_en" type="number" id="initials_en" value="{{ isset($name_university->initials_en) ? $name_university->initials_en : ''}}" >
    {!! $errors->first('initials_en', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
