@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Car</div>
                    <div class="card-body">
                        <a href="{{ url('/car/create') }}" class="btn btn-success btn-sm" title="Add New car">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/car') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Car Id</th><th>Namecar</th><th>Brand Id</th><th>Generat Id</th><th>Price</th><th>Year</th><th>Address</th><th>Mileage</th><th>Picture</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($car as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->car_id }}</td><td>{{ $item->namecar }}</td><td>{{ $item->brand_id }}</td><td>{{ $item->generat_id }}</td><td>{{ $item->price }}</td><td>{{ $item->year }}</td><td>{{ $item->address }}</td><td>{{ $item->Mileage }}</td><td>{{ $item->picture }}</td>
                                        <td>
                                            <a href="{{ url('/car/' . $item->id) }}" title="View car"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/car/' . $item->id . '/edit') }}" title="Edit car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/car' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $car->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
