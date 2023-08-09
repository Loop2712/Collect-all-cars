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
        <!-- เพิ่มตัวกรอง -->
        <form method="GET" action="{{ url('/dashboard_1669_all_score_unit') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div id="advancedFilters" class="row">
                <div class="col-2 mb-3">
                    {{-- <label for="name_filter" class="form-label">ชื่อ:</label> --}}
                    <input class="form-control" type="text" id="name_filter" name="name_filter" value="{{ request('name_filter') }}" placeholder="ค้นหาด้วยชื่อ">
                </div>
                <div class="col-2 mb-3">
                    {{-- <label for="score_filter" class="form-label">เพศ:</label> --}}
                    <select class="form-select filter-select" id="score_filter" name="score_filter">
                        <option value="">คะแนน</option>
                        <option value="5" @if(request('score_filter') == '5') selected @endif>5</option>
                        <option value="4" @if(request('score_filter') == '4') selected @endif>4</option>
                        <option value="3" @if(request('score_filter') == '3') selected @endif>3</option>
                        <option value="2" @if(request('score_filter') == '2') selected @endif>2</option>
                        <option value="1" @if(request('score_filter') == '1') selected @endif>1</option>
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
                    document.getElementById("score_filter").value = "";
                }
            </script>

        </form>
        <!-- จบส่วนตัวกรอง -->
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
                title_theme.innerHTML = "ข้อมูลคะแนนเฉลี่ยของหน่วย" ;

        // เพิ่มโค้ดสำหรับการกรองข้อมูล
        let table = $('#all_score_unit_table').DataTable( {
            lengthChange: false,
            buttons: ['excel','print']
        } );

        table.buttons().container()
            .appendTo( '#all_score_unit_table_wrapper .col-md-6:eq(0)' );
    } );
</script>

@endsection
