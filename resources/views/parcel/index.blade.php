@extends('layouts.partners.theme_partner_new')


@section('content')
@if($user->role == "admin-condo")

<div class="row" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="font-weight-bold mb-0">
                                    <b>รายการพัสดุ</b>
                                </h4>
                            </div>
                            <div class="col-6">
                                <a style="float: right;" href="{{ url('/parcel/create') }}" class="btn btn-success btn-sm" title="Add New Parcel">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ
                                </a>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-12">
                                @foreach($all_building as $item)
                                    @if($building == $item->building)
                                        <a href="{{ url('/parcel') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-info text-white" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @else
                                        <a href="{{ url('/parcel') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-outline-info" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-12">
                        <h5>รายการพัสดุอาคาร : <b style="font-size:25px;" class="text-danger" id="span_building">{{ $building }}</b></h5>
                    </div>
                    <br><br>
                    <hr>
                    @foreach($parcel as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <i class="fas fa-address-card"></i> อาคาร : {{ $item->user_condo->building }} ห้อง : {{ $item->user_condo->room_number }}
                                <br>
                                <i class="far fa-clock"></i> {{ $item->created_at }}
                                <br>
                                <i class="fas fa-user-shield"></i> {{ $item->name_staff }}
                            </div>
                            <div class="col-4">
                                <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                    <img style="width:100%;margin-top: 8px;" src="{{ url('storage')}}/{{ $item->photo }}">
                                </a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br><br>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>





<!-- -------------------------------------------------------------------------- -->
    <!-- <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">Parcel</div>
                    <div class="card-body">
                        

                        <form method="GET" action="{{ url('/parcel') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Photo</th><th>Name Staff</th><th>Time In</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($parcel as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->photo }}</td><td>{{ $item->name_staff }}</td><td>{{ $item->time_in }}</td>
                                        <td>
                                            <a href="{{ url('/parcel/' . $item->id) }}" title="View Parcel"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/parcel/' . $item->id . '/edit') }}" title="Edit Parcel"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/parcel' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Parcel" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $parcel->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endif
@endsection
