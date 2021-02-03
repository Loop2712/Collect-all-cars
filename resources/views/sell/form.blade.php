<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($sell->price) ? $sell->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($sell->type) ? $sell->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($sell->brand) ? $sell->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($sell->model) ? $sell->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submodel') ? 'has-error' : ''}}">
    <label for="submodel" class="control-label">{{ 'Submodel' }}</label>
    <input class="form-control" name="submodel" type="text" id="submodel" value="{{ isset($sell->submodel) ? $sell->submodel : ''}}" >
    {!! $errors->first('submodel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($sell->year) ? $sell->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('motor') ? 'has-error' : ''}}">
    <label for="motor" class="control-label">{{ 'Motor' }}</label>
    <input class="form-control" name="motor" type="text" id="motor" value="{{ isset($sell->motor) ? $sell->motor : ''}}" >
    {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gear') ? 'has-error' : ''}}">
    <label for="gear" class="control-label">{{ 'Gear' }}</label>
    <input class="form-control" name="gear" type="text" id="gear" value="{{ isset($sell->gear) ? $sell->gear : ''}}" >
    {!! $errors->first('gear', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('seats') ? 'has-error' : ''}}">
    <label for="seats" class="control-label">{{ 'Seats' }}</label>
    <input class="form-control" name="seats" type="text" id="seats" value="{{ isset($sell->seats) ? $sell->seats : ''}}" >
    {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('distance') ? 'has-error' : ''}}">
    <label for="distance" class="control-label">{{ 'Distance' }}</label>
    <input class="form-control" name="distance" type="text" id="distance" value="{{ isset($sell->distance) ? $sell->distance : ''}}" >
    {!! $errors->first('distance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($sell->color) ? $sell->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="text" id="image" value="{{ isset($sell->image) ? $sell->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($sell->location) ? $sell->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fuel') ? 'has-error' : ''}}">
    <label for="fuel" class="control-label">{{ 'Fuel' }}</label>
    <input class="form-control" name="fuel" type="text" id="fuel" value="{{ isset($sell->fuel) ? $sell->fuel : ''}}" >
    {!! $errors->first('fuel', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{Auth::user()->id}}" >
</div> -->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
