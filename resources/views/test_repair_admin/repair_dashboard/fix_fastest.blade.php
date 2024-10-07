@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    .odd-row {
        background-color: #f9f9f9;
    }

    .even-row {
        background-color: #e9e9e9;
    }

    .dataTables_filter {
        display: none;  /* ซ่อน input สำหรับค้นหาที่อยู่ด้านขวาบน */
    }

    @media (min-width: 768px) {
        #date-filters {
            float:right;
        }
    }

    @media (max-width: 768px) {
        #date-filters {
            margin-bottom:10px;
        }
    }
</style>

<div class="card p-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <h3 style="font-weight: bold;" class="float-start">
                ข้อมูลระยะเวลาการแจ้งซ่อมต่อเคส
            </h3>
        </div>
    </div>

    <div id="data_fastest_repair_div" class="card-body">

    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        get_data_repair();
    });
    const get_data_repair = (params) => {
        // fetch("{{ url('/') }}/api/viisos_used/" + user_login_organization)
        //     .then(response => response.json())
        //     .then(data => {
            // ข้อมูลการแจ้งซ่อมพร้อม `created_at`
        let repairRequests = [
            {
                name_officer: "สมชาย ใจดี",
                avg_time_success: "12 ชั่วโมง 50 นาที",
                created_at: "2024-10-15 11:30:00"
            },
            {
                name_officer: "สมหมาย ชาเย็น",
                avg_time_success: "9 ชั่วโมง 50 นาที",
                created_at: "2024-10-3 12:20:00"
            },
            {
                name_officer: "สมศักดิ์ สง่างาม",
                avg_time_success: "5 ชั่วโมง 50 นาที",
                created_at: "2024-05-15 09:30:00"
            },
        ];
            generate_field_data(repairRequests);
        // }).catch(error => console.error('Error fetching data:', error));
    }

    const generate_field_data = (data_repair) => {
        let data_fastest_repair_div = document.querySelector('#data_fastest_repair_div');

        // ล้างเนื้อหาก่อนหน้า
        data_fastest_repair_div.innerHTML = '';

        let html = `
                    <div class="table-responsive mt-4 mb-4">
                        <table id="data_fastest_repair_table" class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>วันที่สร้าง</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>ระยะเวลา</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    data_repair.forEach(item => {
                        html += `
                            <tr>
                                <td>${item.created_at ? item.created_at : "--"}</td>
                                <td>${item.name_officer ? item.name_officer : "--"}</td>
                                <td>${item.avg_time_success ? item.avg_time_success : "--"}</td>
                            </tr>`;
                    });

            html += `       </tbody>
                            <tfoot>
                                <tr>
                                    <th>วันที่สร้าง</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>ระยะเวลา</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>`;

                    data_fastest_repair_div.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด
                    updateButtonClasses("filter-all");
    }
</script>

<script>
    let data_fastest_repair_table;
    let rowCount = 0; // ตัวแปรนับจำนวนแถวที่ตรงตามเงื่อนไข
    let pageLength = 5; // ใช้สำหรับแสดงข้อมูลในหนึงหน้า (มีใช้หลายที่)

    $(document).ready(function () {
        document.title = "ข้อมูลระยะเวลาการแจ้งซ่อมต่อเคส";
        // Create search inputs in footer
        $("#data_fastest_repair_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        data_fastest_repair_table = $("#data_fastest_repair_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            pageLength: pageLength,  // แสดง ... บรรทัดต่อหน้า
            searching: true,  // ปิดการค้นหาด้านขวาบน
            info: true, // ปิดข้อความ "Showing X to Y of Z entries"
            language: {
                info: "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                infoEmpty: "ไม่มีข้อมูลที่จะแสดง",
                infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)"
            },
            lengthChange: false,
            buttons: [
                {
                    extend: "excelHtml5",
                    text: "ดาวน์โหลดทั้งหมด",
                    exportOptions: {
                        modifier: {
                            page: 'all'  // ส่งออกข้อมูลทั้งหมดใน DataTable
                        }
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "ดาวน์โหลดหน้าปัจจุบัน",
                    exportOptions: {
                        modifier: {
                            page: 'current'  // ส่งออกเฉพาะข้อมูลในหน้าปัจจุบัน
                        }
                    }
                }
            ],
            stripeClasses: ['odd-row', 'even-row'], // กำหนดคลาสสำหรับแถวสลับสี
            initComplete: function (settings, json) {
                var footer = $("#data_fastest_repair_table tfoot tr");
                $("#data_fastest_repair_table thead").append(footer);
            }
        });

        // Apply the search
        $("#data_fastest_repair_table thead").on("keyup", "input", function () {
            data_fastest_repair_table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });

        //=================== สร้างปุ่มตัวกรอง =======================
        let filterButtons = `
            <div id="date-filters">
                <button id="filter-today" class="btn btn-outline-primary" style="box-shadow: none;">วันนี้</button>
                <button id="filter-month"  class="btn btn-outline-primary" style="box-shadow: none;">เดือนนี้</button>
                <button id="filter-year"  class="btn btn-outline-primary" style="box-shadow: none;">ปีนี้</button>
                <button id="filter-all"  class="btn btn-outline-primary" style="box-shadow: none;">ทั้งหมด</button>
            </div>
        `;
        $("#data_fastest_repair_table_wrapper").before(filterButtons);

        updateButtonClasses("filter-all"); //กำหนดให้โหลดหน้ามาใช้ filter ทั้งหมด

        // กำหนด event ให้กับปุ่มตัวกรอง
        $("#filter-all").on("click", filterAll);
        $("#filter-year").on("click", filterThisYear);
        $("#filter-month").on("click", filterThisMonth);
        $("#filter-today").on("click", filterToday);

        // ใช้สำหรับ เช็ควันที่ปัจจุบัน กับปุ่มตัวกรอง
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            // คอลัมน์วันที่อยู่ใน index ที่ 6 (index เริ่มจาก 0)
            let dateColumn = new Date(data[0]);

            // ถ้า startDate หรือ endDate ยังไม่ได้กำหนด
            if (!startDate && !endDate) {
                return true;
            }
            if (startDate && dateColumn < startDate) {
                return false;
            }
            if (endDate && dateColumn > endDate) {
                return false;
            }

            return true;
        });
    });

    // ตัวแปรสำหรับเก็บช่วงวันที่
    let startDate, endDate;

    // ฟังก์ชันตัวกรองวันที่
    function filterByDateRange(start, end) {
        startDate = start ? new Date(start) : null;
        endDate = end ? new Date(end) : null;

        // Re-draw the table to apply the filter
        data_fastest_repair_table.draw();
    }

    // ฟังก์ชันสำหรับกรองตามปุ่มต่างๆ
    function filterAll() {
        filterByDateRange(null, null);  // Clear date filter
        updateButtonClasses("filter-all");
    }

    function filterToday() {
        console.log("filterToday");
        let today = new Date();
        filterByDateRange(today.setHours(0, 0, 0, 0), new Date().setHours(23, 59, 59, 999));

        updateButtonClasses("filter-today");
    }

    function filterThisMonth() {
        console.log("filterThisMonth");
        let today = new Date();
        let startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        let endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        filterByDateRange(startOfMonth, endOfMonth);

        updateButtonClasses("filter-month");
    }

    function filterThisYear() {
        console.log("filterThisYear");
        let today = new Date();
        let startOfYear = new Date(today.getFullYear(), 0, 1);
        let endOfYear = new Date(today.getFullYear(), 11, 31);
        filterByDateRange(startOfYear, endOfYear);

        updateButtonClasses("filter-year");
    }

    // ฟังก์ชันสำหรับเปลี่ยนคลาสปุ่ม
    function updateButtonClasses(selectedButtonId) {
       console.log("filter : "+selectedButtonId);

       // เปลี่ยนคลาสให้กับทุกปุ่ม
       document.getElementById('filter-all').classList.add('btn-outline-primary');
       document.getElementById('filter-year').classList.add('btn-outline-primary');
       document.getElementById('filter-month').classList.add('btn-outline-primary');
       document.getElementById('filter-today').classList.add('btn-outline-primary');

       document.getElementById('filter-all').classList.remove('btn-primary');
       document.getElementById('filter-year').classList.remove('btn-primary');
       document.getElementById('filter-month').classList.remove('btn-primary');
       document.getElementById('filter-today').classList.remove('btn-primary');

       document.getElementById(selectedButtonId).classList.add('btn-primary');
       document.getElementById(selectedButtonId).classList.remove('btn-outline-primary');
    }

</script>

@endsection
