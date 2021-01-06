<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อ - นามสกุล' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($deliver->name) ? $deliver->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'หมายเลขโทรศัพท์' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($deliver->phone) ? $deliver->phone : ''}}" required>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'ที่อยู่ในการจัดส่ง' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($deliver->detail) ? $deliver->detail : ''}}" required>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('postal_code') ? 'has-error' : ''}}">
    <label for="postal_code" class="control-label">{{ 'รหัสไปรษณีย์' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="postal_code" type="text" id="postal_code" value="{{ isset($deliver->postal_code) ? $deliver->postal_code : ''}}" required>
    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($deliver->user_id) ? $deliver->user_id : Auth::user()->id}}" required readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>


<!-- 
<div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
    <label for="province" class="control-label">{{ 'Province' }}</label>
    <input class="form-control" name="province" type="text" id="province" value="{{ isset($deliver->province) ? $deliver->province : ''}}" >
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
    <label for="district" class="control-label">{{ 'District' }}</label>
    <input class="form-control" name="district" type="text" id="district" value="{{ isset($deliver->district) ? $deliver->district : ''}}" >
    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
</div> -->
