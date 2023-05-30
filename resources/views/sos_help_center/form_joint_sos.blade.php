
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- //////////////////// Modal อุบัติเหตุร่วม //////////////////// -->
<div class="modal fade" id="Modal-Mass-casualty-incident" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button id="btn_close_casualty_incident" type="button" class="close d-none" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div id="map_joint_sos_1669"></div>
                    </div>
                    <div class="col-4" style="display: flex;flex-direction: column;">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">ข้อมูลเจ้าหน้าที่ (รัศมี 10 กม.)</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- BTN Select Level -->
                            <div class="chat-tab-menu ">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link  menu-select-lv-all" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_select_level').value = 'all';joint_sos_select_level();">
                                            <div class="font-24">ALL
                                            </div>
                                            <div><small>ทั้งหมด</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  menu-select-lv-fr" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_select_level').value = 'fr';joint_sos_select_level()">
                                            <div class="font-24">FR
                                                </div>
                                            <div>
                                                <small>เบื้องต้น</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-bls" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_select_level').value = 'bls';joint_sos_select_level()">
                                            <div class="font-24">BLS
                                            </div>
                                            <div><small>ทั่วไป</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-ils" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_select_level').value = 'ils';joint_sos_select_level()">
                                            <div class="font-24">ILS
                                            </div>
                                            <div><small>กลาง</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-als" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_select_level').value = 'als';joint_sos_select_level()">
                                            <div class="font-24">ALS
                                            </div>
                                            <div><small>สูง</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <input class="d-none" type="text" name="joint_sos_input_select_level" id="joint_sos_input_select_level" value="{{ isset($data_form_yellow->operating_suit_type) ? $data_form_yellow->operating_suit_type : 'all'}}">
                            </div>

                            <!-- BTN Select vehicle  -->
                            <div class="owl-carousel owl-theme owlmenu-vehicle p-3">
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-all" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'all';joint_sos_select_level();">
                                    ทั้งหมด
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-car" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'รถ';joint_sos_select_level();">
                                    รถ
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-aircraft" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'อากาศยาน';joint_sos_select_level();">
                                    อากาศยาน
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-1" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.1';joint_sos_select_level();">
                                    เรือ ป.1
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-2" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.2';joint_sos_select_level();">
                                    เรือ ป.2
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-3" href="javascript:;" 
                                        onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.3';joint_sos_select_level();">
                                    เรือ ป.3
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn  menu-select-vehicle-boat-other" href="javascript:;" 
                                    onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือประเภทอื่นๆ';joint_sos_select_level();">
                                        เรืออื่นๆ
                                    </a>
                                </div>
                            </div>
                           
                            <input class="d-none" type="text" name="joint_sos_input_vehicle_type" id="joint_sos_input_vehicle_type" value="{{ isset($data_form_yellow->vehicle_type) ? $data_form_yellow->vehicle_type : 'all'}}" >

                            <input class="d-none" type="text" id="list_joint_sos_officer" >

                            <div class="data-officer p-3 mb-3 ps ps--active-y" id="joint_sos_card_data_operating">
                                <!-- ข้อมูลหน่วยแพทย์ในพื้นที่ -->
                            </div>
                            <div class="div_bottom" style="margin-top: auto;">
                                <center>
                                    <h5>
                                        ทั้งหมด : <b><span id="show_count_select_operating">0</span></b> หน่วยปฏิบัติการ
                                    </h5>
                                    <p id="show_error_noselect" class="text-danger d-none">กรุณาเลือกหน่วยแพทย์</p>
                                    <span id="btn_send_data_joint_sos" class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;"
                                    onclick="send_data_joint_sos('{{ $sos_1669_id }}');">
                                        ยืนยัน
                                    </span>
                                </center>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //////////////////// END Modal อุบัติเหตุร่วม //////////////////// -->


<!-- //////////////////// Modal แสดงเจ้าหน้าที่ ที่เลือก //////////////////// -->
<!-- Button trigger modal -->
<button id="btn_open_modal_show_officer_joint" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_show_officer_joint">
    Modal แสดงเจ้าหน้าที่ ที่เลือก
</button>

<!-- Modal -->
<div class="modal fade" id="modal_show_officer_joint" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_show_officer_joint" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <button id="btn_close_modal_show_officer_joint" type="button" class="close d-none" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <!-- Mock UP รอการยืนยัน จากหน่วยแพทย์ -->
                <div class="row d-none">
                    <div id="mock_up_test">
                        <div class="col-4">
                            <div class="card" style="background-color: #ffbfc3;transition: 0.5;">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        <b>2305-1406-0000</b>
                                    </h4>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h5>
                                                <i class="fa-duotone fa-spinner fa-spin-pulse"></i> รอการยืนยัน จากหน่วยแพทย์
                                            </h5>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-3">
                                            <img src="assets/images/products/01.png" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col-9">
                                            <b>เจ้าหน้าที่ : </b>
                                            <br>
                                            <b>หน่วยแพทย์ : </b>
                                            <br>
                                            <b>ระดับ : </b>
                                            <br>
                                            <b>ประเภท : </b>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                    <div class="mt-3">
                                        <center>
                                           โปรดรอสักครู่... (<span id="timer_wait_officer_id_1"></span>)
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <!--  -->
                        </div>
                        <div class="col-4">
                            <!--  -->
                        </div>
                    </div>
                </div>
                <!-- end Mock UP รอการยืนยัน จากหน่วยแพทย์ -->

                <div id="show_officer_joint_content" class="row">
                    <!-- Modal แสดงเจ้าหน้าที่ ที่เลือก -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
        </div>
    </div>
</div>
<!-- //////////////////// END Modal แสดงเจ้าหน้าที่ ที่เลือก //////////////////// -->


<!-- //////////////////// Modal new select officer of id sos //////////////////// -->
<!-- Button trigger modal -->
<button id="btn_open_modal_new_select_officer_of_id_sos" type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#modal_new_select_officer_of_id_sos">
    Modal new select officer of id sos
</button>

<style>
/*.home-demo .item {
    background: #ff3f4d;
}
.home-demo h2 {
    color: #FFF;
    text-align: center;
    padding: 5rem 0;
    margin: 0;
    font-style: italic;
    font-weight: 300;
}*/
</style>

<!-- Modal -->
<div class="modal fade" id="modal_new_select_officer_of_id_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_new_select_officer_of_id_sos" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <button id="btn_close_modal_new_select_officer_of_id_sos" type="button" class="close d-none" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <center>
                            <h3 class="mt-3"><u>เลือกหน่วยแพทย์ใหม่</u></h3>
                        </center>
                        <div id="map_new_select_officer" class="mt-3"></div>
                    </div>
                    <div class="col-4" style="display: flex;flex-direction: column;">

                        <!-- รายชื่อเจ้าหน้าที่ -->
                        <div class="home-demo">
                            <div class="owl-carousel owl-new_select_officer_joint owl-theme">

                                <!-- MOCK UP NEW SELECT OFFICER -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2><b>2305-1406-0001</b></h2>
                                            <h5>
                                                <i class="fa-duotone fa-spinner fa-spin-pulse"></i> รอการยืนยัน จากหน่วยแพทย์
                                            </h5>
                                            <hr>
                                        </div>
                                        <div class="col-3 mt-1 text-center">
                                            <span class="btn btn-sm btn-info main-radius main-shadow">
                                                อากาศยาน
                                            </span>
                                            <br>
                                            <span class="btn btn-sm btn-success main-radius main-shadow mt-1">
                                                FR
                                            </span>
                                        </div>
                                        <div class="col-9 mt-1">
                                            <b>เจ้าหน้าที่ : </b>Thanakorn
                                            <br>
                                            <b>เบอร์ : </b>0998823219
                                            <br>
                                            <b>หน่วยแพทย์ : </b>หน่วยแพทย์บ้านกรด (STM)
                                        </div>
                                        <hr class="mt-3">
                                        <hr>
                                        <!-- รายชื่อหน่วยแพทย์ -->
                                        <div class="col-12">
                                            <div class="card radius-10 w-100">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h5 class="mb-0">ข้อมูลเจ้าหน้าที่ (รัศมี 10 กม.)</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- BTN Select Level -->
                                                <div class="chat-tab-menu ">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li class="nav-item">
                                                            <a class="nav-link  menu-select-lv-all" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_select_level').value = 'all';new_select_officer_level();">
                                                                <div class="font-24">ALL
                                                                </div>
                                                                <div><small>ทั้งหมด</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link  menu-select-lv-fr" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_select_level').value = 'fr';new_select_officer_level()">
                                                                <div class="font-24">FR
                                                                    </div>
                                                                <div>
                                                                    <small>เบื้องต้น</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link menu-select-lv-bls" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_select_level').value = 'bls';new_select_officer_level()">
                                                                <div class="font-24">BLS
                                                                </div>
                                                                <div><small>ทั่วไป</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link menu-select-lv-ils" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_select_level').value = 'ils';new_select_officer_level()">
                                                                <div class="font-24">ILS
                                                                </div>
                                                                <div><small>กลาง</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link menu-select-lv-als" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_select_level').value = 'als';new_select_officer_level()">
                                                                <div class="font-24">ALS
                                                                </div>
                                                                <div><small>สูง</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input class="d-" type="text" name="new_select_officer_input_select_level" id="new_select_officer_input_select_level" value="{{ isset($data_form_yellow->operating_suit_type) ? $data_form_yellow->operating_suit_type : 'all'}}">
                                                </div>

                                                <!-- BTN Select vehicle  -->
                                                <div class="owl-carousel owl-theme owlmenu-vehicle p-3">
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-all" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'all';new_select_officer_level();">
                                                        ทั้งหมด
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-car" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'รถ';new_select_officer_level();">
                                                        รถ
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-aircraft" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'อากาศยาน';new_select_officer_level();">
                                                        อากาศยาน
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-boat-1" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'เรือ ป.1';new_select_officer_level();">
                                                        เรือ ป.1
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-boat-2" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'เรือ ป.2';new_select_officer_level();">
                                                        เรือ ป.2
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn menu-select-vehicle-boat-3" href="javascript:;" 
                                                            onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'เรือ ป.3';new_select_officer_level();">
                                                        เรือ ป.3
                                                        </a>
                                                    </div>
                                                    <div class="item" style="width:100%">
                                                        <a class="btn  menu-select-vehicle-boat-other" href="javascript:;" 
                                                        onclick="document.querySelector('#new_select_officer_input_vehicle_type').value = 'เรือประเภทอื่นๆ';new_select_officer_level();">
                                                            เรืออื่นๆ
                                                        </a>
                                                    </div>
                                                </div>
                                               
                                                <input class="d-" type="text" name="new_select_officer_input_vehicle_type" id="new_select_officer_input_vehicle_type" value="{{ isset($data_form_yellow->vehicle_type) ? $data_form_yellow->vehicle_type : 'all'}}" >

                                                <input class="d-" type="text" id="new_select_officer_of_sos_id_1" >

                                                <!-- ตรงนี้เลื่อนได้ -->
                                                <div class="data-officer p-3 mb-3 ps ps--active-y" id="new_select_officer_card_data_operating">
                                                    <!-- ข้อมูลหน่วยแพทย์ในพื้นที่ -->
                                                </div>
                                                <!-- จบ ตรงนี้เลื่อนได้ -->

                                                <div class="div_bottom" style="margin-top: auto;">
                                                    <center>
                                                        <button id="btn_send_new_select_officer" class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;" disabled 
                                                        onclick="send_data_new_select_officer('{{ $sos_1669_id }}');">
                                                            ยืนยัน
                                                        </button>
                                                    </center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <!-- END MOCK UP NEW SELECT OFFICER -->

                                <!-- MOCK UP data_by_js_new_select_officer -->
                                <div id="data_by_js_new_select_officer">

                                    <div class="item">
                                        <h2>Drag</h2>
                                    </div>

                                </div>
                                <!-- END MOCK UP data_by_js_new_select_officer -->

                            </div>
                        </div>

                    <script>
                    $(function() {
                      // Owl Carousel
                      var owl = $(".owl-new_select_officer_joint");
                      owl.owlCarousel({
                        items: 1,
                        margin: 10,
                        loop: false,
                        nav: true,
                        dots:false,
                        autoplay:false,
                        mouseDrag:false,
                      });
                    });
                    </script>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
        </div>
    </div>
</div>

<!-- //////////////////// END Modal new select officer of id sos //////////////////// -->

<script>
    
    const image_sos_joint_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";

    //////////////////// open_map_joint_sos_1669 ////////////////////
    let map_joint_sos_1669 ;
    let joint_sos_location_unit_markers = [];

    let joint_sos_directionsDisplay;
    let joint_sos_view_infoWindow = "";
    let joint_sos_start_infoWindow = [];
    let joint_sos_marker ;
    //////////////////// END open_map_joint_sos_1669 ////////////////////

    function open_map_joint_sos_1669() {

        joint_sos_set_active_btn_menu_select('all' , 'all');

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        if (sos_lat.value && sos_lng.value) {

            let m_lat = parseFloat(sos_lat.value);
            let m_lng = parseFloat(sos_lng.value);
            let m_numZoom = parseFloat('14');

            map_joint_sos_1669 = new google.maps.Map(document.getElementById("map_joint_sos_1669"), {
                center: { lat: m_lat, lng: m_lng },
                zoom: m_numZoom,
                icon: image_sos_joint_sos,
            });

            if (joint_sos_marker){
                joint_sos_marker.setMap(null);
            }

            joint_sos_marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map_joint_sos_1669,
                icon: image_sos_joint_sos,
            });


            let level_start = document.querySelector('#joint_sos_input_select_level').value;
            let vehicle_type_start = document.querySelector('#joint_sos_input_vehicle_type').value;

            // console.log('open_map');
            joint_sos_operating_unit(m_lat, m_lng, level_start ,vehicle_type_start,'open_map');

        } 
    }

    function joint_sos_operating_unit(m_lat, m_lng, level ,vehicle_type, check_click) {
        // console.log("level >> " + level);
        // console.log("vehicle_type >> " + vehicle_type);

        level = level.toLowerCase();

        let check_forward = "{{ $sos_help_center->forward_operation_from }}";
        let forward_level = "{{ $sos_help_center->form_yellow->idc }}";

        if (forward_level){
            forward_level = forward_level ;
        }else{
            forward_level = "null" ;
        }

        if (check_forward && check_click == "open_map"){
            set_active_btn_menu_select_forward(forward_level);
        }else{
            set_active_btn_menu_select(level , vehicle_type);
            forward_level = "null" ;
        }

        // ------------------------------------------------------------------------------------------
        let data_arr = [];
        let text_data_arr = [];

        fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level + "/" + vehicle_type + "/" + forward_level)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer').value ;
                    list_arr = list_joint_sos_officer.split(',');

                for (var i = 0; i < result.length; i++) {

                    let joint_sos_card_data_operating = document.querySelector('#joint_sos_card_data_operating');

                    // add div in to joint_sos_card_data_operating
                    let div_operating = document.createElement("div");
                    let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = "div_operating_id_" + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                    joint_sos_card_data_operating.appendChild(div_operating);

                    switch (result[i]['level']) {
                        case "FR":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_green,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        case "BLS":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_yellow,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        default:
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_red,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                    }

                    let myLatlng = {
                        lat: parseFloat(result[i]['lat']),
                        lng: parseFloat(result[i]['lng'])
                    };

                    let round_i = i + 1;

                    let checked_officer ;

                    if (list_arr.includes( result[i]['user_id'].toString() +'-'+ result[i]['distance'].toFixed(2) +'-'+ result[i]['operating_unit_id'] )) {
                        checked_officer = 'checked' ;
                        // console.log('มีค่า '+result[i]['id']+' ในอาร์เรย์');
                    } else {
                        checked_officer = '' ;
                        // console.log('ไม่มีค่า '+result[i]['id']+' ในอาร์เรย์');
                    }

                    let text_data_operating = `
                        <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                            <div class="">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" `+ checked_officer +` name="select_joint_sos_officer" id="select_joint_sos_officer_`+ result[i]['user_id'] +`" value="`+ result[i]['id'] +`" onclick="select_joint_sos_officer('`+ result[i]['user_id'] +`','`+ result[i]['distance'].toFixed(2) +`','`+ result[i]['operating_unit_id'] +`');">
                                        </div>
                                    </div>
                                    <div class="col-10 data-officer-item d-flex align-items-center p-2 cursor-pointer">
                                        <div class="level `+ result[i]['level'] +` d-flex align-items-center ">
                                            <center> `+ result[i]['level'] +` </center>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">`+ result[i]['name'] +` (`+ result[i]['vehicle_type'] +`)</h6>
                                            <p class="mb-0 font-14">เจ้าหน้าที่ : `+ result[i]['name_officer'] +`</p>
                                            <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ `+ result[i]['distance'].toFixed(2) +` กม. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // div_operating_id_
                    document.querySelector('#div_operating_id_' + result[i]['id']).innerHTML = text_data_operating;

                    // ------------------------------------------
                    // add onclick to btn_marker_id_
                    let btn_marker_id = document.querySelector('#div_operating_id_' + result[i]['id']);
                        btn_marker_id.setAttribute('onclick' , "joint_sos_view_data_marker(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] + ");");
                    
                }

            });

    }

    function joint_sos_view_data_marker(id, name, distance, level, lat, lng) {

        if (joint_sos_directionsDisplay) {
            joint_sos_directionsDisplay.setMap(null);
            // document.querySelector('#div_text_Directions').classList.add('d-none');
        }

        if (joint_sos_view_infoWindow) {
            joint_sos_view_infoWindow.setMap(null);
        }
        if (joint_sos_start_infoWindow[0]) {
            joint_sos_start_infoWindow[0].setMap(null);
            joint_sos_start_infoWindow[1].setMap(null);
            joint_sos_start_infoWindow[2].setMap(null);
        }
        const myLatlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let contentString =
            '<div id="content data_sos_map">'+
                '<div  class="data-officer-item d-flex align-items-center  p-2 cursor-pointer">' +
                    ' <div class="level  ' + level + ' d-flex align-items-center ">' +
                        ' <center> ' + level + '</center>' +
                    '</div>' +
                    '<div class="ms-2">' +
                        '<h6 class="mb-1 font-14">' + name + '</h6>' +
                        '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + distance + ' กม. </p>' +
                    '</div>' +
                '</div>'+
            '</div>';

        joint_sos_view_infoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: myLatlng,
        });

        joint_sos_view_infoWindow.open(map_joint_sos_1669);

    }

    function joint_sos_set_active_btn_menu_select(level , vehicle_type){
        //  LEVEL
        document.querySelector('.menu-select-lv-all').classList.remove("all-active");
        document.querySelector('.menu-select-lv-fr').classList.remove("fr-active");
        document.querySelector('.menu-select-lv-bls').classList.remove("bls-active");
        document.querySelector('.menu-select-lv-ils').classList.remove("ils-active");
        document.querySelector('.menu-select-lv-als').classList.remove("als-active");

        document.querySelector('.menu-select-lv-' + level).classList.add(level + "-active");

        // VEHICLE TYPE
        document.querySelector('.menu-select-vehicle-all').classList.remove("vehicle-all-active");
        document.querySelector('.menu-select-vehicle-car').classList.remove("vehicle-car-active");
        document.querySelector('.menu-select-vehicle-aircraft').classList.remove("vehicle-aircraft-active");
        document.querySelector('.menu-select-vehicle-boat-1').classList.remove("vehicle-boat-1-active");
        document.querySelector('.menu-select-vehicle-boat-2').classList.remove("vehicle-boat-2-active");
        document.querySelector('.menu-select-vehicle-boat-3').classList.remove("vehicle-boat-3-active");
        document.querySelector('.menu-select-vehicle-boat-other').classList.remove("vehicle-boat-other-active");

        let text_vehicle_type ;

        switch(vehicle_type) {
            case 'all':
                text_vehicle_type = "all" ;
            break;
            case 'รถ':
                text_vehicle_type = "car" ;
            break;
            case 'อากาศยาน':
                text_vehicle_type = "aircraft" ;
            break;
            case 'เรือ ป.1':
                text_vehicle_type = "boat-1" ;
            break;
            case 'เรือ ป.2':
                text_vehicle_type = "boat-2" ;
            break;
            case 'เรือ ป.3':
                text_vehicle_type = "boat-3" ;
            break;
            case 'เรือประเภทอื่นๆ':
                text_vehicle_type = "boat-other" ;
            break;
        }
        document.querySelector('.menu-select-vehicle-' + text_vehicle_type).classList.add("vehicle-" + text_vehicle_type + "-active");
    }

    function joint_sos_select_level() {

        let level = document.querySelector('#joint_sos_input_select_level').value;
            level = level.toLowerCase();
        let vehicle_type = document.querySelector('#joint_sos_input_vehicle_type').value;

        level = level.toLowerCase();
        // set_active_btn_menu_select(level , vehicle_type);
        // ------------------------------------------------------------------------------

        document.querySelector('#joint_sos_card_data_operating').innerHTML = "";

        for (var select_level_i = 0; select_level_i < joint_sos_location_unit_markers.length; select_level_i++) {
            joint_sos_location_unit_markers[select_level_i].setMap(null);
        }

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (sos_lat.value && sos_lng.value) {
            m_lat = parseFloat(sos_lat.value);
            m_lng = parseFloat(sos_lng.value);
            m_numZoom = parseFloat('14');
        } else {
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }

        // console.log('select_level');
        joint_sos_operating_unit(m_lat, m_lng, level, vehicle_type,'select_level');

    }

    function select_joint_sos_officer(select_id , distance , operating_unit_id){

        // console.log(select_id);
        document.querySelector('#show_error_noselect').classList.add('d-none');

        let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer') ;
        let check_checkbox = document.querySelector('#select_joint_sos_officer_' + select_id).checked;

        let arr_id ;

        if (check_checkbox){
            // true
            if (list_joint_sos_officer.value){
                list_joint_sos_officer.value = list_joint_sos_officer.value + ',' + select_id +'-'+ distance +'-'+ operating_unit_id ;
            }else{
                list_joint_sos_officer.value = select_id +'-'+ distance +'-'+ operating_unit_id ;
            }

        }else{
            // false
            arr_id = list_joint_sos_officer.value.split(',');

            let index = arr_id.indexOf(select_id.toString() +'-'+ distance +'-'+ operating_unit_id);

            if (index !== -1) {
                // ลบค่าออกจากตัวแปร values
                arr_id.splice(index, 1);
                // อัปเดตค่าใหม่ใน input
                list_joint_sos_officer.value = arr_id.join(',');
            }
        }

        let new_list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');

        if (new_list_joint_sos_officer.value){
            let count_select = new_list_joint_sos_officer.value.split(',');
            document.querySelector('#show_count_select_operating').innerHTML = count_select.length ;
        }else{
            document.querySelector('#show_count_select_operating').innerHTML = '0' ;
        }

    }

    function send_data_joint_sos(sos_1669_id){

        // console.log("sos_1669_id >> " + sos_1669_id);

        let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');
            // console.log(list_joint_sos_officer.value);

        if(list_joint_sos_officer.value){

            document.querySelector('#show_error_noselect').classList.add('d-none');
            document.querySelector('#btn_send_data_joint_sos').innerHTML = 'ยืนยัน ' + `<i class="fa-duotone fa-spinner fa-spin-pulse"></i>` ;
            let list = list_joint_sos_officer.value.replaceAll(',' , '_');
                // console.log(list);

            fetch("{{ url('/') }}/api/create_joint_sos_1669" + "?sos_1669_id=" + sos_1669_id + "&list=" + list)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    if (result == "OK"){
                        document.querySelector('#btn_close_casualty_incident').click();
                        document.querySelector('#btn_open_modal_show_officer_joint').click();
                        document.querySelector('#btn_send_data_joint_sos').innerHTML = 'ยืนยัน';
                        document.querySelector('#list_joint_sos_officer').value = '';
                        document.querySelector('#btn_select_case_sos_joint').classList.add('d-none');
                        document.querySelector('#btn_select_operating_unit').classList.add('d-none');
                        document.querySelector('#btn_show_wait_officer_joint').classList.remove('d-none');
                        show_wait_officer_joint();
                    }

                });
        }else{
            document.querySelector('#show_error_noselect').classList.remove('d-none');
        }
    }

    function show_wait_officer_joint(){

        let sos_id = '{{ $sos_help_center->id }}' ;

        fetch("{{ url('/') }}/api/check_sos_joint_case" + "?sos_1669_id=" + sos_id)
          .then(response => response.json())
          .then(result => {
                // console.log(result);
                let class_col ;
                if (result.length <= 2){
                    class_col = 'col-6' ;
                }else if (result.length >= 3 && result.length < 4){
                    class_col = 'col-4' ;
                }else{
                    class_col = 'col-3' ;
                }

                let show_officer_joint_content = document.querySelector('#show_officer_joint_content');
                    show_officer_joint_content.innerHTML = '' ;

                let arr_sos_id_count_time = [] ;

                for(let item of result){

                    let html_of_result = '' ;

                    console.log("id >> " + item.id);
                    console.log("status >> " + item.status);
                    console.log("wait >> " + item.wait);
                    console.log("operating_code >> " + item.operating_code);
                    console.log("time_command >> " + item.time_command);
                    console.log("name_wait_officer >> " + item.name_wait_officer);
                    console.log("name_wait_phone >> " + item.name_wait_phone);
                    console.log("name_wait_photo >> " + item.name_wait_photo);
                    console.log("name_wait_operating >> " + item.name_wait_operating);
                    console.log("name_wait_vehicle_type >> " + item.name_wait_vehicle_type);
                    console.log("name_wait_level >> " + item.name_wait_level);
                    console.log("joint_case >> " + item.joint_case);
                    console.log('--------------------');

                    let html_footer;
                    let html_div_class_card;
                    let html_div_head;

                    if (item.status == "ปฏิเสธ"){

                        html_div_class_card = `<div class="card" style="background-color: #ffbfc3;transition: 0.5;">` ;
                        html_footer = `
                            <span class="text-danger"><b>เจ้าหน้าที่ ปฏิเสธ</b></span>
                            <br>
                            <span style="width:70%;" class="btn btn-sm btn-warning mt-3" 
                            onclick="select_new_officer_sos_id(`+ item.joint_case +`);">
                                <i class="fa-solid fa-light-emergency-on fa-bounce"></i> เลือกใหม่
                            </span>
                            `;
                        html_div_head = `
                            <h5 class="text-danger">
                                <i class="fa-solid fa-circle-xmark fa-bounce"></i> หน่วยแพทย์ ปฏิเสธ
                            </h5>
                        `;

                    }else if(item.status == "รอการยืนยัน"){

                        let arr_id_of_case = [];
                        arr_id_of_case['id'] = item.id;
                        arr_id_of_case['time_command'] = item.time_command;

                        arr_sos_id_count_time.push(arr_id_of_case);

                        html_div_class_card = `<div class="card">` ;
                        html_footer = `
                            โปรดรอสักครู่... (<span id="timer_wait_officer_id_`+ item.id +`"></span>)
                            <br>
                            <span style="width:70%;" class="btn btn-sm btn-warning mt-3"
                            onclick="select_new_officer_sos_id(`+ item.joint_case +`);">
                                <i class="fa-solid fa-light-emergency-on"></i> เลือกใหม่
                            </span>
                            `;
                        html_div_head = `
                            <h5>
                                <i class="fa-duotone fa-spinner fa-spin-pulse"></i> รอการยืนยัน จากหน่วยแพทย์
                            </h5>
                        `;

                    }else{
                        html_div_class_card = `<div class="card"">` ;
                        html_footer = `
                            <span class="text-success"><b>เจ้าหน้าที่ `+ item.status +`</b></span>
                            `;
                        html_div_head = `
                            <h5 class="text-success">
                                <i class="fa-sharp fa-solid fa-circle-check"></i> หน่วยแพทย์ กำลังดำเนินการ
                            </h5>
                        `;
                    }

                    let photo_officer ;
                    if(item.name_wait_photo){
                        photo_officer = '{{ url("/") }}/storage/' + item.name_wait_photo ;
                    }else{
                        photo_officer = '{{ url("/") }}/img/stickerline/Flex/9.png' ;
                    }

                    html_of_result = `
                        <div class="`+ class_col +`">
                            `+ html_div_class_card +` 
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        `+ item.operating_code +`</b>
                                    </h4>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            `+ html_div_head +`
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-3">
                                            <img src="`+ photo_officer +`" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col-9">
                                            <b>เจ้าหน้าที่ : </b>`+ item.name_wait_officer +`
                                            <br>
                                            <b>เบอร์ : </b>`+ item.name_wait_phone +`
                                            <br>
                                            <b>หน่วยแพทย์ : </b>`+ item.name_wait_operating +`
                                            <br>
                                            <b>ระดับ : </b>`+ item.name_wait_level +`
                                            <br>
                                            <b>ประเภท : </b>`+ item.name_wait_vehicle_type +`
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                    <div class="mt-3">
                                        <center>
                                           `+ html_footer +`
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    show_officer_joint_content.insertAdjacentHTML('beforeend', html_of_result); // แทรกล่างสุด

                }

                startTimer_wait_officer_joint(arr_sos_id_count_time);


          });

    }

    // Function to start the timer
    function startTimer_wait_officer_joint(arr_sos_id_count_time) {

        console.log('>>>>><<<<<<');
        console.log('เริ่มตัวจับเวลา');
        console.log(arr_sos_id_count_time);
        console.log('>>>>><<<<<<');

        let timerInterval_wait_officer_joint = [] ;
        let startTime_wait_officer_joint = [];

        for(let iii = 0 ; iii < arr_sos_id_count_time.length ; iii++){

            console.log(arr_sos_id_count_time[iii]['id']);
            console.log(arr_sos_id_count_time[iii]['time_command']);

            let timerElem_joint = '';
            // Get the timer element
            timerElem_joint = document.getElementById('timer_wait_officer_id_' + arr_sos_id_count_time[iii]['id']);

            // If the timer is already running, stop it and reset the start time
            if (timerInterval_wait_officer_joint[iii]) {
                clearInterval(timerInterval_wait_officer_joint[iii]);
                startTime_wait_officer_joint[iii] = null;
            }

            // Start the timer
            startTime_wait_officer_joint[iii] = Date.parse(arr_sos_id_count_time[iii]['time_command']);

            timerInterval_wait_officer_joint[iii] = setInterval(function() {
                // Calculate the elapsed time
                let elapsedTime_joint = Date.now() - startTime_wait_officer_joint[iii];

                // Convert the elapsed time to minutes and seconds
                let minutes_joint = Math.floor(elapsedTime_joint / 60000);
                let seconds_joint = Math.floor((elapsedTime_joint % 60000) / 1000);

                // Format the time as a string with leading zeros
                let timeString_joint = (minutes_joint < 10 ? '0' : '') + minutes_joint + ':' + (seconds_joint < 10 ? '0' : '') + seconds_joint;

                // Update the timer element
                timerElem_joint.innerText = timeString_joint;
            }, 1000);
        }
        

    }

    function select_new_officer_sos_id(data){
        console.log('*******************************************************');
        console.log('select_new_officer_sos_id');
        console.log(data);
        document.querySelector('#btn_close_modal_show_officer_joint').click();
        document.querySelector('#btn_open_modal_new_select_officer_of_id_sos').click();

        open_map_new_select_officer()
    }

    //////////////////// open_map_new_select_officer ////////////////////
    let map_new_select_officer ;
    let new_select_officer_location_unit_markers = [];

    let new_select_officer_directionsDisplay;
    let new_select_officer_view_infoWindow = "";
    let new_select_officer_start_infoWindow = [];
    let new_select_officer_marker ;
    //////////////////// END open_map_new_select_officer ////////////////////

    function open_map_new_select_officer() {

        // joint_sos_set_active_btn_menu_select('all' , 'all');

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        if (sos_lat.value && sos_lng.value) {

            let m_lat = parseFloat(sos_lat.value);
            let m_lng = parseFloat(sos_lng.value);
            let m_numZoom = parseFloat('14');

            map_new_select_officer = new google.maps.Map(document.getElementById("map_new_select_officer"), {
                center: { lat: m_lat, lng: m_lng },
                zoom: m_numZoom,
                icon: image_sos_joint_sos,
            });

            if (new_select_officer_marker){
                new_select_officer_marker.setMap(null);
            }
            
            new_select_officer_marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map_new_select_officer,
                icon: image_sos_joint_sos,
            });


            let level_start = document.querySelector('#new_select_officer_input_select_level').value;
            let vehicle_type_start = document.querySelector('#new_select_officer_input_vehicle_type').value;

            // console.log('open_map');
            new_select_officer_level(m_lat, m_lng, level_start ,vehicle_type_start,'open_map');

        }


    }

    function new_select_officer_level(m_lat, m_lng, level ,vehicle_type, check_click) {
        // console.log("level >> " + level);
        // console.log("vehicle_type >> " + vehicle_type);

        level = level.toLowerCase();

        let check_forward = "{{ $sos_help_center->forward_operation_from }}";
        let forward_level = "{{ $sos_help_center->form_yellow->idc }}";

        if (forward_level){
            forward_level = forward_level ;
        }else{
            forward_level = "null" ;
        }

        if (check_forward && check_click == "open_map"){
            set_active_btn_menu_select_forward(forward_level);
        }else{
            set_active_btn_menu_select(level , vehicle_type);
            forward_level = "null" ;
        }

        // ------------------------------------------------------------------------------------------
        let data_arr = [];
        let text_data_arr = [];

        fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level + "/" + vehicle_type + "/" + forward_level)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                // for (var i = 0; i < result.length; i++) {
                for (var i = 0; i < 1; i++) {

                    let joint_sos_card_data_operating = document.querySelector('#new_select_officer_card_data_operating');

                    // add div in to joint_sos_card_data_operating
                    let div_operating = document.createElement("div");
                    let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = "div_operating_id_" + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                    joint_sos_card_data_operating.appendChild(div_operating);

                    switch (result[i]['level']) {
                        case "FR":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_green,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        case "BLS":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_yellow,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        default:
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_red,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                    }

                    let myLatlng = {
                        lat: parseFloat(result[i]['lat']),
                        lng: parseFloat(result[i]['lng'])
                    };

                    let round_i = i + 1;

                    let text_data_operating = `
                        <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                            <div class="">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="d-flex align-items-center">
                                            <input type="radio" name="select_joint_sos_officer" id="select_joint_sos_officer_`+ result[i]['user_id'] +`" value="`+ result[i]['id'] +`" onclick="select_joint_sos_officer('`+ result[i]['user_id'] +`','`+ result[i]['distance'].toFixed(2) +`','`+ result[i]['operating_unit_id'] +`');">
                                        </div>
                                    </div>
                                    <div class="col-10 data-officer-item d-flex align-items-center p-2 cursor-pointer">
                                        <div class="level `+ result[i]['level'] +` d-flex align-items-center ">
                                            <center> `+ result[i]['level'] +` </center>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">`+ result[i]['name'] +` (`+ result[i]['vehicle_type'] +`)</h6>
                                            <p class="mb-0 font-14">เจ้าหน้าที่ : `+ result[i]['name_officer'] +`</p>
                                            <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ `+ result[i]['distance'].toFixed(2) +` กม. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // div_operating_id_
                    document.querySelector('#div_operating_id_' + result[i]['id']).innerHTML = text_data_operating;

                    // ------------------------------------------
                    // add onclick to btn_marker_id_
                    let btn_marker_id = document.querySelector('#div_operating_id_' + result[i]['id']);
                        btn_marker_id.setAttribute('onclick' , "joint_sos_view_data_marker(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] + ");");
                    
                }

            });

    }

</script>

