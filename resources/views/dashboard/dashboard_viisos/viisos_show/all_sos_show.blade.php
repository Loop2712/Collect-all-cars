@extends('layouts.partners.theme_partner_new')

<style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }

    div.dataTables_filter {
        margin-top: 1rem;
    }
    button#advancedBtn {
        margin-top: 10px;
    }
    .col-1.mb-3 .btn {
        width: 50px;
        height: 100%;
    }
    #all_data_sos_1669_table_paginate ul.pagination{
        float: left !important;
    }

</style>

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

            <!-- เพิ่มตัวกรอง -->
            <form method="GET" action="{{ url('/dashboard_1669_show') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">

            </form>
            <!-- จบส่วนตัวกรอง -->
            <style>
                #all_data_sos_1669_table tr th{
                    min-width: 200px;
                }
            </style>
            <div class="table-responsive">
                <table id="all_data_sos_1669_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>สถานะ</th>
                            <th>วันที่ / เวลา</th>
                            <th>ละติจูด</th>
                            <th>ลองจิจูด</th>
                            <th>ชื่อพื้นที่</th>
                            <th>ผู้ขอความช่วยเหลือ</th>
                            <th>เบอร์ติดต่อผู้ขอความช่วยเหลือ</th>
                            <th>เจ้าหน้าที่ที่ช่วยเหลือ</th>
                            <th>เวลาออกไปช่วยเหลือ</th>
                            <th>เวลาช่วยเหลือเสร็จสิ้น</th>
                            <th>รวมเวลาในการช่วยเหลือ</th>

                            <th>คะแนนความประทับใจ</th>
                            <th>คะแนนระยะเวลา</th>
                            <th>คะแนนรวม</th>
                            <th>คำแนะนำ/ติชม</th>

                            <th>หมายเหตุจากเจ้าหน้าที่</th>

                            <!-- <th>title_sos</th> -->
                            <!-- <th>title_sos_other</th> -->
                        </tr>
                    </thead>
                    <tbody id="data_command_user_tbody">
                        @foreach( $data_sos as $item_sos )
                        <tr>
                            @if ($item_sos->help_complete == "Yes")
                                <td class="text-success">เสร็จสิ้น</td>
                            @else
                                <td class="text-danger">กำลังดำเนินการ</td>
                            @endif
                            <td>{{ thaidate("j F Y" , strtotime($item_sos->created_at)) ? thaidate("j F Y" , strtotime($item_sos->created_at)) : "--" }}</td>
                            <td>{{ $item_sos->lat ? $item_sos->lat : "--" }}</td>
                            <td>{{ $item_sos->lng ? $item_sos->lng : "--" }}</td>
                            <td>{{ $item_sos->name_area ? $item_sos->name_area : "--" }}</td>
                            <td>
                                @if( !empty($item_sos->name) )
                                    {{ $item_sos->name }}
                                @else
                                    <td> -- </td>
                                @endif
                            </td>
                            <td>{{ $item_sos->phone ? $item_sos->phone : "--" }}</td>
                            <td>{{ $item_sos->helper ? $item_sos->helper : "--" }}</td>

                            <td>{{ $item_sos->time_go_to_help ? $item_sos->time_go_to_help : "--" }}</td>
                            <td>{{ $item_sos->help_complete_time ? $item_sos->help_complete_time : "--" }}</td>
                            @php
                                if (!empty($item_sos->help_complete_time)) {
                                    $s_time_sos_success = strtotime($item_sos->help_complete_time);
                                    $s_time_command = strtotime($item_sos->time_go_to_help);

                                    $s_timeDifference = abs($s_time_sos_success - $s_time_command);

                                    if ($s_timeDifference >= 3600) {
                                        $s_hours = floor($s_timeDifference / 3600);
                                        $s_remainingMinutes = floor(($s_timeDifference % 3600) / 60);
                                        $s_remainingSeconds = $s_timeDifference % 60;

                                        $s_time_unit = $s_hours . ' ชั่วโมง ' . $s_remainingMinutes . ' นาที ' . $s_remainingSeconds . ' วินาที';
                                    } elseif ($s_timeDifference >= 60) {
                                        $s_minutes = floor($s_timeDifference / 60);
                                        $s_seconds = $s_timeDifference % 60;

                                        $s_time_unit = $s_minutes . ' นาที ' . $s_seconds . ' วินาที';
                                    } else {
                                        $s_time_unit = $s_timeDifference . ' วินาที';
                                    }
                                }else{
                                    $s_time_unit = '--';
                                }

                            @endphp
                            <td>{{ $s_time_unit }}</td>

                            <td>{{ $item_sos->score_impression ? $item_sos->score_impression : "--" }}</td>
                            <td>{{ $item_sos->score_period ? $item_sos->score_period : "--" }}</td>
                            <td>{{ $item_sos->score_total ? $item_sos->score_total : "--" }}</td>
                            <td>{{ $item_sos->comment_help ? $item_sos->comment_help : "--" }}</td>

                            <td>{{ $item_sos->remark ? $item_sos->remark : "--" }}</td>

                            <!-- <td>{{ $item_sos->title_sos ? $item_sos->title_sos : "--" }}</td>
                            <td>{{ $item_sos->title_sos_other ? $item_sos->title_sos_other : "--" }}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>สถานะ</th>
                            <th>วันที่ / เวลา</th>
                            <th>ละติจูด</th>
                            <th>ลองจิจูด</th>
                            <th>ชื่อพื้นที่</th>
                            <th>ผู้ขอความช่วยเหลือ</th>
                            <th>เบอร์ติดต่อผู้ขอความช่วยเหลือ</th>
                            <th>เจ้าหน้าที่ที่ช่วยเหลือ</th>
                            <th>เวลาออกไปช่วยเหลือ</th>
                            <th>เวลาช่วยเหลือเสร็จสิ้น</th>
                            <th>รวมเวลาในการช่วยเหลือ</th>

                            <th>คะแนนความประทับใจ</th>
                            <th>คะแนนระยะเวลา</th>
                            <th>คะแนนรวม</th>
                            <th>คำแนะนำ/ติชม</th>

                            <th>หมายเหตุจากเจ้าหน้าที่</th>

                            <!-- <th>title_sos</th> -->
                            <!-- <th>title_sos_other</th> -->
                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>
    </div>

	<!-- Bootstrap JS -->
	<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

    <script>
        // $(document).ready(function() {

        //     let title_theme = document.querySelector('#title_theme');
        //         title_theme.innerHTML = "ข้อมูลการขอความช่วยเหลือ" ;

        //     // เพิ่มโค้ดสำหรับการกรองข้อมูล
        //     var table = $('#all_data_sos_1669_table').DataTable(
        //         {
        //             lengthChange: true,
        //             buttons: ['excel']
        //         }
        //     );

        //     table.buttons().container()
        //         .appendTo( '#all_data_sos_1669_table_wrapper .col-md-6:eq(0) ' );
        // } );


    $(document).ready(function () {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = "ข้อมูลการขอความช่วยเหลือ";
        // Create search inputs in footer
        $("#all_data_sos_1669_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_data_sos_1669_table").DataTable({
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
                var footer = $("#all_data_sos_1669_table tfoot tr");
                $("#all_data_sos_1669_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_data_sos_1669_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });

    </script>
{{--
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let pagination_class = document.querySelector('.pagination');
            pagination_class.classList.add('float-start');
        });

    </script> --}}

@endsection
