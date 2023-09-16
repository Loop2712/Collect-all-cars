@extends('layouts.viicheck_for_vote_kan')

@section('content')

@php
$count_vote_kan_stations = count($vote_kan_data_not_registered);
$totalCount = 0;
@endphp
<h1 class="text-center">
    หน่วยเลือกตั้งที่ยังไม่ได้ลงทะเบียน <span id="count_not_registred"></span> หน่วย
</h1>

<div class="table-responsive">
    <table id="table_vote_kan_stations" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>อำเภอ</th>
                <th>เขตเลือกตั้ง</th>
                <th>ตำบล</th>
                <th>หน่วยที่ยังไม่ลงทะเบียน</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vote_kan_data_not_registered as $item)
                @php
                $notRegisteredArray = explode(',', $item->not_registered);

                $totalCount += count($notRegisteredArray);
                @endphp
            <tr>
                <td>{{ $item->amphoe }}</td>
                <td>{{ $item->area}}</td>
                <td>{{ $item->tambon}}</td>
                <td>{{ $item->not_registered }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>อำเภอ</th>
                <th>เขตเลือกตั้ง</th>
                <th>ตำบล</th>
                <th>หน่วยที่ยังไม่ลงทะเบียน</th>
            </tr>
        </tfoot>
    </table>
</div>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script>
    // สร้างวัตถุ Date สำหรับวันที่และเวลาปัจจุบัน
    let currentDate = new Date();
    // ดึงวันที่
    let day = currentDate.getDate();
    // ดึงเดือน (เริ่มที่ 0 เป็นมกราคม, 1 เป็นกุมภาพันธ์, และเรียงตามลำดับไปเรื่อยๆ)
    let month = currentDate.getMonth() + 1;
    // ดึงปี
    let year = currentDate.getFullYear();
    // ดึงชั่วโมง
    let hours = currentDate.getHours();
    // ดึงนาที
    let minutes = currentDate.getMinutes();
    // กำหนดรูปแบบวันที่และเวลา
    let formattedDate = day + '-' + month + '-' + year + ' ' + hours + '-' + (minutes < 10 ? '0' : '') + minutes;

    $(document).ready(function() {
        counterAnim("#count_not_registred", 0, <?php echo $totalCount; ?>, 1000); // 1.5 วินาที

        $("#table_vote_kan_stations tfoot th").each(function() {
            if ($(this).text()) {
                let title1 = $(this).text();
                if (title1) {
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                }
            }
        });

        // DataTable initialisation
        let table1 = $("#table_vote_kan_stations").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 2500,
            deferRender: true,
            columnDefs: [{
                    type: "num",
                    targets: 0
                }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                {
                    targets: [0],
                    orderable: false
                } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [
                [0, 'desc']
            ], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [{
                extend: "excelHtml5",
                text: "Export Excel", // เปลี่ยนข้อความในปุ่มที่นี่
                title: "หน่วยเลือกตั้งที่ยังไม่ได้ลงทะเบียน" + formattedDate
            }, ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            initComplete: function(settings, json) {
                let footer1 = $("#table_vote_kan_stations tfoot tr");
                $("#table_vote_kan_stations thead").append(footer1);

            }
        });

        $("#table_vote_kan_stations thead").on("keyup", "input", function() {
            table1.column($(this).parent().index())
                .search(this.value)
                .draw();

        });
    });
</script>
@endsection