<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    footer,
    header,
    #topbar {
        display: none !important;
    }



    .breadcrumb-title {
        font-size: 20px;
        /* border-right: 1.5px solid #aaa4a4; */
        font-weight: bolder;
    }


    .page-breadcrumb .breadcrumb li.breadcrumb-item {
        font-size: 16px;
    }


    .page-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #6c757d;
        font-family: 'LineIcons';
        content: "\ea5c";
    }

    .area-maintain {
        display: flex;
        align-items: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        font-size: 16px;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
    }

    body {
        padding-bottom: 0 !important;
    }

    body.bg-white {
        background-color: #f0f3f8 !important;
    }



    .font-18 {
        font-size: 18px;
    }

    .font-16 {
        font-size: 16px;
    }

    .font-14 {
        font-size: 14px;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25;
    }

    hr:not([size]) {
        height: 1px;
    }

    .img-box {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .img-item {
        width: 75px;
        height: 75px;
        border-radius: 10px;
        border: rgb(14, 16, 17, .25) 1px solid;
        cursor: pointer;
        position: relative;

    }

    .icon-img-item {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
        z-index: 1;
    }
    .img-preview{
        background-color: #fff !important;
    }
</style>
<div class="container">
    <div class="pt-4">
        <h6 class="mb-0">แบบฟอร์มแจ้งซ่อม
        </h6>
        <hr>
        <div class="content">
            <div class="row p-3">
                <div class="px-3 py-1 col-12 col-md-6 mb-4">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">ข้อมูลผู้แจ้ง</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="name" name="maintain_notified_name" value="{{ isset($lest_data_maintain->name) ? $lest_data_maintain->name : ''}}">
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">เบอร์</label>
                                    <input type="text" class="form-control" id="user_phone" name="user_phone" value="{{ isset($lest_data_maintain->phone) ? $lest_data_maintain->phone : ''}}">
                                </div>
                                <div class="col-12">
                                    <label for="mail" class="form-label">อีเมล</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" value="{{ isset($lest_data_maintain->email) ? $lest_data_maintain->email : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="maintain_notified_position" name="maintain_notified_position" value="{{ isset($lest_data_maintain->position) ? $lest_data_maintain->position : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">แผนก</label>
                                    <input type="text" class="form-control" id="maintain_notified_department" name="maintain_notified_department" value="{{ isset($lest_data_maintain->department) ? $lest_data_maintain->department : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
                <div class="px-3 py-1 col-12 col-md-6">

                    <div class="card border-top border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-wrench me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">ข้อมูลการแจ้ง</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="categoty" class="form-label">หมวดหมู่</label>
                                    <!-- <input type="text" class="form-control" id="category_id" name="category_id"> -->
                                    <select name="category_id" id="category_id"  class="form-control">
                                        <option value="">-เลือกหมวดหมู่-</option>
                                        @foreach($data_cat as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="sub_category" class="form-label">หมวดหมู่ย่อย</label>
                                    <!-- <input type="text" class="form-control" id="sub_category_id" name="sub_category_id"> -->
                                    <select name="sub_category_id" id="sub_category_id"  class="form-control" disabled>
                                        <option value="">-เลือกหมวดหมู่ย่อย-</option>
                                    </select>
                                </div>
                                <script>
                                   document.getElementById('category_id').addEventListener('change', function() {
                                        const categoryId = this.value;
                                        const subCategorySelect = document.getElementById('sub_category_id');

                                        if (categoryId !== "") {
                                            // ส่ง category_id ไปยัง API
                                            fetch("{{ url('/') }}/api/get_sub_category?category_id=" + categoryId)
                                                .then(response => response.json()) // แปลงข้อมูลเป็น JSON
                                                .then(data => {
                                                    // ปลดล็อก dropdown และล้างค่าเดิม
                                                    console.log(data); // ตรวจสอบข้อมูลที่ได้รับ
                                                    subCategorySelect.disabled = false;
                                                    subCategorySelect.innerHTML = '<option value="">-เลือกหมวดหมู่ย่อย-</option>';

                                                    // เพิ่มตัวเลือกหมวดหมู่ย่อยใหม่ที่ได้รับมา
                                                    data.forEach(subCategory => {
                                                        const option = document.createElement('option');
                                                        option.value = subCategory.id;
                                                        option.textContent = subCategory.name;
                                                        subCategorySelect.appendChild(option);
                                                    });
                                                })
                                                .catch(error => console.error('Error:', error));
                                        } else {
                                            subCategorySelect.disabled = true; // ปิด disabled ถ้าไม่มีการเลือกหมวดหมู่
                                            subCategorySelect.innerHTML = '<option value="">-เลือกหมวดหมู่ย่อย-</option>';
                                        }
                                    });


                                </script>
                                <div class="col-12">
                                    <label for="" class="form-label">สถานที่</label>
                                    <input type="" class="form-control" id="" readonly value="{{ isset($data_user->partner_name) ? $data_user->partner_name : ''}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รายละเอียดสถานที่</label>
                                    <textarea class="form-control" name="detail_location" id="detail_location" placeholder="กรอกรายละเอียดสถานที่ เช่น อาคาร ชั้น" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">ลักษณะของปัญหาหรือความเสียหาย</label>
                                    <input class="form-control" name="title" type="text" id="title">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รายละเอียดเพิ่มเติม</label>
                                    <textarea class="form-control" name="detail_title" id="detail_title" placeholder="กรอกรายละเอียดเพิ่มเติมเกี่ยวกับปัญหา" rows="3"></textarea>
                                </div>


                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">รูปภาพ</label>
                                    <div id="image-upload-container" class="img-box">
                                        <label for="img1" class="img-item mb-5" id="img-label-1" style="display: block;">
                                            <div class="icon-img-item">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                            <input class="d-none" type="file" name="photos[]" id="img1" accept="image/*" onchange="previewImage(this, 'preview1', 1)">
                                            <img id="preview1" class="img-preview" alt="Image Preview" style="background-color: #fff; display:none; width: 100%; height:100%; object-fit: contain; z-index: 2; position: relative;" />
                                            <button type="button" class="mt-1 btn btn-danger btn-sm w-100" id="remove-btn-1" onclick="removeImage(1)" style="display: none;">ลบรูป</button>
                                        </label>
                                    </div>
                                </div>

                                <script>
                                let imgCount = 1; // จำนวน input ที่ใช้งาน
                                let maxImages = 10; // จำนวนสูงสุดของรูปภาพ

                                function previewImage(input, previewId, count) {
                                    const preview = document.getElementById(previewId);
                                    const removeBtn = document.getElementById(`remove-btn-${count}`);
                                    
                                    // รีเซ็ตค่าของ preview ก่อนที่จะโหลดใหม่
                                    preview.style.display = 'none';
                                    preview.src = '';

                                    const file = input.files[0];

                                    if (file) {
                                        const reader = new FileReader();
                                        
                                        reader.onload = function(e) {
                                            preview.src = e.target.result;
                                            preview.style.display = 'block';
                                            
                                            // แสดงปุ่มลบเมื่อมีการเพิ่มรูปภาพ
                                            removeBtn.style.display = 'block';

                                            // ปิดการใช้งาน input หลังจากเลือกไฟล์แล้ว
                                            input.disabled = true;

                                            // เพิ่ม input ถัดไปถ้ายังไม่เกิน 10 ช่อง
                                            if (document.querySelectorAll('.img-item').length < maxImages) {
                                                addImageUploadField();
                                            }
                                        };

                                        reader.readAsDataURL(file);
                                    }
                                }

                                function addImageUploadField() {
                                    const container = document.getElementById('image-upload-container');
                                    
                                    // ตรวจสอบว่ามีช่องเพิ่มรูปอยู่หรือยัง ถ้ายังไม่มีค่อยเพิ่ม
                                    if (!document.querySelector('.img-item input:not([disabled])')) {
                                        imgCount++; // เพิ่มตัวนับ imgCount ทุกครั้งที่สร้าง input ใหม่
                                        const newLabel = document.createElement('label');
                                        newLabel.setAttribute('for', `img${imgCount}`);
                                        newLabel.setAttribute('class', 'img-item mb-5');
                                        newLabel.setAttribute('id', `img-label-${imgCount}`);
                                        
                                        // ใช้ imgCount ในการสร้าง ID ที่ไม่ซ้ำกัน
                                        newLabel.innerHTML = `
                                            <div class="icon-img-item">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                            <input class="d-none" type="file" name="photos[]" id="img${imgCount}" accept="image/*" onchange="previewImage(this, 'preview${imgCount}', ${imgCount})">
                                            <img id="preview${imgCount}" class="img-preview" alt="Image Preview" style="display:none; width: 100%; height:100%; object-fit: contain; z-index: 2; position: relative;" />
                                            <button type="button" class="mt-1 btn btn-danger btn-sm w-100" id="remove-btn-${imgCount}" onclick="removeImage(${imgCount})" style="display: none;">ลบรูป</button>
                                        `;
                                        
                                        container.appendChild(newLabel); // เพิ่มกล่อง input ใหม่ลงใน container
                                    }
                                }

                                function removeImage(count) {
                                    const labelToRemove = document.getElementById(`img-label-${count}`);
                                    if (labelToRemove) {
                                        labelToRemove.remove(); // ลบ label ที่มีรูปภาพ
                                        // ตรวจสอบว่าต้องเพิ่มช่องเพิ่มรูปไหม ถ้าไม่มีแล้วให้เพิ่ม 1 ช่อง
                                        if (document.querySelectorAll('.img-item').length < maxImages) {
                                            addImageUploadField();
                                        }
                                    }
                                }

                                document.getElementById('form_create_notis').addEventListener('submit', function(e) {
                                    const inputs = document.querySelectorAll('.img-item input[type="file"]');
                                    
                                    // ลบ disabled ใน input ของรูปภาพก่อนส่งฟอร์ม
                                    inputs.forEach(input => {
                                        input.disabled = false; // ปล่อยให้ input ใช้งานได้
                                    });
                                    
                                    // ถ้าต้องการตรวจสอบว่า input ใดที่มีไฟล์
                                    // const hasFiles = Array.from(inputs).some(input => input.files.length > 0);
                                    // console.log('มีไฟล์ที่อัปโหลด:', hasFiles);
                                });
                                </script>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-5">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group d-none {{ $errors->has('name_user') ? 'has-error' : ''}}">
    <label for="name_user" class="control-label">{{ 'Name User' }}</label>
    <input class="form-control" name="name_user" type="text" id="name_user" value="{{ isset($maintain_noti->name_user) ? $maintain_noti->name_user : ''}}">
    {!! $errors->first('name_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('maintain_notified_user_id') ? 'has-error' : ''}}">
    <label for="maintain_notified_user_id" class="control-label">{{ 'Maintain Notified User Id' }}</label>
    <input class="form-control" name="maintain_notified_user_id" type="text" id="maintain_notified_user_id" value="{{ isset($maintain_noti->maintain_notified_user_id) ? $maintain_noti->maintain_notified_user_id : ''}}">
    {!! $errors->first('maintain_notified_user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($maintain_noti->user_id) ? $maintain_noti->user_id : ''}}">
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="text" id="partner_id" value="{{ isset($maintain_noti->partner_id) ? $maintain_noti->partner_id : ''}}">
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('name_area') ? 'has-error' : ''}}">
    <label for="name_area" class="control-label">{{ 'Name Area' }}</label>
    <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($maintain_noti->name_area) ? $maintain_noti->name_area : ''}}">
    {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group d-none {{ $errors->has('detail_location') ? 'has-error' : ''}}">
    <label for="detail_location" class="control-label">{{ 'Detail Location' }}</label>
    <input class="form-control" name="detail_location" type="text" id="detail_location" value="{{ isset($maintain_noti->detail_location) ? $maintain_noti->detail_location : ''}}" >
    {!! $errors->first('detail_location', '<p class="help-block">:message</p>') !!}
</div> -->
<!-- <div class="form-group d-none {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($maintain_noti->title) ? $maintain_noti->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('detail_title') ? 'has-error' : ''}}">
    <label for="detail_title" class="control-label">{{ 'Detail Title' }}</label>
    <input class="form-control" name="detail_title" type="text" id="detail_title" value="{{ isset($maintain_noti->detail_title) ? $maintain_noti->detail_title : ''}}" >
    {!! $errors->first('detail_title', '<p class="help-block">:message</p>') !!}
</div> -->
<!-- <div class="form-group d-none {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <input class="form-control" name="category_id" type="text" id="category_id" value="{{ isset($maintain_noti->category_id) ? $maintain_noti->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('sub_category_id') ? 'has-error' : ''}}">
    <label for="sub_category_id" class="control-label">{{ 'Sub Category Id' }}</label>
    <input class="form-control" name="sub_category_id" type="text" id="sub_category_id" value="{{ isset($maintain_noti->sub_category_id) ? $maintain_noti->sub_category_id : ''}}" >
    {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group d-none {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <textarea class="form-control" rows="5" name="photo" type="textarea" id="photo">{{ isset($maintain_noti->photo) ? $maintain_noti->photo : ''}}</textarea>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($maintain_noti->status) ? $maintain_noti->status : ''}}">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('priority') ? 'has-error' : ''}}">
    <label for="priority" class="control-label">{{ 'Priority' }}</label>
    <input class="form-control" name="priority" type="text" id="priority" value="{{ isset($maintain_noti->priority) ? $maintain_noti->priority : ''}}">
    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group d-none {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'Name Officer' }}</label>
    <textarea class="form-control" rows="5" name="name_officer" type="textarea" id="name_officer" >{{ isset($maintain_noti->name_officer) ? $maintain_noti->name_officer : ''}}</textarea>
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group d-none {{ $errors->has('officer_id') ? 'has-error' : ''}}">
    <label for="officer_id" class="control-label">{{ 'Officer Id' }}</label>
    <textarea class="form-control" rows="5" name="officer_id" type="textarea" id="officer_id">{{ isset($maintain_noti->officer_id) ? $maintain_noti->officer_id : ''}}</textarea>
    {!! $errors->first('officer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('device_code') ? 'has-error' : ''}}">
    <label for="device_code" class="control-label">{{ 'Device Code' }}</label>
    <input class="form-control" name="device_code" type="text" id="device_code" value="{{ isset($maintain_noti->device_code) ? $maintain_noti->device_code : ''}}">
    {!! $errors->first('device_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('device_code_id') ? 'has-error' : ''}}">
    <label for="device_code_id" class="control-label">{{ 'Device Code Id' }}</label>
    <input class="form-control" name="device_code_id" type="text" id="device_code_id" value="{{ isset($maintain_noti->device_code_id) ? $maintain_noti->device_code_id : ''}}">
    {!! $errors->first('device_code_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('datetime_command') ? 'has-error' : ''}}">
    <label for="datetime_command" class="control-label">{{ 'Datetime Command' }}</label>
    <input class="form-control" name="datetime_command" type="datetime-local" id="datetime_command" value="{{ isset($maintain_noti->datetime_command) ? $maintain_noti->datetime_command : ''}}">
    {!! $errors->first('datetime_command', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('datetime_start') ? 'has-error' : ''}}">
    <label for="datetime_start" class="control-label">{{ 'Datetime Start' }}</label>
    <input class="form-control" name="datetime_start" type="datetime-local" id="datetime_start" value="{{ isset($maintain_noti->datetime_start) ? $maintain_noti->datetime_start : ''}}">
    {!! $errors->first('datetime_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('datetime_end') ? 'has-error' : ''}}">
    <label for="datetime_end" class="control-label">{{ 'Datetime End' }}</label>
    <input class="form-control" name="datetime_end" type="datetime-local" id="datetime_end" value="{{ isset($maintain_noti->datetime_end) ? $maintain_noti->datetime_end : ''}}">
    {!! $errors->first('datetime_end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('datetime_success') ? 'has-error' : ''}}">
    <label for="datetime_success" class="control-label">{{ 'Datetime Success' }}</label>
    <input class="form-control" name="datetime_success" type="datetime-local" id="datetime_success" value="{{ isset($maintain_noti->datetime_success) ? $maintain_noti->datetime_success : ''}}">
    {!! $errors->first('datetime_success', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('material') ? 'has-error' : ''}}">
    <label for="material" class="control-label">{{ 'Material' }}</label>
    <textarea class="form-control" rows="5" name="material" type="textarea" id="material">{{ isset($maintain_noti->material) ? $maintain_noti->material : ''}}</textarea>
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('repair_costs') ? 'has-error' : ''}}">
    <label for="repair_costs" class="control-label">{{ 'Repair Costs' }}</label>
    <input class="form-control" name="repair_costs" type="text" id="repair_costs" value="{{ isset($maintain_noti->repair_costs) ? $maintain_noti->repair_costs : ''}}">
    {!! $errors->first('repair_costs', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('photo_repair_costs') ? 'has-error' : ''}}">
    <label for="photo_repair_costs" class="control-label">{{ 'Photo Repair Costs' }}</label>
    <textarea class="form-control" rows="5" name="photo_repair_costs" type="textarea" id="photo_repair_costs">{{ isset($maintain_noti->photo_repair_costs) ? $maintain_noti->photo_repair_costs : ''}}</textarea>
    {!! $errors->first('photo_repair_costs', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('remark_user') ? 'has-error' : ''}}">
    <label for="remark_user" class="control-label">{{ 'Remark User' }}</label>
    <textarea class="form-control" rows="5" name="remark_user" type="textarea" id="remark_user">{{ isset($maintain_noti->remark_user) ? $maintain_noti->remark_user : ''}}</textarea>
    {!! $errors->first('remark_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('remark_officer') ? 'has-error' : ''}}">
    <label for="remark_officer" class="control-label">{{ 'Remark Officer' }}</label>
    <textarea class="form-control" rows="5" name="remark_officer" type="textarea" id="remark_officer">{{ isset($maintain_noti->remark_officer) ? $maintain_noti->remark_officer : ''}}</textarea>
    {!! $errors->first('remark_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('remark_admin') ? 'has-error' : ''}}">
    <label for="remark_admin" class="control-label">{{ 'Remark Admin' }}</label>
    <textarea class="form-control" rows="5" name="remark_admin" type="textarea" id="remark_admin">{{ isset($maintain_noti->remark_admin) ? $maintain_noti->remark_admin : ''}}</textarea>
    {!! $errors->first('remark_admin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('rating_maintain') ? 'has-error' : ''}}">
    <label for="rating_maintain" class="control-label">{{ 'Rating Maintain' }}</label>
    <input class="form-control" name="rating_maintain" type="text" id="rating_maintain" value="{{ isset($maintain_noti->rating_maintain) ? $maintain_noti->rating_maintain : ''}}">
    {!! $errors->first('rating_maintain', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('rating_operation') ? 'has-error' : ''}}">
    <label for="rating_operation" class="control-label">{{ 'Rating Operation' }}</label>
    <input class="form-control" name="rating_operation" type="text" id="rating_operation" value="{{ isset($maintain_noti->rating_operation) ? $maintain_noti->rating_operation : ''}}">
    {!! $errors->first('rating_operation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('rating_impression') ? 'has-error' : ''}}">
    <label for="rating_impression" class="control-label">{{ 'Rating Impression' }}</label>
    <input class="form-control" name="rating_impression" type="text" id="rating_impression" value="{{ isset($maintain_noti->rating_impression) ? $maintain_noti->rating_impression : ''}}">
    {!! $errors->first('rating_impression', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('rating_sum') ? 'has-error' : ''}}">
    <label for="rating_sum" class="control-label">{{ 'Rating Sum' }}</label>
    <input class="form-control" name="rating_sum" type="text" id="rating_sum" value="{{ isset($maintain_noti->rating_sum) ? $maintain_noti->rating_sum : ''}}">
    {!! $errors->first('rating_sum', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('rating_remark') ? 'has-error' : ''}}">
    <label for="rating_remark" class="control-label">{{ 'Rating Remark' }}</label>
    <textarea class="form-control" rows="5" name="rating_remark" type="textarea" id="rating_remark">{{ isset($maintain_noti->rating_remark) ? $maintain_noti->rating_remark : ''}}</textarea>
    {!! $errors->first('rating_remark', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group d-none">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>