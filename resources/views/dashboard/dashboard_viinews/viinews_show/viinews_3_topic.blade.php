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

    #longest_table_filter{
        display: none;
    }

    #most_often_table_filter{
        display: none;
    }

    #lastest_table_filter{
        display: none;
    }


    </style>

@section('content')

<div class="tab">
    <button id="longest_btn" class="tablinks" onclick="openTab(event, 'longest')">ไม่ได้เข้าพื้นที่นานที่สุด</button>
    <button id="most_often_btn"  class="tablinks" onclick="openTab(event, 'most_often')">เข้าพื้นที่บ่อยที่สุด</button>
    <button id="lastest_btn"  class="tablinks" onclick="openTab(event, 'lastest')">เข้าพื้นที่ล่าสุด</button>
</div>

<div class="d-flex justify-content-center align-items-center">
    <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<div id="longest" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลคนที่ไม่ได้เข้าพื้นที่นานที่สุด
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
                <table id="longest_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ระยะเวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sorted_last_checkIn_data as $item)
                        <tr>
                            <td>{{ $item->name ? $item->name : "--"}}</td>

                            @php
                                $currentDate = \Carbon\Carbon::now();
                                $checkOutDate = \Carbon\Carbon::parse($item->time_out);

                                $checkout_timeDifference = $currentDate->diff($checkOutDate);

                                $daysDifference = $checkout_timeDifference->days;
                                $hoursDifference = $checkout_timeDifference->h;
                                $minutesDifference = $checkout_timeDifference->i;

                                if(!empty($daysDifference)){
                                    $checkout_time_unit = $daysDifference . ' วัน ';
                                }elseif (empty($daysDifference) && !empty($hoursDifference) ) {
                                    $checkout_time_unit = $hoursDifference . ' ชม. '  . $minutesDifference . ' น. ';
                                }elseif (empty($daysDifference) && empty($hoursDifference) && !empty($minutesDifference)) {
                                    $checkout_time_unit = $minutesDifference . ' น. ';
                                }

                            @endphp

                            <td>{{ $checkout_time_unit ? $checkout_time_unit : "--"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                         <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ระยะเวลา</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="most_often" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลคนที่เข้าพื้นที่บ่อยที่สุด
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
                <table id="most_often_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>จำนวน(ครั้ง)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($most_often_checkIn_data as $item)
                        <tr>
                            <td>{{ $item->name ? $item->name : "--"}}</td>
                            <td>{{ $item->count_user_checkin ? $item->count_user_checkin : "--"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                         <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ระยะเวลา</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<div id="lastest" class="tabcontent d-none">
    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลคนที่เข้าพื้นที่ล่าสุด
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
                <table id="lastest_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ระยะเวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sorted_lastest_checkIn_data as $item)
                        <tr>
                            <td>{{ $item->name ? $item->name : "--"}}</td>

                            @php
                                $checkin_time_current = \Carbon\Carbon::now();
                                $checkin_time_in = \Carbon\Carbon::parse($item->time_in);

                                $checkin_timeDifference = $checkin_time_current->diff($checkin_time_in);

                                $daysDifference = $checkin_timeDifference->days;
                                $hoursDifference = $checkin_timeDifference->h;
                                $minutesDifference = $checkin_timeDifference->i;

                                if(!empty($daysDifference)){
                                    $checkin_time_unit2 = $daysDifference . ' วัน ';
                                }elseif (empty($daysDifference) && !empty($hoursDifference) ) {
                                    $checkin_time_unit2 = $hoursDifference . ' ชม. '  . $minutesDifference . ' น. ';
                                }elseif (empty($daysDifference) && empty($hoursDifference) && !empty($minutesDifference)) {
                                    $checkin_time_unit2 = $minutesDifference . ' น. ';
                                }

                            @endphp

                            <td>{{ $checkin_time_unit2 ? $checkin_time_unit2 : "--"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                         <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ระยะเวลา</th>
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

        let longest = document.querySelector('#longest');
        let most_often = document.querySelector('#most_often');
        let lastest = document.querySelector('#lastest');

        setTimeout(() => {
            document.querySelector('#lds-ring').remove();
            longest.classList.remove('d-none');
            most_often.classList.remove('d-none');
            lastest.classList.remove('d-none');
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
       // DataTable initialisation
        let table1 = $("#longest_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[1, 'desc']], // เรียงลำดับคอลัมน์ที่ 1 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[1, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#longest_table tfoot tr");
                $("#longest_table thead").append(footer1);
            }
        });
    });

    $("#longest_table tfoot th").each(function () {
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
        let table2 = $("#most_often_table").DataTable({
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
                let footer2 = $("#most_often_table tfoot tr");
                $("#most_often_table thead").append(footer2);
                count_active_inactive();
            }
        });
    });

    $("#most_often_table tfoot th").each(function () {
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
        let table1 = $("#lastest_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[1, 'asc']], // เรียงลำดับคอลัมน์ที่ 1 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[1, 'asc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#lastest_table tfoot tr");
                $("#lastest_table thead").append(footer1);
            }
        });
    });

    $("#lastest_table tfoot th").each(function () {
        if($(this).text()){
            let title1 = $(this).text();
            if(title1){
                $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
            }
        }
    });
</script>




@endsection
