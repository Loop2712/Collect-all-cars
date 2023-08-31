@extends('layouts.partners.theme_partner_new')

<style>
    .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid #2f0cf3;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #1a6ce7 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    #last_reg_car_table_filter{
        display: none;
    }
</style>

@section('content')

<div class="card p-2">
    <div class="row">
        <div class="col-6">
            <h3 class="font-weight-bold float-start mb-0">
                ข้อมูลรถที่ลงทะเบียน
            </h3>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>

    <div id="last_reg_car" class="card-body d-none">
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
                            <td>{{ $item->name_from_users ? $item->name_from_users : "--"}}</td>
                            <td>{{ $item->type_car_registration ? $item->type_car_registration : "--"}}</td>
                            <td>{{ $item->brand ? $item->brand : "--"}}</td>
                            <td>{{ $item->generation ? $item->generation : "--"}}</td>
                            <td>{{ $item->created_at ? $item->created_at : "--"}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ชื่อเจ้าของ</th>
                        <th>ประเภท</th>
                        <th>ยี่ห้อ</th>
                        <th>รุ่น</th>
                        <th>วันที่</th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
</div>

<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
     document.addEventListener("DOMContentLoaded", function() {

        let last_reg_car = document.querySelector('#last_reg_car');

        setTimeout(() => {
            document.querySelector('#lds-ring').remove();
            last_reg_car.classList.remove('d-none');
        }, 500);
    });
</script>

<script>
    $(document).ready(function () {
        // DataTable initialisation
        let table1 = $("#last_reg_car_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0, 1 ,2 ,3 ], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[4, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[4, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#last_reg_car_table tfoot tr");
                $("#last_reg_car_table thead").append(footer1);
            }
        });

        $("#last_reg_car_table tfoot th").each(function () {
            if($(this).text()){
                let title1 = $(this).text();
                if(title1){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                }
            }
        });

        $("#last_reg_car_table thead").on("keyup", "input", function () {
            table1.column($(this).parent().index())
                .search(this.value)
                .draw();

        });
    });



</script>

@endsection
