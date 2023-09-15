@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vote_kan_station {{ $vote_kan_station->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/vote_kan_stations') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/vote_kan_stations/' . $vote_kan_station->id . '/edit') }}" title="Edit Vote_kan_station"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('vote_kan_stations' . '/' . $vote_kan_station->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Vote_kan_station" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vote_kan_station->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $vote_kan_station->name }} </td></tr><tr><th> Province </th><td> {{ $vote_kan_station->province }} </td></tr><tr><th> Amphoe </th><td> {{ $vote_kan_station->amphoe }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
