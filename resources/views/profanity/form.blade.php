<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'คำหยาบที่ต้องการแบน' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($profanity->content) ? $profanity->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group d-flex justify-content-end">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Save' : 'Save' }}">
</div>
