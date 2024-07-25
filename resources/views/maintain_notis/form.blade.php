<div class="form-group {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($maintain_noti->name_user) ? $maintain_noti->name_user : ''}}" >
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maintain_notified_user_id') ? 'has-error' : ''}}">
    <label for="maintain_notified_user_id" class="control-label">{{ 'Maintain Notified User Id' }}</label>
    <input class="form-control" name="maintain_notified_user_id" type="text" id="maintain_notified_user_id" value="{{ isset($maintain_noti->maintain_notified_user_id) ? $maintain_noti->maintain_notified_user_id : ''}}" >
    {!! $errors->first('maintain_notified_user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($maintain_noti->user_id) ? $maintain_noti->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="text" id="partner_id" value="{{ isset($maintain_noti->partner_id) ? $maintain_noti->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
    <label for="name_area" class="control-label">{{ 'Name Area' }}</label>
    <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($maintain_noti->name_area) ? $maintain_noti->name_area : ''}}" >
    {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail_location') ? 'has-error' : ''}}">
    <label for="detail_location" class="control-label">{{ 'Detail Location' }}</label>
    <input class="form-control" name="detail_location" type="text" id="detail_location" value="{{ isset($maintain_noti->detail_location) ? $maintain_noti->detail_location : ''}}" >
    {!! $errors->first('detail_location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($maintain_noti->title) ? $maintain_noti->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail_title') ? 'has-error' : ''}}">
    <label for="detail_title" class="control-label">{{ 'Detail Title' }}</label>
    <input class="form-control" name="detail_title" type="text" id="detail_title" value="{{ isset($maintain_noti->detail_title) ? $maintain_noti->detail_title : ''}}" >
    {!! $errors->first('detail_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <input class="form-control" name="category_id" type="text" id="category_id" value="{{ isset($maintain_noti->category_id) ? $maintain_noti->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : ''}}">
    <label for="sub_category_id" class="control-label">{{ 'Sub Category Id' }}</label>
    <input class="form-control" name="sub_category_id" type="text" id="sub_category_id" value="{{ isset($maintain_noti->sub_category_id) ? $maintain_noti->sub_category_id : ''}}" >
    {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo" >{{ isset($maintain_noti->photo) ? $maintain_noti->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($maintain_noti->status) ? $maintain_noti->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('priority') ? 'has-error' : ''}}">
    <label for="priority" class="control-label">{{ 'Priority' }}</label>
    <input class="form-control" name="priority" type="text" id="priority" value="{{ isset($maintain_noti->priority) ? $maintain_noti->priority : ''}}" >
    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'Name Officer' }}</label>
    <textarea class="form-control" rows="5" name="name_officer" type="textarea" id="name_officer" >{{ isset($maintain_noti->name_officer) ? $maintain_noti->name_officer : ''}}</textarea>
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_id') ? 'has-error' : ''}}">
    <label for="officer_id" class="control-label">{{ 'Officer Id' }}</label>
    <textarea class="form-control" rows="5" name="officer_id" type="textarea" id="officer_id" >{{ isset($maintain_noti->officer_id) ? $maintain_noti->officer_id : ''}}</textarea>
    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('device_code') ? 'has-error' : ''}}">
    <label for="device_code" class="control-label">{{ 'Device Code' }}</label>
    <input class="form-control" name="device_code" type="text" id="device_code" value="{{ isset($maintain_noti->device_code) ? $maintain_noti->device_code : ''}}" >
    {!! $errors->first('device_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('device_code_id') ? 'has-error' : ''}}">
    <label for="device_code_id" class="control-label">{{ 'Device Code Id' }}</label>
    <input class="form-control" name="device_code_id" type="text" id="device_code_id" value="{{ isset($maintain_noti->device_code_id) ? $maintain_noti->device_code_id : ''}}" >
    {!! $errors->first('device_code_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('datetime_command') ? 'has-error' : ''}}">
    <label for="datetime_command" class="control-label">{{ 'Datetime Command' }}</label>
    <input class="form-control" name="datetime_command" type="datetime-local" id="datetime_command" value="{{ isset($maintain_noti->datetime_command) ? $maintain_noti->datetime_command : ''}}" >
    {!! $errors->first('datetime_command', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('datetime_start') ? 'has-error' : ''}}">
    <label for="datetime_start" class="control-label">{{ 'Datetime Start' }}</label>
    <input class="form-control" name="datetime_start" type="datetime-local" id="datetime_start" value="{{ isset($maintain_noti->datetime_start) ? $maintain_noti->datetime_start : ''}}" >
    {!! $errors->first('datetime_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('datetime_end') ? 'has-error' : ''}}">
    <label for="datetime_end" class="control-label">{{ 'Datetime End' }}</label>
    <input class="form-control" name="datetime_end" type="datetime-local" id="datetime_end" value="{{ isset($maintain_noti->datetime_end) ? $maintain_noti->datetime_end : ''}}" >
    {!! $errors->first('datetime_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('datetime_success') ? 'has-error' : ''}}">
    <label for="datetime_success" class="control-label">{{ 'Datetime Success' }}</label>
    <input class="form-control" name="datetime_success" type="datetime-local" id="datetime_success" value="{{ isset($maintain_noti->datetime_success) ? $maintain_noti->datetime_success : ''}}" >
    {!! $errors->first('datetime_success', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('material') ? 'has-error' : ''}}">
    <label for="material" class="control-label">{{ 'Material' }}</label>
    <textarea class="form-control" rows="5" name="material" type="textarea" id="material" >{{ isset($maintain_noti->material) ? $maintain_noti->material : ''}}</textarea>
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('repair_costs') ? 'has-error' : ''}}">
    <label for="repair_costs" class="control-label">{{ 'Repair Costs' }}</label>
    <input class="form-control" name="repair_costs" type="text" id="repair_costs" value="{{ isset($maintain_noti->repair_costs) ? $maintain_noti->repair_costs : ''}}" >
    {!! $errors->first('repair_costs', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_repair_costs') ? 'has-error' : ''}}">
    <label for="photo_repair_costs" class="control-label">{{ 'Photo Repair Costs' }}</label>
    <textarea class="form-control" rows="5" name="photo_repair_costs" type="textarea" id="photo_repair_costs" >{{ isset($maintain_noti->photo_repair_costs) ? $maintain_noti->photo_repair_costs : ''}}</textarea>
    {!! $errors->first('photo_repair_costs', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark_user') ? 'has-error' : ''}}">
    <label for="remark_user" class="control-label">{{ 'Remark User' }}</label>
    <textarea class="form-control" rows="5" name="remark_user" type="textarea" id="remark_user" >{{ isset($maintain_noti->remark_user) ? $maintain_noti->remark_user : ''}}</textarea>
    {!! $errors->first('remark_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark_officer') ? 'has-error' : ''}}">
    <label for="remark_officer" class="control-label">{{ 'Remark Officer' }}</label>
    <textarea class="form-control" rows="5" name="remark_officer" type="textarea" id="remark_officer" >{{ isset($maintain_noti->remark_officer) ? $maintain_noti->remark_officer : ''}}</textarea>
    {!! $errors->first('remark_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark_admin') ? 'has-error' : ''}}">
    <label for="remark_admin" class="control-label">{{ 'Remark Admin' }}</label>
    <textarea class="form-control" rows="5" name="remark_admin" type="textarea" id="remark_admin" >{{ isset($maintain_noti->remark_admin) ? $maintain_noti->remark_admin : ''}}</textarea>
    {!! $errors->first('remark_admin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating_maintain') ? 'has-error' : ''}}">
    <label for="rating_maintain" class="control-label">{{ 'Rating Maintain' }}</label>
    <input class="form-control" name="rating_maintain" type="text" id="rating_maintain" value="{{ isset($maintain_noti->rating_maintain) ? $maintain_noti->rating_maintain : ''}}" >
    {!! $errors->first('rating_maintain', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating_operation') ? 'has-error' : ''}}">
    <label for="rating_operation" class="control-label">{{ 'Rating Operation' }}</label>
    <input class="form-control" name="rating_operation" type="text" id="rating_operation" value="{{ isset($maintain_noti->rating_operation) ? $maintain_noti->rating_operation : ''}}" >
    {!! $errors->first('rating_operation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating_impression') ? 'has-error' : ''}}">
    <label for="rating_impression" class="control-label">{{ 'Rating Impression' }}</label>
    <input class="form-control" name="rating_impression" type="text" id="rating_impression" value="{{ isset($maintain_noti->rating_impression) ? $maintain_noti->rating_impression : ''}}" >
    {!! $errors->first('rating_impression', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating_sum') ? 'has-error' : ''}}">
    <label for="rating_sum" class="control-label">{{ 'Rating Sum' }}</label>
    <input class="form-control" name="rating_sum" type="text" id="rating_sum" value="{{ isset($maintain_noti->rating_sum) ? $maintain_noti->rating_sum : ''}}" >
    {!! $errors->first('rating_sum', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating_remark') ? 'has-error' : ''}}">
    <label for="rating_remark" class="control-label">{{ 'Rating Remark' }}</label>
    <textarea class="form-control" rows="5" name="rating_remark" type="textarea" id="rating_remark" >{{ isset($maintain_noti->rating_remark) ? $maintain_noti->rating_remark : ''}}</textarea>
    {!! $errors->first('rating_remark', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
