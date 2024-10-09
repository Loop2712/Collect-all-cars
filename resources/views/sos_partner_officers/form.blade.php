<div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="control-label">{{ 'ชื่อ' }}</label>
    <input required class="form-control" name="full_name" type="text" id="full_name" value="{{ isset($sos_partner_officer->full_name) ? $sos_partner_officer->full_name : ''}}" >
    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'เบอร์' }}</label>
    <input required class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_partner_officer->phone) ? $sos_partner_officer->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'แผนก' }}</label>
    <input required class="form-control" name="department" type="text" id="department" value="{{ isset($sos_partner_officer->department) ? $sos_partner_officer->department : ''}}" >
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'ตำแหน่ง' }}</label>
    <input required class="form-control" name="position" type="text" id="position" value="{{ isset($sos_partner_officer->position) ? $sos_partner_officer->position : ''}}" >
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="d-non form-group {{ $errors->has('sos_partner_id') ? 'has-error' : ''}}">
    <label for="sos_partner_id" class="control-label">{{ 'Sos Partner Id' }}</label>
    <input required class="form-control" name="sos_partner_id" type="text" id="sos_partner_id" value="{{ isset($sos_partner_officer->sos_partner_id) ? $sos_partner_officer->sos_partner_id : ''}}" readonly>
    {!! $errors->first('sos_partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-non form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input required class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($sos_partner_officer->user_id) ? $sos_partner_officer->user_id : Auth::user()->id}}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($sos_partner_officer->role) ? $sos_partner_officer->role : ''}}" >
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <input class="form-control" name="active" type="text" id="active" value="{{ isset($sos_partner_officer->active) ? $sos_partner_officer->active : ''}}" >
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_officer') ? 'has-error' : ''}}">
    <label for="status_officer" class="control-label">{{ 'Status Officer' }}</label>
    <input class="form-control" name="status_officer" type="text" id="status_officer" value="{{ isset($sos_partner_officer->status_officer) ? $sos_partner_officer->status_officer : ''}}" >
    {!! $errors->first('status_officer', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary px-5" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'ยืนยัน' }}">
</div>
