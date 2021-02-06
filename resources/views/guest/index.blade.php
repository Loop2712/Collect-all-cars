@extends('layouts.app')

@section('content')
@if(Auth::check())
    @if(Auth::user()->role == "admin" )
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">Guest</div>
                    <div class="card-body">
                        <a href="{{ url('/guest/create') }}" class="btn btn-success btn-sm" title="Add New Guest">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/guest') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Masseng</th>
                                        <th>Brand</th>
                                        <th>registration</th>
                                        <th>county</th>
                                        <th>Photo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($guest as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->masseng }}</td>
                                        <td>{{ $item->brand }}</td>
                                        <td>{{ $item->registration }}</td>
                                        <td>{{ $item->county }}</td>
                                        <td><img width="150" src="{{ url('storage')}}/{{ $item->photo }}"></td>
                                        
                                        <td>
                                            <a href="{{ url('/guest/' . $item->id) }}" title="View Guest"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/guest/' . $item->id . '/edit') }}" title="Edit Guest"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/guest' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Guest" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif
@endsection
