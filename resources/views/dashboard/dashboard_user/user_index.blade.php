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

    #user_data_table_length{
        margin-top: 1rem;
    }
</style>

@section('content')

    <div class="card">
        <div class="col-12">
            <h3 class="font-weight-bold float-start mb-0 p-2">
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
                                <td>{{$user->sex ? $user->sex : '-'}}</td>
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

	<!--plugins-->
	<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {
       // DataTable initialisation
        let table1 = $("#user_data_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: true,
            pageLength: 20,
            columnDefs: [
                // { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0,1,2,3,4,5,6,7], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[8, 'asc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table1.order([[8, 'asc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
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
                let footer1 = $("#user_data_table tfoot tr");
                $("#user_data_table thead").append(footer1);

            }
        });

        $("#user_data_table tfoot th").each(function () {
            if($(this).text()){
                let title1 = $(this).text();
                if(title1){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                }
            }
        });

    });




</script>

@endsection
