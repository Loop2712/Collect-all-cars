<!-- <div class="form-group {{ $errors->has('th') ? 'has-error' : ''}}">
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
</div> -->
<div class="container" style="font-family: 'Prompt', sans-serif;display: flex;">
    <div class="card-deck text-center">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาไทย</h5>
                    <input class="form-control" name="th" type="text" id="th" value="{{ isset($text_topic->th) ? $text_topic->th : ''}}" >
    {!! $errors->first('th', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาอังกฤษ</h5>
                    <input class="form-control" name="en" type="text" id="en" value="{{ isset($text_topic->en) ? $text_topic->en : ''}}" >
    {!! $errors->first('en', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาจีน</h5>
                    <input class="form-control" name="zh_TW" type="text" id="zh_TW" value="{{ isset($text_topic->zh_TW) ? $text_topic->zh_TW : ''}}" >
    {!! $errors->first('zh_TW', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาญี่ปุ่น</h5>
                    <input class="form-control" name="ja" type="text" id="ja" value="{{ isset($text_topic->ja) ? $text_topic->ja : ''}}" >
    {!! $errors->first('ja', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาเกาหลี</h5>
                    <input class="form-control" name="ko" type="text" id="ko" value="{{ isset($text_topic->ko) ? $text_topic->ko : ''}}" >
    {!! $errors->first('ko', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาสเปน</h5>
                    <input class="form-control" name="es" type="text" id="es" value="{{ isset($text_topic->es) ? $text_topic->es : ''}}" >
    {!! $errors->first('es', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาลาว</h5>
                    <input class="form-control" name="lo" type="text" id="lo" value="{{ isset($text_topic->lo) ? $text_topic->lo : ''}}" >
    {!! $errors->first('lo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ภาษาพม่า</h5>
                    <input class="form-control" name="my" type="text" id="my" value="{{ isset($text_topic->my) ? $text_topic->my : ''}}" >
    {!! $errors->first('my', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="d-flex justify-content-end">
    <input class="d-flex  btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
