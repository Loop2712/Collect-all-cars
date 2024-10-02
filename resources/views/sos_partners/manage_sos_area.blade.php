@extends('layouts.partners.theme_partner_sos')

<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        /* เพิ่มระยะห่างระหว่างการ์ดกับตาราง */
    }

    .row {
        display: flex;
        border-bottom: 1px solid #ddd;
    }

    .row.header {
        font-weight: bold;
        background-color: #f1f1f1;
    }

    .cell {
        flex: 1;
        padding: 10px;
        font-size: 16px;
        text-align: left;
        /* เพิ่มการจัดเรียงข้อความไปทางซ้าย */
    }

    .row:last-child .cell {
        border-bottom: none;
    }

    .cell:last-child {
        border-right: none;
    }

    @media (max-width: 600px) {
        .row {
            flex-direction: column;
        }

        .cell {
            border-right: none;
            border-bottom: 1px solid #ddd;
        }

        .cell:last-child {
            border-bottom: none;
        }
    }

    /* ปุ่ม switch */
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        --hue: 220deg;
        --width: 5rem;
        --accent-hue: 22deg;
        --duration: 0.6s;
        --easing: cubic-bezier(1, 0, 1, 1);
    }

    .togglesw {
        display: none;
    }

    .switch {
        --shadow-offset: calc(var(--width) / 20);
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        width: var(--width);
        height: calc(var(--width) / 2.5);
        border-radius: var(--width);
        box-shadow: inset 10px 10px 10px hsl(var(--hue) 20% 80%),
            inset -10px -10px 10px hsl(var(--hue) 20% 93%);
    }

    .indicator {
        content: '';
        position: absolute;
        width: 40%;
        height: 60%;
        transition: all var(--duration) var(--easing);
        box-shadow: inset 0 0 2px hsl(var(--hue) 20% 15% / 60%),
            inset 0 0 3px 2px hsl(var(--hue) 20% 15% / 60%),
            inset 0 0 5px 2px hsl(var(--hue) 20% 45% / 60%);
    }

    .indicator.left {
        --hue: var(--accent-hue);
        overflow: hidden;
        left: 10%;
        border-radius: 100px 0 0 100px;
        background: linear-gradient(180deg, hsl(calc(var(--accent-hue) + 20deg) 95% 80%) 10%, hsl(calc(var(--accent-hue) + 20deg) 100% 60%) 30%, hsl(var(--accent-hue) 90% 50%) 60%, hsl(var(--accent-hue) 90% 60%) 75%, hsl(var(--accent-hue) 90% 50%));
    }

    .indicator.left::after {
        content: '';
        position: absolute;
        opacity: 0.6;
        width: 100%;
        height: 100%;
    }

    .indicator.right {
        right: 10%;
        border-radius: 0 100px 100px 0;
        background-image: linear-gradient(180deg, hsl(var(--hue) 20% 95%), hsl(var(--hue) 20% 65%) 60%, hsl(var(--hue) 20% 70%) 70%, hsl(var(--hue) 20% 65%));
    }

    .button {
        position: absolute;
        z-index: 1;
        width: 55%;
        height: 80%;
        left: 5%;
        border-radius: 100px;
        background-image: linear-gradient(160deg, hsl(var(--hue) 20% 95%) 40%, hsl(var(--hue) 20% 65%) 70%);
        transition: all var(--duration) var(--easing);
        box-shadow: 2px 2px 3px hsl(var(--hue) 18% 50% / 80%),
            2px 2px 6px hsl(var(--hue) 18% 50% / 40%),
            10px 20px 10px hsl(var(--hue) 18% 50% / 40%),
            20px 30px 30px hsl(var(--hue) 18% 50% / 60%);
    }

    .button::before,
    .button::after {
        content: '';
        position: absolute;
        top: 10%;
        width: 41%;
        height: 80%;
        border-radius: 100%;
    }

    .button::before {
        left: 5%;
        box-shadow: inset 1px 1px 2px hsl(var(--hue) 20% 85%);
        background-image: linear-gradient(-50deg, hsl(var(--hue) 20% 95%) 20%, hsl(var(--hue) 20% 85%) 80%);
    }

    .button::after {
        right: 5%;
        box-shadow: inset 1px 1px 3px hsl(var(--hue) 20% 70%);
        background-image: linear-gradient(-50deg, hsl(var(--hue) 20% 95%) 20%, hsl(var(--hue) 20% 75%) 80%);
    }

    .togglesw:checked~.button {
        left: 40%;
    }

    .togglesw:not(:checked)~.indicator.left,
    .togglesw:checked~.indicator.right {
        box-shadow: inset 0 0 5px hsl(var(--hue) 20% 15% / 100%),
            inset 20px 20px 10px hsl(var(--hue) 20% 15% / 100%),
            inset 20px 20px 15px hsl(var(--hue) 20% 45% / 100%);
    }


    .toggle-button-cover {
        display: table-cell;
        position: relative;
        width: 74px;
        height: 36px;
        box-sizing: border-box;
    }

    .button-cover {
        height: 100px;
        margin: 20px;
        background-color: #fff;
        box-shadow: 0 10px 20px -8px #c5d6d6;
        border-radius: 4px;
    }

    .button-cover:before {
        counter-increment: button-counter;
        content: counter(button-counter);
        position: absolute;
        right: 0;
        bottom: 0;
        color: #d7e3e3;
        font-size: 12px;
        line-height: 1;
        padding: 5px;
    }

    .button-cover,
    .knobs,
    .layer {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .button {
        position: relative;
        top: 50%;
        width: 74px;
        height: 36px;
        margin: -20px auto 0 auto;
        overflow: hidden;
    }

    .checkbox {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 3;
    }

    .knobs {
        z-index: 2;
    }

    .layer {
        width: 100%;
        transition: 0.3s ease all;
        background-color: #fcebeb;
        z-index: 1;
    }

    .button.r,
    .button.r .layer {
        border-radius: 100px;
    }

    #button-3 .knobs:before {
        content: "ปิด";
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        color: #fff;
        font-size: 10px;
        font-weight: bold;
        text-align: center;
        line-height: 1;
        padding: 9px 4px;
        background-color: #f44336;

        border-radius: 50%;
        transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
    }

    #button-3 .checkbox:active+.knobs:before {
        width: 46px;
        border-radius: 100px;
    }

    #button-3 .checkbox:checked:active+.knobs:before {
        margin-left: -26px;
    }

    #button-3 .checkbox:checked+.knobs:before {
        content: "เปิด";
        left: 42px;
        background-color: #56de57;

    }

    #button-3 .checkbox:checked~.layer {
        background-color: #e2f1e1;
    }

    .btn-add-categorie {
        transition: all .15s ease-in-out;
        display: flex;
        justify-content: center;
        width: 40px;
        height: 40px;
        line-height: 40px;
        font-size: 18px;
        color: #6c757d;
        text-align: center;
        border-radius: 50px;
        margin: 3px;
        background-color: white;
        border: 1px solid rgb(0 0 0 / 15%);
    }

    .btn-add-categorie:hover {
        background-color: #1fb52e;
        color: #fff;
        width: 150px;

    }

    .btn-add-categorie:not(:hover) .text-btn {
        display: none;
        color: #fff !important;
    }

    .btn-add-categorie:hover .text-btn {
        display: block;
        color: #fff !important;

    }

    .non-clickable {
        pointer-events: none;
        /* ป้องกันการกด */
    }
</style>

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex justify-content-between">
            <h5 class="mb-0 "><b>รายชื่อพื้นที่ทั้งหมด</b></h5>
            <a class="btn-add-categorie" href="{{ url('/demo_categorie_repair_create') }}" data-bs-toggle="modal" data-bs-target="#modalAddArea" id="btn_select_active_repair">
                <i class="bx bx-plus"></i>
                <p class="text-btn">เพิ่มพื้นที่</p>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อพื้นที่</th>
                        <th style="min-width: 169px;">การกำหนดพื้นที่</th>
                        <th>สถานะการเปิดใช้งาน</th>
                        <th>เปิดใช้งานระบบ</th>
                        <th style="min-width: 241px;">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <!-- data area -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .check-box-open-system {
        border-radius: 10px;
    }


    .check-box-open-system:has(:checked) {
        color: #fff;
        background-color: #1fb52e;
        pointer-events: none;

    }

    
</style>

<!-- ADD AREA -->
<div class="modal fade " id="modalAddArea" tabindex="-2" aria-labelledby="modalAddAreaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span class="h4" style="font-weight: bold;">เพิ่มพื้นที่</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center" style="height: auto;">
                <div id="" class="w-100">
                    <div class="col-12 d-none">
                        <input class="form-control" type="text" name="creator" id="creator" readonly="" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="col-12" style="margin-top:15px;">
                        <label class="control-label" style="font-size:17px;"><b>ชื่อพื้นที่</b> </label>
                        <div class="form-group d-block">
                            <input class="form-control " type="text" name="name_area" id="name_area">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="float: right;" class="btn btn-success" id="saveAreaBtn" disabled onclick="create_name_area();">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<script>
    let timeout_name_area = null;
    document.querySelector('#name_area').addEventListener('input', function() {
        // ถ้ามีการเปลี่ยนแปลง input ให้หน่วงเวลา 1 วินาที ก่อนเรียก Check_name_area
        clearTimeout(timeout_name_area);
        timeout_name_area = setTimeout(function() {
            Check_name_area();
        }, 1000);
    });

    function Check_name_area() {
        let name_area = document.querySelector('#name_area').value;
        let saveAreaBtn = document.querySelector('#saveAreaBtn');
        // console.log(name_area);
        if (name_area) {
            saveAreaBtn.removeAttribute('disabled');
        } else {
            saveAreaBtn.setAttribute('disabled', true);
        }
    }

    function create_name_area() {
        let name_area = document.querySelector('#name_area').value;
        let creator = document.querySelector('#creator').value;
        let organization_id = "{{ Auth::user()->organization_id }}";

        fetch("{{ url('/') }}/api/create_name_area/" + name_area + "/" + creator + "/" + organization_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == "success") {
                    location.reload();
                }
            });
    }
</script>

<!-- Modal open ViiSOS -->
<button class="d-none" id="btn_modalopenViiSOS" data-bs-toggle="modal" data-bs-target="#modalopenViiSOS"></button>
<div class="modal fade" id="modalopenViiSOS" tabindex="-2" aria-labelledby="modalopenViiSOSLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span class="h4" style="font-weight: bold;">กรุณาเลือกกลุ่มไลน์ที่ต้องการ</span>
                <button type="button" id="btn_close_modalopenViiSOS" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center" style="height: auto;">
                <div id="" class="w-100">
                    <div class="col-12" style="margin-top:15px;">
                        <div class="form-group d-block">
                            <label class="control-label" style="font-size:17px;"><b>กลุ่มไลน์</b> </label>

                            <select id="select_line_for_area" class="form-select">
                                <!-- data -->
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12" style="margin-top:15px;">
                        <div class="form-group d-block">
                            <label class="control-label" style="font-size:17px;"><b>Secret Token</b> </label>
                            <div class="form-group d-block">
                                <input class="form-control " type="text" name="secret_token" id="secret_token" readonly>
                            </div>
                            <span class="text-danger d-none" id="alert_secret_token">*Secret Token ไม่ถูกต้อง</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="float: right;" class="btn btn-success" id="btn_cf_select_line_for_area" disabled>
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_area();
        get_data_group_line();
    });

    function get_data_group_line() {
        let organization_id = "{{ Auth::user()->organization_id }}";

        fetch("{{ url('/') }}/api/get_data_group_line_ower/" + organization_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let select_line_for_area = document.querySelector('#select_line_for_area');
                select_line_for_area.innerHTML = '';

                let option_start = document.createElement("option");
                option_start.text = 'เลือกกลุ่มไลน์';
                option_start.value = '';
                select_line_for_area.add(option_start);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = 'กลุ่มไลน์ : ' + item.groupName;
                    option.value = item.id;
                    select_line_for_area.add(option);
                }

            });
    }

    function get_data_area() {

        let organization_id = "{{ Auth::user()->organization_id }}";

        fetch("{{ url('/') }}/api/get_data_area/" + organization_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if (result) {

                    let tbody = document.querySelector('#tbody');
                    tbody.innerHTML = '';

                    for (let i = 0; i < result.length; i++) {

                        let html_status = ``;

                        if (result[i].open_sos || result[i].open_repair) {
                            html_status = `
                            <div id="checkbox_open_system_id_` + result[i].id + `" class="toggle-button-cover" onclick="open_area('` + result[i].id + `' , 'Active');">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" class="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        `;
                        } else {
                            html_status = `
                            <div id="checkbox_open_system_id_` + result[i].id + `" class="toggle-button-cover" onclick="alert_open_system('` + result[i].id + `');">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" class="checkbox" id="input_checkbox_open_` + result[i].id + `">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        `;
                        }

                        if (result[i].status == "Active") {
                            html_status = `
                            <div class="toggle-button-cover" onclick="open_area('` + result[i].id + `' , 'Inactive');">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" class="checkbox" checked>
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        `;
                        }

                        let html_check_area = `
                        <p class="text-danger" style="font-weight:bold">ยังไม่มีการกำหนดพื้นที่</p>
                    `;

                        if (result[i].sos_area) {
                            html_check_area = `
                            <p class="text-success" style="font-weight:bold">กำหนดพื้นที่แล้ว</p>
                        `;
                        }

                        let html_open_sos = `<input type="checkbox" name="open_sos" id="open_sos_id_` + result[i].id + `" onclick="click_open_sos(` + result[i].id + `)">`;
                        if (result[i].open_sos) {
                            html_open_sos = `
                            <input type="checkbox" checked name="open_sos" id="open_sos_id_` + result[i].id + `" class="non-clickable">
                        `;
                        }

                        let html_open_fix = `<input type="checkbox" name="open_fix" id="open_fix_id_` + result[i].id + `" onclick="click_open_fix(` + result[i].id + `)">`;
                        if (result[i].open_repair) {
                            html_open_fix = `
                            <input type="checkbox" checked name="open_fix" id="open_fix_id_` + result[i].id + `" class="non-clickable">
                        `;
                        }

                        let html = `
                        <tr>
                        <td>
                            <p><b>` + result[i].name_area + `</b></p>
                        </td>
                        <td>
                            ` + html_check_area + `
                        </td>
                        <td>
                            ` + html_status + `
                        </td>
                        <td>
                            <div class="d-flex flex-wrap">
                                <label class=" cursor-pointer  d-flex justify-content-between align-items-center shadow mx-2 px-2 py-2 check-box-open-system">
                                    <div class="d-flex align-items-center mx-1">
                                        <p class="mb-0">ViiSOS</p>
                                    </div>
                                    ` + html_open_sos + `
                                </label>
                                <label class=" cursor-pointer  d-flex justify-content-between align-items-center shadow mx-2 px-2 py-2 check-box-open-system">
                                    <div class="d-flex align-items-center mx-1">
                                        <p class="mb-0">ViiFIX</p>
                                    </div>
                                    ` + html_open_fix + `
                                </label>
                            </div>
                            
                           
                        </td>
                        <td>
                            <a id="" href="{{ url('/demo_management_view') }}" type="button" class="btn btn-warning active radius-15">
                                <i class="fa-solid fa-plus"></i>ดูข้อมูล / แก้ไข
                            </a>
                            <button id="" type="button" class="btn btn-danger active radius-15">
                                <i class="fa-solid fa-trash"></i>ลบ
                            </button>
                        </td>
                    </tr>
                    `;

                        tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                    }
                }

            });

    }

    function alert_open_system(id) {
        alert("กรุณาเปิดใช้งานระบบและผูกกลุ่มไลน์ก่อนเปิดใช้งานพื้นที่");
        // เข้าถึง checkbox ตาม id และตั้งค่า checked เป็น false
        const checkbox = document.getElementById('input_checkbox_open_' + id);
        if (checkbox) {
            checkbox.checked = false; // ตั้งค่าให้ checkbox กลับไปเป็นสถานะเดิม (unchecked)
        }
    }

    function open_area(id, type) {
        fetch("{{ url('/') }}/api/open_area/" + id + "/" + type)
            .then(response => response.text())
            .then(result => {
                console.log(result);
            });
    }

    function click_open_sos(id) {
        // console.log(id);
        document.querySelector('#btn_modalopenViiSOS').click();

        document.querySelector('#btn_close_modalopenViiSOS').setAttribute('onclick', 'close_modalopenViiSOS(' + id + ')');

        let secret_token = document.querySelector('#secret_token');
        secret_token.setAttribute('oninput', 'delayedCheckSecretToken("' + id + '")');
        secret_token.setAttribute('readonly', true);

        document.querySelector('#select_line_for_area').addEventListener('change', function() {
            let selectedValue = this.value;

            if (selectedValue) {
                secret_token.removeAttribute('readonly');
            } else {
                secret_token.setAttribute('readonly', true);
            }
        });
    }

    function click_open_fix(id) {
        const checkbox = document.getElementById('open_fix_id_' + id);
        if (checkbox) {
            checkbox.checked = false;
        }
        window.location.href = "{{ url('/') }}" + '/categorie_repair_index?id=' + id;
    }

    function close_modalopenViiSOS(id) {
        // console.log('ปุ่มปิดถูกกด');
        document.querySelector('#open_sos_id_' + id).click();
    }

    let timeout = null;

    function delayedCheckSecretToken(id) {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            check_secret_token(id);
        }, 1000);
    }

    function check_secret_token(id) {
        console.log("ตรวจสอบ secret token สำหรับ id: " + id);
        let secret_token = document.querySelector('#secret_token').value;

        let select_line_for_area = document.querySelector('#select_line_for_area');

        fetch("{{ url('/') }}/api/check_secret_token_for_area/" + id + "/" + secret_token)
            .then(response => response.text())
            .then(result => {
                console.log(result);

                if (result == "Yes") {
                    let btn_cf = document.querySelector('#btn_cf_select_line_for_area');
                    btn_cf.setAttribute('onclick', "CF_select_line_for_area('" + id + "','" + select_line_for_area.value + "')")

                    let btn_cf_select_line_for_area = document.querySelector('#btn_cf_select_line_for_area');
                    btn_cf_select_line_for_area.removeAttribute('disabled');
                    let alert_secret_token = document.querySelector('#alert_secret_token');
                    alert_secret_token.classList.add('d-none');
                } else {
                    let btn_cf_select_line_for_area = document.querySelector('#btn_cf_select_line_for_area');
                    btn_cf_select_line_for_area.setAttribute('disabled', true);
                    let alert_secret_token = document.querySelector('#alert_secret_token');
                    alert_secret_token.classList.remove('d-none');
                }
            });

    }

    function CF_select_line_for_area(id_area, id_line_group) {
        console.log("id_area >> " + id_area);
        console.log("id_line_group >> " + id_line_group);

        fetch("{{ url('/') }}/api/CF_select_line_for_area/" + id_area + "/" + id_line_group + "/sos")
            .then(response => response.text())
            .then(result => {
                console.log(result);

                if (result == "success") {
                    location.reload();
                }

            });
    }
</script>

@endsection