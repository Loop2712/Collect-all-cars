@extends('layouts.viicheck')

@section('content')

<style>
    footer,
    header,
    #topbar {
        display: none !important;
    }

    select option {
        background: white !important;
        color: #212925 !important;
    }

    #cardInfo{
        background-color: #deeef8;
    }
    #cardOfficer{
        background-color: #f5dfcd;
    }

    /* ปรับแต่งรูปแบบ input date ให้คลิกตรงไหนก็ได้ */
    input[type="date"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* ซ่อน icon ของ date picker */
    input[type="date"]::-webkit-calendar-picker-indicator {
        display: none;
    }

    .bg_warning_missed_data{
        background-color: #f37151;
    }

</style>

<!-- Modal ตารางงานช่าง -->
<div class="modal fade" id="modal_schedule" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_btn_open_modal_schedule" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title notranslate" id="Label_btn_open_modal_schedule">
                    <i class="fa-solid fa-calendar-days"></i> ตารางงาน
                </h5>
                <span type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body notranslate" id="modal_schedule_content">
                <!-- CONTENT -->
            </div>
            <hr>
            <div>
                <center>
                    <span style="width:35%;" type="button" class="btn btn-primary" data-dismiss="modal">ปิด</span>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Modal เพิ่มวัสดุ -->
<div class="modal fade" id="modal_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_btn_open_modal_material" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title notranslate" id="Label_btn_open_modal_material">
                    <i class="fa-solid fa-calendar-days"></i> เพิ่มวัสดุ
                </h5>
                <span id="modal_material_close_btn" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body notranslate" id="modal_material_content">
                <div id="material-inputs">
                    <div class="form-group d-flex justify-content-between material-row">
                        <input class="form-control" style="width: 70%;" type="text" name="material_name[]" placeholder="ชื่อ">
                        <input class="form-control" style="width: 25%;" type="number" name="material_quantity[]" placeholder="จำนวน">
                    </div>
                </div>
                <button type="button" class="btn btn-success" id="add-row"><i class="fa-solid fa-plus"></i></button>
            </div>
            <hr>
            <div>
                <center>
                    <span style="width:35%;" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</span>
                    <span style="width:35%;" type="button" class="btn btn-primary" id="save-materials" >บันทึก</span>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-12 col-lg-12 my-4">
    <div id="cardInfo" class="card radius-10 mb-2">
        <div class="row p-4">

            <div class="d-flex my-3 justify-content-between flex-wrap">
                <div class="d-flex">
                    <i class="fa-regular fa-screwdriver-wrench me-1 text-dark" style="font-size: 22px;"></i>
                    <h4 class="mb-0 text-dark"><b>รายละเอียดการแจ้งซ่อม</b></h4>
                </div>
                <div>
                    <b style="font-size: 16px; color:#000000;">วันที่แจ้ง : <span style="font-weight: normal; color:#6c757d;">32 ธันวาคม 3024 เวลา 00.00 น.</span></b>
                </div>
            </div>

            <div class="w-100 p-2">
                <p class="h5" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</p>
                <p class="h5 mr-2 " style="font-weight: bold;">หมวดหมู่ย่อย : <span class="text-danger">เครื่องปริ้น</span></p>
                <p style="font-weight: bold;font-size: 18px;">รหัสอุปกรณ์ : <span class="text-primary">ไม่มี</span></p>



                <div class="repair_detail row">
                    <div class="col-12 col-md-4 mb-2">
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
                            <h5 class="mb-0 text-primary" style="font-weight: bolder;">ข้อมูลผู้แจ้ง</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ชื่อผู้แจ้ง : ............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">เบอร์ : .............</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">E-Mail : ........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ตำแหน่ง : .........</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">แผนก : ............</p>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-md-4">
                        <div>
                            <h5 class="mb-0 text-info" style="font-weight: bolder;">ผู้รับผิดชอบ</h5>
                            <hr class="my-2">
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 1 : deer</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 2 : benze</p>
                            <p class="overflow-dot mb-0" style="font-weight: bold;">ผู้รับผิดชอบ 3 : lucky</p>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

    <div id="testCard" class="card radius-10 mb-2">

    </div>

    <div id="cardOfficer" class="card radius-10 mb-2">
        <div class="row p-4">
            <div  style="text-align: right;">
                <div class="dropdown float-end px-1">
                    <select class="form-select btn-secondary" id="select_status_repair" onchange="select_status_repair(this)">
                        <option selected="" value="ทั้งหมด">เลือกสถานะ</option>
                        <option value="รอดำเนินการ" class="text-warning">รอดำเนินการ</option>
                        <option value="ไม่สามารถดำเนินการได้" class="text-danger">ไม่สามารถดำเนินการได้</option>
                        <option value="เสร็จสิ้น" class="text-success">เสร็จสิ้น</option>
                    </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
                <label for="full_name" class="control-label">{{ 'รหัสอุปกรณ์' }}</label>
                <input required class="form-control" name="full_name" type="text" id="full_name" value="" >
                {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('datetime_start') ? 'has-error' : ''}}">
                <div class="mx-auto mb-2">
                    <label for="datetime_start" class="control-label">{{ 'วันที่คาดว่าจะเริ่มดำเนินการ' }}</label>
                    <span class="btn btn-warning" style="float: right;"  data-toggle="modal" data-target="#modal_schedule" onclick="createWorkCalendar();"><i class="fa-solid fa-calendar-days"></i></span>
                </div>
                <input required class="form-control datepicker" name="datetime_start" type="text" id="datetime_start" value="">
            </div>
            <div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
                <label for="department" class="control-label">{{ 'วันที่คาดว่าจะเสร็จสิ้น' }}</label>
                <input required class="form-control" name="department" type="date" id="department" value="" >
                {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('material') ? 'has-error' : ''}}">
                <div class="mx-auto mb-2">
                    <label for="material" class="control-label">{{ 'วัสดุ / อุปกรณ์ที่ใช้ในการซ่อม ' }}</label>
                    <span class="btn btn-warning" style="float: right; "  data-toggle="modal" data-target="#modal_material" ><i class="fa-solid fa-plus"></i></span>
                </div>
                <input disabled required class="form-control" name="material" type="textarea" id="material" value="" >
                {!! $errors->first('material', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                <label for="position" class="control-label">{{ 'ค่าใช้จ่ายในการซ่อม' }}</label>
                <input required class="form-control" name="position" type="text" id="position" value="" >
                {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                <label for="position" class="control-label">{{ 'หลักฐานค่าใช้จ่าย(ไม่เกิน 10 รูป)' }}</label>
                <input required class="form-control" name="position" type="text" id="position" value="" >
                {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                <label for="position" class="control-label">{{ 'ข้อคิดเห็นจากช่างหรือผู้รับผิดชอบ' }}</label>
                <input required class="form-control" name="position" type="text" id="position" value="" >
                {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-md-4 mb-2 " style="float: right;">
        <button class="btn btn-success w-100">บันทึก</button>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- fullCalendar -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        dateTimeStartFormat(); //ฟังชั่นสำหรับวันที่คาดว่าจะเริ่มดำเนินการ
    });
</script>

<script> //ฟังก์ชันสำหรับตัวเปลี่ยนสถานะ
    let previousStatusValue = document.querySelector('#select_status_repair').value;

    function select_status_repair(selectObject) {
            let select_status_repair = document.querySelector('#select_status_repair');

            Swal.fire({
                title: "ต้องการบันทึกการเปลี่ยนแปลงหรือไม่?",
                showDenyButton: true,
                showCancelButton: false,
                imageUrl: "{{url('img/stickerline/PNG/7.png')}}",
                imageWidth: 270,
                imageHeight: 220,
                imageAlt: "Custom image",
                confirmButtonText: "บันทึก",
                denyButtonText: `ไม่บันทึก`
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");

                    Swal.fire({
                        icon: "success",
                        title: "บันทึกการเปลี่ยนแปลงเรียบร้อย",
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    })
                    previousStatusValue = selectObject.value; // อัปเดตค่าเมื่อบันทึก
                    updateClassBasedOnValue(selectObject.value, select_status_repair);
                } else if (result.isDenied) {
                    // Swal.fire("ไม่บันทึกการเปลี่ยนแปลง", "", "info");
                    Swal.fire({
                        icon: "info",
                        title: "ไม่บันทึกการเปลี่ยนแปลง",
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    })
                    select_status_repair.value = previousStatusValue; // คืนค่ากลับไปเป็นค่าเดิม
                }
            });
        }

        function updateClassBasedOnValue(value, selectElement) {
            if (value == "ไม่สามารถดำเนินการได้") {
                selectElement.setAttribute('class', 'form-select btn-danger');
            } else if (value == "รอดำเนินการ") {
                selectElement.setAttribute('class', 'form-select btn-warning text-dark');
            } else if (value == "เสร็จสิ้น") {
                selectElement.setAttribute('class', 'form-select btn-success');
            } else {
                selectElement.setAttribute('class', 'form-select btn-secondary');
            }
        }


</script>


<style>
    .fc-toolbar-title { /* อักษร header schedule */
        font-size: 1rem !important;
        font-family: 'Mitr', sans-serif !important;
    }

    .fc .fc-button { /* ปุ่ม header schedule */
        font-size: 0.75rem !important;
        font-family: 'Mitr', sans-serif !important;
    }
</style>

<script>  //ฟังก์ชันสำหรับตารางงานเจ้าหน้าที่
    const createWorkCalendar = () => {
        let formattedDateNow = new Date().toISOString().split('T')[0];
        // console.log(formattedDateNow); // 2024-09-09

        // ตรวจสอบขนาดหน้าจอ
        let initialView = window.innerWidth <= 768 ? 'listWeek' : 'dayGridMonth';

        let calendarEl = document.getElementById('modal_schedule_content');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'th', // Set locale to Thai

            initialView: initialView, // ใช้มุมมองที่เหมาะสมตามขนาดหน้าจอ
            initialDate: formattedDateNow,
            // navLinks: true, // คลิ๊กที่เลขวันหรือเดือน เพื่อแสดงผลรูปแบบวันหรือเดือน
            selectable: true,
            nowIndicator: true,
            // editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // อนุญาตให้แสดงปุ่ม more เพื่อดูข้อมูลทั้งหมด
            events: [{
                title: 'ช่าง A : คอมพิวเตอร์ ชั้น 2',
                start: '2024-10-12',
                // color: getRandomColor(),
                color: 'rgb(41, 204, 57 ,0.5)',
            }, {
                title: 'ช่าง B : คอมพิวเตอร์ ชั้น 3',
                start: '2024-10-12',
                color: 'rgb(41, 204, 57 ,0.5)',
            },{
                title: 'ช่าง C : เครื่องปริ้น ชั้น 1-A',
                start: '2024-10-12',
                color: 'rgb(41, 204, 57 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 3',
                start: '2024-10-24',
                color: 'rgb(94, 216, 240 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 4',
                start: '2024-10-24',
                color: 'rgb(94, 216, 240 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-10-16',
                color: 'rgb(230, 46, 46,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-10-23',
                color: 'rgb(230, 46, 46,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-10-22',
                color: 'rgb(230, 46, 46,0.5)',
            }, {
                title: 'ช่าง Benze : หลอดไฟ ชั้น 10',
                start: '2024-10-12',
                end: '2024-10-16',
                color: 'rgb(230, 46, 46,0.5)',
            }],
            eventContent: function (arg) {
                let eventTitle = document.createElement('div');
                eventTitle.textContent = arg.event.title;
                eventTitle.setAttribute('class', 'eventTitle');

                let circle = document.createElement('span');
                circle.setAttribute('class', 'event-circle');

                // circle.style.backgroundColor = arg.event.backgroundColor || arg.event.color;
                // circle.style.backgroundColor = getRandomColor();


                let container = document.createElement('div');
                container.setAttribute('class', 'event-container');

                container.appendChild(circle);
                container.appendChild(eventTitle);

                return { domNodes: [container] };
            },
            eventDidMount: function (info) {
                info.el.style.border = '1px solid #000'; // เพิ่มขอบสีดำ
            }
        });
        calendar.render();
    }
</script>

<script>
    const dateTimeStartFormat = () => { //ฟังชั่นสำหรับวันที่คาดว่าจะเริ่มดำเนินการ
        let datetime_start = document.getElementById('datetime_start');

        // เปิด date picker ทันทีที่คลิก
        datetime_start.addEventListener('focus', function () {
            this.type = 'date';  // เปลี่ยนเป็น date เมื่อ focus
            this.click();  // เปิด date picker ทันทีเมื่อคลิก
        });

        datetime_start.addEventListener('blur', function () {
            if (this.value) {
                const dateValue = new Date(this.value);
                const day = ('0' + dateValue.getDate()).slice(-2);
                const month = ('0' + (dateValue.getMonth() + 1)).slice(-2);
                const year = dateValue.getFullYear();
                this.value = `${day}/${month}/${year}`;  // แปลงเป็น dd/mm/yyyy
            } else {
                this.type = 'text';  // เปลี่ยนกลับเป็น text ถ้าไม่มีค่า
                this.placeholder = 'dd/mm/yyyy';
            }
        });

        // ทำให้เมื่อคลิกตรงไหนก็ได้ของ input จะเปิด date picker
        datetime_start.addEventListener('click', function () {
            this.showPicker();  // คำสั่งเปิด date picker
        });
    }
</script>

<script> // สำหรับ เพิ่ม material
    document.getElementById('add-row').addEventListener('click', function() {
        // สร้างแถวใหม่
        let newRow = document.createElement('div');
        newRow.classList.add('form-group', 'd-flex', 'justify-content-between', 'material-row');
        newRow.innerHTML = `
            <input class="form-control" style="width: 70%;" type="text" name="material_name[]" placeholder="ชื่อ">
            <input class="form-control" style="width: 25%;" type="number" name="material_quantity[]" placeholder="จำนวน">
        `;
        document.getElementById('material-inputs').appendChild(newRow);
    });

    document.getElementById('save-materials').addEventListener('click', function() {
        // ดึงข้อมูลจาก modal
        let materials = [];
        let materialRows = document.querySelectorAll('.material-row');
        let hasError = false;

        materialRows.forEach(function(row) {
            let name = row.querySelector('input[name="material_name[]"]').value;
            let quantity = row.querySelector('input[name="material_quantity[]"]').value;

            if (name && !quantity) {
                // ถ้ามีชื่อ แต่ไม่มีจำนวน
                // alert("กรุณากรอกจำนวนสำหรับวัสดุ: " + name);
                row.querySelector('input[name="material_quantity[]"]').classList.add('bg_warning_missed_data'); // เพิ่ม bg_warning_missed_data
                hasError = true; // มีข้อผิดพลาด
            } else if (!name && quantity) {
                // ถ้ามีชื่อ แต่ไม่มีจำนวน
                // alert("กรุณากรอกชื่อสำหรับวัสดุ: " + quantity);
                row.querySelector('input[name="material_name[]"]').classList.add('bg_warning_missed_data'); // เพิ่ม bg_warning_missed_data
                hasError = true; // มีข้อผิดพลาด
            } else if (name && quantity){
                // ถ้ามีชื่อและจำนวนครบ
                materials.push(`${name} ${quantity}`);
            }

        });

        if (!hasError) {
            // ตรวจสอบว่า materials ไม่ว่างก่อนที่จะ join
            if (materials.length > 0) {
                document.getElementById('material').value = materials.join(' , ');
            } else {
                document.getElementById('material').value = ''; // ถ้าไม่มีข้อมูล ให้เป็นค่าว่าง
            }
            document.getElementById('modal_material_close_btn').click(); // ปิด modal
        }
    });

    document.getElementById('save-materials').addEventListener('click', function() {
        addInputListeners();
    });

    // ฟังก์ชันสำหรับเพิ่ม event listener ให้กับ input สำหรับชื่อและจำนวน
    function addInputListeners() {
        document.querySelectorAll('input[name="material_name[]"], input[name="material_quantity[]"]').forEach(function(input) {
            input.addEventListener('input', function() {
                let row = this.closest('.material-row');
                let name = row.querySelector('input[name="material_name[]"]').value;
                let quantity = row.querySelector('input[name="material_quantity[]"]').value;
                let index = Array.from(row.parentNode.children).indexOf(row) + 1;

                if (this.name === 'material_name[]') {
                    if (this.value && quantity) {
                        this.classList.remove('bg_warning_missed_data');
                        row.querySelector('input[name="material_quantity[]"]').classList.remove('bg_warning_missed_data');
                        console.log(`Removed bg_warning_missed_data from row ${index}: ${this.value} ${quantity}`);
                    }
                    // else {
                    //     if (!this.value) {
                    //         this.classList.add('bg_warning_missed_data');
                    //     }
                    // }
                } else if (this.name === 'material_quantity[]') {
                    if (name && this.value) {
                        this.classList.remove('bg_warning_missed_data');
                        row.querySelector('input[name="material_name[]"]').classList.remove('bg_warning_missed_data');
                        console.log(`Removed bg_warning_missed_data from row ${index}: ${name} ${this.value}`);
                    }
                    // else {
                    //     if (!this.value) {
                    //         this.classList.add('bg_warning_missed_data');
                    //     }
                    // }
                }
            });
        });
    }

</script>




@endsection
