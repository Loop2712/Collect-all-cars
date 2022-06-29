<div class="form-group {{ $errors->has('name_category') ? 'has-error' : ''}}">
    <label for="name_category" class="control-label">{{ 'Name Category' }}</label>
    <input class="form-control" name="name_category" type="text" id="name_category" value="{{ isset($category_condo->name_category) ? $category_condo->name_category : ''}}" >
    {!! $errors->first('name_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('system') ? 'has-error' : ''}}">
    <label for="system" class="control-label">{{ 'System' }}</label>
    <input class="form-control" name="system" type="text" id="system" value="{{ isset($category_condo->system) ? $category_condo->system : ''}}" >
    {!! $errors->first('system', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ isset($category_condo->condo_id) ? $category_condo->condo_id : ''}}" >
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_staff') ? 'has-error' : ''}}">
    <label for="name_staff" class="control-label">{{ 'Name Staff' }}</label>
    <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ isset($category_condo->name_staff) ? $category_condo->name_staff : ''}}" >
    {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($category_condo->staff_id) ? $category_condo->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
