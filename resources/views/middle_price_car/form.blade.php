<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($middle_price_car->brand) ? $middle_price_car->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($middle_price_car->model) ? $middle_price_car->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submodel') ? 'has-error' : ''}}">
    <label for="submodel" class="control-label">{{ 'Submodel' }}</label>
    <input class="form-control" name="submodel" type="text" id="submodel" value="{{ isset($middle_price_car->submodel) ? $middle_price_car->submodel : ''}}" >
    {!! $errors->first('submodel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($middle_price_car->year) ? $middle_price_car->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($middle_price_car->price) ? $middle_price_car->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
