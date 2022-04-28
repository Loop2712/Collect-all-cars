<div class="form-group {{ $errors->has('CountryCode') ? 'has-error' : ''}}">
    <label for="CountryCode" class="control-label">{{ 'Countrycode' }}</label>
    <input class="form-control" name="CountryCode" type="text" id="CountryCode" value="{{ isset($time_zone->CountryCode) ? $time_zone->CountryCode : ''}}" >
    {!! $errors->first('CountryCode', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TimeZone') ? 'has-error' : ''}}">
    <label for="TimeZone" class="control-label">{{ 'Timezone' }}</label>
    <input class="form-control" name="TimeZone" type="text" id="TimeZone" value="{{ isset($time_zone->TimeZone) ? $time_zone->TimeZone : ''}}" >
    {!! $errors->first('TimeZone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('UTC') ? 'has-error' : ''}}">
    <label for="UTC" class="control-label">{{ 'Utc' }}</label>
    <input class="form-control" name="UTC" type="text" id="UTC" value="{{ isset($time_zone->UTC) ? $time_zone->UTC : ''}}" >
    {!! $errors->first('UTC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DST') ? 'has-error' : ''}}">
    <label for="DST" class="control-label">{{ 'Dst' }}</label>
    <input class="form-control" name="DST" type="text" id="DST" value="{{ isset($time_zone->DST) ? $time_zone->DST : ''}}" >
    {!! $errors->first('DST', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
