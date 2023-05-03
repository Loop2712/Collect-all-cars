@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">ข้อมูลสัญชาติ</h3>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <a href="{{ url('/nationality/create') }}" class="btn btn-success btn-sm" title="Add New Nationality">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-9">
                                                <form method="GET" action="{{ url('/nationality') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="select_search_language">
                                                            <i class="fa-solid fa-language"></i>
                                                            &nbsp;&nbsp;ค้นหาภาษา
                                                        </label>
                                                        <select name="select_search_language" value="{{ request('select_search_language') }}" class="form-control" id="select_search_language" onchange="document.querySelector('#submit_search_form_nationality').click();">

                                                            @if($select_search_language)
                                                                <option selected="" value="{{ $select_search_language }}">
                                                                    {{ $select_search_language }}
                                                                </option>
                                                                <option value="">เลือกภาษา</option>
                                                            @else
                                                                <option selected="" value="">เลือกภาษา</option>
                                                            @endif

                                                            @foreach($group_nationality as $item_n)
                                                                <option value="{{ $item_n->language }}">
                                                                    {{ $item_n->language }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="search_form_nationality" name="search" placeholder="Search..." value="{{ request('search') }}">
                                                        <span class="input-group-append">
                                                            <button id="submit_search_form_nationality" class="btn btn-secondary" type="submit">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 111.5px;font-size: 18px;">
                                                                ธง
                                                            </th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156.469px;font-size: 18px;">
                                                                ประเทศ
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258.312px;font-size: 18px;">
                                                                สัญชาติ
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 49.3281px;font-size: 18px;">
                                                                ภาษา
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 104.062px;font-size: 18px;">
                                                                ชื่อกลุ่มไลน์
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 83.3281px;font-size: 18px;">
                                                                สถานะ
                                                            </th>
                                                            <th><!-- // --></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($nationality as $item)
                                                            <tr role="row" class="odd">
                                                                <td>ธง</td>
                                                                <td>{{ $item->country }}</td>
                                                                <td>{{ $item->nationality }}</td>
                                                                <td>{{ $item->language }}</td>
                                                                <td>{{ $item->name_group_line }}</td>

                                                                @if($item->status == 'show' )
                                                                    <td class="text-center">
                                                                        <i class="fa-solid fa-circle-check" style="color: #00db1a;font-size: 18px;"></i>
                                                                    </td>
                                                                @else
                                                                    <td class="text-center">
                                                                        <i class="fa-solid fa-circle-xmark" style="color: #e30202;font-size: 18px;"></i>
                                                                    </td>
                                                                @endif
                                                                <td>
                                                                    <!-- <a href="{{ url('/nationality/' . $item->id) }}" title="View Nationality"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                                                    <a href="{{ url('/nationality/' . $item->id . '/edit') }}" title="Edit Nationality"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                                    <!-- <form method="POST" action="{{ url('/nationality' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                        {{ method_field('DELETE') }}
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Nationality" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                                    </form> -->
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
