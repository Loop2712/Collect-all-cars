<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($mylog_condo->title) ? $mylog_condo->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($mylog_condo->content) ? $mylog_condo->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <textarea class="form-control" rows="5" name="condo_id" type="textarea" id="condo_id" >{{ isset($mylog_condo->condo_id) ? $mylog_condo->condo_id : ''}}</textarea>
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
