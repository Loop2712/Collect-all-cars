<div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($privilege->partner_id) ? $privilege->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('titel') ? 'has-error' : ''}}">
    <label for="titel" class="control-label">{{ 'Titel' }}</label>
    <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($privilege->titel) ? $privilege->titel : ''}}" >
    {!! $errors->first('titel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($privilege->detail) ? $privilege->detail : ''}}</textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('img_cover') ? 'has-error' : ''}}">
    <label for="img_cover" class="control-label">{{ 'Img Cover' }}</label>
    <input class="form-control" name="img_cover" type="file" id="img_cover" value="{{ isset($privilege->img_cover) ? $privilege->img_cover : ''}}" >
    {!! $errors->first('img_cover', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('img_content') ? 'has-error' : ''}}">
    <label for="img_content" class="control-label">{{ 'Img Content' }}</label>
    <input class="form-control" name="img_content" type="file" id="img_content" value="{{ isset($privilege->img_content) ? $privilege->img_content : ''}}" >
    {!! $errors->first('img_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($privilege->type) ? $privilege->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('redeem_type') ? 'has-error' : ''}}">
    <label for="redeem_type" class="control-label">{{ 'Redeem Type' }}</label>
    <input class="form-control" name="redeem_type" type="text" id="redeem_type" value="{{ isset($privilege->redeem_type) ? $privilege->redeem_type : ''}}" >
    {!! $errors->first('redeem_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount_privilege') ? 'has-error' : ''}}">
    <label for="amount_privilege" class="control-label">{{ 'Amount Privilege' }}</label>
    <input class="form-control" name="amount_privilege" type="text" id="amount_privilege" value="{{ isset($privilege->amount_privilege) ? $privilege->amount_privilege : ''}}" >
    {!! $errors->first('amount_privilege', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_privilege') ? 'has-error' : ''}}">
    <label for="start_privilege" class="control-label">{{ 'Start Privilege' }}</label>
    <input class="form-control" name="start_privilege" type="text" id="start_privilege" value="{{ isset($privilege->start_privilege) ? $privilege->start_privilege : ''}}" >
    {!! $errors->first('start_privilege', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('expire_privilege') ? 'has-error' : ''}}">
    <label for="expire_privilege" class="control-label">{{ 'Expire Privilege' }}</label>
    <input class="form-control" name="expire_privilege" type="text" id="expire_privilege" value="{{ isset($privilege->expire_privilege) ? $privilege->expire_privilege : ''}}" >
    {!! $errors->first('expire_privilege', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_view') ? 'has-error' : ''}}">
    <label for="user_view" class="control-label">{{ 'User View' }}</label>
    <input class="form-control" name="user_view" type="text" id="user_view" value="{{ isset($privilege->user_view) ? $privilege->user_view : ''}}" >
    {!! $errors->first('user_view', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_click_redeem') ? 'has-error' : ''}}">
    <label for="user_click_redeem" class="control-label">{{ 'User Click Redeem' }}</label>
    <input class="form-control" name="user_click_redeem" type="text" id="user_click_redeem" value="{{ isset($privilege->user_click_redeem) ? $privilege->user_click_redeem : ''}}" >
    {!! $errors->first('user_click_redeem', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
