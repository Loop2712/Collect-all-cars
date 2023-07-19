<div class="form-group {{ $errors->has('sos_id') ? 'has-error' : ''}}">
    <label for="sos_id" class="control-label">{{ 'Sos Id' }}</label>
    <input class="form-control" name="sos_id" type="text" id="sos_id" value="{{ isset($sos_1669_officer_ask_more->sos_id) ? $sos_1669_officer_ask_more->sos_id : ''}}" >
    {!! $errors->first('sos_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_id') ? 'has-error' : ''}}">
    <label for="officer_id" class="control-label">{{ 'Officer Id' }}</label>
    <input class="form-control" name="officer_id" type="text" id="officer_id" value="{{ isset($sos_1669_officer_ask_more->officer_id) ? $sos_1669_officer_ask_more->officer_id : ''}}" >
    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rc') ? 'has-error' : ''}}">
    <label for="rc" class="control-label">{{ 'Rc' }}</label>
    <input class="form-control" name="rc" type="text" id="rc" value="{{ isset($sos_1669_officer_ask_more->rc) ? $sos_1669_officer_ask_more->rc : ''}}" >
    {!! $errors->first('rc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_car') ? 'has-error' : ''}}">
    <label for="vehicle_car" class="control-label">{{ 'Vehicle Car' }}</label>
    <input class="form-control" name="vehicle_car" type="text" id="vehicle_car" value="{{ isset($sos_1669_officer_ask_more->vehicle_car) ? $sos_1669_officer_ask_more->vehicle_car : ''}}" >
    {!! $errors->first('vehicle_car', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_aircraft') ? 'has-error' : ''}}">
    <label for="vehicle_aircraft" class="control-label">{{ 'Vehicle Aircraft' }}</label>
    <input class="form-control" name="vehicle_aircraft" type="text" id="vehicle_aircraft" value="{{ isset($sos_1669_officer_ask_more->vehicle_aircraft) ? $sos_1669_officer_ask_more->vehicle_aircraft : ''}}" >
    {!! $errors->first('vehicle_aircraft', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_boat_1') ? 'has-error' : ''}}">
    <label for="vehicle_boat_1" class="control-label">{{ 'Vehicle Boat 1' }}</label>
    <input class="form-control" name="vehicle_boat_1" type="text" id="vehicle_boat_1" value="{{ isset($sos_1669_officer_ask_more->vehicle_boat_1) ? $sos_1669_officer_ask_more->vehicle_boat_1 : ''}}" >
    {!! $errors->first('vehicle_boat_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_boat_2') ? 'has-error' : ''}}">
    <label for="vehicle_boat_2" class="control-label">{{ 'Vehicle Boat 2' }}</label>
    <input class="form-control" name="vehicle_boat_2" type="text" id="vehicle_boat_2" value="{{ isset($sos_1669_officer_ask_more->vehicle_boat_2) ? $sos_1669_officer_ask_more->vehicle_boat_2 : ''}}" >
    {!! $errors->first('vehicle_boat_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_boat_3') ? 'has-error' : ''}}">
    <label for="vehicle_boat_3" class="control-label">{{ 'Vehicle Boat 3' }}</label>
    <input class="form-control" name="vehicle_boat_3" type="text" id="vehicle_boat_3" value="{{ isset($sos_1669_officer_ask_more->vehicle_boat_3) ? $sos_1669_officer_ask_more->vehicle_boat_3 : ''}}" >
    {!! $errors->first('vehicle_boat_3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_boat_other') ? 'has-error' : ''}}">
    <label for="vehicle_boat_other" class="control-label">{{ 'Vehicle Boat Other' }}</label>
    <input class="form-control" name="vehicle_boat_other" type="text" id="vehicle_boat_other" value="{{ isset($sos_1669_officer_ask_more->vehicle_boat_other) ? $sos_1669_officer_ask_more->vehicle_boat_other : ''}}" >
    {!! $errors->first('vehicle_boat_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_amount') ? 'has-error' : ''}}">
    <label for="officer_amount" class="control-label">{{ 'Officer Amount' }}</label>
    <input class="form-control" name="officer_amount" type="text" id="officer_amount" value="{{ isset($sos_1669_officer_ask_more->officer_amount) ? $sos_1669_officer_ask_more->officer_amount : ''}}" >
    {!! $errors->first('officer_amount', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
