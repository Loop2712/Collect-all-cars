

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class=" row" id="div_data">
                <div class="col-12 col-md-2">
                    <label for="brand" id="brand_label" class="control-label">{{ 'ยี่ห้อรถ / Brand' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div id="div_motor_brand" class=" form-group {{ $errors->has('motor_brand') ? 'has-error' : ''}}">
                        <!-- motorcycles -->
                        <select name="motor_brand" class="form-control" id="input_motor_brand"  value="{{ isset($motercycle->brand) ? $motercycle->brand : ''}}"required onchange="showMotor_model();
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
                    <label for="model" class="control-label">{{ 'รุ่นรถ / Model' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
                        <!-- motorcycles -->
                        <select name="motor_generation" id="input_motor_model" class="form-control" required onchange="if(this.value=='อื่นๆ'){ 
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
                
                
                
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'ระบบเกียร์ / Gear System' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <select name="gear" id="gear" class="form-control" value="{{ isset($motercycles->gear) ? $motercycles->gear : ''}}" >
                            <option value="" data-display="">- กรุณาเลือกระบบเกียร์ / Please select Gear -</option>
                                @foreach (json_decode('{"เกียร์อัตโนมัติ":"เกียร์อัตโนมัติ","เกียร์ธรรมดา":"เกียร์ธรรมดา"}', true) as $optionKey => $optionValue)
                            <option  ption value="{{ $optionKey }}"  {{ (isset($sell->fuel) && $sell->fuel == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                        </select>
                    </div> 
                </div>
                <div class="col-12 col-md-2">
                    <label for="province" class="control-label">{{ 'สถานที่ / Location' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                        <select name="province" id="province" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('province') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-12 col-md-2">
                    <label  class="control-label">{{ 'เครื่องยนต์ (cc) / Engine Capacity' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('motor') ? 'has-error' : ''}}">
                            <input class="form-control" name="motor" type="number" id="motor" value="{{ isset($motercycles->motor) ? $motercycles->motor : ''}}"  >
                            {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="col-12 col-md-2">
                    <label  class="control-label">{{ 'รูปภาพ / Photo' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                            <input class="form-control" name="img" type="file" id="img" value="{{ isset($motercycle->img) ? $motercycle->img : ''}}" >
                            {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
                    </div> 
                </div>

                <div class="col-12 col-md-2">
                    <label for="price" class="control-label">{{ 'ราคา / Price' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <input class="form-control" name="price" type="number" id="price" value="{{ isset($motercycle->price) ? $motercycle->price : ''}}" >
                        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                    </div>

                </div>


            </div>

                

                
            <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($motercycle->active) ? $motercycle->active : 'Yes'}}" >
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <input class="d-none form-control" name="user_id" type="number" id="user_id" value="{{Auth::id()}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
        </div> 
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showMotor_brand();   
    });

    // motorcycle
    function showMotor_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/motor_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_motor_brand = document.querySelector("#input_motor_brand");
                    input_motor_brand.innerHTML = "";

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
            return input_motor_brand.value;
    }
    function showMotor_model(){
        let input_motor_brand = document.querySelector("#input_motor_brand");
        fetch("{{ url('/') }}/api/motor_brand/"+input_motor_brand.value+"/motor_model")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // //UPDATE SELECT OPTION
                let input_motor_model = document.querySelector("#input_motor_model");
                    input_motor_model.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_motor_model.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_model.add(option);  
            });
    }
</script>
