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

    .searchAreaBtn {
        position: absolute;
        top: 10px;
        right: 10px;
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

    .cursor-pointer {
        cursor: pointer;
        color: inherit!important;
    }

    .spinner-border {
        display: inline-block;
        width: 2rem;
        height: 2rem;
        vertical-align: text-bottom;
        border: .25em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: .75s linear infinite spinner-border;
        animation: .75s linear infinite spinner-border;
    }

    #panel {
        width: 200px;
        font-family: Arial, sans-serif;
        font-size: 13px;
        float: right;
        margin: 10px;
      }
      #color-palette {
        clear: both;
      }
      .color-button {
        width: 14px;
        height: 14px;
        font-size: 0;
        margin: 2px;
        float: left;
        cursor: pointer;
      }
      #delete-button {
        margin-top: 5px;
      }


      .gmnoprint:nth-child(2){
        scale: 1.65!important;
        top: 12.5px!important;
        margin-left: 10px!important;
        padding-left: 10px!important;
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
                                <button id="btn_getLocation" type="button" class="btn btn-danger text-white" style="width: 100%;" onclick="getLocation();">
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
                                    <input class="form-control" id="input_search_by_latlong" placeholder="ค้นหาด้วย Lat,Long เช่น 13.7248936,100.4930264" value="">
                                    <span id="span_show_errorLatLong" class="text-danger mt-2 d-none"></span>
                                </div>
                                </div>
                                <!-- จบ ค้นหาด้วย Lat,Long -->

                            </div>

                            <div class="col-3 mt-3">
                            <center>
                                <button id="span_submit_locations_sos" type="button" class="btn btn-success text-white main-shadow main-radius" style="width: 100%;" onclick="submit_search_location();">
                                    ค้นหา
                                </button>
                            </center>
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
                    <div class="d-flex justify-content-evenly m-2">
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <div class="radius-50" style="background-color: #008450;"></div>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">พื้นที่ {{ $data_area->name_area }}</span>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <div class=" radius-50" style="background-color: #7A7777;"></div>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">พื้นที่องค์กรทั้งหมด</span>
                        </div>
                    </div>
                    <div id="mapArea"></div>
                </div>
                <!-- แสดงพื้นที่องค์กร -->
                <div id="div_show_area_all" class="col-3 mx-1">
                    <div class="d-flex justify-content-evenly m-2">
                        <br>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <button class="btn btn-warning btn-glow-warning radius-15" style="width: 100%;" onclick="click_edit_this_area();">
                            <i class="fa-solid fa-location-pen"></i> แก้ไขพื้นที่นี้
                        </button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-evenly m-2">
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <i class="fa-sharp fa-solid fa-location-dot" style="color: #009425;"></i>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">Active</span>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <i class="fa-sharp fa-solid fa-location-dot" style="color: #d10000;"></i>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">Inactive</span>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <i class="fa-solid fa-badge-check" style="color: #63E6BE;"></i>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">กำหนดพื้นที่แล้ว</span>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <i class="fa-solid fa-octagon-xmark" style="color: #e44444;"></i>
                            <span class="mx-2" style="font-weight: bold; font-size: 12px;">ยังไม่กำหนดพื้นที่</span>
                        </div>
                    </div>
                    <hr>
                    <div id="list_area_all" class="col-12">
                        <!--  -->
                    </div>
                </div>
                <!-- ปรับพื้นที่ -->
                <div id="div_edit_this_area" class="col-3 mx-1 d-none">
                    <div class="d-flex justify-content-evenly m-2">
                        <br>
                    </div>
                    <div class="mt-2 mb-2 px-2 d-flex justify-content-center">
                        <button id="searchAreaBtn" class="btn btn-info btn-glow-info radius-15" style="width: 90%;" data-bs-toggle="modal" data-bs-target="#modalSearchArea">
                            <i class="fa-solid fa-magnifying-glass-location"></i> ค้นหาสถานที่
                        </button>
                    </div>
                    <div class="mt-2 mb-2 px-2 d-flex d-flex justify-content-center">
                        <button id="delete-button" class="btn btn-primary btn-glow-primary radius-15" style="width: 90%;">
                            <i class="fa-solid fa-repeat"></i> เริ่มวาดใหม่
                        </button>
                    </div>
                    <hr>
                    <div id="panel" class="col-12">
                        <div id="color-palette" class="d-none"></div>
                        <div>
                            <button  class="d-none">Delete Selected Shape</button>
                        </div>
                        <div id="curpos" class="d-none"></div>
                        <div id="cursel" class="d-none"></div>
                        <div id="note" class="d-none"></div>
                    </div>
                    <div class="mt-2 px-2">
                        <button id="btnSubmitAreaEdit" class="btn btn-success radius-10 disabled w-100"  onclick="CF_New_Area();">ยืนยันการเปลี่ยนแปลง</button>
                        <button id="Cancel_edit_area" class="btn btn-secondary radius-10 w-100 mt-2">ยกเลิก</button>
                    </div>
                </div>

                <script>
                    function click_edit_this_area(){
                        document.querySelector('#div_show_area_all').classList.add('d-none');
                        document.querySelector('#div_edit_this_area').classList.remove('d-none');

                        if (document.querySelector('[aria-label="วาดรูปร่าง"]')) {
                            document.querySelector('[aria-label="วาดรูปร่าง"]').classList.remove('d-none');
                            document.querySelector('[aria-label="วาดรูปร่าง"]').click();
                        }

                        strat_edit_area();

                        // เรียกใช้การสร้างปุ่มหลังจากแผนที่ถูกสร้าง
                        // createSearchButton();
                    }

                    function cancel_edit_this_area(){
                        document.querySelector('#div_show_area_all').classList.remove('d-none');
                        document.querySelector('#div_edit_this_area').classList.add('d-none');
                        document.querySelector('[aria-label="วาดรูปร่าง"]').classList.add('d-none');

                        document.querySelector('#btnSubmitAreaEdit').classList.add('disabled');

                        deletedPolygons.forEach(polygon => {
                            polygon.setMap(mapArea); // วาดกลับลงบนแผนที่
                        });

                        // เคลียร์ deletedPolygons หลังจากกู้คืนเสร็จ
                        deletedPolygons = [];

                        document.querySelector('#btn_click_view_area_all').click();
                    }
                </script>

            </div>

        </div>
    </div>


<!-- Google Map -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script> -->

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th&libraries=drawing&libraries=places,drawing"></script>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        initMap();
        get_data_area_all();
    });

    let mapArea;
    let bounds; // ตัวแปรสำหรับเก็บ LatLngBounds
    let polygons = []; // อาร์เรย์สำหรับเก็บ Polygon ที่ถูกวาด
    let deletedPolygons = []; // อาร์เรย์สำหรับเก็บ Polygon ที่ถูกลบ

    var drawingManager;
    var selectedShape;
    var colors = ['#FF8C00'];
    var selectedColor;
    var colorButtons = {};

    var placeMarkers = [];
    var input;
    var searchBox;
    var curposdiv;
    var curseldiv;

    var text_pathstr ;

    function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
    }

    function initMap() {
        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6');

        mapArea = new google.maps.Map(document.getElementById("mapArea"), {
            center: { lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        // สร้าง LatLngBounds object เพื่อขยายขอบเขตแผนที่
        bounds = new google.maps.LatLngBounds();
    }

    function clearSelection() {
        if (selectedShape) {
            if (typeof selectedShape.setEditable == 'function') {
                selectedShape.setEditable(false);
            }
            selectedShape = null;
        }
        curseldiv.innerHTML = "<b>cursel</b>:";
    }

    function updateCurSelText(shape) {

        // console.log('updateCurSelText');

        posstr = "" + selectedShape.position;
        if (typeof selectedShape.position == 'object') {
            posstr = selectedShape.position.toUrlValue();
        }

        // pathstr = "" + selectedShape.getPath;
        // if (typeof selectedShape.getPath == 'function') {
        //     pathstr = "[ ";
        //     for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
        //         // .toUrlValue(5) limits number of decimals, default is 6 but can do more
        //         pathstr += selectedShape.getPath().getAt(i).toUrlValue() + " , ";
        //     }
        //     pathstr += "]";
        // }

        pathstr = []; // เริ่มต้นด้วย array ว่าง
        if (typeof selectedShape.getPath == 'function') {
            for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
                // ดึงพิกัดและแยก lat กับ lng จาก getPath()
                var latLng = selectedShape.getPath().getAt(i);
                pathstr.push({
                    lat: latLng.lat(),
                    lng: latLng.lng()
                });
            }
        }

        // แปลง pathstr เป็น JSON string (ถ้าต้องการ)
        // console.log(JSON.stringify(pathstr));
        text_pathstr = pathstr ;

        bndstr = "" + selectedShape.getBounds;
        cntstr = "" + selectedShape.getBounds;
        if (typeof selectedShape.getBounds == 'function') {
            var tmpbounds = selectedShape.getBounds();
            cntstr = "" + tmpbounds.getCenter().toUrlValue();
            bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
        }

        cntrstr = "" + selectedShape.getCenter;
        if (typeof selectedShape.getCenter == 'function') {
            cntrstr = "" + selectedShape.getCenter().toUrlValue();
        }

        radstr = "" + selectedShape.getRadius;
        if (typeof selectedShape.getRadius == 'function') {
            radstr = "" + selectedShape.getRadius();
        }

        curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr ;

        // console.log(pathstr);
    }

    function setSelection(shape, isNotMarker) {
        clearSelection();
        selectedShape = shape;
        if (isNotMarker){
            // console.log('if setSelection');
            shape.setEditable(true);
            selectColor(shape.get('fillColor') || shape.get('strokeColor'));
            updateCurSelText(shape);

            document.querySelector('#btnSubmitAreaEdit').classList.remove('disabled');
            document.querySelector('#Cancel_edit_area').classList.remove('disabled');
        }
    }

    function deleteSelectedShape() {
        if (selectedShape) {
            selectedShape.setMap(null);
            document.querySelector('[aria-label="วาดรูปร่าง"]').click();
        }
    }

    function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
            var currColor = colors[i];
            colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);
        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);
        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);
        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
    }

    function setSelectedShapeColor(color) {
        if (selectedShape) {
            if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
                selectedShape.set('strokeColor', color);
            } else {
                selectedShape.set('fillColor', color);
            }
        }
    }

    function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
            selectColor(color);
            setSelectedShapeColor(color);
        });
        return button;
    }

    function buildColorPalette() {
        var colorPalette = document.getElementById('color-palette');
        for (var i = 0; i < colors.length; ++i) {
            var currColor = colors[i];
            var colorButton = makeColorButton(currColor);
            colorPalette.appendChild(colorButton);
            colorButtons[currColor] = colorButton;
        }
        selectColor(colors[0]);
    }







    function createSearchButton() {
        let button = document.createElement('button');
        button.id = 'searchAreaBtn';
        button.setAttribute('data-bs-toggle', 'modal');
        button.setAttribute('data-bs-target', '#modalSearchArea');
        button.setAttribute('class', 'btn btn-primary searchAreaBtn');
        button.innerText = 'ค้นหาสถานที่';

        // เพิ่มปุ่มบนแผนที่ในตำแหน่งควบคุมด้านบนซ้าย
        mapArea.controls[google.maps.ControlPosition.TOP_LEFT].push(button);
    }

    function get_data_area_all() {
        // console.log("{{ $data_area->sos_partner_id }}");

        fetch("{{ url('/') }}/api/get_data_area_all" + "/" + "{{ $data_area->sos_partner_id }}")
            .then(response => response.json())
            .then(result => {

                if(result) {
                    // console.log(result);
                    let list_area_all = document.querySelector('#list_area_all');
                    let targetAreaId = "{{ $data_area->id }}";

                    let html_view_all = `
                        <div class="row m-2">
                            <div id="btn_click_view_area_all" class="col-12 mt-2 cursor-pointer text-info" onclick="view_area_all('${encodeURIComponent(JSON.stringify(result))}');">
                                <b class="font-18">ดูพื้นที่ทั้งหมด</b>
                            </div>
                        </div>
                    `;

                    list_area_all.insertAdjacentHTML('beforeend', html_view_all);

                    for (let i = 0; i < result.length; i++) {

                        let html_class_status = result[i].status === "Active" 
                            ? '<i class="fa-sharp fa-solid fa-location-dot" style="color: #009425;"></i>'
                            : '<i class="fa-sharp fa-solid fa-location-dot" style="color: #d10000;"></i>';
                        let html_sos_area = result[i].sos_area 
                            ? '<i class="fa-solid fa-badge-check" style="color: #63E6BE;"></i>'
                            : '<i class="fa-solid fa-octagon-xmark" style="color: #e44444;"></i>';

                        let html_sos_area_click = result[i].sos_area 
                            ? `onclick="click_area('${encodeURIComponent(JSON.stringify(result[i]))}')"`
                            : '';

                        let html_class_sos_area_click = result[i].sos_area 
                            ? `cursor-pointer"`
                            : '';

                        let u_line_start = result[i].id == targetAreaId ? '<u>' : '';
                        let u_line_end = result[i].id == targetAreaId ? '</u>' : '';

                        let html = `
                            <div class="row m-2">
                                <div class="col-9 text-secondary ${html_class_sos_area_click}" ${html_sos_area_click}>
                                    <b>${u_line_start}${result[i].name_area}${u_line_end}</b>
                                </div>
                                <div class="col-3">
                                    <div class="float-end font-18">
                                        ${html_class_status}
                                        ${html_sos_area}
                                    </div>
                                </div>
                            </div>
                        `;

                        list_area_all.insertAdjacentHTML('beforeend', html);

                        // วาดพื้นที่ถ้ามี sos_area
                        if (result[i].sos_area) {
                            // console.log("วาดพื้นที่ >> " + result[i].name_area);
                            let coordinates = JSON.parse(result[i].sos_area);

                            // เช็คว่าพื้นที่นี้ตรงกับข้อมูลที่ต้องการหรือไม่
                            let strokeColor = result[i].id == targetAreaId ? '#008450' : '#7A7777';

                            let areaPolygon = new google.maps.Polygon({
                                paths: coordinates,
                                strokeColor: strokeColor,
                                strokeOpacity: 0.8,
                                strokeWeight: 1.5,
                                fillColor: strokeColor,
                                fillOpacity: 0.3
                            });

                            // วาด Polygon ลงในแผนที่
                            areaPolygon.setMap(mapArea);

                            // เก็บ Polygon ที่วาดไว้ในอาร์เรย์
                            polygons.push(areaPolygon);

                            // ขยายขอบเขตของแผนที่เพื่อครอบคลุมทุกจุดของ Polygon
                            coordinates.forEach((point) => {
                                let latLng = new google.maps.LatLng(point.lat, point.lng);
                                bounds.extend(latLng);
                            });
                        }
                    }

                    // หลังจากวาดทุก Polygon เสร็จแล้ว ให้ปรับการแสดงผลแผนที่
                    mapArea.fitBounds(bounds);
                }

            });
    }

    function click_area(encodedResult) {
        let result = JSON.parse(decodeURIComponent(encodedResult));
        let coordinates = JSON.parse(result.sos_area);

        let bounds = new google.maps.LatLngBounds();

        coordinates.forEach(point => {
            bounds.extend(new google.maps.LatLng(point.lat, point.lng));
        });

        mapArea.fitBounds(bounds);
    }

    function view_area_all(encodedResult) {
        let result = JSON.parse(decodeURIComponent(encodedResult));
        // ทำการเซ็ตศูนย์กลางและขยายแผนที่เพื่อแสดงพื้นที่ทั้งหมด
        mapArea.fitBounds(bounds); // ใช้ bounds ที่เก็บไว้
    }

    function strat_edit_area(){
        polygons.forEach(polygon => {
            if (polygon.strokeColor === '#008450') {
                polygon.setMap(null); // ลบออกจากแผนที่
                deletedPolygons.push(polygon); // เก็บ Polygon ที่ถูกลบไว้
            }
        });

        if(check_click_edit_draw_area == "No"){
            edit_draw_area();
        }
    }



    // ตัวเลือก เลือกจุดเกิดเหตุ
    let map_search_by_current = 'LatLong' ;

    function click_select_search_by(search_by){

        // console.log(search_by);

        if(!search_by){
            search_by = "LatLong" ;
        }

        map_search_by_current = search_by ;

        // console.log(map_search_by_current);

        // document.querySelector('#div_for_find_a_place').classList.add('d-none');

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
                    // console.log(result);

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
                    // console.log(result);
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
    function getLocation() {

        document.querySelector('#btn_getLocation').innerHTML = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> กำลังค้นหาตำแหน่ง..
        `;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(set_now_location);
            // navigator.geolocation.getCurrentPosition(geocodeLatLng);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function set_now_location(position){

        document.querySelector('#input_search_by_latlong').value = "" ;
        document.querySelector('#location_P').value = "" ;
        document.querySelector('#location_A').value = "" ;
        document.querySelector('#location_T').value = "" ;

        let lat = parseFloat(position.coords.latitude) ;
        let lng = parseFloat(position.coords.longitude) ;

        // ตั้งศูนย์กลางใหม่ของแผนที่
        mapArea.setCenter(new google.maps.LatLng(lat, lng));
        mapArea.setZoom(15);

        setTimeout(
            function(){
                document.querySelector('#btn_close_modalSearchArea').click();
                document.querySelector('#btn_getLocation').innerHTML = `
                    <i class="fa-solid fa-location-dot"></i> ตำแหน่งปัจจุบัน
                `;
            },500
        );
    }

    // ค้นหาจาก Lat Lng & ตำบล
    function submit_search_location(){

        document.querySelector('#span_submit_locations_sos').innerHTML = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> กำลังค้นหาตำแหน่ง..
        `;

        if( map_search_by_current == "LatLong" ){

            document.querySelector('#location_P').value = "" ;
            document.querySelector('#location_A').value = "" ;
            document.querySelector('#location_T').value = "" ;


            let input_search_by_latlong = document.querySelector('#input_search_by_latlong').value ;
                // console.log(input_search_by_latlong);
            let split_data = input_search_by_latlong.split(',');

            let lat ;
            let lng ;

            if(split_data[1]){
                let lat = parseFloat( split_data[0].replace(' ' , '') ) ;
                let lng = parseFloat( split_data[1].replace(' ' , '') ) ;

                // ตั้งศูนย์กลางใหม่ของแผนที่
                mapArea.setCenter(new google.maps.LatLng(lat, lng));
                mapArea.setZoom(15);

                setTimeout(
                    function(){
                        document.querySelector('#btn_close_modalSearchArea').click();
                        document.querySelector('#span_submit_locations_sos').innerHTML = `
                            ค้นหา
                        `;
                    },500
                );
            }
            else{
                alert('กรุณาตรวจสอบข้อมูล');
                document.querySelector('#input_search_by_latlong').value = '';
                document.querySelector('#input_search_by_latlong').focus();
                document.querySelector('#span_submit_locations_sos').innerHTML = `
                    ค้นหา
                `;
                return;
            }
        
        }
        else if( map_search_by_current == "district" ){

            document.querySelector('#input_search_by_latlong').value = "" ;

            let location_P = document.querySelector('#location_P').value;
            let location_A = document.querySelector('#location_A').value;
            let location_T = document.querySelector('#location_T').value;

            // console.log(location_P);
            // console.log(location_A);
            // console.log(location_T);

            if(location_P && location_A && location_T){
                fetch("{{ url('/') }}/api/map_search_by_district", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        location_P: location_P,
                        location_A: location_A,
                        location_T: location_T
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // การจัดการกับข้อมูลที่ตอบกลับ
                    // console.log(data);

                    if(data){
                        // console.log(data[0]);

                        let lat = parseFloat( data[0].lat ) ;
                        let lng = parseFloat( data[0].lng ) ;

                        // ตั้งศูนย์กลางใหม่ของแผนที่
                        mapArea.setCenter(new google.maps.LatLng(lat, lng));
                        mapArea.setZoom(18);

                        setTimeout(
                            function(){
                                document.querySelector('#btn_close_modalSearchArea').click();
                                document.querySelector('#span_submit_locations_sos').innerHTML = `
                                    ค้นหา
                                `;
                            },500
                        );
                    }
                })
                .catch(error => {
                    // การจัดการเมื่อเกิดข้อผิดพลาด
                    console.error("Error:", error);
                });
            }
            else{
                alert('กรุณาเลือกข้อมูลทุกช่อง');
                document.querySelector('#span_submit_locations_sos').innerHTML = `
                    ค้นหา
                `;
                return;
            }
        }

    }

    let check_click_edit_draw_area = "No" ;

    // ฟังก์ชันเริ่มการวาด
    function edit_draw_area() {

        let currentOverlay = null; // เก็บ overlay ที่กำลังวาด

        check_click_edit_draw_area = "Yes";

        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');

        var polyOptions = {
            strokeWeight: 0,
            fillOpacity: 0.45,
            editable: true
        };

        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            markerOptions: {
                draggable: true,
                editable: true,
            },
            polylineOptions: {
                editable: true
            },
            rectangleOptions: polyOptions,
            circleOptions: polyOptions,
            polygonOptions: polyOptions,
            map: mapArea
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {

            drawingManager.setDrawingMode(null); // ปิดโหมดการวาดเมื่อวาดเสร็จ
            currentOverlay = e.overlay; // เก็บ overlay ที่วาดเสร็จแล้ว

            var newShape = e.overlay;
            newShape.type = e.type;

            google.maps.event.addListener(newShape, 'click', function() {
                setSelection(newShape, e.type !== google.maps.drawing.OverlayType.MARKER);
            });

            google.maps.event.addListener(newShape.getPath(), 'set_at', function() {
                updateCurSelText(newShape);
                // console.log('Point updated');
            });

            google.maps.event.addListener(newShape.getPath(), 'insert_at', function() {
                updateCurSelText(newShape);
                // console.log('New point added');
            });

            setSelection(newShape, e.type !== google.maps.drawing.OverlayType.MARKER);
        });

        // ฟังการคลิกปุ่ม "ลบ" เพื่อยกเลิกการวาดรูปร่างที่กำลังวาดอยู่
        document.getElementById('delete-button').addEventListener('click', function() {
            if (currentOverlay) {
                currentOverlay.setMap(null); // ลบ overlay ที่กำลังวาดออกจากแผนที่
                currentOverlay = null; // รีเซ็ตตัวแปร
            }
            drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON); // เปิดโหมดการวาดใหม่
        });

        document.getElementById('Cancel_edit_area').addEventListener('click', function() {
            if (currentOverlay) {
                currentOverlay.setMap(null); // ลบ overlay ที่กำลังวาดออกจากแผนที่
                currentOverlay = null; // รีเซ็ตตัวแปร
            }
            drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON); // เปิดโหมดการวาดใหม่
            drawingManager.setDrawingMode(null);
            cancel_edit_this_area();
        });

        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(mapArea, 'click', clearSelection);
        buildColorPalette();

        if(document.querySelector('[aria-label="เพิ่มเครื่องหมาย"]')){
            document.querySelector('[aria-label="เพิ่มเครื่องหมาย"]').classList.add('d-none');
            document.querySelector('[aria-label="ลากเส้น"]').classList.add('d-none');
            document.querySelector('[aria-label="หยุดการวาด"]').classList.add('d-none');
            document.querySelector('[aria-label="วาดวงกลม"]').classList.add('d-none');
            document.querySelector('[aria-label="วาดสี่เหลี่ยมผืนผ้า"]').classList.add('d-none');
            document.querySelector('[aria-label="วาดรูปร่าง"]').classList.remove('d-none');
        }else{
            setTimeout(function() {
                document.querySelector('[aria-label="เพิ่มเครื่องหมาย"]').classList.add('d-none');
                document.querySelector('[aria-label="ลากเส้น"]').classList.add('d-none');
                document.querySelector('[aria-label="หยุดการวาด"]').classList.add('d-none');
                document.querySelector('[aria-label="วาดวงกลม"]').classList.add('d-none');
                document.querySelector('[aria-label="วาดสี่เหลี่ยมผืนผ้า"]').classList.add('d-none');
                document.querySelector('[aria-label="วาดรูปร่าง"]').classList.remove('d-none');
            }, 150);
        }
    }


    function CF_New_Area(){

        fetch("{{ url('/') }}/api/CF_New_Area", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                area_id: "{{ $data_area->id }}",
                text_pathstr: text_pathstr
            })
        })
        .then(response => response.text())
        .then(data => {
            if(data == "success"){
                // console.log(data);
                window.location.reload();
            }
        })
        .catch(error => {
            // การจัดการเมื่อเกิดข้อผิดพลาด
            console.error("Error:", error);
        });
    }

</script>

@endsection
