@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Redeem_code {{ $redeem_code->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/redeem_code') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/redeem_code/' . $redeem_code->id . '/edit') }}" title="Edit Redeem_code"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('redeem_code' . '/' . $redeem_code->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Redeem_code" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $redeem_code->id }}</td>
                                    </tr>
                                    <tr><th> Redeem Code </th><td> {{ $redeem_code->redeem_code }} </td></tr><tr><th> Privilege Id </th><td> {{ $redeem_code->privilege_id }} </td></tr><tr><th> Status </th><td> {{ $redeem_code->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
