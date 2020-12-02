@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Data_car {{ $data_car->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/data_car') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/data_car/' . $data_car->id . '/edit') }}" title="Edit Data_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('data_car' . '/' . $data_car->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Data_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $data_car->id }}</td>
                                    </tr>
                                    <tr><th> Price </th><td> {{ $data_car->price }} </td></tr><tr><th> Type </th><td> {{ $data_car->type }} </td></tr><tr><th> Brand </th><td> {{ $data_car->brand }} </td></tr><tr><th> Model </th><td> {{ $data_car->model }} </td></tr><tr><th> Submodel </th><td> {{ $data_car->submodel }} </td></tr><tr><th> Year </th><td> {{ $data_car->year }} </td></tr><tr><th> Motor </th><td> {{ $data_car->motor }} </td></tr><tr><th> Gear </th><td> {{ $data_car->gear }} </td></tr><tr><th> Seats </th><td> {{ $data_car->seats }} </td></tr><tr><th> Distance </th><td> {{ $data_car->distance }} </td></tr><tr><th> Color </th><td> {{ $data_car->color }} </td></tr><tr><th> Image </th><td> {{ $data_car->image }} </td></tr><tr><th> Location </th><td> {{ $data_car->location }} </td></tr><tr><th> Link </th><td> {{ $data_car->link }} </td></tr><tr><th> Car Id Detail </th><td> {{ $data_car->car_id_detail }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
