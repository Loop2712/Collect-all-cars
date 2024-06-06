@extends('layouts.partners.theme_partner_new')

@section('content')

<style>

.InputContainer {
  width: 310px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(to bottom,rgb(227, 213, 255),rgb(255, 231, 231));
  border-radius: 30px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
}

.input {
  width: 300px;
  height: 30px;
  border: none;
  outline: none;
  caret-color: rgb(255, 81, 0);
  background-color: rgb(255, 255, 255);
  border-radius: 30px;
  padding-left: 15px;
  letter-spacing: 0.8px;
  color: rgb(19, 19, 19);
  font-size: 13.4px;
}


</style>

<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="row mt-2">
            <div class="col-3 ">
                <h3 class="">รายชื่อโรงพยาบาล</h3>
                <a href="{{ url('/create_hospital') }}" class="btn btn-sm btn-success" style="width: 40%;">
                    เพิ่ม
                </a>
            </div>
            <div class="col-9">
                <div class="float-end">
                    <button id="btn_select_active_all" type="button" class="btn btn-info" onclick="change_select_active('all');">
                        ทั้งหมด
                    </button>
                    <button id="btn_select_active_Yes" type="button" class="btn btn-outline-info" onclick="change_select_active('Yes');">
                        เปิดใช้งาน
                    </button>
                    <button id="btn_select_active_No" type="button" class="btn btn-outline-info" onclick="change_select_active('No');">
                        ยังไม่เปิดใช้งาน
                    </button>
                </div>
                <div class="dropdown float-end px-1">
                    <button id="btn_dropdown_health_type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เลือกประเภท
                    </button>
                    <div id="item_dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- item -->
                    </div>
                </div>
            </div>
            <div class="col-6 mt-2">
                <span class="float-start mt-3">แสดงผล : <span id="count_show"></span></span>
            </div>
            <div class="col-6 mt-2">
                <div class="InputContainer float-end">
                  <input placeholder="ค้นหาชื่อ.." id="Search_name" class="input" name="text" type="text" oninput="input_Search_name();">
                </div>
            </div>

            <div class="col-12">
                <div id="content" class="row p-2 justify-content-center">
                    <!-- DATA -->
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_hospital();

    });

    function get_data_hospital() {

        // console.log("get_data_hospital");

        fetch("{{ url('/') }}/api/get_data_hospital/" + "{{ Auth::user()->sub_organization }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let content = document.querySelector('#content');
                    content.innerHTML = '' ;

                let arr_health_type = [] ;
                let health_type ;

                if(result){

                    document.querySelector('#count_show').innerHTML = result.length;

                    for (let i = 0; i < result.length; i++) {

                        health_type = result[i].health_type ;

                        if( !arr_health_type.includes(health_type) ){
                            arr_health_type.push(health_type);
                        }

                        let html_active ;
                        let data_active ;
                        if( result[i].active != "Yes" ){
                            html_active = `
                                <a href="{{ url('/open_active_hospital') }}/`+result[i].id+`" class="btn btn-sm btn-success" style="width: 40%;">
                                    เปิดใช้งาน
                                </a>
                            `;

                            data_active = "No";
                        }else{
                            html_active = `<span class="text-success"><b>เปิดใช้งานแล้ว</b></span>`;
                            data_active = "Yes";
                        }

                        let html_data = `data_name="`+result[i].name+`" data_health_type="`+result[i].health_type+`" data_active="`+data_active+`" `;

                        let html = `
                            <div `+html_data+` class="card col-6 my-3 px-3 py-4 main-shadow div_of_data">
                                <h5><b>`+result[i].name+`</b></h5>
                                <span><b>`+result[i].health_type+`</b></span> <br>
                                <span>
                                    <b>อำเภอ/เขต :</b> `+result[i].district+` &nbsp;&nbsp;&nbsp; <b>ตำบล/แขวง :</b> `+result[i].sub_district+`
                                </span> <br>
                                <span><b>ที่อยู่ :</b> `+result[i].address+`</span> <br>
                                <span><b>lat :</b> `+result[i].lat+` <b>Long:</b> `+result[i].lng+`</span> <br>
                                <center>
                                    `+html_active+`
                                </center>
                            </div>
                        `;

                        content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }

                    // console.log(arr_health_type);

                    let item_dropdown = document.querySelector('#item_dropdown');
                        item_dropdown.innerHTML = '' ;

                    let html_item_selest_all = `
                            <a class="dropdown-item btn" onclick="change_select_health_type('ทั้งหมด')">ทั้งหมด</a>
                        `;

                    item_dropdown.insertAdjacentHTML('beforeend', html_item_selest_all); // แทรกล่างสุด


                    for (let xi = 0; xi < arr_health_type.length; xi++) {

                        let html_item_dropdown = `
                            <a class="dropdown-item btn" onclick="change_select_health_type('`+arr_health_type[xi]+`')">`+arr_health_type[xi]+`</a>
                        `;

                        item_dropdown.insertAdjacentHTML('beforeend', html_item_dropdown); // แทรกล่างสุด

                    }

                }
        });
    }

    var data_health_type = 'ทั้งหมด';
    var data_type_active = 'all' ;

    function change_select_health_type(health_type){

        // console.log(health_type);
        document.querySelector('#btn_dropdown_health_type').innerHTML = health_type ;
        data_health_type = health_type ;
        show_data_select();
    }

    function change_select_active(type_active){

        // console.log(type_active);

        document.querySelector('#btn_select_active_all').classList.remove('btn-info');
        document.querySelector('#btn_select_active_Yes').classList.remove('btn-info');
        document.querySelector('#btn_select_active_No').classList.remove('btn-info');

        document.querySelector('#btn_select_active_all').classList.add('btn-outline-info');
        document.querySelector('#btn_select_active_Yes').classList.add('btn-outline-info');
        document.querySelector('#btn_select_active_No').classList.add('btn-outline-info');

        document.querySelector('#btn_select_active_'+type_active).classList.add('btn-info');
        document.querySelector('#btn_select_active_'+type_active).classList.remove('btn-outline-info');

        data_type_active = type_active;
        show_data_select();
    }

    function show_data_select(){

        // console.log(data_health_type);
        // console.log(data_type_active);

        let count = 0 ;

        let div_of_data = document.querySelectorAll('.div_of_data');
        div_of_data.forEach(item => {
            // console.log(item);
            item.classList.add('d-none');
        })

        if(data_health_type != "ทั้งหมด"){

            let div_health_type = document.querySelectorAll('div[data_health_type="'+data_health_type+'"]');
            div_health_type.forEach(health_type => {
                // console.log(health_type.getAttribute("data_health_type"));

                if(data_health_type == health_type.getAttribute("data_health_type")){

                    if(data_type_active == health_type.getAttribute("data_active") || data_type_active == "all"){
                        health_type.classList.remove('d-none');
                        count = count + 1 ;
                    }
                }
            })

        }
        else{

            let div_of_data = document.querySelectorAll('.div_of_data');
            div_of_data.forEach(item => {
                // console.log(health_type.getAttribute("data_health_type"));

                if(data_type_active == item.getAttribute("data_active") || data_type_active == "all"){
                    item.classList.remove('d-none');
                    count = count + 1 ;
                }
            })

        }

        document.querySelector('#count_show').innerHTML = count;

    }

    let delayTimer;

    function input_Search_name(){

        clearTimeout(delayTimer);
        delayTimer = setTimeout(Search_data_name, 1000);
    }

    function Search_data_name(){

        // คืนค่าการค้นหาที่ไม่ใช่ชื่อ
        data_health_type = 'ทั้งหมด';
        data_type_active = 'all' ;
        document.querySelector('#btn_dropdown_health_type').innerHTML = data_health_type ;

        document.querySelector('#btn_select_active_all').classList.add('btn-info');
        document.querySelector('#btn_select_active_all').classList.remove('btn-outline-info');

        document.querySelector('#btn_select_active_Yes').classList.remove('btn-info');
        document.querySelector('#btn_select_active_No').classList.remove('btn-info');

        document.querySelector('#btn_select_active_Yes').classList.add('btn-outline-info');
        document.querySelector('#btn_select_active_No').classList.add('btn-outline-info');

        let div_of_data ;
        let count = 0 ;

        div_of_data = document.querySelectorAll('.div_of_data');
        div_of_data.forEach(item => {
            // console.log(item);
            item.classList.remove('d-none');
            count = count + 1 ;
        })

        // ----------------------------------------------------------------------

        let Search_name = document.querySelector('#Search_name').value ;
            // console.log(Search_name);

        // ดึงค่าของ div element ที่มี class เป็น 'card' ออกมาทั้งหมด
        let divElements = document.querySelectorAll('.div_of_data');

        if(Search_name){

            div_of_data = document.querySelectorAll('.div_of_data');
            div_of_data.forEach(item => {
                // console.log(item);
                item.classList.add('d-none');
            })

            count = 0 ;

            // วนลูปตรวจสอบทุก div element ที่เราดึงออกมา
            for (let i = 0; i < divElements.length; i++) {
                // ดึงค่า data_name จาก div element นั้น
                let dataName = divElements[i].getAttribute('data_name');

                // ตรวจสอบว่าค่าของ data_name มี Search_name อยู่หรือไม่
                if (dataName && dataName.includes(Search_name)) {
                    // console.log("พบ data_name ที่มีคำว่า '" + Search_name + "' อยู่ใน div element นี้");
                    // console.log(divElements[i].getAttribute('data_name'));

                    divElements[i].classList.remove('d-none');
                    count = count + 1 ;
                } else {
                    // console.log("ไม่พบ data_name ที่มีคำว่า '" + Search_name + "' อยู่ใน div element นี้");
                }
            }
        }

        document.querySelector('#count_show').innerHTML = count;

    }

</script>
@endsection
