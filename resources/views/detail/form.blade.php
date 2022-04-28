<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($detail->price) ? $detail->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($detail->type) ? $detail->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($detail->brand) ? $detail->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($detail->model) ? $detail->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('face') ? 'has-error' : ''}}">
    <label for="face" class="control-label">{{ 'Face' }}</label>
    <input class="form-control" name="face" type="text" id="face" value="{{ isset($detail->face) ? $detail->face : ''}}" >
    {!! $errors->first('face', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submodel') ? 'has-error' : ''}}">
    <label for="submodel" class="control-label">{{ 'Submodel' }}</label>
    <input class="form-control" name="submodel" type="text" id="submodel" value="{{ isset($detail->submodel) ? $detail->submodel : ''}}" >
    {!! $errors->first('submodel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($detail->year) ? $detail->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('motor') ? 'has-error' : ''}}">
    <label for="motor" class="control-label">{{ 'Motor' }}</label>
    <input class="form-control" name="motor" type="text" id="motor" value="{{ isset($detail->motor) ? $detail->motor : ''}}" >
    {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gear') ? 'has-error' : ''}}">
    <label for="gear" class="control-label">{{ 'Gear' }}</label>
    <input class="form-control" name="gear" type="text" id="gear" value="{{ isset($detail->gear) ? $detail->gear : ''}}" >
    {!! $errors->first('gear', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('seats') ? 'has-error' : ''}}">
    <label for="seats" class="control-label">{{ 'Seats' }}</label>
    <input class="form-control" name="seats" type="text" id="seats" value="{{ isset($detail->seats) ? $detail->seats : ''}}" >
    {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('distance') ? 'has-error' : ''}}">
    <label for="distance" class="control-label">{{ 'Distance' }}</label>
    <input class="form-control" name="distance" type="text" id="distance" value="{{ isset($detail->distance) ? $detail->distance : ''}}" >
    {!! $errors->first('distance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($detail->color) ? $detail->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="text" id="image" value="{{ isset($detail->image) ? $detail->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('car_id') ? 'has-error' : ''}}">
    <label for="car_id" class="control-label">{{ 'Car Id' }}</label>
    <input class="form-control" name="car_id" type="number" id="car_id" value="{{ isset($detail->car_id) ? $detail->car_id : ''}}" >
    {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($detail->location) ? $detail->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($detail->link) ? $detail->link : ''}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
