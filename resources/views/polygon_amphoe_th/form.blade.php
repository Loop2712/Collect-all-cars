<div class="form-group {{ $errors->has('province_name') ? 'has-error' : ''}}">
    <label for="province_name" class="control-label">{{ 'Province Name' }}</label>
    <input class="form-control" name="province_name" type="text" id="province_name" value="{{ isset($polygon_amphoe_th->province_name) ? $polygon_amphoe_th->province_name : ''}}" >
    {!! $errors->first('province_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amphoe_name') ? 'has-error' : ''}}">
    <label for="amphoe_name" class="control-label">{{ 'Amphoe Name' }}</label>
    <input class="form-control" name="amphoe_name" type="text" id="amphoe_name" value="{{ isset($polygon_amphoe_th->amphoe_name) ? $polygon_amphoe_th->amphoe_name : ''}}" >
    {!! $errors->first('amphoe_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amphoe_lat') ? 'has-error' : ''}}">
    <label for="amphoe_lat" class="control-label">{{ 'Amphoe Lat' }}</label>
    <input class="form-control" name="amphoe_lat" type="text" id="amphoe_lat" value="{{ isset($polygon_amphoe_th->amphoe_lat) ? $polygon_amphoe_th->amphoe_lat : ''}}" >
    {!! $errors->first('amphoe_lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amphoe_lon') ? 'has-error' : ''}}">
    <label for="amphoe_lon" class="control-label">{{ 'Amphoe Lon' }}</label>
    <input class="form-control" name="amphoe_lon" type="text" id="amphoe_lon" value="{{ isset($polygon_amphoe_th->amphoe_lon) ? $polygon_amphoe_th->amphoe_lon : ''}}" >
    {!! $errors->first('amphoe_lon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amphoe_zoom') ? 'has-error' : ''}}">
    <label for="amphoe_zoom" class="control-label">{{ 'Amphoe Zoom' }}</label>
    <input class="form-control" name="amphoe_zoom" type="text" id="amphoe_zoom" value="{{ isset($polygon_amphoe_th->amphoe_zoom) ? $polygon_amphoe_th->amphoe_zoom : ''}}" >
    {!! $errors->first('amphoe_zoom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('polygon') ? 'has-error' : ''}}">
    <label for="polygon" class="control-label">{{ 'Polygon' }}</label>
    <input class="form-control" name="polygon" type="text" id="polygon" value="{{ isset($polygon_amphoe_th->polygon) ? $polygon_amphoe_th->polygon : ''}}" >
    {!! $errors->first('polygon', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
