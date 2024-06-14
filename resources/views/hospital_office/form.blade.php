

    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="code_9_digit" class="form-label">รหัส 9 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_9_digit" type="text" id="code_9_digit" minlength="9" maxlength="9" value="{{ isset($hospital_office->code_9_digit) ? $hospital_office->code_9_digit : ''}}" >
    </div>

    <div class="col-12 col-md-3">
        <label style="font-weight: bold;" for="code_5_digit" class="form-label">รหัส 5 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_5_digit" type="text" id="code_5_digit" minlength="5" maxlength="5" value="{{ isset($hospital_office->code_5_digit) ? $hospital_office->code_5_digit : ''}}" >

    </div>

    <div class="col-12 col-md-5">
        <label style="font-weight: bold;" for="code_11_digit" class="form-label">เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_11_digit" type="text" id="code_11_digit" minlength="11" maxlength="11" value="{{ isset($hospital_office->code_11_digit) ? $hospital_office->code_11_digit : ''}}" >
    </div>

    <div class="col-12 col-md-8">
        <label style="font-weight: bold;" for="name" class="form-label">ชื่อ <span class="text-danger">*</span></label>
        <input required class="form-control" name="name" type="text" id="name" value="{{ isset($hospital_office->name) ? $hospital_office->name : ''}}" >
    </div>

    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="organization_type" class="form-label">ประเภทองค์กร <span class="text-danger">*</span></label>
        <select required name="organization_type" class="notranslate form-control select-form" id="organization_type">
            <option class="translate" value="" {{ !isset($hospital_office->organization_type) ? 'selected' : '' }}> - เลือกประเภทองค์กร - </option>
            <option class="translate" value="รัฐบาล" {{ (isset($hospital_office->organization_type) && $hospital_office->organization_type == 'รัฐบาล') ? 'selected' : '' }}>รัฐบาล</option>
            <option class="translate" value="เอกชน" {{ (isset($hospital_office->organization_type) && $hospital_office->organization_type == 'เอกชน') ? 'selected' : '' }}>เอกชน</option>
        </select>
    </div>

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="affiliation" class="form-label">สังกัด <span class="text-danger">*</span></label>
        <input class="form-control" list="list_affiliation" name="affiliation" value="{{ isset($hospital_office->affiliation) ? $hospital_office->affiliation : ''}}">
        <datalist id="list_affiliation">

        </datalist>
    </div>

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="service_area" class="form-label">เขตบริการ <span class="text-danger">*</span></label>
        <input class="form-control" list="list_service_area" name="service_area" value="{{ isset($hospital_office->service_area) ? $hospital_office->service_area : ''}}">
        <datalist id="list_service_area">

        </datalist>
    </div>

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="department" class="form-label">แผนก/กรม</label>
        <input class="form-control" list="list_department" name="department" value="{{ isset($hospital_office->department) ? $hospital_office->department : ''}}">
        <datalist id="list_department">

        </datalist>
    </div>

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="health_type" class="form-label">ประเภทหน่วยบริการสุขภาพ</label>
        <input class="form-control" list="list_health_type" name="health_type" value="{{ isset($hospital_office->health_type) ? $hospital_office->health_type : ''}}">
        <datalist id="list_health_type">

        </datalist>
    </div>

    @php
        $date_now = now()->format('m/d/Y');

         // ตรวจสอบและแปลงรูปแบบวันที่ก่อตั้ง
        $founding_date = $hospital_office->founding_date ?? null;
        $formatted_founding_date = '';
        if ($founding_date) {
            $date1 = DateTime::createFromFormat('d/m/Y', $founding_date);
            if ($date1) {
                $formatted_founding_date = $date1->format('Y-m-d');
            }
        }

        // ตรวจสอบและแปลงรูปแบบวันที่ปิดบริการ
        $closing_date = $hospital_office->closing_date ?? null;
        $formatted_closing_date = '';
        if ($closing_date) {
            $date2 = DateTime::createFromFormat('d/m/Y', $closing_date);
            if ($date2) {
                $formatted_closing_date = $date2->format('Y-m-d');
            }
        }

    @endphp

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="founding_date" class="form-label">วันที่ก่อตั้ง (Ex. เดือน/วัน/ปี -> {{$date_now}})</label>
        <input class="form-control" name="founding_date" type="date" id="founding_date" value="{{ isset($hospital_office->founding_date) ? $formatted_founding_date : ''}}">
    </div>

    <div class="col-12 col-md-6">
        <label style="font-weight: bold;" for="closing_date" class="form-label">วันที่ปิดบริการ (Ex. เดือน/วัน/ปี -> {{$date_now}})</label>
        <input class="form-control" name="closing_date" type="date" id="closing_date" value="{{ isset($hospital_office->closing_date) ? $formatted_closing_date : ''}}">
    </div>

    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="actual_bed" class="form-label">เตียงที่ใช้จริง</label>
        <input class="form-control" name="actual_bed" type="text" id="actual_bed" value="{{ isset($hospital_office->actual_bed) ? $hospital_office->actual_bed : ''}}" >
    </div>

    {{-- แก้เป็น dropdown --}}
    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="usage_status" class="form-label">สถานะการใช้งาน</label>
        <select name="usage_status" class="notranslate form-control select-form" id="usage_status_input">
            <option class="translate" value="" {{ !isset($hospital_office->usage_status) ? 'selected' : '' }}> - เลือกสถานะ - </option>
            <option class="translate" value="กำลังใช้งาน" {{ (isset($hospital_office->usage_status) && $hospital_office->usage_status == 'กำลังใช้งาน') ? 'selected' : '' }}>กำลังใช้งาน</option>
            <option class="translate" value="ปิดการใช้งาน" {{ (isset($hospital_office->usage_status) && $hospital_office->usage_status == 'ปิดการใช้งาน') ? 'selected' : '' }}>ปิดการใช้งาน</option>
        </select>
    </div>

    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="server" class="form-label">แม่ข่าย</label>
        <input class="form-control" name="server" type="text" id="server" value="{{ isset($hospital_office->server) ? $hospital_office->server : ''}}" >
    </div>

    <hr style="margin-top: 3rem;">

    <!-- จังหวัด -->
    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
        <select required name="province" class="notranslate form-control select-form" id="province_input" >
            <option class="translate" value="{{ Auth::user()->sub_organization}}" selected>{{ Auth::user()->sub_organization}}</option>
        </select>
    </div>
    <!-- อำเภอ -->
    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
        <select required name="district" class="notranslate form-control select-form" id="district_input" onchange="show_location_T('handle');" value="{{ isset($hospital_office->district) ? $hospital_office->district : ''}}">
            <option class="translate" value="" selected> - เลือกอำเภอ - </option>
        </select>
    </div>
    <!-- ตำบล -->
    <div class="col-12 col-md-4">
        <label style="font-weight: bold;" for="sub_district" class="form-label">ตำบล <span class="text-danger">*</span></label>
        <select required name="sub_district" class="notranslate form-control select-form" id="sub_district_input" value="{{ isset($hospital_office->sub_district) ? $hospital_office->sub_district : ''}}">
            <option class="translate" value="" selected> - เลือกตำบล - </option>
        </select>
    </div>

    <div class="col-12 col-md-12">
        <label style="font-weight: bold;" for="address" class="form-label">ที่อยู่ <span class="text-danger">*</span></label>
        <input required class="form-control" name="address" type="detail" id="address" value="{{ isset($hospital_office->address) ? $hospital_office->address : ''}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="col-12 col-md-3">
        <label style="font-weight: bold;" for="village" class="form-label">หมู่</label>
        <input class="form-control" name="village" type="text" id="village" value="{{ isset($hospital_office->village) ? $hospital_office->village : ''}}" >
    </div>

    <div class="col-12 col-md-3">
        <label style="font-weight: bold;" for="zip_code" class="form-label">รหัสไปรษณีย์</label>
        <input class="form-control" name="zip_code" type="text" id="zip_code" value="{{ isset($hospital_office->zip_code) ? $hospital_office->zip_code : ''}}" >
    </div>


    <div class="col-12 col-md-3">
        <label style="font-weight: bold;" for="lat" class="form-label">Lat(Latitude)</label>
        <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($hospital_office->lat) ? $hospital_office->lat : ''}}" >
    </div>
    <div class="col-12 col-md-3">
        <label style="font-weight: bold;" for="lng" class="form-label">Lng(Longtitude)</label>
        <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($hospital_office->lng) ? $hospital_office->lng : ''}}" >
    </div>

    <hr style="margin-top: 3rem;">

    <div class="form-group">
        <input class="btn btn-success float-end" style="width: 130px" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
    </div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        dropdown_data();
        show_location_A();

        var foundingDateInput = document.getElementById('founding_date');
        var closingDateInput = document.getElementById('closing_date');

        document.getElementById('founding_date').addEventListener('click', function() {
            this.showPicker();
        });

        document.getElementById('closing_date').addEventListener('click', function() {
            this.showPicker();
        });
    });

    function show_location_A(){
        let location_P = document.querySelector("#province_input");

        // ตัวอย่างการกำหนดค่า selectedDistrict จากข้อมูลที่ดึงมาจากฐานข้อมูล
        let selectedDistrict = "{{ isset($hospital_office->district) ? $hospital_office->district : '' }}";

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#district_input");
                    location_A.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = " - เลือกอำเภอ - ";
                    option_start_A.value = "";
                    location_A.add(option_start_A);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;

                    // ตรวจสอบว่า option นี้เป็นอำเภอที่เลือกไว้หรือไม่
                    if (item.amphoe == selectedDistrict) {
                        option.selected = true;
                    }

                    location_A.add(option);
                }
            });

        if (selectedDistrict) {
            show_location_T(selectedDistrict);
        }

    }

    function show_location_T(type){

    let location_P = document.querySelector("#province_input");
    let location_A = document.querySelector("#district_input");

    let province_name ;
    let district_name ;

    if(!location_P.value){
        province_name = '{{Auth::user()->sub_organization}}';
    }else{
        province_name = location_P.value;
    }

    if(type == 'handle'){
        district_name = location_A.value;
    }else{
        district_name = type;
    }

    // ตัวอย่างการกำหนดค่า selectedDistrict จากข้อมูลที่ดึงมาจากฐานข้อมูล
    let selectedSubDistrict = "{{ isset($hospital_office->sub_district) ? $hospital_office->sub_district : '' }}";

    fetch("{{ url('/') }}/api/location/"+province_name+"/"+district_name+"/show_location_T")
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            //UPDATE SELECT OPTION
            let location_T = document.querySelector("#sub_district_input");
                location_T.innerHTML = "";

            let option_start = document.createElement("option");
                option_start.text = " - เลือกตำบล - ";
                option_start.value = "";
                option_start.selected = true;
                location_T.add(option_start);

            for(let item of result){
                let option = document.createElement("option");
                option.text = item.district;
                option.value = item.district;

                // ตรวจสอบว่า option นี้เป็นอำเภอที่เลือกไว้หรือไม่
                if (item.district == selectedSubDistrict) {
                    option.selected = true;
                }

                location_T.add(option);
            }
        });

    }

    const dropdown_data = () => {
        fetch("{{ url('/') }}/api/hospital_dropdown_data")
            .then(response => response.json())
            .then(result => {
                // let result_data = JSON.parse(result['affiliation']);
                // console.log("hospital_dropdown_data");
                // console.log(result);

                //UPDATE SELECT OPTION ==> affiliation
                let affiliation = document.querySelector("#list_affiliation");
                    affiliation.innerHTML = "";

                if (result && result['affiliation']) {
                    for (let item of result['affiliation']) {
                        let option_1 = document.createElement("option");
                        option_1.value = item.name;
                        affiliation.appendChild(option_1);
                    }
                }

                // UPDATE SELECT OPTION ==> department
                let department = document.querySelector("#list_department");
                    department.innerHTML = "";

                if (result && result['department']) {
                    for(let item of result['department']){
                        let option_2 = document.createElement("option");
                        option_2.value = item.name;
                        department.appendChild(option_2);
                    }
                }

                //UPDATE SELECT OPTION ==> health_type
                let health_type = document.querySelector("#list_health_type");
                    health_type.innerHTML = "";
                if (result && result['health_type']) {
                    for(let item of result['health_type']){
                        let option_3 = document.createElement("option");
                        option_3.value = item.name;
                        health_type.appendChild(option_3);
                    }
                }

                //UPDATE SELECT OPTION ==> service_area
                let service_area = document.querySelector("#list_service_area");
                    service_area.innerHTML = "";
                if (result && result['service_area']) {
                    for(let item of result['service_area']){
                        let option_4 = document.createElement("option");
                        option_4.value = item.name;
                        service_area.appendChild(option_4);
                    }
                }

            }).catch(error => {
                console.error('Error:', error);
            });
    };
</script>

