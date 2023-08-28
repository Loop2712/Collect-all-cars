@extends('layouts.partners.theme_partner_new')

<style>
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
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }


    </style>

@section('content')

<div class="tab">
    <button id="report_btn" class="tablinks" onclick="openTab(event, 'report')">รถที่ถูกรายงานมากที่สุด</button>
    <button id="type_btn"  class="tablinks" onclick="openTab(event, 'type')">ประเภทรถมากที่สุด</button>
    <button id="brand_btn"  class="tablinks" onclick="openTab(event, 'brand')">ยี่ห้อรถมากที่สุด</button>
</div>

<div id="report" class="tabcontent ">
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
</div>

<div id="type" class="tabcontent ">
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
                    {{-- <tfoot>
                        <tr>
                            th>ประเภท</th>
                            <th>จำนวน</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>


        </div>
    </div>
</div>

<div id="brand" class="tabcontent ">
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
                            <td>{{ $item->brand}}</td>
                            <td>{{ $item->generation}}</td>
                            <td>{{ $item->amount_brand_car}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>ยี่ห้อ</th>
                            <th>รุ่น</th>
                            <th>จำนวน</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>


        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let type_btn = '{{$type_page}}';
        let tabButton = document.querySelector('#'+type_btn);
        if (tabButton) {
            tabButton.click();
        }
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
        var table = $("#report_car_table").DataTable({
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
                var footer = $("#report_car_table tfoot tr");
                $("#report_car_table thead").append(footer);
                count_active_inactive();
            }
        });
    });
</script>

<!-- ประเภทรถมากที่สุด -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        var table = $("#type_car_registration_table").DataTable({
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
                var footer = $("#type_car_registration_table tfoot tr");
                $("#type_car_registration_table thead").append(footer);
                count_active_inactive();
            }
        });
    });
</script>

<!-- ยี่ห้อรถมากที่สุด -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        var table = $("#brand_car_table").DataTable({
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
                var footer = $("#brand_car_table tfoot tr");
                $("#brand_car_table thead").append(footer);
                count_active_inactive();
            }
        });
    });
</script>




@endsection
