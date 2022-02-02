@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="font-weight-bold mb-0">รายชื่อ Check in / out</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr class="text-center">
                        <th>คันที่</th>
                        <th>ยี่ห้อ/รุ่น</th>
                        <th>หมายเลขทะเบียน</th>
                        <th>เหตุผล</th>
                        <th>วันที่</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($check_in as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->time_in }}</td>
                            <td>{{ $item->time_out }}</td>
                            <td>
                                <a href="{{ url('/check_in/' . $item->id) }}" title="View Check_in"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/check_in/' . $item->id . '/edit') }}" title="Edit Check_in"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/check_in' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination round-pagination " style="margin-top:10px;"> {!! $check_in->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>


    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รายชื่อ Check in / out</h3>
                    <div class="card-body">

                        <form method="GET" action="{{ url('/check_in') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Time In</th><th>Time Out</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($check_in as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td><td>{{ $item->time_in }}</td><td>{{ $item->time_out }}</td>
                                        <td>
                                            <a href="{{ url('/check_in/' . $item->id) }}" title="View Check_in"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/check_in/' . $item->id . '/edit') }}" title="Edit Check_in"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/check_in' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
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
    </div> -->
@endsection
