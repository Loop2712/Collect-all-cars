@extends('layouts.main')

@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sell {{ $sell->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sell') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sell/' . $sell->id . '/edit') }}" title="Edit Sell"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sell' . '/' . $sell->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sell" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sell->id }}</td>
                                    </tr>
                                    <tr><th> Price </th><td> {{ $sell->price }} </td></tr><tr><th> Type </th><td> {{ $sell->type }} </td></tr><tr><th> Brand </th><td> {{ $sell->brand }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
