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

</style>
@section('content')

<div class="card">
    <div class="col-12">
        <h3 class="font-weight-bold float-start mb-0">
            ข้อมูลคะแนนเฉลี่ยต่อเคสทั้งหมด &nbsp;
        </h3>
    </div>
    <div id="card_table_user" class="card-body">

        <div class="table-responsive">
            <table id="avg_score_by_case_table" class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>ชื่อหน่วย</th>
                        <th>คะแนนเฉลี่ยต่อเคส</th>
                    </tr>
                </thead>
                <tbody id="avg_score_by_case_tbody">
                    @foreach ($avg_score_by_case as $avg_score_by_case)
                        <tr>
                            <td>
                                @php
                                    $data_user_avg_score_by_case = App\User::where('id',$avg_score_by_case->helper_id)->first();
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        @if(!empty($data_user_avg_score_by_case->photo))
                                            <img src="{{ url('storage') }}/{{ $data_user_avg_score_by_case->photo }}" width="35" height="35" class="rounded-circle" alt="">
                                        @endif
                                        @if(empty($data_user_avg_score_by_case->photo) && !empty($data_user_avg_score_by_case->avatar))
                                            <img src="{{ $data_user_avg_score_by_case->avatar }}" width="35" height="35" class="rounded-circle" alt="">
                                        @endif
                                        @if(empty($data_user_avg_score_by_case->avatar) && empty($data_user_avg_score_by_case->photo))
                                            <img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <span class="mt-2 font-14">{{$avg_score_by_case->name_officer}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{$avg_score_by_case->name}}</td>
                            <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> {{$avg_score_by_case->avg_score_by_case}}</p></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ชื่อ</th>
                        <th>ชื่อหน่วย</th>
                        <th>คะแนนเฉลี่ยต่อเคส</th>
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
        document.title = "ข้อมูลคะแนนเฉลี่ยต่อเคสทั้งหมด";
        // Create search inputs in footer
        $("#avg_score_by_case_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#avg_score_by_case_table").DataTable({
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
                var footer = $("#avg_score_by_case_table tfoot tr");
                $("#avg_score_by_case_table thead").append(footer);
            }
        });

        // Apply the search
        $("#avg_score_by_case_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });
</script>

@endsection
