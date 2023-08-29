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
    <button id="check_in_btn" class="tablinks" onclick="openTab(event, 'check_in')">check_in</button>
    <button id="car_btn"  class="tablinks" onclick="openTab(event, 'car')">car</button>
    <button id="user_btn"  class="tablinks" onclick="openTab(event, 'user')">user</button>
</div>

<div id="check_in" class="tabcontent ">
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
                /* #check_in_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="check_in_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sorted_all_by_checkin as $item)
                        <tr>
                            <td>{{ $item->name_content ? $item->name_content : "--"}}</td>
                            <td>{{ $item->count_show_user ? $item->count_show_user : "--"}}</td>
                            <td>{{ $item->count_user_click ? $item->count_user_click : "--"}}</td>
                            <td>{{ $item->send_round ? $item->send_round : "--"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="car" class="tabcontent ">
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
                /* #car_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="car_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sorted_all_by_car as $item)
                        <tr>
                            <td>{{ $item->name_content}}</td>
                            <td>{{ $item->count_show_user}}</td>
                            <td>{{ $item->count_user_click}}</td>
                            <td>{{ $item->send_round}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="user" class="tabcontent ">
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
                /* #user_table tr th{
                    min-width: 200px;
                } */
            </style>

            <div class="table-responsive">
                <table id="user_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sorted_all_by_user as $item)
                        <tr>
                            <td>{{ $item->name_content}}</td>
                            <td>{{ $item->show_user}}</td>
                            <td>{{ $item->user_click}}</td>
                            <td>{{ $item->send_round}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ชื่อ_คอนเท้น</th>
                            <th>จำนวนคนที่ส่งหา</th>
                            <th>จำนวนคนที่กดดู</th>
                            <th>จำนวนการส่ง</th>
                        </tr>
                    </tfoot>
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

<!-- check_in_table -->

<script>
        document.addEventListener("DOMContentLoaded", function () {
        // DataTable initialisation
        var table1 = document.querySelector("#car_table");
        var dataTable = new DataTable(table1, {
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 },
                { targets: [8, 9], orderable: false }
            ],
            order: [[0, 'desc']],
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น",
                    action: function () {
                        dataTable.order([[0, 'desc']]).draw();
                        countActiveInactive();
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "Export Excel"
                },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            initComplete: function (settings, json) {
                var footer1 = table.querySelector("tfoot tr");
                table.querySelector("thead").appendChild(footer1);
                countActiveInactive();
            }
        });
    });
</script>

{{-- <script>
    $(document).ready(function () {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = "check_in";
        // Create search inputs in footer
        $("#check_in_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#check_in_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            buttons: [
                {
                    extend: "excelHtml5",
                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                },
            ],
            initComplete: function (settings, json) {
                var footer = $("#check_in_table tfoot tr");
                $("#check_in_table thead").append(footer);
            }
        });

        // Apply the search
        $("#check_in_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
</script> --}}

{{-- <script>
    $(document).ready(function () {
        console.log("Here We Go");
       // DataTable initialisation
        let table1 = $("#check_in_table").DataTable({
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
                        table1.order([[0, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#check_in_table tfoot tr");
                $("#check_in_table thead").append(footer1);
                count_active_inactive();
            }
        });
    });
</script> --}}

<!-- car_table -->
{{-- <script>
    $(document).ready(function () {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = "check_in";
        // Create search inputs in footer
        $("#car_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#car_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            buttons: [
                {
                    extend: "excelHtml5",
                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                },
            ],
            initComplete: function (settings, json) {
                var footer = $("#car_table tfoot tr");
                $("#car_table thead").append(footer);
            }
        });

        // Apply the search
        $("#car_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
</script> --}}

<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table2 = $("#car_table").DataTable({
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
                        table2.order([[0, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer2 = $("#car_table tfoot tr");
                $("#car_table thead").append(footer2);
                count_active_inactive();
            }
        });
    });
</script>

<!-- user_table -->
<script>
    $(document).ready(function () {
       // DataTable initialisation
        var table3 = $("#user_table").DataTable({
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
                        table3.order([[0, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                var footer3 = $("#user_table tfoot tr");
                $("#user_table thead").append(footer3);
                count_active_inactive();
            }
        });
    });
</script>




@endsection
