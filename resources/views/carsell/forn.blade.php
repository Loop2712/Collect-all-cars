<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4">
                    <!-- เบอร์โทร เอาไว้สำหรับแสดงข้อมูลต่อผู้เรียกรถ-->
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone" type="hidden" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone :  Auth::user()->phone }}" required placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}" readonly>
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                        <input class="form-control" name="sex" type="hidden" id="sex" value="{{ isset($register_car->sex) ? $register_car->sex :  Auth::user()->sex }}" required readonly>
                        {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <br>
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถ / Vehicle Information' }}</span><span style="color: #FF0033;"> *</span>
            <br><br>
            <input type="radio" name="car_type" checked value="{{ isset($register_car->car_type) ? $register_car->car_type : 'car'}}" required onclick="
                document.querySelector('#div_data').classList.remove('d-none'),

                document.querySelector('#div_motor_brand').classList.add('d-none'),
                document.querySelector('#brand_input').classList.add('d-none'),
                document.querySelector('#generation_input').classList.add('d-none'),
                document.querySelector('#input_motor_brand').classList.add('d-none'),
                document.querySelector('#input_motor_model').classList.add('d-none'),

                document.querySelector('#div_car_brand').classList.remove('d-none'),
                document.querySelector('#input_car_model').classList.remove('d-none'),
                document.querySelector('#input_car_brand').classList.remove('d-none');">
            &nbsp;&nbsp; รถยนต์ / Car &nbsp;&nbsp;&nbsp;

            <input type="radio" name="car_type" value="{{ isset($register_car->car_type) ? $register_car->car_type : 'motorcycle'}}" required onclick="
                document.querySelector('#div_data').classList.remove('d-none'),

                document.querySelector('#brand_input').classList.add('d-none'),
                document.querySelector('#generation_input').classList.add('d-none'),
                document.querySelector('#input_car_model').classList.add('d-none'),
                document.querySelector('#input_car_brand').classList.add('d-none'),
                document.querySelector('#div_car_brand').classList.add('d-none'),

                document.querySelector('#div_motor_brand').classList.remove('d-none'),
                document.querySelector('#input_motor_brand').classList.remove('d-none'),
                document.querySelector('#input_motor_model').classList.remove('d-none');">
            &nbsp;&nbsp; มอเตอร์ไซต์ / Motorcycle
            <br><br>
            <!-- ข้อมูลรถ -->
            <div class=" row" id="div_data">
                <div class="col-12 col-md-2">
                    <label for="brand" id="brand_label" class="control-label">{{ 'ยี่ห้อรถ / Brand' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div id="div_car_brand" class=" form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                        <!-- car -->
                        <select name="brand" class=" form-control" id="input_car_brand" required onchange="showCar_model();
                            if(this.value=='อื่นๆ'){ 
                                document.querySelector('#brand_input').classList.remove('d-none'),
                                document.querySelector('#generation_input').classList.remove('d-none'),
                                document.querySelector('#brand_input').focus();
                            }else{ 
                                document.querySelector('#brand_input').classList.add('d-none'),
                                document.querySelector('#generation_input').classList.add('d-none');}">
                            <option value="" selected> - เลือกยี่ห้อ / Select Brand - </option>
                            <br>
                            {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                        </select>
                    </div>
                    <div id="div_motor_brand" class="d-none form-group {{ $errors->has('motor_brand') ? 'has-error' : ''}}">
                        <!-- motorcycles -->
                        <select name="motor_brand" class="d-none form-control" id="input_motor_brand" required onchange="showMotor_model();
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
                    <div class="form-group {{ $errors->has('generation') ? 'has-error' : ''}}">
                        <!-- car -->
                        <select name="generation" id="input_car_model" class=" form-control" required onchange="if(this.value=='อื่นๆ'){ 
                                document.querySelector('#generation_input').classList.remove('d-none'),
                                document.querySelector('#generation_input').focus();
                            }else{ 
                                document.querySelector('#generation_input').classList.add('d-none');}">
                                <option value="" selected> - เลือกรุ่น / Select Model - </option>     
                                <br> 
                                {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
                        </select>
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
                
                <div class="col-12 col-md-2">
                    <label for="registration_number" class="control-label">{{ 'ทะเบียนรถ / Car registration number' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                        <input class="form-control" name="registration_number" type="text" id="registration_number" value="{{ isset($register_car->registration_number) ? $register_car->registration_number : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required>
                        {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="province" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label><span style="color: #FF0033;"> *</span>
                </div>


            </div>

            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลของท่าน / Your Information'}}&nbsp;&nbsp;&nbsp;</span>
            <br><br>

        </div> 
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand();
        showMotor_brand();   
    });
    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/car_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_car_brand = document.querySelector("#input_car_brand");
                    input_car_brand.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_car_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_car_brand.add(option); 

                //QUERY model
                showCar_model();
            });
            return input_car_brand.value;
    }
    function showCar_model(){
        let input_car_brand = document.querySelector("#input_car_brand");
        fetch("{{ url('/') }}/api/car_brand/"+input_car_brand.value+"/car_model")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // //UPDATE SELECT OPTION
                let input_car_model = document.querySelector("#input_car_model");
                    input_car_model.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_car_model.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_car_model.add(option);  
            });
    }

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
