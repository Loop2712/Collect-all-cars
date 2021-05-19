<div class="form-group {{ $errors->has('disaster') ? 'has-error' : ''}}">
    <label for="disaster" class="control-label">{{ 'Disaster' }}</label>
    <input class="form-control" name="disaster" type="number" id="disaster" value="{{ isset($so->disaster) ? $so->disaster : ''}}" >
    {!! $errors->first('disaster', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('car_fire') ? 'has-error' : ''}}">
    <label for="car_fire" class="control-label">{{ 'Car Fire' }}</label>
    <input class="form-control" name="car_fire" type="number" id="car_fire" value="{{ isset($so->car_fire) ? $so->car_fire : ''}}" >
    {!! $errors->first('car_fire', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('life_saving') ? 'has-error' : ''}}">
    <label for="life_saving" class="control-label">{{ 'Life Saving' }}</label>
    <input class="form-control" name="life_saving" type="number" id="life_saving" value="{{ isset($so->life_saving) ? $so->life_saving : ''}}" >
    {!! $errors->first('life_saving', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('js_100') ? 'has-error' : ''}}">
    <label for="js_100" class="control-label">{{ 'Js 100' }}</label>
    <input class="form-control" name="js_100" type="number" id="js_100" value="{{ isset($so->js_100) ? $so->js_100 : ''}}" >
    {!! $errors->first('js_100', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('highway') ? 'has-error' : ''}}">
    <label for="highway" class="control-label">{{ 'Highway' }}</label>
    <input class="form-control" name="highway" type="number" id="highway" value="{{ isset($so->highway) ? $so->highway : ''}}" >
    {!! $errors->first('highway', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tourist_police') ? 'has-error' : ''}}">
    <label for="tourist_police" class="control-label">{{ 'Tourist Police' }}</label>
    <input class="form-control" name="tourist_police" type="number" id="tourist_police" value="{{ isset($so->tourist_police) ? $so->tourist_police : ''}}" >
    {!! $errors->first('tourist_police', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($so->total) ? $so->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
