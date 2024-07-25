<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($maintain_use_material->name) ? $maintain_use_material->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maintain_material_id') ? 'has-error' : ''}}">
    <label for="maintain_material_id" class="control-label">{{ 'Maintain Material Id' }}</label>
    <input class="form-control" name="maintain_material_id" type="text" id="maintain_material_id" value="{{ isset($maintain_use_material->maintain_material_id) ? $maintain_use_material->maintain_material_id : ''}}" >
    {!! $errors->first('maintain_material_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('officer_id') ? 'has-error' : ''}}">
    <label for="officer_id" class="control-label">{{ 'Officer Id' }}</label>
    <input class="form-control" name="officer_id" type="text" id="officer_id" value="{{ isset($maintain_use_material->officer_id) ? $maintain_use_material->officer_id : ''}}" >
    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($maintain_use_material->amount) ? $maintain_use_material->amount : ''}}" >
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
