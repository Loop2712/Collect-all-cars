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
</style>

@section('content')

    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ &nbsp;
                </h3>
                {{-- <button id="advancedBtn" class="btn btn-success">ค้นหาขั้นสูง</button> --}}
            </div>
        </div>

        <div id="card_table_user" class="card-body">
            <div class="table-responsive">
                <table id="all_data_command_user_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>เพศ</th>
                            <th>สถานะ</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                            <th>ผู้สร้าง</th>
                        </tr>
                    </thead>
                    <tbody id="data_command_user_tbody">
                        @foreach ($data_command_user as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        @if(!empty($user->avatar) && empty($user->photo))
                                            <img src="{{ $user->avatar }}">
                                        @endif
                                        @if(!empty($user->photo))
                                            <img src="{{ url('storage') }}/{{ $user->photo }}">
                                        @endif
                                        @if(empty($user->avatar) && empty($user->photo))
                                            <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mt-3 font-14">{{$user->name_officer_command}}</h6>
                                    </div>
                                </div>
                            </td>
                            @if (!empty($user->sex))
                                <td>{{$user->sex}}</td>
                            @else
                                <td> -- </td>
                            @endif

                            @switch($user->status)
                                @case('Standby')
                                    <td>
                                        <span class="badge badge-pill bg-success"> พร้อม</span>
                                    </td>
                                    @break
                                @case('Helping')
                                    <td>
                                        <span class="badge badge-pill bg-warning"> ช่วยเหลือ </span>
                                    </td>
                                    @break
                                @default
                                    <td>
                                        <span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>
                                    </td>
                            @endswitch

                            @if (!empty($user->created_at))
                                <td> {{ \Carbon\Carbon::parse($user->created_at)->locale('th')->diffForHumans() }}</td>
                            @else
                                <td> -- </td>
                            @endif


                            @if (!empty($user->creator))
                                <td>{{ $user->name }}</td>
                            @else
                                <td> ViiCheck </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ชื่อ</th>
                            <th>เพศ</th>
                            <th>สถานะ</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                            <th>ผู้สร้าง</th>
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
        document.title = "ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ";
        // Create search inputs in footer
        $("#all_data_command_user_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_data_command_user_table").DataTable({
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
                var footer = $("#all_data_command_user_table tfoot tr");
                $("#all_data_command_user_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_data_command_user_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
    </script>


@endsection
