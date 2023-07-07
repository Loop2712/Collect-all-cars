@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group"> <button
                                    class="btn btn-outline-secondary buttons-copy buttons-html5" tabindex="0"
                                    aria-controls="example2" type="button"><span>Copy</span></button> <button
                                    class="btn btn-outline-secondary buttons-excel buttons-html5" tabindex="0"
                                    aria-controls="example2" type="button"><span>Excel</span></button> <button
                                    class="btn btn-outline-secondary buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="example2" type="button"><span>PDF</span></button> <button
                                    class="btn btn-outline-secondary buttons-print" tabindex="0" aria-controls="example2"
                                    type="button"><span>Print</span></button> </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder=""
                                aria-controls="example2"></label></div>

                            <!-- <div id="example2_filter" class="dataTables_filter">
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected="">ตัวกรอง</option>
                                    <option value="1">ชื่อ</option>
                                    <option value="2">ชื่อ-สกุล</option>
                                    <option value="3">เพศ</option>
                                    <option value="3">วันเกิด</option>
                                    <option value="3">จังหวัด/อำเภอ</option>
                                    <option value="3">สัญชาติ</option>
                                    <option value="3">ภาษาที่ใช้</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-striped table-bordered dataTable" role="grid"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 265.984px;">
                                            ชื่อ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 400px;">ชื่อ-สกุล</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 75px;">เพศ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 125px;">วันเกิด</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 250px;">จังหวัด/อำเภอ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 75px;">สัญชาติ</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 150px;">
                                            ภาษาที่ใช้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_data as $user)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$user->name}}</td>
                                            <td>{{$user->name_staff}}</td>
                                            <td>{{$user->sex}}</td>
                                            <td>{{$user->brith}}</td>
                                            @if (!empty($user->location_P) && !empty($user->location_A))
                                                <td>{{$user->location_P}}/{{$user->location_A}}</td>
                                            @elseif(!empty($user->location_P) && empty($user->location_A))
                                                <td>{{$user->location_P}}</td>
                                            @else
                                                <td class="text-center"> - </td>
                                            @endif
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->language}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ชื่อ</th>
                                        <th rowspan="1" colspan="1">ชื่อ-สกุล</th>
                                        <th rowspan="1" colspan="1">เพศ</th>
                                        <th rowspan="1" colspan="1">วันเกิด</th>
                                        <th rowspan="1" colspan="1">จังหวัด/อำเภอ</th>
                                        <th rowspan="1" colspan="1">สัญชาติ</th>
                                        <th rowspan="1" colspan="1">ภาษาที่ใช้</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="javascript:;">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:;javascript:;">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:;">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:;">3</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:;">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
