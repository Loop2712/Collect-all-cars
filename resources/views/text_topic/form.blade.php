<div class="form-group {{ $errors->has('th') ? 'has-error' : ''}}">
    <label for="th" class="control-label">{{ 'Th' }}</label>
    <input class="form-control" name="th" type="text" id="th" value="{{ isset($text_topic->th) ? $text_topic->th : ''}}" >
    {!! $errors->first('th', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en') ? 'has-error' : ''}}">
    <label for="en" class="control-label">{{ 'En' }}</label>
    <input class="form-control" name="en" type="text" id="en" value="{{ isset($text_topic->en) ? $text_topic->en : ''}}" >
    {!! $errors->first('en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zh_TW') ? 'has-error' : ''}}">
    <label for="zh_TW" class="control-label">{{ 'Zh Tw' }}</label>
    <input class="form-control" name="zh_TW" type="text" id="zh_TW" value="{{ isset($text_topic->zh_TW) ? $text_topic->zh_TW : ''}}" >
    {!! $errors->first('zh_TW', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ja') ? 'has-error' : ''}}">
    <label for="ja" class="control-label">{{ 'Ja' }}</label>
    <input class="form-control" name="ja" type="text" id="ja" value="{{ isset($text_topic->ja) ? $text_topic->ja : ''}}" >
    {!! $errors->first('ja', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ko') ? 'has-error' : ''}}">
    <label for="ko" class="control-label">{{ 'Ko' }}</label>
    <input class="form-control" name="ko" type="text" id="ko" value="{{ isset($text_topic->ko) ? $text_topic->ko : ''}}" >
    {!! $errors->first('ko', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('es') ? 'has-error' : ''}}">
    <label for="es" class="control-label">{{ 'Es' }}</label>
    <input class="form-control" name="es" type="text" id="es" value="{{ isset($text_topic->es) ? $text_topic->es : ''}}" >
    {!! $errors->first('es', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
