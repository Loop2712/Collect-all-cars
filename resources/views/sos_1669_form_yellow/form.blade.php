<div class="form-group {{ $errors->has('be_notified') ? 'has-error' : ''}}">
    <label for="be_notified" class="control-label">{{ 'Be Notified' }}</label>
    <input class="form-control" name="be_notified" type="text" id="be_notified" value="{{ isset($sos_1669_form_yellow->be_notified) ? $sos_1669_form_yellow->be_notified : ''}}" >
    {!! $errors->first('be_notified', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($sos_1669_form_yellow->name_user) ? $sos_1669_form_yellow->name_user : ''}}" >
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_user') ? 'has-error' : ''}}">
    <label for="phone_user" class="control-label">{{ 'Phone User' }}</label>
    <input class="form-control" name="phone_user" type="text" id="phone_user" value="{{ isset($sos_1669_form_yellow->phone_user) ? $sos_1669_form_yellow->phone_user : ''}}" >
    {!! $errors->first('phone_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_1669_form_yellow->lat) ? $sos_1669_form_yellow->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_1669_form_yellow->lng) ? $sos_1669_form_yellow->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_sos') ? 'has-error' : ''}}">
    <label for="location_sos" class="control-label">{{ 'Location Sos' }}</label>
    <input class="form-control" name="location_sos" type="text" id="location_sos" value="{{ isset($sos_1669_form_yellow->location_sos) ? $sos_1669_form_yellow->location_sos : ''}}" >
    {!! $errors->first('location_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('symptom') ? 'has-error' : ''}}">
    <label for="symptom" class="control-label">{{ 'Symptom' }}</label>
    <input class="form-control" name="symptom" type="text" id="symptom" value="{{ isset($sos_1669_form_yellow->symptom) ? $sos_1669_form_yellow->symptom : ''}}" >
    {!! $errors->first('symptom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('symptom_other') ? 'has-error' : ''}}">
    <label for="symptom_other" class="control-label">{{ 'Symptom Other' }}</label>
    <input class="form-control" name="symptom_other" type="text" id="symptom_other" value="{{ isset($sos_1669_form_yellow->symptom_other) ? $sos_1669_form_yellow->symptom_other : ''}}" >
    {!! $errors->first('symptom_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idc') ? 'has-error' : ''}}">
    <label for="idc" class="control-label">{{ 'Idc' }}</label>
    <input class="form-control" name="idc" type="text" id="idc" value="{{ isset($sos_1669_form_yellow->idc) ? $sos_1669_form_yellow->idc : ''}}" >
    {!! $errors->first('idc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_type') ? 'has-error' : ''}}">
    <label for="vehicle_type" class="control-label">{{ 'Vehicle Type' }}</label>
    <input class="form-control" name="vehicle_type" type="text" id="vehicle_type" value="{{ isset($sos_1669_form_yellow->vehicle_type) ? $sos_1669_form_yellow->vehicle_type : ''}}" >
    {!! $errors->first('vehicle_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('operation_unit_name') ? 'has-error' : ''}}">
    <label for="operation_unit_name" class="control-label">{{ 'Operation Unit Name' }}</label>
    <input class="form-control" name="operation_unit_name" type="text" id="operation_unit_name" value="{{ isset($sos_1669_form_yellow->operation_unit_name) ? $sos_1669_form_yellow->operation_unit_name : ''}}" >
    {!! $errors->first('operation_unit_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('action_set_name') ? 'has-error' : ''}}">
    <label for="action_set_name" class="control-label">{{ 'Action Set Name' }}</label>
    <input class="form-control" name="action_set_name" type="text" id="action_set_name" value="{{ isset($sos_1669_form_yellow->action_set_name) ? $sos_1669_form_yellow->action_set_name : ''}}" >
    {!! $errors->first('action_set_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('operating_suit_type') ? 'has-error' : ''}}">
    <label for="operating_suit_type" class="control-label">{{ 'Operating Suit Type' }}</label>
    <input class="form-control" name="operating_suit_type" type="text" id="operating_suit_type" value="{{ isset($sos_1669_form_yellow->operating_suit_type) ? $sos_1669_form_yellow->operating_suit_type : ''}}" >
    {!! $errors->first('operating_suit_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_create_sos') ? 'has-error' : ''}}">
    <label for="time_create_sos" class="control-label">{{ 'Time Create Sos' }}</label>
    <input class="form-control" name="time_create_sos" type="time" id="time_create_sos" value="{{ isset($sos_1669_form_yellow->time_create_sos) ? $sos_1669_form_yellow->time_create_sos : ''}}" >
    {!! $errors->first('time_create_sos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_command') ? 'has-error' : ''}}">
    <label for="time_command" class="control-label">{{ 'Time Command' }}</label>
    <input class="form-control" name="time_command" type="time" id="time_command" value="{{ isset($sos_1669_form_yellow->time_command) ? $sos_1669_form_yellow->time_command : ''}}" >
    {!! $errors->first('time_command', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_go_to_help') ? 'has-error' : ''}}">
    <label for="time_go_to_help" class="control-label">{{ 'Time Go To Help' }}</label>
    <input class="form-control" name="time_go_to_help" type="time" id="time_go_to_help" value="{{ isset($sos_1669_form_yellow->time_go_to_help) ? $sos_1669_form_yellow->time_go_to_help : ''}}" >
    {!! $errors->first('time_go_to_help', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_to_the_scene') ? 'has-error' : ''}}">
    <label for="time_to_the_scene" class="control-label">{{ 'Time To The Scene' }}</label>
    <input class="form-control" name="time_to_the_scene" type="time" id="time_to_the_scene" value="{{ isset($sos_1669_form_yellow->time_to_the_scene) ? $sos_1669_form_yellow->time_to_the_scene : ''}}" >
    {!! $errors->first('time_to_the_scene', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_leave_the_scene') ? 'has-error' : ''}}">
    <label for="time_leave_the_scene" class="control-label">{{ 'Time Leave The Scene' }}</label>
    <input class="form-control" name="time_leave_the_scene" type="time" id="time_leave_the_scene" value="{{ isset($sos_1669_form_yellow->time_leave_the_scene) ? $sos_1669_form_yellow->time_leave_the_scene : ''}}" >
    {!! $errors->first('time_leave_the_scene', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_hospital') ? 'has-error' : ''}}">
    <label for="time_hospital" class="control-label">{{ 'Time Hospital' }}</label>
    <input class="form-control" name="time_hospital" type="time" id="time_hospital" value="{{ isset($sos_1669_form_yellow->time_hospital) ? $sos_1669_form_yellow->time_hospital : ''}}" >
    {!! $errors->first('time_hospital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_to_the_operating_base') ? 'has-error' : ''}}">
    <label for="time_to_the_operating_base" class="control-label">{{ 'Time To The Operating Base' }}</label>
    <input class="form-control" name="time_to_the_operating_base" type="time" id="time_to_the_operating_base" value="{{ isset($sos_1669_form_yellow->time_to_the_operating_base) ? $sos_1669_form_yellow->time_to_the_operating_base : ''}}" >
    {!! $errors->first('time_to_the_operating_base', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('km_create_sos_to_go_to_help') ? 'has-error' : ''}}">
    <label for="km_create_sos_to_go_to_help" class="control-label">{{ 'Km Create Sos To Go To Help' }}</label>
    <input class="form-control" name="km_create_sos_to_go_to_help" type="number" id="km_create_sos_to_go_to_help" value="{{ isset($sos_1669_form_yellow->km_create_sos_to_go_to_help) ? $sos_1669_form_yellow->km_create_sos_to_go_to_help : ''}}" >
    {!! $errors->first('km_create_sos_to_go_to_help', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('km_to_the_scene_to_leave_the_scene') ? 'has-error' : ''}}">
    <label for="km_to_the_scene_to_leave_the_scene" class="control-label">{{ 'Km To The Scene To Leave The Scene' }}</label>
    <input class="form-control" name="km_to_the_scene_to_leave_the_scene" type="number" id="km_to_the_scene_to_leave_the_scene" value="{{ isset($sos_1669_form_yellow->km_to_the_scene_to_leave_the_scene) ? $sos_1669_form_yellow->km_to_the_scene_to_leave_the_scene : ''}}" >
    {!! $errors->first('km_to_the_scene_to_leave_the_scene', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('km_hospital') ? 'has-error' : ''}}">
    <label for="km_hospital" class="control-label">{{ 'Km Hospital' }}</label>
    <input class="form-control" name="km_hospital" type="number" id="km_hospital" value="{{ isset($sos_1669_form_yellow->km_hospital) ? $sos_1669_form_yellow->km_hospital : ''}}" >
    {!! $errors->first('km_hospital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('km_operating_base') ? 'has-error' : ''}}">
    <label for="km_operating_base" class="control-label">{{ 'Km Operating Base' }}</label>
    <input class="form-control" name="km_operating_base" type="number" id="km_operating_base" value="{{ isset($sos_1669_form_yellow->km_operating_base) ? $sos_1669_form_yellow->km_operating_base : ''}}" >
    {!! $errors->first('km_operating_base', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rc') ? 'has-error' : ''}}">
    <label for="rc" class="control-label">{{ 'Rc' }}</label>
    <input class="form-control" name="rc" type="text" id="rc" value="{{ isset($sos_1669_form_yellow->rc) ? $sos_1669_form_yellow->rc : ''}}" >
    {!! $errors->first('rc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rc_black_text') ? 'has-error' : ''}}">
    <label for="rc_black_text" class="control-label">{{ 'Rc Black Text' }}</label>
    <input class="form-control" name="rc_black_text" type="text" id="rc_black_text" value="{{ isset($sos_1669_form_yellow->rc_black_text) ? $sos_1669_form_yellow->rc_black_text : ''}}" >
    {!! $errors->first('rc_black_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('treatment') ? 'has-error' : ''}}">
    <label for="treatment" class="control-label">{{ 'Treatment' }}</label>
    <input class="form-control" name="treatment" type="text" id="treatment" value="{{ isset($sos_1669_form_yellow->treatment) ? $sos_1669_form_yellow->treatment : ''}}" >
    {!! $errors->first('treatment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_treatment') ? 'has-error' : ''}}">
    <label for="sub_treatment" class="control-label">{{ 'Sub Treatment' }}</label>
    <input class="form-control" name="sub_treatment" type="text" id="sub_treatment" value="{{ isset($sos_1669_form_yellow->sub_treatment) ? $sos_1669_form_yellow->sub_treatment : ''}}" >
    {!! $errors->first('sub_treatment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_name_1') ? 'has-error' : ''}}">
    <label for="patient_name_1" class="control-label">{{ 'Patient Name 1' }}</label>
    <input class="form-control" name="patient_name_1" type="text" id="patient_name_1" value="{{ isset($sos_1669_form_yellow->patient_name_1) ? $sos_1669_form_yellow->patient_name_1 : ''}}" >
    {!! $errors->first('patient_name_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_age_1') ? 'has-error' : ''}}">
    <label for="patient_age_1" class="control-label">{{ 'Patient Age 1' }}</label>
    <input class="form-control" name="patient_age_1" type="text" id="patient_age_1" value="{{ isset($sos_1669_form_yellow->patient_age_1) ? $sos_1669_form_yellow->patient_age_1 : ''}}" >
    {!! $errors->first('patient_age_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_hn_1') ? 'has-error' : ''}}">
    <label for="patient_hn_1" class="control-label">{{ 'Patient Hn 1' }}</label>
    <input class="form-control" name="patient_hn_1" type="text" id="patient_hn_1" value="{{ isset($sos_1669_form_yellow->patient_hn_1) ? $sos_1669_form_yellow->patient_hn_1 : ''}}" >
    {!! $errors->first('patient_hn_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_vn_1') ? 'has-error' : ''}}">
    <label for="patient_vn_1" class="control-label">{{ 'Patient Vn 1' }}</label>
    <input class="form-control" name="patient_vn_1" type="text" id="patient_vn_1" value="{{ isset($sos_1669_form_yellow->patient_vn_1) ? $sos_1669_form_yellow->patient_vn_1 : ''}}" >
    {!! $errors->first('patient_vn_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('delivered_province_1') ? 'has-error' : ''}}">
    <label for="delivered_province_1" class="control-label">{{ 'Delivered Province 1' }}</label>
    <input class="form-control" name="delivered_province_1" type="text" id="delivered_province_1" value="{{ isset($sos_1669_form_yellow->delivered_province_1) ? $sos_1669_form_yellow->delivered_province_1 : ''}}" >
    {!! $errors->first('delivered_province_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('delivered_hospital_1') ? 'has-error' : ''}}">
    <label for="delivered_hospital_1" class="control-label">{{ 'Delivered Hospital 1' }}</label>
    <input class="form-control" name="delivered_hospital_1" type="text" id="delivered_hospital_1" value="{{ isset($sos_1669_form_yellow->delivered_hospital_1) ? $sos_1669_form_yellow->delivered_hospital_1 : ''}}" >
    {!! $errors->first('delivered_hospital_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_name_2') ? 'has-error' : ''}}">
    <label for="patient_name_2" class="control-label">{{ 'Patient Name 2' }}</label>
    <input class="form-control" name="patient_name_2" type="text" id="patient_name_2" value="{{ isset($sos_1669_form_yellow->patient_name_2) ? $sos_1669_form_yellow->patient_name_2 : ''}}" >
    {!! $errors->first('patient_name_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_age_2') ? 'has-error' : ''}}">
    <label for="patient_age_2" class="control-label">{{ 'Patient Age 2' }}</label>
    <input class="form-control" name="patient_age_2" type="text" id="patient_age_2" value="{{ isset($sos_1669_form_yellow->patient_age_2) ? $sos_1669_form_yellow->patient_age_2 : ''}}" >
    {!! $errors->first('patient_age_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_hn_2') ? 'has-error' : ''}}">
    <label for="patient_hn_2" class="control-label">{{ 'Patient Hn 2' }}</label>
    <input class="form-control" name="patient_hn_2" type="text" id="patient_hn_2" value="{{ isset($sos_1669_form_yellow->patient_hn_2) ? $sos_1669_form_yellow->patient_hn_2 : ''}}" >
    {!! $errors->first('patient_hn_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_vn_2') ? 'has-error' : ''}}">
    <label for="patient_vn_2" class="control-label">{{ 'Patient Vn 2' }}</label>
    <input class="form-control" name="patient_vn_2" type="text" id="patient_vn_2" value="{{ isset($sos_1669_form_yellow->patient_vn_2) ? $sos_1669_form_yellow->patient_vn_2 : ''}}" >
    {!! $errors->first('patient_vn_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('delivered_province_2') ? 'has-error' : ''}}">
    <label for="delivered_province_2" class="control-label">{{ 'Delivered Province 2' }}</label>
    <input class="form-control" name="delivered_province_2" type="text" id="delivered_province_2" value="{{ isset($sos_1669_form_yellow->delivered_province_2) ? $sos_1669_form_yellow->delivered_province_2 : ''}}" >
    {!! $errors->first('delivered_province_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('delivered_hospital_2') ? 'has-error' : ''}}">
    <label for="delivered_hospital_2" class="control-label">{{ 'Delivered Hospital 2' }}</label>
    <input class="form-control" name="delivered_hospital_2" type="text" id="delivered_hospital_2" value="{{ isset($sos_1669_form_yellow->delivered_hospital_2) ? $sos_1669_form_yellow->delivered_hospital_2 : ''}}" >
    {!! $errors->first('delivered_hospital_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submission_criteria') ? 'has-error' : ''}}">
    <label for="submission_criteria" class="control-label">{{ 'Submission Criteria' }}</label>
    <input class="form-control" name="submission_criteria" type="text" id="submission_criteria" value="{{ isset($sos_1669_form_yellow->submission_criteria) ? $sos_1669_form_yellow->submission_criteria : ''}}" >
    {!! $errors->first('submission_criteria', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('communication_hospital') ? 'has-error' : ''}}">
    <label for="communication_hospital" class="control-label">{{ 'Communication Hospital' }}</label>
    <input class="form-control" name="communication_hospital" type="text" id="communication_hospital" value="{{ isset($sos_1669_form_yellow->communication_hospital) ? $sos_1669_form_yellow->communication_hospital : ''}}" >
    {!! $errors->first('communication_hospital', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registration_category') ? 'has-error' : ''}}">
    <label for="registration_category" class="control-label">{{ 'Registration Category' }}</label>
    <input class="form-control" name="registration_category" type="text" id="registration_category" value="{{ isset($sos_1669_form_yellow->registration_category) ? $sos_1669_form_yellow->registration_category : ''}}" >
    {!! $errors->first('registration_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
    <label for="registration_number" class="control-label">{{ 'Registration Number' }}</label>
    <input class="form-control" name="registration_number" type="text" id="registration_number" value="{{ isset($sos_1669_form_yellow->registration_number) ? $sos_1669_form_yellow->registration_number : ''}}" >
    {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registration_province') ? 'has-error' : ''}}">
    <label for="registration_province" class="control-label">{{ 'Registration Province' }}</label>
    <input class="form-control" name="registration_province" type="text" id="registration_province" value="{{ isset($sos_1669_form_yellow->registration_province) ? $sos_1669_form_yellow->registration_province : ''}}" >
    {!! $errors->first('registration_province', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('owner_registration') ? 'has-error' : ''}}">
    <label for="owner_registration" class="control-label">{{ 'Owner Registration' }}</label>
    <input class="form-control" name="owner_registration" type="text" id="owner_registration" value="{{ isset($sos_1669_form_yellow->owner_registration) ? $sos_1669_form_yellow->owner_registration : ''}}" >
    {!! $errors->first('owner_registration', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
