<!-- <div class="form-group {{ $errors->has('juristicID') ? 'has-error' : ''}}">
    <label for="juristicID" class="control-label">{{ 'หมายเลขนิติบุคคล' }}</label>
    <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($organization->juristicID) ? $organization->juristicID : ''}}" readonly>
    {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
    <label for="juristicNameTH" class="control-label">{{ 'ชื่อนิติบุคคล(TH)' }}</label>
    <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($organization->juristicNameTH) ? $organization->juristicNameTH : ''}}" readonly>
    {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicNameEN') ? 'has-error' : ''}}">
    <label for="juristicNameEN" class="control-label">{{ 'ชื่อนิติบุคคล(EN)' }}</label>
    <input class="form-control" name="juristicNameEN" type="text" id="juristicNameEN" value="{{ isset($organization->juristicNameEN) ? $organization->juristicNameEN : ''}}" >
    {!! $errors->first('juristicNameEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicType') ? 'has-error' : ''}}">
    <label for="juristicType" class="control-label">{{ 'ประเภทนิติบุคคล' }}</label>
    <input class="form-control" name="juristicType" type="text" id="juristicType" value="{{ isset($organization->juristicType) ? $organization->juristicType : ''}}" >
    {!! $errors->first('juristicType', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registerDate') ? 'has-error' : ''}}">
    <label for="registerDate" class="control-label">{{ 'วันที่จดทะเบียน' }}</label>
    <input class="form-control" name="registerDate" type="text" id="registerDate" value="{{ isset($organization->registerDate) ? $organization->registerDate : ''}}" >
    {!! $errors->first('registerDate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('juristicStatus') ? 'has-error' : ''}}">
    <label for="juristicStatus" class="control-label">{{ 'สถานะ' }}</label>
    <input class="form-control" name="juristicStatus" type="text" id="juristicStatus" value="{{ isset($organization->juristicStatus) ? $organization->juristicStatus : ''}}" >
    {!! $errors->first('juristicStatus', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registerCapital') ? 'has-error' : ''}}">
    <label for="registerCapital" class="control-label">{{ 'ทุนจดทะเบียน' }}</label>
    <input class="form-control" name="registerCapital" type="text" id="registerCapital" value="{{ isset($organization->registerCapital) ? $organization->registerCapital : ''}}" >
    {!! $errors->first('registerCapital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('standardObjective') ? 'has-error' : ''}}">
    <label for="standardObjective" class="control-label">{{ 'ประกอบธุรกิจ' }}</label>
    <input class="form-control" name="standardObjective" type="text" id="standardObjective" value="{{ isset($organization->standardObjective) ? $organization->standardObjective : ''}}" >
    {!! $errors->first('standardObjective', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('standardObjectiveDetail') ? 'has-error' : ''}}">
    <label for="standardObjectiveDetail" class="control-label">{{ 'รายละเอียดการประกอบธุรกิจ' }}</label>
    <input class="form-control" name="standardObjectiveDetail" type="text" id="standardObjectiveDetail" value="{{ isset($organization->standardObjectiveDetail) ? $organization->standardObjectiveDetail : ''}}" >
    {!! $errors->first('standardObjectiveDetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('addressDetail') ? 'has-error' : ''}}">
    <label for="addressDetail" class="control-label">{{ 'รายละเอียดที่อยู่' }}</label>
    <input class="form-control" name="addressDetail" type="text" id="addressDetail" value="{{ isset($organization->addressDetail) ? $organization->addressDetail : ''}}" >
    {!! $errors->first('addressDetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('addressName') ? 'has-error' : ''}}">
    <label for="addressName" class="control-label">{{ 'ชื่อที่อยู่' }}</label>
    <input class="form-control" name="addressName" type="text" id="addressName" value="{{ isset($organization->addressName) ? $organization->addressName : ''}}" >
    {!! $errors->first('addressName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('buildingName') ? 'has-error' : ''}}">
    <label for="buildingName" class="control-label">{{ 'ชื่ออาคาร' }}</label>
    <input class="form-control" name="buildingName" type="text" id="buildingName" value="{{ isset($organization->buildingName) ? $organization->buildingName : ''}}" >
    {!! $errors->first('buildingName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('roomNo') ? 'has-error' : ''}}">
    <label for="roomNo" class="control-label">{{ 'หมายเลขห้อง' }}</label>
    <input class="form-control" name="roomNo" type="text" id="roomNo" value="{{ isset($organization->roomNo) ? $organization->roomNo : ''}}" >
    {!! $errors->first('roomNo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('floor') ? 'has-error' : ''}}">
    <label for="floor" class="control-label">{{ 'ชั้น' }}</label>
    <input class="form-control" name="floor" type="text" id="floor" value="{{ isset($organization->floor) ? $organization->floor : ''}}" >
    {!! $errors->first('floor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('villageName') ? 'has-error' : ''}}">
    <label for="villageName" class="control-label">{{ 'ชื่อหมู่บ้าน' }}</label>
    <input class="form-control" name="villageName" type="text" id="villageName" value="{{ isset($organization->villageName) ? $organization->villageName : ''}}" >
    {!! $errors->first('villageName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('houseNumber') ? 'has-error' : ''}}">
    <label for="houseNumber" class="control-label">{{ 'เลขที่บ้าน' }}</label>
    <input class="form-control" name="houseNumber" type="text" id="houseNumber" value="{{ isset($organization->houseNumber) ? $organization->houseNumber : ''}}" >
    {!! $errors->first('houseNumber', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('moo') ? 'has-error' : ''}}">
    <label for="moo" class="control-label">{{ 'หมู่' }}</label>
    <input class="form-control" name="moo" type="text" id="moo" value="{{ isset($organization->moo) ? $organization->moo : ''}}" >
    {!! $errors->first('moo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('soi') ? 'has-error' : ''}}">
    <label for="soi" class="control-label">{{ 'ซอย' }}</label>
    <input class="form-control" name="soi" type="text" id="soi" value="{{ isset($organization->soi) ? $organization->soi : ''}}" >
    {!! $errors->first('soi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
    <label for="street" class="control-label">{{ 'ถนน' }}</label>
    <input class="form-control" name="street" type="text" id="street" value="{{ isset($organization->street) ? $organization->street : ''}}" >
    {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subDistrict') ? 'has-error' : ''}}">
    <label for="subDistrict" class="control-label">{{ 'ตำบล' }}</label>
    <input class="form-control" name="subDistrict" type="text" id="subDistrict" value="{{ isset($organization->subDistrict) ? $organization->subDistrict : ''}}" >
    {!! $errors->first('subDistrict', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sdistrict') ? 'has-error' : ''}}">
    <label for="sdistrict" class="control-label">{{ 'อำเภอ' }}</label>
    <input class="form-control" name="sdistrict" type="text" id="sdistrict" value="{{ isset($organization->sdistrict) ? $organization->sdistrict : ''}}" >
    {!! $errors->first('sdistrict', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
    <label for="province" class="control-label">{{ 'จังหวัด' }}</label>
    <input class="form-control" name="province" type="text" id="province" value="{{ isset($organization->province) ? $organization->province : ''}}" >
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
</div>
 -->

 

 <div id="div_organization" class="d-none">
    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลองค์กร' }}</span><br>
    <span style="font-size: 18px;" class="control-label">{{ 'Company info.' }}</span><span style="color: #FF0033;"> *<br><br></span>
    </div>

<div class="container"> 
<div class="col-md-12">
    <div class="row">
       
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลองค์กร'}}</b></span>
          
          <br><br>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>หมายเลขนิติบุคคล</b></label>
                    <div style="margin-top:7px;" class="form-group {{ $errors->has('juristicID') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($organization->juristicID) ? $organization->juristicID : ''}}" readonly>
                        {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>ชื่อนิติบุคคล(TH)</b></label>
                    <div style="margin-top:7px;" class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($organization->juristicNameTH) ? $organization->juristicNameTH : ''}}" readonly>
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>ชื่อนิติบุคคล(EN)</b></label>
                    <div class="form-group {{ $errors->has('juristicNameEN') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameEN" type="text" id="juristicNameEN" value="{{ isset($organization->juristicNameEN) ? $organization->juristicNameEN : ''}}" >
                        {!! $errors->first('juristicNameEN', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>ประเภทนิติบุคคล</b></label>
                        <div class="form-group {{ $errors->has('juristicType') ? 'has-error' : ''}}">
                            <input class="form-control" name="juristicType" type="text" id="juristicType" value="{{ isset($organization->juristicType) ? $organization->juristicType : ''}}" >
                            {!! $errors->first('juristicType', '<p class="help-block">:message</p>') !!}
                        </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>วันที่จดทะเบียน</b></label>
                    <div class="form-group {{ $errors->has('registerDate') ? 'has-error' : ''}}">
                        <input class="form-control" name="registerDate" type="text" id="registerDate" value="{{ isset($organization->registerDate) ? $organization->registerDate : ''}}" >
                        {!! $errors->first('registerDate', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>สถานะนิติบุคคล</b></label>
                    <div class="form-group {{ $errors->has('juristicStatus') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicStatus" type="text" id="juristicStatus" value="{{ isset($organization->juristicStatus) ? $organization->juristicStatus : ''}}" >
                        {!! $errors->first('juristicStatus', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>ทุนจดทะเบียน</b></label>
                    <div class="form-group {{ $errors->has('registerCapital') ? 'has-error' : ''}}">
                        <input class="form-control" name="registerCapital" type="text" id="registerCapital" value="{{ isset($organization->registerCapital) ? $organization->registerCapital : ''}}" >
                        {!! $errors->first('registerCapital', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>รหัสหมวดหมู่ tsic</b></label>
                    <div class="form-group {{ $errors->has('standardObjective') ? 'has-error' : ''}}">
                        <input class="form-control" name="standardObjective" type="text" id="standardObjective" value="{{ isset($organization->standardObjective) ? $organization->standardObjective : ''}}" >
                        {!! $errors->first('standardObjective', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>รายละเอียดวัตถุประสงค์จัดตั้ง</b></label>
                    <div class="form-group {{ $errors->has('standardObjectiveDetail') ? 'has-error' : ''}}">
                        <input class="form-control" name="standardObjectiveDetail" type="text" id="standardObjectiveDetail" value="{{ isset($organization->standardObjectiveDetail) ? $organization->standardObjectiveDetail : ''}}" >
                        {!! $errors->first('standardObjectiveDetail', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>mail</b></label>
                    <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
                        <input class="form-control" name="mail" type="text" id="mail" value="{{ isset($organization->mail) ? $organization->mail : ''}}" >
                        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label  class="control-label"><b>phone</b></label>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($organization->phone) ? $organization->phone : ''}}" >
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
        <br> 
            <div class="col-12">
      
            <span style="font-size: 22px;" class="control-label"><b>{{ 'ข้อมูลที่อยู่องค์กร'}}</b></span>
          
          <br><br>
        <div class="row">
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>รายละเอียดที่อยู่</b></label>
                <div class="form-group {{ $errors->has('addressDetail') ? 'has-error' : ''}}">
                    <input class="form-control" name="addressDetail" type="text" id="addressDetail" value="{{ isset($organization->addressDetail) ? $organization->addressDetail : ''}}" >
                    {!! $errors->first('addressDetail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>ชื่อสาขา</b></label>
                <div class="form-group {{ $errors->has('addressName') ? 'has-error' : ''}}">
                    <input class="form-control" name="addressName" type="text" id="addressName" value="{{ isset($organization->addressName) ? $organization->addressName : ''}}" >
                    {!! $errors->first('addressName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>อาคาร</b></label>
                <div class="form-group {{ $errors->has('buildingName') ? 'has-error' : ''}}">
                    <input class="form-control" name="buildingName" type="text" id="buildingName" value="{{ isset($organization->buildingName) ? $organization->buildingName : ''}}" >
                    {!! $errors->first('buildingName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>เลขที่ห้อง</b></label>
                <div class="form-group {{ $errors->has('roomNo') ? 'has-error' : ''}}">
                    <input class="form-control" name="roomNo" type="text" id="roomNo" value="{{ isset($organization->roomNo) ? $organization->roomNo : ''}}" >
                    {!! $errors->first('roomNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>ชั้นที่</b></label>
                <div class="form-group {{ $errors->has('floor') ? 'has-error' : ''}}">
                    <input class="form-control" name="floor" type="text" id="floor" value="{{ isset($organization->floor) ? $organization->floor : ''}}" >
                    {!! $errors->first('floor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>หมู่บ้าน</b></label>
                <div class="form-group {{ $errors->has('villageName') ? 'has-error' : ''}}">
                    <input class="form-control" name="villageName" type="text" id="villageName" value="{{ isset($organization->villageName) ? $organization->villageName : ''}}" >
                    {!! $errors->first('villageName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>เลขที่บ้าน</b></label>
                <div class="form-group {{ $errors->has('houseNumber') ? 'has-error' : ''}}">
                    <input class="form-control" name="houseNumber" type="text" id="houseNumber" value="{{ isset($organization->houseNumber) ? $organization->houseNumber : ''}}" >
                    {!! $errors->first('houseNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>หมู่ที่</b></label>
                <div class="form-group {{ $errors->has('moo') ? 'has-error' : ''}}">
                    <input class="form-control" name="moo" type="text" id="moo" value="{{ isset($organization->moo) ? $organization->moo : ''}}" >
                    {!! $errors->first('moo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>ซอย</b></label>
                <div class="form-group {{ $errors->has('soi') ? 'has-error' : ''}}">
                    <input class="form-control" name="soi" type="text" id="soi" value="{{ isset($organization->soi) ? $organization->soi : ''}}" >
                    {!! $errors->first('soi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>ถนน</b></label>
                <div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
                <input class="form-control" name="street" type="text" id="street" value="{{ isset($organization->street) ? $organization->street : ''}}" >
                {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
            </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>แขวง / ตำบล</b></label>
                <div class="form-group {{ $errors->has('subDistrict') ? 'has-error' : ''}}">
                <input class="form-control" name="subDistrict" type="text" id="subDistrict" value="{{ isset($organization->subDistrict) ? $organization->subDistrict : ''}}" >
                {!! $errors->first('subDistrict', '<p class="help-block">:message</p>') !!}
            </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>เขต / อำเภอ</b></label>
                <div class="form-group {{ $errors->has('sdistrict') ? 'has-error' : ''}}">
                    <input class="form-control" name="sdistrict" type="text" id="sdistrict" value="{{ isset($organization->sdistrict) ? $organization->sdistrict : ''}}" >
                    {!! $errors->first('sdistrict', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label  class="control-label"><b>จังหวัด</b></label>
                <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                    <input class="form-control" name="province" type="text" id="province" value="{{ isset($organization->province) ? $organization->province : ''}}" >
                    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-6">
            <div class="form-group float-left">
                <br>
                <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
            </div>
        </div>
        <div class="col-6">
            <div class="float-right">
                <br>
                <a href="{{ url('/profile') }}" class="btn btn-warning btn-sm" title="Back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ
                </a>
            </div>
        </div>
    </div>
</div>

