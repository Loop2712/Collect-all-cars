@extends('layouts.partners.theme_partner_new')
<style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }
    .col-1.mb-3 .btn {
        width: 50px;
        height: 100%;
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

    div.dataTables_filter {
        margin-top: 1rem;
    }
</style>
@section('content')

<div class="card p-2">
    <h3 class="font-weight-bold float-start mb-0">
        ข้อมูลคะแนนเฉลี่ยของหน่วย &nbsp;
    </h3>
    <div id="card_table_user" class="card-body">
        <div class="table-responsive mt-4 mb-4">
            <table id="all_score_unit_table" class="table align-middle mb-0" >
                <thead class="fz_header">
                    <tr>
                        <th>ชื่อหน่วย</th>
                        <th>คะแนน</th>
                    </tr>
                </thead>
                <tbody id="top5_score_unit_tbody" class="fz_body">
                    @foreach ($avg_score_unit_data as $top5_score_unit)
                        <tr role="row" class="odd">
                            <td>
                                <div class="d-flex align-items-center p-2">
                                    <div>{{$top5_score_unit->name ? $top5_score_unit->name : "--"}}</div>
                                </div>
                            </td>
                            <td>
                                <p class="ms-auto mb-0 ">
                                    <i class="bx bxs-star text-warning mr-1"></i>{{$top5_score_unit->avg_score_total}}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="fz_header">
                    <tr>
                        <th>ชื่อหน่วย</th>
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
        document.title = "ข้อมูลคะแนนเฉลี่ยของหน่วย";
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
