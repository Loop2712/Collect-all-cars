<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($report_news->content) ? $report_news->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('news_id') ? 'has-error' : ''}}">
    <label for="news_id" class="control-label">{{ 'News Id' }}</label>
    <input class="form-control" name="news_id" type="number" id="news_id" value="{{ isset($report_news->news_id) ? $report_news->news_id : ''}}" >
    {!! $errors->first('news_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
