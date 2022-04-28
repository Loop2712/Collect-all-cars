@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Not_comfor {{ $not_comfor->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/not_comfor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/not_comfor/' . $not_comfor->id . '/edit') }}" title="Edit Not_comfor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('not_comfor' . '/' . $not_comfor->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Not_comfor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $not_comfor->id }}</td>
                                    </tr>
                                    <tr><th> Provider Id </th><td> {{ $not_comfor->provider_id }} </td></tr><tr><th> Reply Provider Id </th><td> {{ $not_comfor->reply_provider_id }} </td></tr><tr><th> Content </th><td> {{ $not_comfor->content }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
