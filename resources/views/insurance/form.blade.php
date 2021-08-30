<div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
    <label for="company" class="control-label">{{ 'Company' }}</label>
    <input class="form-control" name="company" type="text" id="company" value="{{ isset($insurance->company) ? $insurance->company : ''}}" >
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($insurance->phone) ? $insurance->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_partner') ? 'has-error' : ''}}">
    <label for="status_partner" class="control-label">{{ 'Status Partner' }}</label>
    <input class="form-control" name="status_partner" type="text" id="status_partner" value="{{ isset($insurance->status_partner) ? $insurance->status_partner : ''}}" >
    {!! $errors->first('status_partner', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
