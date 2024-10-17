@extends('layouts.partners.theme_partner_sos')

<style>
    .card_big {
        height: calc(100% - 100px) !important;
        width: 100% !important;
    }

    #mapArea {
        height: 100%;
        width: 100%;
        background-color: #f0f0f0; /* เพิ่มสีพื้นหลังเพื่อดูผลลัพธ์ */
        position: relative;
    }

    #mapEditor {
        height: 100%;
        width: 100%;
        background-color: #f0f0f0; /* เพิ่มสีพื้นหลังเพื่อดูผลลัพธ์ */

    }
    .searchAreaBtn {
        position: absolute;
        top: 10px;
        right: 60px;
        z-index: 5;
        width: 150px;
        /* background-color: white;
        border: 1px solid #ccc; */
        padding: 5px 10px;
        cursor: pointer;
    }

    .radius-50{
        width: 20px;  /* กำหนดความกว้างของ div */
        height: 20px; /* กำหนดความสูงของ div ให้เท่ากับความกว้าง */
        border-radius: 50%; /* ทำให้เป็นวงกลม */
    }
</style>

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modalSearchArea" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">ค้นหาสถานที่ <i class="fa-sharp fa-solid fa-location-crosshairs"></i></h4>
                    {{-- <span id="btn_close_modalSearchArea" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span> --}}
                    <button id="btn_close_modalSearchArea" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-9">
                                <div class="row">
                                    <div class="col-6">
                                        <center>
                                            <button id="btn_search_by_LatLong" type="button" class="btn btn-outline-info" style="width: 100%;" onclick="click_select_search_by('LatLong');">
                                                <!-- fa-beat-fade -->
                                                <i id="tag_i_search_by_LatLong" class="fa-sharp fa-regular fa-location-dot"></i> ค้นหาด้วย Lat,Long
                                            </button>
                                        </center>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <button id="btn_search_by_district" type="button" class="btn btn-outline-info" style="width: 100%;" onclick="click_select_search_by('district');">
                                                <!-- fa-beat-fade -->
                                                <i id="tag_i_search_by_district" class="fa-sharp fa-solid fa-map-location-dot"></i> ค้นหาด้วยตำบล
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                            <center>
                                <button type="button" class="btn btn-danger text-white" style="width: 100%;" onclick="re_mapMarkLocation();">
                                    <i class="fa-solid fa-location-dot"></i> ตำแหน่งปัจจุบัน
                                </button>
                            </center>
                            </div>

                            <div class="col-9 mt-3">
                                <!-- จังหวัด อำเภอ ตำบล -->
                                <div class="row d-none" id="div_search_by_district">
                                    <div class="col-4">
                                        <select name="location_P" id="location_P" class="form-control" onchange="show_amphoe();">
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="location_A" id="location_A" class="form-control" onchange="show_tambon();">
                                            <option value="" selected >เลือกอำเภอ</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="location_T" id="location_T" class="form-control">
                                            <option value="" selected >เลือกตำบล</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- จบ จังหวัด อำเภอ ตำบล -->

                                <!-- ค้นหาด้วย Lat,Long -->
                                <div class="row d-none" id="div_search_by_LatLong">
                                <div class="col-12">
                                    <input class="form-control" id="input_search_by_latlong" placeholder="ค้นหาด้วย Lat,Long เช่น 13.7248936,100.4930264" value="" oninput="search_by_latlong();">
                                    <span id="span_show_errorLatLong" class="text-danger mt-2 d-none"></span>
                                </div>
                                </div>
                                <!-- จบ ค้นหาด้วย Lat,Long -->

                            </div>

                            <div class="col-3 mt-3">
                            <center>
                                <button id="span_submit_locations_sos" type="button" class="btn btn-success text-white main-shadow main-radius" style="width: 100%;">
                                    ค้นหา
                                </button>
                            </center>
                            </div>

                        </div>
                    </div>


                    <style>

                    .slide-switcher-open-place {
                        animation: slide-open-place 1s ease 0s 1 normal forwards;
                    }

                    @keyframes slide-open-place {
                        0% {
                        transform: translateX(-365px);
                        opacity: 0; /* ทำให้หายไปทีละ peu */
                        }
                        100% {
                        transform: translateX(0);
                        opacity: 1; /* ทำให้ค่อย ๆ ปรากฏขึ้น */
                        }
                    }

                    .slide-switcher-close-place {
                        animation: slide-close-place 1s ease 0s 1 normal forwards;
                    }

                    @keyframes slide-close-place {
                        0% {
                        transform: translateX(0);
                        opacity: 1; /* ทำให้ค่อย ๆ หายไป */
                        }
                        100% {
                        transform: translateX(-365px);
                        opacity: 0; /* ทำให้หายไป */
                        }
                    }

                    </style>
                    <script>
                    function hideDiv() {
                        // ใช้ .classList.toggle() เพื่อเปิด/ปิด class "slide-switcher-close-place" และ "slide-switcher-open-place"
                        document.querySelector('.div_content_data_place').classList.toggle('slide-switcher-close-place');
                        document.querySelector('.div_content_data_place').classList.toggle('slide-switcher-open-place');

                        setTimeout(function() {
                        document.querySelector('#btn_switch_place_outline').classList.toggle('d-none');
                        }, 800);
                    }
                    </script>


                    <div style="padding-right:15px;margin-top: 5px;">
                        <div class="card">
                            <div id="mapMarkLocation" class="d-none"></div>
                            <div id="map_places" class=""></div>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initAutocomplete&libraries=places&v=weekly&language=th" defer></script>

                            <div id="div_for_find_a_place" class="d-none">
                            <button id="btn_switch_place_outline" class="btn btn-info d-none" onclick="hideDiv();" style="position: absolute;z-index: 9999;top:90%;width: 5%;">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>

                            <div class="card slide-switcher-open-place div_content_data_place" style="position: absolute;z-index: 99999;top:10%;height:85%;width: 30%;">

                                <div class="card-body">
                                <div class="row g-0" style="overflow: auto;height: 420px;">
                                    <div class="data_content_place">
                                    <!-- content -->
                                    </div>
                                </div>
                                </div>

                                <button class="btn btn-info m-2" onclick="hideDiv();" style="width:20%;">
                                <i class="fa-solid fa-chevron-right rotate"></i>
                                </button>

                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ">

        <div class="card card_big radius-10 p-4">
            <span class="h2" style="font-weight: bold;">พื้นที่ : <b class="text-primary">{{ $data_area->name_area }}</b></span>
            <hr>
            <div class="d-flex h-100">
                <div class="col-9 mx-1">
                    <div id="mapArea"></div>
                </div>
                <div class="col-3 mx-1 ">
                    <div class="d-flex justify-content-evenly">
                        <button class="btn btn-danger btn-glow-danger radius-15" style="width: 180px;">แก้ไขจุดก่อนหน้า</button>
                        <button class="btn btn-primary btn-glow-primary radius-15" style="width: 120px;">เริ่มใหม่</button>
                    </div>

                    <div class="card mt-2 p-2">
                        <div class="d-flex justify-content-evenly">
                            <div class="d-flex justify-content-center flex-wrap text-center">
                                <div class="radius-50" style="background-color: #ff914d;"></div><br>
                                <span style="font-weight: bold; font-size: 12px;">พื้นที่ของท่านปัจจุบัน</span>
                            </div>
                            <div class="d-flex justify-content-center flex-wrap text-center">
                                <div class=" radius-50" style="background-color: #008450;"></div><br>
                                <span style="font-weight: bold; font-size: 12px;">พื้นที่องค์กรทั้งหมด</span>
                            </div>
                            <div class="d-flex justify-content-center flex-wrap text-center">
                                <div class=" radius-50" style="background-color: #8f887b;"></div><br>
                                <span style="font-weight: bold; font-size: 12px;">พื้นที่บริการอื่นๆ</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-2" style="height: 570px; overflow: hidden;">
                        <div id="mapEditor" style="height: 100%; width: 100%;"></div>
                    </div>
                    <div class="mt-2 px-2 " >
                        <button id="btnSubmitAreaEdit" class="btn btn-success radius-10 disabled w-100">ยืนยันการเปลี่ยนแปลง</button>
                    </div>

                </div>
            </div>

        </div>
    </div>


<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        initMap();
        initMapEditor();
        createSearchButton();

    });

    function initMap() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        mapArea = new google.maps.Map(document.getElementById("mapArea"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });
    }

    function initMapEditor() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('11');

        mapEditor = new google.maps.Map(document.getElementById("mapEditor"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });
    }

    function createSearchButton() {
        let mapArea = document.getElementById("mapArea");
        let button = document.createElement('button');
        button.id = 'searchAreaBtn';
        button.setAttribute('data-bs-toggle' , 'modal');
        button.setAttribute('data-bs-target' , '#modalSearchArea');
        button.setAttribute('class' , 'btn btn-primary searchAreaBtn');
        button.innerText = 'ค้นหาสถานที่';
        button.addEventListener('click', function() {
            // alert('ค้นหาสถานที่ถูกคลิก');
        });

        mapArea.appendChild(button);
    }

    // ตัวเลือก เลือกจุดเกิดเหตุ
    let map_search_by_current = 'LatLong' ;

    function click_select_search_by(search_by){

        console.log(search_by);

        if(!search_by){
            search_by = "LatLong" ;
        }

        map_search_by_current = search_by ;

        // console.log(map_search_by_current);

        document.querySelector('#div_for_find_a_place').classList.add('d-none');

        // map_places
        // mapMarkLocation

        // div ค้นหา
        document.querySelector('#div_search_by_district').classList.add('d-none');
        document.querySelector('#div_search_by_LatLong').classList.add('d-none');

        document.querySelector('#div_search_by_' + search_by).classList.remove('d-none');
        // จบ div ค้นหา

        if(map_search_by_current == "district"){
            search_data_province();
        }

    }

    function search_data_province(){
        fetch("{{ url('/') }}/api/province_search")
            .then(response => response.json())
            .then(result => {

                if(result){
                    console.log(result);

                    let location_P = document.querySelector('#location_P');
                        location_P.innerHTML = '' ;

                    let option_start = document.createElement("option");
                        option_start.text = "เลือกจังหวัด";
                        option_start.value = "";
                        option_start.selected = true;
                        location_P.add(option_start);  

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.changwat_th.replace('จ.' , '');
                        option.value = item.changwat_th;
                        location_P.add(option);             
                    } 
                }

            });
    }

    function show_amphoe(){
        let location_P = document.querySelector('#location_P');
        //PARAMETERS
        fetch("{{ url('/') }}/api/show_amphoe/"+location_P.value)
            .then(response => response.json())
            .then(result => {
                if(result){
                    let location_A = document.querySelector("#location_A");
                        location_A.innerHTML = "";

                    let option_1 = document.createElement("option");
                        option_1.text = "เลือกอำเภอ";
                        option_1.value = "";
                        location_A.add(option_1);

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.amphoe_th.replace("อ.", "");
                        option.value = item.amphoe_th;
                        location_A.add(option);
                    }
                }
            });
    }

    function show_tambon(){
        let location_P = document.querySelector('#location_P');
        let location_A = document.querySelector('#location_A');
        //PARAMETERS
        fetch("{{ url('/') }}/api/show_tambon/" + location_P.value + "/" + location_A.value)
            .then(response => response.json())
            .then(result => {
                if(result){
                    console.log(result);
                    let location_T = document.querySelector("#location_T");
                        location_T.innerHTML = "";

                    let option_1 = document.createElement("option");
                        option_1.text = "เลือกตำบล";
                        option_1.value = "";
                        location_T.add(option_1);

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.tambon_th.replace("ต.", "");
                        option.value = item.tambon_th;
                        location_T.add(option);
                    }
                }
            });
    }

    // ค้นหาจากตำแหน่งปัจจุบัน
    function re_mapMarkLocation(){

    }

</script>

@endsection
