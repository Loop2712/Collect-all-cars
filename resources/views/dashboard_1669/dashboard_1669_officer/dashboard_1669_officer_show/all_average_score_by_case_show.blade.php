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
        <form method="GET" action="{{ url('/dashboard_1669_all_average_score_by_case') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div id="advancedFilters" class="row">
                <div class="col-2 mb-3">
                    <input class="form-control" type="text" id="name_filter" name="name_filter" value="{{ request('name_filter') }}" placeholder="ค้นหาชื่อหรือชื่อหน่วย">
                </div>
                <div class="col-2 mb-3">
                    <select class="form-select filter-select" id="score_filter" name="score_filter">
                        <option value="">คะแนนเฉลี่ย</option>
                        <option value="5" @if(request('score_filter') == '5') selected @endif> 5</p> </option>
                        <option value="4" @if(request('score_filter') == '4') selected @endif> 4</p> </option>
                        <option value="3" @if(request('score_filter') == '3') selected @endif> 3</p> </option>
                        <option value="2" @if(request('score_filter') == '2') selected @endif> 2</p> </option>
                        <option value="1" @if(request('score_filter') == '1') selected @endif> 1</p> </option>
                    </select>
                </div>
                <div class="col-1 mb-3">
                    <button class="btn btn-primary " type="submit">
                        <i class="fa-solid fa-magnifying-glass fa-2xs mt-0"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="resetFilters()">
                        <i class="fa-solid fa-trash fa-2xs mt-0 "></i>
                    </button>
                </div>
            </div>

            <script>
                function resetFilters() {
                    document.getElementById("name_filter").value = "";
                    document.getElementById("gender_filter").value = "";
                    document.getElementById("status_filter").value = "";
                }
            </script>

        </form>
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
        let title_theme = document.querySelector('#title_theme');
                title_theme.innerHTML = "ข้อมูลคะแนนเฉลี่ยต่อเคสทั้งหมด" ;
        // เพิ่มโค้ดสำหรับการกรองข้อมูล
        let table = $('#avg_score_by_case_table').DataTable( {
            lengthChange: false,
            buttons: ['excel','print']
        } );

        table.buttons().container()
            .appendTo( '#avg_score_by_case_table_wrapper .col-md-6:eq(0)' );
    } );
</script>

@endsection
