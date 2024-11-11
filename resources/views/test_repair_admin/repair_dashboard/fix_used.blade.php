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
                ข้อมูลจำนวนการซ่อมอุปกรณ์
            </h3>
        </div>
    </div>

    <div id="data_all_used_repair_div" class="card-body">

    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    let partner_id = '{{ $data_partner->id }}';

    document.addEventListener('DOMContentLoaded', (event) => {
        get_data_repair();
    });
    const get_data_repair = async (params) => {
        try {
            const response = await fetch("{{ url('/') }}/api/get_ListMaintains/" + "?partner_id=" + partner_id);
            const data = await response.json();

            console.log(data);

            await generate_field_data(data); // รอให้ generate_field_data เสร็จ
            initializeDataTable(); // เรียกใช้ initializeDataTable หลังจาก generate_field_data เสร็จ
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    };

    const generate_field_data = async (data_repair) => {
        return new Promise((resolve) => {
        let data_all_used_repair_div = document.querySelector('#data_all_used_repair_div');

        // ล้างเนื้อหาก่อนหน้า
        data_all_used_repair_div.innerHTML = '';

        let html = `
                    <div class="table-responsive mt-4 mb-4">
                        <table id="data_all_used_repair_table" class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>วันที่สร้าง</th>
                                    <th>รหัสอุปกรณ์</th>
                                    <th>ชื่อ</th>
                                    <th>พื้นที่</th>
                                    <th>จำนวนการซ่อมบำรุง/ครั้ง</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    data_repair.forEach(item => {
                        html += `
                            <tr>
                                <td>${item.created_at ? item.created_at : "--"}</td>
                                <td style="padding-left:1rem;">${item.created_at ? new Date(item.created_at).toLocaleDateString('th-TH') : "--" }</td>
                                <td>${item.code ? item.code : "--"}</td>
                                <td>${item.name ? item.name : "--"}</td>
                                <td>${item.sos_name_area ? item.sos_name_area : "--"}</td>
                                <td>${item.count ? item.count : "--"}</td>
                            </tr>`;
                    });

            html += `       </tbody>
                            <tfoot>
                                <tr>
                                    <th>date</th>
                                    <th>วันที่สร้าง</th>
                                    <th>รหัสอุปกรณ์</th>
                                    <th>ชื่อ</th>
                                    <th>พื้นที่</th>
                                    <th>จำนวนการซ่อมบำรุง/ครั้ง</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>`;

            data_all_used_repair_div.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด
            resolve(); // บอกว่า generate_field_data ทำงานเสร็จแล้ว
        });
    };
</script>

<script>
    let data_all_used_repair_table;
    let rowCount = 0; // ตัวแปรนับจำนวนแถวที่ตรงตามเงื่อนไข
    let pageLength = 5; // ใช้สำหรับแสดงข้อมูลในหนึงหน้า (มีใช้หลายที่)

    // ฟังก์ชันสำหรับการ initial DataTable
    const initializeDataTable = () => {
        $(document).ready(function () {
            document.title = "ข้อมูลจำนวนการซ่อมแซมอุปกรณ์";
            // Create search inputs in footer
            $("#data_all_used_repair_table tfoot th").each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });
            // DataTable initialisation
            data_all_used_repair_table = $("#data_all_used_repair_table").DataTable({
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
                            },
                            columns: [1, 2, 3, 4, 5]  // ระบุเลขคอลัมน์ที่ต้องการส่งออก (ไม่รวมคอลัมน์ที่ 0)
                        }
                    },
                    {
                        extend: "excelHtml5",
                        text: "ดาวน์โหลดหน้าปัจจุบัน",
                        exportOptions: {
                            modifier: {
                                page: 'current'  // ส่งออกเฉพาะข้อมูลในหน้าปัจจุบัน
                            },
                            columns: [1, 2, 3, 4, 5]   // ระบุเลขคอลัมน์ที่ต้องการส่งออก (ไม่รวมคอลัมน์ที่ 0)
                        }
                    }
                ],
                stripeClasses: ['odd-row', 'even-row'], // กำหนดคลาสสำหรับแถวสลับสี
                initComplete: function (settings, json) {
                    var footer = $("#data_all_used_repair_table tfoot tr");
                    $("#data_all_used_repair_table thead").append(footer);
                },
                columnDefs: [  // คำเตือน จะไปมีผลในช่อง search ให้ใส่ (colIndex + 1) ตรง data_all_used_repair_table.column(colIndex + 1) เพื่อให้ข้อมูลตรงกัน
                    {
                        targets: 0,     // ซ่อนคอลัมน์ที่ 0
                        visible: false
                    }
                ]
            });

            // Apply the search
            $("#data_all_used_repair_table thead").on("keyup", "input", function () {
                let colIndex = $(this).parent().index();
                data_all_used_repair_table.column(colIndex + 1) // เพิ่ม +1 เพื่อเลื่อน index ให้ตรงกับคอลัมน์ที่แสดง
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
            $("#data_all_used_repair_table_wrapper").before(filterButtons);

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
    }

    // ตัวแปรสำหรับเก็บช่วงวันที่
    let startDate, endDate;

    // ฟังก์ชันตัวกรองวันที่
    function filterByDateRange(start, end) {
        startDate = start ? new Date(start) : null;
        endDate = end ? new Date(end) : null;

        // Re-draw the table to apply the filter
        data_all_used_repair_table.draw();
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
