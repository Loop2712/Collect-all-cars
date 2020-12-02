@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Data_car</div>
                    <div class="card-body">
                        <a href="{{ url('/data_car/create') }}" class="btn btn-success btn-sm" title="Add New Data_car">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/data_car') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Price</th><th>Type</th><th>Brand</th><th>Model</th><th>Submodel</th><th>Year</th><th>Motor</th><th>Gear</th><th>Seats</th><th>Distance</th><th>Color</th><th>Image</th><th>Location</th><th>Link</th><th>Car Id Detail</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_car as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->price }}</td><td>{{ $item->type }}</td><td>{{ $item->brand }}</td><td>{{ $item->model }}</td><td>{{ $item->submodel }}</td><td>{{ $item->year }}</td><td>{{ $item->motor }}</td><td>{{ $item->gear }}</td><td>{{ $item->seats }}</td><td>{{ $item->distance }}</td><td>{{ $item->color }}</td><td>{{ $item->image }}</td><td>{{ $item->location }}</td><td>{{ $item->link }}</td><td>{{ $item->car_id_detail }}</td>
                                        <td>
                                            <a href="{{ url('/data_car/' . $item->id) }}" title="View Data_car"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/data_car/' . $item->id . '/edit') }}" title="Edit Data_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/data_car' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Data_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $data_car->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
