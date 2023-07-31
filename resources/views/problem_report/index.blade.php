@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i){
        font-family: 'Kanit', sans-serif !important;
    }
    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .img-problem {
        width: 40px;
        height: 40px;
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        border: 1px solid #e6e6e6;
    }


    .img-problem img {
        width: 40px;
        height: 40px;
        padding: 6px;
        object-fit: contain;
    }


    .bg-light-success {
        background-color: rgb(41 204 57 / 15%) !important;
    }

    .bg-light-warning {
        background-color: rgb(255 193 7 / 0.11) !important;
    }

    .bg-light-primary {
        background-color: rgb(136 51 255 / 15%) !important;
    }
</style>
<div class="container mt-6" style="margin-top: 150px;">
    <!-- <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Problem_report</div>
                <div class="card-body">
                    <a href="{{ url('/problem_report/create') }}" class="btn btn-success btn-sm" title="Add New Problem_report">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/problem_report') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($problem_report as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->image }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ url('/problem_report/' . $item->id) }}" title="View Problem_report"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/problem_report/' . $item->id . '/edit') }}" title="Edit Problem_report"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/problem_report' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Problem_report" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $problem_report->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->


    <div class="row">
        <div class="col">
            <div class="card radius-10 mb-0">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-1 font-weight-bold">รายงานปัญหา</h5>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ url('/problem_report/create') }}" class="btn btn-success btn-sm radius-30">เพิ่มรายงาน</a>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>รายละเอียด</th>
                                    <th>วันที่</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($problem_report as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="img-problem">
                                                    @if(!empty($item->image))
                                                    <img src="{{ url('/storage') .'/'. $item->image  }}" alt="">
                                                    @else
                                                    <img src="{{ asset('/img/stickerline/PNG/17.png') }}" alt="">

                                                    @endif
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">{{ $item->description }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ (\Carbon\Carbon::parse($item->created_at))->format('วันที่ d M y h:i น.') }}</td>
                                        <td class="">
                                        @switch($item->status)
                                            @case('รับแจ้ง')
                                            <span class="badge bg-light-warning text-warning w-100">รับแจ้ง</span>
                                            @break
                                            @case('กำลังดำเนินการ')
                                            <span class="badge bg-light-primary text-primary w-100">กำลังดำเนินการ</span>
                                            @break
                                            @case('เสร็จสิ้น')
                                                <span class="badge bg-light-success text-success w-100">เสร็จสิ้น</span>
                                            @break
                                        @endswitch
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


@endsection