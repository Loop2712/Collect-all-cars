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
                ข้อมูลการแจ้งซ่อม
            </h3>
        </div>
    </div>

    <div id="data_repair_div" class="card-body">

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
                reporter: "สมชาย ใจดี",
                contactNumber: "081-123-4567",
                area: "เขตกรุงเทพฯ",
                category: "เครื่องปรับอากาศ",
                deviceCode: "AC12345",
                status: "กำลังดำเนินการ",
                created_at: "2024-01-15 09:30:00"
            },
            {
                reporter: "วิไลวรรณ สายสมร",
                contactNumber: "081-234-5678",
                area: "เขตปทุมธานี",
                category: "คอมพิวเตอร์",
                deviceCode: "PC56789",
                status: "เสร็จสิ้น",
                created_at: "2024-10-22 14:50:00"
            },
            {
                reporter: "มานพ มณีวรรณ",
                contactNumber: "081-345-6789",
                area: "เขตสมุทรปราการ",
                category: "ระบบไฟฟ้า",
                deviceCode: "EL99876",
                status: "รอดำเนินการ",
                created_at: "2024-06-10 08:20:00"
            },
            {
                reporter: "ปวีณา สง่างาม",
                contactNumber: "081-456-7890",
                area: "เขตนนทบุรี",
                category: "เครื่องปรับอากาศ",
                deviceCode: "AC54321",
                status: "กำลังดำเนินการ",
                created_at: "2024-07-18 16:15:00"
            },
            {
                reporter: "ชาตรี มีบุญ",
                contactNumber: "081-567-8901",
                area: "เขตสมุทรสาคร",
                category: "ระบบน้ำประปา",
                deviceCode: "WT65432",
                status: "เสร็จสิ้น",
                created_at: "2024-03-30 11:00:00"
            },
            {
                reporter: "วิชิต แก้วใส",
                contactNumber: "081-678-9012",
                area: "เขตกรุงเทพฯ",
                category: "ระบบไฟฟ้า",
                deviceCode: "EL87654",
                status: "กำลังดำเนินการ",
                created_at: "2024-08-05 13:40:00"
            },
            {
                reporter: "มณีรัตน์ ดำรงศักดิ์",
                contactNumber: "081-789-0123",
                area: "เขตชลบุรี",
                category: "เครื่องปรับอากาศ",
                deviceCode: "AC34567",
                status: "รอดำเนินการ",
                created_at: "2024-09-01 10:25:00"
            },
            {
                reporter: "ณรงค์ศักดิ์ ทองดี",
                contactNumber: "081-890-1234",
                area: "เขตอยุธยา",
                category: "คอมพิวเตอร์",
                deviceCode: "PC65432",
                status: "เสร็จสิ้น",
                created_at: "2024-04-15 17:10:00"
            },
            {
                reporter: "สุชาต สันติสุข",
                contactNumber: "081-901-2345",
                area: "เขตนครปฐม",
                category: "ระบบน้ำประปา",
                deviceCode: "WT12345",
                status: "กำลังดำเนินการ",
                created_at: "2024-02-20 09:45:00"
            },
            {
                reporter: "ปรีชา น้อยดี",
                contactNumber: "081-012-3456",
                area: "เขตกรุงเทพฯ",
                category: "ระบบไฟฟ้า",
                deviceCode: "EL54321",
                status: "รอดำเนินการ",
                created_at: "2024-07-22 12:35:00"
            }
        ];

            generate_field_data(repairRequests);

        // }).catch(error => console.error('Error fetching data:', error));
    }

    const generate_field_data = (data_repair) => {
        let data_repair_div = document.querySelector('#data_repair_div');

        // ล้างเนื้อหาก่อนหน้า
        data_repair_div.innerHTML = '';

        let html = `
                    <div class="table-responsive mt-4 mb-4">
                        <table id="data_repair_table" class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>วันที่สร้าง</th>
                                    <th>ผู้แจ้งซ่อม</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>พื้นที่</th>
                                    <th>หมวดหมู่</th>
                                    <th>รหัสอุปกรณ์</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    data_repair.forEach(item => {
                        html += `
                            <tr>
                                <td>${item.created_at ? item.created_at : "--"}</td>
                                <td>${item.reporter ? item.reporter : "--"}</td>
                                <td>${item.contactNumber ? item.contactNumber : "--"}</td>
                                <td>${item.area ? item.area : "--"}</td>
                                <td>${item.category ? item.category : "--"}</td>
                                <td>${item.deviceCode ? item.deviceCode : "--"}</td>
                                <td>${item.status ? item.status : "--"}</td>
                            </tr>`;
                    });

            html += `       </tbody>
                            <tfoot>
                                <tr>
                                    <th>วันที่สร้าง</th>
                                    <th>ผู้แจ้งซ่อม</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>พื้นที่</th>
                                    <th>หมวดหมู่</th>
                                    <th>รหัสอุปกรณ์</th>
                                    <th>สถานะ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>`;

                    data_repair_div.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

    }
</script>

<script>
    let data_repair_table;
    let rowCount = 0; // ตัวแปรนับจำนวนแถวที่ตรงตามเงื่อนไข
    let pageLength = 5; // ใช้สำหรับแสดงข้อมูลในหนึงหน้า (มีใช้หลายที่)

    $(document).ready(function () {
        document.title = "ข้อมูลการแจ้งซ่อม";
        // Create search inputs in footer
        $("#data_repair_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        data_repair_table = $("#data_repair_table").DataTable({
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
                var footer = $("#data_repair_table tfoot tr");
                $("#data_repair_table thead").append(footer);
            }
        });

        // Apply the search
        $("#data_repair_table thead").on("keyup", "input", function () {
            data_repair_table.column($(this).parent().index())
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
        $("#data_repair_table_wrapper").before(filterButtons);

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
        data_repair_table.draw();
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
