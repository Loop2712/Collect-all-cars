<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($guest->name) ? $guest->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($guest->phone) ? $guest->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
    <label for="masseng" class="control-label">{{ 'Masseng' }}</label>
    <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}" >
    {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('massengbox') ? 'has-error' : ''}}">
    <label for="massengbox" class="control-label">{{ 'Massengbox' }}</label>
    <select name="massengbox" class="form-control" id="massengbox" >
        <option value="" selected >  </option> 
    @foreach (json_decode('{"1":"สวัสดี","2":"555"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($guest->photo) ? $guest->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
    <label for="provider_id" class="control-label">{{ 'Provider Id' }}</label>
    <input class="form-control" name="provider_id" type="number" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : ''}}" >
    {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($guest->brand) ? $guest->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
    <label for="registration" class="control-label">{{ 'registration' }}</label>
    <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" >
    {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="county" class="control-label">{{ 'county' }}</label>
    <input class="form-control" name="county" type="text" id="county" value="{{ isset($guest->county) ? $guest->county : ''}}" >
    {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
