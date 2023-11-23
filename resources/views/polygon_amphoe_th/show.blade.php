@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Polygon_amphoe_th {{ $polygon_amphoe_th->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/polygon_amphoe_th') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/polygon_amphoe_th/' . $polygon_amphoe_th->id . '/edit') }}" title="Edit Polygon_amphoe_th"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('polygon_amphoe_th' . '/' . $polygon_amphoe_th->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Polygon_amphoe_th" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $polygon_amphoe_th->id }}</td>
                                    </tr>
                                    <tr><th> Province Name </th><td> {{ $polygon_amphoe_th->province_name }} </td></tr><tr><th> Amphoe Name </th><td> {{ $polygon_amphoe_th->amphoe_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
