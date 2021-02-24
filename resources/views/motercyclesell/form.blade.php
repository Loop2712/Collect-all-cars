<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select class="form-control" name="type" id="type">
    
  @foreach($num_type as $ty)
                                        <option 
                                                value="{{ $ty->type }}" 
                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                        {{ $ty->type }} 
                                        </option>
                                    @endforeach
    </select>
    <!-- <input class="form-control" name="type" type="text" id="type" value="{{ isset($motercycle->type) ? $motercycle->type : ''}}" > -->
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-12 col-md-4">
                    
                    <div id="div_motor_brand" class="d-none form-group {{ $errors->has('motor_brand') ? 'has-error' : ''}}">
                        <!-- motorcycles -->
                        <select name="brand" class="d-none form-control" id="input_motor_brand" required onchange="showMotor_model();
                                if(this.value=='อื่นๆ'){ 
                                document.querySelector('#brand_input').classList.remove('d-none'),
                                document.querySelector('#generation_input').classList.remove('d-none'),
                                document.querySelector('#brand_input').focus();
                            }else{ 
                                document.querySelector('#brand_input').classList.add('d-none'),
                                document.querySelector('#generation_input').classList.add('d-none');}">
                            <option value="" selected> - เลือกยี่ห้อ / Select Brand - </option>
                            <br>
                            {!! $errors->first('motor_brand', '<p class="help-block">:message</p>') !!}
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('brand_other') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="brand_other" type="text" id="brand_input" value="{{ isset($register_car->brand_other) ? $register_car->brand_other : ''}}" placeholder="ยี่ห้อรถของคุณ / Your brand">
                        {!! $errors->first('brand_other', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="generation" class="control-label">{{ 'รุ่นรถ / Model' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">

                        <!-- motorcycles -->
                        <select name="motor_generation" id="input_motor_model" class="d-none form-control" required onchange="if(this.value=='อื่นๆ'){ 
                                document.querySelector('#generation_input').classList.remove('d-none'),
                                document.querySelector('#generation_input').focus();
                            }else{ 
                                document.querySelector('#generation_input').classList.add('d-none');}">
                                <option value="" selected> - เลือกรุ่น / Select Model - </option>     
                                <br>  
                                {!! $errors->first('motor_generation', '<p class="help-block">:message</p>') !!}            
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('generation_other') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="generation_other" type="text" id="generation_input" value="{{ isset($register_car->generation_other) ? $register_car->generation_other : ''}}" placeholder="รุ่นรถของคุณ / Your model" >
                        {!! $errors->first('generation_other', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <br><br><br>
                
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($motercycle->brand) ? $motercycle->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
    <label for="model" class="control-label">{{ 'Model' }}</label>
    <input class="form-control" name="model" type="text" id="model" value="{{ isset($motercycle->model) ? $motercycle->model : ''}}" >
    {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('submodel') ? 'has-error' : ''}}">
    <label for="submodel" class="control-label">{{ 'Submodel' }}</label>
    <input class="form-control" name="submodel" type="text" id="submodel" value="{{ isset($motercycle->submodel) ? $motercycle->submodel : ''}}" >
    {!! $errors->first('submodel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($motercycle->year) ? $motercycle->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gear') ? 'has-error' : ''}}">
    <label for="gear" class="control-label">{{ 'Gear' }}</label>
    <input class="form-control" name="gear" type="text" id="gear" value="{{ isset($motercycle->gear) ? $motercycle->gear : ''}}" >
    {!! $errors->first('gear', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($motercycle->color) ? $motercycle->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('motor') ? 'has-error' : ''}}">
    <label for="motor" class="control-label">{{ 'Motor' }}</label>
    <input class="form-control" name="motor" type="text" id="motor" value="{{ isset($motercycle->motor) ? $motercycle->motor : ''}}" >
    {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($motercycle->price) ? $motercycle->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
    <label for="img" class="control-label">{{ 'Img' }}</label>
    <input class="form-control" name="img" type="file" id="img" value="{{ isset($motercycle->img) ? $motercycle->img : ''}}" >
    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($motercycle->location) ? $motercycle->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($motercycle->active) ? $motercycle->active : 'Yes'}}" >
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="user_id" type="number" id="user_id" value="{{Auth::id()}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand(); 
        
    });
    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/motor_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                // let input_car_brand = document.querySelector("#input_car_brand");
                    // input_car_brand.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_motor_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_brand.add(option); 

                //QUERY model
                showMotor_model();
            });
            // return input_car_brand.value;
    }
    function showMotor_model(){
        let input_car_brand = document.querySelector("#input_motor_brand");
        fetch("{{ url('/') }}/api/motor_brand/"+input_motor_brand.value+"/motor_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // //UPDATE SELECT OPTION
                let input_motor_brand = document.querySelector("#input_car_model");
                    input_motor_brand.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_motor_brand.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_brand.add(option);  
            });
    }
</script>