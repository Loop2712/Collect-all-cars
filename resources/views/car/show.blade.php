@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">car {{ $car->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/car') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/car/' . $car->id . '/edit') }}" title="Edit car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('car' . '/' . $car->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $car->id }}</td>
                                    </tr>
                                    <tr><th> Car Id </th><td> {{ $car->car_id }} </td></tr><tr><th> Namecar </th><td> {{ $car->namecar }} </td></tr><tr><th> Brand Id </th><td> {{ $car->brand_id }} </td></tr><tr><th> Generat Id </th><td> {{ $car->generat_id }} </td></tr><tr><th> Price </th><td> {{ $car->price }} </td></tr><tr><th> Year </th><td> {{ $car->year }} </td></tr><tr><th> Address </th><td> {{ $car->address }} </td></tr><tr><th> Mileage </th><td> {{ $car->Mileage }} </td></tr><tr><th> Picture </th><td> {{ $car->picture }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
