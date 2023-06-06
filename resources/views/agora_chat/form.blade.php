<div class="form-group {{ $errors->has('room_for') ? 'has-error' : ''}}">
    <label for="room_for" class="control-label">{{ 'Room For' }}</label>
    <input class="form-control" name="room_for" type="text" id="room_for" value="{{ isset($agora_chat->room_for) ? $agora_chat->room_for : ''}}" >
    {!! $errors->first('room_for', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
    <label for="time_start" class="control-label">{{ 'Time Start' }}</label>
    <input class="form-control" name="time_start" type="datetime-local" id="time_start" value="{{ isset($agora_chat->time_start) ? $agora_chat->time_start : ''}}" >
    {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('member_in_room') ? 'has-error' : ''}}">
    <label for="member_in_room" class="control-label">{{ 'Member In Room' }}</label>
    <input class="form-control" name="member_in_room" type="text" id="member_in_room" value="{{ isset($agora_chat->member_in_room) ? $agora_chat->member_in_room : ''}}" >
    {!! $errors->first('member_in_room', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total_timemeet') ? 'has-error' : ''}}">
    <label for="total_timemeet" class="control-label">{{ 'Total Timemeet' }}</label>
    <input class="form-control" name="total_timemeet" type="number" id="total_timemeet" value="{{ isset($agora_chat->total_timemeet) ? $agora_chat->total_timemeet : ''}}" >
    {!! $errors->first('total_timemeet', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount_meet') ? 'has-error' : ''}}">
    <label for="amount_meet" class="control-label">{{ 'Amount Meet' }}</label>
    <input class="form-control" name="amount_meet" type="number" id="amount_meet" value="{{ isset($agora_chat->amount_meet) ? $agora_chat->amount_meet : ''}}" >
    {!! $errors->first('amount_meet', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($agora_chat->detail) ? $agora_chat->detail : ''}}" >
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sos_id') ? 'has-error' : ''}}">
    <label for="sos_id" class="control-label">{{ 'Sos Id' }}</label>
    <input class="form-control" name="sos_id" type="text" id="sos_id" value="{{ isset($agora_chat->sos_id) ? $agora_chat->sos_id : ''}}" >
    {!! $errors->first('sos_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('consult_doctor_id') ? 'has-error' : ''}}">
    <label for="consult_doctor_id" class="control-label">{{ 'Consult Doctor Id' }}</label>
    <input class="form-control" name="consult_doctor_id" type="text" id="consult_doctor_id" value="{{ isset($agora_chat->consult_doctor_id) ? $agora_chat->consult_doctor_id : ''}}" >
    {!! $errors->first('consult_doctor_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
