@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card">
	    <div class="col-12" style="padding:20px;">
	        <div class="row">
                <!-- การค้นหา -->
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-dark"><b>กรองข้อมูล</b></h3>
                            <br>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('car_type') ? 'has-error' : ''}}">
                                <label for="car_type" class="control-label">{{ 'เลือกประเภทรถ' }}</label>
                                <br>
                                <div style="margin-top:12px;font-size: 18px;">
                                    <input type="radio" name="select_car_type" id="select_type_car">
                                    &nbsp; <i class="fas fa-car text-danger"></i> รถยนต์ 
                                    <br>
                                    <input type="radio" name="select_car_type" id="select_type_motor">
                                    &nbsp; <i class="fas fa-motorcycle text-success"></i> รถจักรยานยนต์
                                </div>

                                <input class="form-control d-none" type="text" name="car_type" id="car_type" value="">
                            </div>
                            <br>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('location_user') ? 'has-error' : ''}}">
                                <label for="location_user" class="control-label">{{ 'พื้นที่ผู้ลงทะเบียนรถ' }}</label>
                                <input class="form-control" type="text" name="location_user" id="location_user" value="">
                            </div>
                            <br>
                        </div>
                        <!-- รถยนต์ -->
                        <div id="div_car_brand" class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="input_car_brand" class="control-label">{{ 'ยี่ห้อรถ' }}</label>
                                    <select name="input_car_brand" class="notranslate form-control" id="input_car_brand" onchange="showCar_model();">
                                        <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                                    </select>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="input_car_model" class="control-label">{{ 'รุ่นรถ' }}</label>
                                    <select name="input_car_model" class="notranslate form-control" id="input_car_model">
                                        <option class="translate" value="" selected> - เลือกรุ่น - </option> 
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>

                        <!-- รถจักรยานยนต์ -->
                        <div id="div_motor_brand" class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="input_motor_brand" class="control-label">{{ 'ยี่ห้อรถ' }}</label>
                                    <select name="input_motor_brand" class="notranslate form-control" id="input_motor_brand"  onchange="showMotor_model()">
                                        <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                                    </select>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="input_motor_model" class="control-label">{{ 'รุ่นรถ' }}</label>
                                    <select name="input_motor_model" class="notranslate form-control" id="input_motor_model">
                                        <option class="translate" value="" selected> - เลือกรุ่น - </option> 
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>


                        <hr><br>
                        <div class="col-12 text-center">
                            <button style="width:45%;" type="button" class="btn btn-secondary">
                                ล้างการค้นหา
                            </button>
                            <button style="width:45%;" type="button" class="btn btn-success">
                                <i class="fas fa-search"></i> ค้นหา
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ผลการค้นหา -->
                <div id="div_data_car_search" class="col-8">
                    <div class="col-12">
                        <h3 class="text-dark"><b>ผลการค้นหา</b></h3>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        showCar_brand();
        showMotor_brand();
    });

    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/brand_middle_price")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let input_car_brand = document.querySelector("#input_car_brand");
                    // input_car_brand.innerHTML = "";

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

                    let option_class = document.createAttribute("class");
                        option_class.value = "translate";
                     
                    option.setAttributeNode(option_class); 
            });
            return input_car_brand.value;
    }
    function showCar_model(){
        // console.log(input_car_model.options.length);
        while (input_car_model.options.length > 1) {
                input_car_model.remove(1);
            } 
        let input_car_brand = document.querySelector("#input_car_brand");
        // console.log(input_car_brand.value);
        fetch("{{ url('/') }}/api/brand_middle_price/"+input_car_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_car_model.add(option);             
                } 
                let option = document.createElement("option");
                    option.text = "other";
                    option.value = "other";
                    input_car_model.add(option);  
            });
    }

    // motorcycle
    function showMotor_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/motor_middle_price")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

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

                    let option_class = document.createAttribute("class");
                        option_class.value = "translate";
                     
                    option.setAttributeNode(option_class);

            });
            return input_motor_brand.value;
    }
    function showMotor_model(){
        // console.log(input_motor_model.options.length);
        while (input_motor_model.options.length > 1) {
                input_motor_model.remove(1);
            } 
        let input_motor_brand = document.querySelector("#input_motor_brand");
        fetch("{{ url('/') }}/api/motor_middle_price/"+input_motor_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_motor_model.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "other";
                    option.value = "other";
                    input_motor_model.add(option); 
            });
    }

</script>

@endsection
