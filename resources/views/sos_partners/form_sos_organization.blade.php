<style>
    #map {
      height: calc(25vh);
    }
    .gm-style-mtc-bbw{
        display: none!important;
    }

    .gm-fullscreen-control{
        display: none!important;
    }

    .gm-svpc{
        display: none!important;
    }

    .gmnoprint{
        display: none!important;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>

<div class="row g-3">

    <!-- Section 1 Map -->
    <div class="col-12">
        <div id="map" class="main-shadow main-radius p-0" style="margin-top:25px; margin-bottom:10px;border-radius:20px;">
            <!--  -->
        </div>
    </div>

    <!-- Section 2 Photo By Partner -->
    <div id="Photo_By_Partner" class="col-12 d-none">
        <div class="col-12 mb-4">
            <a href="https://www.ocean.co.th/oceanlife-saver">
                <img src="http://localhost/Collect-all-cars/public/img/more/button Ocean Life Saver.png" alt="" style="width: 100%;">
            </a>
        </div>
    </div>

    <!-- Section 3 Area supervisor -->
    <div id="div_text_Area_supervisor" class="col-12 d-none">
        <div class="col-12 mb-4">
            <span class="notranslate">Area supervisor</span>
            <div id="content_Area_supervisor">
                <!--  -->
            </div>
        </div>
    </div>

    <!-- Section 4 1669 & ชาลี -->
    <div id="div_btn_opretor" class="col-12">
        <!--  -->
    </div>

    <!-- Section 5 Embassy -->
    <div id="phone_embassy" class="col-12">
        <!--  -->
    </div>

    <!-- Section 6 Phone sos general -->
    <div id="phone_sos_general" class="col-12">
        @include ('sos_partners.phone_sos_general')
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        getLocation();
        // get_countryCode();
    });

    var map ;
    var Position_lat ;
    var Position_lng ;
    var countryCode ;
    var nationalitie = "{{ Auth::user()->nationalitie }}" ;

    if(!nationalitie){
        nationalitie = "Thai" ;
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            // x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        Position_lat = parseFloat(position.coords.latitude) ;
        Position_lng = parseFloat(position.coords.longitude) ;

        if(Position_lat && Position_lng){
            initMap();
        }
    }

    function initMap(){ 
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: { lat: Position_lat, lng: Position_lng },
            mapTypeId: "terrain",
        });

        // ตำแหน่ง USER
        const user = { lat: Position_lat, lng: Position_lng };
        const marker_user = new google.maps.Marker({ map, position: user });

        get_countryCode();
    }

    function search_polygon_area(){

        fetch("{{ url('/') }}/api/search_polygon_area")
            .then(response => response.json())
            .then(result => {
                if(result){
                    console.log(result);

                    let array_name_area = [];

                    for (let i = 0; i < result.length; i++) {
                        // เปลี่ยน polygon JSON string เป็น array
                        let polygonArray = JSON.parse(result[i].sos_area);

                        // ตัวอย่างการทดสอบจุด
                        let point = { lat: Position_lat, lng: Position_lng };
                        let check = isPointInPolygon(point, polygonArray);

                        if (check) {
                            // console.log("อยู่ในพื้นที่ : " + result[i].name_area);
                            // เพิ่มเป็น JSON object ที่มีทั้ง name_area และ id
                            array_name_area.push({ 
                                id: result[i].id, 
                                name_area: result[i].name_area,
                                logo: result[i].logo,
                                sos_area: result[i].sos_area,
                                name: result[i].name,
                                sos_group_line_id: result[i].sos_group_line_id,
                            });
                        } else {
                            // console.log("ไม่อยู่ใน : " + result[i].name_area);
                        }

                        // เรียก show_name_area_inside เมื่อจบ for loop
                        if (i === result.length - 1) {
                            show_name_area_inside(array_name_area);
                        }
                    }
                }
            });

    }

    function show_name_area_inside(areas) {
        console.log("รายชื่อพื้นที่ที่อยู่ภายใน:", areas);

        let content_Area_supervisor = document.querySelector('#content_Area_supervisor');

        if(areas.length == 0){
            document.querySelector('#div_text_Area_supervisor').classList.add('d-none');
        }
        else{

            document.querySelector('#div_text_Area_supervisor').classList.remove('d-none');

            // Create a set to track unique area names
            let unique_group_line_id = new Set();

            areas.forEach(area => {

                let coordinates = JSON.parse(area.sos_area);

                // Create the polygon
                let polygon = new google.maps.Polygon({
                    paths: coordinates,
                    strokeColor: '#008450',
                    strokeOpacity: 0.8,
                    strokeWeight: 1.5,
                    fillColor: '#008450',
                    fillOpacity: 0.3
                });

                // Set the polygon on the map
                polygon.setMap(map);

                // Check if the sos_group_line_id has already been added
                if (!unique_group_line_id.has(area.sos_group_line_id)) {
                    // Add the sos_group_line_id to the set to mark it as added
                    unique_group_line_id.add(area.sos_group_line_id);

                    let html = `
                        <a id="a_help" class="mail-shadow btn btn-md btn-block btn-warning text-dark mt-2" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;">
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img id="logo_help" src="{{ url('storage')}}/` + area.logo + `" width="70%" height="100%" style="border:white solid 3px;border-radius:50%;background-color: #ffffff;"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block notranslate">` + area.name + `</span>
                                            <span id="area_linegroup_`+area.sos_group_line_id+`" class="d-block notranslate">` + area.name_area + `</span>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;

                    content_Area_supervisor.insertAdjacentHTML("beforeend", html);
                } else {
                    // If area.name is duplicate, remove the specific span element
                    let spanElement = document.querySelector('#area_linegroup_'+area.sos_group_line_id);
                    if (spanElement) {
                        spanElement.innerHTML = "";
                    }
                }

            });

        }

    }

    function isPointInPolygon(point, polygon) {
        const x = point.lat;
        const y = point.lng;
        let isInside = false;

        for (let i = 0, j = polygon.length - 1; i < polygon.length; j = i++) {
            const xi = polygon[i].lat, yi = polygon[i].lng;
            const xj = polygon[j].lat, yj = polygon[j].lng;

            const intersect = ((yi > y) !== (yj > y)) &&
                (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) isInside = !isInside;
        }

        return isInside;
    }

    function get_countryCode(){

        console.log("get_countryCode");

        // countryCode = "TH" ;
        // get_phone_sos_general(countryCode);
        // show_btn_sos(countryCode);

        // fetch("{{ url('/') }}/api/get_countryCode")
        //     .then(response => response.json())
        //     .then(result => {
        //         console.log(result);
        //         console.log(result['countryCode']);

        //         if(result.status = "success"){
        //             countryCode = result['countryCode'] ;
        //             get_phone_sos_general(countryCode);
        //             show_btn_sos(countryCode);
        //         }
        //     });

        fetch("{{ url('/') }}/api/get_countryCode")
            .then(response => response.text()) // ใช้ text() แทน json() เพื่อตรวจสอบผลลัพธ์ดิบ
            .then(result => {
                console.log("Raw Response:", result); // ตรวจสอบว่า response คืออะไร
                const jsonData = JSON.parse(result); // แปลงเป็น JSON (ถ้าเป็นไปได้)
                console.log("Parsed JSON:", jsonData);
            })
            .catch(error => console.error('Error:', error));

            }

    function show_btn_sos(countryCode){
        console.log("สัญชาติ >> " + nationalitie);
        console.log("อยู่ที่ >> " + countryCode);

        // Opretor BTN
        show_opretor(nationalitie , countryCode);

        // คนไทยในไทย
        if(nationalitie == "Thai" && countryCode == "TH"){
            // Area supervisor
            search_polygon_area();
        }
        // คนไทยนอกประเทศไทย
        else if(nationalitie == "Thai" && countryCode != "TH"){

        }
        // ต่างชาติในไทย
        else if(nationalitie != "Thai" && countryCode == "TH"){

        }
        // ต่างชาตินอกประเทศไทย
        else if(nationalitie != "Thai" && countryCode != "TH"){
            
        }
    }

    function show_opretor(nationalitie , countryCode){

        let div_btn_opretor = document.querySelector('#div_btn_opretor');
            div_btn_opretor.innerHTML = '';

        let html = ``;

        if(nationalitie == "Thai" && countryCode == "TH"){
            html = `
                <div class="col-12 mb-4">
                    <a id="btn_tel_1669" class="mail-shadow btn btn-md btn-block mb-2" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#Modal_ask_to_tel_1669" onclick="api_1669();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="http://localhost/Collect-all-cars/public/img/logo-partner/niemslogo.png" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block" style="color: #ffffff;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">บริการการแพทย์ฉุกเฉิน</font></font></span>
                                        <span class="d-block" style="color: #ffffff;"><i class="fa-solid fa-phone me-2"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1669</font></font></span>
                                    </b>
                                    
                                </div>
                            </div>
                        </div>
                    </a>

                    <span class="main-shadow btn btn-md btn-block" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="http://localhost/Collect-all-cars/public/img/logo-partner/logo 250x250/chalie-2.2.png" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block">ช่วยเหลือทั่วไป</span>
                                        <span class="d-block">(ชาลีกรุงเทพ)</span>
                                    </b>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </span>
                </div>
            `;

        }
        // คนไทยนอกประเทศไทย
        else if(nationalitie == "Thai" && countryCode != "TH"){
            get_phone_embassy(nationalitie , countryCode);
        }
        // ต่างชาติในไทย
        else if(nationalitie != "Thai" && countryCode == "TH"){
            html = `
                <div class="col-12 mb-4">
                    <a id="btn_tel_1669" class="mail-shadow btn btn-md btn-block mb-2" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#Modal_ask_to_tel_1669" onclick="open_content_1669_api();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="http://localhost/Collect-all-cars/public/img/logo-partner/niemslogo.png" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block" style="color: #ffffff;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">บริการการแพทย์ฉุกเฉิน</font></font></span>
                                        <span class="d-block" style="color: #ffffff;"><i class="fa-solid fa-phone me-2"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1669</font></font></span>
                                    </b>
                                    
                                </div>
                            </div>
                        </div>
                    </a>

                    <span class="main-shadow btn btn-md btn-block notranslate" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#DB2D2E;">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="{{ url('storage')}}/uploads/j0qRtvfPt0kBIn4xQaVK07K3DgxXzxsp37FaHWv6.png" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block">General help</span>
                                        <span class="d-block">(English)</span>
                                    </b>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </span>
                </div>
            `;

            get_phone_embassy(nationalitie , countryCode);
            
        }
        // ต่างชาตินอกประเทศไทย
        else if(nationalitie != "Thai" && countryCode != "TH"){
            
        }

        div_btn_opretor.insertAdjacentHTML("beforeend", html);

    }

    function get_phone_embassy(nationalitie , countryCode){
        fetch("{{ url('/') }}/api/get_phone_embassy/" + nationalitie + "/" + countryCode)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if(result){

                    let phone_embassy = document.querySelector('#phone_embassy');
                        phone_embassy.innerHTML = '';

                    let html_phone_embassy = `
                        <a class="btn btn-danger btn-block shadow-box text-white notranslate" style="background-color: #DB2D2E;" href="tel:`+result[0].tel+`">
                            <i class="fas fa-phone-alt"></i>&nbsp;Embassy of `+result[0].country+` in Thailand.
                        </a>
                    `;

                    phone_embassy.insertAdjacentHTML("beforeend", html_phone_embassy);

                }
            });
    }

    async function api_1669() {
        console.log('api_1669');

        let myHeaders = new Headers();
            myHeaders.append("x-token", "04ecba8fa6243acbdf0d1e6ca12e769127f20f93f72a15cd46de6f9b6431e5f3");
            myHeaders.append("Authorization", "Basic aWRlbXMtZ2F0ZXdheS1hcGk6WVhCcExXOXdaWEk2WVhCcExXOXdaWEpBY0dWeWJXbHphVzl1");
            myHeaders.append("Content-Type", "application/json");

            let raw = JSON.stringify({
                "informer":"self",
                "phone":"0891234567",
                "cid":"1234567890123",
                "firstname":"สมชาย",
                "lastname":"ใจดี",
                "gender":"M",
                "age":35,
                "symptom_type":13,
                "symptom_detail":"บาดเจ็บที่ขาและแขน",
                "location":"ถนนสุขุมวิท ซอย 3 ใกล้กับสถานีรถไฟฟ้า",
                "province_code":"10",
                "district_code":"1029",
                "sub_district_code":"102901",
                "latitude":13.736717,
                "longitude":100.523186,
                "cbd_code":25,
                "num_victims":1,
                "risk_of_recurrence":false,
                "platform":"iOS 14.4"
            });

            let requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("https://api-data-integration-gateway.fm-sp.com/api/v1/form/v1_pre_opreration", requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(result => {
                    console.log('Response:', result);
                    // ตรวจสอบ success == true
                    if (result.success === true) {
                        // console.log("Success! Calling check_status_case_1669...");
                        // check_status_case_1669(result); // เรียกฟังก์ชันพร้อมส่ง result
                        let pre_operation_id = result['result']['_id'] ;
                        window.location.href = `{{ url('/') }}/sos_idems?pre_operation_id=${pre_operation_id}`;
                    } else {
                        console.log("Success is false. Handle accordingly.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
    }

</script>



<br><br><br><br>
@if(Auth::user()->id == '1' || Auth::user()->id == '64' || Auth::user()->id == '11003429' || Auth::user()->id == '50')
<div style="display:none;">
@else
<div style="display:none;">
@endif
<h3 class="text-danger">FOR DEV</h3>
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <label for="content" class="control-label">{{ 'Content' }}</label>
        <input class="form-control" name="content" type="text" id="content" value="{{ isset($sos_map->content) ? $sos_map->content : ''}}" >
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="control-label">{{ 'Name' }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($sos_map->name) ? $sos_map->name : Auth::user()->name}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        <label for="phone" class="control-label">{{ 'Phone' }}</label>
        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_map->phone) ? $sos_map->phone : Auth::user()->phone}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
        <label for="lat" class="control-label">{{ 'Lat' }}</label>
        <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_map->lat) ? $sos_map->lat : ''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
        <label for="lng" class="control-label">{{ 'Lng' }}</label>
        <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_map->lng) ? $sos_map->lng : ''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
        <label for="area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="area" type="text" id="area" value="{{ isset($sos_map->area) ? $sos_map->area : ''}}" >
        {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
        <label for="name_area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($sos_map->name_area) ? $sos_map->name_area : ''}}" >
        {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_map->user_id) ? $sos_map->user_id : Auth::user()->id}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>

    <input type="text" id="condo_id" name="condo_id" value="{{ $condo_id }}">

    <div class="form-group"> 
        <input class="btn btn-primary" id="btn_submit" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>
</div>

<input class="d-none" type="text" id="latlng" name="latlng" readonly>