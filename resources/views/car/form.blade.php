<div class="row">

    <div class="form-group col-lg-6">
        <label class="control-label">{{ 'brand' }}</label>
        <input class="form-control form-control-sm" name="brand" type="text" value="{{ isset($data->brand) ? $data->brand : ''}}" >     
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'model' }}</label>
        <input class="form-control form-control-sm" name="model" type="text" value="{{ isset($data->model) ? $data->model : ''}}" > 
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'submodel' }}</label>
        <input class="form-control form-control-sm" name="submodel" type="text" value="{{ isset($data->submodel) ? $data->submodel : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'year' }}</label>
        <input class="form-control form-control-sm" name="year" type="number" value="{{ isset($data->year) ? $data->year : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'motor' }}</label>
        <input class="form-control form-control-sm" name="motor" type="text" value="{{ isset($data->motor) ? $data->motor : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'gear' }}</label>
        <input class="form-control form-control-sm" name="gear" type="text" value="{{ isset($data->gear) ? $data->gear : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'seats' }}</label>
        <input class="form-control form-control-sm" name="seats" type="number" value="{{ isset($data->seats) ? $data->seats : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'distance' }}</label>
        <input class="form-control form-control-sm" name="distance" type="number" value="{{ isset($data->distance) ? $data->distance : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'color' }}</label>
        <input class="form-control form-control-sm" name="color" type="text" value="{{ isset($data->color) ? $data->color : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'color' }}</label>
        <input class="form-control form-control-sm" name="color" type="text" value="{{ isset($data->color) ? $data->color : ''}}" >    
    </div>
</div>

