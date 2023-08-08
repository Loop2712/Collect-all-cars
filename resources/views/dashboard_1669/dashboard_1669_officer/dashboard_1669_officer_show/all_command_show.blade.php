@extends('layouts.partners.theme_partner_new')

<style>
    /* div.dataTables_wrapper div.dataTables_filter {
        display: none;
    } */

    div.dataTables_filter {
        margin-top: 1rem;
    }
</style>

@section('content')

    <div class="card p-2">
        <div class="col-12">
            <h3 class="font-weight-bold float-start mb-0">
                ข้อมูลการสั่งการของเจ้าหน้าที่ &nbsp;
                <!-- <span class="btn btn-sm btn-outline-info main-shadow main-radius" data-toggle="modal" data-target="#modal_change_number_officer">
                    จัดลำดับ <i class="fa-duotone fa-repeat"></i>
                </span> -->
            </h3>
        </div>
        <div id="card_table_user" class="card-body">
            <div class="table-responsive p-3">
                <table id="all_command_1669_data" class="table align-middle mb-0">
                    <thead class="fz_header">
                        <tr>
                            <th>ชื่อ</th>
                            <th>ทั้งหมด</th>
                            <th>เสร็จสิ้น</th>
                            <th>กำลังดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody class="fz_body">
                        @foreach ($command_1669_data as $all_command)
                            <tr >
                                <td>
                                    @php
                                        $data_user_command = App\User::where('id',$all_command->officers_command_by->user_id)->first();

                                        $command_sos_by = App\Models\Sos_help_center::where('command_by',$all_command->command_by)->get();
                                        $count_command_1669_data = count($command_sos_by);
                                        $count_status_success = 0;
                                        $count_status_helping = 0;
                                        foreach ($command_sos_by as $key) {
                                            if($key->status == "เสร็จสิ้น"){
                                                $count_status_success = $count_status_success + 1;
                                            }else {
                                                $count_status_helping = $count_status_helping + 1;
                                            }
                                        }

                                    @endphp
                                    <div class="d-flex align-items-center mt-3">
                                        @if(!empty($data_user_command->avatar) && empty($data_user_command->photo))
                                            <img src="{{ $data_user_command->avatar }}" width="35" height="35" class="rounded-circle" alt="">
                                        @endif
                                        @if(!empty($data_user_command->photo))
                                            <img src="{{ url('storage') }}/{{ $data_user_command->photo }}" width="35" height="35" class="rounded-circle" alt="">
                                        @endif
                                        @if(empty($data_user_command->avatar) && empty($data_user_command->photo))
                                            <img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">
                                        @endif

                                        <div class="flex-grow-1 ms-3">
                                            <p class="font-weight-bold mb-0">{{$all_command->officers_command_by->name_officer_command}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$count_command_1669_data}}</td>
                                <td>{{$count_status_success}}</td>
                                <td>{{$count_status_helping}}</td>
                            </tr>
                        @endforeach
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
            var table = $('#all_command_1669_data').DataTable( {
                lengthChange: false,
                buttons: ['excel', 'print']
            } );

            table.buttons().container()
                .appendTo( '#all_command_1669_data_wrapper .col-md-6:eq(0)' );
        } );
    </script>


@endsection
