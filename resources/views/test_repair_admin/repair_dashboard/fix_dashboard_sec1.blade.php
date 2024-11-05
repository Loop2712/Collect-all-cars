
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
        #workCalendar{
            height: 70vh;
        }

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
    <span id="amount_total_maintains" class="text-dark font-weight-bold font-24" style="float: right;"></span>
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
                        <span id="amount_repair_maintains" class="text-dark font-weight-bold font-50"></span>
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
                        <span id="amount_pending_maintains" class="text-dark font-weight-bold font-50"></span>
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
                        <span id="amount_progress_maintains" class="text-dark font-weight-bold font-50"></span>
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
                        <span id="amount_success_maintains" class="text-dark font-weight-bold font-50"></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======= ตารางงานช่าง - รูปแบบปฎิทิน ============-->
<div class="card p-4 ">
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
                        <h5 class="font-weight-bold mb-0">รายการแจ้งซ่อม <span id="count_table_fix"></span> ลำดับ
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
                                <th>พื้นที่</th>
                                <th>หมวดหมู่</th>
                                <th>หมวดหมู่ย่อย</th>
                                <th>รหัสอุปกรณ์</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody id="table_fix" class="fz_body">

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
                                        id="count_table_fix_fastest"></span> อันดับ</h5>
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
                                        <th class="text-center">ระยะเวลา</th>
                                    </tr>
                                </thead>
                                <tbody id="table_fix_fastest">

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
                                        id="count_table_fix_slowest"></span> อันดับ</h5>
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
                                <tbody id="table_fix_slowest">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7 d-flex align-items-stretch">
        <!-- จำนวนการซ่อมอุปกรณ์ 5 ลำดับมากสุด -->
        <div class="card radius-10 w-100 ">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0">จำนวนการซ่อมอุปกรณ์ <span id="count_teble_all_used_fix"></span>
                            ลำดับมากสุด</h5>
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
                                <th class="text-start">รหัสอุปกรณ์</th>
                                <th class="text-start">ชื่อ</th>
                                <th class="text-start">พื้นที่</th>
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

</style>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    let partner_id = '{{ $data_partner->id }}';

    document.addEventListener('DOMContentLoaded', function () {
        createWorkCalendar();

        // ฟังก์ชันดึงข้อมูล
        getAllMaintains();
        getAmountMaintains();
        getFastestMaintains();
        getSlowestMaintains();
    });

    const createCategories = (result) => {
        let cateData = [];
        let seenCategories = new Set(); // ใช้ Set เพื่อเก็บชื่อหมวดหมู่ที่ไม่ซ้ำกัน

        result.forEach(item => {
            // ตรวจสอบว่าชื่อหมวดหมู่เคยถูกเพิ่มไปแล้วหรือไม่
            if (!seenCategories.has(item.name_categories)) {
                cateData.push({
                    name: item.name_categories,
                    color: '#' + item.color_categories + 'CC',
                });
                seenCategories.add(item.name_categories);
            }
        });

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
        fetch("{{ url('/') }}/api/WorkCalendarDashboard/" + partner_id)
            .then(response => response.json())
            .then(result => {
                console.log("result createWorkCalendar");
                console.log(result);

                let formattedDateNow = new Date().toISOString().split('T')[0];
                // ตรวจสอบขนาดหน้าจอ
                let initialView = window.innerWidth <= 768 ? 'listWeek' : 'dayGridMonth';

                let calendarEl = document.getElementById('workCalendar');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'th', // Set locale to Thai
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        // right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                        // right: 'dayGridMonth,listWeek',
                        right: '',

                    },
                    buttonText: {
                        today: 'วันนี้',
                        month: 'เดือน',
                        week: 'สัปดาห์',
                        day: 'วัน',
                        list: 'รายการ'
                    },
                    initialView: initialView,
                    initialDate: formattedDateNow,
                    // navLinks: true, // คลิ๊กที่เลขวันหรือเดือน เพื่อแสดงผลรูปแบบวันหรือเดือน
                    selectable: true,
                    nowIndicator: true,
                    // editable: true,
                    selectable: true,
                    businessHours: true,
                    dayMaxEvents: true, // อนุญาตให้แสดงปุ่ม more เพื่อดูข้อมูลทั้งหมด
                    events: [],
                    eventContent: function (arg) {
                        let eventTitle = document.createElement('div');
                        eventTitle.textContent = arg.event.title;
                        eventTitle.setAttribute('class', 'eventTitle');

                        // ใช้ color จาก event.color_categories
                        let circle = document.createElement('span');
                        circle.setAttribute('class', 'event-circle');
                        circle.style.backgroundColor = '#' + arg.event.extendedProps.color_categories;

                        // // เพิ่มปุ่มขวาสุด
                        let actionButton = document.createElement('a');
                        actionButton.className = 'event-action-button';
                        actionButton.href = '{{ url('demo_repair_admin_view') }}'; // ใส่ URL ที่ต้องการลิงค์ไป
                        actionButton.target = "_blank";
                        actionButton.innerHTML = `<i class="fa-solid fa-chevrons-right"></i>`;

                        // เพิ่ม event สำหรับการซ่อน tooltip เมื่อชี้ปุ่ม
                        actionButton.addEventListener('mouseenter', () => {
                            const tooltip = document.querySelector('.tooltip-custom');
                            if (tooltip) tooltip.style.display = 'none';
                        });
                        actionButton.addEventListener('mouseleave', () => {
                            const tooltip = document.querySelector('.tooltip-custom');
                            if (tooltip) tooltip.style.display = 'block';
                        });

                        let container = document.createElement('div');
                        container.setAttribute('class', 'event-container');

                        container.appendChild(circle);
                        container.appendChild(eventTitle);
                        container.appendChild(actionButton);

                        // info.el.innerHTML = ''; // ลบเนื้อหาเดิมออก
                        // info.el.appendChild(eventContainer); // เพิ่มเนื้อหาใหม่

                        return { domNodes: [container] };
                    },
                    eventDidMount: function (info) {
                        // เรียกใช้ฟังก์ชัน getColorDeadLine และกำหนดเป็นสีพื้นหลัง
                        let backgroundColor = getColorDeadLine(info.event.extendedProps);
                        info.el.style.backgroundColor = backgroundColor; // ตั้งค่าพื้นหลังของอีเวนต์
                        info.el.style.border = '1px solid #000'; // เพิ่มขอบสีดำ

                        // ค้นหา element .eventTitle ภายใน info.el
                        let eventTitle = info.el.querySelector('.eventTitle');
                        if (eventTitle) {
                            let tooltip;

                            eventTitle.addEventListener('mouseenter', function (e) {
                                // สร้าง tooltip เมื่อมีการชี้ไปที่อีเวนต์
                                tooltip = document.createElement('div');
                                tooltip.className = 'tooltip-custom';
                                tooltip.innerHTML = `
                                    <strong>อุปกรณ์ : </strong>${info.event.extendedProps.name}<br>
                                    <strong>เจ้าหน้าที่ : </strong>${info.event.extendedProps.officer}
                                `;
                                document.body.appendChild(tooltip);

                                // ตั้งตำแหน่งของ tooltip
                                tooltip.style.display = 'block';
                                tooltip.style.left = e.pageX + 'px';
                                tooltip.style.top = e.pageY + 'px';
                            });

                            eventTitle.addEventListener('mousemove', function (e) {
                                // ปรับตำแหน่ง tooltip ตามการเคลื่อนที่ของเมาส์
                                if (tooltip) {
                                    tooltip.style.left = e.pageX + 'px';
                                    tooltip.style.top = e.pageY + 'px';
                                }
                            });

                            eventTitle.addEventListener('mouseleave', function () {
                                // ซ่อนและลบ tooltip เมื่อออกจากพื้นที่อีเวนต์
                                if (tooltip) {
                                    tooltip.style.display = 'none';
                                    document.body.removeChild(tooltip);
                                    tooltip = null;  // ทำลาย tooltip
                                }
                            });
                        }

                    }
                });
                result.forEach(event => {
                    console.log("เข้า eventCalendar");
                    // ตรวจสอบให้แน่ใจว่า datetime_start และ color_categories มีค่า
                    if (event.datetime_start && event.color_categories) {
                        calendar.addEvent({
                            title: 'อุปกรณ์ : ' + event.name_device + ' , เจ้าหน้าที่ : ' + event.name_officer,
                            start: event.datetime_start,
                            end: event.datetime_end,
                            extendedProps: {
                                name: event.name_device,
                                officer: event.name_officer,
                                status: event.status,
                                datetime_end: event.datetime_end,
                                color_categories: event.color_categories+'CC'
                            }
                        });
                    }
                });


                calendar.render();

                createCategories(result); // สร้างวงกลมสีหมวดหมู่ ด้านบน calendar

            }).catch(error => {
                console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

                // แสดงไอคอนตกใจใน chartCate เมื่อเกิดข้อผิดพลาด
                let calendar = document.getElementById("calendar");
                calendar.innerHTML = `
                    <div class="text-center text-danger font-20">
                        <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                    </div>
                `;
            });


        // CSS สำหรับ tooltip
        const style = document.createElement('style');
        style.innerHTML = `
            .tooltip-custom {
                position: absolute;
                background-color: rgba(0, 0, 0, 0.75);
                color: #32393f;
                padding: 8px;
                border-radius: 4px;
                font-size: 12px;
                max-width: 100%;
                z-index: 1000;
                display: none;
            }

            .event-container {
                position: relative;
                padding-right: 30px;
            }

            .event-container a.event-action-button {
                position: absolute;
                right: 0;
                padding: 2px 6px;
            }


            .event-title {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .event-action-button {
                color: #007bff;
                text-decoration: none;
                margin-left: 10px;
            }

            .event-action-button i {
                font-size: 12px;
            }
        `;
        document.head.appendChild(style);

    }

    function getColorDeadLine(event) {

        if (event.status === "เสร็จสิ้น") {
            return "rgb(41, 204, 57 ,0.5)";
        }

        const currentDate = new Date();
        const endDate = new Date(event.datetime_end);

        if (currentDate > endDate) {
            return "rgb(230, 46, 46,0.5)";
        }

        // ถ้าไม่ใช่ทั้งสองเงื่อนไขด้านบน ให้ใช้สีฟ้า
        return "rgb(94, 216, 240 ,0.5)";
    }



</script>

<style>
    .bg-light {
        background-color: #f8f9fa; /* สีเทาอ่อน */
    }

    .bg-white {
        background-color: #ffffff; /* สีขาว */
    }

    .table-scrollable {
        white-space: nowrap; /* ป้องกันการตัดบรรทัด */
        overflow: hidden; /* ซ่อนส่วนที่เกิน */
        text-overflow: ellipsis; /* แสดง ... เมื่อข้อความยาวเกิน */
    }

    .table-scrollable:hover {
        overflow: auto; /* แสดง scrollbar เมื่อลากเมาส์ */
    }

</style>
<script>
    const getAllMaintains = () => {  //ดึงจำนวน การแจ้งซ่อมทั้งหมด ไปใส่ใน 4 bubble + 1 total case && นำไปใช้ใน "รายการแจ้งซ่อม 10 ลำดับ ล่าสุด"
    fetch("{{ url('/') }}/api/getAmountMaintainDashboard" + "?partner_id=" + partner_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน table_fix เมื่อเกิดข้อผิดพลาด
                let table_fix_body = document.getElementById("table_fix");
                table_fix_body.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-info font-20" onclick="getAllMaintains()">
                            <i class="fa-solid fa-rotate-right"></i>
                        </td>
                    </tr>
                `;
            }
            return response.json();
        })
        .then(result => {
            // console.log("result getAllMaintains");
            // console.log(result);

            // นับจำนวนทั้งหมด
            let totalMaintains = result.length;

            // นับจำนวนแต่ละสถานะ
            let repairMaintains = result.filter(item => item.status === "แจ้งซ่อม").length;
            let pendingMaintains = result.filter(item => item.status === "รอดำเนินการ").length;
            let progressMaintains = result.filter(item => item.status === "กำลังดำเนินการ").length;
            let successMaintains = result.filter(item => item.status === "เสร็จสิ้น").length;

            // แสดงข้อมูลใน span ตาม id ที่ต้องการ
            document.getElementById("amount_total_maintains").textContent = "รวมทั้งหมด " + totalMaintains + " เคส";
            document.getElementById("amount_repair_maintains").textContent = repairMaintains;
            document.getElementById("amount_pending_maintains").textContent = pendingMaintains;
            document.getElementById("amount_progress_maintains").textContent = progressMaintains;
            document.getElementById("amount_success_maintains").textContent = successMaintains;

            //============================ รายการแจ้งซ่อม 10 ลำดับ ล่าสุด =============================================

            let table_fix_body = document.getElementById("table_fix");
            table_fix_body.innerHTML = "";  // ล้างข้อมูลเก่า

            // เรียงข้อมูลตาม created_at โดยใช้ sort และ slice เพื่อตัดแค่ 10 อันดับล่าสุด
            let latestResults = result
                .sort((a, b) => new Date(b.created_at) - new Date(a.created_at)) // เรียงข้อมูลจากล่าสุดไปเก่าสุด
                .slice(0, 10); // ตัดแค่ 10 อันดับล่าสุด

            // นำจำนวนไปใส่ใน span
            let count_result = latestResults.length;
            document.getElementById("count_table_fix").textContent = count_result;

            latestResults.forEach((item, index) => {
                let row_table_fix = document.createElement("tr");
                row_table_fix.className = index % 2 === 0 ? "bg-light" : "bg-white"; // หรือใส่สีตามที่ต้องการ
                row_table_fix.innerHTML = `
                    <td>${item.name_user}</td>
                    <td>${item.sos_name_area}</td>
                    <td>${item.name_categories}</td>
                    <td>${item.name_subs_categories}</td>
                    <td>${item.device_code}</td>
                    <td>${item.status}</td>
                `;
                table_fix_body.appendChild(row_table_fix);
            });

        })
        .catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน table_fix เมื่อเกิดข้อผิดพลาด
            let table_fix_body = document.getElementById("table_fix");
            table_fix_body.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger font-20">
                        <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                    </td>
                </tr>
            `;
        });

    }

    const getAmountMaintains = () => {  //ดึงจำนวน การซ่อมอุปกรณ์ 5 ลำดับล่าสุด
        fetch("{{ url('/') }}/api/get_5_ListMaintains" + "?partner_id=" + partner_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน teble_all_used_fix เมื่อเกิดข้อผิดพลาด
                let teble_all_used_fix_body = document.getElementById("teble_all_used_fix");
                teble_all_used_fix_body.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-info font-20" onclick="getAmountMaintains()">
                            <i class="fa-solid fa-rotate-right"></i>
                        </td>
                    </tr>
                `;
            }
            return response.json();
        })
        .then(result => {
            // console.log("result getAmountMaintains");
            // console.log(result);

            let teble_all_used_fix_body = document.getElementById("teble_all_used_fix");
            teble_all_used_fix_body.innerHTML = "";  // ล้างข้อมูลเก่า

            // นำจำนวนไปใส่ใน span
            let count_result = result.length;
            document.getElementById("count_teble_all_used_fix").textContent = count_result;

            result.forEach((item, index) => {
                let row_teble_all_used_fix = document.createElement("tr");
                row_teble_all_used_fix.className = index % 2 === 0 ? "bg-light" : "bg-white"; // หรือใส่สีตามที่ต้องการ
                row_teble_all_used_fix.innerHTML = `
                    <td>${item.code}</td>
                    <td>${item.name}</td>
                    <td>${item.sos_name_area}</td>
                    <td class="text-center">${item.count}</td>
                `;
                teble_all_used_fix_body.appendChild(row_teble_all_used_fix);
            });

        })
        .catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน teble_all_used_fix เมื่อเกิดข้อผิดพลาด
            let teble_all_used_fix_body = document.getElementById("teble_all_used_fix");
            teble_all_used_fix_body.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger font-20">
                        <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                    </td>
                </tr>
            `;
        });

    }


    const getFastestMaintains = () => {  //ดึงจำนวน การแจ้งซ่อมที่เร็วสุด 5 อันดับ
        fetch("{{ url('/') }}/api/get_5_FastestMaintains" + "?partner_id=" + partner_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน table_fix_fastest เมื่อเกิดข้อผิดพลาด
                let table_fix_fastest_body = document.getElementById("table_fix_fastest");
                table_fix_fastest_body.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-info font-20" onclick="getFastestMaintains()">
                            <i class="fa-solid fa-rotate-right"></i>
                        </td>
                    </tr>
                `;
            }
            return response.json();
        })
        .then(result => {
            // console.log("result getFastestMaintains");
            // console.log(result);

            let table_fix_fastest_body = document.getElementById("table_fix_fastest");
            table_fix_fastest_body.innerHTML = "";  // ล้างข้อมูลเก่า

            // นำจำนวนไปใส่ใน span
            let count_result = result.length;
            document.getElementById("count_table_fix_fastest").textContent = count_result;

            result.forEach((item, index) => {
                sum_time(item.datetime_success, item.datetime_command);

                let row_table_fix_fastest = document.createElement("tr");
                row_table_fix_fastest.className = index % 2 === 0 ? "bg-light" : "bg-white"; // หรือใส่สีตามที่ต้องการ

                // แปลง array ของ name_officer เป็น string ที่มี <br> เป็นตัวคั่น
                let fullNameDisplay = Array.isArray(item.name_officer)
                    ? item.name_officer.join('<br>')
                    : item.name_officer;

                row_table_fix_fastest.innerHTML = `
                    <td class="table-scrollable">${fullNameDisplay}</td>
                    <td class="table-scrollable text-center">${sTimeUnit}</td>
                `;
                table_fix_fastest_body.appendChild(row_table_fix_fastest);
            });

        })
        .catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน table_fix_fastest เมื่อเกิดข้อผิดพลาด
            let table_fix_fastest_body = document.getElementById("table_fix_fastest");
            table_fix_fastest_body.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger font-20">
                        <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                    </td>
                </tr>
            `;
        });

    }

    const getSlowestMaintains = () => {  //ดึงจำนวน การแจ้งซ่อมที่ช้าสุด 5 อันดับ
        fetch("{{ url('/') }}/api/get_5_SlowestMaintains" + "?partner_id=" + partner_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน table_fix_slowest เมื่อเกิดข้อผิดพลาด
                let table_fix_slowest_body = document.getElementById("table_fix_slowest");
                table_fix_slowest_body.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-info font-20" onclick="getSlowestMaintains()">
                            <i class="fa-solid fa-rotate-right"></i>
                        </td>
                    </tr>
                `;
            }
            return response.json();
        })
        .then(result => {
            // console.log("result getSlowestMaintains");
            // console.log(result);

            let table_fix_slowest_body = document.getElementById("table_fix_slowest");
            table_fix_slowest_body.innerHTML = "";  // ล้างข้อมูลเก่า

            // นำจำนวนไปใส่ใน span
            let count_result = result.length;
            document.getElementById("count_table_fix_slowest").textContent = count_result;

            result.forEach((item, index) => {
                sum_time(item.datetime_success, item.datetime_command);

                let row_table_fix_slowest = document.createElement("tr");
                row_table_fix_slowest.className = index % 2 === 0 ? "bg-light" : "bg-white"; // หรือใส่สีตามที่ต้องการ

                // แปลง array ของ name_officer เป็น string ที่มี <br> เป็นตัวคั่น
                let fullNameDisplay = Array.isArray(item.name_officer)
                    ? item.name_officer.join('<br>')
                    : item.name_officer;

                row_table_fix_slowest.innerHTML = `
                    <td class="">${fullNameDisplay}</td>
                    <td class=" text-center">${sTimeUnit}</td>
                `;
                table_fix_slowest_body.appendChild(row_table_fix_slowest);
            });

        })
        .catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน table_fix_slowest เมื่อเกิดข้อผิดพลาด
            let table_fix_slowest_body = document.getElementById("table_fix_slowest");
            table_fix_slowest_body.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger font-20">
                        <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                    </td>
                </tr>
            `;
        });

    }
</script>

<script>
    function sum_time(time1 , time2) {
        const sTimeSOSuccess = new Date(time1).getTime();
        const sTimeCommand = new Date(time2).getTime();

        const sTimeDifference = Math.abs(sTimeSOSuccess - sTimeCommand) / 1000;
        if (sTimeDifference >= 86400) { // มากกว่า 24 ชั่วโมง
            const sDays = Math.floor(sTimeDifference / 86400);
            const sHours = Math.floor((sTimeDifference % 86400) / 3600);
            const sRemainingMinutes = Math.floor((sTimeDifference % 3600) / 60);
            sTimeUnit = `${sDays} วัน ${sHours} ชั่วโมง ${sRemainingMinutes} นาที`;
        } else if (sTimeDifference >= 3600) {
            const sHours = Math.floor(sTimeDifference / 3600);
            const sRemainingMinutes = Math.floor((sTimeDifference % 3600) / 60);
            const sRemainingSeconds = sTimeDifference % 60;

            sTimeUnit = `${sHours} ชั่วโมง ${sRemainingMinutes} นาที ${sRemainingSeconds} วินาที`;
        } else if (sTimeDifference >= 60) {
            const sMinutes = Math.floor(sTimeDifference / 60);
            const sSeconds = sTimeDifference % 60;

            sTimeUnit = `${sMinutes} นาที ${sSeconds} วินาที`;
        } else {
            sTimeUnit = `${sTimeDifference} วินาที`;
        }

        return sTimeUnit
    }
</script>

