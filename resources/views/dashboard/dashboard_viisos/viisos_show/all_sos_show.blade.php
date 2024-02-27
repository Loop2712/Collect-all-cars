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

    #all_data_sos_1669_table_paginate ul.pagination {
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
            #all_data_sos_1669_table tr th {
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
</script>
{{--
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let pagination_class = document.querySelector('.pagination');
            pagination_class.classList.add('float-start');
        });

    </script> --}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        get_data_sos();
    });

    $(document).ready(function() {
        $('#your_table_id').DataTable();
    });
    // สมาชิกในทีมของทุกทีม
    function get_data_sos() {
        document.title = "ข้อมูลการขอความช่วยเหลือ";
        // Create search inputs in footer
        $("#all_data_sos_1669_table tfoot th").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_data_sos_1669_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            bDestroy: true,
            buttons: [{
                extend: "excelHtml5",
                text: "Export Excel" // เปลี่ยนข้อความในปุ่มที่นี่
            }, ],
            initComplete: function(settings, json) {
                var footer = $("#all_data_sos_1669_table tfoot tr");
                $("#all_data_sos_1669_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_data_sos_1669_table thead").on("keyup", "input", function() {
            table.column($(this).parent().index())
                .search(this.value)
                .draw();
        });

        var all_data_sos_1669_table = $('#all_data_sos_1669_table').DataTable();

        let user_organization = '{{Auth::user()->organization}}';
        fetch("{{ url('/') }}/api/dashboard_viisos?user_organization=" + user_organization)
            .then(response => response.json())
            .then(result => {

                // console.log(result);

                for (let i = 0; i < result.length; i++) {
                    // console.log(result[i].id);
                    let createdAtDate = new Date(result[i].created_at);

                    let created_at = createdAtDate.toLocaleDateString('th-TH', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                    });

                    // let sTimeDifference = new Date(result[i].help_complete_time);
                    const sTimeSOSuccess = new Date(result[i].help_complete_time).getTime();
                    const sTimeCommand = new Date(result[i].time_go_to_help).getTime();

                    const sTimeDifference = Math.abs(sTimeSOSuccess - sTimeCommand) / 1000;

                    if(result[i].help_complete_time)
                        if (sTimeDifference >= 3600) {
                            const sHours = Math.floor(sTimeDifference / 3600);
                            const sRemainingMinutes = Math.floor((sTimeDifference % 3600) / 60);
                            const sRemainingSeconds = sTimeDifference % 60;

                            sTimeUnit = `${sHours} ชั่วโมง ${sRemainingMinutes} นาที ${sRemainingSeconds} วินาที`;
                        } else if (sTimeDifference >= 60) {
                            const sMinutes = Math.floor(sTimeDifference / 60);
                            const sSeconds = sTimeDifference % 60;

                            sTimeUnit = `${sMinutes} นาที ${sSeconds} วินาที`;
                        } else {
                            sTimeUnit = `${sTimeDifference} วินาที`;
                        }
                    else{
                        sTimeUnit =  "--"
                    }

                    table.row.add([
                        result[i].help_complete = result[i].help_complete == "Yes" ? '<p class="text-success">เสร็จสิ้น</p>' : '<p class="text-danger">กำลังดำเนินการ</p>',
                        created_at,
                        result[i].lat ? result[i].lat : "--",
                        result[i].lng ? result[i].lng : "--",
                        result[i].name_area ? result[i].name_area : "--",
                        result[i].name ? result[i].name : "--",
                        result[i].phone ? result[i].phone : "--",
                        result[i].helper ? result[i].helper : "--",
                        result[i].time_go_to_help ? result[i].time_go_to_help : "--",
                        result[i].help_complete_time ? result[i].help_complete_time : "--",
                        sTimeUnit,
                        result[i].score_impression ? result[i].score_impression : "--",
                        result[i].score_period ? result[i].score_period : "--",
                        result[i].score_total ? result[i].score_total : "--",
                        result[i].comment_help ? result[i].comment_help : "--",
                        result[i].remark ? result[i].remark : "--",
                    ]).draw(false);
                }
            });

    }
</script>
















@endsection