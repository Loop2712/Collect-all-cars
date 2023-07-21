<!-- Modal -->
<div class="modal fade" id="modalOfficerFormYellow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <style>
                        #contentContainer {
                            overflow: hidden;
                            display: flex;
                            justify-content: center;
                        }

                        .slide-out {
                            animation: slideOut .5s ease 0s 1 normal forwards;
                        }

                        @keyframes slideOut {
                            0% {
                                opacity: 0;
                                transform: translateX(-50px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateX(0);
                            }
                        }

                        .slide-in {
                            animation: slideIn .5s ease 0s 1 normal forwards;
                        }

                        @keyframes slideIn {
                            0% {
                                opacity: 0;
                                transform: translateX(50px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateX(0);
                            }
                        }

                        #buttonContainer {
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        }


                        .card-input-element+.card {
                            height: calc(36px + 2*1rem);
                            -webkit-box-shadow: none;
                            box-shadow: none;
                            border: 2px solid transparent;
                            border-radius: 10px;
                        }

                        .card-input-element+.card:hover {
                            cursor: pointer;
                        }

                        .card-input-element:checked+.card {
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .card-input-element:checked+.card::after {
                            content: '\e5ca';
                            color: #AFB8EA;
                            font-family: 'Material Icons';
                            font-size: 24px;
                            -webkit-animation-name: fadeInCheckbox;
                            animation-name: fadeInCheckbox;
                            -webkit-animation-duration: .5s;
                            animation-duration: .5s;
                            -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                            animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                        }

                        .card-input-primary:checked+.card {
                            border: 2px solid #0d6efd !important;
                            background-color: #0d6efd !important;
                            color: #fff !important;
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .card-input-red:checked+.card {
                            border: 2px solid #db2d2e !important;
                            background-color: #db2d2e !important;
                            color: #fff !important;
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .card-input-success:checked+.card {
                            border: 2px solid #29cc39 !important;
                            background-color: #29cc39 !important;
                            color: #fff !important;
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .card-input-warning:checked+.card {
                            border: 2px solid #ffc30e !important;
                            background-color: #ffc30e !important;
                            color: #fff !important;
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .card-input-dark:checked+.card {
                            border: 2px solid #000 !important;
                            background-color: #000 !important;
                            color: #fff !important;
                            -webkit-transition: border .3s;
                            -o-transition: border .3s;
                            transition: border .3s;
                        }

                        .btnBack {
                            background-color: rgba(red, green, blue, 0);
                            color: #db2d2e;
                        }

                        .test {
                            opacity: 0;
                            padding: 0;
                            margin: -25px 0 0 0;
                        }

                        .btnAddPatient {
                            float: right !important;
                            padding: 8pt 15pt 7pt 7pt;
                            font-size: 12pt;
                            background-color: #2a915c;
                            color: #fff;
                            border-radius: .4rem;
                        }

                        .btnAddPatient i {
                            font-size: 10pt;
                        }

                        .cardTitle {
                            width: 100% !important;
                            display: flex !important;
                            justify-content: space-between;

                        }

                        .patientTitle {
                            display: flex;
                            align-items: center;
                        }

                        .btnDelPatient {
                            float: right !important;
                            padding: 8pt 12pt;
                            font-size: 12pt;
                            background-color: #db2d2e;
                            color: #fff;
                            border-radius: .4rem;
                        }

                        .field-user {
                            border: #000 1px solid;
                            display: block;
                            width: 100% !important;
                        }

                        .field-user legend {
                            font-size: 18px;
                            font-weight: bold;
                        }

                        .hidden {
                            display: none;
                        }
                    </style>
                    <div id="buttonContainer" class="row">
                        <div class="p-1 col-6">
                            <button class="btn py-5 w-100 btn-success" onclick="showContent('button1')">รหัสความรุนแรง ณ จุดเกิดเหตุ </button>
                        </div>
                        <div class="p-1 col-6 d-flex align-self-stretch">
                            <button class="btn py-5  w-100 btn-success" onclick="showContent('button2')">การปฏิบัติการ</button>
                        </div>
                        <div class="p-1 col-6">
                            <button class="btn py-5 w-100 btn-success" onclick="showContent('button3')">ชื่อผู้ป่วย</button>
                        </div>
                        <div class="p-1 col-6">
                            <button class="btn py-5 w-100 btn-success" onclick="showContent('button4')">เพิ่มเติม</button>
                        </div>
                    </div>


                    <div id="contentContainer" class="hidden">
                        <div id="button1Content" class="hidden" data-button="button1">
                            <h4 class="font-weight-bold">
                                <button class="btn btnBack " onclick="hideContent()"><i class="fa-regular fa-chevron-left"></i></button> รหัสความรุนแรง ณ จุดเกิดเหตุ
                            </h4>
                            <hr class="w-25">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="rc" data-rc="แดง(วิกฤติ)" value="แดง(วิกฤติ)" class="card-input-red card-input-element d-none">
                                        <div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
                                            <b>
                                                แดง(วิกฤติ)
                                            </b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="rc" data-rc="ขาว(ทั่วไป)" value="ขาว(ทั่วไป)" class="card-input-element card-input-primary d-none">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>
                                                ขาว(ทั่วไป)
                                            </b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="rc" data-rc="เหลือง(เร่งด่วน)" value="เหลือง(เร่งด่วน)" class="card-input-warning card-input-element d-none">
                                        <div class="card card-body  text-warning d-flex flex-row justify-content-between align-items-center">
                                            <b>
                                                เหลือง(เร่งด่วน)
                                            </b>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-12 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="rc" data-rc="เขียว(ไม่รุนแรง)" value="เขียว(ไม่รุนแรง)" class="card-input-success card-input-element d-none">
                                        <div class="card card-body  text-success d-flex flex-row justify-content-between align-items-center">
                                            <b>
                                                เขียว(ไม่รุนแรง)
                                            </b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="rc" data-rc="ดำ" id="rc_black" value="ดำ" class="card-input-dark card-input-element d-none">
                                        <div class="card card-body text-dark d-flex flex-row justify-content-between align-items-center">
                                            <b>
                                                <div class="input-wrapper-b-code inline">
                                                    <span>
                                                        ดำ <input name="rc_black_text" id="rc_black_text" size="10" style="border-radius: 5px;border: 1px solid dark; border-bottom: 1px dashed #ffffff;color:#000" class="form-control input_code_black  p-0 m-0" placeholder="ใส่รหัส" type="text" readonly>
                                                    </span>

                                                </div>
                                            </b>

                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="button2Content" class="hidden" data-button="button2">
                            <h4 class="font-weight-bold">
                                <button class="btn btnBack " onclick="hideContent()"><i class="fa-regular fa-chevron-left"></i></button> การปฏิบัติการ
                            </h4>
                            <div class="row">
                                <div class="w-100 col-12">
                                    <hr class="w-25">
                                    <p class="test">s</p>
                                </div>
                                <div class="col-6 ">
                                    <label>
                                        <input type="radio" name="treatmentOfficer" data-treatment="มีการรักษา" value="มีการรักษา" class="card-input-red card-input-element d-none" onchange="check_treatment(); reset_sub_treatment();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger">
                                            <b>
                                                มีการรักษา
                                            </b>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-6 ">
                                    <label>
                                        <input type="radio" name="treatmentOfficer" data-treatment="ไม่มีการรักษา" value="ไม่มีการรักษา" class="card-input-element card-input-primary d-none" onchange="check_treatment(); reset_sub_treatment();">
                                        <div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center">
                                            <b>
                                                ไม่มีการรักษา
                                            </b>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-12">
                                    <!-- -------------------------------------------   เคสมีการรักษา  ----------------------------------------------------- -->
                                    <div class="row d-none" id="treatment_officer_yes">
                                        <br><br><br>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="นำส่ง" value="นำส่ง" class="sub_treatment card-input-red card-input-element d-none">
                                                <div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        นำส่ง
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="ส่งต่อชุดปฏิบัติการระดับสูงกว่า" value="ส่งต่อชุดปฏิบัติการระดับสูงกว่า" class="sub_treatment card-input-red card-input-element d-none">
                                                <div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        ส่งต่อชุดปฏิบัติการระดับสูงกว่า
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" ame="sub_treatment" data-sub_treatment="ไม่นำส่ง" value="ไม่นำส่ง" class="sub_treatment card-input-red card-input-element d-none">
                                                <div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        ไม่นำส่ง
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="เสียชีวิตระหว่างนำส่ง" value="เสียชีวิตระหว่างนำส่ง" class="sub_treatment card-input-red card-input-element d-none">
                                                <div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        เสียชีวิตระหว่างนำส่ง
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="เสียชีวิต ณ จุดเกิดเหตุ" value="เสียชีวิต ณ จุดเกิดเหตุ" class="sub_treatment card-input-red card-input-element d-none">
                                                <div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        เสียชีวิต ณ จุดเกิดเหตุ
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- -------------------------------------------   เคส ไม่มี การรักษา  ----------------------------------------------------- -->
                                    <div class="row d-none" id="treatment_officer_no">
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="ผู้ป่วยปฏิเสธการรักษา" value="ผู้ป่วยปฏิเสธการรักษา" class="sub_treatment card-input-element card-input-primary d-none">
                                                <div class="card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        ผู้ป่วยปฏิเสธการรักษา
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="ยกเลิก" value="ยกเลิก" class="sub_treatment card-input-element card-input-primary d-none">
                                                <div class="card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        ยกเลิก
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="ไม่พบเหตุ" value="ไม่พบเหตุ" class="sub_treatment card-input-element card-input-primary d-none">
                                                <div class="card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        ไม่พบเหตุ
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="sub_treatmentOfficer" data-sub_treatment="เสียชีวิตก่อนชุดปฏิบัติการไปถึง" value="เสียชีวิตก่อนชุดปฏิบัติการไปถึง" class="sub_treatment card-input-element card-input-primary d-none">
                                                <div class="card card-body d-flex flex-row justify-content-between align-items-center">
                                                    <b>
                                                        เสียชีวิตก่อนชุดปฏิบัติการไปถึง
                                                    </b>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="button3Content" class="hidden" data-button="button3">
                            <h4 class="font-weight-bold">
                                <button class="btn btnBack " onclick="hideContent()"><i class="fa-regular fa-chevron-left"></i></button> การปฏิบัติการ
                            </h4>
                            <div class="col-12 d-block">
                                <button id="delete-btn" onclick="deleteFieldsets(); " class="btnDelPatient btn hidden">
                                    ลบ
                                </button>
                                <button id="add-btn" class="btn btnAddPatient" onclick="showFieldsets();">
                                    <i class="fa-solid fa-plus"></i> เพิ่มผู้ป่วย
                                </button>
                            </div>
                            <!-- ----------------------------------------------- ผู้ป่วย 1 ------------------------------------------------------------- -->
                            <fieldset id="fieldset1" class="rounded-3 p-3 field-user">
                                <legend class="float-none w-auto px-3">ผู้ป่วย ๑</legend>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="" class="form-label">ผู้ป่วย ๑. ชื่อ-สกุล</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_name_1" id="patient_name_1" value="{{ isset($data_form_yellow->patient_name_1) ? $data_form_yellow->patient_name_1 : ''}}" placeholder="ชื่อ-สกุล">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <label for="phone_user" class="form-label">อายุ (ปี)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
                                            <input type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_1" id="patient_age_1" value="{{ isset($data_form_yellow->patient_age_1) ? $data_form_yellow->patient_age_1 : ''}}" placeholder="อายุ">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">HN</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_hn_1" id="patient_hn_1" value="{{ isset($data_form_yellow->patient_hn_1) ? $data_form_yellow->patient_hn_1 : ''}}" placeholder="รหัสผู้ป่วย">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_vn_1" id="patient_vn_1" value="{{ isset($data_form_yellow->patient_vn_1) ? $data_form_yellow->patient_vn_1 : ''}}" placeholder="เลขประจำตัวประชาชน">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3"></div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_province_1" id="delivered_province_1" value="{{ isset($data_form_yellow->delivered_province_1) ? $data_form_yellow->delivered_province_1 : ''}}" placeholder="จังหวัดที่นำส่ง">
                                        </div>
                                    </div>
                                    <div class="ccol-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่ง รพ.</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_1" id="delivered_hospital_1" value="{{ isset($data_form_yellow->delivered_hospital_1) ? $data_form_yellow->delivered_hospital_1 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset id="fieldset2" class="hidden dataPatient rounded-3 p-3 field-user mt-4">
                                <legend class="float-none w-auto px-3">ผู้ป่วย ๒ </legend>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="" class="form-label">ผู้ป่วย ๒. ชื่อ-สกุล</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_name_2" id="patient_name_2" value="{{ isset($data_form_yellow->patient_name_2) ? $data_form_yellow->patient_name_2 : ''}}" placeholder="ชื่อ-สกุล">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <label for="phone_user" class="form-label">อายุ (ปี)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
                                            <input type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_2" id="patient_age_2" value="{{ isset($data_form_yellow->patient_age_2) ? $data_form_yellow->patient_age_2 : ''}}" placeholder="อายุ">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">HN</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_hn_2" id="patient_hn_2" value="{{ isset($data_form_yellow->patient_hn_2) ? $data_form_yellow->patient_hn_2 : ''}}" placeholder="รหัสผู้ป่วย">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_vn_2" id="patient_vn_2" value="{{ isset($data_form_yellow->patient_vn_2) ? $data_form_yellow->patient_vn_2 : ''}}" placeholder="เลขประจำตัวประชาชน">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3"></div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_province_2" id="delivered_province_2" value="{{ isset($data_form_yellow->delivered_province_2) ? $data_form_yellow->delivered_province_2 : ''}}" placeholder="จังหวัดที่นำส่ง">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่ง รพ.</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_2" id="delivered_hospital_2" value="{{ isset($data_form_yellow->delivered_hospital_2) ? $data_form_yellow->delivered_hospital_2 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset id="fieldset3" class="hidden dataPatient rounded-3 p-3 field-user mt-4">
                                <legend class="float-none w-auto px-3">ผู้ป่วย ๓</legend>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="" class="form-label">ผู้ป่วย ๓. ชื่อ-สกุล</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_name_3" id="patient_name_3" value="{{ isset($data_form_yellow->patient_name_3) ? $data_form_yellow->patient_name_3 : ''}}" placeholder="ชื่อ-สกุล">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <label for="phone_user" class="form-label">อายุ (ปี)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
                                            <input type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_3" id="patient_age_3" value="{{ isset($data_form_yellow->patient_age_3) ? $data_form_yellow->patient_age_3 : ''}}" placeholder="อายุ">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">HN</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_hn_3" id="patient_hn_3" value="{{ isset($data_form_yellow->patient_hn_3) ? $data_form_yellow->patient_hn_3 : ''}}" placeholder="รหัสผู้ป่วย">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="patient_vn_3" id="patient_vn_3" value="{{ isset($data_form_yellow->patient_vn_3) ? $data_form_yellow->patient_vn_3 : ''}}" placeholder="เลขประจำตัวประชาชน">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3"></div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_province_3" id="delivered_province_3" value="{{ isset($data_form_yellow->delivered_province_3) ? $data_form_yellow->delivered_province_3 : ''}}" placeholder="จังหวัดที่นำส่ง">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="phone_user" class="form-label">นำส่ง รพ.</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_3" id="delivered_hospital_3" value="{{ isset($data_form_yellow->delivered_hospital_3) ? $data_form_yellow->delivered_hospital_3 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <div class="row mt-4">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label m-0 h-3">
                                        <b>
                                            เกณฑ์การนำส่ง (เลือกได้มากกว่า ๑ ข้อ)
                                        </b>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="submission_criteria" data-submission_criteria="สามารถรักษาได้" value="สามารถรักษาได้" class="card-input-element card-input-primary d-none submission_criteria">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>สามารถรักษาได้</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="submission_criteria" data-submission_criteria="อยู่ใกล้" value="อยู่ใกล้" class="card-input-element card-input-primary d-none submission_criteria">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>อยู่ใกล้</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="submission_criteria" data-submission_criteria="มีหลักประกัน" value="มีหลักประกัน" class="card-input-element card-input-primary d-none submission_criteria">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>มีหลักประกัน</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="submission_criteria" data-submission_criteria="ผู้ป่วยเก่า" value="ผู้ป่วยเก่า" class="card-input-element card-input-primary d-none submission_criteria">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>ผู้ป่วยเก่า</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="submission_criteria" data-submission_criteria="เป็นความประสงค์" value="เป็นความประสงค์" class="card-input-element card-input-primary d-none submission_criteria">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>เป็นความประสงค์</b>
                                        </div>
                                    </label>
                                </div>
                            </div>


                            <div class="row mt-2">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label m-0 h-3">
                                        <b>
                                            การติดต่อสื่อสารกับ รพ.ที่นำส่ง
                                        </b>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="communication_hospital" data-communication_hospital="แจ้งวิทยุ" value="แจ้งวิทยุ" class="card-input-element card-input-primary d-none communication_hospital">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>แจ้งวิทยุ</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="communication_hospital" data-communication_hospital="แจ้งทางโทรศัพท์" value="แจ้งทางโทรศัพท์" class="card-input-element card-input-primary d-none communication_hospital">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>แจ้งทางโทรศัพท์</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="checkbox" name="communication_hospital" data-communication_hospital="ไม่ได้แจ้ง" value="ไม่ได้แจ้ง" class="card-input-element card-input-primary d-none communication_hospital">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>ไม่ได้แจ้ง</b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="button4Content" class="hidden" data-button="button4">
                            <h4 class="font-weight-bold">
                                <button class="btn btnBack " onclick="hideContent()"><i class="fa-regular fa-chevron-left"></i></button> เพิ่มเติม
                            </h4>
                            <hr class="w-25">
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4">
                                    <label for="registration_category" class="form-label font-weight-bold">ทะเบียนรถหมวด</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-cars"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="registration_category" name="registration_category" value="{{ isset($data_form_yellow->registration_category) ? $data_form_yellow->registration_category : ''}}" placeholder="ทะเบียนรถหมวด">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-2">
                                    <label for="registration_number" class="form-label  font-weight-bold">เลขทะเบียน</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-input-numeric"></i></span>
                                        <input type="text" min="1" class="form-control border-start-0 radius-2" id="registration_number" name="registration_number" value="{{ isset($data_form_yellow->registration_number) ? $data_form_yellow->registration_number : ''}}" placeholder="เลขทะเบียน">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-2">
                                    <label for="registration_province" class="form-label  font-weight-bold">จังหวัด</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-map-location"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="registration_province" name="registration_province" value="{{ isset($data_form_yellow->registration_province) ? $data_form_yellow->registration_province : ''}}" placeholder="จังหวัด">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label m-0 h-3 font-weight-bold">
                                        เจ้าของ
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="owner_registration" data-owner_registration="ของผู้ประสบเหตุ" value="ของผู้ประสบเหตุ" class="card-input-primary card-input-element d-none">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>ของผู้ประสบเหตุ</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="owner_registration" data-owner_registration="ของคู่กรณี" value="ของคู่กรณี" class="card-input-primary card-input-element d-none">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>ของคู่กรณี</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 m-0 col-md-3 col-lg-3">
                                    <label>
                                        <input type="radio" name="owner_registration" data-owner_registration="ไม่สามารถระบุได้" value="ไม่สามารถระบุได้" class="card-input-primary card-input-element d-none">
                                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            <b>ไม่สามารถระบุได้</b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    function check_data_form_yellow_show_case() {

                        // console.log("check_data_form_yellow_show_case");
                        // ---------------------------- เช็คข้อมูลก่อนอัพเดท ----------------------------//
                        fetch("{{ url('/') }}/api/check_data_form_yellow_show_case/" + "?sos_id=" + '{{ $data_sos->id }}')
                            .then(response => response.json())
                            .then(result => {
                                //  INPUT RC
                                const rcInputs = document.querySelectorAll('input[name="rc"]');
                                setCheckedInputs(rcInputs, result.rc);
                                document.querySelector('#rc_black_text').value = result.rc_black_text;
                                //  INPUT RC

                                //  INPUT treatment 
                                /////////////////////////////
                                // อย่าลืมแก้ไขชื่อ treatmenta //
                                ////////////////////////////
                                const treatmentInputs = document.querySelectorAll('input[name="treatmentOfficer"]');
                                setCheckedInputs(treatmentInputs, result.treatment);
                                check_treatment();
                                //  INPUT treatment

                                //  INPUT sub_treatment 
                                const sub_treatment_checkboxInputs = document.querySelectorAll('input[name="sub_treatmentOfficer"]');
                                setCheckedInputs(sub_treatment_checkboxInputs, result.sub_treatment);
                                //  INPUT sub_treatment 


                                for (let i = 1; i <= 3; i++) {
                                    const patientNameInput = document.querySelector(`#patient_name_${i}`).value = result[`patient_name_${i}`];
                                    const patientAgeInput = document.querySelector(`#patient_age_${i}`).value = result[`patient_age_${i}`];
                                    const patientHNInput = document.querySelector(`#patient_hn_${i}`).value = result[`patient_hn_${i}`];
                                    const patientVNInput = document.querySelector(`#patient_vn_${i}`).value = result[`patient_vn_${i}`];
                                    const deliveredProvinceInput = document.querySelector(`#delivered_province_${i}`).value = result[`delivered_province_${i}`];
                                    const deliveredHospitalInput = document.querySelector(`#delivered_hospital_${i}`).value = result[`delivered_hospital_${i}`];
                                    // console.log(i);

                                    if (result[`patient_name_${i}`] || result[`patient_age_${i}`] || result[`patient_hn_${i}`] || result[`patient_vn_${i}`] || result[`delivered_province_${i}`] || result[`delivered_hospital_${i}`]) {
                                        if (i >= 2) {
                                            // console.log("มีข้อมูล" + i);
                                            document.getElementById(`fieldset${i}`).classList.remove('hidden');
                                            document.getElementById('delete-btn').classList.remove('hidden');
                                            document.getElementById('add-btn').classList.remove('hidden');

                                            if (i === 3) {
                                                document.getElementById('add-btn').classList.add('hidden');
                                            }
                                        }
                                    }

                                }

                                //  INPUT submission_criteria 
                                const submission_criteria_checkboxInputs = document.querySelectorAll('input[name="submission_criteria"]');
                                setCheckedInputs(submission_criteria_checkboxInputs, result.submission_criteria);
                                //  INPUT submission_criteria 

                                //  INPUT communication_hospital 
                                const communication_hospital_checkboxInputs = document.querySelectorAll('input[name="communication_hospital"]');
                                setCheckedInputs(communication_hospital_checkboxInputs, result.communication_hospital);
                                //  INPUT communication_hospital 




                                document.querySelector('#registration_category').value = result.registration_category;
                                document.querySelector('#registration_number').value = result.registration_number;
                                document.querySelector('#registration_province').value = result.registration_province;
                                //  INPUT owner_registration 
                                const owner_registration_checkboxInputs = document.querySelectorAll('input[name="owner_registration"]');
                                setCheckedInputs(owner_registration_checkboxInputs, result.owner_registration);
                                //  INPUT owner_registration 

                            });
                    }
                </script>




                <script>
                    // ตรวจจับการเปลี่ยนแปลงในฟิลด์และส่งข้อมูลไปยัง Controller
                    document.querySelectorAll('input[name="rc"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.querySelectorAll('input[name="treatmentOfficer"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.querySelectorAll('input[name="sub_treatmentOfficer"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.querySelectorAll('fieldset').forEach(fieldset => {
                        fieldset.addEventListener('input', officer_save_data_form_yellow);
                    });
                    document.querySelectorAll('input[name="submission_criteria"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.querySelectorAll('input[name="communication_hospital"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.getElementById('registration_category').addEventListener('input', officer_save_data_form_yellow);
                    document.getElementById('registration_number').addEventListener('input', officer_save_data_form_yellow);
                    document.getElementById('registration_province').addEventListener('input', officer_save_data_form_yellow);
                    document.querySelectorAll('input[name="owner_registration"]').forEach(input => input.addEventListener('change', officer_save_data_form_yellow));
                    document.getElementById('rc_black_text').addEventListener('input', officer_save_data_form_yellow);

                    function officer_save_data_form_yellow() {
                        // console.log("{{ $data_sos->id }}");
                        let rcElement = document.querySelector('input[name="rc"]:checked');
                        let rc = rcElement ? rcElement.value : '';

                        if (rc === "ดำ") {
                            document.querySelector('#rc_black_text').readOnly = false;
                        } else {
                            document.querySelector('#rc_black_text').readOnly = true;
                            document.querySelector('#rc_black_text').value = null;
                        }


                        let treatmentElement = document.querySelector('input[name="treatmentOfficer"]:checked');
                        let treatment = treatmentElement ? treatmentElement.value : '';

                        let sub_treatmentElements = Array.from(document.querySelectorAll('input[name="sub_treatmentOfficer"]:checked'));
                        let sub_treatment = sub_treatmentElements.map(input => input.value);

                        let submission_criteriaElements = Array.from(document.querySelectorAll('input[name="submission_criteria"]:checked'));
                        let submission_criteria = submission_criteriaElements.map(input => input.value);

                        let communication_hospitalElements = Array.from(document.querySelectorAll('input[name="communication_hospital"]:checked'));
                        let communication_hospital = communication_hospitalElements.map(input => input.value);

                        let registration_category = document.getElementById('registration_category') ? document.getElementById('registration_category').value : '';

                        let registration_number = document.getElementById('registration_number') ? document.getElementById('registration_number').value : '';

                        let registration_province = document.getElementById('registration_province') ? document.getElementById('registration_province').value : '';

                        let owner_registrationElement = document.querySelector('input[name="owner_registration"]:checked');
                        let owner_registration = owner_registrationElement ? owner_registrationElement.value : '';

                        let rc_black_text = document.getElementById('rc_black_text') ? document.getElementById('rc_black_text').value : '';



                        const nameInfields = [
                            'patient_name_1',
                            'patient_age_1',
                            'patient_hn_1',
                            'patient_vn_1',
                            'delivered_province_1',
                            'delivered_hospital_1',
                            'patient_name_2',
                            'patient_age_2',
                            'patient_hn_2',
                            'patient_vn_2',
                            'delivered_province_2',
                            'delivered_hospital_2',
                            'patient_name_3',
                            'patient_age_3',
                            'patient_hn_3',
                            'patient_vn_3',
                            'delivered_province_3',
                            'delivered_hospital_3',
                        ];

                        // สร้างออบเจกต์เพื่อเก็บข้อมูล
                        const dataInFields = {};

                        // วนลูปเพื่อดึงข้อมูลจากฟิลด์และเก็บไว้ในออบเจกต์ formData
                        nameInfields.forEach(field => {
                            dataInFields[field] = document.getElementById(field).value;
                        });



                        let data_arr = {
                            "sos_id": "{{ $data_sos->id }}",
                            "rc": rc,
                            "treatment": treatment,
                            "sub_treatment": sub_treatment,
                            "submission_criteria": submission_criteria,
                            "communication_hospital": communication_hospital,
                            "registration_category": registration_category,
                            "registration_number": registration_number,
                            "registration_province": registration_province,
                            "owner_registration": owner_registration,
                            "rc_black_text": rc_black_text,

                        };
                        // เพิ่มข้อมูลจาก fields เข้าใน data_arr
                        data_arr = {
                            ...data_arr,
                            ...dataInFields
                        };

                        fetch("{{ url('/') }}/api/officerSaveFormYellow", {
                            method: 'post',
                            body: JSON.stringify(data_arr),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(function(response) {
                            return response.json();
                        }).then(function(data) {
                            console.log(data);
                        }).catch(function(error) {
                            // console.error(error);
                        });
                    }
                </script>



                <script>
                    function setCheckedInputs(inputs, values) {
                        if (!Array.isArray(inputs) || !Array.isArray(values) || inputs.length === 0) {
                            console.error('Inputs must be a non-empty array.');
                            return;
                        }

                        inputs.forEach(input => {
                            if (!(input instanceof Element)) {
                                console.error('Input element is not valid.');
                                return;
                            }

                            input.checked = values.includes(input.value);
                        });
                    }

                    function showContent(buttonId) {
                        var buttonContainer = document.getElementById('buttonContainer');
                        var contentContainer = document.getElementById('contentContainer');
                        var buttonContent = document.getElementById(buttonId + 'Content');

                        buttonContainer.style.display = 'none';
                        contentContainer.style.display = 'flex';
                        contentContainer.classList.add('slide-in');

                        // ซ่อนทุก <div> ที่เป็นเนื้อหาของปุ่มทั้งหมด
                        var contentDivs = document.querySelectorAll('[data-button]');
                        contentDivs.forEach(function(div) {
                            if (div.getAttribute('data-button') !== buttonId) {
                                div.classList.add('hidden');
                            }
                        });

                        buttonContent.classList.remove('hidden');
                    }

                    function hideContent() {
                        var buttonContainer = document.getElementById('buttonContainer');
                        var contentContainer = document.getElementById('contentContainer');

                        buttonContainer.style.display = 'flex';
                        buttonContainer.classList.add('slide-out');

                        contentContainer.style.display = 'none';
                    }

                    function check_treatment() {
                        /////////////////////////////
                        // อย่าลืมแก้ไขชื่อ treatmenta //
                        ////////////////////////////
                        var check_treatment = document.getElementsByName('treatmentOfficer');
                        // เช็คช่อง input ว่าเลือกมีการรักษาหรือไม่
                        for (var i = 0, length = check_treatment.length; i < length; i++) {
                            if (check_treatment[i].checked) {
                                if (check_treatment[i].value == "มีการรักษา") {
                                    document.querySelector('#treatment_officer_no').classList.add('d-none');
                                    document.querySelector('#treatment_officer_yes').classList.remove('d-none');
                                    document.querySelector('#treatment_officer_yes').classList.add('show-data');
                                } else {
                                    document.querySelector('#treatment_officer_yes').classList.add('d-none');
                                    document.querySelector('#treatment_officer_no').classList.remove('d-none');
                                    document.querySelector('#treatment_officer_no').classList.add('show-data');
                                }

                                break;
                            }
                        }


                    }

                    function reset_sub_treatment() {
                        var clist = document.getElementsByName('sub_treatmentOfficer');

                        for (var i = 0, length = clist.length; i < length; i++) {
                            if (clist[i].checked) {

                                clist[i].checked = false;

                            }
                        }

                    }
                </script>

                <script>
                    function showFieldsets() {
                        var addBtn = document.getElementById('add-btn');
                        var deleteBtn = document.getElementById('delete-btn');
                        var fieldset2 = document.getElementById('fieldset2');
                        var fieldset3 = document.getElementById('fieldset3');

                        if (fieldset2.classList.contains('hidden')) {
                            fieldset2.classList.remove('hidden');
                            deleteBtn.classList.remove('hidden');
                            addBtn.classList.remove('hidden');
                        } else if (fieldset3.classList.contains('hidden')) {
                            fieldset3.classList.remove('hidden');
                            deleteBtn.classList.remove('hidden');
                            addBtn.classList.add('hidden');
                        }
                    }


                    function deleteFieldsets() {
                        var addBtn = document.getElementById('add-btn');
                        var deleteBtn = document.getElementById('delete-btn');
                        var fieldset2 = document.getElementById('fieldset2');
                        var fieldset3 = document.getElementById('fieldset3');

                        if (!fieldset3.classList.contains('hidden')) {
                            let patient_name_3 = document.getElementById('patient_name_3');
                            let patient_age_3 = document.getElementById('patient_age_3');
                            let patient_hn_3 = document.getElementById('patient_hn_3');
                            let patient_vn_3 = document.getElementById('patient_vn_3');
                            let delivered_province_3 = document.getElementById('delivered_province_3');
                            let delivered_hospital_3 = document.getElementById('delivered_hospital_3');
                            if (patient_name_3.value !== '' || patient_age_3.value !== '' || patient_hn_3.value !== '' || patient_vn_3.value !== '' || delivered_province_3.value !== '' || delivered_hospital_3.value !== '') {
                                if (confirm('ผู้ป่วย ๓ มีข้อมูลอยู่ต้องการลบใช่หรือไม่?')) {
                                    fieldset3.classList.add('hidden');
                                    patient_name_3.value = '';
                                    patient_age_3.value = '';
                                    patient_hn_3.value = '';
                                    patient_vn_3.value = '';
                                    delivered_province_3.value = '';
                                    delivered_hospital_3.value = '';
                                }
                            } else {
                                fieldset3.classList.add('hidden');
                            }

                            // if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
                            //   deleteBtn.classList.add('hidden');
                            //   addBtn.classList.remove('hidden');
                            // }

                            if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
                                addBtn.classList.remove('hidden');
                                deleteBtn.classList.add('hidden');
                            } else if (fieldset3.classList.contains('hidden')) {
                                deleteBtn.classList.remove('hidden');
                                addBtn.classList.remove('hidden');
                            }


                            return;
                        }

                        if (!fieldset2.classList.contains('hidden')) {
                            let patient_name_2 = document.getElementById('patient_name_2');
                            let patient_age_2 = document.getElementById('patient_age_2');
                            let patient_hn_2 = document.getElementById('patient_hn_2');
                            let patient_vn_2 = document.getElementById('patient_vn_2');
                            let delivered_province_2 = document.getElementById('delivered_province_2');
                            let delivered_hospital_2 = document.getElementById('delivered_hospital_2');

                            if (patient_name_2.value !== '' || patient_age_2.value !== '' || patient_hn_2.value !== '' || patient_vn_2.value !== '' || delivered_province_2.value !== '' || delivered_hospital_2.value !== '') {
                                if (confirm('ผู้ป่วย ๒ มีข้อมูลอยู่ต้องการลบใช่หรือไม่?')) {
                                    fieldset2.classList.add('hidden');
                                    patient_name_2.value = '';
                                    patient_age_2.value = '';
                                    patient_hn_2.value = '';
                                    patient_vn_2.value = '';
                                    delivered_province_2.value = '';
                                    delivered_hospital_2.value = '';
                                }
                            } else {
                                fieldset2.classList.add('hidden');
                            }

                            if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
                                deleteBtn.classList.add('hidden');
                                addBtn.classList.remove('hidden');
                            } else if (fieldset3.classList.contains('hidden')) {
                                addBtn.classList.remove('hidden');
                            }

                            return;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>



<style>
    .ask_more_header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #input-section .inputCreateGroup {
        outline: #000 3px dotted;
        display: block;
        padding: 10px;
        margin-top: 10px;
        border-radius: 10px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modalAskMore" tabindex="-1" role="dialog" aria-labelledby="modalAskMoreTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="ask_more_header">
                    <h4>ขอหน่วยปฎิบัติการเพิ่ม </h4>
                    <button class="btn btn-success" onclick="addInputField()"><i class="fa-solid fa-plus"></i></button>
                </div>
                <form id="form">
                    <div id="input-section"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="validateForm()">ยืนยัน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    let inputCount = 1;

    function addInputField() {
        const inputSection = document.getElementById('input-section');

        const inputContainer = document.createElement('div');
        inputContainer.classList.add('input-container');

        inputContainer.innerHTML = `
  <div class="inputCreateGroup">
    <select name="vehicle_${inputCount}" class="form-select mb-3" aria-label="Default select example" required>
        <option selected="" value="">โปรดเลือกยานพาหนะ<small class="text-danger">*</small></option>
        <option value="รถยนต์">รถยนต์</option>
        <option value="อากาศยานต์">อากาศยานต์</option>
        <option value="เรือป.1">เรือป.1</option>
        <option value="เรือป.2">เรือป.2</option>
        <option value="เรือป.3">เรือป.3</option>
        <option value="เรืออื่นๆ">เรืออื่นๆ</option>
    </select>

    <select name="rc_vehicle_${inputCount}" class="form-select mb-3" aria-label="Default select example" required>
        <option selected="" value="{{ $data_sos->form_yellow->rc }}">{{ $data_sos->form_yellow->rc }}</option>
        <option value="แดง(วิกฤติ)">แดง(วิกฤติ)</option>
        <option value="ขาว(ทั่วไป)">ขาว(ทั่วไป)</option>
        <option value="เหลือง(เร่งด่วน)">เหลือง(เร่งด่วน)</option>
        <option value="เขียว(ไม่รุนแรง)">เขียว(ไม่รุนแรง)</option>
        <option value="ดำ">ดำ</option>
    </select>


    <div class="row mt-3">
    <div class="col-12 m-0">จำนวน<small class="text-danger">*</small></div>
    <div class="col-4">
  <label>
    <input type="radio" name="amount_vehicle_${inputCount}" value="1" class="card-input-element card-input-primary d-none" required>
    <div class="h-75 card card-body bg-light d-flex flex-row justify-content-between align-items-center">
      <b>
        1
      </b>
    </div>
  </label>
</div>
<div class="col-4">
  <label>
    <input type="radio" name="amount_vehicle_${inputCount}" value="2" class="card-input-element card-input-primary d-none">
    <div class="h-75 card card-body bg-light d-flex flex-row justify-content-between align-items-center">
      <b>
        2
      </b>
    </div>
  </label>
</div>
<div class="col-4">
  <label>
    <input type="radio" name="amount_vehicle_${inputCount}" value="other" class="card-input-element card-input-primary d-none">
    <div class="h-75 card card-body bg-light d-flex flex-row justify-content-between align-items-center">
      <b>
        เพิ่ม
      </b>
    </div>
  </label>
</div>
<div class="col-12">
<input type="text" name="input_amount_vehicle${inputCount}" class="form-control mb-2 hidden value=""   placeholder="กรอกจำนวนที่ต้องการ">
</div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-danger " onclick="removeInputField(this)"> ลบ</button> 
    </div>
  </div>`;
        const inputText = inputContainer.querySelector('input[type="text"]');
        const radioButtons = inputContainer.querySelectorAll('input[type="radio"]');

        // ใช้ฟังก์ชัน onChange ในการตรวจสอบเมื่อมีการคลิกที่ radio buttons
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', () => {
                if (radioButton.value === 'other') {
                    inputText.style.display = 'block';
                    inputText.required = true;

                } else {
                    inputText.style.display = 'none';
                    inputText.value = '';
                    inputText.required = false;

                }
            });
        });

        inputSection.appendChild(inputContainer);

        inputCount++;

    }

    function removeInputField(button) {
        const inputSection = document.getElementById('input-section');
        const inputContainer = button.closest('.input-container');
        inputCount--;
        inputSection.removeChild(inputContainer);


    }

    function validateForm() {
        const form = document.getElementById('form');
        const inputs = form.querySelectorAll('input[required], select[required]');

        let isFormValid = true;
        inputs.forEach(input => {
            if (input.type === 'radio') {
                const radioGroup = form.querySelector(`input[name="${input.name}"]:checked`);
                if (!radioGroup) {
                    isFormValid = false;
                }
            } else {
                if (!input.value.trim()) {
                    isFormValid = false;
                }
            }
        });

        if (isFormValid) {
            submitForm();
        } else {
            alert('กรุณากรอกข้อมูลให้ครบทุกช่องที่มีเครื่องหมาย *');
        }
    }






    // ฟังก์ชันสำหรับแสดงค่าที่กรอกใน input type text ลงในคอนโซล (console)
    function submitForm() {
        const formInputs = document.querySelectorAll('select[name^="vehicle_"], select[name^="rc_vehicle_"], input[name^="amount_vehicle_"], input[name^="input_amount_vehicle"]');
        const formData = {};

        formData['sos_id'] = '{{$data_sos->id}}';

        formInputs.forEach(input => {
            if (input.type === 'radio') {
                if (input.checked) {
                    formData[input.name] = input.value;
                    if (input.value === 'other') {
                        const inputText = document.querySelector(`input[name="input_amount_vehicle${input.name.slice(-1)}"]`);
                        if (inputText !== null) {
                            let correspondingAmountInput = document.querySelector(`input[name="${input.name}"]`);
                            formData[correspondingAmountInput.name] = inputText.value;

                        }
                    }
                }
            } else {
                formData[input.name] = input.value;
            }
        });

        // console.log(formData);

        fetch("{{ url('/') }}/api/officerAskMore", {
            method: 'post',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            console.log(data);
        }).catch(function(error) {
            // console.error(error);
        });
    }
</script>