@extends('layouts.partners.theme_partner_new')

<style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }

    .fz_header {
        font-size: 18px;
    }
    .fz_body {
        font-size: 16px;
    }
    .font-weight-bold{
        font-weight: bold !important;
    }

    .col-1.mb-3 .btn {
        width: 50px;
        height: 100%;
    }
</style>

@section('content')

    <div class="card">
        <div class="col-12">
            <h3 class="font-weight-bold float-start mb-0">
                ข้อมูลเจ้าหน้าที่ภายในองค์กร &nbsp;
            </h3>
        </div>
        <div id="card_table_user" class="card-body">
            <div class="table-responsive">
                <table id="user_data_table" class="table table-striped table-bordered">
                    <thead class="fz_header">
                        <tr>
                            <th>ชื่อ</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>จังหวัด</th>
                            <th>อำเภอ</th>
                            <th>สัญชาติ</th>
                            <th>ภาษาที่ใช้</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                        </tr>
                    </thead>
                    <tbody class="fz_body">
                        @foreach ($user_data as $user)
                            <tr role="row" class="odd p-2">
                                <td >{{$user->name ? $user->name : '-'}}</td>
                                <td>{{$user->name_staff ? $user->name_staff : '-'}}</td>
                                <td>ผู้ชาย</td>
                                <td>{{$user->brith ? $user->brith : '-'}}</td>
                                <td>{{$user->location_P ? $user->location_P : '-'}}</td>
                                <td>{{$user->location_A ? $user->location_A : '-'}}</td>
                                <td>{{$user->nationalitie ? $user->nationalitie : '-'}}</td>
                                <td>{{$user->language ? $user->language : '-'}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="fz_header">
                        <tr>
                            <th>ชื่อ</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>จังหวัด</th>
                            <th>อำเภอ</th>
                            <th>สัญชาติ</th>
                            <th>ภาษาที่ใช้</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
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
        document.title = "ข้อมูลเจ้าหน้าที่ภายในองค์กร";
        // Create search inputs in footer
        $("#user_data_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#user_data_table").DataTable({
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
                var footer = $("#user_data_table tfoot tr");
                $("#user_data_table thead").append(footer);
            }
        });

        // Apply the search
        $("#user_data_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
    </script>

@endsection
