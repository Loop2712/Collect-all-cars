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

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #dddddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    #report_car_table_filter{
        display: none;
    }

    #type_car_registration_table_filter{
        display: none;
    }

    #brand_car_table_filter{
        display: none;
    }

    </style>

@section('content')

<div class="tab">
    <button id="report_btn" class="tablinks" onclick="openTab(event, 'report')">รถที่ถูกรายงาน</button>
    <button id="type_btn"  class="tablinks" onclick="openTab(event, 'type')">ประเภทรถ</button>
    <button id="brand_btn"  class="tablinks" onclick="openTab(event, 'brand')">ยี่ห้อรถ</button>
</div>
<div class="d-flex justify-content-center align-items-center">
    <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<div id="report" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลรถที่ถูกรายงาน
                </h3>
            </div>
        </div>

        <div id="" class="card-body">
            <style>
                /* #report_car_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="report_car_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อเจ้าของ</th>
                            <th>ทะเบียนรถ</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($report_car as $item)
                        <tr>
                            <td>{{ $item->name_from_users}}</td>
                            <td>{{ $item->registration}} {{ $item->county }}</td>
                            <td>{{ $item->amount_report}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                       <tr>
                            <th>ชื่อเจ้าของ</th>
                            <th>ทะเบียนรถ</th>
                            <th>จำนวน</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="type" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลประเภทรถ
                </h3>
            </div>
        </div>

        <div id="" class="card-body">


            <style>
                /* #type_car_registration_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="type_car_registration_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ประเภท</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($type_car_registration as $item)
                        <tr>
                            <td>{{ $item->type_car_registration}}</td>
                            <td>{{ $item->amount_type_car}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ประเภท</th>
                            <th>จำนวน</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="brand" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลยี่ห้อรถ
                </h3>
            </div>
        </div>

        <div id="" class="card-body">


            <style>
                /* #brand_car_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="brand_car_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ยี่ห้อ</th>
                            <th>รุ่น</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($brand_car as $item)
                        <tr>
                            <td>{{ $item->brand ? $item->brand : "--"}}</td>
                            <td>{{ $item->generation ? $item->generation : "--"}}</td>
                            <td>{{ $item->amount_brand_car ? $item->amount_brand_car : "--"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ยี่ห้อ</th>
                            <th>รุ่น</th>
                            <th>จำนวน</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let type_btn = '{{$type_page}}';
        let tabButton = document.querySelector('#'+type_btn);
        if (tabButton) {
            tabButton.click();
        }

        let report = document.querySelector('#report');
        let type = document.querySelector('#type');
        let brand = document.querySelector('#brand');

        setTimeout(() => {
            document.querySelector('#lds-ring').remove();
            report.classList.remove('d-none');
            type.classList.remove('d-none');
            brand.classList.remove('d-none');
        }, 1000);
    });
</script>
<!-- เปลี่ยน Tab -->
<script>
    function openTab(evt, type) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(type).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- รถที่ถูกรายงานมากที่สุด -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table1 = $("#report_car_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0, 1], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[2, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[2, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#report_car_table tfoot tr");
                $("#report_car_table thead").append(footer1);
            }
        });

        $("#report_car_table tfoot th").each(function () {
            if($(this).text()){
                let title1 = $(this).text();
                if(title1){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                }
            }
        });

        $("#report_car_table thead").on("keyup", "input", function () {
            table1.column($(this).parent().index())
                .search(this.value)
                .draw();

        });
    });


</script>

<!-- ประเภทรถมากที่สุด -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table2 = $("#type_car_registration_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[1, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table2.order([[1, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                var footer2 = $("#type_car_registration_table tfoot tr");
                $("#type_car_registration_table thead").append(footer2);
            }
        });

        $("#type_car_registration_table tfoot th").each(function () {
            if($(this).text()){
                let title2 = $(this).text();
                if(title2){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title2 + '" />');
                }
            }
        });

        $("#type_car_registration_table thead").on("keyup", "input", function () {
            table2.column($(this).parent().index())
                .search(this.value)
                .draw();

        });


    });

</script>

<!-- ยี่ห้อรถมากที่สุด -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table3 = $("#brand_car_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0, 1], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[2, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table3.order([[2, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer3 = $("#brand_car_table tfoot tr");
                $("#brand_car_table thead").append(footer3);
            }
        });

        $("#brand_car_table tfoot th").each(function () {
            if($(this).text()){
                let title3 = $(this).text();
                if(title3){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title3 + '" />');
                }
            }
        });

        $("#brand_car_table thead").on("keyup", "input", function () {
            table3.column($(this).parent().index())
                .search(this.value)
                .draw();

        });
    });


</script>




@endsection
