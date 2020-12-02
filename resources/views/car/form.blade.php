<div class="form-group {{ $errors->has('car_id') ? 'has-error' : ''}}">
    <label for="car_id" class="control-label">{{ 'Car Id' }}</label>
    <input class="form-control" name="car_id" type="number" id="car_id" value="{{ isset($car->car_id) ? $car->car_id : ''}}" >
    {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('namecar') ? 'has-error' : ''}}">
    <label for="namecar" class="control-label">{{ 'Namecar' }}</label>
    <textarea class="form-control" rows="5" name="namecar" type="textarea" id="namecar" >{{ isset($car->namecar) ? $car->namecar : ''}}</textarea>
    {!! $errors->first('namecar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="control-label">{{ 'Brand Id' }}</label>
    <input class="form-control" name="brand_id" type="number" id="brand_id" value="{{ isset($car->brand_id) ? $car->brand_id : ''}}" >
    {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('generat_id') ? 'has-error' : ''}}">
    <label for="generat_id" class="control-label">{{ 'Generat Id' }}</label>
    <input class="form-control" name="generat_id" type="number" id="generat_id" value="{{ isset($car->generat_id) ? $car->generat_id : ''}}" >
    {!! $errors->first('generat_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($car->price) ? $car->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="number" id="year" value="{{ isset($car->year) ? $car->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($car->address) ? $car->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Mileage') ? 'has-error' : ''}}">
    <label for="Mileage" class="control-label">{{ 'Mileage' }}</label>
    <input class="form-control" name="Mileage" type="number" id="Mileage" value="{{ isset($car->Mileage) ? $car->Mileage : ''}}" >
    {!! $errors->first('Mileage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
    <label for="picture" class="control-label">{{ 'Picture' }}</label>
    <input class="form-control" name="picture" type="file" id="picture" value="{{ isset($car->picture) ? $car->picture : ''}}" >
    {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
