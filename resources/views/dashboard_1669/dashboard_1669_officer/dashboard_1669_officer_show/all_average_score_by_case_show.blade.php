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

<div class="card">
    <div class="col-12">
        <h3 class="font-weight-bold float-start mb-0">
            คะแนนเฉลี่ยต่อเคสทั้งหมด &nbsp;
            <span class="btn btn-sm btn-outline-info main-shadow main-radius" data-toggle="modal" data-target="#modal_change_number_officer">
                จัดลำดับ <i class="fa-duotone fa-repeat"></i>
            </span>
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
                                        <span class="mt-2 font-14">{{$avg_score_by_case->operating_officer->name_officer}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{$avg_score_by_case->operating_unit->name}}</td>
                            <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> {{$avg_score_by_case->avg_score_by_case}}</p></td>
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
        var table = $('#avg_score_by_case_table').DataTable( {
            lengthChange: false,
            buttons: ['excel','print']
        } );

        table.buttons().container()
            .appendTo( '#avg_score_by_case_table_wrapper .col-md-6:eq(0)' );
    } );
</script>

@endsection
