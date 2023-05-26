<!-- //////////////////// Modal อุบัติเหตุร่วม //////////////////// -->
<div class="modal fade" id="Modal-Mass-casualty-incident" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
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
                                    <span class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;"
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

<script>
    
    let map_joint_sos_1669 ;
    let joint_sos_location_unit_markers = [];

    let joint_sos_directionsDisplay;
    let joint_sos_view_infoWindow = "";
    let joint_sos_start_infoWindow = [];


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
                center: {
                    lat: m_lat,
                    lng: m_lng
                },
                zoom: m_numZoom,
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

        console.log("sos_1669_id >> " + sos_1669_id);

        let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');
            console.log(list_joint_sos_officer.value);

        let list = list_joint_sos_officer.value.replaceAll(',' , '_');
            console.log(list);

        fetch("{{ url('/') }}/api/create_joint_sos_1669" + "?sos_1669_id=" + sos_1669_id + "&list=" + list)
            .then(response => response.text())
            .then(result => {
                console.log(result);

            });

        // let formData = new FormData();
        // let data_sos = {
        //     "sos_1669_id" : sos_1669_id,
        //     "list" : list,
        // }
        // // console.log(data_sos_1669);

        // formData.append('sos_1669_id', data_sos.sos_1669_id);
        // formData.append('list', data_sos.list);

        // fetch("{{ url('/') }}/api/create_joint_sos_1669", {
        //         method: 'POST',
        //         body: formData
        //     }).then(function (response){
        //         return response.text();
        //     }).then(function(data){
        //         console.log(data);
        //     }).catch(function(error){
        //         // console.error(error);
        //     });

    }

</script>

