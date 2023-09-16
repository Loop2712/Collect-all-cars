@extends('layouts.viicheck_for_vote_kan')

@section('content')

    <h1 class="text-center">
        จำนวนการกรอกคะแนนทั้งหมด {{ count($vote_kan_scores) }} ครั้ง
    </h1>

    <div class="table-responsive">
        <table id="vote_kan_scores" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>วันที่ / เวลา</th>
                    <th>หน่วยเลือกตั้ง</th>
                    <th>เบอร์ 1</th>
                    <th>เบอร์ 2</th>
                    <th>ผู้ลงคะแนน</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vote_kan_scores as $item)

                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        {{ $item->vote_kan_station->amphoe }} เขต {{ $item->vote_kan_station->area }} ตำบล{{ $item->vote_kan_station->tambon }} หน่วยเลือกตั้งที่ {{ $item->vote_kan_station->polling_station_at }}
                    </td>
                    <td>{{ $item->number_1}}</td>
                    <td>{{ $item->number_2 }}</td>
                    <td>{{ $item->vote_kan_station->name }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>วันที่ / เวลา</th>
                    <th>หน่วยเลือกตั้ง</th>
                    <th>เบอร์ 1</th>
                    <th>เบอร์ 2</th>
                    <th>ผู้ลงคะแนน</th>
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

            $("#vote_kan_scores tfoot th").each(function() {
                if ($(this).text()) {
                    let title1 = $(this).text();
                    if (title1) {
                        $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                    }
                }
            });

            // DataTable initialisation
            let table1 = $("#vote_kan_scores").DataTable({
                dom: '<"dt-buttons"Bf><"clear">lirtp',
                paging: true,
                autoWidth: true,
                lengthChange: false,
                pageLength: 100,
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
                    title: "จำนวนการกรอกคะแนนทั้งหมด" + formattedDate
                }, ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
                },
                initComplete: function(settings, json) {
                    let footer1 = $("#vote_kan_scores tfoot tr");
                    $("#vote_kan_scores thead").append(footer1);

                }
            });

            $("#vote_kan_scores thead").on("keyup", "input", function() {
                table1.column($(this).parent().index())
                    .search(this.value)
                    .draw();

            });
        });
    </script>

@endsection
