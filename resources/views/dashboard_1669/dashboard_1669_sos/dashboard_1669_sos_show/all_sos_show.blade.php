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

    div.dataTables_filter {
        margin-top: 1rem !important;
    }
    .dataTables_wrapper div div{
        margin-top: 0.5rem !important;
    }
</style>
@section('content')

<div class="card p-2">
    <div class="col-12">
        <h3 class="font-weight-bold float-start mb-0">
            ข้อมูลการช่วยเหลือ &nbsp;
            {{-- <span class="btn btn-sm btn-outline-info main-shadow main-radius" data-toggle="modal" data-target="#modal_change_number_officer">
                จัดลำดับ <i class="fa-duotone fa-repeat"></i>
            </span> --}}
        </h3>
    </div>
    <div class="card-body p-3">
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
                            <td>{{ $data_sos->id ? $data_sos->id : "--"}}</td>
                            <td>{{ $data_sos->address ? $data_sos->address : "--"}}</td>
                            <td>{{ $data_sos->name_helper ? $data_sos->name_helper : "--"}}</td>
                            <td>{{ $data_sos->organization_helper ? $data_sos->organization_helper : "--"}}</td>
                            <td ><p class="ms-auto mt-2"><i class="bx bxs-star text-warning mr-1"></i>{{ $data_sos->score_total ? $data_sos->score_total : "--"}}</p></td>
                            <td>{{ $sos_fastest_time_unit ? $sos_fastest_time_unit : "--" }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // เพิ่มโค้ดสำหรับการกรองข้อมูล
        var table = $('#all_data_sos_table').DataTable( {
            lengthChange: true,
            buttons: ['excel','print']
        } );

        table.buttons().container()
            .appendTo( '#all_data_sos_table_wrapper .col-md-6:eq(0)' );
    } );
</script>

@endsection
