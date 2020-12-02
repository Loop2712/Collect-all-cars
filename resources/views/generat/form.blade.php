<div class="form-group {{ $errors->has('generat_id') ? 'has-error' : ''}}">
    <label for="generat_id" class="control-label">{{ 'Generat Id' }}</label>
    <input class="form-control" name="generat_id" type="number" id="generat_id" value="{{ isset($generat->generat_id) ? $generat->generat_id : ''}}" >
    {!! $errors->first('generat_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('generat_name') ? 'has-error' : ''}}">
    <label for="generat_name" class="control-label">{{ 'Generat Name' }}</label>
    <textarea class="form-control" rows="5" name="generat_name" type="textarea" id="generat_name" >{{ isset($generat->generat_name) ? $generat->generat_name : ''}}</textarea>
    {!! $errors->first('generat_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
