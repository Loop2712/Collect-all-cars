@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Cancel_after_6_month {{ $cancel_after_6_month->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cancel_after_6_month') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cancel_after_6_month/' . $cancel_after_6_month->id . '/edit') }}" title="Edit Cancel_after_6_month"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('cancel_after_6_month' . '/' . $cancel_after_6_month->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Cancel_after_6_month" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cancel_after_6_month->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $cancel_after_6_month->name }} </td></tr><tr><th> Username </th><td> {{ $cancel_after_6_month->username }} </td></tr><tr><th> Email </th><td> {{ $cancel_after_6_month->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
