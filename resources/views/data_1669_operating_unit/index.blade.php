@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block" >
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="col-12 mt-3">
                <span class="font-weight-bold h4 mb-0">
                    การจัดการหน่วยแพทย์ ในพื้นที่ {{ Auth::user()->sub_organization }}
                </span>
                <a href="{{ url('/data_1669_operating_unit/create') }}" class="btn btn-success btn-sm float-end float-right mb-0" title="Add New Data_1669_operating_unit">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group">      <button class="btn btn-outline-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>Copy</span></button> <button class="btn btn-outline-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>Excel</span></button> <button class="btn btn-outline-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>PDF</span></button> <button class="btn btn-outline-secondary buttons-print" tabindex="0" aria-controls="example2" type="button"><span>Print</span></button> </div></div><div class="col-sm-12 col-md-6"><div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example2"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 269.406px;">Name</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 430.078px;">Position</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">Office</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100.359px;">Age</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 186.719px;">Start date</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 153.984px;">Salary</th></tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>$162,700</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                        </tfoot>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>





















        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อ</th>
                        <th>พื้นที่</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_1669_operating_unit as $item)
                        <tr>
                            <td class="text-center">
                                {{ $item->name }}
                            </td>
                            <td class="text-center">
                                {{ $item->area }}
                            </td>
                            <td class="text-center">
                                <!-- <a href="{{ url('/data_1669_operating_unit/' . $item->id) }}" title="View Data_1669_operating_unit">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                </a> -->
                                <a href="{{ url('/data_1669_operating_unit/' . $item->id . '/edit') }}" title="Edit Data_1669_operating_unit"><button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                </a>

                                <!-- <form method="POST" action="{{ url('/data_1669_operating_unit' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Data_1669_operating_unit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                {!! $data_1669_operating_unit->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection
