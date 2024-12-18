@extends('layouts.partners.theme_partner_new')

<style>
    .border-repair {
        border-radius: 10px;
        border: 2px solid #000000;
    }

    .vertical-divider {
        position: absolute;
        top: 10%;
        /* ปรับให้ไม่ชิดด้านบน */
        bottom: 10%;
        /* ปรับให้ไม่ชิดด้านล่าง */
        left: 50%;
        width: 1px;
        background-color: #000;
        /* สีของเส้นกั้น */
    }

    .overflow-dot {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .card-items {
        /* flex-wrap: wrap; */
        display: flex;
    }

    .card {
        border-radius: 15px !important;
    }

    @media (max-width: 768px) {
        .card-items {
            flex-wrap: wrap;
            display: flex;
            justify-content: center;
        }
    }

    .badge-repair {
        position: absolute;
        top: 25px;
        right: 0%;
        transform: translate(-50%, -50%);
    }

    .repair_detail {
        display: flex;
    }
</style>

@section('content')
<div class="card-title d-flex align-items-center justify-content-between flex-wrap">
    <div class="d-flex">
        <i class="fa-regular fa-screwdriver-wrench me-1 font-22 text-primary"></i>
        <h5 class="mb-0 text-primary">รายการแจ้งซ่อม</h5>
    </div>
    <div class="d-flex">

        <select class="form-select mx-2" id="categories_maintain" onchange="handleChange();">
            <option value="" selected="">หมวดหมู่ : ทั้งหมด</option>
            @foreach($data_categories as $category => $details)
                <option value="{{ $details['category_id'] }}">{{ $details['name_categories'] }}</option>
            @endforeach
        </select>

        <select class="form-select" id="status_maintain" onchange="handleChange();">
            <option value="" selected="">สถานะ : ทั้งหมด</option>
            <option value="แจ้งซ่อม">แจ้งซ่อม</option>
            <option value="รอดำเนินการ">รอดำเนินการ</option>
            <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
        </select>
    </div>
</div>
<hr>

<div id="div_container">

</div>
{{-- <div class="card">
    <div class="card-body ">
        <span class="badge bg-danger badge-repair rounded-pill">แจ้งซ่อม</span>
        <div class="w-100 card-items">
            <div class="mx-2">
                <div class="d-block">
                    <center>
                        <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; border:#000000 solid 1px;object-fit: cover;" width="175px" height="175px">
                        <br>
                        <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info mt-2 w-100">ดูข้อมูลเพิ่มเติม</a>
                    </center>
                </div>

            </div>

            <div class="w-100 p-2">
                <p class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">เครื่องปริ้น</b></p>
                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <b class="text-primary">ไม่มี</b></p>
                <div class="repair_detail row">

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : .............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : .........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ............</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ..................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ..................</p>
                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : .................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : .................</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div>
                    <div class="">

                        <p class="float-end mb-0">วันที่แจ้ง : 11 ธันวาคม 2024 เวลา 00.00 น.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body ">
        <span class="badge bg-warning text-dark badge-repair rounded-pill">รอดำเนินการ</span>

        <div class="w-100 card-items">
            <div class="mx-2">
                <div class="d-block">
                    <center>
                        <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; border:#000000 solid 1px;object-fit: cover;" width="175px" height="175px">
                        <br>
                        <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info mt-2 w-100">ดูข้อมูลเพิ่มเติม</a>
                    </center>
                </div>

            </div>
            <div class="w-100 p-2">
                <p class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">เครื่องปริ้น</b></p>
                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <b class="text-primary">ไม่มี</b></p>
                <div class="repair_detail row">

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : .............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : .........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ............</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ..................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ..................</p>
                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : .................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : .................</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div>
                    <div class="">

                        <p class="float-end mb-0">วันที่แจ้ง : 11 ธันวาคม 2024 เวลา 00.00 น.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body ">
        <span class="badge bg-primary rounded-pill badge-repair">กำลังดำเนินการ</span>

        <div class="w-100 card-items">
            <div class="mx-2">
                <div class="d-block">
                    <center>
                        <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; border:#000000 solid 1px;object-fit: cover;" width="175px" height="175px">
                        <br>
                        <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info mt-2 w-100">ดูข้อมูลเพิ่มเติม</a>
                    </center>
                </div>

            </div>

            <div class="w-100 p-2">
                <p class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">เครื่องปริ้น</b></p>
                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <b class="text-primary">ไม่มี</b></p>
                <div class="repair_detail row">

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : .............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : .........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ............</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ..................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ..................</p>
                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : .................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : .................</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div>
                    <div class="">

                        <p class="float-end mb-0">วันที่แจ้ง : 11 ธันวาคม 2024 เวลา 00.00 น.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body ">
    <span class="badge bg-success rounded-pill badge-repair">เสร็จสิ้น</span>

        <div class="w-100 card-items">
            <div class="mx-2">
                <div class="d-block">
                    <center>
                        <img src="https://www.ofm.co.th/blog/wp-content/uploads/2021/09/%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%87%E0%B8%9B%E0%B8%A3%E0%B8%B4%E0%B9%89%E0%B8%99.jpg" style="border-radius: 10px; border:#000000 solid 1px;object-fit: cover;" width="175px" height="175px">
                        <br>
                        <a href="{{ url('/demo_repair_admin_view') }}" class="btn btn-info mt-2 w-100">ดูข้อมูลเพิ่มเติม</a>
                    </center>
                </div>

            </div>

            <div class="w-100 p-2">
                <p class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">เครื่องปริ้น</b></p>
                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <b class="text-primary">ไม่มี</b></p>
                <div class="repair_detail row">

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : .............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : .........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ............</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ..................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ..................</p>
                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : .................</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : .................</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div>
                    <div class="">

                        <p class="float-end mb-0">วันที่แจ้ง : 11 ธันวาคม 2024 เวลา 00.00 น.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script>
    let partner_id = '{{ $data_partner->id }}'
    document.addEventListener('DOMContentLoaded', function () {
        createDataMaintain(partner_id,null,null);
    });
</script>

<script>
    function handleChange() {
        let status = document.querySelector('#status_maintain').value;
        let categorie = document.querySelector('#categories_maintain').value;

        createDataMaintain(partner_id, status, categorie);
    }

    async function createDataMaintain(partner_id,status, categorie) {
        try {
            const response = await fetch("{{ url('/') }}/api/create_data_maintain_admin_index", {
                method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                    partner_id: partner_id,
                    status: status,
                    categorie: categorie,
                })
            });
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }

            const data = await response.json();
            console.log(data);
            document.getElementById('div_container').innerHTML = "";

            data.forEach((item) => {


                let formattedDate;
                let officerHTML = '';
                let status_bg;
                let photo_maintain;

                if (item.photo) {
                    const photos = JSON.parse(item.photo);
                    if (photos.length > 0) {
                        photo_maintain = '{{ url("/") }}/storage/' + photos[0];
                    } else {
                        photo_maintain = "{{url('img/stickerline/PNG/1.png')}}";
                    }
                } else {
                    photo_maintain = "{{url('img/stickerline/PNG/1.png')}}";
                }

                item.officers.forEach((officer, index) => {
                    officerHTML += `<p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ ${index + 1} : ${officer.full_name}</p>`;
                });

                if (item.datetime_command) {
                    formattedDate = formatThaiDate(item.datetime_command);
                } else {
                    formattedDate = "-";
                }

                if (item.status === "เสร็จสิ้น") {
                    status_bg = "bg-success";
                } else if (item.status === "รอดำเนินการ"){
                    status_bg = "bg-warning";
                }else if (item.status === "กำลังดำเนินการ"){
                    status_bg = "bg-info";
                }else if (item.status === "แจ้งซ่อม"){
                    status_bg = "bg-danger";
                }else {
                    status_bg = "bg-secondary";
                }

                const htmlContent = `
                    <div class="card">
                    <div class="card-body ">
                        <span class="badge ${status_bg} badge-repair rounded-pill">${item.status ? item.status : "-"}</span>
                        <div class="w-100 card-items">
                            <div class="mx-2">
                                <div class="d-block">
                                    <center>
                                        <img src="${photo_maintain}" style="border-radius: 10px; border:#000000 solid 1px;object-fit: cover;" width="175px" height="175px">
                                        <br>
                                        <a href="{{ url('/viifix_repair_admin/view/${item.id}') }}" class="btn btn-info mt-2 w-100">ดูข้อมูลเพิ่มเติม</a>
                                    </center>
                                </div>

                            </div>

                            <div class="w-100 p-2">
                                <p class="h4" style="font-weight: bold;">หมวดหมู่ : ${item.name_categories ? item.name_categories : "-"}</p>
                                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <b class="text-danger">${item.name_subs_categories ? item.name_subs_categories : "-"}</b></p>
                                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <b class="text-primary">${item.device_code ? item.device_code : "-"}</b></p>
                                <div class="repair_detail row">

                                    <div class="col-12 col-md-4">
                                        <div>
                                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                                            <hr class="my-2">
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ${item.name_user ? item.name_user : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : ${item.phone_user ? item.phone_user : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ${item.email_user ? item.email_user : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : ${item.position_user ? item.position_user : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ${item.department_user ? item.department_user : "-"}</p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div>
                                            <h5 class="mb-0 text-danger" style="font-weight: bolder;">สถานที่และปัญหา</h5>
                                            <hr class="my-2">
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">ปัญหา : ${item.title ? item.title : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียด : ${item.detail_title ? item.detail_title : "-"}</p>
                                            <p class="overflow-dot mb-0 mt-2" style="font-weight: bold;">สถานที่ : ${item.name_area ? item.name_area : "-"}</p>
                                            <p class="overflow-dot mb-0" style="font-weight: bold;">รายละเอียดสถานที่ : ${item.detail_location ? item.detail_location : "-"}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div>
                                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                                            <hr class="my-2">
                                            ${officerHTML}

                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="float-end mb-0">${formattedDate}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

                document.querySelector('#div_container').insertAdjacentHTML('beforeend', htmlContent);
            });

        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    }

    // ฟังก์ชันสร้างดาว
    function generateStars(rating) {
        const stars = [];
        const fullStars = Math.floor(rating); // คะแนนเต็ม
        const halfStars = rating % 1 >= 0.5 ? 1 : 0; // คะแนนครึ่ง
        const emptyStars = 5 - fullStars - halfStars; // คะแนนว่าง

        for (let i = 0; i < fullStars; i++) {
            stars.push('<i class="fa-solid fa-star" style="color:#FFD058"></i>');
        }
        for (let i = 0; i < halfStars; i++) {
            stars.push('<i class="fa-solid fa-star-half-stroke" style="color:#FFD058"></i>');
        }
        for (let i = 0; i < emptyStars; i++) {
            stars.push('<i class="fa-solid fa-star" style="color:#e0e0e0"></i>');
        }

        return stars.join('');
    }

    // ฟังก์ชันสำหรับแปลงวันที่
    function formatThaiDate(datetime) {
        const months = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];

        // แปลง string เป็น Date object
        const dateObj = new Date(datetime);

        // ดึงข้อมูลวัน เดือน ปี และเวลา
        const day = dateObj.getDate();
        const month = months[dateObj.getMonth()];
        const year = dateObj.getFullYear() + 543; // เพิ่ม 543 สำหรับปีพุทธศักราช
        const hours = dateObj.getHours().toString().padStart(2, '0'); // เติม 0 หากชั่วโมงเป็นตัวเลขหลักเดียว
        const minutes = dateObj.getMinutes().toString().padStart(2, '0'); // เติม 0 หากนาทีเป็นตัวเลขหลักเดียว

        // คืนค่าข้อความในรูปแบบที่ต้องการ
        return `วันที่แจ้ง : ${day} ${month} ${year} เวลา ${hours}.${minutes} น.`;
    }


</script>

<script>
    const change_select_active = (type_active) => {

        //console.log(type_active);
        document.querySelector('#btn_select_active_repair').classList.remove('active');
        document.querySelector('#btn_select_active_wait').classList.remove('active');
        document.querySelector('#btn_select_active_progress').classList.remove('active');
        document.querySelector('#btn_select_active_success').classList.remove('active');

        document.querySelector('#btn_select_active_' + type_active).classList.add('active');

        data_type_active = type_active;
    }
</script>
@endsection
