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
    @foreach (json_decode('{"1":"\u0e02\u0e22\u0e31\u0e1a\u0e23\u0e16\u0e14\u0e49\u0e27\u0e22\u0e08\u0e49\u0e32","2":"\u0e2d\u0e34\u0e2d\u0e34"}', true) as $optionKey => $optionValue)
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


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
