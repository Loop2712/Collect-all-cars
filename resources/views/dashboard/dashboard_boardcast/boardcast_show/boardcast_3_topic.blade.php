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
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    #check_in_table_filter{
        display: none;
    }

    #car_table_filter{
        display: none;
    }

    #user_table_filter{
        display: none;
    }

    </style>

@section('content')

<div class="tab">
    <button id="check_in_btn" class="tablinks" onclick="openTab(event, 'check_in')">บรอดแคสต์เช็คอิน</button>
    <button id="car_btn"  class="tablinks" onclick="openTab(event, 'car')">บรอดแคสต์รถที่ลงทะเบียน</button>
    <button id="user_btn"  class="tablinks" onclick="openTab(event, 'user')">บรอดแคสต์ผู้ใช้งาน</button>
</div>

<div class="d-flex justify-content-center align-items-center">
    <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<div id="check_in" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลบรอดแคสต์เช็คอิน
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
                            <th>ชื่อบรอดแคสต์</th>
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
                            <th>ชื่อบรอดแคสต์</th>
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

<div id="car" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลบรอดแคสต์รถที่ลงทะเบียน
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
                            <th>ชื่อบรอดแคสต์</th>
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
                            <th>ชื่อบรอดแคสต์</th>
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

<div id="user" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลบรอดแคสต์ผู้ใช้งาน
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
                            <th>ชื่อบรอดแคสต์</th>
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
                            <th>ชื่อบรอดแคสต์</th>
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

<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let type_btn = '{{$type_page}}';
        let tabButton = document.querySelector('#'+type_btn);
        if (tabButton) {
            tabButton.click();
        }

        let check_in = document.querySelector('#check_in');
        let car = document.querySelector('#car');
        let user = document.querySelector('#user');

        setTimeout(() => {
            document.querySelector('#lds-ring').remove();
            check_in.classList.remove('d-none');
            car.classList.remove('d-none');
            user.classList.remove('d-none');
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

<!-- check_in_table -->
<script>
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
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[3, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[3, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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

            }
        });
    });

    $("#check_in_table tfoot th").each(function () {
        if($(this).text()){
            let title1 = $(this).text();
            if(title1){
                $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
            }
        }
    });
</script>

<!-- car_table -->
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
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[3, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[3, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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

    $("#car_table tfoot th").each(function () {
            if($(this).text()){
                let title2 = $(this).text();
                if(title2){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title2 + '" />');
                }
            }
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
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[3, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[3, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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

    $("#user_table tfoot th").each(function () {
            if($(this).text()){
                let title3 = $(this).text();
                if(title3){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title3 + '" />');
                }
            }
        });
</script>




@endsection
