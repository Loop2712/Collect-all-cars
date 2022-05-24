<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="control-label">{{ 'Country' }}</label>
    <input class="form-control" name="country" type="text" id="country" value="{{ isset($nationality->country) ? $nationality->country : ''}}" >
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
    <label for="nationality" class="control-label">{{ 'Nationality' }}</label>
    <input class="form-control" name="nationality" type="text" id="nationality" value="{{ isset($nationality->nationality) ? $nationality->nationality : ''}}" >
    {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nationality_noun') ? 'has-error' : ''}}">
    <label for="nationality_noun" class="control-label">{{ 'Nationality Noun' }}</label>
    <input class="form-control" name="nationality_noun" type="text" id="nationality_noun" value="{{ isset($nationality->nationality_noun) ? $nationality->nationality_noun : ''}}" >
    {!! $errors->first('nationality_noun', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
    <label for="language" class="control-label">{{ 'Language' }}</label>
    <input class="form-control" name="language" type="text" id="language" value="{{ isset($nationality->language) ? $nationality->language : ''}}" >
    {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
