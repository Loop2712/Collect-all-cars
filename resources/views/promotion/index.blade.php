@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size: 25px;" class="text-dark"><b>โปรโมชั่น</b></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($promotion as $item)
                            <div class="col-12 col-md-3" style="padding: 15px;">
                                <div class="card main-shadow">
                                    <img src="{{ $item->photo }}" class="card-img-top" style="padding: 10px;">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="card-title">{{ $item->company }}</h4>
                                            <p style="font-size: 15px;" class="card-title"><b>{{ $item->titel }}</b></p>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text"><i class="far fa-clock"></i> {{ $item->time_period }}</p>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ $item->link }}" class="btn btn-sm btn-primary float-right main-shadow main-radius">ดูเพิ่มเติม</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="{{ url('/promotion/create') }}" class="btn btn-success btn-sm" title="Add New Promotion">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/promotion') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Company</th><th>Titel</th><th>Detail</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($promotion as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company }}</td><td>{{ $item->titel }}</td><td>{{ $item->detail }}</td>
                                        <td>
                                            <a href="{{ url('/promotion/' . $item->id) }}" title="View Promotion"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/promotion/' . $item->id . '/edit') }}" title="Edit Promotion"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/promotion' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Promotion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $promotion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
