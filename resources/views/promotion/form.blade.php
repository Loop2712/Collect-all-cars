<div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
    <label for="company" class="control-label">{{ 'Company' }}</label>
    <input class="form-control" name="company" type="text" id="company" value="{{ isset($promotion->company) ? $promotion->company : ''}}" >
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('titel') ? 'has-error' : ''}}">
    <label for="titel" class="control-label">{{ 'Titel' }}</label>
    <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($promotion->titel) ? $promotion->titel : ''}}" >
    {!! $errors->first('titel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($promotion->detail) ? $promotion->detail : ''}}" >
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($promotion->photo) ? $promotion->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_period') ? 'has-error' : ''}}">
    <label for="time_period" class="control-label">{{ 'Time Period' }}</label>
    <input class="form-control" name="time_period" type="text" id="time_period" value="{{ isset($promotion->time_period) ? $promotion->time_period : ''}}" >
    {!! $errors->first('time_period', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
