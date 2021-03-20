<span style="font-size: 22px;" class="control-label">{{ 'เหตุผลของท่าน / Please give reasons'}}</span>
<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
    <!-- <label for="provider_id" class="control-label">{{ 'Provider Id' }}</label> -->
    <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($not_comfor->provider_id) ? $not_comfor->provider_id : Auth::user()->provider_id}}" readonly>
    {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reply_provider_id') ? 'has-error' : ''}}">
    <!-- <label for="reply_provider_id" class="control-label">{{ 'Reply Provider Id' }}</label> -->
    <input class="form-control" name="reply_provider_id" type="hidden" id="reply_provider_id" value="{{ isset($not_comfor->reply_provider_id) ? $not_comfor->reply_provider_id : ''}}" readonly>
    {!! $errors->first('reply_provider_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <!-- <label for="content" class="control-label">{{ 'เหตุผล / Because' }}</label><span style="color: #FF0033;"> *</span> -->
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($not_comfor->content) ? $not_comfor->content : ''}}" required>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('want_phone') ? 'has-error' : ''}}">
    <label for="want_phone" class="control-label">{{ 'เบอร์โทรศัพท์ของท่าน / Your contact number' }}</label><span style="color: #FF0033;"> *</span>
    <br>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        <!-- <label for="phone" class="control-label">{{ 'เบอร์ของคุณ / Your phone number' }}</label> -->
        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($not_comfor->phone) ? $not_comfor->phone : Auth::user()->phone }}" required>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>

    <!-- <input name="want_phone" type="radio" id="want_phone" value="{{ isset($not_comfor->want_phone) ? $not_comfor->want_phone : 'Yes'}}" 
    onclick="document.querySelector('#phone').classList.remove('d-none');"> 
        &nbsp;&nbsp;&nbsp;แสดง / Show  -->
    <input name="want_phone" type="checkbox" id="want_phone" value="{{ isset($not_comfor->want_phone) ? $not_comfor->want_phone : 'No'}}" onchange="if(this.checked){
        document.querySelector('#phone').classList.add('d-none'),
        document.querySelector('#phone').remove('required');
    }else{
        document.querySelector('#phone').classList.remove('d-none'),
        document.querySelector('#phone').add('required');
    }"> &nbsp;&nbsp;&nbsp;ไม่แสดง / Do not show
    {!! $errors->first('want_phone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>
