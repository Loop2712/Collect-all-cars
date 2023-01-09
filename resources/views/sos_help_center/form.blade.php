<style>
    .center-block {
  display: flex;
  align-items: center;
  height: 35px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}

.btn-center-block {
  align-items: center;
  height: 70px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}

</style>

<!-- Modal -->
<div class="modal fade" id="modal_mapMarkLocation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i></h4>
                <span id="btn_close_modal_mapMarkLocation" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <select name="location_P" id="location_P" class="form-control" onchange="show_amphoe();">
                                        <option class="location_P_start" value="" selected > - เลือกจังหวัด - </option>
                                        @foreach($all_provinces as $item)
                                            <option value="{{ $item->province }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_A" id="location_A" class="form-control" onchange="show_tambon();">
                                        <option value="" selected > - เลือกอำเภอ - </option> 
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_T" id="location_T" class="form-control" onchange="select_T();">
                                        <option value="" selected > - เลือกตำบล - </option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <center>
                                <button  type="button" class="btn btn-warning text-white" style="width: 80%;" onclick="re_mapMarkLocation();">
                                    <i class="fa-solid fa-repeat"></i> คืนค่า
                                </button>
                            </center>
                        </div>
                        <div class="col-2">
                            <center>
                                <button  type="button" class="btn btn-info text-white" style="width: 100%;" onclick="submit_locations_sos();">
                                    <i class="fa-solid fa-circle-check"></i> ยืนยัน
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
                <hr>
                <div style="padding-right:15px;margin-top: 5px;">
                    <div class="card">
                        <div id="mapMarkLocation"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="item sos-map col-12 col-md-4 bg-white">
    <div class="row">
        <div class="col-12 text-center">
            <h5><b>ข้อมูลผู้ใช้</b> <span style="font-size:14px;color: grey;">(ขอความช่วยเหลือ)</span></h5>
            <div class="row">
                <!-- ชื่อ -->
                <div class="col-12" style="margin-top: 10px;">
                    @php
                        if(!empty($sos_help_center->name_user)){
                            $read_name_user = true ;
                        }else{
                            $read_name_user = false ;
                        }

                        if(!empty($sos_help_center->phone_user)){
                            $read_phone_user = true ;
                        }else{
                            $read_phone_user = false ;
                        }
                    @endphp
                    <input type="text" class="form-control" name="name_user" id="name_user" placeholder="ระบุชื่อ.." value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}" readonly="{{ $read_name_user }}">
                </div>
                <!-- เบอร์ -->
                <div class="col-12" style="margin-top: 10px;">
                    <input type="text" class="form-control" name="phone_user" id="phone_user" placeholder="ระบุเบอร์.." value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}" readonly="{{ $read_phone_user }}">
                </div>
                <!-- BTN -->
                <div class="col-12" style="margin-top: 25px;">
                    <span class="btn btn-sm btn-success main-shadow main-radius" style="width:65%;">ยืนยัน</span>
                </div>
            </div>
        </div>

        <center>
            <br>
            <hr style="width:75%;">
            <br>
        </center>

        <div class="col-12">
            <div class="row text-center">
                <div class="col-6">
                    <h5 class="float-start"><b>#จุดเกิดเหตุ</b></h5>
                </div>
                <div class="col-6">
                    <span class="btn btn-sm btn-danger" style="font-size:15px;width: 80%;" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="mapMarkLocation('12.870032','100.992541','6');">
                        เลือกจุด <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
                    </span>
                </div>
            </div>
            
            <div style="padding-right:15px;margin-top: 5px;">
                <div class="card">
                    <div id="map"></div>
                    <div class="row">
                        <div class="col-5 d-none">
                            <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                                <label for="lat" class="control-label">{{ 'Lat' }}</label>
                                <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_help_center->lat) ? $sos_help_center->lat : ''}}" readonly>
                                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-5 d-none">
                            <div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
                                <label for="lng" class="control-label">{{ 'Lng' }}</label>
                                <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_help_center->lng) ? $sos_help_center->lng : ''}}" readonly>
                                {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <span style="margin-top:20px;width: 75%;" class="btn btn-warning text-white main-shadow main-radius" onclick="go_to_maps();">
                                    นำทาง <i class="fa-solid fa-location-arrow"></i>
                                </span>
                                <a id="go_to_maps" href="" target="bank"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="item sos-map col-12 col-md-8 bg-white">
    <div class="row">
        <div class="col-3">
            <h4 style="color:blue;">
                รหัสปฏิบัติการ 
                <br>
                <b><u>{{ $sos_help_center->id }}</u></b>
            </h4>
        </div>
        <div class="col-9">
            <div style="float:right;">
                <button  type="button" class="btn btn-warning text-white btn-center-block">
                   <i class="fa-solid fa-files-medical"></i> แบบฟอร์ม 1 (เหลือง)
                </button>
                <button  type="button" class="btn btn-info text-white btn-center-block">
                    <i class="fa-solid fa-hospital-user"></i> แบบฟอร์ม 2 (<span id="form_sos_2">ตย.สีฟ้า</span>)
                </button>
                <button  type="button" class="btn btn-danger btn-center-block">
                    <i class="fa-solid fa-truck-medical"></i> เลือกหน่วยแพทย์
                </button>
            </div>
        </div>

        <center>
            <hr><br>
        </center>

        <div class="col-12">
            <div style="background-color:#FAE693;height: 100%;border: 0px solid black;padding: 25px;border-radius: 25px;">
                <div class="row">
                    <div class="col-4">
                        @php
                            $date = $sos_help_center->created_at ;
                            $result = $date->format('d/m/Y');
                        @endphp
                        <h6><b>วันที่ :</b> {{ $result }}</h6>
                    </div>
                    <div class="col-4">
                        <h6><b>เลขที่ปฏิบัติการ(ON) :</b> {{ $sos_help_center->operating_code }}</h6>
                    </div>
                    <div class="col-4">
                        <h6><b>ลำดับผู้ป่วย(CN) :</b> .....................</h6>
                    </div>
                </div>
                @include ('sos_help_center.form_sos_yellow')
            </div>
        </div>

    </div>
</div>





<div class="item sos-map bg-white d-none">
<br><br><br><br>
    
    <div class="form-group {{ $errors->has('photo_sos') ? 'has-error' : ''}}">
        <label for="photo_sos" class="control-label">{{ 'Photo Sos' }}</label>
        <input class="form-control" name="photo_sos" type="file" id="photo_sos" value="{{ isset($sos_help_center->photo_sos) ? $sos_help_center->photo_sos : ''}}" >
        {!! $errors->first('photo_sos', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_help_center->user_id) ? $sos_help_center->user_id : ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('organization_helper') ? 'has-error' : ''}}">
        <label for="organization_helper" class="control-label">{{ 'Organization Helper' }}</label>
        <input class="form-control" name="organization_helper" type="text" id="organization_helper" value="{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}" >
        {!! $errors->first('organization_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name_helper') ? 'has-error' : ''}}">
        <label for="name_helper" class="control-label">{{ 'Name Helper' }}</label>
        <input class="form-control" name="name_helper" type="text" id="name_helper" value="{{ isset($sos_help_center->name_helper) ? $sos_help_center->name_helper : ''}}" >
        {!! $errors->first('name_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
        <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
        <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($sos_help_center->partner_id) ? $sos_help_center->partner_id : ''}}" >
        {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('helper_id') ? 'has-error' : ''}}">
        <label for="helper_id" class="control-label">{{ 'Helper Id' }}</label>
        <input class="form-control" name="helper_id" type="number" id="helper_id" value="{{ isset($sos_help_center->helper_id) ? $sos_help_center->helper_id : ''}}" >
        {!! $errors->first('helper_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_impression') ? 'has-error' : ''}}">
        <label for="score_impression" class="control-label">{{ 'Score Impression' }}</label>
        <input class="form-control" name="score_impression" type="number" id="score_impression" value="{{ isset($sos_help_center->score_impression) ? $sos_help_center->score_impression : ''}}" >
        {!! $errors->first('score_impression', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_period') ? 'has-error' : ''}}">
        <label for="score_period" class="control-label">{{ 'Score Period' }}</label>
        <input class="form-control" name="score_period" type="number" id="score_period" value="{{ isset($sos_help_center->score_period) ? $sos_help_center->score_period : ''}}" >
        {!! $errors->first('score_period', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_total') ? 'has-error' : ''}}">
        <label for="score_total" class="control-label">{{ 'Score Total' }}</label>
        <input class="form-control" name="score_total" type="number" id="score_total" value="{{ isset($sos_help_center->score_total) ? $sos_help_center->score_total : ''}}" >
        {!! $errors->first('score_total', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('commemt_help') ? 'has-error' : ''}}">
        <label for="commemt_help" class="control-label">{{ 'Commemt Help' }}</label>
        <input class="form-control" name="commemt_help" type="text" id="commemt_help" value="{{ isset($sos_help_center->commemt_help) ? $sos_help_center->commemt_help : ''}}" >
        {!! $errors->first('commemt_help', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed') ? 'has-error' : ''}}">
        <label for="photo_succeed" class="control-label">{{ 'Photo Succeed' }}</label>
        <input class="form-control" name="photo_succeed" type="file" id="photo_succeed" value="{{ isset($sos_help_center->photo_succeed) ? $sos_help_center->photo_succeed : ''}}" >
        {!! $errors->first('photo_succeed', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed_by') ? 'has-error' : ''}}">
        <label for="photo_succeed_by" class="control-label">{{ 'Photo Succeed By' }}</label>
        <input class="form-control" name="photo_succeed_by" type="text" id="photo_succeed_by" value="{{ isset($sos_help_center->photo_succeed_by) ? $sos_help_center->photo_succeed_by : ''}}" >
        {!! $errors->first('photo_succeed_by', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('remark_helper') ? 'has-error' : ''}}">
        <label for="remark_helper" class="control-label">{{ 'Remark Helper' }}</label>
        <input class="form-control" name="remark_helper" type="text" id="remark_helper" value="{{ isset($sos_help_center->remark_helper) ? $sos_help_center->remark_helper : ''}}" >
        {!! $errors->first('remark_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('notify') ? 'has-error' : ''}}">
        <label for="notify" class="control-label">{{ 'Notify' }}</label>
        <input class="form-control" name="notify" type="text" id="notify" value="{{ isset($sos_help_center->notify) ? $sos_help_center->notify : ''}}" >
        {!! $errors->first('notify', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'Status' }}</label>
        <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_help_center->status) ? $sos_help_center->status : ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('help_complete_time') ? 'has-error' : ''}}">
        <label for="help_complete_time" class="control-label">{{ 'Help Complete Time' }}</label>
        <input class="form-control" name="help_complete_time" type="datetime-local" id="help_complete_time" value="{{ isset($sos_help_center->help_complete_time) ? $sos_help_center->help_complete_time : ''}}" >
        {!! $errors->first('help_complete_time', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('time_go_to_help') ? 'has-error' : ''}}">
        <label for="time_go_to_help" class="control-label">{{ 'Time Go To Help' }}</label>
        <input class="form-control" name="time_go_to_help" type="datetime-local" id="time_go_to_help" value="{{ isset($sos_help_center->time_go_to_help) ? $sos_help_center->time_go_to_help : ''}}" >
        {!! $errors->first('time_go_to_help', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>

</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(40vh);
    }

    #mapMarkLocation {
      height: calc(65vh);
    }
</style>
<script>

    const image = "https://www.viicheck.com/img/icon/flag_2.png";
    var markers = [] ;
    let marker  ;
    var sos_markers = [] ;
    let sos_marker  ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
    });

    function initMap() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });
    }

    function mapMarkLocation(lat , lng , numZoom) {

        let m_lat = parseFloat(lat);
        let m_lng = parseFloat(lng);
        let m_numZoom = parseFloat(numZoom);

        mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });

    }

    function add_marker(marker_lat , marker_lng){
        if (marker) {
            marker.setMap(null);
        }

        marker = new google.maps.Marker({
            position: {lat: parseFloat(marker_lat) , lng: parseFloat(marker_lng) },
            map: mapMarkLocation,
            icon: image,
        });
        markers.push(marker);

        document.querySelector('#lat').value = marker_lat ;
        document.querySelector('#lng').value = marker_lng ;
    }

    function show_amphoe(){

        let location_P = document.querySelector("#location_P");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#location_A");
                    location_A.innerHTML = "";
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = " - เลือกอำเภอ - ";
                    option_start_A.value = "";
                    location_A.add(option_start_A);

                let option_start_T = document.createElement("option");
                    option_start_T.text = " - เลือกตำบล - ";
                    option_start_T.value = "";
                    location_T.add(option_start_T);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_A.value;
    }

    function show_tambon(){

        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/"+location_A.value+"/show_location_T")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start = document.createElement("option");
                    option_start.text = " - เลือกตำบล - ";
                    option_start.value = "";
                    location_T.add(option_start);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.district;
                    option.value = item.district;
                    location_T.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_T.value;
    }

    function select_T(){
        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");
        let location_T = document.querySelector("#location_T");
        zoom_map(location_P.value , location_A.value , location_T.value) ;
    }

    function zoom_map(province , amphoe , district){

        if (!province) {
            province = "null" ;
        }
        if (!amphoe) {
            amphoe = "null" ;
        }
        if (!district) {
            district = "null" ;
        }

        let all_lat_lng = [];

        // console.log(province);
        // console.log(amphoe);
        // console.log(district);

        fetch("{{ url('/') }}/api/zoom_map/" + province + "/" + amphoe + "/" + district)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for(let item of result){
                    all_lat_lng.push( JSON.parse('{"lat":'+parseFloat(item.lat)+',"lng":'+parseFloat(item.lng)+'}') ) ;
                }

                let bounds = new google.maps.LatLngBounds();

                for (let vc = 0; vc < all_lat_lng.length; vc++) {
                    bounds.extend(all_lat_lng[vc]);
                }

                if (district != "null" || result.length === 1) {
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        center: all_lat_lng[0],
                        zoom: 13,
                    });
                }else{
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        // zoom: num_zoom,
                        center: bounds.getCenter(),
                    });
                    mapMarkLocation.fitBounds(bounds);
                }

                // Create the initial InfoWindow.
                let infoWindow = new google.maps.InfoWindow({
                    // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
                    // position: myLatlng,
                });

                infoWindow.open(mapMarkLocation);
                // Configure the click listener.
                mapMarkLocation.addListener("click", (mapsMouseEvent) => {
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        // position: mapsMouseEvent.latLng,
                    });

                    infoWindow.setContent(
                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    );

                    let text_content = infoWindow.content ;
                        // console.log(text_content)

                    const contentArr = text_content.split(",");
                    const lat_Arr = contentArr[0].split(":");
                        let marker_lat = lat_Arr[1];
                    const lng_Arr = contentArr[1].split(":");
                        let marker_lng = lng_Arr[1].replace("\n}", "");

                    // console.log(marker_lat)
                    // console.log(marker_lng)
                    add_marker(marker_lat , marker_lng);
                    
                    infoWindow.open(mapMarkLocation);

                });
                    
            });
        
    }

    function re_mapMarkLocation(){

        let location_P = document.querySelector("#location_P");
        let location_P_start = document.querySelector(".location_P_start");
            // console.log(location_P_start);
            location_P_start.selected =  true;

        let location_A = document.querySelector("#location_A");
            location_A.innerHTML = "" ;
        let location_T = document.querySelector("#location_T");
            location_T.innerHTML = "" ;

        let option_start_A = document.createElement("option");
            option_start_A.text = " - เลือกอำเภอ - ";
            option_start_A.value = "";
            location_A.add(option_start_A);

        let option_start_T = document.createElement("option");
            option_start_T.text = " - เลือกตำบล - ";
            option_start_T.value = "";
            location_T.add(option_start_T);

        mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
            center: {lat: 12.870032, lng: 100.992541 },
            zoom: 6,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });
    }

    function submit_locations_sos(){
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        if (sos_marker) {
            sos_marker.setMap(null);
        }

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: parseFloat(input_lat.value), lng:  parseFloat(input_lng.value) },
            zoom: 14,
        });

        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(input_lat.value) , lng: parseFloat(input_lng.value) },
            map: map,
            icon: image,
        });
        sos_markers.push(sos_marker);

        document.querySelector('#location_sos').value = input_lat.value + "," + input_lng.value ;

        document.querySelector('#btn_close_modal_mapMarkLocation').click();
    }

    function go_to_maps(){
        let tag_a = document.querySelector('#go_to_maps');
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        tag_a.href = "https://www.google.co.th/maps/dir//"+input_lat.value+ ","+input_lng.value+"/@"+input_lat.value+","+input_lng.value+",17z";
        document.querySelector('#go_to_maps').click();
    }

</script>