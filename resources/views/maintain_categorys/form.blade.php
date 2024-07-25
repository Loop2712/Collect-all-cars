<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($maintain_category->name) ? $maintain_category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($maintain_category->user_id) ? $maintain_category->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($maintain_category->area) ? $maintain_category->area : ''}}" >
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('line_group_id') ? 'has-error' : ''}}">
    <label for="line_group_id" class="control-label">{{ 'Line Group Id' }}</label>
    <input class="form-control" name="line_group_id" type="text" id="line_group_id" value="{{ isset($maintain_category->line_group_id) ? $maintain_category->line_group_id : ''}}" >
    {!! $errors->first('line_group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($maintain_category->status) ? $maintain_category->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('count') ? 'has-error' : ''}}">
    <label for="count" class="control-label">{{ 'Count' }}</label>
    <input class="form-control" name="count" type="text" id="count" value="{{ isset($maintain_category->count) ? $maintain_category->count : ''}}" >
    {!! $errors->first('count', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($maintain_category->color) ? $maintain_category->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
