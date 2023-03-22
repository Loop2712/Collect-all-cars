<div class="form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'ชื่อเจ้าหน้าที่' }}</label>
    <input class="form-control" name="name_officer" type="text" id="name_officer" value="{{ isset($data_1669_operating_officer->name) ? $data_1669_operating_officer->name : ''}}" >
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($data_1669_operating_officer->lat) ? $data_1669_operating_officer->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($data_1669_operating_officer->lng) ? $data_1669_operating_officer->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('operating_unit_id') ? 'has-error' : ''}}">
    <label for="operating_unit_id" class="control-label">{{ 'Operating Unit Id' }}</label>
    <input class="form-control" name="operating_unit_id" type="text" id="operating_unit_id" value="{{ isset($data_1669_operating_officer->operating_unit_id) ? $data_1669_operating_officer->operating_unit_id : $operating_unit_id }}" readonly>
    {!! $errors->first('operating_unit_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($data_1669_operating_officer->user_id) ? $data_1669_operating_officer->user_id : Auth::user()->id }}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'พื้นที่' }}</label>
    <input class="form-control" name="name_area" type="text" id="area" value="{{ $name_area }}" readonly>
</div>

<div class="notranslate form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'ระดับ' }}</label>
    <select name="level" class="form-control" >
        <option value="" selected > - กรุณาเลือกระดับ - </option>    
        <option value="FR">FR</option>                                 
        <option value="BLS">BLS</option>                                 
        <option value="ILS">ILS</option>                                 
        <option value="ALS">ALS</option>                                 

    </select>
</div>
<div class="notranslate form-group {{ $errors->has('vehicle_type') ? 'has-error' : ''}}">
    <label for="vehicle_type" class="control-label">{{ 'ยานพาหนะ' }}</label>
    <select name="vehicle_type"  class="form-control" >
        <option value="" selected > - กรุณาเลือกยานพาหนะ - </option>   
        <option value="รถ">รถ</option>        
        <option value="อากาศยาน">อากาศยาน</option>   
        <option value="เรือ ป.1">เรือ ป.1</option>     
        <option value="เรือ ป.2">เรือ ป.2</option>                                 
        <option value="เรือ ป.3">เรือ ป.3</option>                                 
        <option value="เรือประเภทอื่นๆ">เรือประเภทอื่นๆ</option>      
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
