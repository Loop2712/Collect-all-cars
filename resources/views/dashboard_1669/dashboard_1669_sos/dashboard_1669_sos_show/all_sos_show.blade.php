@extends('layouts.partners.theme_partner_new')
<style>
    .fz_header {
        font-size: 18px;
    }
    .fz_body {
        font-size: 16px;
    }
    .font-weight-bold{
        font-weight: bold !important;
    }
    .mt_body_table{
        margin-top: 1rem !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }

    div.dataTables_filter {
        margin-top: 1rem;
    }
    .col-1.mb-3 .btn {
        width: 50px;
        height: 100%;
    }

    .dataTables_wrapper div div{
        margin-top: 0.5rem !important;
    }
</style>
@section('content')

<div class="card p-2">
    <div class="col-12">
        <h3 class="font-weight-bold float-start mb-0">
            ข้อมูลคะแนนและระยะเวลาการช่วยเหลือ &nbsp;
        </h3>
    </div>
    <div class="card-body p-3">
        {{-- <form method="GET" action="{{ url('/dashboard_1669_all_sos_show') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div id="advancedFilters" class="row">
                <div class="col-2 mb-3">
                    <input class="form-control" type="text" id="name_filter" name="name_filter" value="{{ request('name_filter') }}" placeholder="ค้นหาชื่อหรือชื่อหน่วย">
                </div>
                <div class="col-2 mb-3">
                    <select class="form-select filter-select" id="score_filter" name="score_filter">
                        <option value="">คะแนนเฉลี่ย</option>
                        <option value="5" @if(request('score_filter') == '5') selected @endif> 5</p> </option>
                        <option value="4" @if(request('score_filter') == '4') selected @endif> 4</p> </option>
                        <option value="3" @if(request('score_filter') == '3') selected @endif> 3</p> </option>
                        <option value="2" @if(request('score_filter') == '2') selected @endif> 2</p> </option>
                        <option value="1" @if(request('score_filter') == '1') selected @endif> 1</p> </option>
                    </select>
                </div>
                <div class="col-2 mb-3">
                    <select class="form-select filter-select" id="time_filter" name="time_filter">
                        <option value="">ระยะเวลา</option>
                        <option value="less_8" @if(request('time_filter') == 'less_8') selected @endif>น้อยกว่า 8 นาที</p> </option>
                        <option value="over_8_less_12" @if(request('time_filter') == 'over_8_less_12') selected @endif>8 นาที ถึง 12 นาที</p> </option>
                        <option value="over_12" @if(request('time_filter') == 'over_12') selected @endif>มากกว่า 12 นาที</p> </option>
                    </select>
                </div>
                <div class="col-1 mb-3">
                    <button class="btn btn-primary " type="submit">
                        <i class="fa-solid fa-magnifying-glass fa-2xs mt-0"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="resetFilters()">
                        <i class="fa-solid fa-trash fa-2xs mt-0 "></i>
                    </button>
                </div>
            </div>

            <script>
                function resetFilters() {
                    document.getElementById("name_filter").value = "";
                    document.getElementById("score_filter").value = "";
                    document.getElementById("time_filter").value = "";
                }
            </script>

        </form> --}}
        <div class="table-responsive">
            <table id="all_data_sos_table" class="table align-middle mb-0 ">
                <thead class="fz_header">
                    <tr>
                        <th>รหัสเคส</th>
                        <th>address</th>
                        <th>name_helper</th>
                        <th>organization_helper</th>
                        <th>คะแนน</th>
                        <th>ระยะเวลา</th>
                    </tr>
                </thead>
                <tbody class="fz_body">
                    @foreach ($data_sos as $data_sos)

                        @php
                            $sos_fastest_time_sos_success = strtotime($data_sos->time_sos_success);
                            $sos_fastest_time_command = strtotime($data_sos->time_command);

                            $sos_fastest_timeDifference = abs($sos_fastest_time_sos_success - $sos_fastest_time_command);

                            if ($sos_fastest_timeDifference >= 3600) {
                                $sos_fastest_hours = floor($sos_fastest_timeDifference / 3600);
                                $sos_fastest_remainingMinutes = floor(($sos_fastest_timeDifference % 3600) / 60);
                                $sos_fastest_remainingSeconds = $sos_fastest_timeDifference % 60;

                                $sos_fastest_time_unit = $sos_fastest_hours . ' ชั่วโมง ' . $sos_fastest_remainingMinutes . ' นาที ' . $sos_fastest_remainingSeconds . ' วินาที';
                            } elseif ($sos_fastest_timeDifference >= 60) {
                                $sos_fastest_minutes = floor($sos_fastest_timeDifference / 60);
                                $sos_fastest_seconds = $sos_fastest_timeDifference % 60;

                                $sos_fastest_time_unit = $sos_fastest_minutes . ' นาที ' . $sos_fastest_seconds . ' วินาที';
                            } else {
                                $sos_fastest_time_unit = $sos_fastest_timeDifference . ' วินาที';
                            }

                        @endphp

                        <tr class="mt_body_table">
                            <td>{{ $data_sos->operating_code ? $data_sos->operating_code : "--"}}</td>
                            <td>{{ $data_sos->address ? $data_sos->address : "--"}}</td>
                            <td>{{ $data_sos->name_helper ? $data_sos->name_helper : "--"}}</td>
                            <td>{{ $data_sos->organization_helper ? $data_sos->organization_helper : "--"}}</td>
                            <td ><p class="ms-auto mt-2"><i class="bx bxs-star text-warning mr-1"></i>{{ $data_sos->score_total ? $data_sos->score_total : "--"}}</p></td>
                            <td>{{ $sos_fastest_time_unit ? $sos_fastest_time_unit : "--" }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="fz_header">
                    <tr>
                        <th>รหัสเคส</th>
                        <th>address</th>
                        <th>name_helper</th>
                        <th>organization_helper</th>
                        <th>คะแนน</th>
                        <th>ระยะเวลา</th>
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
        document.title = "ข้อมูลการขอความช่วยเหลือ";
        // Create search inputs in footer
        $("#all_data_sos_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_data_sos_table").DataTable({
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
                var footer = $("#all_data_sos_table tfoot tr");
                $("#all_data_sos_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_data_sos_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
</script>

@endsection
