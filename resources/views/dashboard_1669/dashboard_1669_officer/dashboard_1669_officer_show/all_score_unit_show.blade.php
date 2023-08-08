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

    div.dataTables_filter {
        margin-top: 1rem;
    }
</style>
@section('content')

<div class="card p-2">
    <h3 class="font-weight-bold float-start mb-0">
        ข้อมูลคะแนนเฉลี่ยของหน่วย &nbsp;
        <!-- <span class="btn btn-sm btn-outline-info main-shadow main-radius" data-toggle="modal" data-target="#modal_change_number_officer">
            จัดลำดับ <i class="fa-duotone fa-repeat"></i>
        </span> -->
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
                                    <div>{{$top5_score_unit->operating_unit->name ? $top5_score_unit->operating_unit->name : "--"}}</div>
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
        var table = $('#all_score_unit_table').DataTable( {
            lengthChange: false,
            buttons: ['excel','print']
        } );

        table.buttons().container()
            .appendTo( '#all_score_unit_table_wrapper .col-md-6:eq(0)' );
    } );
</script>

@endsection
