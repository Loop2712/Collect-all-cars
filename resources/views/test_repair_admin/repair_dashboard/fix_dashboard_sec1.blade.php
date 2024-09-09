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

    /*======== Calendar =============*/
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
                        <h4 class="mb-0 text-dark font-weight-bold">แจ้งซ่อม</h4>
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
                        <h4 class="mb-0 text-dark font-weight-bold">รอดำเนินการ</h4>
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
                        <h4 class="mb-0 text-dark font-weight-bold">กำลังดำเนินการ</h4>
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
                        <h4 class="mb-0 text-dark font-weight-bold">เสร็จสิ้น</h4>

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
    <div class="category">
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>หมวดหมู่ 1</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>หมวดหมู่ 2</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>หมวดหมู่ 3</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>หมวดหมู่ 4</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>หมวดหมู่ 5</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>หมวดหมู่ 6</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>หมวดหมู่ 7</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>หมวดหมู่ 8</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>หมวดหมู่ 9</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>หมวดหมู่ 10</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>หมวดหมู่ 11</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>หมวดหมู่ 12</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>หมวดหมู่ 12</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>หมวดหมู่ 14</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>หมวดหมู่ 15</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>หมวดหมู่ 16</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>หมวดหมู่ 17</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>หมวดหมู่ 18</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>หมวดหมู่ 19</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>หมวดหมู่ 20</span>
        </div>
        <!-- เพิ่มหมวดหมู่เพิ่มเติมที่นี่ -->
    </div>
    <hr>

    <div class="my-4">
        {{-- <script>
            // วันที่เริ่มต้นของเดือนปัจจุบัน
            const startOfMonth = new Date(new Date().getFullYear(), new Date().getMonth(), 1);
            // console.log("startOfMonth "+ startOfMonth);
            // วันที่สิ้นสุดของเดือนปัจจุบัน
            const endOfMonth = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0);
            // console.log("endOfMonth "+ endOfMonth);
            // วนลูปจากวันที่เริ่มต้นจนถึงวันที่สิ้นสุด
            let daysInMonth = [];
            let currentDate = new Date(startOfMonth);

            // เริ่มจากวันที่ 1 ไปจนถึงสิ้นเดือน
            while (currentDate <= endOfMonth) {
                daysInMonth.push(new Date(currentDate));
                currentDate.setDate(currentDate.getDate() + 1);
            }

            // คำนวณช่องว่างในแถวสุดท้าย
            const remainingSlots = 7 - (endOfMonth.getDay() + 1);

            // เพิ่มวันที่จากเดือนถัดไป
            if (remainingSlots > 0) {
                let nextMonthDate = new Date(endOfMonth);
                nextMonthDate.setDate(nextMonthDate.getDate() + 1);
                for (let i = 0; i < remainingSlots; i++) {
                    daysInMonth.push(new Date(nextMonthDate));
                    nextMonthDate.setDate(nextMonthDate.getDate() + 1);
                }
            }

            // Placeholder for detailed information
            let detailedInfo = null;

            // แสดงวันที่ใน console (เพื่อเช็คผลลัพธ์)
            // console.log(daysInMonth);
        </script> --}}

        <div class="row">
            <div class="col-12" id="calendar-container">
                {{-- <div class="calendar">
                    <!-- Day Headers -->
                    <div class="day-header day-header-color">Sunday</div>
                    <div class="day-header day-header-color">Monday</div>
                    <div class="day-header day-header-color">Tuesday</div>
                    <div class="day-header day-header-color">Wednesday</div>
                    <div class="day-header day-header-color">Thursday</div>
                    <div class="day-header day-header-color">Friday</div>
                    <div class="day-header day-header-color">Saturday</div>

                    <!-- Day Cells -->
                    <script>
                        daysInMonth.forEach(date => {
                            const dayCell = document.createElement('div');
                            dayCell.className = `day-cell ${date.getMonth() !== new Date().getMonth() ? 'next-month' : ''}`;
                            dayCell.setAttribute('data-date', date.toISOString().split('T')[0]);

                            const dateNumber = document.createElement('div');
                            dateNumber.className = 'date-number';
                            dateNumber.textContent = date.getDate();
                            dayCell.appendChild(dateNumber);

                            if (date.getMonth() === new Date().getMonth()) {
                                const tasks = [
                                    { color: '#FF5733', text: 'ช่าง Theesak Taweesak : คอมพิวเตอร์' },
                                    { color: '#33C1FF', text: 'ช่าง Benze Thanakorn : คอมพิวเตอร์' },
                                    { color: '#75FF33', text: 'ช่าง Dear : คอมพิวเตอร์' }
                                ];

                                tasks.forEach(task => {
                                    const taskDiv = document.createElement('div');
                                    taskDiv.className = 'task';

                                    const circle = document.createElement('div');
                                    circle.className = 'circle_calendar';
                                    circle.style.backgroundColor = task.color;
                                    taskDiv.appendChild(circle);

                                    const span = document.createElement('span');
                                    span.textContent = task.text;
                                    taskDiv.appendChild(span);

                                    dayCell.appendChild(taskDiv);
                                });

                                const moreTasks = document.createElement('div');
                                moreTasks.className = 'more-tasks';
                                moreTasks.setAttribute('data-date', date.toISOString().split('T')[0]);
                                moreTasks.textContent = 'ดูเพิ่มเติม';
                                dayCell.appendChild(moreTasks);
                            }

                            document.querySelector('.calendar').appendChild(dayCell);
                        });
                    </script>
                </div> --}}

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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
		document.addEventListener('DOMContentLoaded', function () {
            const formattedDateNow = new Date().toISOString().split('T')[0];
            // console.log(formattedDateNow); // 2024-09-09

			let calendarEl = document.getElementById('workCalendar');
			let calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				},
				initialView: 'dayGridMonth',
				initialDate: formattedDateNow,
				navLinks: true, // can click day/week names to navigate views
				selectable: true,
				nowIndicator: true,
				dayMaxEvents: true, // allow "more" link when too many events
				// editable: true,
				selectable: true,
				businessHours: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [{
					title: 'All Day Event',
					start: '2024-09-12',
                    color: 'blue'
				}, {
					title: 'ทดสอบ ตารางงาน',
					start: '2024-09-12T14:30:00'
				}, {
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2020-09-28'
				}]
			});
			calendar.render();
		});
	</script>

{{-- events: [{
    title: 'All Day Event',
    start: '2024-09-12',
}, {
    title: 'Long Event',
    start: '2020-09-07',
    end: '2020-09-10'
}, {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-09-09T16:00:00'
}, {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-09-16T16:00:00'
}, {
    title: 'Conference',
    start: '2020-09-11',
    end: '2020-09-13'
}, {
    title: 'Meeting',
    start: '2020-09-12T10:30:00',
    end: '2020-09-12T12:30:00'
}, {
    title: 'Lunch',
    start: '2020-09-12T12:00:00'
}, {
    title: 'ทดสอบ ตารางงาน',
    start: '2024-09-12T14:30:00'
}, {
    title: 'Happy Hour',
    start: '2020-09-12T17:30:00'
}, {
    title: 'Dinner',
    start: '2020-09-12T20:00:00'
}, {
    title: 'Birthday Party',
    start: '2020-09-13T07:00:00'
}, {
    title: 'Click for Google',
    url: 'http://google.com/',
    start: '2020-09-28'
}] --}}

    {{-- <script>
        var isSidebarOpen = false; //status ของ sidebar
        var selectedCell = null; // เก็บ element ของ cell ที่ถูกเลือก
        // กำหนดวันที่ปัจจุบัน

        document.addEventListener('DOMContentLoaded', function() {
            // ไฮไลท์สีให้กับช่องที่ตรงกับ วันที่ปัจจุบัน
            let toDay = new Date().toLocaleString("en-CA", { timeZone: "Asia/Bangkok" }).split(',')[0];
            // console.log("toDay");
            // console.log(toDay);

            let todayDate = new Date();
            // ดึงค่าเดือนและปี
            let currentMonth = todayDate.toLocaleString('default', { month: 'long' }); // แสดงชื่อเดือนแบบเต็ม
            let currentYear = todayDate.getFullYear(); // ดึงปี
            // แสดงผลใน span ที่มี id="headCalendar"
            document.getElementById('headCalendar').textContent = `${currentMonth} ${currentYear}`;

             // Highlight today's date
            document.querySelectorAll('.day-cell').forEach(function(element) {
                let cellDate = element.getAttribute('data-date');
                    console.log(cellDate);
                // Normalize cellDate to ensure it's in YYYY-MM-DD format
                if (cellDate === toDay) {
                    element.classList.add('today');
                }
            });

            function showSidebar(date , cell) {
                let sidebar = document.getElementById('sidebarWorkCalendar');
                sidebar.classList.add('open'); // เพิ่มคลาส open เพื่อแสดง sidebar
                document.getElementById('calendar-container').classList.replace('col-12', 'col-10');

                isSidebarOpen = true;

                let sidebarContent =  document.getElementById('sidebar-content');
                sidebarContent.innerHTML = "";
                    sidebarContent.innerHTML = `
                        <h4>${date} </h4>
                        <p>รายละเอียดเนื้อหาของวันที่ ${date}</p>
                    `;

                // ไฮไลท์สีให้กับช่องที่ตรงกับ ที่กดเลือก
                if (selectedCell) {
                    selectedCell.classList.remove('selected');
                }
                selectedCell = cell;
                selectedCell.classList.add('selected');

                // Add event listener to close button
                document.getElementById('close-sidebar').addEventListener('click', function() {
                let sidebarContent =  document.getElementById('sidebar-content');
                    sidebar.classList.remove('open'); // ลบคลาส open เพื่อซ่อน sidebar
                    document.getElementById('calendar-container').classList.replace('col-10', 'col-12');
                    isSidebarOpen = false;
                    // Remove highlight when sidebar is closed
                    if (selectedCell) {
                        selectedCell.classList.remove('selected');
                        selectedCell = null;
                    }
                });
            }

            // Add event listeners to "ดูเพิ่มเติม"
            document.querySelectorAll('.more-tasks').forEach(function(element) {
                element.addEventListener('click', function() {
                    var date = this.getAttribute('data-date');
                    var parentCell = this.closest('.day-cell');
                    showSidebar(date, parentCell);
                });
            });

            // คลิ๊กส่วนไหนของช่องตารางจะอัพเดตข้อมูลไปไว้ที่ sidebar แต่ทำเฉพาะ sidebar เปิดอยู่เท่านั้น
            document.querySelectorAll('.day-cell').forEach(function(element) {
                element.addEventListener('click', function() {
                    if (isSidebarOpen) {
                        var date = this.getAttribute('data-date');
                        updateSidebarContent(date);

                        // Highlight the selected cell
                        if (selectedCell) {
                            selectedCell.classList.remove('selected');
                        }
                        selectedCell = this;
                        selectedCell.classList.add('selected');
                    }
                });
            });

            function updateSidebarContent(date) {
                console.log("updateSidebarContent");
                // Update the sidebar content if it's already open
                    let sidebarContent =  document.getElementById('sidebar-content');
                        sidebarContent.innerHTML = "";
                        sidebarContent.innerHTML = `
                            <h4>${date} </h4>
                            <p>รายละเอียดเนื้อหาของวันที่ ${date}</p>
                        `;

            }
        });

    </script> --}}


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
                            <a class="dropdown-item" href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลเพิ่มเติม</a>
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
                                        href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
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
                                        href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
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
                            <a class="dropdown-item" href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="">
                            <tr>
                                <th class="text-start">รหัสเครื่อง/อุปกรณ์</th>
                                <th class="text-center">หมวดหมู่</th>
                                <th class="text-center">จำนวนการซ่อมบำรุง/ครั้ง</th>
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
