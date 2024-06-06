<form method="POST" action="{{ url('/hospital_office') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group ">
        <label for="code_9_digit" class="control-label">รหัส 9 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_9_digit" type="text" id="code_9_digit" value="{{ isset($hospital_office->code_9_digit) ? $hospital_office->code_9_digit : ''}}" >
    </div>

    <div class="form-group ">
        <label for="code_5_digit" class="control-label">รหัส 5 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_5_digit" type="text" id="code_5_digit" value="{{ isset($hospital_office->code_5_digit) ? $hospital_office->code_5_digit : ''}}" >

    </div>

    <div class="form-group ">
        <label for="code_11_digit" class="control-label">เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก <span class="text-danger">*</span></label>
        <input required class="form-control" name="code_11_digit" type="text" id="code_11_digit" value="{{ isset($hospital_office->code_11_digit) ? $hospital_office->code_11_digit : ''}}" >
    </div>

    <div class="form-group ">
        <label for="name" class="control-label">ชื่อ <span class="text-danger">*</span></label>
        <input required class="form-control" name="name" type="text" id="name" value="{{ isset($hospital_office->name) ? $hospital_office->name : ''}}" >
    </div>

    <div class="form-group ">
        <div class="col-12 col-md-12">
            <label for="organization_type" class="form-label">ประเภทองค์กร <span class="text-danger">*</span></label>
            <select required name="organization_type" class="notranslate form-control select-form" id="organization_type">
                <option class="translate" value="" selected> - เลือกประเภทองค์กร - </option>
                <option class="translate" value="รัฐบาล" >รัฐบาล</option>
                <option class="translate" value="เอกชน" >เอกชน</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="affiliation" class="control-label">สังกัด <span class="text-danger">*</span></label>
        <select required name="affiliation" class="notranslate form-control select-form" id="affiliation_input" >
            <option class="translate" value="" selected> - เลือกสังกัด - </option>
            <option value="กระทรวงการคลัง">กระทรวงการคลัง</option>
            <option value="กระทรวงการท่องเที่ยวและกีฬา">กระทรวงการท่องเที่ยวและกีฬา</option>
            <option value="กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม">กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม</option>
            <option value="กระทรวงคมนาคม">กระทรวงคมนาคม</option>
            <option value="กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม">กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม</option>
            <option value="กระทรวงยุติธรรม">กระทรวงยุติธรรม</option>
            <option value="กระทรวงมหาดไทย">กระทรวงมหาดไทย</option>
            <option value="กระทรวงกลาโหม">กระทรวงกลาโหม</option>
            <option value="กระทรวงสาธารณสุข">กระทรวงสาธารณสุข</option>
            <option value="กระทรวงศึกษาธิการ">กระทรวงศึกษาธิการ</option>
            <option value="กรุงเทพมหานคร(สังกัด กทม.)">กรุงเทพมหานคร(สังกัด กทม.)</option>
            <option value="องค์กรปกครองส่วนท้องถิ่น">องค์กรปกครองส่วนท้องถิ่น</option>
            <option value="องค์การมหาชน">องค์การมหาชน</option>
            <option value="มูลนิธิ">มูลนิธิ</option>
            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
            <option value="สภากาชาดไทย">สภากาชาดไทย</option>
            <option value="สำนักนายกรัฐมนตรี">สำนักนายกรัฐมนตรี</option>
            <option value="สำนักพระราชวัง">สำนักพระราชวัง</option>
            <option value="สำนักงานศาลยุติธรรม">สำนักงานศาลยุติธรรม</option>
            <option value="หน่วยงานภายใต้กำกับรัฐ">หน่วยงานภายใต้กำกับรัฐ</option>
            <option value="หน่วยงานอิสระ">หน่วยงานอิสระ</option>
            <option value="เอกชน">เอกชน</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select>
    </div>

    <div class="form-group">
        <label for="service_area" class="control-label">เขตบริการ <span class="text-danger">*</span></label>
        <select required class="form-control" name="service_area" id="service_area">
            <option selected value="all">- เลือกเขตสุขภาพ -</option>
            <option value="เขตสุขภาพที่ 1">เขตสุขภาพที่ 1</option>
            <option value="เขตสุขภาพที่ 2">เขตสุขภาพที่ 2</option>
            <option value="เขตสุขภาพที่ 3">เขตสุขภาพที่ 3</option>
            <option value="เขตสุขภาพที่ 4">เขตสุขภาพที่ 4</option>
            <option value="เขตสุขภาพที่ 5">เขตสุขภาพที่ 5</option>
            <option value="เขตสุขภาพที่ 6">เขตสุขภาพที่ 6</option>
            <option value="เขตสุขภาพที่ 7">เขตสุขภาพที่ 7</option>
            <option value="เขตสุขภาพที่ 8">เขตสุขภาพที่ 8</option>
            <option value="เขตสุขภาพที่ 9">เขตสุขภาพที่ 9</option>
            <option value="เขตสุขภาพที่ 10">เขตสุขภาพที่ 10</option>
            <option value="เขตสุขภาพที่ 11">เขตสุขภาพที่ 11</option>
            <option value="เขตสุขภาพที่ 12">เขตสุขภาพที่ 12</option>
            <option value="เขตสุขภาพที่ 13">เขตสุขภาพที่ 13</option>
        </select>
    </div>

    <div class="form-group">
        <label for="department" class="control-label">แผนก/กรม</label>
        <select name="department" class="notranslate form-control select-form" id="department_input" >
            <option class="translate" value="" selected> - เลือกแผนก/กรม - </option>
            <option value="กรมการแพทย์">กรมการแพทย์</option>
            <option value="กรมการแพทย์ไทยและการแพทย์ทางเลือก">กรมการแพทย์ไทยและการแพทย์ทางเลือก</option>
            <option value="ศูนย์บริการสาธารณสุข อปท.">ศูนย์บริการสาธารณสุข อปท.</option>
            <option value="กรมควบคุมโรค">กรมควบคุมโรค</option>
            <option value="กรมวิทยาศาสตร์การแพทย์">กรมวิทยาศาสตร์การแพทย์</option>
            <option value="กรมสนับสนุนบริการสุขภาพ">กรมสนับสนุนบริการสุขภาพ</option>
            <option value="กรมสุขภาพจิต">กรมสุขภาพจิต</option>
            <option value="กรมอนามัย">กรมอนามัย</option>
            <option value="สถาบันพระบรมราชชนก">สถาบันพระบรมราชชนก</option>
            <option value="สำนักงานคณะกรรมการอาหารและยา">สำนักงานคณะกรรมการอาหารและยา</option>
            <option value="สำนักงานปลัดกระทรวงสาธารณสุข">สำนักงานปลัดกระทรวงสาธารณสุข</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="health_type" class="form-label">ประเภทหน่วยบริการสุขภาพ</label>
        <select class="form-control" name="health_type" id="health_type">
            <option selected value="all">- เลือกประเภทหน่วยบริการสุขภาพ -</option>
            <option value="คลินิกเอกชน">คลินิกเอกชน</option>
            <option value="ศูนย์บริการสาธารณสุข">ศูนย์บริการสาธารณสุข</option>
            <option value="ศูนย์บริการสาธารณสุข อปท.">ศูนย์บริการสาธารณสุข อปท.</option>
            <option value="ศูนย์สุขภาพชุมชน ของ รพ. / เมือง (ศสม.)">ศูนย์สุขภาพชุมชน ของ รพ. / เมือง (ศสม.)</option>
            <option value="สำนักงานสาธารณสุขจังหวัด">สำนักงานสาธารณสุขจังหวัด</option>
            <option value="สำนักงานสาธารณสุขอำเภอ">สำนักงานสาธารณสุขอำเภอ</option>
            <option value="โรงพยาบาลชุมชน">โรงพยาบาลชุมชน</option>
            <option value="โรงพยาบาลทั่วไป">โรงพยาบาลทั่วไป</option>
            <option value="โรงพยาบาลเอกชน">โรงพยาบาลเอกชน</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select>
    </div>

    <div class="row form-group">
        <div class="col-12 col-md-6">
            <label for="founding_date" class="control-label">วันที่ก่อตั้ง</label>
            <input class="form-control" name="founding_date" type="date" id="founding_date" value="{{ isset($hospital_office->founding_date) ? $hospital_office->founding_date : ''}}" >
        </div>

        <div class="col-12 col-md-6">
            <label for="closing_date" class="control-label">วันที่ปิดบริการ</label>
            <input class="form-control" name="closing_date" type="date" id="closing_date" value="{{ isset($hospital_office->closing_date) ? $hospital_office->closing_date : ''}}" >
        </div>
    </div>
    <br>
    <hr>

    <div class="row form-group">
        <!-- จังหวัด -->
        <div class="col-12 col-md-4">
            <label for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
            <select required name="province" class="notranslate form-control select-form" id="province_input" onchange="show_location_A();">
                <option class="translate" value="" selected> - เลือกจังหวัด - </option>
                <option class="translate" value="{{ Auth::user()->sub_organization}}" >{{ Auth::user()->sub_organization}}</option>
            </select>
        </div>
        <!-- อำเภอ -->
        <div class="col-12 col-md-4">
            <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
            <select required name="district" class="notranslate form-control select-form" id="district_input" onchange="show_location_T();">
                <option class="translate" value="" selected> - เลือกอำเภอ - </option>
            </select>
        </div>
        <!-- ตำบล -->
        <div class="col-12 col-md-4">
            <label for="sub_district" class="form-label">ตำบล <span class="text-danger">*</span></label>
            <select required name="sub_district" class="notranslate form-control select-form" id="sub_district_input" >
                <option class="translate" value="" selected> - เลือกตำบล - </option>
            </select>
        </div>

    </div>

    <div class="form-group">
        <label for="address" class="control-label">ที่อยู่ <span class="text-danger">*</span></label>
        <input required class="form-control" name="address" type="detail" id="address" value="{{ isset($hospital_office->address) ? $hospital_office->address : ''}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group ">
        <label for="village" class="control-label">หมู่</label>
        <input class="form-control" name="village" type="text" id="village" value="{{ isset($hospital_office->village) ? $hospital_office->village : ''}}" >
    </div>

    <div class="form-group ">
        <label for="zip_code" class="control-label">รหัสไปรษณีย์</label>
        <input class="form-control" name="zip_code" type="text" id="zip_code" value="{{ isset($hospital_office->zip_code) ? $hospital_office->zip_code : ''}}" >
    </div>

    <div class="row form-group">
        <div class="col-12 col-md-6">
            <label for="lat" class="control-label">Lat(Latitude)</label>
            <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($hospital_office->lat) ? $hospital_office->lat : ''}}" >
        </div>
        <div class="col-12 col-md-6">
            <label for="lng" class="control-label">Lng(Longtitude)</label>
            <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($hospital_office->lng) ? $hospital_office->lng : ''}}" >
        </div>
    </div>

    <br>
    <hr>
    <div class="form-group">
        <input class="btn btn-success float-end" style="width: 130px" type="submit" value="{{ $formMode === 'edit' ? 'แก้ไข' : 'บันทึก' }}">
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

    });

    function show_location_A(){
        let location_P = document.querySelector("#province_input");

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
                    location_A.add(option);
                }
            });
    }

    function show_location_T(){

    let location_P = document.querySelector("#province_input");
    let location_A = document.querySelector("#district_input");

    let province_name ;

    if(!location_P.value){
        province_name = search_P_for_sub.value ;
    }else{
        province_name = location_P.value ;
    }

    fetch("{{ url('/') }}/api/location/"+province_name+"/"+location_A.value+"/show_location_T")
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
                location_T.add(option);
            }
        });

    }

    // const dropdown_data = () => {
    //     fetch("{{ url('/') }}/api/hospital_dropdown_data")
    //         .then(response => response.json())
    //         .then(result => {
    //             // let result_data = JSON.parse(result['affiliation']);
    //             //UPDATE SELECT OPTION
    //             let affiliation = document.querySelector("#affiliation_input");
    //                 affiliation.innerHTML = "";

    //             let option_start = document.createElement("option");
    //                 option_start.text = " - เลือกสังกัด - ";
    //                 option_start.value = "";
    //                 option_start.selected = true;
    //                 affiliation.add(option_start);

    //             for(let item of result['affiliation']){

    //                 let option = document.createElement("option");
    //                 option.text = item.name;
    //                 option.value = item.name;
    //                 affiliation.add(option);
    //             }

    //             let department = document.querySelector("#department_input");
    //                 department.innerHTML = "";

    //             let option_start_2 = document.createElement("option");
    //                 option_start_2.text = " - เลือกแผนก/กรม - ";
    //                 option_start_2.value = "";
    //                 option_start_2.selected = true;
    //                 department.add(option_start_2);

    //             for(let item of result['department']){

    //                 let option_2 = document.createElement("option");
    //                 option_2.text = item.name;
    //                 option_2.value = item.name;
    //                 department.add(option_2);
    //             }

    //         });
    // };
</script>
