@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card p-2">
    <div class="row">
        <div class="col-6">
            <h3 class="font-weight-bold float-start mb-0">
                ข้อมูลการขอความช่วยเหลือ
            </h3>
        </div>
    </div>

    <div id="" class="card-body">


        <style>
            /* #last_reg_car_table tr th{
                min-width: 200px;
            } */
        </style>

        <div class="table-responsive">
            <table id="last_reg_car_table" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ชื่อเจ้าของ</th>
                        <th>ประเภท</th>
                        <th>ยี่ห้อ</th>
                        <th>รุ่น</th>
                        <th>วันที่</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($last_reg_car as $item)
                        <tr>
                            <td>{{ $item->name_from_users}}</td>
                            <td>{{ $item->type_car_registration}}</td>
                            <td>{{ $item->brand}}</td>
                            <td>{{ $item->generation}}</td>
                            <td>{{ $item->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>ชื่อเจ้าของ</th>
                        <th>ประเภท</th>
                        <th>ยี่ห้อ</th>
                        <th>รุ่น</th>
                        <th>วันที่</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>


    </div>
</div>


<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {
       // DataTable initialisation
        var table = $("#last_reg_car_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [8, 9], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[0, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table.order([[0, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
                        count_active_inactive(); // คำนวณ Active และ Inactive ใหม่
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            initComplete: function (settings, json) {
                var footer = $("#last_reg_car_table tfoot tr");
                $("#last_reg_car_table thead").append(footer);
                count_active_inactive();
            }
        });
    });
</script>

@endsection
