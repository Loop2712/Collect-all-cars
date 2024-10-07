
<style>
    .category {
        display: flex;
        align-items: center;
        /* justify-content: center; */
        flex-wrap: wrap;
    }

    .circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 10px;
    }

    .category-item {
        display: flex;
        align-items: center;
        margin-right: 20px;
        margin-bottom: 10px;
    }

    .square {
        width: 20px;
        height: 20px;
        display: inline-block;
        margin-right: 10px;
        border:#000000 1px solid;
    }

    /*======== Calendar =============*/
    .event-container {
        display: flex;
        align-items: center;
        padding-top: 2px;
        overflow: hidden;
    }

    .event-circle {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border:#000000 1px solid;
        display: inline-block;
        margin-right: 5px;
        margin-left: 5px;
        flex-shrink: 0;
    }

    .eventTitle{
        color: #000000;
        padding-left: 5px;
        font-weight: normal;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    #sidebarWorkCalendar {
        position: relative;
        border-radius: 5px;
        background-color: #d1e9ce;
        padding: 15px;
        right: -100%;
        max-width: 400px;
        transition: right 0.2s ease; /* เพิ่ม transition เพื่อให้เกิดแอนิเมชัน */
        z-index: 1000; /* ให้ sidebar อยู่ด้านบน */
        overflow: hidden;
        display: none;
    }

    #sidebarWorkCalendar.open {
        right: 0; /* แสดง sidebar โดยเลื่อนกลับมาที่ตำแหน่งเดิม */
        display: block;
    }

    #close-sidebar {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 25px;
        height: 25px;
        border:#afaeae solid 1px;
        border-radius: 10px;
    }

    .calendar-header {
        text-align: center;
        margin-bottom: 20px;
    }



    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        /* gap: 10px; */
    }

    .day-header {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #dee2e6;
    }

    .day-header-color{
        background-color: #41dd3b;
    }

    .day-cell {
        padding: 10px;
        border: 1px solid #dee2e6;
        position: relative;
        min-height: 120px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        padding-top: 25px;
        /* เพิ่มพื้นที่ให้กับวันที่ */
    }

    .day-cell .date-number {
        position: absolute;
        top: 5px;
        left: 10px;
        font-weight: bold;
    }

    .day-cell.selected {
        background-color: #FFDAB9 !important; /* สีส้มอ่อน */
    }

    .day-cell.today {
        background-color: #ADD8E6; /* สีฟ้าอ่อน */
    }


    .task {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        margin-top: 10px; /* เพิ่มระยะห่างระหว่างวันที่และงาน */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 0.8rem;
    }

    .task .circle_calendar {
        width: 12px;
        height: 12px;
        flex-shrink: 0; /* ป้องกันการถูกดัน */
        border-radius: 50%;
        margin-right: 5px;
    }

    .more-tasks {
        margin-top: auto;
        font-size: 0.8rem;
        color: #007bff;
        cursor: pointer;
    }

    .day-cell.next-month {
        background-color: #f0f0f0;
        /* เปลี่ยนสีพื้นหลังตามต้องการ */
        color: #888;
        /* เปลี่ยนสีข้อความตามต้องการ */
    }

    @media (min-width: 768px) {}

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .day-cell {
            min-height: 100px;
            padding: 5px;
            padding-top: 20px;
            /* ลดขนาด padding-top ในหน้าจอขนาดเล็ก */
        }

        .task {
            font-size: 0.8rem;
            margin-top: 5px;
            /* ลดระยะห่างในหน้าจอขนาดเล็ก */
        }

        .calendar {
            gap: 5px;
        }
    }

    @media (max-width: 576px) {
        .calendar {
            grid-template-columns: repeat(2, 1fr);
            gap: 5px;
        }

        .day-header {
            padding: 5px;
            font-size: 0.8rem;
        }
    }

    /*======== End Calendar =========*/
</style>

<!--=============== 4 card row =====================-->
<hr>
<div class="col-12 d-flex justify-content-end mb-2">
    <span class="text-dark font-weight-bold font-24" style="float: right;">รวมทั้งหมด 30 เคส</span>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="py-2 px-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0 text-dark font-weight-bold">แจ้งซ่อม</h3>
                        {{-- <h6 class="mb-0 text-dark font-weight-bold">เดือนนี้ <b>(5)</b></h6> --}}
                    </div>
                    <div class="ms-auto text-dark">
                        <span class="text-dark font-weight-bold font-50">15</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card radius-10 overflow-hidden bg-gradient-kyoto">
            <div class="py-2 px-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0 text-dark font-weight-bold">รอดำเนินการ</h3>
                        {{-- <h6 class="mb-0 text-dark font-weight-bold">เดือนนี้ <b>(2)</b></h6> --}}
                    </div>
                    <div class="ms-auto text-dark">
                        <span class="text-dark font-weight-bold font-50">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card radius-10 overflow-hidden bg-gradient-blues">
            <div class="py-2 px-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0 text-dark font-weight-bold">กำลังดำเนินการ</h3>
                        {{-- <h6 class="mb-0 text-dark font-weight-bold">เดือนนี้ <b>(1)</b></h6> --}}
                    </div>
                    <div class="ms-auto text-dark">
                        <span class="text-dark font-weight-bold font-50">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card radius-10 overflow-hidden bg-gradient-lush">
            <div class="py-2 px-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0 text-dark font-weight-bold">เสร็จสิ้น</h3>
                        {{-- <h6 class="mb-0 text-dark font-weight-bold">เดือนนี้ <b>(2)</b></h6> --}}
                    </div>
                    <div class="ms-auto text-dark">
                        <span class="text-dark font-weight-bold font-50">5</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======= ตารางงานช่าง - รูปแบบปฎิทิน ============-->
<div class="card p-4 d-none d-lg-block">
    <div id="cateDiv" class="category">
        <!-- เพิ่มหมวดหมู่เพิ่มเติมที่นี่ -->
    </div>
    <hr>

    <div class="my-4">
        <div class="row">
            <div class="d-flex justify-content-end mb-4">
                <div class="mx-1 d-flex justify-content-center align-items-center">
                    <div class="square" style="background-color: rgb(94, 216, 240 ,0.5);"></div>
                    <span style="font-weight: bold; color:#000000;">กำลังดำเนินการ</span>
                </div>
                <div class="mx-1 d-flex justify-content-center align-items-center">
                    <div class="square" style="background-color: rgb(230, 46, 46,0.5);"></div>
                    <span style="font-weight: bold; color:#000000;">เลยกำหนด</span>
                </div>
                <div class="mx-1 d-flex justify-content-center align-items-center">
                    <div class="square" style="background-color: rgb(41, 204, 57 ,0.5);"></div>
                    <span style="font-weight: bold; color:#000000;">เสร็จสิ้น</span>
                </div>
            </div>

            <div class="col-12" id="calendar-container">
                <div id="workCalendar"></div>
            </div>

            <div class="col-2" id="sidebarWorkCalendar" >
                <button id="close-sidebar" class="d-flex justify-content-center align-items-center">
                    <i class="fa-sharp fa-solid fa-xmark" style="font-size:12px;"></i>
                </button>
                <div id="sidebar-content">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

</div>

<!--======= รายการแจ้งซ่อม 10 ลำดับ ล่าสุด ============-->
<div class="row ">
    <div class="col-12 col-lg-12 mb-3">
        <div class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0">รายการแจ้งซ่อม <span id="count_news_officer">10</span> ลำดับ
                            ล่าสุด</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/demo_all_repair') }}" target="_blank">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="">
                            <tr>
                                <th>ผู้แจ้งซ่อม</th>
                                <th>เบอร์ติดต่อ</th>
                                <th>พื้นที่</th>
                                <th>หมวดหมู่</th>
                                <th>รหัสอุปกรณ์</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody id="teble_fix" class="fz_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======= คะแนนการช่วยเหลือต่อเคส 5 อันดับ ============-->
<div class="row mb-4">
    <div class="col-12 col-md-5 d-flex align-items-stretch">
        <div class="row ">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100 ">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">การแจ้งซ่อมที่เร็วที่สุด <span
                                        id="count_data_sos_fastest_5">5</span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item"
                                        href="{{ url('/demo_all_repair_fastest') }}" target="_blank">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>ผู้รับผิดชอบ</th>
                                        <th>ระยะเวลา</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_fix_fastest">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-danger">การแจ้งซ่อมที่ช้าที่สุด <span
                                        id="count_data_sos_slowest_5">5</span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item"
                                        href="{{ url('/demo_all_repair_fastest') }}" target="_blank">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>ผู้รับผิดชอบ</th>
                                        <th>ระยะเวลา</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_fix_slowest">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7 d-flex align-items-stretch">
        <!-- การปฏิบัติการ -->
        <div class="card radius-10 w-100 ">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0">จำนวนการซ่อมอุปกรณ์ <span id="count_news_officer">5</span>
                            ลำดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/demo_all_used_repair') }}" target="_blank">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="">
                            <tr>
                                <th class="text-start">รหัสอุปกรณ์	</th>
                                <th class="text-start">ชื่อ</th>
                                <th class="text-center">หมวดหมู่</th>
                                <th class="text-center">จำนวนการซ่อมบำรุง/ครั้ง</th>
                            </tr>
                        </thead>
                        <tbody id="teble_all_used_fix" class="fz_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        createCategories();
        createWorkCalendar();
    });
    const createCategories = () => {
        let cateData = [];

        // สร้าง 15 ข้อมูล
        for (let i = 1; i <= 15; i++) {
            cateData.push({
                name: `หมวดหมู่ ${i}`,
                color: getRandomColor()
            });
        }

        // สร้าง HTML และแทรกลงใน #cateDiv
        let htmlCate = cateData.map(element => `
            <div class="category-item">
                <div class="circle" style="background-color: ${element.color};"></div>
                <span>${element.name}</span>
            </div>
        `).join('');

        document.querySelector('#cateDiv').insertAdjacentHTML('afterbegin', htmlCate); // แทรกบนสุด

    }

    const createWorkCalendar = () => {
        const formattedDateNow = new Date().toISOString().split('T')[0];
        // console.log(formattedDateNow); // 2024-09-09

        let calendarEl = document.getElementById('workCalendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'th', // Set locale to Thai
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            buttonText: {
                today: 'วันนี้',
                month: 'เดือน',
                week: 'สัปดาห์',
                day: 'วัน',
                list: 'รายการ'
            },
            initialView: 'dayGridMonth',
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
                start: '2024-09-12',
                // color: getRandomColor(),
                color: 'rgb(41, 204, 57 ,0.5)',
            }, {
                title: 'ช่าง B : คอมพิวเตอร์ ชั้น 3',
                start: '2024-09-12',
                color: 'rgb(41, 204, 57 ,0.5)',
            },{
                title: 'ช่าง C : เครื่องปริ้น ชั้น 1-A',
                start: '2024-09-12',
                color: 'rgb(41, 204, 57 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 3',
                start: '2024-09-24',
                color: 'rgb(94, 216, 240 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 4',
                start: '2024-09-24',
                color: 'rgb(94, 216, 240 ,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-09-12',
                color: 'rgb(230, 46, 46,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-09-23',
                color: 'rgb(230, 46, 46,0.5)',
            },{
                title: 'ทดสอบ ตารางงาน 5',
                start: '2024-09-22',
                color: 'rgb(230, 46, 46,0.5)',
            }, {
                title: 'ช่าง Benze : หลอดไฟ ชั้น 10',
                start: '2024-09-12',
                end: '2024-09-16',
                color: 'rgb(230, 46, 46,0.5)',
            }],
            eventContent: function (arg) {
                let eventTitle = document.createElement('div');
                eventTitle.textContent = arg.event.title;
                eventTitle.setAttribute('class', 'eventTitle');

                let circle = document.createElement('span');
                circle.setAttribute('class', 'event-circle');

                // circle.style.backgroundColor = arg.event.backgroundColor || arg.event.color;
                circle.style.backgroundColor = getRandomColor();


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
