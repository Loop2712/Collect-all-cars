<div class="form-group {{ $errors->has('amphoe') ? 'has-error' : ''}}">
    <label for="amphoe" class="control-label">{{ 'Amphoe' }}</label>
    <input class="form-control" name="amphoe" type="text" id="amphoe" value="{{ isset($vote_kan_data_station->amphoe) ? $vote_kan_data_station->amphoe : ''}}" >
    {!! $errors->first('amphoe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($vote_kan_data_station->area) ? $vote_kan_data_station->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tambon') ? 'has-error' : ''}}">
    <label for="tambon" class="control-label">{{ 'Tambon' }}</label>
    <input class="form-control" name="tambon" type="text" id="tambon" value="{{ isset($vote_kan_data_station->tambon) ? $vote_kan_data_station->tambon : ''}}" >
    {!! $errors->first('tambon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('polling_station_at') ? 'has-error' : ''}}">
    <label for="polling_station_at" class="control-label">{{ 'Polling Station At' }}</label>
    <input class="form-control" name="polling_station_at" type="text" id="polling_station_at" value="{{ isset($vote_kan_data_station->polling_station_at) ? $vote_kan_data_station->polling_station_at : ''}}" >
    {!! $errors->first('polling_station_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
