<div class="form-group {{ $errors->has('juristicID') ? 'has-error' : ''}}">
    <label for="juristicID" class="control-label">{{ 'Juristicid' }}</label>
    <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($organization->juristicID) ? $organization->juristicID : ''}}" >
    {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
    <label for="juristicNameTH" class="control-label">{{ 'Juristicnameth' }}</label>
    <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($organization->juristicNameTH) ? $organization->juristicNameTH : ''}}" >
    {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicNameEN') ? 'has-error' : ''}}">
    <label for="juristicNameEN" class="control-label">{{ 'Juristicnameen' }}</label>
    <input class="form-control" name="juristicNameEN" type="text" id="juristicNameEN" value="{{ isset($organization->juristicNameEN) ? $organization->juristicNameEN : ''}}" >
    {!! $errors->first('juristicNameEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicType') ? 'has-error' : ''}}">
    <label for="juristicType" class="control-label">{{ 'Juristictype' }}</label>
    <input class="form-control" name="juristicType" type="text" id="juristicType" value="{{ isset($organization->juristicType) ? $organization->juristicType : ''}}" >
    {!! $errors->first('juristicType', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registerDate') ? 'has-error' : ''}}">
    <label for="registerDate" class="control-label">{{ 'Registerdate' }}</label>
    <input class="form-control" name="registerDate" type="text" id="registerDate" value="{{ isset($organization->registerDate) ? $organization->registerDate : ''}}" >
    {!! $errors->first('registerDate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicStatus') ? 'has-error' : ''}}">
    <label for="juristicStatus" class="control-label">{{ 'Juristicstatus' }}</label>
    <input class="form-control" name="juristicStatus" type="text" id="juristicStatus" value="{{ isset($organization->juristicStatus) ? $organization->juristicStatus : ''}}" >
    {!! $errors->first('juristicStatus', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registerCapital') ? 'has-error' : ''}}">
    <label for="registerCapital" class="control-label">{{ 'Registercapital' }}</label>
    <input class="form-control" name="registerCapital" type="text" id="registerCapital" value="{{ isset($organization->registerCapital) ? $organization->registerCapital : ''}}" >
    {!! $errors->first('registerCapital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('standardObjective') ? 'has-error' : ''}}">
    <label for="standardObjective" class="control-label">{{ 'Standardobjective' }}</label>
    <input class="form-control" name="standardObjective" type="text" id="standardObjective" value="{{ isset($organization->standardObjective) ? $organization->standardObjective : ''}}" >
    {!! $errors->first('standardObjective', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('standardObjectiveDetail') ? 'has-error' : ''}}">
    <label for="standardObjectiveDetail" class="control-label">{{ 'Standardobjectivedetail' }}</label>
    <input class="form-control" name="standardObjectiveDetail" type="text" id="standardObjectiveDetail" value="{{ isset($organization->standardObjectiveDetail) ? $organization->standardObjectiveDetail : ''}}" >
    {!! $errors->first('standardObjectiveDetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('addressDetail') ? 'has-error' : ''}}">
    <label for="addressDetail" class="control-label">{{ 'Addressdetail' }}</label>
    <input class="form-control" name="addressDetail" type="text" id="addressDetail" value="{{ isset($organization->addressDetail) ? $organization->addressDetail : ''}}" >
    {!! $errors->first('addressDetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('addressName') ? 'has-error' : ''}}">
    <label for="addressName" class="control-label">{{ 'Addressname' }}</label>
    <input class="form-control" name="addressName" type="text" id="addressName" value="{{ isset($organization->addressName) ? $organization->addressName : ''}}" >
    {!! $errors->first('addressName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('buildingName') ? 'has-error' : ''}}">
    <label for="buildingName" class="control-label">{{ 'Buildingname' }}</label>
    <input class="form-control" name="buildingName" type="text" id="buildingName" value="{{ isset($organization->buildingName) ? $organization->buildingName : ''}}" >
    {!! $errors->first('buildingName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('roomNo') ? 'has-error' : ''}}">
    <label for="roomNo" class="control-label">{{ 'Roomno' }}</label>
    <input class="form-control" name="roomNo" type="text" id="roomNo" value="{{ isset($organization->roomNo) ? $organization->roomNo : ''}}" >
    {!! $errors->first('roomNo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('floor') ? 'has-error' : ''}}">
    <label for="floor" class="control-label">{{ 'Floor' }}</label>
    <input class="form-control" name="floor" type="text" id="floor" value="{{ isset($organization->floor) ? $organization->floor : ''}}" >
    {!! $errors->first('floor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('villageName') ? 'has-error' : ''}}">
    <label for="villageName" class="control-label">{{ 'Villagename' }}</label>
    <input class="form-control" name="villageName" type="text" id="villageName" value="{{ isset($organization->villageName) ? $organization->villageName : ''}}" >
    {!! $errors->first('villageName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('houseNumber') ? 'has-error' : ''}}">
    <label for="houseNumber" class="control-label">{{ 'Housenumber' }}</label>
    <input class="form-control" name="houseNumber" type="text" id="houseNumber" value="{{ isset($organization->houseNumber) ? $organization->houseNumber : ''}}" >
    {!! $errors->first('houseNumber', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('moo') ? 'has-error' : ''}}">
    <label for="moo" class="control-label">{{ 'Moo' }}</label>
    <input class="form-control" name="moo" type="text" id="moo" value="{{ isset($organization->moo) ? $organization->moo : ''}}" >
    {!! $errors->first('moo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('soi') ? 'has-error' : ''}}">
    <label for="soi" class="control-label">{{ 'Soi' }}</label>
    <input class="form-control" name="soi" type="text" id="soi" value="{{ isset($organization->soi) ? $organization->soi : ''}}" >
    {!! $errors->first('soi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
    <label for="street" class="control-label">{{ 'Street' }}</label>
    <input class="form-control" name="street" type="text" id="street" value="{{ isset($organization->street) ? $organization->street : ''}}" >
    {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subDistrict') ? 'has-error' : ''}}">
    <label for="subDistrict" class="control-label">{{ 'Subdistrict' }}</label>
    <input class="form-control" name="subDistrict" type="text" id="subDistrict" value="{{ isset($organization->subDistrict) ? $organization->subDistrict : ''}}" >
    {!! $errors->first('subDistrict', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sdistrict') ? 'has-error' : ''}}">
    <label for="sdistrict" class="control-label">{{ 'Sdistrict' }}</label>
    <input class="form-control" name="sdistrict" type="text" id="sdistrict" value="{{ isset($organization->sdistrict) ? $organization->sdistrict : ''}}" >
    {!! $errors->first('sdistrict', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
    <label for="province" class="control-label">{{ 'Province' }}</label>
    <input class="form-control" name="province" type="text" id="province" value="{{ isset($organization->province) ? $organization->province : ''}}" >
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
