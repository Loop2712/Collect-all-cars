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
    #all_score_unit_table_paginate ul.pagination{
        float: left !important;
    }

</style>

@section('content')

<div class="card p-2">
    <h3 class="font-weight-bold float-start mb-0">
        ข้อมูลการช่วยเหลือของเจ้าหน้าที่ &nbsp;
    </h3>
    <div id="card_table_user" class="card-body">
        <div class="table-responsive mt-4 mb-4">
            <table id="all_score_unit_table" class="table align-middle mb-0" >
                <thead class="fz_header">
                    <tr>
                        <th>รหัสเคส</th>
                        <th>สถานที่</th>
                        <th>ชื่อเจ้าหน้าที่</th>
                        <th>ชื่อหน่วยปฏิบัติการ</th>
                        <th>เวลาในการช่วยเหลือ</th>
                        <th>คะแนน</th>
                    </tr>
                </thead>
                <tbody class="fz_body">
                    @foreach ($data_sos_score_time as $item)
                        @php
                        $sos_score_time_sos_success = strtotime($item->time_sos_success);
                        $sos_score_time_command = strtotime($item->time_command);

                        $sos_score_timeDifference = abs($sos_score_time_sos_success - $sos_score_time_command);

                        if ($sos_score_timeDifference >= 3600) {
                            $sos_score_time_hours = floor($sos_score_timeDifference / 3600);
                            $sos_score_time_remainingMinutes = floor(($sos_score_timeDifference % 3600) / 60);
                            $sos_score_time_remainingSeconds = $sos_score_timeDifference % 60;

                            $sos_score_time_unit = $sos_score_time_hours . ' ชั่วโมง ' . $sos_score_time_remainingMinutes . ' นาที ' . $sos_score_time_remainingSeconds . ' วินาที';
                        } elseif ($sos_score_timeDifference >= 60) {
                            $sos_score_time_minutes = floor($sos_score_timeDifference / 60);
                            $sos_score_time_seconds = $sos_score_timeDifference % 60;

                            $sos_score_time_unit = $sos_score_time_minutes . ' นาที ' . $sos_score_time_seconds . ' วินาที';
                        } else {
                            $sos_score_time_unit = $sos_score_timeDifference . ' วินาที';
                        }

                    @endphp

                    <tr class="mt_body_table">
                        <td>{{ $item->operating_code ? $item->operating_code : "--"}}</td>
                        <td>{{ $item->address ? $item->address : "--"}}</td>
                        <td>{{ $item->name_helper ? $item->name_helper : "--"}}</td>
                        <td>{{ $item->organization_helper ? $item->organization_helper : "--"}}</td>
                        <td>{{ $sos_score_time_unit ? $sos_score_time_unit : "--" }}</td>
                        <td ><p class="ms-auto mt-2"><i class="bx bxs-star text-warning mr-1"></i>{{ $item->score_total ? $item->score_total : "--"}}</p></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="fz_header">
                    <tr>
                        <th>รหัสเคส</th>
                        <th>สถานที่</th>
                        <th>ชื่อเจ้าหน้าที่</th>
                        <th>ชื่อหน่วยปฏิบัติการ</th>
                        <th>เวลาในการช่วยเหลือ</th>
                        <th>คะแนน</th>
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
    $(document).ready(function () {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = "ข้อมูลการช่วยเหลือของเจ้าหน้าที่";
        // Create search inputs in footer
        $("#all_score_unit_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_score_unit_table").DataTable({
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
                var footer = $("#all_score_unit_table tfoot tr");
                $("#all_score_unit_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_score_unit_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
</script>

@endsection

