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

    /* Calendar */
    .calendar-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
    }
    .day-header {
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #dee2e6;
    }
    .day-cell {
        padding: 10px;
        border: 1px solid #dee2e6;
        position: relative;
        min-height: 120px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        padding-top: 25px; /* เพิ่มพื้นที่ให้กับวันที่ */
    }
    .day-cell .date-number {
        position: absolute;
        top: 5px;
        left: 10px;
        font-weight: bold;
    }
    .task {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        margin-top: 10px; /* เพิ่มระยะห่างระหว่างวันที่และงาน */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 0.9rem;
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
    @media (min-width: 768px) {

    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .day-cell {
            min-height: 100px;
            padding: 5px;
            padding-top: 20px; /* ลดขนาด padding-top ในหน้าจอขนาดเล็ก */
        }
        .task {
            font-size: 0.8rem;
            margin-top: 5px; /* ลดระยะห่างในหน้าจอขนาดเล็ก */
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
</style>

<!--=============== 4 card row =====================-->
<hr>
<div class="col-12 d-flex justify-content-end mb-2">
    <span class="text-dark font-weight-bold font-24" style="float: right;">รวมทั้งหมด 30 เคส</span>
</div>
<div class="row">
    <div class="col-3">
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
    <div class="col-3">
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
    <div class="col-3">
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
    <div class="col-3">
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
            <span>พื้นที่ 1</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>พื้นที่ 2</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>พื้นที่ 3</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>พื้นที่ 4</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>พื้นที่ 5</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>พื้นที่ 6</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>พื้นที่ 7</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>พื้นที่ 8</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>พื้นที่ 9</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>พื้นที่ 10</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>พื้นที่ 11</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>พื้นที่ 12</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>พื้นที่ 12</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>พื้นที่ 14</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>พื้นที่ 15</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>พื้นที่ 16</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FF5733;"></div>
            <span>พื้นที่ 17</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #33C1FF;"></div>
            <span>พื้นที่ 18</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #75FF33;"></div>
            <span>พื้นที่ 19</span>
        </div>
        <div class="category-item">
            <div class="circle" style="background-color: #FFC733;"></div>
            <span>พื้นที่ 20</span>
        </div>
        <!-- เพิ่มหมวดหมู่เพิ่มเติมที่นี่ -->
    </div>
    <hr>
    <div class="container-fluid my-4">
        <!-- Calendar Header -->
        <div class="calendar-header">
            <h3>August 2024</h3> <!-- ปรับปีและเดือนตามความต้องการ -->
        </div>

        @php
            use Carbon\Carbon;

            // วันที่เริ่มต้นของเดือนปัจจุบัน
            $startOfMonth = Carbon::now()->startOfMonth();

            // วันที่สิ้นสุดของเดือนปัจจุบัน
            $endOfMonth = Carbon::now()->endOfMonth();

            // วนลูปจากวันที่เริ่มต้นจนถึงวันที่สิ้นสุด
            $daysInMonth = [];
            $currentDate = $startOfMonth->copy();

            while ($currentDate->lte($endOfMonth)) {
                $daysInMonth[] = $currentDate->copy();
                $currentDate->addDay();
            }
        @endphp

        <div class="calendar">
            <!-- Day Headers -->
            <div class="day-header bg-success">Sunday</div>
            <div class="day-header bg-success">Monday</div>
            <div class="day-header bg-success">Tuesday</div>
            <div class="day-header bg-success">Wednesday</div>
            <div class="day-header bg-success">Thursday</div>
            <div class="day-header bg-success">Friday</div>
            <div class="day-header bg-success">Saturday</div>

            <!-- Day Cells -->
            @foreach($daysInMonth as $date)
                <div class="day-cell">
                    <div class="date-number">{{ $date->day }}</div> <!-- วันที่ -->
                    <div class="task">
                        <div class="circle_calendar" style="background-color: #FF5733;"></div>
                        <span>ช่าง Theesak Taweesak : คอมพิวเตอร์</span>
                    </div>
                    <div class="task">
                        <div class="circle_calendar" style="background-color: #33C1FF;"></div>
                        <span>ช่าง Benze Thanakorn : คอมพิวเตอร์</span>
                    </div>
                    <div class="task">
                        <div class="circle_calendar" style="background-color: #75FF33;"></div>
                        <span>ช่าง Dear : คอมพิวเตอร์</span>
                    </div>
                    <div class="more-tasks">ดูเพิ่มเติม</div>
                </div>
            @endforeach
            {{-- <div class="day-cell">
                <div class="date-number">1</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FF5733;"></div>
                    <span>ช่าง Theesak Taweesak</span>
                </div>
                <div class="task">
                    <div class="circle_calendar" style="background-color: #33C1FF;"></div>
                    <span>ช่าง Benze Thanakorn</span>
                </div>
                <div class="task">
                    <div class="circle_calendar" style="background-color: #75FF33;"></div>
                    <span>ช่าง Dear Piyabutr</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">2</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">2</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">3</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">4</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">5</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">6</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">7</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div>
            <div class="day-cell">
                <div class="date-number">7</div> <!-- วันที่ -->
                <div class="task">
                    <div class="circle_calendar" style="background-color: #FFC733;"></div>
                    <span>Sara Doe - Painting...</span>
                </div>
                <div class="more-tasks">ดูเพิ่มเติม</div>
            </div> --}}
            <!-- Repeat for other days -->

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
                        <h5 class="font-weight-bold mb-0">รายการแจ้งซ่อม <span id="count_news_officer">10</span> ลำดับ ล่าสุด</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
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
    <div class="col-5 d-flex align-items-stretch">
        <div class="row w-100">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100 ">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">การแจ้งซ่อมที่เร็วที่สุด<span id="count_data_sos_fastest_5">5</span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
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
                                <h5 class="font-weight-bold mb-0 text-danger">การแจ้งซ่อมที่ช้าที่สุด<span id="count_data_sos_slowest_5">5</span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/demo_repair_dashboard') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>รหัสเคส</th>
                                        <th>สถานที่</th>
                                        <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                        <th>ชื่อหน่วยปฏบัติการ</th>
                                        <th>ระยะเวลารวม</th>
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
    <div class="col-7 d-flex align-items-stretch">
        <!-- การปฏิบัติการ -->
        <div class="card radius-10 w-100 ">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0">จำนวนการซ่อมอุปกรณ์ <span id="count_news_officer">5</span> ลำดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
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






