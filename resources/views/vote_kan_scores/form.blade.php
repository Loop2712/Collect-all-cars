<div class="form-group {{ $errors->has('vote_kan_stations_id') ? 'has-error' : ''}}">
    <label for="vote_kan_stations_id" class="control-label">{{ 'Vote Kan Stations Id' }}</label>
    <input class="form-control" name="vote_kan_stations_id" type="number" id="vote_kan_stations_id" value="{{ isset($vote_kan_score->vote_kan_stations_id) ? $vote_kan_score->vote_kan_stations_id : ''}}" >
    {!! $errors->first('vote_kan_stations_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($vote_kan_score->user_id) ? $vote_kan_score->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last') ? 'has-error' : ''}}">
    <label for="last" class="control-label">{{ 'Last' }}</label>
    <input class="form-control" name="last" type="text" id="last" value="{{ isset($vote_kan_score->last) ? $vote_kan_score->last : ''}}" >
    {!! $errors->first('last', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_1') ? 'has-error' : ''}}">
    <label for="number_1" class="control-label">{{ 'Number 1' }}</label>
    <input class="form-control" name="number_1" type="number" id="number_1" value="{{ isset($vote_kan_score->number_1) ? $vote_kan_score->number_1 : ''}}" >
    {!! $errors->first('number_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_2') ? 'has-error' : ''}}">
    <label for="number_2" class="control-label">{{ 'Number 2' }}</label>
    <input class="form-control" name="number_2" type="number" id="number_2" value="{{ isset($vote_kan_score->number_2) ? $vote_kan_score->number_2 : ''}}" >
    {!! $errors->first('number_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_3') ? 'has-error' : ''}}">
    <label for="number_3" class="control-label">{{ 'Number 3' }}</label>
    <input class="form-control" name="number_3" type="number" id="number_3" value="{{ isset($vote_kan_score->number_3) ? $vote_kan_score->number_3 : ''}}" >
    {!! $errors->first('number_3', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
