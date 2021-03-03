                
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($motercycle->brand) ? $motercycle->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($motercycle->model) ? $motercycle->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submodel') ? 'has-error' : ''}}">
    <label for="submodel" class="control-label">{{ 'Submodel' }}</label>
    <input class="form-control" name="submodel" type="text" id="submodel" value="{{ isset($motercycle->submodel) ? $motercycle->submodel : ''}}" >
    {!! $errors->first('submodel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($motercycle->year) ? $motercycle->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gear') ? 'has-error' : ''}}">
    <label for="gear" class="control-label">{{ 'Gear' }}</label>
    <input class="form-control" name="gear" type="text" id="gear" value="{{ isset($motercycle->gear) ? $motercycle->gear : ''}}" >
    {!! $errors->first('gear', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($motercycle->color) ? $motercycle->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('motor') ? 'has-error' : ''}}">
    <label for="motor" class="control-label">{{ 'Motor' }}</label>
    <input class="form-control" name="motor" type="text" id="motor" value="{{ isset($motercycle->motor) ? $motercycle->motor : ''}}" >
    {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($motercycle->price) ? $motercycle->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
    <label for="img" class="control-label">{{ 'Img' }}</label>
    <input class="form-control" name="img" type="file" id="img" value="{{ isset($motercycle->img) ? $motercycle->img : ''}}" >
    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($motercycle->location) ? $motercycle->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($motercycle->active) ? $motercycle->active : 'Yes'}}" >
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="user_id" type="number" id="user_id" value="{{Auth::id()}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
