@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
    .swal2-popup {
        background-color: #fff !important;
        color: #000 !important;
    }

    .swal2-title {

        color: #000 !important;
    }

  
</style>
<!-- sweet alert -->
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="d-flex">
    <select name="" class="form-select my-3 me-3" id="m_data_sos" onchange="getDataCaseSosSuccess()">
    @foreach ($monthsAndYears as $data)
        <option value="{{ $data['month'] }}">{{ $data['MONTH'] }}</option>
    @endforeach
    </select>
    
    <select name="" class="form-select my-3 ms-3" id="Y_data_sos" onchange="getDataCaseSosSuccess()">
    @foreach ($monthsAndYears as $data)
        <option value="{{ $data['year'] }}">{{ $data['year'] }}</option>
    @endforeach
    </select>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <!-- <th>#</th> -->
            <th>สถานะ</th>
            <th>ข้อมูลสั่งการ</th>
            <th>ผู้ป่วยหลัก</th>
            <th>ข้อมูลผู้ป่วย</th>
            <!-- <th>ปรับปรุง/ดูรายงาน</th> -->
        </tr>
    </thead>
    <tbody id="tbody">
       
    </tbody>
    <tfoot>
        <tr>
            <!-- <th>#</th> -->
            <th>สถานะ</th>
            <th>ข้อมูลสั่งการ</th>
            <th>ผู้ป่วยหลัก</th>
            <th>ข้อมูลผู้ป่วย</th>
        </tr>
    </tfoot>
</table>
<!-- <button class="btn btn-success" onclick="getDataCaseSosSuccess()">
asfd
</button> -->


<script>
       document.addEventListener('DOMContentLoaded', (event) => {
            getDataCaseSosSuccess();
   
    });

    function getDataCaseSosSuccess() {

   
        // ดึง element ของ select จาก id
        let M_selected = document.getElementById("m_data_sos");
        let M_value = M_selected.value;
        let Y_selected = document.getElementById("Y_data_sos");
        let Y_value = Y_selected.value;

        let tbody_form_yellow = document.querySelector('#tbody');
        tbody_form_yellow.innerHTML = ''; // ทำให้เนื้อหาข้างใน tbody เป็นว่างเปล่า
        let tr_data;
        fetch("{{ url('/') }}/api/get_data_sos_success?page=edit&month="+M_value+"&year="+Y_value)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            result.forEach(item => {
                let totalDataYellow = 11;
                let nonEmptyDataCountYellow = 0;

                // ตรวจสอบข้อมูลที่ไม่ว่าง
                if (item.organization_helper) nonEmptyDataCountYellow++;
                if (item.level_officer) nonEmptyDataCountYellow++;
                if (item.time_create_sos) nonEmptyDataCountYellow++;
                if (item.time_command) nonEmptyDataCountYellow++;
                if (item.time_go_to_help) nonEmptyDataCountYellow++;
                if (item.time_to_the_scene) nonEmptyDataCountYellow++;
                if (item.time_leave_the_scene) nonEmptyDataCountYellow++;
                if (item.time_hospital) nonEmptyDataCountYellow++;
                if (item.time_to_the_operating_base) nonEmptyDataCountYellow++;
                if (item.treatment) nonEmptyDataCountYellow++;
                if (item.sub_treatment) nonEmptyDataCountYellow++;

                let percentageYellow = Math.round(nonEmptyDataCountYellow / totalDataYellow * 100);

                if (percentageYellow == 100) {
                    BGpercentageYellow  = 'bg-success';
                } else{
                    BGpercentageYellow = 'bg-primary';
                }

                let cost = 0;
                let level = item.level_officer;
                let rc = item.rc;

                // คำนวณค่าใช้จ่ายตามการรักษาและระดับ
                if (item.treatment === "มีการรักษา") {
                    if (rc === "แดง(วิกฤติ)") {
                        switch (level) {
                            case "เฉพาะทาง":
                                cost = 1900;
                                break;
                            case "ALS":
                                cost = 1100;
                                break;
                            case "ILS":
                                cost = 750;
                                break;
                            case "BLS":
                                cost = 500;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    } else if (rc === "เหลือง(เร่งด่วน)") {
                        switch (level) {
                            case "ALS":
                                cost = 750;
                                break;
                            case "ILS":
                                cost = 500;
                                break;
                            case "BLS":
                                cost = 500;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    } else if (rc === "เขียว(ไม่รุนแรง)") {
                        switch (level) {
                            case "ALS":
                                cost = 350;
                                break;
                            case "ILS":
                                cost = 350;
                                break;
                            case "BLS":
                                cost = 350;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    }
                } else {
                    switch (level) {
                        case "ALS":
                            cost = 200;
                            break;
                        case "ILS":
                            cost = 150;
                            break;
                        case "BLS":
                            cost = 100;
                            break;
                        case "FR":
                            cost = 100;
                            break;
                    }
                }
                if (item.verified_form_color == "Yes") {
                    badge_status = `<span id="badge_status_${item.sos_help_center_id}" class="badge bg-dark">รอข้อมูลป่วย</span>`;
                } else if(item.verified_form_yellow == "Yes"){
                    badge_status = `<span id="badge_status_${item.sos_help_center_id}" class="badge bg-warning">รอยืนยัน</span>`;
                }else{
                    badge_status = `<span id="badge_status_${item.sos_help_center_id}" class="badge bg-danger">รอข้อมูล</span>`;
                }

                if(percentageYellow == 100){
                    if (item.verified_form_yellow == "Yes") {
                        btn_verified = `
                            <button onclick="btn_verified_status(${item.sos_help_center_id} , 'ยืนยัน')" id=btn_verified_status_${item.sos_help_center_id}
    " class=" float-end m-2 btn btn-success d-none"> ยืนยัน </button>
                        `
                        btn_cancle_verified = `<button onclick="btn_verified_status(${item.sos_help_center_id} , 'ยกเลิก')" class=" float-end m-2 btn btn-danger" id="btn_cancle_status_${item.sos_help_center_id}"> ยกเลิกยืนยัน </button>`
                    } else {
                        btn_verified = `
                            <button onclick="btn_verified_status(${item.sos_help_center_id} , 'ยืนยัน')" id=btn_verified_status_${item.sos_help_center_id}
    " class=" float-end m-2 btn btn-success"> ยืนยัน </button>
                        `
                        btn_cancle_verified = `<button onclick="btn_verified_status(${item.sos_help_center_id} , 'ยกเลิก')" class="d-none float-end m-2 btn btn-danger" id="btn_cancle_status_${item.sos_help_center_id}"> ยกเลิกยืนยัน </button>`

                    }
                }else{
                    btn_verified  ='';
                    btn_cancle_verified ='';
                }
                tr_data = `
                    <tr id="${item.id}">

                        <td>
                            ${badge_status} 
                        </td>
                        <td>
                            <p><strong>เลขปฏิบัติการ: </strong>${item.operating_code}</p>
                            <p><strong>วันที่สั่งการ: </strong>${item.created_at}</p>
                            <p><strong>หน่วยปฏิบัติการ: </strong>${item.name_operating_units}</p>
                            <p><strong>ระดับปฏิบัติการ: </strong>${item.level_officer}</p>
                            <p><strong>บริการ: </strong>${item.treatment}-${item.sub_treatment}</p>
                            <p><strong>ผู้บันทึกข้อมูลสั่งการ: </strong>${item.name_officer_command}</p>
                            <p><strong>ผู้รับรอง: </strong>...</p>
                            <p><strong>ค่าใช้จ่าย: </strong>${cost} บาท</p>

                            <div class="progress">
                                <div class="progress-bar ${BGpercentageYellow}" role="progressbar" style="width: ${percentageYellow}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">${percentageYellow}%</div>
                            </div>

                            <div class="float-end">
                                <a href="{{ url('/sos_help_center/${item.sos_help_center_id}/edit') }}" class=" float-end m-2 btn btn-primary">แก้ไข </a>
                                ${btn_cancle_verified}
                                ${btn_verified}

                            </div>
                        </td>
                        <td></td>
                        <td style="width:600px">
                            <div id="sos_help_center_id_${item.sos_help_center_id}"  style="width:600px"></div>
                        </td>
                    </tr>
                `;

                tbody_form_yellow.insertAdjacentHTML('beforeend', tr_data);
                
                if (item.form_color_name == "green") {
                    getDataFormColor(item.form_color_name , item.sos_help_center_id)
                } else if (item.form_color_name == "pink"){
                    getDataFormColor(item.form_color_name , item.sos_help_center_id)
                }
                else if (item.form_color_name == "blue"){
                    getDataFormColor(item.form_color_name , item.sos_help_center_id)
                }
            });

        
        });
    }

    function getDataFormColor(form_color,sos_id) {
        console.log(form_color,sos_id); 
        let td_form_color = document.querySelector('#sos_help_center_id_'+sos_id);
        let data_color;

        fetch("{{ url('/') }}/api/getDataFormColor?form_color="+form_color+"&sos_id="+sos_id)
        .then(response => response.json())
        .then(result => {
            console.log(result); 
            result.forEach(item => {
                let name_patient
                let admitted


                if (item.color_id == item.patient_id_1) {
                    name_patient = item.patient_name_1;
                    patient_vn = item.patient_vn_1;
                    patient_hn = item.patient_hn_1;
                    delivered_hospital = item.delivered_hospital_1
                } else if(item.color_id == item.patient_id_2) {
                    name_patient = item.patient_name_2;
                    patient_vn = item.patient_vn_2;
                    patient_hn = item.patient_hn_2;
                    delivered_hospital = item.delivered_hospital_2
                }else if(item.color_id == item.patient_id_3) {
                    name_patient = item.patient_name_3;
                    patient_vn = item.patient_vn_3;
                    patient_hn = item.patient_hn_3;
                    delivered_hospital = item.delivered_hospital_3
                }

                if (item.admitted == "Yes") {
                    admitted = "มีการรักษา";
                } else if(item.admitted == "No"){
                    admitted = "ไม่มีการรักษา";
                }else {
                    admitted = "ไม่ทราบ";
                }

                let cost = 0;
                let level = item.level_officer;
                let rc = item.rc;

                // คำนวณค่าใช้จ่ายตามการรักษาและระดับ
                if (item.treatment === "มีการรักษา") {
                    if (rc === "แดง(วิกฤติ)") {
                        switch (level) {
                            case "เฉพาะทาง":
                                cost = 1900;
                                break;
                            case "ALS":
                                cost = 1100;
                                break;
                            case "ILS":
                                cost = 750;
                                break;
                            case "BLS":
                                cost = 500;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    } else if (rc === "เหลือง(เร่งด่วน)") {
                        switch (level) {
                            case "ALS":
                                cost = 750;
                                break;
                            case "ILS":
                                cost = 500;
                                break;
                            case "BLS":
                                cost = 500;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    } else if (rc === "เขียว(ไม่รุนแรง)") {
                        switch (level) {
                            case "ALS":
                                cost = 350;
                                break;
                            case "ILS":
                                cost = 350;
                                break;
                            case "BLS":
                                cost = 350;
                                break;
                            case "FR":
                                cost = 350;
                                break;
                        }
                    }
                } else {
                    switch (level) {
                        case "ALS":
                            cost = 200;
                            break;
                        case "ILS":
                            cost = 150;
                            break;
                        case "BLS":
                            cost = 100;
                            break;
                        case "FR":
                            cost = 100;
                            break;
                    }
                }

                let totalData = 15;
                let nonEmptyDataCount = 0;

                // ตรวจสอบข้อมูลที่ไม่ว่าง
                if (item.name_title) nonEmptyDataCount++;
                if (name_patient) nonEmptyDataCount++;
                if (patient_vn) nonEmptyDataCount++;
                if (delivered_hospital) nonEmptyDataCount++;
                if (patient_hn) nonEmptyDataCount++;
                if (item.treatment_rights) nonEmptyDataCount++;
                if (item.er) nonEmptyDataCount++;
                if (item.admitted) nonEmptyDataCount++;
                if (item.time_create_sos) nonEmptyDataCount++;
                if (item.time_command) nonEmptyDataCount++;
                if (item.time_go_to_help) nonEmptyDataCount++;
                if (item.time_to_the_scene) nonEmptyDataCount++;
                if (item.time_leave_the_scene) nonEmptyDataCount++;
                if (item.time_hospital) nonEmptyDataCount++;
                if (item.time_to_the_operating_base) nonEmptyDataCount++;

                let percentage = Math.round(nonEmptyDataCount / totalData * 100);
                
                if (percentage == 100) {
                    bg_percentage  = 'bg-success';
                } else{
                    bg_percentage = 'bg-primary';
                }

                if (item.color_verified_status == "Yes") {
                    btn_edit = 'd-none';
                    btn_verrified = '';
                } else {
                    btn_edit = '';
                    btn_verrified = 'd-none';
                }
                data_color = `
                        <div class="card">
                            <div class="card-header" id="heading${item.color_id}_${item.sos_help_center_id}" style="width:600px">
                                <h5 class="mb-0">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse${item.color_id}_${item.sos_help_center_id}" aria-expanded="true" aria-controls="collapseOne">
                                            ข้อมูล  ${item.name_title ? item.name_title : 'ไม่มี'} ${name_patient ? name_patient : 'ไม่ระบุชื่อ'}
                                        </button>
                                    <div>
                                    <div>
                                        <a href="{{ url('/officer_edit_form/${item.sos_help_center_id}?color_form_id=${item.color_id}') }}" class="${btn_edit} float-end m-2 btn btn-primary">แก้ไข </a>

                                        <button class="btn btn-success float-end m-2 ${btn_verrified}" disabled>ยืนยันแล้ว</button>
                                    </div>
                                </h5>
                            </div>

                            <div id="collapse${item.color_id}_${item.sos_help_center_id}" class="collapse" aria-labelledby="headingOne"  style="width:600px"  data-parent="#sos_help_center_id_${item.sos_help_center_id}">
                                <div class="card-body">
                                    <p><strong>เลขที่ผู้ป่วย: </strong>เอามาจากไหนไม่รู้</p>
                                    <p><strong>ชื่อผู้ป่วย: ${item.name_title ? item.name_title : 'ไม่มี'} ${name_patient}</strong></p>
                                    <p><strong>นำส่ง ร.พ.: ${item.name_hospital ? item.name_hospital : 'ไม่มี'}</strong></p>
                                    <p><strong>HN: ${item.HN ? item.HN : 'ไม่มี'}</strong></p>
                                    <p><strong>ประเมิน ER: ${item.er ? item.er : 'ไม่มี'}</strong></p>
                                    <p><strong>ผลการรักษา: ${admitted} - ${item.treatment_effect ? item.treatment_effect : 'ไม่มี'}</strong></p>
                                    <p><strong>ประมาณการค่าตอบแทน: ${cost} </strong> บาท</p>
                                    <p><strong>%ความครบถ้วน: 1</strong>
                                        <div class="progress">
                                            <div class="progress-bar ${bg_percentage}" role="progressbar" style="width: ${percentage}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">${percentage}%</div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                `

                td_form_color.insertAdjacentHTML('beforeend', data_color);

            });
            
        });


    }
  
    function edit_form_officer(data) {
        // console.log(data);

        const sos_help_center_id = data.getAttribute("sos_help_center");
        const officer_edit_form_id = data.getAttribute("officer_edit_form");

        // console.log(sos_help_center_id);

        Swal.fire({
            title: "แก้ไขข้อมูล",
            icon: "warning",
            showConfirmButton: false,
            showCloseButton: true,
            html: `
      <p>โปรดเลือกข้อมูลที่ต้องการแก้ไข</p>
      <div>
        <a class="btn btn-primary" href="{{ url('/sos_help_center/${sos_help_center_id}/edit') }}">ข้อมูลสั่งการ</a>
        <a class="btn btn-info" href="{{ url('/officer_edit_form/${officer_edit_form_id}') }}">ข้อมูลผู้ป่วย</a>
        <button class="btn btn-secondary" onclick="swal.clickConfirm();">Cancel</button>
      </div>`
        });
    }

    function btn_verified_status(id, status) {
        console.log(id , status)
        Swal.fire({
            title: 'ต้องการยืนยันข้อมูลใช่หรือไม่?',
            text: "โปรดตรวจสอบความถูกต้องก่อนยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27c837',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน'
        }).then((result) => {
            let arr = {
                "form": 'yellow',
                "id": id,
                "status": status,
            };
            fetch("{{ url('/') }}/api/verified_status_form", {
                method: 'post',
                body: JSON.stringify(arr),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(function(response) {
                return response.json(); // เรียก .json() บน response
            }).then(function(data) {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: status + 'เรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    if (status == "ยืนยัน") {
                        document.querySelector("#btn_cancle_status_" + id).classList.remove('d-none');
                        document.querySelector("#btn_verified_status_" + id).classList.add('d-none');
                        document.querySelector("#badge_status_" + id).innerHTML = "ยืนยัน";
                        document.querySelector("#badge_status_" + id).classList.add('bg-success');
                        document.querySelector("#badge_status_" + id).classList.remove('bg-danger');
                        document.querySelector("#badge_status_" + id).classList.remove('bg-warning');

                    } else {
                        document.querySelector("#btn_cancle_status_" + id).classList.add('d-none');
                        document.querySelector("#btn_verified_status_" + id).classList.remove('d-none');
                        document.querySelector("#badge_status_" + id).innerHTML = "รอยืนยัน";
                        document.querySelector("#badge_status_" + id).classList.add('bg-danger');
                        document.querySelector("#badge_status_" + id).classList.remove('bg-success');

                        // document.querySelector("#btn_verified_status_" + id).disabled = false;

                    }
                }
            });
        })
    }
</script>
@endsection