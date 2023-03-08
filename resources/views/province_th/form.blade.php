<div class="form-group {{ $errors->has('province_id') ? 'has-error' : ''}}">
    <label for="province_id" class="control-label">{{ 'Province Id' }}</label>
    <input class="form-control" name="province_id" type="text" id="province_id" value="{{ isset($province_th->province_id) ? $province_th->province_id : ''}}" >
    {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_name') ? 'has-error' : ''}}">
    <label for="province_name" class="control-label">{{ 'Province Name' }}</label>
    <input class="form-control" name="province_name" type="text" id="province_name" value="{{ isset($province_th->province_name) ? $province_th->province_name : ''}}" >
    {!! $errors->first('province_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_lat') ? 'has-error' : ''}}">
    <label for="province_lat" class="control-label">{{ 'Province Lat' }}</label>
    <input class="form-control" name="province_lat" type="text" id="province_lat" value="{{ isset($province_th->province_lat) ? $province_th->province_lat : ''}}" >
    {!! $errors->first('province_lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_lon') ? 'has-error' : ''}}">
    <label for="province_lon" class="control-label">{{ 'Province Lon' }}</label>
    <input class="form-control" name="province_lon" type="text" id="province_lon" value="{{ isset($province_th->province_lon) ? $province_th->province_lon : ''}}" >
    {!! $errors->first('province_lon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province_zoom') ? 'has-error' : ''}}">
    <label for="province_zoom" class="control-label">{{ 'Province Zoom' }}</label>
    <input class="form-control" name="province_zoom" type="text" id="province_zoom" value="{{ isset($province_th->province_zoom) ? $province_th->province_zoom : ''}}" >
    {!! $errors->first('province_zoom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('polygon') ? 'has-error' : ''}}">
    <label for="polygon" class="control-label">{{ 'Polygon' }}</label>
    <input class="form-control" name="polygon" type="text" id="polygon" value="{{ isset($province_th->polygon) ? $province_th->polygon : ''}}" >
    {!! $errors->first('polygon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('count_sos_1669') ? 'has-error' : ''}}">
    <label for="count_sos_1669" class="control-label">{{ 'Count Sos 1669' }}</label>
    <input class="form-control" name="count_sos_1669" type="text" id="count_sos_1669" value="{{ isset($province_th->count_sos_1669) ? $province_th->count_sos_1669 : ''}}" >
    {!! $errors->first('count_sos_1669', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
