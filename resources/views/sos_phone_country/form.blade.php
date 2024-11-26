<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($sos_phone_country->name) ? $sos_phone_country->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_phone_country->phone) ? $sos_phone_country->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('countryCode') ? 'has-error' : ''}}">
    <label for="countryCode" class="control-label">{{ 'Countrycode' }}</label>
    <input class="form-control" name="countryCode" type="text" id="countryCode" value="{{ isset($sos_phone_country->countryCode) ? $sos_phone_country->countryCode : ''}}" >
    {!! $errors->first('countryCode', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
