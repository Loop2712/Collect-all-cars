<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="control-label">{{ 'Brand Id' }}</label>
    <input class="form-control" name="brand_id" type="number" id="brand_id" value="{{ isset($brand->brand_id) ? $brand->brand_id : ''}}" >
    {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('brand_name') ? 'has-error' : ''}}">
    <label for="brand_name" class="control-label">{{ 'Brand Name' }}</label>
    <textarea class="form-control" rows="5" name="brand_name" type="textarea" id="brand_name" >{{ isset($brand->brand_name) ? $brand->brand_name : ''}}</textarea>
    {!! $errors->first('brand_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
