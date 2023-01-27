@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Data_1669_operating_unit {{ $data_1669_operating_unit->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/data_1669_operating_unit') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/data_1669_operating_unit/' . $data_1669_operating_unit->id . '/edit') }}" title="Edit Data_1669_operating_unit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('data_1669_operating_unit' . '/' . $data_1669_operating_unit->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Data_1669_operating_unit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $data_1669_operating_unit->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $data_1669_operating_unit->name }} </td></tr><tr><th> Area </th><td> {{ $data_1669_operating_unit->area }} </td></tr><tr><th> Level </th><td> {{ $data_1669_operating_unit->level }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
