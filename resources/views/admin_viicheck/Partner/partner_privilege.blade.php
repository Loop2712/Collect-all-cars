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
</style>
<div class="container-fluid mt-3">

    <form class="card p-3" id="privilegeForm" onsubmit="submitForm();return false">
        <h4><b>เพิ่ม Privilege</b></h4>
        <label for="partner_id">เลือก Partner</label>
        <input class="form-control" list="partner_id" oninput="console.log(this.value);" id="partnerInput" required />
        <datalist id="partner_id">
            @foreach($name_partner as $item)
            <option data-value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </datalist>


        <div class="row mt-3">
            <div class="col-8">
                <label for="title" class="mt-3">กรอกชื่อโปรโมชั่น</label>
                <input class="form-control mb-3" type="text" placeholder="กรอกชื่อโปรโมชั่น" id="title" aria-label="default input example" required>
            </div>
            <div class="col-4">
                <label for="amount_privilege" class="mt-3">กรอกจำนวน</label>
                <input class="form-control mb-3" type="text" placeholder="กรอกจำนวนโปรโมชั่น" id="amount_privilege" aria-label="default input example">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="start_privilege">วันที่เริ่ม</label>
                <input type="date" class="form-control" id="start_privilege">
            </div>
            <div class="col-6">
                <label for="expire_privilege">วันที่สิ้นสุด</label>
                <input type="date" class="form-control" id="expire_privilege">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <label for="upload-container">ภาพปก</label>
                <label class="upload-container">
                    <input type="file" id="img_cover" accept="image/*" onchange="previewPhoto(event, 'preview1')" required>
                    <div id="preview1" class="preview">
                        <span>เพิ่มรูปภาพที่นี่</span>
                    </div>
                </label>
            </div>
            <div class="col-6">
                <label for="upload-container">ภาพเนื้อหา</label>
                <label class="upload-container">
                    <input type="file" id="img_content" accept="image/*" onchange="previewPhoto(event, 'preview2')" required>
                    <div id="preview2" class="preview">
                        <span>เพิ่มรูปภาพที่นี่</span>
                    </div>
                </label>
            </div>
        </div>

        <label for="detail" class="mt-3">ข้อกำหนดและเงื่อนไข</label>
        <textarea id="detail"></textarea>

        <button class="btn btn-success mt-3" type="submit">บันทึก</button>
    </form>
</div>

<script src='https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js'></script>
<script>
    function submitForm() {

        // API UPLOAD IMG //
        let formData = new FormData();

        let img_cover = document.getElementById('img_cover').files[0];
        formData.append('img_cover', img_cover);

        let img_content = document.getElementById('img_content').files[0];
        formData.append('img_content', img_content);

        let data_privilege = {
            "partner_id": document.getElementById('partnerInput').value,
            "title": document.getElementById('title').value,
            "start_privilege": document.getElementById('start_privilege').value,
            "expire_privilege": document.getElementById('expire_privilege').value,
            "amount_privilege": document.getElementById('amount_privilege').value,
            "detail": tinymce.get('detail').getContent(),
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
        console.log(data_privilege);
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
        formData.append('start_privilege', data_privilege.start_privilege);
        formData.append('expire_privilege', data_privilege.expire_privilege);
        formData.append('amount_privilege', data_privilege.amount_privilege);
        formData.append('detail', data_privilege.detail);
        formData.append('img_cover', data_privilege.img_cover);
        formData.append('img_content', data_privilege.img_content);
        console.log(formData);
        fetch("{{ url('/') }}/api/add_privileges", {
            method: 'POST',
            body: formData
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            console.log(data);


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
</script>
<script>
    tinymce.init({
        selector: '#detail',
        height: 250,
        theme: 'modern',
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        default_link_target: "_blank",
        templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
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
@endsection