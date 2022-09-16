@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    .header{
        font-family: 'Kanit', sans-serif;
        padding: 15px;
        align-items: center;
    }
    .text-filter h5 {
        color:#db2d2e;
    }
    .text-result h5 {
        color:#3b5998;
    }
    .filter{
        border-top: red solid 4px;
        border-radius: 20px;
    }
    .result{
        border-top: #3b5998 solid 4px;
        border-radius: 20px;
    }
    .form-filter{
        padding: 10px;
    }
    .form-filter .form-label{
        font-family: 'Kanit', sans-serif;

    }
    .select-form{
        font-family: 'Kanit', sans-serif;
        margin-bottom: 10px;
        border-radius: 9px;
    }
    .form-filter button{
        font-family: 'Kanit', sans-serif;
        margin-top: 10px;
    }
</style>

<div class="row">
    <div class="col-12 col-lg-3 col-md-3">
        <div class="card filter">
            <div class="header text-filter">
                <h5>
                    <i class="fa-regular fa-filter-list"></i> กรองข้อมูล
                </h5>
            </div>
            <div class="plans">
                <label class="plan basic-plan" for="basic">
                    <input type="radio" name="plan" id="basic" onclick="select_type_car('car');search_data();"/>
                    <div class="plan-content">
                        <img loading="lazy" src="{{ asset('/img/icon/car1.png') }}" alt="" />
                        <div class="plan-details">
                        <span>รถยนต์</span>
                        </div>
                    </div>
                </label>

                <label class="plan complete-plan" for="complete">
                    <input type="radio" id="complete" name="plan" onclick="select_type_car('motor');search_data();"/>
                    <div class="plan-content">
                        <img loading="lazy" src="{{ asset('/img/icon/car2.png') }}" alt="" />
                        
                        <div class="plan-details">
                        <span>รถจักรยานยนต์</span>
                        </div>
                    </div>
                </label>
            </div>
            <input class="form-control d-none" type="text" name="car_type" id="car_type" value="">
            <div  class="form-filter d-none" id="div_filter">
                <hr>
                <!-- รถยนต์ -->
                <div class="col-12 d-none" id="div_car_brand">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="input_car_brand" class="form-label">ยี่ห้อรถ</label>
                            <select name="input_car_brand" class="notranslate form-control select-form" id="input_car_brand" onchange="showCar_model();search_data();">
                                <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="input_car_model" class="form-label">รุ่นรถ</label>
                            <select name="input_car_model" class="notranslate form-control select-form" id="input_car_model" onchange="search_data();">
                                <option class="translate" value="" selected> - เลือกรุ่น - </option> 
                            </select>
                        </div>
                    </div>

                </div>
                <!-- รถมอไซต์ -->
                <div class="col-12  d-none" id="div_motor_brand">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="input_motor_brand" class="form-label">ยี่ห้อรถ</label>
                            <select name="input_motor_brand" class="notranslate form-control select-form" id="input_motor_brand"  onchange="showMotor_model();search_data();">
                                <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="input_motor_model" class="form-label">รุ่นรถ</label>
                            <select name="input_motor_model" class="notranslate form-control select-form" id="input_motor_model" onchange="search_data();">
                                <option class="translate" value="" selected> - เลือกรุ่น - </option> 
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="location_user" class="form-label">พื้นที่ผู้ลงทะเบียนรถ</label>
                    <select name="location_user" class="notranslate form-control select-form" id="location_user" onchange="search_data();">
                        <option class="translate" value="" selected> - เลือกพื้นที่ - </option>
                        @foreach($location_user as $lo_user)
                        <option class="translate" value="{{ $lo_user->location }}">
                            {{ $lo_user->location }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="province_registration" class="form-label">จังหวัดของทะเบียนรถ</label>
                    <select name="province_registration" class="notranslate form-control select-form" id="province_registration" onchange="search_data();">
                        <option class="translate" value="" selected> - เลือกพื้นที่ - </option>
                        @foreach($province_registration as $pro_reg)
                        <option class="translate" value="{{ $pro_reg->province }}">
                            {{ $pro_reg->province }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="type_registration" class="form-label">ประเภท</label>
                    <select name="type_registration" class="notranslate form-control select-form" id="type_registration" onchange="search_data();">
                        <option class="translate" value="" selected> - เลือกประเภท - </option>
                        @foreach($type_registrations as $type_registration)
                        <option class="translate" value="{{ $type_registration->type_reg }}">
                            {{ $type_registration->type_reg }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5" onclick="clear_search_input_data();">ล้างการค้นหา</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card result">
            <div class="header text-result">
                <h5>
                 <i class="fa-solid fa-square-poll-horizontal"></i> ผลการค้นหา
                </h5>
            </div>    
            <div class="div-result"></div>        
        </div>
    </div>
</div>



<div class="radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card">
	    <div class="col-12" style="padding:20px;">
	        <div class="row">
                <!-- การค้นหา -->
                <div class="col-3">
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
                                    <input type="radio" name="select_car_type" id="select_type_car" onclick="select_type_car('car');search_data();">
                                    &nbsp; <i class="fas fa-car text-danger"></i> รถยนต์ 
                                    <br>
                                    <input type="radio" name="select_car_type" id="select_type_motor" onclick="select_type_car('motor');search_data();">
                                    &nbsp; <i class="fas fa-motorcycle text-success"></i> รถจักรยานยนต์
                                </div>
                            </div>
                            <br>
                        </div>
                        <input class="form-control d-none" type="text" name="car_type" id="car_type" value="">
                        <!-- การกรองเพิ่มเติม -->
                        <div id="div_filter" class="d-none">
                            <!-- รถยนต์ -->
                            <div id="div_car_brand" class="col-12 d-none">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="input_car_brand" class="control-label">{{ 'ยี่ห้อรถ' }}</label>
                                        <select name="input_car_brand" class="notranslate form-control" id="input_car_brand" onchange="showCar_model();search_data();">
                                            <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="input_car_model" class="control-label">{{ 'รุ่นรถ' }}</label>
                                        <select name="input_car_model" class="notranslate form-control" id="input_car_model" onchange="search_data();">
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
                                        <select name="input_motor_brand" class="notranslate form-control" id="input_motor_brand"  onchange="showMotor_model();search_data();">
                                            <option class="translate" value="" selected> - เลือกยี่ห้อ - </option> 
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="input_motor_model" class="control-label">{{ 'รุ่นรถ' }}</label>
                                        <select name="input_motor_model" class="notranslate form-control" id="input_motor_model" onchange="search_data();">
                                            <option class="translate" value="" selected> - เลือกรุ่น - </option> 
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="col-12">
                                <div class="form-group {{ $errors->has('location_user') ? 'has-error' : ''}}">
                                    <label for="location_user" class="control-label">{{ 'พื้นที่ผู้ลงทะเบียนรถ' }}</label>
                                    <select name="location_user" class="notranslate form-control" id="location_user" onchange="search_data();">
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
                                    <select name="province_registration" class="notranslate form-control" id="province_registration" onchange="search_data();">
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
                                    <select name="type_registration" class="notranslate form-control" id="type_registration" onchange="search_data();">
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
                            <button style="width:60%;" type="button" class="btn btn-sm btn-secondary main-shadow main-radius" onclick="clear_search_input_data();">
                                ล้างการค้นหา
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ผลการค้นหา -->
                <div id="div_data_car_search" class="col-9">
                    <div class="col-12">
                        <h3 class="text-dark"><b>ผลการค้นหา</b>&nbsp;&nbsp;<span style="font-size:15px;"><span id="count_search_data">0</span> คัน</span> </h3>
                        <br>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9">
                                <div id="content_search_data"></div>
                            </div>
                            <div class="col-3">
                                <p class="text-center">เลือกแล้ว <span id="car_selected">0</span> / 10 คัน</p>
                                <!-- <p class="text-center">จากผู้ใช้ <span id="user_selected">0</span> / 10 คน</p> -->
                                <input class="form-control" type="text" name="arr_car_id_selected" id="arr_car_id_selected">
                                <input class="form-control d-none" type="text" name="arr_user_id_selected" id="arr_user_id_selected">
                                <br>
                                <div id="content_selected_car"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        
    });

    function click_select_car(user_id , car_id){
        
        // let arr_user_id_selected = document.querySelector('#arr_user_id_selected');

        // let arr_user_id  = [];

        // if (!arr_user_id_selected.value) {
        //     arr_user_id_selected.value = '["'+user_id +'"]' ;
        // }else{
        //     arr_user_id = JSON.parse(arr_user_id_selected.value) ;

        //     if ( arr_user_id.includes(user_id) ) {
        //         // 
        //     }else{
        //         arr_user_id.push(user_id);
        //         arr_user_id_selected.value = JSON.stringify(arr_user_id) ;
        //     }

        // }

        let arr_car_id_selected = document.querySelector('#arr_car_id_selected');

        let arr_car_id  = [];

        if (!arr_car_id_selected.value) {
            arr_car_id_selected.value = '["'+car_id +'"]' ;
        }else{
            arr_car_id = JSON.parse(arr_car_id_selected.value) ;

            if ( arr_car_id.includes(car_id) ) {
                // 
            }else{
                arr_car_id.push(car_id);
                arr_car_id_selected.value = JSON.stringify(arr_car_id) ;
            }

        }

        // เช็คปุ่มเลือก เช็คว่าเลือกแล้วหรือยัง
        let btn_select_car_id = document.querySelector('#btn_select_car_id_' + car_id);
        let content_selected_car = document.querySelector('#content_selected_car');

        if (btn_select_car_id.classList[0] == "far") {

            // ยังไม่ได้เลือก
            btn_select_car_id.classList = "fad fa-circle btn" ;

            fetch("{{ url('/') }}/api/search_data_selected_car/" + car_id)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    for(let item of result){
                        
                        let div_data_car_selected = document.createElement("div");
                        let id_div_data_car_selected = document.createAttribute("id");
                            id_div_data_car_selected.value = "div_car_selected_id_" + car_id;
                            div_data_car_selected.setAttributeNode(id_div_data_car_selected);

                        let p_data = document.createElement("p");
                        let class_p_data = document.createAttribute("class");
                            class_p_data.value = "text-dark";
                            p_data.setAttributeNode(class_p_data);

                            p_data.innerHTML = "ยี่ห้อ : " + item.brand + "  ทะเบียน : " + item.registration_number 
                            + " " + item.province ;
                        div_data_car_selected.appendChild(p_data);

                        // <i class="fas fa-minus-circle text-danger"></i>
                        let btn_drop_select = document.createElement("i");
                        let class_btn_drop_select = document.createAttribute("class");
                            class_btn_drop_select.value = "fas fa-minus-circle text-danger btn";
                        btn_drop_select.setAttributeNode(class_btn_drop_select);

                        let onclick_btn_drop_select = document.createAttribute("onclick");
                            onclick_btn_drop_select.value = "click_select_car('" + item.user_id + "','" + item.id + "')";
                            btn_drop_select.setAttributeNode(onclick_btn_drop_select);
                        div_data_car_selected.appendChild(btn_drop_select);

                        let hr_hr = document.createElement("hr");
                        div_data_car_selected.appendChild(hr_hr);


                        content_selected_car.appendChild(div_data_car_selected);

                    } 
                });

        }else{
            // เลือกแล้ว
            btn_select_car_id.classList = "far fa-circle btn" ;
            document.querySelector('#div_car_selected_id_' + car_id).remove() ;

        }

        document.querySelector('#user_selected').innerHTML = JSON.parse(arr_user_id_selected.value).length ;
        document.querySelector('#car_selected').innerHTML = JSON.parse(arr_car_id_selected.value).length ;
        
    }

    function select_type_car(type){

        document.querySelector('#car_type').value = type ;
        document.querySelector('#div_btn_search').classList.remove('d-none');

        if (type === "car") {

            showCar_brand();

            let input_motor_brand = document.querySelector("#input_motor_brand").innerHTML = "";
            let input_motor_model = document.querySelector("#input_motor_model").innerHTML = "";

            let location_user = document.querySelector("#location_user").value = "";
            let province_registration = document.querySelector("#province_registration").value = "";
            let type_registration = document.querySelector("#type_registration").value = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.remove('d-none');
        }else{

            showMotor_brand();

            let input_car_brand = document.querySelector("#input_car_brand").innerHTML = "";
            let input_car_model = document.querySelector("#input_car_model").innerHTML = "";

            let location_user = document.querySelector("#location_user").value = "";
            let province_registration = document.querySelector("#province_registration").value = "";
            let type_registration = document.querySelector("#type_registration").value = "";

            document.querySelector('#div_filter').classList.remove('d-none');
            document.querySelector('#div_motor_brand').classList.remove('d-none');
            document.querySelector('#div_car_brand').classList.add('d-none');
            document.querySelector('#type_car_registration').classList.add('d-none');

            document.querySelector('#type_registration').value = "";
        }

    }

    function clear_search_input_data(){

        let car_type = document.querySelector('#car_type').value ;
        let input_car_brand = document.querySelector("#input_car_brand").innerHTML = "";
        let input_car_model = document.querySelector("#input_car_model").innerHTML = "";
        let input_motor_brand = document.querySelector("#input_motor_brand").innerHTML = "";
        let input_motor_model = document.querySelector("#input_motor_model").innerHTML = "";

        let location_user = document.querySelector("#location_user").value = "";
        let province_registration = document.querySelector("#province_registration").value = "";
        let type_registration = document.querySelector("#type_registration").value = "";

        if (car_type === "car") {
            showCar_brand();
        }else{
            showMotor_brand();
        }

        search_data();
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

    function search_data(){

        let car_type = document.querySelector("#car_type").value;
        let input_car_brand = document.querySelector("#input_car_brand").value;
        let input_car_model = document.querySelector("#input_car_model").value;
        let input_motor_brand = document.querySelector("#input_motor_brand").value;
        let input_motor_model = document.querySelector("#input_motor_model").value;
        let location_user = document.querySelector("#location_user").value;
        let province_registration = document.querySelector("#province_registration").value;
        let type_registration = document.querySelector("#type_registration").value;

        let data_search_data ;

        if (car_type == "car") {

            data_search_data = {
                'car_type' : car_type,
                'brand' : input_car_brand,
                'model' : input_car_model,
                'location_user' : location_user,
                'province_registration' : province_registration,
                'type_registration' : type_registration,
            };

        }else{

            data_search_data = {
                'car_type' : car_type,
                'brand' : input_motor_brand,
                'model' : input_motor_model,
                'location_user' : location_user,
                'province_registration' : province_registration,
                'type_registration' : null,
            };

        }

        fetch("{{ url('/') }}/api/search_data_broadcast_by_car", 
        {
            method: 'post',
            body: JSON.stringify(data_search_data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
            .then(result => {
                try {
                    // console.log(result);
                    document.querySelector('#count_search_data').innerHTML = result['length'] ;

                    let content_search_data = document.querySelector('#content_search_data');
                        content_search_data.innerHTML = "" ;

                    let arr_car_id = [] ;
                    let arr_car_id_selected = document.querySelector('#arr_car_id_selected');

                    if (arr_car_id_selected.value) {
                        arr_car_id = JSON.parse(arr_car_id_selected.value) ;
                    }

                    for(let item of result){

                        let div_data_car = document.createElement("div");

                        let p_data = document.createElement("p");
                        let class_p_data = document.createAttribute("class");
                            class_p_data.value = "text-dark";
                            p_data.setAttributeNode(class_p_data);

                            p_data.innerHTML = "ยี่ห้อ : " + item.brand + "  รุ่น : " + item.generation + "  ทะเบียน : " + item.registration_number 
                            + " " + item.province + "  พื้นที่ : " + item.location ;
                        div_data_car.appendChild(p_data);

                        // <i class="far fa-circle"></i>
                        // <i class="fad fa-circle"></i>
                        let btn_select = document.createElement("i");
                        let class_btn_select = document.createAttribute("class");
                        let text_car_id = item.id.toString();

                            if ( arr_car_id.includes(text_car_id) ) {
                                // console.log("เลือกแล้ว");
                                class_btn_select.value = "fad fa-circle btn ";
                            }else{
                                class_btn_select.value = "far fa-circle btn";
                                // console.log("ยังไม่ได้เลือก");
                            }

                        btn_select.setAttributeNode(class_btn_select);

                        let onclick_btn_select = document.createAttribute("onclick");
                            onclick_btn_select.value = "click_select_car('" + item.user_id + "','" + item.id + "')";
                            btn_select.setAttributeNode(onclick_btn_select);

                        let id_btn_select = document.createAttribute("id");
                            id_btn_select.value = "btn_select_car_id_" + item.id ;
                            btn_select.setAttributeNode(id_btn_select);

                        div_data_car.appendChild(btn_select);

                        let hr_hr = document.createElement("hr");
                        div_data_car.appendChild(hr_hr);
                        
                        content_search_data.appendChild(div_data_car);
                    }
                }
                catch(err) {
                    // console.log(err);
                }
                
            });
    }

</script>
@endsection
