@extends('layouts.admin')

@section('content')
<br>
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 text-center" >
                                <h2><i class="fas fa-ban" style="color:#E74C3C;"></i> แบนคำหยาบ</h2>
                            </div>
                            <div class="col-md-3 col-sm-0 "></div>
                            <div class="col-md-3 col-sm-4 text-right main" style="margin-left: auto;top:8px">
                                <a href="{{ url('/profanity/create') }}" class="btn btn-success btn-sm" title="Add New Profanity" style="margin-left: auto;">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม
                                </a>
                            </div><br>
                            <br style="d-block d-md-none">
                            <div class="col-md-3 col-sm-8 text-center d-flex justify-content-end">
                                <form method="GET" action="{{ url('/profanity') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">แบนคำหยาบ</div>
                    <div class="card-body">
                        <a href="{{ url('/profanity/create') }}" class="btn btn-success btn-sm" title="Add New Profanity">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม
                        </a>

                        <form method="GET" action="{{ url('/profanity') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <br/> -->

                        <div class="card">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                    <tr class="text-center">
                                        <th style="font-size: 15px;">No.</th>
                                        <th style="font-size: 15px;">คำหยาบที่ต้องการแบน</th>
                                        <th style="font-size: 15px;">เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($profanity as $item)
                                    <tr class="text-center">
                                        <td style="vertical-align: middle;font-size:15px;">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle;font-size:15px;">{{ $item->content }}</td>
                                        <td>
                                            <a href="{{ url('/profanity/' . $item->id) }}" title="View Profanity"><button class="d-none btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/profanity/' . $item->id . '/edit') }}" title="Edit Profanity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/profanity' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Profanity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $profanity->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
