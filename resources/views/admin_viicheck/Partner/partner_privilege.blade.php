@extends('layouts.admin')

@section('content')

<style>
    .upload-container {
        position: relative;
        width: 100%;
        height: 150px;
        border: 2px dashed #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #888;
        cursor: pointer;
        overflow: hidden;
    }

    .upload-container input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .preview img {
        width: 100%;
        height: 100%;
        object-fit: contain !important;
    }

    .preview {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        width: 100%;
        height: 100%;
    }

    /*  select redeem  */
    .radio-input {
      display: flex;
      flex-direction: row;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 16px;
      font-weight: 600;
      color: white;
    }

    .radio-input input[type="radio"] {
      display: none;
    }

    .radio-input label {
      display: flex;
      align-items: center;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #212121;
      border-radius: 5px;
      margin-right: 12px;
      cursor: pointer;
      position: relative;
      transition: all 0.3s ease-in-out;
    }

    .radio-input label:before {
      content: "";
      display: block;
      position: absolute;
      top: 50%;
      left: 0;
      transform: translate(-50%, -50%);
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: #fff;
      border: 2px solid #ccc;
      transition: all 0.3s ease-in-out;
    }

    .radio-input input[type="radio"]:checked + label:before {
      background-color: green;
      top: 0;
    }

    .radio-input input[type="radio"]:checked + label {
      background-color: royalblue;
      color: #fff;
      border-color: rgb(129, 235, 129);
      animation: radio-translate 0.5s ease-in-out;
    }

    @keyframes radio-translate {
      0% {
        transform: translateX(0);
      }

      50% {
        transform: translateY(-10px);
      }

      100% {
        transform: translateX(0);
      }
    }

    .btn.disabled {
        pointer-events: none;
        opacity: 0.5;
    }

    :focus {
  outline: 0;
  border-color: #2260ff;
  box-shadow: 0 0 0 4px #b5c9fc;
}

.mydict div {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
/*  justify-content: center;*/
}

.mydict input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.mydict input[type="radio"]:checked + span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

.mydict label span {
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

.mydict label:first-child span {
  border-radius: .375em 0 0 .375em;
}

.mydict label:last-child span {
  border-radius: 0 .375em .375em 0;
}

.loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }

</style>
<div class="container-fluid mt-3">

    <form class="card p-3" id="privilegeForm" >
        <div class="row">
            <h4 class="col"><b>เพิ่ม Privilege</b></h4>
            <div class="col">
                <a href="{{ url('/template_excel/for_redeem_code.xlsx') }}" download class="btn btn-info" style="float: right;">Download Template Excel</a>
            </div>
        </div>
        <hr>
        <label for="partner_id">เลือก Partner</label>
        <input class="form-control" list="partner_id" id="partnerInput" required onchange="check_data_for_submit();">
        <datalist id="partner_id">
            @foreach($name_partner as $item)
            <option data-value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </datalist>


        <div class="row mt-2">

            <div class="col-8">
                <label for="title" class="mt-2">กรอกชื่อโปรโมชั่น</label>
                <input class="form-control mb-3" type="text" placeholder="กรอกชื่อโปรโมชั่น" id="title" aria-label="default input example" required onchange="check_data_for_submit();">
            </div>

            <div class="col-4">
                <label class="mt-2" for="type">เลือกประเภท</label>
                <input class="form-control" list="list_type_privilege" id="type" name="type" required onchange="check_data_for_submit();">
                <datalist id="list_type_privilege">
                    @foreach($type_privilege as $item_2)
                    <option data-value="{{$item_2->type}}">{{$item_2->type}}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="col-12">
                <label for="amount_privilege" class="mt-2">วิธีการ Redeem</label>

                <div class="radio-input">
                    <input name="how_to_Redeem" id="value-1" value="member" type="radio" checked onchange="change_select_redeem();check_data_for_submit();">
                    <label for="value-1">Member</label>
                    <input name="how_to_Redeem" id="value-2" value="code" type="radio" onchange="change_select_redeem();check_data_for_submit();">
                    <label for="value-2">Code</label>
                </div>
                <input class="form-control mb-3 d-none" type="text" id="redeem_type" value="member">
            </div>

            <script>
                function change_select_redeem(){
                    let how_to_Redeem = document.querySelectorAll('input[name="how_to_Redeem"]');
                    let how_to_Redeem_value = "";
                    how_to_Redeem.forEach(how_to_Redeem => {
                        if (how_to_Redeem.checked) {
                            how_to_Redeem_value = how_to_Redeem.value;
                        }
                    })

                    document.querySelector('#redeem_type').value = how_to_Redeem_value;

                    if(how_to_Redeem_value == 'member'){
                        document.querySelector('#div_for_amount_privilege').classList.add('d-none');
                        document.querySelector('#amount_privilege').value = '';
                    }
                    else if(how_to_Redeem_value == 'code'){
                        document.querySelector('#div_for_amount_privilege').classList.remove('d-none');
                        document.querySelector('#div_for_redeem_type_code').classList.remove('d-none');
                    }
                }
            </script>

            <div id="div_for_amount_privilege" class="col-12 d-none">
                <label for="amount_privilege" class="mt-2">กรอกจำนวน</label>
                <input class="form-control mb-3" type="text" placeholder="กรอกจำนวนโปรโมชั่น" id="amount_privilege" aria-label="default input example" list="list_amount_privilege" onchange="check_data_for_submit();">
                <datalist id="list_amount_privilege">
                    <option data-value="ไม่จำกัด">ไม่จำกัด</option>
                    <option data-value="100">100</option>
                    <option data-value="500">500</option>
                    <option data-value="1000">1,000</option>
                    <option data-value="5000">5,000</option>
                </datalist>
            </div>

            <div id="div_for_redeem_type_code" class="col-12 d-none">

                <hr>
                <div class="mydict">
                    <label for="">เลือกวิธีการสร้าง Code</label>
                    <div>
                        <label>
                            <input type="radio" name="radio_gen_code" value="auto" checked="" onchange="change_type_gen_code();">
                            <span>Auto Gen Code</span>
                        </label>
                        <label>
                            <input type="radio" name="radio_gen_code" value="excel" onchange="change_type_gen_code();">
                            <span>Excel</span>
                        </label>
                    </div>
                </div>

                <input type="text" name="type_gen_code" id="type_gen_code" class="d-none" value="auto">

                <div id="div_gen_code_by_excel" class="mt-2 d-none">
                    <label for="">Add Code By Excel</label>
                    <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_input_excel();" onchange="check_data_for_submit();">
                    <span id="btn_readExcel_gen_code" class="btn btn-warning btn-sm px-5 mt-2 d-none" onclick="readExcel('12','10')">
                        อ่านไฟล์
                    </span>
                </div>
                <hr>
            </div>

            <!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
            <script>
                function change_type_gen_code(){
                    let radio_gen_code = document.querySelectorAll('input[name="radio_gen_code"]');
                    let radio_gen_code_value = "";
                    radio_gen_code.forEach(radio_gen_code => {
                        if (radio_gen_code.checked) {
                            radio_gen_code_value = radio_gen_code.value;
                        }
                    })

                    document.querySelector('#type_gen_code').value = radio_gen_code_value;

                    if(radio_gen_code_value == 'auto'){
                        document.querySelector('#div_gen_code_by_excel').classList.add('d-none');
                        document.querySelector('#excelInput').value = null ;
                    }
                    else if(radio_gen_code_value == 'excel'){
                        document.querySelector('#div_gen_code_by_excel').classList.remove('d-none');
                    }

                    check_data_for_submit();
                }

                function clear_input_excel(){
                  document.querySelector('#excelInput').value = null ;
                }

                // EXCEL
                function readExcel(privilege_id , amount_privilege) {

                    let input = document.getElementById('excelInput');
                    let file = input.files[0];

                    if (file) {

                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let data = e.target.result;
                            let workbook = XLSX.read(data, { type: 'binary' });

                            // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                            let sheetName = workbook.SheetNames[0];
                            let sheet = workbook.Sheets[sheetName];

                            // แปลงข้อมูลในชีทเป็น JSON
                            let jsonData = XLSX.utils.sheet_to_json(sheet);

                            // ตรวจสอบข้อมูลในคอนโซล
                            // console.log("privilege_id >> " + privilege_id);
                            // console.log(jsonData);

                            if(jsonData){

                                fetch("{{ url('/') }}/api/create_redeem_code_excel/"+privilege_id+"/"+amount_privilege, {
                                    method: 'post',
                                    body: JSON.stringify(jsonData),
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                }).then(function (response){
                                    return response.text();
                                }).then(function(data){
                                    // console.log(data);
                                    if(data == 'success'){
                                        // เคลียร์ input
                                        let input = document.getElementById('excelInput');
                                        input.value = null;

                                        location.reload();
                                    }
                                }).catch(function(error){
                                    console.error(error);
                                }); 
                            }

                            document.querySelector('#excelInput').value = null ;
                            
                        };

                        reader.readAsBinaryString(file);

                    } else {
                        alert('กรุณาเลือกไฟล์ Excel');
                    }

                }
            </script>

            <div class="col-6">
                <label for="start_privilege">วันที่เริ่ม</label>
                <input type="date" class="form-control" id="start_privilege" onchange="check_data_for_submit();">
            </div>
            <div class="col-6">
                <label for="expire_privilege">วันที่สิ้นสุด</label>
                <input type="date" class="form-control" id="expire_privilege" onchange="check_data_for_submit();">
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-6">
                <label for="upload-container">ภาพปก</label>
                <label class="upload-container">
                    <input type="file" id="img_cover" accept="image/*" onchange="previewPhoto(event, 'preview1');check_data_for_submit();" required>
                    <div id="preview1" class="preview">
                        <span>เพิ่มรูปภาพที่นี่</span>
                    </div>
                </label>
            </div>
            <div class="col-6">
                <label for="upload-container">ภาพเนื้อหา</label>
                <label class="upload-container">
                    <input type="file" id="img_content" accept="image/*" onchange="previewPhoto(event, 'preview2');check_data_for_submit();" required>
                    <div id="preview2" class="preview">
                        <span>เพิ่มรูปภาพที่นี่</span>
                    </div>
                </label>
            </div>
        </div>

        <label for="detail" class="mt-2">ข้อกำหนดและเงื่อนไข</label>

        <textarea id="detail"></textarea>
        <textarea class="form-control d-none" rows="5" name="for_detail" type="textarea" id="for_detail"></textarea>

        <span id="btn_submit" class="btn btn-success mt-2 disabled" onclick="submitForm();">บันทึก</span>
        <!-- <button class="btn btn-success mt-2" type="submit">บันทึก</button> -->

        <div id="div_loading" class="d-none">
            <hr>
            @include ('hamster_loading')
        </div>

        <div  class="loading-container" class="col-12 mt-5">
            <div id="div_success_Excel" class="contrainerCheckmark d-none">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
                <center>
                    <h5 class="mt-3">เสร็จสิ้น</h5>
                </center>
            </div>
        </div>
    </form>
</div>

<script>

    function check_data_for_submit(){

        // console.log('check_data_for_submit');
        let btn_submit = document.querySelector('#btn_submit');

        let redeem_type = document.querySelector('#redeem_type').value;
        let type_gen_code = document.querySelector('#type_gen_code').value;
        let excelInput = document.querySelector('#excelInput').value;

        let partnerInput = document.querySelector('#partnerInput').value;
        let title = document.querySelector('#title').value;
        let type = document.querySelector('#type').value;
        let amount_privilege = document.querySelector('#amount_privilege').value;
        let start_privilege = document.querySelector('#start_privilege').value;
        let expire_privilege = document.querySelector('#expire_privilege').value;
        let img_cover = document.querySelector('#img_cover').value;
        let img_content = document.querySelector('#img_content').value;
        let for_detail = document.querySelector('#for_detail').value;

        if(redeem_type == 'member'){

            if(type_gen_code == 'auto'){
                if (partnerInput && title && type && start_privilege && expire_privilege && img_cover && img_content && for_detail) {
                    btn_submit.classList.remove('disabled');
                }
                else{
                    btn_submit.classList.add('disabled');
                }
            }
            else if(type_gen_code == 'excel'){
                if (partnerInput && title && type && start_privilege && expire_privilege && img_cover && img_content && for_detail && excelInput) {
                    btn_submit.classList.remove('disabled');
                }
                else{
                    btn_submit.classList.add('disabled');
                }
            }

            
        }
        else if(redeem_type == 'code'){

            if(type_gen_code == 'auto'){
                if (partnerInput && title && type && start_privilege && expire_privilege && img_cover && img_content && for_detail && amount_privilege) {
                    btn_submit.classList.remove('disabled');
                }
                else{
                    btn_submit.classList.add('disabled');
                }
            }
            else if(type_gen_code == 'excel'){
                if (partnerInput && title && type && start_privilege && expire_privilege && img_cover && img_content && for_detail && amount_privilege && excelInput) {
                    btn_submit.classList.remove('disabled');
                }
                else{
                    btn_submit.classList.add('disabled');
                }
            }
            
        }


    }

    function submitForm() {

        show_loading();
        let btn_submit = document.querySelector('#btn_submit');
            btn_submit.classList.add('d-none')

        // API UPLOAD IMG //
        let formData = new FormData();

        let img_cover = document.getElementById('img_cover').files[0];
        formData.append('img_cover', img_cover);

        let img_content = document.getElementById('img_content').files[0];
        formData.append('img_content', img_content);

        let data_privilege = {
            "partner_id": document.getElementById('partnerInput').value,
            "title": document.getElementById('title').value,
            "type": document.getElementById('type').value,
            "redeem_type": document.getElementById('redeem_type').value,
            "start_privilege": document.getElementById('start_privilege').value,
            "expire_privilege": document.getElementById('expire_privilege').value,
            "amount_privilege": document.getElementById('amount_privilege').value,
            "detail": document.getElementById('for_detail').value,
            "type_gen_code": document.getElementById('type_gen_code').value,
        }




        // // ตรวจสอบค่า partner_id และแปลงตามที่ต้องการ
        // let partner_id = data_privilege.partner_id;
        // if (!isNaN(partner_id) && partner_id.trim() !== '') {
        //     // ถ้าเป็นตัวเลขและไม่ใช่ค่าว่างเปล่า แปลงเป็น int
        //     partner_id = parseInt(partner_id, 10);
        // } else {
        //     // ถ้าไม่ใช่ตัวเลข แปลงเป็น string
        //     partner_id = partner_id.toString();
        // }
        // console.log(data_privilege);
        // let partner_id = data_privilege.partner_id;

        // const num = parseFloat(data_privilege.partner_id);
        // if (!isNaN(num) && num.toString() === data_privilege.partner_id) {
        //     alert('int');
        //     formData.append('partner_id', parseInt(data_privilege.partner_id , 10));
        // } else {
        //     alert('str');
        //     formData.append('partner_id', data_privilege.partner_id.toString());
        // }
        formData.append('partner_id', data_privilege.partner_id);
        formData.append('titel', data_privilege.title);
        formData.append('type', data_privilege.type);
        formData.append('redeem_type', data_privilege.redeem_type);
        formData.append('start_privilege', data_privilege.start_privilege);
        formData.append('expire_privilege', data_privilege.expire_privilege);
        formData.append('amount_privilege', data_privilege.amount_privilege);
        formData.append('detail', data_privilege.detail);
        formData.append('img_cover', data_privilege.img_cover);
        formData.append('img_content', data_privilege.img_content);
        formData.append('type_gen_code', data_privilege.type_gen_code);

        // console.log(formData);

        fetch("{{ url('/') }}/api/add_privileges", {
            method: 'POST',
            body: formData
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            // console.log(data);

            if(data.redeem_type == 'code'){
                if(data.type_gen_code == 'auto'){
                    // location.reload();
                    let data_arr_code = data.data_arr_code ;

                    // สร้างเวิร์กชีตใหม่
                    const ws = XLSX.utils.aoa_to_sheet([
                        ['redeem_code'], // หัวคอลัมน์
                        ...data_arr_code.map(code => [code]) // แปลงข้อมูลให้อยู่ในรูปแบบแถว (row)
                    ]);

                    // สร้างเวิร์กบุ๊คใหม่
                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

                    // บันทึกไฟล์ Excel
                    const filename = 'redeem_codes_' + data_privilege.title + '.xlsx';
                    XLSX.writeFile(wb, filename);

                    document.querySelector('#div_loading').classList.add('d-none');
                    document.querySelector('#div_success_Excel').classList.remove('d-none');

                }
                else if(data.type_gen_code == 'excel'){
                    readExcel(data.privilege_id , data.amount_privilege);
                }
            }
            else if(data.redeem_type == 'member'){
                location.reload();
            }

        }).catch(function(error) {
            // console.error(error);
        });

    }

    function previewPhoto(event, previewId) {
        const previewDiv = document.getElementById(previewId);
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.innerHTML = ''; // Clear previous preview
                const img = document.createElement('img');
                img.src = e.target.result;
                previewDiv.appendChild(img);
            }
            reader.readAsDataURL(file);
        } else {
            previewDiv.innerHTML = '<span>เพิ่มรูปภาพที่นี่</span>'; // Clear if no file is selected
        }
    }

    function show_loading(){
        document.querySelector('#div_loading').classList.remove('d-none');

        setInterval(function() {
            const pointLoading = document.querySelector('#point_loading');
            pointLoading.classList.toggle('d-none');
        }, 400);
    }
</script>


<script>
    const des = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, 'value');
    Object.defineProperty(HTMLInputElement.prototype, 'value', {
        get: function() {
            const value = des.get.call(this);

            if (this.type === 'text' && this.list) {
                const opt = [].find.call(this.list.options, o => o.value === value);
                return opt ? opt.dataset.value : value;
            }

            return value;
        }
    });
</script>

<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
      min-height: 300px;
    }

    .ck-powered-by{
        display: none;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("detail"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'undo', 'redo', '|',
                'findAndReplace', '|','link', '|',
                'heading', '|','fontSize', '|',
                'alignment', 'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'fontColor', 'highlight', '|',
                'specialCharacters', 'horizontalLine', '|','exportPDF','exportWord', 
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                // toggleDownloadable: {
                //     mode: 'manual',
                //     label: 'Downloadable',
                //     attributes: {
                //         download: 'file'
                //     }
                // }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "superbuild" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'MultiLevelList',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced',
            'CaseChange'
        ]
    }).then(editor => {
        editor.model.document.on('change:data', () => {
            // console.log(editor.getData());
            if(!editor.getData()){
                // 
            }
            else{
                document.querySelector('#for_detail').value = editor.getData();
                check_data_for_submit();
            }
        });
    }).catch(error => {
        console.error(error);
    });
</script>
<!-- END CKEDITOR -->
@endsection