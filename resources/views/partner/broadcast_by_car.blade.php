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
                                    <input type="radio" name="select_car_type" id="select_type_car" onclick="select_type_car('car')">
                                    &nbsp; <i class="fas fa-car text-danger"></i> รถยนต์ 
                                    <br>
                                    <input type="radio" name="select_car_type" id="select_type_motor" onclick="select_type_car('motor')">
                                    &nbsp; <i class="fas fa-motorcycle text-success"></i> รถจักรยานยนต์
                                </div>
                            </div>
                            <br>
                        </div>
                        <form method="GET" action="{{ url('/broadcast_by_car') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                          
                            <input class="form-control d-" type="text" name="car_type" id="car_type" value="">
                            <!-- การกรองเพิ่มเติม -->
                            <div id="div_filter" class="d-none">
                                <!-- รถยนต์ -->
                                <div id="div_car_brand" class="col-12 d-none">
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
                                <div id="div_motor_brand" class="col-12 d-none">
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

                                <div class="col-12">
                                    <div class="form-group {{ $errors->has('location_user') ? 'has-error' : ''}}">
                                        <label for="location_user" class="control-label">{{ 'พื้นที่ผู้ลงทะเบียนรถ' }}</label>
                                        <select name="location_user" class="notranslate form-control" id="location_user" >
                                            <option class="translate" value="" selected> - เลือกพื้นที่ - </option>
                                            @foreach($location_user as $lo_user)
                                            <option class="translate" value="{{ $lo_user->location }}">
                                                {{ $lo_user->location }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="province_registration" class="control-label">{{ 'จังหวัดของทะเบียนรถ' }}</label>
                                        <select name="province_registration" class="notranslate form-control" id="province_registration" >
                                            <option class="translate" value="" selected> - เลือกพื้นที่ - </option>
                                            @foreach($province_registration as $pro_reg)
                                            <option class="translate" value="{{ $pro_reg->province }}">
                                                {{ $pro_reg->province }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>

                                <div id="type_car_registration" class="col-12 d-none">
                                    <div class="form-group">
                                        <label for="type_registration" class="control-label">{{ 'ประเภท' }}</label>
                                        <select name="type_registration" class="notranslate form-control" id="type_registration" >
                                            <option class="translate" value="" selected> - เลือกประเภท - </option>
                                            @foreach($type_registrations as $type_registration)
                                            <option class="translate" value="{{ $type_registration->type_reg }}">
                                                {{ $type_registration->type_reg }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <hr><br>
                            <div id="div_btn_search" class="col-12 text-center d-none ">
                                <a href="{{ url('/broadcast_by_car') }}" style="width:45%;" type="button" class="btn btn-secondary">
                                    ล้างการค้นหา
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger main-shadow main-radius float-right" style="font-size: 14px; margin: 0px 20px; padding: 4px 12px" >
                                               ค้นหา
                                            </button>
                            </div>
                        </form>
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

    function select_type_car(type){

        document.querySelector('#car_type').value = type ;
        document.querySelector('#div_btn_search').classList.remove('d-none');

        if (type === "car") {

            showCar_brand();

            let input_motor_brand = document.querySelector("#input_motor_brand");
                input_motor_brand.innerHTML = "";
            let input_motor_model = document.querySelector("#input_motor_model");
                input_motor_model.innerHTML = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.remove('d-none');
        }else{

            showMotor_brand();

            let input_car_brand = document.querySelector("#input_car_brand");
                input_car_brand.innerHTML = "";
            let input_car_model = document.querySelector("#input_car_model");
                input_car_model.innerHTML = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.add('d-none');
        }

    }

    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/select_car_brand_user")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let input_car_brand = document.querySelector("#input_car_brand");
                    // input_car_brand.innerHTML = "";

                let option_first = document.createElement("option");
                    option_first.text = "เลือกยี่ห้อ";
                    option_first.value = "";
                    input_car_brand.add(option_first); 

                let option_first_class = document.createAttribute("class");
                        option_first_class.value = "translate";
                     
                    option_first.setAttributeNode(option_first_class);

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

        while (input_car_model.options.length > 1) {
            input_car_model.remove(1);
        } 
            
        let input_car_brand = document.querySelector("#input_car_brand");
        // console.log(input_car_brand.value);

        fetch("{{ url('/') }}/api/select_car_brand_user/"+input_car_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let option_first = document.createElement("option");
                    option_first.text = "เลือกรุ่น";
                    option_first.value = "";
                    input_car_model.add(option_first); 

                let option_first_class = document.createAttribute("class");
                        option_first_class.value = "translate";
                     
                    option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.generation;
                    option.value = item.generation;
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
        fetch("{{ url('/') }}/api/select_motor_brand_user")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                let input_motor_brand = document.querySelector("#input_motor_brand");
                    // input_motor_brand.innerHTML = "";

                let option_first = document.createElement("option");
                    option_first.text = "เลือกยี่ห้อ";
                    option_first.value = "";
                    input_motor_brand.add(option_first); 

                let option_first_class = document.createAttribute("class");
                    option_first_class.value = "translate";
                     
                option_first.setAttributeNode(option_first_class);

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

        while (input_motor_model.options.length > 1) {
            input_motor_model.remove(1);
        } 

        let input_motor_brand = document.querySelector("#input_motor_brand");

        fetch("{{ url('/') }}/api/select_motor_brand_user/"+input_motor_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let option_first = document.createElement("option");
                    option_first.text = "เลือกรุ่น";
                    option_first.value = "";
                    input_motor_model.add(option_first); 

                let option_first_class = document.createAttribute("class");
                    option_first_class.value = "translate";
                     
                option_first.setAttributeNode(option_first_class);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.generation;
                    option.value = item.generation;
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
