@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vote_kan_score {{ $vote_kan_score->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/vote_kan_scores') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/vote_kan_scores/' . $vote_kan_score->id . '/edit') }}" title="Edit Vote_kan_score"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('vote_kan_scores' . '/' . $vote_kan_score->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Vote_kan_score" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vote_kan_score->id }}</td>
                                    </tr>
                                    <tr><th> Vote Kan Stations Id </th><td> {{ $vote_kan_score->vote_kan_stations_id }} </td></tr><tr><th> User Id </th><td> {{ $vote_kan_score->user_id }} </td></tr><tr><th> Last </th><td> {{ $vote_kan_score->last }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
